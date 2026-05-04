<?php

namespace App\Filament\Student\Pages;

use App\Models\Registration;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.student.pages.dashboard';

    protected static ?string $title = 'Dashboard Siswa';

    public $registration;

    public $user;

    public $studentDetail;

    public $parentDetail;

    public $schoolOrigin;

    public $documentCount;

    public function mount()
    {
        $this->user = Auth::user();
        // Ambil data registrasi milik user yang sedang login
        $this->registration = Registration::where('user_id', Auth::id())->first();
        $this->studentDetail = $this->user->studentDetail;
        $this->parentDetail = $this->user->parentDetail;
        $this->schoolOrigin = $this->user->schoolOrigin;
        $this->documentCount = $this->user->documents()->count();
    }
}
