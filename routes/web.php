<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AppLinkController;
use App\Http\Controllers\DownloadClickController;
use App\Http\Controllers\DashboardStatsController;
use Illuminate\Support\Facades\Auth;

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

Route::post('/logout', function () {
    Auth::logout(); // Log out the user
    return redirect('/'); // Redirect to the home page
})->name('logout');


Route::get('/', [AppLinkController::class, 'showLanding']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard')->middleware('auth','admin');

// web.php
Route::get('/admin/subscribers', [AdminController::class, 'subscribers'])->name('admin.subscribers');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/download/{platform}', [DownloadClickController::class, 'track'])->name('track.download');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/admin/save-app-links', [\App\Http\Controllers\AppLinkController::class, 'save'])->name('admin.save-app-links');

Route::get('/admin/get-dashboard-stats', [DashboardStatsController::class, 'index'])->name('admin.get-dashboard-stats');

// Route::get('/admin/subscribers/show', [AdminController::class, 'show']);
Route::get('/admin/subscribers/export', [AdminController::class, 'export']);

