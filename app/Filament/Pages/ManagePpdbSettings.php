<?php

namespace App\Filament\Pages;

use App\Models\PpdbSetting;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManagePpdbSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Pengaturan PPDB';

    protected static ?string $title = 'Pengaturan PPDB';

    protected static ?string $navigationGroup = 'Pengaturan';

    protected static ?int $navigationSort = 10;

    protected static string $view = 'filament.pages.manage-ppdb-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $setting = PpdbSetting::current();

        if ($setting) {
            $this->form->fill($setting->toArray());
        } else {
            $this->form->fill([
                'school_name' => 'SMA IT Global Academy',
                'ppdb_year' => date('Y') . '/' . (date('Y') + 1),
                'max_quota' => 100,
                'is_registration_open' => false,
            ]);
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Sekolah')
                    ->description('Data identitas sekolah')
                    ->schema([
                        Forms\Components\TextInput::make('school_name')
                            ->label('Nama Sekolah')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('ppdb_year')
                            ->label('Tahun Ajaran PPDB')
                            ->required()
                            ->placeholder('2026/2027'),
                        Forms\Components\Textarea::make('address')
                            ->label('Alamat Sekolah')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Periode Pendaftaran')
                    ->description('Atur periode buka-tutup pendaftaran')
                    ->schema([
                        Forms\Components\DatePicker::make('registration_start')
                            ->label('Tanggal Buka Pendaftaran')
                            ->displayFormat('d/m/Y'),
                        Forms\Components\DatePicker::make('registration_end')
                            ->label('Tanggal Tutup Pendaftaran')
                            ->displayFormat('d/m/Y')
                            ->afterOrEqual('registration_start'),
                        Forms\Components\TextInput::make('max_quota')
                            ->label('Kuota Maksimal Siswa')
                            ->numeric()
                            ->required()
                            ->minValue(1),
                        Forms\Components\Toggle::make('is_registration_open')
                            ->label('Pendaftaran Dibuka')
                            ->helperText('Aktifkan untuk membuka pendaftaran online bagi calon siswa.')
                            ->onColor('success')
                            ->offColor('danger'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Kontak')
                    ->description('Informasi kontak yang tampil untuk calon siswa')
                    ->schema([
                        Forms\Components\TextInput::make('contact_phone')
                            ->label('No. Telepon')
                            ->tel()
                            ->placeholder('08xx-xxxx-xxxx'),
                        Forms\Components\TextInput::make('contact_email')
                            ->label('Email')
                            ->email()
                            ->placeholder('ppdb@sekolah.sch.id'),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $setting = PpdbSetting::current();

        if ($setting) {
            $setting->update($data);
        } else {
            PpdbSetting::create($data);
        }

        Notification::make()
            ->title('Pengaturan berhasil disimpan')
            ->success()
            ->send();
    }
}
