<?php

namespace App\Filament\Widgets;

use App\Enums\RegistrationStatus;
use App\Models\Registration;
use Filament\Widgets\ChartWidget;

class RegistrationStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Distribusi Status Pendaftaran';

    protected static ?string $description = 'Proporsi status seluruh pendaftar';

    protected static ?int $sort = 3;

    protected static ?string $maxHeight = '300px';

    protected static ?string $pollingInterval = '60s';

    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        $pending = Registration::where('status', RegistrationStatus::Pending)->count();
        $verified = Registration::where('status', RegistrationStatus::Verified)->count();
        $approved = Registration::where('status', RegistrationStatus::Approved)->count();
        $rejected = Registration::where('status', RegistrationStatus::Rejected)->count();

        return [
            'datasets' => [
                [
                    'data' => [$pending, $verified, $approved, $rejected],
                    'backgroundColor' => [
                        '#f59e0b', // amber-500 (pending)
                        '#0284c7', // sky-600 (verified)
                        '#059669', // emerald-600 (approved)
                        '#e11d48', // rose-600 (rejected)
                    ],
                    'borderColor' => '#ffffff',
                    'borderWidth' => 3,
                    'hoverOffset' => 8,
                ],
            ],
            'labels' => ['Menunggu', 'Terverifikasi', 'Diterima', 'Ditolak'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                    'labels' => [
                        'usePointStyle' => true,
                        'pointStyle' => 'circle',
                        'padding' => 16,
                    ],
                ],
            ],
            'cutout' => '65%',
        ];
    }
}
