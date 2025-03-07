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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 100)->unique();
            $table->string('phone_no', 15)->unique();
            $table->string('password');
            $table->string('profile_picture')->nullable();
            $table->string('agency_name', 100)->nullable();
            $table->text('address')->nullable();
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('country', 50);
            $table->string('pincode', 10);
            $table->enum('status', ['Active', 'Inactive', 'Pending'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
