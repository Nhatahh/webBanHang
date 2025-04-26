@extends('layouts.admin.body')

@section('title', 'Sản Phẩm')

@section('content')
<!-- Body -->
    <div class="col-md-10 main-content">
        <div class="row">
            <!-- Form Column -->
            <div class="col-md-3">
                <div class="form-container mb-4">
                    <form>
                        <div class="mb-3">
                            <label for="productName" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="productName">
                        </div>
                        <div class="mb-3">
                            <label for="mota" class="form-label">Mô tả</label>
                            <input type="text" class="form-control" id="mota">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá</label>
                            <input type="text" class="form-control" id="price">
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Số lượng</label>
                            <input type="number" class="form-control" id="quantity">
                        </div>
                        <button type="submit" class="btn btn-danger add-btn">Thêm</button>
                    </form>
                </div>
            </div>

            <!-- Table Column -->
            <div class="col-md-9">
                <div class="table-container">
                    <h5 class="mb-3">DANH SÁCH SẢN PHẨM</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" style="width: 100%" id="dsSanpham">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection