<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\student_basedata;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    function login()
    {
        return view('auth.login');
    }
    function student_login()
    {
        return view('auth.studentlogin');
    }
    function admin_login()
    {
        return view('admin.auth.ad_login');
    }
    function admin_profile()
    {
        $details = admin::where('email_id', session('admin_email'))->get();
        return view('admin.auth.profile', ['details' => $details]);
    }
    function student_register()
    {
        return view('auth.studentregister');
    }
    function student_forgetpassword()
    {
        return view('auth.forgetpass');
    }
    //admin forget password
    function admin_forgetpassword()
    {
        return view('admin.auth.forget_password');
    }
    //admin login check
    function admin_check(Request $request)
    {
        $admin = admin::where('email_id', $request->username)->where('password', md5($request->password))->get();

        if (count($admin) > 0) {
            $currentTime = Carbon::now();
            admin::where('email_id', $request->username)->update(["login_time" => $currentTime]);
            session([
                "admin_id" => $admin[0]->id,
                "admin_name" => $admin[0]->name,
                "admin_image" => $admin[0]->image,
                "admin_mobile" => $admin[0]->mobile_number,
                "admin_email" => $admin[0]->email_id,
                "admin_user_type" => $admin[0]->user_type,
                "admin_address" => $admin[0]->address,
                "admin_log_status" => true
            ]);
            return redirect('/adminindex');
        } else {
            return redirect('/adminlogin')->with('warning', 'Invalid credencials');
        }
    }

    //admin register code
    function admin_reg_check(Request $request)
    {
        if ($request->hasfile('image')) {
            $image = $request->file('image');

            $adn = $request->name . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admin_photos');
            $image->move($destinationPath, $adn);

            $data = [
                "image" => $adn,
                "name" => $request->name,
                "password" => md5($request->password),
                "mobile_number" => $request->mobile,
                "email_id" => $request->email,
                "address" => $request->address,
                "user_type" => $request->usertype
            ];
            admin::create($data);
            return redirect('/viewadmin');
        }
    }
    //logout
    function admin_logout()
    {
        session::flush();
        return redirect('/adminlogin');
    }

    //forget password
    function forget_password(Request $request)
    {
        $forget = student_basedata::where('applicant_name', $request->fullname)->where('aadhar_number', $request->aadharnumber)->get();
        return $forget;
    }
    function reset_password(Request $request)
    {
        student_basedata::where('applicant_name', $request->fullname)->where('aadhar_number', $request->aadharnumber)->update(["password" => md5($request->password)]);
        return redirect('/studentlogin');
    }

    //admin forget password
    function admin_forget_password(Request $request)
    {
        $forget = admin::where('name', $request->fullname)->where('email_id', $request->email)->where('user_type', $request->usertype)->get();
        return $forget;
    }
    function admin_reset_password(Request $request)
    {
        admin::where('name', $request->fullname)->where('email_id', $request->email)->where('user_Type', $request->usertype)->update(["password" => md5($request->password)]);
        return redirect('/adminlogin');
    }
}
