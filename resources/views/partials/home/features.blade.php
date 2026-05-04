{{-- resources/views/partials/home/features.blade.php --}}
<section class="relative bg-white pt-24 pb-20 border-b border-slate-100 mt-5 rounded-t-[4rem] z-30 shadow-[0_-30px_60px_rgba(0,0,0,0.12)]">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Fitur 1: Aman -->
            <div class="group relative p-10 rounded-[2.5rem] border-2 border-slate-50 bg-white hover:border-sky-200 hover:shadow-2xl hover:shadow-sky-100 transition-all duration-500 hover:-translate-y-3 overflow-hidden">
                <!-- Decorative Background Element -->
                <div class="absolute -right-8 -top-8 w-32 h-32 bg-sky-50 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-700 scale-50 group-hover:scale-100"></div>

                <div class="relative z-10">
                    <div class="w-20 h-20 bg-gradient-to-br from-sky-500 to-blue-700 text-white rounded-3xl flex items-center justify-center mb-8 shadow-xl shadow-sky-200 transform group-hover:rotate-6 transition-all duration-500">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>

                    <h3 class="text-2xl font-black text-slate-800 mb-4 tracking-tight group-hover:text-sky-600 transition-colors">100% Aman</h3>
                    <!-- Card Divider -->
                    <div class="w-12 h-1 bg-sky-100 rounded-full mb-6 group-hover:w-20 transition-all duration-500"></div>

                    <p class="text-slate-500 text-base leading-relaxed">
                        Data pendaftar dilindungi oleh sistem keamanan terenkripsi tingkat tinggi untuk menjamin privasi calon siswa.
                    </p>
                </div>
            </div>

            <!-- Fitur 2: Real-time -->
            <div class="group relative p-10 rounded-[2.5rem] border-2 border-slate-50 bg-white hover:border-indigo-200 hover:shadow-2xl hover:shadow-indigo-100 transition-all duration-500 hover:-translate-y-3 overflow-hidden">
                <div class="absolute -right-8 -top-8 w-32 h-32 bg-indigo-50 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-700 scale-50 group-hover:scale-100"></div>

                <div class="relative z-10">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 to-purple-700 text-white rounded-3xl flex items-center justify-center mb-8 shadow-xl shadow-indigo-200 transform group-hover:-rotate-6 transition-all duration-500">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>

                    <h3 class="text-2xl font-black text-slate-800 mb-4 tracking-tight group-hover:text-indigo-600 transition-colors">Verifikasi Cepat</h3>
                    <!-- Card Divider -->
                    <div class="w-12 h-1 bg-indigo-100 rounded-full mb-6 group-hover:w-20 transition-all duration-500"></div>

                    <p class="text-slate-500 text-base leading-relaxed">
                        Proses validasi berkas dilakukan secara real-time oleh panitia untuk memberikan kepastian status pendaftaran Anda.
                    </p>
                </div>
            </div>

            <!-- Fitur 3: Akses 24 Jam -->
            <div class="group relative p-10 rounded-[2.5rem] border-2 border-slate-50 bg-white hover:border-emerald-200 hover:shadow-2xl hover:shadow-emerald-100 transition-all duration-500 hover:-translate-y-3 overflow-hidden">
                <div class="absolute -right-8 -top-8 w-32 h-32 bg-emerald-50 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-700 scale-50 group-hover:scale-100"></div>

                <div class="relative z-10">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-teal-700 text-white rounded-3xl flex items-center justify-center mb-8 shadow-xl shadow-emerald-200 transform group-hover:rotate-6 transition-all duration-500">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                    </div>

                    <h3 class="text-2xl font-black text-slate-800 mb-4 tracking-tight group-hover:text-emerald-600 transition-colors">Akses 24 Jam</h3>
                    <!-- Card Divider -->
                    <div class="w-12 h-1 bg-emerald-100 rounded-full mb-6 group-hover:w-20 transition-all duration-500"></div>

                    <p class="text-slate-500 text-base leading-relaxed">
                        Sistem pendaftaran daring yang dapat diakses kapan saja dan di mana saja melalui berbagai perangkat.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
