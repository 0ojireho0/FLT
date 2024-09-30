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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->set('user_type', ['ALS Teacher', 'Admin']);
            $table->set('active_status', ['Active', 'Inactive']);
            $table->string('fullname');
            $table->set('gender', ['Male', 'Female']);
            $table->string('contact_number');
            $table->timestamp('birthday', precision: 0);
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
        Schema::dropIfExists('employees');
    }
};
