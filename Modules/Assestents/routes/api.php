<?php


use Illuminate\Support\Facades\Route;
use Modules\Assestents\App\Http\Controllers\AssestentsController;



    Route::get('assestent/',[AssestentsController::class,'index']);
    route::post('assestent/create',[AssestentsController::class,'store']);
    route::get('assestent/{id}',[AssestentsController::class,'show']);
    route::post('assestent/update/{id}',[AssestentsController::class,'update']);
    Route::post('assestent/delete/{id}',[AssestentsController::class,'destroy']);

