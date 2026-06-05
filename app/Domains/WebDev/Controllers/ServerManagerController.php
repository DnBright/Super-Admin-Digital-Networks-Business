<?php

namespace App\Domains\WebDev\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\WebDev\Models\WebTemplate;
use App\Domains\WebDev\Models\WebPackage;
use App\Domains\WebDev\Models\WebReview;
use App\Domains\WebDev\Models\WebChatMessage;

class ServerManagerController extends Controller
{
    public function index()
    {
        $stats = [
            'total_templates' => WebTemplate::count(),
            'total_packages' => WebPackage::count(),
            'total_reviews' => WebReview::count(),
            'pending_reviews' => WebReview::where('is_approved', false)->count(),
            'unread_chats' => WebChatMessage::where('is_from_admin', false)->where('is_read', false)->count(),
        ];

        $templates = WebTemplate::orderBy('created_at', 'desc')->take(5)->get();

        return view('Divisions.webdev.dashboard', compact('stats', 'templates'));
    }

    public function kanban()
    {
        return view('Divisions.webdev.kanban-board');
    }
}
