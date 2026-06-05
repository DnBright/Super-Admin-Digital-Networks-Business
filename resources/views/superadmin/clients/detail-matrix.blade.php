@extends('layouts.superadmin-app')

@section('title', 'Client Detail Matrix')
@section('page-title', 'Client Activity Matrix')

@section('content')
<div class="space-y-6">
    <!-- Client Header Card -->
    <div class="glass rounded-xl p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div class="flex items-center space-x-4">
            <div class="w-16 h-16 rounded-full bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 flex items-center justify-center font-bold text-2xl shadow-inner">
                JD
            </div>
            <div>
                <h3 class="text-2xl font-bold text-slate-100">John Doe Corp</h3>
                <p class="text-sm text-slate-400">Account ID: <span class="font-mono text-slate-300">ACC-2026-9901</span> | Registered on June 1, 2026</p>
            </div>
        </div>
        <div class="flex items-center space-x-3">
            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Active status</span>
            <button class="bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 font-medium text-sm px-4 py-2 rounded-lg transition-colors">
                Edit profile
            </button>
        </div>
    </div>

    <!-- 6 Divisions Connection Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Division status details -->
        <div class="lg:col-span-2 space-y-6">
            <h4 class="text-base font-bold text-slate-200 uppercase tracking-wider">Operational Matrix across Divisions</h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Web Development Division -->
                <div class="bg-slate-900/60 border border-slate-800 p-5 rounded-xl space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-blue-400 uppercase tracking-wider">Webdev Division</span>
                        <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Live</span>
                    </div>
                    <div class="space-y-1">
                        <h5 class="font-bold text-slate-200 text-base">Corporate Landing Page</h5>
                        <p class="text-xs text-slate-400 font-mono">domain: johndoecorp.com</p>
                    </div>
                    <div class="text-xs text-slate-400 pt-2 border-t border-slate-800 flex justify-between">
                        <span>SSL Expires: <strong class="text-slate-300">180 Days</strong></span>
                        <span>Uptime: <strong class="text-emerald-400">99.9%</strong></span>
                    </div>
                </div>

                <!-- Brand Identity Division -->
                <div class="bg-slate-900/60 border border-slate-800 p-5 rounded-xl space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-purple-400 uppercase tracking-wider">Brand Identity</span>
                        <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Delivered</span>
                    </div>
                    <div class="space-y-1">
                        <h5 class="font-bold text-slate-200 text-base">Rebranding Package</h5>
                        <p class="text-xs text-slate-400">Logos, colors, custom presentation templates.</p>
                    </div>
                    <div class="text-xs text-slate-400 pt-2 border-t border-slate-800 flex justify-between">
                        <span>Revisions: <strong class="text-slate-300">2 / 3 Limit</strong></span>
                        <span>Revision token: <strong class="font-mono text-slate-300">active</strong></span>
                    </div>
                </div>

                <!-- Performance Ads -->
                <div class="bg-slate-900/60 border border-slate-800 p-5 rounded-xl space-y-3 opacity-60">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Performance Ads</span>
                        <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-slate-800 text-slate-500 border border-slate-700">Inactive</span>
                    </div>
                    <div class="space-y-1">
                        <h5 class="font-bold text-slate-400 text-base">No Active Campaign</h5>
                        <p class="text-xs text-slate-500">Facebook/Google advertising accounts not linked.</p>
                    </div>
                </div>

                <!-- Video Production -->
                <div class="bg-slate-900/60 border border-slate-800 p-5 rounded-xl space-y-3 opacity-60">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Video Production</span>
                        <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-slate-800 text-slate-500 border border-slate-700">Inactive</span>
                    </div>
                    <div class="space-y-1">
                        <h5 class="font-bold text-slate-400 text-base">No Active Production</h5>
                        <p class="text-xs text-slate-500">NAS raw storage folders not configured.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Global Activity & Client Info -->
        <div class="space-y-6">
            <div class="glass rounded-xl p-5 space-y-4">
                <h4 class="text-sm font-bold text-slate-200 uppercase tracking-wider">Account Information</h4>
                <div class="space-y-3 text-xs">
                    <div>
                        <span class="text-slate-500 block">Primary Contact</span>
                        <span class="text-slate-200 font-semibold">John Doe (CEO)</span>
                    </div>
                    <div>
                        <span class="text-slate-500 block">Billing Email</span>
                        <span class="text-slate-200 font-semibold font-mono">billing@johndoecorp.com</span>
                    </div>
                    <div>
                        <span class="text-slate-500 block">Assigned Account Manager</span>
                        <span class="text-slate-200 font-semibold">Sarah Connor (WebDev)</span>
                    </div>
                </div>
            </div>

            <div class="glass rounded-xl p-5 space-y-4">
                <h4 class="text-sm font-bold text-slate-200 uppercase tracking-wider">System Event Stream</h4>
                <div class="space-y-3 text-xs">
                    <div class="border-l-2 border-indigo-500 pl-3">
                        <p class="text-slate-300">Client accessed mockup portal via Magic Link.</p>
                        <span class="text-[10px] text-slate-500 font-mono">10 minutes ago</span>
                    </div>
                    <div class="border-l-2 border-green-500 pl-3">
                        <p class="text-slate-300">Invoice #INV-2026-003 fully paid (Rp 15M).</p>
                        <span class="text-[10px] text-slate-500 font-mono">2 hours ago</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
