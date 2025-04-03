import { memo } from "react";
import "../../../style/style.css";
import { Link } from "react-router-dom";
import sphot1 from "assets/users/imager/body/spbox1.jpg";
import { formatter } from "utils/fomater";

const ThanhToanPage = () => {
  return (
    <div className="container-full">
      <main>
        <div className="container">
          <div className="container mt-4 mb-4">
            {/* Breadcrumb */}
            <nav aria-label="breadcrumb">
              <ol className="breadcrumb">
                <li className="breadcrumb-item">
                  <Link to="/trangchu">Trang chủ</Link>
                </li>
                <li className="breadcrumb-item active" aria-current="page">
                  Thanh Toán
                </li>
              </ol>
            </nav>
            <p className="text1 fw-bold fs-3">Thanh Toán</p>
            <hr />
            <div className="row">
              {/* Danh sách sản phẩm */}
              <div className="col-7">
                <h5 className="mt-4 fw-bold" style={{ fontSize: "20px", color: "#f05599" }}>
                  Đơn Hàng
                </h5>
                <hr />
                <table className="table">
                  <tbody>
                    <tr>
                      <td className="d-flex align-items-center">
                        <img src={sphot1} alt="Gấu bông" className="product-img" />
                        <strong>Gấu Bông Baby Three Cosplay Gấu Bụng Sao Không Lồ</strong>
                      </td>
                      <td className="text-end fw-bold">{formatter(200000)} (2)</td>
                    </tr>
                    <tr>
                      <td className="d-flex align-items-center">
                        <img src={sphot1} alt="Gấu bông" className="product-img" />
                        <strong>Gấu Bông Baby Three Cosplay Gấu Bụng Sao Không Lồ</strong>
                      </td>
                      <td className="text-end fw-bold">{formatter(200000)} (2)</td>
                    </tr>
                  </tbody>
                </table>
                <div className="mb-3 d-flex">
                  <input type="text" className="discount-input" placeholder="Nhập mã giảm giá" />
                  <button className="apply-btn ms-2">Áp dụng</button>
                </div>
                <div className="d-flex justify-content-between total-title">
                  <span>Tổng cộng: </span>
                  <span className="total-price">395.000đ</span>
                </div>
              </div>
              {/* Thông tin đơn hàng */}
              <div className="col-5">
                <div className="form-container">
                  <h5 className="mt-1 fw-bold" style={{ fontSize: "20px", color: "#f05599" }}>
                    Thông Tin Đơn Hàng
                  </h5>
                  <div className="mb-3 mt-3">
                    <label htmlFor="fullname" className="form-label">Họ và tên</label>
                    <input type="text" className="form-control1" id="fullname" placeholder="Nhập họ và tên" />
                  </div>
                  <div className="mb-3">
                    <label htmlFor="phone" className="form-label">Số điện thoại</label>
                    <input type="tel" className="form-control1" id="phone" placeholder="Nhập số điện thoại" />
                  </div>
                  <div className="mb-3">
                    <label htmlFor="address" className="form-label">Địa chỉ</label>
                    <input type="text" className="form-control1" id="address" placeholder="Nhập địa chỉ" />
                  </div>
                  <div className="mb-3">
                    <label htmlFor="note" className="form-label">Ghi chú đơn hàng</label>
                    <textarea rows={30} placeholder="Ghi chú" id="note" className="form-control1" />
                  </div>
                </div>
              </div>
            </div>
            <div className="text-center">
              <button className="btn btn3 fw-bold">Đặt Hàng</button>
            </div>
          </div>
        </div>
      </main>
    </div>
  );
};

export default memo(ThanhToanPage);