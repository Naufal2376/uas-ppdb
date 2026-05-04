{{-- resources/views/pengumuman.blade.php --}}
@extends('layouts.app')

@section('title', 'Papan Pengumuman | SMA IT Global Academy 2026')

@section('content')

    @php
        // Data Pengumuman statis yang sudah disesuaikan dengan tema IT Academy
        $pengumumans = [
            [
                'tanggal' => '01',
                'bulan' => 'Mei',
                'tipe' => 'Penting',
                'judul' => 'Perpanjangan Waktu Pendaftaran Gelombang 1',
                'isi' => 'Dikarenakan tingginya antusiasme calon Tech-Leader dan proses sinkronisasi server, waktu penutupan pendaftaran Gelombang 1 diperpanjang hingga tanggal 10 Mei 2026 pukul 23:59 WIB. Pastikan berkas digital Anda telah terunggah sempurna.',
                'warna_badge' => 'bg-red-500/10 text-red-600 border-red-500/20'
            ],
            [
                'tanggal' => '28',
                'bulan' => 'Apr',
                'tipe' => 'Panduan',
                'judul' => 'Akses Fitur Cetak Kartu Pendaftaran Tersedia',
                'isi' => 'Bagi peserta yang status berkasnya telah disetujui (Verified), tombol Cetak Bukti Pendaftaran (PDF) kini sudah dapat diakses melalui Dashboard Siswa masing-masing. Harap menyimpan dokumen tersebut dalam bentuk digital dan cetak fisik.',
                'warna_badge' => 'bg-sky-500/10 text-sky-600 border-sky-500/20'
            ],
            [
                'tanggal' => '25',
                'bulan' => 'Apr',
                'tipe' => 'Jadwal',
                'judul' => 'Jadwal Computer Based Test (CBT) Placement',
                'isi' => 'Bagi calon siswa yang telah dinyatakan Lulus Seleksi Berkas, harap bersiap untuk mengikuti tes penempatan (CBT) yang akan dilaksanakan di lab komputer pada tanggal 15 Mei 2026. Bawa kartu identitas dan kartu pendaftaran Anda.',
                'warna_badge' => 'bg-teal-500/10 text-teal-600 border-teal-500/20'
            ],
        ];
    @endphp

   <!-- ================= HERO SECTION (TECH THEME) ================= -->
    <section class="relative pt-32 pb-32 lg:pt-40 lg:pb-40 bg-slate-900 overflow-hidden border-b border-slate-800">

        <!-- Background Image Local -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/bg-sekolah.jpg') }}" alt="Background IT Global Academy" class="w-full h-full object-cover object-center opacity-30">
            <!-- Overlay Gelap agar teks tetap terbaca -->
            <div class="absolute inset-0 bg-slate-900/80 mix-blend-multiply"></div>
        </div>

        <!-- Animated Mesh Gradient Blobs -->
        <div class="absolute top-0 -left-10 w-[400px] h-[400px] bg-sky-600/30 rounded-full mix-blend-screen filter blur-[80px] animate-pulse z-0"></div>
        <div class="absolute bottom-0 -right-10 w-[400px] h-[400px] bg-teal-500/20 rounded-full mix-blend-screen filter blur-[80px] animate-pulse delay-1000 z-0"></div>

        <!-- Grid Pattern Overlay -->
        <div class="absolute inset-0 opacity-[0.03] z-0" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;"></div>

        <div class="relative max-w-6xl mx-auto px-6 text-center z-10">
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-5 py-2 rounded-full text-xs font-black uppercase tracking-widest text-sky-300 mb-6 shadow-lg">
                <span class="w-2 h-2 rounded-full bg-teal-400 animate-ping absolute"></span>
                <span class="w-2 h-2 rounded-full bg-teal-500 relative"></span>
                Pusat Informasi
            </div>
            <h1 class="text-4xl md:text-6xl font-black mb-6 tracking-tighter text-white">Papan <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-teal-300">Pengumuman.</span></h1>
            <p class="text-slate-400 text-lg md:text-xl max-w-2xl mx-auto font-medium leading-relaxed">
                Ikuti terus perkembangan jadwal, status server, tes seleksi, dan informasi kelulusan PPDB agar tidak tertinggal instruksi penting.
            </p>
        </div>
    </section>

    <!-- ================= STATISTIK / QUICK INFO (FLOATING CARDS) ================= -->
    <section class="max-w-6xl mx-auto px-6 -mt-16 relative z-20 mb-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-[2rem] shadow-2xl shadow-slate-200/50 border border-slate-100 p-8 flex items-center gap-5 hover:-translate-y-2 transition-transform duration-300">
                <div class="w-14 h-14 bg-teal-50 rounded-2xl flex items-center justify-center text-teal-600 shrink-0 border border-teal-100">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <div class="text-2xl font-black text-slate-800 tracking-tight">Aktif</div>
                    <div class="text-slate-500 font-bold text-sm mt-0.5">Gelombang Pendaftaran</div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="bg-white rounded-[2rem] shadow-2xl shadow-slate-200/50 border border-slate-100 p-8 flex items-center gap-5 hover:-translate-y-2 transition-transform duration-300">
                <div class="w-14 h-14 bg-sky-50 rounded-2xl flex items-center justify-center text-sky-600 shrink-0 border border-sky-100">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"/></svg>
                </div>
                <div>
                    <div class="text-2xl font-black text-slate-800 tracking-tight">{{ count($pengumumans) }} Berita</div>
                    <div class="text-slate-500 font-bold text-sm mt-0.5">Update Pengumuman</div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="bg-white rounded-[2rem] shadow-2xl shadow-slate-200/50 border border-slate-100 p-8 flex items-center gap-5 hover:-translate-y-2 transition-transform duration-300">
                <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 shrink-0 border border-blue-100">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <div class="text-2xl font-black text-slate-800 tracking-tight">10 Mei</div>
                    <div class="text-slate-500 font-bold text-sm mt-0.5">Batas Gelombang 1</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= LIST PENGUMUMAN ================= -->
    <section class="max-w-4xl mx-auto px-6 pb-28">
        <div class="space-y-6">

            @foreach($pengumumans as $item)
            <article class="bg-white rounded-[2rem] border border-slate-100 shadow-lg shadow-slate-200/40 p-6 sm:p-10 flex flex-col sm:flex-row items-start sm:gap-8 hover:border-sky-300 hover:shadow-2xl hover:shadow-sky-100 transition-all duration-500 relative overflow-hidden group">

                <!-- Efek garis biru di kiri saat di-hover -->
                <div class="absolute top-0 left-0 w-2 h-full bg-gradient-to-b from-sky-400 to-teal-400 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                <!-- Date Badge -->
                <div class="flex-shrink-0 w-20 h-20 bg-slate-50 rounded-[1.5rem] border border-slate-100 flex flex-col items-center justify-center text-slate-700 mb-6 sm:mb-0 group-hover:bg-sky-50 group-hover:border-sky-200 group-hover:text-sky-600 transition-all duration-300 shadow-inner group-hover:scale-105">
                    <span class="text-3xl font-black leading-none">{{ $item['tanggal'] }}</span>
                    <span class="text-[10px] font-bold uppercase tracking-widest mt-1">{{ $item['bulan'] }}</span>
                </div>

                <!-- Content -->
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest border {{ $item['warna_badge'] }}">
                            {{ $item['tipe'] }}
                        </span>
                        <!-- New Badge Indicator -->
                        @if($loop->first)
                            <span class="flex h-2.5 w-2.5 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-sky-500"></span>
                            </span>
                        @endif
                    </div>
                    <h2 class="text-2xl font-black text-slate-800 mb-3 tracking-tight group-hover:text-sky-600 transition-colors">{{ $item['judul'] }}</h2>
                    <p class="text-slate-500 leading-relaxed font-medium">{{ $item['isi'] }}</p>
                </div>
            </article>
            @endforeach

        </div>
    </section>

    <!-- ================= CALL TO ACTION (FAQ) ================= -->
    <section class="bg-gradient-to-b from-white to-slate-50 py-24 border-t border-slate-100 text-center">
        <div class="max-w-3xl mx-auto px-6">
            <div class="w-16 h-16 bg-sky-50 text-sky-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-inner">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <h2 class="text-3xl md:text-4xl font-black text-slate-800 mb-6 tracking-tight">Butuh Informasi Lebih Lanjut?</h2>
            <p class="text-slate-500 text-lg mb-10 font-medium">Kunjungi halaman Pusat Bantuan kami untuk membaca syarat dokumen, panduan seleksi digital, atau menghubungi panitia secara langsung.</p>
            <a href="/faq" class="inline-flex items-center gap-3 bg-slate-900 text-white px-8 py-4 rounded-xl font-bold hover:bg-sky-600 transition-all shadow-xl shadow-slate-200 hover:-translate-y-1">
                Buka Pusat Bantuan (FAQ)
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </section>

@endsection
