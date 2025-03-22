<!DOCTYPE html>
<html lang="vi" ng-app="myApp">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="{{ asset('js/angular-app.js') }}"></script>
</head>

<body ng-controller="ProductController">
    <h1>Danh sách sản phẩm</h1>
    <ul>
        <li ng-repeat="products in product">
            {{ products.name }}
        </li>
    </ul>

    <script>
        var app = angular.module('myApp', []);

        app.controller('ProductController', function($scope, $http) {
            $http.get('/products') // Gọi API Laravel
                .then(function(response) {
                    $scope.products = response.data;
                });
        });
    </script>
</body>

</html>
