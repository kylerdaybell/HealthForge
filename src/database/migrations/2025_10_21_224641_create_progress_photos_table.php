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
        Schema::create('progress_photos', function (Blueprint $table) {
            $table->id();

            // Foreign key to the users table.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Stores the path to the image file (e.g., in S3 or local storage).
            $table->string('file_path');

            // The date the photo was taken or logged for.
            $table->date('log_date')->index();

            // Optional: Link to a weight log entry.
            // This is nullable in case the user uploads a photo
            // on a day they didn't log their weight.
            $table->foreignId('weight_log_id')->nullable()->constrained('weight_logs')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress_photos');
    }
};