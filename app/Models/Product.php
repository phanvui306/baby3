<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'san_pham'; // Khai báo tên bảng sản phẩm

    protected $fillable = ['tensanpham', 'mota', 'sphot', 'iddanhmuc']; // Các cột có thể thêm/sửa

    public function category()
    {
        return $this->belongsTo(Category::class, 'iddanhmuc');
    }

    public function hinhAnh()
    {
        return $this->hasMany(Image::class, 'idsp');
    }

    public function variants()
    {
        return $this->hasMany(BienThe::class, 'idsp');
    }
}
