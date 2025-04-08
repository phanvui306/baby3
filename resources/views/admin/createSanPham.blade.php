@extends('admin.layout')


@section('content')

    <body ng-controller="SanPhamController">

        <h1>Cập nhật sản phẩm</h1>
        <div class="form">
            <form class="product-form">
                <div class="form-group">
                    <label for="tensanpham">Tên sản phẩm</label>
                    <input type="text" id="tensanpham" placeholder="Nhập tên sản phẩm" ng-model="sanpham.tensanpham"
                        required>
                </div>

                <div class="form-group">
                    <label for="loai">Loại</label>
                    <select id="loai" ng-model="sanpham.sphot">
                        <option value="">Chọn loại</option>

                        <option value="1">Có</option>
                        <option value="0">Không</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="mota">Mô tả</label>
                    <textarea id="mota" cols="30" rows="10" ng-model="sanpham.mota" placeholder="Nhập mô tả"></textarea>
                </div>

                <div class="form-group">
                    <label for="danhmuc">Chọn danh mục</label>
                    <select id="danhmuc" ng-model="sanpham.iddanhmuc"
                        ng-options="danhmuc.id as danhmuc.tendanhmuc for danhmuc in danhmucs">
                        <option value="">Chọn danh mục</option>
                    </select>
                </div>

                <div class="variants">
                    <div ng-repeat="variant in sanpham.variants" class="variant-group">
                        <label for="mau">Màu sắc:</label>
                        <input type="text" ng-model="variant.mau" placeholder="Nhập màu sắc">

                        <label for="kichco">Kích thước:</label>
                        <input type="text" ng-model="variant.kichco" placeholder="Nhập kích thước">

                        <label for="gia">Giá:</label>
                        <input type="number" ng-model="variant.gia" placeholder="Nhập giá">

                        <button ng-click="xoaBienThe($index)" class="btn-delete">Xoá</button>
                    </div>
                </div>

                <button ng-click="themBienThe()" class="btn btn-add">Thêm biến thể</button>
                <button ng-click="themSanPham()" class="btn btn-submit">Cập nhật sản phẩm</button>

                <p class="success-message" ng-if="thanhCong">@{{ thanhCong }}</p>
            </form>
        </div>


        <script>
            var app = angular.module('myApp', []);

            app.controller('SanPhamController', function($scope, $http) {
                $scope.sanpham = {
                    variants: []
                };

                // Lấy danh mục
                $http.get("http://127.0.0.1:8000/api/categories")
                    .then(function(response) {
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
                            $scope.sanpham = {
                                variants: []
                            }; // Reset form
                        })
                        .catch(function(error) {
                            console.error('Có lỗi xảy ra:', error);
                            alert('Có lỗi xảy ra: ' + error.message);
                        });
                };

            });
        </script>
    @endsection
