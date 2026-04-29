<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * Enum UserRole
 *
 * Defines the available user roles within the PPDB system.
 * Used for role-based access control across Admin and Student panels.
 */
enum UserRole: string
{
    case Admin = 'admin';
    case Student = 'student';

    /**
     * Get a human-readable label for the role.
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::Admin => 'Administrator',
            self::Student => 'Siswa',
        };
    }
}
