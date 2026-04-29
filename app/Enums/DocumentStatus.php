<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * Enum DocumentStatus
 *
 * Defines the verification states of an uploaded document.
 */
enum DocumentStatus: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';

    /**
     * Get a human-readable label for the status.
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::Pending => 'Menunggu Verifikasi',
            self::Approved => 'Disetujui',
            self::Rejected => 'Ditolak',
        };
    }

    /**
     * Get the corresponding Filament color for the status badge.
     */
    public function getColor(): string
    {
        return match ($this) {
            self::Pending => 'warning',
            self::Approved => 'success',
            self::Rejected => 'danger',
        };
    }
}
