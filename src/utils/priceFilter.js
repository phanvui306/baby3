export const priceRanges = [
    { label: "Tất cả", value: "all" },
    { label: "Dưới 150,000đ", value: "under-150000" },
    { label: "150,000đ - 200,000đ", value: "150000-200000" },
    { label: "Trên 200,000đ", value: "above-200000" },
];

// Hàm lọc sản phẩm theo khoảng giá
export const filterProductsByPrice = (products, selectedPriceRange) => {
    return products.filter((product) => {
        const price = product.gia || product.price; // hỗ trợ cả 'gia' lẫn 'price'
        if (selectedPriceRange === "all") return true;
        if (selectedPriceRange === "under-150000") return price < 150000;
        if (selectedPriceRange === "150000-200000") return price >= 150000 && price <= 200000;
        if (selectedPriceRange === "above-200000") return price > 200000;
        return true;
    });
};
