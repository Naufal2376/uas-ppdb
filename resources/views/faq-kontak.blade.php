{{-- resources/views/faq.blade.php --}}
@extends('layouts.app')

@section('title', 'Pusat Bantuan & FAQ | SMA IT Global Academy')

@section('content')

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
                Pusat Bantuan
            </div>
            <h1 class="text-4xl md:text-6xl font-black mb-6 tracking-tighter text-white">Pertanyaan <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-teal-300">Sering Diajukan.</span></h1>
            <p class="text-slate-400 text-lg md:text-xl max-w-2xl mx-auto font-medium leading-relaxed">
                Temukan jawaban lengkap seputar pendaftaran PPDB. Kami siap membantu Anda di setiap tahapan seleksi.
            </p>
        </div>
    </section>

    <!-- ================= STATISTIK CARDS ================= -->
    <section class="max-w-6xl mx-auto px-6 -mt-12 relative z-20 mb-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-3xl shadow-2xl shadow-slate-200/50 border border-slate-100 p-8 text-center hover:-translate-y-2 transition-transform duration-300">
                <div class="text-4xl font-black text-sky-600 mb-1">4</div>
                <div class="text-slate-500 font-bold uppercase tracking-widest text-xs">Jalur Pendaftaran</div>
            </div>
            <div class="bg-white rounded-3xl shadow-2xl shadow-slate-200/50 border border-slate-100 p-8 text-center hover:-translate-y-2 transition-transform duration-300">
                <div class="text-4xl font-black text-teal-500 mb-1">{{ count($faqs) }}</div>
                <div class="text-slate-500 font-bold uppercase tracking-widest text-xs">Pertanyaan Tersedia</div>
            </div>
            <div class="bg-white rounded-3xl shadow-2xl shadow-slate-200/50 border border-slate-100 p-8 text-center hover:-translate-y-2 transition-transform duration-300">
                <div class="text-4xl font-black text-blue-600 mb-1">24/7</div>
                <div class="text-slate-500 font-bold uppercase tracking-widest text-xs">Akses Info Online</div>
            </div>
        </div>
    </section>

    <!-- ================= FAQ SECTION ================= -->
    <section class="max-w-3xl mx-auto px-6 pb-24">

        <!-- Filter Chips -->
        <div class="flex flex-wrap gap-3 mb-10 justify-center">
            <button onclick="filterFaq('semua')" id="chip-semua" class="chip-btn bg-sky-600 text-white px-6 py-2.5 rounded-full text-sm font-bold transition-all shadow-lg shadow-sky-200">
                Semua
            </button>
            <button onclick="filterFaq('pendaftaran')" id="chip-pendaftaran" class="chip-btn bg-white border-2 border-slate-100 text-slate-600 px-6 py-2.5 rounded-full text-sm font-bold hover:border-sky-300 hover:text-sky-600 transition-all">
                Pendaftaran
            </button>
            <button onclick="filterFaq('berkas')" id="chip-berkas" class="chip-btn bg-white border-2 border-slate-100 text-slate-600 px-6 py-2.5 rounded-full text-sm font-bold hover:border-sky-300 hover:text-sky-600 transition-all">
                Berkas
            </button>
            <button onclick="filterFaq('jalur')" id="chip-jalur" class="chip-btn bg-white border-2 border-slate-100 text-slate-600 px-6 py-2.5 rounded-full text-sm font-bold hover:border-sky-300 hover:text-sky-600 transition-all">
                Jalur
            </button>
            <button onclick="filterFaq('pengumuman')" id="chip-pengumuman" class="chip-btn bg-white border-2 border-slate-100 text-slate-600 px-6 py-2.5 rounded-full text-sm font-bold hover:border-sky-300 hover:text-sky-600 transition-all">
                Pengumuman
            </button>
        </div>

        <!-- Pesan kalau tidak ada hasil filter -->
        <div id="no-result" class="hidden text-center py-12 bg-slate-50 rounded-[2rem] border-2 border-dashed border-slate-200 text-slate-500 font-bold">
            <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Tidak ada pertanyaan di kategori ini.
        </div>

        <!-- Accordion List -->
        <div class="space-y-4" id="faq-list">
            @foreach($faqs as $index => $faq)
            <div class="faq-item bg-white rounded-[1.5rem] border-2 border-slate-100 overflow-hidden hover:border-sky-300 hover:shadow-xl hover:shadow-sky-100 transition-all duration-300"
                 data-kategori="{{ $faq['kategori'] }}">
                <button
                    class="w-full flex items-center justify-between px-6 py-5 text-left focus:outline-none group"
                    onclick="toggleFaq({{ $index }})"
                    id="faq-btn-{{ $index }}"
                >
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-[1rem] bg-slate-50 text-sky-600 flex items-center justify-center text-sm font-black shrink-0 border border-slate-100 group-hover:bg-sky-600 group-hover:text-white transition-colors">
                            Q{{ $index + 1 }}
                        </div>
                        <span class="text-slate-800 font-bold text-lg leading-snug pr-4 mt-1.5">{{ $faq['pertanyaan'] }}</span>
                    </div>
                    <svg id="faq-icon-{{ $index }}" class="w-6 h-6 text-slate-400 group-hover:text-sky-600 transition-transform duration-300 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="faq-answer-{{ $index }}" class="hidden border-t-2 border-slate-50 bg-slate-50/50">
                    <div class="px-6 py-6 pl-[4.5rem] text-slate-500 font-medium leading-relaxed">
                        {{ $faq['jawaban'] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- ================= KONTAK & MAPS SECTION ================= -->
    <section class="bg-white border-t border-slate-100 py-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-slate-800 tracking-tight">Masih Butuh Bantuan?</h2>
                <div class="w-16 h-1.5 bg-gradient-to-r from-sky-500 to-teal-400 rounded-full mx-auto mt-6 mb-6"></div>
                <p class="text-slate-500 font-medium text-lg">Kunjungi lokasi kami atau hubungi Helpdesk Panitia PPDB secara langsung.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-stretch">

                <!-- Kiri: Informasi Kontak & Tombol -->
                <div class="bg-slate-50 rounded-[3rem] p-10 lg:p-14 border border-slate-100 shadow-sm flex flex-col justify-center relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-sky-100 rounded-full mix-blend-multiply filter blur-2xl opacity-50"></div>

                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-8 shadow-sm border border-slate-100 relative z-10">
                        <svg class="w-8 h-8 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-black text-slate-800 mb-6 relative z-10">Hubungi Panitia PPDB</h3>

                    <div class="space-y-5 mb-10 relative z-10">
                        <div class="flex items-center text-slate-600 font-medium bg-white p-4 rounded-2xl border border-slate-100">
                            <svg class="w-6 h-6 mr-4 text-sky-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Senin - Jumat (08:00 - 15:00 WIB)</span>
                        </div>
                        <div class="flex items-center text-slate-600 font-medium bg-white p-4 rounded-2xl border border-slate-100">
                            <svg class="w-6 h-6 mr-4 text-sky-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>admission@itglobal.sch.id</span>
                        </div>
                    </div>

                    <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center justify-center gap-3 bg-emerald-500 text-white px-8 py-4 rounded-2xl text-lg font-bold hover:bg-emerald-600 transition-all shadow-xl shadow-emerald-200 hover:-translate-y-1 relative z-10">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Hubungi via WhatsApp
                    </a>
                </div>

                <!-- Kanan: Google Maps (Updated ke Pagar Alam) -->
                <div class="bg-slate-200 rounded-[3rem] border-8 border-white shadow-2xl overflow-hidden min-h-[450px] relative">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127393.30396016146!2d103.15570075489868!3d-4.041695504781745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e366da2b12eb5b9%3A0x4039d80b220ce60!2sPagar%20Alam%2C%20Pagar%20Alam%20City%2C%20South%20Sumatra!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                        class="absolute inset-0 w-full h-full border-0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Script Vanilla JS untuk Filter & Toggle FAQ -->
    <script>
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

        function filterFaq(kategori) {
            // Update tampilan chip aktif
            document.querySelectorAll('.chip-btn').forEach(btn => {
                btn.classList.remove('bg-sky-600', 'text-white', 'border-sky-600', 'shadow-lg', 'shadow-sky-200');
                btn.classList.add('bg-white', 'border-2', 'border-slate-100', 'text-slate-600');
            });

            const activeChip = document.getElementById('chip-' + kategori);
            activeChip.classList.remove('bg-white', 'border-slate-100', 'text-slate-600');
            activeChip.classList.add('bg-sky-600', 'text-white', 'border-sky-600', 'shadow-lg', 'shadow-sky-200');

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

@endsection
