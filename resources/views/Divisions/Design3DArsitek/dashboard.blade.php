<div x-show="currentTab === 'design3darsitek_dashboard'" class="space-y-6" x-cloak>
    <!-- Design 3D Arsitek Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
        <!-- Stat 1: Total Video Assets -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Video Assets</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">84</h3>
                <p class="text-xs text-slate-500 mt-2">B-Roll & master clips</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-rose-50 border border-rose-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-photo-film text-rose-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 2: Active Editing Projects -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Active Projects</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">6</h3>
                <p class="text-xs text-slate-500 mt-2">In Premiere Pro & DaVinci</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-video text-blue-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 3: Render Farm Load -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Render Farm Load</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">82%</h3>
                <p class="text-xs text-rose-650 font-semibold mt-2">GPU encoding cluster peak</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-indigo-50 border border-indigo-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-server text-indigo-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 4: NAS Storage (Critical) -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between relative overflow-hidden">
            <!-- Alert bar -->
            <div class="absolute top-0 left-0 right-0 h-1 bg-red-500"></div>
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-red-500 flex items-center gap-1"><i class="fa-solid fa-triangle-exclamation"></i> NAS STORAGE</p>
                <h3 class="text-3xl font-black text-red-650 mt-1 leading-none">95%</h3>
                <p class="text-xs text-red-500 font-bold mt-2">128 GB Free / 2.5 TB Total</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-red-50 border border-red-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-hard-drive text-red-500 text-sm animate-pulse"></i>
            </div>
        </div>
    </div>

    <!-- Active Rendering Farm & Deliverables Matrix -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Video Render Queue -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-card p-6 space-y-4 md:col-span-1">
            <h3 class="text-[13px] font-bold text-slate-850">Video Encoder Queue</h3>
            <p class="text-xs text-slate-500 leading-relaxed">
                DaVinci Resolve background server encoding queue.
            </p>
            
            <div class="space-y-4 pt-2">
                <!-- Render 1 -->
                <div class="space-y-1.5">
                    <div class="flex justify-between items-center text-xs">
                        <span class="font-bold text-slate-700">CV Kreasi Digital — Promo Clip</span>
                        <span class="font-mono text-rose-600 font-bold">82%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-rose-500 h-full rounded-full" style="width: 82%"></div>
                    </div>
                    <p class="text-[9px] text-slate-400">ProRes 422 HQ · Est: 12m left</p>
                </div>

                <!-- Render 2 -->
                <div class="space-y-1.5">
                    <div class="flex justify-between items-center text-xs">
                        <span class="font-bold text-slate-700">PT Nusantara Foods — Documenter v2</span>
                        <span class="font-mono text-rose-600 font-bold">12%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-rose-500 h-full rounded-full" style="width: 12%"></div>
                    </div>
                    <p class="text-[9px] text-slate-400">HEVC H.265 (4K) · Est: 2h 45m left</p>
                </div>
            </div>
        </div>

        <!-- deliverables list -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-card overflow-hidden md:col-span-2">
            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-7 h-7 rounded-lg bg-slate-900 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-film text-white text-xs"></i>
                    </div>
                    <div>
                        <h2 class="text-[13px] font-bold text-slate-850">Movie Deliverables Pipeline</h2>
                        <p class="text-[11px] text-slate-400">Client high-res videos production stages</p>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100 text-[10px] font-bold uppercase tracking-widest text-slate-400">
                            <th class="px-5 py-3">Project / Client</th>
                            <th class="px-4 py-3">Format</th>
                            <th class="px-4 py-3">Resolution</th>
                            <th class="px-4 py-3">Edit Phase</th>
                            <th class="px-5 py-3 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs text-slate-650">
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3.5">
                                <p class="font-bold text-slate-800">CV Kreasi Digital</p>
                                <p class="text-[10px] text-slate-400">Company Profile Video 2026</p>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="font-mono font-semibold text-[10px] text-slate-600">.MOV (ProRes)</span>
                            </td>
                            <td class="px-4 py-3.5">4K Ultra HD</td>
                            <td class="px-4 py-3.5">Color Grading</td>
                            <td class="px-5 py-3.5 text-right">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-amber-50 text-amber-700 border border-amber-100 uppercase">Reviewing</span>
                            </td>
                        </tr>
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3.5">
                                <p class="font-bold text-slate-800">PT Maju Bersama</p>
                                <p class="text-[10px] text-slate-400">Maju Expo 2026 Intro Clip</p>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="font-mono font-semibold text-[10px] text-slate-600">.MP4 (H.264)</span>
                            </td>
                            <td class="px-4 py-3.5">1080p FHD</td>
                            <td class="px-4 py-3.5">Assembly Cut</td>
                            <td class="px-5 py-3.5 text-right">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-blue-50 text-blue-750 border border-blue-100 uppercase">Editing</span>
                            </td>
                        </tr>
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3.5">
                                <p class="font-bold text-slate-800">PT Nusantara Foods</p>
                                <p class="text-[10px] text-slate-400">Sari Rasa Culinary Documentary</p>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="font-mono font-semibold text-[10px] text-slate-600">.MP4 (H.265)</span>
                            </td>
                            <td class="px-4 py-3.5">4K Ultra HD</td>
                            <td class="px-4 py-3.5">Sound Mixing</td>
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
