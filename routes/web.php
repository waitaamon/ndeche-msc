<?php

use Illuminate\Support\Facades\Route;

Route::get('debug', [\App\Http\Controllers\HomeController::class, 'debug']);

Route::get('/', \App\Http\Controllers\HomeController::class);

Route::get('legal-case/{slug}', [\App\Http\Controllers\HomeController::class, 'show']);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('dashboard', [\App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

    Route::resource('users', \App\Http\Controllers\UsersController::class)->only('index', 'show');

    Route::resource('legal-cases', \App\Http\Controllers\LegalCasesController::class)->only('index', 'show');

    Route::get('publish-to-public/{legalCase}', [\App\Http\Controllers\LegalCasesController::class, 'publish']);
    Route::get('unpublish-to-public/{legalCase}', [\App\Http\Controllers\LegalCasesController::class, 'unpublish']);

    Route::resource('institutions', \App\Http\Controllers\InstitutionController::class)->only('index', 'show');


    Route::get('roles', [\App\Http\Controllers\RolesController::class, 'index'])->name('roles');

});
