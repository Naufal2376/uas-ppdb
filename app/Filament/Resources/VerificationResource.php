<?php

namespace App\Filament\Resources;

use App\Enums\RegistrationStatus;
use App\Filament\Resources\VerificationResource\Pages;
use App\Filament\Resources\VerificationResource\RelationManagers;
use App\Models\Registration;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VerificationResource extends Resource
{
    protected static ?string $model = Registration::class;
    
    protected static ?string $modelLabel = 'Verifikasi';
    
    protected static ?string $pluralModelLabel = 'Verifikasi Pendaftaran';

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Readonly details or action modals logic is preferred
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('registration_number')
                    ->label('No. Pendaftaran')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Siswa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (RegistrationStatus $state): string => match ($state) {
                        RegistrationStatus::Pending => 'warning',
                        RegistrationStatus::Verified => 'primary',
                        RegistrationStatus::Approved => 'success',
                        RegistrationStatus::Rejected => 'danger',
                    })
                    ->formatStateUsing(fn (RegistrationStatus $state) => ucfirst($state->value)),
                Tables\Columns\TextColumn::make('registered_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        RegistrationStatus::Pending->value => 'Menunggu Verifikasi',
                        RegistrationStatus::Verified->value => 'Terverifikasi',
                        RegistrationStatus::Approved->value => 'Disetujui',
                        RegistrationStatus::Rejected->value => 'Ditolak',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat Dokumen & Biodata'),
                    
                Action::make('verify')
                    ->label('Verifikasi')
                    ->icon('heroicon-o-check-circle')
                    ->color('primary')
                    ->action(fn (Registration $record) => $record->update(['status' => RegistrationStatus::Verified]))
                    ->requiresConfirmation()
                    ->visible(fn (Registration $record): bool => $record->status === RegistrationStatus::Pending),

                Action::make('approve')
                    ->label('Setujui')
                    ->icon('heroicon-o-hand-thumb-up')
                    ->color('success')
                    ->action(fn (Registration $record) => $record->update(['status' => RegistrationStatus::Approved]))
                    ->requiresConfirmation()
                    ->visible(fn (Registration $record): bool => $record->status === RegistrationStatus::Verified),

                Action::make('reject')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->form([
                        Textarea::make('admin_notes')
                            ->label('Alasan Penolakan')
                            ->required(),
                    ])
                    ->action(function (array $data, Registration $record): void {
                        $record->update([
                            'status' => RegistrationStatus::Rejected,
                            'admin_notes' => $data['admin_notes'],
                        ]);
                    })
                    ->visible(fn (Registration $record): bool => in_array($record->status, [RegistrationStatus::Pending, RegistrationStatus::Verified])),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVerifications::route('/'),
            'create' => Pages\CreateVerification::route('/create'),
            'edit' => Pages\EditVerification::route('/{record}/edit'),
        ];
    }
}
