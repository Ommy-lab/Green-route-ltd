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
        Schema::create('cereals', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();

        $table->decimal('price', 12, 2)->nullable();
        $table->string('unit')->nullable();

        $table->string('location')->nullable();
        $table->string('image_url')->nullable();

        $table->enum('status', [
            'Available',
            'Available on Request',
            'Temporarily Unavailable',
            'Inactive',
        ])->default('Available on Request');

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cereals');
    }
};
