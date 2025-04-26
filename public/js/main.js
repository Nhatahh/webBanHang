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

document
    .getElementById("searchForm")
    .addEventListener("submit", function (event) {
        event.preventDefault();

        var query = document.getElementById("searchInput").value;

        if (query.length > 0) {
            // Giả sử bạn sẽ gọi một API hoặc tìm kiếm trong danh sách sản phẩm của bạn
            searchProducts(query);
        } else {
            document.getElementById("searchResults").style.display = "none";
        }
    });

function searchProducts(query) {
    // Gửi yêu cầu AJAX đến server để tìm kiếm sản phẩm
    $.ajax({
        url: searchURL, // Đổi thành URL của bạn để thực hiện tìm kiếm
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
