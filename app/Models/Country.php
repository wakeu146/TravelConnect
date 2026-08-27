<?php

namespace App\Models;

use Database\Factories\CountryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code'];
    public function agencies(): BelongsToMany { return $this->belongsToMany(Agency::class, 'agency_country')->withTimestamps(); }
}