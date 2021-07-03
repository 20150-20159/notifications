<?php

namespace App\Http\Controllers;

use App\Jobs\SendRegistrationSuccess;
use App\Jobs\SendRequestReject;
use App\Jobs\SendRequestSubmissionRequest;
use App\Jobs\SendRequestSuccess;
use App\Models\Notification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function sendRegistrationSuccess(Request $request): JsonResponse
    {
        $user_name = $request->input('name');
        $user_to = $request->input('to');

        SendRegistrationSuccess::dispatch($user_to, $user_name);

        $notification = new Notification();
        $notification->to = $user_to;
        $notification->subject = 'Registration Successful';
        $notification->save();

        return response()->json('Success');
    }

    public function sendSubmissionRequest(Request $request): JsonResponse
    {
        $user_name = $request->input('name');
        $user_to = $request->input('to');

        SendRequestSubmissionRequest::dispatch($user_to, $user_name);

        $notification = new Notification();
        $notification->to = $user_to;
        $notification->subject = '[Submitted] Real Estate Transfer Request';
        $notification->save();

        return response()->json('Success');
    }

    public function sendRequestSuccess(Request $request): JsonResponse
    {
        $user_name = $request->input('name');
        $user_to = $request->input('to');

        SendRequestSuccess::dispatch($user_to, $user_name);

        $notification = new Notification();
        $notification->to = $user_to;
        $notification->subject = '[Completed] Real Estate Transfer Request';
        $notification->save();

        return response()->json('Success');
    }

    public function sendRequestReject(Request $request): JsonResponse
    {
        $user_name = $request->input('name');
        $user_to = $request->input('to');

        SendRequestReject::dispatch($user_to, $user_name);

        $notification = new Notification();
        $notification->to = $user_to;
        $notification->subject = '[Rejected] Real Estate Transfer Request';
        $notification->save();

        return response()->json('Success');
    }
}
