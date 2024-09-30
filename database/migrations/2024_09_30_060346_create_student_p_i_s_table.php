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
        Schema::create('student_p_i_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('students_id')->constrained('students')->onDelete('cascade');
            $table->string('fullname')->nullable();
            $table->set('gender', ['Male', 'Female']);
            $table->timestamp('birthday', precision: 0);
            $table->string('house_number')->nullable();
            $table->string('barangay')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('religion')->nullable();
            $table->set('civil_status', ['May Asawa', 'Walang Asawa', 'Biyudo / Biyuda', 'Hiwalay sa asawa']);
            $table->string('occupation')->nullable();
            $table->string('education')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_p_i_s');
    }
};
