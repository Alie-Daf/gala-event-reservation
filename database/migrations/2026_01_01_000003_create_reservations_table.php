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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id(); // primary key - id
            $table->string('client_name');
            $table->string('email');
            $table->string('phone');
            $table->string('event_type'); // Royal, Prom, Debut
            $table->string('venue');      // Beach, Garden, Ballroom
            $table->date('event_date');
            $table->time('event_time');
            $table->integer('guest_count');
            $table->text('special_requests')->nullable();
            $table->string('status');     // Pending, Confirmed, Cancelled
            $table->timestamps(); 
            $table->text('other_specification')->nullable();
            // created_at updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};