<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $fillable = [
        'sp_id', 'tensp', 'hinhanh', 'mota', 'gia', 'tl_id', 'tonkho', 'created_at',
    ];
    public $timestamps = true;
}