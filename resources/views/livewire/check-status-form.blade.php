<div class="w-full max-w-xl mx-auto">
    <form wire:submit.prevent="checkStatus" class="relative flex items-center">
        <input type="text" wire:model="registration_number" placeholder="Masukkan Nomor Registrasi (Contoh: PPDB-2026-0001)"
               class="w-full pl-6 pr-32 py-4 rounded-2xl border border-slate-200 bg-white/80 backdrop-blur-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all shadow-sm text-slate-800 placeholder-slate-400 font-medium">
        <button type="submit" class="absolute right-2 bg-sky-600 hover:bg-sky-700 text-white font-bold px-6 py-2.5 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg">
            Cek
        </button>
    </form>
    @error('registration_number') <span class="text-sm text-rose-600 mt-2 block text-center">{{ $message }}</span> @enderror

    <!-- Loading Indicator -->
    <div wire:loading wire:target="checkStatus" class="mt-6 flex justify-center">
        <svg class="animate-spin h-6 w-6 text-sky-600" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
    </div>

    <!-- Hasil Status -->
    @if ($statusResult)
        <div class="mt-6 p-6 rounded-2xl border border-slate-100 bg-white shadow-lg transform transition-all animate-fade-in">
            <p class="text-center text-sm text-slate-500 font-medium uppercase tracking-wider mb-2">Status Saat Ini</p>
            <h3 class="text-center text-2xl font-extrabold
                @if(in_array($statusResult, ['verified', 'approved'])) text-emerald-600
                @elseif($statusResult === 'pending') text-amber-500
                @elseif($statusResult === 'rejected') text-rose-600
                @endif
            ">
                @if($statusResult === 'pending') ⏳ Menunggu Verifikasi
                @elseif($statusResult === 'verified') 📝 Berkas Diverifikasi
                @elseif($statusResult === 'approved') 🎉 LULUS
                @elseif($statusResult === 'rejected') ❌ Ditolak / Perlu Revisi
                @endif
            </h3>
        </div>
    @endif

    @if ($errorMessage)
        <div class="mt-6 p-4 rounded-2xl border border-rose-200 bg-rose-50 text-center text-rose-600 font-medium">
            {{ $errorMessage }}
        </div>
    @endif
</div>
