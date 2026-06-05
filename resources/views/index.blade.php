<!DOCTYPE html>
<html lang="id" x-data="commandCenter()" x-init="init()">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Super Admin — Digital Network Command Center</title>

  <!-- ============================================================
       DEPENDENCIES
  ============================================================ -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet" />
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

  <!-- ============================================================
       TAILWIND CONFIG
  ============================================================ -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
            mono: ['"IBM Plex Mono"', 'monospace'],
          },
          colors: {
            brand: {
              50:  '#eff6ff',
              100: '#dbeafe',
              400: '#60a5fa',
              500: '#3b82f6',
              600: '#2563eb',
            },
            slate: {
              925: '#0d1525',
              950: '#080e1a',
            }
          },
          boxShadow: {
            'card': '0 1px 3px 0 rgba(0,0,0,.06), 0 1px 2px -1px rgba(0,0,0,.04)',
            'card-md': '0 4px 16px -2px rgba(0,0,0,.08), 0 2px 4px -2px rgba(0,0,0,.04)',
          }
        }
      }
    }
  </script>

  <!-- ============================================================
       GLOBAL STYLES
  ============================================================ -->
  <style>
    [x-cloak] { display: none !important; }
    /* ---------- Reset & Base ---------- */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { height: 100%; }
    body {
      font-family: 'Inter', sans-serif;
      background: #f1f5f9;
      height: 100%;
      overflow: hidden;
      -webkit-font-smoothing: antialiased;
    }

    /* ---------- Custom Scrollbar ---------- */
    ::-webkit-scrollbar { width: 4px; height: 4px; }
    ::-webkit-scrollbar-track { background: transparent; }
    ::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }
    ::-webkit-scrollbar-thumb:hover { background: #475569; }

    /* ---------- Sidebar transition ---------- */
    #sidebar {
      transition: transform 0.28s cubic-bezier(0.4, 0, 0.2, 1),
                  width 0.28s cubic-bezier(0.4, 0, 0.2, 1);
    }
    #overlay {
      transition: opacity 0.25s ease;
      pointer-events: none;
      opacity: 0;
    }
    #overlay.active {
      pointer-events: all;
      opacity: 1;
    }

    /* ---------- Nav item ---------- */
    .nav-link {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 8px 12px;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 500;
      color: #94a3b8;
      cursor: pointer;
      transition: background 0.15s, color 0.15s;
      white-space: nowrap;
      position: relative;
    }
    .nav-link:hover { background: rgba(255,255,255,0.055); color: #e2e8f0; }
    .nav-link.active {
      background: rgba(59,130,246,0.15);
      color: #93c5fd;
    }
    .nav-link.active::before {
      content: '';
      position: absolute;
      left: 0; top: 50%;
      transform: translateY(-50%);
      width: 3px; height: 18px;
      background: #3b82f6;
      border-radius: 0 3px 3px 0;
    }
    .nav-link .nav-icon { width: 16px; text-align: center; font-size: 13px; flex-shrink: 0; }

    /* ---------- Section label ---------- */
    .section-label {
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: #475569;
      padding: 0 12px;
      margin-bottom: 4px;
    }

    /* ---------- Crisis alert pulse ---------- */
    @keyframes crisis-glow-red {
      0%, 100% { box-shadow: 0 0 0 0 rgba(239,68,68,0.5); }
      50%       { box-shadow: 0 0 0 5px rgba(239,68,68,0); }
    }
    @keyframes crisis-glow-amber {
      0%, 100% { box-shadow: 0 0 0 0 rgba(245,158,11,0.5); }
      50%       { box-shadow: 0 0 0 5px rgba(245,158,11,0); }
    }
    .pulse-red   { animation: crisis-glow-red 1.8s ease-in-out infinite; }
    .pulse-amber { animation: crisis-glow-amber 2s ease-in-out infinite; }

    /* ---------- Progress bar shimmer ---------- */
    @keyframes shimmer {
      0%   { transform: translateX(-100%); }
      100% { transform: translateX(400%); }
    }
    .shimmer-bar::after {
      content: '';
      position: absolute;
      top: 0; left: 0;
      width: 25%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.35), transparent);
      animation: shimmer 2.2s ease-in-out infinite;
    }

    /* ---------- Metric card entrance ---------- */
    @keyframes slideUp {
      from { opacity: 0; transform: translateY(12px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .slide-up { animation: slideUp 0.45s cubic-bezier(0.16, 1, 0.3, 1) both; }
    .delay-1  { animation-delay: 0.05s; }
    .delay-2  { animation-delay: 0.11s; }
    .delay-3  { animation-delay: 0.17s; }
    .delay-4  { animation-delay: 0.23s; }
    .delay-5  { animation-delay: 0.29s; }

    /* ---------- Status dot ---------- */
    .sdot {
      display: inline-block;
      width: 9px; height: 9px;
      border-radius: 50%;
      flex-shrink: 0;
    }
    .sdot.green  { background: #22c55e; box-shadow: 0 0 0 2px rgba(34,197,94,0.2); }
    .sdot.yellow { background: #f59e0b; box-shadow: 0 0 0 2px rgba(245,158,11,0.2); }
    .sdot.gray   { background: #64748b; }

    /* ---------- Table hover ---------- */
    .trow:hover { background: #f8fafc; }
    .trow.overdue:hover { background: #fff5f5; }
    .trow.overdue { background: #fff8f8; }

    /* ---------- Audit timeline ---------- */
    .audit-item { position: relative; padding-left: 36px; }
    .audit-item::before {
      content: '';
      position: absolute;
      left: 13px;
      top: 26px;
      bottom: -8px;
      width: 1px;
      background: #e2e8f0;
    }
    .audit-item:last-child::before { display: none; }
    .audit-icon {
      position: absolute;
      left: 0; top: 1px;
      width: 26px; height: 26px;
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 11px;
      flex-shrink: 0;
      z-index: 1;
    }

    /* ---------- Card hover lift ---------- */
    .card-hover {
      transition: transform 0.18s ease, box-shadow 0.18s ease;
    }
    .card-hover:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px -4px rgba(0,0,0,0.1), 0 2px 6px -2px rgba(0,0,0,0.05);
    }

    /* ---------- Sparkline bars ---------- */
    .spark-bar {
      border-radius: 2px;
      transition: height 0.3s ease;
    }

    /* ---------- Badge flicker for OVERDUE ---------- */
    @keyframes badge-flicker {
      0%, 100% { opacity: 1; }
      50%       { opacity: 0.65; }
    }
    .badge-overdue { animation: badge-flicker 2.5s ease-in-out infinite; }

    /* ---------- Responsive: hide sidebar on mobile ---------- */
    @media (max-width: 1023px) {
      #sidebar { transform: translateX(-100%); position: fixed; z-index: 50; height: 100%; }
      #sidebar.open { transform: translateX(0); }
      #main-wrapper { margin-left: 0 !important; }
    }
  </style>
</head>

<!-- ============================================================
     BODY
============================================================ -->
<body class="flex h-full overflow-hidden">

  <!-- ==========================================================
       DASHBOARD CONTAINER (Visible only when logged in)
  ========================================================== -->
  <div x-show="isLoggedIn" class="flex h-full w-full overflow-hidden" x-cloak>
    <!-- Mobile overlay -->
    <div id="overlay" class="fixed inset-0 bg-black/50 z-40 lg:hidden"
         @click="closeSidebar()"></div>

  <!-- ==========================================================
       LEFT SIDEBAR
  ========================================================== -->
  <aside id="sidebar"
         class="w-[220px] flex-shrink-0 h-full bg-slate-900 flex flex-col border-r border-slate-800/60 overflow-hidden">

    <!-- Sidebar Header -->
    <div class="px-4 pt-5 pb-4 border-b border-slate-800">
      <div class="flex items-center gap-3">
        <div class="w-8 h-8 rounded-lg bg-white overflow-hidden flex items-center justify-center flex-shrink-0 shadow-lg border border-slate-700">
          <img src="{{ asset('logo.png') }}" alt="DnB Logo" class="w-7 h-7 object-contain" />
        </div>
        <div class="min-w-0">
          <p class="text-white font-bold text-[13px] tracking-wide leading-tight">DIGITAL NETWORK</p>
          <span class="inline-block text-[9px] font-bold tracking-widest uppercase px-1.5 py-0.5 rounded-sm bg-brand-500/20 text-brand-400 border border-brand-500/30 mt-0.5">
            SUPER ADMIN
          </span>
        </div>
      </div>
    </div>

    <!-- Nav Content -->
    <nav class="flex-1 overflow-y-auto py-4 px-2 space-y-5">

      <!-- Master Control -->
      <div>
        <p class="section-label mb-3">Master Control</p>
        <a class="nav-link" :class="currentTab === 'global_command' ? 'active' : ''" @click="currentTab = 'global_command'; closeSidebar()">
          <i class="fa-solid fa-gauge-high nav-icon"></i>
          <span>Global Command</span>
        </a>
        <a class="nav-link mt-0.5" :class="currentTab === 'access_control' ? 'active' : ''" @click="currentTab = 'access_control'; closeSidebar()">
          <i class="fa-solid fa-shield-halved nav-icon"></i>
          <span>Access Control</span>
        </a>
        <a class="nav-link mt-0.5" :class="currentTab === 'system_settings' ? 'active' : ''" @click="currentTab = 'system_settings'; closeSidebar()">
          <i class="fa-solid fa-sliders nav-icon"></i>
          <span>System Settings</span>
        </a>
      </div>

      <!-- Divisions -->
      <div>
        <p class="section-label mb-3">Divisions</p>
        <template x-for="div in navDivisions" :key="div.id">
          <a class="nav-link mt-0.5" :class="div.alert ? 'text-slate-300' : ''">
            <i :class="div.icon + ' nav-icon'" :style="'color:' + div.color"></i>
            <span x-text="div.name"></span>
            <span x-show="div.badge" class="ml-auto text-[10px] font-bold font-mono px-1.5 py-0.5 rounded"
                  :class="div.badgeClass" x-text="div.badge"></span>
          </a>
        </template>
      </div>

      <!-- Analytics -->
      <div>
        <p class="section-label mb-3">Analytics</p>
        <a class="nav-link">
          <i class="fa-solid fa-chart-line nav-icon"></i>
          <span>Revenue Report</span>
        </a>
        <a class="nav-link mt-0.5">
          <i class="fa-solid fa-file-invoice-dollar nav-icon"></i>
          <span>Billing & Invoice</span>
        </a>
        <a class="nav-link mt-0.5">
          <i class="fa-solid fa-users nav-icon"></i>
          <span>Client Directory</span>
        </a>
      </div>

    </nav>

    <!-- Sidebar Footer: Admin Profile -->
    <div class="px-3 py-3 border-t border-slate-800">
      <div class="flex items-center gap-2.5">
        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-400 to-indigo-600 flex items-center justify-center text-white text-[11px] font-black flex-shrink-0 ring-2 ring-slate-700">
          BS
        </div>
        <div class="min-w-0 flex-1">
          <p class="text-white text-[12px] font-semibold truncate leading-tight">Budi Santoso</p>
          <p class="text-slate-500 text-[10px] truncate">super@digitalnetwork.id</p>
        </div>
        <button title="Logout" @click="logout()"
                class="w-7 h-7 rounded-md flex items-center justify-center text-slate-500 hover:text-red-400 hover:bg-red-400/10 transition-colors flex-shrink-0">
          <i class="fa-solid fa-right-from-bracket text-xs"></i>
        </button>
      </div>
    </div>

  </aside>
  <!-- END SIDEBAR -->

  <!-- ==========================================================
       MAIN WRAPPER
  ========================================================== -->
  <div id="main-wrapper" class="flex-1 flex flex-col min-w-0 overflow-hidden">

    <!-- ========================================================
         TOP HEADER BAR — Global Crisis Monitor
    ======================================================== -->
    <header class="sticky top-0 z-30 bg-white border-b border-slate-200 flex-shrink-0" style="box-shadow: 0 1px 3px rgba(0,0,0,0.06)">
      <div class="flex items-center gap-3 h-14 px-4 lg:px-5">

        <!-- Hamburger (mobile) -->
        <button class="lg:hidden w-8 h-8 rounded-md flex items-center justify-center text-slate-500 hover:bg-slate-100 transition-colors flex-shrink-0"
                @click="openSidebar()">
          <i class="fa-solid fa-bars text-sm"></i>
        </button>

        <!-- Breadcrumb / Page title -->
        <div class="flex items-center gap-2 min-w-0">
          <span class="text-slate-400 text-xs hidden sm:block">Dashboard</span>
          <i class="fa-solid fa-chevron-right text-[9px] text-slate-300 hidden sm:block"></i>
          <h1 class="text-slate-800 font-bold text-[14px] leading-tight truncate">Global Command Overview</h1>
        </div>

        <div class="flex-1"></div>

        <!-- ── CRISIS ALERT WIDGETS ── -->
        <div class="flex items-center gap-2 flex-shrink-0">

          <!-- Alert 1: SERVER DOWN — RED -->
          <div class="pulse-red flex items-center gap-2 px-3 py-1.5 rounded-lg bg-red-50 border border-red-200 cursor-pointer hover:bg-red-100 transition-colors">
            <span class="relative flex h-2 w-2 flex-shrink-0">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
            </span>
            <span class="text-red-700 text-[11px] font-bold hidden sm:block whitespace-nowrap">SERVER DOWN: Klien Z</span>
            <span class="text-[9px] font-mono font-semibold bg-red-200 text-red-700 px-1 py-0.5 rounded hidden md:block">WEB DEV</span>
          </div>

          <!-- Alert 2: STORAGE CRIT — AMBER -->
          <div class="pulse-amber flex items-center gap-2 px-3 py-1.5 rounded-lg bg-amber-50 border border-amber-200 cursor-pointer hover:bg-amber-100 transition-colors">
            <span class="relative flex h-2 w-2 flex-shrink-0">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-500 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-2 w-2 bg-amber-500"></span>
            </span>
            <span class="text-amber-700 text-[11px] font-bold hidden sm:block whitespace-nowrap">STORAGE CRIT: 95%</span>
            <span class="text-[9px] font-mono font-semibold bg-amber-200 text-amber-700 px-1 py-0.5 rounded hidden md:block">VIDEO</span>
          </div>

          <!-- Live clock -->
          <div class="hidden xl:flex items-center gap-1.5 text-[11px] font-mono text-slate-500 bg-slate-50 border border-slate-200 px-2.5 py-1.5 rounded-lg">
            <i class="fa-regular fa-clock text-slate-400 text-[10px]"></i>
            <span x-text="clock"></span>
          </div>

          <!-- Bell icon -->
          <button class="relative w-8 h-8 rounded-md flex items-center justify-center text-slate-500 hover:bg-slate-100 transition-colors">
            <i class="fa-regular fa-bell text-sm"></i>
            <span class="absolute top-1.5 right-1.5 w-1.5 h-1.5 bg-red-500 rounded-full ring-1 ring-white"></span>
          </button>

        </div>
      </div>
    </header>
    <!-- END HEADER -->

    <!-- ========================================================
         MAIN SCROLLABLE CONTENT
    ======================================================== -->
    <main class="flex-1 overflow-y-auto p-4 lg:p-5 space-y-5 bg-slate-50">

      <!-- ======================================================
           TAB: GLOBAL COMMAND (DEFAULT)
      ====================================================== -->
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
            <div class="hidden md:flex items-center gap-3 text-[11px] text-slate-500">
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
                      <button class="inline-flex items-center gap-1.5 text-[11px] font-medium text-blue-600 bg-blue-50 border border-blue-200 hover:bg-blue-100 transition-colors px-3 py-1.5 rounded-lg">
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
            <button class="text-[11px] font-medium text-slate-500 bg-slate-50 border border-slate-200 hover:bg-slate-100 transition-colors px-3 py-1.5 rounded-lg flex items-center gap-1.5">
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
                    <p class="text-[12px] text-slate-600 leading-relaxed" x-text="log.action"></p>
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
        <div class="px-5 py-3 border-t border-slate-100 text-center">
          <button class="text-[11px] font-semibold text-brand-600 hover:text-brand-700 transition-colors">
            Muat Log Sebelumnya <i class="fa-solid fa-chevron-down text-[9px] ml-1"></i>
          </button>
        </div>

      </section>
      <!-- END AUDIT TRAIL -->
      </div>

      <!-- ======================================================
           TAB: ACCESS CONTROL
      ====================================================== -->
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
                <button class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-[11px] px-3 py-1.5 rounded-lg transition-colors">
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
                  <tbody class="divide-y divide-slate-100 text-xs text-slate-600">
                    <template x-for="admin in subAdmins" :key="admin.id">
                      <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-5 py-3.5 flex items-center gap-2.5">
                          <div class="w-7 h-7 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-slate-600 text-[10px]" x-text="admin.initials"></div>
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
                          <button class="text-blue-600 hover:text-blue-700 font-semibold">Edit</button>
                          <button class="text-red-600 hover:text-red-700 font-semibold" x-text="admin.status === 'active' ? 'Suspend' : 'Activate'"></button>
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
                <button class="bg-slate-800 hover:bg-slate-700 text-white font-semibold text-[10px] px-3 py-1.5 rounded transition-colors w-full">
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
                <span class="text-[10px] font-bold text-indigo-800 uppercase tracking-wide block">Generated Access Token Link</span>
                <div class="flex items-center justify-between gap-2">
                  <input type="text" x-model="generatedLink" readonly class="bg-white border border-indigo-200 rounded p-1 text-[10px] font-mono text-slate-600 flex-1 focus:outline-none">
                  <button @click="navigator.clipboard.writeText(generatedLink); alert('Link disalin!')"
                          class="bg-indigo-600 text-white p-1.5 rounded hover:bg-indigo-700 transition-colors flex-shrink-0"
                          title="Copy Link">
                    <i class="fa-regular fa-copy text-xs"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

      <!-- Bottom spacer -->
      <div class="h-2"></div>

    </main>
    <!-- END MAIN CONTENT -->

  </div>
  <!-- END MAIN WRAPPER -->
  </div>
  <!-- END DASHBOARD CONTAINER -->

  <!-- ==========================================================
       LOGIN VIEW
  ========================================================== -->
  <div x-show="!isLoggedIn" class="min-h-screen w-full flex items-center justify-center bg-slate-950 p-4 relative" x-cloak>
    <!-- Ambient glowing backgrounds -->
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-md bg-slate-900 border border-slate-800 rounded-2xl shadow-2xl overflow-hidden z-10 transition-all duration-300">
      <!-- Login Header -->
      <div class="p-6 border-b border-slate-800/80 bg-slate-950/45 text-center flex flex-col items-center">
        <div class="w-16 h-16 rounded-2xl bg-white overflow-hidden flex items-center justify-center shadow-lg border border-slate-700/50 mb-4">
          <img src="{{ asset('logo.png') }}" alt="DnB Logo" class="w-12 h-12 object-contain" />
        </div>
        <h2 class="text-xl font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent tracking-wide">
          DNB COMMAND CENTER
        </h2>
        <p class="text-slate-400 text-xs mt-1">Masukkan email & password untuk masuk</p>
      </div>

      <!-- Login Body -->
      <form @submit.prevent="login()" class="p-6 space-y-4">
        <!-- Error Alert -->
        <div x-show="loginError" class="bg-rose-500/10 border border-rose-500/20 text-rose-400 rounded-lg p-3 text-xs leading-relaxed" x-cloak>
          <div class="flex items-start">
            <i class="fa-solid fa-triangle-exclamation mt-0.5 mr-2"></i>
            <span x-text="loginError"></span>
          </div>
        </div>

        <!-- Email Field -->
        <div>
          <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Email Address</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-500">
              <i class="fa-regular fa-envelope text-sm"></i>
            </span>
            <input type="email" x-model="loginEmail" required placeholder="admin@dnb.com"
                   class="w-full bg-slate-950 border border-slate-800 rounded-lg pl-9 pr-4 py-2.5 text-sm text-slate-200 placeholder-slate-600 focus:outline-none focus:border-indigo-500 transition-colors">
          </div>
        </div>

        <!-- Password Field -->
        <div>
          <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Password</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-500">
              <i class="fa-solid fa-lock text-sm"></i>
            </span>
            <input type="password" x-model="loginPassword" required placeholder="••••••••"
                   class="w-full bg-slate-950 border border-slate-800 rounded-lg pl-9 pr-4 py-2.5 text-sm text-slate-200 placeholder-slate-600 focus:outline-none focus:border-indigo-500 transition-colors">
          </div>
        </div>

        <!-- Submit Button -->
        <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm py-2.5 rounded-lg transition-all shadow-lg shadow-indigo-600/20 hover:shadow-indigo-600/30 active:scale-[0.99] flex items-center justify-center gap-2">
          <span>Masuk</span>
          <i class="fa-solid fa-arrow-right-to-bracket text-xs"></i>
        </button>
      </form>

      <!-- Login Footer -->
      <div class="px-6 py-4 bg-slate-950/20 border-t border-slate-800/60 text-center">
        <p class="text-[10px] text-slate-500">Default Credentials: <strong class="text-slate-400">admin@dnb.com</strong> / <strong class="text-slate-400">admin123</strong></p>
      </div>
    </div>
  </div>

<!-- ============================================================
     ALPINE.JS COMPONENT DATA
============================================================ -->
<script>
function commandCenter() {
  return {
    clock: '--:--:--',
    currentTab: 'global_command',
    ipLockEnabled: false,
    magicLinkClient: '',
    magicLinkDiv: '',
    generatedLink: '',

    subAdmins: [
      { id: 1, name: 'Adi Wijaya', email: 'adi.web@dnb.com', initials: 'AW', division: 'Web Dev', divBadge: 'bg-blue-100 text-blue-700', role: 'Manage Project, VPS Write', status: 'active' },
      { id: 2, name: 'Rian Putra', email: 'rian.brand@dnb.com', initials: 'RP', division: 'Brand Identity', divBadge: 'bg-purple-100 text-purple-700', role: 'Upload Logo Asset, Issue Token', status: 'active' },
      { id: 3, name: 'Sinta Devi', email: 'sinta.ads@dnb.com', initials: 'SD', division: 'Perf. Ads', divBadge: 'bg-orange-100 text-orange-700', role: 'Meta/Google Ads API Read', status: 'active' },
      { id: 4, name: 'Doni Setiawan', email: 'doni.video@dnb.com', initials: 'DS', division: 'Video Prod', divBadge: 'bg-red-100 text-red-700', role: 'Nas Disk Read, Render Pipeline', status: 'active' },
      { id: 5, name: 'Lani Marlina', email: 'lani.soc@dnb.com', initials: 'LM', division: 'Social Media', divBadge: 'bg-pink-100 text-pink-700', role: 'Content Planner Publish', status: 'pending' },
    ],

    generateMagicLink() {
      if (!this.magicLinkClient || !this.magicLinkDiv) {
        alert('Mohon pilih klien dan divisi terlebih dahulu.');
        return;
      }
      const token = Math.random().toString(36).substring(2, 12).toUpperCase();
      this.generatedLink = `https://dnb.com/portal/guest?client=${encodeURIComponent(this.magicLinkClient)}&div=${encodeURIComponent(this.magicLinkDiv)}&token=${token}`;
    },
    isLoggedIn: false,
    loginEmail: '',
    loginPassword: '',
    loginError: '',

    // ── Auth Actions ──
    login() {
      this.loginError = '';
      if (this.loginEmail === 'admin@dnb.com' && this.loginPassword === 'admin123') {
        this.isLoggedIn = true;
        localStorage.setItem('dnb_logged_in', 'true');
        this.loginEmail = '';
        this.loginPassword = '';
      } else {
        this.loginError = 'Email atau password yang Anda masukkan salah.';
      }
    },
    logout() {
      this.isLoggedIn = false;
      localStorage.setItem('dnb_logged_in', 'false');
    },

    // ── Sidebar state ──
    openSidebar() {
      document.getElementById('sidebar').classList.add('open');
      document.getElementById('overlay').classList.add('active');
    },
    closeSidebar() {
      document.getElementById('sidebar').classList.remove('open');
      document.getElementById('overlay').classList.remove('active');
    },

    // ── Sidebar nav ──
    navDivisions: [
      { id: 1, name: 'Web Dev',        icon: 'fa-solid fa-code',     color: '#60a5fa', badge: '24', badgeClass: 'bg-blue-500/20 text-blue-300' },
      { id: 2, name: 'Brand Identity', icon: 'fa-solid fa-palette',  color: '#a78bfa', badge: '18', badgeClass: 'bg-purple-500/20 text-purple-300' },
      { id: 3, name: 'Perf. Ads',      icon: 'fa-solid fa-bullhorn', color: '#fb923c', badge: '31', badgeClass: 'bg-orange-500/20 text-orange-300' },
      { id: 4, name: '3D Mockup',      icon: 'fa-solid fa-cube',     color: '#22d3ee', badge: '12', badgeClass: 'bg-cyan-500/20 text-cyan-300' },
      { id: 5, name: 'Social Media',   icon: 'fa-solid fa-hashtag',  color: '#f472b6', badge: '27', badgeClass: 'bg-pink-500/20 text-pink-300' },
      { id: 6, name: 'Video Prod',     icon: 'fa-solid fa-film',     color: '#f87171', badge: '16', badgeClass: 'bg-red-500/20 text-red-300' },
    ],

    // ── Sparkline ──
    spark1: [28, 42, 35, 55, 48, 62, 52, 70, 58, 76, 65, 80, 70, 85, 100],

    // ── Revenue segments ──
    revenueSegs: [
      { label: 'Web Dev',    pct: 72, color: 'bg-blue-400' },
      { label: 'Perf. Ads',  pct: 58, color: 'bg-orange-400' },
      { label: 'Social',     pct: 45, color: 'bg-pink-400' },
      { label: '3D / Video', pct: 33, color: 'bg-cyan-400' },
    ],

    // ── Resource health ──
    resources: [
      { label: 'API Quota (Google Ads)', val: 82, barColor: 'bg-orange-400', textColor: 'text-orange-500' },
      { label: 'Server CPU Load',        val: 67, barColor: 'bg-yellow-400', textColor: 'text-yellow-600' },
      { label: 'NAS Storage Studio',     val: 95, barColor: 'bg-red-500',    textColor: 'text-red-600' },
    ],

    // ── Client matrix ──
    clients: [
      {
        id: 1,
        name: 'PT Maju Bersama',
        sub: 'Enterprise · Retainer 12 bln',
        initials: 'MB',
        avatarBg: '#eff6ff',
        avatarColor: '#2563eb',
        overdue: false,
        // Web Dev, Brand ID, Perf. Ads, 3D, SocMed, Video
        stats: ['green', 'green', 'yellow', 'green', 'green', 'gray'],
      },
      {
        id: 2,
        name: 'CV Kreasi Digital',
        sub: 'Menunggak 45 hari · Rp 28.500.000',
        initials: 'KD',
        avatarBg: '#fff1f2',
        avatarColor: '#be123c',
        overdue: true,
        stats: ['yellow', 'gray', 'green', 'gray', 'yellow', 'green'],
      },
      {
        id: 3,
        name: 'Startup Nusantara',
        sub: 'SMB · Paket Growth',
        initials: 'SN',
        avatarBg: '#f0fdf4',
        avatarColor: '#15803d',
        overdue: false,
        stats: ['green', 'green', 'gray', 'green', 'gray', 'yellow'],
      },
    ],

    // ── Audit logs ──
    auditLogs: [
      {
        id: 1,
        actor: 'Admin Ads',
        division: 'Perf. Ads',
        divBadge: 'bg-orange-100 text-orange-700',
        icon: 'fa-solid fa-money-bill-transfer',
        iconBg: 'bg-orange-500',
        action: 'Memindahkan budget dari Klien Y ke Meta Ads Campaign — Q3 Retargeting',
        amount: 'Rp 5.000.000',
        target: 'PT Maju Bersama',
        platform: 'Meta Ads Manager',
        time: '2 mnt lalu',
      },
      {
        id: 2,
        actor: 'Admin WebDev',
        division: 'Web Dev',
        divBadge: 'bg-blue-100 text-blue-700',
        icon: 'fa-solid fa-triangle-exclamation',
        iconBg: 'bg-red-500',
        action: 'Downtime terdeteksi — server Klien Z offline. Tiket eskalasi #WD-2891 dibuat otomatis.',
        amount: null,
        target: 'CV Kreasi Digital',
        platform: null,
        time: '7 mnt lalu',
      },
      {
        id: 3,
        actor: 'Admin Video',
        division: 'Video Prod',
        divBadge: 'bg-red-100 text-red-700',
        icon: 'fa-solid fa-hard-drive',
        iconBg: 'bg-slate-600',
        action: 'Peringatan storage NAS Studio mencapai 95% — auto-archiving diaktifkan, tim dihubungi.',
        amount: null,
        target: null,
        platform: null,
        time: '14 mnt lalu',
      },
      {
        id: 4,
        actor: 'Admin SocMed',
        division: 'Social Media',
        divBadge: 'bg-pink-100 text-pink-700',
        icon: 'fa-solid fa-calendar-check',
        iconBg: 'bg-pink-500',
        action: 'Menjadwalkan 14 konten Instagram & TikTok untuk bulan Juli 2025, termasuk 3 Reels viral templates.',
        amount: null,
        target: 'Startup Nusantara',
        platform: null,
        time: '28 mnt lalu',
      },
    ],

    // ── Init ──
    init() {
      // Check auth state
      this.isLoggedIn = localStorage.getItem('dnb_logged_in') === 'true';

      const tick = () => {
        const now = new Date();
        this.clock = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
      };
      tick();
      setInterval(tick, 1000);

      // Auto-open sidebar on large screens
      if (window.innerWidth >= 1024) {
        const sidebar = document.getElementById('sidebar');
        if (sidebar) sidebar.classList.remove('open');
      }
    },
  };
}
</script>

</body>
</html>