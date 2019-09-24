<?php

use Illuminate\Http\Request;

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
/* 
Route::middleware('auth:api')->get('/user', function (Request $request) 
{
    return $request->user();
});*/
Route::POST('/doctors','DoctorController@store');
Route::PATCH('/doctors/{id}','DoctorController@update');
Route::DELETE('/doctors/{id}','DoctorController@destroy');

Route::POST('/hospitals','HospitalController@store');
Route::PATCH('/hospitals/{id}','HospitalController@update');
Route::DELETE('/hospitals/{id}','HospitalController@destroy');

Route::POST('/consultants','ConsultantController@store');
Route::PATCH('/consultants/{id}','ConsultantController@update');
Route::DELETE('/consultants/{id}','ConsultantController@destroy');

Route::POST('/physician','PhysicianController@store');
Route::PATCH('/physician/{id}','Physicianontroller@update');
Route::DELETE('/physician/{id}','PhysicianController@destroy');

Route::POST('/surgents','SurgentController@store');
Route::PATCH('/surgents/{id}','SurgentController@update');
Route::DELETE('/surgents/{id}','SurgentController@destroy');

Route::POST('/works','WorksController@store');
Route::PATCH('/works/{id}','WorksController@update');
Route::DELETE('/works/{id}','WorksController@destroy');

Route::POST('/locations','HospitallocationController@store');
Route::PATCH('/locations/{id}','HospitallocationController@update');
Route::DELETE('/locations/{id}','HospitallocationController@destroy');
