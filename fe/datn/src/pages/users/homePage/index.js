import { memo } from "react";
import '../../../style/style.css';
import body1 from "assets/users/imager/body/slidergiaohang.png";
import body2 from "assets/users/imager/body/bennernho1.jpg";
import body3 from "assets/users/imager/body/bennernho2.jpg";
import body4 from "assets/users/imager/body/bennernho3.jpg";
import body5 from "assets/users/imager/body/bennernho4.jpg";
import body6 from "assets/users/imager/body/hinh1.jpg";
import body7 from "assets/users/imager/body/hinh2.jpg";
import body8 from "assets/users/imager/body/hinh3.jpg";
import body9 from "assets/users/imager/body/bennernho5.jpg";
import body10 from "assets/users/imager/body/benner2.jpg";
import header1 from "assets/users/imager/header/benner.jpg";
import { ProductList, products } from "utils/product";
import { featStores, renderFeaturedStores } from "utils/stores"


const HomePage = () => {

  const blindbox = products.filter((product) => product.category === "Blindbox");
  const gauteddy = products.filter((product) => product.category === "Gấu Teddy");

  return (
    <div className="container-full">
      <div className="hinh" style={{ backgroundImage: `url(${header1})`, height: "630px" }}></div>
      <main>
        <div className="container">
          <div className="hinh mt-2" style={{ backgroundImage: `url(${body1})`, height: "73px", width: "1296px" }}></div>
          <img className="img-fluid p-4" src="img/slider giao hang.png" alt="" />
          <div className="row">
            <div className="col-6 d-flex justify-content-end p-2">
              <div className="hinh" style={{ backgroundImage: `url(${body2})`, height: "330px", width: "600px" }}></div>
            </div>
            <div className="col-6 p-2">
              <div className="hinh" style={{ backgroundImage: `url(${body3})`, height: "330px", width: "600px" }}></div>
            </div>
            <div className="col-6 d-flex justify-content-end p-2">
              <div className="hinh" style={{ backgroundImage: `url(${body4})`, height: "330px", width: "600px" }}></div>
            </div>
            <div className="col-6 p-2">
              <div className="hinh" style={{ backgroundImage: `url(${body5})`, height: "330px", width: "600px" }}></div>
            </div>
          </div>
          <p className="fs-2 text-center fw-semibold text">BỘ SƯU TẬP GẤU BÔNG</p>
          <div className="row d-flex justify-content-center">
            <div className="col-4">
              <div className="hinh" style={{ backgroundImage: `url(${body6})`, height: "300px", width: "416px" }}></div>
            </div>
            <div className="col-4">
              <div className="hinh" style={{ backgroundImage: `url(${body7})`, height: "300px", width: "416px" }}></div>
            </div>
            <div className="col-4">
              <div className="hinh" style={{ backgroundImage: `url(${body8})`, height: "300px", width: "416px" }}></div>
            </div>
            <p className="fs-2 fw-semibold mt-2 texthot">SẢN PHẨM HOT</p>
            <ProductList products={products.slice(0, 4)} />
            <p className="fs-2 text-center fw-semibold text">Blizz boz</p>
            <div className="hinh rounded-5" style={{ backgroundImage: `url(${body9})`, height: "200px", width: "1320px" }}></div>
            <ProductList products={blindbox} />
            <p className="fs-2 text-center fw-semibold text">GẤU BÔNG TEDDY</p>
            <div className="hinh rounded-5" style={{ backgroundImage: `url(${body10})`, height: "846px", width: "1320px" }}></div>
            <ProductList products={gauteddy} />
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

export default memo(HomePage);
