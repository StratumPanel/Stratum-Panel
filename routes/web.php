<?php

use Carbon\Traits\Test;
use Illuminate\Support\Facades\Route;
use Stratum\Http\Controllers\DeploymentController;
use Stratum\Http\Controllers\Api\Client\Servers\ServerPowerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{any}', function () {
    return view('test');
})->where('any', '(.*)');

/* Hello Syntax, I'm back doing work I swear */