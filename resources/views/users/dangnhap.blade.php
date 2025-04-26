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
              class="signup active"
              style="text-decoration: none; color: #002ffe"
              ><h2 class="mb-4">ĐĂNG NHẬP</h2></a
            >
            <a
              href="{{ route('user.dangky') }}"
              class="signup"
              style="text-decoration: none; color: #1c77ff"
              ><h2 class="mb-4">ĐĂNG KÝ</h2></a
            >
          </div>
          <hr class="w-50" />
          <div class="col-12 col-md-6 col-lg-4">
            <form action="#">
              <input
                class="form-control mb-3"
                type="email"
                placeholder="* Địa Chỉ Email"
              />
              <input
                class="form-control mb-3"
                type="password"
                placeholder="* Mật Khẩu"
              />
              <div class="d-flex justify-content-between mb-3">
                <a href="#" style="text-decoration: none"
                  ><small id="quenMK" class="text-muted"
                    >Quên mật khẩu?</small
                  ></a
                >
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
                  Nhớ mật khẩu
                </small>
              </div>
              <a href="../index.html"
                ><button
                  type="button"
                  class="btn btn-outline-primary btn-lg w-100"
                >
                  Đăng Nhập
                </button></a
              >
            </form>
          </div>
        </div>
      </div>
    </div>
    @endsection
