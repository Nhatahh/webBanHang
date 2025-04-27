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
var tableTK = $("#dsTaikhoan").DataTable({
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
            title: "id",
            data: "user_id",
            visible: false,
        },
        {
            title: "tentk",
            data: "tentk",
        },
        {
            title: "hoten",
            data: "hoten",
        },
        {
            title: "sdt",
            data: "sdt",
        },
        {
            title: "diachi",
            data: "diachi",
        },
        {
            title: "email",
            data: "email",
        },
        {
            title: "tenquyen",
            data: "tenquyen",
        },
        {
            title: "tentrangthai",
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

//Bảng danh sách sản phẩm
var tableSP = $("#dsSanpham").DataTable({
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
            title: "tensp",
            data: "tensp",
        },
        {
            title: "mota",
            data: "mota",
        },
        {
            title: "gia",
            data: "gia",
        },
        {
            title: "tentheloai",
            data: "tentheloai",
        },
        {
            title: "tonkho",
            data: "tonkho",
        },
        {
            title: "hinhanh",
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
                        <i style="color: #0000FF;" class="fa-regular fa-pen-to-square" onclick="btn_edit('${row.sp_id}')"></i>
                    </button>
                    <button id="btn-removeSingle" data-id="${row.sp_id}" class="btn removeSingle" style="padding: 0">
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

//Bảng danh mục
var tableDM = $("#dsDM").DataTable({
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
            title: "ten",
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

//Thêm sản phẩm
$("#addSP").on("click", function (e) {
    e.preventDefault();

    let formData = new FormData();
    formData.append("sanphamInput", $("#sanphamInput").val());
    formData.append("imgIP", $("#imgIP")[0].files[0]?.name || "");
    formData.append("motaInput", $("#motaInput").val());
    formData.append("giaInput", $("#giaInput").val());
    formData.append("select2DM", $("#select2DM").val());
    formData.append("tonkhoInput", $("#tonkhoInput").val());

    $.ajax({
        url: "/addSP",
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            switch (response) {
                case "1":
                    toastr.success("Thêm sản phẩm thành công!");
                    tableSP.ajax.reload();
                    break;
                case "0":
                    toastr.error("Thêm sản phẩm thất bại!");
                    break;
                case "-1":
                    toastr.error("Lỗi hệ thống! Vui lòng thử lại sau.");
                    break;
                default:
                    const keys = Object.keys(response);
                    for (let i = 0; i < keys.length; i++) {
                        $("#err_" + keys[i]).text(response[keys[i]]);
                    }
                    break;
            }
        },
        error: function (xhr) {
            toastr.error("Gửi dữ liệu thất bại!");
            console.log(xhr.responseText);
        },
    });
});

$(document).on("click", ".removeSingle", function () {
    var id = $(this).data("id");

    Swal.fire({
        title: "Bạn có chắc muốn xóa?",
        text: "Hành động này không thể hoàn tác!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Có, xóa ngay!",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/removeSP/${id}`,
                type: "DELETE",
                success: function (response) {
                    switch (response) {
                        case "1":
                            toastr.success("Xóa sản phẩm thành công!");
                            tableSP.ajax.reload();
                            break;
                        case "0":
                            toastr.warning("Xóa sản phẩm thất bại!");
                            break;
                        default:
                            toastr.error(
                                "Hệ thống bị lỗi, vui lòng tải lại trang hoặc liên hệ quản trị viên!"
                            );
                            break;
                    }
                },
            });
        }
    });
});
