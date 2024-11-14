<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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
    return redirect()->route('goLogin');
});
// 로그인관련
Route::get('/login',[UserController::class, 'gologin'])->name('goLogin');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


// 게시판
Route::middleware('auth')->resource('/boards', BoardController::class)->except(['update', 'edit']);
Route::middleware('auth')->post('/boards/insert', [BoardController::class, 'insert'])->name('insert');

Route::get('/register',[RegisterController::class, 'goRegister'])->name('goRegister');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

