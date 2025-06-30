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
        Schema::create('computer_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('location');
            $table->enum('status', ["available", "borrowed", "damaged"])->default("available");
            $table->foreignId('computer_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computer_inventories');
    }
};
