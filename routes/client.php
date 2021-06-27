<?php

use App\Http\Controllers\Client\Servers\ServerController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [ServerController::class, 'index'])->name('dashboard');


Route::group(['prefix' => '/servers'], function () {
    Route::get('/{server}', [ServerController::class, 'show'])->name('servers.show');
});