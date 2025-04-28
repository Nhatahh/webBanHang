<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\SearchController;

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
    return redirect()->route('user.home'); 
});

Route::prefix('admin')->group(function () {
    Route::get('/taikhoan', [AdminController::class, 'taikhoan'])->name('admin.taikhoan');
    Route::get('/loadTK', [AdminController::class, 'loadTK'])->name('admin.loadTK');

    Route::get('/banhang', [AdminController::class, 'banhang'])->name('admin.banhang');

    Route::get('/danhmuc', [AdminController::class, 'danhmuc'])->name('admin.danhmuc');
    Route::get('/loadDM', [AdminController::class, 'loadDM'])->name('admin.loadDM');

    Route::get('/khuyenmai', [AdminController::class, 'khuyenmai'])->name('admin.khuyenmai');

    Route::get('/magiamgia', [AdminController::class, 'magiamgia'])->name('admin.magiamgia');

    Route::get('/sanpham', [AdminController::class, 'sanpham'])->name('admin.sanpham');
    // Route::get('/addSP', [AdminController::class, 'addSP'])->name('admin.addSP');
    Route::get('/loadSP', [AdminController::class, 'loadSP'])->name('admin.loadSP');

    Route::get('/thongke', [AdminController::class, 'thongke'])->name('admin.thongke');

});
Route::get('/select2Quyen', [AdminController::class, 'select2Quyen'])->name('select2Quyen');
Route::get('/select2TT', [AdminController::class, 'select2TT'])->name('select2TT');
Route::get('/select2DM', [AdminController::class, 'select2DM'])->name('select2DM');  
Route::post('/addSP', [AdminController::class, 'addSP'])->name('addSP');  
Route::delete('/removeSP/{id}', [AdminController::class, 'removeSP'])->name('removeSP');  

Route::prefix('user')->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('user.home');

    Route::get('/ao', [UserController::class, 'ao'])->name('user.ao');

    Route::get('/chinhsach', [UserController::class, 'chinhsach'])->name('user.chinhsach');

    Route::get('/chitiet/{id}', [UserController::class, 'chitiet'])->name('user.chitiet');
    Route::post('/themgiohang', [UserController::class, 'themgiohang'])->name('user.themgiohang');

    Route::get('/dangky', [UserController::class, 'dangky'])->name('user.dangky');
    Route::post('/xuly-dangky', [UserController::class, 'xulydangky'])->name('user.xulydangky');

    Route::get('/dangnhap', [UserController::class, 'dangnhap'])->name('user.dangnhap');
    Route::post('/xuly-dangnhap', [UserController::class, 'xulydangnhap'])->name('user.xulydangnhap');

    Route::get('/giohang', [UserController::class, 'giohang'])->name('user.giohang');
    Route::post('giohang/capnhat', [UserController::class, 'capnhatSoluong'])->name('user.giohang.capnhat'); 
    Route::post('giohang/xoa', [UserController::class, 'xoaGioHang'])->name('user.giohang.xoa');


    Route::get('/membership', [UserController::class, 'membership'])->name('user.membership');

    Route::get('/ptthanhtoan', [UserController::class, 'ptthanhtoan'])->name('user.ptthanhtoan');

    Route::get('/quan', [UserController::class, 'quan'])->name('user.quan');

    Route::get('/tatcasp', [UserController::class, 'tatcasp'])->name('user.tatcasp');

    Route::get('/search', [SearchController::class, 'search'])->name('user.search');

});


