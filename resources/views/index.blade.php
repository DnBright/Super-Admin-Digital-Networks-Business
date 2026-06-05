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
        <a href="{{ url('/global-command') }}" class="nav-link" :class="currentTab === 'global_command' ? 'active' : ''">
          <i class="fa-solid fa-gauge-high nav-icon"></i>
          <span>Global Command</span>
        </a>
        <a href="{{ url('/access-control') }}" class="nav-link mt-0.5" :class="currentTab === 'access_control' ? 'active' : ''">
          <i class="fa-solid fa-shield-halved nav-icon"></i>
          <span>Access Control</span>
        </a>
        <a href="{{ url('/system-settings') }}" class="nav-link mt-0.5" :class="currentTab === 'system_settings' ? 'active' : ''">
          <i class="fa-solid fa-sliders nav-icon"></i>
          <span>System Settings</span>
        </a>
      </div>

      <!-- Divisions -->
      <div>
        <p class="section-label mb-3">Divisions</p>
        <template x-for="div in navDivisions" :key="div.id">
          <div>
            <a :href="div.url" class="nav-link mt-0.5" :class="(div.tab && currentTab.startsWith(div.tab)) ? 'active' : ''">
              <i :class="div.icon + ' nav-icon'" :style="'color:' + div.color"></i>
              <span x-text="div.name"></span>
              <span x-show="div.badge" class="ml-auto text-[10px] font-bold font-mono px-1.5 py-0.5 rounded"
                    :class="div.badgeClass" x-text="div.badge"></span>
            </a>
                       <!-- Web Dev Submenu (shown only inside Super Admin layout when in Web Dev tabs) -->
            <div x-show="div.id === 1 && currentTab.startsWith('webdev_')" class="pl-6 pr-2 py-1.5 space-y-1.5 bg-slate-950/45 border-l-2 border-blue-500/30 mt-1 rounded-r-md" x-cloak>
              <a href="{{ route('webdev.dashboard') }}" class="block text-[11px] font-medium transition-colors"
                 :class="currentTab === 'webdev_dashboard' ? 'text-blue-400 font-bold' : 'text-slate-500 hover:text-slate-300'">
                Overview Dashboard
              </a>
              <a href="{{ route('webdev.kanban') }}" class="block text-[11px] font-medium transition-colors"
                 :class="currentTab === 'webdev_kanban' ? 'text-blue-400 font-bold' : 'text-slate-500 hover:text-slate-300'">
                Kanban Workboard
              </a>
              <a href="{{ route('webdev.templates.index') }}" class="block text-[11px] font-medium transition-colors"
                 :class="currentTab === 'webdev_templates' ? 'text-blue-400 font-bold' : 'text-slate-500 hover:text-slate-300'">
                Template Control
              </a>
              <a href="{{ route('webdev.packages.index') }}" class="block text-[11px] font-medium transition-colors"
                 :class="currentTab === 'webdev_packages' ? 'text-blue-400 font-bold' : 'text-slate-500 hover:text-slate-300'">
                Package Control
              </a>
              <a href="{{ route('webdev.reviews.index') }}" class="block text-[11px] font-medium transition-colors"
                 :class="currentTab === 'webdev_reviews' ? 'text-blue-400 font-bold' : 'text-slate-500 hover:text-slate-300'">
                Review Control
              </a>
              <a href="{{ route('webdev.chat.index') }}" class="block text-[11px] font-medium transition-colors"
                 :class="currentTab === 'webdev_chat' ? 'text-blue-400 font-bold' : 'text-slate-500 hover:text-slate-300'">
                Live Chat Inbox
              </a>
            </div>

            <!-- Brand Identity Submenu (shown only inside Super Admin layout when in Brand Identity tabs) -->
            <div x-show="div.id === 2 && currentTab.startsWith('brandidentity_')" class="pl-6 pr-2 py-1.5 space-y-1.5 bg-slate-950/45 border-l-2 border-purple-500/30 mt-1 rounded-r-md" x-cloak>
              <a href="{{ route('brandidentity.dashboard') }}" class="block text-[11px] font-medium transition-colors"
                 :class="currentTab === 'brandidentity_dashboard' ? 'text-purple-400 font-bold' : 'text-slate-500 hover:text-slate-300'">
                Overview Dashboard
              </a>
              <a href="{{ route('brandidentity.assets') }}" class="block text-[11px] font-medium transition-colors"
                 :class="currentTab === 'brandidentity_assets' ? 'text-purple-400 font-bold' : 'text-slate-500 hover:text-slate-300'">
                Asset Handover Vault
              </a>
              <a href="{{ route('brandidentity.tokens') }}" class="block text-[11px] font-medium transition-colors"
                 :class="currentTab === 'brandidentity_tokens' ? 'text-purple-400 font-bold' : 'text-slate-500 hover:text-slate-300'">
                Revision Tokens
              </a>
            </div>e>
          </div>
        </template>
      </div>

      <!-- Analytics -->
      <div>
        <p class="section-label mb-3">Analytics</p>
        <a href="{{ url('/revenue-report') }}" class="nav-link" :class="currentTab === 'revenue_report' ? 'active' : ''">
          <i class="fa-solid fa-chart-line nav-icon"></i>
          <span>Revenue Report</span>
        </a>
        <a href="{{ url('/billing-invoice') }}" class="nav-link mt-0.5" :class="currentTab === 'billing_invoice' ? 'active' : ''">
          <i class="fa-solid fa-file-invoice-dollar nav-icon"></i>
          <span>Billing & Invoice</span>
        </a>
        <a href="{{ url('/client-directory') }}" class="nav-link mt-0.5" :class="currentTab === 'client_directory' ? 'active' : ''">
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
          <span class="text-slate-400 text-xs hidden sm:block" x-text="currentTab.startsWith('webdev_') ? 'Web Dev' : (currentTab.startsWith('brandidentity_') ? 'Brand Identity' : 'Dashboard')">Dashboard</span>
          <i class="fa-solid fa-chevron-right text-[9px] text-slate-300 hidden sm:block"></i>
          <h1 class="text-slate-800 font-bold text-[14px] leading-tight truncate"
              x-text="currentTab === 'global_command' ? 'Global Command Overview' :
                      currentTab === 'access_control' ? 'Access Control Panel' :
                      currentTab === 'system_settings' ? 'System Settings Panel' :
                      currentTab === 'revenue_report' ? 'Revenue Report' :
                      currentTab === 'billing_invoice' ? 'Billing & Invoice' :
                      currentTab === 'client_directory' ? 'Client Directory' :
                      currentTab === 'webdev_dashboard' ? 'Overview Console' :
                      currentTab === 'webdev_kanban' ? 'Kanban Workboard' :
                      currentTab === 'webdev_templates' ? 'Template Control' :
                      currentTab === 'webdev_packages' ? 'Package Control' :
                      currentTab === 'webdev_reviews' ? 'Review Control' :
                      currentTab === 'webdev_chat' ? 'Live Chat Inbox' :
                      currentTab === 'brandidentity_dashboard' ? 'Overview Dashboard' :
                      currentTab === 'brandidentity_assets' ? 'Asset Handover Vault' :
                      currentTab === 'brandidentity_tokens' ? 'Revision Tokens Manager' : 'Console'">
            Global Command Overview
          </h1>
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
           TAB ROUTINGS (INCLUDED DYNAMICALLY)
      ====================================================== -->
      @include('Master_Control.global_command')

      @include('Master_Control.access_control')

      @include('Master_Control.system_settings')

      @include('Analytics.revenue')

      @include('Analytics.billing')

      @include('Analytics.clients')

      {{-- Web Dev Division Tab Integrations --}}
      @include('Divisions.webdev.dashboard')
      @include('Divisions.webdev.kanban-board')
      @include('Divisions.webdev.templates')
      @include('Divisions.webdev.packages')
      @include('Divisions.webdev.reviews')
      @include('Divisions.webdev.chat')

      {{-- Brand Identity Division Tab Integrations --}}
      @include('Divisions.brandidentity.dashboard')
      @include('Divisions.brandidentity.assets')
      @include('Divisions.brandidentity.tokens')

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
    currentTab: '{{ $tab ?? 'global_command' }}',
    ipLockEnabled: false,
    magicLinkClient: '',
    magicLinkDiv: '',
    generatedLink: '',
    
    // ── Analytics & Billing State ──
    invoices: [
      { id: 1, invoiceNo: 'INV-2026-001', clientName: 'PT Maju Bersama', division: 'Web Dev', amount: 'Rp 45.000.000', dueDate: '2026-06-15', status: 'paid' },
      { id: 2, invoiceNo: 'INV-2026-002', clientName: 'CV Kreasi Digital', division: 'Video Prod', amount: 'Rp 28.500.000', dueDate: '2026-05-20', status: 'overdue' },
      { id: 3, invoiceNo: 'INV-2026-003', clientName: 'Startup Nusantara', division: 'Perf. Ads', amount: 'Rp 15.000.000', dueDate: '2026-06-30', status: 'unpaid' },
      { id: 4, invoiceNo: 'INV-2026-004', clientName: 'PT Maju Bersama', division: 'Brand Identity', amount: 'Rp 12.000.000', dueDate: '2026-06-05', status: 'paid' },
      { id: 5, invoiceNo: 'INV-2026-005', clientName: 'Nusantara Global', division: '3D Mockup', amount: 'Rp 35.000.000', dueDate: '2026-07-10', status: 'unpaid' }
    ],
    newInvoiceClient: '',
    newInvoiceDiv: '',
    newInvoiceAmount: '',
    newInvoiceDueDate: '',
    billingFilter: 'all',
    clientDirectory: [
      { id: 1, name: 'PT Maju Bersama', contact: 'Budi Santoso', email: 'budi@majubersama.com', phone: '+62 811-2233-4455', services: ['Web Dev', 'Brand Identity', 'Perf. Ads', '3D Mockup', 'Social Media'], manager: 'Adi Wijaya', status: 'active', bg: 'bg-blue-500/20 text-blue-300' },
      { id: 2, name: 'CV Kreasi Digital', contact: 'Dewi Sartika', email: 'dewi@kreasidigital.co.id', phone: '+62 812-9988-7766', services: ['Video Prod', 'Perf. Ads'], manager: 'Sinta Devi', status: 'active', bg: 'bg-purple-500/20 text-purple-300' },
      { id: 3, name: 'Startup Nusantara', contact: 'Eko Prasetyo', email: 'eko@startupnusantara.com', phone: '+62 813-5544-3322', services: ['Web Dev', 'Brand Identity', '3D Mockup'], manager: 'Rian Putra', status: 'active', bg: 'bg-orange-500/20 text-orange-300' },
      { id: 4, name: 'Nusantara Global', contact: 'Lina Maria', email: 'lina@nusantaraglobal.com', phone: '+62 811-7788-9900', services: ['3D Mockup', 'Social Media', 'Video Prod'], manager: 'Doni Setiawan', status: 'active', bg: 'bg-cyan-500/20 text-cyan-300' },
      { id: 5, name: 'RM Padang Indah', contact: 'Haji Ahmad', email: 'ahmad@padangindah.com', phone: '+62 852-1122-3344', services: ['Social Media'], manager: 'Lani Marlina', status: 'suspended', bg: 'bg-pink-500/20 text-pink-300' }
    ],

    // ── System Settings State ──
    divisionsConfig: JSON.parse(localStorage.getItem('dnb_divisions_config')) || [
      { id: 1, name: 'Web Dev', key: 'WEB_DEV', color: '#60a5fa', domain: 'jasa-website.dnb.com', dbName: 'dnb_webdev', dbUser: 'root', dbPassword: '', folder: '/Users/mac/Project Website/Kerja/Super-Admin-Digital-Networks-Business/divisions/webdev' },
      { id: 2, name: 'Brand Identity', key: 'BRAND_IDENTITY', color: '#a78bfa', domain: 'jasa-logo.dnb.com', dbName: 'dnb_brand_id', dbUser: 'root', dbPassword: '', folder: '/Users/mac/Project Website/Kerja/Super-Admin-Digital-Networks-Business/divisions/brand-id' },
      { id: 3, name: 'Perf. Ads', key: 'PERF_ADS', color: '#fb923c', domain: 'jasa-advertising.dnb.com', dbName: 'dnb_perf_ads', dbUser: 'root', dbPassword: '', folder: '/Users/mac/Project Website/Kerja/Super-Admin-Digital-Networks-Business/divisions/perf-ads' },
      { id: 4, name: '3D Mockup', key: 'MOCKUP_3D', color: '#22d3ee', domain: 'jasa-mockup.dnb.com', dbName: 'dnb_3d_mockup', dbUser: 'root', dbPassword: '', folder: '/Users/mac/Project Website/Kerja/Super-Admin-Digital-Networks-Business/divisions/3d-mockup' },
      { id: 5, name: 'Social Media', key: 'SOCIAL_MEDIA', color: '#f472b6', domain: 'jasa-socialmedia.dnb.com', dbName: 'dnb_socmed', dbUser: 'root', dbPassword: '', folder: '/Users/mac/Project Website/Kerja/Super-Admin-Digital-Networks-Business/divisions/social-media' },
      { id: 6, name: 'Video Prod', key: 'VIDEO_PRODUCTION', color: '#f87171', domain: 'jasa-video.dnb.com', dbName: 'dnb_video_prod', dbUser: 'root', dbPassword: '', folder: '/Users/mac/Project Website/Kerja/Super-Admin-Digital-Networks-Business/divisions/video-production' }
    ],
    cpanelApiToken: localStorage.getItem('dnb_cpanel_token') || '',
    metaAdsToken: localStorage.getItem('dnb_meta_token') || '',
    googleAdsToken: localStorage.getItem('dnb_google_token') || '',
    smtpHost: localStorage.getItem('dnb_smtp_host') || 'smtp.mailtrap.io',
    smtpPort: localStorage.getItem('dnb_smtp_port') || '587',
    smtpUser: localStorage.getItem('dnb_smtp_user') || 'dnb-system-notif',
    smtpPassword: localStorage.getItem('dnb_smtp_password') || '',

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
    
    // ── System Settings Actions ──
    testDbConnection(id) {
      const div = this.divisionsConfig.find(d => d.id === id);
      if (!div) return;
      
      const spinner = document.getElementById('spinner-' + id);
      const plug = document.getElementById('plug-' + id);
      if (spinner && plug) {
        spinner.classList.remove('hidden');
        plug.classList.add('hidden');
      }

      setTimeout(() => {
        if (spinner && plug) {
          spinner.classList.add('hidden');
          plug.classList.remove('hidden');
        }
        alert(`Koneksi database ke "${div.dbName}" (${div.name}) Berhasil!\nHost: localhost\nUser: ${div.dbUser || 'root'}\nStatus: Active & Connected`);
      }, 1000);
    },
    saveDivisionConfig(id) {
      const div = this.divisionsConfig.find(d => d.id === id);
      if (!div) return;
      localStorage.setItem('dnb_divisions_config', JSON.stringify(this.divisionsConfig));
      alert(`Konfigurasi Node "${div.name}" berhasil disimpan.`);
    },
    saveGlobalSettings() {
      localStorage.setItem('dnb_cpanel_token', this.cpanelApiToken);
      localStorage.setItem('dnb_meta_token', this.metaAdsToken);
      localStorage.setItem('dnb_google_token', this.googleAdsToken);
      localStorage.setItem('dnb_smtp_host', this.smtpHost);
      localStorage.setItem('dnb_smtp_port', this.smtpPort);
      localStorage.setItem('dnb_smtp_user', this.smtpUser);
      localStorage.setItem('dnb_smtp_password', this.smtpPassword);
      alert('Pengaturan Global Third-Party Integrations & SMTP berhasil disimpan.');
    },
    createInvoice() {
      if (!this.newInvoiceClient || !this.newInvoiceDiv || !this.newInvoiceAmount || !this.newInvoiceDueDate) {
        alert('Mohon lengkapi semua input data invoice.');
        return;
      }
      
      const nextId = this.invoices.length + 1;
      const formattedAmount = 'Rp ' + Number(this.newInvoiceAmount).toLocaleString('id-ID');
      const invoiceNo = `INV-2026-0${nextId}`;

      const newInv = {
        id: nextId,
        invoiceNo: invoiceNo,
        clientName: this.newInvoiceClient,
        division: this.newInvoiceDiv,
        amount: formattedAmount,
        dueDate: this.newInvoiceDueDate,
        status: 'unpaid'
      };

      this.invoices.unshift(newInv);
      
      this.newInvoiceClient = '';
      this.newInvoiceDiv = '';
      this.newInvoiceAmount = '';
      this.newInvoiceDueDate = '';

      alert(`Invoice ${invoiceNo} berhasil dibuat.`);
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
      window.location.href = "{{ url('/') }}";
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
      { id: 1, name: 'Web Dev',        icon: 'fa-solid fa-code',     color: '#60a5fa', badge: '24', badgeClass: 'bg-blue-500/20 text-blue-300', url: '{{ route('webdev.dashboard') }}', tab: 'webdev' },
      { id: 2, name: 'Brand Identity', icon: 'fa-solid fa-palette',  color: '#a78bfa', badge: '18', badgeClass: 'bg-purple-500/20 text-purple-300', url: '{{ route('brandidentity.dashboard') }}', tab: 'brandidentity' },
      { id: 3, name: 'Perf. Ads',      icon: 'fa-solid fa-bullhorn', color: '#fb923c', badge: '31', badgeClass: 'bg-orange-500/20 text-orange-300', url: '{{ route('performanceads.dashboard') }}', tab: 'performanceads' },
      { id: 4, name: '3D Mockup',      icon: 'fa-solid fa-cube',     color: '#22d3ee', badge: '12', badgeClass: 'bg-cyan-500/20 text-cyan-300', url: '{{ route('mockup3d.dashboard') }}', tab: 'mockup3d' },
      { id: 5, name: 'Social Media',   icon: 'fa-solid fa-hashtag',  color: '#f472b6', badge: '27', badgeClass: 'bg-pink-500/20 text-pink-300', url: '{{ route('socialmedia.dashboard') }}', tab: 'socialmedia' },
      { id: 6, name: 'Video Prod',     icon: 'fa-solid fa-film',     color: '#f87171', badge: '16', badgeClass: 'bg-red-500/20 text-red-300', url: '{{ route('videoproduction.dashboard') }}', tab: 'videoproduction' },
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