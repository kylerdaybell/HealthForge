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
        Schema::create('exercise_library', function (Blueprint $table) {
            $table->id();

            // Name of the exercise, indexed for fast searching.
            $table->string('name')->index();

            // Type of exercise to determine which logging fields to show (e.g., sets/reps vs. duration/distance).
            $table->enum('type', ['strength', 'cardio']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_library');
    }
};
