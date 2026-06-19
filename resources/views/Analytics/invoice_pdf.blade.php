<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice {{ $invoice->invoice_no }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 10px;
            font-size: 13px;
            line-height: 1.5;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
        }
        .header {
            border-bottom: 2px solid #3b82f6;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .logo-title {
            font-size: 24px;
            font-weight: bold;
            color: #1e293b;
            letter-spacing: 1px;
            margin: 0;
        }
        .logo-sub {
            font-size: 9px;
            font-weight: bold;
            background-color: #3b82f6;
            color: white;
            padding: 2px 6px;
            border-radius: 3px;
            display: inline-block;
            margin-top: 5px;
        }
        .company-details {
            text-align: right;
            font-size: 11px;
            color: #64748b;
        }
        .meta-table {
            width: 100%;
            margin-bottom: 30px;
            border-collapse: collapse;
        }
        .meta-table td {
            padding: 4px 0;
            vertical-align: top;
        }
        .billing-title {
            font-size: 11px;
            font-weight: bold;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }
        .item-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .item-table th {
            background-color: #f8fafc;
            border-bottom: 2px solid #e2e8f0;
            color: #475569;
            font-weight: bold;
            padding: 10px;
            font-size: 11px;
            text-transform: uppercase;
        }
        .item-table td {
            padding: 12px 10px;
            border-bottom: 1px solid #f1f5f9;
        }
        .amount-highlight {
            font-size: 16px;
            font-weight: bold;
            color: #1e3a8a;
        }
        .status-badge {
            display: inline-block;
            padding: 3px 8px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 4px;
        }
        .status-paid {
            background-color: #d1fae5;
            color: #065f46;
        }
        .status-unpaid {
            background-color: #fef3c7;
            color: #92400e;
        }
        .status-overdue {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .blockchain-container {
            background-color: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 8px;
            padding: 15px;
            margin-top: 50px;
        }
        .blockchain-title {
            font-size: 10px;
            font-weight: bold;
            color: #0284c7;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0 0 8px 0;
            display: flex;
            align-items: center;
        }
        .blockchain-hash {
            font-family: 'Courier New', Courier, monospace;
            font-size: 10px;
            color: #475569;
            word-break: break-all;
            margin: 4px 0;
        }
        .footer {
            text-align: center;
            font-size: 11px;
            color: #94a3b8;
            margin-top: 40px;
            border-top: 1px solid #f1f5f9;
            padding-top: 15px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <!-- Header -->
        <table style="width: 100%;" class="header">
            <tr>
                <td>
                    <h1 class="logo-title">DIGITAL NETWORK</h1>
                    <span class="logo-sub">OFFICIAL INVOICE</span>
                </td>
                <td class="company-details">
                    <strong>PT. DnB Agency Platform</strong><br>
                    Command Center Office Suite<br>
                    finance@dnb-agency.com<br>
                    Jakarta, Indonesia
                </td>
            </tr>
        </table>

        <!-- Metadata -->
        <table class="meta-table">
            <tr>
                <td style="width: 50%;">
                    <div class="billing-title">Ditagihkan Kepada:</div>
                    <strong>{{ $invoice->client_name }}</strong><br>
                    Partner Client PT. DnB<br>
                    Division: {{ $invoice->division }}
                </td>
                <td style="width: 50%; text-align: right;">
                    <div class="billing-title">Detail Invoice:</div>
                    <strong>Nomor:</strong> #{{ $invoice->invoice_no }}<br>
                    <strong>Tanggal Tagihan:</strong> {{ $invoice->created_at->format('Y-m-d') }}<br>
                    <strong>Jatuh Tempo:</strong> {{ $invoice->due_date }}
                </td>
            </tr>
        </table>

        <!-- Items Table -->
        <table class="item-table">
            <thead>
                <tr>
                    <th style="width: 60%; text-align: left;">Deskripsi Layanan</th>
                    <th style="width: 20%; text-align: center;">Status</th>
                    <th style="width: 20%; text-align: right;">Total Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: left; vertical-align: middle;">
                        <strong>Penyediaan Jasa Professional Layanan Digital</strong><br>
                        <span style="color: #64748b; font-size: 11px;">Pengembangan sistem terintegrasi pada Divisi {{ $invoice->division }}.</span>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                        <span class="status-badge status-{{ $invoice->status }}">
                            {{ $invoice->status }}
                        </span>
                    </td>
                    <td style="text-align: right; vertical-align: middle;" class="amount-highlight">
                        {{ $invoice->amount }}
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Totals -->
        <table style="width: 100%; border-top: 2px solid #e2e8f0; padding-top: 15px;">
            <tr>
                <td style="width: 60%;"></td>
                <td style="width: 40%;">
                    <table style="width: 100%; font-size: 13px;">
                        <tr>
                            <td style="font-weight: bold; color: #475569; padding: 4px 0;">Subtotal:</td>
                            <td style="text-align: right; font-weight: bold; padding: 4px 0;">{{ $invoice->amount }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; color: #475569; padding: 4px 0;">PPN (0%):</td>
                            <td style="text-align: right; font-weight: bold; padding: 4px 0;">Rp 0</td>
                        </tr>
                        <tr style="border-top: 1px solid #e2e8f0;">
                            <td style="font-weight: bold; font-size: 14px; color: #1e3a8a; padding: 10px 0 0 0;">Total Bayar:</td>
                            <td style="text-align: right; font-weight: bold; font-size: 14px; color: #1e3a8a; padding: 10px 0 0 0;">{{ $invoice->amount }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Blockchain Hash Chain Verification Section -->
        <div class="blockchain-container">
            <h4 class="blockchain-title">🔒 Cryptographic Verification (Blockchain Ledger)</h4>
            <p style="font-size: 11px; color: #64748b; margin: 0 0 8px 0; leading-relaxed;">
                Invoice ini dilindungi oleh rantai enkripsi hash PT. DnB Ledger. Setiap perubahan data pada database akan merusak rantai verifikasi ini.
            </p>
            <div style="font-weight: bold; font-size: 10px; color: #475569; margin-top: 8px;">PREVIOUS BLOCK HASH:</div>
            <div class="blockchain-hash">{{ $invoice->previous_hash }}</div>
            <div style="font-weight: bold; font-size: 10px; color: #475569; margin-top: 8px;">CURRENT RECORD HASH:</div>
            <div class="blockchain-hash" style="color: #0369a1; font-weight: bold;">{{ $invoice->hash }}</div>
        </div>

        <!-- Footer -->
        <div class="footer">
            Terima kasih atas kerja sama dan kepercayaan Anda bersama PT. DnB.<br>
            Dokumen ini sah diterbitkan secara digital oleh Command Center Platform.
        </div>
    </div>
</body>
</html>
