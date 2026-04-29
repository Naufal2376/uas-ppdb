<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\RegistrationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Registration
 *
 * Tracks the overall registration status for a student.
 * Each student has exactly one registration record with a unique
 * auto-generated registration number.
 *
 * @property int $id
 * @property int $user_id
 * @property string $registration_number
 * @property RegistrationStatus $status
 * @property string|null $admin_notes
 * @property \Illuminate\Support\Carbon|null $registered_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @property-read User $user
 */
class Registration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'registration_number',
        'status',
        'admin_notes',
        'registered_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => RegistrationStatus::class,
            'registered_at' => 'datetime',
        ];
    }

    // ─── Relationships ───────────────────────────────────────

    /**
     * Get the user that owns this registration.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ─── Helper Methods ──────────────────────────────────────

    /**
     * Generate a unique registration number.
     * Format: PPDB-{YEAR}-{SEQUENTIAL_ID}
     *
     * @param int $id The registration ID to use for generating the number.
     */
    public static function generateRegistrationNumber(int $id): string
    {
        return 'PPDB-' . date('Y') . '-' . str_pad((string) $id, 5, '0', STR_PAD_LEFT);
    }
}
