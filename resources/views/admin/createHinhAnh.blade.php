<!DOCTYPE html>
<html lang="vi" ng-app="myApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Hình Ảnh Sản Phẩm</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>

<body ng-controller="HinhAnhController">
    <h1>Thêm hình ảnh sản phẩm</h1>

    
    <select ng-model="idsp" ng-options="sp.id as sp.tensanpham for sp in sanphams">
        <option value="">Chọn sản phẩm</option>
    </select>

    
    <input type="file" id="fileHinh" accept="image/*" onchange="angular.element(this).scope().chonHinhAnh(this)" />

   
    <button ng-click="themHinhAnh()">Thêm Hình Ảnh</button>

    <p style="color: green;">@{{ thanhcong }}</p>

    <script>
        var app = angular.module('myApp', []);

        app.controller('HinhAnhController', function ($scope, $http) {
            $scope.sanphams = [];
            $scope.idsp = "";
            $scope.hinhAnhFile = null;
            $scope.thanhcong = "";

            // Lấy danh sách sản phẩm
            $http.get('http://127.0.0.1:8000/api/products/')
                .then(function (response) {
                    $scope.sanphams = response.data;
                })
                .catch(function (error) {
                    console.error("Lỗi khi lấy danh sách sản phẩm", error);
                });

            // Chọn ảnh
            $scope.chonHinhAnh = function (element) {
                $scope.hinhAnhFile = element.files[0];
            };

            // Gửi ảnh lên API
            $scope.themHinhAnh = function () {
                if (!$scope.idsp) {
                    alert("Vui lòng chọn sản phẩm!");
                    return;
                }
                if (!$scope.hinhAnhFile) {
                    alert("Vui lòng chọn hình ảnh!");
                    return;
                }

                var formData = new FormData();
                formData.append("idsp", $scope.idsp);
                formData.append("hinh", $scope.hinhAnhFile);

                $http.post('http://127.0.0.1:8000/api/image', formData, {
                    headers: { 'Content-Type': undefined }
                }).then(function (response) {
                    $scope.thanhcong = response.data.message;
                }).catch(function (error) {
                    console.error("Lỗi khi thêm hình ảnh", error);
                });
            };
        });
    </script>
</body>

</html>
