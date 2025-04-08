<!DOCTYPE html>
<html lang="vi" ng-app="myApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa hình ảnh</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>

<body ng-controller="HinhAnhController">
    <h1>Sửa hình ảnh</h1>

    <select ng-model="idsp" ng-options="sp.id as sp.tensanpham for sp in sanphams">
        <option value="">Chọn sản phẩm</option>
    </select>

    <input type="file" id="fileHinh" accept="image/*" onchange="angular.element(this).scope().chonHinhAnh(event)" />

    <button ng-click="suaHinhAnh()">Sửa Hình Ảnh</button>

    <p style="color: green;">@{{ thanhcong }}</p>

    <script>
        var app = angular.module('myApp', []);

        app.controller('HinhAnhController', function ($scope, $http) {
            $scope.sanphams = [];
            $scope.file = null;
            $scope.idsp = "";
            $scope.thanhcong = "";

            // Lấy danh sách sản phẩm
            $http.get("http://127.0.0.1:8000/api/products").then(function (response) {
                $scope.sanphams = response.data;
            }).catch(function (error) {
                console.error("Lỗi khi lấy danh sách sản phẩm!", error);
            });

            // Hàm chọn file
            $scope.chonHinhAnh = function (event) {
                $scope.file = event.target.files[0];
                console.log("Hình đã chọn:", $scope.file);
            };

            // Hàm sửa hình ảnh
            $scope.suaHinhAnh = function () {
                if (!$scope.idsp || !$scope.file) {
                    alert("Vui lòng chọn sản phẩm và hình ảnh!");
                    return;
                }

                let formData = new FormData();
                formData.append("hinh", $scope.file);
                formData.append("idsp", $scope.idsp);

                $http.put("http://127.0.0.1:8000/api/image/" + $scope.idsp, formData, {
                    transformRequest: angular.identity,
                    headers: { 'Content-Type': undefined }
                }).then(function (response) {
                    $scope.thanhcong = "Cập nhật hình ảnh thành công!";
                }).catch(function (error) {
                    console.error("Lỗi khi cập nhật hình ảnh!", error);
                });
            };
        });
    </script>
</body>

</html>
