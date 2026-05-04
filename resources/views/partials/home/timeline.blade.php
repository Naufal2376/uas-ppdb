{{-- resources/views/partials/home/timeline.blade.php --}}
<section id="alur" class="relative py-32 bg-slate-50 overflow-hidden border-b border-slate-200">

    <!-- Ornamen Background Arsitektural -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full opacity-[0.03] pointer-events-none z-0">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="currentColor" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(#grid)"/></svg>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

        <!-- Header Section: Bold & Focused -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-20 gap-8">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-sky-600 text-white text-[10px] font-black uppercase tracking-[0.3em] mb-6">
                    Workflow
                </div>
                <h2 class="text-4xl md:text-6xl font-black text-slate-800 leading-tight tracking-tighter">
                    Alur Kerja <br>
                    <span class="text-sky-600">Pendaftaran Digital.</span>
                </h2>
            </div>
            <p class="text-slate-500 text-lg font-medium max-w-sm border-l-4 border-sky-600 pl-6 mb-2">
                Panduan langkah demi langkah untuk memudahkan calon siswa dalam menyelesaikan proses administrasi.
            </p>
        </div>

        <!-- Timeline Grid: Bento Box Style -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Langkah 1: Registrasi -->
            <div class="group relative bg-white p-10 rounded-[2rem] border-b-8 border-sky-600 shadow-xl shadow-slate-200/60 transition-all duration-500 hover:-translate-y-4">
                <div class="absolute top-6 right-8 text-8xl font-black text-slate-50 opacity-[0.05] group-hover:opacity-[0.08] transition-opacity">01</div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-sky-600 text-white rounded-2xl flex items-center justify-center mb-10 shadow-lg shadow-sky-200 group-hover:rotate-12 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-slate-800 mb-4 tracking-tight">Buat Akun</h3>
                    <p class="text-slate-500 text-sm leading-relaxed font-semibold">
                        Gunakan NISN aktif dan email pribadi untuk mendapatkan akses ke Portal Siswa.
                    </p>
                </div>
            </div>

            <!-- Langkah 2: Biodata -->
            <div class="group relative bg-white p-10 rounded-[2rem] border-b-8 border-indigo-600 shadow-xl shadow-slate-200/60 transition-all duration-500 hover:-translate-y-4">
                <div class="absolute top-6 right-8 text-8xl font-black text-slate-50 opacity-[0.05] group-hover:opacity-[0.08] transition-opacity">02</div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-indigo-600 text-white rounded-2xl flex items-center justify-center mb-10 shadow-lg shadow-indigo-200 group-hover:rotate-12 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-slate-800 mb-4 tracking-tight">Isi Data</h3>
                    <p class="text-slate-500 text-sm leading-relaxed font-semibold">
                        Lengkapi profil biodata diri dan data orang tua/wali dengan informasi yang benar.
                    </p>
                </div>
            </div>

            <!-- Langkah 3: Berkas -->
            <div class="group relative bg-white p-10 rounded-[2rem] border-b-8 border-violet-600 shadow-xl shadow-slate-200/60 transition-all duration-500 hover:-translate-y-4">
                <div class="absolute top-6 right-8 text-8xl font-black text-slate-50 opacity-[0.05] group-hover:opacity-[0.08] transition-opacity">03</div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-violet-600 text-white rounded-2xl flex items-center justify-center mb-10 shadow-lg shadow-violet-200 group-hover:rotate-12 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-slate-800 mb-4 tracking-tight">Upload Berkas</h3>
                    <p class="text-slate-500 text-sm leading-relaxed font-semibold">
                        Unggah persyaratan KK, Akta, dan Ijazah dalam format PDF atau JPG.
                    </p>
                </div>
            </div>

            <!-- Langkah 4: Final -->
            <div class="group relative bg-white p-10 rounded-[2rem] border-b-8 border-emerald-600 shadow-xl shadow-slate-200/60 transition-all duration-500 hover:-translate-y-4">
                <div class="absolute top-6 right-8 text-8xl font-black text-slate-50 opacity-[0.05] group-hover:opacity-[0.08] transition-opacity">04</div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-emerald-600 text-white rounded-2xl flex items-center justify-center mb-10 shadow-lg shadow-emerald-200 group-hover:rotate-12 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-slate-800 mb-4 tracking-tight">Verifikasi</h3>
                    <p class="text-slate-500 text-sm leading-relaxed font-semibold">
                        Tunggu validasi panitia dan unduh bukti pendaftaran sebagai syarat daftar ulang.
                    </p>
                </div>
            </div>

        </div>

        <!-- Footer Timeline Info -->
        <div class="mt-20 p-8 rounded-[2rem] bg-slate-800 text-white flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-6">
                <div class="flex -space-x-4">
                    <div class="w-12 h-12 rounded-full border-4 border-slate-800 bg-sky-500 flex items-center justify-center font-bold text-xs">A1</div>
                    <div class="w-12 h-12 rounded-full border-4 border-slate-800 bg-indigo-500 flex items-center justify-center font-bold text-xs">A2</div>
                    <div class="w-12 h-12 rounded-full border-4 border-slate-800 bg-emerald-500 flex items-center justify-center font-bold text-xs">A3</div>
                </div>
                <p class="text-slate-300 text-sm font-medium">
                    Lebih dari <span class="text-white font-black">2,500+</span> siswa telah mendaftar melalui sistem ini.
                </p>
            </div>
            <a href="/faq" class="px-8 py-3 bg-white text-slate-900 rounded-xl font-black text-sm hover:bg-sky-500 hover:text-white transition-all">
                Butuh Bantuan?
            </a>
        </div>
    </div>
</section>
