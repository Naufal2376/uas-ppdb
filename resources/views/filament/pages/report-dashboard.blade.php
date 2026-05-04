<x-filament-panels::page>
    @php
        $data = $this->getReportData();
    @endphp

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Akun Siswa</p>
            <p class="mt-1 text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($data['total_students']) }}</p>
            <p class="mt-1 text-xs text-gray-400">Semua akun terdaftar</p>
        </div>

        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Pendaftaran</p>
            <p class="mt-1 text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($data['total_registrations']) }}</p>
            <p class="mt-1 text-xs text-gray-400">Yang sudah mengisi formulir</p>
        </div>

        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Tingkat Penerimaan</p>
            <p class="mt-1 text-3xl font-bold" style="color: #059669;">{{ $data['completion_rate'] }}%</p>
            <p class="mt-1 text-xs text-gray-400">Dari total pendaftar</p>
        </div>

        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Dokumen</p>
            <p class="mt-1 text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($data['total_documents']) }}</p>
            <p class="mt-1 text-xs text-gray-400">{{ $data['pending_documents'] }} menunggu verifikasi</p>
        </div>
    </div>

    {{-- Detail Status --}}
    <div class="mt-6 rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
            <h3 class="text-base font-semibold text-gray-900 dark:text-white">Rekap Status Pendaftaran</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Rincian jumlah pendaftar berdasarkan status</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 text-xs uppercase text-gray-500 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-center">Jumlah</th>
                        <th class="px-6 py-3 text-center">Persentase</th>
                        <th class="px-6 py-3">Progress</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @php
                        $statuses = [
                            ['label' => 'Menunggu Verifikasi', 'count' => $data['pending'], 'color' => '#f59e0b', 'bg' => 'bg-amber-100 text-amber-800'],
                            ['label' => 'Terverifikasi', 'count' => $data['verified'], 'color' => '#0284c7', 'bg' => 'bg-sky-100 text-sky-800'],
                            ['label' => 'Diterima', 'count' => $data['approved'], 'color' => '#059669', 'bg' => 'bg-emerald-100 text-emerald-800'],
                            ['label' => 'Ditolak', 'count' => $data['rejected'], 'color' => '#e11d48', 'bg' => 'bg-rose-100 text-rose-800'],
                        ];
                        $total = max($data['total_registrations'], 1);
                    @endphp

                    @foreach($statuses as $status)
                    <tr class="bg-white hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $status['bg'] }}">
                                {{ $status['label'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center font-semibold text-gray-900 dark:text-white">
                            {{ number_format($status['count']) }}
                        </td>
                        <td class="px-6 py-4 text-center text-gray-600 dark:text-gray-300">
                            {{ round(($status['count'] / $total) * 100, 1) }}%
                        </td>
                        <td class="px-6 py-4">
                            <div class="h-2 w-full rounded-full bg-gray-200 dark:bg-gray-600">
                                <div class="h-2 rounded-full" style="width: {{ ($status['count'] / $total) * 100 }}%; background-color: {{ $status['color'] }};"></div>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    <tr class="bg-gray-50 font-semibold dark:bg-gray-700">
                        <td class="px-6 py-4 text-gray-900 dark:text-white">Total</td>
                        <td class="px-6 py-4 text-center text-gray-900 dark:text-white">{{ number_format($data['total_registrations']) }}</td>
                        <td class="px-6 py-4 text-center text-gray-900 dark:text-white">100%</td>
                        <td class="px-6 py-4"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-filament-panels::page>
