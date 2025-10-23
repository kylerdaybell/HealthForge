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
        Schema::create('weight_logs', function (Blueprint $table) {
            $table->id();

            // Foreign key to the users table.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // The user's weight, stored in kilograms for consistency.
            $table->decimal('weight_kg', 8, 2);

            // The date the weight was recorded. Indexed for fast chart lookups.
            $table->date('log_date')->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weight_logs');
    }
};
