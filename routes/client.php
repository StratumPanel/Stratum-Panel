<?php

use App\Http\Controllers\Client\Servers\DeletionController;
use App\Http\Controllers\Client\Servers\PowerController;
use App\Http\Controllers\Client\Servers\SecurityController;
use App\Http\Controllers\Client\Servers\ServerController;
use App\Http\Middleware\AuthenticateServerAccess;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [ServerController::class, 'index'])->name('dashboard');


Route::group(['prefix' => '/servers/{server}', 'middleware' => AuthenticateServerAccess::class], function () {
    Route::get('/', [ServerController::class, 'show'])->name('servers.show');
    Route::get('/security', [SecurityController::class, 'index'])->name('servers.show.security');
    Route::delete('/', [DeletionController::class, 'destroy'])->name('servers.show.delete');

    Route::group(['prefix' => '/power'], function () {
        Route::post('/start', [PowerController::class, 'start'])->name('servers.show.power.start');
        Route::post('/restart', [PowerController::class, 'restart'])->name('servers.show.power.restart');
        Route::post('/shutdown', [PowerController::class, 'shutdown'])->name('servers.show.power.shutdown');
        Route::post('/kill', [PowerController::class, 'kill'])->name('servers.show.power.kill');
    });
});