<div x-show="currentTab === 'socialmedia_dashboard'" class="space-y-6" x-cloak>
    <!-- Social Media Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
        <!-- Stat 1: Connected Accounts -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Connected Accounts</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">16</h3>
                <p class="text-xs text-slate-500 mt-2">Instagram, TikTok, YouTube</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-pink-50 border border-pink-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-hashtag text-pink-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 2: Content Scheduled -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Scheduled Posts</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">42</h3>
                <p class="text-xs text-slate-500 mt-2">Automated queues ready</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-calendar-days text-blue-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 3: Avg Engagement Rate -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400 font-sans">Engagement Rate</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">+18.4%</h3>
                <p class="text-xs text-pink-650 font-semibold mt-2">MoM organic impressions growth</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-pink-50 border border-pink-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-arrow-trend-up text-pink-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 4: Pending Client Approvals -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Pending Approvals</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">3</h3>
                <p class="text-xs text-amber-600 font-semibold mt-2">Awaiting client checkoff</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-amber-50 border border-amber-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-clock-rotate-left text-amber-550 text-sm"></i>
            </div>
        </div>
    </div>

    <!-- Active Content Calendar & Team Workloads -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Team Creative Workloads -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-card p-6 space-y-4 md:col-span-1">
            <h3 class="text-[13px] font-bold text-slate-850">Creative Team Allocation</h3>
            <p class="text-xs text-slate-500 leading-relaxed">
                Workload metrics for graphic designers & copywriters.
            </p>
            
            <div class="space-y-4 pt-2">
                <!-- Person 1 -->
                <div class="space-y-1">
                    <div class="flex justify-between items-center text-xs font-semibold text-slate-700">
                        <span>Amanda Wijaya (Copywriter)</span>
                        <span>12 Posts</span>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-pink-400 h-full rounded-full" style="width: 75%"></div>
                    </div>
                </div>

                <!-- Person 2 -->
                <div class="space-y-1">
                    <div class="flex justify-between items-center text-xs font-semibold text-slate-700">
                        <span>Syafii Anam (Designer)</span>
                        <span>8 Posts</span>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-pink-400 h-full rounded-full" style="width: 50%"></div>
                    </div>
                </div>

                <!-- Person 3 -->
                <div class="space-y-1">
                    <div class="flex justify-between items-center text-xs font-semibold text-slate-700">
                        <span>Reza Pahlevi (Socmed Admin)</span>
                        <span>22 Scheduled</span>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-emerald-500 h-full rounded-full" style="width: 90%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Media Content Calendar Post Pipeline -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-card overflow-hidden md:col-span-2">
            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-7 h-7 rounded-lg bg-slate-900 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-calendar text-white text-xs"></i>
                    </div>
                    <div>
                        <h2 class="text-[13px] font-bold text-slate-850">Content Publishing Pipeline</h2>
                        <p class="text-[11px] text-slate-400">Active social media schedule & approval states</p>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100 text-[10px] font-bold uppercase tracking-widest text-slate-400">
                            <th class="px-5 py-3">Client / Campaign</th>
                            <th class="px-4 py-3">Platform</th>
                            <th class="px-4 py-3">Posting Date</th>
                            <th class="px-4 py-3">Content Type</th>
                            <th class="px-5 py-3 text-right">Approval Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs text-slate-650">
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3.5">
                                <p class="font-bold text-slate-800">PT Nusantara Foods</p>
                                <p class="text-[10px] text-slate-400">Resep Kuliner Nusantara Promo</p>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="px-2 py-0.5 rounded bg-gradient-to-tr from-yellow-500 to-pink-500 text-white font-semibold text-[9px]">Instagram</span>
                            </td>
                            <td class="px-4 py-3.5">
                                <p class="font-semibold text-slate-700">08 Jun 2026</p>
                                <p class="text-[10px] text-slate-400">17:00 WIB</p>
                            </td>
                            <td class="px-4 py-3.5">Carousel Post</td>
                            <td class="px-5 py-3.5 text-right">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-emerald-50 text-emerald-700 border border-emerald-100 uppercase">Approved</span>
                            </td>
                        </tr>
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3.5">
                                <p class="font-bold text-slate-800">CV Kreasi Digital</p>
                                <p class="text-[10px] text-slate-400">Behind the Scenes Office Vibe</p>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="px-2 py-0.5 rounded bg-slate-900 text-white font-semibold text-[9px]">TikTok Video</span>
                            </td>
                            <td class="px-4 py-3.5">
                                <p class="font-semibold text-slate-700">09 Jun 2026</p>
                                <p class="text-[10px] text-slate-400">19:30 WIB</p>
                            </td>
                            <td class="px-4 py-3.5">TikTok Short Reel</td>
                            <td class="px-5 py-3.5 text-right">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-amber-50 text-amber-700 border border-amber-100 uppercase">Awaiting Client</span>
                            </td>
                        </tr>
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3.5">
                                <p class="font-bold text-slate-800">PT Maju Bersama</p>
                                <p class="text-[10px] text-slate-400">Q3 Rebranding Event Promo</p>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="px-2 py-0.5 rounded bg-blue-50 text-blue-700 font-semibold text-[9px]">Facebook</span>
                            </td>
                            <td class="px-4 py-3.5">
                                <p class="font-semibold text-slate-700">12 Jun 2026</p>
                                <p class="text-[10px] text-slate-400">09:00 WIB</p>
                            </td>
                            <td class="px-4 py-3.5">Graphic Feed Link</td>
                            <td class="px-5 py-3.5 text-right">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-slate-100 text-slate-600 border border-slate-200 uppercase">Drafting</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
