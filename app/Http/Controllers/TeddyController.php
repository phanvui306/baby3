<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeddyController
{
    public function index()
    {
        $teddies = [
            ['id' => 1, 'name' => 'Gấu Bông Pollu', 'price' => '299,000 VND', 'image' => 'teddy1.webp'],
            ['id' => 2, 'name' => 'Hộp Quà Bí Ẩn Deluxe', 'price' => '499,000 VND', 'image' => 'teddy2.webp'],
            ['id' => 3, 'name' => 'Hộp Quà Bí Ẩn Deluxe1', 'price' => '499,000 VND', 'image' => 'teddy3.webp'],
            ['id' => 4, 'name' => 'Hộp Quà Bí Ẩn Deluxe2', 'price' => '499,000 VND', 'image' => 'teddy4.webp']
        ];
        return view('teddy', compact('teddies'));
    }

    public function show($id)
    {
        $teddy = [
            'id' => $id,
            'name' => 'Chi tiết Teddy ' . $id,
            'description' => 'Thông tin chi tiết về sản phẩm Teddy ' . $id,
            'price' => '299,000 VND',
            'image' => 'teddy' . $id . '.webp'
        ];
        return view('teddy-detail', compact('teddy'));
    }
}
