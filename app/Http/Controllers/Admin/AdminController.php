<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\Sanpham;




class AdminController extends Controller
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
        $sanphams = DB::table('sanpham')->get();
        return view('admin.sanpham', compact('sanphams'));
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
    //Thêm sản phẩm
    public function addSP(Request $request) {
        try {
            DB::beginTransaction();
            $maxId = DB::table('sanpham')->max('sp_id');
            $newId = $maxId + 1;
            $hinhanhPath = null;
            $hinhanhName = $request->input('imgIP');

            if (!empty($hinhanhName)) {
                $hinhanhPath =$hinhanhName;
            }
            $data = [
                'sp_id' => $newId,
                'tensp' => $request->input('sanphamInput'),
                'hinhanh' => $hinhanhPath, 
                'mota' => $request->input('motaInput'),
                'gia' => $request->input('giaInput'),
                'tl_id' => $request->input('select2DM'),
                'tonkho' => $request->input('tonkhoInput'),
            ];
            $inserted = DB::table('sanpham')->insert($data);
            if ($inserted == 1) {
                DB::commit();
                return 1;
            } else {
                DB::rollBack();
                return 0;
            }
        } catch (Exception $e) {
            DB::rollBack();
            return -1;
        }
    }
    public function removeSP($id)
{
    try {
        DB::beginTransaction();
        $deleted = DB::table('sanpham')
                    ->where('sp_id', $id)
                    ->delete();
        if ($deleted == 1) {
            DB::commit();
            return 1;
        } else {
            DB::rollBack();
            return 0;
        }
    } catch (Exception $e) {
        DB::rollBack();
        return -1;
    }
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

    //Load dữ liệu ban đầu cho Form thêm
    function select2Quyen(){
        return $this-> load_seclectbox('quyen', 'quyen_id', 'ten', 0, '--- Chọn quyền ---');
    }
    function select2TT(){
        return $this-> load_seclectbox('trangthai', 'tt_id', 'ten', 0, '--- Chọn trạng thái ---');
    }
    function select2DM(){
        return $this-> load_seclectbox('theloai', 'tl_id', 'ten', 0, '--- Chọn danh mục ---');
    }
    




}