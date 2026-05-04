<?php

namespace App\Filament\Widgets;

use App\Enums\RegistrationStatus;
use App\Models\Registration;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected static ?string $pollingInterval = '30s';

    protected function getStats(): array
    {
        $total = Registration::count();
        $pending = Registration::where('status', RegistrationStatus::Pending)->count();
        $verified = Registration::where('status', RegistrationStatus::Verified)->count();
        $approved = Registration::where('status', RegistrationStatus::Approved)->count();
        $rejected = Registration::where('status', RegistrationStatus::Rejected)->count();

        $chartData = $this->getLast7DaysCounts();

        return [
            Stat::make('Total Pendaftar', number_format($total))
                ->description('Keseluruhan calon siswa')
                ->descriptionIcon('heroicon-m-users')
                ->chart($chartData['total'])
                ->color('primary'),

            Stat::make('Menunggu Verifikasi', number_format($pending + $verified))
                ->description($verified . ' sudah diverifikasi')
                ->descriptionIcon('heroicon-m-clock')
                ->chart($chartData['pending'])
                ->color('warning'),

            Stat::make('Diterima', number_format($approved))
                ->description($total > 0 ? round(($approved / $total) * 100, 1) . '% dari total' : '0% dari total')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart($chartData['approved'])
                ->color('success'),

            Stat::make('Ditolak', number_format($rejected))
                ->description($total > 0 ? round(($rejected / $total) * 100, 1) . '% dari total' : '0% dari total')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->chart($chartData['rejected'])
                ->color('danger'),
        ];
    }

    private function getLast7DaysCounts(): array
    {
        $result = ['total' => [], 'pending' => [], 'approved' => [], 'rejected' => []];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $dayRegistrations = Registration::whereDate('registered_at', $date);

            $result['total'][] = (clone $dayRegistrations)->count();
            $result['pending'][] = (clone $dayRegistrations)
                ->whereIn('status', [RegistrationStatus::Pending, RegistrationStatus::Verified])
                ->count();
            $result['approved'][] = (clone $dayRegistrations)
                ->where('status', RegistrationStatus::Approved)
                ->count();
            $result['rejected'][] = (clone $dayRegistrations)
                ->where('status', RegistrationStatus::Rejected)
                ->count();
        }

        return $result;
    }
}
