@extends('admin.layout')

@section('content')

<style>
    /* Căn giữa tin nhắn trong box chat */
.chat-box {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;  /* Đảm bảo các tin nhắn khác vẫn xuất hiện ở phía trên */
    align-items: center;  /* Căn giữa theo chiều ngang */
    height: 400px;  /* Giới hạn chiều cao cho box chat */
    position: relative;
    padding: 20px;
    overflow-y: auto;
}

/* Tin nhắn tự động */
.auto-message {
    position: absolute;
    top: 20%;  /* Căn giữa theo chiều dọc */
    left: 50%;  /* Căn giữa theo chiều ngang */
    transform: translate(-50%, -50%);  /* Điều chỉnh để căn giữa chính xác */
    font-size: 24px;
    font-weight: bold;
    color: #333;
    text-align: center;
    opacity: 0;  /* Ban đầu tin nhắn là ẩn */
    animation: fadeIn 3s forwards;  /* Hiệu ứng hiển thị */
}

/* Hiệu ứng chữ hiển thị từ từ */
@keyframes fadeIn {
    0% {
        opacity: 0;  /* Ban đầu là ẩn */
    }
    100% {
        opacity: 1;  /* Cuối cùng là hiện ra */
    }
}

/* Tin nhắn sẽ di chuyển từ trên xuống dưới, và dần xuất hiện */
.auto-message p {
    animation: fadeInText 4s ease-in-out forwards;
}

@keyframes fadeInText {
    0% {
        transform: translateY(-30px);
        opacity: 0;
    }
    50% {
        transform: translateY(10px);
        opacity: 0.5;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

</style>
    <main>
        <h1 class="title">Dashboard</h1>
        <ul class="breadcrumbs">
            <li><a href="#">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Dashboard</a></li>
        </ul>

        <!-- Tổng quan -->
        <div class="info-data">
            <!-- Card cho tổng số người dùng -->
            <div class="card">
                <div class="head">
                    <div>
                        <h2>{{ $totalUsers }}</h2> <!-- Hiển thị số người dùng -->
                        <p>Người dùng</p>
                    </div>
                    <i class='bx bx-user icon'></i> <!-- Icon người dùng -->
                </div>
                <span class="progress" data-value="40%"></span> <!-- Phần trăm tiến trình, bạn có thể điều chỉnh -->
                <span class="label">40%</span>
            </div>

            <!-- Card cho tổng số đơn hàng -->
            <div class="card">
                <div class="head">
                    <div>
                        <h2>{{ $totalOrders }}</h2> <!-- Hiển thị số đơn hàng -->
                        <p>Đơn hàng</p>
                    </div>
                    <i class='bx bx-cart icon'></i> <!-- Icon đơn hàng -->
                </div>
                <span class="progress" data-value="60%"></span> <!-- Phần trăm tiến trình, bạn có thể điều chỉnh -->
                <span class="label">60%</span>
            </div>

            <!-- Card cho tổng số sản phẩm -->
            <div class="card">
                <div class="head">
                    <div>
                        <h2>{{ $totalProducts }}</h2> <!-- Hiển thị số sản phẩm -->
                        <p>Sản phẩm</p>
                    </div>
                    <i class='bx bx-box icon'></i> <!-- Icon sản phẩm -->
                </div>
                <span class="progress" data-value="30%"></span> <!-- Phần trăm tiến trình, bạn có thể điều chỉnh -->
                <span class="label">30%</span>
            </div>

            <!-- Card cho tổng số lượt truy cập -->
            <div class="card">
                <div class="head">
                    <div>
                        <h2>235</h2>
                        <p>Visitors</p>
                    </div>
                    <i class='bx bx-trending-up icon'></i> <!-- Icon visitors -->
                </div>
                <span class="progress" data-value="80%"></span> <!-- Phần trăm tiến trình -->
                <span class="label">80%</span>
            </div>
        </div>

        <!-- Phần dữ liệu và báo cáo -->
        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>Sales Report</h3>
                    <div class="menu">
                        <i class='bx bx-dots-horizontal-rounded icon'></i>
                        <ul class="menu-link">
                            <li><a href="#">Edit</a></li>
                            <li><a href="#">Save</a></li>
                            <li><a href="#">Remove</a></li>
                        </ul>
                    </div>
                </div>
                <div class="chart">
                    <div id="chart"></div>
                </div>
            </div>

            <div class="content-data" ng-controller="ChatController">
                <div class="head">
                    <h3>Chatbox</h3>
                    <div class="menu">
                        <i class='bx bx-dots-horizontal-rounded icon'></i>
                        <ul class="menu-link">
                            <li><a href="#">Edit</a></li>
                            <li><a href="#">Save</a></li>
                            <li><a href="#">Remove</a></li>
                        </ul>
                    </div>
                </div>
                <div class="chat-box">
                    <p class="day"><span>Today</span></p>
                    <div class="auto-message">
                        <p>Bạn cần tôi giúp gì?</p>
                    </div>
                    <div ng-repeat="msg in messages" class="msg" ng-class="{'me': msg.from === 'me'}">
                        <img ng-if="msg.from !== 'me'" src="https://example.com/avatar.jpg" alt="AI Avatar">
                        <div class="chat">
                            <div class="profile">
                                <span class="username">@{{ msg.from }}</span>
                                <span class="time">@{{ msg.time }}</span>
                            </div>
                            <p>@{{ msg.text }}</p>
                        </div>
                    </div>
                </div>

                <form ng-submit="sendMessage()">
                    <div class="form-group">
                        <input type="text" ng-model="userMessage" placeholder="Nhập tin nhắn.." required>
                        <button type="submit" class="btn-send"><i class='bx bxs-send'></i></button>
                    </div>
                </form>

            </div>
        </div>

        <script>
            var app = angular.module('myApp', []);
            app.controller('ChatController', function($scope, $http) {
                $scope.messages = []; // To store the chat messages
                $scope.userMessage = ''; // To store user's input message

                // Function to send message
                $scope.sendMessage = function() {
                    // Send user's message to AI
                    let userMessage = $scope.userMessage;
                    $scope.messages.push({
                        from: 'me',
                        text: userMessage,
                        time: new Date().toLocaleTimeString()
                    });

                    // Send message to backend
                    $http.post('/api/chat', {
                        message: userMessage
                    }).then(function(response) {
                        $scope.messages.push({
                            from: 'AI',
                            text: response.data.reply,
                            time: new Date().toLocaleTimeString()
                        });
                    }).catch(function(error) {
                        if (error.status === 429) {
                            alert("Quá nhiều yêu cầu. Vui lòng thử lại sau.");
                        } else {
                            alert("Đã xảy ra lỗi: " + error.message);
                        }
                    });

                    // Reset input field
                    $scope.userMessage = '';
                };

                
            });
        </script>
    </main>
@endsection
