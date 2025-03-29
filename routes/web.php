<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\TestimonialController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('backend.pages.dashboard');
// });

// Route::get('/', function () {
//     return view('frontend.pages.home');
// });

Route::get('/',[HomeController::class, 'home']);

Route::prefix('admin')->group(function(){
    Route::get('/login',[LoginController::class, 'LoginPage'])->name('admin.loginpage');
    Route::post('/login',[LoginController::class,'login'])->name('admin.login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    // Route::middleware(['auth'])->group(function(){
    // });
    Route::get('/dashboard',[LoginController::class, 'DashboardPage'])->middleware([AuthenticateMiddleware::class])->name('admin.dashboard');

    Route::resource('/category', CategoryController::class);
    Route::resource('/testimonial', TestimonialController::class);
    Route::resource('/product', ProductController::class);
});

Route::prefix('user')->group(function(){
    Route::get('/login',[LoginController::class,'userLoginPage'])->name('user.loginpage');
});
