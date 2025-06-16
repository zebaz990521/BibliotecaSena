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
        Schema::create('computer_rentals', function (Blueprint $table) {
            $table->id();
            $table->string('identification_number');
            $table->foreignId('ficha_id')->constrained()->onDelete('cascade');
            $table->foreignId('person_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('computer_id')->constrained()->onDelete('cascade');
            $table->string('phone_number');
            $table->dateTime('datetime_exit');
            $table->dateTime('datetime_in')->nullable();
            $table->string('signature')->nullable();
            $table->boolean('received')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computer_rentals');
    }
};
