<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\DocumentStatus;
use App\Enums\DocumentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Document
 *
 * Represents an uploaded verification document (foto, KK, ijazah, akta).
 * Each document has a verification status managed by administrators.
 * Many-to-one relationship with User.
 *
 * @property int $id
 * @property int $user_id
 * @property DocumentType $document_type
 * @property string $file_path
 * @property DocumentStatus $status
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @property-read User $user
 */
class Document extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'document_type',
        'file_path',
        'status',
        'notes',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'document_type' => DocumentType::class,
            'status' => DocumentStatus::class,
        ];
    }

    // ─── Relationships ───────────────────────────────────────

    /**
     * Get the user that owns this document.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
