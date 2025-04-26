@extends('layouts.body_user')

@section('title', 'Trang Chủ')

@section('content')
<!-- Body -->
    <div class="content">
      <div class="container-fluid mt-4" style="height: auto">
        <div class="d-flex flex-column align-items-center">
          <div class="d-flex justify-content-evenly w-100 w-md-50 w-lg-25 mt-5">
            <a
              href="{{ route('user.dangnhap') }}"
              class="signup"
              style="text-decoration: none; color: #1c77ff"
              ><h2 class="mb-4">ĐĂNG NHẬP</h2></a
            >
            <a
              href="{{ route('user.dangky') }}"
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
    @endsection
