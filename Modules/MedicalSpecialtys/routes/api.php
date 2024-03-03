<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\MedicalSpecialtys\App\Http\Controllers\MedicalSpecialtysController;

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

route::get('medicalspecialtys',[MedicalSpecialtysController::class,'index']);//->middleware('auth:sanctum');
route::post('medicalspecialty/create',[MedicalSpecialtysController::class,'store']);//->middleware('auth:sanctum');
route::get('medicalspecialty/{id}',[MedicalSpecialtysController::class,'show']);//->middleware('auth:sanctum');
route::post('medicalspecialty/update/{id}',[MedicalSpecialtysController::class,'update']);//->middleware('auth:sanctum');
Route::post('medicalspecialty/delete/{id}',[MedicalSpecialtysController::class,'destroy']);//->middleware('auth:sanctum');
