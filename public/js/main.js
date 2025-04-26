$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});

// Cap nhat so luong san pham
$(document).on("click", ".btn-minus, .btn-plus", function () {
    let container = $(this).closest(".quantity-container");
    let input = container.find(".quantity-input");

    let quantity = parseInt(input.val()) || 1;

    if ($(this).hasClass("btn-minus") && quantity > 1) quantity--;
    if ($(this).hasClass("btn-plus")) quantity++;

    input.val(quantity);

    let sp_id = input.data("spid");
    let size = input.data("size");
    let gia = parseInt(input.data("gia"));

    $("#loading").show();

    setTimeout(() => {
        $.ajax({
            url: updateURL,
            type: "POST",
            data: {
                sp_id: sp_id,
                size: size,
                quantity: quantity,
            },
            success: function (response) {
                if (response.success) {
                    toastr.success("Cập nhật số lượng thành công!");
                    updateTongtien();
                    $("#loading").hide();
                } else {
                    toastr.error("Cập nhật thất bại!");
                    $("#loading").hide();
                }
            },
            error: function () {
                toastr.error("Lỗi hệ thống khi cập nhật.");
                $("#loading").hide();
            },
        });
    }, 1000);
});
function updateTongtien() {
    let total = 0;
    let phiShip = parseInt($("#phiShip").text().replace(/\D/g, "")) || 0;

    $(".quantity-input").each(function () {
        let gia = parseInt($(this).data("gia")) || 0;
        let soluong = parseInt($(this).val()) || 0;
        total += gia * soluong;
    });

    $("#tamTinh").text(total.toLocaleString("vi-VN"));
    $("#tongTien").text((total + phiShip).toLocaleString("vi-VN"));
}

// Xoa san pham
$(document).on("click", ".removeSingle", function () {
    let sp_id = $(this).data("spid");
    let size_id = $(this).data("size");

    Swal.fire({
        title: "Xác nhận xóa?",
        text: "Bạn có chắc chắn muốn xóa mục này không?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Đồng ý",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#loading").show();
            setTimeout(() => {
                $.ajax({
                    url: deleteURL,
                    method: "POST",
                    data: {
                        sp_id: sp_id,
                        size_id: size_id,
                    },
                    success: function (response) {
                        toastr.success("Đã xóa sản phẩm khỏi giỏ hàng");
                        $("#loading").hide();
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    },
                    error: function () {
                        toastr.error("Xóa thất bại");
                        $("#loading").hide();
                    },
                });
            }, 1000);
        }
    });
});
