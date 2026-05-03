<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman - SI-PPDB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800">

    @php
        // Data Pengumuman statis biar gak error
        $pengumumans = [
            [
                'tanggal' => '01',
                'bulan' => 'Mei',
                'tipe' => 'Penting',
                'judul' => 'Perpanjangan Waktu Pendaftaran Gelombang 1',
                'isi' => 'Dikarenakan tingginya antusiasme pendaftar dan kendala jaringan pada beberapa hari terakhir, waktu penutupan pendaftaran Gelombang 1 diperpanjang hingga tanggal 10 Mei 2026 pukul 23:59 WIB. Pastikan berkas Anda telah diunggah dan diverifikasi.',
                'warna_badge' => 'bg-red-100 text-red-700 border-red-200'
            ],
            [
                'tanggal' => '28',
                'bulan' => 'Apr',
                'tipe' => 'Panduan',
                'judul' => 'Akses Fitur Cetak Kartu Pendaftaran Tersedia',
                'isi' => 'Bagi peserta yang status berkasnya telah disetujui, tombol Cetak Bukti Pendaftaran (PDF) kini sudah dapat diakses melalui Dashboard Siswa masing-masing. Harap mengunduh dan mencetak dokumen tersebut sebagai bukti sah pendaftaran.',
                'warna_badge' => 'bg-sky-100 text-sky-700 border-sky-200'
            ],
            [
                'tanggal' => '25',
                'bulan' => 'Apr',
                'tipe' => 'Jadwal',
                'judul' => 'Jadwal Ujian Tes Penempatan (Placement Test)',
                'isi' => 'Bagi calon siswa yang telah dinyatakan Lulus Seleksi Berkas di Dashboard, harap bersiap untuk mengikuti tes penempatan yang akan dilaksanakan secara luring pada tanggal 15 Mei 2026. Membawa alat tulis pribadi dan menggunakan seragam asal sekolah.',
                'warna_badge' => 'bg-emerald-100 text-emerald-700 border-emerald-200'
            ],
        ];
    @endphp

    {{-- Hero Section (Sama persis kayak FAQ) --}}
    <section class="relative bg-gradient-to-br from-sky-600 to-sky-800 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)"/>
            </svg>
        </div>
        <div class="relative max-w-6xl mx-auto px-6 py-20 text-center">
            <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-medium mb-6">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                </svg>
                Pusat Informasi
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tight">Papan Pengumuman</h1>
            <p class="text-sky-100 text-lg max-w-2xl mx-auto">Ikuti terus perkembangan jadwal, tes, dan informasi kelulusan PPDB agar tidak tertinggal langkah penting.</p>
        </div>
    </section>

    {{-- Statistik / Quick Info (Floating Cards) --}}
    <section class="max-w-6xl mx-auto px-6 -mt-8 relative z-10 mb-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white rounded-2xl shadow-md border border-slate-100 p-6 flex items-center gap-4 hover:-translate-y-1 transition-transform">
                <div class="w-12 h-12 bg-emerald-50 rounded-full flex items-center justify-center text-emerald-600 shrink-0">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <div class="text-xl font-extrabold text-slate-800">Aktif</div>
                    <div class="text-slate-500 font-medium text-sm mt-0.5">Gelombang Pendaftaran</div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-md border border-slate-100 p-6 flex items-center gap-4 hover:-translate-y-1 transition-transform">
                <div class="w-12 h-12 bg-sky-50 rounded-full flex items-center justify-center text-sky-600 shrink-0">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"/></svg>
                </div>
                <div>
                    <div class="text-xl font-extrabold text-slate-800">{{ count($pengumumans) }} Berita</div>
                    <div class="text-slate-500 font-medium text-sm mt-0.5">Update Pengumuman</div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-md border border-slate-100 p-6 flex items-center gap-4 hover:-translate-y-1 transition-transform">
                <div class="w-12 h-12 bg-amber-50 rounded-full flex items-center justify-center text-amber-600 shrink-0">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <div class="text-xl font-extrabold text-slate-800">10 Mei</div>
                    <div class="text-slate-500 font-medium text-sm mt-0.5">Batas Akhir Gelombang 1</div>
                </div>
            </div>
        </div>
    </section>

    {{-- List Pengumuman Section --}}
    <section class="max-w-4xl mx-auto px-6 pb-20">
        <div class="space-y-6">
            
            @foreach($pengumumans as $item)
            <article class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8 flex flex-col sm:flex-row items-start sm:space-x-6 hover:border-sky-300 hover:shadow-md transition-all duration-300 relative overflow-hidden group">
                
                {{-- Efek garis biru di kiri saat di-hover --}}
                <div class="absolute top-0 left-0 w-1.5 h-full bg-sky-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>

                {{-- Date Badge --}}
                <div class="flex-shrink-0 w-16 h-16 bg-slate-50 rounded-xl border border-slate-200 flex flex-col items-center justify-center text-slate-700 mb-5 sm:mb-0 group-hover:bg-sky-50 group-hover:border-sky-200 group-hover:text-sky-700 transition-colors">
                    <span class="text-2xl font-extrabold leading-none">{{ $item['tanggal'] }}</span>
                    <span class="text-xs font-bold uppercase tracking-wider mt-1">{{ $item['bulan'] }}</span>
                </div>

                {{-- Content --}}
                <div class="flex-1">
                    <div class="flex items-center space-x-2 mb-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold border {{ $item['warna_badge'] }}">
                            {{ $item['tipe'] }}
                        </span>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-800 mb-3 group-hover:text-sky-600 transition-colors">{{ $item['judul'] }}</h2>
                    <p class="text-slate-600 leading-relaxed">{{ $item['isi'] }}</p>
                </div>

            </article>
            @endforeach

        </div>
    </section>

    {{-- Call to Action ke Halaman FAQ --}}
    <section class="bg-sky-50 py-16 border-t border-sky-100 text-center">
        <div class="max-w-3xl mx-auto px-6">
            <h2 class="text-2xl font-bold text-slate-800 mb-3">Punya Pertanyaan Seputar Pendaftaran?</h2>
            <p class="text-slate-600 mb-8">Kunjungi halaman Pusat Bantuan kami untuk membaca syarat berkas, panduan pendaftaran, atau menghubungi panitia secara langsung.</p>
            <a href="/faq" class="inline-flex items-center gap-2 bg-sky-600 text-white px-8 py-3 rounded-xl font-semibold hover:bg-sky-700 transition-colors shadow-md shadow-sky-200 hover:-translate-y-0.5">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Lihat FAQ & Kontak
            </a>
        </div>
    </section>

</body>
</html>