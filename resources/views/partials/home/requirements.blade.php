{{-- resources/views/partials/home/requirements.blade.php --}}
<section class="relative py-28 bg-white overflow-hidden border-b border-slate-100">
    <!-- Background Decor (Blobs) -->
    <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-[500px] h-[500px] bg-sky-50 rounded-full blur-3xl opacity-50 z-0"></div>
    <div class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/4 w-[400px] h-[400px] bg-indigo-50 rounded-full blur-3xl opacity-50 z-0"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">

            <!-- Sisi Kiri: Informasi Dokumen -->
            <div class="order-2 lg:order-1">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-sky-50 border border-sky-100 text-sky-600 text-xs font-black uppercase tracking-widest mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Persiapan Dokumen
                </div>

                <h2 class="text-4xl md:text-5xl font-black text-slate-800 mb-6 leading-tight">
                    Siapkan Berkas <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-600 to-indigo-600">Digital Anda.</span>
                </h2>

                <p class="text-slate-500 text-lg mb-10 leading-relaxed max-w-xl">
                    Pastikan seluruh dokumen dalam format digital <span class="font-bold text-slate-700">(PDF/JPG)</span> dengan ukuran maksimal <span class="font-bold text-slate-700">2MB</span> per berkas agar proses verifikasi berjalan lancar.
                </p>

                <div class="space-y-4">
                    <!-- Item 1 -->
                    <div class="group flex items-center gap-5 p-4 rounded-2xl border border-transparent hover:border-sky-100 hover:bg-sky-50/50 transition-all duration-300">
                        <div class="flex-shrink-0 w-14 h-14 bg-white shadow-lg shadow-slate-200/50 rounded-2xl flex items-center justify-center text-sky-600 group-hover:bg-sky-600 group-hover:text-white transition-all duration-500 group-hover:rotate-6">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-800 tracking-tight">Kartu Keluarga (KK)</h4>
                            <p class="text-slate-500 text-sm">Scan asli (bukan fotokopi) yang terbaca jelas.</p>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="group flex items-center gap-5 p-4 rounded-2xl border border-transparent hover:border-indigo-100 hover:bg-indigo-50/50 transition-all duration-300">
                        <div class="flex-shrink-0 w-14 h-14 bg-white shadow-lg shadow-slate-200/50 rounded-2xl flex items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-500 group-hover:-rotate-6">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-1.5-.454M21 12.773c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-1.5-.454M21 9.999c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-1.5-.454M16 5h1a1 1 0 011 1v3a1 1 0 01-1 1h-1m-4-5H5a1 1 0 00-1 1v3a1 1 0 001 1h6m-4-5V5a2 2 0 002-2h4a2 2 0 012 2v1m-4 5H5a1 1 0 00-1 1v3a1 1 0 001 1h6m-4-5V5a2 2 0 002-2h4a2 2 0 012 2v1"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-800 tracking-tight">Akta Kelahiran</h4>
                            <p class="text-slate-500 text-sm">Dokumen resmi sebagai bukti usia pendaftar.</p>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="group flex items-center gap-5 p-4 rounded-2xl border border-transparent hover:border-emerald-100 hover:bg-emerald-50/50 transition-all duration-300">
                        <div class="flex-shrink-0 w-14 h-14 bg-white shadow-lg shadow-slate-200/50 rounded-2xl flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-500 group-hover:rotate-6">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-800 tracking-tight">Ijazah / SKL</h4>
                            <p class="text-slate-500 text-sm">Surat Keterangan Lulus dari jenjang sebelumnya.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sisi Kanan: Visual Mockup (Immersive Upload) -->
            <div class="order-1 lg:order-2 relative px-4">
                <!-- Decorative Frame -->
                <div class="absolute inset-0 bg-gradient-to-br from-sky-400 to-indigo-600 rounded-[3.5rem] rotate-3 opacity-10 scale-105 z-0"></div>

                <div class="relative bg-white p-8 md:p-12 rounded-[3.5rem] shadow-2xl border border-slate-50 z-10 overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-sky-500 via-indigo-500 to-emerald-500"></div>

                    <h5 class="text-slate-800 font-black text-xl mb-8 flex items-center gap-3">
                        <span class="w-8 h-8 bg-sky-100 text-sky-600 rounded-lg flex items-center justify-center text-sm">01</span>
                        Digital Upload Center
                    </h5>

                    <div class="grid grid-cols-2 gap-6">
                        <!-- Upload Box 1 -->
                        <div class="group relative aspect-square bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center transition-all duration-500 hover:border-sky-400 hover:bg-sky-50/30 overflow-hidden">
                            <div class="w-12 h-12 rounded-full bg-white shadow-sm flex items-center justify-center mb-3 group-hover:scale-110 group-hover:bg-sky-500 group-hover:text-white transition-all duration-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            </div>
                            <span class="text-[10px] font-black uppercase tracking-widest text-slate-400 group-hover:text-sky-600 transition-colors">Kartu Keluarga</span>
                        </div>

                        <!-- Upload Box 2 -->
                        <div class="group relative aspect-square bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center transition-all duration-500 hover:border-indigo-400 hover:bg-indigo-50/30 overflow-hidden">
                            <div class="w-12 h-12 rounded-full bg-white shadow-sm flex items-center justify-center mb-3 group-hover:scale-110 group-hover:bg-indigo-500 group-hover:text-white transition-all duration-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                            </div>
                            <span class="text-[10px] font-black uppercase tracking-widest text-slate-400 group-hover:text-indigo-600 transition-colors">Akta Kelahiran</span>
                        </div>

                        <!-- Upload Box 3 (Wide) -->
                        <div class="group relative h-28 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center transition-all duration-500 hover:border-emerald-400 hover:bg-emerald-50/30 col-span-2 overflow-hidden">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-white shadow-sm flex items-center justify-center group-hover:scale-110 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </div>
                                <div class="text-left">
                                    <span class="block text-[10px] font-black uppercase tracking-widest text-slate-400 group-hover:text-emerald-600 transition-colors">Ijazah Terakhir / SKL</span>
                                    <span class="text-[9px] text-slate-300 group-hover:text-emerald-400 transition-colors font-medium">Format: PDF, JPG (Max 2MB)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Status Card -->


                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
