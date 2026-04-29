<?php

namespace App\Filament\Student\Pages;

use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.student.pages.dashboard';
    
    protected static ?string $title = 'Dashboard Siswa';
    
    public function getTitle(): string|Htmlable
    {
        return 'Dashboard Siswa';
    }
}