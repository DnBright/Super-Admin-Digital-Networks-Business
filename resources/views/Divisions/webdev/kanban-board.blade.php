@extends('layouts.division-app')

@section('title', 'WebDev Workboard')
@section('division-name', 'Web Development')
@section('division-color-classes', 'bg-blue-500/10 text-blue-400 border border-blue-500/20')
@section('page-title', 'Kanban Board')

@section('content')
<div class="space-y-6 h-full flex flex-col">
    <!-- Workboard Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <p class="text-xs text-slate-400">Track active tasks and deployment pipelines for the WebDev team.</p>
        </div>
        <button class="bg-blue-600 hover:bg-blue-500 text-white font-medium text-xs px-4 py-2 rounded-lg transition-colors border border-blue-500/30 shadow-lg shadow-blue-500/10">
            + Add Work Task
        </button>
    </div>

    <!-- Kanban Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 flex-1 overflow-hidden">
        <!-- 1. TO DO COLUMN -->
        <div class="glass bg-slate-900/30 rounded-xl p-4 flex flex-col h-[600px]">
            <div class="flex items-center justify-between pb-3 border-b border-slate-800">
                <h4 class="text-sm font-bold text-slate-300 uppercase tracking-wider">To Do</h4>
                <span class="px-2 py-0.5 text-xs bg-slate-800 text-slate-400 rounded-full font-semibold">2</span>
            </div>
            <div class="flex-1 overflow-y-auto pt-4 space-y-4">
                <!-- Task Card 1 -->
                <div class="bg-slate-900 border border-slate-800 p-4 rounded-xl shadow space-y-3 hover:border-slate-700 transition-colors cursor-pointer">
                    <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-sky-500/10 text-sky-400 border border-sky-500/20 uppercase">Deployment</span>
                    <h5 class="font-bold text-slate-200 text-sm">Configure VPS Backups</h5>
                    <p class="text-xs text-slate-400 line-clamp-2">Setup daily automated backup snapshots for VPS Server #3 on Hetzner storage volumes.</p>
                    <div class="pt-2 flex justify-between items-center text-[10px] text-slate-500 font-mono">
                        <span>Due: June 10</span>
                        <span class="font-bold text-slate-400">Low</span>
                    </div>
                </div>

                <!-- Task Card 2 -->
                <div class="bg-slate-900 border border-slate-800 p-4 rounded-xl shadow space-y-3 hover:border-slate-700 transition-colors cursor-pointer">
                    <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-amber-500/10 text-amber-400 border border-amber-500/20 uppercase">Bugfix</span>
                    <h5 class="font-bold text-slate-200 text-sm">Repair SSL Auto-Renew API</h5>
                    <p class="text-xs text-slate-400 line-clamp-2">Investigate Let's Encrypt API handshake error occurring during cron jobs.</p>
                    <div class="pt-2 flex justify-between items-center text-[10px] text-slate-500 font-mono">
                        <span>Due: June 8</span>
                        <span class="font-bold text-amber-400">Medium</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. IN PROGRESS COLUMN -->
        <div class="glass bg-slate-900/30 rounded-xl p-4 flex flex-col h-[600px]">
            <div class="flex items-center justify-between pb-3 border-b border-slate-800">
                <h4 class="text-sm font-bold text-slate-300 uppercase tracking-wider">In Progress</h4>
                <span class="px-2 py-0.5 text-xs bg-slate-800 text-slate-400 rounded-full font-semibold">1</span>
            </div>
            <div class="flex-1 overflow-y-auto pt-4 space-y-4">
                <!-- Task Card 1 -->
                <div class="bg-slate-900 border border-slate-800 p-4 rounded-xl shadow space-y-3 hover:border-slate-700 transition-colors cursor-pointer">
                    <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-rose-500/10 text-rose-400 border border-rose-500/20 uppercase">Critical</span>
                    <h5 class="font-bold text-slate-200 text-sm">Deploy John Doe Corp Site</h5>
                    <p class="text-xs text-slate-400 line-clamp-2">Migrating localized staging project directory to production cPanel host server.</p>
                    <div class="pt-2 flex justify-between items-center text-[10px] text-slate-500 font-mono">
                        <span>Due: June 6</span>
                        <span class="font-bold text-rose-400">High</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. COMPLETED COLUMN -->
        <div class="glass bg-slate-900/30 rounded-xl p-4 flex flex-col h-[600px]">
            <div class="flex items-center justify-between pb-3 border-b border-slate-800">
                <h4 class="text-sm font-bold text-slate-300 uppercase tracking-wider">Completed</h4>
                <span class="px-2 py-0.5 text-xs bg-slate-800 text-slate-400 rounded-full font-semibold">1</span>
            </div>
            <div class="flex-1 overflow-y-auto pt-4 space-y-4">
                <!-- Task Card 1 -->
                <div class="bg-slate-900 border border-slate-800 p-4 rounded-xl shadow space-y-3 hover:border-slate-700 transition-colors cursor-pointer opacity-70">
                    <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 uppercase">Routine</span>
                    <h5 class="font-bold text-slate-200 text-sm">Setup Laravel 11 Project</h5>
                    <p class="text-xs text-slate-400 line-clamp-2">Complete structural architecture with dynamic composer dependencies and initial database configuration.</p>
                    <div class="pt-2 flex justify-between items-center text-[10px] text-slate-500 font-mono">
                        <span>Done: June 5</span>
                        <span class="text-emerald-400 font-bold">Closed</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
