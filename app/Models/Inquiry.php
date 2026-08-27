<?php

namespace App\Models;

use App\Enums\InquiryStatus;
use Database\Factories\InquiryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inquiry extends Model
{
    use HasFactory;
    protected $fillable = ['agency_id', 'user_id', 'subject', 'message', 'status'];
    protected function casts(): array { return ['status' => InquiryStatus::class]; }
    public function agency(): BelongsTo { return $this->belongsTo(Agency::class); }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
}