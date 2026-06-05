<div x-show="currentTab === 'mockup3d_dashboard'" class="space-y-6" x-cloak>
    <!-- 3D Mockup Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
        <!-- Stat 1: Active Render Jobs -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Active Render Jobs</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">4</h3>
                <p class="text-xs text-slate-500 mt-2">Blender & V-Ray farms</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-cyan-50 border border-cyan-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-cube text-cyan-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 2: Avg Render Time -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Avg. Render Time</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">45m</h3>
                <p class="text-xs text-slate-500 mt-2">GPU Cycles-X performance</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-bolt text-emerald-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 3: Total Clients -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Total Clients</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">18</h3>
                <p class="text-xs text-cyan-650 font-semibold mt-2">Premium space contracts</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-indigo-50 border border-indigo-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-building text-indigo-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 4: Render Farm Storage -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Render Storage</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">2.1 TB</h3>
                <p class="text-xs text-slate-505 mt-2">Out of 4.0 TB Allocated</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-amber-50 border border-amber-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-hard-drive text-amber-500 text-sm"></i>
            </div>
        </div>
    </div>

    <!-- Active Rendering Farm & Deliverables Matrix -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Render Farm Jobs Queue -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-card p-6 space-y-4 md:col-span-1">
            <div class="flex items-center justify-between">
                <h3 class="text-[13px] font-bold text-slate-850">Render Farm Status</h3>
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
            </div>
            <p class="text-xs text-slate-500 leading-relaxed">
                GPU cluster render queue. Status update is real-time.
            </p>
            
            <div class="space-y-4 pt-2">
                <!-- Render 1 -->
                <div class="space-y-1.5">
                    <div class="flex justify-between items-center text-xs">
                        <span class="font-bold text-slate-700">Villa Ubud — Day Frame</span>
                        <span class="font-mono text-cyan-600 font-bold">45%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-cyan-500 h-full rounded-full" style="width: 45%"></div>
                    </div>
                    <p class="text-[9px] text-slate-400">Blender Cycles-X · Est: 1h 12m left</p>
                </div>

                <!-- Render 2 -->
                <div class="space-y-1.5">
                    <div class="flex justify-between items-center text-xs">
                        <span class="font-bold text-slate-700">Maju Booth Concept v2</span>
                        <span class="font-mono text-cyan-600 font-bold">90%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-cyan-500 h-full rounded-full" style="width: 90%"></div>
                    </div>
                    <p class="text-[9px] text-slate-400">Keyshot GPU · Est: 4m left</p>
                </div>

                <!-- Render 3 -->
                <div class="space-y-1.5">
                    <div class="flex justify-between items-center text-xs">
                        <span class="font-bold text-slate-700">Nusantara Office Interior</span>
                        <span class="font-mono text-emerald-600 font-bold">Finished</span>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-emerald-500 h-full rounded-full" style="width: 100%"></div>
                    </div>
                    <p class="text-[9px] text-slate-400">V-Ray 6.0 · Ready to deliver</p>
                </div>
            </div>
        </div>

        <!-- 3D Mockup CAD Files Deliverables -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-card overflow-hidden md:col-span-2">
            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-7 h-7 rounded-lg bg-slate-900 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-shapes text-white text-xs"></i>
                    </div>
                    <div>
                        <h2 class="text-[13px] font-bold text-slate-850">Architectural Mockups Registry</h2>
                        <p class="text-[11px] text-slate-400">CAD drawings & 3D render files handover database</p>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100 text-[10px] font-bold uppercase tracking-widest text-slate-400">
                            <th class="px-5 py-3">Project / Client</th>
                            <th class="px-4 py-3">File Format</th>
                            <th class="px-4 py-3">Resolution</th>
                            <th class="px-4 py-3">Render Engine</th>
                            <th class="px-5 py-3 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs text-slate-650">
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3.5">
                                <p class="font-bold text-slate-800">PT Maju Bersama</p>
                                <p class="text-[10px] text-slate-400">Exhibition Booth Design 3D</p>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="font-mono font-semibold text-[10px] text-slate-600">.FBX + .OBJ</span>
                            </td>
                            <td class="px-4 py-3.5">4K UHD Rendering</td>
                            <td class="px-4 py-3.5">Keyshot 11</td>
                            <td class="px-5 py-3.5 text-right">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-amber-50 text-amber-700 border border-amber-100 uppercase">Reviewing</span>
                            </td>
                        </tr>
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3.5">
                                <p class="font-bold text-slate-800">PT Nusantara Foods</p>
                                <p class="text-[10px] text-slate-400">Sari Rasa Villa Ubud Render</p>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="font-mono font-semibold text-[10px] text-slate-600">.BLEND (Master)</span>
                            </td>
                            <td class="px-4 py-3.5">8K Ultra Panoramic</td>
                            <td class="px-4 py-3.5">Blender Cycles</td>
                            <td class="px-5 py-3.5 text-right">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-blue-50 text-blue-750 border border-blue-100 uppercase">Rendering</span>
                            </td>
                        </tr>
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3.5">
                                <p class="font-bold text-slate-800">CV Kreasi Digital</p>
                                <p class="text-[10px] text-slate-400">Office Interior Renovation Plan</p>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="font-mono font-semibold text-[10px] text-slate-600">.DWG + .MAX</span>
                            </td>
                            <td class="px-4 py-3.5">4K Photoreal Render</td>
                            <td class="px-4 py-3.5">V-Ray 6.0</td>
                            <td class="px-5 py-3.5 text-right">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-emerald-50 text-emerald-700 border border-emerald-100 uppercase">Completed</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
