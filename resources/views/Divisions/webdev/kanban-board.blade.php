<div x-show="currentTab === 'webdev_kanban'" class="space-y-6 h-full flex flex-col" x-cloak>
    <!-- Workboard Header -->
    <div class="flex items-center justify-between bg-white p-4 rounded-xl border border-slate-200 shadow-card">
        <div>
            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider">WebDev Team Workboard</h3>
            <p class="text-xs text-slate-500 mt-0.5">Track active tasks and deployment pipelines for the WebDev team.</p>
        </div>
        <button class="bg-blue-600 hover:bg-blue-500 text-white font-semibold text-xs px-4 py-2 rounded-lg transition-colors border border-blue-500/30 shadow flex items-center gap-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Add Work Task
        </button>
    </div>

    <!-- Kanban Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 flex-1">
        <!-- 1. TO DO COLUMN -->
        <div class="bg-slate-100/60 border border-slate-200 rounded-xl p-4 flex flex-col h-[550px]">
            <div class="flex items-center justify-between pb-3 border-b border-slate-200">
                <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider">To Do</h4>
                <span class="px-2 py-0.5 text-[10px] bg-slate-200 text-slate-650 rounded-full font-black">2</span>
            </div>
            <div class="flex-1 overflow-y-auto pt-4 space-y-3">
                <!-- Task Card 1 -->
                <div class="bg-white border border-slate-200 p-4 rounded-xl shadow-sm space-y-2.5 hover:border-blue-500 transition-colors cursor-pointer card-hover">
                    <span class="inline-block px-2 py-0.5 text-[9px] font-bold rounded bg-sky-50 text-sky-700 border border-sky-100 uppercase tracking-wider">Deployment</span>
                    <h5 class="font-bold text-slate-800 text-xs">Configure VPS Backups</h5>
                    <p class="text-[11px] text-slate-500 leading-normal line-clamp-2">Setup daily automated backup snapshots for VPS Server #3 on Hetzner storage volumes.</p>
                    <div class="pt-2 border-t border-slate-100 flex justify-between items-center text-[10px] text-slate-400 font-mono">
                        <span>Due: June 10</span>
                        <span class="font-bold text-slate-500">Low</span>
                    </div>
                </div>

                <!-- Task Card 2 -->
                <div class="bg-white border border-slate-200 p-4 rounded-xl shadow-sm space-y-2.5 hover:border-blue-500 transition-colors cursor-pointer card-hover">
                    <span class="inline-block px-2 py-0.5 text-[9px] font-bold rounded bg-amber-50 text-amber-700 border border-amber-100 uppercase tracking-wider">Bugfix</span>
                    <h5 class="font-bold text-slate-800 text-xs">Repair SSL Auto-Renew API</h5>
                    <p class="text-[11px] text-slate-500 leading-normal line-clamp-2">Investigate Let's Encrypt API handshake error occurring during cron jobs.</p>
                    <div class="pt-2 border-t border-slate-100 flex justify-between items-center text-[10px] text-slate-400 font-mono">
                        <span>Due: June 8</span>
                        <span class="font-bold text-amber-600">Medium</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. IN PROGRESS COLUMN -->
        <div class="bg-slate-100/60 border border-slate-200 rounded-xl p-4 flex flex-col h-[550px]">
            <div class="flex items-center justify-between pb-3 border-b border-slate-200">
                <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider">In Progress</h4>
                <span class="px-2 py-0.5 text-[10px] bg-slate-200 text-slate-650 rounded-full font-black">1</span>
            </div>
            <div class="flex-1 overflow-y-auto pt-4 space-y-3">
                <!-- Task Card 1 -->
                <div class="bg-white border border-slate-200 p-4 rounded-xl shadow-sm space-y-2.5 hover:border-blue-500 transition-colors cursor-pointer card-hover">
                    <span class="inline-block px-2 py-0.5 text-[9px] font-bold rounded bg-rose-50 text-rose-700 border border-rose-100 uppercase tracking-wider">Critical</span>
                    <h5 class="font-bold text-slate-800 text-xs">Deploy John Doe Corp Site</h5>
                    <p class="text-[11px] text-slate-500 leading-normal line-clamp-2">Migrating localized staging project directory to production cPanel host server.</p>
                    <div class="pt-2 border-t border-slate-100 flex justify-between items-center text-[10px] text-slate-400 font-mono">
                        <span>Due: June 6</span>
                        <span class="font-bold text-rose-600">High</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. COMPLETED COLUMN -->
        <div class="bg-slate-100/60 border border-slate-200 rounded-xl p-4 flex flex-col h-[550px]">
            <div class="flex items-center justify-between pb-3 border-b border-slate-200">
                <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider">Completed</h4>
                <span class="px-2 py-0.5 text-[10px] bg-slate-200 text-slate-650 rounded-full font-black">1</span>
            </div>
            <div class="flex-1 overflow-y-auto pt-4 space-y-3">
                <!-- Task Card 1 -->
                <div class="bg-white border border-slate-200 p-4 rounded-xl shadow-sm space-y-2.5 hover:border-blue-500 transition-colors cursor-pointer opacity-70 card-hover">
                    <span class="inline-block px-2 py-0.5 text-[9px] font-bold rounded bg-emerald-50 text-emerald-700 border border-emerald-100 uppercase tracking-wider">Routine</span>
                    <h5 class="font-bold text-slate-800 text-xs">Setup Laravel 11 Project</h5>
                    <p class="text-[11px] text-slate-500 leading-normal line-clamp-2">Complete structural architecture with dynamic composer dependencies and initial database configuration.</p>
                    <div class="pt-2 border-t border-slate-100 flex justify-between items-center text-[10px] text-slate-400 font-mono">
                        <span>Done: June 5</span>
                        <span class="text-emerald-600 font-bold">Closed</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
