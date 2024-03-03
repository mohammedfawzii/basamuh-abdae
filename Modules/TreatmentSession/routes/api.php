<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\TreatmentSession\App\Http\Controllers\TreatmentSessionController;

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

//Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
//    Route::get('treatmentsession', fn (Request $request) => $request->user())->name('treatmentsession');
//});
route::get('treatmentsession',[TreatmentSessionController::class,'index']);
route::post('treatmentsession/create',[TreatmentSessionController::class,'store']);
route::get('treatmentsession/{id}',[TreatmentSessionController::class,'show']);
route::post('treatmentsession/update/{id}',[TreatmentSessionController::class,'update']);
Route::post('treatmentsession/delete/{id}',[TreatmentSessionController::class,'destroy']);
