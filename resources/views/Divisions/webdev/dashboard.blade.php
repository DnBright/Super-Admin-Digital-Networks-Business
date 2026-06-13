@php
    $stats = $stats ?? ['total_templates' => 0, 'total_packages' => 0, 'total_reviews' => 0, 'pending_reviews' => 0, 'unread_chats' => 0];
    $templates = $templates ?? collect();
@endphp

<div x-show="currentTab === 'webdev_dashboard'" class="space-y-6" x-cloak>
    <!-- Success Alert -->
    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 p-4 rounded-xl text-sm flex items-center justify-between">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- WebDev Dynamic Quick Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
        <!-- Stat 1: Templates -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Active Templates</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">{{ $stats['total_templates'] }}</h3>
                <p class="text-xs text-slate-500 mt-2">Ready for UMKM preview</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-laptop-code text-blue-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 2: Packages -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Pricing Plans</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">{{ $stats['total_packages'] }}</h3>
                <p class="text-xs text-slate-500 mt-2">Cicilan support enabled</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-indigo-50 border border-indigo-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-tags text-indigo-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 3: Reviews -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">User Reviews</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">{{ $stats['total_reviews'] }}</h3>
                <p class="text-xs text-amber-600 font-semibold mt-2">
                    {{ $stats['pending_reviews'] }} pending approval
                </p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-amber-50 border border-amber-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-star text-amber-550 text-sm"></i>
            </div>
        </div>

        <!-- Stat 4: Chat queue -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Unread Chats</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">{{ $stats['unread_chats'] }}</h3>
                <p class="text-xs text-rose-650 font-semibold mt-2">Requires fast reply</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-rose-50 border border-rose-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-comments text-rose-500 text-sm"></i>
            </div>
        </div>
    </div>

    <!-- Website Control Portal Shortcuts & Database Connections Info -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- DB Connections Info -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-card p-6 space-y-4">
            <h3 class="text-[13px] font-bold text-slate-850 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Web-Dev Cross Database Nodes
            </h3>
            <p class="text-xs text-slate-500 leading-relaxed">
                Super Admin terhubung langsung ke database SQLite proyek **JasaBuatWebsite**. Perubahan apa pun pada template, paket harga, atau chat balasan di panel ini akan langsung termanifestasi secara real-time pada landing page utama.
            </p>
            <div class="bg-slate-50 border border-slate-200 p-3.5 rounded-lg space-y-2 text-xs font-mono text-slate-600">
                <div class="flex justify-between">
                    <span>Active Connection:</span>
                    <span class="text-brand-600 font-bold">webdev</span>
                </div>
                <div class="flex justify-between">
                    <span>Driver Type:</span>
                    <span class="text-slate-700 font-bold">SQLite PDO</span>
                </div>
                <div class="flex justify-between">
                    <span>Target DB File:</span>
                    <span class="text-slate-700 font-bold select-all">database.sqlite</span>
                </div>
            </div>
        </div>

        <!-- System Administration links -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-card p-6 flex flex-col justify-between">
            <h3 class="text-[13px] font-bold text-slate-850">Admin Quick Shortcuts</h3>
            <div class="grid grid-cols-2 gap-4 mt-4">
                <a href="{{ route('webdev.templates.index') }}" class="flex items-center gap-3 p-3.5 bg-slate-50 hover:bg-slate-100/80 border border-slate-200 rounded-xl text-xs font-bold text-slate-700 transition-colors shadow-sm">
                    <span class="p-1.5 bg-blue-50 text-blue-500 rounded-lg border border-blue-100"><i class="fa-solid fa-palette text-xs"></i></span>
                    Manage Templates
                </a>
                <a href="{{ route('webdev.packages.index') }}" class="flex items-center gap-3 p-3.5 bg-slate-50 hover:bg-slate-100/80 border border-slate-200 rounded-xl text-xs font-bold text-slate-700 transition-colors shadow-sm">
                    <span class="p-1.5 bg-indigo-50 text-indigo-500 rounded-lg border border-indigo-100"><i class="fa-solid fa-tags text-xs"></i></span>
                    Adjust Prices
                </a>
                <a href="{{ route('webdev.reviews.index') }}" class="flex items-center gap-3 p-3.5 bg-slate-50 hover:bg-slate-100/80 border border-slate-200 rounded-xl text-xs font-bold text-slate-700 transition-colors shadow-sm">
                    <span class="p-1.5 bg-amber-50 text-amber-500 rounded-lg border border-amber-100"><i class="fa-solid fa-star text-xs"></i></span>
                    Client Reviews
                </a>
                <a href="{{ route('webdev.chat.index') }}" class="flex items-center gap-3 p-3.5 bg-slate-50 hover:bg-slate-100/80 border border-slate-200 rounded-xl text-xs font-bold text-slate-700 transition-colors shadow-sm">
                    <span class="p-1.5 bg-rose-50 text-rose-500 rounded-lg border border-rose-100"><i class="fa-solid fa-comments text-xs"></i></span>
                    Live Chat Messages
                </a>
            </div>
        </div>
    </div>

    <!-- Active Templates Table -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-card overflow-hidden">
        <!-- Header -->
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
            <div class="flex items-center gap-3">
                <div class="w-7 h-7 rounded-lg bg-slate-900 flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-images text-white text-xs"></i>
                </div>
                <div>
                    <h2 class="text-[13px] font-bold text-slate-850">JasaBuatWebsite Design Templates</h2>
                    <p class="text-[11px] text-slate-400">Daftar desain web yang aktif di landing page</p>
                </div>
            </div>
            <a href="{{ route('webdev.templates.index') }}" class="text-[11px] font-medium text-slate-650 hover:text-slate-800 bg-slate-50 border border-slate-200 px-3 py-1.5 rounded-lg hover:bg-slate-100 transition-colors flex items-center gap-1.5">
                <i class="fa-solid fa-plus text-[10px]"></i>Add Template
            </a>
        </div>

        <!-- Table Content -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-[10px] font-bold uppercase tracking-widest text-slate-400">
                        <th class="px-5 py-3">Thumbnail</th>
                        <th class="px-4 py-3">Template Name</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Rating</th>
                        <th class="px-5 py-3 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($templates as $template)
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3">
                                <img src="/Users/mac/Project Website/Kerja/PT. Gro/jasabuatwebsite/public/{{ $template->image }}" 
                                     alt="{{ $template->name }}" 
                                     class="w-12 h-9 object-cover rounded-lg border border-slate-200 shadow-sm"
                                     onerror="this.src='{{ asset($template->image) }}'">
                            </td>
                            <td class="px-4 py-3 font-semibold text-slate-800">{{ $template->name }}</td>
                            <td class="px-4 py-3 font-mono text-[11px] text-slate-500">{{ $template->category }}</td>
                            <td class="px-4 py-3">
                                <span class="flex items-center text-amber-550 gap-1 text-xs font-bold">
                                    ⭐ {{ $template->rating }}
                                    <span class="text-slate-400 font-normal">({{ $template->reviews_count }} reviews)</span>
                                </span>
                            </td>
                            <td class="px-5 py-3 text-right">
                                <a href="{{ route('webdev.templates.index') }}" class="inline-flex items-center gap-1 text-[11px] font-medium text-brand-600 hover:text-brand-700 hover:underline">
                                    Manage <i class="fa-solid fa-arrow-right text-[9px]"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-8 text-center text-slate-450 text-xs font-medium bg-slate-50/10">No templates found in JasaBuatWebsite DB.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
