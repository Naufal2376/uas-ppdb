{{-- resources/views/tentang-kami.blade.php --}}
@extends('layouts.app')

@section('title', 'Tentang SMA IT Global Academy | SI-PPDB 2026')

@section('content')

    <section class="relative pt-32 pb-24 lg:pt-40 lg:pb-32 bg-slate-900 overflow-hidden border-b border-slate-800">

       <div class="absolute inset-0 z-0">

            <img src="{{ asset('images/bg1.jpg') }}" alt="Background Sekolah" class="w-full h-full object-cover object-center opacity-30">

            <div class="absolute inset-0 bg-slate-900/80 mix-blend-multiply"></div>
        </div>


        <div class="absolute top-0 -left-10 w-[500px] h-[500px] bg-sky-600/30 rounded-full mix-blend-screen filter blur-[100px] animate-blob z-0"></div>
        <div class="absolute top-0 -right-10 w-[500px] h-[500px] bg-teal-500/20 rounded-full mix-blend-screen filter blur-[100px] animate-blob animation-delay-2000 z-0"></div>
        <div class="absolute -bottom-32 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-blue-700/30 rounded-full mix-blend-screen filter blur-[100px] animate-blob animation-delay-4000 z-0"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-sky-300 text-xs font-black uppercase tracking-[0.3em] mb-8 transform hover:scale-105 transition-transform duration-300">
                <span class="relative flex h-2.5 w-2.5">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-teal-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-teal-500"></span>
                </span>
                Sekolah Menengah Atas Teknologi Informasi
            </div>

            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter mb-8 leading-[1.1]">
                SMA IT <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-teal-300 to-blue-500">Global Academy.</span>
            </h1>

            <p class="text-xl md:text-2xl max-w-3xl mx-auto leading-relaxed text-slate-300 font-medium">
                Mencetak generasi inovator masa depan yang berintegritas, berwawasan global, dan unggul dalam penguasaan Teknologi Informasi.
            </p>
        </div>
    </section>


    <section class="py-28 bg-slate-50 relative overflow-hidden">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 30px 30px;"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-12 gap-8 auto-rows-auto">

                <!-- Profil Sekolah -->
                <div class="lg:col-span-7 group relative bg-white p-10 md:p-14 rounded-[3rem] border border-slate-100 shadow-2xl shadow-slate-200/50 hover:shadow-sky-100 transition-all duration-500 hover:-translate-y-2">
                    <h2 class="text-3xl md:text-5xl font-black text-slate-800 mb-6 tracking-tight">Pusat Inkubasi <br><span class="text-sky-600">Tech-Leader.</span></h2>
                    <div class="w-20 h-1.5 bg-gradient-to-r from-sky-600 to-teal-400 rounded-full mb-8"></div>

                    <p class="text-slate-500 text-lg leading-relaxed mb-6 font-medium">
                        <strong>SMA IT Global Academy</strong> lahir dari visi untuk menciptakan ekosistem pendidikan menengah yang berfokus penuh pada penguasaan <em>Information Technology</em> (IT). Kami memadukan kecerdasan logika, kreativitas digital, dan pembentukan karakter profesional.
                    </p>
                    <p class="text-slate-500 text-lg leading-relaxed font-medium mb-10">
                        Didukung oleh kurikulum teknologi berstandar industri, kami mempersiapkan siswa/i untuk siap bersaing secara internasional, baik di universitas top dunia maupun langsung terjun sebagai inovator di ekosistem industri digital.
                    </p>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="p-6 rounded-[2rem] bg-slate-50 border border-slate-100 flex items-center gap-4">
                            <div class="w-14 h-14 bg-sky-100 text-sky-600 rounded-2xl flex items-center justify-center font-black text-xl">A</div>
                            <div>
                                <span class="block text-slate-800 font-black">Akreditasi</span>
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Nasional</span>
                            </div>
                        </div>
                        <div class="p-6 rounded-[2rem] bg-slate-50 border border-slate-100 flex items-center gap-4">
                            <div class="w-14 h-14 bg-teal-100 text-teal-600 rounded-2xl flex items-center justify-center font-black text-xl">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                            </div>
                            <div>
                                <span class="block text-slate-800 font-black">Kurikulum</span>
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Standar Global</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filosofi Logo dengan Logo Lokal -->
                <div class="lg:col-span-5 flex flex-col gap-6">
                    <!-- Title Badge & Image Display -->
                    <div class="bg-gradient-to-br from-slate-900 to-blue-950 p-8 rounded-[3rem] shadow-xl text-center relative overflow-hidden group flex flex-col items-center">
                        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>

                        <!-- Pemanggilan Logo Lokal (image_65edff.jpg) -->
                        <div class="relative z-10 w-36 h-36 mb-6 rounded-3xl overflow-hidden border-4 border-slate-800/50 shadow-2xl bg-slate-900 flex items-center justify-center transform group-hover:scale-105 group-hover:-rotate-3 transition-transform duration-500">
                            <img src="{{ asset('images/logo.jpg') }}" alt="Logo SMA IT Global Academy" class="w-full h-full object-contain">
                        </div>

                        <h3 class="relative z-10 text-2xl font-black text-white tracking-widest uppercase mb-1">Makna Identitas</h3>
                        <p class="relative z-10 text-sky-300 text-sm font-medium">Filosofi Logo IT Global Academy</p>
                    </div>

                    <!-- Shield Box -->
                    <div class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-lg shadow-slate-200/50 flex items-start gap-5 hover:-translate-y-1 transition-transform">
                        <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-black text-slate-800 mb-1">Perisai Biru (Shield)</h4>
                            <p class="text-slate-500 text-sm font-medium leading-relaxed">Melambangkan keamanan digital (Cybersecurity), ketahanan mental, serta integritas karakter.</p>
                        </div>
                    </div>

                    <!-- Book/Laptop Box -->
                    <div class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-lg shadow-slate-200/50 flex items-start gap-5 hover:-translate-y-1 transition-transform">
                        <div class="w-14 h-14 bg-sky-50 text-sky-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-black text-slate-800 mb-1">Buku & Laptop</h4>
                            <p class="text-slate-500 text-sm font-medium leading-relaxed">Representasi Ilmu Pengetahuan fundamental yang dilebur dengan kecanggihan Teknologi Informasi.</p>
                        </div>
                    </div>

                    <!-- Arrows Box -->
                    <div class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-lg shadow-slate-200/50 flex items-start gap-5 hover:-translate-y-1 transition-transform">
                        <div class="w-14 h-14 bg-teal-50 text-teal-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-black text-slate-800 mb-1">Panah Tosca Ke Atas</h4>
                            <p class="text-slate-500 text-sm font-medium leading-relaxed">Akselerasi inovasi, pemikiran dinamis, dan orientasi global yang menembus batasan konvensional.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ================= VISI & MISI (ULTIMATE BENTO GRID) ================= -->
    <section class="py-28 bg-white relative overflow-hidden border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-6xl font-black text-slate-800 tracking-tight mb-6">Arah <span class="text-sky-600">& Tujuan.</span></h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-sky-500 to-teal-400 rounded-full mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 auto-rows-[minmax(180px,auto)]">

                <!-- Visi (Besar) -->
                <div class="md:col-span-2 md:row-span-2 group relative p-10 md:p-14 rounded-[3rem] bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 overflow-hidden border border-slate-800 hover:shadow-2xl hover:shadow-blue-500/30 transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute -right-20 -top-20 w-80 h-80 bg-sky-500/20 rounded-full blur-3xl group-hover:bg-sky-400/30 transition-colors duration-500"></div>

                    <div class="w-20 h-20 bg-white/10 backdrop-blur-md rounded-[2rem] flex items-center justify-center mb-10 border border-white/20 shadow-xl">
                        <svg class="w-10 h-10 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-sky-400 uppercase tracking-widest mb-6">Visi SMA IT Global Academy</h3>
                    <p class="text-white md:text-4xl text-3xl font-black leading-tight tracking-tight">
                        "Menjadi institusi pendidikan teknologi terdepan yang menghasilkan Tech-Leader berstandar global, inovatif, dan berlandaskan etika profesionalisme tinggi."
                    </p>
                </div>

                <!-- Misi Items -->
                @php
                    $misi = [
                        ['num' => '01', 'color' => 'sky', 'text' => 'Mengintegrasikan kurikulum sains nasional dengan program penguasaan Teknologi Informasi mutakhir.'],
                        ['num' => '02', 'color' => 'teal', 'text' => 'Membentuk karakter kepemimpinan melalui program pengembangan soft-skills dan etika digital.'],
                        ['num' => '03', 'color' => 'blue', 'text' => 'Membangun ekosistem riset, coding, dan penciptaan startup teknologi sejak bangku sekolah.'],
                        ['num' => '04', 'color' => 'indigo', 'text' => 'Menjalin kemitraan dengan industri teknologi global untuk memperluas wawasan praktis siswa.']
                    ];
                @endphp

                @foreach($misi as $index => $m)
                <div class="group relative p-8 rounded-[2.5rem] bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-xl hover:shadow-slate-200/50 hover:border-{{ $m['color'] }}-200 transition-all duration-500 hover:-translate-y-2 {{ $index == 3 ? 'md:col-span-2 lg:col-span-1' : '' }}">
                    <div class="w-14 h-14 bg-{{ $m['color'] }}-100 text-{{ $m['color'] }}-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform font-black text-2xl shadow-inner">
                        {{ $m['num'] }}
                    </div>
                    <p class="text-slate-600 font-bold leading-relaxed text-lg">{{ $m['text'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================= PROGRAM UNGGULAN IT ================= -->
    <section class="py-28 bg-slate-900 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20">
                <span class="text-teal-400 font-black uppercase tracking-[0.4em] text-sm block mb-4">Academic Excellence</span>
                <h2 class="text-4xl md:text-5xl font-black text-white tracking-tight">Program Spesialisasi <span class="text-sky-400">Teknologi.</span></h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-slate-800/50 backdrop-blur-md p-10 rounded-[3rem] border border-slate-700 hover:bg-slate-800 hover:border-sky-500 transition-all duration-500 group">
                    <div class="w-20 h-20 bg-gradient-to-br from-sky-400 to-blue-600 rounded-[2rem] flex items-center justify-center mb-8 shadow-lg shadow-sky-500/30 group-hover:-rotate-6 transition-transform">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-white mb-4">Software Engineering</h3>
                    <p class="text-slate-400 font-medium leading-relaxed">Kurikulum mendalam tentang rekayasa perangkat lunak, membekali siswa dengan keahlian membangun aplikasi web dan mobile.</p>
                </div>
                <div class="bg-slate-800/50 backdrop-blur-md p-10 rounded-[3rem] border border-slate-700 hover:bg-slate-800 hover:border-teal-500 transition-all duration-500 group">
                    <div class="w-20 h-20 bg-gradient-to-br from-teal-400 to-emerald-600 rounded-[2rem] flex items-center justify-center mb-8 shadow-lg shadow-teal-500/30 group-hover:rotate-6 transition-transform">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-white mb-4">Data Science & AI</h3>
                    <p class="text-slate-400 font-medium leading-relaxed">Pengenalan fundamental Kecerdasan Buatan (AI) dan analisis data besar untuk melatih kemampuan problem-solving abad ke-21.</p>
                </div>
                <div class="bg-slate-800/50 backdrop-blur-md p-10 rounded-[3rem] border border-slate-700 hover:bg-slate-800 hover:border-indigo-500 transition-all duration-500 group">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-400 to-purple-600 rounded-[2rem] flex items-center justify-center mb-8 shadow-lg shadow-indigo-500/30 group-hover:-rotate-6 transition-transform">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-white mb-4">Cybersecurity & IoT</h3>
                    <p class="text-slate-400 font-medium leading-relaxed">Praktik rekayasa jaringan, keamanan siber dasar, serta pemanfaatan Internet of Things (IoT) untuk sistem otomasi modern.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= FASILITAS TECH-LAB ================= -->
    <section class="py-24 bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-black text-slate-800 tracking-tight mb-4">Fasilitas <span class="text-sky-600">Premium.</span></h2>
                <p class="text-slate-500 font-medium text-lg max-w-2xl mx-auto">Infrastruktur berstandar industri teknologi untuk mendukung ekosistem inovasi siswa.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">
                @php
                    $fasilitas = [
                        ['icon' => '💻', 'title' => 'iMac Computing Lab', 'desc' => 'Laboratorium dengan perangkat premium Apple untuk desain & coding.'],
                        ['icon' => '🚀', 'title' => 'Maker Space & Robotics', 'desc' => 'Ruang inovasi untuk perakitan hardware, 3D printing, dan mikrokontroler.'],
                        ['icon' => '📚', 'title' => 'Digital Smart Library', 'desc' => 'Perpustakaan digital dengan akses bebas ke jurnal teknologi global.'],
                        ['icon' => '🎙️', 'title' => 'Multimedia Studio', 'desc' => 'Studio kedap suara lengkap dengan alat broadcasting.'],
                        ['icon' => '💡', 'title' => 'Startup Coworking Area', 'desc' => 'Area kolaboratif terbuka untuk brainstorming dan proyek.'],
                        ['icon' => '⚡', 'title' => 'High-Speed Wi-Fi 6', 'desc' => 'Konektivitas nirkabel generasi terbaru yang super cepat di kampus.']
                    ];
                @endphp

                @foreach($fasilitas as $item)
                <div class="group relative bg-slate-50 p-8 rounded-[2.5rem] border border-slate-100 hover:border-sky-200 hover:bg-white hover:shadow-2xl hover:shadow-sky-100/50 transition-all duration-500 hover:-translate-y-3">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-sm group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500 border border-slate-100">
                        {{ $item['icon'] }}
                    </div>
                    <h4 class="text-xl font-black text-slate-800 mb-3 group-hover:text-sky-600 transition-colors">{{ $item['title'] }}</h4>
                    <p class="text-slate-500 text-sm font-medium leading-relaxed">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================= GALERI (ASYMMETRIC GRID) ================= -->
    <section class="py-24 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <div>
                    <h2 class="text-4xl md:text-5xl font-black text-slate-800 tracking-tight mb-4">Galeri <span class="text-sky-600">Kegiatan.</span></h2>
                    <p class="text-slate-500 font-medium text-lg">Momen kolaborasi, pembelajaran, dan pencapaian siswa di lingkungan akademi.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 auto-rows-[250px]">
                <!-- Item 1 (Lebar) -->
                <div class="md:col-span-2 md:row-span-2 rounded-[2.5rem] overflow-hidden relative group shadow-lg">
                    <div class="absolute inset-0 bg-slate-900/20 group-hover:bg-transparent transition-colors z-10 duration-500"></div>
                    <img src="{{ asset('images/bg-sekolah.jpg') }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" alt="Kegiatan Utama">
                    <div class="absolute bottom-0 left-0 w-full p-8 bg-gradient-to-t from-slate-900/90 to-transparent z-20 translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <h4 class="text-white font-black text-2xl">Tech-Incubation Center</h4>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="md:col-span-2 rounded-[2.5rem] overflow-hidden relative group shadow-lg">
                    <div class="absolute inset-0 bg-slate-900/20 group-hover:bg-transparent transition-colors z-10 duration-500"></div>
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" alt="Galeri 2">
                </div>

                <!-- Item 3 -->
                <div class="rounded-[2.5rem] overflow-hidden relative group shadow-lg">
                    <div class="absolute inset-0 bg-slate-900/20 group-hover:bg-transparent transition-colors z-10 duration-500"></div>
                    <img src="https://images.unsplash.com/photo-1513258496099-48168024aec0" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" alt="Galeri 3">
                </div>

                <!-- Item 4 -->
                <div class="rounded-[2.5rem] overflow-hidden relative group shadow-lg">
                    <div class="absolute inset-0 bg-slate-900/20 group-hover:bg-transparent transition-colors z-10 duration-500"></div>
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" alt="Galeri 4">
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Animations -->
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
@endsection
