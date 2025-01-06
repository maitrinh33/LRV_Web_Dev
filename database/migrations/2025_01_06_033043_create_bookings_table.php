<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();  
            $table->string('name');  
            $table->string('email');  
            $table->string('phone');  
            $table->date('date');  
            $table->time('time');  
            $table->string('service');  
            $table->text('message')->nullable();  
            
            // Status of the booking, default is 'pending'
            $table->enum('status', ['pending', 'approved', 'cancelled'])->default('pending');
            
            // Reason for cancellation, nullable as it will only be used for cancelled bookings
            $table->text('cancellation_reason')->nullable();  
    
            $table->timestamps();  // Created at and updated at timestamps
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
