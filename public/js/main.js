$(document).ready(function () {
  $.ajaxSetup({
      headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
  });
});
// //thêm giỏ hàng 
$('#formGioHang').submit(function(e) {
  e.preventDefault();
  var sizeSelected = $('input[name="size"]:checked').val();
  if (!sizeSelected) {
      toastr.warning('Vui lòng chọn size trước khi thêm vào giỏ hàng.');
      return false; // Dừng lại, không gửi ajax
  }

  var formData = $(this).serialize();
  
  $.ajax({
      url: $(this).attr('action'),
      type: 'POST',
      data: formData,
      success: function(response) {
          console.log(response);
          if (response.status === 'success') {
              toastr.success(response.message); 
              setTimeout(function() {
                  window.location.href = "/webBanHang/public/user/giohang";
              }, 1500); 
          } else if (response.status === 'error') {
            toastr.warning(response.message); 
          }
          else {
              toastr.error('Có lỗi xảy ra khi thêm vào giỏ hàng.'); 
          }
      },
      error: function(xhr) {
          toastr.error('Có lỗi xảy ra. Vui lòng thử lại.');
      }
  });

  return false;
});


$('.quantity-input').on('input', function() {
  this.value = this.value.replace(/[^0-9]/g, ''); // Chỉ cho nhập số
  if (this.value === '0' || this.value === '') {
      this.value = 1; 
  }
});
// Tăng giảm số lượng
$('.btn-plus').click(function() {
  let input = $(this).siblings('.quantity-input');
  let value = parseInt(input.val()) || 0;
  input.val(value + 1);
});
$('.btn-minus').click(function() {
  let input = $(this).siblings('.quantity-input');
  let value = parseInt(input.val()) || 0;
  if (value > 1) {
    input.val(value - 1);
  }
});

// Cap nhat so luong san pham
$(document).on("click", ".btn-minusss, .btn-plusss", function () {
  let container = $(this).closest(".quantity-container");
  let input = container.find(".quantity-inputtt");

  let quantity = parseInt(input.val()) || 1;

  if ($(this).hasClass("btn-minusss") && quantity > 1) quantity--;
  if ($(this).hasClass("btn-plusss")) quantity++;

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

  $(".quantity-inputtt").each(function () {
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

//Đăng ký
$(document).ready(function() {
    $("#dangkyForm").submit(function(e) {
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
                    toastr.success("Đăng ký tài khoản thành công!");
                } else if (response.status === "fail") {
                    toastr.error("Đăng ký tài khoản thất bại!");
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

//Đăng nhập 
$('#loginForm').on('submit', function(e) {
    e.preventDefault();
    $(".err_del").text(""); // Xóa lỗi cũ
    $("#errorMessage").text("");

    var formData = new FormData(this);

    $.ajax({
        url: $(this).attr('action'),
        method: $(this).attr('method'),
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if(response.status === "success") {
                window.location.href = '/user/home'; // Luôn chuyển tới user/home
            } else {
                $('#errorMessage').text(response.message);
            }
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;
                $.each(errors, function(field, messages) {
                    $("#err_" + field).text(messages[0]);
                });
            } else {
                $("#errorMessage").text("Có lỗi trong quá trình xử lý!");
            }
        }
    });
});

