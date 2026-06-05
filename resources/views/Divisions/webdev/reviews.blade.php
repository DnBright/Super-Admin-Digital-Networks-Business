@php
    $reviews = $reviews ?? collect();
@endphp

<div x-show="currentTab === 'webdev_reviews'" class="space-y-6" x-cloak>
    <!-- Success Alert -->
    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 p-4 rounded-xl text-sm flex items-center justify-between">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- Toolbar -->
    <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-card">
        <h3 class="text-sm font-bold text-slate-850 uppercase tracking-wider">JasaBuatWebsite Client Reviews</h3>
        <p class="text-xs text-slate-500 mt-0.5">Kelola ulasan masuk dari klien untuk ditampilkan pada detail template</p>
    </div>

    <!-- Reviews Table -->
    <div class="bg-white border border-slate-200 shadow-card rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-[10px] font-bold uppercase tracking-widest text-slate-400">
                        <th class="px-5 py-3">Reviewer</th>
                        <th class="px-4 py-3">Template</th>
                        <th class="px-4 py-3">Rating</th>
                        <th class="px-4 py-3">Comment</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs text-slate-650">
                    @forelse($reviews as $review)
                        <tr class="trow transition-colors">
                            <td class="px-5 py-3.5">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-7 h-7 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-[10px] text-slate-500">
                                        {{ strtoupper(substr($review->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800">{{ $review->name }}</p>
                                        <p class="text-[10px] text-slate-400">{{ $review->email ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3.5 font-semibold text-brand-600">{{ $review->webTemplate->name ?? 'N/A' }}</td>
                            <td class="px-4 py-3.5 font-bold text-amber-550">⭐ {{ $review->rating }} / 5</td>
                            <td class="px-4 py-3.5 max-w-xs truncate" title="{{ $review->comment }}">{{ $review->comment }}</td>
                            <td class="px-4 py-3.5">
                                @if($review->is_approved)
                                    <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-emerald-50 text-emerald-700 border border-emerald-100">Approved</span>
                                @else
                                    <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-amber-50 text-amber-700 border border-amber-100">Pending</span>
                                @endif
                            </td>
                            <td class="px-5 py-3.5 text-right space-x-1.5 flex items-center justify-end">
                                <form action="{{ route('webdev.reviews.toggle', $review->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-[11px] font-bold px-2.5 py-1.5 rounded-lg border transition-colors {{ $review->is_approved ? 'text-amber-700 bg-amber-50 border-amber-200 hover:bg-amber-100' : 'text-emerald-700 bg-emerald-50 border-emerald-200 hover:bg-emerald-100' }}">
                                        {{ $review->is_approved ? 'Unapprove' : 'Approve' }}
                                    </button>
                                </form>
                                <form action="{{ route('webdev.reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-[11px] font-bold text-rose-600 bg-rose-50 border border-rose-100 hover:bg-rose-150/60 px-2.5 py-1.5 rounded-lg transition-colors">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-8 text-center text-slate-450 text-xs font-semibold bg-slate-50/10">No reviews found in JasaBuatWebsite DB.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
