import { memo } from "react";
import '../../../style/style.css';
import sphot from "assets/users/imager/body/sphot.jpg";
import sphot1 from "assets/users/imager/body/sphot1.jpg";
import sphot2 from "assets/users/imager/body/sphot2.jpg";
import huongdan from "assets/users/imager/body/huongdan.png";
import baoquan from "assets/users/imager/body/bao-quan-va-giat-gau-scaled.jpg";
import { formatter } from "utils/fomater";
import { featStores, renderFeaturedStores } from "utils/stores";
import { ProductList, products } from "utils/product";
import { Quantity } from "utils/quantity";

const ChiTietPage = () => {
  const imgs = [sphot, sphot1, sphot2, sphot1, sphot2]
  return (
    <div className="container-full">
      <main>
        <div className="container mt-4">
          <div className="row">
            {/* Phần hình ảnh */}
            <div className="col-md-6">
              <div className="main-image text-center">
                <img className="img-fluid hinh" style={{ height: "636px" }} src={sphot2} alt="product-pic" />
              </div>
              <div className="thumbnail-images d-flex justify-content-center mt-2">
                {imgs.map((item, key) => (
                  <img className="img-thumbnail hinh" style={{ height: "120px", width: "120px" }} src={item} alt="product-pic" key={key} />
                ))}
              </div>
            </div>
            {/* Phần thông tin sản phẩm */}
            <div className="col-md-6">
              <h2 className="product-title">GẤU BÔNG TEDDY HEAD NHỎ</h2>
              <p className="product-price">{formatter(199000)} </p>
              <p>
                <strong>Kích thước:</strong> <span className="badge bg-pink">20cm</span>
              </p>
              <div className="mb-3 text-start">
                <span className="size-option active" data-size="60cm">60cm</span>
                <span className="size-option" data-size="80cm">80cm</span>
                <span className="size-option" data-size="1m1">1m1</span>
              </div>
              <p>
                <strong>Màu sắc:</strong> <span className="badge bg-light text-dark">Nâu</span>
              </p>
              <div className="text-start">
                <span className="color-option active" data-color="pink"></span>
                <span className="color-option" data-color="gray" style={{ backgroundColor: "#d3d3d3" }}></span>
              </div>
              <p><b>Tình trạng: </b><span className="product-title">Còn hàng</span></p>
              <p><b>Số lượng: </b><span className="product-title">20</span></p>
              {/* Chọn số lượng */}
              <Quantity />
              {/* Nút mua hàng */}
              <div className="d-grid mt-3">
                <button className="btn btn-danger">Mua ngay</button>
              </div>

              {/* Icons */}
              <div className="product-icons text-center m-2">
                <div className="hinh" style={{ backgroundImage: `url(${huongdan})`, height: "105px" }}></div>
              </div>

              {/* Đặc điểm nổi bật */}
              <div style={{ color: "#6a5acd" }}>
                <h5 className="mt-4">ĐẶC ĐIỂM NỔI BẬT</h5>
                <ul>
                  <li>Chất liệu mềm mại, đảm bảo an toàn</li>
                  <li>Bông polyester 3D trắng cao cấp, đàn hồi cao</li>
                  <li>Đường may tỉ mỉ, chắc chắn</li>
                  <li>Đa dạng kích thước</li>
                  <li>Màu sắc tươi tắn</li>
                </ul></div>


              {/* Khuyến mãi */}
              <div className="alert alert-pink mt-3">
                <p>
                  <strong>Khuyến mãi:</strong>
                </p>
                <ul>
                  <li>Tặng kèm thiệp ý nghĩa</li>
                  <li>Gói túi kính buộc nơ siêu xinh</li>
                </ul>
              </div>
            </div>
            <div className="col-6">
              <div className="product-info">
                <h5 className="text-pink fw-bold fs-5">
                  <i className="bi bi-box"></i> THÔNG TIN SẢN PHẨM
                </h5>
                <hr className="text-pink" />
                <h3 className="text-pink fw-semibold fs-5">Gấu Bông Teddy Head Nhỏ</h3>
                <p>
                  <strong>Thương hiệu:</strong> Memon
                </p>
                <p>
                  <strong>Mã sản phẩm:</strong> GB3464
                </p>
                <p>
                  <strong>Kích Thước:</strong>
                  <br />Size 1: 20cm – <span>95.000đ</span>
                  <br />Size 2: 40cm – <span>115.000đ</span>
                </p>

                <p>
                  <strong>Chất liệu:</strong>
                </p>
                <ul>
                  <li>Vải bên ngoài: lông chỉ cao cấp</li>
                  <li>Bông nhồi bên trong: 100% bông polyester trắng đàn hồi loại 1.</li>
                </ul>

                <p>
                  <strong>Công dụng:</strong>
                </p>
                <p>Dùng làm gấu ôm, đồ trang trí hoặc làm quà tặng.</p>
              </div>

              {/* Phần hình ảnh */}
              <div className="text-center mt-4 mb-3">
                <div className="img-fluid rounded shadow hinh" style={{ backgroundImage: `url(${sphot})`, height: "636px" }}></div>
              </div>

              <div className="product-info">
                <h5 className="text-pink fw-bold fs-5">
                  <i className="bi bi-box"></i> BẢO QUẢN & GIẶT GẤU
                </h5>
                <p>
                  Gấu bông là người bạn thân thiết của nhiều người, đặc biệt là trẻ em. Tuy nhiên, sau một thời gian sử dụng,
                  gấu bông sẽ dễ bám bụi bẩn, vi khuẩn và trở thành nơi trú ẩn của các tác nhân gây dị ứng. Do đó, việc vệ sinh
                  gấu bông định kỳ là vô cùng quan trọng để bảo vệ sức khỏe cho bạn và các bé nhỏ.
                </p>
                <p>
                  Dưới đây là một số mẹo để bảo quản và giặt gấu bông hiệu quả mà Bemori muốn chia sẻ đến bạn. Tham khảo chi tiết
                  tại đây.
                </p>
              </div>

              {/* Phần hình ảnh */}
              <div className="text-center mt-4 mb-3">
                <div className="img-fluid rounded shadow hinh" style={{ backgroundImage: `url(${baoquan})`, height: "733px" }}></div>
              </div>
              <p>
                Hãy dành thời gian vệ sinh gấu bông định kỳ để bảo vệ sức khỏe cho bản thân và gia đình bạn. Đừng quên ghé cửa
                hàng Bemori gần nhất và sử dụng dịch vụ giặt gấu chuyên nghiệp nhé!
              </p>
            </div>
            <h5 className="text-pink fw-bold fs-5">Sản Phẩm Tương Tự</h5><hr></hr>
            <ProductList products={products.slice(0, 4)}></ProductList>
          </div>
          {/* Hệ thống cửa hàng */}
          <div className="body p-2">
            <div className="container">
              <h2 className="section-title">HỆ THỐNG CỬA HÀNG</h2>
              {renderFeaturedStores(featStores)}
            </div>
          </div>
        </div>
      </main>
    </div>
  );
};

export default memo(ChiTietPage);