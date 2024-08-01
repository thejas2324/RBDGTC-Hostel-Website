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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string("image")->nullable();
            $table->string("prefix")->nullable();
            $table->string("fullname")->nullable();
            $table->string("qualification")->nullable();
            $table->string("year")->nullable();
            $table->longText("message1")->nullable();
            $table->longText("message2")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
