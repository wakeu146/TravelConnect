<?php

namespace App\Models;

use Database\Factories\TrustScoreLogFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrustScoreLog extends Model
{
    use HasFactory;
    protected $fillable = ['agency_id', 'score', 'factors', 'calculated_at'];
    protected function casts(): array { return ['score' => 'integer', 'factors' => 'array', 'calculated_at' => 'datetime']; }
    public function agency(): BelongsTo { return $this->belongsTo(Agency::class); }
}