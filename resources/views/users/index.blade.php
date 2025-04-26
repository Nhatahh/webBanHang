@extends('layouts.body_user')

@section('title', 'Trang Chủ')

@section('content')
<!-- Body -->
<div class="content">
  <div class="container-fluid mt-4" style="height: auto">
    <!-- Slider Banner -->
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
            src="{{ asset('images/banner1.jpg') }}"
            class="d-block w-100"
            alt="banner1"
          />
        </div>
        <div class="carousel-item">
          <img
            src="{{ asset('images/banner2.jpg') }}"
            class="d-block w-100"
            alt="banner2"
          />
        </div>
        <div class="carousel-item">
          <img
            src="{{ asset('images/banner3.jpg') }}"
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
    <!-- Hien thi san pham -->
    <div class="row justify-content-around align-items-center mt-4">
      @foreach($sanphams as $sp)
      <div class="card card_sanpham shadow col-4 mb-4" style="width: 18rem">
        <a href="{{ route('user.chitiet', ['id' => $sp->sp_id]) }}" class="link_detail"
          ><img
            src="{{ asset('images/' . $sp->hinhanh) }}"
            class="card-img-top"
            alt="{{ $sp->tensp }}"
          />
          <div class="card-body">
            <h5 class="card-title">{{ $sp->tensp }}</h5>
            <p class="card-text">{{ number_format($sp->gia, 0, ',', ',') }} VND</p>
          </div></a
        ><a href="{{ route('user.giohang') }}" class="btn btn-outline-danger mb-3"
          >Thêm vào giỏ hàng</a
        >
      </div>
      @endforeach
    </div>
    <!-- Phan trang -->
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
