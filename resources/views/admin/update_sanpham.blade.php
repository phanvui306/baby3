@extends('admin.layout')


@section('content')
    <style>
        /* Tổng thể form */
        .product-form {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Tiêu đề */
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        /* Nhóm form */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            margin-top: 5px;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Các nút bấm */
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            margin: 10px 0;
            display: block;
            width: 100%;
        }

        .btn-submit {
            background-color: #28a745;
            color: #fff;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        .btn-add {
            background-color: #007bff;
            color: #fff;
        }

        .btn-add:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            margin-top: 10px;
            width: auto;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        /* Các thông báo */
        .success-message {
            color: green;
            text-align: center;
            font-size: 16px;
            margin-top: 20px;
        }

        /* Các nhóm biến thể */
        .variants .variant-group {
            margin-bottom: 20px;
        }

        .variant-group input {
            width: 48%;
            margin-right: 4%;
            margin-bottom: 10px;
        }

        .variant-group input:last-child {
            margin-right: 0;
        }

        .variant-group button {
            width: auto;
            margin-top: 10px;
            margin-left: 50%;
            transform: translateX(-50%);
        }

        /* Các nhóm biến thể */
        .variants {
            margin-top: 20px;
        }

        .variant-group {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
            gap: 10px;
            /* Khoảng cách giữa các phần tử */
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .variant-group label {
            width: 100%;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        /* Định dạng input và button */
        .variant-group input {
            width: 48%;
            /* Chiếm khoảng 48% chiều rộng để có khoảng cách giữa các trường */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .variant-group input:focus {
            border-color: #007bff;
            outline: none;
        }

        .variant-group button {
            width: auto;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .variant-group button:hover {
            background-color: #c82333;
        }

        /* Tối ưu cho thiết bị di động */
        @media (max-width: 600px) {
            .product-form {
                padding: 15px;
                margin: 10px auto;
            }

            form {
                margin: 20px;
            }

            .variant-group input {
                width: 100%;
                margin-right: 0;
            }
        }
    </style>

    <body ng-controller="SanPhamController">

        <h1>Cập nhật sản phẩm</h1>
        <div class="form">
            <form class="product-form">
                <div class="form-group">
                    <label for="tensanpham">Tên sản phẩm</label>
                    <input type="text" id="tensanpham" placeholder="Nhập tên sản phẩm" ng-model='sanpham.tensanpham'>
                </div>

                <div class="form-group">
                    <label for="loai">Loại</label>
                    <select id="loai" ng-model='sanpham.sphot'>
                        <option value="1">Có</option>
                        <option value="0">Không</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="mota">Mô tả</label>
                    <textarea id="mota" cols="30" rows="10" ng-model='sanpham.mota'>Nhập mô tả</textarea>
                </div>

                <div class="form-group">
                    <label for="danhmuc">Chọn danh mục</label>
                    <select id="danhmuc" ng-model='sanpham.iddanhmuc'
                        ng-options='danhmuc.id as danhmuc.tendanhmuc for danhmuc in danhmucs'>
                        <option value="">Chọn danh mục</option>
                    </select>
                </div>

                <div class="variants">
                    <div ng-repeat='variant in sanpham.variants' class="variant-group">
                        <label for="mau">Màu sắc:</label>
                        <input type="text" ng-model='variant.mau' placeholder="Nhập màu sắc">

                        <label for="kichco">Kích thước:</label>
                        <input type="text" ng-model='variant.kichco' placeholder="Nhập kích thước">

                        <label for="gia">Giá:</label>
                        <input type="number" ng-model='variant.gia' placeholder="Nhập giá">

                        <button ng-click="xoaBienThe($index)" class="btn-delete">Xoá</button>
                    </div>
                </div>

                <button ng-click="themBienThe()" class="btn-add">Thêm biến thể</button>
                <button ng-click="suaSanPham()" class="btn-submit">Cập nhật sản phẩm</button>

                <p class="success-message" ng-if="thanhCong">@{{ thanhCong }}</p>
            </form>

        </div>


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

                    $http.put('http://127.0.0.1:8000/api/products/' + productId, $scope.sanpham)
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
    @endsection
