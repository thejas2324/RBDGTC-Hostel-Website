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
        Schema::create('application_datas', function (Blueprint $table) {
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
            $table->string('disability_status')->nullable();
            $table->string('disability_certificate')->nullable();
            $table->string('parent_disability_status')->nullable();
            $table->string('parent_disability_certificate')->nullable();
            $table->string('previously_studied_course')->nullable();
            $table->string('character_certificate')->nullable();
            $table->string('ug_marks')->nullable();
            $table->string('ug_markscard')->nullable();
            $table->string('pg_marks')->nullable();
            $table->string('pg_markscard')->nullable();
            $table->string('college_joined_or_not')->nullable();
            $table->string('present_year_course')->nullable();
            $table->string('present_college_name')->nullable();
            $table->string('entrance_exam_type')->nullable();
            $table->string('clg_admission_receipt')->nullable();
            $table->string('achievement_status')->nullable();
            $table->string('achievement_name')->nullable();
            $table->string('achievement_cer')->nullable();
            $table->string('scholarship_type')->nullable();
            $table->string('scholarship_amount')->nullable();
            $table->string('studied_year_in_hostel')->nullable();
            $table->string('reason_to_left')->nullable();
            $table->string('relative_name')->nullable();
            $table->string('relative_studied_year')->nullable();
            $table->string('applicant_lastyear_stay')->nullable();
            $table->string('applicant_guardian_name')->nullable();
            $table->string('applicant_name')->nullable();
            $table->string('hostel_name')->nullable();
            $table->string('upload_guardian_sign')->nullable();
            $table->string('application_id', 8)->unique();
            $table->string('applied_year')->nullable();
            $table->string('status')->default('Pending');
            $table->string('remark')->nullable();
            $table->string('action_taken_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_datas');
    }
};
