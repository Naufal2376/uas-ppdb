<x-filament-panels::page>
    {{-- Header --}}
    <div class="ppdb-hero-banner p-6 mb-6 ppdb-fade-in">
        <div class="relative z-10 flex items-center gap-4">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-white/10 ring-1 ring-white/20">
                <x-heroicon-o-clipboard-document-list class="h-6 w-6 text-white" />
            </div>
            <div>
                <h2 class="text-lg font-bold text-white tracking-tight">Formulir Pendaftaran PPDB</h2>
                <p class="mt-0.5 text-sm text-sky-100">Lengkapi semua tahapan berikut dengan data yang benar.</p>
            </div>
        </div>
    </div>

    {{-- Tips --}}
    <div class="ppdb-card p-4 mb-6 border-l-4 border-sky-400 ppdb-slide-up ppdb-delay-1">
        <div class="flex items-start gap-3">
            <div class="ppdb-icon-circle ppdb-icon-circle-sky shrink-0">
                <x-heroicon-o-light-bulb class="h-4 w-4" />
            </div>
            <div>
                <p class="font-semibold text-slate-800 dark:text-white text-xs">Tips Pengisian</p>
                <ul class="mt-1 text-xs text-slate-500 dark:text-slate-400 space-y-0.5">
                    <li>• Pastikan NISN dan NIK sesuai dengan dokumen resmi</li>
                    <li>• Upload dokumen dalam format JPG, PNG, atau PDF (maks 2MB)</li>
                    <li>• Setelah submit, data tidak dapat diubah kembali</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Wizard Form (Livewire) --}}
    <div class="ppdb-card p-5 sm:p-6 ppdb-slide-up ppdb-delay-2">
        <form wire:submit="submit">
            {{ $this->form }}
            <div class="mt-4"></div>
        </form>
    </div>
</x-filament-panels::page>
