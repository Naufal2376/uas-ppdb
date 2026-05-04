{{-- resources/views/partials/home/hero.blade.php --}}
<section id="beranda" class="relative w-full min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 w-full h-full z-0">
        <img src="{{ asset('images/bg-sekolah.jpg') }}" alt="Gedung Sekolah" class="absolute inset-0 w-full h-full object-cover object-center scale-105 animate-kenburns">
    </div>

    <div class="absolute inset-0 bg-slate-900/30 z-0"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent z-0"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 w-full text-center mt-20">
        <h1 class="text-5xl md:text-6xl lg:text-8xl font-extrabold text-white tracking-tight leading-[1.1] mb-8 drop-shadow-2xl">
            Masa Depan Gemilang <br class="hidden md:block" />
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-300 to-sky-100 drop-shadow-lg">Dimulai Dari Sini.</span>
        </h1>
        <p class="text-lg md:text-xl text-white mb-12 max-w-3xl mx-auto leading-relaxed font-medium drop-shadow-xl">
            Selamat datang di Sistem Informasi Penerimaan Peserta Didik Baru (SI-PPDB). Kami menghadirkan proses pendaftaran yang cepat, aman, dan transparan sepenuhnya secara daring.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-5">
            @auth
                <a href="{{ auth()->user()->isAdmin() ? '/admin' : '/student' }}" class="group relative inline-flex items-center justify-center px-8 py-4 font-bold text-white bg-sky-600 rounded-xl overflow-hidden shadow-xl hover:shadow-sky-600/50 transition-all duration-300 border border-sky-500 hover:border-sky-400">
                    <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-white rounded-full group-hover:w-64 group-hover:h-56 opacity-10"></span>
                    <span class="relative flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard Saya
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </span>
                </a>
            @else
                <a href="/student/register" class="group relative inline-flex items-center justify-center px-8 py-4 font-bold text-white bg-sky-600 rounded-xl overflow-hidden shadow-xl hover:shadow-sky-600/50 transition-all duration-300 border border-sky-500 hover:border-sky-400">
                    <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-white rounded-full group-hover:w-64 group-hover:h-56 opacity-10"></span>
                    <span class="relative flex items-center gap-2">
                        Mulai Registrasi
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </span>
                </a>
            @endauth
            <a href="#alur" class="inline-flex items-center justify-center px-8 py-4 font-bold text-white bg-slate-900/40 backdrop-blur-md border border-white/30 rounded-xl hover:bg-slate-900/60 transition-all duration-300 shadow-lg">
                Pelajari Panduan
            </a>
        </div>
    </div>

        <div class="absolute bottom-5 left-1/2 -translate-x-1/2 z-10 animate-bounce flex flex-col items-center gap-2">
        <span class="text-white text-xs font-semibold tracking-widest uppercase drop-shadow-md">Scroll</span>
        <svg class="w-6 h-6 text-white drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
    </div>
</section>
