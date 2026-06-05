@php
    $templates = $templates ?? collect();
@endphp

<div x-show="currentTab === 'webdev_templates'" class="space-y-6" x-data="{ showAddModal: false, activeEditId: null }" x-cloak>
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
    <div class="flex items-center justify-between bg-slate-900/40 p-4 rounded-xl border border-slate-800">
        <div>
            <h3 class="text-sm font-bold text-slate-200 uppercase tracking-wider">JasaBuatWebsite Design Templates</h3>
            <p class="text-xs text-slate-500 mt-0.5">Tambah atau edit contoh desain web yang dapat dipilih klien UMKM</p>
        </div>
        <button @click="showAddModal = true" class="bg-blue-600 hover:bg-blue-500 text-white font-semibold text-xs px-4 py-2 rounded-lg transition-colors border border-blue-500/30 shadow flex items-center gap-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Add New Template
        </button>
    </div>

    <!-- Templates Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($templates as $template)
            <div class="glass rounded-xl overflow-hidden border border-slate-800/80 flex flex-col justify-between">
                <!-- Thumbnail -->
                <div class="relative h-48 bg-slate-950 overflow-hidden border-b border-slate-800">
                    <img src="/Users/mac/Project Website/Kerja/jasabuatwebsite/public/{{ $template->image }}" 
                         alt="{{ $template->name }}" 
                         class="w-full h-full object-cover"
                         onerror="this.src='{{ asset($template->image) }}'">
                    <span class="absolute top-3 left-3 bg-slate-900/80 backdrop-blur-md border border-slate-700 text-[10px] font-mono font-bold text-blue-400 px-2 py-0.5 rounded-full uppercase tracking-wider">
                        {{ $template->category }}
                    </span>
                </div>
                
                <!-- Details -->
                <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                    <div>
                        <h4 class="text-base font-bold text-slate-200">{{ $template->name }}</h4>
                        <p class="text-xs text-slate-400 leading-relaxed mt-2 line-clamp-3">
                            {{ $template->description ?? 'Tidak ada deskripsi template.' }}
                        </p>
                    </div>
                    
                    <div class="pt-4 border-t border-slate-800/60 flex items-center justify-between">
                        <span class="text-xs font-bold text-amber-400 flex items-center gap-1">
                            ⭐ {{ $template->rating }}
                            <span class="text-slate-500 font-normal">({{ $template->reviews_count }} reviews)</span>
                        </span>
                        
                        <!-- Action Buttons -->
                        <div class="flex items-center gap-2">
                            <button @click="activeEditId = {{ $template->id }}" class="text-xs font-bold text-blue-400 hover:text-blue-300 bg-blue-500/10 border border-blue-500/20 px-2.5 py-1.5 rounded-lg transition-colors">
                                Edit
                            </button>
                            <form action="{{ route('webdev.templates.destroy', $template->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus template ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-bold text-rose-400 hover:text-rose-300 bg-rose-500/10 border border-rose-500/20 px-2.5 py-1.5 rounded-lg transition-colors">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- EDIT TEMPLATE MODAL FOR THIS ITEM -->
                <div x-show="activeEditId === {{ $template->id }}" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-50 flex items-center justify-center p-4" x-cloak>
                    <div class="bg-slate-900 border border-slate-800 w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden" @click.away="activeEditId = null">
                        <!-- Modal Header -->
                        <div class="px-6 py-4 border-b border-slate-850 flex items-center justify-between">
                            <h3 class="text-base font-bold text-slate-200">Edit Template: {{ $template->name }}</h3>
                            <button @click="activeEditId = null" class="text-slate-400 hover:text-white text-lg">&times;</button>
                        </div>
                        
                        <!-- Modal Body -->
                        <form action="{{ route('webdev.templates.update', $template->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4 text-xs">
                            @csrf
                            @method('PUT')
                            
                            <div class="space-y-1.5">
                                <label class="block font-bold text-slate-400 uppercase tracking-wider">Template Name</label>
                                <input type="text" name="name" value="{{ $template->name }}" required class="w-full bg-slate-950 border border-slate-800 rounded-lg p-2.5 text-slate-200 focus:outline-none focus:border-blue-500">
                            </div>
                            
                            <div class="space-y-1.5">
                                <label class="block font-bold text-slate-400 uppercase tracking-wider">Category</label>
                                <input type="text" name="category" value="{{ $template->category }}" required class="w-full bg-slate-950 border border-slate-800 rounded-lg p-2.5 text-slate-200 focus:outline-none focus:border-blue-500" placeholder="e.g. Web Design > Landing Page">
                            </div>
                            
                            <div class="space-y-1.5">
                                <label class="block font-bold text-slate-400 uppercase tracking-wider">Description</label>
                                <textarea name="description" rows="3" class="w-full bg-slate-950 border border-slate-800 rounded-lg p-2.5 text-slate-200 focus:outline-none focus:border-blue-500">{{ $template->description }}</textarea>
                            </div>
                            
                            <div class="space-y-1.5">
                                <label class="block font-bold text-slate-400 uppercase tracking-wider">Template Thumbnail Image</label>
                                <div class="bg-slate-950 border border-slate-800 p-2.5 rounded-lg flex items-center gap-4">
                                    <img src="/Users/mac/Project Website/Kerja/jasabuatwebsite/public/{{ $template->image }}" class="w-12 h-12 object-cover rounded-md border border-slate-800" onerror="this.src='{{ asset($template->image) }}'">
                                    <div class="flex-1">
                                        <input type="file" name="image" class="text-[11px] text-slate-400">
                                        <span class="block text-[10px] text-slate-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar. Max 5MB.</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Actions -->
                            <div class="pt-4 border-t border-slate-850 flex items-center justify-end gap-2">
                                <button type="button" @click="activeEditId = null" class="bg-slate-800 text-slate-300 font-semibold px-4 py-2 rounded-lg hover:bg-slate-750 transition-colors">Cancel</button>
                                <button type="submit" class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-500 transition-colors">Update Template</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-12 text-slate-500 text-xs font-semibold">
                No templates configured.
            </div>
        @endforelse
    </div>

    <!-- ADD TEMPLATE MODAL -->
    <div x-show="showAddModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-50 flex items-center justify-center p-4" x-cloak>
        <div class="bg-slate-900 border border-slate-800 w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden" @click.away="showAddModal = false">
            <!-- Modal Header -->
            <div class="px-6 py-4 border-b border-slate-850 flex items-center justify-between">
                <h3 class="text-base font-bold text-slate-200">Add New Design Template</h3>
                <button @click="showAddModal = false" class="text-slate-400 hover:text-white text-lg">&times;</button>
            </div>
            
            <!-- Modal Body -->
            <form action="{{ route('webdev.templates.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4 text-xs">
                @csrf
                
                <div class="space-y-1.5">
                    <label class="block font-bold text-slate-400 uppercase tracking-wider">Template Name</label>
                    <input type="text" name="name" required class="w-full bg-slate-950 border border-slate-800 rounded-lg p-2.5 text-slate-200 focus:outline-none focus:border-blue-500" placeholder="e.g. Kuliner Prima">
                </div>
                
                <div class="space-y-1.5">
                    <label class="block font-bold text-slate-400 uppercase tracking-wider">Category</label>
                    <input type="text" name="category" required class="w-full bg-slate-950 border border-slate-800 rounded-lg p-2.5 text-slate-200 focus:outline-none focus:border-blue-500" placeholder="e.g. Web Design > F&B Landing Page">
                </div>
                
                <div class="space-y-1.5">
                    <label class="block font-bold text-slate-400 uppercase tracking-wider">Description</label>
                    <textarea name="description" rows="3" class="w-full bg-slate-950 border border-slate-800 rounded-lg p-2.5 text-slate-200 focus:outline-none focus:border-blue-500" placeholder="Jelaskan detail template di sini..."></textarea>
                </div>
                
                <div class="space-y-1.5">
                    <label class="block font-bold text-slate-400 uppercase tracking-wider">Template Thumbnail Image</label>
                    <input type="file" name="image" required class="w-full bg-slate-950 border border-slate-800 rounded-lg p-2.5 text-slate-400 focus:outline-none focus:border-blue-500">
                    <span class="block text-[10px] text-slate-500">Recommended size: 800x600. Max 5MB.</span>
                </div>
                
                <!-- Actions -->
                <div class="pt-4 border-t border-slate-850 flex items-center justify-end gap-2">
                    <button type="button" @click="showAddModal = false" class="bg-slate-800 text-slate-300 font-semibold px-4 py-2 rounded-lg hover:bg-slate-750 transition-colors">Cancel</button>
                    <button type="submit" class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-500 transition-colors">Create Template</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
