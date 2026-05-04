<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpdbSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_name',
        'ppdb_year',
        'registration_start',
        'registration_end',
        'max_quota',
        'contact_phone',
        'contact_email',
        'address',
        'is_registration_open',
    ];

    protected function casts(): array
    {
        return [
            'registration_start' => 'date',
            'registration_end' => 'date',
            'is_registration_open' => 'boolean',
        ];
    }

    /**
     * Get the current (first) PPDB setting record.
     */
    public static function current(): ?self
    {
        return static::first();
    }
}
