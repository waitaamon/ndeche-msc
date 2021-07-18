<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () =>  view('welcome'));

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::get('investigators', fn() => view('investigators'))->name('investigators');

});
