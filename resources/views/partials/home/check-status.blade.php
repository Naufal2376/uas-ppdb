{{-- resources/views/partials/home/check-status.blade.php --}}
<section id="cek-status" class="py-24 bg-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="2" cy="2" r="2" fill="currentColor"/></pattern></defs><rect width="100%" height="100%" fill="url(#dots)" class="text-white"/></svg>
    </div>

    <div class="max-w-4xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="bg-white p-10 md:p-14 rounded-[2.5rem] shadow-2xl text-center">
            <div class="w-20 h-20 mx-auto bg-slate-50 border border-slate-200 rounded-2xl flex items-center justify-center mb-6 shadow-sm">
                <svg class="w-10 h-10 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <h2 class="text-3xl font-extrabold text-slate-800 mb-4">Lacak Status Pendaftaran</h2>
            <p class="text-slate-500 mb-10 max-w-xl mx-auto">Masukkan Nomor Pendaftaran (No. Registrasi) Anda untuk melihat progres verifikasi berkas dan hasil seleksi secara real-time.</p>

            <div class="text-left max-w-2xl mx-auto">
                @livewire('check-status-form')
            </div>
        </div>
    </div>
</section>
