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
        Schema::create('velocity_fields', function (Blueprint $table) {
            $table->id(); // Primary key (auto-incrementing BIGINT)
            $table->unsignedBigInteger('form_id'); // Foreign key referencing the form
            $table->string('key')->unique(); // Field key (unique identifier for the field)
            $table->string('type'); // Field type (e.g., text, email, checkbox)
            $table->integer('order')->nullable(); // Order of the field within the form
            $table->timestamps(); // created_at and updated_at

            // Set up foreign key constraint to link form field to velocity_forms
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
        Schema::dropIfExists('velocity_fields');
    }
};
