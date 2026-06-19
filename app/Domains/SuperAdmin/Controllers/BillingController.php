<?php

namespace App\Domains\SuperAdmin\Controllers;

use App\Domains\SuperAdmin\Models\Invoice;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Display the Billing & Invoice tab with dynamic database-backed data.
     */
    public function index()
    {
        // Seeding awal jika tabel kosong agar UI langsung terisi data
        if (Invoice::count() === 0) {
            $this->seedInitialInvoices();
        }

        $invoices = Invoice::orderBy('id', 'asc')->get();

        return view('index', [
            'tab' => 'billing_invoice',
            'invoices' => $invoices,
        ]);
    }

    /**
     * Store a new invoice and calculate its blockchain hash.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'due_date' => 'required|date',
            'status' => 'required|string|in:paid,unpaid,overdue',
        ]);

        // Generate unique Invoice Number
        $count = Invoice::count();
        $invoiceNo = 'INV-2026-'.str_pad($count + 1, 3, '0', STR_PAD_LEFT);

        // Fetch last invoice for hash chain
        $lastInvoice = Invoice::orderBy('id', 'desc')->first();
        $prevHash = $lastInvoice ? $lastInvoice->hash : str_repeat('0', 64);

        // Calculate SHA-256 Hash
        $dataToHash = $invoiceNo.$validated['client_name'].$validated['division'].$validated['amount'].$validated['due_date'].$validated['status'].$prevHash;
        $hash = hash('sha256', $dataToHash);

        $invoice = Invoice::create([
            'invoice_no' => $invoiceNo,
            'client_name' => $validated['client_name'],
            'division' => $validated['division'],
            'amount' => $validated['amount'],
            'due_date' => $validated['due_date'],
            'status' => $validated['status'],
            'previous_hash' => $prevHash,
            'hash' => $hash,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Invoice #'.$invoiceNo.' berhasil diterbitkan dengan Hash Chain.',
            'invoice' => [
                'id' => $invoice->id,
                'invoiceNo' => $invoice->invoice_no,
                'clientName' => $invoice->client_name,
                'division' => $invoice->division,
                'amount' => $invoice->amount,
                'dueDate' => $invoice->due_date,
                'status' => $invoice->status,
                'hash' => $invoice->hash,
            ],
        ]);
    }

    /**
     * Validate the entire Blockchain Hash Chain ledger for data integrity.
     */
    public function validateChain()
    {
        $invoices = Invoice::orderBy('id', 'asc')->get();
        $isValid = true;
        $tamperedInvoices = [];
        $prevHash = str_repeat('0', 64);

        foreach ($invoices as $inv) {
            // 1. Validasi previous_hash
            if ($inv->previous_hash !== $prevHash) {
                $isValid = false;
                $tamperedInvoices[] = $inv->invoice_no.' (Rantai terputus: previous_hash tidak cocok)';
                $prevHash = $inv->hash; // Lanjutkan dengan hash sekarang untuk mendeteksi yang lain

                continue;
            }

            // 2. Validasi hash saat ini
            $expectedData = $inv->invoice_no.$inv->client_name.$inv->division.$inv->amount.$inv->due_date.$inv->status.$inv->previous_hash;
            $expectedHash = hash('sha256', $expectedData);

            if ($inv->hash !== $expectedHash) {
                $isValid = false;
                $tamperedInvoices[] = $inv->invoice_no.' (Data dimodifikasi: hash tidak valid)';
            }

            $prevHash = $inv->hash;
        }

        return response()->json([
            'success' => true,
            'is_valid' => $isValid,
            'tampered' => $tamperedInvoices,
            'total_checked' => $invoices->count(),
        ]);
    }

    /**
     * Generate & Download PDF Invoice.
     */
    public function downloadPdf($id)
    {
        $invoice = Invoice::findOrFail($id);

        $pdf = Pdf::loadView('Analytics.invoice_pdf', compact('invoice'));

        return $pdf->download('Invoice-'.$invoice->invoice_no.'.pdf');
    }

    /**
     * Helper to seed initial invoices with valid hash chain.
     */
    private function seedInitialInvoices()
    {
        $initialData = [
            ['invoice_no' => 'INV-2026-001', 'client_name' => 'PT Maju Bersama', 'division' => 'Web Dev', 'amount' => 'Rp 45.000.000', 'due_date' => '2026-06-15', 'status' => 'paid'],
            ['invoice_no' => 'INV-2026-002', 'client_name' => 'CV Kreasi Digital', 'division' => 'Video Prod', 'amount' => 'Rp 28.500.000', 'due_date' => '2026-05-20', 'status' => 'overdue'],
            ['invoice_no' => 'INV-2026-003', 'client_name' => 'Startup Nusantara', 'division' => 'Perf. Ads', 'amount' => 'Rp 15.000.000', 'due_date' => '2026-06-30', 'status' => 'unpaid'],
            ['invoice_no' => 'INV-2026-004', 'client_name' => 'PT Maju Bersama', 'division' => 'Brand Identity', 'amount' => 'Rp 12.000.000', 'due_date' => '2026-06-05', 'status' => 'paid'],
            ['invoice_no' => 'INV-2026-005', 'client_name' => 'Nusantara Global', 'division' => '3D Mockup', 'amount' => 'Rp 35.000.000', 'due_date' => '2026-07-10', 'status' => 'unpaid'],
        ];

        $prevHash = str_repeat('0', 64);

        foreach ($initialData as $data) {
            $dataToHash = $data['invoice_no'].$data['client_name'].$data['division'].$data['amount'].$data['due_date'].$data['status'].$prevHash;
            $hash = hash('sha256', $dataToHash);

            Invoice::create([
                'invoice_no' => $data['invoice_no'],
                'client_name' => $data['client_name'],
                'division' => $data['division'],
                'amount' => $data['amount'],
                'due_date' => $data['due_date'],
                'status' => $data['status'],
                'previous_hash' => $prevHash,
                'hash' => $hash,
            ]);

            $prevHash = $hash;
        }
    }
}
