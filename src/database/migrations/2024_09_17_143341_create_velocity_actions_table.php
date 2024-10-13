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
        Schema::create('velocity_actions', function (Blueprint $table) {
            $table->id(); // Primary key (auto-incremented BIGINT)
            $table->unsignedBigInteger('form_id'); // Foreign key referencing form
            $table->string('key')->unique(); // Unique action key (e.g., email_notification)
            $table->longText('settings'); // JSON object storing action settings
            $table->timestamps(); // created_at and updated_at

            // Set up foreign key constraint linking actions to forms
            $table->foreign('form_id')
                ->references('id')->on('velocity_forms')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('velocity_actions');
    }
};
