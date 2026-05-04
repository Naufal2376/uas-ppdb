<?php

namespace App\Filament\Resources\PpdbScheduleResource\Pages;

use App\Filament\Resources\PpdbScheduleResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePpdbSchedule extends CreateRecord
{
    protected static string $resource = PpdbScheduleResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
