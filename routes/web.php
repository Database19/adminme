<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('default');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::group(['prefix' => 'master-data'], function () {
        Route::resource('customer', \App\Http\Controllers\MasterData\CustomerController::class);
        Route::resource('paket', \App\Http\Controllers\MasterData\PaketController::class);
    });


    Route::get('/logout', function() {
        return view('welcome');
    })->name('logout');
});
