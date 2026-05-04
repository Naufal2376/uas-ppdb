<?php

namespace App\Filament\Resources\RegistrantResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ParentDetailRelationManager extends RelationManager
{
    protected static string $relationship = 'parentDetail';

    protected static ?string $title = 'Data Orang Tua / Wali';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Data Ayah')
                    ->schema([
                        Forms\Components\TextInput::make('father_name')
                            ->label('Nama Ayah')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_occupation')
                            ->label('Pekerjaan Ayah')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_income')
                            ->label('Penghasilan Ayah')
                            ->maxLength(255)
                            ->placeholder('Contoh: Rp 3.000.000'),
                    ])
                    ->columns(3),
                Forms\Components\Section::make('Data Ibu')
                    ->schema([
                        Forms\Components\TextInput::make('mother_name')
                            ->label('Nama Ibu')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_occupation')
                            ->label('Pekerjaan Ibu')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_income')
                            ->label('Penghasilan Ibu')
                            ->maxLength(255)
                            ->placeholder('Contoh: Rp 3.000.000'),
                    ])
                    ->columns(3),
                Forms\Components\TextInput::make('guardian_phone')
                    ->label('No. HP Wali / Orang Tua')
                    ->tel()
                    ->maxLength(15),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('father_name')
            ->columns([
                Tables\Columns\TextColumn::make('father_name')
                    ->label('Nama Ayah')
                    ->weight('bold')
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('father_occupation')
                    ->label('Pekerjaan Ayah')
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('mother_name')
                    ->label('Nama Ibu')
                    ->weight('bold')
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('mother_occupation')
                    ->label('Pekerjaan Ibu')
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('guardian_phone')
                    ->label('No. HP Wali')
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
