<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SMA IT Global Academy | Portal PPDB 2026')</title>

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-sky-600 selection:text-white flex flex-col min-h-screen">


    <nav x-data="{ mobileMenuOpen: false, scrolled: false }"
         @scroll.window="scrolled = (window.pageYOffset > 20)"
         class="fixed w-full z-50 transition-all duration-300 bg-white border-b py-4 overflow-hidden"
         :class="scrolled ? 'shadow-xl border-sky-100' : 'border-slate-100'">


        <div class="absolute inset-0 bg-gradient-to-r from-white via-sky-50 to-white -z-10"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center h-14">


                <a href="/" class="flex items-center gap-3 group shrink-0">
                    <div class="w-11 h-11 rounded-xl overflow-hidden shadow-sm border border-slate-100 group-hover:scale-105 group-hover:-rotate-3 transition-transform duration-300">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo IT Global Academy" class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-xl tracking-tight text-slate-800 leading-none">IT Global <span class="text-sky-600">Academy</span></span>
                        <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mt-1">SMA Teknologi</span>
                    </div>
                </a>

                <!-- 2. Navigasi Desktop (Rata Kanan Sempurna) -->
                <div class="hidden md:flex items-center ml-auto">

                    <!-- Grup Link Menu - UPDATED "Jalur" JADI "Pengumuman" -->
                    <div class="flex items-center space-x-1">
                        <a href="/#beranda" class="relative px-4 py-2 text-sm font-bold text-slate-600 hover:text-sky-600 transition-all group">
                            Beranda
                            <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-sky-600 transition-all duration-300 group-hover:w-1/2"></span>
                        </a>
                        <a href="/#alur" class="relative px-4 py-2 text-sm font-bold text-slate-600 hover:text-sky-600 transition-all group">
                            Alur
                            <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-sky-600 transition-all duration-300 group-hover:w-1/2"></span>
                        </a>
                        <a href="/pengumuman" class="relative px-4 py-2 text-sm font-bold text-slate-600 hover:text-sky-600 transition-all group">
                            Pengumuman
                            <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-sky-600 transition-all duration-300 group-hover:w-1/2"></span>
                        </a>
                        <a href="/tentang-kami" class="relative px-4 py-2 text-sm font-bold text-slate-600 hover:text-sky-600 transition-all group">
                            Tentang Kami
                            <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-sky-600 transition-all duration-300 group-hover:w-1/2"></span>
                        </a>
                        <a href="/faq" class="relative px-4 py-2 text-sm font-bold text-slate-600 hover:text-sky-600 transition-all group">
                            FAQ
                            <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-sky-600 transition-all duration-300 group-hover:w-1/2"></span>
                        </a>
                    </div>

                    <!-- Divider Sultan -->
                    <div class="h-6 w-px bg-slate-200 mx-6"></div>

                    <!-- Tombol Aksi (Auth-Aware) -->
                    <div class="flex items-center gap-3">
                        @auth
                            <a href="{{ auth()->user()->isAdmin() ? '/admin' : '/student' }}" class="bg-sky-600 hover:bg-sky-700 text-white text-sm font-bold px-7 py-3 rounded-xl shadow-lg shadow-sky-200 hover:shadow-sky-300 transition-all duration-300 transform active:scale-95 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                Dashboard
                            </a>
                        @else
                            <a href="/student/login" class="text-sm font-bold text-slate-600 hover:text-sky-600 px-4 py-2 transition-colors">
                                Masuk
                            </a>
                            <a href="/student/register" class="bg-slate-800 hover:bg-sky-600 text-white text-sm font-bold px-7 py-3 rounded-xl shadow-lg shadow-slate-200 hover:shadow-sky-200 transition-all duration-300 transform active:scale-95">
                                Daftar Sekarang
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Toggle Menu Mobile -->
                <div class="md:hidden flex items-center ml-auto">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-slate-500 p-2 focus:outline-none focus:ring-2 focus:ring-sky-500 rounded-lg">
                        <svg x-show="!mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                        <svg x-show="mobileMenuOpen" style="display: none;" class="w-7 h-7 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Dropdown Menu (100% Solid White) - UPDATED "Jalur" JADI "Pengumuman" -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             class="md:hidden bg-white border-t border-slate-100 shadow-2xl relative z-50">
            <div class="px-6 py-8 space-y-3">
                <a href="/#beranda" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-xl text-base font-bold text-slate-700 hover:bg-sky-50 hover:text-sky-600 transition-colors">Beranda</a>
                <a href="/#alur" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-xl text-base font-bold text-slate-700 hover:bg-sky-50 hover:text-sky-600 transition-colors">Alur Pendaftaran</a>
                <a href="/pengumuman" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-xl text-base font-bold text-slate-700 hover:bg-sky-50 hover:text-sky-600 transition-colors">Pengumuman</a>
                <a href="/tentang-kami" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-xl text-base font-bold text-slate-700 hover:bg-sky-50 hover:text-sky-600 transition-colors">Tentang Kami</a>
                <a href="/faq" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-xl text-base font-bold text-slate-700 hover:bg-sky-50 hover:text-sky-600 transition-colors">Bantuan FAQ</a>
                <hr class="border-slate-100 my-4">
                @auth
                    <a href="{{ auth()->user()->isAdmin() ? '/admin' : '/student' }}" class="block w-full text-center bg-sky-600 text-white font-bold py-3.5 rounded-xl shadow-md transition-colors flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Buka Dashboard
                    </a>
                @else
                    <a href="/student/login" class="block w-full text-center bg-slate-100 text-slate-800 font-bold py-3.5 rounded-xl mb-3 transition-colors">Masuk Portal</a>
                    <a href="/student/register" class="block w-full text-center bg-sky-600 text-white font-bold py-3.5 rounded-xl shadow-md transition-colors">Buat Akun Sekarang</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- ================= KONTEN UTAMA ================= -->
    <main class="flex-grow pt-15">
        @yield('content')
    </main>

    <!-- ================= FOOTER PROFESIONAL ================= -->
    <footer class="bg-slate-900 pt-20 pb-0 mt-auto border-t-[6px] border-sky-600 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="footer-pattern" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M0 40L40 0H20L0 20M40 40V20L20 40" fill="none" stroke="currentColor" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#footer-pattern)"/>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8 mb-16">

                <!-- Kolom 1: Brand & Deskripsi -->
                <div class="lg:col-span-4">
                    <div class="flex items-center gap-3 mb-6 group">
                        <!-- Menggunakan Logo Lokal image_65edff.jpg -->
                        <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center overflow-hidden border-2 border-slate-700 group-hover:scale-105 transition-transform">
                            <img src="{{ asset('images/logo.jpg') }}" alt="Logo SMA IT Global Academy" class="w-full h-full object-contain p-0.5">
                        </div>
                        <span class="font-bold text-2xl tracking-tight text-white leading-none">IT Global <br><span class="text-sky-500 text-lg">Academy.</span></span>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6 pr-4">
                        Sistem Informasi Penerimaan Peserta Didik Baru (SI-PPDB) Terpadu. Mencetak generasi inovator masa depan yang berintegritas dan unggul dalam penguasaan Teknologi Informasi.
                    </p>
                    <!-- Social Media -->
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-sky-600 hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-sky-600 hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Kolom 2: Menu Cepat -->
                <div class="lg:col-span-2">
                    <h3 class="text-white font-bold tracking-wider uppercase mb-6 text-sm">Akses Cepat</h3>
                    <ul class="space-y-4">
                        <li><a href="/#beranda" class="text-slate-400 hover:text-sky-400 transition-colors text-sm flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span> Beranda</a></li>
                        <li><a href="/#alur" class="text-slate-400 hover:text-sky-400 transition-colors text-sm flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span> Alur Pendaftaran</a></li>
                        <!-- Ubah Jalur menjadi Pengumuman -->
                        <li><a href="/pengumuman" class="text-slate-400 hover:text-sky-400 transition-colors text-sm flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span> Pengumuman</a></li>
                        <li><a href="/tentang-kami" class="text-slate-400 hover:text-sky-400 transition-colors text-sm flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span> Profil Sekolah</a></li>
                        <li><a href="/faq" class="text-slate-400 hover:text-sky-400 transition-colors text-sm flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span> Bantuan & FAQ</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Layanan Siswa -->
                <div class="lg:col-span-3">
                    <h3 class="text-white font-bold tracking-wider uppercase mb-6 text-sm">Layanan Pendaftar</h3>
                    <ul class="space-y-4">
                        @auth
                            <li><a href="{{ auth()->user()->isAdmin() ? '/admin' : '/student' }}" class="text-slate-400 hover:text-sky-400 transition-colors text-sm flex items-center gap-2"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg> Dashboard Saya</a></li>
                        @else
                            <li><a href="/student/login" class="text-slate-400 hover:text-sky-400 transition-colors text-sm flex items-center gap-2"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg> Login Portal</a></li>
                            <li><a href="/student/register" class="text-slate-400 hover:text-sky-400 transition-colors text-sm flex items-center gap-2"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg> Buat Akun Baru</a></li>
                        @endauth
                        <li><a href="/#cek-status" class="text-slate-400 hover:text-sky-400 transition-colors text-sm flex items-center gap-2"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg> Cek Status Berkas</a></li>
                    </ul>
                </div>

                <!-- Kolom 4: Hubungi Kami -->
                <div class="lg:col-span-3">
                    <h3 class="text-white font-bold tracking-wider uppercase mb-6 text-sm">Pusat Bantuan</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-sm text-slate-400">
                            <svg class="w-5 h-5 text-sky-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <!-- Update Lokasi ke Pagar Alam -->
                            <span>SMA IT Global Academy<br>Pagar Alam, Sumatera Selatan</span>
                        </li>
                        <li class="flex items-center gap-3 text-sm text-slate-400">
                            <svg class="w-5 h-5 text-sky-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <!-- Update Kontak Lokal Pagar Alam -->
                            <span>(0730) 123-4567</span>
                        </li>
                        <li class="flex items-center gap-3 text-sm text-slate-400">
                            <svg class="w-5 h-5 text-sky-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>admission@itglobal.sch.id</span>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Bottom Bar: Copyright -->
            <div class="pt-8 pb-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-500 text-sm text-center md:text-left">
                    &copy; 2026 SMA IT Global Academy. Hak Cipta Dilindungi.
                </p>
                <div class="flex items-center gap-6 text-sm">
                    <a href="#" class="text-slate-500 hover:text-sky-400 transition-colors text-sm">Syarat & Ketentuan</a>
                    <a href="#" class="text-slate-500 hover:text-sky-400 transition-colors text-sm">Kebijakan Privasi</a>
                </div>
            </div>
        </div>
    </footer>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireScripts
</body>
</html>
