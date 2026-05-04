<?php

namespace App\Filament\Resources\VerificationResource\Pages;

use App\Enums\RegistrationStatus;
use App\Filament\Resources\VerificationResource;
use App\Models\Registration;
use Filament\Actions;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewVerification extends ViewRecord
{
    protected static string $resource = VerificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('verify')
                ->label('Verifikasi')
                ->icon('heroicon-o-check-circle')
                ->color('info')
                ->action(function (): void {
                    $this->record->update(['status' => RegistrationStatus::Verified]);
                    Notification::make()
                        ->title('Berhasil Diverifikasi')
                        ->success()
                        ->send();
                    $this->refreshFormData(['status']);
                })
                ->requiresConfirmation()
                ->modalHeading('Verifikasi Pendaftaran')
                ->modalDescription('Apakah Anda yakin ingin memverifikasi pendaftaran ini?')
                ->modalSubmitActionLabel('Ya, Verifikasi')
                ->visible(fn (): bool => $this->record->status === RegistrationStatus::Pending),

            Actions\Action::make('approve')
                ->label('Terima')
                ->icon('heroicon-o-hand-thumb-up')
                ->color('success')
                ->action(function (): void {
                    $this->record->update(['status' => RegistrationStatus::Approved]);
                    Notification::make()
                        ->title('Berhasil Diterima')
                        ->success()
                        ->send();
                    $this->refreshFormData(['status']);
                })
                ->requiresConfirmation()
                ->modalHeading('Terima Pendaftaran')
                ->modalDescription('Apakah Anda yakin ingin menerima pendaftaran ini?')
                ->modalSubmitActionLabel('Ya, Terima')
                ->visible(fn (): bool => $this->record->status === RegistrationStatus::Verified),

            Actions\Action::make('reject')
                ->label('Tolak')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->form([
                    Textarea::make('admin_notes')
                        ->label('Alasan Penolakan')
                        ->helperText('Jelaskan alasan penolakan agar siswa dapat memperbaiki.')
                        ->required()
                        ->rows(3),
                ])
                ->action(function (array $data): void {
                    $this->record->update([
                        'status' => RegistrationStatus::Rejected,
                        'admin_notes' => $data['admin_notes'],
                    ]);
                    Notification::make()
                        ->title('Pendaftaran Ditolak')
                        ->danger()
                        ->send();
                    $this->refreshFormData(['status', 'admin_notes']);
                })
                ->modalHeading('Tolak Pendaftaran')
                ->modalSubmitActionLabel('Ya, Tolak')
                ->visible(fn (): bool => in_array($this->record->status, [RegistrationStatus::Pending, RegistrationStatus::Verified])),
        ];
    }
}
