@extends('layouts.admin.body')

@section('title', 'Trang Chủ')

@section('content')
<!-- Body -->
<div class="col-md-10 main-content">
    <div class="row">
        <!-- Form Column -->
        <div class="col-md-4">
            <div class="form-container mb-4">
                <form>
                    <div class="mb-3">
                        <label for="productName" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="productName">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Danh mục</label>
                        <input type="text" class="form-control" id="category">
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
        <div class="col-md-8">
            <div class="table-container">
                <h5 class="mb-3">DANH SÁCH SẢN PHẨM</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Phân loại</th>
                                <th>Giá</th>
                                <th>Kho</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1234</td>
                                <td><span class="con-hang">Còn hàng</span></td>
                                <td class="btn-con">
                                    <a href="#" class="btn btn-primary">Sửa</a>
                                    <a href="#" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><span class="het-hang">Hết hàng</span></td>
                                <td class="btn-con">
                                    <a href="#" class="btn btn-primary">Sửa</a>
                                    <a href="#" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><span class="con-hang">Còn hàng</span></td>
                                <td class="btn-con">
                                    <a href="#" class="btn btn-primary">Sửa</a>
                                    <a href="#" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><span class="het-hang">Hết hàng</span></td>
                                <td class="btn-con">
                                    <a href="#" class="btn btn-primary">Sửa</a>
                                    <a href="#" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><span class="con-hang">Còn hàng</span></td>
                                <td class="btn-con">
                                    <a href="#" class="btn btn-primary">Sửa</a>
                                    <a href="#" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><span class="het-hang">Hết hàng</span></td>
                                <td class="btn-con">
                                    <a href="#" class="btn btn-primary">Sửa</a>
                                    <a href="#" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection