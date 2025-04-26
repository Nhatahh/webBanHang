@extends('layouts.body_user')

@section('title', 'Áo')

@section('content')
<!-- Body -->
  <div class="content">
    <div class="container-fluid mt-4" style="height: auto">
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