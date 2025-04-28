@extends('layouts.user.body')

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
          <form id="dangkyForm" action="{{ route('user.xulydangky') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
              <input
                class="form-control"
                type="text"
                name="fullname"
                id="fullname"
                value="{{ old('fullname')}}"
                placeholder="* Họ và tên"
              />
              <span class="err_del" id="err_fullname" style="color: red; font-size: small; font-weight: bold; background-color: #fff; display: block; margin-top: 2px;"></span>
            </div>
            <div class="form-group mb-2">
              <input
                class="form-control"
                type="text"
                name="tenTK"
                id="tenTK"
                value="{{ old('fullname')}}"
                placeholder="* Tên tài khoản"
              />
              <span class="err_del" id="err_tenTK" style="color: red; font-size: small; font-weight: bold; background-color: #fff; display: block; margin-top: 2px;"></span>
            </div>
            <div class="form-group mb-2">
              <input
                class="form-control"
                type="text"
                name="diachi"
                id="diachi"
                value="{{ old('diachi')}}"
                placeholder="* Địa chỉ" 
              />
              <span class="err_del" id="err_diachi" style="color: red; font-size: small; font-weight: bold; background-color: #fff; display: block; margin-top: 2px;"></span>
            </div>
            <div class="form-group mb-2">
              <input
                class="form-control"
                type="email"
                name="email"
                id="email"
                value ="{{ old('email') }}"
                placeholder="* Email"
              />
              <span class="err_del" id="err_email" style="color: red; font-size: small; font-weight: bold; background-color: #fff; display: block; margin-top: 2px;"></span>
            </div>
            <div class="form-group mb-2">
              <input
                class="form-control"
                type="text"
                name="phone"
                id="phone"
                value ="{{ old('phone') }}"
                placeholder="* Số điện thoại"
              />
              <span class="err_del" id="err_phone" style="color: red; font-size: small; font-weight: bold; background-color: #fff; display: block; margin-top: 2px;"></span>
            </div>
            <div class="form-group mb-2">
              <input
                class="form-control"
                type="password"
                name="password"
                id="password"
                placeholder="* Mật Khẩu"
              />
              <span class="err_del" id="err_password" style="color: red; font-size: small; font-weight: bold; background-color: #fff; display: block; margin-top: 2px;"></span>
            </div>
            <div class="form-group mb-2">
              <input
                class="form-control"
                type="password"
                name="password_confirmation"
                id="password_confirmation"
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
                name="flexCheckDefault"
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
              <span class="err_del" id="err_flexCheckDefault" style="color: red; font-size: small; font-weight: bold; background-color: #fff; display: block; margin-top: 2px;"></span>
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