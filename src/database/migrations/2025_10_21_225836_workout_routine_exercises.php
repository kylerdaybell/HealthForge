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
        Schema::create('workout_routine_exercises', function (Blueprint $table) {
            $table->id();

            // Link to the user's custom workout routine.
            $table->foreignId('workout_routine_id')->constrained('workout_routines')->onDelete('cascade');

            // Link to the exercise from the global exercise library.
            // Note the table name is 'exercise_library'.
            $table->foreignId('exercise_library_id')->constrained('exercise_library')->onDelete('cascade');

            // The target number of sets for this exercise in this routine.
            $table->unsignedInteger('sets')->nullable();

            // The target rep range, stored as a string, e.g., "8-12" or "15".
            $table->string('reps')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_routine_exercises');
    }
};
