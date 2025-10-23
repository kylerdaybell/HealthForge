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
        Schema::create('user_food_ingredients', function (Blueprint $table) {
            $table->id();

            // Link to the user's custom food entry.
            $table->foreignId('user_food_id')->constrained('user_foods')->onDelete('cascade');

            // Link to the ingredient from the global foods library.
            $table->foreignId('food_id')->constrained('foods')->onDelete('cascade');

            // The amount of this ingredient in the recipe.
            $table->decimal('quantity', 8, 2);

            // The unit for the quantity, e.g., "g", "ml", "scoop", "slice".
            $table->string('unit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_food_ingredients');
    }
};
