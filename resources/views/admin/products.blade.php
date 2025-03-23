<!DOCTYPE html>
<html lang="vi" ng-app="myApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Mục</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>

<body ng-controller="SanPhamController">
    <h1>Danh sách danh mục</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên danh mục</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat='sp in sanphams'>
                <td>@{{ sp.id }}</td>
                <td>@{{ sp.tensanpham }}</td>
                <td>
                    <a href="/danhmuc/edit?id= @{{ danhmuc.id }}"><button>Sửa</button></a>
                    <button ng-click="xoaDanhMuc(danhmuc.id)">Xóa</button>
                </td>
            </tr>
        </tbody>
    </table>

    <script>
        var app = angular.module('myApp', []);

        app.controller('SanPhamController', function($scope, $http){
            $http.get('http://127.0.0.1:8000/api/products')
            .then(function(response){
                $scope.sanphams = response.data;
            }, function(error){
                console.log('Loi khi goi api', error);
            });
        });
        
    </script>
</body>

</html>
