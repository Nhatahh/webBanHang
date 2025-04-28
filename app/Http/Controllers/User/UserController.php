<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\Session;
use App\Models\User;


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

            if ($tongSoLuong > $sanpham->tonkho) {
                return response()->json(['status' => 'error', 'message' => 'Hết hàng!']);
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
            'tenTK'   => 'required|string|min:3|max:50|regex:/^[a-zA-Z0-9_]+$/|unique:taikhoan,tenTK',
            'email' => 'required|email',
            'diachi'  => 'required|string|max:255',
            'phone' => 'required|regex:/^0[0-9]{9}$/',
            'password' => 'required|min:3|confirmed',
        ], [
            'fullname.required'=> 'Vui lòng nhập họ tên',
            'tenTK.required'    => 'Tên tài khoản không được để trống!',
            'tenTK.regex'        => 'Tên tài khoản chỉ được chứa chữ cái, số và dấu gạch dưới!',
            'tenTK.min'          => 'Tên tài khoản phải có ít nhất 3 ký tự!',
            'tenTK.max'          => 'Tên tài khoản tối đa 50 ký tự!',
            'tenTK.unique'       => 'Tên tài khoản đã tồn tại!',
            'email.required'=> 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'diachi.required'   => 'Địa chỉ không được để trống!',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'password.required'=> 'Vui lòng nhập password',
            'password.min'=> 'Mật khẩu tối thiểu 3 ký tự',            
            'password.confirmed' => 'Mật khẩu xác nhận không khớp',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();
    
            // $maxId = DB::table('taikhoan')->max('user_id');
            // $newId = $maxId ? 'U' . str_pad(((int) substr($maxId, 1)) + 1, 4, '0', STR_PAD_LEFT) : 'U0001';
            $maxId = DB::table('taikhoan')->max(DB::raw('CAST(SUBSTRING(user_id, 2) AS UNSIGNED)'));
            $newId = 'U' . str_pad($maxId + 1, 4, '0', STR_PAD_LEFT);
            
            $data = [
                'user_id'  => $newId,
                'tenTK'    => $request->input('tenTK'),
                'matkhau'  => $request->input('password'),
                'quyen_id' => 'Q02',
                'hoten'    => $request->input('fullname'),
                'sdt'      => $request->input('phone'),
                'diachi'   => $request->input('diachi'),
                'email'    => $request->input('email'),
                'tt_id'    => 'TT03',
            ];
    
            $inserted = DB::table('taikhoan')->insert($data);
    
            if ($inserted) {
                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Đăng ký tài khoản thành công!'
                ]);
            } else {
                DB::rollBack();
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Đăng ký tài khoản thất bại!'
                ]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    




    public function xulydangnhap(Request $request) 
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ], [
        'email.required' => 'Vui lòng nhập email',
        'email.email' => 'Email không đúng định dạng',
        'password.required' => 'Vui lòng nhập password',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'errors' => $validator->errors()
        ], 422);
    }

    $user = User::where('email', $request->email)->first();

    if (!$user || $request->password !== $user->matkhau) {
        return response()->json([
            'status' => 'error',
            'message' => 'Email hoặc mật khẩu không đúng!'
        ], 401);
    }

    session([
        'user' => [
            'id' => $user->id,
            'hoten' => $user->hoten,
            'email' => $user->email,
            'quyen_id'=>$user->quyen_id
        ]
    ]);

    return response()->json([
        'status' => 'success',
        'role'=>$user->quyen_id
    ]);
}

    


    
    // // Cap nhat so luong san pham
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

}