<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    use HasFactory;

    protected $table = 'donhang';

    protected $fillable = [
        'dh_id', 
        'user_id', 
        'tongtien',
        'tt_id',
        'pttt_id',
        'created_at',
    ];

    public $timestamps = true; // Nếu bảng không có cột updated_at, created_at
}
