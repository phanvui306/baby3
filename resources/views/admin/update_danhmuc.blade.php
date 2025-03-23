<!DOCTYPE html>
<html lang="vi" ng-app="myApp">

<head>
    <meta charset="UTF-8">
    <title>Thêm danh mục</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>

<body ng-controller="updateDanhMuc">
    <h1>Cập nhật danh mục</h1>

    <label for="tenDanhmuc">Tên danh mục</label>
    <input type="text" id="tenDanhmuc" placeholder="Nhập tên danh mục" ng-model='danhmuc.tendanhmuc'>

    <p ng-if='thanhCong' style="color: green;">@{{thanhCong}}</p>
    <button ng-click='capNhatDanhMuc()'>Cập nhật</button>


    <script>
        var app = angular.module('myApp', []);

        app.controller('updateDanhMuc', function($scope, $http, $location) {

            var urlParams = new URLSearchParams(window.location.search);
            var id = urlParams.get('id');


            $scope.thanhCong = '';

            $http.get('http://127.0.0.1:8000/api/categories/' + id)
                .then(function(response) {
                    $scope.danhmuc = response.data;
                })
                .catch(function(error) {
                    console.log("Lỗi khi cập nhậ danh mục", error);
                });

            // Hàm cập nhật danh mục
            $scope.capNhatDanhMuc = function() {
                $http.put('http://127.0.0.1:8000/api/categories/' + id, $scope.danhmuc)
                    .then(function(response) {
                        $scope.thanhCong = response.data.message;
                    })
                    .catch(function(error) {
                        console.log("Lỗi khi cập nhật danh mục", error);
                    });
            };
        });
    </script>
</body>

</html>
