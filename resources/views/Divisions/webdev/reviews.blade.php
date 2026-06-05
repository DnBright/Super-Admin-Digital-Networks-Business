@php
    $reviews = $reviews ?? collect();
@endphp

<div x-show="currentTab === 'webdev_reviews'" class="space-y-6" x-cloak>
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
        <h3 class="text-sm font-bold text-slate-200 uppercase tracking-wider">JasaBuatWebsite Client Reviews</h3>
        <p class="text-xs text-slate-500 mt-0.5">Kelola ulasan masuk dari klien untuk ditampilkan pada detail template</p>
    </div>

    <!-- Reviews Table -->
    <div class="glass rounded-xl p-6 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm divide-y divide-slate-800">
                <thead>
                    <tr class="text-xs font-bold text-slate-400 uppercase tracking-widest pb-3">
                        <th class="py-3">Reviewer</th>
                        <th class="py-3">Template</th>
                        <th class="py-3">Rating</th>
                        <th class="py-3">Comment</th>
                        <th class="py-3">Status</th>
                        <th class="py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60 text-xs text-slate-300">
                    @forelse($reviews as $review)
                        <tr class="hover:bg-slate-800/20 transition-colors">
                            <td class="py-4 font-semibold text-slate-200">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-7 h-7 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center font-bold text-[10px] text-slate-400">
                                        {{ substr($review->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-200">{{ $review->name }}</p>
                                        <p class="text-[10px] text-slate-500">{{ $review->email ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 font-semibold text-indigo-400">{{ $review->webTemplate->name ?? 'N/A' }}</td>
                            <td class="py-4 font-bold text-amber-400">⭐ {{ $review->rating }} / 5</td>
                            <td class="py-4 max-w-xs truncate" title="{{ $review->comment }}">{{ $review->comment }}</td>
                            <td class="py-4">
                                @if($review->is_approved)
                                    <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Approved</span>
                                @else
                                    <span class="px-2 py-0.5 text-[9px] font-bold rounded bg-amber-500/10 text-amber-400 border border-amber-500/20">Pending</span>
                                @endif
                            </td>
                            <td class="py-4 text-right space-x-1.5 flex items-center justify-end">
                                <form action="{{ route('webdev.reviews.toggle', $review->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-[11px] font-bold px-2 py-1.5 rounded-lg border transition-colors {{ $review->is_approved ? 'text-amber-400 bg-amber-500/10 border-amber-500/20 hover:bg-amber-500/20' : 'text-emerald-400 bg-emerald-500/10 border-emerald-500/20 hover:bg-emerald-500/20' }}">
                                        {{ $review->is_approved ? 'Unapprove' : 'Approve' }}
                                    </button>
                                </form>
                                <form action="{{ route('webdev.reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-[11px] font-bold text-rose-450 bg-rose-500/10 border border-rose-500/20 hover:bg-rose-500/20 px-2 py-1.5 rounded-lg transition-colors">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-500 text-xs font-semibold">No reviews found in JasaBuatWebsite DB.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
