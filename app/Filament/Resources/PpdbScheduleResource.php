<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PpdbScheduleResource\Pages;
use App\Models\PpdbSchedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PpdbScheduleResource extends Resource
{
    protected static ?string $model = PpdbSchedule::class;

    protected static ?string $modelLabel = 'Jadwal';

    protected static ?string $pluralModelLabel = 'Jadwal PPDB';

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Informasi';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detail Kegiatan')
                    ->schema([
                        Forms\Components\TextInput::make('activity_name')
                            ->label('Nama Kegiatan')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Pendaftaran Online'),
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->placeholder('Deskripsi singkat kegiatan...'),
                    ]),

                Forms\Components\Section::make('Waktu Pelaksanaan')
                    ->schema([
                        Forms\Components\DatePicker::make('start_date')
                            ->label('Tanggal Mulai')
                            ->required()
                            ->displayFormat('d/m/Y'),
                        Forms\Components\DatePicker::make('end_date')
                            ->label('Tanggal Selesai')
                            ->required()
                            ->displayFormat('d/m/Y')
                            ->afterOrEqual('start_date'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->helperText('Tandai apakah kegiatan ini masih berlangsung.')
                            ->default(true),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan Tampil')
                            ->numeric()
                            ->default(0)
                            ->helperText('Angka kecil tampil lebih dulu.'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('#')
                    ->sortable()
                    ->width('50px'),

                Tables\Columns\TextColumn::make('activity_name')
                    ->label('Kegiatan')
                    ->weight('bold')
                    ->searchable()
                    ->description(fn (PpdbSchedule $record): ?string => $record->description ? \Illuminate\Support\Str::limit($record->description, 60) : null),

                Tables\Columns\TextColumn::make('start_date')
                    ->label('Mulai')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('end_date')
                    ->label('Selesai')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean()
                    ->trueColor('success')
                    ->falseColor('gray'),
            ])
            ->defaultSort('sort_order', 'asc')
            ->reorderable('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif')
                    ->trueLabel('Aktif')
                    ->falseLabel('Nonaktif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Belum Ada Jadwal')
            ->emptyStateDescription('Tambahkan jadwal kegiatan PPDB untuk ditampilkan ke calon siswa.')
            ->emptyStateIcon('heroicon-o-calendar-days')
            ->striped();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPpdbSchedules::route('/'),
            'create' => Pages\CreatePpdbSchedule::route('/create'),
            'edit' => Pages\EditPpdbSchedule::route('/{record}/edit'),
        ];
    }
}
