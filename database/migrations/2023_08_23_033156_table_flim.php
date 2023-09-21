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
        Schema::create('flims', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->date('year');
            $table->string('director');
            $table->string('cast');
            $table->string('country');
            $table->integer('duration');
            $table->string('rating');
            $table->string('image');
            $table->string('status');
            $table->string('language');
            $table->string('trailer');
            $table->string('video');
            $table->unsignedBigInteger('genres_id');
            $table->timestamps();

            $table->foreign('genres_id')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flims');
    }
};
