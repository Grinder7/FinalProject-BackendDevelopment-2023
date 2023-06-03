<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShoppingController;
use Illuminate\Support\Facades\App;
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

Route::get('/', [AppController::class, 'home'])->name('app.home');

Route::get('catalogue', [ProductController::class, 'index'])->name('catalogue.index');
Route::post('catalogue', [ShoppingController::class], 'store')->name('session.store');

Route::get('aboutus', [AppController::class, 'aboutus'])->name('app.aboutus');

Route::get('checkout', [PaymentController::class, 'index'])->name('app.checkout')->middleware('auth');

Route::get('logout', [LoginController::class, 'destroy'])->name('logout');

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login.page');
    Route::post('login', [LoginController::class, 'store'])->name('login');

    Route::get('register', [RegisterController::class, 'index'])->name('register.page');
    Route::post('register', [RegisterController::class, 'store'])->name('register');
});

Route::fallback(function () {
    return redirect()->route('app.home');
});

// Route::get('/', function () {
//     return view('welcome');
// });
