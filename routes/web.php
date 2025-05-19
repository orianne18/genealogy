<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index',[PersonController::class,'index'])->name('index');

Route::get('/show/{personId}',[PersonController::class,'show']);

Route::get('/createPerson', [PersonController::class,'create']);
Route::post('/createPerson', [PersonController::class, 'store']);
