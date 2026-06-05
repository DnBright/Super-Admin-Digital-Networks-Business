<div x-show="currentTab === 'brandidentity_dashboard'" class="space-y-6" x-data="{ showTokenModal: false, newTokenProject: '', newTokenExpiry: '', generatedToken: '' }" x-cloak>
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

        <!-- Stat 2: Completed Identity Handover -->
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

    <!-- Main Content Area -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- LEFT: Design Projects Tracker (2 Columns) -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 shadow-card overflow-hidden">
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
                <button class="text-[10px] font-bold text-slate-600 bg-slate-50 border border-slate-200 px-3 py-1.5 rounded-lg hover:bg-slate-100 transition-colors">
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
                                <button class="text-[11px] font-bold text-brand-600 hover:underline">Assets Vault &rarr;</button>
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
                                <button class="text-[11px] font-bold text-brand-600 hover:underline">Assets Vault &rarr;</button>
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
                                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-blue-50 text-blue-700 border border-blue-100">Drafting</span>
                            </td>
                            <td class="px-5 py-3.5 text-right">
                                <button class="text-[11px] font-bold text-brand-600 hover:underline">Assets Vault &rarr;</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- RIGHT: Revision Access Tokens (1 Column) -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-card flex flex-col justify-between overflow-hidden">
            <div>
                <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="text-[13px] font-bold text-slate-850">Revision Tokens Manager</h3>
                    <button @click="showTokenModal = true; generatedToken = ''; newTokenProject = ''; newTokenExpiry = ''" class="text-[10px] font-bold text-indigo-600 bg-indigo-50 border border-indigo-150 px-2 py-1 rounded hover:bg-indigo-100 transition-colors">
                        + Generate
                    </button>
                </div>
                
                <div class="p-5 space-y-4">
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Gunakan token akses agar klien dapat mengakses portal ulasan/revisi desain secara mandiri tanpa harus login akun DNB.
                    </p>
                    
                    <!-- Token List -->
                    <div class="space-y-3">
                        <div class="bg-slate-50 border border-slate-200 p-3.5 rounded-xl space-y-2">
                            <div class="flex justify-between items-center">
                                <span class="font-bold font-mono text-xs text-slate-850 select-all">TOK-MB-7A2B</span>
                                <span class="text-[9px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-100 px-1.5 py-0.5 rounded">Unused</span>
                            </div>
                            <p class="text-[10px] text-slate-550">Target: PT Nusantara Foods</p>
                            <p class="text-[9px] text-slate-400 font-mono">Expires: 12 Jun 2026</p>
                        </div>
                        <div class="bg-slate-50 border border-slate-200 p-3.5 rounded-xl space-y-2">
                            <div class="flex justify-between items-center opacity-70">
                                <span class="font-bold font-mono text-xs text-slate-500 line-through">TOK-SN-9F1C</span>
                                <span class="text-[9px] font-bold bg-slate-200 text-slate-500 border border-slate-300 px-1.5 py-0.5 rounded">Used</span>
                            </div>
                            <p class="text-[10px] text-slate-500">Target: PT Maju Bersama</p>
                            <p class="text-[9px] text-slate-400 font-mono">Expires: expired</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="px-5 py-3 border-t border-slate-150 bg-slate-50/50 flex justify-between items-center text-[10px] text-slate-400">
                <span>Total Active Keys: 5</span>
                <span class="text-indigo-650 hover:underline cursor-pointer font-bold">Revoke All Keys</span>
            </div>
        </div>
    </div>

    <!-- GENERATE TOKEN MODAL -->
    <div x-show="showTokenModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-50 flex items-center justify-center p-4" x-cloak>
        <div class="bg-white border border-slate-200 w-full max-w-sm rounded-2xl shadow-2xl overflow-hidden" @click.away="showTokenModal = false">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50">
                <h3 class="text-sm font-bold text-slate-800">Generate Revision Access Token</h3>
                <button @click="showTokenModal = false" class="text-slate-400 hover:text-slate-655 text-lg">&times;</button>
            </div>
            
            <div class="p-6 space-y-4 text-xs">
                <div class="space-y-1.5">
                    <label class="block font-bold text-slate-550 uppercase tracking-wider">Select Project</label>
                    <select x-model="newTokenProject" class="w-full bg-slate-5  border border-slate-200 rounded-lg p-2.5 text-slate-800 focus:outline-none">
                        <option value="">-- Pilih Project --</option>
                        <option value="PT Nusantara Foods">PT Nusantara Foods (Sari Rasa)</option>
                        <option value="PT Maju Bersama">PT Maju Bersama (Rebranding)</option>
                        <option value="Startup Digital Indo">Startup Digital Indo (UI Guide)</option>
                    </select>
                </div>
                
                <div class="space-y-1.5">
                    <label class="block font-bold text-slate-550 uppercase tracking-wider">Expiration Days</label>
                    <select x-model="newTokenExpiry" class="w-full bg-slate-5  border border-slate-200 rounded-lg p-2.5 text-slate-800 focus:outline-none">
                        <option value="3">3 Hari</option>
                        <option value="7">7 Hari</option>
                        <option value="14">14 Hari</option>
                    </select>
                </div>
                
                <button @click="generatedToken = 'TOK-' + Math.random().toString(36).substring(2, 6).toUpperCase() + '-' + Math.random().toString(36).substring(2, 6).toUpperCase();" 
                        class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2.5 rounded-lg transition-colors shadow-sm">
                    Generate Token Key
                </button>
                
                <!-- Display token if generated -->
                <div x-show="generatedToken" class="bg-indigo-50 border border-indigo-150 p-4 rounded-xl text-center space-y-2" x-transition>
                    <p class="text-[10px] text-indigo-650 uppercase font-black tracking-widest">Access Key Generated</p>
                    <p class="text-base font-black font-mono text-indigo-700 select-all" x-text="generatedToken"></p>
                    <p class="text-[9px] text-slate-450">Klik dua kali untuk menyalin token key di atas.</p>
                </div>
            </div>
        </div>
    </div>
</div>
