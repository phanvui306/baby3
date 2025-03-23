<!DOCTYPE html>
<html lang="vi" ng-app="myApp">

<head>
    <meta charset="UTF-8">
    <title>Thêm danh mục</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>

<body ng-controller="ThemDanhMucController">
    <h1>Thêm danh mục</h1>

    <div ng-if="thanhCong" style="color: green;">
        @{{ thanhCong }}
    </div>

    <input type="text" ng-model="newDanhMuc.tendanhmuc" placeholder="Nhập tên danh mục">
    <button ng-click="themDanhMuc()">Thêm</button>
    <button ng-click='goBack()'>Quay lại trang danh sách</button>

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
            $scope.goBack = function(){
                $location.path('/danhmuc');
            }
        });
    </script>
</body>

</html>
