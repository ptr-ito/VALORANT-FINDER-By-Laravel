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
        Schema::create('match_ranks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rank_id')
                ->constrained('ranks')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('match_post_id')
                ->constrained('match_posts')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_ranks');
    }
};
