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
        Schema::create('regular_teachers', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->set('active_status', ['Active', 'Inactive']);
            $table->set('position', ['Teacher I', 'Teacher II', 'Teacher III', 'Master Teacher I', 'Master Teacher II', 'Master Teacher III', 'Master Teacher IV']);
            $table->string('fullname');
            $table->set('gender', ['Male', 'Female']);
            $table->string('contact_number');
            $table->date('birthday');
            $table->string('house_number');
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regular_teachers');
    }
};
