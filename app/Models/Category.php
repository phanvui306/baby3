<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'danh_muc'; // Khai báo tên bảng trong database

    protected $fillable = ['tendanhmuc']; // Các cột có thể thêm/sửa

    public function products()
    {
        return $this->hasMany(Product::class, 'iddanhmuc');
    }
}
