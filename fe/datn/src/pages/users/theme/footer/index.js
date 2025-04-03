import { memo } from "react";
import '../../../../style/style.css';
import { Link } from "react-router-dom";
import footer from "assets/users/imager/footer/iconn.png";
import footer1 from "assets/users/imager/footer/iconn1.png";
import footer2 from "assets/users/imager/footer/iconn2.png";
import footer3 from "assets/users/imager/footer/iconn3.png";
import footer4 from "assets/users/imager/footer/iconn4.png";
import footer5 from "assets/users/imager/footer/iconn6.png";
import footer7 from "assets/users/imager/footer/pttt.png";
import footer8 from "assets/users/imager/footer/bocongthuong.png";
import footer9 from "assets/users/imager/footer/ft-logo.png";

const Footer = () => {
  return (
    <div className="container-full">
      <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
      />
      <footer className="footer">
        <div className="container">
          <div className="row text-white">
            {/* Cột 1: Thông tin liên hệ */}
            <div className="col-md-4">
              <h4>
                <div className="hinh" style={{ backgroundImage: `url(${footer9})`, height: "61px", width: "163px" }}></div>
              </h4>
              <p>
                Bemori là hệ thống quà tặng gấu bông, nơi mỗi sản phẩm không chỉ
                là đồ chơi mềm mại, mà là biểu tượng của tình yêu và quan tâm.
              </p>
              <p>
                “Hug Teddy – Unbox love” – Bemori khiến việc tặng gấu bông là
                tặng một phần của trái tim, một phần cuộc sống và tình yêu mà
                khách hàng muốn gửi gắm.
              </p>
              <h6 className="mt-3">GIỚI THIỆU VÀ LIÊN HỆ</h6>
              <p>
                <i className="fas fa-envelope"></i> bemori.cskh@gmail.com
              </p>
              <p>
                <i className="fas fa-phone"></i> 0979896616
              </p>
              <div className="social-icons">
                <div className="hinh" style={{ backgroundImage: `url(${footer})`, height: "40px", width: "45px" }}></div>
                <div className="hinh" style={{ backgroundImage: `url(${footer1})`, height: "40px", width: "45px" }}></div>
                <div className="hinh" style={{ backgroundImage: `url(${footer2})`, height: "40px", width: "45px" }}></div>
                <div className="hinh" style={{ backgroundImage: `url(${footer3})`, height: "40px", width: "45px" }}></div>
                <div className="hinh" style={{ backgroundImage: `url(${footer4})`, height: "40px", width: "45px" }}></div>
                <div className="hinh" style={{ backgroundImage: `url(${footer5})`, height: "40px", width: "45px" }}></div>
              </div>
            </div>

            {/* Cột 2: Hệ thống cửa hàng */}
            <div className="col-md-4">
              <h6>HỆ THỐNG CỬA HÀNG</h6>
              <p><strong>TP. HỒ CHÍ MINH</strong></p>
              <p>228 Lê Văn Sỹ, Phường 1, Tân Bình – 086 848 6616</p>
              <p><strong>HÀ NỘI</strong></p>
              <p>275 Bạch Mai, Hai Bà Trưng – 039 569 6616</p>
              <p>368 Nguyễn Trãi, Trung Văn – 033 567 6616</p>
              <p>411 Nguyễn Văn Cừ, Long Biên – 034 369 6616</p>
              <p>161 Xuân Thủy, Cầu Giấy – 033 876 6616</p>
              <p>104 -106 Cầu Giấy – 039 799 6616</p>
              <p>1028 Đường Láng, Đống Đa – 035 369 6616</p>
              <p><strong>OPEN DAILY: 8H30-23H00</strong></p>
            </div>

            {/* Cột 3: Hỗ trợ khách hàng và thanh toán */}
            <div className="col-md-4">
              <h6>HỖ TRỢ KHÁCH HÀNG</h6>
              <p><Link to="">Chính Sách Cửa Bemori</Link></p>
              <p><Link to="">Chính Sách Buôn Sỉ</Link></p>
              <p><Link to="">Chính Sách Vận Chuyển</Link></p>
              <p><Link to="">Chính Sách Bảo Hành Và Đổi Trả</Link></p>
              <p><Link to="">Chính Sách Bảo Mật Thông Tin</Link></p>

              <h6>TỔNG ĐÀI HỖ TRỢ</h6>
              <p>Đặt Hàng Online: <strong>097 989 6616</strong></p>
              <p>Mua Hàng Buôn/ Sỉ SLL: <strong>039 797 6616</strong></p>
              <p>Hotline phản ánh SP/ DV: <strong>039 333 6616</strong></p>

              <h6>PHƯƠNG THỨC THANH TOÁN</h6>
              <div className="payment-icons">
                <div className="hinh" style={{ backgroundImage: `url(${footer7})`, height: "30px" }}></div>
              </div>
            </div>

            <div className="d-flex justify-content-center">
              <div className="hinh" style={{ backgroundImage: `url(${footer8})`, height: "60px", width: "160px" }}></div>
            </div>
          </div>

          <hr style={{ border: "1px solid #ffffff" }} />

          <div className="text-center">
            <p>© Since 2012 Bemori.vn™</p>
          </div>
        </div>
      </footer>
    </div>
  );
};

export default memo(Footer);
