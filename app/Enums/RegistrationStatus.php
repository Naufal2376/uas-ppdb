<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * Enum RegistrationStatus
 *
 * Defines the lifecycle states of a student's registration.
 * Transitions: pending → verified → approved/rejected
 */
enum RegistrationStatus: string
{
    case Pending = 'pending';
    case Verified = 'verified';
    case Approved = 'approved';
    case Rejected = 'rejected';

    /**
     * Get a human-readable label for the status.
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::Pending => 'Menunggu',
            self::Verified => 'Terverifikasi',
            self::Approved => 'Diterima',
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
            self::Verified => 'info',
            self::Approved => 'success',
            self::Rejected => 'danger',
        };
    }

    /**
     * Get the corresponding Heroicon name for the status.
     */
    public function getIcon(): string
    {
        return match ($this) {
            self::Pending => 'heroicon-o-clock',
            self::Verified => 'heroicon-o-check-circle',
            self::Approved => 'heroicon-o-check-badge',
            self::Rejected => 'heroicon-o-x-circle',
        };
    }
}
