<div x-show="currentTab === 'global_command'" class="space-y-5" x-cloak>

  <!-- Page intro row -->
  <div class="flex items-center justify-between slide-up">
    <div>
      <p class="text-slate-800 font-bold text-base">Halo, Budi 👋</p>
      <p class="text-slate-500 text-xs mt-0.5">Senin, 2 Juni 2025 · Real-time monitoring aktif</p>
    </div>
    <div class="flex items-center gap-2">
      <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 px-2.5 py-1.5 rounded-lg">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
        All Systems Monitoring
      </span>
    </div>
  </div>

  <!-- ======================================================
       SECTION: TOP-LEVEL METRIC CARDS
  ====================================================== -->
  <section class="grid grid-cols-1 sm:grid-cols-3 gap-4">

    <!-- Card 1: Active Projects -->
    <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 slide-up delay-1">
      <div class="flex items-start justify-between mb-3">
        <div>
          <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Active Projects</p>
          <p class="text-4xl font-black text-slate-900 mt-1 leading-none tabular-nums">128</p>
        </div>
        <div class="w-10 h-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center flex-shrink-0">
          <i class="fa-solid fa-diagram-project text-blue-500 text-sm"></i>
        </div>
      </div>
      <!-- Trend -->
      <div class="flex items-center gap-2 mb-4">
        <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200">
          <i class="fa-solid fa-arrow-trend-up text-[9px]"></i> +12.4%
        </span>
        <span class="text-[11px] text-slate-400">vs last month</span>
      </div>
      <!-- Sparkline -->
      <div class="flex items-end gap-0.5 h-9">
        <template x-for="(h, i) in spark1" :key="i">
          <div class="flex-1 spark-bar rounded-sm"
               :class="i === spark1.length - 1 ? 'bg-blue-500' : 'bg-slate-100'"
               :style="'height:' + h + '%'"></div>
        </template>
      </div>
      <p class="text-[10px] text-slate-400 mt-1.5 font-mono">6 divisi · 47 klien aktif</p>
    </div>

    <!-- Card 2: Global Revenue MRR -->
    <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 slide-up delay-2">
      <div class="flex items-start justify-between mb-3">
        <div>
          <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Global Revenue MRR</p>
          <p class="text-3xl font-black text-slate-900 mt-1 leading-none">Rp 4,5 M</p>
          <p class="text-[11px] font-mono text-slate-400 mt-0.5">Rp 4.520.000.000</p>
        </div>
        <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
          <i class="fa-solid fa-money-bill-trend-up text-emerald-500 text-sm"></i>
        </div>
      </div>
      <div class="flex items-center gap-2 mb-4">
        <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200">
          <i class="fa-solid fa-arrow-trend-up text-[9px]"></i> +8.7%
        </span>
        <span class="text-[11px] text-slate-400">vs last month</span>
      </div>
      <!-- Division breakdown mini bars -->
      <div class="space-y-1.5">
        <template x-for="seg in revenueSegs" :key="seg.label">
          <div class="flex items-center gap-2">
            <span class="text-[10px] text-slate-500 w-16 truncate" x-text="seg.label"></span>
            <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden">
              <div class="h-full rounded-full" :class="seg.color" :style="'width:' + seg.pct + '%'"></div>
            </div>
            <span class="text-[10px] font-mono text-slate-500 w-8 text-right" x-text="seg.pct + '%'"></span>
          </div>
        </template>
      </div>
    </div>

    <!-- Card 3: Resource Health & API Quota -->
    <div class="card-hover bg-white rounded-xl border border-slate-200 shadow-card p-5 slide-up delay-3">
      <div class="flex items-start justify-between mb-3">
        <div>
          <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Resource Health</p>
          <div class="flex items-baseline gap-1.5 mt-1">
            <p class="text-4xl font-black leading-none" style="color:#f97316">82</p>
            <p class="text-xl font-black text-slate-400 leading-none">%</p>
          </div>
        </div>
        <div class="w-10 h-10 rounded-xl bg-orange-50 border border-orange-100 flex items-center justify-center flex-shrink-0">
          <i class="fa-solid fa-server text-orange-500 text-sm"></i>
        </div>
      </div>
      <div class="flex items-center gap-2 mb-4">
        <span class="inline-flex items-center gap-1 text-[11px] font-bold text-orange-700 bg-orange-50 px-2 py-0.5 rounded-full border border-orange-200">
          <i class="fa-solid fa-triangle-exclamation text-[9px]"></i> Waspada
        </span>
        <span class="text-[11px] text-slate-400">API Quota kritis</span>
      </div>
      <!-- Progress bars -->
      <div class="space-y-2.5">
        <template x-for="res in resources" :key="res.label">
          <div>
            <div class="flex justify-between text-[10px] text-slate-500 mb-1">
              <span x-text="res.label"></span>
              <span class="font-mono font-semibold" :class="res.textColor" x-text="res.val + '%'"></span>
            </div>
            <div class="h-1.5 bg-slate-100 rounded-full overflow-hidden relative">
              <div class="h-full rounded-full relative overflow-hidden shimmer-bar"
                   :class="res.barColor"
                   :style="'width:' + res.val + '%'"></div>
            </div>
          </div>
        </template>
      </div>
    </div>

  </section>
  <!-- END METRIC CARDS -->

  <!-- ======================================================
       SECTION: CROSS-DIVISION CLIENT MATRIX
  ====================================================== -->
  <section class="bg-white rounded-xl border border-slate-200 shadow-card overflow-hidden slide-up delay-4">

    <!-- Section header -->
    <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
      <div class="flex items-center gap-3">
        <div class="w-7 h-7 rounded-lg bg-slate-900 flex items-center justify-center flex-shrink-0">
          <i class="fa-solid fa-table-cells text-white text-xs"></i>
        </div>
        <div>
          <h2 class="text-[13px] font-bold text-slate-800">Cross-Division Client Matrix</h2>
          <p class="text-[11px] text-slate-400">Status layanan real-time per klien</p>
        </div>
      </div>
      <div class="flex items-center gap-3">
        <!-- Legend -->
        <div class="hidden md:flex items-center gap-3 text-[11px] text-slate-550">
          <span class="flex items-center gap-1.5"><span class="sdot green"></span>Aktif</span>
          <span class="flex items-center gap-1.5"><span class="sdot yellow"></span>Pending</span>
          <span class="flex items-center gap-1.5"><span class="sdot gray"></span>Idle</span>
        </div>
        <button class="text-[11px] font-medium text-slate-500 hover:text-slate-700 bg-slate-50 border border-slate-200 px-3 py-1.5 rounded-lg hover:bg-slate-100 transition-colors flex items-center gap-1.5">
          <i class="fa-solid fa-filter text-[10px]"></i>Filter
        </button>
      </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="bg-slate-50 border-b border-slate-100">
            <th class="px-5 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400 whitespace-nowrap">Klien</th>
            <th class="px-4 py-3 text-center text-[10px] font-bold uppercase tracking-widest text-slate-400 whitespace-nowrap">
              <i class="fa-solid fa-code mr-1 text-blue-400"></i>Web Dev
            </th>
            <th class="px-4 py-3 text-center text-[10px] font-bold uppercase tracking-widest text-slate-400 whitespace-nowrap">
              <i class="fa-solid fa-palette mr-1 text-purple-400"></i>Brand ID
            </th>
            <th class="px-4 py-3 text-center text-[10px] font-bold uppercase tracking-widest text-slate-400 whitespace-nowrap">
              <i class="fa-solid fa-bullhorn mr-1 text-orange-400"></i>Perf. Ads
            </th>
            <th class="px-4 py-3 text-center text-[10px] font-bold uppercase tracking-widest text-slate-400 whitespace-nowrap">
              <i class="fa-solid fa-cube mr-1 text-cyan-400"></i>3D Mockup
            </th>
            <th class="px-4 py-3 text-center text-[10px] font-bold uppercase tracking-widest text-slate-400 whitespace-nowrap">
              <i class="fa-solid fa-hashtag mr-1 text-pink-400"></i>SocMed
            </th>
            <th class="px-4 py-3 text-center text-[10px] font-bold uppercase tracking-widest text-slate-400 whitespace-nowrap">
              <i class="fa-solid fa-film mr-1 text-red-400"></i>Video Prod
            </th>
            <th class="px-5 py-3 text-center text-[10px] font-bold uppercase tracking-widest text-slate-400 whitespace-nowrap">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
          <template x-for="client in clients" :key="client.id">
            <tr class="trow transition-colors" :class="client.overdue ? 'overdue' : ''">

              <!-- Client name -->
              <td class="px-5 py-3.5">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-lg flex items-center justify-center text-[11px] font-black flex-shrink-0"
                       :style="'background:' + client.avatarBg + '; color:' + client.avatarColor">
                    <span x-text="client.initials"></span>
                  </div>
                  <div class="min-w-0">
                    <div class="flex items-center gap-2 flex-wrap">
                      <span class="text-[13px] font-semibold text-slate-800" x-text="client.name"></span>
                      <span x-show="client.overdue"
                            class="badge-overdue inline-flex items-center gap-1 text-[9px] font-black uppercase tracking-wide text-red-700 bg-red-100 border border-red-200 px-1.5 py-0.5 rounded-md">
                        <i class="fa-solid fa-circle-exclamation text-[8px]"></i>OVERDUE
                      </span>
                    </div>
                    <p class="text-[10px] text-slate-400 mt-0.5" x-text="client.sub"></p>
                  </div>
                </div>
              </td>

              <!-- Division dots -->
              <template x-for="stat in client.stats" :key="stat">
                <td class="px-4 py-3.5 text-center">
                  <span class="sdot inline-block" :class="stat"></span>
                </td>
              </template>

              <!-- Action -->
              <td class="px-5 py-3.5 text-center">
                <template x-if="client.overdue">
                  <button class="inline-flex items-center gap-1.5 text-[11px] font-bold text-red-700 bg-red-50 border border-red-200 hover:bg-red-100 transition-colors px-3 py-1.5 rounded-lg">
                    <i class="fa-solid fa-lock text-[10px]"></i>Lock Akun
                  </button>
                </template>
                <template x-if="!client.overdue">
                  <button class="inline-flex items-center gap-1.5 text-[11px] font-medium text-blue-600 bg-blue-550 border border-blue-200 hover:bg-blue-100 transition-colors px-3 py-1.5 rounded-lg">
                    <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>Detail
                  </button>
                </template>
              </td>

            </tr>
          </template>
        </tbody>
      </table>
    </div>

    <!-- Table footer -->
    <div class="flex items-center justify-between px-5 py-3 border-t border-slate-100 bg-slate-50/50">
      <p class="text-[11px] text-slate-400">Menampilkan <strong class="text-slate-600">3</strong> dari <strong class="text-slate-600">47</strong> klien aktif</p>
      <a href="#" class="text-[11px] font-semibold text-brand-600 hover:text-brand-700 transition-colors">
        Lihat Semua Klien <i class="fa-solid fa-arrow-right text-[9px] ml-1"></i>
      </a>
    </div>

  </section>
  <!-- END CLIENT MATRIX -->

  <!-- ======================================================
       SECTION: LIVE AUDIT TRAIL
  ====================================================== -->
  <section class="bg-white rounded-xl border border-slate-200 shadow-card overflow-hidden slide-up delay-5">

    <!-- Section header -->
    <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
      <div class="flex items-center gap-3">
        <div class="w-7 h-7 rounded-lg bg-slate-900 flex items-center justify-center flex-shrink-0">
          <i class="fa-solid fa-scroll text-white text-xs"></i>
        </div>
        <div>
          <h2 class="text-[13px] font-bold text-slate-800">Live Audit Trail</h2>
          <p class="text-[11px] text-slate-400">Aktivitas terkini seluruh sub-admin</p>
        </div>
      </div>
      <div class="flex items-center gap-2">
        <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 px-2.5 py-1.5 rounded-lg">
          <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
          Live
        </span>
        <button class="text-[11px] font-medium text-slate-505 bg-slate-50 border border-slate-200 hover:bg-slate-100 transition-colors px-3 py-1.5 rounded-lg flex items-center gap-1.5">
          <i class="fa-solid fa-download text-[10px]"></i>Export
        </button>
      </div>
    </div>

    <!-- Audit log feed -->
    <div class="px-5 py-5 space-y-5">
      <template x-for="(log, index) in auditLogs" :key="log.id">
        <div class="audit-item" :style="'animation-delay:' + (index * 0.08 + 0.2) + 's'">
          <!-- Icon -->
          <div class="audit-icon" :class="log.iconBg">
            <i :class="log.icon + ' text-white'"></i>
          </div>
          <!-- Content -->
          <div class="min-w-0">
            <div class="flex items-start justify-between gap-3">
              <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 flex-wrap mb-0.5">
                  <span class="text-[12px] font-bold text-slate-800" x-text="log.actor"></span>
                  <span class="text-[9px] font-bold uppercase tracking-wider px-1.5 py-0.5 rounded-md"
                        :class="log.divBadge" x-text="log.division"></span>
                </div>
                <p class="text-[12px] text-slate-650 leading-relaxed" x-text="log.action"></p>
                <!-- Meta chips -->
                <div class="flex flex-wrap items-center gap-2 mt-1.5">
                  <template x-if="log.amount">
                    <span class="inline-flex items-center gap-1 text-[10px] font-mono font-semibold text-slate-700 bg-slate-100 border border-slate-200 px-1.5 py-0.5 rounded">
                      <i class="fa-solid fa-money-bill-wave text-emerald-500 text-[9px]"></i>
                      <span x-text="log.amount"></span>
                    </span>
                  </template>
                  <template x-if="log.target">
                    <span class="inline-flex items-center gap-1 text-[10px] text-slate-500">
                      <i class="fa-solid fa-user text-slate-300 text-[9px]"></i>
                      <span x-text="log.target"></span>
                    </span>
                  </template>
                  <template x-if="log.platform">
                    <span class="inline-flex items-center gap-1 text-[10px] text-slate-500">
                      <i class="fa-brands fa-meta text-blue-400 text-[9px]"></i>
                      <span x-text="log.platform"></span>
                    </span>
                  </template>
                </div>
              </div>
              <span class="text-[10px] font-mono text-slate-400 whitespace-nowrap flex-shrink-0 mt-0.5" x-text="log.time"></span>
            </div>
          </div>
        </div>
      </template>
    </div>

    <!-- Footer -->
    <div class="flex items-center justify-between px-5 py-3 border-t border-slate-100 bg-slate-50/50">
      <p class="text-[11px] text-slate-400">Menampilkan <strong class="text-slate-600">3</strong> dari <strong class="text-slate-600">47</strong> klien aktif</p>
      <a href="#" class="text-[11px] font-semibold text-brand-600 hover:text-brand-700 transition-colors">
        Lihat Semua Klien <i class="fa-solid fa-arrow-right text-[9px] ml-1"></i>
      </a>
    </div>

  </section>
  <!-- END AUDIT TRAIL -->
</div>
