@extends('layouts.user.body')

@section('title', 'Trang Chủ')

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
                src="{{ asset('images/' . $chitiet->hinhanh) }}"
                class="d-block w-100"
                alt="aokhoac1"
              />
            </div>
            <div class="carousel-item">
              <img
                src="{{ asset('images/aokhoac1_2.jpg') }}"
                class="d-block w-100"
                alt="aokhoac1_2"
              />
            </div>
            <div class="carousel-item">
              <img
                src="{{ asset('images/aokhoac1_3.jpg') }}"
                class="d-block w-100"
                alt="aokhoac1_2"
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
        <h1>{{ $chitiet->tensp }}</h1>
        <p class="fs-3">{{ number_format($chitiet->gia, 0, ',', ',') }} VND</p>
        <form id="formGioHang" action="{{ route('user.themgiohang') }}" method="POST">
        @csrf 
        <input type="hidden" name="sp_id" value="{{ $chitiet->sp_id }}">
        <div class="radio-size">
          <input
            type="radio"
            class="btn-check"
            name="size"
            id="btnradio1"
            value="S"
          />
          <label class="btn btn-outline-dark rounded-0" for="btnradio1"
            >Size S</label
          >
          <input
            type="radio"
            class="btn-check"
            name="size"
            id="btnradio2"
            value="M"
          />
          <label class="btn btn-outline-dark rounded-0" for="btnradio2"
            >Size M</label
          >
          <input
            type="radio"
            class="btn-check"
            name="size"
            id="btnradio3"
            value="L"
          />
          <label class="btn btn-outline-dark rounded-0" for="btnradio3"
            >Size L</label
          >
        </div>
        <div class="input-group quantity-container CT-quantity-container w-25 mt-3 mb-3">
          <button class="btn btn-outline-secondary CT-minus" type="button">
            -
          </button>
          <input
            type="text"
            class="form-control text-center quantity-input"
            name="soluong"
            value=""
          />
          <button class="btn btn-outline-secondary CT-plus" type="button">
            +
          </button>
        </div>
        <button type="submit" class="btn btn-dark">Thêm vào giỏ hàng</button>
        </form>
        <hr />
        <img
          src="{{ asset('images/bangsizeaokhoac.jpg') }}"
          class="w-100"
          alt="bangsizeaokhoac"
        />
        <div>
          @foreach ($trimmedArray as $item)
          <p> - {{ $item }} </p>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection