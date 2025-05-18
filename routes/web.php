<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index',[PersonController::class,'index']);

Route::get('/show/{personId}',[PersonController::class,'show']);

Route::post('/createPerson', [PersonController::class,'create']);
