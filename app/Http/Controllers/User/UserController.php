<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Psy\Readline\Hoa\Console;


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
    public function chitiet($id) {
        $chitiet = DB::table('sanpham')
            ->where('sanpham.sp_id', $id)
            ->first();
        $trimmedArray = array_map('trim', explode('.', $chitiet->mota));
        return view('users.chitietsanpham',compact('chitiet', 'trimmedArray'));
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
                'sp.sp_id as sp_id',
                'size.ten as size', 
                'size.size_id as size_id', 
                'gh.soluong as soluong'
            )
            ->get();

        $tam_tinh = 0;
        foreach ($items as $item) {
            $tam_tinh += $item->gia * $item->soluong;
        }
        $phi_ship = 35000;
        $tong_tien = $tam_tinh + $phi_ship;

        return view('users.giohang', compact('items', 'tam_tinh', 'phi_ship', 'tong_tien'));
    }

// Cap nhat so luong san pham
    public function capnhatSoluong(Request $request)
    {
        $user_id = 'U01'; 
        $size_id = $request->size;
        $sp_id = $request->sp_id;
        $quantity = $request->quantity;

        $updated = DB::table('giohang')
            ->where('user_id', $user_id)
            ->where('sp_id', $sp_id)
            ->where('size_id', $size_id)
            ->update(['soluong' => $quantity]);

        if ($updated) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
// Xoa san pham 
    public function xoaGioHang(Request $request)
    {
        $user_id = 'U01';
        DB::table('giohang')
            ->where('user_id', $user_id)
            ->where('sp_id', $request->sp_id)
            ->where('size_id', $request->size_id)
            ->delete();

        return response()->json(['success' => true]);
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
