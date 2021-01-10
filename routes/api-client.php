<?php

use Illuminate\Support\Facades\Route;
use Stratum\Http\Controllers\Api\Client\AccountController;
use Stratum\Http\Controllers\Api\Client\Servers\ServerPowerController;
use Stratum\Http\Controllers\Api\Client\Servers\ServerStatusController;

/*
|--------------------------------------------------------------------------
| Client Control API
|--------------------------------------------------------------------------
|
| Endpoint: /api/client
|
*/

Route::group(['prefix' => '/account'], function () {
    Route::get('/', [AccountController::class, 'index']);
});

/*
|--------------------------------------------------------------------------
| Client Control API
|--------------------------------------------------------------------------
|
| Endpoint: /api/client/servers/{server}
|
*/
Route::group(['prefix' => '/servers'], function () {
    // Power Options, pretty self explanatory
    Route::post('/{server}/start', [ServerPowerController::class, 'start']);
    Route::post('/{server}/reboot', [ServerPowerController::class, 'reboot']);
    Route::post('/{server}/kill', [ServerPowerController::class, 'kill']);
    Route::post('/{server}/shutdown', [ServerPowerController::class, 'shutdown']);

    // Server Information (uptime, power, etc)
    Route::post('/{server}/status', [ServerStatusController::class, 'handle']);
});
