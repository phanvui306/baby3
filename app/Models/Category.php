<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'danh_muc'; // Tên bảng trong database

    protected $fillable = ['tendanhmuc'];

    public function sanpham(){
        return $this->hasMany(sanpham::class, 'iddanhmuc');
    }
}
