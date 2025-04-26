<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Admin</title>
    <style>
        /* Sidebar */
        .sidebar {
            background-color: #384289;
            color: white;
            min-height: calc(100vh - 56px);
        }
        .sidebar .nav-link {
            color: white;
            padding: 15px;
        }
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .sidebar-icon {
            margin-right: 10px;
        }

        .navbar {
            background-color: #384289;
        }

        /* Main content */
        .btn-con {
            display: flex;
            gap: 5px;
        }
        .add-btn {
            background-color: #e53935;
            border: none;
        }
        .add-btn:hover {
            background-color: #c62828;
        }
        .main-content {
            padding: 20px;
            background-color: #f5f5f5;
        }
        .con-hang {
            color: #4caf50;
        }
        .het-hang {
            color: #f44336;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .table-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="bi bi-house-fill"></i>
                Admin
            </a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="list-group list-group-flush">
                    <a href="#" class="nav-link">
                        <i class="bi bi-person-fill sidebar-icon"></i>
                        Quản lý tài khoản
                    </a>
                    <a href="#" class="nav-link active">
                        <i class="bi bi-box-seam sidebar-icon"></i>
                        Quản lý sản phẩm
                    </a>
                    <a href="#" class="nav-link">
                        <i class="bi bi-cart-fill sidebar-icon"></i>
                        Quản lý đơn hàng
                    </a>
                    <a href="#" class="nav-link">
                        <i class="bi bi-folder-fill sidebar-icon"></i>
                        Quản lý danh mục
                    </a>
                    <a href="#" class="nav-link">
                        <i class="bi bi-tag-fill sidebar-icon"></i>
                        Quản lý đợt khuyến mãi
                    </a>
                    <a href="#" class="nav-link">
                        <i class="bi bi-percent sidebar-icon"></i>
                        Quản lý mã giảm giá
                    </a>
                    <a href="#" class="nav-link">
                        <i class="bi bi-bar-chart-fill sidebar-icon"></i>
                        Thống kê
                    </a>
                    <a href="#" class="nav-link">
                        <i class="bi bi-three-dots sidebar-icon"></i>
                        ...
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content">
                <div class="row">
                    <!-- Form Column -->
                    <div class="col-md-12 form-container">
                        <div class="row">
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>Doanh thu</h3>
                                        <h3>250.000.000đ</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>Đơn hàng</h3>
                                        <h3>5.247</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>Khách hàng</h3>
                                        <h3>1.250</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>Sản phẩm đã bán</h3>
                                        <h3>8.750</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h4>Doanh thu theo tháng</h4>
                        
                        <canvas id="myChart" style="width:100%;"></canvas>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-Vp6J2FzL8+G8xTc/tzHgDcUYbE6nYmHiOq4p4Iqd1LbXWJNjsYbwZNbbz901yRBR" crossorigin="anonymous"></script>
    
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>

</body>

<script>
const xValues = ["Tháng 1","Tháng 2","Tháng 3","Tháng 4","Tháng 5","Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"];
const yValues = [50,50,35,210,60,75,250,210,160,170,200,250];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,1.0)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 0, max:300}}],
    }
  }
});
</script>
</html>