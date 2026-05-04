<?php

namespace App\Filament\Resources\RegistrantResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class SchoolOriginRelationManager extends RelationManager
{
    protected static string $relationship = 'schoolOrigin';

    protected static ?string $title = 'Asal Sekolah';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('school_name')
                    ->label('Nama Sekolah')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('npsn')
                    ->label('NPSN')
                    ->maxLength(20)
                    ->placeholder('Nomor Pokok Sekolah Nasional'),
                Forms\Components\TextInput::make('graduation_year')
                    ->label('Tahun Lulus')
                    ->maxLength(4)
                    ->placeholder('Contoh: 2026'),
            ])
            ->columns(3);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('school_name')
            ->columns([
                Tables\Columns\TextColumn::make('school_name')
                    ->label('Nama Sekolah')
                    ->weight('bold')
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('npsn')
                    ->label('NPSN')
                    ->badge()
                    ->color('gray')
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('graduation_year')
                    ->label('Tahun Lulus')
                    ->badge()
                    ->color('primary')
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
