<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trangthai extends Model
{
    use HasFactory;

    protected $table = 'trangthai'; 

    public $timestamps = false; 

    protected $fillable = [
        'tt_id', 'ten' 
    ];
}
