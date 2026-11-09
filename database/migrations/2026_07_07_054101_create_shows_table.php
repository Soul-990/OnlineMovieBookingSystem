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
        Schema::create('shows', function (Blueprint $table) {
            $table->id('show_id');
            $table->foreignId('movie_id')->constrained('movies', 'movie_id')->onDelete('cascade');
            $table->foreignId('theatre_id')->constrained('theatres', 'theatre_id')->onDelete('cascade');
            $table->date('show_date');
            $table->time('show_time');
            $table->decimal('gold_price', 10, 2)->default(0);
            $table->decimal('platinum_price', 10, 2)->default(0);
            $table->decimal('box_price', 10, 2)->default(0);
            $table->integer('gold_seats')->default(50);
            $table->integer('platinum_seats')->default(20);
            $table->integer('box_seats')->default(10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shows');
    }
};
