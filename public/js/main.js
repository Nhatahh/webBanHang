$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).on("click", ".btn-minus, .btn-plus", function () {
        let container = $(this).closest(".quantity-container");
        let input = container.find(".quantity-input");

        let quantity = parseInt(input.val()) || 1;

        if ($(this).hasClass("btn-minus") && quantity > 1) quantity--;
        if ($(this).hasClass("btn-plus")) quantity++;

        input.val(quantity); // Cập nhật UI

        let sp_id = input.data("spid");
        let size = input.data("size");
        let gia = parseInt(input.data("gia"));

        // AJAX cập nhật DB
        $.ajax({
            url: capNhatGioHangURL,
            type: "POST",
            data: {
                sp_id: sp_id,
                size: size,
                quantity: quantity,
            },
            success: function (response) {
                if (response.success) {
                    toastr.success("Cập nhật số lượng thành công!");

                    // Cập nhật tổng tiền ngay
                    updateTotal();
                } else {
                    toastr.error("Cập nhật thất bại!");
                }
            },
            error: function () {
                toastr.error("Lỗi hệ thống khi cập nhật.");
            },
        });
    });

    function updateTotal() {
        let total = 0;
        let phiShip = parseInt($("#phiShip").text().replace(/\D/g, "")) || 0;

        $(".quantity-input").each(function () {
            let gia = parseInt($(this).data("gia")) || 0;
            let soluong = parseInt($(this).val()) || 0;
            total += gia * soluong;
        });

        // Cập nhật DOM
        $("#tamTinh").text(total.toLocaleString("vi-VN"));
        $("#tongTien").text((total + phiShip).toLocaleString("vi-VN"));
    }
});
