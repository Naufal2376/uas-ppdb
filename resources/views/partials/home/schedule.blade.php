{{-- resources/views/partials/home/schedule.blade.php --}}
<section id="jadwal" class="relative py-32 bg-white overflow-hidden border-b border-slate-100">

    <!-- ================= 1. ANIMATED LIVING BACKGROUND ================= -->
    <div class="absolute inset-0 z-0 pointer-events-none">
        <!-- Blobs Animasi -->
        <div class="absolute top-0 -left-4 w-96 h-96 bg-sky-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-96 h-96 bg-indigo-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-20 left-20 w-96 h-96 bg-emerald-50 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-4000"></div>

        <!-- Grid Pattern Overlay -->
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 30px 30px;"></div>
    </div>

    <div class="max-w-5xl mx-auto px-6 lg:px-8 relative z-10">

        <!-- Header: Bold & Focused -->
        <div class="text-center max-w-2xl mx-auto mb-24">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white shadow-sm border border-slate-100 text-sky-600 text-[10px] font-black uppercase tracking-[0.3em] mb-6">
                Official Timeline
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-slate-800 mb-6 tracking-tighter">
                Agenda Utama <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-600 to-indigo-600">PPDB 2026.</span>
            </h2>
            <p class="text-slate-500 font-medium leading-relaxed">
                Pastikan Anda mencatat setiap tanggal penting di bawah ini untuk kelancaran proses seleksi administrasi.
            </p>
        </div>

        <!-- Vertical Stepper System -->
        <div class="relative space-y-10">
            <!-- Line Path -->
            <div class="absolute left-[47px] md:left-[51px] top-12 bottom-12 w-1 bg-slate-100 rounded-full hidden sm:block"></div>

            <!-- Item 1: Active -->
            <div class="group relative flex flex-col sm:flex-row items-start gap-8">
                <div class="flex-shrink-0 w-24 h-24 bg-sky-600 text-white rounded-[2rem] flex flex-col items-center justify-center z-10 shadow-2xl shadow-sky-200 border-4 border-white transform group-hover:rotate-3 transition-transform duration-500">
                    <span class="text-[10px] font-black uppercase">Mei</span>
                    <span class="text-3xl font-black">10</span>
                </div>

                <div class="flex-grow bg-white p-8 md:p-10 rounded-[2.5rem] border-2 border-sky-500 shadow-2xl shadow-sky-100/50 flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="text-center md:text-left">
                        <div class="flex flex-col md:flex-row items-center gap-3 mb-2">
                            <h3 class="text-2xl font-black text-slate-800 tracking-tight">Pendaftaran Online</h3>
                            <span class="px-3 py-1 bg-sky-100 text-sky-600 text-[9px] font-black uppercase tracking-widest rounded-full animate-pulse">Running Now</span>
                        </div>
                        <p class="text-slate-500 font-bold mb-1">10 Mei - 20 Mei 2026</p>
                        <p class="text-slate-400 text-sm italic">Pengisian formulir elektronik dan unggah berkas digital pendaftar.</p>
                    </div>
                    <a href="/student/register" class="flex-shrink-0 px-8 py-3.5 bg-slate-900 text-white rounded-xl font-black text-sm hover:bg-sky-600 transition-all shadow-xl shadow-slate-200">
                        Daftar Akun
                    </a>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="group relative flex flex-col sm:flex-row items-start gap-8">
                <div class="flex-shrink-0 w-24 h-24 bg-white text-slate-400 rounded-[2rem] flex flex-col items-center justify-center z-10 border-4 border-slate-50 shadow-lg shadow-slate-100 transition-all group-hover:bg-indigo-600 group-hover:text-white">
                    <span class="text-[10px] font-black uppercase">Mei</span>
                    <span class="text-3xl font-black">11</span>
                </div>

                <div class="flex-grow bg-white p-8 md:p-10 rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-indigo-100 transition-all duration-500">
                    <h3 class="text-2xl font-black text-slate-800 tracking-tight opacity-80 mb-2">Verifikasi Berkas</h3>
                    <p class="text-slate-500 font-bold mb-1">11 Mei - 22 Mei 2026</p>
                    <p class="text-slate-400 text-sm italic">Proses validasi dokumen oleh tim panitia seleksi sekolah.</p>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="group relative flex flex-col sm:flex-row items-start gap-8">
                <div class="flex-shrink-0 w-24 h-24 bg-white text-slate-400 rounded-[2rem] flex flex-col items-center justify-center z-10 border-4 border-slate-50 shadow-lg shadow-slate-100 transition-all group-hover:bg-emerald-600 group-hover:text-white">
                    <span class="text-[10px] font-black uppercase">Mei</span>
                    <span class="text-3xl font-black">25</span>
                </div>

                <div class="flex-grow bg-white p-8 md:p-10 rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-emerald-100 transition-all duration-500">
                    <h3 class="text-2xl font-black text-slate-800 tracking-tight opacity-80 mb-2">Pengumuman Hasil</h3>
                    <p class="text-slate-500 font-bold mb-1">25 Mei 2026</p>
                    <p class="text-slate-400 text-sm italic">Pengumuman kelulusan dapat diakses melalui portal masing-masing.</p>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="group relative flex flex-col sm:flex-row items-start gap-8">
                <div class="flex-shrink-0 w-24 h-24 bg-white text-slate-400 rounded-[2rem] flex flex-col items-center justify-center z-10 border-4 border-slate-50 shadow-lg shadow-slate-100 transition-all group-hover:bg-amber-600 group-hover:text-white">
                    <span class="text-[10px] font-black uppercase">Mei</span>
                    <span class="text-3xl font-black">26</span>
                </div>

                <div class="flex-grow bg-white p-8 md:p-10 rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-amber-100 transition-all duration-500">
                    <h3 class="text-2xl font-black text-slate-800 tracking-tight opacity-80 mb-2">Lapor Diri</h3>
                    <p class="text-slate-500 font-bold mb-1">26 Mei - 28 Mei 2026</p>
                    <p class="text-slate-400 text-sm italic">Penyerahan berkas fisik asli sebagai syarat daftar ulang siswa baru.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Animation Logic -->
    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
    </style>
</section>
