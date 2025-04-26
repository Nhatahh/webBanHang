@extends('layouts.admin.body')

@section('title', 'Sản Phẩm')

@section('content')
<!-- Body -->
    <div class="col-md-10 main-content">
        <div class="row">
            <!-- Form Column -->
            <div class="col-md-3">
                <div class="form-container mb-4">
                    <form method="POST" enctype="multipart/form-data" action="">
                        <div class="mb-3">
                            <label for="" class="col-sm-12 col-form-label" style="padding-bottom: 0px">Tên sản phẩm</label>
                            <input  type="text" class="form-control search" id="" style="height:28px;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-sm-12 col-form-label" style="padding-bottom: 0px">Hình ảnh</label>
                            <input type="file" class="form-control" id="imgIP" name="image" accept="image/*" style="height:28px;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-sm-12 col-form-label" style="padding-bottom: 0px">Mô tả</label>
                            <input  type="text" class="form-control search" id="" style="height:28px;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-sm-12 col-form-label" style="padding-bottom: 0px">Giá</label>
                            <input  type="number" class="form-control search" id="" style="height:28px;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-sm-12 col-form-label" style="padding-bottom: 0px">Tồn kho</label>
                            <input  type="number" class="form-control search" id="" style="height:28px;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-sm-12 col-form-label" style="padding-bottom: 0px">Danh mục</label>
                            <select class="form-control" id="select2DM" onchange="" style="width: 100%;"></select>
                            <span  class="err_del" id="err_select2DM" style="position: absolute; top: 12px; right: 25px; color:red;font-size:x-small;font-weight:bold"></span>
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