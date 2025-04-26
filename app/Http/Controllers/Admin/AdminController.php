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
    public function banhang() {
        return view('admin.banhang');
    }
    public function danhmuc() {
        return view('admin.danhmuc');
    }
    //Load dữ liệu vào bảng dsDM
    function loadDM() {
        $data = DB::table('theloai')            
        ->orderBy('theloai.tl_id','desc')
        ->select('theloai.*')
        ->get();

        return response()->json(['data' => $data]);
    }
    public function khuyenmai() {
        return view('admin.khuyenmai');
    }
    public function magiamgia() {
        return view('admin.magiamgia');
    }
    public function sanpham() {
        return view('admin.sanpham');
    }
    //Load dữ liệu vào bảng dsSP
    function loadSP() {
        $data = DB::table('sanpham')            
        ->leftJoin('theloai', 'theloai.tl_id', 'sanpham.tl_id')
        ->select('sanpham.*', 'theloai.ten as tentheloai')
        ->orderBy('sanpham.sp_id','desc')
        ->get();

        return response()->json(['data' => $data]);
    }
    public function taikhoan() {
        return view('admin.taikhoan');
    }
    //Load dữ liệu vào bảng dsTK
    function loadTK() {
        $data = DB::table('taikhoan')            
        ->leftJoin('quyen', 'quyen.quyen_id', 'taikhoan.quyen_id')
        ->leftJoin('trangthai', 'trangthai.tt_id', 'taikhoan.tt_id')
        ->select('taikhoan.*', 'quyen.ten as tenquyen', 'trangthai.ten as tentrangthai')
        ->orderBy('taikhoan.user_id','desc')
        ->get();

        return response()->json(['data' => $data]);
    }
    public function thongke() {
        return view('admin.thongke');
    }


}