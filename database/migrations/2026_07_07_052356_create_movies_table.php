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
        Schema::create('movies', function (Blueprint $table) {
            $table->id('movie_id');
            $table->string('movie_name', 150);
            $table->text('description')->nullable();
            $table->string('genre', 50)->nullable();
            $table->string('language', 50)->nullable();
            $table->string('duration', 20)->nullable();
            $table->date('release_date')->nullable();
            $table->string('poster', 255)->nullable();
            $table->string('trailer_link', 255)->nullable();
            $table->enum('status', ['Now Showing', 'Upcoming', 'Ended'])->default('Now Showing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
