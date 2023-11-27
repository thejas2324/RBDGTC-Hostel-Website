<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\admin_activity;
use App\Models\application_data;
use App\Models\contact;
use App\Models\event;
use App\Models\event_table;
use App\Models\gallery;
use App\Models\hostel;
use App\Models\review;
use App\Models\scholarship_appl_data;
use App\Models\student_basedata;
use App\Models\trustee;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function admin_index()
    {
        $newtrustee = trustee::where('trustee_status', 'Present')->get();
        $pasttrustee = trustee::where('trustee_status', 'Past')->get();
        $details = admin::where('email_id', session('admin_email'))->get();
        return view('admin.ad_index', ['details' => $details, 'newtrustee' => $newtrustee, 'pasttrustee' => $pasttrustee]);
    }
    function add_student()
    {
        return view('admin.add.add_student');
    }
    function view_student()
    {
        return view('admin.view.view_student');
    }
    function add_trustee()
    {
        return view('admin.add.add_trustee');
    }
    function view_trustee()
    {
        $view = trustee::where('trustee_status', 'present')->get();
        return view('admin.view.view_trustee', ['view' => $view]);
    }
    function view_past_trustee()
    {
        $view = trustee::where('trustee_status', 'past')->get();
        return view('admin.view.view_past_trustee', ['view' => $view]);
    }
    function add_event()
    {
        return view('admin.add.add_event');
    }
    function view_event()
    {
        $evnt = event::all();
        return view('admin.view.view_event', ['evnt' => $evnt]);
    }
    function add_hostel()
    {
        return view('admin.add.add_hostel');
    }
    function view_hostel()
    {
        $hstl = hostel::all();
        return view('admin.view.view_hostel', ['hstl' => $hstl]);
    }
    function add_review()
    {
        return view('admin.add.add_review');
    }
    function view_review()
    {
        $data = review::all();
        return view('admin.view.view_review', ['data' => $data]);
    }
    function add_gallery()
    {
        return view('admin.add.add_gallery');
    }
    function view_gallery()
    {
        $images = gallery::all();
        return view('admin.view.view_gallery', ['images' => $images]);
    }
    function add_admin()
    {
        return view('admin.add.add_admin');
    }
    function view_admin()
    {
        $admins = admin::all();
        return view('admin.view.view_admin', ['admins' => $admins]);
    }

    function view_application()
    {
        $currentyear = date('Y');
        $data = student_basedata::join('application_datas as ad', function ($join) {
            $join->on('student_basedatas.id', '=', 'ad.s_id');
        })
            ->select('student_basedatas.*', 'ad.*')
            ->where('ad.applied_year', $currentyear) // Sort by 'created_at' in descending order

            ->get();

        return view('admin.view.view_add_applications', ['data' => $data]);
    }

    function selected_applications()
    {
        $currentyear = date('Y');
        $data = student_basedata::join('application_datas as ad', function ($join) {
            $join->on('student_basedatas.id', '=', 'ad.s_id');
        })
            ->select('student_basedatas.*', 'ad.*')
            ->where('ad.applied_year', $currentyear) // Sort by 'created_at' in descending order
            ->where('ad.status', 'Approved')
            ->get();

        return view('admin.view.view_selected_applications', ['data' => $data]);
    }

    function rejected_applications()
    {
        $currentyear = date('Y');
        $data = student_basedata::join('application_datas as ad', function ($join) {
            $join->on('student_basedatas.id', '=', 'ad.s_id');
        })
            ->select('student_basedatas.*', 'ad.*')
            ->where('ad.applied_year', $currentyear) // Sort by 'created_at' in descending order
            ->where('ad.status', 'Rejected')
            ->get();

        return view('admin.view.view_selected_applications', ['data' => $data]);
    }

    function view_scholarship()
    {
        $currentyear = date('Y');
        $data = student_basedata::join('scholarship_appl_datas as ad', function ($join) {
            $join->on('student_basedatas.id', '=', 'ad.s_id');
        })
            ->select('student_basedatas.*', 'ad.*')
            ->where('ad.applied_year', $currentyear) // Sort by 'created_at' in descending order
            ->get();

        return view('admin.view.view_scholar_applications', ['data' => $data]);
    }

    function selected_scholarship()
    {
        $currentyear = date('Y');
        $data = student_basedata::join('scholarship_appl_datas as ad', function ($join) {
            $join->on('student_basedatas.id', '=', 'ad.s_id');
        })
            ->select('student_basedatas.*', 'ad.*')
            ->where('ad.applied_year', $currentyear) // Sort by 'created_at' in descending order
            ->where('ad.status', 'Approved')
            ->get();

        return view('admin.view.view_selected_scholarship', ['data' => $data]);
    }

    function rejected_scholarship()
    {
        $currentyear = date('Y');
        $data = student_basedata::join('scholarship_appl_datas as ad', function ($join) {
            $join->on('student_basedatas.id', '=', 'ad.s_id');
        })
            ->select('student_basedatas.*', 'ad.*')
            ->where('ad.applied_year', $currentyear) // Sort by 'created_at' in descending order
            ->where('ad.status', 'Rejected')
            ->get();

        return view('admin.view.view_rejected_scholarship', ['data' => $data]);
    }

    function view_queries()
    {
        $data = contact::all();
        return view('admin.view.view_queries', ['data' => $data]);
    }

    function viewadmin_activity()
    {
        $activity = admin::join('admin_activities as aa', 'admins.id', '=', 'aa.admin_id')
            ->select('admins.*', 'aa.*')
            ->orderBy('aa.created_at', 'desc')
            ->limit(200)
            ->get();
        return view('admin.view.view_admin_activity', ['activity' => $activity]);
    }

    //add trustee check
    function addtrustee_check(Request $request)
    {
        if ($request->hasfile('image')) {
            $image = $request->file('image');

            // Generate a unique filename for the image
            $filename = $request->fullname . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('trustee');
            $image->move($destinationPath, $filename);

            $data = [
                "trustee_image" => $filename,
                "prefix" => $request->prefix,
                "fullname" => $request->fullname,
                "email_id" => $request->email,
                "designation" => $request->designation,
                "trustee_status" => $request->trusteestatus,
                "from_date" => $request->fdate,
                "to_date" => $request->tdate,
                "about" => $request->about,
            ];
            trustee::create($data);
            // alert()->success('RBDGTC', 'Trustee Details added Successfully');
            return redirect("/viewtrustee");
        }
    }


    //add event check
    function addevent_check(Request $request)
    {
        if ($request->hasfile('image')) {
            $image = $request->file('image');

            // Generate a unique filename for the image
            $event = $request->eventname . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('events');
            $image->move($destinationPath, $event);

            $data = [
                "event_image" => $event,
                "event_name" => $request->eventname,
                "date" => $request->date,
                "time" => $request->time,
                "location" => $request->location,
                "about_event" => $request->about,
            ];
            event::create($data);
            return redirect("/viewevent");
        }
    }

    //add hostel check
    function addhostel_check(Request $request)
    {
        if ($request->hasfile('image')) {
            $image = $request->file('image');

            $hstl = $request->hostelname . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('hostel');
            $image->move($destinationPath, $hstl);

            $data = [
                "hostel_photo" => $hstl,
                "hostel_name" => $request->hostelname,
                "boys_girls" => $request->boysorgirls,
                "total_students" => $request->total,
                "location" => $request->location,
                "mobile" => $request->mobile,
                "email_id" => $request->email
            ];
            hostel::create($data);
            return redirect('/viewhostel');
        }
    }

    //add gallery
    function addgallery_check(Request $request)
    {
        if ($request->hasfile('image')) {
            $image = $request->file('image');

            $gallery = $request->fn . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('photos');
            $image->move($destinationPath, $gallery);

            $data = [
                "photo" => $gallery,
                "photo_name" => $request->pn,
                "date" => $request->date,
                "about" => $request->about
            ];
            gallery::create($data);
            return redirect('/viewgallery');
        }
    }

    //review check code
    function addreview_check(Request $request)
    {
        if ($request->hasfile('image')) {
            $image = $request->file('image');

            $review = $request->fullname . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('review');
            $image->move($destinationPath, $review);

            $data = [
                "image" => $review,
                "prefix" => $request->prefix,
                "fullname" => $request->fullname,
                "qualification" => $request->quali,
                "year" => $request->year,
                "message1" => $request->msg1,
                "message2" => $request->msg2,
            ];
            review::create($data);
            return redirect('/viewreview');
        }
    }

    //delete event
    function delete_event($id)
    {
        event::where('id', $id)->delete();
        return redirect('/viewevent');
    }

    //delete hostel
    function delete_hostel($id)
    {
        hostel::where('id', $id)->delete();
        return redirect('/viewhostel');
    }

    //delete trustee
    function delete_trustee($id)
    {
        trustee::where('id', $id)->delete();
        return redirect('/view_trustee');
    }

    //delete Past trustee
    function delete_past_trustee($id)
    {
        trustee::where('id', $id)->delete();
        return redirect('/view_past_trustee');
    }

    //delete review
    function delete_review($id)
    {
        review::where('id', $id)->delete();
        return redirect('/viewreview');
    }

    //delete photos
    function delete_photo($id)
    {
        gallery::where('id', $id)->delete();
        return redirect('/viewgallery');
    }

    //delete photos
    function delete_query($id)
    {
        contact::where('id', $id)->delete();
        return redirect('/viewqueries');
    }

    //delete application event
    function deleteapplication_event($id)
    {
        event_table::where('id', $id)->delete();
        return redirect('/manage_application');
    }


    //search review
    public function search_review(Request $request)
    {
        $query = $request->input('query');
        $results = review::where('fullname', 'like', '%' . $query . '%')->get();

        return response()->json($results);
    }



    //filter admission application
    public function applications_filter(Request $request)
    {

        $pucFilter = $request->input('puc', []); // Assuming 'pucFilter' is the name attribute in your HTML
        $pucRanges = [];

        foreach ($pucFilter as $selectedRange) {
            $rangeValues = explode('-', $selectedRange);
            $pucRanges[] = array_map('intval', $rangeValues);
        }

        $degreeFilter = $request->input('degree', []); // Assuming 'pucFilter' is the name attribute in your HTML
        $degreeRanges = [];

        foreach ($degreeFilter as $selectedRange) {
            $rangeValues = explode('-', $selectedRange);
            $degreeRanges[] = array_map('intval', $rangeValues);
        }

        $dependentFilter = $request->input('dependent');
        $disabilityFilter = $request->input('disability');

        //return [$pucRanges, $degree, $dependentFilter, $disabilityFilter];

        $currentyear = date('Y');
        if ($dependentFilter == null && $disabilityFilter == null)
            $filteredApplications = student_basedata::join('application_datas as ap', 'student_basedatas.id', '=', 'ap.s_id')
                ->where(function ($query) use ($pucRanges) {
                    foreach ($pucRanges as $range) {
                        $query->orWhereBetween('student_basedatas.puc_diploma_marks', $range);
                    }
                })

                ->where(function ($query) use ($degreeRanges) {
                    foreach ($degreeRanges as $range) {
                        $query->orWhereBetween('ap.ug_marks', $range);
                    }
                })

                ->where('ap.applied_year', $currentyear)
                ->get();

        else if ($dependentFilter != null && $disabilityFilter == null) {
            $filteredApplications = student_basedata::join('application_datas as ap', 'student_basedatas.id', '=', 'ap.s_id')
                ->where(function ($query) use ($pucRanges) {
                    foreach ($pucRanges as $range) {
                        $query->orWhereBetween('student_basedatas.puc_diploma_marks', $range);
                    }
                })

                ->where(function ($query) use ($degreeRanges) {
                    foreach ($degreeRanges as $range) {
                        $query->orWhereBetween('ap.ug_marks', $range);
                    }
                })

                ->whereIn('ap.dependent_status', $dependentFilter)
                ->where('ap.applied_year', $currentyear)
                ->get();
        } else if ($dependentFilter == null && $disabilityFilter != null) {
            $filteredApplications = student_basedata::join('application_datas as ap', 'student_basedatas.id', '=', 'ap.s_id')
                ->where(function ($query) use ($pucRanges) {
                    foreach ($pucRanges as $range) {
                        $query->orWhereBetween('student_basedatas.puc_diploma_marks', $range);
                    }
                })

                ->where(function ($query) use ($degreeRanges) {
                    foreach ($degreeRanges as $range) {
                        $query->orWhereBetween('ap.ug_marks', $range);
                    }
                })
                ->whereIn('ap.disability_status', $disabilityFilter)
                ->where('ap.applied_year', $currentyear)
                ->get();
        } else {
            $filteredApplications = student_basedata::join('application_datas as ap', 'student_basedatas.id', '=', 'ap.s_id')
                ->where(function ($query) use ($pucRanges) {
                    foreach ($pucRanges as $range) {
                        $query->orWhereBetween('student_basedatas.puc_diploma_marks', $range);
                    }
                })
                ->where(function ($query) use ($degreeRanges) {
                    foreach ($degreeRanges as $range) {
                        $query->orWhereBetween('ap.ug_marks', $range);
                    }
                })
                ->whereIn('ap.disability_status', $disabilityFilter)
                ->whereIn('ap.dependent_status', $dependentFilter)
                ->where('ap.applied_year', $currentyear)
                ->get();
        }
        return $filteredApplications;
    }




    //admission application select reject code
    function select_reject($application_id, $status)
    {
        $activityTime = Carbon::now();
        $admin_activity = [
            "admin_id" => session('admin_id'),
            "activity_time" => $activityTime,
            "activity" => "Admission applications with id $application_id has been $status",
        ];
        $data = [
            "status" => $status
        ];
        application_data::where('application_id', $application_id)->update($data);
        admin_activity::create($admin_activity);
        return redirect()->back();
    }

    //scholarship action code
    function scholarship_select_reject($application_id, $status)
    {
        $activityTime = Carbon::now();
        $admin_activity = [
            "admin_id" => session('admin_id'),
            "activity_time" => $activityTime,
            "activity" => "Scholarship applications with id $application_id has been $status",
        ];
        $data = [
            "status" => $status
        ];
        scholarship_appl_data::where('application_id', $application_id)->update($data);
        admin_activity::create($admin_activity);
        return redirect()->back();
    }





    //filter admission application
    public function scholarship_filter(Request $request)
    {

        $pucFilter = $request->input('puc', []); // Assuming 'pucFilter' is the name attribute in your HTML
        $pucRanges = [];

        foreach ($pucFilter as $selectedRange) {
            $rangeValues = explode('-', $selectedRange);
            $pucRanges[] = array_map('intval', $rangeValues);
        }

        $degreeFilter = $request->input('degree', []); // Assuming 'pucFilter' is the name attribute in your HTML
        $degreeRanges = [];

        foreach ($degreeFilter as $selectedRange) {
            $rangeValues = explode('-', $selectedRange);
            $degreeRanges[] = array_map('intval', $rangeValues);
        }

        $dependentFilter = $request->input('dependent');
        $disabilityFilter = $request->input('disability');

        //return [$pucRanges, $degree, $dependentFilter, $disabilityFilter];

        $currentyear = date('Y');
        if ($dependentFilter == null && $disabilityFilter == null)
            $filteredApplications = student_basedata::join('scholarship_appl_datas as sd', 'student_basedatas.id', '=', 'sd.s_id')
                ->where(function ($query) use ($pucRanges) {
                    foreach ($pucRanges as $range) {
                        $query->orWhereBetween('student_basedatas.puc_diploma_marks', $range);
                    }
                })

                ->where(function ($query) use ($degreeRanges) {
                    foreach ($degreeRanges as $range) {
                        $query->orWhereBetween('sd.ug_marks', $range);
                    }
                })

                ->where('sd.applied_year', $currentyear)
                ->get();

        else if ($dependentFilter != null && $disabilityFilter == null) {
            $filteredApplications = student_basedata::join('scholarship_appl_datas as sd', 'student_basedatas.id', '=', 'sd.s_id')
                ->where(function ($query) use ($pucRanges) {
                    foreach ($pucRanges as $range) {
                        $query->orWhereBetween('student_basedatas.puc_diploma_marks', $range);
                    }
                })

                ->where(function ($query) use ($degreeRanges) {
                    foreach ($degreeRanges as $range) {
                        $query->orWhereBetween('sd.ug_marks', $range);
                    }
                })

                ->whereIn('sd.dependent_status', $dependentFilter)
                ->where('sd.applied_year', $currentyear)
                ->get();
        } else if ($dependentFilter == null && $disabilityFilter != null) {
            $filteredApplications = student_basedata::join('scholarship_appl_datas as sd', 'student_basedatas.id', '=', 'sd.s_id')
                ->where(function ($query) use ($pucRanges) {
                    foreach ($pucRanges as $range) {
                        $query->orWhereBetween('student_basedatas.puc_diploma_marks', $range);
                    }
                })

                ->where(function ($query) use ($degreeRanges) {
                    foreach ($degreeRanges as $range) {
                        $query->orWhereBetween('sd.ug_marks', $range);
                    }
                })
                ->whereIn('sd.disability_status', $disabilityFilter)
                ->where('sd.applied_year', $currentyear)
                ->get();
        } else {
            $filteredApplications = student_basedata::join('scholarship_appl_datas as sd', 'student_basedatas.id', '=', 'sd.s_id')
                ->where(function ($query) use ($pucRanges) {
                    foreach ($pucRanges as $range) {
                        $query->orWhereBetween('student_basedatas.puc_diploma_marks', $range);
                    }
                })
                ->where(function ($query) use ($degreeRanges) {
                    foreach ($degreeRanges as $range) {
                        $query->orWhereBetween('sd.ug_marks', $range);
                    }
                })
                ->whereIn('sd.disability_status', $disabilityFilter)
                ->whereIn('sd.dependent_status', $dependentFilter)
                ->where('sd.applied_year', $currentyear)
                ->get();
        }
        return $filteredApplications;
    }


    //admission application review code
    function application_get($id)
    {
        $application = student_basedata::join('application_datas as ad', 'student_basedatas.id', '=', 'ad.s_id')
            ->where('application_id', $id)->get();
        return $application;
    }

    //admission status modified update code
    function admission_update(Request $request)
    {
        $data = [
            "status" => $request->action,
            "status_modified_reason" => $request->modified_reason
        ];
        application_data::where('application_id', $request->application_id)->update($data);
        return redirect('/viewapplication');
    }
}
