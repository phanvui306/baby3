import { memo, useState } from "react";
import "../../../style/style.css";
import { Link } from "react-router-dom";
import { ProductList } from "utils/product";
import { featStores, renderFeaturedStores } from "utils/stores";
import { priceRanges } from "utils/priceFilter";

const PhuKienPage = () => {
    const [selectedPriceRange, setSelectedPriceRange] = useState("all");

    return (
        <div className="container-full">
            <main>
                <div className="container">
                    <div className="container mt-4 mb-4">
                        <nav aria-label="breadcrumb">
                            <ol className="breadcrumb">
                                <li className="breadcrumb-item">
                                    <Link to="/">Trang Chủ</Link>
                                </li>
                                <li className="breadcrumb-item active" aria-current="page">
                                    Gấu Bông Nhỏ - Phụ Kiện
                                </li>
                            </ol>
                        </nav>
                        <div className="filter-group d-flex align-items-center">
                            <button className="btn btn-outline-pink d-flex align-items-center">
                                <i className="fa-solid fa-filter" style={{ color: "#f05a99" }}></i> Lọc
                            </button>
                            <div className="dropdown ms-2">
                                <button
                                    className="btn btn-outline-pink dropdown-toggle"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Khoảng Giá
                                </button>
                                <ul className="dropdown-menu">
                                    {priceRanges.map((range) => (
                                        <li key={range.value}>
                                            <button
                                                className="dropdown-item"
                                                onClick={() => setSelectedPriceRange(range.value)}
                                            >
                                                {range.label}
                                            </button>
                                        </li>
                                    ))}
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div className="row d-flex justify-content-center">
                        {/* Truyền category vào ProductList để nó lọc đúng sản phẩm */}
                        <ProductList category="4" selectedPriceRange={selectedPriceRange} />
                    </div>
                </div>

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

export default memo(PhuKienPage);
