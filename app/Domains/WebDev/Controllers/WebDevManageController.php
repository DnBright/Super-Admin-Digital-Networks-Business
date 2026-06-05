<?php

namespace App\Domains\WebDev\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\WebDev\Models\WebTemplate;
use App\Domains\WebDev\Models\WebPackage;
use App\Domains\WebDev\Models\WebReview;
use App\Domains\WebDev\Models\WebChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WebDevManageController extends Controller
{
    // ==========================================
    // TEMPLATES CRUD
    // ==========================================
    
    public function templatesIndex()
    {
        $templates = WebTemplate::all();
        return view('index', [
            'tab' => 'webdev_templates',
            'templates' => $templates
        ]);
    }

    public function templatesStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $imagePath = '/images/template_default.png';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = '/Users/mac/Project Website/Kerja/jasabuatwebsite/public/images';
            if (is_dir($destinationPath)) {
                $file->move($destinationPath, $filename);
                $imagePath = '/images/' . $filename;
            }
        }

        WebTemplate::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imagePath,
            'rating' => '5.0',
            'reviews_count' => 0,
            'packages' => [
                'basic' => ['price' => '150.000', 'delivery' => '1 Hari', 'features' => ['Landing Page 1 Halaman', 'Integrasi WhatsApp', 'Hosting 1 Tahun']],
                'standard' => ['price' => '250.000', 'delivery' => '2 Hari', 'features' => ['3 Halaman Utama', 'Galeri Foto Menu', 'Domain .com', 'SSL Aman']],
                'premium' => ['price' => '350.000', 'delivery' => '3 Hari', 'features' => ['Website Full Fitur', 'Booking System WA', 'SEO Google Pro', 'Domain .com']]
            ],
            'reviews' => []
        ]);

        // Clear jasabuatwebsite cache if possible
        @unlink('/Users/mac/Project Website/Kerja/jasabuatwebsite/bootstrap/cache/config.php');
        @unlink('/Users/mac/Project Website/Kerja/jasabuatwebsite/bootstrap/cache/routes.php');

        return redirect()->route('webdev.templates.index')->with('success', 'Template baru berhasil ditambahkan ke JasaBuatWebsite.');
    }

    public function templatesUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $template = WebTemplate::findOrFail($id);
        $data = $request->only('name', 'category', 'description');

        if ($request->hasFile('image')) {
            // Delete old file
            if ($template->image && !str_contains($template->image, 'template_')) {
                $oldPath = '/Users/mac/Project Website/Kerja/jasabuatwebsite/public' . $template->image;
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = '/Users/mac/Project Website/Kerja/jasabuatwebsite/public/images';
            if (is_dir($destinationPath)) {
                $file->move($destinationPath, $filename);
                $data['image'] = '/images/' . $filename;
            }
        }

        $template->update($data);

        return redirect()->route('webdev.templates.index')->with('success', 'Template JasaBuatWebsite berhasil diperbarui.');
    }

    public function templatesDestroy($id)
    {
        $template = WebTemplate::findOrFail($id);
        
        if ($template->image && !str_contains($template->image, 'template_')) {
            $oldPath = '/Users/mac/Project Website/Kerja/jasabuatwebsite/public' . $template->image;
            if (file_exists($oldPath)) {
                @unlink($oldPath);
            }
        }

        $template->delete();

        return redirect()->route('webdev.templates.index')->with('success', 'Template JasaBuatWebsite berhasil dihapus.');
    }

    // ==========================================
    // PACKAGES CRUD
    // ==========================================

    public function packagesIndex()
    {
        $packages = WebPackage::all();
        return view('index', [
            'tab' => 'webdev_packages',
            'packages' => $packages
        ]);
    }

    public function packagesUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'payment_terms' => 'required|string',
            'features' => 'required|array',
        ]);

        $package = WebPackage::findOrFail($id);
        
        $features = array_map(function($f) {
            return ['text' => $f, 'is_active' => true];
        }, $request->features);

        $package->update([
            'name' => $request->name,
            'price' => $request->price,
            'payment_terms' => $request->payment_terms,
            'features' => $features,
            'is_popular' => $request->has('is_popular')
        ]);

        return redirect()->route('webdev.packages.index')->with('success', 'Paket harga JasaBuatWebsite berhasil diperbarui.');
    }

    // ==========================================
    // REVIEWS MANAGEMENT
    // ==========================================

    public function reviewsIndex()
    {
        $reviews = WebReview::with('webTemplate')->get();
        return view('index', [
            'tab' => 'webdev_reviews',
            'reviews' => $reviews
        ]);
    }

    public function reviewsToggle($id)
    {
        $review = WebReview::findOrFail($id);
        $review->is_approved = !$review->is_approved;
        $review->save();

        return redirect()->route('webdev.reviews.index')->with('success', 'Status persetujuan ulasan berhasil diubah.');
    }

    public function reviewsDestroy($id)
    {
        WebReview::findOrFail($id)->delete();
        return redirect()->route('webdev.reviews.index')->with('success', 'Ulasan JasaBuatWebsite berhasil dihapus.');
    }

    // ==========================================
    // LIVE CHAT INBOX
    // ==========================================

    public function chatIndex(Request $request)
    {
        $sessions = WebChatMessage::select('session_id', 'name', 'email_whatsapp')
            ->selectRaw('MAX(created_at) as latest_message_time')
            ->selectRaw('SUM(CASE WHEN is_from_admin = 0 AND is_read = 0 THEN 1 ELSE 0 END) as unread_count')
            ->groupBy('session_id', 'name', 'email_whatsapp')
            ->orderBy('latest_message_time', 'desc')
            ->get();

        foreach ($sessions as $session) {
            $latest = WebChatMessage::where('session_id', $session->session_id)
                ->orderBy('created_at', 'desc')
                ->first();
            $session->latest_message = $latest ? $latest->message : '';
            $session->latest_message_from_admin = $latest ? $latest->is_from_admin : false;
        }

        $activeSessionId = $request->query('session_id');
        $activeMessages = collect();
        $activeSession = null;

        if ($activeSessionId) {
            $activeMessages = WebChatMessage::where('session_id', $activeSessionId)
                ->orderBy('created_at', 'asc')
                ->get();

            WebChatMessage::where('session_id', $activeSessionId)
                ->where('is_from_admin', false)
                ->where('is_read', false)
                ->update(['is_read' => true]);

            $activeSession = $sessions->firstWhere('session_id', $activeSessionId);
            
            if (!$activeSession) {
                $rawSession = WebChatMessage::where('session_id', $activeSessionId)
                    ->orderBy('created_at', 'desc')
                    ->first();
                if ($rawSession) {
                    $activeSession = (object) [
                        'session_id' => $rawSession->session_id,
                        'name' => $rawSession->name,
                        'email_whatsapp' => $rawSession->email_whatsapp,
                        'unread_count' => 0,
                    ];
                }
            }
        } elseif ($sessions->count() > 0) {
            $activeSessionId = $sessions->first()->session_id;
            return redirect()->route('webdev.chat.index', ['session_id' => $activeSessionId]);
        }

        return view('index', [
            'tab' => 'webdev_chat',
            'sessions' => $sessions,
            'activeSessionId' => $activeSessionId,
            'activeMessages' => $activeMessages,
            'activeSession' => $activeSession
        ]);
    }

    public function chatSend(Request $request)
    {
        $request->validate([
            'session_id' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $lastUserMsg = WebChatMessage::where('session_id', $request->session_id)
            ->where('is_from_admin', false)
            ->orderBy('created_at', 'desc')
            ->first();

        WebChatMessage::create([
            'session_id' => $request->session_id,
            'name' => $lastUserMsg ? $lastUserMsg->name : 'Visitor',
            'email_whatsapp' => $lastUserMsg ? $lastUserMsg->email_whatsapp : null,
            'message' => $request->message,
            'is_from_admin' => true,
            'is_read' => false,
        ]);

        return redirect()->route('webdev.chat.index', ['session_id' => $request->session_id])
            ->with('success', 'Balasan Live Chat berhasil terkirim ke website JasaBuatWebsite.');
    }

    public function chatDestroy($sessionId)
    {
        WebChatMessage::where('session_id', $sessionId)->delete();
        return redirect()->route('webdev.chat.index')->with('success', 'Percakapan berhasil dihapus.');
    }
}
