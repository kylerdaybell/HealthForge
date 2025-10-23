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
        Schema::create('user_foods', function (Blueprint $table) {
            $table->id();
            
            // Foreign key to the users table.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // The name of the custom meal or recipe, e.g., "My Morning Smoothie".
            $table->string('name');

            // A description of the serving, e.g., "1 bowl" or "1 smoothie".
            $table->string('serving_name')->nullable();

            // Note: The nutritional info is not stored here. It will be calculated
            // on the fly by summing up the ingredients from the pivot table.

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_foods');
    }
};
