<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;

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
    return view('users.index');
});

Route::prefix('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'home'])->name('admin.home');

    Route::get('/banhang', [AdminController::class, 'banhang'])->name('admin.banhang');

    Route::get('/danhmuc', [AdminController::class, 'danhmuc'])->name('admin.danhmuc');

    Route::get('/khuyenmai', [AdminController::class, 'khuyenmai'])->name('admin.khuyenmai');

    Route::get('/magiamgia', [AdminController::class, 'magiamgia'])->name('admin.magiamgia');

    Route::get('/sanpham', [AdminController::class, 'sanpham'])->name('admin.sanpham');

    Route::get('/taikhoan', [AdminController::class, 'taikhoan'])->name('admin.taikhoan');

    Route::get('/thongke', [AdminController::class, 'thongke'])->name('admin.thongke');

});

Route::prefix('user')->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('home.index');






});
