<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
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

Route::get('/', [AuthController::class,'index'])->name('login');
Route::post('/verify', [AuthController::class,'verifyLogin'])->name('verify.login');
Route::get('logout', [AuthController::class,'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
        Route::get('users',[AdminController::class,'users'])->name('users');
        Route::get('penomoran/restart',[AdminController::class,'restart'])->name('restart');
        Route::put('penomoran/update',[AdminController::class,'updateNoUrut'])->name('update.no.urut');
        Route::get('penomoran/history',[AdminController::class,'history'])->name('history');
        Route::get('bglogin',[AdminController::class,'ubahBgLogin'])->name('ubah.Bg.Login');
        Route::post('bglogin',[AdminController::class,'updateBackground'])->name('update.Bg.Login');
    });

    Route::prefix('staff')->name('staff.')->group(function () {
        Route::get('dashboard',[StaffController::class,'dashboard'])->name('dashboard');
        Route::get('penomoran',[StaffController::class,'penomoran'])->name('penomoran');
        Route::get('penomoran/export-import',[StaffController::class,'exportimport'])->name('exportimport');
    });

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('ubah-password',[UserController::class,'ubahPasword'])->name('ubah.password');
        Route::put('ubah-passwrod',[UserController::class,'update'])->name('update');
    });
});
