<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories'; // Đảm bảo đúng tên bảng

    protected $fillable = ['name', 'slug']; // Cho phép insert/update các cột này
}
