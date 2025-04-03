import '../style/style.css';
import store1 from "assets/users/imager/body/goccuagau1.png";
import store2 from "assets/users/imager/body/goccuagau2.png";
import store3 from "assets/users/imager/body/goccuagau3.png";
import store4 from "assets/users/imager/body/goccuagau4.png";
import store5 from "assets/users/imager/body/goccuagau5.png";
import store6 from "assets/users/imager/body/goccuagau6.png";
import store7 from "assets/users/imager/body/goccuagau7.png";
import store8 from "assets/users/imager/body/goccuagau8.png";
import store9 from "assets/users/imager/body/goccuagau9.png";

export const storeData = [
    {
        img: store1,
        description: "Câu Chuyện Thương Hiệu: Gấu Bông Bemori Kết Nối và Truyền Cảm Hứng Cho Tình Yêu",
    },
    {
        img: store2,
        description: "Các Nguyên Liệu Tạo Thành Gấu Bông: Bí Mật Của Sự Mềm Mại và Đáng Yêu",
    },
    {
        img: store3,
        description: "Hướng Dẫn Khâu Gấu Bông Bị Rách Không Lộ Đường Chỉ",
    },
    {
        img: store4,
        description: "Cách Giặt Gấu Bông Tại Nhà Đơn Giản Và Sạch Đẹp",
    },
    {
        img: store5,
        description: "Cách Phân Biệt Gấu Bông Cao Cấp Chất Lượng Tốt Và Gấu Kém Chất Lượng",
    },
    {
        img: store6,
        description: "Mách Bạn Cách Đo Gấu Bông Chính Xác Nhất",
    },
    {
        img: store7,
        description: "Vì Sao Shop Gấu Bông Bemori 368 Nguyễn Trãi “Đốn Tim” Giới Trẻ?",
    },
    {
        img: store8,
        description: "Bemori 1028 Đường Láng – Shop Gấu Bông Giá Rẻ, Đẹp Nhất Tại Hà Nội",
    },
    {
        img: store9,
        description: "Bemori 275 Bạch Mai – Điểm Mua Gấu Bông Đẹp Lý Tưởng Cho Giới Trẻ Hà Nội",
    },
];

// Component chính để hiển thị danh sách cửa hàng
export const FeatStoreData = ({ storeData }) => {
    return (
        <div className="row">
            {storeData.map((store, index) => (
                <StoreDataItem key={index} store={store} />
            ))}
        </div>
    );
};

// Component hiển thị từng mục trong danh sách
const StoreDataItem = ({ store }) => {
    return (
        <div className="col-4 p-3">
            <div className='khung1'>
                {/* Hình ảnh sản phẩm */}
                <div className="image-container1">
                    <img src={store.img} alt="" className="img-fluid img3" />
                </div>

                {/* Tên sản phẩm */}
                <div className=" description1 fw-bold mt-3">
                    <p className='text2'>{store.description}</p>
                </div></div>

        </div>
    );
};
