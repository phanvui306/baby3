import { memo } from "react";
import { Link } from "react-router-dom";
import '../../../style/style.css';
import { ROUTERS } from "utils/router";

const DangKyPage = () => {
  return (
    <div className="container-full">
      <main>
        <div className="container d-flex justify-content-center">
          <div className="register-box text-center p-4 rounded">
            <div className="">
              <Link to={ROUTERS.USER.DANGNHAP} className="btn-toggle">Đăng Nhập</Link>
              <Link to={ROUTERS.USER.HOME} className="btn-toggle active">Đăng Ký</Link>
            </div>
            <form className="mt-3">
              <input type="email" className="form-control" placeholder="Email" required />
              <input type="text" className="form-control" placeholder="Số Điện Thoại" required />
              <input type="text" className="form-control" placeholder="Tên Đăng Nhập" required />
              <input type="password" className="form-control" placeholder="Mật Khẩu" required />
              <input type="password" className="form-control" placeholder="Nhập Lại Mật Khẩu" required />
              <button type="submit" className="btn btndangky mt-3">Đăng Ký</button>
            </form>
          </div>
        </div>
      </main>
    </div>
  );
};

export default memo(DangKyPage);
