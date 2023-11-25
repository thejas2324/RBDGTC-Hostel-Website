<?php

namespace App\Http\Controllers;

use App\Models\scholarship_appl_data;
use App\Models\scholarship_basedata;
use App\Models\student_basedata;
use Illuminate\Http\Request;

class scholarshipController extends Controller
{
    function scholarship_check(Request $request)
    {
        $studentbasedata = [
            "applicant_name" => $request->applicant_name,
            "dob" => $request->dob,
            "aadhar_number" => $request->aadhar_number,
            "mobile_number" => $request->applicant_mobile,
            "alternative_mobile" => $request->alternative_mobile,
            "father_name" => $request->applicant_father_name,
            "father_occupation" => $request->father_occupation,
            "address" => $request->address,
            "state" => $request->state,
            "district" => $request->district,
            "taluk" => $request->taluk,
            "pincode" => $request->pincode,
            "sslc_marks" => $request->sslc_marks,
            "puc_diploma_marks" => $request->puc_marks,
            "rural_in_sslc" => $request->rural_status
        ];

        //applicant image code
        if ($request->hasfile('applicant_image')) {
            $image = $request->file('applicant_image');

            $app_image = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_images');
            $image->move($destinationPath, $app_image);

            $studentbasedata["applicant_image"] = $app_image;
        }

        //Aadhar card
        if ($request->hasfile('aadhar_card')) {
            $image = $request->file('aadhar_card');

            $aadhar_card = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_aadhar');
            $image->move($destinationPath, $aadhar_card);

            $studentbasedata["aadhar_card"] = $aadhar_card;
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


        //puc/diploma markscard
        if ($request->hasfile('puc_markscard')) {
            $image = $request->file('puc_markscard');

            $puc_dip = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/puc_dip_markscards');
            $image->move($destinationPath, $puc_dip);

            $studentbasedata["puc_diploma_markscard"] = $puc_dip;
        }

        //rural certificate
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
        $lastApplication = scholarship_appl_data::orderByDesc('created_at')->first();
        if ($lastApplication != null) {
            $maxNumber = (int)(substr($lastApplication->application_id, -4)) + 1;
            // Format the number with leading zeros
            $application_id = $year . sprintf("%04d", $maxNumber);
        } else {
            $application_id = $year . '0001';
        }

        //application data table code starts from here
        $scholarshipappdata = [
            "s_id" => $request->id,
            "income_range" => $request->income_range,
            "dependent_status" => $request->dependent,
            "residential_address" => $request->residential_address,
            "disability" => $request->disability_status,
            "current_course" => $request->present_course,
            "college_name" => $request->present_college_name,
            "college_fee_paid" => $request->fee,
            "ug_marks" => $request->ug_marks,
            "pg_marks" => $request->pg_marks,
            "loan_from_bank" => $request->loan_status,
            "current_hostel" => $request->cur_hostel_name,
            "hostel_fee_paid" => $request->amount_paying,
            "scholarship_from_govt_org" => $request->govt_org_name,
            "amount_from_govt_org" => $request->amount_govt,
            "scholarship_from_rbdgtc" => $request->granted_amount,
            "how_utilized" => $request->utilized,
            "course" => $request->course,
            "college_name1" => $request->college_name1,
            "application_id" => $application_id,
            "applied_year" => $request->year
        ];

        //income certificate
        if ($request->hasfile('income_cer')) {
            $image = $request->file('income_cer');

            $income_cer = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_income');
            $image->move($destinationPath, $income_cer);
            $scholarshipappdata["income_certificate"] = $income_cer;
        }

        //singleparent certificate
        if ($request->hasfile('singleparent')) {
            $image = $request->file('singleparent');

            $single_cer = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/singleparent_certificate');
            $image->move($destinationPath, $single_cer);
            $scholarshipappdata["singleparent_certificate"] = $single_cer;
        }

        //mother death certificate
        if ($request->hasfile('orphan1')) {
            $image = $request->file('orphan1');

            $mother_cer = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/motherdeath_certificate');
            $image->move($destinationPath, $mother_cer);
            $scholarshipappdata["mother_death_cer"] = $mother_cer;
        }

        //father death certificate
        if ($request->hasfile('orphan2')) {
            $image = $request->file('orphan2');

            $father_cer = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/fatherdeath_certificate');
            $image->move($destinationPath, $father_cer);
            $scholarshipappdata["father_death_cer"] = $father_cer;
        }

        //disability certificate
        if ($request->hasfile('disability_certificate')) {
            $image = $request->file('disability_certificate');

            $disability_cer = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_disability_certificates');
            $image->move($destinationPath, $disability_cer);
            $scholarshipappdata["disability_certificate"] = $disability_cer;
        }

        //Under graduation markscard
        if ($request->hasfile('ug_markscard')) {
            $image = $request->file('ug_markscard');

            $ug_markscard = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_ug_markscard');
            $image->move($destinationPath, $ug_markscard);

            $scholarshipappdata["ug_markscard"] = $ug_markscard;
        }

        //post graduation markscard
        if ($request->hasfile('pg_markscard')) {
            $image = $request->file('pg_markscard');

            $pg_markscard = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_pg_markscard');
            $image->move($destinationPath, $pg_markscard);
            $scholarshipappdata["pg_markscard"] = $pg_markscard;
        }

        //character certificate
        if ($request->hasfile('character_cer')) {
            $image = $request->file('character_cer');

            $char_cer = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_character_cer');
            $image->move($destinationPath, $char_cer);
            $scholarshipappdata["character_certificate"] = $char_cer;
        }

        //loan document certificate
        if ($request->hasfile('loan_certificate')) {
            $image = $request->file('loan_certificate');

            $loan_cer = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_loan_document');
            $image->move($destinationPath, $loan_cer);
            $scholarshipappdata["loan_document"] = $loan_cer;
        }

        //Guardian Signature
        if ($request->hasfile('guardian_sign')) {
            $image = $request->file('guardian_sign');

            $guardian_sign = $request->applicant_name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admissions/applicant_guardian_sign');
            $image->move($destinationPath, $guardian_sign);
            $scholarshipappdata["guardian_sign"] = $guardian_sign;
        }

        scholarship_appl_data::create($scholarshipappdata);
        return redirect('/studentpage');
    }
}
