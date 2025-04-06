<!DOCTYPE html>
<html lang="vi" ng-app="myApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>

<body ng-controller="SanPhamController">

    <h1>Thêm Sản Phẩm</h1>

    <label for="tensanpham">Tên sản phẩm</label>
    <input type="text" ng-model="sanpham.tensanpham" placeholder="Nhập tên sản phẩm" required>

    <label for="mota">Mô tả</label>
    <textarea ng-model="sanpham.mota" placeholder="Nhập mô tả"></textarea>

    <label for="danhmuc">Chọn danh mục</label>
    <select ng-model="sanpham.iddanhmuc" ng-options="danhmuc.id as danhmuc.tendanhmuc for danhmuc in danhmucs" required>
        <option value="">Chọn danh mục</option>
    </select>

    <h2>Thêm Biến Thể</h2>
    <div ng-repeat="variant in sanpham.variants">
        <label for="mau">Màu sắc:</label>
        <input type="text" ng-model="variant.mau" placeholder="Nhập màu sắc" required>

        <label for="kichco">Kích thước:</label>
        <input type="text" ng-model="variant.kichco" placeholder="Nhập kích thước" required>

        <label for="gia">Giá:</label>
        <input type="number" ng-model="variant.gia" placeholder="Nhập giá" required>

        <button ng-click="xoaBienThe($index)">Xóa</button>
    </div>

    <button ng-click="themBienThe()">+ Thêm Biến Thể</button>

    <button ng-click="themSanPham()"
        ng-disabled="!sanpham.tensanpham || !sanpham.iddanhmuc || sanpham.variants.length === 0">Thêm Sản Phẩm</button>

    <p style="color: green;" ng-if="thanhCong">@{{ thanhCong }}</p>

    <script>
        var app = angular.module('myApp', []);

        app.controller('SanPhamController', function($scope, $http) {
            $scope.sanpham = {
                variants: []
            };

            // Lấy danh mục
            $http.get("http://127.0.0.1:8000/api/categories")
            .then(function(response){
                $scope.danhmucs = response.data.danhmucs;
            })
                

            // Thêm biến thể
            $scope.themBienThe = () => $scope.sanpham.variants.push({
                mau: '',
                kichco: '',
                gia: ''
            });

            // Xóa biến thể
            $scope.xoaBienThe = (index) => $scope.sanpham.variants.splice(index, 1);

            // Thêm sản phẩm
            $scope.themSanPham = () => {
    if ($scope.sanpham.variants.length === 0) {
        alert('Vui lòng thêm ít nhất một biến thể');
        return;
    }

    $http.post('http://127.0.0.1:8000/api/products', $scope.sanpham)
        .then(function(response) {
            $scope.thanhCong = 'Sản phẩm đã được tạo thành công!';
            $scope.sanpham = { variants: [] }; // Reset form
        })
        .catch(function(error) {
            console.error('Có lỗi xảy ra:', error);
            alert('Có lỗi xảy ra: ' + error.message);
        });
};

        });
    </script>

</body>

</html>
