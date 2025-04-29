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
    function load_seclectbox($table,$feild_id,$feild_text,$seclected_id,$text_0){
        $data0 = new Collection([
            'id' => 0,
            'text' => $text_0,
            'selected' =>'selected'
        ]);
        $data = DB::table($table)->select($feild_id." as id",$feild_text." as text")->get();
        $i = 0;
        foreach ($data as $value) {
            if($value->id == $seclected_id){
                $value->selected =  'selected';
                $i++;
            }else{
                $value->selected =  '';
            }
        }
        if( $i == 1){
            $data[] = new Collection([
                'id' => 0,
                'text' => $text_0,
                'selected' =>''
            ]);
        }else{
            $data[] = new Collection([
                'id' => 0,
                'text' => $text_0,
                'selected' =>'selected'
            ]);
        }
        return $data;
    }
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
        $user_id = '1'; 
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

        return view('users.giohang', compact('items', 'tam_tinh', 'phi_ship', 'tong_tien', 'user_id'));
    }

// Cap nhat so luong san pham
    public function capnhatSoluong(Request $request)
    {
        $user_id = '1'; 
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
        $user_id = '1';
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

    public function themgiohang(Request $request)
    {
        try {
            $validated = $request->validate([
                'size' => 'required|in:S,M,L',
                'soluong' => 'required|integer|min:1',
                'sp_id' => 'required',
            ]);

            $user_id = '1'; 
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

            if ($tongSoLuong > $sanpham->tonkho) {
                return response()->json(['status' => 'error', 'message' => 'Hết hàng!']);
            }

            if ($cartItem) {
                DB::table('giohang')
                    ->where('id', $cartItem->id)
                    ->update(['soluong' => $tongSoLuong]);
            } else {
                $gh_id = DB::table('giohang')->max('id') + 1;

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

    public function thanhtoan(Request $request)
    {
        $user_id = $request->user_id;
        $pttt_id = $request->pttt_id; 

        DB::beginTransaction();

        try {
            $gioHangItems = DB::table('giohang')
                ->where('user_id', $user_id)
                ->get();

            if ($gioHangItems->isEmpty()) {
                return response()->json(['status' => 'error', 'message' => 'Giỏ hàng trống!']);
            }

            $tongTien = 0;
            foreach ($gioHangItems as $item) {
                $sanPham = DB::table('sanpham')->where('sp_id', $item->sp_id)->first();
                $gia = $sanPham->gia;
                $tongTien += $item->soluong * $gia;
            }

            $dh_id = DB::table('donhang')->max('dh_id') ?? 0;
            $newdh_id = $dh_id + 1;
            $data = [
                'dh_id' => $newdh_id,
                'user_id' => $user_id,
                'tongtien' => $tongTien,
                'tt_id' => '2',
                'pttt_id' => $pttt_id,
                'created_at' => now(),
            ];
            DB::table('donhang')->insert($data);

            foreach ($gioHangItems as $item) {
                $sanPham = DB::table('sanpham')
                    ->where('sp_id', $item->sp_id)
                    ->first();

                $gia = $sanPham->gia;

                $maxId = DB::table('chitietdonhang')->max('ctdh_id') ?? 0;
                $newId = $maxId + 1;
                DB::table('chitietdonhang')->insert([
                    'ctdh_id' => $newId,
                    'dh_id' => $newdh_id,
                    'sp_id' => $item->sp_id,
                    'size_id' => $item->size_id,
                    'soluong' => $item->soluong,
                    'dongia' => $gia,
                    'thanhtien' => $item->soluong * $gia,
                ]);
            }

            // Xóa giỏ hàng sau khi thanh toán
            DB::table('giohang')
                ->where('user_id', $user_id)
                ->delete();

            DB::commit();

            return response()->json(['status' => 'success', 'message' => 'Thanh toán thành công!']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }

    function select2PTTT(){
        return $this-> load_seclectbox('ptthanhtoan', 'pttt_id', 'ten', 0, '--- Chọn phương thức thanh toán ---');
    }





}
