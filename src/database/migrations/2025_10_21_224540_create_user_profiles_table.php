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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();

            // This creates the foreign key relationship to the users table.
            // constrained() automatically links it to the 'id' on the 'users' table.
            // onDelete('cascade') means if a user is deleted, their profile is also deleted.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // --- Biometrics ---
            $table->date('date_of_birth')->nullable();
            $table->decimal('height_cm', 5, 1)->nullable(); // e.g., 182.5 cm
            $table->enum('gender', ['male', 'female', 'other'])->nullable();

            // --- Goals & Activity ---
            $table->enum('activity_level', [
                'sedentary',        // Little or no exercise
                'lightly_active',   // Light exercise/sports 1-3 days/week
                'moderately_active',// Moderate exercise/sports 3-5 days/week
                'very_active',      // Hard exercise/sports 6-7 days a week
                'extra_active'      // Very hard exercise & physical job
            ])->default('sedentary');

            $table->unsignedInteger('goal_calories')->default(2000);
            $table->unsignedInteger('goal_protein_g')->default(150);
            $table->unsignedInteger('goal_carbs_g')->default(200);
            $table->unsignedInteger('goal_fats_g')->default(60);
            $table->decimal('goal_weight_kg', 5, 1)->nullable(); // e.g., 85.5 kg

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};