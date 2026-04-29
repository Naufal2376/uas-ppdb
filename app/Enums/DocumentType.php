<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * Enum DocumentType
 *
 * Defines the types of documents that students must upload
 * during the PPDB registration process.
 */
enum DocumentType: string
{
    case Foto = 'foto';
    case KartuKeluarga = 'kk';
    case Ijazah = 'ijazah';
    case AktaKelahiran = 'akta';

    /**
     * Get a human-readable label for the document type.
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::Foto => 'Pas Foto',
            self::KartuKeluarga => 'Kartu Keluarga',
            self::Ijazah => 'Ijazah / SKL',
            self::AktaKelahiran => 'Akta Kelahiran',
        };
    }
}
