@extends('layouts.admin.body')

@section('title', 'Tài Khoản')

@section('content')
<!-- Body -->
    <div class="col-md-10 main-content">
        <div class="row">
            <!-- Form Column -->
            <div class="col-md-3">
                <div class="form-container mb-4">
                    <form>
                        <div class="mb-3">
                            <label for="productName" class="form-label">Tên tài khoản</label>
                            <input type="text" class="form-control" id="productName">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Loại tài khoản</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Chọn loại tài khoản</option>
                                <option value="1">Người dùng</option>
                                <option value="2">Admin</option>
                                </select>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Ghi chú</label>
                            <input type="text" class="form-control" id="price">
                        </div>
                        <button type="submit" class="btn btn-danger add-btn">Thêm</button>
                    </form>
                </div>
            </div>

            <!-- Table Column -->
            <div class="col-md-9">
                <div class="table-container">
                    <h5 class="mb-3">DANH SÁCH TÀI KHOẢN</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" style="width: 100%" id="dsTaikhoan">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection