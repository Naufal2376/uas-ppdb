<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ParentDetail
 *
 * Stores parent/guardian information for a student user.
 * One-to-one relationship with User.
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $father_name
 * @property string|null $father_occupation
 * @property string|null $father_income
 * @property string|null $mother_name
 * @property string|null $mother_occupation
 * @property string|null $mother_income
 * @property string|null $guardian_phone
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @property-read User $user
 */
class ParentDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'father_name',
        'father_occupation',
        'father_income',
        'mother_name',
        'mother_occupation',
        'mother_income',
        'guardian_phone',
    ];

    // ─── Relationships ───────────────────────────────────────

    /**
     * Get the user that owns this parent detail.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
