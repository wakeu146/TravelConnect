<?php

namespace App\Models;

use App\Enums\VerificationStatus;
use Database\Factories\AgencyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agency extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'company_name', 'description', 'license_number', 'verification_status', 'trust_score', 'address', 'phone', 'email', 'website'];
    protected function casts(): array { return ['verification_status' => VerificationStatus::class, 'trust_score' => 'integer']; }
    public function owner(): BelongsTo { return $this->belongsTo(User::class, 'user_id'); }
    public function documents(): HasMany { return $this->hasMany(AgencyDocument::class); }
    public function countries(): BelongsToMany { return $this->belongsToMany(Country::class, 'agency_country')->withTimestamps(); }
    public function services(): BelongsToMany { return $this->belongsToMany(Service::class, 'agency_service')->withTimestamps(); }
    public function reviews(): HasMany { return $this->hasMany(Review::class); }
    public function inquiries(): HasMany { return $this->hasMany(Inquiry::class); }
    public function favorites(): HasMany { return $this->hasMany(Favorite::class); }
    public function trustScoreLogs(): HasMany { return $this->hasMany(TrustScoreLog::class); }
    public function scopeVerified($query) { return $query->where('verification_status', VerificationStatus::VERIFIED); }
    // Example: Agency::with(['countries', 'services'])->withAvg(['reviews' => fn ($q) => $q->where('status', 'published')], 'rating')->get();
}