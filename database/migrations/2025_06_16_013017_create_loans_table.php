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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_delivery_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('user_received_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('trainee_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('teacher_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('administrative_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('user_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('loan_type_id')->constrained()->onDelete('cascade');
            $table->dateTime('datetime_out');
            $table->dateTime('datetime_in')->nullable();
            $table->longText('signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
