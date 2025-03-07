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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('firstName', 255);
            $table->string('lastName', 255);
            $table->string('phone', 15);
            $table->string('email', 255)->unique();
            $table->string('pincode', 10);
            $table->string('country', 100);
            $table->string('state', 100);
            $table->string('city', 100);
            $table->string('password', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
