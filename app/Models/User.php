<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // ✅ Ghi rõ bảng
    protected $table = 'taikhoan';

    // ✅ Ghi rõ khóa chính
    protected $primaryKey = 'user_id';

    // ✅ Nếu khóa chính KHÔNG phải dạng số tự tăng
    public $incrementing = false;

    // ✅ Kiểu khóa chính
    protected $keyType = 'string';

    // ✅ Bỏ tự động cập nhật timestamps
    public $timestamps = false;

    // ✅ Các cột cho phép gán
    protected $fillable = [
        'user_id',
        'tenTK',
        'matkhau',
        'sdt',
        'email',
        'diachi',
        'hoten',
        'quyen_id',
        'tt_id',
    ];

    // ✅ Các cột cần ẩn khi trả JSON (nếu có)
    protected $hidden = [
        'matkhau',
    ];
}
