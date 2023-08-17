<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('player_attributes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('attribute_id')->nullable()->constrained('attributes')->cascadeOnUpdate()->nullOnDelete();
            $table->uuid('player_id')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->integer('score')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_attributes');
    }
};
