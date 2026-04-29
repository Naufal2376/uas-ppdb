<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class StudentDetail
 *
 * Stores personal/biodata information for a student user.
 * One-to-one relationship with User.
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $nisn
 * @property string|null $nik
 * @property string|null $place_of_birth
 * @property \Illuminate\Support\Carbon|null $date_of_birth
 * @property Gender|null $gender
 * @property string|null $address
 * @property string|null $phone_number
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @property-read User $user
 */
class StudentDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'nisn',
        'nik',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'address',
        'phone_number',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'gender' => Gender::class,
        ];
    }

    // ─── Relationships ───────────────────────────────────────

    /**
     * Get the user that owns this student detail.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
