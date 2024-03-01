<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController; //ゲストログイン用
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController; //タスク機能

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
//最初の画面
Route::get('/welcome', function () {
    return view('welcome');
});

//ゲストログイン処理
Route::get('/login/guest', [AuthenticatedSessionController::class, 'guestLogin']);

//インデックス画面
Route::get('tasks/index', [TaskController::class, 'index'])->name('tasks.index');

//prefixでtasksがつくルーティングをグループ化して省略
Route::prefix('tasks')->middleware(['auth'])
    ->controller(TaskController::class)
    ->name('tasks.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/', 'create')->name('create');
        Route::post('/', 'store')->name('store'); //DB登録するのでpostにする
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}', 'update')->name('update'); //更新処理なのでpostにする
        Route::post('/{id}/destroy', 'destroy')->name('destroy');
    });

//ログイン画面
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//プロフィール画面
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
