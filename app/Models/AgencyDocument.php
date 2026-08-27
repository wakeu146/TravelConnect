<?php

namespace App\Models;

use App\Enums\{DocumentStatus, DocumentType};
use Database\Factories\AgencyDocumentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgencyDocument extends Model
{
    use HasFactory;
    protected $fillable = ['agency_id', 'type', 'file_path', 'status', 'uploaded_at'];
    protected function casts(): array { return ['type' => DocumentType::class, 'status' => DocumentStatus::class, 'uploaded_at' => 'datetime']; }
    public function agency(): BelongsTo { return $this->belongsTo(Agency::class); }
}