@extends('layouts.body_user')

@section('title', 'Thanh Toán')

@section('content')
<!-- Body -->
  <div class="content">
    <div class="container-fluid mt-4" style="height: auto">
      <div class="d-flex flex-column align-items-center">
        <h1 class="mb-4">PHƯƠNG THỨC THANH TOÁN</h1>
        <hr class="w-50" />
        <div>
          <h5>HÌNH THỨC:</h5>
          <p><b>Trực tiếp:</b> Tiền mặt - Chuyển khoản - Thẻ</p>
          <p><b>Trực tuyến:</b> Chuyển khoản</p>
          <p><b>MB Bank:</b> 0372576944</p>
          <img
            src="{{ asset('images/maQR.jpg') }}"
            alt="Ma QR"
            style="width: 25vh; height: 25vh"
          />
        </div>
      </div>
    </div>
  </div>
@endsection