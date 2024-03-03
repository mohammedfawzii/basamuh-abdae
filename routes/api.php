<?php

use App\Http\Controllers\Controller;
//use App\Models\User;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register',[Controller::class,'register']);
Route::post('login',[Controller::class,'login']);
Route::post('logout', [Controller::class, 'logout']);
//middleware('auth:sanctum')->
