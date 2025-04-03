import '../style/style.css';

export const Quantity = ({ hasAddToCart = true }) => {
  return (
    <div className="d-flex align-items-center mx-4">
      <div className="btn11">
        <span className="btn1">−</span>
        <input type="number" className="btn2" width="100px" defaultValue={1} />
        <span className="btn1">+</span>
      </div>
      {
        hasAddToCart && (
          <div className="mx-2">
            <button className="btn btn-pink" >
              <i className="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng
            </button>
          </div>
        )}
    </div>
  );
};
