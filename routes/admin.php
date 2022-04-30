<?php

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Admin\Nodes\NodeController;
use App\Http\Controllers\Admin\Servers\ServerController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {
    Route::get('/', [BaseController::class, 'index'])->name('index');

    Route::name('nodes.')->prefix('nodes/health')->group(function () {
        Route::get('/', [NodeController::class, 'showHealth'])->name('health.show');

        Route::post('/tests', [NodeController::class, 'runTests'])->name('health.test');
    });

    Route::resource('nodes', NodeController::class);

    Route::resource('servers', ServerController::class);
});