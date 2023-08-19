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
            $table->uuid('attribute_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->uuid('attribute_category_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->string('score')->nullable();
            $table->string('mint_id')->nullable();
            $table->uuid('user_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
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
