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
      <div class="container-fluid mt-4 mb-4" style="height: auto">
        <div class="row">
          <div class="col-6">
            <div
              id="carouselExampleIndicators"
              class="carousel slide"
              data-bs-ride="carousel"
            >
              <div class="carousel-indicators">
                <button
                  type="button"
                  data-bs-target="#carouselExampleIndicators"
                  data-bs-slide-to="0"
                  class="active"
                  aria-current="true"
                  aria-label="Slide 1"
                ></button>
                <button
                  type="button"
                  data-bs-target="#carouselExampleIndicators"
                  data-bs-slide-to="1"
                  aria-label="Slide 2"
                ></button>
                <button
                  type="button"
                  data-bs-target="#carouselExampleIndicators"
                  data-bs-slide-to="2"
                  aria-label="Slide 3"
                ></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img
                    src="../images/aokhoac1.jpeg"
                    class="d-block w-100"
                    alt="aokhoac1"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="../images/aokhoac1_2.jpeg"
                    class="d-block w-100"
                    alt="aokhoac1_2"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="../images/aokhoac1_3.jpeg"
                    class="d-block w-100"
                    alt="aokhoac1_3"
                  />
                </div>
              </div>
              <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next"
              >
                <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="col-6 p-3">
            <h1>SSMA LOGO ZIP HOODIE - GREY</h1>
            <p class="fs-3">1,200,000đ</p>
            <div class="radio-size">
              <input
                type="radio"
                class="btn-check"
                name="btnradio"
                id="btnradio1"
              />
              <label class="btn btn-outline-dark rounded-0" for="btnradio1"
                >Size S</label
              >
              <input
                type="radio"
                class="btn-check"
                name="btnradio"
                id="btnradio2"
              />
              <label class="btn btn-outline-dark rounded-0" for="btnradio2"
                >Size M</label
              >
              <input
                type="radio"
                class="btn-check"
                name="btnradio"
                id="btnradio3"
              />
              <label class="btn btn-outline-dark rounded-0" for="btnradio3"
                >Size L</label
              >
            </div>
            <div class="input-group quantity-container w-25 mt-3 mb-3">
              <button class="btn btn-outline-secondary btn-minus" type="button">
                -
              </button>
              <input
                type="text"
                class="form-control text-center quantity-input"
                value="1"
              />
              <button class="btn btn-outline-secondary btn-plus" type="button">
                +
              </button>
            </div>
            <a href="../pages/giohang.html" class="btn btn-dark"
              >Thêm vào giỏ hàng</a
            >
            <hr />
            <img
              src="../images/bangsizeaokhoac.jpg"
              class="w-100"
              alt="bangsizeaokhoac"
            />
            <div>
              <p>- Nỉ cotton</p>
              <p>- Dáng rộng (oversize)</p>
              <p>- Mũ liền</p>
              <p>- Logo thêu nổi 3D phía trước - bên trái</p>
              <p>- Khóa kéo hai chiều</p>
              <p>- Sản xuất tại Việt Nam</p>
            </div>
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
