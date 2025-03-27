<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    // Khai báo tên bảng nếu khác với chuẩn Laravel (mặc định sẽ là "don_hangs")
    protected $table = 'don_hang';

    // Khai báo khóa chính nếu không phải là 'id'
    protected $primaryKey = 'id';

    // Nếu không dùng timestamps (created_at, updated_at), đặt false
    public $timestamps = true;

    // Cho phép cập nhật các cột này
    protected $fillable = [
        'khach_hang_id',
        'tong_tien',
        'trang_thai',
        'ghi_chu'
    ];

    // Quan hệ với bảng `khach_hang`
    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'khach_hang_id');
    }

    // Quan hệ với bảng `chi_tiet_don_hang`
    public function chiTietDonHang()
    {
        return $this->hasMany(ChiTietDonHang::class, 'don_hang_id');
    }
}
