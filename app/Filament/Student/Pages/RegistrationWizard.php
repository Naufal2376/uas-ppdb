<?php

namespace App\Filament\Student\Pages;

use App\Models\Document;
use App\Models\ParentDetail;
use App\Models\Registration;
use App\Models\SchoolOrigin;
use App\Models\StudentDetail;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;
use App\Enums\Gender;

class RegistrationWizard extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Pendaftaran PPDB';
    
    protected static ?string $title = 'Formulir Pendaftaran Siswa Baru';

    protected static ?string $slug = 'pendaftaran';

    protected static string $view = 'filament.student.pages.registration-wizard';

    public ?array $data = [];

    public function mount(): void
    {
        $user = auth()->user();
        
        // If already registered
        if ($user->registration) {
            $this->redirect(Dashboard::getUrl());
            return;
        }

        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Step::make('Data Pribadi')
                        ->description('Informasi calon siswa')
                        ->schema([
                            TextInput::make('nisn')
                                ->label('NISN')
                                ->required()
                                ->numeric()
                                ->maxLength(10),
                            TextInput::make('nik')
                                ->label('NIK')
                                ->required()
                                ->numeric()
                                ->maxLength(16),
                            TextInput::make('place_of_birth')
                                ->label('Tempat Lahir')
                                ->required(),
                            TextInput::make('date_of_birth')
                                ->label('Tanggal Lahir')
                                ->type('date')
                                ->required(),
                            Select::make('gender')
                                ->label('Jenis Kelamin')
                                ->options([
                                    'male' => 'Laki-laki',
                                    'female' => 'Perempuan',
                                ])
                                ->required(),
                            TextInput::make('address')
                                ->label('Alamat Lengkap')
                                ->required(),
                            TextInput::make('phone_number')
                                ->label('No. Telepon / HP')
                                ->required()
                                ->tel(),
                        ]),

                    Step::make('Data Orang Tua')
                        ->description('Informasi orang tua / wali')
                        ->schema([
                            TextInput::make('father_name')
                                ->label('Nama Ayah')
                                ->required(),
                            TextInput::make('father_occupation')
                                ->label('Pekerjaan Ayah')
                                ->required(),
                            TextInput::make('father_income')
                                ->label('Penghasilan Ayah (Rp)')
                                ->numeric()
                                ->prefix('Rp')
                                ->required(),
                            TextInput::make('mother_name')
                                ->label('Nama Ibu')
                                ->required(),
                            TextInput::make('mother_occupation')
                                ->label('Pekerjaan Ibu')
                                ->required(),
                            TextInput::make('mother_income')
                                ->label('Penghasilan Ibu (Rp)')
                                ->numeric()
                                ->prefix('Rp')
                                ->required(),
                            TextInput::make('guardian_phone')
                                ->label('No. HP Orang Tua / Wali')
                                ->tel()
                                ->required(),
                        ]),

                    Step::make('Asal Sekolah')
                        ->description('Informasi sekolah asal')
                        ->schema([
                            TextInput::make('school_name')
                                ->label('Nama Sekolah Asal')
                                ->required(),
                            TextInput::make('npsn')
                                ->label('NPSN Sekolah')
                                ->required()
                                ->numeric(),
                            TextInput::make('graduation_year')
                                ->label('Tahun Lulus')
                                ->required()
                                ->numeric()
                                ->minValue(2000)
                                ->maxValue(now()->addYear()->year),
                        ]),

                    Step::make('Upload Dokumen')
                        ->description('Unggah berkas persyaratan')
                        ->schema([
                            FileUpload::make('foto')
                                ->label('Pas Foto 3x4')
                                ->image()
                                ->directory('documents/fotos')
                                ->required()
                                ->maxSize(2048),
                            FileUpload::make('kk')
                                ->label('Kartu Keluarga (KK)')
                                ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                                ->directory('documents/kks')
                                ->required()
                                ->maxSize(2048),
                            FileUpload::make('ijazah')
                                ->label('Ijazah / SKL')
                                ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                                ->directory('documents/ijazahs')
                                ->required()
                                ->maxSize(2048),
                            FileUpload::make('akta')
                                ->label('Akta Kelahiran')
                                ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                                ->directory('documents/aktas')
                                ->required()
                                ->maxSize(2048),
                        ]),
                ])
                ->submitAction(new \Illuminate\Support\HtmlString(\Illuminate\Support\Facades\Blade::render(<<<'BLADE'
                    <x-filament::button
                        type="submit"
                        size="sm"
                        wire:click="submit"
                    >
                        Submit Pendaftaran
                    </x-filament::button>
                BLADE)))
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $state = $this->form->getState();
        $user = auth()->user();

        DB::transaction(function () use ($state, $user) {
            // Student Detail
            StudentDetail::create([
                'user_id' => $user->id,
                'nisn' => $state['nisn'],
                'nik' => $state['nik'],
                'place_of_birth' => $state['place_of_birth'],
                'date_of_birth' => $state['date_of_birth'],
                'gender' => $state['gender'],
                'address' => $state['address'],
                'phone_number' => $state['phone_number'],
            ]);

            // Parent Detail
            ParentDetail::create([
                'user_id' => $user->id,
                'father_name' => $state['father_name'],
                'father_occupation' => $state['father_occupation'],
                'father_income' => $state['father_income'],
                'mother_name' => $state['mother_name'],
                'mother_occupation' => $state['mother_occupation'],
                'mother_income' => $state['mother_income'],
                'guardian_phone' => $state['guardian_phone'],
            ]);

            // School Origin
            SchoolOrigin::create([
                'user_id' => $user->id,
                'school_name' => $state['school_name'],
                'npsn' => $state['npsn'],
                'graduation_year' => $state['graduation_year'],
            ]);

            // Documents
            $docTypes = ['foto', 'kk', 'ijazah', 'akta'];
            foreach ($docTypes as $type) {
                if (isset($state[$type])) {
                    Document::create([
                        'user_id' => $user->id,
                        'document_type' => $type,
                        'file_path' => is_array($state[$type]) ? array_values($state[$type])[0] : $state[$type],
                        'status' => 'pending',
                    ]);
                }
            }

            // Create Registration mapping
            Registration::create([
                'user_id' => $user->id,
                'registration_number' => 'REG-' . date('Y') . '-' . str_pad((string)$user->id, 4, '0', STR_PAD_LEFT),
                'status' => 'pending',
            ]);
        });

        Notification::make()
            ->title('Pendaftaran Berhasil!')
            ->success()
            ->body('Data pendaftaran Anda telah berhasil disubmit. Silahkan menunggu proses verifikasi.')
            ->send();

        $this->redirect(Dashboard::getUrl());
    }
}