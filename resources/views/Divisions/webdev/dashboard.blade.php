@extends('layouts.division-app')

@section('title', 'WebDev Console')
@section('division-name', 'Web Development')
@section('division-color-classes', 'bg-blue-500/10 text-blue-400 border border-blue-500/20')
@section('page-title', 'Overview Console')

@section('content')
<div class="space-y-6">
    <!-- Success Alert -->
    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 p-4 rounded-xl text-sm flex items-center justify-between">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- WebDev Dynamic Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Stat 1: Templates -->
        <div class="glass rounded-xl p-5 flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Active Templates</span>
                <h3 class="text-3xl font-bold text-slate-100 mt-1">{{ $stats['total_templates'] }}</h3>
                <p class="text-xs text-slate-500 mt-1">Ready for client preview</p>
            </div>
            <div class="w-12 h-12 bg-blue-500/10 text-blue-400 rounded-lg flex items-center justify-center border border-blue-500/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
        </div>

        <!-- Stat 2: Packages -->
        <div class="glass rounded-xl p-5 flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Pricing Plans</span>
                <h3 class="text-3xl font-bold text-slate-100 mt-1">{{ $stats['total_packages'] }}</h3>
                <p class="text-xs text-slate-500 mt-1">Installments support enabled</p>
            </div>
            <div class="w-12 h-12 bg-indigo-500/10 text-indigo-400 rounded-lg flex items-center justify-center border border-indigo-500/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
        </div>

        <!-- Stat 3: Reviews -->
        <div class="glass rounded-xl p-5 flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">User Reviews</span>
                <h3 class="text-3xl font-bold text-slate-100 mt-1">{{ $stats['total_reviews'] }}</h3>
                <p class="text-xs text-amber-400 mt-1">{{ $stats['pending_reviews'] }} pending approval</p>
            </div>
            <div class="w-12 h-12 bg-amber-500/10 text-amber-400 rounded-lg flex items-center justify-center border border-amber-500/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
            </div>
        </div>

        <!-- Stat 4: Chat queue -->
        <div class="glass rounded-xl p-5 flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Unread Chats</span>
                <h3 class="text-3xl font-bold text-slate-100 mt-1">{{ $stats['unread_chats'] }}</h3>
                <p class="text-xs text-rose-400 mt-1">Requires immediate reply</p>
            </div>
            <div class="w-12 h-12 bg-rose-500/10 text-rose-400 rounded-lg flex items-center justify-center border border-rose-500/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
            </div>
        </div>
    </div>

    <!-- Website Control Portal Shortcuts -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- DB Connections Info -->
        <div class="glass rounded-xl p-6 space-y-3">
            <h3 class="text-sm font-bold text-slate-300 uppercase tracking-wider flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Web-Dev Cross Database Nodes
            </h3>
            <p class="text-xs text-slate-400 leading-relaxed">
                Super Admin terhubung langsung ke database SQLite proyek **JasaBuatWebsite**. Perubahan apa pun pada template, paket harga, atau chat balasan di panel ini akan langsung termanifestasi secara real-time pada landing page utama.
            </p>
            <div class="bg-slate-950/40 border border-slate-800 p-3 rounded-lg space-y-2 text-xs font-mono text-slate-400">
                <div class="flex justify-between">
                    <span>Active Connection:</span>
                    <span class="text-indigo-400">webdev</span>
                </div>
                <div class="flex justify-between">
                    <span>Driver Type:</span>
                    <span class="text-indigo-400">SQLite PDO</span>
                </div>
                <div class="flex justify-between">
                    <span>Target DB File:</span>
                    <span class="text-indigo-400 select-all">database.sqlite</span>
                </div>
            </div>
        </div>

        <!-- System Administration links -->
        <div class="glass rounded-xl p-6 flex flex-col justify-between">
            <h3 class="text-sm font-bold text-slate-300 uppercase tracking-wider">Admin Quick Shortcuts</h3>
            <div class="grid grid-cols-2 gap-4 mt-3">
                <a href="{{ route('webdev.templates.index') }}" class="flex items-center gap-3 p-3 bg-slate-800/40 hover:bg-slate-800/80 border border-slate-700/30 rounded-lg text-xs font-semibold text-slate-200 transition-colors">
                    <span class="p-1.5 bg-blue-500/10 text-blue-400 rounded"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg></span>
                    Manage Templates
                </a>
                <a href="{{ route('webdev.packages.index') }}" class="flex items-center gap-3 p-3 bg-slate-800/40 hover:bg-slate-800/80 border border-slate-700/30 rounded-lg text-xs font-semibold text-slate-200 transition-colors">
                    <span class="p-1.5 bg-indigo-500/10 text-indigo-400 rounded"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg></span>
                    Adjust Prices
                </a>
                <a href="{{ route('webdev.reviews.index') }}" class="flex items-center gap-3 p-3 bg-slate-800/40 hover:bg-slate-800/80 border border-slate-700/30 rounded-lg text-xs font-semibold text-slate-200 transition-colors">
                    <span class="p-1.5 bg-amber-500/10 text-amber-400 rounded"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg></span>
                    Client Reviews
                </a>
                <a href="{{ route('webdev.chat.index') }}" class="flex items-center gap-3 p-3 bg-slate-800/40 hover:bg-slate-800/80 border border-slate-700/30 rounded-lg text-xs font-semibold text-slate-200 transition-colors">
                    <span class="p-1.5 bg-rose-500/10 text-rose-400 rounded"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg></span>
                    Live Chat Messages
                </a>
            </div>
        </div>
    </div>

    <!-- Active Projects Table -->
    <div class="glass rounded-xl p-6 space-y-4">
        <div class="flex items-center justify-between">
            <h3 class="text-base font-bold text-slate-200 uppercase tracking-wider">JasaBuatWebsite Design Templates</h3>
            <a href="{{ route('webdev.templates.index') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-semibold text-xs px-3.5 py-1.5 rounded-lg transition-colors border border-blue-500/30 shadow">
                + Add Template
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm divide-y divide-slate-800">
                <thead>
                    <tr class="text-xs font-bold text-slate-400 uppercase tracking-widest pb-3">
                        <th class="py-3">Thumbnail</th>
                        <th class="py-3">Template Name</th>
                        <th class="py-3">Category</th>
                        <th class="py-3">Rating</th>
                        <th class="py-3 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($templates as $template)
                        <tr class="hover:bg-slate-800/20 transition-colors">
                            <td class="py-3.5">
                                <img src="/Users/mac/Project Website/Kerja/jasabuatwebsite/public/{{ $template->image }}" 
                                     alt="{{ $template->name }}" 
                                     class="w-12 h-12 object-cover rounded-lg border border-slate-700/50 onerror-fallback"
                                     onerror="this.src='{{ asset($template->image) }}'">
                            </td>
                            <td class="py-3.5 font-semibold text-slate-200">{{ $template->name }}</td>
                            <td class="py-3.5 font-mono text-xs text-slate-400">{{ $template->category }}</td>
                            <td class="py-3.5">
                                <span class="flex items-center text-amber-400 gap-1 text-xs font-bold">
                                    ⭐ {{ $template->rating }}
                                    <span class="text-slate-500 font-normal">({{ $template->reviews_count }} reviews)</span>
                                </span>
                            </td>
                            <td class="py-3.5 text-right">
                                <a href="{{ route('webdev.templates.index') }}" class="text-xs font-bold text-blue-400 hover:text-blue-300">
                                    Manage &rarr;
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-6 text-center text-slate-500 text-xs font-medium">No templates found in JasaBuatWebsite DB.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
