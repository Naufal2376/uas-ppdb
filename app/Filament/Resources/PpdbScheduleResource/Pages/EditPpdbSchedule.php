<?php

namespace App\Filament\Resources\PpdbScheduleResource\Pages;

use App\Filament\Resources\PpdbScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPpdbSchedule extends EditRecord
{
    protected static string $resource = PpdbScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
