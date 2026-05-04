<?php

namespace App\Filament\Resources\RegistrantResource\RelationManagers;

use App\Enums\DocumentStatus;
use App\Enums\DocumentType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class DocumentsRelationManager extends RelationManager
{
    protected static string $relationship = 'documents';

    protected static ?string $title = 'Dokumen Pendaftaran';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('document_type')
                    ->label('Tipe Dokumen')
                    ->options([
                        DocumentType::Foto->value => DocumentType::Foto->getLabel(),
                        DocumentType::KartuKeluarga->value => DocumentType::KartuKeluarga->getLabel(),
                        DocumentType::Ijazah->value => DocumentType::Ijazah->getLabel(),
                        DocumentType::AktaKelahiran->value => DocumentType::AktaKelahiran->getLabel(),
                    ])
                    ->required(),
                Forms\Components\Select::make('status')
                    ->label('Status Verifikasi')
                    ->options([
                        DocumentStatus::Pending->value => DocumentStatus::Pending->getLabel(),
                        DocumentStatus::Approved->value => DocumentStatus::Approved->getLabel(),
                        DocumentStatus::Rejected->value => DocumentStatus::Rejected->getLabel(),
                    ])
                    ->required(),
                Forms\Components\Textarea::make('notes')
                    ->label('Catatan Revisi')
                    ->rows(3)
                    ->placeholder('Catatan untuk siswa jika dokumen ditolak')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('document_type')
            ->columns([
                Tables\Columns\TextColumn::make('document_type')
                    ->label('Tipe Dokumen')
                    ->formatStateUsing(fn (DocumentType $state): string => $state->getLabel())
                    ->weight('bold'),

                Tables\Columns\ImageColumn::make('file_path')
                    ->label('Preview')
                    ->disk('public')
                    ->square()
                    ->size(60),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (DocumentStatus $state): string => match ($state) {
                        DocumentStatus::Pending => 'warning',
                        DocumentStatus::Approved => 'success',
                        DocumentStatus::Rejected => 'danger',
                    })
                    ->formatStateUsing(fn (DocumentStatus $state): string => $state->getLabel()),

                Tables\Columns\TextColumn::make('notes')
                    ->label('Catatan')
                    ->limit(30)
                    ->tooltip(fn ($record) => $record?->notes)
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        DocumentStatus::Pending->value => 'Menunggu',
                        DocumentStatus::Approved->value => 'Disetujui',
                        DocumentStatus::Rejected->value => 'Ditolak',
                    ]),
            ])
            ->headerActions([])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Ubah Status'),
                Tables\Actions\Action::make('download')
                    ->label('Unduh')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('primary')
                    ->url(fn ($record) => asset('storage/' . $record->file_path))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([]);
    }
}
