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

// Route::delete('/student/{student}', 'StudentController@delete');


Route::get('/agreement/{id}', 'AgreementController@index');

// Route::get('/student/add/{student}', 'StudentController@approve');

Route::post('/agreement/{id}', 'AgreementController@add');

// Route::delete('/student/{student}', 'StudentController@delete');


Route::post('/region-clusters', 'RegionClusterController@store');

Route::get('/region-clusters/create', 'RegionClusterController@create');

Route::post('/region-clusters/addingprogram/{id}', 'RegionClusterController@addingprogram');

Route::get('/region-clusters/addcontract/{id}', 'RegionClusterController@addcontract');

Route::get('/user/approve/{user_id}', 'UserController@approve');

Route::get('/user/reject/{user_id}', 'UserController@reject');
