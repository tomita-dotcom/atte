<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController2;
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




/*AuthenticatedSessionController
Route::get('/login', [AuthenticatedSessionController
::class, "create"])->name("authenticated.create");*/

Route::group(['middleware' => ['auth']], function(){
    //StampController
    Route::get('/', [StampController
    ::class, "stamp"])->name("stamp");

    //WorkController
    Route::prefix('work')->group(function () {
        Route::post('/work/start', [WorkController
        ::class, "start"])->name("work.start");
        Route::post('/work/end', [WorkController
        ::class, "end"])->name("work.end");
    });

    //RestController
        Route::prefix('rest')->group(function () {
        Route::post('/rest/start', [RestController
        ::class, "start"])->name("rest.start");
        Route::post('/rest/end', [RestController
        ::class, "end"])->name("rest.end");
    });

    //AttendanceController
    Route::get('/attendance', [AttendanceController
    ::class, "attendance"])->name("attendance.attendance");
    Route::post('/attendance', [AttendanceController
    ::class, "other_day"])->name("attendance.other_day");
});


//Laravel Breezeインストールによる追加行
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';//これが追加