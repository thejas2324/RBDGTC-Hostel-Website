<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\contact;
use App\Models\event;
use App\Models\gallery;
use App\Models\hostel;
use App\Models\review;
use App\Models\trustee;
use Illuminate\Http\Request;

class mainController extends Controller
{
    function index()
    {
        $reviews = review::inRandomOrder()->take(5)->get();
        $evnt = event::where('date', '>=', now())->get();
        return view('index', ['evnt' => $evnt, 'reviews' => $reviews]);
    }
    function about()
    {
        return view('about');
    }
    function trustees()
    {
        $view = trustee::where('trustee_status', 'present')->get();
        return view('about.pre_trustees', ['view' => $view]);
    }

    function past_trustees()
    {
        $data = trustee::where('trustee_status', 'past')->get();
        return view('about.past_trustees', ['data' => $data]);
    }

    function founder()
    {
        return view('about.founder');
    }

    function about_rbdgtc()
    {
        return view('about.aboutrbdgtc');
    }
    function alumni()
    {
        return view('about.alumni');
    }

    function gallery()
    {
        $photos = gallery::paginate(1);
        return view('gallery', ['photos' => $photos]);
    }

    function contact()
    {
        return view('contact');
    }
    function our_hostel()
    {
        $evnt = event::all();
        $hstl = hostel::all();
        return view('ourhostel', ['hstl' => $hstl, 'evnt' => $evnt]);
    }

    //ajax call to trustee
    function trustee_view($id)
    {
        $trustee = trustee::where('id', $id)->get();
        return $trustee;
    }

    function contact_check(Request $request)
    {
        $data = [
            "full_name" => $request->name,
            "mobile_number" => $request->mobile,
            "subject" => $request->subject,
            "comment" => $request->comment
        ];
        contact::create($data);
        return redirect()->back();
    }
}
