<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/clusters/add/{cluster}', 'ClusterController@add');

Route::get('/clusters/requestbaseschool/{user}', 'ClusterController@requestbaseschool');

Route::get('/clusters/addcontract/{school_id}/{cluster_id}', 'ClusterController@addcontract');

Route::post('/clusters/addingprogram/{school_id}/{cluster_id}', 'ClusterController@addingprogram');

Route::get('/clusters/addagreement/{cluster_id}', 'ClusterController@addagreement');

Route::post('/clusters/addingagreement/{cluster_id}', 'ClusterController@addingagreement');

Route::get('/bids/add', 'BidController@add')->name('bids.add');

Route::post('/bids/adding', 'BidController@adding')->name('bids.adding');

Route::get('/bids/createrc/{id}', 'BidController@createrc');

Route::post('/bids/storerc/{id}', 'BidController@storerc');

Route::resource('bids', 'BidController');

Route::resource('clusters', 'ClusterController');

Route::get('/clusters/addoneschool/{baseSchoolId}', 'ClusterController@addoneschool');

Route::delete('/bid/{bid}', 'BidController@delete');

Route::delete('/bid/{bid}/2', 'BidController@delete2');

Route::get('/bids/{bid}/update', 'BidController@show_update');

Route::put('/bids/{bid}/subject-update', 'BidController@update_subject');

Route::put('/bids/{bid}/modul-update', 'BidController@update_modul');

Route::put('/bids/{bid}/hours-update', 'BidController@update_hours');

Route::put('/bids/{bid}/class-update', 'BidController@update_class');

Route::put('/bids/{bid}/form_of_education-update', 'BidController@update_form_of_education');

Route::put('/bids/{bid}/form_education_implementation-update', 'BidController@update_form_education_implementation');

Route::put('/bids/{bid}/educational_program-update', 'BidController@update_educational_program');

Route::put('/bids/{bid}/educational_activity-update', 'BidController@update_educational_activity');

Route::put('/bids/{bid}/date_begin-update', 'BidController@update_date_begin');

Route::put('/bids/{bid}/date_end-update', 'BidController@update_date_end');

Route::put('/bids/{bid}/date_end-content', 'BidController@update_content');

Route::delete('/bids/{bid}/back-programs', 'BidController@back_programs');



Route::get('/program/{id}', 'ProgramController@index');

Route::get('/program/add/{program}', 'ProgramController@approve');

Route::post('/program/{id}', 'ProgramController@add');

Route::delete('/program/{program}', 'ProgramController@delete');



Route::get('/schedule/{id}', 'ScheduleController@index');

Route::get('/schedule/add/{schedule}', 'ScheduleController@approve');

Route::post('/schedule/{id}', 'ScheduleController@add');

Route::delete('/schedule/{schedule}', 'ScheduleController@delete');


Route::get('/student/{id}', 'StudentController@index');

// Route::get('/student/add/{student}', 'StudentController@approve');

Route::post('/student/{id}', 'StudentController@add');

Route::delete('/student/{student}', 'StudentController@delete');


Route::get('/agreement/{id}', 'AgreementController@index');

// Route::get('/student/add/{student}', 'StudentController@approve');

Route::post('/agreement/{id}', 'AgreementController@add');

Route::delete('/agreement/{agreement}', 'AgreementController@delete');


Route::post('/instruction/add', 'FileController@add');

Route::post('/public/add2', 'FileController@add2');


Route::get('export', 'ExcelRegionController@export')->name('export');

Route::get('export_mun', 'ExcelMunController@export')->name('export_mun');


Route::post('/region-clusters', 'RegionClusterController@store');

Route::get('/region-clusters/create', 'RegionClusterController@create');

Route::post('/region-clusters/addingprogram/{id}', 'RegionClusterController@addingprogram');

Route::get('/region-clusters/addcontract/{id}', 'RegionClusterController@addcontract');

Route::get('/user/approve/{user_id}', 'UserController@approve');

Route::get('/user/reject/{user_id}', 'UserController@reject');


Route::get('/users/org-list', 'UserController@show_users')->name('org_list');

Route::get('/users/{user_org}/show-org', 'UserController@show_user');

Route::put('/users/{user_org}/update-inn', 'UserController@update_inn');

Route::put('/users/{user_org}/update-add', 'UserController@update_add');

Route::put('/users/{user_org}/update-tel', 'UserController@update_tel');

Route::put('/users/{user_org}/update-email_real', 'UserController@update_email_real');

Route::put('/users/{user_org}/update-web', 'UserController@update_web');


Route::get('/users/{id}/org-list-mun', 'UserController@show_users_mun');
