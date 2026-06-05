@extends('layouts.superadmin-app')

@section('title', 'Super Admin Dashboard')
@section('page-title', 'Overview Console')

@section('content')
<div class="space-y-6">
    <!-- Quick Status Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1: Total Leads -->
        <div class="glass rounded-xl p-5 shadow-lg flex items-center justify-between transition-transform duration-300 hover:scale-[1.02]">
            <div>
                <span class="text-xs font-semibold text-slate-400 tracking-wider uppercase">Active Projects</span>
                <h3 class="text-3xl font-bold text-slate-100 mt-1">42</h3>
                <span class="text-xs text-emerald-400 font-medium mt-1 inline-flex items-center">&uarr; 12.5% <span class="text-slate-500 ml-1">vs last week</span></span>
            </div>
            <div class="w-12 h-12 bg-indigo-500/10 text-indigo-400 rounded-lg flex items-center justify-center border border-indigo-500/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            </div>
        </div>

        <!-- Card 2: Revenue -->
        <div class="glass rounded-xl p-5 shadow-lg flex items-center justify-between transition-transform duration-300 hover:scale-[1.02]">
            <div>
                <span class="text-xs font-semibold text-slate-400 tracking-wider uppercase">Monthly Revenue</span>
                <h3 class="text-3xl font-bold text-slate-100 mt-1">Rp 148.5M</h3>
                <span class="text-xs text-emerald-400 font-medium mt-1 inline-flex items-center">&uarr; 8.2% <span class="text-slate-500 ml-1">vs last month</span></span>
            </div>
            <div class="w-12 h-12 bg-emerald-500/10 text-emerald-400 rounded-lg flex items-center justify-center border border-emerald-500/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>

        <!-- Card 3: Total Clients -->
        <div class="glass rounded-xl p-5 shadow-lg flex items-center justify-between transition-transform duration-300 hover:scale-[1.02]">
            <div>
                <span class="text-xs font-semibold text-slate-400 tracking-wider uppercase">Global Clients</span>
                <h3 class="text-3xl font-bold text-slate-100 mt-1">1,208</h3>
                <span class="text-xs text-slate-500 font-medium mt-1 block">Active across 6 divisions</span>
            </div>
            <div class="w-12 h-12 bg-blue-500/10 text-blue-400 rounded-lg flex items-center justify-center border border-blue-500/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
        </div>

        <!-- Card 4: Critical Alerts -->
        <div class="glass rounded-xl p-5 shadow-lg flex items-center justify-between transition-transform duration-300 hover:scale-[1.02]">
            <div>
                <span class="text-xs font-semibold text-slate-400 tracking-wider uppercase">System Alerts</span>
                <h3 class="text-3xl font-bold text-slate-100 mt-1">2</h3>
                <span class="text-xs text-rose-400 font-medium mt-1 inline-flex items-center">Requires attention</span>
            </div>
            <div class="w-12 h-12 bg-rose-500/10 text-rose-400 rounded-lg flex items-center justify-center border border-rose-500/20 animate-pulse">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
        </div>
    </div>

    <!-- Divisions Operational Hub -->
    <div class="space-y-4">
        <h3 class="text-lg font-bold text-slate-200 uppercase tracking-wider">Division Management Panel</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- 1. Web Development -->
            <div class="glass rounded-xl p-6 relative overflow-hidden transition-all duration-300 hover:bg-slate-800/40 hover:-translate-y-1 group">
                <div class="absolute top-0 right-0 w-24 h-24 bg-blue-500/5 rounded-full blur-2xl group-hover:bg-blue-500/10 transition-colors"></div>
                <div class="flex items-start justify-between">
                    <span class="px-2 py-0.5 text-[10px] font-bold tracking-wider rounded bg-blue-500/10 text-blue-400 border border-blue-500/20 uppercase">WebDev</span>
                    <span class="text-[10px] text-slate-500 font-mono">web.dnb.com</span>
                </div>
                <h4 class="text-xl font-bold text-slate-100 mt-4">Jasa Buat Website</h4>
                <p class="text-xs text-slate-400 mt-2 line-clamp-2">Technical Infrastructure, VPS monitoring, cPanel automation, & customer website deployment metrics.</p>
                <div class="mt-6 flex items-center justify-between border-t border-slate-800/80 pt-4">
                    <div class="text-xs text-slate-500">
                        Active Projects: <span class="text-slate-300 font-semibold">14</span>
                    </div>
                    <a href="#" class="text-xs font-semibold text-blue-400 hover:text-blue-300 transition-colors">Configure &rarr;</a>
                </div>
            </div>

            <!-- 2. Brand Identity -->
            <div class="glass rounded-xl p-6 relative overflow-hidden transition-all duration-300 hover:bg-slate-800/40 hover:-translate-y-1 group">
                <div class="absolute top-0 right-0 w-24 h-24 bg-purple-500/5 rounded-full blur-2xl group-hover:bg-purple-500/10 transition-colors"></div>
                <div class="flex items-start justify-between">
                    <span class="px-2 py-0.5 text-[10px] font-bold tracking-wider rounded bg-purple-500/10 text-purple-400 border border-purple-500/20 uppercase">Brand</span>
                    <span class="text-[10px] text-slate-500 font-mono">logo.dnb.com</span>
                </div>
                <h4 class="text-xl font-bold text-slate-100 mt-4">Jasa Buat Logo</h4>
                <p class="text-xs text-slate-400 mt-2 line-clamp-2">Visual design handovers, logo revision tracking tokens, client asset vault storage quotas.</p>
                <div class="mt-6 flex items-center justify-between border-t border-slate-800/80 pt-4">
                    <div class="text-xs text-slate-500">
                        Active Projects: <span class="text-slate-300 font-semibold">8</span>
                    </div>
                    <a href="#" class="text-xs font-semibold text-purple-400 hover:text-purple-300 transition-colors">Configure &rarr;</a>
                </div>
            </div>

            <!-- 3. Performance Ads -->
            <div class="glass rounded-xl p-6 relative overflow-hidden transition-all duration-300 hover:bg-slate-800/40 hover:-translate-y-1 group">
                <div class="absolute top-0 right-0 w-24 h-24 bg-emerald-500/5 rounded-full blur-2xl group-hover:bg-emerald-500/10 transition-colors"></div>
                <div class="flex items-start justify-between">
                    <span class="px-2 py-0.5 text-[10px] font-bold tracking-wider rounded bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 uppercase">Ads</span>
                    <span class="text-[10px] text-slate-500 font-mono">ads.dnb.com</span>
                </div>
                <h4 class="text-xl font-bold text-slate-100 mt-4">Jasa Advertising</h4>
                <p class="text-xs text-slate-400 mt-2 line-clamp-2">Performance marketing, Facebook/Google Ads API syncing, real-time ROI tracking.</p>
                <div class="mt-6 flex items-center justify-between border-t border-slate-800/80 pt-4">
                    <div class="text-xs text-slate-500">
                        Active Campaigns: <span class="text-slate-300 font-semibold">9</span>
                    </div>
                    <a href="#" class="text-xs font-semibold text-emerald-400 hover:text-emerald-300 transition-colors">Configure &rarr;</a>
                </div>
            </div>

            <!-- 4. Jasa 3D Arsitek & Mockup -->
            <div class="glass rounded-xl p-6 relative overflow-hidden transition-all duration-300 hover:bg-slate-800/40 hover:-translate-y-1 group">
                <div class="absolute top-0 right-0 w-24 h-24 bg-amber-500/5 rounded-full blur-2xl group-hover:bg-amber-500/10 transition-colors"></div>
                <div class="flex items-start justify-between">
                    <span class="px-2 py-0.5 text-[10px] font-bold tracking-wider rounded bg-amber-500/10 text-amber-400 border border-amber-500/20 uppercase">3D & CAD</span>
                    <span class="text-[10px] text-slate-500 font-mono">mockup.dnb.com</span>
                </div>
                <h4 class="text-xl font-bold text-slate-100 mt-4">3D Arsitek & Mockup</h4>
                <p class="text-xs text-slate-400 mt-2 line-clamp-2">Spatial and product renderings, heavy media uploads monitor, client online viewing links.</p>
                <div class="mt-6 flex items-center justify-between border-t border-slate-800/80 pt-4">
                    <div class="text-xs text-slate-500">
                        Active Models: <span class="text-slate-300 font-semibold">5</span>
                    </div>
                    <a href="#" class="text-xs font-semibold text-amber-400 hover:text-amber-300 transition-colors">Configure &rarr;</a>
                </div>
            </div>

            <!-- 5. Social Media Management -->
            <div class="glass rounded-xl p-6 relative overflow-hidden transition-all duration-300 hover:bg-slate-800/40 hover:-translate-y-1 group">
                <div class="absolute top-0 right-0 w-24 h-24 bg-pink-500/5 rounded-full blur-2xl group-hover:bg-pink-500/10 transition-colors"></div>
                <div class="flex items-start justify-between">
                    <span class="px-2 py-0.5 text-[10px] font-bold tracking-wider rounded bg-pink-500/10 text-pink-400 border border-pink-500/20 uppercase">Social</span>
                    <span class="text-[10px] text-slate-500 font-mono">social.dnb.com</span>
                </div>
                <h4 class="text-xl font-bold text-slate-100 mt-4">Social Media Mgt</h4>
                <p class="text-xs text-slate-400 mt-2 line-clamp-2">Content schedules, posts templates, social accounts analytics overview.</p>
                <div class="mt-6 flex items-center justify-between border-t border-slate-800/80 pt-4">
                    <div class="text-xs text-slate-500">
                        Managed Brands: <span class="text-slate-300 font-semibold">6</span>
                    </div>
                    <a href="#" class="text-xs font-semibold text-pink-400 hover:text-pink-300 transition-colors">Configure &rarr;</a>
                </div>
            </div>

            <!-- 6. Video Production & Motion -->
            <div class="glass rounded-xl p-6 relative overflow-hidden transition-all duration-300 hover:bg-slate-800/40 hover:-translate-y-1 group">
                <div class="absolute top-0 right-0 w-24 h-24 bg-rose-500/5 rounded-full blur-2xl group-hover:bg-rose-500/10 transition-colors"></div>
                <div class="flex items-start justify-between">
                    <span class="px-2 py-0.5 text-[10px] font-bold tracking-wider rounded bg-rose-500/10 text-rose-400 border border-rose-500/20 uppercase">Video</span>
                    <span class="text-[10px] text-slate-500 font-mono">video.dnb.com</span>
                </div>
                <h4 class="text-xl font-bold text-slate-100 mt-4">Video Production & Motion</h4>
                <p class="text-xs text-slate-400 mt-2 line-clamp-2">Cinematic asset handovers, NAS storage telemetry monitor, rendering tasks pipelines.</p>
                <div class="mt-6 flex items-center justify-between border-t border-slate-800/80 pt-4">
                    <div class="text-xs text-slate-500">
                        Active Video Projects: <span class="text-slate-300 font-semibold">12</span>
                    </div>
                    <a href="#" class="text-xs font-semibold text-rose-400 hover:text-rose-300 transition-colors">Configure &rarr;</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Telemetry & Recent Alerts -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Infrastructure Monitor -->
        <div class="glass rounded-xl p-6 lg:col-span-2 space-y-4">
            <h3 class="text-sm font-bold text-slate-200 uppercase tracking-widest">Active Server Infrastructure</h3>
            <div class="space-y-3">
                <div class="flex items-center justify-between bg-slate-950/30 p-3 rounded-lg border border-slate-800/50">
                    <div class="flex items-center space-x-3">
                        <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-ping"></span>
                        <span class="text-sm font-medium text-slate-300">Primary VPS hosting (Hetzner)</span>
                    </div>
                    <span class="text-xs text-slate-400 font-mono">CPU: 28% | RAM: 64%</span>
                </div>
                <div class="flex items-center justify-between bg-slate-950/30 p-3 rounded-lg border border-slate-800/50">
                    <div class="flex items-center space-x-3">
                        <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-ping"></span>
                        <span class="text-sm font-medium text-slate-300">Dedicated NAS storage server</span>
                    </div>
                    <span class="text-xs text-slate-400 font-mono">NAS Space: 14.8TB Free (82%)</span>
                </div>
                <div class="flex items-center justify-between bg-slate-950/30 p-3 rounded-lg border border-slate-800/50">
                    <div class="flex items-center space-x-3">
                        <span class="w-2.5 h-2.5 bg-amber-500 rounded-full"></span>
                        <span class="text-sm font-medium text-slate-300">Mail relay gateway</span>
                    </div>
                    <span class="text-xs text-amber-400 font-mono">Delivery delay detected</span>
                </div>
            </div>
        </div>

        <!-- Alert Log -->
        <div class="glass rounded-xl p-6 space-y-4">
            <h3 class="text-sm font-bold text-slate-200 uppercase tracking-widest">Recent Critical Logs</h3>
            <div class="space-y-3">
                <div class="flex space-x-3 text-xs bg-rose-500/5 border border-rose-500/10 p-2.5 rounded-lg">
                    <span class="text-rose-400 font-bold uppercase shrink-0">WebDev</span>
                    <p class="text-slate-300">Domain <span class="font-mono text-slate-200 text-[11px]">projectx.com</span> fails auto-renew. DNS timeout.</p>
                </div>
                <div class="flex space-x-3 text-xs bg-rose-500/5 border border-rose-500/10 p-2.5 rounded-lg">
                    <span class="text-rose-400 font-bold uppercase shrink-0">Video</span>
                    <p class="text-slate-300">NAS disk sector warning on Node B.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
