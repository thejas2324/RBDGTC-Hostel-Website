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
        Schema::create('trustees', function (Blueprint $table) {
            $table->id();
            $table->string('trustee_image')->nullable();
            $table->string('prefix')->nullable();
            $table->string('fullname')->nullable();
            $table->string('email_id')->nullable();
            $table->string('Designation')->nullable();
            $table->string('trustee_status')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('about')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trustees');
    }
};
