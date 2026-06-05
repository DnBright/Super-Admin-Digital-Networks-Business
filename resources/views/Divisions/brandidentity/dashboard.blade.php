<div x-show="currentTab === 'brandidentity_dashboard'" class="space-y-6" x-cloak>
    <!-- Brand Identity Quick Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
        <!-- Stat 1: Total Design Projects -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Total Projects</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">34</h3>
                <p class="text-xs text-slate-500 mt-2">Active brand initiatives</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-purple-50 border border-purple-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-palette text-purple-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 2: Completed Handover -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Completed Handover</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">21</h3>
                <p class="text-xs text-slate-500 mt-2">Asset packages delivered</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-circle-check text-emerald-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 3: Active Revision Tokens -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Active Revision Tokens</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">5</h3>
                <p class="text-xs text-indigo-650 font-semibold mt-2">Secured client access</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-indigo-50 border border-indigo-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-key text-indigo-500 text-sm"></i>
            </div>
        </div>

        <!-- Stat 4: Remaining Revisions Avg -->
        <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Avg. Revisions Left</p>
                <h3 class="text-3xl font-black text-slate-900 mt-1 leading-none">2.4</h3>
                <p class="text-xs text-slate-505 mt-2">Under contract limit</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-clock-rotate-left text-blue-500 text-sm"></i>
            </div>
        </div>
    </div>

    <!-- Design Projects Tracker -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-card overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
            <div class="flex items-center gap-3">
                <div class="w-7 h-7 rounded-lg bg-slate-900 flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-folder-open text-white text-xs"></i>
                </div>
                <div>
                    <h2 class="text-[13px] font-bold text-slate-850">Design Projects Tracker</h2>
                    <p class="text-[11px] text-slate-400">Visual brand identity design pipeline</p>
                </div>
            </div>
            <button class="text-[10px] font-bold text-slate-605 bg-slate-50 border border-slate-200 px-3 py-1.5 rounded-lg hover:bg-slate-100 transition-colors">
                + New Project
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-[10px] font-bold uppercase tracking-widest text-slate-400">
                        <th class="px-5 py-3">Client / Brand</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Revisions</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs text-slate-650">
                    <tr class="trow transition-colors">
                        <td class="px-5 py-3.5">
                            <p class="font-bold text-slate-800">PT Nusantara Foods</p>
                            <p class="text-[10px] text-slate-400">Sari Rasa Packaging & Logo</p>
                        </td>
                        <td class="px-4 py-3.5">Logo & Identity</td>
                        <td class="px-4 py-3.5 font-semibold text-indigo-600">3 Used / 5 Max</td>
                        <td class="px-4 py-3.5">
                            <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-amber-50 text-amber-700 border border-amber-100">Feedback Phase</span>
                        </td>
                        <td class="px-5 py-3.5 text-right">
                            <a href="{{ route('brandidentity.assets') }}" class="text-[11px] font-bold text-brand-650 hover:text-brand-700 hover:underline">Assets Vault &rarr;</a>
                        </td>
                    </tr>
                    <tr class="trow transition-colors">
                        <td class="px-5 py-3.5">
                            <p class="font-bold text-slate-800">PT Maju Bersama</p>
                            <p class="text-[10px] text-slate-400">Brand Rebranding Kit</p>
                        </td>
                        <td class="px-4 py-3.5">Full Rebranding</td>
                        <td class="px-4 py-3.5 font-semibold text-emerald-650">1 Used / 5 Max</td>
                        <td class="px-4 py-3.5">
                            <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-emerald-50 text-emerald-700 border border-emerald-100">Completed</span>
                        </td>
                        <td class="px-5 py-3.5 text-right">
                            <a href="{{ route('brandidentity.assets') }}" class="text-[11px] font-bold text-brand-650 hover:text-brand-700 hover:underline">Assets Vault &rarr;</a>
                        </td>
                    </tr>
                    <tr class="trow transition-colors">
                        <td class="px-5 py-3.5">
                            <p class="font-bold text-slate-800">Startup Digital Indo</p>
                            <p class="text-[10px] text-slate-400">App UI Styleguide</p>
                        </td>
                        <td class="px-4 py-3.5">UI/UX Guidelines</td>
                        <td class="px-4 py-3.5 font-semibold text-indigo-600">0 Used / 3 Max</td>
                        <td class="px-4 py-3.5">
                            <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-blue-50 text-blue-750 border border-blue-100">Drafting</span>
                        </td>
                        <td class="px-5 py-3.5 text-right">
                            <a href="{{ route('brandidentity.assets') }}" class="text-[11px] font-bold text-brand-650 hover:text-brand-700 hover:underline">Assets Vault &rarr;</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
