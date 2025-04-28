$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    load_bandau();
});

function load_bandau() {
    select2Quyen();
    select2TT();
    select2DM();
}

function select2Quyen() {
    $.ajax({
        url: "/select2Quyen",
        type: "get",
        success: function (res) {
            $("#select2Quyen").select2({
                data: res,
            });
        },
    });
}
function select2TT() {
    $.ajax({
        url: "/select2TT",
        type: "get",
        success: function (res) {
            $("#select2TT").select2({
                data: res,
            });
        },
    });
}
function select2DM() {
    $.ajax({
        url: "/select2DM",
        type: "get",
        success: function (res) {
            $("#select2DM").select2({
                data: res,
            });
        },
    });
}

//Bảng danh sách tài khoản
var tableTaikhoan = $("#dsTaikhoan").DataTable({
    ajax: {
        type: "get",
        url: loadTK,
    },
    columns: [
        {
            // Cột STT
            title: "STT",
            data: null,
        },
        {
            title: "ID",
            data: "user_id",
            visible: false,
        },
        {
            title: "Tên tài khoản",
            data: "tentk",
        },
        {
            title: "Họ tên",
            data: "hoten",
        },
        {
            title: "SDT",
            data: "sdt",
        },
        {
            title: "Địa chỉ ",
            data: "diachi",
        },
        {
            title: "Email",
            data: "email",
        },
        {
            title: "Phân quyền",
            data: "tenquyen",
        },
        {
            title: "Trạng thái",
            data: "tentrangthai",
        },
        {
            title: "Thao tác",
            data: null,
            render: function (data, type, row) {
                return `
                    <button id="btn-edit"  class="btn btn-edit" style="padding: 0">
                        <i style="color: #0000FF;" class="fa-regular fa-pen-to-square" onclick="btn_edit('${row.user_id}')"></i>
                    </button>
                    <button id="btn-removeSingle" data-id="${row.user_id}" class="btn removeSingle" style="padding: 0">
                        <i style="color: red;" class="fa-regular fa-trash-can" onclick=""></i> 
                    </button>`;
            },
        },
    ],
    columnDefs: [
        {
            targets: 0,
            className: "dt-body-center",
        },
        {
            targets: 1,
            className: "dt-body-center",
        },
        {
            targets: 2,
            className: "dt-body-center",
        },
        {
            targets: 3,
            className: "dt-body-center",
        },
        {
            targets: 4,
            className: "dt-body-center",
        },
        {
            targets: 5,
            className: "dt-body-center",
        },
        {
            targets: 6,
            className: "dt-body-center",
        },
        {
            targets: 7,
            className: "dt-body-center",
        },
        {
            targets: 8,
            className: "dt-body-center",
        },
    ],
    language: {
        emptyTable: "Không tìm thấy tài khoản.",
        info: " _START_ / _END_ trên _TOTAL_ tài khoản",
        paginate: {
            first: "NExt",
            last: "NExt",
            next: "Trang sau",
            previous: "Trang trước",
        },
        search: "Search:",
        loadingRecords: "Đang tìm kiếm ... ",
        lengthMenu: "Hiện thị _MENU_ tài khoản",
        infoEmpty: "",
    },
    retrieve: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: false,
    info: true,
    autoWidth: true,
    responsive: true,
    scrollY: 380,
    order: [[1, "asc"]], // Sắp xếp theo cột Tên
    rowCallback: function (row, data, index) {
        // Thiết lập STT cho mỗi hàng
        var pageInfo = this.api().page.info();
        var page = pageInfo.page; // Trang hiện tại
        var length = pageInfo.length; // Số hàng mỗi trang
        var stt = page * length + index + 1; // Tính STT
        $("td:eq(0)", row).html(stt); // Gán STT vào cột đầu tiên
    },
});

// function validateFormTaiKhoan() {
//     const tenTK = $("#tenTKInput").val().trim();
//     const matKhau = $("#matKhauInput").val().trim();
//     const hoTen = $("#hoTenInput").val().trim();
//     const sdt = $("#sdtInput").val().trim();
//     const diaChi = $("#diaChiInput").val().trim();
//     const email = $("#emailInput").val().trim();
//     const quyen = $("#select2Quyen").val();
//     const trangThai = $("#select2TT").val();

//     if (!tenTK) {
//         toastr.warning("Vui lòng nhập tên tài khoản!");
//         return false;
//     }

//     if (!matKhau) {
//         toastr.warning("Vui lòng nhập mật khẩu!");
//         return false;
//     }

//     if (!hoTen) {
//         toastr.warning("Vui lòng nhập họ tên!");
//         return false;
//     }

//     if (!sdt) {
//         toastr.warning("Vui lòng nhập số điện thoại!");
//         return false;
//     }

//     if (!email) {
//         toastr.warning("Vui lòng nhập email!");
//         return false;
//     }

//     if (!quyen || quyen === "0") {
//         toastr.warning("Vui lòng chọn loại tài khoản!");
//         return false;
//     }

//     if (!trangThai || trangThai === "0") {
//         toastr.warning("Vui lòng chọn trạng thái tài khoản!");
//         return false;
//     }

//     return true;
// }



//Thêm tài khoản
$(document).ready(function() {
    $("#formTaiKhoan").submit(function(e) {
        e.preventDefault();
        $(".err_del").text("");

        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status === "success") {
                    toastr.success("Thêm tài khoản thành công!");
                    tableTaikhoan.ajax.reload();
                } else if (response.status === "fail") {
                    toastr.error("Thêm tài khoản thất bại!");
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    // Bắt lỗi validate
                    var errors = xhr.responseJSON.errors;
                    const keys = Object.keys(errors);
                    for (let i = 0; i < keys.length; i++) {
                        const field = keys[i];
                        const messages = errors[field];
                        $("#err_" + field).text(messages[0]);
                    }
                } else {
                    toastr.error("Có lỗi trong quá trình xử lý!");
                }
            }
        });
    });
});











