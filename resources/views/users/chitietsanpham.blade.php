@extends('layouts.body_user')

@section('title', 'Detail Product')

@section('content')
<!-- Body -->
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
@endsection