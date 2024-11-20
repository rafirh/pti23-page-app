<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\OrganizationController;
use App\Http\Controllers\Dashboard\ProfileController;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
    Route::get('/login/google', [AuthController::class, 'redirectToGoogle'])->name('auth.redirectToGoogle');
    Route::get('/login/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.handleGoogleCallback');
});

Route::redirect('/', '/login');

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/change-password', [AuthController::class, 'changePassword'])->name('auth.change-password');
    Route::put('/change-password', [AuthController::class, 'updatePassword'])->name('auth.update-password');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'admin/dashboard', 'as' => 'admin.dashboard.'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::resource('organizations', OrganizationController::class)->except('show', 'create');
});

Route::group(['middleware' => ['auth', 'role:student'], 'prefix' => 'student/dashboard', 'as' => 'student.dashboard.'], function () {
    Route::get('/home', function () {
        return 'Welcome to Student Dashboard';
    })->name('home.index');
});