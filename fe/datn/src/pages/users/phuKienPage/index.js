import { memo, useState } from "react";
import '../../../style/style.css';
import { Link } from "react-router-dom";
import { ProductList, products } from "utils/product";
import { featStores, renderFeaturedStores } from "utils/stores";
import { priceRanges, filterProductsByPrice } from "utils/priceFilter";
const PhuKienPage = () => {

  const [selectedPriceRange, setSelectedPriceRange] = useState("all");

  const blindboxProducts = products.filter((product) => product.category === "Gấu Teddy");

  const filteredProducts = filterProductsByPrice(blindboxProducts, selectedPriceRange);

  return (
    <div className="container-full">
      <main>
        <div className="container">
          <div class="container mt-4 mb-4">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <Link>Trang Chủ</Link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Gấu Bông Nhỏ - Phụ Kiện
                </li>
              </ol>
            </nav>
            <div class="filter-group d-flex align-items-center">
              <button class="btn btn-outline-pink d-flex align-items-center">
                <i class="fa-solid fa-filter" style={{ color: "#f05a99" }}></i> Lọc
              </button>
              <div class="dropdown ms-2">
                <button class="btn btn-outline-pink dropdown-toggle" type="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Khoảng Giá
                </button>
                <ul className="dropdown-menu">
                  {priceRanges.map((range) => (
                    <li key={range.value}>
                      <button className="dropdown-item" onClick={() => setSelectedPriceRange(range.value)}>
                        {range.label}
                      </button>
                    </li>
                  ))}
                </ul>
              </div>
            </div>
          </div>
          <div className="row d-flex justify-content-center">
            <ProductList products={filteredProducts} />
          </div >
        </div >
        <div className="body p-2">
          <div className="container">
            <h2 className="section-title">HỆ THỐNG CỬA HÀNG</h2>
            {renderFeaturedStores(featStores)}
          </div>
        </div>

      </main >
    </div>
  );
};

export default memo(PhuKienPage);
