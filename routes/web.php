<?php
use App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Backend\DashboardController::class)->name('dashboard');
    Route::resource('categories', Backend\CategoryController::class);
    Route::resource('projects', Backend\ProjectController::class);
});

require __DIR__.'/auth.php';
