<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;

    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'khach_hang';  // Đảm bảo bảng đúng tên

    // Các trường có thể gán giá trị
    protected $fillable = [
        'hoten',      // Tên khách hàng
        'dienthoai',  // Số điện thoại khách hàng
        'email',      // Email khách hàng
        'diachi',     // Địa chỉ khách hàng
        'password',   // Mật khẩu khách hàng
        'role',       // Quyền của khách hàng (ví dụ: admin, user)
    ];

    // Mối quan hệ với bảng `don_hang`
    public function donhang()
    {
        return $this->hasMany(Order::class, 'idkhachhang');
    }
}
