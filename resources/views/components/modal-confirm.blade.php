@props([
    'id',
    'title' => 'Are you sure?',
    'message' => 'This action cannot be undone.',
    'confirmText' => 'Confirm',
    'cancelText' => 'Cancel',
    'type' => 'danger'
])

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Overlay background -->
        <div class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm transition-opacity" aria-hidden="true"></div>

        <!-- Center modal -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-slate-900 border border-slate-800 rounded-lg text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="px-6 py-5">
                <div class="sm:flex sm:items-start">
                    <!-- Icon based on type -->
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full sm:mx-0 sm:h-10 sm:w-10 {{ $type === 'danger' ? 'bg-rose-500/10 text-rose-400' : 'bg-indigo-500/10 text-indigo-400' }}">
                        @if($type === 'danger')
                            <svg class="h-6.5 w-6.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        @else
                            <svg class="h-6.5 w-6.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        @endif
                    </div>
                    <!-- Body Text -->
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-semibold text-slate-100" id="modal-title">
                            {{ $title }}
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-slate-400">
                                {{ $message }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Buttons -->
            <div class="px-6 py-4 bg-slate-950/40 border-t border-slate-800/60 flex flex-row-reverse space-x-3 space-x-reverse">
                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent px-4 py-2 text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 sm:ml-3 sm:w-auto {{ $type === 'danger' ? 'bg-rose-600 hover:bg-rose-700 focus:ring-rose-500' : 'bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500' }}">
                    {{ $confirmText }}
                </button>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-slate-700 bg-slate-800 px-4 py-2 text-sm font-medium text-slate-300 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto">
                    {{ $cancelText }}
                </button>
            </div>
        </div>
    </div>
</div>
