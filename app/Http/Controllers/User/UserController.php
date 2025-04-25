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


}
