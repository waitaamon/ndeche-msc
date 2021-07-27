<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () =>  view('welcome'));

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::resource('users', \App\Http\Controllers\UsersController::class)->only('index', 'show');

    Route::get('institutions', fn() => view('institutions'))->name('institutions');


    Route::get('roles', [\App\Http\Controllers\RolesController::class, 'index'])->name('roles');

});
