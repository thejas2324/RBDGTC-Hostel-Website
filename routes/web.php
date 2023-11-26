<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\admissionController;
use App\Http\Controllers\applicationController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\scholarshipController;
use App\Http\Controllers\updateController;
use App\Http\Controllers\userActivityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [mainController::class, 'index']);
Route::get('/about', [mainController::class, 'about']);
Route::get('/gallery', [mainController::class, 'gallery']);
Route::get('/contact', [mainController::class, 'contact']);
Route::post('/contactcheck', [mainController::class, 'contact_check']);
Route::get('/ourhostel', [mainController::class, 'our_hostel']);

//login related
Route::get('/login', [loginController::class, 'login']);
Route::get('/studentlogin', [loginController::class, 'student_login']);
Route::get('/studentregister', [loginController::class, 'student_register']);
Route::get('/studentforgetpassword', [loginController::class, 'student_forgetpassword']);
Route::post('/forgetpassword', [loginController::class, 'forget_password']);
Route::post('/resetpassword', [loginController::class, 'reset_password']);




//application related
Route::get('/admission', [applicationController::class, 'admission']);
Route::post('/admissioncheck', [applicationController::class, 'admission_check']);
Route::post('/applicationcheck', [admissionController::class, 'application_check']);
Route::get('/studentpage', [applicationController::class, 'student_page']);
Route::post('/studentregister_check', [applicationController::class, 'studentregister_check']);
Route::get('/student_logout', [applicationController::class, 'student_logout']);
Route::post('/studentlogin_check', [applicationController::class, 'studentlogin_check']);

Route::get('/scholarship', [applicationController::class, 'scholarship']);
Route::post('/scholarshipcheck', [scholarshipController::class, 'scholarship_check']);

Route::get('/newevent', [applicationController::class, 'new_event']);
Route::post('/newevent_check', [applicationController::class, 'newevent_check']);

Route::get('/manage_application/{status?}', [applicationController::class, 'manage_application']);
Route::get('/eventupdate/{id}/{status}', [applicationController::class, 'event_update']);



//about submenu relaated
Route::get('/trustees', [mainController::class, 'trustees']);
Route::get('/pasttrustees', [mainController::class, 'past_trustees']);
Route::get('/founder', [mainController::class, 'founder']);
Route::get('/aboutrbdgtc', [mainController::class, 'about_rbdgtc']);
Route::get('/alumni', [mainController::class, 'alumni']);
Route::get("/trusteeview/{id}", [mainController::class, 'trustee_view']);

//admin login related
Route::get('/adminlogin', [loginController::class, 'admin_login']);
Route::post('/admincheck', [loginController::class, 'admin_check']);
Route::get('profileshow', [loginController::class, 'admin_profile']);
Route::post('/adminreg_check', [loginController::class, 'admin_reg_check']);
Route::get('/admin_logout', [loginController::class, 'admin_logout']);
Route::get('adminforgetpass', [loginController::class, 'admin_forgetpassword']);
Route::post('/adminforgetpassword', [loginController::class, 'admin_forget_password']);
Route::post('/adminresetpassword', [loginController::class, 'admin_reset_password']);


//admin main
//add links
Route::get('/adminindex', [AdminController::class, 'admin_index']);
Route::get('/addstudent', [AdminController::class, 'add_student']);
Route::get('/addtrustee', [AdminController::class, 'add_trustee']);
Route::get('/addevent', [AdminController::class, 'add_event']);
Route::get('/addhostel', [AdminController::class, 'add_hostel']);
Route::get('/addreview', [AdminController::class, 'add_review']);
Route::get('/addgallery', [AdminController::class, 'add_gallery']);
Route::get('/addadmin', [AdminController::class, 'add_admin']);


//view links
Route::get('/viewstudent', [AdminController::class, 'view_student']);
Route::get('/viewtrustee', [AdminController::class, 'view_trustee']);
Route::get('/viewpasttrustee', [AdminController::class, 'view_past_trustee']);
Route::get('/viewevent', [AdminController::class, 'view_event']);
Route::get('/viewhostel', [AdminController::class, 'view_hostel']);
Route::get('/viewreview', [AdminController::class, 'view_review']);
Route::get('/viewgallery', [AdminController::class, 'view_gallery']);
Route::get('/viewadmin', [AdminController::class, 'view_admin']);
Route::get('/viewapplication', [AdminController::class, 'view_application']);
Route::get('/selectedapplications', [AdminController::class, 'selected_applications']);
Route::get('/rejectedapplications', [AdminController::class, 'rejected_applications']);
Route::get('/selectedscholarship', [AdminController::class, 'selected_scholarship']);
Route::get('/rejectedscholarship', [AdminController::class, 'rejected_scholarship']);
Route::get('/viewscholarship', [AdminController::class, 'view_scholarship']);
Route::get('/viewqueries', [AdminController::class, 'view_queries']);
Route::get('/viewadminactivity', [AdminController::class, 'viewadmin_activity']);



//form post methods
Route::post('/addtrustee_check', [AdminController::class, 'addtrustee_check']);
Route::post('/addevent_check', [AdminController::class, 'addevent_check']);
Route::post('/addhostel_check', [AdminController::class, 'addhostel_check']);
Route::post('/addreview_check', [AdminController::class, 'addreview_check']);
Route::post('/addgallery_check', [AdminController::class, 'addgallery_check']);


//delete event
Route::get('/deleteevent/{id}', [AdminController::class, 'delete_event']);
Route::get('/deletehostel/{id}', [AdminController::class, 'delete_hostel']);
Route::get('/deletetrustee/{id}', [AdminController::class, 'delete_trustee']);
Route::get('/deletepasttrustee/{id}', [AdminController::class, 'delete_past_trustee']);
Route::get('/deletereview/{id}', [AdminController::class, 'delete_review']);
Route::get('/deletephoto/{id}', [AdminController::class, 'delete_photo']);
Route::get('/deletequery/{id}', [AdminController::class, 'delete_query']);
Route::get('/deleteapplicationevent/{id}', [AdminController::class, 'deleteapplication_event']);


//search
Route::get('/searchreview', [AdminController::class, '/search_review']);


//edit review link
Route::get('/reviewget/{id}', [updateController::class, 'review_get']);
Route::post('/review/update', [updateController::class, 'review_update']);

//edit event link
Route::get('/eventget/{id}', [updateController::class, 'event_get']);
Route::post('/event/update', [updateController::class, 'event_update']);

//edit hostel link
Route::get('/hostelget/{id}', [updateController::class, 'hostel_get']);
Route::post('/hostel/update', [updateController::class, 'hostel_update']);

//edit trustee link
Route::get('/trusteeget/{id}', [updateController::class, 'trustee_get']);
Route::post('/trustee/update', [updateController::class, 'trustee_update']);

//edit trustee link
Route::post('/admin/update', [updateController::class, 'admin_update']);


//print Application link
Route::get('/printpdf/{id}', [applicationController::class, 'print_pdf']);
Route::get('/adminprintadmission/{id}', [applicationController::class, 'admin_print_admission']);
Route::get('/printscholarship/{id}', [applicationController::class, 'scholarship_print']);
Route::get('/adminprintscholarship/{id}', [applicationController::class, 'admin_print_scholarship']);


//table filter
Route::post('/applications/filter', [AdminController::class, 'applications_filter']);


//select reject activity
Route::get('/selectreject/{application_id}/{status}', [AdminController::class, 'select_reject']);
Route::get('/scholarshipselectreject/{application_id}/{status}', [AdminController::class, 'scholarship_select_reject']);
