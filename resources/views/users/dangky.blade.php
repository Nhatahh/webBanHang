@extends('layouts.body_user')

@section('title', 'Trang Chủ')

@section('content')
<!-- Body -->
  <div class="content">
    <div class="container-fluid mt-4" style="height: auto">
      <div class="d-flex flex-column align-items-center">
        <div class="d-flex justify-content-evenly w-100 w-md-50 w-lg-25 mt-5">
          <a
            href="{{ route("user.dangnhap") }}"
            class="signup"
            style="text-decoration: none; color: #1c77ff"
            ><h2 class="mb-4">ĐĂNG NHẬP</h2></a
          >
          <a
            href="{{ route("user.dangky") }}"
            class="signup"
            style="text-decoration: none; color: #002ffe"
            ><h2 class="mb-4">ĐĂNG KÝ</h2></a
          >
        </div>
        <hr class="w-50" />
        <div class="col-12 col-md-6 col-lg-4">
          <form id="dangkyForm" action="{{ route('user.xulydangky') }}" method="POST" novalidate>
            @csrf
            <div class="form-group mb-2">
              <input
                class="form-control"
                type="text"
                name="fullname"
                value="{{ old('fullname')}}"
                placeholder="* Họ và tên"
              />
              @error('fullname')
                <p id="error-fullname" class="text-danger mb-3 d-flex justify-content-end" style="font-size: 12px; font-style: italic;">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group mb-2">
              <input
                class="form-control"
                type="email"
                name="email"
                value ="{{ old('email') }}"
                placeholder="* Địa Chỉ Email"
              />
              @error('email')
                <p id="error-email" class="text-danger mb-3 d-flex justify-content-end" style="font-size: 12px; font-style: italic;">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group mb-2">
              <input
                class="form-control"
                type="text"
                name="phone"
                value ="{{ old('phone') }}"
                placeholder="* Số điện thoại"
              />
              @error('phone')
                <p id="error-phone" class="text-danger mb-3 d-flex justify-content-end" style="font-size: 12px; font-style: italic;">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group mb-2">
              <input
                class="form-control"
                type="password"
                name="password"
                placeholder="* Mật Khẩu"
              />
              @error('password')
                <p id="error-password" class="text-danger mb-3 d-flex justify-content-end" style="font-size: 12px; font-style: italic;">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group mb-2">
              <input
                class="form-control"
                type="password"
                name="password_confirmation"
                placeholder="* Nhập lại mật Khẩu"
              />
              <p id="error-password_confirmation" class="text-danger mb-3 d-flex justify-content-end"></p>
            </div>
            <div class="d-flex justify-content-end mb-3">
              <small class="text-muted">* Bắt buộc</small>
            </div>
            <div class="form-check mb-2">
              <input
                class="form-check-input"
                type="checkbox"
                value="1"
                id="flexCheckDefault"
              />
              <small
                class="form-check-label text-muted"
                name="agree"
                value="{{ old('agree')}}"
                for="flexCheckDefault"
              >
                Tôi muốn nhận email từ NHATAHH với các tin tức mới nhất về sản
                phẩm và dịch vụ, ưu đãi đặc biệt và sự kiện độc quyền. Bạn có
                thể hủy đăng ký bất kỳ lúc nào thông qua liên kết hủy đăng ký
                ở cuối mỗi email. Để biết thêm thông tin, hãy xem Chính sách
                quyền riêng tư của NHATAHH.
              </small>
              @error('agree')
                <p id="error-agree" class="text-danger mb-3 d-flex justify-content-end" style="font-size: 12px; font-style: italic;">{{ $message }}</p>
              @enderror
            </div>
              <button
                type="submit"
                class="btn btn-outline-primary btn-lg w-100"
              >
                Đăng Ký
              </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection