<?php

namespace App\Filament\Resources;

use App\Enums\DocumentStatus;
use App\Enums\DocumentType;
use App\Enums\Gender;
use App\Enums\RegistrationStatus;
use App\Filament\Resources\VerificationResource\Pages;
use App\Models\Registration;
use Filament\Forms\Components\Textarea;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class VerificationResource extends Resource
{
    protected static ?string $model = Registration::class;

    protected static ?string $modelLabel = 'Verifikasi';

    protected static ?string $pluralModelLabel = 'Verifikasi Pendaftaran';

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    protected static ?string $navigationGroup = 'Pendaftaran';

    protected static ?int $navigationSort = 2;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['user.studentDetail', 'user.parentDetail', 'user.schoolOrigin', 'user.documents']);
    }

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Informasi Pendaftaran')
                    ->schema([
                        Infolists\Components\TextEntry::make('registration_number')
                            ->label('No. Pendaftaran')
                            ->badge()
                            ->color('primary')
                            ->copyable(),
                        Infolists\Components\TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->color(fn ($state): ?string => $state instanceof RegistrationStatus ? $state->getColor() : 'gray')
                            ->formatStateUsing(fn ($state): string => $state instanceof RegistrationStatus ? $state->getLabel() : '-'),
                        Infolists\Components\TextEntry::make('registered_at')
                            ->label('Tanggal Daftar')
                            ->dateTime('d F Y, H:i'),
                        Infolists\Components\TextEntry::make('admin_notes')
                            ->label('Catatan Admin')
                            ->placeholder('Tidak ada catatan')
                            ->columnSpanFull(),
                    ])
                    ->columns(3),

                Infolists\Components\Section::make('Data Pribadi Siswa')
                    ->schema([
                        Infolists\Components\TextEntry::make('user.name')
                            ->label('Nama Lengkap')
                            ->weight('bold'),
                        Infolists\Components\TextEntry::make('user.email')
                            ->label('Email')
                            ->copyable(),
                        Infolists\Components\TextEntry::make('user.studentDetail.nisn')
                            ->label('NISN')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('user.studentDetail.nik')
                            ->label('NIK')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('user.studentDetail.place_of_birth')
                            ->label('Tempat Lahir')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('user.studentDetail.date_of_birth')
                            ->label('Tanggal Lahir')
                            ->date('d F Y')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('user.studentDetail.gender')
                            ->label('Jenis Kelamin')
                            ->formatStateUsing(fn ($state): string => $state instanceof Gender ? $state->getLabel() : '-')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('user.studentDetail.phone_number')
                            ->label('No. Telepon')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('user.studentDetail.address')
                            ->label('Alamat')
                            ->columnSpanFull()
                            ->placeholder('Belum diisi'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Infolists\Components\Section::make('Data Orang Tua / Wali')
                    ->schema([
                        Infolists\Components\TextEntry::make('user.parentDetail.father_name')
                            ->label('Nama Ayah')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('user.parentDetail.father_occupation')
                            ->label('Pekerjaan Ayah')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('user.parentDetail.father_income')
                            ->label('Penghasilan Ayah')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('user.parentDetail.mother_name')
                            ->label('Nama Ibu')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('user.parentDetail.mother_occupation')
                            ->label('Pekerjaan Ibu')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('user.parentDetail.mother_income')
                            ->label('Penghasilan Ibu')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('user.parentDetail.guardian_phone')
                            ->label('No. HP Wali')
                            ->placeholder('Belum diisi'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Infolists\Components\Section::make('Asal Sekolah')
                    ->schema([
                        Infolists\Components\TextEntry::make('user.schoolOrigin.school_name')
                            ->label('Nama Sekolah')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('user.schoolOrigin.npsn')
                            ->label('NPSN')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('user.schoolOrigin.graduation_year')
                            ->label('Tahun Lulus')
                            ->placeholder('Belum diisi'),
                    ])
                    ->columns(3)
                    ->collapsible(),

                Infolists\Components\Section::make('Dokumen Pendaftaran')
                    ->schema([
                        Infolists\Components\RepeatableEntry::make('user.documents')
                            ->label('')
                            ->schema([
                                Infolists\Components\TextEntry::make('document_type')
                                    ->label('Tipe')
                                    ->badge()
                                    ->color('primary')
                                    ->formatStateUsing(fn ($state): string => $state instanceof DocumentType ? $state->getLabel() : $state),
                                Infolists\Components\ImageEntry::make('file_path')
                                    ->label('Preview')
                                    ->disk('public')
                                    ->height(120)
                                    ->width(120),
                                Infolists\Components\TextEntry::make('status')
                                    ->label('Status')
                                    ->badge()
                                    ->color(fn ($state): string => match (true) {
                                        $state === DocumentStatus::Pending => 'warning',
                                        $state === DocumentStatus::Approved => 'success',
                                        $state === DocumentStatus::Rejected => 'danger',
                                        default => 'gray',
                                    })
                                    ->formatStateUsing(fn ($state): string => $state instanceof DocumentStatus ? $state->getLabel() : '-'),
                                Infolists\Components\TextEntry::make('notes')
                                    ->label('Catatan')
                                    ->placeholder('—'),
                            ])
                            ->columns(4),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('registration_number')
                    ->label('No. Pendaftaran')
                    ->searchable()
                    ->badge()
                    ->color('primary')
                    ->copyable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Siswa')
                    ->weight('bold')
                    ->description(fn (Registration $record): string => $record->user?->email ?? '-')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (RegistrationStatus $state): string => $state->getColor())
                    ->formatStateUsing(fn (RegistrationStatus $state): string => $state->getLabel()),

                Tables\Columns\TextColumn::make('documents_count')
                    ->label('Dokumen')
                    ->getStateUsing(fn (Registration $record): string => $record->user?->documents?->count() ?? 0)
                    ->suffix(' file')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('registered_at')
                    ->label('Tgl. Daftar')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('admin_notes')
                    ->label('Catatan')
                    ->limit(25)
                    ->tooltip(fn ($record) => $record?->admin_notes)
                    ->placeholder('—')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('registered_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status Pendaftaran')
                    ->options([
                        RegistrationStatus::Pending->value => 'Menunggu Verifikasi',
                        RegistrationStatus::Verified->value => 'Terverifikasi',
                        RegistrationStatus::Approved->value => 'Disetujui',
                        RegistrationStatus::Rejected->value => 'Ditolak',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Detail'),

                Action::make('verify')
                    ->label('Verifikasi')
                    ->icon('heroicon-o-check-circle')
                    ->color('info')
                    ->action(function (Registration $record): void {
                        $record->update(['status' => RegistrationStatus::Verified]);
                        Notification::make()
                            ->title('Berhasil Diverifikasi')
                            ->body('Pendaftaran ' . $record->registration_number . ' telah diverifikasi.')
                            ->success()
                            ->send();
                    })
                    ->requiresConfirmation()
                    ->modalHeading('Verifikasi Pendaftaran')
                    ->modalDescription('Apakah Anda yakin ingin memverifikasi pendaftaran ini?')
                    ->modalSubmitActionLabel('Ya, Verifikasi')
                    ->visible(fn (Registration $record): bool => $record->status === RegistrationStatus::Pending),

                Action::make('approve')
                    ->label('Terima')
                    ->icon('heroicon-o-hand-thumb-up')
                    ->color('success')
                    ->action(function (Registration $record): void {
                        $record->update(['status' => RegistrationStatus::Approved]);
                        Notification::make()
                            ->title('Berhasil Diterima')
                            ->success()
                            ->send();
                    })
                    ->requiresConfirmation()
                    ->modalHeading('Terima Pendaftaran')
                    ->modalDescription('Apakah Anda yakin ingin menerima pendaftaran ini?')
                    ->modalSubmitActionLabel('Ya, Terima')
                    ->visible(fn (Registration $record): bool => $record->status === RegistrationStatus::Verified),

                Action::make('reject')
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
                    ->action(function (array $data, Registration $record): void {
                        $record->update([
                            'status' => RegistrationStatus::Rejected,
                            'admin_notes' => $data['admin_notes'],
                        ]);
                        Notification::make()
                            ->title('Pendaftaran Ditolak')
                            ->danger()
                            ->send();
                    })
                    ->modalHeading('Tolak Pendaftaran')
                    ->modalSubmitActionLabel('Ya, Tolak')
                    ->visible(fn (Registration $record): bool => in_array($record->status, [RegistrationStatus::Pending, RegistrationStatus::Verified])),
            ])
            ->bulkActions([])
            ->emptyStateHeading('Belum Ada Pendaftaran')
            ->emptyStateDescription('Data pendaftaran yang masuk akan ditampilkan di sini untuk diverifikasi.')
            ->emptyStateIcon('heroicon-o-check-badge')
            ->striped();
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVerifications::route('/'),
            'view' => Pages\ViewVerification::route('/{record}'),
        ];
    }
}
