<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_create_leads_table.php

public function up()
{
    Schema::create('leads', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone')->unique();
        $table->string('source')->nullable();
        $table->string('type')->nullable(); 
        $table->string('password'); 
        $table->unsignedBigInteger('assigned_to')->nullable();
        $table->text('notes')->nullable();
        $table->timestamps();
        
        // Foreign key for assigned_to
        $table->foreign('assigned_to')->references('id')->on('agents')->onDelete('set null');
    });
    
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
