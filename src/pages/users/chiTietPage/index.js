import { memo, useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import axios from "axios";
import { formatter } from "utils/fomater";
import { Quantity } from "utils/quantity";
import { featStores, renderFeaturedStores } from "utils/stores";
import { ProductList } from "utils/product";
import baoquan from "assets/users/imager/body/bao-quan-va-giat-gau-scaled.jpg";
import huongdan from "assets/users/imager/body/huongdan.png";

const ChiTietPage = () => {
  const { id } = useParams();
  const [product, setProduct] = useState(null);
  const [relatedProducts, setRelatedProducts] = useState([]);

  useEffect(() => {
    const fetchProduct = async () => {
      try {
        const res = await axios.get(`http://localhost:3000/api/products/${id}`);
        const data = res.data;
        setProduct(data);

        // Lấy sản phẩm tương tự
        if (data.iddanhmuc) {
          const relatedRes = await axios.get(`http://localhost:3000/api/products/category/${data.iddanhmuc}`);
          const relatedData = relatedRes.data.filter(p => p.id !== Number(id));
          setRelatedProducts(relatedData.slice(0, 4)); // Lấy 4 sản phẩm tương tự
        }
      } catch (error) {
        console.error("Lỗi khi lấy chi tiết sản phẩm:", error);
      }
    };

    fetchProduct();
  }, [id]);

  if (!product) return <div>Đang tải sản phẩm...</div>;

  return (
    <div className="container-full">
      <main>
        <div className="container mt-4">
          <div className="row">
            {/* Ảnh */}
            <div className="col-md-6">
              <div className="main-image text-center">
                <img
                  className="img-fluid hinh"
                  style={{ height: "636px" }}
                  src={product.hinh}
                  alt={product.tensanpham}
                />
              </div>
            </div>

            {/* Thông tin sản phẩm */}
            <div className="col-md-6">
              <h2 className="product-title">{product.tensanpham}</h2>
              <p className="product-price">{formatter(product.gia)}</p>
              <p><b>Tình trạng:</b> Còn hàng</p>
              <p><b>Số lượng:</b> {product.soluong || "20"}</p>

              <Quantity />

              <div className="d-grid mt-3">
                <button className="btn btn-danger">Mua ngay</button>
              </div>

              <div className="product-icons text-center m-2">
                <div
                  className="hinh"
                  style={{
                    backgroundImage: `url(${huongdan})`,
                    height: "105px",
                  }}
                ></div>
              </div>

              <div className="alert alert-pink mt-3">
                <p><strong>Khuyến mãi:</strong></p>
                <ul>
                  <li>Tặng kèm thiệp ý nghĩa</li>
                  <li>Gói túi kính buộc nơ siêu xinh</li>
                </ul>
              </div>
            </div>

            {/* Thông tin chi tiết */}
            <div className="col-6 mt-4">
              <h5 className="text-pink fw-bold fs-5">THÔNG TIN SẢN PHẨM</h5>
              <hr className="text-pink" />
              <p><strong>Thương hiệu:</strong> {product.thuonghieu || "Bemori"}</p>
              <p><strong>Chất liệu:</strong> Bông mềm, an toàn</p>
              <p><strong>Công dụng:</strong> Làm quà tặng, trang trí</p>

              <div className="text-center mt-4 mb-3">
                <div
                  className="img-fluid rounded shadow hinh"
                  style={{
                    backgroundImage: `url(${baoquan})`,
                    height: "733px",
                  }}
                ></div>
              </div>
              <p>Vệ sinh gấu bông định kỳ giúp bảo vệ sức khỏe và giữ sản phẩm bền đẹp lâu dài.</p>
            </div>

            {/* Sản phẩm tương tự */}
            <h5 className="text-pink fw-bold fs-5">Sản Phẩm Tương Tự</h5>
            <hr />
            <ProductList products={relatedProducts} />
          </div>

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
