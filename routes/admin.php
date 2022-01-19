<?php

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Admin\Nodes\NodeController;
use App\Http\Controllers\Admin\Servers\ServerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BaseController::class, 'index'])->name('admin.index');

Route::group(['prefix' => '/nodes'], function() {
    Route::get('/', [NodeController::class, 'index'])->name('admin.nodes.index');
    Route::post('/', [NodeController::class, 'store'])->name('admin.nodes.store');

    Route::get('/health', [NodeController::class, 'showHealth'])->name('admin.nodes.health.show');
});

Route::group(['prefix' => '/servers'], function() {
    Route::get('/', [ServerController::class, 'index'])->name('admin.servers.index');
});