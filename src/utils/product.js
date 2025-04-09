import { useEffect, useState } from "react";
import { formatter } from "utils/fomater";
import { generatePath, Link } from "react-router-dom";
import { ROUTERS } from "./router";
import { filterProductsByPrice } from "utils/priceFilter";

export const ProductList = ({ category = "", selectedPriceRange = "all", products: initialProducts = [] }) => {
    const [products, setProducts] = useState(initialProducts);

    useEffect(() => {
        // Nếu có products truyền vào thì không fetch nữa
        if (initialProducts.length > 0) return;

        const fetchProducts = async () => {
            try {
                const url = category
                    ? `http://localhost:3000/api/products/category/${category}`
                    : `http://localhost:3000/api/products`;

                const res = await fetch(url);
                const data = await res.json();
                setProducts(data);
            } catch (err) {
                console.error("Lỗi khi lấy sản phẩm:", err);
            }
        };

        fetchProducts();
    }, [category, initialProducts]);

    const filtered = filterProductsByPrice(products, selectedPriceRange);

    return (
        <div className="row">
            {filtered.map((product) => (
                <ProductItem key={product.id} product={product} />
            ))}
        </div>
    );
};


const ProductItem = ({ product }) => {
    const defaultSizes = ["30cm", "40cm", "50cm"];
    const defaultColors = ["#F7A9C4", "#A892C4"];

    const [selectedSize, setSelectedSize] = useState(defaultSizes[0]);
    const [selectedColor, setSelectedColor] = useState(defaultColors[0]);

    return (
        <div className="col-3 p-2">
            <div className="image-container">
                <Link to={generatePath(ROUTERS.USER.CHITIET, { id: product.id })}>
                    <img src={`${product.hinh}`} alt={product.tensanpham} className="img-fluid" />
                </Link>
            </div>
            <div className="text-start m-1">
                <Link className="text" to={generatePath(ROUTERS.USER.CHITIET, { id: product.id })}>
                    <p>{product.tensanpham}</p>
                </Link>
            </div>
            <div className="text-start m-1 fs-5 fw-semibold" style={{ color: "#f05599" }}>
                {formatter(product.gia)}
            </div>
            <div className="mb-3 text-start m-1">
                {defaultSizes.map((size, idx) => (
                    <span
                        key={idx}
                        className={`size-option ${selectedSize === size ? "active" : ""}`}
                        onClick={() => setSelectedSize(size)}
                    >
                        {size}
                    </span>
                ))}
            </div>
            <div className="text-start m-1">
                {defaultColors.map((color, idx) => (
                    <span
                        key={idx}
                        className={`color-option ${selectedColor === color ? "active" : ""}`}
                        style={{
                            backgroundColor: color,
                            border: selectedColor === color ? "3px solid #f05599" : "none"
                        }}
                        onClick={() => setSelectedColor(color)}
                    ></span>
                ))}
            </div>
        </div>
    );
};
