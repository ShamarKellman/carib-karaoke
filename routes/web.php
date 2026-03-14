<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Session\Middleware\AuthenticateSession;
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

Route::get('/', HomeController::class)->name('home');
Route::get('/search', SearchController::class)->name('search');

Route::middleware([
    'auth:sanctum',
    AuthenticateSession::class,
    'verified',
])->group(function () {
    Route::get('/favourites', function () {
        return view('favourites');
    })->name('favourites');

    Route::get('/user/profile', fn () => view('profile.show'))->name('profile.show');
});
