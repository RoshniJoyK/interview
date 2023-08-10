<?php

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

/* Route::get('/listInterview', function () {
    return view('listInterview');
});
Route::get('/AttendedForm', function () {
    return view('AttendedForm');
});


Route::get('/','App\Http\Controllers\LoginController@index');
Route::get('/dashboard','App\Http\Controllers\LoginController@dashboard');
Route::get('/user-profile','App\Http\Controllers\LoginController@user_profile'); */




Route::get('/add-jobs','App\Http\Controllers\JobsController@index');
Route::get('/list-jobs','App\Http\Controllers\JobsController@list_jobs');
Route::post('/store_jobs', 'App\Http\Controllers\JobsController@store_jobs');
Route::get('/edit_job/{id}', 'App\Http\Controllers\JobsController@edit_job');
Route::post('/update_job', 'App\Http\Controllers\JobsController@update_job');
Route::post('/destroy-job', 'App\Http\Controllers\JobsController@destroy');
Route::post('/disable-job', 'App\Http\Controllers\JobsController@disable');
Route::post('/fulfilled-job', 'App\Http\Controllers\JobsController@fulfilled');
Route::post('/enable-job', 'App\Http\Controllers\JobsController@enable');
Route::get('/findActive', 'App\Http\Controllers\JobsController@findActive');
Route::get('/findDisable', 'App\Http\Controllers\JobsController@findDisable');
Route::get('/findFulfilled', 'App\Http\Controllers\JobsController@findFulfilled');


Route::get('/schedule-interview','App\Http\Controllers\InterviewController@index');
//Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/','App\Http\Controllers\LoginController@index');
Route::get('/dashboard','App\Http\Controllers\LoginController@dashboard');
Route::get('/user-profile','App\Http\Controllers\LoginController@user_profile');
Route::post('/login','App\Http\Controllers\LoginController@login');
Route::get('/logout','App\Http\Controllers\LoginController@logout');

Route::get('/add-candidate','App\Http\Controllers\CandidateController@index');
Route::get('/list-candidate','App\Http\Controllers\CandidateController@list_cand');
Route::post('/store_candidate','App\Http\Controllers\CandidateController@store_candidate');
Route::get('/edit_candidate/{id}', 'App\Http\Controllers\CandidateController@edit');
Route::post('/update_candidate', 'App\Http\Controllers\CandidateController@update_candidate');
Route::get('/schedule-interview/{id}','App\Http\Controllers\InterviewController@index');
Route::post('/store_schedule','App\Http\Controllers\InterviewController@store_schedule');
#Route::post('/destroy/{id}','App\Http\Controllers\CandidateController@destroy');
Route::post('/destroy','App\Http\Controllers\CandidateController@destroy');





Route::get('/attend/{id}', 'App\Http\Controllers\InterviewController@attend');
Route::get('/not_attend/{id}', 'App\Http\Controllers\InterviewController@not_attend');
Route::post('/attend_store', 'App\Http\Controllers\InterviewController@attend_store');
Route::post('/notattend_store', 'App\Http\Controllers\InterviewController@notattend_store');
Route::post('/postponed_store', 'App\Http\Controllers\InterviewController@postponed_store');
Route::get('/postponed/{id}', 'App\Http\Controllers\InterviewController@postponed');
//Route::get('/list_interview', 'App\Http\Controllers\InterviewController@listinterview');
Route::get('/list_interview', 'App\Http\Controllers\InterviewController@show');
Route::get('/shortlist', 'App\Http\Controllers\ShortlistedController@shortlist');
//Route::get('/shortlistedcandidate','App\Http\Controllers\StudentcrudController@shortListedCandidates');
//Route::get('/listInterview','App\Http\Controllers\StudentcrudController@index');
//Route::get('/addStaffForm','App\Http\Controllers\ShortlistedController@index');
//Route::get('/shortlistedcandidate','App\Http\Controllers\ShortlistedController@shortListedCandidates');
Route::get('/stafflist','App\Http\Controllers\ShortlistedController@show');

Route::get('/addStaffForm/{id}','App\Http\Controllers\ShortlistedController@index');
Route::post('/staff_candidate','App\Http\Controllers\ShortlistedController@staff_candidate')->name('staff_candidate');
Route::get('/shortListedCandidates/{id}','App\Http\Controllers\InterviewController@shortListedCandidates');
Route::post('/store-round-result', 'App\Http\Controllers\InterviewController@store_round_result');
Route::get('/findAttend', 'App\Http\Controllers\InterviewController@findAttend');
Route::get('/findNotattend', 'App\Http\Controllers\InterviewController@findNotattend');
Route::get('/findPostponed', 'App\Http\Controllers\InterviewController@findPostponed');
Route::get('/list-staff','App\Http\Controllers\ShortlistedController@list_staff');
Route::get('/list-scheduled', 'App\Http\Controllers\CandidateController@list_scheduled');
Route::get('/list-notscheduled', 'App\Http\Controllers\CandidateController@list_notscheduled');

Route::post('/update_profile','App\Http\Controllers\LoginController@update_profile');
Route::get('/download-cv/{file}', 'App\Http\Controllers\CandidateController@download_cv');
Route::post('/update_candidate', 'App\Http\Controllers\CandidateController@update');
Route::get('/sentmail/{id}', [App\Http\Controllers\CandidateController::class, 'sentmail']);
Route::get('/download-cv/{file}', 'App\Http\Controllers\ShortlistedController@download_cv');
Route::get('/staffDetails/{id}','App\Http\Controllers\ShortlistedController@staff_details');
Route::get('/download-offer/{file}', 'App\Http\Controllers\ShortlistedController@download_offer');
