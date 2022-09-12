<?php
use App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', Backend\DashboardController::class)->name('dashboard');
    Route::resource('users', Backend\UserController::class);
    Route::resource('partners', Backend\PartnerController::class);
    Route::resource('categories', Backend\CategoryController::class);
    Route::resource('projects', Backend\ProjectController::class);
    Route::resource('settings', Backend\SettingController::class);
});

require __DIR__.'/auth.php';
