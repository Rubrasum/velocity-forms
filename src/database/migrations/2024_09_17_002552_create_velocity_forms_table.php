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
        Schema::create('velocity_forms', function (Blueprint $table) {
            $table->id(); // Primary key (auto-incrementing BIGINT)
            $table->string('title'); // The title of the form (TEXT equivalent)
            $table->string('key')->unique(); // Unique key for the form (VARCHAR)
            $table->timestamps(); // created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('velocity_forms');
    }
};
