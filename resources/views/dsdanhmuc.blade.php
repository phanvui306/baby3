<div class="container">
    <h2>Danh sách danh mục</h2>
    <a href="{{ route('danhmuc.them') }}" class="btn btn-success mb-3">Thêm danh mục</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->tendanhmuc }}</td>
                <td>
                    <a href="{{ route('danhmuc.sua', $category->id) }}" class="btn btn-warning">Sửa</a>
                    {{-- <form action="{{ route('danhmuc.xoa', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>