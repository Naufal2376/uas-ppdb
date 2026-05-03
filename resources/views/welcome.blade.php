<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penerimaan Peserta Didik Baru (PPDB)</title>

    <!-- Tailwind v4 via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-50 text-gray-800 antialiased selection:bg-sky-600 selection:text-white">

    <!-- Navbar -->
    <nav class="bg-white px-6 py-4 shadow-sm w-full top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold tracking-tight text-sky-600">
                School<span class="text-gray-800">PPDB</span>
            </div>
            <div>
                @auth
                    @if(auth()->user()->role->value === 'admin')
                        <a href="{{ route('filament.admin.pages.dashboard') }}" class="font-medium text-gray-600 hover:text-sky-600 transition-colors">Admin Dashboard</a>
                    @else
                        <a href="{{ route('filament.student.pages.dashboard') }}" class="font-medium text-gray-600 hover:text-sky-600 transition-colors">Dashboard Saya</a>
                    @endif
                @else
                    <a href="{{ route('tentangkami') }}" class="font-medium text-gray-600 hover:text-sky-600 transition-colors px-4 py-2">Tentang Kami</a>
                    <a href="{{ route('filament.student.auth.login') }}" class="font-medium text-gray-600 hover:text-sky-600 transition-colors px-4 py-2">Masuk</a>
                    <a href="{{ route('filament.student.auth.register') }}" class="ml-2 rounded-lg bg-sky-600 px-4 py-2 font-medium text-white shadow-sm hover:bg-sky-700 transition-all">Daftar Sekarang</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="relative isolate pt-14 pb-20 justify-center min-h-[50vh] items-center flex">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-6xl">
                    Penerimaan Peserta Didik Baru
                </h1>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Sistem informasi pendaftaran sekolah transparan dan terintegrasi. Raih masa depan gemilang dengan bergabung bersama instansi pendidikan kami.
                </p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    @guest
                        <a href="{{ route('filament.student.auth.register') }}" class="rounded-xl bg-sky-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 hover:-translate-y-1 transition-all duration-200">
                            Mulai Pendaftaran
                        </a>
                    @endguest
                    <a href="#prosedur" class="text-sm font-semibold leading-6 text-gray-900 hover:text-sky-600 transition-colors">
                        Lihat Prosedur <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Info / Prosedur Section -->
    <section id="prosedur" class="bg-white py-24 sm:py-32 border-t border-gray-100 shadow-sm">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-sky-600">Informasi Pendaftaran</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Prosedur & Alur PPDB</p>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Ikuti langkah-langkah di bawah ini untuk memastikan pendaftaran berjalan dengan lancar.
                </p>
            </div>
            
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                    
                    <!-- Step 1 -->
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-sky-600 text-white font-bold">1</div>
                            Registrasi Akun
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">
                            Daftarkan email dan kata sandi Anda di portal siswa untuk mendapatkan akses masuk ke sistem formulir.
                        </dd>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-sky-600 text-white font-bold">2</div>
                            Lengkapi Biodata
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">
                            Isi formulir wizard yang mencakup Data Pribadi, Data Orang Tua, Data Sekolah Asal, dengan teliti.
                        </dd>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-sky-600 text-white font-bold">3</div>
                            Unggah Dokumen
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">
                            Siapkan dan unggah pindaian (scan) berkas pendukung: Ijazah/SKL, KK, Akta Kelahiran, dan Pas Foto.
                        </dd>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-sky-600 text-white font-bold">4</div>
                            Verifikasi & Pengumuman
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">
                            Pantau dashboard Anda. Panitia akan memverifikasi berkas, jika ditolak lengkapi kembali, jika disetujui unduh Bukti Pendaftaran.
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-50 py-10 mt-10">
        <div class="max-w-7xl mx-auto px-6 text-center text-gray-500 text-sm">
            <p>&copy; {{ date('Y') }} Sistem Informasi PPDB. Universitas Final Exam Project.</p>
            <p class="mt-2 text-xs">Developed with Laravel 12, Livewire 3, Filament v3 & Tailwind CSS v4.</p>
        </div>
    </footer>

</body>
</html>

