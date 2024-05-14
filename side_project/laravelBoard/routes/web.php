<?php

use App\Http\Controllers\BoardController;
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

// ----------------------------
// 유저 관련
// ----------------------------
Route::get('/', function () {
    return view('login');
})->name('get.login');

Route::post('/login', [UserController::class, 'login'])->name('post.login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// 이메일체크
Route::post('/user/chk', [UserController::class, 'emailChk']);

// Route::get('/regist', [UserController::class, 'regist])->name('regist');

Route::get('/regist', function () {
    return view('regist');
})->name('regist.index');

Route::post('/regist', [UserController::class, 'regist'])->name('regist.store');



// ----------------------------
// 게시판 관련
// ----------------------------
Route::middleware('auth')->resource('/board', BoardController::class);