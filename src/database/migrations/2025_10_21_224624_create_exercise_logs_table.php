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
        Schema::create('exercise_logs', function (Blueprint $table) {
            $table->id();

            // Foreign key to the users table.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Foreign key to the global exercise library to identify the exercise.
            $table->foreignId('exercise_library_id')->constrained('exercise_library')->onDelete('cascade');

            // The specific date the workout was logged for.
            $table->date('log_date');

            // --- Strength Training Fields (nullable) ---
            $table->unsignedInteger('sets')->nullable();
            $table->unsignedInteger('reps')->nullable();
            $table->decimal('weight_kg', 8, 2)->nullable();

            // --- Cardio Training Fields (nullable) ---
            $table->unsignedInteger('duration_minutes')->nullable();
            $table->decimal('distance_km', 8, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_logs');
    }
};
