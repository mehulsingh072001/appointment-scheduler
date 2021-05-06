<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Http\Request;
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

Route::get('/appointments', [AppointmentController::class, 'index']);
Route::post('/appointments', [AppointmentController::class, 'store']);
Route::get('/appointments/{appointment}', [AppointmentController::class, 'show']);
/* Route::get('/products/search/{name}', [ProductController::class, 'search']); */
/* Route::get('/google-calendar/connect', [GoogleCalendarController::class, 'connect']); */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
