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
use App\Models\Trangthai;




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
    public function donhang() {
        return view('admin.donhang');
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
    // Xóa sản phẩm
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

    public function getDanhSach()
    {
        // Lấy danh sách đơn hàng
        $data = DB::table('donhang as dh')
            ->leftJoin('taikhoan as tk', 'dh.user_id', '=', 'tk.user_id')
            ->leftJoin('trangthai as tt', 'dh.tt_id', '=', 'tt.tt_id')
            ->leftJoin('ptthanhtoan as pt', 'dh.pttt_id', '=', 'pt.pttt_id')
            ->select(
                'dh.dh_id as dh_id',
                'tk.tentk as tentk',
                'tt.ten as tt',
                'dh.created_at as created_at',
                'dh.tongtien as tongtien',
                'pt.ten as phuongthucthanhtoan'
            )
            ->orderBy('dh.dh_id', 'desc')
            ->get();

        // Trả về dữ liệu dưới dạng JSON
        return response()->json(['data' => $data]);
    }

    // Phương thức lấy chi tiết đơn hàng theo dh_id
    public function getChiTietDonHang($dh_id)
    {
        $data = DB::table('chitietdonhang as ctdh')
        ->leftJoin('sanpham as sp', 'ctdh.sp_id', '=', 'sp.sp_id')
        ->leftJoin('size', 'ctdh.size_id', '=', 'size.size_id')
        ->select(
            'sp.tensp as tensp',
            'size.ten as size',
            'ctdh.soluong as soluong',
            'ctdh.dongia as dongia',
            'ctdh.thanhtien as thanhtien'
        )
        ->where('ctdh.dh_id', $dh_id)
        ->get();

    // Trả dữ liệu dưới dạng JSON
    return response()->json(['data' => $data]);
    }

    public function updateTrangthai(Request $request)
    {
        $dh_id = $request->dh_id;
        $status = $request->status;

        try {
            DB::table('donhang')
                ->where('dh_id', $dh_id)
                ->update(['tt_id' => $status]);

            return response()->json(['status' => 'success', 'message' => 'Cập nhật trạng thái thành công!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Có lỗi xảy ra!!!']);
        }
    }
    // Thêm danh mục
    public function addDM(Request $request) {
        $validator = Validator::make($request->all(), [
            'dmInput'   => 'required'
        ], [
            'dmInput.required'    => 'Tên danh mục không được để trống!',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $maxId = DB::table('theloai')->max('tl_id');
            $newId = $maxId + 1;

            $data = [
                'tl_id' => $newId,
                'ten'   => $request->input('dmInput'),
            ];

            $inserted = DB::table('theloai')->insert($data);

            if ($inserted) {
                DB::commit();
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Thêm danh mục thành công!'
                ]);
            } else {
                DB::rollBack();
                return response()->json([
                    'status'  => 'fail',
                    'message' => 'Thêm danh mục thất bại!'
                ]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => 'error',
                'message' => 'Có lỗi hệ thống: ' . $e->getMessage()
            ], 500);
        }
    }
    // Xóa danh mục
    public function removeDM($id)
    {
        try {
            DB::beginTransaction();
            $deleted = DB::table('theloai')
                        ->where('tl_id', $id)
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
    // Xóa tài khoản
    public function removeTK($id)
    {
        try {
            DB::beginTransaction();
            $deleted = DB::table('taikhoan')
                ->where('user_id', $id)
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

}