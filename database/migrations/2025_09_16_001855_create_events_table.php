<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
        $table->id();
        $table->string('name');    
        $table->string('slug')->unique();               
        $table->string('poster_img')->nullable(); 
        $table->text('description')->nullable(); 
        $table->date('date');                     
        $table->enum('event_type', ['offline', 'online'])->default('offline'); 
        $table->string('location')->nullable();   
        $table->enum('price_type', ['free', 'paid'])->default('free'); 
        $table->string('price')->nullable();
        $table->enum('registration_status', ['open', 'closed'])->default('open');
        $table->string('external_link')->nullable();
        $table->timestamps();
        });
        }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
