@extends('layouts.body')

@section('title', 'Trang Chủ')

@section('content')
<!-- Body -->
<div class="content">
  <div class="container-fluid mt-4" style="height: auto">
    <div id="carouselExampleIndicators" class="carousel slide">
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
            src="./images/banner1.png"
            class="d-block w-100"
            alt="banner1"
          />
        </div>
        <div class="carousel-item">
          <img
            src="./images/banner2.png"
            class="d-block w-100"
            alt="banner2"
          />
        </div>
        <div class="carousel-item">
          <img
            src="./images/banner3.png"
            class="d-block w-100"
            alt="banner3"
          />
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </button>
    </div>
    <div class="row justify-content-around align-items-center mt-4">
      <div
        class="card card_sanpham shadow col-12 col-sm-6 col-md-4 col-lg-3 mb-4"
        style="width: 18rem"
      >
        <a href="./pages/chitietsanpham.html" class="link_detail"
          ><img
            src="./images/aokhoac1.jpeg"
            class="card-img-top"
            alt="aokhoac1"
          />
          <div class="card-body">
            <h5 class="card-title">SSMA LOGO ZIP HOODIE - GREY</h5>
            <p class="card-text">1,200,000VNĐ</p>
          </div></a
        ><a href="./pages/giohang.html" class="btn btn-outline-danger mb-3"
          >Thêm vào giỏ hàng</a
        >
      </div>
      <div class="card card_sanpham shadow col-4 mb-4" style="width: 18rem">
        <a href="./pages/chitietsanpham.html" class="link_detail"
          ><img
            src="./images/aothun1.jpeg"
            class="card-img-top"
            alt="aothun1"
          />
          <div class="card-body">
            <h5 class="card-title">HOLIDAY24 BASIC T-SHIRT - WHITE</h5>
            <p class="card-text">550,000VNĐ</p>
          </div> </a
        ><a href="./pages/giohang.html" class="btn btn-outline-danger mb-3"
          >Thêm vào giỏ hàng</a
        >
      </div>
      <div class="card card_sanpham shadow col-4 mb-4" style="width: 18rem">
        <a href="./pages/chitietsanpham.html" class="link_detail"
          ><img
            src="./images/polo1.jpeg"
            class="card-img-top"
            alt="polo1"
          />
          <div class="card-body">
            <h5 class="card-title">SSMA CORE POLO SHIRT - GRAY</h5>
            <p class="card-text">750,000VNĐ</p>
          </div></a
        ><a href="./pages/giohang.html" class="btn btn-outline-danger mb-3"
          >Thêm vào giỏ hàng</a
        >
      </div>
      <div class="card card_sanpham shadow col-4 mb-4" style="width: 18rem">
        <a href="./pages/chitietsanpham.html" class="link_detail"
          ><img
            src="./images/somi1.jpeg"
            class="card-img-top"
            alt="somi1"
          />
          <div class="card-body">
            <h5 class="card-title">FALL24 OFFROAD SHIRT - PINK</h5>
            <p class="card-text">750,000VNĐ</p>
          </div></a
        ><a href="./pages/giohang.html" class="btn btn-outline-danger mb-3"
          >Thêm vào giỏ hàng</a
        >
      </div>
      <div class="card card_sanpham shadow col-4 mb-4" style="width: 18rem">
        <a href="./pages/chitietsanpham.html" class="link_detail"
          ><img
            src="./images/quanshort1.jpeg"
            class="card-img-top"
            alt="quanshort1"
          />
          <div class="card-body">
            <h5 class="card-title">SSMA CORE CANVAS SHORTS - WHITE</h5>
            <p class="card-text">750,000VNĐ</p>
          </div></a
        ><a href="./pages/giohang.html" class="btn btn-outline-danger mb-3"
          >Thêm vào giỏ hàng</a
        >
      </div>
      <div class="card card_sanpham shadow col-4 mb-4" style="width: 18rem">
        <a href="./pages/chitietsanpham.html" class="link_detail"
          ><img
            src="./images/quanshort2.jpeg"
            class="card-img-top"
            alt="quanshort2"
          />
          <div class="card-body">
            <h5 class="card-title">FW24 WASHED CARGO JORTS - BLACK</h5>
            <p class="card-text">990,000VNĐ</p>
          </div></a
        ><a href="./pages/giohang.html" class="btn btn-outline-danger mb-3"
          >Thêm vào giỏ hàng</a
        >
      </div>
      <div class="card card_sanpham shadow col-4 mb-4" style="width: 18rem">
        <a href="./pages/chitietsanpham.html" class="link_detail"
          ><img
            src="./images/quandai1.jpeg"
            class="card-img-top"
            alt="quandai1"
          />
          <div class="card-body">
            <h5 class="card-title">SSMA MMF SWEAT PANTS - BLACK</h5>
            <p class="card-text">1,100,000VNĐ</p>
          </div></a
        ><a href="./pages/giohang.html" class="btn btn-outline-danger mb-3"
          >Thêm vào giỏ hàng</a
        >
      </div>
      <div class="card card_sanpham shadow col-4 mb-4" style="width: 18rem">
        <a href="./pages/chitietsanpham.html" class="link_detail"
          ><img
            src="./images/jean1.jpeg"
            class="card-img-top"
            alt="jean1"
          />
          <div class="card-body">
            <h5 class="card-title">HOLIDAY24 DESTROYED JEANS - BLUE</h5>
            <p class="card-text">1,790,000VNĐ</p>
          </div></a
        ><a href="./pages/giohang.html" class="btn btn-outline-danger mb-3"
          >Thêm vào giỏ hàng</a
        >
      </div>
    </div>
    <div class="pagination d-flex justify-content-end">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link active" href="#">1</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>
@endsection
