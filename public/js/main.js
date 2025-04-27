$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});

// Cap nhat so luong san pham
$(document).on("click", ".GH-minus, .GH-plus", function () {
    let container = $(this).closest(".GH-quantity-container");
    let input = container.find(".GH-quantity");

    let quantity = parseInt(input.val()) || 1;

    if ($(this).hasClass("GH-minus") && quantity > 1) quantity--;
    if ($(this).hasClass("GH-plus")) quantity++;

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
    }, 500);
});
// Cap nhat tong tien
function updateTongtien() {
    let total = 0;
    let phiShip = parseInt($("#phiShip").text().replace(/\D/g, "")) || 0;

    $(".GH-quantity").each(function () {
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
// Search
document
    .getElementById("searchForm")
    .addEventListener("submit", function (event) {
        event.preventDefault();

        var query = document.getElementById("searchInput").value;

        if (query.length > 0) {
            searchProducts(query);
        } else {
            document.getElementById("searchResults").style.display = "none";
        }
    });

function searchProducts(query) {
    $.ajax({
        url: searchURL,
        method: "GET",
        data: { query: query },
        success: function (response) {
            displaySearchResults(response);
        },
        error: function () {
            console.log("Lỗi tìm kiếm");
        },
    });
}
// Hien thi ket qua search
function displaySearchResults(results) {
    var resultsContainer = document.getElementById("searchResults");
    resultsContainer.innerHTML = "";

    if (results.length > 0) {
        results.forEach(function (sanphams) {
            var resultItem = document.createElement("div");
            resultItem.classList.add("search-item");
            resultItem.innerHTML = `
                <a class="sreach-a" href="${linksearchURL}${sanphams.sp_id}" style="color: black;">
                    <div class="row">
                        <div class="col-4"><img src="${imgURL}/${sanphams.hinhanh}" alt="${sanphams.tensp}" height="100px" class="me-2" /></div>
                        <div class="col-8">
                            <p><strong>${sanphams.tensp}</strong></p>
                            <p>${sanphams.gia} VND</p>
                        </div>
                    </div>
                </a>
            `;
            resultsContainer.appendChild(resultItem);
        });
        resultsContainer.style.display = "block";
    } else {
        resultsContainer.innerHTML = "<p>Không tìm thấy sản phẩm nào.</p>";
        resultsContainer.style.display = "block";
    }
}

// //thêm giỏ hàng
$("#formGioHang").submit(function (e) {
    e.preventDefault();
    var sizeSelected = $('input[name="size"]:checked').val();
    if (!sizeSelected) {
        toastr.warning("Vui lòng chọn size trước khi thêm vào giỏ hàng.");
        return false; // Dừng lại, không gửi ajax
    }

    var formData = $(this).serialize();

    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: formData,
        success: function (response) {
            console.log(response);
            if (response.status === "success") {
                toastr.success(response.message);
                setTimeout(function () {
                    window.location.href = giohangURL;
                }, 1500);
            } else if (response.status === "error") {
                toastr.warning(response.message);
            } else {
                toastr.error("Có lỗi xảy ra khi thêm vào giỏ hàng.");
            }
        },
        error: function (xhr) {
            toastr.error("Có lỗi xảy ra. Vui lòng thử lại.");
        },
    });

    return false;
});
$(".CT-quantity").on("input", function () {
    this.value = this.value.replace(/[^0-9]/g, ""); // Chỉ cho nhập số
    if (this.value === "0" || this.value === "") {
        this.value = 1;
    }
});
// Tăng giảm số lượng
$(".CT-plus").click(function () {
    let input = $(this).siblings(".CT-quantity");
    let value = parseInt(input.val()) || 0;
    input.val(value + 1);
});
$(".CT-minus").click(function () {
    let input = $(this).siblings(".CT-quantity");
    let value = parseInt(input.val()) || 0;
    if (value > 1) {
        input.val(value - 1);
    }
});

// btn thanh toan
$(document).on("click", "#btn-thanhtoan", function () {
    let user_id = $(this).data("user_id");

    Swal.fire({
        title: "Xác nhận đặt hàng?",
        text: "Bạn có chắc chắn muốn đặt hàng?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Đặt hàng",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            setTimeout(() => {
                $.ajax({
                    url: thanhtoanURL,
                    method: "POST",
                    data: {
                        user_id: user_id,
                    },
                    success: function (response) {
                        if (response.status === "success") {
                            Swal.fire(
                                "Thành công!",
                                response.message,
                                "success"
                            ).then(() => {
                                location.reload();
                            });
                        } else if (response.status === "error") {
                            Swal.fire(
                                "Thông báo!",
                                response.message,
                                "warning"
                            );
                        }
                    },
                    error: function () {
                        Swal.fire(
                            "Lỗi!",
                            "Hệ thống bị lỗi, vui lòng thử lại!",
                            "error"
                        ).then(() => {
                            location.reload();
                        });
                    },
                });
            }, 1000);
        }
    });
});
