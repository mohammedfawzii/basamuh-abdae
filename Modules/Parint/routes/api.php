<?php

use Illuminate\Support\Facades\Route;
use Modules\Parint\App\Http\Controllers\ParintController;



Route::get('parints',[ParintController::class,'index']);
route::post('parint/create',[ParintController::class,'store']);
route::get('parint/{id}',[ParintController::class,'show']);
route::post('parint/update/{id}',[ParintController::class,'update']);
Route::post('parint/delete/{id}',[ParintController::class,'destroy']);

