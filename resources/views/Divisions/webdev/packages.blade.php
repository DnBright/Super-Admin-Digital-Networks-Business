@php
    $packages = $packages ?? collect();
@endphp

<div x-show="currentTab === 'webdev_packages'" class="space-y-6" x-data="{ activeEditId: null }" x-cloak>
    <!-- Success Alert -->
    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 p-4 rounded-xl text-sm flex items-center justify-between">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- Toolbar -->
    <div class="bg-slate-900/40 p-4 rounded-xl border border-slate-800">
        <h3 class="text-sm font-bold text-slate-200 uppercase tracking-wider">JasaBuatWebsite Pricing Packages</h3>
        <p class="text-xs text-slate-500 mt-0.5">Kelola penawaran paket harga dan struktur cicilan pembayaran bagi klien UMKM</p>
    </div>

    <!-- Pricing Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($packages as $package)
            <div class="glass rounded-xl p-6 border border-slate-800/80 flex flex-col justify-between relative {{ $package->is_popular ? 'ring-2 ring-indigo-500' : '' }}">
                @if($package->is_popular)
                    <span class="absolute -top-3 right-4 bg-indigo-600 text-white text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full">
                        POPULAR CHOICE
                    </span>
                @endif

                <div class="space-y-4">
                    <div>
                        <h4 class="text-lg font-bold text-slate-100">{{ $package->name }}</h4>
                        <div class="flex items-baseline gap-1 mt-2">
                            <span class="text-2xl font-black text-slate-100">Rp {{ $package->price }}</span>
                        </div>
                        <span class="text-[10px] text-indigo-400 font-semibold bg-indigo-500/10 border border-indigo-500/20 px-2 py-0.5 rounded-full mt-2 inline-block">
                            {!! $package->payment_terms !!}
                        </span>
                    </div>

                    <!-- Features -->
                    <div class="pt-4 border-t border-slate-800/60 space-y-2.5">
                        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Features included:</span>
                        <ul class="space-y-2 text-xs text-slate-400">
                            @foreach($package->features as $feature)
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-emerald-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                    <span>{!! $feature['text'] !!}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="pt-6">
                    <button @click="activeEditId = {{ $package->id }}" class="w-full bg-slate-800 hover:bg-slate-750 border border-slate-700 text-slate-200 font-bold text-xs py-2 rounded-lg transition-colors flex items-center justify-center gap-1.5 shadow">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                        Configure Package
                    </button>
                </div>

                <!-- EDIT PACKAGE MODAL -->
                <div x-show="activeEditId === {{ $package->id }}" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-50 flex items-center justify-center p-4" x-cloak>
                    <div class="bg-slate-900 border border-slate-800 w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden" @click.away="activeEditId = null">
                        <!-- Modal Header -->
                        <div class="px-6 py-4 border-b border-slate-850 flex items-center justify-between">
                            <h3 class="text-base font-bold text-slate-200">Configure Package: {{ $package->name }}</h3>
                            <button @click="activeEditId = null" class="text-slate-400 hover:text-white text-lg">&times;</button>
                        </div>
                        
                        <!-- Modal Body -->
                        <form action="{{ route('webdev.packages.update', $package->id) }}" method="POST" class="p-6 space-y-4 text-xs">
                            @csrf
                            @method('PUT')
                            
                            <div class="space-y-1.5">
                                <label class="block font-bold text-slate-400 uppercase tracking-wider">Package Name</label>
                                <input type="text" name="name" value="{{ $package->name }}" required class="w-full bg-slate-950 border border-slate-800 rounded-lg p-2.5 text-slate-200 focus:outline-none focus:border-indigo-500">
                            </div>
                            
                            <div class="space-y-1.5">
                                <label class="block font-bold text-slate-400 uppercase tracking-wider">Base Price (Rp)</label>
                                <input type="text" name="price" value="{{ $package->price }}" required class="w-full bg-slate-950 border border-slate-800 rounded-lg p-2.5 text-slate-200 focus:outline-none focus:border-indigo-500" placeholder="e.g. 2.500.000">
                            </div>
                            
                            <div class="space-y-1.5">
                                <label class="block font-bold text-slate-400 uppercase tracking-wider">Payment Terms</label>
                                <input type="text" name="payment_terms" value="{{ $package->payment_terms }}" required class="w-full bg-slate-950 border border-slate-800 rounded-lg p-2.5 text-slate-200 focus:outline-none focus:border-indigo-500" placeholder="e.g. Bisa dicicil 3x">
                            </div>

                            <!-- Popular Option -->
                            <div class="flex items-center justify-between bg-slate-950 border border-slate-800 p-3 rounded-lg">
                                <div>
                                    <span class="font-bold text-slate-350 block">Mark as Popular</span>
                                    <span class="text-[10px] text-slate-500">Menampilkan tag populer di landing page</span>
                                </div>
                                <input type="checkbox" name="is_popular" value="1" {{ $package->is_popular ? 'checked' : '' }} class="w-4 h-4 accent-indigo-600">
                            </div>
                            
                            <!-- Features Config -->
                            <div class="space-y-2">
                                <label class="block font-bold text-slate-400 uppercase tracking-wider">Features List (One per line)</label>
                                <textarea name="features[]" rows="5" class="w-full bg-slate-950 border border-slate-800 rounded-lg p-2.5 text-slate-200 font-mono focus:outline-none focus:border-indigo-500" placeholder="Tuliskan satu fitur per baris...">@foreach($package->features as $feature){{ str_replace('<strong>', '', str_replace('</strong>', '', $feature['text'])) }}&#10;@endforeach</textarea>
                            </div>
                            
                            <!-- Actions -->
                            <div class="pt-4 border-t border-slate-850 flex items-center justify-end gap-2">
                                <button type="button" @click="activeEditId = null" class="bg-slate-800 text-slate-300 font-semibold px-4 py-2 rounded-lg hover:bg-slate-750 transition-colors">Cancel</button>
                                <button type="submit" class="bg-indigo-600 text-white font-semibold px-4 py-2 rounded-lg hover:bg-indigo-500 transition-colors">Save Package</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
