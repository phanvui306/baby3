<div class="container">
    <h2>Thêm Sản Phẩm</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('sanpham.store') }}" method="POST">
    @csrf  {{-- Bắt buộc để tránh lỗi 419 Page Expired --}}
    <label for="tensanpham">Tên sản phẩm:</label>
    <input type="text" name="tensanpham" required>

    <label for="mota">Mô tả:</label>
    <textarea name="mota" required></textarea>

    <label for="iddanhmuc">Danh mục:</label>
    <select name="iddanhmuc" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->tendanhmuc }}</option>
        @endforeach
    </select>

    <label for="sphot">Sản phẩm hot:</label>
    <input type="checkbox" name="sphot" value="1">

    <button type="submit">Thêm sản phẩm</button>
</form>

</div>