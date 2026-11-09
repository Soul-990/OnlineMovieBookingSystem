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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id');
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
            $table->foreignId('show_id')->constrained('shows', 'show_id')->onDelete('cascade');
            $table->enum('seat_class', ['Gold', 'Platinum', 'Box']);
            $table->integer('adult_tickets')->default(0);
            $table->integer('kid_tickets')->default(0);
            $table->decimal('total_amount', 10, 2);
            $table->dateTime('booking_date')->useCurrent();
            $table->enum('booking_status', ['Booked', 'Cancelled'])->default('Booked');
            $table->timestamps();
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
