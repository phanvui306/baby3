import { memo } from "react";
import "../../../style/style.css";
import { Link } from "react-router-dom";
import { Quantity } from "utils/quantity";
import { formatter } from "utils/fomater";
import sphot1 from "assets/users/imager/body/spbox1.jpg";
import { featStores, renderFeaturedStores } from "utils/stores";
import { ROUTERS } from "utils/router";

const CartPage = () => {
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
                  Giỏ Hàng
                </li>
              </ol>
            </nav>
            <p className="text1 fw-bold fs-3">Giỏ Hàng</p>
            <hr />
            <div className="row">
              {/* Danh sách sản phẩm */}
              <div className="col-9">
                <table>
                  <thead>
                    <tr>
                      <th></th>
                      <th className="px-1" style={{ fontSize: "20px" }}>
                        Sản phẩm
                      </th>
                      <th className="px-4" style={{ fontSize: "20px" }}>
                        Giá
                      </th>
                      <th className="px-4" style={{ fontSize: "20px" }}>
                        Số lượng
                      </th>
                      <th className="px-4" style={{ fontSize: "20px" }}>
                        Tạm tính
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td className="px-4">
                        <button
                          className="btn btn-link text-danger p-0 me-2"
                          style={{
                            fontFamily: "Arial, sans-serif",
                            textDecoration: "none",
                          }}
                        >
                          ✖
                        </button>
                        <img width="100px" src={sphot1} alt="Sản phẩm" />
                      </td>
                      <td className="px-1 fw-bold" style={{ fontSize: "11px" }}>
                        Gấu Bông Baby Three Cosplay Gấu Bụng Sao Khổng Lồ
                      </td>
                      <td className="px-4 r fw-bold">{formatter(165000)}</td>
                      <td className="px-1">
                        <Quantity Quantity="2" hasAddToCart={false} />
                      </td>
                      <td className="px-4 r fw-bold">{formatter(165000)}</td>
                    </tr>
                    <tr>
                      <td className="px-4">
                        <button
                          className="btn btn-link text-danger p-0 me-2"
                          style={{
                            fontFamily: "Arial, sans-serif",
                            textDecoration: "none",
                          }}
                        >
                          ✖
                        </button>
                        <img width="100px" src={sphot1} alt="Sản phẩm" />
                      </td>
                      <td className="px-1 fw-bold" style={{ fontSize: "11px" }}>
                        Gấu Bông Baby Three Cosplay Gấu Bụng Sao Khổng Lồ
                      </td>
                      <td className="px-4 r fw-bold">{formatter(165000)}</td>
                      <td className="px-1">
                        <Quantity Quantity="2" hasAddToCart={false} />
                      </td>
                      <td className="px-4 r fw-bold">{formatter(165000)}</td>
                    </tr>
                    <tr>
                      <td className="px-4">
                        <button
                          className="btn btn-link text-danger p-0 me-2"
                          style={{
                            fontFamily: "Arial, sans-serif",
                            textDecoration: "none",
                          }}
                        >
                          ✖
                        </button>
                        <img width="100px" src={sphot1} alt="Sản phẩm" />
                      </td>
                      <td className="px-1 fw-bold" style={{ fontSize: "11px" }}>
                        Gấu Bông Baby Three Cosplay Gấu Bụng Sao Khổng Lồ
                      </td>
                      <td className="px-4 r fw-bold">{formatter(165000)}</td>
                      <td className="px-1">
                        <Quantity Quantity="2" hasAddToCart={false} />
                      </td>
                      <td className="px-4 r fw-bold">{formatter(165000)}</td>
                    </tr>
                  </tbody>
                </table>
                <div className="d-flex justify-content-between mt-2">
                  <Link to={ROUTERS.USER.GAUTEDDY} className="btn btn-outline-pink">
                    ← Tiếp tục xem sản phẩm
                  </Link>
                </div>
              </div>

              {/* Tổng giỏ hàng */}
              <div className="col-3">
                <div>
                  <h5 className="mt-1 fw-bold" style={{ fontSize: "20px", color: "#f05599" }}>
                    Cộng giỏ hàng
                  </h5>
                  <hr />
                  <div className="d-flex justify-content-between mt-3 fw-semibold" style={{ fontSize: "20px", color: "#f05599" }}>
                    <span>Số Lượng:</span>
                    <span>4</span>
                  </div>
                  <div className="d-flex justify-content-between mt-3 fw-bold" style={{ fontSize: "20px", color: "#f05599" }}>
                    <span>Tổng:</span>
                    <span>{formatter(200000)}</span>
                  </div>
                  <hr />
                  <Link to={ROUTERS.USER.THANHTOAN}>
                    <button className="btn btn4 mt-2">Tiến hành thanh toán</button>
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div>

        {/* Hệ thống cửa hàng */}
        <div className="body p-2">
          <div className="container">
            <h2 className="section-title">HỆ THỐNG CỬA HÀNG</h2>
            {renderFeaturedStores(featStores)}
          </div>
        </div>
      </main>
    </div>
  );
};

export default memo(CartPage);
