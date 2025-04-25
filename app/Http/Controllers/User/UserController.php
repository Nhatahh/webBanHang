<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function home() {
        $sanphams = DB::table('sanpham')->get();
        return view('users.index', compact('sanphams'));
    }    
    public function tatcasp() {
        $sanphams = DB::table('sanpham')->get();
        return view('users.tatcasanpham', compact('sanphams'));
    }
    public function ao() {
        $sanphams = DB::table('sanpham as sp')
            ->leftJoin('theloai', 'theloai.tl_id', '=', 'sp.tl_id')
            ->where('theloai.ten', 'ao')
            ->get();
        return view('users.ao', compact('sanphams'));
    }
    public function quan() {
        $sanphams = DB::table('sanpham as sp')
            ->leftJoin('theloai', 'theloai.tl_id', '=', 'sp.tl_id')
            ->where('theloai.ten', 'quan')
            ->get();
        return view('users.quan', compact('sanphams'));
    }
    public function chitiet() {
        return view('users.chitietsanpham');
    }
    public function dangky() {
        return view('users.dangky');
    }
    public function dangnhap() {
        return view('users.dangnhap');
    }
    public function giohang() {
        $user_id = 'U01'; 
        $items = DB::table('giohang as gh')
            ->leftJoin('taikhoan as tk', 'tk.user_id', '=', 'gh.user_id')
            ->leftJoin('sanpham as sp', 'sp.sp_id', '=', 'gh.sp_id')
            ->leftJoin('size', 'size.size_id', '=', 'gh.size_id')
            ->where('gh.user_id', $user_id)
            ->select(
                'sp.tensp',
                'sp.hinhanh as hinhanh',
                'sp.gia as gia',
                'size.ten as size', 
                'gh.soluong as soluong'
            )
            ->get();
        return view('users.giohang', compact('items'));
    }
    public function membership() {
        return view('users.membership');
    }
    public function ptthanhtoan() {
        return view('users.phuongthucthanhtoan');
    }
    public function chinhsach() {
        return view('users.chinhsach');
    }


}
