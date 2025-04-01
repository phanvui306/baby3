<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bemori.vn - Trang Chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .search-box {
            border-radius: 25px;
            padding: 10px 15px;
            border: 1px solid #ccc;
            width: 300px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">SĂN NGAY SUPER SALE UP TO 50% SĂN NGAY</h1>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Bemori.vn</a>
        </div>
        <div class="container">
            <a class="navbar-brand" href="#">"Hug Teddy - Unbox Love"</a>
            <form class="d-flex ms-auto" action="{{ route('search') }}" method="GET">
                <input class="form-control search-box" type="text" name="query" placeholder="Tìm kiếm...">
                <button class="btn btn-primary ms-2" type="submit">Tìm</button>
            </form>
        </div>
        <div class="container">
            <a class="navbar-brand" href="#">0473625112</a>
        </div>
        <div class="container">
            <a class="navbar-brand" href="{{ route('register') }}">Đăng ký</a>
            <a class="navbar-brand" href="{{ route('login') }}">Đăng nhập</a>
        </div>
    </nav>

    <div class="container mt-3">
        <ul class="nav nav-pills justify-content-center bg-light p-3 rounded">
            <li class="nav-item"><a class="nav-link active" href="{{ route('blindbox') }}">Blind Box</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('teddy') }}">Gấu Teddy</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('collection-dashboard') }}">Bộ Sưu Tập</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Gấu Hoạt Hình</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Thú Bông</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Phụ Kiện</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Góc Của Gấu</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Dịch vụ</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Tất cả SP</a></li>
        </ul>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide mt-4" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://bemori.vn/wp-content/uploads/2024/11/EBC-x-Bemori_banner-Web-2.webp" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="https://bemori.vn/wp-content/uploads/2024/11/EBC-x-Bemori_banner-Web-2.webp" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="https://bemori.vn/wp-content/uploads/2025/01/W-Slide-dia-chi.webp" class="d-block w-100" alt="Slide 3">
            </div>
            <div class="carousel-item">
                <img src="https://bemori.vn/wp-content/uploads/2024/12/W-Slide-6-dich-vu.webp" class="d-block w-100" alt="Slide 4">
            </div>
            <div class="carousel-item">
                <img src="https://bemori.vn/wp-content/uploads/2024/12/W-Slide-hoa-toc.webp" class="d-block w-100" alt="Slide 5">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
    <div class="container mt-3">
        <ul class="nav nav-pills justify-content-center bg-light p-3 rounded">
            <li class="nav-item"><a class="nav-link active" href="#">GIAO HÀNG SIÊU TỐC</a></li>
            <li class="nav-item"><a class="nav-link" href="#">BỌC HỘP QUÀ XINH</a></li>
            <li class="nav-item"><a class="nav-link" href="#">TẶNG THIỆP Ý NGHĨA</a></li>
            <li class="nav-item"><a class="nav-link" href="#">GIẶT GẤU CHUYÊN NGHIỆP</a></li>
            <li class="nav-item"><a class="nav-link" href="#">NÉN NHỎ GẤU BÔNG</a></li>
        </ul>
    </div>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="bg-dark text-white p-4 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Giới thiệu và Liên hệ</h5>
                    <p>Bemori là hệ thống quà tặng gấu bông, nơi mỗi sản phẩm không chỉ là đồ chơi mềm mại, mà là biểu tượng của tình yêu và quan tâm.</p>
                    <p>Email: bemori.cskh@gmail.com</p>
                    <p>Hotline: 097 989 6616</p>
                </div>
                <div class="col-md-4">
                    <h5>Hệ thống cửa hàng</h5>
                    <p><strong>TP. Hồ Chí Minh:</strong> 228 Lê Văn Sỹ, Phường 1, Tân Bình – 097 989 6616</p>
                    <p><strong>Hà Nội:</strong></p>
                    <p>275 Bạch Mai, Hai Bà Trưng – 039 569 6616</p>
                    <p>368 Nguyễn Trãi, Trung Văn (Phùng Khoang) – 033 567 6616</p>
                    <p>411 Nguyễn Văn Cừ, Long Biên – 034 369 6616</p>
                    <p>161 Xuân Thủy, Cầu Giấy – 033 876 6616</p>
                    <p>104 -106 Cầu Giấy – 039 799 6616</p>
                    <p>1028 Đường Láng, Đống Đa – 035 369 6616</p>
                    <p><strong>Giờ mở cửa:</strong> 8h30 - 23h00</p>
                </div>
                <div class="col-md-4">
                    <h5>Hỗ trợ khách hàng</h5>
                    <p><a href="#">Chính Sách Của Bemori</a></p>
                    <p><a href="#">Chính Sách Buôn Sỉ</a></p>
                    <p><a href="#">Chính Sách Vận Chuyển</a></p>
                    <p><a href="#">Chính Sách Bảo Hành Và Đổi Trả</a></p>
                    <p><a href="#">Chính Sách Bảo Mật Thông Tin</a></p>
                    <h6>Tổng đài hỗ trợ</h6>
                    <p>Đặt Hàng Online: 097 989 6616</p>
                    <p>Mua Hàng Buôn/ Sỉ SLL: 039 797 6616</p>
                    <p>Hotline phản ánh SP/ DV: 039 333 6616</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-3">© Since 2012 Bemori.vn™</div>
    </footer>
</body>
</html>
