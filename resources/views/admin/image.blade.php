<!DOCTYPE html>
<html lang="vi" ng-app="myApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Mục</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>

<body ng-controller="HinhAnhController">
    <h1>Danh sách danh mục</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Hình ảnh</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat='hinh in hinhanhs'>
                <td>@{{ hinh.id }}</td>
                <td><img ng-src="@{{ hinh.hinh }}" alt="Hình ảnh" width="100"></td>

                <td>
                    <a href="/image/edit?id=@{{ hinh.id }}"><button>Sửa</button></a>
                    <button ng-click="xoaDanhMuc(product.id)">Xóa</button>
                </td>
            </tr>
        </tbody>
    </table>

    <script>
        var app = angular.module('myApp', []);

        app.controller('HinhAnhController', function($scope, $http){
            $http.get('http://127.0.0.1:8000/api/image')
            .then(function(response){
                $scope.hinhanhs = response.data;
            })
            .catch(function(error){
                console.error("Lỗi khi lấy danh sách hình ảnh!", error);
            });
        });
        
    </script>
</body>

</html>
