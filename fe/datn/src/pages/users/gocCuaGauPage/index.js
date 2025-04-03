import { memo } from "react";
import '../../../style/style.css';
import { Link } from "react-router-dom";
import { featStores, renderFeaturedStores } from "utils/stores";
import { storeData, FeatStoreData } from "utils/goccuagau";

const GocCuaGauPage = () => {
  return (
    <div className="container-full">
      <main>
        <div className="container">
          <div class="container mt-4 mb-4">
            <nav aria-label="breadcrumb">
              <ol className="breadcrumb">
                <li className="breadcrumb-item">
                  <Link>Trang Chủ</Link>
                </li>
                <li className="breadcrumb-item active" aria-current="page">
                  Góc Của Gấu
                </li>
              </ol><p className="fs-2 text-center fw-semibold text">GÓC CỦA GẤU</p>
            </nav>
          </div>

          <div className="row d-flex justify-content-center">

            <FeatStoreData storeData={storeData}></FeatStoreData>
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

export default memo(GocCuaGauPage);
