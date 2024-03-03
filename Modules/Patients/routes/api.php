<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Patients\App\Http\Controllers\PatientsController;

route::get('patients',[PatientsController::class,'index']);
route::post('patient/create',[PatientsController::class,'store']);
route::get('patient/{id}',[PatientsController::class,'show']);
route::post('patient/update/{id}',[PatientsController::class,'update']);
Route::post('patient/delete/{id}',[PatientsController::class,'destroy']);
