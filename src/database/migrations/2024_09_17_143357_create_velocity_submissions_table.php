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
        Schema::create('velocity_submissions', function (Blueprint $table) {
            $table->id(); // Primary key (auto-incremented)
            $table->unsignedBigInteger('form_id'); // Foreign key referencing the form
            $table->unsignedBigInteger('user_id')->nullable(); // User ID of the submitter (nullable for guests)
            $table->string('status')->default('pending'); // Status of the submission
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraint to link submission to form
            $table->foreign('form_id')
                ->references('id')->on('velocity_forms')
                ->onDelete('cascade');

            // Foreign key for user, if submissions are made by logged-in users
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null'); // If the user is deleted, keep the submission
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('velocity_submissions');
    }
};
