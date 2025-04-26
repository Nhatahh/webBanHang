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
        return view('users.index');
    }
    public function ao() {
        return view('users.ao');
    }
    public function chinhsach() {
        return view('users.chinhsach');
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
        return view('users.giohang');
    }
    public function membership() {
        return view('users.membership');
    }
    public function ptthanhtoan() {
        return view('users.phuongthucthanhtoan');
    }
    public function quan() {
        return view('users.quan');
    }
    public function tatcasp() {
        return view('users.tatcasanpham');
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
