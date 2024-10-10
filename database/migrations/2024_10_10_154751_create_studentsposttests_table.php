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
        Schema::create('studentsposttests', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->set('active_status', ['Active', 'Inactive']);
            $table->string('fullname');
            $table->set('gender', ['Male', 'Female']);
            $table->string('lrn');
            $table->timestamp('birthday', precision: 0);
            $table->string('house_number');
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->string('religion');
            $table->set('civil_status', ['May Asawa', 'Walang Asawa', 'Biyudo / Biyuda', 'Hiwalay sa asawa']);
            $table->string('occupation');
            $table->string('education');    
            $table->string('post_test_ls1_english_part1_1')->nullable();
            $table->string('post_test_ls1_english_part1_2')->nullable();
            $table->string('post_test_ls1_english_part1_3')->nullable();
            $table->string('post_test_ls1_english_part1_4')->nullable();
            $table->string('post_test_ls1_english_part1_5')->nullable();
            $table->string('post_test_ls1_english_part2_6')->nullable();
            $table->string('post_test_ls1_english_part3_7')->nullable();
            $table->string('post_test_ls1_english_part3_8')->nullable();
            $table->string('post_test_audio_ls1_english_part3_7')->nullable();
            $table->string('post_test_audio_ls1_english_part3_8')->nullable();
            $table->string('post_test_ls1_filipino_part1_1')->nullable();
            $table->string('post_test_ls1_filipino_part1_2')->nullable();
            $table->string('post_test_ls1_filipino_part1_3')->nullable();
            $table->string('post_test_ls1_filipino_part2_4')->nullable();
            $table->string('post_test_ls1_filipino_part3_5')->nullable();
            $table->string('post_test_audio_ls1_filipino_part3_5')->nullable();
            $table->string('post_test_ls2_1')->nullable();
            $table->string('post_test_ls2_2')->nullable();
            $table->string('post_test_ls2_3')->nullable();
            $table->string('post_test_ls2_4')->nullable();
            $table->string('post_test_ls2_5')->nullable();
            $table->string('post_test_ls3_1')->nullable();
            $table->string('post_test_ls3_2')->nullable();
            $table->string('post_test_ls3_3')->nullable();
            $table->string('post_test_ls3_4')->nullable();
            $table->string('post_test_ls3_5')->nullable();
            $table->string('post_test_ls3_6')->nullable();
            $table->string('post_test_ls3_7')->nullable();
            $table->string('post_test_ls3_8')->nullable();
            $table->string('post_test_ls4_1')->nullable();
            $table->string('post_test_ls4_2')->nullable();
            $table->string('post_test_ls4_3')->nullable();
            $table->string('post_test_ls4_4')->nullable();
            $table->string('post_test_ls4_5')->nullable();
            $table->string('post_test_ls4_6')->nullable();
            $table->string('post_test_ls5_1')->nullable();
            $table->string('post_test_ls5_2')->nullable();
            $table->string('post_test_ls5_3')->nullable();
            $table->string('post_test_ls5_4')->nullable();
            $table->string('post_test_ls5_5')->nullable();
            $table->string('post_test_ls6_1')->nullable();
            $table->string('post_test_ls6_2')->nullable();
            $table->string('post_test_ls6_3')->nullable();
            $table->string('post_test_ls6_4')->nullable();
            $table->string('post_test_ls6_5')->nullable();
            $table->string('post_test_ls6_6')->nullable();
            $table->integer('post_test_score_ls1_english')->nullable();
            $table->integer('post_test_score_ls1_filipino')->nullable();
            $table->integer('post_test_score_ls2_scientific')->nullable();
            $table->integer('post_test_score_ls3_math')->nullable();
            $table->integer('post_test_score_ls4_life')->nullable();
            $table->integer('post_test_score_ls5_uts')->nullable();
            $table->integer('post_test_score_ls6_digital')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentsposttests');
    }
};
