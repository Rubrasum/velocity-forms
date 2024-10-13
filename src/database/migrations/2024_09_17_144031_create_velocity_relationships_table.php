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
        Schema::create('velocity_relationships', function (Blueprint $table) {
            $table->id(); // Primary key (auto-incremented)
            $table->unsignedBigInteger('parent_object_id'); // ID of the parent object (e.g., form)
            $table->unsignedBigInteger('child_object_id'); // ID of the related object (e.g., submission)
            $table->timestamps(); // created_at and updated_at

            // Foreign key for parent object
            $table->foreign('parent_object_id')
                ->references('id')->on('velocity_objects')
                ->onDelete('cascade');

            // Foreign key for child object
            $table->foreign('child_object_id')
                ->references('id')->on('velocity_objects')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('velocity_relationships');
    }
};
