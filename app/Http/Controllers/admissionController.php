<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\application_data;
use App\Models\student_basedata;
use Illuminate\Http\Request;
use App\Models\ApplicationNumber;
use Illuminate\Support\Facades\Artisan;

class admissionController extends Controller
{
    //generationg application id

    //code ends

    function application_check(Request $request)
    {
        $studentbasedata = [
            "applicant_name" => $request->applicant_name,
            "dob" => $request->dob,
            "gender" => $request->gender,
            "aadhar_number" => $request->aadhar_number,
            "mobile_number" => $request->applicant_mobile,
            "alternative_mobile" => $request->applicant_alter_mobile,
            "father_name" => $request->applicant_father_name,
            "father_occupation" => $request->father_occupation,
            "address" => $request->address,
            "state" => $request->state,
            "district" => $request->district,
            "taluk" => $request->taluk,
            "pincode" => $request->pincode,
            "sslc_marks" => $request->sslc_marks,
            "puc_diploma_marks" => $request->puc_marks,
            "rural_in_sslc" => $request->rural_status,
        ];

        //applicant image code
        if ($request->hasfile('applicant_image')) {
            $image = $request->file('applicant_image');

            $app_image = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_images');
            $image->move($destinationPath, $app_image);

            $studentbasedata["applicant_image"] = $app_image;
        }

        //applicant Aadhar card
        if ($request->hasfile('aadhar_card')) {
            $image = $request->file('aadhar_card');

            $app_aadhar = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_aadhar');
            $image->move($destinationPath, $app_aadhar);

            $studentbasedata["aadhar_card"] = $app_aadhar;
        }

        //applicant signature code
        if ($request->hasfile('applicant_sign')) {
            $image = $request->file('applicant_sign');

            $app_sign = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_sign');
            $image->move($destinationPath, $app_sign);

            $studentbasedata["applicant_sign"] = $app_sign;
        }

        //sslc markscard
        if ($request->hasfile('sslc_markscard')) {
            $image = $request->file('sslc_markscard');

            $sslc = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/sslc_markscards');
            $image->move($destinationPath, $sslc);

            $studentbasedata["sslc_markscard"] = $sslc;
        }

        // puc/diploma markscard
        if ($request->hasfile('puc_markscard')) {
            $image = $request->file('puc_markscard');

            $puc_dip = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/puc_dip_markscards');
            $image->move($destinationPath, $puc_dip);

            $studentbasedata["puc_diploma_markscard"] = $puc_dip;
        }

        // Rural certificate
        if ($request->hasfile('rural_certificate')) {
            $image = $request->file('rural_certificate');

            $rural_cer = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/rural_certificate');
            $image->move($destinationPath, $rural_cer);

            $studentbasedata["rural_certificate"] = $rural_cer;
        }

        //data
        $existingRecord = student_basedata::where('aadhar_number', $request->aadhar_number)->first();
        if ($existingRecord) {
            student_basedata::where('aadhar_number', $request->aadhar_number)->update($studentbasedata);
        }

        //generating application ID
        $year = now()->year;
        $lastApplication = application_data::orderByDesc('created_at')->first();
        if ($lastApplication != null) {
            $maxNumber = (int)(substr($lastApplication->application_id, -4)) + 1;
            // Format the number with leading zeros
            $application_id = $year . sprintf("%04d", $maxNumber);
        } else {
            $application_id = $year . '0001';
        }

        //application data table code starts from here

        $studentappdata = [
            "s_id" => $request->id,
            "applying_hostel" => $request->selecthostel,
            "income_range" => $request->income_range,
            "dependent_status" => $request->dependent,
            "disability_status" => $request->disability_status,
            "parent_disability_status" => $request->parentdisability_status,
            "previously_studied_course" => $request->previous_course,
            "ug_marks" => $request->ug_marks,
            "pg_marks" => $request->pg_marks,
            "college_joined_or_not" => $request->college_joined_ornot,
            "present_year_course" => $request->present_course,
            "present_college_name" => $request->present_college_name,
            "entrance_exam_type" => $request->cet_type,
            "achievement_status" => $request->achievement_status,
            "achievement_name" => $request->achievement_name,
            "scholarship_type" => $request->scholarship_type,
            "scholarship_amount" => $request->scholarship_amount,
            "studied_year_in_rbdgtc" => $request->specific_year,
            "reason_to_left" => $request->left_reason,
            "relative_name" => $request->relative_name,
            "relative_studied_year" => $request->studied_year,
            "applicant_lastyear_stay" => $request->applicant_lastyear_stay,
            "applicant_guardian_name" => $request->guardian_name,
            "application_id" => $application_id,
            "applied_year" => $request->year
        ];

        //singleparent certificate
        if ($request->hasfile('singleparent')) {
            $image = $request->file('singleparent');

            $single_cer = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/singleparent_certificate');
            $image->move($destinationPath, $single_cer);
            $studentappdata["singleparent_certificate"] = $single_cer;
        }

        //mother death certificate
        if ($request->hasfile('orphan1')) {
            $image = $request->file('orphan1');

            $mother_cer = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/motherdeath_certificate');
            $image->move($destinationPath, $mother_cer);
            $studentappdata["mother_death_cer"] = $mother_cer;
        }

        //father death certificate
        if ($request->hasfile('orphan2')) {
            $image = $request->file('orphan2');

            $father_cer = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/fatherdeath_certificate');
            $image->move($destinationPath, $father_cer);
            $studentappdata["father_death_cer"] = $father_cer;
        }

        //disability certificate
        if ($request->hasfile('disability_certificate')) {
            $image = $request->file('disability_certificate');

            $disability_cer = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_disability_certificate');
            $image->move($destinationPath, $disability_cer);
            $studentappdata["disability_certificate"] = $disability_cer;
        }

        // parent disability certificate
        if ($request->hasfile('parentdisability_certificate')) {
            $image = $request->file('parentdisability_certificate');

            $parent_disability_cer = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/parent_disability_certificate');
            $image->move($destinationPath, $parent_disability_cer);
            $studentappdata["parent_disability_certificate"] = $parent_disability_cer;
        }

        //income certificate
        if ($request->hasfile('income_image')) {
            $image = $request->file('income_image');

            $income_cer = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_income');
            $image->move($destinationPath, $income_cer);
            $studentappdata["income_certificate"] = $income_cer;
        }

        //character certificate
        if ($request->hasfile('character_cer')) {
            $image = $request->file('character_cer');

            $char_cer = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_character_cer');
            $image->move($destinationPath, $char_cer);
            $studentappdata["character_certificate"] = $char_cer;
        }

        //Under graduation markscard
        if ($request->hasfile('ug_markscard')) {
            $image = $request->file('ug_markscard');

            $ug_markscard = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_ug_markscard');
            $image->move($destinationPath, $ug_markscard);

            $studentappdata["ug_markscard"] = $ug_markscard;
        }

        //post graduation markscard
        if ($request->hasfile('pg_markscard')) {
            $image = $request->file('pg_markscard');

            $pg_markscard = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_pg_markscard');
            $image->move($destinationPath, $pg_markscard);
            $studentappdata["pg_markscard"] = $pg_markscard;
        }

        //CET copy
        if ($request->hasfile('cetcopy_image')) {
            $image = $request->file('cetcopy_image');

            $cetcopy = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_cet_copy');
            $image->move($destinationPath, $cetcopy);
            $studentappdata["upload_cet_copy"] = $cetcopy;
        }

        //college fee receipt
        if ($request->hasfile('fee_receipt')) {
            $image = $request->file('fee_receipt');

            $feereceipt = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_fee_receipt');
            $image->move($destinationPath, $feereceipt);
            $studentappdata["clg_admission_receipt"] = $feereceipt;
        }

        // achievement certificate
        if ($request->hasfile('achievements_certificate')) {
            $image = $request->file('achievements_certificate');

            $ach_cer = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/achievements_certificates');
            $image->move($destinationPath, $ach_cer);

            $studentappdata["achievement_cer"] = $ach_cer;
        }

        //Guardian sign
        if ($request->hasfile('guardian_sign')) {
            $image = $request->file('guardian_sign');

            $guarsign = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_guardian_sign');
            $image->move($destinationPath, $guarsign);
            $studentappdata["upload_guardian_sign"] = $guarsign;
        }

        application_data::create($studentappdata);
        return redirect('/studentpage');
    }
}
