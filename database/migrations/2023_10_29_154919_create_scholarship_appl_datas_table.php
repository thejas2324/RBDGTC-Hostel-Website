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
        Schema::create('scholarship_appl_datas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('s_id');

            $table->foreign('s_id')
                ->references('id')
                ->on('student_basedatas')
                ->onDelete('cascade') // On delete cascade
                ->onUpdate('cascade');

            $table->string('income_range')->nullable();
            $table->string('income_certificate')->nullable();
            $table->string('dependent_status')->nullable();
            $table->string('singleparent_certificate')->nullable();
            $table->string('mother_death_cer')->nullable();
            $table->string('father_death_cer')->nullable();
            $table->string('residential_address')->nullable();
            $table->string('disability')->nullable();
            $table->string('disability_certificate')->nullable();
            $table->string('current_course')->nullable();
            $table->string('college_name')->nullable();
            $table->string('college_fee_paid')->nullable();
            $table->string('ug_marks')->nullable();
            $table->string('ug_markscard')->nullable();
            $table->string('pg_marks')->nullable();
            $table->string('pg_markscard')->nullable();
            $table->string('character_certificate')->nullable();
            $table->string('loan_from_bank')->nullable();
            $table->string('loan_document')->nullable();
            $table->string('current_hostel')->nullable();
            $table->string('hostel_fee_paid')->nullable();
            $table->string('scholarship_from_govt_org')->nullable();
            $table->string('amount_from_govt_org')->nullable();
            $table->string('scholarship_from_rbdgtc')->nullable();
            $table->string('how_utilized')->nullable();
            $table->string('course')->nullable();
            $table->string('college_name1')->nullable();
            $table->string('guardian_sign')->nullable();
            $table->string('application_id', 8)->unique();
            $table->string('applied_year')->nullable();
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarship_appl_datas');
    }
};
