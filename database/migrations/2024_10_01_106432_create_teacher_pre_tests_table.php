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
            $table->string('grade_level')->nullable();
            $table->integer('score_ls1_english')->nullable();
            $table->integer('score_ls1_filipino')->nullable();
            $table->integer('score_ls2_scientific')->nullable();
            $table->integer('score_ls3_math')->nullable();
            $table->integer('score_ls4_life')->nullable();
            $table->integer('score_ls5_uts')->nullable();
            $table->integer('score_ls6_digital')->nullable();
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
