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
        Schema::create('velocity_form_metas', function (Blueprint $table) {
            $table->id(); // Primary key (auto-incremented)
            $table->unsignedBigInteger('parent_id'); // Foreign key referencing form (velocity_forms)
            $table->string('key'); // Meta key (e.g., 'email_notification', 'confirmation_message')
            $table->longText('value'); // Meta value (e.g., JSON or text data)
            $table->timestamps(); // created_at and updated_at fields

            // Set up foreign key constraint to link form meta to velocity_forms
            $table->foreign('parent_id')
                ->references('id')->on('velocity_forms')
                ->onDelete('cascade'); // If the form is deleted, its meta will also be deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('velocity_form_metas');
    }
};

