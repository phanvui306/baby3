@extends('admin.layout')


@section('content')

    <h2>Thêm danh mục</h2>

    <form action="{{ route('danhmuc.store') }}" method="POST">
        @csrf  {{-- Bắt buộc để tránh lỗi 419 --}}
        <label for="tendanhmuc">Tên danh mục:</label>
        <input type="text" name="tendanhmuc" id="tendanhmuc" required>
        <button type="submit">Gửi</button>
    </form>

@endsection
