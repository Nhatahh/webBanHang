<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Psy\Readline\Hoa\Console;
use Exception;

class DanhmucController extends Controller
{
    // Thêm mới danh mục
    public function addDM(Request $request) {
        try {
            DB::beginTransaction();

            $maxId = DB::table('theloai')->max('tl_id');
            $newId = $maxId + 1;

            $data = [
                'tl_id' => $newId,
                'ten' => $request->input('sanphamInput'),
            ];
            dd($data);
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
}
