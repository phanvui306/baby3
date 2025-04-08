@extends('admin.layout')

@section('content')

<style>
     /* CSS cho modal */
.modal {
    display: block; /* Ban đầu ẩn modal */
    position: fixed; /* Giữ modal ở vị trí cố định trên trang */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Màu nền mờ */
    z-index: 1000; /* Đảm bảo modal nằm trên tất cả các phần tử khác */
    justify-content: center;
    align-items: center;
}

/* Modal Content */
.modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    max-width: 80%; /* Đảm bảo modal không rộng quá */
    margin: 100px auto;
    overflow-y: auto;
    max-height: 80vh; /* Giới hạn chiều cao modal */
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

/* Nút đóng modal */


.close {
    color: #d87d7d;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

</style>
    <body ng-controller="OrderController">
        <h1>Danh sách đơn hàng</h1>
        <div class="table-container">
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
                        <td>@{{ donhang.tongtien | currency }}</td>
                        <td>
                            <select ng-model="donhang.trangthai"
                                ng-options="status.value as status.label for status in statuses"
                                ng-change="updateStatus(donhang)">
                            </select>
                        </td>
                        <td>

                            <button ng-click="showChiTiet(donhang.id)">Chi tiết</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Modal -->
<div class="modal" ng-show="isModalVisible">
    <div class="modal-content">
        <span class="close" ng-click="closeModal()">&times;</span>
        <h2>Chi tiết đơn hàng</h2>
        <p><strong>ID:</strong> @{{ orderDetail.id }}</p>
        <p><strong>Tên khách hàng:</strong> @{{ orderDetail.hoten }}</p>
        <p><strong>Địa chỉ:</strong> @{{ orderDetail.diachi }}</p>
        <p><strong>Tổng tiền:</strong> @{{ orderDetail.tongtien | currency }}</p>
        <p><strong>Ghi chú:</strong> @{{ orderDetail.ghi_chu }}</p>
        
        <h3>Chi tiết sản phẩm:</h3>
        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Màu sắc</th> 
                    <th>Kích cỡ</th> 
                    <th>Giá</th> 
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="chiTiet in orderDetail.chitietdonhang">
                    <td>@{{ chiTiet.sanpham.ten }}</td> <!-- Tên sản phẩm -->
                    <td>@{{ chiTiet.bienthe.mau }}</td> <!-- Màu sắc -->
                    <td>@{{ chiTiet.bienthe.kichco }}</td> <!-- Kích cỡ -->
                    <td>@{{ chiTiet.bienthe.gia | currency }}</td> <!-- Giá biến thể -->
                    <td>@{{ chiTiet.soluong }}</td>
                    <td>@{{ chiTiet.dongia | currency }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

        <script>
            var app = angular.module('myApp', []);

            app.controller('OrderController', function($scope, $http) {
                $scope.donhangs = [];
                $scope.isModalVisible = false;
                $scope.orderDetail = {};
                // Định nghĩa các trạng thái đơn hàng
                $scope.statuses = [{
                        value: 0,
                        label: 'Đang xử lý'
                    },
                    {
                        value: 1,
                        label: 'Đã giao hàng'
                    },
                    {
                        value: 2,
                        label: 'Đang vận chuyển'
                    },
                    {
                        value: 3,
                        label: 'Đã huỷ'
                    },
                    {
                        value: 4,
                        label: 'Đang chờ thanh toán'
                    }
                ];

                // Gọi API để lấy danh sách đơn hàng
                $http.get('/api/orders')
                    .then(function(response) {
                        $scope.donhangs = response.data.don_hang;

                        // Chuyển đổi trạng thái số thành chuỗi có ý nghĩa
                        $scope.donhangs.forEach(function(order) {
                            switch (order.trangthai) {
                                case 1:
                                    order.trangthai_label = 'Đã giao hàng';
                                    break;
                                case 0:
                                    order.trangthai_label = 'Đang xử lý';
                                    break;
                                case 2:
                                    order.trangthai_label = 'Đang vận chuyển';
                                    break;
                                case 3:
                                    order.trangthai_label = 'Đã huỷ';
                                    break;
                                case 4:
                                    order.trangthai_label = 'Đang chờ thanh toán';
                                    break;
                                default:
                                    order.trangthai_label = 'Chưa xác định';
                                    break;
                            }
                        });
                    })
                    .catch(function(error) {
                        console.log("Có lỗi xảy ra khi lấy đơn hàng: ", error);
                    });

                // Hàm cập nhật trạng thái đơn hàng
                $scope.updateStatus = function(order) {
                    $http.put('/api/orders/' + order.id + '/status', {
                            trangthai: order.trangthai
                        })
                        .then(function(response) {
                            alert('Cập nhật trạng thái thành công!');
                            order.trangthai_label = $scope.statuses.find(status => status.value === order
                                .trangthai).label;
                        })
                        .catch(function(error) {
                            console.error("Có lỗi xảy ra khi cập nhật trạng thái: ", error);
                            alert('Cập nhật trạng thái thất bại!');
                        });
                };

                // Hiển thị chi tiết đơn hàng
                $scope.showChiTiet = function(orderId) {
                    $http.get('/api/orders/' + orderId) // Gửi yêu cầu đến API để lấy chi tiết đơn hàng
                        .then(function(response) {
                            $scope.orderDetail = response.data.order; // Lưu thông tin chi tiết vào scope
                            $scope.isModalVisible = true; // Hiển thị modal
                        })
                        .catch(function(error) {
                            console.log("Lỗi khi lấy chi tiết đơn hàng", error);
                        });
                };

                // Đóng modal
                $scope.closeModal = function() {
                    $scope.isModalVisible = false;
                };
            });
        </script>
    @endsection
