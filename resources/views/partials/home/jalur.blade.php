{{-- resources/views/partials/home/jalur.blade.php --}}
<section id="jalur" class="py-24 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-6">Pilihan Jalur Penerimaan</h2>
            <p class="text-slate-500 text-lg">Pilih jalur yang sesuai dengan kualifikasi untuk memperbesar peluang diterima.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-fr">
            <div class="lg:col-span-2 bg-slate-50 p-8 rounded-[2rem] border border-slate-200 hover:border-sky-300 hover:shadow-xl transition-all duration-300 group">
                <div class="w-14 h-14 bg-sky-100 text-sky-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                </div>
                <h3 class="text-2xl font-extrabold text-slate-800 mb-3">Jalur Zonasi <span class="text-sky-600 text-lg">(50%)</span></h3>
                <p class="text-slate-500 leading-relaxed max-w-xl">Jalur utama yang diperuntukkan bagi calon peserta didik yang berdomisili di dalam wilayah zonasi yang telah ditetapkan berdasarkan jarak terdekat dari tempat tinggal ke sekolah.</p>
            </div>

            <div class="bg-slate-800 p-8 rounded-[2rem] border border-slate-700 hover:shadow-2xl transition-all duration-300 group text-white">
                <div class="w-14 h-14 bg-slate-700 text-sky-400 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" /></svg>
                </div>
                <h3 class="text-2xl font-extrabold mb-3">Prestasi <span class="text-sky-400 text-lg">(30%)</span></h3>
                <p class="text-slate-300 text-sm leading-relaxed">Seleksi menggunakan nilai rapor kumulatif ditambah sertifikat kejuaraan akademik maupun non-akademik.</p>
            </div>

            <div class="bg-slate-50 p-8 rounded-[2rem] border border-slate-200 hover:border-sky-300 hover:shadow-xl transition-all duration-300 group">
                <div class="w-14 h-14 bg-sky-100 text-sky-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Afirmasi <span class="text-sky-600 text-base">(15%)</span></h3>
                <p class="text-slate-500 text-sm leading-relaxed">Bagi keluarga ekonomi kurang mampu dan disabilitas dibuktikan dengan surat resmi.</p>
            </div>

            <div class="lg:col-span-2 bg-slate-50 p-8 rounded-[2rem] border border-slate-200 hover:border-sky-300 hover:shadow-xl transition-all duration-300 group">
                <div class="w-14 h-14 bg-sky-100 text-sky-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Pindah Tugas Orang Tua <span class="text-sky-600 text-base">(5%)</span></h3>
                <p class="text-slate-500 text-sm leading-relaxed">Diperuntukkan bagi peserta didik yang harus mengikuti kepindahan domisili tugas orang tua/wali dengan melampirkan surat penugasan dari instansi.</p>
            </div>
        </div>
    </div>
</section>
