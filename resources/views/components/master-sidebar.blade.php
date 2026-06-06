@props(['role' => 'superadmin', 'division' => null])

<aside class="w-64 bg-slate-900 border-r border-slate-800 flex flex-col h-full z-20 shrink-0">
    <!-- Brand / Logo Header -->
    <div class="px-6 py-5 border-b border-slate-800/80 flex items-center justify-between">
        <div class="flex flex-col">
            <h1 class="text-sm font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent tracking-widest uppercase">
                DNB Control
            </h1>
            <span class="text-[10px] text-slate-500 font-semibold tracking-wider mt-0.5 uppercase">
                {{ $role === 'superadmin' ? 'Super Admin Portal' : 'Division Control' }}
            </span>
        </div>
    </div>

    <!-- Navigation Menu Items -->
    <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto">
        @if($role === 'superadmin')
            <!-- Overview Section -->
            <div class="pb-2">
                <span class="px-2 text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-2">Overview</span>
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-slate-300 rounded-md bg-slate-800/60 border border-slate-700/30 shadow-sm transition-all duration-200">
                    <svg class="w-5 h-5 mr-3 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                    Main Dashboard
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-slate-400 hover:text-slate-200 hover:bg-slate-800/40 rounded-md transition-all duration-200 mt-1">
                    <svg class="w-5 h-5 mr-3 text-slate-500 group-hover:text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Master Clients
                </a>
            </div>

            <!-- Divisions Control -->
            <div class="pt-4 border-t border-slate-800/60">
                <span class="px-2 text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-2">Divisions (1-6)</span>
                <!-- Division 1 -->
                <a href="{{ route('webdev.dashboard') }}" class="flex items-center px-3 py-2 text-sm font-medium text-slate-400 hover:text-slate-200 hover:bg-slate-800/40 rounded-md transition-all duration-200">
                    <span class="w-2.5 h-2.5 bg-blue-500 rounded-full mr-3"></span>
                    Web Development
                </a>
                <!-- Division 2 -->
                <a href="{{ route('brandidentity.dashboard') }}" class="flex items-center px-3 py-2 text-sm font-medium text-slate-400 hover:text-slate-200 hover:bg-slate-800/40 rounded-md transition-all duration-200 mt-1">
                    <span class="w-2.5 h-2.5 bg-purple-500 rounded-full mr-3"></span>
                    Brand Identity
                </a>
                <!-- Division 3 -->
                <a href="{{ route('performanceads.dashboard') }}" class="flex items-center px-3 py-2 text-sm font-medium text-slate-400 hover:text-slate-200 hover:bg-slate-800/40 rounded-md transition-all duration-200 mt-1">
                    <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full mr-3"></span>
                    Performance Ads
                </a>
                <!-- Division 4 -->
                <a href="{{ route('mockup3d.dashboard') }}" class="flex items-center px-3 py-2 text-sm font-medium text-slate-400 hover:text-slate-200 hover:bg-slate-800/40 rounded-md transition-all duration-200 mt-1">
                    <span class="w-2.5 h-2.5 bg-amber-500 rounded-full mr-3"></span>
                    3D Mockups & Arsitek
                </a>
                <!-- Division 5 -->
                <a href="{{ route('socialmedia.dashboard') }}" class="flex items-center px-3 py-2 text-sm font-medium text-slate-400 hover:text-slate-200 hover:bg-slate-800/40 rounded-md transition-all duration-200 mt-1">
                    <span class="w-2.5 h-2.5 bg-pink-500 rounded-full mr-3"></span>
                    Social Media Mgt
                </a>
                <!-- Division 6 -->
                <a href="{{ route('design3darsitek.dashboard') }}" class="flex items-center px-3 py-2 text-sm font-medium text-slate-400 hover:text-slate-200 hover:bg-slate-800/40 rounded-md transition-all duration-200 mt-1">
                    <span class="w-2.5 h-2.5 bg-rose-500 rounded-full mr-3 animate-pulse"></span>
                    Design 3D & Arsitek <span class="ml-auto text-[9px] bg-rose-500/20 text-rose-400 px-1.5 py-0.5 rounded font-bold uppercase tracking-wider">New</span>
                </a>
            </div>
        @else
            <!-- Division Specific Navigation -->
            @if($division === 'webdev')
                <div class="pb-2">
                    <span class="px-2 text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-2">Webdev Console</span>
                    <a href="{{ route('webdev.dashboard') }}" class="flex items-center px-3 py-2 text-sm font-medium {{ request()->routeIs('webdev.dashboard') ? 'text-slate-200 bg-slate-800/60 border border-slate-700/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/40' }} rounded-md transition-all duration-200">
                        Overview Dashboard
                    </a>
                    <a href="{{ route('webdev.kanban') }}" class="flex items-center px-3 py-2 text-sm font-medium {{ request()->routeIs('webdev.kanban') ? 'text-slate-200 bg-slate-800/60 border border-slate-700/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/40' }} rounded-md transition-all duration-200 mt-1">
                        Kanban Workboard
                    </a>
                    <a href="{{ route('webdev.templates.index') }}" class="flex items-center px-3 py-2 text-sm font-medium {{ request()->routeIs('webdev.templates.*') ? 'text-slate-200 bg-slate-800/60 border border-slate-700/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/40' }} rounded-md transition-all duration-200 mt-1">
                        Template Control
                    </a>
                    <a href="{{ route('webdev.packages.index') }}" class="flex items-center px-3 py-2 text-sm font-medium {{ request()->routeIs('webdev.packages.*') ? 'text-slate-200 bg-slate-800/60 border border-slate-700/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/40' }} rounded-md transition-all duration-200 mt-1">
                        Package Control
                    </a>
                    <a href="{{ route('webdev.reviews.index') }}" class="flex items-center px-3 py-2 text-sm font-medium {{ request()->routeIs('webdev.reviews.*') ? 'text-slate-200 bg-slate-800/60 border border-slate-700/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/40' }} rounded-md transition-all duration-200 mt-1">
                        Review Control
                    </a>
                    <a href="{{ route('webdev.chat.index') }}" class="flex items-center px-3 py-2 text-sm font-medium {{ request()->routeIs('webdev.chat.*') ? 'text-slate-200 bg-slate-800/60 border border-slate-700/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/40' }} rounded-md transition-all duration-200 mt-1">
                        Live Chat
                    </a>
                </div>
            @else
                <div class="pb-2">
                    <span class="px-2 text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-2">{{ ucfirst($division) }} Console</span>
                    <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-slate-300 rounded-md bg-slate-800/60 border border-slate-700/30 transition-all duration-200">
                        Overview Dashboard
                    </a>
                </div>
            @endif

            <div class="pt-4 border-t border-slate-800/60">
                <a href="{{ url('/') }}" class="flex items-center px-3 py-2 text-sm font-medium text-indigo-400 hover:text-indigo-300 hover:bg-slate-800/30 rounded-md transition-all duration-200">
                    &larr; Back to Super Admin
                </a>
            </div>
        @endif
    </nav>

    <!-- Footer Profile Info -->
    <div class="p-4 border-t border-slate-800/80 bg-slate-950/45">
        <div class="flex items-center space-x-3">
            <div class="w-9 h-9 rounded-full bg-slate-800 flex items-center justify-center font-bold text-xs text-slate-400">
                DNB
            </div>
            <div class="flex flex-col min-w-0">
                <span class="text-xs font-semibold text-slate-300 truncate">Digital Networks</span>
                <span class="text-[10px] text-slate-500 truncate">Central Console</span>
            </div>
        </div>
    </div>
</aside>
