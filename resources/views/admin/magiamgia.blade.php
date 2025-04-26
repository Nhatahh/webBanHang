@extends('layouts.admin.body')

@section('title', 'Giảm Giá')

@section('content')
<!-- Body -->
    <div class="col-md-10 main-content">
        <div class="row">
            <!-- Form Column -->
            <div class="col-md-4">
                <div class="form-container mb-4">
                    <form>
                        <div class="mb-3">
                            <label for="productName" class="form-label">Tên chương trình</label>
                            <input type="text" class="form-control" id="productName">
                        </div>
                        <div class="mb-3">
                            <label for="productName" class="form-label">Mã code</label>
                            <input type="text" class="form-control" id="productName">
                        </div>
                        <div class="mb-3">
                            <label for="productName" class="form-label">Giá trị giảm</label>
                            <input type="text" class="form-control" id="productName">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Thời gian bắt đầu</label>
                            <input type="date" class="form-control" id="price">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Thời gian kết thúc</label>
                            <input type="date" class="form-control" id="price">
                        </div>
                        <button type="submit" class="btn btn-danger add-btn">Thêm</button>
                    </form>
                </div>
            </div>

            <!-- Table Column -->
            <div class="col-md-8">
                <div class="table-container">
                    <h5 class="mb-3">DANH SÁCH ĐỢT KHUYẾN MÃI</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên chương trình</th>
                                    <th>Mã code</th>
                                    <th>Giá trị giảm</th>
                                    <th>Thời gian bắt đầu</th>
                                    <th>Thời gian kết thúc</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Summer sale</td>
                                    <td>SUMMER30</td>
                                    <td>30%</td>
                                    <td>01/01/2025</td>
                                    <td>15/01/2025</td>
                                    <td><span class="con-hang">Đang hoạt động</span></td>
                                    <td class="btn-con">
                                        <a href="#" class="btn btn-primary">Sửa</a>
                                        <a href="#" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Summer sale</td>
                                    <td>SUMMER30</td>
                                    <td>30%</td>
                                    <td>01/01/2025</td>
                                    <td>15/01/2025</td>
                                    <td><span class="con-hang">Đang hoạt động</span></td>
                                    <td class="btn-con">
                                        <a href="#" class="btn btn-primary">Sửa</a>
                                        <a href="#" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Summer sale</td>
                                    <td>SUMMER30</td>
                                    <td>30%</td>
                                    <td>01/01/2025</td>
                                    <td>15/01/2025</td>
                                    <td><span class="con-hang">Đang hoạt động</span></td>
                                    <td class="btn-con">
                                        <a href="#" class="btn btn-primary">Sửa</a>
                                        <a href="#" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Summer sale</td>
                                    <td>SUMMER30</td>
                                    <td>30%</td>
                                    <td>01/01/2025</td>
                                    <td>15/01/2025</td>
                                    <td><span class="con-hang">Đang hoạt động</span></td>
                                    <td class="btn-con">
                                        <a href="#" class="btn btn-primary">Sửa</a>
                                        <a href="#" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Summer sale</td>
                                    <td>SUMMER30</td>
                                    <td>30%</td>
                                    <td>01/01/2025</td>
                                    <td>15/01/2025</td>
                                    <td><span class="con-hang">Đang hoạt động</span></td>
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