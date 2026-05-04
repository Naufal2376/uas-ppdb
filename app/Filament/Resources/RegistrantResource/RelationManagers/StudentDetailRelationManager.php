<?php

namespace App\Filament\Resources\RegistrantResource\RelationManagers;

use App\Enums\Gender;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class StudentDetailRelationManager extends RelationManager
{
    protected static string $relationship = 'studentDetail';

    protected static ?string $title = 'Data Pribadi Siswa';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nisn')
                    ->label('NISN')
                    ->maxLength(10)
                    ->placeholder('10 digit NISN'),
                Forms\Components\TextInput::make('nik')
                    ->label('NIK')
                    ->maxLength(16)
                    ->placeholder('16 digit NIK'),
                Forms\Components\TextInput::make('place_of_birth')
                    ->label('Tempat Lahir')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_of_birth')
                    ->label('Tanggal Lahir')
                    ->displayFormat('d/m/Y'),
                Forms\Components\Select::make('gender')
                    ->label('Jenis Kelamin')
                    ->options([
                        Gender::Male->value => 'Laki-laki',
                        Gender::Female->value => 'Perempuan',
                    ]),
                Forms\Components\TextInput::make('phone_number')
                    ->label('No. Telepon')
                    ->tel()
                    ->maxLength(15),
                Forms\Components\Textarea::make('address')
                    ->label('Alamat Lengkap')
                    ->rows(3)
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nisn')
            ->columns([
                Tables\Columns\TextColumn::make('nisn')
                    ->label('NISN')
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('nik')
                    ->label('NIK')
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('place_of_birth')
                    ->label('Tempat Lahir')
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->label('Tanggal Lahir')
                    ->date('d M Y')
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('gender')
                    ->label('L/P')
                    ->badge()
                    ->formatStateUsing(fn ($state): string => $state instanceof Gender ? $state->getLabel() : '-')
                    ->color('gray'),
                Tables\Columns\TextColumn::make('phone_number')
                    ->label('No. HP')
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('address')
                    ->label('Alamat')
                    ->limit(40)
                    ->tooltip(fn ($record) => $record?->address)
                    ->placeholder('—'),
            ])
            ->filters([])
            ->headerActions([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }
}
