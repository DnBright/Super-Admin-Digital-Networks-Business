<div x-show="currentTab === 'client_directory'" class="space-y-5" x-cloak>
  
  <!-- Client Directory Header -->
  <div class="flex items-center justify-between">
    <div>
      <h2 class="text-slate-800 font-bold text-base">Central Client Directory</h2>
      <p class="text-slate-505 text-xs mt-0.5">Daftar lengkap akun klien di seluruh 6 divisi operasional terintegrasi.</p>
    </div>
    <button @click="alert('Menambahkan akun klien baru...')" class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-xs px-3.5 py-2 rounded-lg transition-all shadow-md shadow-indigo-600/15 flex items-center gap-1.5">
      <i class="fa-solid fa-user-plus"></i> Add New Client
    </button>
  </div>

  <!-- Clients Cards Directory Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
    <template x-for="cli in clientDirectory" :key="cli.id">
      <div class="bg-white rounded-xl border border-slate-200 shadow-card p-5 space-y-4 hover:border-slate-350 transition-all duration-200">
        
        <!-- Client Main Info -->
        <div class="flex items-start justify-between">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center font-black text-slate-650 border border-slate-200 text-sm" x-text="cli.name.split(' ').map(n => n[0]).join('')"></div>
            <div>
              <h3 class="text-xs font-bold text-slate-800" x-text="cli.name"></h3>
              <p class="text-[10px] text-slate-400" x-text="'Pic: ' + cli.contact"></p>
            </div>
          </div>
          
          <!-- Status Badge -->
          <span class="px-2 py-0.5 rounded text-[9px] font-bold uppercase"
                :class="cli.status === 'active' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-550 border border-slate-200'"
                x-text="cli.status"></span>
        </div>

        <!-- Contact detail info -->
        <div class="space-y-2 text-xs text-slate-650 border-t border-b border-slate-100 py-3">
          <div class="flex items-center gap-2">
            <i class="fa-regular fa-envelope text-slate-400 text-[10px] w-3"></i>
            <span x-text="cli.email" class="font-mono text-[10px]"></span>
          </div>
          <div class="flex items-center gap-2">
            <i class="fa-solid fa-phone text-slate-400 text-[10px] w-3"></i>
            <span x-text="cli.phone" class="font-mono text-[10px]"></span>
          </div>
          <div class="flex items-center gap-2">
            <i class="fa-solid fa-user-tie text-slate-400 text-[10px] w-3"></i>
            <span>Manager: <strong class="text-slate-700" x-text="cli.manager"></strong></span>
          </div>
        </div>

        <!-- Active Services / Division Nodes mapping -->
        <div>
          <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wide mb-2">Active Services Nodes</p>
          <div class="flex flex-wrap gap-1.5">
            <template x-for="srv in cli.services">
              <span class="inline-flex items-center text-[9px] font-bold text-slate-650 bg-slate-50 border border-slate-200 px-2.5 py-1 rounded" x-text="srv"></span>
            </template>
          </div>
        </div>

        <!-- Action triggers -->
        <div class="flex gap-2 pt-2">
          <!-- Magic link trigger -->
          <button @click="magicLinkClient = cli.name; currentTab = 'access_control'; alert('Silahkan pilih divisi proyek untuk membuat link token ' + cli.name)"
                  class="flex-1 bg-slate-50 hover:bg-slate-100 text-slate-650 border border-slate-200 font-bold text-[10px] py-2 rounded-lg transition-colors flex items-center justify-center gap-1">
            <i class="fa-solid fa-key text-slate-400"></i> Magic Link
          </button>
          <!-- Toggle suspend status -->
          <button @click="cli.status = (cli.status === 'active' ? 'suspended' : 'active')"
                  class="flex-1 bg-slate-50 hover:bg-slate-100 font-bold text-[10px] py-2 rounded-lg transition-colors flex items-center justify-center gap-1"
                  :class="cli.status === 'active' ? 'text-rose-600' : 'text-emerald-600'">
            <i class="fa-solid" :class="cli.status === 'active' ? 'fa-user-slash' : 'fa-user-check'"></i>
            <span x-text="cli.status === 'active' ? 'Suspend' : 'Activate'"></span>
          </button>
        </div>

      </div>
    </template>
  </div>

</div>
