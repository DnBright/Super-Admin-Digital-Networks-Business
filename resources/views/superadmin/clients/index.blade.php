@extends('layouts.superadmin-app')

@section('title', 'Master Clients')
@section('page-title', 'Global Client Directory')

@section('content')
<div class="space-y-6">
    <!-- Search and Actions Bar -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 bg-slate-900/40 p-4 rounded-xl border border-slate-800/80">
        <div class="relative flex-1 max-w-md">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </span>
            <input type="text" placeholder="Search clients by name, email, or division..." class="w-full bg-slate-950 border border-slate-800 rounded-lg pl-10 pr-4 py-2 text-sm text-slate-100 placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-colors">
        </div>
        <div class="flex items-center space-x-3">
            <button class="bg-indigo-600 hover:bg-indigo-500 text-white font-medium text-sm px-4 py-2 rounded-lg transition-colors flex items-center shadow-lg shadow-indigo-600/20">
                <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Register New Client
            </button>
        </div>
    </div>

    <!-- Clients Table -->
    <div class="glass rounded-xl overflow-hidden shadow-xl">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-900/80 text-xs font-bold text-slate-400 uppercase tracking-widest border-b border-slate-800">
                    <th class="px-6 py-4">Client Detail</th>
                    <th class="px-6 py-4">Active Divisions</th>
                    <th class="px-6 py-4">Created Date</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800/60 text-sm">
                <!-- Client Row 1 -->
                <tr class="hover:bg-slate-800/20 transition-colors">
                    <td class="px-6 py-4 flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 flex items-center justify-center font-bold">
                            JD
                        </div>
                        <div>
                            <h5 class="font-semibold text-slate-100">John Doe Corp</h5>
                            <span class="text-xs text-slate-400">john@doe.com | +62 812-3456-7890</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-wrap gap-1.5">
                            <span class="px-2 py-0.5 text-[10px] font-bold rounded bg-blue-500/10 text-blue-400 border border-blue-500/20">WebDev</span>
                            <span class="px-2 py-0.5 text-[10px] font-bold rounded bg-purple-500/10 text-purple-400 border border-purple-500/20">Brand</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-slate-400 font-mono text-xs">
                        2026-06-01
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="#" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 transition-colors mr-3">Matrix Matrix &rarr;</a>
                        <button class="text-xs font-semibold text-rose-400 hover:text-rose-300 transition-colors">Delete</button>
                    </td>
                </tr>

                <!-- Client Row 2 -->
                <tr class="hover:bg-slate-800/20 transition-colors">
                    <td class="px-6 py-4 flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-purple-500/10 text-purple-400 border border-purple-500/20 flex items-center justify-center font-bold">
                            AS
                        </div>
                        <div>
                            <h5 class="font-semibold text-slate-100">Akira Studios</h5>
                            <span class="text-xs text-slate-400">akira@studios.jp | +81 90-1234-5678</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-wrap gap-1.5">
                            <span class="px-2 py-0.5 text-[10px] font-bold rounded bg-rose-500/10 text-rose-400 border border-rose-500/20">Video</span>
                            <span class="px-2 py-0.5 text-[10px] font-bold rounded bg-purple-500/10 text-purple-400 border border-purple-500/20">Brand</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-slate-400 font-mono text-xs">
                        2026-05-28
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="#" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 transition-colors mr-3">Matrix Matrix &rarr;</a>
                        <button class="text-xs font-semibold text-rose-400 hover:text-rose-300 transition-colors">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Table Pagination Mock -->
        <div class="px-6 py-4 bg-slate-900/40 border-t border-slate-800 flex items-center justify-between text-xs text-slate-400">
            <span>Showing <span class="text-slate-200">1</span> to <span class="text-slate-200">2</span> of <span class="text-slate-200">12</span> clients</span>
            <div class="flex space-x-2">
                <button class="bg-slate-800 border border-slate-700 px-3 py-1.5 rounded hover:bg-slate-700 text-slate-300 disabled:opacity-50" disabled>Previous</button>
                <button class="bg-slate-800 border border-slate-700 px-3 py-1.5 rounded hover:bg-slate-700 text-slate-300">Next</button>
            </div>
        </div>
    </div>
</div>
@endsection
