<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CatalogueController;
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

Route::get('/catalogue', [CatalogueController::class, 'index'])->name('catalogue.index');

Route::fallback(function () {
    return redirect()->route('app.home');
});

// Route::get('/', function () {
//     return view('welcome');
// });
