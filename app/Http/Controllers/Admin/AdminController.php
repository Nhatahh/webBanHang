<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function home() {
        return view('admin.index');
    }
    public function banhang() {
        return view('admin.banhang');
    }
    public function danhmuc() {
        return view('admin.danhmuc');
    }
    public function khuyenmai() {
        return view('admin.khuyenmai');
    }
    public function magiamgia() {
        return view('admin.magiamgia');
    }
    public function sanpham() {
        $sanphams = DB::table('sanpham')->get();
        return view('admin.sanpham', compact('sanphams'));
    }
    public function taikhoan() {
        return view('admin.taikhoan');
    }
    public function thongke() {
        return view('admin.thongke');
    }


}