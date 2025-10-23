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
        Schema::create('workout_routines', function (Blueprint $table) {
            $table->id();

            // Foreign key to the users table.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // The name of the custom workout routine, e.g., "Push Day".
            $table->string('name');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_routines');
    }
};
