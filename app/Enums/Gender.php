<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * Enum Gender
 *
 * Defines the gender options for student personal data.
 */
enum Gender: string
{
    case Male = 'male';
    case Female = 'female';

    /**
     * Get a human-readable label for the gender.
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::Male => 'Laki-laki',
            self::Female => 'Perempuan',
        };
    }
}
