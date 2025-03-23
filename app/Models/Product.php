<?php

namespace App\Models;

use App\Http\Controllers\DanhMuc;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'san_pham';

    protected $fillable = ['tensanpham', 'mota', 'sphot', 'iddanhmuc']; // Định nghĩa các cột có thể thêm/sửa
    public function category(){
        return $this->belongsTo(DanhMuc::class, 'iddanhmuc');
    }
}
