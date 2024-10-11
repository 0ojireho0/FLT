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
        Schema::create('regular_teacher_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regular_teacher_id')->constrained('regular_teachers')->onDelete('cascade');
            $table->foreignId('regular_student_id')->constrained('regular_students')->onDelete('cascade');
            $table->integer('score_english')->nullable();
            $table->integer('score_math')->nullable();
            $table->integer('score_filipino')->nullable();
            $table->integer('score_science')->nullable();
            $table->string('english_1')->nullable();
            $table->string('english_2')->nullable();
            $table->string('english_3')->nullable();
            $table->string('filipino_1')->nullable();
            $table->string('filipino_2')->nullable();
            $table->string('filipino_3')->nullable();
            $table->string('science_1')->nullable();
            $table->string('science_2')->nullable();
            $table->string('science_3')->nullable();
            $table->string('math_1')->nullable();
            $table->string('math_2')->nullable();
            $table->string('math_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regular_teacher_tests');
    }
};
