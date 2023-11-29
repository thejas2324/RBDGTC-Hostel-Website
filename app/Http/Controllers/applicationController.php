<?php

namespace App\Http\Controllers;

use App\Models\admin_activity;
use App\Models\application_data;
use App\Models\event_table;
use App\Models\hostel;
use App\Models\scholarship_appl_data;
use App\Models\scholarship_basedata;
use App\Models\student_basedata;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\Fpdf;
use Illuminate\Support\Facades\View;

class applicationController extends Controller
{
    function admission()
    {
        $currentYear = date('Y');
        $admissionevent = event_table::where('title', 'Admission Application')->where('application_year', $currentYear)->orderBy('created_at', 'desc')->get();

        $admissionhostels_ids = explode(',', $admissionevent[0]->hostels);
        $admission_hostels = hostel::whereIn('id', $admissionhostels_ids)->get();

        $user = student_basedata::where('aadhar_number', session('aadhar_number'))->first();
        $result = ['user' => $user, 'admission_hostels' => $admission_hostels];
        return view('applications.admission', $result);
    }

    function scholarship()
    {
        $user = student_basedata::where('aadhar_number', session('aadhar_number'))->first();
        return view('applications.scholarship', ['user' => $user]);
    }

    function student_page()
    {
        $currentYear = date('Y');

        $admissionevent = event_table::where('title', 'Admission Application')->where('application_year', $currentYear)->orderBy('created_at', 'desc')->get();

        $scholarshipevent = event_table::where('title', 'Scholarship Application')->where('application_year', $currentYear)->orderBy('created_at', 'desc')->get();

        $hasEmptyAppliedYear = application_data::where('s_id', session('id'))
            ->where('applied_year', $currentYear)
            ->exists();

        $scholarship = scholarship_appl_data::where('s_id', session('id'))
            ->where('applied_year', $currentYear)
            ->exists();

        $data = student_basedata::where('aadhar_number', session('aadhar_number'))->get();

        $result = [
            'data' => $data,
            'hasEmptyAppliedYear' => $hasEmptyAppliedYear,
            'scholarship' => $scholarship,
            'admissionevent' => $admissionevent,
            'scholarshipevent' => $scholarshipevent
        ];

        if (count($scholarshipevent) > 0) {
            $cholarshiphostels_ids = explode(',', $scholarshipevent[0]->hostels);
            $scholarship_hostels = hostel::whereIn('id', $cholarshiphostels_ids)->get();
            $result['scholarship_hostels'] = $scholarship_hostels;
        }
        return view('applications.student_page', $result);
    }


    //student registration code
    function studentregister_check(Request $request)
    {
        $users = student_basedata::where('aadhar_number', $request->aadhar)->where('applicant_name', $request->studentname)->get();
        if (count($users) > 0) {
            return redirect('/studentlogin')->with('warning', 'user already registered');
        } else {
            $data = [
                "applicant_name" => $request->studentname,
                "aadhar_number" => $request->aadhar,
                "password" => md5($request->password)
            ];
            $student_data = student_basedata::create($data);
            session([
                "applicant_name" => $request->studentname,
                "aadhar_number" => $request->aadhar,
                "password" => $request->password,
                "id" => $student_data->id,
                "log_status" => true
            ]);
            return redirect('/studentpage');
        }
    }

    //student login code
    function studentlogin_check(Request $request)
    {
        $users = student_basedata::where('aadhar_number', $request->phone)->where('password', md5($request->password))->first();
        if ($users) {
            session([
                "applicant_name" => $users->applicant_name,
                "aadhar_number" => $users->aadhar_number,
                "password" => $users->password,
                "id" => $users->id,
                "log_status" => true
            ]);
            return redirect('/studentpage');
        } else {
            return redirect('/studentlogin')->with('warning', 'Invalid credencials');
        }
    }

    //student logout
    public function student_logout()
    {
        session::flush();
        return redirect('/');
    }


    //student Printout code
    public function print_pdf($id)
    {
        $data = student_basedata::where('student_basedatas.id', $id)
            ->join('application_datas', 'student_basedatas.id', '=', 'application_datas.s_id')
            ->select('student_basedatas.*', 'application_datas.*')
            ->orderBy('application_datas.created_at', 'desc')
            ->get();

        if (!$data) {
            abort(404);
        }
        $pdf = FacadePdf::loadView('applications.pdf', ['data' => $data]);
        return $pdf->download('application.pdf');  //downloaded application name
    }

    //admin admission Printout code
    public function admin_print_admission($id)
    {
        $data = student_basedata::where('student_basedatas.id', $id)
            ->join('application_datas', 'student_basedatas.id', '=', 'application_datas.s_id')
            ->select('student_basedatas.*', 'application_datas.*')
            ->orderBy('application_datas.created_at', 'desc')
            ->get();

        if (!$data) {
            abort(404);
        }
        $pdf = FacadePdf::loadView('applications.add_admin_pdf', ['data' => $data]);
        return $pdf->download('application.pdf');  //downloaded application name
    }


    //scholarship Printout code
    public function scholarship_print($id)
    {
        $data = student_basedata::where('student_basedatas.id', $id)
            ->join('scholarship_appl_datas', 'student_basedatas.id', '=', 'scholarship_appl_datas.s_id')
            ->select('student_basedatas.*', 'scholarship_appl_datas.*')
            ->orderBy('scholarship_appl_datas.created_at', 'desc')
            ->get();

        if (!$data) {
            abort(404);
        }
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = FacadePdf::loadView('applications.scholarship_pdf', ['data' => $data]);

        return $pdf->download('scholarship.pdf');
    }



    //admin scholarship Printout code
    public function admin_print_scholarship($id)
    {
        $data = student_basedata::where('student_basedatas.id', $id)
            ->join('scholarship_appl_datas', 'student_basedatas.id', '=', 'scholarship_appl_datas.s_id')
            ->select('student_basedatas.*', 'scholarship_appl_datas.*')
            ->orderBy('scholarship_appl_datas.created_at', 'desc')
            ->get();

        if (!$data) {
            abort(404);
        }
        $pdf = FacadePdf::loadView('applications.scholar_admin_pdf', ['data' => $data]);
        return $pdf->download('scholarship.pdf');  //downloaded application name
    }


    //application open close
    function new_event()
    {
        $hostels = hostel::all();
        return view('applications.new_event', ['hostels' => $hostels]);
    }

    function newevent_check(Request $request)
    {
        $activityTime = Carbon::now();
        $admin_activity = [
            "admin_id" => session('admin_id'),
            "activity_time" => $activityTime,
            "activity" => "New Event has been added",
        ];
        $data = [
            "title" => $request->title,
            "application_year" => $request->academicyear,
            "hostels" => implode(',', $request->input('hostels')),
            "open_date" => $request->opendate,
            "close_date" => $request->closedate,
        ];


        event_table::create($data);
        admin_activity::create($admin_activity);
        return redirect()->back()->with('success', 'Event added Succesfully');
    }

    function manage_application($status = 'All')
    {
        if ($status == "All") {
            $events = event_table::all();
        } else {
            $events = event_table::where('status', $status)->get();
        }
        return view('applications.application_event', ['events' => $events, 'status' => $status]);
    }

    function event_update($application_event_id, $status)
    {
        $activityTime = Carbon::now();
        $admin_activity = [
            "admin_id" => session('admin_id'),
            "activity_time" => $activityTime,
            "activity" => session('admin_name') . " has been done an action, Application $status"
        ];
        $data = [
            "status" => $status
        ];
        event_table::where('id', $application_event_id)->update($data);
        admin_activity::create($admin_activity);
        return redirect()->back();
    }
}
