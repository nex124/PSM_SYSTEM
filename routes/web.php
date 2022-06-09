<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\supervisorcontroller;
use App\Http\Controllers\studentcontroller;

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

//Main



Route::get('/masterS', function () {
    return view('masterS');
});

Route::get('/masterStu', function () {
    return view('masterStu');
});

Route::get('/masterC', function () {
    return view('masterC');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/', function () {
    return view('welcome');
});


//Manage Evaluation
Route::get('/evMenu', function () {
    return view('/evaluation/evMenu');
});

Route::get('/svView', function () {
    return view('/evaluation/svView');
});

Route::get('/deadline', [EvaluationController::class, 'deadline']);
Route::post('/deadline', [EvaluationController::class, 'storeDeadline']);
Route::get('/svEdit', [EvaluationController::class, 'svEdit']);

//Generate Top 20
Route::get('/main', function () {
    return view('ResultMain');
});

//Generate Report
Route::get('/reportMainC', function () {
    return view('/report/reportMainC');
});

Route::get('/studentListC', function () {
    return view('/report/studentListC');
});

Route::get('/studentListS', function () {
    return view('/report/studentListS');
});

Route::get('/reportOverview', function () {
    return view('/report/reportOverview');
});

Route::get('/reportC', function () {
    return view('/report/reportC');
});

Route::get('/reportS', function () {
    return view('/report/reportS');
});

Route::get('/reportStu', function () {
    return view('/report/reportStu');
});


require __DIR__.'/auth.php';

//Manage Student
Route::get('/searcsupervisor', function () {
    return view('/Student/searchsupervisor');
});

Route::get('/editprofile', 'App\Http\Controllers\usercontroller@home');
Route::get('/searchsupervisor', 'App\Http\Controllers\studentcontroller@svlist');
Route::get('/searchsupervisor/search', 'App\Http\Controllers\studentcontroller@searchsupervisor');
Route::get('/svprofile/{supervisorID}', 'App\Http\Controllers\studentcontroller@svprofile');



//Manage Coordinator
Route::get('/searchpsmtitle', 'App\Http\Controllers\usercontroller@viewpsmlist');
Route::get('/searchpsmtitle/search', 'App\Http\Controllers\usercontroller@searchpsm');
Route::get('/createnewstudent', function () {
    return view('/Coordinator/createnewstudent');
});
Route::post('/create', 'App\Http\Controllers\usercontroller@createstudent');
Route::get('/viewstudent', function () {
    return view('/Coordinator/viewstudent');
});
Route::get('/searchstudent', 'App\Http\Controllers\usercontroller@viewstudentlist');
Route::get('/searchstudent/search', 'App\Http\Controllers\usercontroller@searchstudent');
Route::get('/viewstudent/{studentID}', 'App\Http\Controllers\usercontroller@viewstudentprofile');
Route::get('/searchstudent/{studentID}', 'App\Http\Controllers\usercontroller@deletestudentprofile');
Route::get('/updatestudent/{studentID}', 'App\Http\Controllers\usercontroller@updatestudentprofile');
Route::post('/updatestudent/{studentID}/update', 'App\Http\Controllers\usercontroller@updatestdprofile');
Route::get('/createsvprofile', function () {
    return view('/Coordinator/createsvprofile');
});
Route::post('/createsv', 'App\Http\Controllers\usercontroller@createsupervisor');
Route::get('/searchsvlist', 'App\Http\Controllers\usercontroller@viewsvlist');
Route::get('/searchsvlist/search', 'App\Http\Controllers\usercontroller@searchsv');
Route::get('/viewsvprofile/{supervisorID}', 'App\Http\Controllers\usercontroller@viewsvprofile');
Route::get('/searchsvlist/{supervisorID}', 'App\Http\Controllers\usercontroller@deletesvprofile');


//Manage Supervisor
Route::get('/searchstudentlist', 'App\Http\Controllers\supervisorcontroller@studentlist');
Route::get('/searchstudentlist/search', 'App\Http\Controllers\supervisorcontroller@studentprofile');
Route::get('/viewstudentprofile/{studentID}', 'App\Http\Controllers\supervisorcontroller@viewprofile');
