@extends('layouts.body_user')

@section('title', 'Tất Cả Sản Phẩm')

@section('content')
<!-- Body -->
  <div class="content">
    <div class="container-fluid mt-4 mb-4" style="height: auto">
      <h1>GIỎ HÀNG</h1>
      <div class="row">
        <div class="col-md-12 col-lg-8 d-flex flex-column mb-3">
          <hr />
          <div class="row">
            @foreach($items as $item)
              <div class="col-4 col-md-3">
                <img
                  src="{{ asset('images/' . $item->hinhanh) }}"
                  class="w-100"
                  alt="aokhoac1"
                />
              </div>
              <div class="col-8 d-flex align-items-center">
                <div class="w-100">
                  <a
                    href="{{ route('user.chitiet', ['id' => $item->sp_id]) }}"
                    style="color: black; text-decoration: none"
                    ><b>{{ $item->tensp }}</b></a
                  >
                  <p><small>Size: {{ $item->size }}</small></p>
                  <p>{{ number_format($item->gia, 0, ',', ',') }} VND</p>
                  <div class="input-group quantity-container float-start">
                      <button class="btn btn-outline-secondary btn-minus" type="button">-</button>
                      <input type="text" class="form-control text-center quantity-input" value="{{ $item->soluong }}"
                          data-spid="{{ $item->sp_id }}" data-size="{{ $item->size_id }}" />
                      <button class="btn btn-outline-secondary btn-plus" type="button">+</button>
                  </div>
                  <button id="btn-removeSingle" data-id="" class="btn removeSingle float-end" style="padding: 0">
                      <i style="color: red;" class="fa-regular fa-trash-can" onclick=""></i> 
                  </button><br><br>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <div class="card rounded-0 border-0" style="background-color: #f8f8f8">
            <h5 class="card-header rounded-0 border-0 p-4" style="border: none; background-color: #f0eeed">
              Tóm tắt đơn hàng
            </h5>
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <p>Tạm tính</p>
                  <p>Chiết khấu</p>
                  <p>Phí vận chuyển</p>
                  <b>Tổng cộng</b>
                </div>
                <div class="col-6">
                  <p>{{ number_format($tam_tinh, 0, ',', '.') }} VNĐ</p>
                  <p>0VNĐ</p>
                  <p>{{ number_format($phi_ship, 0, ',', '.') }} VNĐ</p>
                  <b>{{ number_format($tong_tien, 0, ',', '.') }} VNĐ</b>
                </div>
              </div>
            </div>
            <div class="card-footer p-3" style="border: none; background-color: #f8f8f8">
              <a href="#" class="thanhtoan btn btn-primary w-100 rounded-0">Thanh toán</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection