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
        Schema::create('scholarship_basedatas', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('applicant_image')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email_id')->nullable();
            $table->string('applicant_sign')->nullable();
            $table->string('father_name')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('taluk')->nullable();
            $table->string('pincode')->nullable();
            $table->string('sslc_marks')->nullable();
            $table->string('sslc_markscard')->nullable();
            $table->string('puc_diploma_marks')->nullable();
            $table->string('puc_diploma_markscard')->nullable();
            $table->string('rural_in_sslc')->nullable();
            $table->string('rural_certificate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarship_basedatas');
    }
};
