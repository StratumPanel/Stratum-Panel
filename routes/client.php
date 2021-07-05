<?php

use App\Http\Controllers\Client\Servers\ServerController;
use App\Policies\ServerPolicy;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [ServerController::class, 'index'])->name('dashboard');


Route::group(['prefix' => '/servers', 'middleware' => 'can:view,server'], function () {
    Route::get('/{server}', [ServerController::class, 'show'])->name('servers.show');
});