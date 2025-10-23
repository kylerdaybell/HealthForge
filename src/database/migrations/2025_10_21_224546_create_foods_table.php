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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();

            // Name of the food item. Indexed for fast searching.
            $table->string('name')->index();
            $table->string('brand_name')->nullable();
            $table->string('upc_code')->nullable()->unique();

            // --- Serving Information ---
            $table->decimal('serving_size', 8, 2); // e.g., 100.00
            $table->string('serving_unit'); // e.g., 'g', 'ml', 'oz', 'cup', 'slice'

            // --- Nutritional Information (per serving) ---
            $table->decimal('calories', 8, 2);
            $table->decimal('protein_g', 8, 2);
            $table->decimal('carbs_g', 8, 2);
            $table->decimal('fats_g', 8, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};