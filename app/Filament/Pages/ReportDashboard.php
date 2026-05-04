<?php

namespace App\Filament\Pages;

use App\Enums\RegistrationStatus;
use App\Enums\UserRole;
use App\Models\Document;
use App\Models\Registration;
use App\Models\User;
use Filament\Pages\Page;

class ReportDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationLabel = 'Laporan & Rekap';

    protected static ?string $title = 'Laporan & Rekap Data';

    protected static ?string $navigationGroup = 'Laporan';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.report-dashboard';

    public function getReportData(): array
    {
        $totalStudents = User::where('role', UserRole::Student)->count();
        $totalRegistrations = Registration::count();
        $pending = Registration::where('status', RegistrationStatus::Pending)->count();
        $verified = Registration::where('status', RegistrationStatus::Verified)->count();
        $approved = Registration::where('status', RegistrationStatus::Approved)->count();
        $rejected = Registration::where('status', RegistrationStatus::Rejected)->count();
        $totalDocuments = Document::count();
        $pendingDocuments = Document::where('status', 'pending')->count();

        return [
            'total_students' => $totalStudents,
            'total_registrations' => $totalRegistrations,
            'pending' => $pending,
            'verified' => $verified,
            'approved' => $approved,
            'rejected' => $rejected,
            'total_documents' => $totalDocuments,
            'pending_documents' => $pendingDocuments,
            'completion_rate' => $totalRegistrations > 0
                ? round(($approved / $totalRegistrations) * 100, 1)
                : 0,
        ];
    }
}
