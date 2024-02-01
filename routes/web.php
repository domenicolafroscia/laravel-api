<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TrashedController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);
        Route::get('trashed', [TrashedController::class, 'index'])->name('projects.trashed');
        Route::put('restore/{id}', [TrashedController::class, 'restore'])->name('projects.restore');
        Route::delete('defDestroy/{id}', [TrashedController::class, 'defDestroy'])->name('projects.defDestroy');
        Route::resource('types', TypeController::class)->parameters(['types' => 'type:slug']);
    });

require __DIR__.'/auth.php';
