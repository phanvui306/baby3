@extends('admin.layout')


@section('content')
<body ng-controller="DanhMucController">
    <h1>Danh sách danh mục</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên danh mục</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat='danhmuc in danhmucs'>
                <td>@{{ danhmuc.id }}</td>
                <td>@{{ danhmuc.tendanhmuc }}</td>
                <td>@{{ danhmuc.create }}</td>
                <td>
                    <a href="/danhmuc/edit?id= @{{ danhmuc.id }}"><button>Sửa</button></a>
                    <button ng-click="xoaDanhMuc(danhmuc.id)">Xóa</button>
                </td>
            </tr>
        </tbody>
    </table>

    <script>
        var app = angular.module('myApp', []);

        app.controller('DanhMucController', function($scope, $http) {
            $http.get('http://127.0.0.1:8000/api/categories')
                .then(function(response) {
                    $scope.danhmucs = response.data.danhmucs;
                }, function(error) {
                    console.log('Loi khi goi api:', error);
                });

                // Hàm xóa danh mục
        $scope.xoaDanhMuc = function(id) {
            if (confirm("Bạn có chắc chắn muốn xóa danh mục này không?")) {
                $http.delete('http://127.0.0.1:8000/api/categories/' + id)
                    .then(function(response) {
                        alert(response.data.message);
                        
                    })
                    .catch(function(error) {
                        console.log("Lỗi khi xóa danh mục", error);
                    });
            }
        };
        });
        
    </script>
@endsection
