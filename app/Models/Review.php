<?php

namespace App\Models;

use App\Enums\ReviewStatus;
use Database\Factories\ReviewFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['agency_id', 'user_id', 'rating', 'comment', 'status'];
    protected function casts(): array { return ['rating' => 'integer', 'status' => ReviewStatus::class]; }
    public function agency(): BelongsTo { return $this->belongsTo(Agency::class); }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
}