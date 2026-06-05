<div x-show="currentTab === 'access_control'" class="space-y-5" x-cloak>
  
  <!-- Access Control Header -->
  <div class="flex items-center justify-between">
    <div>
      <h2 class="text-slate-800 font-bold text-base">Access Control Panel</h2>
      <p class="text-slate-500 text-xs mt-0.5">Kelola izin sub-admin, whitelist IP, dan buat token review untuk klien divisi.</p>
    </div>
    <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-indigo-700 bg-indigo-50 border border-indigo-200 px-2.5 py-1.5 rounded-lg">
      <i class="fa-solid fa-shield-halved"></i>
      Security Engine Active
    </span>
  </div>

  <!-- Two Columns Grid -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

    <!-- Left Column (Sub-Admins & Permissions Table) -->
    <div class="lg:col-span-2 space-y-5">
      <div class="bg-white rounded-xl border border-slate-200 shadow-card overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
          <div class="flex items-center gap-2.5">
            <div class="w-7 h-7 rounded-lg bg-indigo-600 flex items-center justify-center">
              <i class="fa-solid fa-user-shield text-white text-xs"></i>
            </div>
            <div>
              <h3 class="text-[13px] font-bold text-slate-800">Sub-Admin Directory</h3>
              <p class="text-[11px] text-slate-400">Daftar admin divisi dengan akses ter-kontrol</p>
            </div>
          </div>
          <button @click="alert('Menambahkan sub-admin baru...')" class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-[11px] px-3 py-1.5 rounded-lg transition-colors">
            + Add Admin
          </button>
        </div>

        <!-- Sub-Admins Table -->
        <div class="overflow-x-auto">
          <table class="w-full text-left">
            <thead>
              <tr class="bg-slate-50 border-b border-slate-100 text-[10px] font-bold uppercase tracking-widest text-slate-400">
                <th class="px-5 py-3">Nama Admin</th>
                <th class="px-4 py-3">Divisi</th>
                <th class="px-4 py-3">Izin Akses</th>
                <th class="px-4 py-3 text-center">Status</th>
                <th class="px-5 py-3 text-right">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-xs text-slate-650">
              <template x-for="admin in subAdmins" :key="admin.id">
                <tr class="hover:bg-slate-50 transition-colors">
                  <td class="px-5 py-3.5 flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-slate-650 text-[10px]" x-text="admin.initials"></div>
                    <div>
                      <p class="font-bold text-slate-800" x-text="admin.name"></p>
                      <p class="text-[10px] text-slate-400" x-text="admin.email"></p>
                    </div>
                  </td>
                  <td class="px-4 py-3.5">
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase" :class="admin.divBadge" x-text="admin.division"></span>
                  </td>
                  <td class="px-4 py-3.5 font-mono text-slate-500" x-text="admin.role"></td>
                  <td class="px-4 py-3.5 text-center">
                    <span class="sdot inline-block" :class="admin.status === 'active' ? 'green' : 'yellow'"></span>
                  </td>
                  <td class="px-5 py-3.5 text-right space-x-1.5">
                    <button @click="alert('Mengedit profil admin: ' + admin.name)" class="text-blue-600 hover:text-blue-700 font-semibold">Edit</button>
                    <button @click="admin.status = (admin.status === 'active' ? 'suspended' : 'active')" class="text-red-650 hover:text-red-700 font-semibold" x-text="admin.status === 'active' ? 'Suspend' : 'Activate'"></button>
                  </td>
                </tr>
              </template>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Right Column (IP Security Policies & Magic Link Generator) -->
    <div class="space-y-5">
      <!-- 1. IP Lock Guard Policy -->
      <div class="bg-white rounded-xl border border-slate-200 shadow-card p-5 space-y-4">
        <h3 class="text-xs font-bold text-slate-700 uppercase tracking-widest flex items-center gap-2">
          <i class="fa-solid fa-lock text-indigo-500"></i>
          IP Lock Guard Policy
        </h3>
        <div class="flex items-center justify-between bg-slate-50 border border-slate-200 p-3 rounded-lg">
          <div class="min-w-0">
            <span class="text-xs font-bold text-slate-800 block">IP Restrict Policy</span>
            <span class="text-[10px] text-slate-500">Batasi login hanya untuk IP terdaftar</span>
          </div>
          <!-- Toggle switch -->
          <button @click="ipLockEnabled = !ipLockEnabled"
                  class="w-10 h-6 rounded-full transition-colors relative flex items-center"
                  :class="ipLockEnabled ? 'bg-indigo-600' : 'bg-slate-300'">
            <span class="w-4.5 h-4.5 rounded-full bg-white transition-transform absolute shadow"
                  :class="ipLockEnabled ? 'translate-x-5' : 'translate-x-0.5'"></span>
          </button>
        </div>

        <!-- Whitelist Input area -->
        <div x-show="ipLockEnabled" class="space-y-2" x-transition x-cloak>
          <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Whitelisted IPs</label>
          <textarea class="w-full bg-slate-50 border border-slate-200 rounded-lg p-2.5 text-xs font-mono text-slate-700 placeholder-slate-400 focus:outline-none focus:border-indigo-500"
                    rows="3" placeholder="Masukkan IP address per baris...&#10;114.125.42.189&#10;192.168.1.1"></textarea>
          <button @click="alert('Whitelist IP Guard berhasil diperbarui!')" class="bg-slate-800 hover:bg-slate-700 text-white font-semibold text-[10px] px-3 py-1.5 rounded transition-colors w-full">
            Update Whitelist Policy
          </button>
        </div>
      </div>

      <!-- 2. Magic Link Token Generator -->
      <div class="bg-white rounded-xl border border-slate-200 shadow-card p-5 space-y-4">
        <h3 class="text-xs font-bold text-slate-700 uppercase tracking-widest flex items-center gap-2">
          <i class="fa-solid fa-key text-indigo-500"></i>
          Magic Link Delegator
        </h3>
        <p class="text-[11px] text-slate-500 leading-relaxed">Buat token review otomatis untuk klien melihat progres file tanpa login dashboard.</p>
        
        <div class="space-y-3">
          <div>
            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Pilih Klien</label>
            <select x-model="magicLinkClient" class="w-full bg-slate-50 border border-slate-200 rounded-lg p-2 text-xs text-slate-700 focus:outline-none focus:border-indigo-500">
              <option value="">-- Pilih Klien --</option>
              <option value="PT Maju Bersama">PT Maju Bersama</option>
              <option value="CV Kreasi Digital">CV Kreasi Digital</option>
              <option value="Startup Nusantara">Startup Nusantara</option>
            </select>
          </div>
          <div>
            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Divisi Proyek</label>
            <select x-model="magicLinkDiv" class="w-full bg-slate-50 border border-slate-200 rounded-lg p-2 text-xs text-slate-700 focus:outline-none focus:border-indigo-500">
              <option value="">-- Pilih Divisi --</option>
              <option value="Web Dev">Web Development</option>
              <option value="Brand Identity">Brand Identity</option>
              <option value="Video Production">Video Production</option>
            </select>
          </div>
          <button @click="generateMagicLink()"
                  class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-xs py-2 rounded-lg transition-colors w-full flex items-center justify-center gap-1.5 shadow-lg shadow-indigo-600/15">
            <i class="fa-solid fa-wand-magic-sparkles"></i>
            Generate Access Link
          </button>
        </div>

        <!-- Output Generated URL -->
        <div x-show="generatedLink" class="bg-indigo-50 border border-indigo-100 p-3 rounded-lg space-y-2" x-transition x-cloak>
          <span class="text-[10px] font-bold text-indigo-855 uppercase tracking-wide block">Generated Access Token Link</span>
          <div class="flex items-center justify-between gap-2">
            <input type="text" x-model="generatedLink" readonly class="bg-white border border-indigo-200 rounded p-1 text-[10px] font-mono text-slate-650 flex-1 focus:outline-none">
            <button @click="navigator.clipboard.writeText(generatedLink); alert('Link disalin!')"
                    class="bg-indigo-600 text-white p-1.5 rounded hover:bg-indigo-750 transition-colors flex-shrink-0"
                    title="Copy Link">
              <i class="fa-regular fa-copy text-xs"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
