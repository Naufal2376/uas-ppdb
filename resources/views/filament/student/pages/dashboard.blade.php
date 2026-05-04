<x-filament-panels::page>
    @php
        $user = auth()->user();
        $registration = \App\Models\Registration::where('user_id', $user->id)->first();
        $studentDetail = $user->studentDetail;
        $parentDetail = $user->parentDetail;
        $schoolOrigin = $user->schoolOrigin;
        $docCount = $user->documents()->count();
    @endphp

    @if (!$registration)
        {{-- ═══════ BELUM MENDAFTAR ═══════ --}}
        <div class="space-y-6">
            {{-- Welcome Banner --}}
            <div class="ppdb-hero-banner p-8 md:p-10 ppdb-fade-in">
                <div class="relative z-10 flex flex-col md:flex-row items-center gap-6">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo PPDB" class="h-16 w-16 shrink-0 rounded-xl object-cover ring-2 ring-white/30 shadow-lg" />
                    <div class="text-center md:text-left">
                        <h2 class="text-2xl font-bold text-white tracking-tight">
                            Selamat Datang, {{ $user->name }}! 👋
                        </h2>
                        <p class="mt-1 text-sky-100 text-sm max-w-lg">
                            Anda belum melakukan pendaftaran. Silakan ikuti langkah-langkah di bawah ini untuk memulai proses PPDB.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Step Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="ppdb-card p-5 ppdb-slide-up ppdb-delay-1">
                    <div class="ppdb-icon-circle ppdb-icon-circle-sky mb-3">
                        <x-heroicon-o-user class="h-5 w-5" />
                    </div>
                    <h3 class="font-semibold text-slate-800 dark:text-white text-sm">1. Data Pribadi</h3>
                    <p class="mt-1 text-xs text-slate-500 dark:text-slate-400 leading-relaxed">Isi biodata lengkap: NISN, NIK, alamat, dan kontak.</p>
                </div>
                <div class="ppdb-card p-5 ppdb-slide-up ppdb-delay-2">
                    <div class="ppdb-icon-circle ppdb-icon-circle-emerald mb-3">
                        <x-heroicon-o-users class="h-5 w-5" />
                    </div>
                    <h3 class="font-semibold text-slate-800 dark:text-white text-sm">2. Data Orang Tua</h3>
                    <p class="mt-1 text-xs text-slate-500 dark:text-slate-400 leading-relaxed">Lengkapi informasi ayah, ibu, dan wali beserta pekerjaan.</p>
                </div>
                <div class="ppdb-card p-5 ppdb-slide-up ppdb-delay-3">
                    <div class="ppdb-icon-circle ppdb-icon-circle-amber mb-3">
                        <x-heroicon-o-document-arrow-up class="h-5 w-5" />
                    </div>
                    <h3 class="font-semibold text-slate-800 dark:text-white text-sm">3. Upload Dokumen</h3>
                    <p class="mt-1 text-xs text-slate-500 dark:text-slate-400 leading-relaxed">Unggah pas foto, KK, ijazah, dan akta kelahiran.</p>
                </div>
            </div>

            {{-- CTA --}}
            <div class="text-center ppdb-slide-up ppdb-delay-4">
                <a href="{{ \App\Filament\Student\Pages\RegistrationWizard::getUrl() }}"
                   class="inline-flex items-center gap-2 rounded-lg bg-sky-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 transition-colors">
                    <x-heroicon-o-rocket-launch class="h-5 w-5" />
                    Mulai Pendaftaran Sekarang
                </a>
            </div>
        </div>
    @else
        {{-- ═══════ SUDAH MENDAFTAR ═══════ --}}
        @php
            $statusEnum = $registration->status;
            $statusValue = $statusEnum->value;
            $statusClasses = match($statusEnum->getColor()) {
                'success' => 'bg-emerald-500/20 ring-emerald-300/30',
                'info' => 'bg-sky-500/20 ring-sky-300/30',
                'danger' => 'bg-rose-500/20 ring-rose-300/30',
                default => 'bg-amber-500/20 ring-amber-300/30',
            };
        @endphp
        <div class="space-y-6">
            {{-- Header Banner --}}
            <div class="ppdb-hero-banner p-8 md:p-10 ppdb-fade-in">
                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-5">
                    <div class="flex items-center gap-5">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo PPDB" class="h-14 w-14 shrink-0 rounded-xl object-cover ring-2 ring-white/30 shadow-lg" />
                        <div>
                            <p class="text-xs font-medium text-sky-200 uppercase tracking-wider">Pendaftaran Berhasil</p>
                            <p class="text-2xl md:text-3xl font-bold text-white font-mono tracking-tight mt-1">
                                {{ $registration->registration_number }}
                            </p>
                            <p class="mt-2 text-sky-100 text-sm">
                                <span class="font-semibold text-white">{{ $user->name }}</span>
                                &mdash; Terdaftar {{ $registration->created_at->translatedFormat('d F Y') }}
                            </p>
                        </div>
                    </div>
                    <div class="shrink-0">
                        <span class="inline-flex items-center gap-2 rounded-lg {{ $statusClasses }} px-4 py-2 text-sm font-semibold text-white ring-1">
                            <x-dynamic-component :component="$statusEnum->getIcon()" class="h-4 w-4" />
                            {{ $statusEnum->getLabel() }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- Peringatan: Data Tidak Bisa Diedit --}}
            <div class="ppdb-card p-4 border-l-4 border-amber-400 ppdb-slide-up ppdb-delay-1">
                <div class="flex items-start gap-3">
                    <div class="ppdb-icon-circle ppdb-icon-circle-amber shrink-0">
                        <x-heroicon-o-exclamation-triangle class="h-4 w-4" />
                    </div>
                    <div>
                        <p class="font-semibold text-slate-800 dark:text-white text-sm">Data Tidak Dapat Diubah</p>
                        <p class="mt-0.5 text-xs text-slate-500 dark:text-slate-400">
                            Data pendaftaran yang telah disubmit tidak dapat diedit kembali. Jika ada kesalahan data, silakan hubungi panitia PPDB.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Status Timeline --}}
            <div class="ppdb-card p-6 ppdb-slide-up ppdb-delay-2">
                <h3 class="text-sm font-semibold text-slate-800 dark:text-white mb-6">Progress Pendaftaran</h3>
                @php
                    $steps = [
                        ['key' => 'pending', 'label' => 'Terdaftar', 'icon' => 'heroicon-s-document-check'],
                        ['key' => 'verified', 'label' => 'Terverifikasi', 'icon' => 'heroicon-s-shield-check'],
                        ['key' => 'approved', 'label' => 'Diterima', 'icon' => 'heroicon-s-check-badge'],
                    ];
                    $statusOrder = ['pending' => 0, 'verified' => 1, 'approved' => 2];
                    $currentIdx = $statusOrder[$statusValue] ?? -1;
                    $isRejected = $statusValue === 'rejected';
                @endphp
                <div class="flex items-start justify-between">
                    @foreach ($steps as $i => $step)
                        <div class="ppdb-timeline-step">
                            @if ($i < count($steps) - 1)
                                <div class="ppdb-timeline-connector {{ $currentIdx > $i ? 'ppdb-timeline-connector-completed' : ($currentIdx == $i && !$isRejected ? 'ppdb-timeline-connector-active' : '') }}"></div>
                            @endif
                            <div class="ppdb-timeline-dot
                                {{ $isRejected && $currentIdx == $i ? 'ppdb-timeline-dot-rejected' : '' }}
                                {{ !$isRejected && $currentIdx > $i ? 'ppdb-timeline-dot-completed' : '' }}
                                {{ !$isRejected && $currentIdx == $i ? 'ppdb-timeline-dot-active' : '' }}
                                {{ $currentIdx < $i ? 'ppdb-timeline-dot-upcoming' : '' }}">
                                <x-dynamic-component :component="$step['icon']" class="h-5 w-5" />
                            </div>
                            <p class="mt-2 text-xs font-medium text-center {{ $currentIdx >= $i ? 'text-slate-800 dark:text-white' : 'text-slate-400' }}">
                                {{ $step['label'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
                @if ($isRejected)
                    <div class="mt-5 rounded-lg bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800/40 p-4 flex items-start gap-3">
                        <x-heroicon-s-exclamation-triangle class="h-5 w-5 text-rose-600 shrink-0 mt-0.5" />
                        <p class="text-sm text-rose-700 dark:text-rose-300">Pendaftaran Anda ditolak. Silakan periksa catatan panitia di bawah.</p>
                    </div>
                @endif
            </div>

            {{-- Admin Notes --}}
            @if ($registration->admin_notes)
                <div class="ppdb-card p-5 border-l-4 border-amber-400 ppdb-slide-up ppdb-delay-3">
                    <div class="flex items-start gap-3">
                        <div class="ppdb-icon-circle ppdb-icon-circle-amber shrink-0">
                            <x-heroicon-o-chat-bubble-left-ellipsis class="h-5 w-5" />
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-800 dark:text-white text-sm">Catatan Panitia</h4>
                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">{{ $registration->admin_notes }}</p>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Info Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                {{-- Student Detail --}}
                <div class="ppdb-card p-5 ppdb-slide-up ppdb-delay-3">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="ppdb-icon-circle ppdb-icon-circle-sky">
                            <x-heroicon-o-user class="h-5 w-5" />
                        </div>
                        <h4 class="font-semibold text-slate-800 dark:text-white text-sm">Data Pribadi</h4>
                    </div>
                    @if ($studentDetail)
                        <dl class="space-y-2 text-sm">
                            <div><dt class="text-slate-400 text-xs">NISN</dt><dd class="font-medium text-slate-700 dark:text-slate-200 font-mono">{{ $studentDetail->nisn }}</dd></div>
                            <div><dt class="text-slate-400 text-xs">Jenis Kelamin</dt><dd class="font-medium text-slate-700 dark:text-slate-200">{{ $studentDetail->gender === 'male' ? 'Laki-laki' : 'Perempuan' }}</dd></div>
                            <div><dt class="text-slate-400 text-xs">TTL</dt><dd class="font-medium text-slate-700 dark:text-slate-200">{{ $studentDetail->place_of_birth }}, {{ \Carbon\Carbon::parse($studentDetail->date_of_birth)->translatedFormat('d M Y') }}</dd></div>
                        </dl>
                    @else
                        <p class="text-xs text-slate-400 italic">Belum tersedia</p>
                    @endif
                </div>

                {{-- Parent Detail --}}
                <div class="ppdb-card p-5 ppdb-slide-up ppdb-delay-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="ppdb-icon-circle ppdb-icon-circle-emerald">
                            <x-heroicon-o-users class="h-5 w-5" />
                        </div>
                        <h4 class="font-semibold text-slate-800 dark:text-white text-sm">Data Orang Tua</h4>
                    </div>
                    @if ($parentDetail)
                        <dl class="space-y-2 text-sm">
                            <div><dt class="text-slate-400 text-xs">Ayah</dt><dd class="font-medium text-slate-700 dark:text-slate-200">{{ $parentDetail->father_name }}</dd></div>
                            <div><dt class="text-slate-400 text-xs">Ibu</dt><dd class="font-medium text-slate-700 dark:text-slate-200">{{ $parentDetail->mother_name }}</dd></div>
                            <div><dt class="text-slate-400 text-xs">Kontak</dt><dd class="font-medium text-slate-700 dark:text-slate-200 font-mono">{{ $parentDetail->guardian_phone }}</dd></div>
                        </dl>
                    @else
                        <p class="text-xs text-slate-400 italic">Belum tersedia</p>
                    @endif
                </div>

                {{-- School Origin --}}
                <div class="ppdb-card p-5 ppdb-slide-up ppdb-delay-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="ppdb-icon-circle ppdb-icon-circle-slate">
                            <x-heroicon-o-building-library class="h-5 w-5" />
                        </div>
                        <h4 class="font-semibold text-slate-800 dark:text-white text-sm">Sekolah Asal</h4>
                    </div>
                    @if ($schoolOrigin)
                        <dl class="space-y-2 text-sm">
                            <div><dt class="text-slate-400 text-xs">Sekolah</dt><dd class="font-medium text-slate-700 dark:text-slate-200">{{ $schoolOrigin->school_name }}</dd></div>
                            <div><dt class="text-slate-400 text-xs">NPSN</dt><dd class="font-medium text-slate-700 dark:text-slate-200 font-mono">{{ $schoolOrigin->npsn }}</dd></div>
                            <div><dt class="text-slate-400 text-xs">Tahun Lulus</dt><dd class="font-medium text-slate-700 dark:text-slate-200">{{ $schoolOrigin->graduation_year }}</dd></div>
                        </dl>
                    @else
                        <p class="text-xs text-slate-400 italic">Belum tersedia</p>
                    @endif
                </div>
            </div>

            {{-- Download Section --}}
            <div class="ppdb-card p-5 md:p-6 ppdb-slide-up ppdb-delay-5">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <div class="ppdb-icon-circle ppdb-icon-circle-rose">
                            <x-heroicon-o-document-arrow-down class="h-5 w-5" />
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-800 dark:text-white text-sm">Bukti Pendaftaran</h4>
                            <p class="text-xs text-slate-500">Download bukti pendaftaran resmi dalam format PDF</p>
                        </div>
                    </div>
                    @if (in_array($statusValue, ['verified', 'approved']))
                        <a href="#"
                           class="inline-flex items-center gap-2 rounded-lg bg-sky-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 transition-colors">
                            <x-heroicon-s-arrow-down-tray class="h-4 w-4" />
                            Download PDF
                        </a>
                    @else
                        <span class="inline-flex items-center gap-2 rounded-lg bg-slate-100 dark:bg-slate-800 px-5 py-2.5 text-sm font-medium text-slate-400 cursor-not-allowed">
                            <x-heroicon-s-lock-closed class="h-4 w-4" />
                            Belum Tersedia
                        </span>
                    @endif
                </div>
            </div>
        </div>
    @endif
</x-filament-panels::page>
