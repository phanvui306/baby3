<!DOCTYPE html>
<html lang="vi" ng-app="DanhMucApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách danh mục</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

</head>

<body ng-controller="DanhMucController">
    <div class="container">
        <h2>Danh sách danh mục</h2>
        <button ng-click="themDanhMuc()" class="btn btn-success">Thêm danh mục</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="dm in danhMucs">
                    <td>{{ dm.id }}</td>
                    <td>{{ dm.tendanhmuc }}</td>
                    <td>
                        <button ng-click="suaDanhMuc(dm)" class="btn btn-warning">Sửa</button>
                        <button ng-click="xoaDanhMuc(dm.id)" class="btn btn-danger">Xóa</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <script>
        app.controller('DanhMucController', function($scope, $http) {
            // Gọi API lấy danh mục
            $http.get('http://127.0.0.1:8000/danhmuc/').then(function(response) {
                console.log("Dữ liệu API trả về:", response.data); // Kiểm tra dữ liệu trên console
                $scope.danhMucs = response.data;
            }, function(error) {
                console.error("Lỗi tải danh mục", error);
            });

            // Hàm thêm danh mục (chưa có chức năng, chỉ là placeholder)
            $scope.themDanhMuc = function() {
                alert('Chức năng thêm danh mục chưa được triển khai');
            };

            // Hàm sửa danh mục (chưa có chức năng, chỉ là placeholder)
            $scope.suaDanhMuc = function(dm) {
                alert('Chỉnh sửa danh mục: ' + dm.tendanhmuc);
            };

            // Hàm xóa danh mục (chưa có chức năng, chỉ là placeholder)
            $scope.xoaDanhMuc = function(id) {
                if (confirm('Bạn có chắc chắn muốn xóa?')) {
                    alert('Xóa danh mục có ID: ' + id);
                }
            };
        });
    </script>
</body>

</html>
