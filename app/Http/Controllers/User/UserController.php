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


    public function themgiohang(Request $request)
    {
        try {
            $validated = $request->validate([
                'size' => 'required|in:S,M,L',
                'soluong' => 'required|integer|min:1',
                'sp_id' => 'required',
            ]);

            $user_id = 'U01'; // Tạm thời
            $size_id = [
                'S' => 'S01',
                'M' => 'M01',
                'L' => 'L01',
            ][$validated['size']];

            $sanpham = DB::table('sanpham')->where('sp_id', $validated['sp_id'])->first();

            if (!$sanpham) {
                return response()->json(['status' => 'error', 'message' => 'Sản phẩm không tồn tại!']);
            }

            $cartItem = DB::table('giohang')
                ->where([
                    ['user_id', $user_id],
                    ['sp_id', $validated['sp_id']],
                    ['size_id', $size_id],
                ])
                ->first();

            $tongSoLuong = ($cartItem->soluong ?? 0) + $validated['soluong'];

            if ($tongSoLuong > $sanpham->soluong) {
                return response()->json(['status' => 'error', 'message' => 'Số lượng yêu cầu vượt quá tồn kho!']);
            }

            if ($cartItem) {
                DB::table('giohang')
                    ->where('id', $cartItem->id)
                    ->update(['soluong' => $tongSoLuong]);
            } else {
                $gh_id = 'GH' . str_pad(DB::table('giohang')->max('id') + 1, 3, '0', STR_PAD_LEFT);

                DB::table('giohang')->insert([
                    'gh_id' => $gh_id,
                    'user_id' => $user_id,
                    'sp_id' => $validated['sp_id'],
                    'size_id' => $size_id,
                    'soluong' => $validated['soluong'],
                ]);
            }

            return response()->json(['status' => 'success', 'message' => 'Đã thêm sản phẩm vào giỏ hàng thành công!']);

        } catch (\Exception $e) {
            
            return response()->json([
                'status' => 'error',
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage(),
            ]);
        }
    }




    public function dangky() {
        return view('users.dangky');
    }
    public function dangnhap() {
        return view('users.dangnhap');
    }
    public function giohang() {
        // $user_id = Auth::user()->user_id;
        $user_id = 'U01';
        $items = DB::table('giohang as gh')
            ->leftJoin('taikhoan as tk', 'tk.user_id', '=', 'gh.user_id')
            ->leftJoin('sanpham as sp', 'sp.sp_id', '=', 'gh.sp_id')
            ->leftJoin('size', 'size.size_id', '=', 'gh.size_id')
            ->where('gh.user_id', $user_id)
            ->select(
                'sp.sp_id as sp_id',
                'sp.tensp',
                'sp.hinhanh as hinhanh',
                'sp.gia as gia',
                'sp.gia as sp_id',
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

    public function xulydangky(Request $request) {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^0[0-9]{9}$/',
            'password' => 'required|min:3|confirmed',
        ], [
            'fullname.required'=> 'Vui lòng nhập họ tên',
            'email.required'=> 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'password.required'=> 'Vui lòng nhập password',
            'password.min'=> 'Mật khẩu tối thiểu 3 ký tự',            
            'password.confirmed' => 'Mật khẩu xác nhận không khớp',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return redirect()->route('user.dangnhap')->with('success', 'Đăng ký thành công!');
    }


    public function xulydangnhap(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ], [
            'email.required'=> 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required'=> 'Vui lòng nhập password',   
            'password.confirmed' => 'Mật khẩu xác nhận không khớp',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return redirect()->route('user.home')->with('success', 'Đăng ký thành công!');
    }

}
