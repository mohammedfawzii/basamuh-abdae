<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Doctor\App\Http\Controllers\DoctorController;


route::get('doctors',[DoctorController::class,'index']);
route::post('doctor/create',[DoctorController::class,'store']);
route::get('doctor/{id}',[DoctorController::class,'show']);
route::post('doctor/update/{id}',[DoctorController::class,'update']);
Route::post('doctor/delete/{id}',[DoctorController::class,'destroy']);
