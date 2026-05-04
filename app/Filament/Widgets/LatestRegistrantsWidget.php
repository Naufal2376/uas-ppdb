<?php

namespace App\Filament\Widgets;

use App\Enums\RegistrationStatus;
use App\Models\Registration;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestRegistrantsWidget extends BaseWidget
{
    protected static ?int $sort = 5;

    protected static ?string $heading = 'Pendaftar Terbaru';

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Registration::query()
                    ->with('user')
                    ->latest('registered_at')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('registration_number')
                    ->label('No. Pendaftaran')
                    ->badge()
                    ->color('primary')
                    ->searchable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Siswa')
                    ->weight('bold')
                    ->description(fn (Registration $record): string => $record->user?->email ?? '-'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (RegistrationStatus $state): string => $state->getColor())
                    ->formatStateUsing(fn (RegistrationStatus $state): string => $state->getLabel()),

                Tables\Columns\TextColumn::make('registered_at')
                    ->label('Tanggal Daftar')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->paginated(false)
            ->defaultSort('registered_at', 'desc');
    }
}
