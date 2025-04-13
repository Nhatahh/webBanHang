<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="/bootstrap/bootstrap-icons-1.11.3/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="/public_html/css/style1.css" />
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>

    <title>Home</title>
  </head>
  <body>
    <header class="sticky-top">
      <div class="marquee-container" style="background-color: white;">
        <marquee behavior="scroll" direction="left"
          >🔥 Giảm giá sốc 30% toàn bộ sản phẩm! Mua ngay kẻo lỡ! 🚀</marquee
        >
      </div>
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand fs-1" href="../index.html">
            <img
              src="/public_html/images/logo2.png"
              alt="logo"
              width="50"
              height="50"
              class="d-inline-block align-text-top"
            />
            NHATAHH
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarScroll"
            aria-controls="navbarScroll"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul
              class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
              style="--bs-scroll-height: 100px"
            >
              <li class="nav-item">
                <a class="nav-link" href="../pages/tatcasanpham.html">
                  SẢN PHẨM <i class="bi bi-chevron-compact-down"></i
                ></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../pages/ao.html">
                  ÁO NAM <i class="bi bi-chevron-compact-down"></i
                ></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../pages/quan.html">
                  QUẦN NAM <i class="bi bi-chevron-compact-down"></i
                ></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../pages/membership.html">
                  MEMBERSHIP
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../pages/chinhsach.html">
                  CHÍNH SÁCH
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../pages/phuongthucthanhtoan.html">
                  PHƯƠNG THỨC THANH TOÁN
                </a>
              </li>
            </ul>
            <form class="d-flex">
              <div class="input-group">
                <input class="form-control" placeholder="Search" />
                <button class="btn btn-outline-light" type="submit">
                  <i class="bi bi-search"></i>
                </button>
              </div>
            </form>
            <div class="nav-icons mx-3">
              <a href="../pages/giohang.html"><i class="bi bi-bag"></i></a>
              <a href="../pages/dangnhap.html"
                ><i class="bi bi-person-circle"></i
              ></a>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <div class="content">
      <div class="container-fluid mt-4" style="height: auto">
        <div class="d-flex flex-column align-items-center">
          <div class="d-flex justify-content-evenly w-100 w-md-50 w-lg-25 mt-5">
            <a
              href="./dangnhap.html"
              class="signup"
              style="text-decoration: none; color: #1c77ff"
              ><h2 class="mb-4">ĐĂNG NHẬP</h2></a
            >
            <a
              href="./dangky.html"
              class="signup"
              style="text-decoration: none; color: #002ffe"
              ><h2 class="mb-4">ĐĂNG KÝ</h2></a
            >
          </div>
          <hr class="w-50" />
          <div class="col-12 col-md-6 col-lg-4">
            <form action="#">
              <input
                class="form-control mb-3"
                type="text"
                placeholder="* Họ và tên"
              />
              <input
                class="form-control mb-3"
                type="email"
                placeholder="* Địa Chỉ Email"
              />
              <input
                class="form-control mb-3"
                type="text"
                placeholder="* Số điện thoại"
              />
              <input
                class="form-control mb-3"
                type="password"
                placeholder="* Mật Khẩu"
              />
              <input
                class="form-control mb-3"
                type="password"
                placeholder="* Nhập lại mật Khẩu"
              />
              <div class="d-flex justify-content-end mb-3">
                <small class="text-muted">* Bắt buộc</small>
              </div>
              <div class="form-check mb-3">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value="1"
                  id="flexCheckDefault"
                />
                <small
                  class="form-check-label text-muted"
                  for="flexCheckDefault"
                >
                  Tôi muốn nhận email từ NHATAHH với các tin tức mới nhất về sản
                  phẩm và dịch vụ, ưu đãi đặc biệt và sự kiện độc quyền. Bạn có
                  thể hủy đăng ký bất kỳ lúc nào thông qua liên kết hủy đăng ký
                  ở cuối mỗi email. Để biết thêm thông tin, hãy xem Chính sách
                  quyền riêng tư của NHATAHH.
                </small>
              </div>
              <a href="./dangnhap.html"
                ><button
                  type="button"
                  class="btn btn-outline-primary btn-lg w-100"
                >
                  Đăng Ký
                </button></a
              >
            </form>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <hr />
      <div class="row">
        <div
          class="col-12 col-md-6 mb-3 d-flex flex-column justify-content-around align-items-center"
        >
          <div class="contact fw-bold">
            <a href="tel:0372576944">📞 0372576944</a><br />
            <a href="mailto:bhnhatktpm2211005@student.ctuet.edu.vn"
              >📧 bhnhatktpm2211005@student.ctuet.edu.vn</a
            >
          </div>
          <div class="social-icons">
            <a href="https://www.facebook.com/huunhat49" target="_blank"
              ><i class="bi bi-facebook fs-3"></i
            ></a>
            <a href="https://www.instagram.com/nhatahh/" target="_blank"
              ><i class="bi bi-instagram fs-3"></i
            ></a>
            <a href="https://www.tiktok.com/@hnhaajt" target="_blank"
              ><i class="bi bi-tiktok fs-3"></i
            ></a>
          </div>
        </div>
        <div class="col-12 col-md-6 mb-3 logo d-flex justify-content-around">
          <img
            src="/public_html/images/logo2.png"
            alt="logo"
            width="150vh"
            height="150vh"
          />
        </div>
      </div>
      <hr />
      <div class="text-center fst-italic mt-3 mb-3">
        Copyright © 2025 NHATAHH by Bùi Hữu Nhật
      </div>
    </footer>
  </body>
</html>
