<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;

    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'chi_tiet_don_hang';

    // Các trường có thể gán giá trị
    protected $fillable = [
        'soluong',     // Số lượng sản phẩm
        'dongia',      // Đơn giá
        'iddonhang',   // ID của đơn hàng
        'idbienthe'    // ID của biến thể (nếu có, ví dụ màu sắc, kích thước)
    ];

    // Mối quan hệ với bảng `don_hang`
    public function donhang()
    {
        return $this->belongsTo(Order::class, 'iddonhang');
    }

    // Nếu có quan hệ với bảng `sanpham` hoặc bảng khác cho biến thể
    // public function sanpham()
    // {
    //     return $this->belongsTo(SanPham::class, 'idbienthe');
    // }

    // Mối quan hệ với bảng `bien_the`
    public function bienthe()
    {
        return $this->belongsTo(BienThe::class, 'idbienthe');
    }
}
