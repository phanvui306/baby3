<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items'; // Đảm bảo tên bảng đúng
    protected $fillable = ['user_id', 'product_id', 'quantity']; // Chỉnh sửa theo cấu trúc database
    public function product()
{
    return $this->belongsTo(Product::class, 'product_id');
}

}
