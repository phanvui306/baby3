<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'don_hang';

    protected $fillable = [
        'idkhachhang',
        'tong_tienww',
        'trang_thai',
        'ghi_chu'
    ];

    public function khachhang(){
        return $this->belongsTo(khachhang::class, 'idkhachhang');
    }

    public function chitietdonhang(){
        return $this->hasMany(chitietdonhang::class, 'iddonhang');
    }
}
