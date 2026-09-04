<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\UserRole;

#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = ['name', 'email', 'password', 'phone', 'profile_photo_path', 'role'];

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

    public function agency(): HasOne { return $this->hasOne(Agency::class); }
    public function reviews(): HasMany { return $this->hasMany(Review::class); }
    public function inquiries(): HasMany { return $this->hasMany(Inquiry::class); }
    public function favorites(): HasMany { return $this->hasMany(Favorite::class); }
    public function favoriteAgencies(): BelongsToMany { return $this->belongsToMany(Agency::class, 'favorites')->withTimestamps(); }
    public function isAdmin(): bool { return $this->role === UserRole::ADMIN; }
    public function isAgencyOwner(): bool { return $this->role === UserRole::AGENCY_OWNER; }
    public function isTraveler(): bool { return $this->role === UserRole::TRAVELER; }
}
