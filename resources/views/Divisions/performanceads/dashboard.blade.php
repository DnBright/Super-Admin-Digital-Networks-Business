<div x-show="currentTab === 'performanceads_dashboard'" class="space-y-6" x-cloak>
    <!-- Performance Ads Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
        <!-- Stat 1: Total Ads Budget -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Total Ads Budget</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">Rp 245M</h3>
                <p class="text-xs text-slate-500 mt-2">Combined client ad spend</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-wallet text-emerald-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 2: Active Campaigns -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Active Campaigns</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">14</h3>
                <p class="text-xs text-slate-500 mt-2">Across Google, Meta & TikTok</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-bullhorn text-blue-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 3: Avg CTR -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Average CTR</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">3.42%</h3>
                <p class="text-xs text-emerald-650 font-semibold mt-2">Above industry standard (2.1%)</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-indigo-50 border border-indigo-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-chart-line text-indigo-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 4: Conversions -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Conversions</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">4,820</h3>
                <p class="text-xs text-slate-505 mt-2">Leads & purchases generated</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-orange-50 border border-orange-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-circle-check text-orange-500 text-sm"></i>
            </div>
        </div>
    </div>

    <!-- Integrations & Campaigns Overview -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Channels & Integrations Status -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-card p-6 space-y-4 md:col-span-1">
            <div class="flex items-center justify-between">
                <h3 class="text-[13px] font-bold text-slate-850">Marketing Integrations</h3>
                <span class="text-[9px] font-bold px-2 py-0.5 bg-emerald-50 text-emerald-700 border border-emerald-100 rounded-full">All Nodes Safe</span>
            </div>
            <p class="text-xs text-slate-500 leading-relaxed">
                Super Admin memantau langsung metrik kinerja dari akun pengiklan digital klien.
            </p>
            
            <div class="space-y-3 pt-2">
                <!-- Channel 1: Google Ads -->
                <div class="flex items-center justify-between p-3 bg-slate-50 border border-slate-200 rounded-xl">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-blue-500"><i class="fa-brands fa-google"></i></span>
                        <div>
                            <p class="text-xs font-bold text-slate-800">Google Ads API</p>
                            <p class="text-[10px] text-slate-400">ID: 482-990-1123</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-600 flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Connected</span>
                </div>

                <!-- Channel 2: Meta Ads -->
                <div class="flex items-center justify-between p-3 bg-slate-50 border border-slate-200 rounded-xl">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-indigo-600"><i class="fa-brands fa-facebook"></i></span>
                        <div>
                            <p class="text-xs font-bold text-slate-800">Meta Business SDK</p>
                            <p class="text-[10px] text-slate-400">Token expires in 45d</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-600 flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Connected</span>
                </div>

                <!-- Channel 3: TikTok Ads -->
                <div class="flex items-center justify-between p-3 bg-slate-50 border border-slate-200 rounded-xl">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-900"><i class="fa-brands fa-tiktok"></i></span>
                        <div>
                            <p class="text-xs font-bold text-slate-800">TikTok Marketing API</p>
                            <p class="text-[10px] text-slate-400">Connection required</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-bold text-amber-600 flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>Re-Auth</span>
                </div>
            </div>
        </div>

        <!-- Live Campaigns Tracker -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-card overflow-hidden md:col-span-2">
            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-7 h-7 rounded-lg bg-slate-900 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-chart-column text-white text-xs"></i>
                    </div>
                    <div>
                        <h2 class="text-[13px] font-bold text-slate-850">Active Marketing Campaigns</h2>
                        <p class="text-[11px] text-slate-400">Live ROI & budget monitoring console</p>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100 text-[10px] font-bold uppercase tracking-widest text-slate-400">
                            <th class="px-5 py-3">Campaign / Client</th>
                            <th class="px-4 py-3">Channel</th>
                            <th class="px-4 py-3">Spent / Budget</th>
                            <th class="px-4 py-3">ROI</th>
                            <th class="px-5 py-3 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs text-slate-650">
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3.5">
                                <p class="font-bold text-slate-800">PT Maju Bersama</p>
                                <p class="text-[10px] text-slate-400">Maju Rebranding Search Promo</p>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="px-2 py-0.5 rounded bg-blue-50 text-blue-700 font-semibold border border-blue-100">Google Ads</span>
                            </td>
                            <td class="px-4 py-3.5">
                                <p class="font-semibold text-slate-700">Rp 8.4M</p>
                                <p class="text-[10px] text-slate-400">Limit: Rp 12.0M</p>
                            </td>
                            <td class="px-4 py-3.5 font-bold text-emerald-600">2.4x</td>
                            <td class="px-5 py-3.5 text-right">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-emerald-50 text-emerald-700 border border-emerald-100 uppercase">Active</span>
                            </td>
                        </tr>
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3.5">
                                <p class="font-bold text-slate-800">CV Kreasi Digital</p>
                                <p class="text-[10px] text-slate-400">Video Launch Reels Ads Campaign</p>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="px-2 py-0.5 rounded bg-indigo-50 text-indigo-700 font-semibold border border-indigo-100">Meta Ads</span>
                            </td>
                            <td class="px-4 py-3.5">
                                <p class="font-semibold text-slate-700">Rp 5.2M</p>
                                <p class="text-[10px] text-slate-400">Limit: Rp 8.5M</p>
                            </td>
                            <td class="px-4 py-3.5 font-bold text-emerald-600">1.8x</td>
                            <td class="px-5 py-3.5 text-right">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-emerald-50 text-emerald-700 border border-emerald-100 uppercase">Active</span>
                            </td>
                        </tr>
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3.5">
                                <p class="font-bold text-slate-800">PT Nusantara Foods</p>
                                <p class="text-[10px] text-slate-400">Sari Rasa Delivery TikTok Challenge</p>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="px-2 py-0.5 rounded bg-slate-900 text-white font-semibold border border-slate-800">TikTok Ads</span>
                            </td>
                            <td class="px-4 py-3.5">
                                <p class="font-semibold text-slate-700">Rp 15.0M</p>
                                <p class="text-[10px] text-slate-400">Limit: Rp 15.0M</p>
                            </td>
                            <td class="px-4 py-3.5 font-bold text-emerald-600">3.1x</td>
                            <td class="px-5 py-3.5 text-right">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-slate-100 text-slate-600 border border-slate-200 uppercase">Completed</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
