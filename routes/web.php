<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialLoginController;
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
Route::get('auth/google', [SocialLoginController::class, 'googleLogin'])->name('googleLogin');
Route::get('auth/google/callbaack', [SocialLoginController::class, 'googleLogin_redirect'])->name('googleLogin_redirect');


Route::get('auth/facebook', [SocialLoginController::class, 'facebookLogin'])->name('facebookLogin');
Route::get('auth/facebook/callbaack', [SocialLoginController::class, 'facebookLogin_redirect'])->name('facebookLogin_redirect');

Route::get('auth/github', [SocialLoginController::class, 'githubLogin'])->name('githubLogin');
Route::get('auth/github/callbaack', [SocialLoginController::class, 'githubLogin_redirect'])->name('githubLogin_redirect');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
