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
                            <label for="" class="col-sm-12 col-form-label" style="padding-bottom: 0px">Tên tài khoản</label>
                            <input  type="text" class="form-control search" id="tenTKInput" style="height:28px;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-sm-12 col-form-label" style="padding-bottom: 0px">Mật khẩu</label>
                            <input  type="text" class="form-control search" id="tenTKInput" style="height:28px;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-sm-12 col-form-label" style="padding-bottom: 0px">Loại tài khoản</label>
                            <select class="form-control" id="select2Quyen" onchange="" style="width: 100%;"></select>
                            <span  class="err_del" id="err_select2Quyen" style="position: absolute; top: 12px; right: 25px; color:red;font-size:x-small;font-weight:bold"></span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-sm-12 col-form-label" style="padding-bottom: 0px">Họ tên</label>
                            <input  type="text" class="form-control search" id="tenTKInput" style="height:28px;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-sm-12 col-form-label" style="padding-bottom: 0px">SĐT</label>
                            <input  type="text" class="form-control search" id="tenTKInput" style="height:28px;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-sm-12 col-form-label" style="padding-bottom: 0px">Địa chỉ</label>
                            <input  type="text" class="form-control search" id="tenTKInput" style="height:28px;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-sm-12 col-form-label" style="padding-bottom: 0px">Email</label>
                            <input  type="text" class="form-control search" id="tenTKInput" style="height:28px;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-sm-12 col-form-label" style="padding-bottom: 0px">Trạng thái</label>
                            <select class="form-control" id="select2TT" onchange="" style="width: 100%;"></select>
                            <span  class="err_del" id="err_select2TT" style="position: absolute; top: 12px; right: 25px; color:red;font-size:x-small;font-weight:bold"></span>
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