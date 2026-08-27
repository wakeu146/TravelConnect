<?php

namespace App\Models;

use Database\Factories\FavoriteFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'agency_id'];
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function agency(): BelongsTo { return $this->belongsTo(Agency::class); }
}