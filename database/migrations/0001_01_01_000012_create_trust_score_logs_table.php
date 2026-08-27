<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trust_score_logs', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->foreignId('agency_id')->constrained()->restrictOnDelete();
            $table->integer('score');
            $table->json('factors');
            $table->timestamp('calculated_at');
            $table->timestamps();
            $table->index(['agency_id', 'calculated_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trust_score_logs');
    }
};