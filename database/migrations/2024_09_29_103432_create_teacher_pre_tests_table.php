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
        Schema::create('teacher_pre_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');
            $table->foreignId('students_id')->constrained('students')->onDelete('cascade');
            $table->integer('pis')->nullable();
            $table->integer('ls1_english')->nullable();
            $table->integer('ls1_filipino')->nullable();
            $table->integer('ls2')->nullable();
            $table->integer('ls3')->nullable();
            $table->integer('ls4')->nullable();
            $table->integer('ls5')->nullable();
            $table->integer('ls6')->nullable();
            $table->string('grade_level')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_pre_tests');
    }
};
