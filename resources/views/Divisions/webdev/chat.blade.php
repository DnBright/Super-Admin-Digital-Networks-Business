@php
    $sessions = $sessions ?? collect();
    $activeSessionId = $activeSessionId ?? null;
    $activeMessages = $activeMessages ?? collect();
    $activeSession = $activeSession ?? null;
@endphp

<div x-show="currentTab === 'webdev_chat'" class="space-y-4" x-cloak>

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 p-4 rounded-xl text-sm flex items-center gap-2">
            <svg class="w-4 h-4 flex-shrink-0 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Header Stats Bar --}}
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-white border border-slate-200 shadow-card rounded-xl p-4 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-blue-50 border border-blue-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-450 uppercase tracking-widest">Total Sessions</p>
                <p class="text-lg font-black text-slate-800 mt-0.5">{{ $sessions->count() }}</p>
            </div>
        </div>
        <div class="bg-white border border-slate-200 shadow-card rounded-xl p-4 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-amber-50 border border-amber-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-amber-550" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-455 uppercase tracking-widest">Unread Messages</p>
                <p class="text-lg font-black text-slate-800 mt-0.5">{{ $sessions->sum('unread_count') }}</p>
            </div>
        </div>
        <div class="bg-white border border-slate-200 shadow-card rounded-xl p-4 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-emerald-50 border border-emerald-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-emerald-550" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.636 18.364a9 9 0 010-12.728M3.515 20.485a12 12 0 010-16.97M20.485 3.515a12 12 0 010 16.97M18.364 5.636a9 9 0 010 12.728"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-455 uppercase tracking-widest">Source Node</p>
                <p class="text-xs font-bold text-emerald-600 mt-1">JasaBuatWebsite DB</p>
            </div>
        </div>
    </div>

    {{-- Split Pane Layout --}}
    <div class="flex gap-4" style="height: calc(100vh - 280px); min-height: 480px;">

        {{-- LEFT: Sessions List --}}
        <div class="w-80 flex-shrink-0 bg-white border border-slate-200 shadow-card rounded-xl overflow-hidden flex flex-col">
            <div class="px-4 py-3.5 border-b border-slate-200 bg-slate-50/50 flex items-center justify-between">
                <h3 class="text-xs font-bold text-slate-700 uppercase tracking-wider">Active Sessions</h3>
                <span class="text-[10px] bg-blue-50 text-blue-600 border border-blue-100 px-2 py-0.5 rounded-full font-bold">{{ $sessions->count() }}</span>
            </div>

            <div class="flex-1 overflow-y-auto divide-y divide-slate-100">
                @forelse($sessions as $session)
                    <a href="{{ route('webdev.chat.index', ['session_id' => $session->session_id]) }}"
                       class="block px-4 py-3.5 transition-all duration-150 relative group
                              {{ $activeSessionId === $session->session_id
                                 ? 'bg-blue-50/60 border-l-2 border-blue-500'
                                 : 'hover:bg-slate-50/60 border-l-2 border-transparent' }}">

                        {{-- Unread Badge --}}
                        @if($session->unread_count > 0)
                            <span class="absolute top-3.5 right-3.5 bg-rose-500 text-white text-[10px] font-black w-5 h-5 rounded-full flex items-center justify-center shadow-lg shadow-rose-500/20">
                                {{ $session->unread_count > 9 ? '9+' : $session->unread_count }}
                            </span>
                        @endif

                        <div class="flex items-start gap-3">
                            {{-- Avatar --}}
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center flex-shrink-0 text-[11px] font-black text-white shadow-sm">
                                {{ strtoupper(substr($session->name ?? 'V', 0, 1)) }}
                            </div>

                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-bold text-slate-800 truncate">{{ $session->name ?? 'Visitor' }}</p>
                                <p class="text-[10px] text-slate-400 truncate mt-0.5">
                                    {{ $session->email_whatsapp ?? 'No contact info' }}
                                </p>
                                <p class="text-[10px] text-slate-500 truncate mt-1 italic">
                                    @if($session->latest_message_from_admin ?? false)
                                        <span class="text-blue-600 not-italic font-semibold">You: </span>
                                    @endif
                                    {{ Str::limit($session->latest_message ?? '...', 36) }}
                                </p>
                                <p class="text-[10px] text-slate-400 mt-1 font-mono">
                                    {{ \Carbon\Carbon::parse($session->latest_message_time)->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="flex flex-col items-center justify-center py-16 px-6 text-center">
                        <div class="w-12 h-12 rounded-full bg-slate-50 border border-slate-200 flex items-center justify-center mb-3">
                            <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        </div>
                        <p class="text-xs font-bold text-slate-450">Tidak ada percakapan aktif</p>
                        <p class="text-[10px] text-slate-400 mt-1">Pesan dari pengunjung JasaBuatWebsite akan muncul di sini.</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- RIGHT: Message Thread --}}
        <div class="flex-1 bg-white border border-slate-200 shadow-card rounded-xl overflow-hidden flex flex-col">

            @if($activeSession)
                {{-- Chat Header --}}
                <div class="px-5 py-3.5 border-b border-slate-200 flex items-center justify-between bg-slate-50/50">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center text-sm font-black text-white shadow-sm">
                            {{ strtoupper(substr($activeSession->name ?? 'V', 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-sm font-bold text-slate-800">{{ $activeSession->name ?? 'Visitor' }}</p>
                            <p class="text-[10px] text-slate-400">{{ $activeSession->email_whatsapp ?? 'No contact info' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] font-mono text-slate-400 bg-slate-100 px-2.5 py-1 rounded border border-slate-200">
                            session: {{ Str::limit($activeSessionId, 16) }}
                        </span>
                        <form action="{{ route('webdev.chat.destroy', $activeSessionId) }}" method="POST"
                              onsubmit="return confirm('Hapus seluruh percakapan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-600 hover:text-rose-700 bg-rose-50 border border-rose-100 hover:bg-rose-100 transition-colors text-xs font-bold px-3 py-1.5 rounded-lg">
                                Delete Session
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Messages Area --}}
                <div class="flex-1 overflow-y-auto p-5 space-y-4 bg-slate-50/30" id="messages-container">
                    @forelse($activeMessages as $msg)
                        <div class="flex {{ $msg->is_from_admin ? 'justify-end' : 'justify-start' }}">
                            @if(!$msg->is_from_admin)
                                <div class="w-7 h-7 rounded-full bg-slate-200 border border-slate-300 flex items-center justify-center text-[10px] font-black text-slate-650 mr-2 flex-shrink-0 mt-1 shadow-sm">
                                    {{ strtoupper(substr($msg->name ?? 'V', 0, 1)) }}
                                </div>
                            @endif

                            <div class="max-w-xs lg:max-w-md xl:max-w-lg">
                                <div class="rounded-2xl px-4 py-3 text-sm leading-relaxed shadow-sm
                                    {{ $msg->is_from_admin
                                       ? 'bg-blue-600 text-white rounded-tr-sm'
                                       : 'bg-white text-slate-800 border border-slate-200 rounded-tl-sm' }}">
                                    {{ $msg->message }}
                                </div>
                                <p class="text-[10px] text-slate-400 mt-1.5 {{ $msg->is_from_admin ? 'text-right' : 'text-left' }} font-medium">
                                    @if($msg->is_from_admin)
                                        <span class="text-blue-500 font-bold">Admin</span> &bull;
                                    @else
                                        <span class="font-bold text-slate-600">{{ $msg->name ?? 'Visitor' }}</span> &bull;
                                    @endif
                                    {{ \Carbon\Carbon::parse($msg->created_at)->format('H:i') }}
                                    @if($msg->is_from_admin)
                                        &bull;
                                        @if($msg->is_read)
                                            <span class="text-emerald-600 font-bold">Terkirim ✓</span>
                                        @else
                                            <span class="text-slate-400">Menunggu</span>
                                        @endif
                                    @endif
                                </p>
                            </div>

                            @if($msg->is_from_admin)
                                <div class="w-7 h-7 rounded-full bg-blue-600 flex items-center justify-center text-[10px] font-black text-white ml-2 flex-shrink-0 mt-1 shadow-sm">
                                    A
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="flex items-center justify-center h-full">
                            <p class="text-xs text-slate-400">Belum ada pesan dalam sesi ini.</p>
                        </div>
                    @endforelse
                </div>

                {{-- Reply Form --}}
                <div class="px-5 py-4 border-t border-slate-200 bg-slate-50/50">
                    <form action="{{ route('webdev.chat.send') }}" method="POST">
                        @csrf
                        <input type="hidden" name="session_id" value="{{ $activeSessionId }}">
                        <div class="flex gap-3 items-end">
                            <div class="flex-1">
                                <textarea name="message"
                                          id="reply-message"
                                          rows="2"
                                          required
                                          placeholder="Ketik balasan Anda kepada {{ $activeSession->name ?? 'pengunjung' }}..."
                                          class="w-full bg-white border border-slate-200 rounded-xl p-3 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 resize-none transition-colors shadow-sm"></textarea>
                            </div>
                            <button type="submit"
                                    class="flex-shrink-0 bg-blue-600 hover:bg-blue-500 active:bg-blue-750 text-white font-bold text-xs px-5 py-3 rounded-xl transition-all shadow-md shadow-blue-500/10 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                Kirim
                            </button>
                        </div>
                    </form>
                </div>

            @else
                {{-- Empty State --}}
                <div class="flex-1 flex flex-col items-center justify-center p-12 text-center bg-slate-50/20">
                    <div class="w-20 h-20 rounded-2xl bg-slate-50 border border-slate-200 flex items-center justify-center mb-5 shadow-sm">
                        <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    </div>
                    <h3 class="text-sm font-bold text-slate-800 mb-2">Pilih Percakapan</h3>
                    <p class="text-xs text-slate-500 max-w-xs leading-relaxed">
                        Tidak ada sesi aktif. Pilih percakapan dari daftar kiri, atau tunggu pengunjung mengirim pesan dari halaman JasaBuatWebsite.
                    </p>
                    <div class="mt-6 bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-left max-w-sm w-full shadow-sm">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Koneksi Database</p>
                        <div class="flex items-center gap-2 text-xs text-emerald-600 font-semibold">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                            Terhubung ke JasaBuatWebsite SQLite DB
                        </div>
                        <p class="text-[10px] text-slate-400 mt-1.5 leading-normal">Pesan live chat disimpan di database terpisah milik divisi Web Dev.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>

<script>
    // Auto scroll messages to bottom on load
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.getElementById('messages-container');
        if (container) {
            container.scrollTop = container.scrollHeight;
        }

        // Auto-refresh every 15 seconds to check for new messages
        @if($activeSessionId)
        setTimeout(function () {
            // Only reload if we are still on the active tab to prevent random jumps
            if (typeof Alpine !== 'undefined' && Alpine.store && Alpine.store('currentTab') === 'webdev_chat') {
                window.location.reload();
            } else {
                window.location.reload();
            }
        }, 15000);
        @endif

        // Ctrl+Enter to send
        const textarea = document.getElementById('reply-message');
        if (textarea) {
            textarea.addEventListener('keydown', function (e) {
                if ((e.ctrlKey || e.key === 'Enter') && e.key === 'Enter') {
                    if (e.ctrlKey || e.metaKey) {
                        e.preventDefault();
                        this.closest('form').submit();
                    }
                }
            });
        }
    });
</script>
