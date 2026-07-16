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
        Schema::create('yoga_classes', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas');
            $table->enum('level', ['Beginner', 'Intermediate', 'Advanced']);
            $table->integer('durasi'); // in minutes
            $table->foreignId('instructor_id')->constrained('instructors')->onDelete('cascade');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yoga_classes');
    }
};
