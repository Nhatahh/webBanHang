@extends('layouts.admin.body')

@section('title', 'Danh Mục')

@section('content')
<!-- Body -->
    <div class="col-md-10 main-content">
        <div class="row">
            <!-- Form Column -->
            <div class="col-md-4">
                <div class="form-container mb-4">
                    <form>
                        <div class="mb-3">
                            <label for="productName" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" id="productName">
                        </div>
                        <div class="mb-3">
                            <label for="productName" class="form-label">Danh mục cha</label>
                            <input type="text" class="form-control" id="productName">
                        </div>
                        <button type="submit" class="btn btn-danger add-btn">Thêm</button>
                    </form>
                </div>
            </div>

            <!-- Table Column -->
            <div class="col-md-8">
                <div class="table-container">
                    <h5 class="mb-3">DANH SÁCH DANH MỤC</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên danh mục</th>
                                    <th>Danh mục cha</th>
                                    <th>Số sản phẩm</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Áo sơ mi</td>
                                    <td>Áo</td>
                                    <td>10</td>
                                    <td class="btn-con">
                                        <a href="#" class="btn btn-primary">Sửa</a>
                                        <a href="#" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Áo sơ mi</td>
                                    <td>Áo</td>
                                    <td>10</td>
                                    <td class="btn-con">
                                        <a href="#" class="btn btn-primary">Sửa</a>
                                        <a href="#" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Áo sơ mi</td>
                                    <td>Áo</td>
                                    <td>10</td>
                                    <td class="btn-con">
                                        <a href="#" class="btn btn-primary">Sửa</a>
                                        <a href="#" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Áo sơ mi</td>
                                    <td>Áo</td>
                                    <td>10</td>
                                    <td class="btn-con">
                                        <a href="#" class="btn btn-primary">Sửa</a>
                                        <a href="#" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Áo sơ mi</td>
                                    <td>Áo</td>
                                    <td>10</td>
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