<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\StampController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\RestController;
use App\Http\Controllers\AttendanceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//RegisteredUserController
Route::get('/register', [RegisteredUserController
::class, "create"])->name("register.create");
Route::post('/register', [RegisteredUserController
::class, "store"])->name("register.store");

//AuthenticatedSessionController
Route::get('/login', [AuthenticatedSessionController
::class, "create"])->name("authenticated.create");
Route::post('/login', [AuthenticatedSessionController
::class, "store"])->name("authenticated.store");
Route::post('/logout', [AuthenticatedSessionController
::class, "destroy"])->name("authenticated.destroy");

//StampController
Route::get('/', [StampController
::class, "stamp"])->name("stamp");

//WorkController
Route::post('/work/start', [WorkController
::class, "start"])->name("work.start");
Route::post('/work/end', [WorkController
::class, "end"])->name("work.end");

//RestController
Route::post('/rest/start', [RestController
::class, "start"])->name("rest.start");
Route::post('/rest/end', [RestController
::class, "end"])->name("rest.end");

//AttendanceController
Route::get('/attendance', [AttendanceController
::class, "attendance"])->name("attendance.attendance");
Route::post('/attendance', [AttendanceController
::class, "other_day"])->name("attendance.other_day");