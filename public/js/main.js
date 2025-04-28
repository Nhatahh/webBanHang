$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    load_bandau();
});



function load_bandau() {
    select2PTTT();
}

function select2PTTT() {
    $.ajax({
        url: "/select2PTTT",
        type: "get",
        success: function (res) {
            $("#select2PTTT").select2({
                data: res,
            });
        },
    });
}



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
    $(".err_del").text(""); 
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
               if(response.role==="Q02"){
                    window.location.href='/admin/taikhoan'
               }else{
                    window.location.href='/user/home'
               }
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
