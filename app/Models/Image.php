<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'hinh_anh'; // Định nghĩa tên bảng
    protected $primaryKey = 'id'; // Khóa chính (nếu khác 'id' thì sửa lại)

    protected $fillable = [
        'idsp',  // Liên kết với sản phẩm
        'hinh',  // Đường dẫn ảnh
    ];

    // Liên kết với bảng sản phẩm
    public function sanPham()
    {
        return $this->belongsTo(Product::class, 'idsp');
    }
}
