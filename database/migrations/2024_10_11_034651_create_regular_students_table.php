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
        Schema::create('regular_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regular_teacher_id')->constrained('regular_teachers')->onDelete('cascade');
            $table->string('fullname');
            $table->set('gender', ['Male', 'Female']);
            $table->string('lrn');
            $table->date('birthday');
            $table->string('email');
            $table->string('password');
            $table->string('house_number');
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->string('religion');
            $table->integer('grade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regular_students');
    }
};
