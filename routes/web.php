<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/index',[PersonController::class,'index'])->name('index');

Route::get('/show/{personId}',[PersonController::class,'show']);

Route::get('/createPerson', [PersonController::class,'create'])->middleware('auth');
Route::post('/createPerson', [PersonController::class, 'store']);

Route::get('/testDegree', [TestController::class, 'testDegree']);

require __DIR__.'/auth.php';
