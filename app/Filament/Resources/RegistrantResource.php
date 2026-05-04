<?php

namespace App\Filament\Resources;

use App\Enums\Gender;
use App\Enums\RegistrationStatus;
use App\Enums\UserRole;
use App\Filament\Resources\RegistrantResource\Pages;
use App\Filament\Resources\RegistrantResource\RelationManagers;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class RegistrantResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $modelLabel = 'Calon Siswa';

    protected static ?string $pluralModelLabel = 'Data Calon Siswa';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Pendaftaran';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('role', UserRole::Student)
            ->with(['registration', 'studentDetail']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Akun')
                    ->description('Data akun pendaftar')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Informasi Akun')
                    ->schema([
                        Infolists\Components\TextEntry::make('name')
                            ->label('Nama Lengkap')
                            ->weight('bold'),
                        Infolists\Components\TextEntry::make('email')
                            ->label('Email')
                            ->copyable(),
                        Infolists\Components\TextEntry::make('registration.registration_number')
                            ->label('No. Pendaftaran')
                            ->badge()
                            ->color('primary'),
                        Infolists\Components\TextEntry::make('registration.status')
                            ->label('Status Pendaftaran')
                            ->badge()
                            ->color(fn ($state): ?string => $state instanceof RegistrationStatus ? $state->getColor() : 'gray')
                            ->formatStateUsing(fn ($state): string => $state instanceof RegistrationStatus ? $state->getLabel() : '-'),
                    ])
                    ->columns(2),

                Infolists\Components\Section::make('Data Pribadi')
                    ->schema([
                        Infolists\Components\TextEntry::make('studentDetail.nisn')
                            ->label('NISN')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('studentDetail.nik')
                            ->label('NIK')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('studentDetail.place_of_birth')
                            ->label('Tempat Lahir')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('studentDetail.date_of_birth')
                            ->label('Tanggal Lahir')
                            ->date('d F Y')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('studentDetail.gender')
                            ->label('Jenis Kelamin')
                            ->formatStateUsing(fn ($state): string => $state instanceof Gender ? $state->getLabel() : '-')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('studentDetail.phone_number')
                            ->label('No. Telepon')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('studentDetail.address')
                            ->label('Alamat')
                            ->columnSpanFull()
                            ->placeholder('Belum diisi'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Infolists\Components\Section::make('Data Orang Tua / Wali')
                    ->schema([
                        Infolists\Components\TextEntry::make('parentDetail.father_name')
                            ->label('Nama Ayah')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('parentDetail.father_occupation')
                            ->label('Pekerjaan Ayah')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('parentDetail.father_income')
                            ->label('Penghasilan Ayah')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('parentDetail.mother_name')
                            ->label('Nama Ibu')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('parentDetail.mother_occupation')
                            ->label('Pekerjaan Ibu')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('parentDetail.mother_income')
                            ->label('Penghasilan Ibu')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('parentDetail.guardian_phone')
                            ->label('No. HP Wali')
                            ->placeholder('Belum diisi'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Infolists\Components\Section::make('Asal Sekolah')
                    ->schema([
                        Infolists\Components\TextEntry::make('schoolOrigin.school_name')
                            ->label('Nama Sekolah')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('schoolOrigin.npsn')
                            ->label('NPSN')
                            ->placeholder('Belum diisi'),
                        Infolists\Components\TextEntry::make('schoolOrigin.graduation_year')
                            ->label('Tahun Lulus')
                            ->placeholder('Belum diisi'),
                    ])
                    ->columns(3)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Siswa')
                    ->weight('bold')
                    ->description(fn (User $record): string => $record->email)
                    ->searchable(['name', 'email']),

                Tables\Columns\TextColumn::make('registration.registration_number')
                    ->label('No. Pendaftaran')
                    ->searchable()
                    ->badge()
                    ->color('primary')
                    ->copyable()
                    ->placeholder('Belum mendaftar'),

                Tables\Columns\TextColumn::make('registration.status')
                    ->label('Status')
                    ->badge()
                    ->color(fn ($state): string => match (true) {
                        $state === RegistrationStatus::Pending => 'warning',
                        $state === RegistrationStatus::Verified => 'info',
                        $state === RegistrationStatus::Approved => 'success',
                        $state === RegistrationStatus::Rejected => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn ($state): string => $state instanceof RegistrationStatus ? $state->getLabel() : '-'),

                Tables\Columns\TextColumn::make('studentDetail.gender')
                    ->label('L/P')
                    ->badge()
                    ->formatStateUsing(fn ($state): string => $state instanceof Gender ? $state->getLabel() : '-')
                    ->color('gray')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('registration.registered_at')
                    ->label('Tgl. Daftar')
                    ->date('d M Y')
                    ->sortable()
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('registration_status')
                    ->label('Status Pendaftaran')
                    ->options([
                        RegistrationStatus::Pending->value => 'Menunggu',
                        RegistrationStatus::Verified->value => 'Terverifikasi',
                        RegistrationStatus::Approved->value => 'Diterima',
                        RegistrationStatus::Rejected->value => 'Ditolak',
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['value'],
                            fn (Builder $query, string $status): Builder => $query->whereHas(
                                'registration',
                                fn (Builder $q) => $q->where('status', $status)
                            )
                        );
                    }),

                Tables\Filters\SelectFilter::make('gender')
                    ->label('Jenis Kelamin')
                    ->options([
                        Gender::Male->value => 'Laki-laki',
                        Gender::Female->value => 'Perempuan',
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['value'],
                            fn (Builder $query, string $gender): Builder => $query->whereHas(
                                'studentDetail',
                                fn (Builder $q) => $q->where('gender', $gender)
                            )
                        );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make()
                        ->label('Export ke Excel'),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Belum Ada Pendaftar')
            ->emptyStateDescription('Calon siswa yang mendaftar akan tampil di sini.')
            ->emptyStateIcon('heroicon-o-users')
            ->striped();
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\StudentDetailRelationManager::class,
            RelationManagers\ParentDetailRelationManager::class,
            RelationManagers\SchoolOriginRelationManager::class,
            RelationManagers\DocumentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegistrants::route('/'),
            'view' => Pages\ViewRegistrant::route('/{record}'),
            'edit' => Pages\EditRegistrant::route('/{record}/edit'),
        ];
    }
}
