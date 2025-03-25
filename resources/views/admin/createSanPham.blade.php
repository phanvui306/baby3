<!DOCTYPE html>
<html lang="vi" ng-app="myApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>

<body ng-controller="SanPhamController">
    <h1>Thêm sản phẩm mới</h1>

    <label for="tensanpham">Tên sản phẩm</label>
    <input type="text" ng-model='newProduct.tensanpham' placeholder="Nhập tên sản phẩm">

    <label for="mota">Mô tả</label>
    <textarea ng-model='newProduct.mota' placeholder="Nhập mô tả"></textarea>

    <label for="danhmuc">Chọn danh mục</label>
    <select ng-model="newProduct.iddanhmuc" 
            ng-options="danhmuc.id as danhmuc.tendanhmuc for danhmuc in danhmucs">
        <option value="">Chọn danh mục</option>
    </select>

    <button ng-click="themSanPham()">Thêm sản phẩm</button>

    <p style="color: green;" ng-if="thanhCong">@{{ thanhCong }}</p>

    <script>
        var app = angular.module('myApp', []);

        app.controller('SanPhamController', function($scope, $http) {
            $scope.newProduct= {};
            $scope.thanhCong = "";

            // Lấy danh sách danh mục
            $http.get('http://127.0.0.1:8000/api/categories')
                .then(function(response) {
                    console.log(response.data); // Kiểm tra dữ liệu trả về
                    $scope.danhmucs = response.data.danhmucs; // Gán danh mục vào scope
                })
                .catch(function(error) {
                    console.log("Lỗi khi lấy danh mục", error);
                });

            // API thêm sản phẩm
            $scope.themSanPham = function() {
                $http.post("http://127.0.0.1:8000/api/products", $scope.newProduct)
                    .then(function(response) {
                        $scope.thanhCong = response.data.message;
                        $scope.newProduct = {}; // Reset form sau khi thêm thành công
                    })
                    .catch(function(error) {
                        console.log("Lỗi khi thêm sản phẩm", error);
                    });
            };
        });
    </script>
</body>

</html>
