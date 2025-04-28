<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Psy\Readline\Hoa\Console;
use App\Models\Donhang;


class DonhangController extends Controller
{
    public function index()
    {
        $donhangs = DB::table('donhang')
            ->join('taikhoan', 'donhang.user_id', '=', 'taikhoan.user_id')
            ->join('ptthanhtoan', 'donhang.pttt_id', '=', 'ptthanhtoan.pttt_id')
            ->join('trangthai', 'donhang.tt_id', '=', 'trangthai.tt_id')
            ->select(
                'donhang.dh_id',
                'taikhoan.tentk',
                'trangthai.ten as tentt',
                'ptthanhtoan.ten as ptthanhtoan_ten',
                'donhang.created_at',
                'donhang.tt_id' 
            )
            ->orderBy('donhang.dh_id', 'asc')
            ->get();

        return response()->json([
            'data' => $donhangs
        ]);
    }

    public function updateTrangThai(Request $request)
    {
        $validated = $request->validate([
            'dh_id' => 'required|integer',
            'tt_id' => 'required|integer',
        ]);

        try {
            $updated = DB::table('donhang')
                ->where('dh_id', $validated['dh_id'])
                ->update(['tt_id' => $validated['tt_id']]);

            if ($updated) {
                return response()->json(['status' => 'success', 'message' => 'Cập nhật trạng thái thành công!']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }
}
