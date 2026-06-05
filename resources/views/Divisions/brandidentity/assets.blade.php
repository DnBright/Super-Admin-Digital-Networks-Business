<div x-show="currentTab === 'brandidentity_assets'" class="space-y-6" x-cloak>
    <!-- Assets Vault Header -->
    <div class="flex items-center justify-between bg-white p-4 rounded-xl border border-slate-200 shadow-card">
        <div>
            <h3 class="text-sm font-bold text-slate-850 uppercase tracking-wider">Asset Handover Vault</h3>
            <p class="text-xs text-slate-500 mt-0.5">Kelola logo vector master, panduan brand guidelines, dan berkas serah terima ulasan klien</p>
        </div>
        <button class="bg-blue-600 hover:bg-blue-500 text-white font-semibold text-xs px-4 py-2 rounded-lg transition-colors border border-blue-500/30 shadow flex items-center gap-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
            Upload Asset File
        </button>
    </div>

    <!-- Client Folders Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Folder 1 -->
        <div class="bg-white border border-slate-200 shadow-card rounded-xl p-5 space-y-4 card-hover">
            <div class="flex items-start justify-between">
                <div class="flex items-center gap-3">
                    <span class="text-2xl text-amber-500"><i class="fa-solid fa-folder-closed"></i></span>
                    <div>
                        <h4 class="text-xs font-bold text-slate-800">PT Nusantara Foods</h4>
                        <p class="text-[10px] text-slate-400">4 Assets &bull; 82.4 MB</p>
                    </div>
                </div>
                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-amber-50 text-amber-700 border border-amber-100 uppercase">Active</span>
            </div>
            
            <div class="divide-y divide-slate-100 text-xs text-slate-650 pt-2 border-t border-slate-100">
                <div class="py-2 flex justify-between items-center">
                    <span class="truncate pr-4"><i class="fa-regular fa-file-pdf mr-1.5 text-rose-500"></i>Nusantara_Brand_Book_v2.pdf</span>
                    <button class="text-indigo-650 font-bold hover:underline">Download</button>
                </div>
                <div class="py-2 flex justify-between items-center">
                    <span class="truncate pr-4"><i class="fa-regular fa-image mr-1.5 text-blue-500"></i>Nusantara_Logo_Color_HighRes.png</span>
                    <button class="text-indigo-650 font-bold hover:underline">Download</button>
                </div>
                <div class="py-2 flex justify-between items-center">
                    <span class="truncate pr-4"><i class="fa-solid fa-file-invoice mr-1.5 text-slate-400"></i>Nusantara_Logo_Vector_Source.ai</span>
                    <button class="text-indigo-650 font-bold hover:underline">Download</button>
                </div>
            </div>
        </div>

        <!-- Folder 2 -->
        <div class="bg-white border border-slate-200 shadow-card rounded-xl p-5 space-y-4 card-hover">
            <div class="flex items-start justify-between">
                <div class="flex items-center gap-3">
                    <span class="text-2xl text-amber-500"><i class="fa-solid fa-folder-closed"></i></span>
                    <div>
                        <h4 class="text-xs font-bold text-slate-800">PT Maju Bersama</h4>
                        <p class="text-[10px] text-slate-400">3 Assets &bull; 114.5 MB</p>
                    </div>
                </div>
                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-emerald-50 text-emerald-700 border border-emerald-100 uppercase">Handover</span>
            </div>
            
            <div class="divide-y divide-slate-100 text-xs text-slate-650 pt-2 border-t border-slate-100">
                <div class="py-2 flex justify-between items-center">
                    <span class="truncate pr-4"><i class="fa-regular fa-file-pdf mr-1.5 text-rose-500"></i>MB_Rebranding_Guidelines.pdf</span>
                    <button class="text-indigo-650 font-bold hover:underline">Download</button>
                </div>
                <div class="py-2 flex justify-between items-center">
                    <span class="truncate pr-4"><i class="fa-regular fa-file-zipper mr-1.5 text-amber-600"></i>MB_Packaging_Vector_Set.zip</span>
                    <button class="text-indigo-650 font-bold hover:underline">Download</button>
                </div>
                <div class="py-2 flex justify-between items-center border-b border-slate-100">
                    <span class="truncate pr-4"><i class="fa-regular fa-image mr-1.5 text-blue-500"></i>MB_Brandmark_Black.png</span>
                    <button class="text-indigo-650 font-bold hover:underline">Download</button>
                </div>
            </div>
        </div>

        <!-- Folder 3 -->
        <div class="bg-white border border-slate-200 shadow-card rounded-xl p-5 space-y-4 card-hover">
            <div class="flex items-start justify-between">
                <div class="flex items-center gap-3">
                    <span class="text-2xl text-amber-500"><i class="fa-solid fa-folder-closed"></i></span>
                    <div>
                        <h4 class="text-xs font-bold text-slate-800">Startup Digital Indo</h4>
                        <p class="text-[10px] text-slate-400">2 Assets &bull; 12.8 MB</p>
                    </div>
                </div>
                <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-blue-50 text-blue-750 border border-blue-100 uppercase">Drafting</span>
            </div>
            
            <div class="divide-y divide-slate-100 text-xs text-slate-650 pt-2 border-t border-slate-100">
                <div class="py-2 flex justify-between items-center">
                    <span class="truncate pr-4"><i class="fa-regular fa-file-pdf mr-1.5 text-rose-500"></i>UI_Styleguide_Staging_v1.pdf</span>
                    <button class="text-indigo-650 font-bold hover:underline">Download</button>
                </div>
                <div class="py-2 flex justify-between items-center border-b border-slate-100">
                    <span class="truncate pr-4"><i class="fa-regular fa-image mr-1.5 text-blue-500"></i>Styleguide_Palettes.png</span>
                    <button class="text-indigo-650 font-bold hover:underline">Download</button>
                </div>
            </div>
        </div>
    </div>
</div>
