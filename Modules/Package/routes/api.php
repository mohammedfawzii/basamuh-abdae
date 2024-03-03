<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Package\App\Http\Controllers\PackageController;


route::post('package/create',[PackageController::class,'store']);
