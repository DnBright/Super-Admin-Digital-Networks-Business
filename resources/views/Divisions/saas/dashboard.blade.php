<div x-show="currentTab === 'saas_dashboard'" class="space-y-6" x-cloak>
    <!-- SaaS Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
        <!-- Stat 1: Monthly Recurring Revenue -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Monthly Recurring Revenue</p>
                <h3 class="text-2xl font-black text-slate-900 mt-1 leading-none">Rp 124.500.000</h3>
                <p class="text-xs text-emerald-600 font-semibold mt-2"><i class="fa-solid fa-arrow-up mr-1"></i>+12.3% MoM growth</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-pink-50 border border-pink-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-money-bill-trend-up text-pink-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 2: Active Subscriptions / Tenants -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Active Subscriptions</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">18 Tenants</h3>
                <p class="text-xs text-slate-500 mt-2">2 pending onboarding</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-server text-blue-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 3: Monthly Active Users -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400 font-sans">Monthly Active Users</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">12.450 MAU</h3>
                <p class="text-xs text-emerald-600 font-semibold mt-2">99.9% uptime active</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-pink-50 border border-pink-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-users text-pink-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 4: API Success Rate / Response Health -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">API Success Rate</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">99.98%</h3>
                <p class="text-xs text-slate-500 mt-2">14ms avg response time</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-heart-pulse text-emerald-500 text-sm"></i>
            </div>
        </div>
    </div>

    <!-- Active Content Calendar & Team Workloads -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- SaaS Infrastructure Health -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-card p-6 space-y-4 md:col-span-1">
            <h3 class="text-[13px] font-bold text-slate-850">Infrastructure Allocation</h3>
            <p class="text-xs text-slate-500 leading-relaxed">
                Resource metrics across active cloud cluster nodes.
            </p>
            
            <div class="space-y-4 pt-2">
                <!-- Node 1 -->
                <div class="space-y-1">
                    <div class="flex justify-between items-center text-xs font-semibold text-slate-700">
                        <span>DNS Gateway Health</span>
                        <span>100%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-emerald-500 h-full rounded-full" style="width: 100%"></div>
                    </div>
                </div>

                <!-- Node 2 -->
                <div class="space-y-1">
                    <div class="flex justify-between items-center text-xs font-semibold text-slate-700">
                        <span>Database Cluster Usage</span>
                        <span>85 GB / 120 GB</span>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-pink-400 h-full rounded-full" style="width: 70.8%"></div>
                    </div>
                </div>

                <!-- Node 3 -->
                <div class="space-y-1">
                    <div class="flex justify-between items-center text-xs font-semibold text-slate-700">
                        <span>Object Cloud Storage</span>
                        <span>2.4 TB / 5.0 TB</span>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-blue-400 h-full rounded-full" style="width: 48%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SaaS Instance Pipeline -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-card overflow-hidden md:col-span-2">
            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-7 h-7 rounded-lg bg-slate-900 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-cubes text-white text-xs"></i>
                    </div>
                    <div>
                        <h2 class="text-[13px] font-bold text-slate-850">SaaS Instance Pipeline</h2>
                        <p class="text-[11px] text-slate-400">Status deployment & subscription tier klien</p>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100 text-[10px] font-bold uppercase tracking-widest text-slate-400">
                            <th class="px-5 py-3">Client / Instance</th>
                            <th class="px-4 py-3">SaaS Service</th>
                            <th class="px-4 py-3">Subscription Tier</th>
                            <th class="px-4 py-3">Deployment</th>
                            <th class="px-5 py-3 text-right">Billing Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs text-slate-650">
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3.5">
                                <p class="font-bold text-slate-800">PT Nusantara Foods</p>
                                <p class="text-[10px] text-slate-400">foods-saas.dnb.com</p>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="px-2 py-0.5 rounded bg-blue-50 text-blue-700 font-semibold text-[9px]">E-Commerce SaaS</span>
                            </td>
                            <td class="px-4 py-3.5">Enterprise Tier</td>
                            <td class="px-4 py-3.5">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-emerald-50 text-emerald-700 border border-emerald-100">Live (Production)</span>
                            </td>
                            <td class="px-5 py-3.5 text-right">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-emerald-50 text-emerald-700 border border-emerald-100 uppercase">Paid</span>
                            </td>
                        </tr>
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3.5">
                                <p class="font-bold text-slate-800">CV Kreasi Digital</p>
                                <p class="text-[10px] text-slate-400">crm-kreasi.dnb.com</p>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="px-2 py-0.5 rounded bg-purple-50 text-purple-700 font-semibold text-[9px]">CRM SaaS</span>
                            </td>
                            <td class="px-4 py-3.5">Professional Tier</td>
                            <td class="px-4 py-3.5">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-emerald-50 text-emerald-700 border border-emerald-100">Live (Production)</span>
                            </td>
                            <td class="px-5 py-3.5 text-right">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-rose-50 text-rose-700 border border-rose-100 uppercase">Overdue</span>
                            </td>
                        </tr>
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3.5">
                                <p class="font-bold text-slate-800">Startup Nusantara</p>
                                <p class="text-[10px] text-slate-400">hris-nusantara.dnb.com</p>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="px-2 py-0.5 rounded bg-orange-50 text-orange-700 font-semibold text-[9px]">HRIS SaaS</span>
                            </td>
                            <td class="px-4 py-3.5">Startup Tier</td>
                            <td class="px-4 py-3.5">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-amber-50 text-amber-700 border border-amber-100 animate-pulse">Configuring</span>
                            </td>
                            <td class="px-5 py-3.5 text-right">
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-slate-100 text-slate-650 border border-slate-200 uppercase">Trial</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
