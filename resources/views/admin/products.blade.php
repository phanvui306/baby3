@extends('admin.layout')

@section('content')
    <style>
        /* Reset mặc định của table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        /* Tiêu đề bảng */
        th {
            background-color: #4CAF50;
            color: white;
            text-align: left;
            padding: 10px 15px;
        }

        /* Dòng trong bảng */
        td {
            padding: 10px 15px;
            border: 1px solid #ddd;
        }

        /* Dòng của bảng khi hover */
        tr:hover {
            background-color: #f5f5f5;
        }

        /* Tạo viền cho bảng */
        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        /* Nút Sửa và Xóa */
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        button:hover {
            background-color: #45a049;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .delete-btn:hover {
            background-color: #e53935;
        }

        /* Cải thiện kiểu dáng của tiêu đề */
        h1 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        /* Thêm một số margin cho bảng */
        .table-container {
            margin: 0 auto;
            width: 80%;
        }

        /* Thêm style cho nút Xóa và Sửa */
        .action-btns {
            display: flex;
            align-items: flex-start;
        }

        .sort-container {
        display: flex;
        justify-content:space-between;
        align-items: flex-end; /* Căn chỉnh về phía trái */
    }
        .sort-select {
            background-color: #2196F3;
            padding: 10px;
            color: white;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            margin-bottom: 15px;
        }

        .sort-select:hover {
            background-color: #1976D2;
        }

        select {
            padding: 5px;
            font-size: 14px;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100px auto;
        }
        .btn-them{
            background: #1775F1;
            font-weight: 500;
            font-size: 14px;
        }
        .btn-them:hover{
            background: #0C5FCD;
        }
    </style>

    <body ng-controller="SanPhamController">
        <h1>Danh sách sản phẩm</h1>
        

        <div class="table-container">
            <div class="sort-container">
                <a href="{{route('products.create')}}"><button class="btn-them">Thêm mới</button></a>
                {{-- <label for="sort" class="sort-select">Sắp xếp theo:</label> --}}
                <select id="sort" ng-model="sortOrder" ng-change="sortByDate(sortOrder)">Sắp xếp theo
                    <option value="" disabled selected> Sắp xếp theo</option>
                    <option value="newest">Mới nhất</option>
                    <option value="oldest">Cũ nhất</option>
                </select>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên sản phẩm</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="product in sanphams | orderBy: 'created_at': reverseDate">
                        <td>@{{ product.id }}</td>
                        <td>@{{ product.tensanpham }}</td>
                        <td>@{{ product.created_at | date: 'dd/MM/yyyy HH:mm' }}</td>
                        <td class="action-btns">
                            <a href="/product/edit?id=@{{ product.id }}">
                                <button>Sửa</button>
                            </a>
                            <button class="delete-btn" ng-click="xoaSanPham(product.id)">Xóa</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script>
            var app = angular.module('myApp', []);

            app.controller('SanPhamController', function($scope, $http) {
                // Lấy danh sách sản phẩm từ API
                $http.get('http://127.0.0.1:8000/api/products')
                    .then(function(response) {
                        $scope.sanphams = response.data;
                    }, function(error) {
                        console.log('Lỗi khi gọi API', error);
                    });

                // Hàm xóa sản phẩm
                $scope.xoaSanPham = function(id) {
                    if (confirm("Bạn có chắc muốn xoá sản phẩm này không?")) {
                        $http.delete("http://127.0.0.1:8000/api/product/" + id)
                            .then(function(response) {
                                alert("Xóa sản phẩm thành công!");
                                // Cập nhật danh sách sản phẩm sau khi xóa
                                $scope.sanphams = $scope.sanphams.filter(p => p.id !== id);
                            })
                            .catch(function(error) {
                                console.error("Lỗi khi xoá sản phẩm", error);
                            });
                    }
                };

                $scope.sortByDate = function(sortOrder) {
                    if (sortOrder === 'newest') {
                        $scope.reverseDate = true; // Sắp xếp mới nhất trước
                    } else if (sortOrder === 'oldest') {
                        $scope.reverseDate = false; // Sắp xếp cũ nhất trước
                    }
                };
            });
        </script>
    @endsection
