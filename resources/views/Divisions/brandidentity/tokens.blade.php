<div x-show="currentTab === 'brandidentity_tokens'" class="space-y-6" x-data="{ showTokenModal: false, newTokenProject: '', newTokenExpiry: '', generatedToken: '' }" x-cloak>
    <!-- Tokens Header -->
    <div class="flex items-center justify-between bg-white p-4 rounded-xl border border-slate-200 shadow-card">
        <div>
            <h3 class="text-sm font-bold text-slate-850 uppercase tracking-wider">Revision Tokens Manager</h3>
            <p class="text-xs text-slate-500 mt-0.5">Kelola dan generate token akses khusus bagi ulasan revisi desain klien UMKM secara mandiri</p>
        </div>
        <button @click="showTokenModal = true; generatedToken = ''; newTokenProject = ''; newTokenExpiry = ''" class="bg-indigo-600 hover:bg-indigo-550 text-white font-semibold text-xs px-4 py-2 rounded-lg transition-colors border border-indigo-500/30 shadow flex items-center gap-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Generate Access Token
        </button>
    </div>

    <!-- Active Tokens Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Token Card 1 -->
        <div class="bg-white border border-slate-200 shadow-card rounded-xl p-5 space-y-4 card-hover flex flex-col justify-between">
            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <span class="font-bold font-mono text-xs text-slate-850 select-all p-1 bg-slate-50 border border-slate-200 rounded">TOK-MB-7A2B</span>
                    <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-emerald-50 text-emerald-700 border border-emerald-100 uppercase">Unused</span>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-800">PT Nusantara Foods</h4>
                    <p class="text-[10px] text-slate-400">Sari Rasa Packaging & Logo</p>
                </div>
                <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-[10px] text-slate-550 font-mono">
                    <span>Expires: 12 Jun 2026</span>
                    <span>7 Days left</span>
                </div>
            </div>
            
            <div class="pt-4 flex justify-between items-center text-xs">
                <button class="text-slate-500 hover:text-slate-700 font-semibold">Copy Token</button>
                <button class="text-rose-600 hover:text-rose-700 font-bold">Revoke Key</button>
            </div>
        </div>

        <!-- Token Card 2 -->
        <div class="bg-white border border-slate-200 shadow-card rounded-xl p-5 space-y-4 card-hover flex flex-col justify-between opacity-75">
            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <span class="font-bold font-mono text-xs text-slate-400 line-through p-1 bg-slate-50 border border-slate-200 rounded">TOK-SN-9F1C</span>
                    <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-slate-100 text-slate-500 border border-slate-200 uppercase">Used</span>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-550">PT Maju Bersama</h4>
                    <p class="text-[10px] text-slate-400">Brand Rebranding Kit</p>
                </div>
                <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-[10px] text-slate-400 font-mono">
                    <span>Expires: expired</span>
                    <span>Used 3 days ago</span>
                </div>
            </div>
            
            <div class="pt-4 flex justify-end text-xs">
                <button class="text-slate-400 hover:text-rose-600 font-bold">Delete History</button>
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
