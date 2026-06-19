<div x-show="currentTab === 'billing_invoice'" class="space-y-5" x-cloak>
  
  <!-- Billing & Invoice Header -->
  <div class="flex items-center justify-between">
    <div>
      <h2 class="text-slate-800 font-bold text-base">Billing Console & Invoice Issuer</h2>
      <p class="text-slate-505 text-xs mt-0.5">Kelola seluruh tagihan divisi terpusat dan terbitkan invoice review client.</p>
    </div>
    
    <!-- Filters tab links -->
    <div class="flex bg-slate-100 p-0.5 border border-slate-200 rounded-lg">
      <button @click="billingFilter = 'all'" :class="billingFilter === 'all' ? 'bg-white text-slate-800 shadow-sm' : 'text-slate-500 hover:text-slate-700'" class="text-[10px] font-bold px-3 py-1.5 rounded-md transition-all">All</button>
      <button @click="billingFilter = 'paid'" :class="billingFilter === 'paid' ? 'bg-white text-slate-800 shadow-sm' : 'text-slate-500 hover:text-slate-700'" class="text-[10px] font-bold px-3 py-1.5 rounded-md transition-all">Paid</button>
      <button @click="billingFilter = 'unpaid'" :class="billingFilter === 'unpaid' ? 'bg-white text-slate-800 shadow-sm' : 'text-slate-500 hover:text-slate-700'" class="text-[10px] font-bold px-3 py-1.5 rounded-md transition-all">Unpaid</button>
      <button @click="billingFilter = 'overdue'" :class="billingFilter === 'overdue' ? 'bg-white text-slate-800 shadow-sm' : 'text-slate-500 hover:text-slate-700'" class="text-[10px] font-bold px-3 py-1.5 rounded-md transition-all">Overdue</button>
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
    
    <!-- Central Invoice List Table (Takes 2 Cols) -->
    <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 shadow-card overflow-hidden">
      <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
        <div class="flex items-center gap-2.5">
          <div class="w-7 h-7 rounded-lg bg-indigo-600 flex items-center justify-center">
            <i class="fa-solid fa-file-invoice-dollar text-white text-xs"></i>
          </div>
          <div>
            <h3 class="text-[13px] font-bold text-slate-800">Invoice Registry</h3>
            <p class="text-[11px] text-slate-400">Total invoice terdaftar berdasarkan filter</p>
          </div>
        </div>
      </div>

      <!-- Invoices Table list -->
      <div class="overflow-x-auto">
        <table class="w-full text-left">
          <thead>
            <tr class="bg-slate-50 border-b border-slate-100 text-[10px] font-bold uppercase tracking-widest text-slate-455">
              <th class="px-5 py-3.5">Invoice ID</th>
              <th class="px-4 py-3.5">Client & Division</th>
              <th class="px-4 py-3.5">Settlement Amount</th>
              <th class="px-4 py-3.5">Due Date</th>
              <th class="px-4 py-3.5 text-center">Status</th>
              <th class="px-5 py-3.5 text-right">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100 text-xs text-slate-600">
            <template x-for="inv in invoices" :key="inv.id">
              <tr x-show="billingFilter === 'all' || inv.status === billingFilter" class="hover:bg-slate-50 transition-colors">
                <td class="px-5 py-3.5 font-mono text-indigo-650 font-bold" x-text="'#' + inv.invoiceNo"></td>
                <td class="px-4 py-3.5">
                  <p class="font-bold text-slate-800" x-text="inv.clientName"></p>
                  <span class="text-[9px] text-slate-400" x-text="inv.division"></span>
                </td>
                <td class="px-4 py-3.5 font-bold text-slate-800" x-text="inv.amount"></td>
                <td class="px-4 py-3.5 text-slate-500" x-text="inv.dueDate"></td>
                <td class="px-4 py-3.5 text-center">
                  <span class="px-2 py-0.5 rounded text-[9px] font-bold uppercase tracking-wide"
                        :class="inv.status === 'paid' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : (inv.status === 'overdue' ? 'bg-rose-50 text-rose-700 border border-rose-200' : 'bg-amber-50 text-amber-700 border border-amber-200')"
                        x-text="inv.status"></span>
                </td>
                <td class="px-5 py-3.5 text-right flex justify-end gap-2.5">
                  <a :href="'/billing-invoice/' + inv.id + '/pdf'" 
                     class="text-indigo-650 hover:text-indigo-800 font-bold text-[10px] hover:underline flex items-center gap-1">
                    <i class="fa-solid fa-file-pdf"></i> PDF
                  </a>
                </td>
              </tr>
            </template>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Quick Invoice Generator (Takes 1 Col) -->
    <div class="space-y-5">
      
      <!-- Quick Invoice Issuer Form -->
      <div class="bg-white rounded-xl border border-slate-200 shadow-card p-5 space-y-4">
        <h3 class="text-xs font-bold text-slate-700 uppercase tracking-widest flex items-center gap-2">
          <i class="fa-solid fa-file-circle-plus text-indigo-500"></i>
          Quick Invoice Issuer
        </h3>
        <p class="text-[11px] text-slate-500 leading-relaxed">Terbitkan draft invoice baru untuk client terdaftar di database.</p>

        <form @submit.prevent="createInvoice()" class="space-y-3">
          <!-- Client select -->
          <div>
            <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">Select Client</label>
            <select x-model="newInvoiceClient" required class="w-full bg-slate-50 border border-slate-200 rounded-lg p-2 text-xs text-slate-700 focus:outline-none focus:border-indigo-500 transition-colors">
              <option value="">-- Select Client --</option>
              <option value="PT Maju Bersama">PT Maju Bersama</option>
              <option value="CV Kreasi Digital">CV Kreasi Digital</option>
              <option value="Startup Nusantara">Startup Nusantara</option>
              <option value="Nusantara Global">Nusantara Global</option>
            </select>
          </div>

          <!-- Division select -->
          <div>
            <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">Project Division</label>
            <select x-model="newInvoiceDiv" required class="w-full bg-slate-50 border border-slate-200 rounded-lg p-2 text-xs text-slate-700 focus:outline-none focus:border-indigo-500 transition-colors">
              <option value="">-- Select Division --</option>
              <option value="Web Dev">Web Development</option>
              <option value="Brand Identity">Brand Identity</option>
              <option value="Perf. Ads">Performance Ads</option>
              <option value="3D Mockup">3D Mockup</option>
              <option value="Social Media">Social Media</option>
              <option value="Design 3D">Design 3D & Arsitek</option>
            </select>
          </div>

          <!-- Amount -->
          <div>
            <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">Billing Amount (Rp)</label>
            <input type="number" x-model="newInvoiceAmount" required placeholder="Contoh: 15000000"
                   class="w-full bg-slate-50 border border-slate-200 rounded-lg p-2 text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:border-indigo-500 transition-colors">
          </div>

          <!-- Due Date -->
          <div>
            <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">Due Date</label>
            <input type="date" x-model="newInvoiceDueDate" required
                   class="w-full bg-slate-50 border border-slate-200 rounded-lg p-2 text-xs text-slate-700 focus:outline-none focus:border-indigo-500 transition-colors">
          </div>

          <button type="submit"
                  class="bg-indigo-600 hover:bg-indigo-550 text-white font-semibold text-xs py-2 rounded-lg transition-all shadow-lg shadow-indigo-600/15 hover:shadow-indigo-600/25 active:scale-[0.99] w-full flex items-center justify-center gap-1.5">
            <i class="fa-solid fa-paper-plane"></i>
            Issue & Send Invoice
          </button>
        </form>
      </div>

      <!-- Billing Summary status ratio -->
      <div class="bg-white rounded-xl border border-slate-200 shadow-card p-5 space-y-4">
        <h3 class="text-xs font-bold text-slate-700 uppercase tracking-widest">Settlement Breakdown</h3>
        <div class="space-y-3.5">
          <!-- Paid -->
          <div class="space-y-1">
            <div class="flex justify-between text-[10px] font-bold text-slate-505">
              <span>Paid Invoices</span>
              <span class="text-emerald-650 font-bold">57.000.000 (Rp)</span>
            </div>
            <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
              <div class="bg-emerald-500 h-full rounded-full" style="width: 56%"></div>
            </div>
          </div>
          <!-- Unpaid -->
          <div class="space-y-1">
            <div class="flex justify-between text-[10px] font-bold text-slate-505">
              <span>Unpaid Drafts</span>
              <span class="text-amber-650 font-bold">50.000.000 (Rp)</span>
            </div>
            <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
              <div class="bg-amber-500 h-full rounded-full" style="width: 44%"></div>
            </div>
          </div>
          <!-- Overdue -->
          <div class="space-y-1">
            <div class="flex justify-between text-[10px] font-bold text-slate-505">
              <span>Overdue Debts</span>
              <span class="text-rose-650 font-bold">28.500.000 (Rp)</span>
            </div>
            <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
              <div class="bg-rose-500 h-full rounded-full" style="width: 28%"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Blockchain Ledger Verification Card -->
      <div class="bg-white rounded-xl border border-slate-200 shadow-card p-5 space-y-4">
        <h3 class="text-xs font-bold text-slate-700 uppercase tracking-widest flex items-center gap-1.5">
          <i class="fa-solid fa-link text-indigo-500"></i>
          Blockchain Audit Ledger
        </h3>
        <p class="text-[11px] text-slate-500 leading-relaxed">Verifikasi integritas kriptografi hash chain seluruh invoice yang terdaftar di database.</p>

        <!-- Status Indikator -->
        <div class="p-3 rounded-lg border flex items-center justify-between text-xs font-semibold"
             :class="blockchainStatus === 'idle' ? 'bg-slate-50 border-slate-200 text-slate-600' : 
                     (blockchainStatus === 'validating' ? 'bg-indigo-50 border-indigo-200 text-indigo-700 animate-pulse' : 
                     (blockchainStatus === 'valid' ? 'bg-emerald-50 border-emerald-200 text-emerald-700' : 'bg-rose-50 border-rose-200 text-rose-700'))">
          <span x-text="blockchainStatus === 'idle' ? 'Ready to Audit' : 
                       (blockchainStatus === 'validating' ? 'Checking Hashes...' : 
                       (blockchainStatus === 'valid' ? 'Ledger Secured (Safe)' : 'Ledger Tampered! (Danger)'))"></span>
          <span class="w-2.5 h-2.5 rounded-full"
                :class="blockchainStatus === 'idle' ? 'bg-slate-400' : 
                        (blockchainStatus === 'validating' ? 'bg-indigo-500' : 
                        (blockchainStatus === 'valid' ? 'bg-emerald-500 shadow-[0_0_8px_#10b981]' : 'bg-rose-500 shadow-[0_0_8px_#ef4444] animate-ping'))"></span>
        </div>

        <!-- Logs Box -->
        <div x-show="blockchainLogs.length > 0" class="bg-slate-900 rounded-lg p-3 text-[10px] font-mono text-slate-350 max-h-[120px] overflow-y-auto space-y-1">
          <template x-for="log in blockchainLogs">
            <div x-text="log" :class="log.includes('[AMAN]') ? 'text-emerald-450 font-bold' : 'text-rose-400'"></div>
          </template>
        </div>

        <button @click="validateBlockchainLedger()" :disabled="blockchainStatus === 'validating'"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-[11px] py-2 rounded-lg transition-all shadow-md active:scale-[0.99] w-full flex items-center justify-center gap-1.5 disabled:opacity-50">
          <i class="fa-solid fa-shield-halved"></i>
          Audit Chain Integrity
        </button>
      </div>

    </div>

  </div>

</div>
