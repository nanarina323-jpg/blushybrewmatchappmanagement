<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\CtgryController;
use App\Http\Controllers\DrinkflaController;
use App\Http\Controllers\AuthenticationController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('category', CtgryController::class);
    Route::resource('drinkflavour', DrinkflaController::class);
});

//create a route url
//url -> Route::get('the url', ['controller name'::class, 'function in controller']) -> 'name it (optional)'
//Route::resource('category', CtgryController::class)->middleware('auth');
//Route::get('category/{id}/edit', [CategoryController::class, 'edit']);
//Route::put('category/{id}', [CategoryController::class, 'update']);
//Route::delete('category/{id}', [CategoryController::class, 'destroy']);

//route for drink
//Route::resource('drink', DrinkController::class)->middleware('auth');
//Route::resource('drinkflavour', DrinkflaController::class)->middleware('auth');

//Route for login logout 
Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
Route::post('/loginProcess', [AuthenticationController::class, 'loginProcess'])->name('loginProcess');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');


