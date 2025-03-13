<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController
{
    public function show($id)
    {
        $collections = [
            ['id' => 1, 'name' => 'Thú Bông Hot Trend', 'image' => 'collection1.webp', 'description' => 'Bộ sưu tập thú bông hot nhất hiện nay!'],
            ['id' => 2, 'name' => 'Hộp Quà Bí Ẩn Deluxe', 'image' => 'collection2.webp', 'description' => 'Bộ sưu tập hộp quà bí ẩn cực kỳ thú vị!'],
            ['id' => 3, 'name' => 'Gấu Bông Dễ Thương', 'image' => 'collection3.webp', 'description' => 'Gấu bông siêu mềm và dễ thương!']
        ];

        // Tìm collection theo ID
        $collection = collect($collections)->firstWhere('id', $id);

        if (!$collection) {
            abort(404, 'Bộ sưu tập không tồn tại');
        }

        return view('collection', compact('collection'));
    }
}
