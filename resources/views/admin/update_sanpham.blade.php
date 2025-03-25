<!DOCTYPE html>
<html lang="vi" ng-app="myApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật Sản Phẩm</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>

<body ng-controller="SanPhamController">
    <h1>Cập nhật sản phẩm</h1>

    <label for="tensanpham">Tên sản phẩm</label>
    <input type="text" ng-model="product.tensanpham" placeholder="Nhập tên sản phẩm">

    <label for="mota">Mô tả</label>
    <textarea ng-model="product.mota" placeholder="Nhập mô tả"></textarea>

    <label for="danhmuc">Chọn danh mục</label>
    <select ng-model="product.iddanhmuc" 
            ng-options="danhmuc.id as danhmuc.tendanhmuc for danhmuc in danhmucs">
        <option value="">Chọn danh mục</option>
    </select>

    <button ng-click="capNhatSanPham()">Cập nhật</button>

    <p style="color: green;" ng-if="thanhCong">@{{ thanhCong }}</p>

    <script>
        var app = angular.module('myApp', []);

        app.controller('SanPhamController', function($scope, $http) {
            // Lấy ID sản phẩm từ URL
            var urlParams = new URLSearchParams(window.location.search);
            var id = urlParams.get('id');

            $scope.thanhCong = "";
            $scope.product = {};

            // Lấy danh sách danh mục
            $http.get('http://127.0.0.1:8000/api/categories')
                .then(function(response) {
                    $scope.danhmucs = response.data.danhmucs;
                });

            // Lấy thông tin sản phẩm cần sửa
            $http.get('http://127.0.0.1:8000/api/products/' + id)
                .then(function(response) {
                    $scope.product = response.data.product;
                })
                .catch(function(error) {
                    console.log("Lỗi khi lấy thông tin sản phẩm", error);
                });

            // Cập nhật sản phẩm
            $scope.capNhatSanPham = function() {
                $http.put('http://127.0.0.1:8000/api/products/' + id, $scope.product)
                    .then(function(response) {
                        $scope.thanhCong = response.data.message;
                    })
                    .catch(function(error) {
                        console.log("Lỗi khi cập nhật sản phẩm", error);
                    });
            };
        });
    </script>
</body>

</html>
