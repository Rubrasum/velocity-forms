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
        Schema::create('velocity_objects', function (Blueprint $table) {
            $table->id(); // Primary key (auto-incremented BIGINT)
            $table->string('object_type'); // Type of the object (e.g., form, field, action)
            $table->unsignedBigInteger('object_id'); // ID of the object (references its `id`)
            $table->unsignedBigInteger('parent_id')->nullable(); // ID of the parent object (e.g., form's `id`)
            $table->timestamps(); // created_at and updated_at

            // You may want to define foreign keys for object_id and parent_id
            // if they reference other tables
            $table->foreign('parent_id')->references('id')->on('velocity_forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('velocity_objects');
    }
};
