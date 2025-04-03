import { memo, useState } from "react";
import '../../../../style/style.css';
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min";
import { Link } from "react-router-dom";
import { ROUTERS } from "utils/router";

import header2 from "assets/users/imager/header/Logo.webp";
import header3 from "assets/users/imager/header/slider.jpg";
const Header = () => {
  const [menus] = useState([
    {
      name: "Trang Chủ",
      path: ROUTERS.USER.HOME
    },
    {
      name: "Blindbox",
      path: ROUTERS.USER.BLINDBOX
    },
    {
      name: "Gấu Teddy",
      path: ROUTERS.USER.GAUTEDDY
    },
    {
      name: "Thú Bông",
      path: ROUTERS.USER.THUBONG
    },
    {
      name: "Phụ Kiện",
      path: ROUTERS.USER.PHUKIEN
    },
    {
      name: "Hoa Gấu Bông",
      path: ROUTERS.USER.HOAGAUBONG
    },
    {
      name: "Góc Của Gấu",
      path: ROUTERS.USER.GOCCUAGAU
    },
  ])

  return (
    <div className="container-full">
      <head>
        <link
          rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
        />
      </head>
      <header>
        <div className="chahinh">
          <div className="hinh" style={{ backgroundImage: `url(${header3})` }}></div>
        </div>
        <div className="container-sm">
          <div className="row ms-4 text-center">
            <div className="col-2 p-1" >
              <Link to={ROUTERS.USER.HOME}>
                <div style={{ backgroundImage: `url(${header2})`, height: "98%" }}></div>
              </Link>
            </div>
            <div className="col-3 p-3 fst-italic fw-semibold fs-5 mauchu">
              "Hug Teddy - Unbox Love"
            </div>
            <div className="col-3 p-3">
              <form action="" id="search-box">
                <input type="text" id="search-text" placeholder="Nhập sản phẩm cần tìm ?" />
                <button id="search-btn" title="submit">
                  <i className="fa-solid fa-magnifying-glass" style={{ color: "#f05599" }}></i>
                </button>
              </form>
            </div>
            <div className="col-1 p-2 text-center">
              <button id="btn">
                <i className="fa-solid fa-phone" style={{ color: "#ffffff" }}></i>
              </button>
            </div>
            <div className="col-1 p-2 text-center">
              <Link to={ROUTERS.USER.GIOHANG}>
                <button className="cart-button">
                  <i className="fa-solid fa-cart-shopping" style={{ color: "#fdfdfd" }}></i>
                  <span class="cart-badge">1</span>
                </button>
              </Link>
            </div>
            <div className="col-1 p-2 text-center cart-container">
              <Link to={ROUTERS.USER.DANGNHAP}>
                <button id="btn">
                  <i className="fa-solid fa-user" style={{ color: "#fefefe" }}></i>
                </button>
              </Link>
            </div>
          </div>
          <nav className="navbar navbar-expand-lg bg-white">
            <div className="container">
              <button
                className="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menuNav"
              >
                <span className="navbar-toggler-icon"></span>
              </button>
              <div className="collapse navbar-collapse justify-content-center" id="menuNav">
                <ul className="navbar-nav">
                  {
                    menus
                      .filter(menu => menu.path !== ROUTERS.USER.HOME)
                      .map((menu, menukey) => (
                        <li className="nav-item" key={menukey}>
                          <Link className="nav-link" to={menu?.path}>{menu?.name}</Link>
                        </li>
                      ))
                  }
                </ul>
              </div>
            </div>
          </nav>
        </div>

      </header >
    </div >
  );
};

export default memo(Header);
