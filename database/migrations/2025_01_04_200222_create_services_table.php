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
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Service name
            $table->string('slug')->unique(); // Unique slug
            $table->text('description'); // Service description
            $table->string('image_path'); // Path to service image
            $table->json('offered_services')->nullable(); // Offered services as JSON
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
