<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ & Kontak - SI-PPDB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800">

    @php
        $faqs = [
            [
                'pertanyaan' => 'Apa saja syarat dokumen yang harus diunggah?', 
                'jawaban' => 'Anda wajib menyiapkan pindaian (scan) asli berupa: Kartu Keluarga (KK), Akta Kelahiran, Ijazah/SKL, dan Pas Foto Resmi. Format file harus PDF/JPG maksimal 2MB.', 
                'kategori' => 'berkas'
            ],
            [
                'pertanyaan' => 'Bagaimana jika saya salah input data?', 
                'jawaban' => 'Selama Anda belum mengklik tombol "Finalisasi" di tahap akhir, data masih bisa diubah. Jika sudah difinalisasi, Anda harus menghubungi panitia via WhatsApp untuk meminta akses revisi.', 
                'kategori' => 'pendaftaran'
            ],
            [
                'pertanyaan' => 'Bagaimana cara mengecek status kelulusan saya?', 
                'jawaban' => 'Anda dapat mengecek status secara real-time dengan login ke Dashboard Siswa. Status akan berubah menjadi warna hijau (Lulus), kuning (Proses), atau merah (Ditolak).', 
                'kategori' => 'pengumuman'
            ],
            [
                'pertanyaan' => 'Apakah ada biaya untuk pendaftaran online ini?', 
                'jawaban' => 'Tidak. Seluruh proses pendaftaran melalui portal SI-PPDB ini 100% gratis. Harap berhati-hati terhadap oknum yang meminta transfer uang.', 
                'kategori' => 'pendaftaran'
            ],
            [
                'pertanyaan' => 'Apa saja jalur pendaftaran yang tersedia?', 
                'jawaban' => 'Terdapat 4 jalur utama: Zonasi, Afirmasi, Prestasi, dan Pindah Tugas Orang Tua. Pastikan Anda memilih jalur yang sesuai dengan kondisi dan kelengkapan dokumen.', 
                'kategori' => 'jalur'
            ],
            [
                'pertanyaan' => 'Kapan pengumuman hasil seleksi berkas dirilis?', 
                'jawaban' => 'Hasil seleksi berkas akan diumumkan sesuai jadwal. Anda juga akan mendapatkan pemberitahuan di Dashboard masing-masing.', 
                'kategori' => 'pengumuman'
            ],
        ];
    @endphp

    {{-- Hero Section --}}
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Pusat Bantuan
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tight">Pertanyaan yang Sering Diajukan</h1>
            <p class="text-sky-100 text-lg max-w-2xl mx-auto">Temukan jawaban lengkap seputar pendaftaran PPDB. Kami siap membantu kamu di setiap langkah.</p>
        </div>
    </section>

    {{-- Statistik --}}
    <section class="max-w-6xl mx-auto px-6 -mt-8 relative z-10 mb-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white rounded-2xl shadow-md border border-slate-100 p-6 text-center hover:-translate-y-1 transition-transform">
                <div class="text-3xl font-extrabold text-sky-600">4</div>
                <div class="text-slate-500 font-medium mt-1">Jalur Pendaftaran</div>
            </div>
            <div class="bg-white rounded-2xl shadow-md border border-slate-100 p-6 text-center hover:-translate-y-1 transition-transform">
                <div class="text-3xl font-extrabold text-sky-600">{{ count($faqs) }}</div>
                <div class="text-slate-500 font-medium mt-1">Pertanyaan Tersedia</div>
            </div>
            <div class="bg-white rounded-2xl shadow-md border border-slate-100 p-6 text-center hover:-translate-y-1 transition-transform">
                <div class="text-3xl font-extrabold text-sky-600">24/7</div>
                <div class="text-slate-500 font-medium mt-1">Info Online</div>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="max-w-3xl mx-auto px-6 pb-16">
        {{-- Filter Chips --}}
        <div class="flex flex-wrap gap-2 mb-8 justify-center">
            <button onclick="filterFaq('semua')" id="chip-semua" class="chip-btn bg-sky-600 text-white px-5 py-2 rounded-full text-sm font-semibold transition-all shadow-md shadow-sky-200">
                Semua
            </button>
            <button onclick="filterFaq('pendaftaran')" id="chip-pendaftaran" class="chip-btn bg-white border border-slate-200 text-slate-600 px-5 py-2 rounded-full text-sm font-semibold hover:border-sky-300 hover:text-sky-600 transition-all">
                Pendaftaran
            </button>
            <button onclick="filterFaq('berkas')" id="chip-berkas" class="chip-btn bg-white border border-slate-200 text-slate-600 px-5 py-2 rounded-full text-sm font-semibold hover:border-sky-300 hover:text-sky-600 transition-all">
                Berkas
            </button>
            <button onclick="filterFaq('jalur')" id="chip-jalur" class="chip-btn bg-white border border-slate-200 text-slate-600 px-5 py-2 rounded-full text-sm font-semibold hover:border-sky-300 hover:text-sky-600 transition-all">
                Jalur
            </button>
            <button onclick="filterFaq('pengumuman')" id="chip-pengumuman" class="chip-btn bg-white border border-slate-200 text-slate-600 px-5 py-2 rounded-full text-sm font-semibold hover:border-sky-300 hover:text-sky-600 transition-all">
                Pengumuman
            </button>
        </div>

        {{-- Pesan kalau tidak ada hasil filter --}}
        <div id="no-result" class="hidden text-center py-10 bg-slate-50 rounded-2xl border border-dashed border-slate-300 text-slate-500 font-medium">
            Tidak ada pertanyaan di kategori ini.
        </div>

        {{-- Accordion --}}
        <div class="space-y-4" id="faq-list">
            @foreach($faqs as $index => $faq)
            <div class="faq-item bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-sky-300 hover:shadow-md transition-all duration-300"
                 data-kategori="{{ $faq['kategori'] }}">
                <button
                    class="w-full flex items-center justify-between px-6 py-5 text-left focus:outline-none group"
                    onclick="toggleFaq({{ $index }})"
                    id="faq-btn-{{ $index }}"
                >
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 rounded-full bg-sky-50 text-sky-600 flex items-center justify-center text-sm font-bold shrink-0 mt-0.5 group-hover:bg-sky-600 group-hover:text-white transition-colors">
                            {{ $index + 1 }}
                        </div>
                        <span class="text-slate-800 font-semibold text-lg leading-snug pr-4">{{ $faq['pertanyaan'] }}</span>
                    </div>
                    <svg id="faq-icon-{{ $index }}" class="w-6 h-6 text-slate-400 group-hover:text-sky-600 transition-transform duration-300 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="faq-answer-{{ $index }}" class="hidden border-t border-sky-50 bg-sky-50/30">
                    <div class="px-6 py-6 pl-18 text-slate-600 leading-relaxed">
                        {{ $faq['jawaban'] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Kontak & Maps Section --}}
    <section class="bg-slate-50 border-t border-slate-200 py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-slate-800">Masih Butuh Bantuan?</h2>
                <p class="text-slate-500 mt-2 text-lg">Kunjungi lokasi kami atau hubungi panitia secara langsung.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
                
                {{-- Kiri: Informasi Kontak & Tombol --}}
                <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm flex flex-col justify-center">
                    <div class="w-14 h-14 bg-sky-100 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">Hubungi Panitia PPDB</h3>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex items-center text-slate-600">
                            <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Senin - Jumat (08:00 - 15:00 WIB)</span>
                        </div>
                        <div class="flex items-center text-slate-600">
                            <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>panitia.ppdb@sekolah.sch.id</span>
                        </div>
                    </div>

                    <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center justify-center gap-2 bg-emerald-500 text-white px-6 py-4 rounded-xl text-lg font-semibold hover:bg-emerald-600 transition-all shadow-md shadow-emerald-200 hover:-translate-y-0.5">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Chat via WhatsApp
                    </a>
                </div>

                {{-- Kanan: Google Maps --}}
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden min-h-[350px] relative">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127504.42152865231!2d104.64962772591605!3d-3.2198006346296727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b75e8fc27a3e3%3A0x3039d80b220d0c0!2sPalembang%2C%20Palembang%20City%2C%20South%20Sumatra!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid" 
                        class="absolute inset-0 w-full h-full border-0" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Toggle accordion
        function toggleFaq(index) {
            const answer = document.getElementById('faq-answer-' + index);
            const icon = document.getElementById('faq-icon-' + index);
            const isOpen = !answer.classList.contains('hidden');

            // Tutup semua dulu
            document.querySelectorAll('[id^="faq-answer-"]').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('[id^="faq-icon-"]').forEach(el => el.classList.remove('rotate-180', 'text-sky-600'));

            if (!isOpen) {
                answer.classList.remove('hidden');
                icon.classList.add('rotate-180', 'text-sky-600');
            }
        }

        // Filter kategori
        function filterFaq(kategori) {
            // Update tampilan chip aktif
            document.querySelectorAll('.chip-btn').forEach(btn => {
                btn.classList.remove('bg-sky-600', 'text-white', 'border-sky-600', 'shadow-md', 'shadow-sky-200');
                btn.classList.add('bg-white', 'border', 'border-slate-200', 'text-slate-600');
            });

            const activeChip = document.getElementById('chip-' + kategori);
            activeChip.classList.remove('bg-white', 'border-slate-200', 'text-slate-600');
            activeChip.classList.add('bg-sky-600', 'text-white', 'border-sky-600', 'shadow-md', 'shadow-sky-200');

            // Tutup semua accordion dulu
            document.querySelectorAll('[id^="faq-answer-"]').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('[id^="faq-icon-"]').forEach(el => el.classList.remove('rotate-180', 'text-sky-600'));

            // Filter item
            const items = document.querySelectorAll('.faq-item');
            let adaYangTampil = false;

            items.forEach(item => {
                if (kategori === 'semua' || item.dataset.kategori === kategori) {
                    item.style.display = 'block';
                    adaYangTampil = true;
                } else {
                    item.style.display = 'none';
                }
            });

            // Tampilkan pesan kalau kosong
            const noResult = document.getElementById('no-result');
            if (!adaYangTampil) {
                noResult.classList.remove('hidden');
            } else {
                noResult.classList.add('hidden');
            }
        }
    </script>
</body>
</html>