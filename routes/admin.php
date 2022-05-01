<?php

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Admin\Nodes\NodeController;
use App\Http\Controllers\Admin\Servers\ServerController;
use App\Http\Controllers\Admin\Users\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;

Route::name('admin.')->group(function () {
    Route::get('/', [BaseController::class, 'index'])->name('index');

    Route::name('nodes.')->prefix('nodes/health')->group(function () {
        Route::get('/', [NodeController::class, 'showHealth'])->name('health.show');

        Route::post('/tests', [NodeController::class, 'runTests'])->name('health.test');
    });

    Route::resource('nodes', NodeController::class);


    Route::prefix('servers')->put('/{server}/update-owner', [ServerController::class, 'updateOwner'])->name('servers.update-owner');
    Route::resource('servers', ServerController::class);

    Route::prefix('users')->group(function() {
        Route::get('/search', function (Request $request) {
            return User::search($request->search)->get();
        })->name('users.search');

    });

    Route::resource('users', UserController::class);
});