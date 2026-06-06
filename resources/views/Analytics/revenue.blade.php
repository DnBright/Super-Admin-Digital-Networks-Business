<div x-show="currentTab === 'revenue_report'" class="space-y-5" x-cloak>
  
  <!-- Revenue Report Header -->
  <div class="flex items-center justify-between">
    <div>
      <h2 class="text-slate-800 font-bold text-base">Financial Analytics & Revenue Report</h2>
      <p class="text-slate-505 text-xs mt-0.5">Pantau Monthly Recurring Revenue (MRR), performansi finansial divisi, dan log transaksi masuk secara realtime.</p>
    </div>
    <div class="flex gap-2">
      <button @click="alert('Mengekspor laporan keuangan Q2...')" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs px-3.5 py-2 rounded-lg transition-colors flex items-center gap-1.5 border border-slate-200">
        <i class="fa-solid fa-file-csv"></i> Export CSV
      </button>
      <button @click="alert('Mengunduh dokumen PDF laporan...')" class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-xs px-3.5 py-2 rounded-lg transition-all shadow-md shadow-indigo-600/15 flex items-center gap-1.5">
        <i class="fa-solid fa-file-pdf"></i> Download PDF
      </button>
    </div>
  </div>

  <!-- 4-Column Financial Stats Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    
    <!-- Card 1: MRR -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-card p-5 space-y-2">
      <div class="flex items-center justify-between">
        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Monthly Recurring Revenue (MRR)</span>
        <div class="w-6 h-6 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 text-[10px] font-bold">
          <i class="fa-solid fa-arrow-trend-up"></i>
        </div>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-slate-800 font-black text-lg">Rp 135.500.000</span>
        <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-1.5 py-0.5 rounded">+12.4%</span>
      </div>
      <p class="text-[10px] text-slate-405">Total pendapatan berulang bulan Juni 2026</p>
    </div>

    <!-- Card 2: ARR -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-card p-5 space-y-2">
      <div class="flex items-center justify-between">
        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Annual Run Rate (ARR)</span>
        <div class="w-6 h-6 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600 text-[10px] font-bold">
          <i class="fa-solid fa-chart-line"></i>
        </div>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-slate-800 font-black text-lg">Rp 1.626.000.000</span>
        <span class="text-[10px] font-bold text-indigo-600 bg-indigo-50 px-1.5 py-0.5 rounded">+8.2%</span>
      </div>
      <p class="text-[10px] text-slate-405">Proyeksi pendapatan tahunan berjalan</p>
    </div>

    <!-- Card 3: Outstanding Invoice -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-card p-5 space-y-2">
      <div class="flex items-center justify-between">
        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Outstanding Invoices</span>
        <div class="w-6 h-6 rounded-lg bg-amber-50 flex items-center justify-center text-amber-600 text-[10px] font-bold">
          <i class="fa-solid fa-clock-rotate-left"></i>
        </div>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-slate-800 font-black text-lg">Rp 43.500.000</span>
        <span class="text-[10px] font-bold text-amber-600 bg-amber-50 px-1.5 py-0.5 rounded">2 Pending</span>
      </div>
      <p class="text-[10px] text-slate-405">Tagihan aktif yang belum dibayar</p>
    </div>

    <!-- Card 4: Avg Deal Size -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-card p-5 space-y-2">
      <div class="flex items-center justify-between">
        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Average Deal Size</span>
        <div class="w-6 h-6 rounded-lg bg-cyan-50 flex items-center justify-center text-cyan-600 text-[10px] font-bold">
          <i class="fa-solid fa-handshake"></i>
        </div>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-slate-800 font-black text-lg">Rp 26.100.000</span>
        <span class="text-[10px] font-bold text-cyan-600 bg-cyan-50 px-1.5 py-0.5 rounded">+4.5%</span>
      </div>
      <p class="text-[10px] text-slate-405">Nilai rata-rata proyek per klien</p>
    </div>

  </div>

  <!-- Visual breakdown grid -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
    
    <!-- Left: Division Financial Performance (Takes 1 Col) -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-card p-5 space-y-4">
      <div class="flex items-center gap-2">
        <div class="w-6 h-6 bg-slate-100 rounded-lg flex items-center justify-center text-xs text-slate-600">
          <i class="fa-solid fa-pie-chart"></i>
        </div>
        <h3 class="text-xs font-bold text-slate-700 uppercase tracking-widest">Revenue by Division Node</h3>
      </div>
      <p class="text-[11px] text-slate-450 leading-relaxed">Persentase kontribusi pemasukan dari 6 cabang operasional aktif.</p>
      
      <div class="space-y-3.5">
        <!-- Web Dev -->
        <div class="space-y-1">
          <div class="flex justify-between text-[11px] font-bold text-slate-700">
            <span>Web Development</span>
            <span>45% (Rp 61.200.000)</span>
          </div>
          <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
            <div class="bg-blue-500 h-full rounded-full" style="width: 45%"></div>
          </div>
        </div>
        <!-- Performance Ads -->
        <div class="space-y-1">
          <div class="flex justify-between text-[11px] font-bold text-slate-700">
            <span>Performance Ads</span>
            <span>25% (Rp 33.800.000)</span>
          </div>
          <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
            <div class="bg-orange-400 h-full rounded-full" style="width: 25%"></div>
          </div>
        </div>
        <!-- Design 3D & Arsitek -->
        <div class="space-y-1">
          <div class="flex justify-between text-[11px] font-bold text-slate-700">
            <span>Design 3D & Arsitek</span>
            <span>15% (Rp 20.300.000)</span>
          </div>
          <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
            <div class="bg-red-400 h-full rounded-full" style="width: 15%"></div>
          </div>
        </div>
        <!-- Social Media -->
        <div class="space-y-1">
          <div class="flex justify-between text-[11px] font-bold text-slate-700">
            <span>Social Media Management</span>
            <span>8% (Rp 10.800.000)</span>
          </div>
          <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
            <div class="bg-pink-400 h-full rounded-full" style="width: 8%"></div>
          </div>
        </div>
        <!-- Brand Identity & 3D (merged/other) -->
        <div class="space-y-1">
          <div class="flex justify-between text-[11px] font-bold text-slate-700">
            <span>Brand & 3D visualization</span>
            <span>7% (Rp 9.400.000)</span>
          </div>
          <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
            <div class="bg-purple-400 h-full rounded-full" style="width: 7%"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right: Transaction History Log (Takes 2 Cols) -->
    <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 shadow-card overflow-hidden">
      <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
        <div class="flex items-center gap-2">
          <div class="w-6 h-6 bg-slate-100 rounded-lg flex items-center justify-center text-xs text-slate-650">
            <i class="fa-solid fa-list-check"></i>
          </div>
          <div>
            <h3 class="text-xs font-bold text-slate-700 uppercase tracking-widest">Recent Payments History</h3>
            <p class="text-[10px] text-slate-400 mt-0.5">Catatan invoice lunas terverifikasi oleh sistem notifikasi global</p>
          </div>
        </div>
        <span class="text-[10px] font-bold text-slate-550 bg-slate-50 border border-slate-200 px-2 py-1 rounded-lg">Last 30 Days</span>
      </div>

      <!-- Transaction Table -->
      <div class="overflow-x-auto">
        <table class="w-full text-left">
          <thead>
            <tr class="bg-slate-50 border-b border-slate-100 text-[10px] font-bold uppercase tracking-widest text-slate-450">
              <th class="px-5 py-3.5">Invoice ID</th>
              <th class="px-4 py-3.5">Client Account</th>
              <th class="px-4 py-3.5">Payment Method</th>
              <th class="px-4 py-3.5 text-right">Settled Amount</th>
              <th class="px-5 py-3.5 text-right">Payment Date</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100 text-xs text-slate-600">
            <tr class="hover:bg-slate-50 transition-colors">
              <td class="px-5 py-3.5 font-mono text-indigo-650 font-bold">#INV-2026-001</td>
              <td class="px-4 py-3.5">
                <p class="font-bold text-slate-800">PT Maju Bersama</p>
                <span class="text-[9px] text-slate-400">Web Development</span>
              </td>
              <td class="px-4 py-3.5">
                <span class="inline-flex items-center gap-1 text-[9px] font-bold text-slate-650 bg-slate-100 px-2 py-0.5 rounded">
                  <i class="fa-solid fa-building-columns text-slate-400"></i> Bank Transfer
                </span>
              </td>
              <td class="px-4 py-3.5 text-right font-bold text-slate-800">Rp 45.000.000</td>
              <td class="px-5 py-3.5 text-right text-slate-400">04 Juni 2026</td>
            </tr>
            <tr class="hover:bg-slate-50 transition-colors">
              <td class="px-5 py-3.5 font-mono text-indigo-655 font-bold">#INV-2026-004</td>
              <td class="px-4 py-3.5">
                <p class="font-bold text-slate-800">PT Maju Bersama</p>
                <span class="text-[9px] text-slate-400">Brand Identity</span>
              </td>
              <td class="px-4 py-3.5">
                <span class="inline-flex items-center gap-1 text-[9px] font-bold text-slate-650 bg-slate-100 px-2 py-0.5 rounded">
                  <i class="fa-solid fa-credit-card text-slate-400"></i> Credit Card
                </span>
              </td>
              <td class="px-4 py-3.5 text-right font-bold text-slate-800">Rp 12.000.000</td>
              <td class="px-5 py-3.5 text-right text-slate-400">01 Juni 2026</td>
            </tr>
            <tr class="hover:bg-slate-50 transition-colors">
              <td class="px-5 py-3.5 font-mono text-indigo-660 font-bold">#INV-2026-009</td>
              <td class="px-4 py-3.5">
                <p class="font-bold text-slate-800">Startup Nusantara</p>
                <span class="text-[9px] text-slate-400">Social Media</span>
              </td>
              <td class="px-4 py-3.5">
                <span class="inline-flex items-center gap-1 text-[9px] font-bold text-slate-655 bg-slate-100 px-2 py-0.5 rounded">
                  <i class="fa-brands fa-paypal text-slate-400"></i> PayPal
                </span>
              </td>
              <td class="px-4 py-3.5 text-right font-bold text-slate-800">Rp 8.500.000</td>
              <td class="px-5 py-3.5 text-right text-slate-400">28 Mei 2026</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

</div>
