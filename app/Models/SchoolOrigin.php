<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class SchoolOrigin
 *
 * Stores information about the student's previous school (asal sekolah).
 * One-to-one relationship with User.
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $school_name
 * @property string|null $npsn
 * @property string|null $graduation_year
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @property-read User $user
 */
class SchoolOrigin extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'school_name',
        'npsn',
        'graduation_year',
    ];

    // ─── Relationships ───────────────────────────────────────

    /**
     * Get the user that owns this school origin record.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
