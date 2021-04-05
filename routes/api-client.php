<?php

use Illuminate\Support\Facades\Route;
use Stratum\Http\Controllers\Api\Client\AccountController;
use Stratum\Http\Controllers\Api\Client\Servers\PowerController;
use Stratum\Http\Controllers\Api\Client\Servers\StatusController;

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
    Route::post('/{server}/start', [PowerController::class, 'start']);
    Route::post('/{server}/reboot', [PowerController::class, 'reboot']);
    Route::get('/{server}/kill', [PowerController::class, 'kill']);
    Route::post('/{server}/shutdown', [PowerController::class, 'shutdown']);

    // Server Information (uptime, power, etc)
    Route::get('/{server}/status', [StatusController::class, 'handle']);
});
