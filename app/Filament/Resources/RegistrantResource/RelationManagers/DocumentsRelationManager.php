<?php

namespace App\Filament\Resources\RegistrantResource\RelationManagers;

use App\Enums\DocumentStatus;
use App\Enums\DocumentType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentsRelationManager extends RelationManager
{
    protected static string $relationship = 'documents';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('document_type')
                    ->label('Tipe Dokumen')
                    ->options([
                        'foto' => 'Pas Foto',
                        'kk' => 'Kartu Keluarga',
                        'ijazah' => 'Ijazah / SKL',
                        'akta' => 'Akta Kelahiran',
                    ])
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('document_type')
            ->columns([
                Tables\Columns\TextColumn::make('document_type')
                    ->label('Tipe Dokumen')
                    ->formatStateUsing(fn (DocumentType $state) => match ($state) {
                        DocumentType::Foto => 'Pas Foto',
                        DocumentType::KartuKeluarga => 'Kartu Keluarga',
                        DocumentType::Ijazah => 'Ijazah / SKL',
                        DocumentType::AktaKelahiran => 'Akta Kelahiran',
                    }),
                Tables\Columns\ImageColumn::make('file_path')
                    ->label('Preview Dokumen')
                    ->square()
                    ->defaultImageUrl(fn ($record) => asset('storage/' . $record->file_path)),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (DocumentStatus $state): string => match ($state) {
                        DocumentStatus::Pending => 'warning',
                        DocumentStatus::Verified => 'primary',
                        DocumentStatus::Rejected => 'danger',
                    })
                    ->formatStateUsing(fn (DocumentStatus $state) => $state->getLabel()),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn ($record) => asset('storage/' . $record->file_path))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
