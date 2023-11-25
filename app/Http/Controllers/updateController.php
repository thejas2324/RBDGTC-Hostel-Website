<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\event;
use App\Models\hostel;
use App\Models\review;
use App\Models\trustee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class updateController extends Controller
{
    function review_get($id)
    {
        $add = review::where('id', $id)->get();
        return $add;
    }


    public function review_update(Request $request)
    {
        // Check if a new image has been uploaded
        if ($request->hasfile('imageupdate1')) {
            $image = $request->file('imageupdate1');
            $oldReview = review::find($request->id1);

            // Delete the old image
            if ($oldReview && !empty($oldReview->image)) {
                $oldImagePath = public_path('review') . '/' . $oldReview->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $newReviewImage = $request->fullname1 . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('review');
            $image->move($destinationPath, $newReviewImage);

            $data = [
                "image" => $newReviewImage,
                "prefix" => $request->prefix1,
                "fullname" => $request->fullname1,
                "qualification" => $request->qua1,
                "year" => $request->year1,
                "message1" => $request->msg1,
                "message2" => $request->msg2,
            ];

            review::where('id', $request->id1)->update($data);
        } else {
            // No new image uploaded, update other fields only
            $data = [
                "prefix" => $request->prefix1,
                "fullname" => $request->fullname1,
                "qualification" => $request->qua1,
                "year" => $request->year1,
                "message1" => $request->msg1,
                "message2" => $request->msg2,
            ];
            review::where('id', $request->id1)->update($data);
        }
        return redirect()->back();
    }


    //event update and ajax
    function event_get($id)
    {
        $add = event::where('id', $id)->get();
        return $add;
    }

    public function event_update(Request $request)
    {
        // Check if a new image has been uploaded
        if ($request->hasfile('imageupload1')) {
            $image = $request->file('imageupload1');
            $oldReview = event::find($request->id1);

            // Delete the old image
            if ($oldReview && !empty($oldReview->image)) {
                $oldImagePath = public_path('events') . '/' . $oldReview->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $newReviewImage = $request->event_name . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('events');
            $image->move($destinationPath, $newReviewImage);

            $data = [
                "event_image" => $newReviewImage,
                "event_name" => $request->eventname,
                "date" => $request->date,
                "time" => $request->time,
                "location" => $request->location,
                "about_event" => $request->about,
            ];
            event::where('id', $request->id1)->update($data);
        } else {
            // No new image uploaded, update other fields only
            $data = [
                "event_name" => $request->eventname,
                "date" => $request->date,
                "time" => $request->time,
                "location" => $request->location,
                "about_event" => $request->about,
            ];
            event::where('id', $request->id1)->update($data);
        }
        return redirect()->back();
    }


    //event update and ajax
    function hostel_get($id)
    {
        $add = hostel::where('id', $id)->get();
        return $add;
    }

    public function hostel_update(Request $request)
    {
        // Check if a new image has been uploaded
        if ($request->hasfile('imageupload1')) {
            $image = $request->file('imageupload1');
            $oldReview = hostel::find($request->id1);

            // Delete the old image
            if ($oldReview && !empty($oldReview->image)) {
                $oldImagePath = public_path('hostel') . '/' . $oldReview->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $newReviewImage = $request->hostel_name . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('hostel');
            $image->move($destinationPath, $newReviewImage);

            $data = [
                "hostel_photo" => $newReviewImage,
                "hostel_name" => $request->hostelname,
                "boys_girls" => $request->type,
                "total_students" => $request->totalstd,
                "location" => $request->location,
                "mobile" => $request->mobile,
                "email_id" => $request->email,

            ];
            hostel::where('id', $request->id1)->update($data);
        } else {
            // No new image uploaded, update other fields only
            $data = [
                "hostel_name" => $request->hostelname,
                "boys_girls" => $request->type,
                "total_students" => $request->totalstd,
                "location" => $request->location,
                "mobile" => $request->mobile,
                "email_id" => $request->email,
            ];
            hostel::where('id', $request->id1)->update($data);
        }

        return redirect()->back();
    }



    //trustee update 
    public function trustee_update(Request $request)
    {
        // Check if a new image has been uploaded
        if ($request->hasfile('imageupload1')) {
            $image = $request->file('imageupload1');
            $oldReview = trustee::find($request->id1);

            // Delete the old image
            if ($oldReview && !empty($oldReview->image)) {
                $oldImagePath = public_path('trustee') . '/' . $oldReview->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $newReviewImage = $request->fullname . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('trustee');
            $image->move($destinationPath, $newReviewImage);

            $data = [
                "trustee_image" => $newReviewImage,
                "fullname" => $request->fullname,
                "email_id" => $request->email,
                "Designation" => $request->des,
                "trustee_status" => $request->status,
                "from_date" => $request->fromdate,
                "to_date" => $request->todate,
                "about" => $request->about,
            ];
            trustee::where('id', $request->id1)->update($data);
        } else {
            // No new image uploaded, update other fields only
            $data = [
                "fullname" => $request->fullname,
                "email_id" => $request->email,
                "Designation" => $request->des,
                "trustee_status" => $request->status,
                "from_date" => $request->fromdate,
                "to_date" => $request->todate,
                "about" => $request->about,
            ];
            trustee::where('id', $request->id1)->update($data);
        }
        return redirect()->back();
    }



    //admin edit model
    public function admin_update(Request $request)
    {
        // Check if a new image has been uploaded
        if ($request->hasfile('imageupload1')) {
            $image = $request->file('imageupload1');
            $oldReview = admin::find($request->id1);

            // Delete the old image
            if ($oldReview && !empty($oldReview->image)) {
                $oldImagePath = public_path('admin_photos') . '/' . $oldReview->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $newReviewImage = $request->name . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('admin_photos');
            $image->move($destinationPath, $newReviewImage);

            $data = [
                "image" => $newReviewImage,
                "name" => $request->name,
                "mobile_number" => $request->mobile,
                "email_id" => $request->email,
                "address" => $request->address,
                "user_type" => $request->type,
            ];
            admin::where('id', $request->id1)->update($data);
        } else {
            // No new image uploaded, update other fields only
            $data = [
                "name" => $request->name,
                "mobile_number" => $request->mobile,
                "email_id" => $request->email,
                "address" => $request->address,
                "user_type" => $request->type,
            ];
            admin::where('id', $request->id1)->update($data);
        }

        return redirect()->back();
    }
}
