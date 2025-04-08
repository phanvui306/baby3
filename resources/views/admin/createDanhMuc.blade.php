@extends('admin.layout')


@section('content')

    <body ng-controller="ThemDanhMucController">
        <h1>Thêm danh mục</h1>


        <div class="form">
            <form class="product-form">
                <div class="form-group">
                    <input type="text" ng-model="newDanhMuc.tendanhmuc" placeholder="Nhập tên danh mục">
                </div>

                <button ng-click="themDanhMuc()" class="btn btn-add">Thêm</button>
                <button ng-click='goBack()' class="btn btn-submit">Quay lại trang danh sách</button>
                <div ng-if="thanhCong" style="color: green;">
                    @{{ thanhCong }}
                </div>
            </form>
            <script>
                var app = angular.module('myApp', []);

                app.controller('ThemDanhMucController', function($scope, $http, $location) {
                    $scope.thanhCong = ""; // Thông báo

                    $scope.themDanhMuc = function() {
                        $http.post('http://127.0.0.1:8000/api/categories', $scope.newDanhMuc)
                            .then(function(response) {
                                $scope.thanhCong = response.data.message; // Hiển thị thông báo
                                $scope.newDanhMuc.tendanhmuc = ""; // Xóa ô nhập
                            })
                            .catch(function(error) {
                                console.log("Lỗi khi thêm danh mục", error);
                            });
                    };
                    $scope.goBack = function() {
                        $location.path('/danhmuc');
                    }
                });
            </script>
        @endsection
