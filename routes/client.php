<?php

use App\Http\Controllers\Client\Servers\CloudinitController;
use App\Http\Controllers\Client\Servers\PerformanceController;
use App\Http\Controllers\Client\Servers\SettingsController;
use App\Http\Controllers\Client\Servers\PowerController;
use App\Http\Controllers\Client\Servers\SecurityController;
use App\Http\Controllers\Client\Servers\ServerController;
use App\Http\Controllers\Client\Servers\SnapshotController;
use App\Http\Controllers\Client\Servers\StatusController;
use App\Http\Middleware\AuthenticateServerAccess;
use App\Http\Middleware\VerifyCloudinitEnabled;
use Illuminate\Support\Facades\Route;


Route::get('/', [ServerController::class, 'index'])->name('dashboard');


Route::group(['prefix' => '/servers/{server}', 'middleware' => AuthenticateServerAccess::class], function () {

    Route::get('/', [ServerController::class, 'show'])->name('servers.show');

    Route::group(['prefix' => '/security'], function () {
        Route::get('/', [SecurityController::class, 'index'])->name('servers.show.security');

        Route::middleware([VerifyCloudinitEnabled::class])->group(function () {
            Route::put('/password', [CloudinitController::class, 'updatePassword'])->name('servers.show.security.password.update');
        });
    });

    Route::get('/status', [StatusController::class, 'show'])->name('servers.show.status');
    Route::get('/config', [CloudinitController::class, 'fetchConfig'])->name('servers.show.config');

    Route::group(['prefix' => '/power'], function () {
        Route::post('/start', [PowerController::class, 'start'])->name('servers.show.power.start');
        Route::post('/restart', [PowerController::class, 'restart'])->name('servers.show.power.restart');
        Route::post('/shutdown', [PowerController::class, 'shutdown'])->name('servers.show.power.shutdown');
        Route::post('/kill', [PowerController::class, 'kill'])->name('servers.show.power.kill');
    });

    Route::group(['prefix' => '/snapshots'], function() {
        Route::get('/', [SnapshotController::class, 'index'])->name('servers.show.snapshots.index');
        Route::post('/rollback', [SnapshotController::class, 'rollback'])->name('servers.show.snapshots.rollback');
        Route::post('/delete', [SnapshotController::class, 'delete'])->name('servers.show.snapshots.delete');
        Route::post('/create', [SnapshotController::class, 'create'])->name('servers.show.snapshots.create');
    });

    Route::group(['prefix' => '/settings'], function() {
        Route::get('/', [SettingsController::class, 'index'])->name('servers.show.settings');
        Route::put('/display', [SettingsController::class, 'update'])->name('servers.show.settings.display.update');


        Route::middleware([VerifyCloudinitEnabled::class])->group(function () {
            Route::put('/bios', [CloudinitController::class, 'updateBios'])->name('servers.show.settings.bios.update');
            Route::put('/network', [CloudinitController::class, 'updateNetworkConfig'])->name('servers.show.settings.network.update');
        });
    });

    Route::get('/performance', [PerformanceController::class, 'index'])->name('servers.show.performance.index');
});