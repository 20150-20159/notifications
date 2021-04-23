<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/registrationSuccess', [NotificationController::class, 'sendRegistrationSuccess']);
Route::post('/submissionRequest', [NotificationController::class, 'sendSubmissionRequest']);
Route::post('/requestSuccess', [NotificationController::class, 'sendRequestSuccess']);
