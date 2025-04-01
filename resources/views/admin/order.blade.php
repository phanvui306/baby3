<!DOCTYPE html>
<html lang="vi" ng-app="myApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Mục</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>

<body ng-controller="OrderController">
    <h1>Danh sách đơn hàng</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat='donhang in donhangs'>
                <td>@{{ donhang.id }}</td>
                <td>@{{ donhang.hoten }}</td>
                <td>@{{ donhang.dienthoai }}</td>
                <td>@{{ donhang.diachi }}</td>
                <td>@{{ donhang.ngay }}</td>
                <td>@{{ donhang.tongtien }}</td>
                <td>@{{ donhang.trangthai }}</td>
                <td>
                    <a href="/donhang/edit?id=@{{ donhang.id }}"><button>Sửa</button></a>
                    <button ng-click="xoaSanPham(donhang.id)">Xóa</button>
                </td>
            </tr>
        </tbody>
    </table>

 <script>
    var app = angular.module('myApp', []);

    app.controller('OrderController', function($scope, $http){
        $http.get('http://127.0.0.1:8000/api/orders')
        .then(function(response){
            $scope.donhangs = response.data.don_hang;
        })
        .catch(function(error){
            console.error('Lấy đơn hàng thành công', error);
        });
    });
 </script>
        
    
</body>

</html>
