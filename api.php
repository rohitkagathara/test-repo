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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

// //FrontEnd routes
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
   // $exitCode6 = Artisan::call('config:cache');
    return '<h1>Cache facade value cleared</h1>';
});

Route::post('login', 'API\UserController@login');
Route::post('forgotpassword','API\UserController@forgotpassword');
Route::post('allstudentlist','API\UserController@allstudentlist');
Route::post('allschoollist','API\UserController@allschoollist');
Route::post('allapplicationlist','API\UserController@allapplicationlist');


Route::post('register', 'API\UserController@register');
Route::get('get-school', 'API\UserController@getSchool');
Route::get('school-detail/{id}', 'API\UserController@schoolDetail');
Route::post('save-school-images', 'API\UserController@schoolImages')->name('school.images');

Route::group(['middleware' => 'auth:api'], function()
{
    Route::post('changepassword', 'API\UserController@changePassword');
    Route::post('user-details', 'API\UserController@details');
	Route::post('post-school', 'API\UserController@registerSchool');
	Route::post('student-save-school', 'API\UserController@schollSaveByStudent');
	Route::get('get-school-saved-by-student', 'API\UserController@getSchoolSavedByStudent');
    Route::patch('update-school-profile', 'API\UserController@updateSchool');
    Route::post('post-enquiry', 'API\UserController@createEnquiry');
    Route::get('get-enquiry', 'API\UserController@getEnquiry');
    Route::patch('update-enquiry-status/{id}', 'API\UserController@updateEnquiryStatus');
    

});

