<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Psy\Readline\Hoa\Console;
use App\Models\Trangthai;


class TrangthaiController extends Controller
{
    public function index()
    {
        $trangthai = Trangthai::all();

        return response()->json([
            'data' => $trangthai
        ]);
    }
}
