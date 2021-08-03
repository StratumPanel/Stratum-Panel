<?php

use App\Http\Controllers\Client\Servers\DeletionController;
use App\Http\Controllers\Client\Servers\ServerController;
use App\Http\Middleware\AuthenticateServerAccess;
use App\Policies\ServerPolicy;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [ServerController::class, 'index'])->name('dashboard');


Route::group(['prefix' => '/servers', 'middleware' => AuthenticateServerAccess::class], function () {
    Route::get('/{server}', [ServerController::class, 'show'])->name('servers.show');
    Route::delete('/{server}', [DeletionController::class, 'destroy'])->name('servers.delete');
});