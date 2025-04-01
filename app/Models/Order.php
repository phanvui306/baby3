<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'don_hang';

    protected $fillable = [
        'khach_hang_id',
        'tong_tien',
        'trang_thai',
        'ghi_chu'
    ];

    public function khachhang(){
        return $this->belongsTo(khachhang::class, 'khach_hang_id');
    }

    public function chitietdonhang(){
        return $this->hasMany(chitietdonhang::class, 'don_hang_id');
    }
}
