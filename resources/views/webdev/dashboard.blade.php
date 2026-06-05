@extends('layouts.division-app')

@section('title', 'WebDev Dashboard')
@section('division-name', 'Web Development')
@section('division-color-classes', 'bg-blue-500/10 text-blue-400 border border-blue-500/20')
@section('page-title', 'Operational Console')

@section('content')
<div class="space-y-6">
    <!-- WebDev Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="glass rounded-xl p-5 flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Monitored Web Projects</span>
                <h3 class="text-3xl font-bold text-slate-100 mt-1">14</h3>
                <p class="text-xs text-slate-500 mt-1">Across 4 shared VPS servers</p>
            </div>
            <div class="w-12 h-12 bg-blue-500/10 text-blue-400 rounded-lg flex items-center justify-center border border-blue-500/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
        </div>

        <div class="glass rounded-xl p-5 flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Subdomains Created</span>
                <h3 class="text-3xl font-bold text-slate-100 mt-1">38</h3>
                <p class="text-xs text-emerald-400 mt-1">Automated cPanel sync: <strong class="font-normal">Online</strong></p>
            </div>
            <div class="w-12 h-12 bg-indigo-500/10 text-indigo-400 rounded-lg flex items-center justify-center border border-indigo-500/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
        </div>

        <div class="glass rounded-xl p-5 flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Domain Renewals Due</span>
                <h3 class="text-3xl font-bold text-slate-100 mt-1">2</h3>
                <p class="text-xs text-rose-400 mt-1 font-semibold">Action needed within 30 days</p>
            </div>
            <div class="w-12 h-12 bg-rose-500/10 text-rose-400 rounded-lg flex items-center justify-center border border-rose-500/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
    </div>

    <!-- Active Projects Table -->
    <div class="glass rounded-xl p-6 space-y-4">
        <div class="flex items-center justify-between">
            <h3 class="text-base font-bold text-slate-200 uppercase tracking-wider">Client Websites List</h3>
            <button class="bg-blue-600 hover:bg-blue-500 text-white font-medium text-xs px-3.5 py-1.5 rounded-lg transition-colors border border-blue-500/30">
                + Create New Project
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm divide-y divide-slate-800">
                <thead>
                    <tr class="text-xs font-bold text-slate-400 uppercase tracking-widest pb-3">
                        <th class="py-3">Website Name</th>
                        <th class="py-3">Domain</th>
                        <th class="py-3">cPanel User</th>
                        <th class="py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    <tr>
                        <td class="py-4 font-semibold text-slate-200">John Doe Corp Landing</td>
                        <td class="py-4 font-mono text-xs text-blue-400">johndoecorp.com</td>
                        <td class="py-4 font-mono text-xs text-slate-400">johndoe_web</td>
                        <td class="py-4">
                            <span class="px-2 py-0.5 text-[10px] font-bold rounded bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-4 font-semibold text-slate-200">Akira Studios Portfolio</td>
                        <td class="py-4 font-mono text-xs text-blue-400">akirastudios.com</td>
                        <td class="py-4 font-mono text-xs text-slate-400">akira_studio</td>
                        <td class="py-4">
                            <span class="px-2 py-0.5 text-[10px] font-bold rounded bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Active</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
