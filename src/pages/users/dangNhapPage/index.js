import { memo } from "react";
import "../../../style/style.css";
import { Link } from "react-router-dom";
import { ROUTERS } from "utils/router";

const DangNhapPage = () => {
  return (
    <div className="container-full">
      <main>
        <div className="container d-flex justify-content-center">
          <div className="register-box text-center p-4 rounded">
            <div>
              <Link to={ROUTERS.USER.HOME} className="btn-toggle active">Đăng Nhập</Link>
              <Link to={ROUTERS.USER.DANGKY} className="btn-toggle">Đăng Ký</Link>
            </div>

            <form className="mt-3">
              <input type="text" className="form-control" placeholder="Tên Đăng Nhập"
              />
              <input type="password" className="form-control" placeholder="Mật Khẩu"
              />
              <button type="submit" className="btn btndangky mt-3">
                Đăng Nhập
              </button>
            </form>
          </div>
        </div>
      </main>
    </div>
  );
};

export default memo(DangNhapPage);
