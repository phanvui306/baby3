                @extends('admin.layout')


                @section('content')
                    <div class="container">
                        <h2>Sửa danh mục</h2>
                        <form action="{{ route('danhmuc.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="tendanhmuc">Tên danh mục:</label>
                                <input type="text" name="tendanhmuc" value="{{ old('tendanhmuc', $category->tendanhmuc) }}"
                                    class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                @endsection
