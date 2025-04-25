@extends('layouts.body_user')

@section('title', 'Chính Sách')

@section('content')
<!-- Body -->
  <div class="content">
    <div class="container-fluid mt-4" style="height: auto">
      <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button
              class="accordion-button"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapseOne"
              aria-expanded="true"
              aria-controls="panelsStayOpen-collapseOne"
            >
              <h4 class="fw-bolder">Chính sách đổi trả</h4>
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapseOne"
            class="accordion-collapse collapse show"
            aria-labelledby="panelsStayOpen-headingOne"
          >
            <div class="accordion-body">
              <h5>
                1. Điều kiện đổi hàng (áp dụng trên toàn hệ thống NHATAHH)
              </h5>
              <p>
                – Áp dụng đổi hàng với tất cả các sản phẩm với điều kiện sản
                phẩm phải còn nguyên nhãn mác, trong tình trạng chưa qua sử
                dụng. <br />
                – Áp dụng 01 lần đổi/ 01 đơn hàng. Sản phẩm đổi phải có giá
                trị tương đương hoặc cao hơn sản phẩm được đổi. Vui lòng thanh
                toán chi phí chênh lệch nếu có. <br />
                – Trường hợp hoàn lại giá trị đơn hàng, tụi mình sẽ hoàn tiền
                trong vòng 48h làm việc sau khi nhận được yêu cầu từ các bạn.
                <br />
                Lưu ý: <br />
                – Với trường hợp sản phẩm bị cắt tag, trong vòng 1 ngày kể từ
                khi nhận, bạn hãy gửi phản hồi về tụi mình để được giải quyết.
                Sau 1 ngày chúng mình sẽ không giải quyết đơn đổi trả. <br />
                – Bạn vui lòng gửi cho chúng mình clip đóng gói các mặt của
                sản phẩm, không cắt ghép, chỉnh sửa đơn hàng đổi trả của bạn,
                nhân viên tư vấn sẽ xác nhận và tiến hành lên đơn đổi trả cho
                bạn.
              </p>
              <h5>2. Dịch vụ đổi hàng tận nơi</h5>
              <p>
                Với dịch vụ này, NHATAHH mong muốn mang lại sự tiện lợi và
                những trải nghiệm tuyệt vời khi mua sắm: <br />
                – Đổi hàng tận nơi, shipper sẽ đến tận nhà để đổi hàng cho
                bạn. <br />
                – Áp dụng 01 lần đổi/ 01 đơn hàng.
              </p>
              <h5>3. Chi phí vận chuyển</h5>
              <p>
                <b>a. Chi phí vận chuyển khi đổi hàng được NHATAHH hỗ trợ:</b>
                <br />
                – Size không phù hợp: Miễn phí 100% phí vận chuyển <br />
                – Bạn mong muốn đối sản phẩm khác (không mắc lỗi sản xuất): Hỗ
                trợ phí 1 chiều <br />
                – Sản phẩm lỗi: Hỗ trợ phí 2 chiều <br />
                <b>b. Chi phí vận chuyển không được NHATAHH hỗ trợ:</b>
                <br />
                – Với sản phẩm trong chương trình khuyến mãi, nếu bạn muốn đổi
                sang sản phẩm khác phải tự chi trả chi phí vận chuyển.
              </p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapseTwo"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapseTwo"
            >
              <h4 class="fw-bolder">Chính sách vận chuyển</h4>
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapseTwo"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-headingTwo"
          >
            <div class="accordion-body">
              <p>
                NHATAHH cam kết đem đến dịch vụ giao hàng nhanh chóng, đúng
                địa điểm cho toàn bộ đơn hàng. <br />
                Hiện tại NHATAHH đang là đối tác lớn với đơn vị giao hàng có
                uy tín - GIAO HÀNG TIẾT KIỆM để hỗ trợ giao hàng trên toàn
                quốc và nước ngoài với chính sách cụ thể như sau:
              </p>
              <h5>Thời gian giao hàng:</h5>
              <p>
                Đối với nội thành Hồ Chí Minh: Giao hỏa tốc trong vòng 4h và
                24h đối với các đơn hàng đặt trước (Không tính chủ nhật và các
                ngày lễ Tết). <br />
                Đối với ngoại thành: Giao hàng trong 3-4 ngày (Không tính chủ
                nhật và các ngày lễ Tết). <br />
                Lưu ý: Thời gian có thể dao động từ 3 -5 ngày đối với các đợt
                sale lớn.
              </p>
              <h5>Số lần giao hàng:</h5>
              <p>
                – Shipper sẽ giao hàng tối đa 03 lần/đơn hàng. <br />
                – Trường hợp lần đầu giao hàng không thành công, Shipper sẽ
                liên hệ để sắp xếp lịch giao hàng lần 02 với bạn. Tổng cộng
                bạn có 03 lần để nhận đơn hàng. <br />
                Xin lưu ý: trong trường hợp chịu ảnh hưởng của thiên tai hoặc
                các sự kiện đặc biệt khác tác động không thể thay đổi thì
                chúng mình sẽ bảo lưu quyền thay đổi thời gian giao hàng mà
                không cần báo trước.
              </p>
              <h5>Kiểm tra tình trạng đơn hàng:</h5>
              <p>
                Bạn có thể kiểm tra với bộ phận chăm sóc khách hàng của
                NHATAHH qua FB/IG hoặc SĐT.
              </p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapseThree"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapseThree"
            >
              <h4 class="fw-bolder">Chính sách bảo hành</h4>
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapseThree"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-headingThree"
          >
            <div class="accordion-body">
              <h5>1. Đối tượng & thời gian áp dụng:</h5>
              <p>
                Đối với sản phẩm áo quần: Trong 14 ngày, từ ngày mua hàng theo
                thời gian ghi trên hoá đơn với các trường hợp bung chỉ, bung
                nút, kỹ thuật may, giãn cổ áo, quần,… và các trường hợp khác
                mà NHATAHH có khả năng sửa chữa được. <br />
                Đối với sản phẩm phụ kiện: Trong 30 ngày, từ ngày mua hàng
                theo thời gian ghi trên hoá đơn với trường hợp bung đường chỉ,
                bung quai đeo, hư khoá kéo và tất cả những lỗi kỹ thuật do nhà
                sản xuất. <br />
                Lưu ý: <br />
                – Bạn sẽ được đổi sang sản phẩm mới 100%. <br />
                – Hình in sản phẩm sẽ không bảo hành.
              </p>
              <h5>2. Hỗ trợ sau thời gian bảo hành:</h5>
              <p>
                – NHATAHH vẫn tiếp tục hỗ trợ bảo hành những lỗi đơn giản
                trong vòng 30 ngày kể từ ngày bạn nhận hàng đã bảo hành gửi
                trả. <br />
                – Nếu sản phẩm của bạn có lỗi quá nặng do quá trình sử dụng
                lâu, tụi mình sẽ tư vấn hướng sửa chữa kèm với mức phí tốt
                nhất để bạn có thể dễ dàng quyết định.
              </p>
              <h5>3. Trường hợp không được bảo hành:</h5>
              <p>
                – Lỗi do sử dụng: Hình dạng sản phẩm bị thay đổi nhiều (dãn,
                hư form) <br />
                – Lỗi do bảo quản không đúng quy cách như: sử dụng chất tẩy
                rửa mạnh để giặt và gây lem màu, phơi nắng quá lâu làm hư hại
                sản phẩm… <br />
                – Sản phẩm hư hỏng do tác động bên ngoài, biến dạng, rách
                thủng, ẩm mốc, cháy hoặc do người sử dụng làm hỏng. <br />
                – Sản phẩm đã qua sử dụng bị dơ bẩn. <br />
                – Sản phẩm đã quá hạn bảo hành.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection