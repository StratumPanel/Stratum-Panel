<?php

use App\Http\Controllers\Client\Servers\SettingsController;
use App\Http\Controllers\Client\Servers\PowerController;
use App\Http\Controllers\Client\Servers\SecurityController;
use App\Http\Controllers\Client\Servers\ServerController;
use App\Http\Controllers\Client\Servers\SnapshotController;
use App\Http\Controllers\Client\Servers\StatusController;
use App\Http\Middleware\AuthenticateServerAccess;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [ServerController::class, 'index'])->name('dashboard');


Route::group(['prefix' => '/servers/{server}', 'middleware' => AuthenticateServerAccess::class], function () {

    Route::get('/', [ServerController::class, 'show'])->name('servers.show');

    Route::get('/security', [SecurityController::class, 'index'])->name('servers.show.security');

    Route::get('/status', [StatusController::class, 'show'])->name('servers.show.status');

    Route::group(['prefix' => '/power'], function () {
        Route::post('/start', [PowerController::class, 'start'])->name('servers.show.power.start');
        Route::post('/restart', [PowerController::class, 'restart'])->name('servers.show.power.restart');
        Route::post('/shutdown', [PowerController::class, 'shutdown'])->name('servers.show.power.shutdown');
        Route::post('/kill', [PowerController::class, 'kill'])->name('servers.show.power.kill');
    });

    Route::group(['prefix' => '/snapshots'], function() {
        Route::get('/', [SnapshotController::class, 'index'])->name('servers.show.snapshots');
        Route::post('/rollback', [SnapshotController::class, 'rollback'])->name('servers.show.snapshots.rollback');
        Route::post('/delete', [SnapshotController::class, 'delete'])->name('servers.show.snapshots.delete');
        Route::post('/create', [SnapshotController::class, 'create'])->name('servers.show.snapshots.create');
    });

    Route::group(['prefix' => '/settings'], function() {
        Route::get('/', [SettingsController::class, 'index'])->name('servers.show.settings');
        Route::put('/', [SettingsController::class, 'update'])->name('servers.show.settings.update');
    });
});