<?php

use App\Http\Controllers\Admin\Servers\TemplateController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Client\Servers\SnapshotController;
use App\Http\Controllers\Client\Servers\StatusController;

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

Route::get('/api/status/{server}', [StatusController::class, 'show'])->name('status'); // For some reason this wasn't working in api.php, will look into it later
Route::post('/api/snapshot/{server}/take', [SnapshotController::class, 'index'])->name('snapshot');
Route::get('/api/snapshot/{server}/fetch', [SnapshotController::class, 'fetch'])->name('fetchsnapshots');
Route::get('/api/templates/{server}/create', [TemplateController::class, 'createTemplateFromVM'])->name('createtemplates');
Route::get('/api/create/{server}', [\App\Http\Controllers\Admin\Servers\CreationController::class, 'create'])->name('createtempla2asdtes');
