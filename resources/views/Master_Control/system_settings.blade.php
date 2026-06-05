<div x-show="currentTab === 'system_settings'" class="space-y-5" x-cloak>
  
  <!-- System Settings Header -->
  <div class="flex items-center justify-between">
    <div>
      <h2 class="text-slate-800 font-bold text-base">System Settings Console</h2>
      <p class="text-slate-505 text-xs mt-0.5">Konfigurasi database divisi, server paths, integrasi API pihak ketiga, dan mail server secara terpusat.</p>
    </div>
    <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 px-2.5 py-1.5 rounded-lg animate-pulse">
      <i class="fa-solid fa-gears"></i>
      Central Engine Connected
    </span>
  </div>

  <!-- Settings Content Grid -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

    <!-- Left Column (Operational Division Nodes) -->
    <div class="lg:col-span-2 space-y-5">
      <div class="bg-white rounded-xl border border-slate-200 shadow-card overflow-hidden">
        <div class="flex items-center gap-2.5 px-5 py-4 border-b border-slate-100 bg-slate-50/50">
          <div class="w-7 h-7 rounded-lg bg-indigo-600 flex items-center justify-center">
            <i class="fa-solid fa-network-wired text-white text-xs"></i>
          </div>
          <div>
            <h3 class="text-[13px] font-bold text-slate-800">Operational Division Nodes</h3>
            <p class="text-[11px] text-slate-400">Konfigurasi domain, database, dan path lokal untuk 6 unit divisi</p>
          </div>
        </div>

        <!-- Division Config Cards Container -->
        <div class="p-5 space-y-4">
          <template x-for="div in divisionsConfig" :key="div.id">
            <div class="border border-slate-100 rounded-xl p-4 bg-slate-50/20 hover:bg-slate-50/60 hover:border-slate-200 transition-all duration-200 space-y-4">
              <!-- Division Card Header -->
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <span class="w-2.5 h-2.5 rounded-full" :style="'background-color: ' + div.color"></span>
                  <h4 class="text-xs font-bold text-slate-800" x-text="div.name"></h4>
                </div>
                <span class="text-[9px] font-mono font-bold text-slate-400 bg-slate-100 px-2 py-0.5 rounded" x-text="div.key"></span>
              </div>

              <!-- Input Fields Grid -->
              <div class="grid grid-cols-1 md:grid-cols-2 gap-3.5">
                <!-- Domain -->
                <div>
                  <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">Domain Name</label>
                  <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-2.5 flex items-center text-slate-400 text-[10px]">
                      <i class="fa-solid fa-globe"></i>
                    </span>
                    <input type="text" x-model="div.domain" placeholder="example.com"
                           class="w-full bg-white border border-slate-200 rounded-lg pl-7 pr-2.5 py-1.5 text-xs text-slate-700 placeholder-slate-350 focus:outline-none focus:border-indigo-500 transition-colors">
                  </div>
                </div>

                <!-- Local Directory Path -->
                <div>
                  <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">Local Directory Path</label>
                  <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-2.5 flex items-center text-slate-400 text-[10px]">
                      <i class="fa-solid fa-folder-open"></i>
                    </span>
                    <input type="text" x-model="div.folder" placeholder="/var/www/div-app"
                           class="w-full bg-white border border-slate-200 rounded-lg pl-7 pr-2.5 py-1.5 text-xs text-slate-700 placeholder-slate-350 focus:outline-none focus:border-indigo-500 transition-colors">
                  </div>
                </div>

                <!-- DB Name -->
                <div>
                  <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">Database Name</label>
                  <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-2.5 flex items-center text-slate-400 text-[10px]">
                      <i class="fa-solid fa-database"></i>
                    </span>
                    <input type="text" x-model="div.dbName" placeholder="db_name"
                           class="w-full bg-white border border-slate-200 rounded-lg pl-7 pr-2.5 py-1.5 text-xs text-slate-700 placeholder-slate-350 focus:outline-none focus:border-indigo-500 transition-colors">
                  </div>
                </div>

                <!-- DB User & Pass -->
                <div class="grid grid-cols-2 gap-2">
                  <div>
                    <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">DB User</label>
                    <input type="text" x-model="div.dbUser" placeholder="root"
                           class="w-full bg-white border border-slate-200 rounded-lg px-2 py-1.5 text-xs text-slate-700 placeholder-slate-350 focus:outline-none focus:border-indigo-500 transition-colors">
                  </div>
                  <div>
                    <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">DB Password</label>
                    <input type="password" x-model="div.dbPassword" placeholder="••••••••"
                           class="w-full bg-white border border-slate-200 rounded-lg px-2 py-1.5 text-xs text-slate-700 placeholder-slate-350 focus:outline-none focus:border-indigo-500 transition-colors">
                  </div>
                </div>
              </div>

              <!-- Connection & Save Actions -->
              <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
                <button @click="testDbConnection(div.id)"
                        class="bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-[10px] px-3 py-1.5 rounded-lg transition-colors flex items-center gap-1">
                  <i class="fa-solid fa-circle-notch animate-spin text-slate-400 hidden" :id="'spinner-' + div.id"></i>
                  <i class="fa-solid fa-plug-circle-check text-slate-400" :id="'plug-' + div.id"></i>
                  Test Connection
                </button>
                <button @click="saveDivisionConfig(div.id)"
                        class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-[10px] px-3.5 py-1.5 rounded-lg transition-colors flex items-center gap-1">
                  <i class="fa-solid fa-floppy-disk text-indigo-200"></i>
                  Save Config
                </button>
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>

    <!-- Right Column (Third-Party APIs & SMTP Gateway) -->
    <div class="space-y-5">
      
      <!-- API Integration Credentials -->
      <div class="bg-white rounded-xl border border-slate-200 shadow-card p-5 space-y-4">
        <h3 class="text-xs font-bold text-slate-700 uppercase tracking-widest flex items-center gap-2">
          <i class="fa-solid fa-plug text-indigo-500"></i>
          Third-Party Integrations
        </h3>
        <p class="text-[11px] text-slate-500 leading-relaxed">Kelola kunci API untuk otomatisasi cPanel dan pelacakan iklan Google/Meta Ads secara terpadu.</p>

        <div class="space-y-3">
          <!-- WHM/cPanel API Token -->
          <div>
            <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">cPanel / WHM API Token</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-2.5 flex items-center text-slate-400 text-xs">
                <i class="fa-solid fa-server"></i>
              </span>
              <input type="password" x-model="cpanelApiToken" placeholder="whm-api-token..."
                     class="w-full bg-slate-50 border border-slate-200 rounded-lg pl-8 pr-2.5 py-2 text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:border-indigo-500 transition-colors">
            </div>
          </div>

          <!-- Meta Ads Token -->
          <div>
            <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">Meta Ads Access Token</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-2.5 flex items-center text-slate-400 text-xs">
                <i class="fa-brands fa-facebook"></i>
              </span>
              <input type="password" x-model="metaAdsToken" placeholder="EAABw..."
                     class="w-full bg-slate-50 border border-slate-200 rounded-lg pl-8 pr-2.5 py-2 text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:border-indigo-500 transition-colors">
            </div>
          </div>

          <!-- Google Ads Token -->
          <div>
            <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">Google Ads Dev Token</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-2.5 flex items-center text-slate-400 text-xs">
                <i class="fa-brands fa-google"></i>
              </span>
              <input type="password" x-model="googleAdsToken" placeholder="gads-dev-token..."
                     class="w-full bg-slate-50 border border-slate-200 rounded-lg pl-8 pr-2.5 py-2 text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:border-indigo-500 transition-colors">
            </div>
          </div>
        </div>
      </div>

      <!-- SMTP Settings -->
      <div class="bg-white rounded-xl border border-slate-200 shadow-card p-5 space-y-4">
        <h3 class="text-xs font-bold text-slate-700 uppercase tracking-widest flex items-center gap-2">
          <i class="fa-solid fa-envelope text-indigo-500"></i>
          SMTP Mail Gateway
        </h3>
        <p class="text-[11px] text-slate-500 leading-relaxed">Pengaturan pengiriman notifikasi global, email tagihan, dan Magic Link token.</p>

        <div class="space-y-3">
          <!-- Host & Port -->
          <div class="grid grid-cols-3 gap-2">
            <div class="col-span-2">
              <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">SMTP Host</label>
              <input type="text" x-model="smtpHost" placeholder="smtp.mailtrap.io"
                     class="w-full bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-2 text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:border-indigo-500 transition-colors">
            </div>
            <div>
              <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">Port</label>
              <input type="text" x-model="smtpPort" placeholder="587"
                     class="w-full bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-2 text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:border-indigo-500 transition-colors">
            </div>
          </div>

          <!-- User & Password -->
          <div>
            <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">SMTP Username</label>
            <input type="text" x-model="smtpUser" placeholder="username-smtp"
                   class="w-full bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-2 text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:border-indigo-500 transition-colors">
          </div>
          <div>
            <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">SMTP Password</label>
            <input type="password" x-model="smtpPassword" placeholder="••••••••"
                   class="w-full bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-2 text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:border-indigo-500 transition-colors">
          </div>
        </div>

        <!-- Save Global Settings Button -->
        <div class="pt-2 border-t border-slate-100">
          <button @click="saveGlobalSettings()"
                  class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-xs py-2 rounded-lg transition-all shadow-lg shadow-indigo-600/15 hover:shadow-indigo-600/25 active:scale-[0.99] w-full flex items-center justify-center gap-1.5">
            <i class="fa-solid fa-floppy-disk"></i>
            Save Global Settings
          </button>
        </div>
      </div>

    </div>

  </div>

</div>
