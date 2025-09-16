<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events') ;
            $table->string('name');                    
            $table->string('email');          
            $table->string('phone')->nullable();      
            $table->string('Alamat')->nullable();    
            $table->date('birth_date')->nullable();      
            $table->enum('gender', ['male', 'female'])->nullable(); 
            $table->enum('source', ['social_media', 'friend', 'School', 'other'])->nullable(); 
            $table->string('payment_proof')->nullable();  
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
