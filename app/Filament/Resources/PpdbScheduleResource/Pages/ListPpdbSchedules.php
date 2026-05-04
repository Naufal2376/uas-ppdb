<?php

namespace App\Filament\Resources\PpdbScheduleResource\Pages;

use App\Filament\Resources\PpdbScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPpdbSchedules extends ListRecords
{
    protected static string $resource = PpdbScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Jadwal'),
        ];
    }
}
