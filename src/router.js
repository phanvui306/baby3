import { ROUTERS } from "./utils/router";
import HomePage from "./pages/users/homePage";
import { Route, Routes } from "react-router-dom";
import MasterLayout from "./pages/users/theme/masterLayout";
import GauTeddyPage from "./pages/users/gauTeddyPage";
import BlindBoxPage from "pages/users/blindBoxPage";
import ThuBongPage from "pages/users/thuBongPage";
import PhuKienPage from "pages/users/phuKienPage";
import HoaGauBongPage from "pages/users/hoaGauBongPage";
import GocCuaGauPage from "pages/users/gocCuaGauPage";
import ChiTietPage from "pages/users/chiTietPage";
import CartPage from "pages/users/cartPage";
import ThanhToanPage from "pages/users/thanhToanPage";
import DangKyPage from "pages/users/dangKyPage";
import DangNhapPage from "pages/users/dangNhapPage";

const renderUserRouter = () => {
  const useRouters = [
    {
      path: ROUTERS.USER.HOME,
      component: <HomePage />,
    },
    {
      path: ROUTERS.USER.GAUTEDDY,
      component: <GauTeddyPage />,
    },
    {
      path: ROUTERS.USER.BLINDBOX,
      component: <BlindBoxPage />,
    },
    {
      path: ROUTERS.USER.THUBONG,
      component: <ThuBongPage />,
    },
    {
      path: ROUTERS.USER.PHUKIEN,
      component: <PhuKienPage />,
    },
    {
      path: ROUTERS.USER.HOAGAUBONG,
      component: <HoaGauBongPage />,
    },
    {
      path: ROUTERS.USER.GOCCUAGAU,
      component: <GocCuaGauPage />,
    },
    {
      path: ROUTERS.USER.CHITIET,
      component: <ChiTietPage />,
    },
    {
      path: ROUTERS.USER.GIOHANG,
      component: <CartPage />,
    },
    {
      path: ROUTERS.USER.THANHTOAN,
      component: <ThanhToanPage />,
    },
    {
      path: ROUTERS.USER.DANGNHAP,
      component: <DangNhapPage />,
    },
    {
      path: ROUTERS.USER.DANGKY,
      component: <DangKyPage />,
    },

  ];
  return (
    <MasterLayout>
      <Routes>
        {
          useRouters.map((item, key) => (
            <Route key={key} path={item.path} element={item.component} />
          ))
        }
      </Routes>
    </MasterLayout>

  );
};

const RouterCustom = () => {
  return renderUserRouter();
};
export default RouterCustom;
