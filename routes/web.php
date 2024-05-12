<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;

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

// Home page
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        $user = Auth::user();
        return Inertia::render('index', [
            'user' => $user,
        ]);
    })->name('index');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});



Route::middleware(['guest'])->group(function () {
    Route::get('/login',[AuthController::class,'login_view'])->name('login_view');
    Route::get('/register',[AuthController::class,'register_view'])->name('register_view');
    Route::post('/register',[AuthController::class,'register'])->name('register');
    Route::post('/login',[AuthController::class,'login'])->name('login');
});



