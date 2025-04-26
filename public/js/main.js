
$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

//   toastr.options = {
//     "closeButton": true,
//     "progressBar": true,
//     "timeOut": "2000",
//     "positionClass": "toast-bottom-right"
// };

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
});

