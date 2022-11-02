<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () { 
            
    Route::get('/login/form', [AdminController::class, 'adminLoginForm'])->name('login.form');
    Route::post('/login', [AdminController::class, 'adminLogin'])->name('login');

    
});
Route::group(['middleware'=>'admin'], function () { 
Route::get('/admin/Dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
});