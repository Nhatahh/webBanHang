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

function formatCurrency(amount) {
    return amount.toLocaleString("vi-VN") + " VND";
}

//Bảng danh sách đơn hàng
const DonhangURL = $("#donhang-table").data("url");
const TrangthaiURL = $("#donhang-table").data("trangthai-url");
let trangThaiList = [];
// Load trạng thái 1 lần rồi khởi tạo bảng
$.ajax({
    url: TrangthaiURL,
    method: "GET",
    success: function (response) {
        trangThaiList = response.data;
        window.trangThaiList = trangThaiList;
        initDataTable();
    },
    error: function () {
        Swal.fire("Lỗi", "Không thể tải danh sách trạng thái", "error");
    },
});
function initDataTable() {
    var tableTK = $("#dsDonhang").DataTable({
        ajax: {
            type: "GET",
            url: DonhangURL,
            dataSrc: "data",
        },
        columns: [
            {
                // Cột STT
                title: "STT",
                data: null,
            },
            {
                title: "dh_id",
                data: "dh_id",
            },
            {
                title: "tentk",
                data: "tentk",
            },
            {
                title: "tt",
                data: "tt_id",
                render: function (data, type, row) {
                    let trangThaiOptions = "";

                    window.trangThaiList.forEach(function (item) {
                        trangThaiOptions += `<option value="${item.id}" ${
                            item.id == data ? "selected" : ""
                        }>${item.ten}</option>`;
                    });

                    return `
                    <select class="form-control select2TT" data-dh_id="${row.dh_id}">
                        ${trangThaiOptions}
                    </select>
                    `;
                },
            },
            {
                title: "phuongthucthanhtoan",
                data: "ptthanhtoan_ten",
            },
            {
                title: "created_at",
                data: "created_at",
            },
            {
                title: "Thao tác",
                data: null,
                render: function (data, type, row) {
                    return `
                        <button class="btn btn-primary" onclick="loadChiTietDonHang('${row.dh_id}')">
                            <i class="fa-regular fa-eye"></i> Xem chi tiết
                        </button>`;
                },
            },
        ],
        columnDefs: [
            {
                targets: 0, // Cột STT
                className: "dt-body-center",
            },
            {
                targets: 1, // Cột dh_id
                className: "dt-body-center",
            },
            {
                targets: 2, // Cột tentk
                className: "dt-body-center",
            },
            {
                targets: 3, // Cột tt
                className: "dt-body-center",
            },
            {
                targets: 4, // Cột phuongthucthanhtoan
                className: "dt-body-center",
            },
            {
                targets: 5, // Cột created_at
                className: "dt-body-center",
            },
            {
                targets: 6, // Cột thao tác
                className: "dt-body-center",
            },
        ],
        language: {
            emptyTable: "Không tìm thấy đơn hàng.",
            info: "_START_ / _END_ trên _TOTAL_ đơn hàng",
            paginate: {
                first: "Đầu tiên",
                last: "Cuối cùng",
                next: "Trang sau",
                previous: "Trang trước",
            },
            search: "Tìm kiếm:",
            loadingRecords: "Đang tải dữ liệu...",
            lengthMenu: "Hiển thị _MENU_ đơn hàng",
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
        order: [[1, "asc"]], // Sắp xếp theo dh_id (cột 1)
        rowCallback: function (row, data, index) {
            // Thiết lập STT cho mỗi hàng
            var pageInfo = this.api().page.info();
            var page = pageInfo.page; // Trang hiện tại
            var length = pageInfo.length; // Số hàng mỗi trang
            var stt = page * length + index + 1; // Tính STT
            $("td:eq(0)", row).html(stt); // Gán STT vào cột đầu tiên
        },
    });
}

// Lắng nghe sự kiện thay đổi trạng thái
$("#dsDonhang").on("change", ".select2TT", function () {
    let dh_id = $(this).data("dh_id");
    let newStatus = $(this).val();

    $.ajax({
        url: "/update-donhang-status", // URL để cập nhật trạng thái
        method: "post",
        data: {
            dh_id: dh_id,
            tt_id: newStatus,
        },
        success: function (response) {
            if (response.status === "success") {
                Swal.fire("Cập nhật thành công", response.message, "success");
            } else {
                Swal.fire("Lỗi", "Không thể cập nhật trạng thái", "error");
            }
        },
        error: function () {
            Swal.fire("Lỗi", "Không thể kết nối tới server", "error");
        },
    });
});

// Hàm load chi tiết đơn hàng
function loadChiTietDonHang(dh_id) {
    $.ajax({
        type: "GET",
        url: "chitiet/" + dh_id,
        success: function (response) {
            let chiTietHTML =
                '<h5>Danh sách sản phẩm trong đơn hàng</h5><table class="table table-bordered"><thead><tr><th>Tên sản phẩm</th><th>Size</th><th>Số lượng</th><th>Đơn giá</th><th>Thành tiền</th></tr></thead><tbody>';
            response.data.forEach(function (item) {
                chiTietHTML += `
                    <tr>
                        <td>${item.tensp}</td>
                        <td>${item.size}</td>
                        <td>${item.soluong}</td>
                        <td>${formatCurrency(item.dongia)}</td>
                        <td>${formatCurrency(item.thanhtien)}</td>
                    </tr>`;
            });
            chiTietHTML += "</tbody></table>";

            $("#chiTietDonHangModal .modal-body").html(chiTietHTML);
            $("#chiTietDonHangModal").modal("show");
        },
        error: function () {
            alert("Lỗi khi tải chi tiết đơn hàng.");
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
                    <button id="btn-removeSingle" data-id="${row.user_id}" class="btn removeSingleTK" style="padding: 0">
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
            render: function (data, type, row) {
                return formatCurrency(data);
            },
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
                    <button id="btn-removeSingleSP" data-id="${row.sp_id}" class="btn removeSingleSP" style="padding: 0">
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
                    <button id="btn-removeSingleDM" data-id="${row.tl_id}" class="btn removeSingleDM" style="padding: 0">
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

//Thêm danh mục
$("#danhmucForm").submit(function (e) {
    e.preventDefault();
    $(".err_del").text("");

    var formData = new FormData(this);

    $.ajax({
        url: $(this).attr("action"),
        method: $(this).attr("method"),
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.status === "success") {
                toastr.success("Thêm danh mục thành công!");
                tableDM.ajax.reload();
            } else if (response.status === "fail") {
                toastr.error("Thêm danh mục thất bại!");
            }
        },
        error: function (xhr) {
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
        },
    });
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
// Xóa sản phẩm
$(document).on("click", ".removeSingleSP", function () {
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
// Xóa danh mục
$(document).on("click", ".removeSingleDM", function () {
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
                url: `/removeDM/${id}`,
                type: "DELETE",
                success: function (response) {
                    switch (response) {
                        case "1":
                            toastr.success("Xóa danh mục thành công!");
                            tableDM.ajax.reload();
                            break;
                        case "0":
                            toastr.warning("Xóa danh mục thất bại!");
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
// Xóa tài khoản
$(document).on("click", ".removeSingleTK", function () {
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
                url: `/removeTK/${id}`,
                type: "DELETE",
                success: function (response) {
                    switch (response) {
                        case "1":
                            toastr.success("Xóa tài khoản thành công!");
                            tableTK.ajax.reload();
                            break;
                        case "0":
                            toastr.warning("Xóa tài khoản thất bại!");
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
