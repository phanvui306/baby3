<!DOCTYPE html>
<html lang="vi" ng-app="myApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>

<body ng-controller="SanPhamController">

    <h1>Cập nhật sản phẩm</h1>

    <label for="tensanpham">Tên sản phẩm</label>
    <input type="text" placeholder="Nhập tên sản phẩm" ng-model='sanpham.tensanpham'>

    <label for="loai">Loại</label>
    <select name="" id="" ng-model='sanpham.sphot'>
        <option value="1">Có</option>
        <option value="0">Không</option>
    </select>

    <label for="mota">Mô tả</label>
    <textarea name="" id="" cols="30" rows="10" ng-model='sanpham.mota'>Nhập mô tả</textarea>

    <label for="danhmuc">Chọn danh mục</label>
    <select name="" id="" ng-model='sanpham.iddanhmuc'
        ng-options='danhmuc.id as danhmuc.tendanhmuc for danhmuc in danhmucs'>
        <option value="">Chọn danh mục</option>
    </select>


    <div ng-repeat='variant in sanpham.variants'>

        <label for="mau">Màu sắc:</label>
        <input type="text" ng-model='variant.mau'>

        <label for="kichco">Kích thước</label>
        <input type="text" ng-model='variant.kichco'>

        <label for="gia">Giá</label>
        <input type="number" ng-model='variant.gia'>

        <button ng-click="xoaBienThe($index)">Xoá</button>

    </div>

    <button ng-click="themBienThe()">Thêm biến thể</button>

    <button ng-click="suaSanPham()">Cập nhật sản phẩm</button>
    <p style="color: green;" ng-if="thanhCong">@{{ thanhCong }}</p>



    <script>
        var app = angular.module('myApp', []);

        app.controller('SanPhamController', function($scope, $http, $location) {
            $scope.thanhCong = {};
            $scope.sanpham = {
                variants: []
            };

            var url = new URLSearchParams(window.location.search);
            var productId = url.get('id');

            $http.get('http://127.0.0.1:8000/api/categories')
                .then(function(response) {
                    $scope.danhmucs = response.data.danhmucs;
                })
                .catch(function(error) {
                    console.error('Lấy danh mục thất bại', error);
                });

            $http.get('http://127.0.0.1:8000/api/products/' + productId)
                .then(function(response) {
                    $scope.sanpham = response.data;
                    if (!$scope.sanpham.variants) {
                        $scope.sanpham.variants = [];
                    }
                })
                .catch(function(error) {
                    console.error('Lỗi khi lấy danh sách sản phảm', error);
                });

            // thêm biến thể
            $scope.themBienThe = function() {
                $scope.sanpham.variants.push({
                    mau: '',
                    kichco: '',
                    gia: ''
                });
            };

            // xoá biến thể
            $scope.xoaBienThe = function(index) {
                $scope.sanpham.variants.splice(index, 1);
            };

            // cập nhật sản phẩm

            $scope.suaSanPham = function() {
                // gửi yêu cầu

                $http.put('http://127.0.0.1:8000/api/products/' + $productId, $scope.sanpham)
                    .then(function(response) {
                        alert('Cập nhật sản phẩm thành công');
                        $scope.thanhCong = 'Cập nhật sản phẩm thành công!';
                    })
                    .catch(function(error) {
                        alert('có lỗi khi cập nhật sản phẩm' + error.message);
                    });
            };
        });
    </script>
</body>

</html>
