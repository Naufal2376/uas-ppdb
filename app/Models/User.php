<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\UserRole;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

/**
 * Class User
 *
 * The primary authentication model for the PPDB system.
 * Each user has a role (admin or student) that determines panel access.
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property UserRole $role
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @property-read StudentDetail|null $studentDetail
 * @property-read ParentDetail|null $parentDetail
 * @property-read SchoolOrigin|null $schoolOrigin
 * @property-read Registration|null $registration
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Document> $documents
 */
class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
        ];
    }

    /**
     * Determine if the user can access the given Filament panel.
     * Admins access the admin panel; students access the student panel.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return match ($panel->getId()) {
            'admin' => $this->role === UserRole::Admin,
            'student' => $this->role === UserRole::Student,
            default => false,
        };
    }

    // ─── Relationships ───────────────────────────────────────

    /**
     * Get the student's personal detail record.
     */
    public function studentDetail(): HasOne
    {
        return $this->hasOne(StudentDetail::class);
    }

    /**
     * Get the student's parent/guardian detail record.
     */
    public function parentDetail(): HasOne
    {
        return $this->hasOne(ParentDetail::class);
    }

    /**
     * Get the student's school origin record.
     */
    public function schoolOrigin(): HasOne
    {
        return $this->hasOne(SchoolOrigin::class);
    }

    /**
     * Get the student's registration record.
     */
    public function registration(): HasOne
    {
        return $this->hasOne(Registration::class);
    }

    /**
     * Get all documents uploaded by the student.
     */
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    // ─── Helper Methods ──────────────────────────────────────

    /**
     * Check if the user is an administrator.
     */
    public function isAdmin(): bool
    {
        return $this->role === UserRole::Admin;
    }

    /**
     * Check if the user is a student.
     */
    public function isStudent(): bool
    {
        return $this->role === UserRole::Student;
    }
}
