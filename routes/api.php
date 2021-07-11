<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//For Student Class API

Route::get('/class',[App\Http\Controllers\SclassController::class,'index']);

Route::get('/class/{id}',[App\Http\Controllers\SclassController::class,'show']);

Route::post('/class',[App\Http\Controllers\SclassController::class,'store']);

Route::delete('/class/{id}',[App\Http\Controllers\SclassController::class,'destroy']);

Route::patch('/class/{id}',[App\Http\Controllers\SclassController::class,'update']);

//Student Class API Ends

//For Subject Class API

Route::get('/subject',[App\Http\Controllers\SubjectController::class,'index']);

Route::post('/subject',[App\Http\Controllers\SubjectController::class,'store']);

Route::get('/subject/{id}',[App\Http\Controllers\SubjectController::class,'show']);

Route::patch('/subject/{id}',[App\Http\Controllers\SubjectController::class,'updateSub']);

Route::delete('/subject/{id}',[App\Http\Controllers\SubjectController::class,'destroy']);


//Subject Class Ends

//For Section Class API
Route::get('/section',[App\Http\Controllers\SectionController::class,'index']);

Route::post('/section',[App\Http\Controllers\SectionController::class,'store']);

Route::get('/section/{id}',[App\Http\Controllers\SectionController::class,'show']);

Route::patch('/section/{id}',[App\Http\Controllers\SectionController::class,'update']);

Route::delete('/section/{id}',[App\Http\Controllers\SectionController::class,'destroy']);

//Section Class Ends
//For Student Class API
Route::get('/student',[App\Http\Controllers\StudentController::class,'index']);

Route::post('/student',[App\Http\Controllers\StudentController::class,'store']);

Route::get('/student/{id}',[App\Http\Controllers\StudentController::class,'show']);

Route::delete('/student/{id}',[App\Http\Controllers\StudentController::class,'destroy']);

Route::patch('/student/{id}',[App\Http\Controllers\StudentController::class,'update']);


//Student Class Ends

//JWT Auth
Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', 'AuthController@register');

});