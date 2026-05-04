{{-- resources/views/partials/home/cta.blade.php --}}
<section class="py-20 bg-sky-600 border-t-4 border-sky-700 text-center px-6">
    <h2 class="text-3xl md:text-5xl font-black text-white mb-6">Siap Menjadi Bagian Dari Kami?</h2>
    <p class="text-sky-100 text-lg mb-10 max-w-2xl mx-auto">Waktu pendaftaran terbatas. Segera buat akun, lengkapi berkas, dan raih kesempatan pendidikan terbaik.</p>
    @auth
        <a href="{{ auth()->user()->isAdmin() ? '/admin' : '/student' }}" class="inline-flex items-center gap-3 bg-white text-sky-600 text-xl font-extrabold py-4 px-10 rounded-xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            Buka Dashboard
        </a>
    @else
        <a href="/student/register" class="inline-block bg-white text-sky-600 text-xl font-extrabold py-4 px-10 rounded-xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
            Buat Akun Sekarang
        </a>
    @endauth
</section>
