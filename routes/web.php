<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvaluationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\reportController;
use Illuminate\Support\Facades\Mail;
use App\Models\Deadline;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\supervisorcontroller;
use App\Http\Controllers\studentcontroller;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Top20;
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

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

Route::get('/masterS', function () {

    return view('masterS');
});

Route::get('/masterStu', function () {
    return view('masterStu');
});

Route::get('/masterC', function () {
    return view('masterC');
});

Route::get('/', function () {
    return view('home');
});
/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/logout', [usercontroller::class, 'destroy'])
                ->name('logout');

//Manage Evaluation
Route::get('/svMenu', [EvaluationController::class, 'svMenu']);

Route::get('/svView', [EvaluationController::class, 'svView']);
Route::get('/deadline', [EvaluationController::class, 'deadline']);
Route::post('/deadline', [EvaluationController::class, 'storeDeadline']);
Route::get('/svEdit/{resultID}/{psmType}', [EvaluationController::class, 'svEdit']);
Route::post('/updateSvMarks/{resultID}/{psmType}', [EvaluationController::class, 'updateSvMarks']);

Route::get('/evView', [EvaluationController::class, 'evView']);
Route::get('/evEdit/{resultID}/{psmType}', [EvaluationController::class, 'evEdit']);
Route::post('/updateEvMarks/{resultID}/{psmType}', [EvaluationController::class, 'updateEvMarks']);

/*Route::get('/', function(){

    Mail::send(new App\Mail\DeadlineReminder());

    return view('welcome');
});*/

//Generate Top 20
Route::get('/main', function () {
    return view('Top_20_students.ResultMain');
});

Route::get('/assign_industry', function () {
    return view('Top_20_students.assign_indus');
});
 

Route::get('/home2', function () {
    return view('mainpage.homepage');
});

Route::get('/studentresult','App\Http\Controllers\Top20@show');//display all result
Route::post('/assign_industry/add','App\Http\Controllers\Top20@add');//add info into table from form
Route::get('/studentresult/top20','App\Http\Controllers\Top20@order');// generate list of top 20 based on finalresult

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
Route::get('/studentListS', [reportController::class,'viewListS']);
Route::get('/studentListC', [reportController::class,'viewListC']);
Route::get('/reportS/{resultID}/{psmType}', [reportController::class,'viewdataS']);
Route::get('/reportC/{resultID}/{psmType}', [reportController::class,'viewdataC']);
Route::get('/reportOverview', [reportController::class,'calctotal']);

require __DIR__.'/auth.php';

//Manage Student
Route::get('/searcsupervisor', function () {
    return view('/Student/searchsupervisor');
});

Route::get('/searchsupervisor', 'App\Http\Controllers\studentcontroller@svlist');
Route::get('/searchsupervisor/search', 'App\Http\Controllers\studentcontroller@searchsupervisor');
Route::get('/svprofile/{supervisorID}', 'App\Http\Controllers\studentcontroller@svprofile');
Route::get('/myprofile', function () {
    return view('/Student/myprofile');
});
Route::get('/myprofile', 'App\Http\Controllers\studentcontroller@mylist');


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
Route::get('/smainpage', function () {

    $deadlinePsm1 = Deadline::select(['deadlines.*'])
                            ->where('psmType', '=', 'PSM 1')
                            ->latest('created_at')->first();

    $deadlinePsm2 = Deadline::select(['deadlines.*'])
                            ->where('psmType', '=', 'PSM 2')
                            ->latest('created_at')->first();

    $deadlinePta = Deadline::select(['deadlines.*'])
                            ->where('psmType', '=', 'PTA')
                            ->latest('created_at')->first();

    return view('/supervisor/smainpage', [
        'deadlinePsm1' => $deadlinePsm1,
        'deadlinePsm2' => $deadlinePsm2,
        'deadlinePta' => $deadlinePta,
    ]);

});

Route::get('/searchstudentlist', 'App\Http\Controllers\supervisorcontroller@studentlist');
Route::get('/searchstudentlist/search', 'App\Http\Controllers\supervisorcontroller@studentprofile');
Route::get('/viewstudentprofile/{studentID}', 'App\Http\Controllers\supervisorcontroller@viewprofile');
Route::get('/svmyprofile', function () {
    return view('/supervisor/svmyprofile');
});
Route::get('/svmyprofile', 'App\Http\Controllers\supervisorcontroller@svmyprofile');
