$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    load_dulieubandau();
    
});

var table = $("#sanphamTable").DataTable({
    ajax: {
        type: "get",
        url: "/admin24/gxn_danhsachgiay",
        // dataSrc: 'data'
    },
   

    columns: [
        {
            title: "STT",
            data: "danhmuc_gxn_id",
        },
        {
            title: "Tên loại giấy",
            data: "danhmuc_gxn_tenloai",
        },
        {
            title: "Đơn vị",
            data: "ten",
        },
        {
            title: "Thời gian thêm",
            data: "ngaythem",
        },
        {
            title: "Ghi chú",
            data: "ghichu",
        },
        {
            title: "Thao tác",
        },
    ],

    columnDefs: [
        {
            targets: [0, 1, 2, 3, 4, 5],
            className: "dt-body-center",
        },
        {
            data: null,
            targets: 5,
            render: function (data, type, row) {
                console.log(row); // In ra giá trị của row
                return `
                    <button id="btn-edit" data-id="${row.id}" class="btn btn-edit" style="padding: 0">
                        <i style="color: #0000FF;" class="fa-regular fa-pen-to-square" onclick="edit_accounts(${row.id})"></i>
                    </button>
                    <button id="btn-delete" data-id="${row.id}" class="btn btn-delete" style="padding: 0">
                        <i style="color: red;" class="fa-regular fa-trash-can" onclick="delete_gxn_danhmuc(${row.danhmuc_gxn_id}, ${row.id_donvi}, ${row.active}, ${row.status})"></i>
                    </button>`;
            },
            className: "dt-body-center",
        },
        {
            targets: [1, 2, 3, 4, 5],
            orderable: false,
        },
    ],

    language: {
        emptyTable: "Không tìm thấy giấy xác nhận.",
        info: " _START_ / _END_ trên _TOTAL_ trang",
        paginate: {
            first: "NExt",
            last: "NExt",
            next: "Trang sau",
            previous: "Trang trước",
        },
        search: "Search:",
        loadingRecords: "Đang tìm kiếm ... ",
        lengthMenu: "Hiện thị _MENU_ hóa đơn",
        infoEmpty: "",
    },
    retrieve: true,
    paging: true,
    lengthChange: false,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: true,
    responsive: true,
    scrollY: 380,
});