//Bảng danh sách sản phẩm
var table = $("#dsSanpham").DataTable({
    ajax: {
        type: "get",
        url: loadSP,
    },
    columns: [
        {
            // Cột STT
            title: "STT",
            data: null,
        },
        {
            title: "id",
            data: "sp_id",
            visible: false,
        },
        {
            title: "Tên sản phẩm",
            data: "tensp",
        },
        {
            title: "Mô tả",
            data: "mota",
        },
        {
            title: "Giá",
            data: "gia",
        },
        {
            title: "Loại",
            data: "tentheloai",
        },
        {
            title: "Tồn kho",
            data: "tonkho",
        },
        {
            title: "Hình ảnh",
            data: null,
            render: function (data, type, row) {
                return `
                    <img
                        src="${imgURL}/${row.hinhanh}"
                        class="card-img-top"
                        alt="${row.hinhanh}"
                    />
                `;
            },
        },
        {
            title: "Thao tác",
            data: null,
            render: function (data, type, row) {
                return `
                    <button id="btn-edit"  class="btn btn-edit" style="padding: 0">
                        <i style="color: #0000FF;" class="fa-regular fa-pen-to-square" onclick="btn_edit('${row.user_id}')"></i>
                    </button>
                    <button id="btn-removeSingle" data-id="${row.user_id}" class="btn removeSingle" style="padding: 0">
                        <i style="color: red;" class="fa-regular fa-trash-can" onclick=""></i> 
                    </button>`;
            },
        },
    ],
    columnDefs: [
        {
            targets: 0,
            className: "dt-body-center",
        },
        {
            targets: 1,
            className: "dt-body-center",
        },
        {
            targets: 2,
            className: "dt-body-center",
        },
        {
            targets: 3,
            className: "dt-body-center",
        },
        {
            targets: 4,
            className: "dt-body-center",
        },
        {
            targets: 5,
            className: "dt-body-center",
        },
        {
            targets: 6,
            className: "dt-body-center",
        },
    ],
    language: {
        emptyTable: "Không tìm thấy sản phẩm.",
        info: " _START_ / _END_ trên _TOTAL_ sản phẩm",
        paginate: {
            first: "NExt",
            last: "NExt",
            next: "Trang sau",
            previous: "Trang trước",
        },
        search: "Search:",
        loadingRecords: "Đang tìm kiếm ... ",
        lengthMenu: "Hiện thị _MENU_ sản phẩm",
        infoEmpty: "",
    },
    retrieve: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: false,
    info: true,
    autoWidth: true,
    responsive: true,
    scrollY: 380,
    order: [[1, "asc"]], // Sắp xếp theo cột Tên
    rowCallback: function (row, data, index) {
        // Thiết lập STT cho mỗi hàng
        var pageInfo = this.api().page.info();
        var page = pageInfo.page; // Trang hiện tại
        var length = pageInfo.length; // Số hàng mỗi trang
        var stt = page * length + index + 1; // Tính STT
        $("td:eq(0)", row).html(stt); // Gán STT vào cột đầu tiên
    },
});

//Bảng danh sách danh mục
var table = $("#dsDM").DataTable({
    ajax: {
        type: "get",
        url: loadDM,
    },
    columns: [
        {
            // Cột STT
            title: "STT",
            data: null,
        },
        {
            title: "id",
            data: "tl_id",
            visible: false,
        },
        {
            title: "Tên",
            data: "ten",
        },
        {
            title: "Thao tác",
            data: null,
            render: function (data, type, row) {
                return `
                    <button id="btn-edit"  class="btn btn-edit" style="padding: 0">
                        <i style="color: #0000FF;" class="fa-regular fa-pen-to-square" onclick="btn_edit('${row.tl_id}')"></i>
                    </button>
                    <button id="btn-removeSingle" data-id="${row.tl_id}" class="btn removeSingle" style="padding: 0">
                        <i style="color: red;" class="fa-regular fa-trash-can" onclick=""></i> 
                    </button>`;
            },
        },
    ],
    columnDefs: [
        {
            targets: 0,
            className: "dt-body-center",
        },
        {
            targets: 1,
            className: "dt-body-center",
        },
        {
            targets: 2,
            className: "dt-body-center",
        },
        {
            targets: 3,
            className: "dt-body-center",
        },
    ],
    language: {
        emptyTable: "Không tìm thấy danh mục.",
        info: " _START_ / _END_ trên _TOTAL_ danh mục",
        paginate: {
            first: "NExt",
            last: "NExt",
            next: "Trang sau",
            previous: "Trang trước",
        },
        search: "Search:",
        loadingRecords: "Đang tìm kiếm ... ",
        lengthMenu: "Hiện thị _MENU_ danh mục",
        infoEmpty: "",
    },
    retrieve: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: false,
    info: true,
    autoWidth: true,
    responsive: true,
    scrollY: 380,
    order: [[1, "asc"]], // Sắp xếp theo cột Tên
    rowCallback: function (row, data, index) {
        // Thiết lập STT cho mỗi hàng
        var pageInfo = this.api().page.info();
        var page = pageInfo.page; // Trang hiện tại
        var length = pageInfo.length; // Số hàng mỗi trang
        var stt = page * length + index + 1; // Tính STT
        $("td:eq(0)", row).html(stt); // Gán STT vào cột đầu tiên
    },
});
