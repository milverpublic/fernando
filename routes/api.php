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

Route::post('auth/login', 'Auth\AuthController@login');
Route::post('auth/register', 'Auth\AuthController@register');

Route::post('auth/password/email', 'Auth\PasswordResetController@sendResetLinkEmail');
Route::get('auth/password/verify', 'Auth\PasswordResetController@verify');
Route::post('auth/password/reset', 'Auth\PasswordResetController@reset');


//protected API routes with JWT (must be logged in)
//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');
Route::group(['namespace' => 'API', 'middleware' => 'auth:api'], function () {
    Route::resource('people', 'PersonAPIController');
    Route::get('peoplepacient/{id}', 'PersonAPIController@getPacient');

    Route::resource('pacients', 'PacientAPIController');

    Route::resource('control_sheets', 'ControlSheetAPIController');


    Route::resource('controls', 'ControlAPIController');

    Route::resource('comments', 'CommentAPIController');
    

    Route::resource('history_clinics', 'HistoryClinicAPIController');

    Route::resource('sections', 'SectionAPIController');
    Route::get('section','SectionAPIController@sections');
    Route::get('questionsforms/{id}','SectionAPIController@questions');

    Route::resource('questions', 'QuestionAPIController');

    Route::resource('response_questions', 'ResponseQuestionAPIController');
    Route::get('section/{section}/history/{history}', 'ResponseQuestionAPIController@showResponsesQuestions');

    Route::get('me','UserAPIController@getMe');

});