<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test API Thêm Danh Mục</title>
</head>
<body>

    <h2>Thêm danh mục</h2>

    <form action="{{ route('danhmuc.store') }}" method="POST">
        @csrf  {{-- Bắt buộc để tránh lỗi 419 --}}
        <label for="tendanhmuc">Tên danh mục:</label>
        <input type="text" name="tendanhmuc" id="tendanhmuc" required>
        <button type="submit">Gửi</button>
    </form>

</body>
</html>
