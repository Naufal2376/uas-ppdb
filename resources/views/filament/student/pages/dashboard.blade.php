<x-filament-panels::page>
    @php
        $user = auth()->user();
        $registration = $user->registration;
    @endphp

    @if (! $registration)
        <div class="rounded-xl bg-white p-8 text-center shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
            <x-heroicon-o-academic-cap class="mx-auto h-12 w-12 text-primary-600" />
            <h2 class="mt-4 text-xl font-semibold tracking-tight text-gray-950 dark:text-white">
                Selamat Datang di Portal PPDB
            </h2>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                Langkah pertama Anda adalah melengkapi formulir pendaftaran dan mengunggah berkas yang diperlukan.
            </p>
            <div class="mt-6">
                <x-filament::button
                    tag="a"
                    href="{{ \App\Filament\Student\Pages\RegistrationWizard::getUrl() }}"
                    color="primary"
                >
                    Mulai Pendaftaran Sekarang
                </x-filament::button>
            </div>
        </div>
    @else
        <div class="flex flex-col gap-6">
            <x-filament::section>
                <x-slot name="heading">
                    Status Pendaftaran Anda
                </x-slot>

                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Nomor Pendaftaran</p>
                        <p class="text-2xl font-bold font-mono text-gray-900 dark:text-white">{{ $registration->registration_number }}</p>
                    </div>
                    
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-500">Status Terkini</p>
                        <div class="mt-1">
                            @if ($registration->status === 'approved')
                                <x-filament::badge color="success" size="lg">
                                    Disetujui
                                </x-filament::badge>
                            @elseif ($registration->status === 'verified')
                                <x-filament::badge color="primary" size="lg">
                                    Lolos Verifikasi
                                </x-filament::badge>
                            @elseif ($registration->status === 'rejected')
                                <x-filament::badge color="danger" size="lg">
                                    Ditolak
                                </x-filament::badge>
                            @else
                                <x-filament::badge color="warning" size="lg">
                                    Menunggu Verifikasi
                                </x-filament::badge>
                            @endif
                        </div>
                    </div>
                </div>

                @if ($registration->admin_notes)
                    <div class="mt-4 rounded-lg bg-gray-50 p-4 dark:bg-gray-800">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Catatan Panitia:</p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $registration->admin_notes }}</p>
                    </div>
                @endif
            </x-filament::section>

            <x-filament::section>
                <x-slot name="heading">
                    Unduh Bukti
                </x-slot>
                
                <p class="text-sm text-gray-500 mb-4">
                    Anda dapat mengunduh bukti pendaftaran jika status Anda telah lolos verifikasi atau disetujui.
                </p>

                @if (in_array($registration->status, ['verified', 'approved']))
                    <x-filament::button
                        tag="a"
                        href="{{ route('student.download-proof') }}" 
                        icon="heroicon-m-arrow-down-tray"
                    >
                        Download Bukti Pendaftaran (PDF)
                    </x-filament::button>
                @else
                    <x-filament::button
                        disabled
                        color="gray"
                        icon="heroicon-m-lock-closed"
                    >
                        Dokumen Belum Tersedia
                    </x-filament::button>
                @endif
            </x-filament::section>
        </div>
    @endif
</x-filament-panels::page>