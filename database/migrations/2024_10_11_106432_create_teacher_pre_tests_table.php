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
            // $table->foreignId('students_post_id')->constrained('student_post_test')->onDelete('cascade');
            $table->integer('pis')->nullable();
            $table->string('submit_finalscore_ls1english')->nullable();
            $table->string('submit_finalscore_ls1filipino')->nullable();
            $table->string('submit_finalscore_ls2')->nullable();
            $table->string('submit_finalscore_ls3')->nullable();
            $table->string('submit_finalscore_ls4')->nullable();
            $table->string('submit_finalscore_ls5')->nullable();
            $table->string('submit_finalscore_ls6')->nullable();
            $table->string('submit_finalscore_ls1english_part7')->nullable();
            $table->string('submit_finalscore_ls1english_part8')->nullable();
            $table->string('submit_finalscore_ls1filipino_part5')->nullable();
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
