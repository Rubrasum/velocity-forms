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
        Schema::create('velocity_submission_meta', function (Blueprint $table) {
            $table->id(); // Primary key (auto-incremented)
            $table->unsignedBigInteger('parent_id'); // References the submission's `id` from `velocity_submissions`
            $table->string('key'); // Meta key (e.g., form field name)
            $table->longText('value'); // Meta value (e.g., user input)
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraint linking submission meta to submission
            $table->foreign('parent_id')
                ->references('id')->on('velocity_submissions')
                ->onDelete('cascade'); // Cascade delete if submission is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('velocity_submission_meta');
    }
};
