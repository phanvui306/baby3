<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BlindboxController extends HomeController
{
    public function index()
    {
        $blindboxes = [
            ['id' => 1, 'name' => 'Gấu Bông Mystery Box', 'price' => '299,000 VND', 'image' => 'blindbox1.webp'],
            ['id' => 2, 'name' => 'Hộp Quà Bí Ẩn Deluxe', 'price' => '499,000 VND', 'image' => 'blindbox2.webp'],
            ['id' => 3, 'name' => 'Hộp Quà Bí Ẩn Deluxe1', 'price' => '499,000 VND', 'image' => 'blindbox3.webp'],
            ['id' => 4, 'name' => 'Hộp Quà Bí Ẩn Deluxe2', 'price' => '499,000 VND', 'image' => 'blindbox4.webp']
        ];
        return view('blindbox', compact('blindboxes'));
    }

    public function show($id)
    {
        $blindbox = [
            'id' => $id,
            'name' => 'Chi tiết Blindbox ' . $id,
            'description' => 'Thông tin chi tiết về sản phẩm Blindbox ' . $id,
            'price' => '299,000 VND',
            'image' => 'blindbox' . $id . '.webp'
        ];
        return view('blindbox-detail', compact('blindbox'));
    }
}