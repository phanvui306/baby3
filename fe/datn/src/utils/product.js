import { useState } from "react";
import '../style/style.css';
import { formatter } from "utils/fomater"
import { generatePath, Link } from "react-router-dom";
import sphot from "assets/users/imager/body/sphot.jpg";
import sphot1 from "assets/users/imager/body/sphot1.jpg";
import sphot2 from "assets/users/imager/body/sphot2.jpg";
import sphot3 from "assets/users/imager/body/sphot3.jpg";
import { ROUTERS } from "./router";

export const products = [
    {
        img: sphot1,
        name: "Gấu Teddy",
        price: 279000,
        sizes: [
            "30cm", "40cm", "55cm", "75cm"
        ],
        colors: [
            "#F7A9C4", "#A892C4"
        ],
        category: "Blindbox",
    },
    {
        img: sphot2,
        name: "Gấu Teddy",
        price: 219000,
        sizes: [
            "30cm", "40cm", "55cm", "75cm"
        ],
        colors: [
            "#F7A9C4", "#A892C4"
        ],
        category: "Blindbox",
    },
    {
        img: sphot3,
        name: "Gấu Teddy",
        price: 179000,
        sizes: [
            "30cm", "40cm", "55cm", "75cm"
        ],
        colors: [
            "#F7A9C4", "#A892C4"
        ],
        category: "Blindbox",
    },
    {
        img: sphot,
        name: "Gấu Teddy",
        price: 379000,
        sizes: [
            "30cm", "40cm", "55cm", "75cm"
        ],
        colors: [
            "#F7A9C4", "#A892C4"
        ],
        category: "Blindbox",
    },
    {
        img: sphot2,
        name: "Gấu Teddy",
        price: 199000,
        sizes: [
            "30cm", "40cm", "55cm", "75cm"
        ],
        colors: [
            "#F7A9C4", "#A892C4"
        ],
        category: "Blindbox",
    },
    {
        img: sphot1,
        name: "Gấu Teddy",
        price: 279000,
        sizes: [
            "30cm", "40cm", "55cm", "75cm"
        ],
        colors: [
            "#F7A9C4", "#A892C4"
        ],
        category: "Blindbox",
    },
    {
        img: sphot,
        name: "Gấu Teddy",
        price: 159000,
        sizes: [
            "30cm", "40cm", "55cm", "75cm"
        ],
        colors: [
            "#F7A9C4", "#A892C4"
        ],
        category: "Blindbox",
    },
    {
        img: sphot2,
        name: "Gấu Teddy",
        price: 119000,
        sizes: [
            "30cm", "40cm", "55cm", "75cm"
        ],
        colors: [
            "#F7A9C4", "#A892C4"
        ],
        category: "Blindbox",
    },
    {
        img: sphot3,
        name: "Gấu Teddy",
        price: 279000,
        sizes: [
            "30cm", "40cm", "55cm", "75cm"
        ],
        colors: [
            "#F7A9C4", "#A892C4"
        ],
        category: "Gấu Teddy",
    },
    {
        img: sphot2,
        name: "Gấu Teddy",
        price: 279000,
        sizes: [
            "30cm", "40cm", "55cm", "75cm"
        ],
        colors: [
            "#F7A9C4", "#A892C4"
        ],
        category: "Gấu Teddy",
    },
    {
        img: sphot1,
        name: "Gấu Teddy",
        price: 279000,
        sizes: [
            "60cm", "90cm", "1m", "1m3"
        ],
        colors: [
            "#F7A9C4", "#A892C4"
        ],
        category: "Gấu Teddy",
    },
    {
        img: sphot,
        name: "Gấu Teddy",
        price: 279000,
        sizes: [
            "70cm", "80cm", "90cm", "1m"
        ],
        colors: [
            "#F7A9C4", "#A892C4"
        ],
        category: "Gấu Teddy",
    },
];

export const ProductList = ({ products }) => {
    return (
        <div className="row">
            {products.map((product, index) => (
                <ProductItem key={index} product={product} />
            ))}
        </div>
    );
};

const ProductItem = ({ product }) => {
    const [selectedSize, setSelectedSize] = useState(product.sizes[0]); // Mặc định chọn size đầu tiên
    const [selectedColor, setSelectedColor] = useState(product.colors[0]); // Mặc định chọn màu đầu tiên

    return (
        <div className="col-3 p-2">
            {/* Hình ảnh sản phẩm */}
            <div className="image-container">
                <Link to={generatePath(ROUTERS.USER.CHITIET, { id: 1 })}><img src={product.img} alt={product.name} className="img-fluid" /></Link>
            </div>

            {/* Tên sản phẩm */}
            <div className="text-start m-1 ">
                <Link className="text" to={generatePath(ROUTERS.USER.CHITIET, { id: 1 })}><p>{product.name}</p></Link>
            </div>

            {/* Giá sản phẩm */}
            <div className="text-start m-1 fs-5 fw-semibold" style={{ color: "#f05599" }}>
                {formatter(product.price)}
            </div>

            {/* Chọn kích thước */}
            <div className="mb-3 text-start m-1">
                {product.sizes.map((size, idx) => (
                    <span
                        key={idx}
                        className={`size-option ${selectedSize === size ? "active" : ""}`}
                        data-size={size}
                        onClick={() => setSelectedSize(size)}
                    >
                        {size}
                    </span>
                ))}
            </div>

            {/* Chọn màu sắc */}
            <div className="text-start m-1">
                {product.colors.map((color, idx) => (
                    <span
                        key={idx}
                        className={`color-option ${selectedColor === color ? "active" : ""}`}
                        style={{
                            backgroundColor: color,
                            border: selectedColor === color ? "3px solid #f05599" : "none"
                        }}
                        data-color={color}
                        onClick={() => setSelectedColor(color)}
                    ></span>
                ))}
            </div>
        </div>
    );
};