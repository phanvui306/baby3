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
            <tr ng-repeat='product in sanphams'>
                <td>@{{ product.id }}</td>
                <td>@{{ product.tensanpham }}</td>
                <td>
                    <a href="/product/edit?id=@{{ product.id }}"><button>Sửa</button></a>
                    <button ng-click="xoaSanPham(product.id)">Xóa</button>
                </td>
            </tr>
        </tbody>
    </table>

    <script>
        var app = angular.module('myApp', []);
    
        app.controller('SanPhamController', function($scope, $http){
            // Lấy danh sách sản phẩm từ API
            $http.get('http://127.0.0.1:8000/api/products')
            .then(function(response){
                $scope.sanphams = response.data;
            }, function(error){
                console.log('Lỗi khi gọi API', error);
            });
    
            // Hàm xóa sản phẩm
            $scope.xoaSanPham = function(id){
                if(confirm("Bạn có chắc muốn xoá sản phẩm này không?")){
                    $http.delete("http://127.0.0.1:8000/api/product/" + id)
                    .then(function(response){
                        alert("Xóa sản phẩm thành công!");
                        // Cập nhật danh sách sản phẩm sau khi xóa
                        $scope.sanphams = $scope.sanphams.filter(p => p.id !== id);
                    })
                    .catch(function(error){
                        console.error("Lỗi khi xoá sản phẩm", error);
                    });
                }
            };
        });
    </script>
    
</body>

</html>
