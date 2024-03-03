<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Employees\App\Http\Controllers\EmployeesController;

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
Route::get('employe/',[EmployeesController::class,'index']);
route::post('employe/create',[EmployeesController::class,'store']);
route::get('employe/{id}',[EmployeesController::class,'show']);
route::post('employe/update/{id}',[EmployeesController::class,'update']);
Route::post('employe/delete/{id}',[EmployeesController::class,'destroy']);
