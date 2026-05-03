<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Kami</title>

    <!-- Tailwind v4 via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased selection:bg-sky-600 selection:text-white">

    <!-- Navbar -->
    <nav class="bg-white px-6 py-4 shadow-sm w-full sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold tracking-tight text-sky-600">
                School<span class="text-gray-800">PPDB</span>
            </a>
            <div class="space-x-2">
                <a href="{{ url('/') }}" class="font-medium text-gray-600 hover:text-sky-600 transition-colors px-4 py-2">Beranda</a>
                <a href="{{ route('filament.student.auth.login') }}" class="font-medium text-gray-600 hover:text-sky-600 transition-colors px-4 py-2">Masuk</a>
                <a href="{{ route('filament.student.auth.register') }}" class="rounded-lg bg-sky-600 px-4 py-2 font-medium text-white shadow-sm hover:bg-sky-700 transition-all">Daftar Sekarang</a>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <main class="relative isolate pt-14 pb-20 justify-center min-h-[50vh] items-center flex">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
            <h1 class="text-5xl font-extrabold mb-6">Tentang Kami</h1>
            <p class="text-xl max-w-3xl mx-auto leading-relaxed">
                Mewujudkan generasi unggul, berkarakter, dan berprestasi melalui pendidikan berkualitas.
            </p>
        </div>
    </main>

    <!-- Profil Sekolah -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Profil Sekolah</h2>
                <p class="text-gray-600 leading-8 mb-4">
                    Sekolah kami berkomitmen memberikan layanan pendidikan terbaik dengan lingkungan belajar yang nyaman, aman, dan inspiratif. Kami fokus pada pengembangan akademik, karakter, serta keterampilan peserta didik.
                </p>
                <p class="text-gray-600 leading-8">
                    Dengan tenaga pendidik profesional dan fasilitas modern, kami siap mendampingi setiap siswa dalam meraih prestasi terbaiknya.
                </p>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1" alt="Profil Sekolah" class="rounded-2xl shadow-xl w-full h-[400px] object-cover">
            </div>
        </div>
    </section>

    <!-- Visi Misi -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Visi & Misi</h2>
            </div>
            <div class="grid md:grid-cols-2 gap-10">
                <div class="bg-white p-8 rounded-2xl shadow-md">
                    <h3 class="text-2xl font-semibold text-sky-600 mb-4">Visi</h3>
                    <p class="text-gray-600 leading-8">
                        Menjadi lembaga pendidikan unggulan yang menghasilkan lulusan berprestasi, berakhlak mulia, dan siap menghadapi tantangan global.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-md">
                    <h3 class="text-2xl font-semibold text-sky-600 mb-4">Misi</h3>
                    <ul class="space-y-3 text-gray-600 leading-7 list-disc list-inside">
                        <li>Menyelenggarakan pendidikan berkualitas dan inovatif.</li>
                        <li>Mengembangkan potensi akademik dan non-akademik siswa.</li>
                        <li>Menanamkan nilai karakter, disiplin, dan tanggung jawab.</li>
                        <li>Menciptakan lingkungan belajar yang aman dan kondusif.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Fasilitas Sekolah</h2>
                <p class="mt-4 text-gray-600">Fasilitas lengkap untuk mendukung kegiatan belajar mengajar.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow">📚 Perpustakaan Modern</div>
                <div class="bg-gray-50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow">💻 Laboratorium Komputer</div>
                <div class="bg-gray-50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow">🧪 Laboratorium IPA</div>
                <div class="bg-gray-50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow">🏀 Lapangan Olahraga</div>
                <div class="bg-gray-50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow">🕌 Tempat Ibadah</div>
                <div class="bg-gray-50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow">🌐 Akses Wi-Fi Sekolah</div>
            </div>
        </div>
    </section>

    <!-- Galeri -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Galeri Kegiatan</h2>
                <p class="mt-4 text-gray-600">Dokumentasi berbagai kegiatan siswa di sekolah.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7" class="rounded-2xl shadow-md h-72 w-full object-cover" alt="Galeri 1">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f" class="rounded-2xl shadow-md h-72 w-full object-cover" alt="Galeri 2">
                <img src="https://images.unsplash.com/photo-1513258496099-48168024aec0" class="rounded-2xl shadow-md h-72 w-full object-cover" alt="Galeri 3">
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-10 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-6 text-center text-gray-500 text-sm">
            <p>&copy; {{ date('Y') }} Sistem Informasi PPDB.</p>
            <p class="mt-2">Membangun masa depan pendidikan yang lebih baik.</p>
        </div>
    </footer>

</body>
</html>