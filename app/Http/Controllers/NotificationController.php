<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationSuccess;
use App\Mail\RequestSuccess;
use App\Mail\SubmissionRequest;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function sendRegistrationSuccess(Request $request)
    {
        $user_name = $request->input('name');
        $user_to = $request->input('to');

        Mail::to($user_to)->send(new RegistrationSuccess($user_name));

        $notification = new Notification();
        $notification->to = $user_to;
        $notification->subject = 'Registration Successful';
        $notification->save();

        return response()->json('Success');
    }

    public function sendSubmissionRequest(Request $request)
    {
        $user_name = $request->input('name');
        $user_to = $request->input('to');

        Mail::to($user_to)->send(new SubmissionRequest($user_name));

        $notification = new Notification();
        $notification->to = $user_to;
        $notification->subject = '[Submitted] Real Estate Transfer Request';
        $notification->save();

        return response()->json('Success');
    }

    public function sendRequestSuccess(Request $request)
    {
        $user_name = $request->input('name');
        $user_to = $request->input('to');

        Mail::to($user_to)->send(new RequestSuccess($user_name));

        $notification = new Notification();
        $notification->to = $user_to;
        $notification->subject = '[Completed] Real Estate Transfer Request';
        $notification->save();

        return response()->json('Success');
    }
}
