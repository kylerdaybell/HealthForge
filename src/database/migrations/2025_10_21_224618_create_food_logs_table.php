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
        Schema::create('food_logs', function (Blueprint $table) {
            $table->id();

            // Foreign key to the users table.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // The specific date the food was logged for. Indexed for fast lookups.
            $table->date('log_date')->index();

            // The meal category for this log entry.
            $table->enum('meal_type', ['breakfast', 'lunch', 'dinner', 'snack']);

            // --- Fields from your 'add_nutrition_fields' migration ---
            // This is the "snapshot" of the food name and nutrition at the time of logging.
            $table->string('food_name');
            $table->decimal('calories', 8, 2);
            $table->decimal('protein_g', 8, 2)->default(0);
            $table->decimal('carbs_g', 8, 2)->default(0);
            $table->decimal('fats_g', 8, 2)->default(0);
            // ---------------------------------------------------------

            // The quantity of the serving the user consumed.
            $table->decimal('quantity', 8, 2)->default(1);

            // This is the polymorphic part, made nullable to allow "quick adds"
            // that don't link to a library item.
            $table->nullableMorphs('loggable');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_logs');
    }
};

