<?php 
    $tongTg = isset($_GET['tongTg']) ? $_GET['tongTg'] : 0;
    $tongT = isset($_GET['tongT']) ? $_GET['tongT'] : 0;
    $tongTl = isset($_GET['tongTl']) ? $_GET['tongTl'] : 0;
    $tongNd = isset($_GET['tongNd']) ? $_GET['tongNd'] : 0;
    include "../../Model/TruyenModel.php";
    $dstruyen = getAllTruyen();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Đọc truyện Online - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../../assets/css/adminstyles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="../../Controller/AdminTrangChuController.php"> <img width="50px" alt="" src="../../../assets/img-truyen/logo-pd.png"> </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Tìm kiếm..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="../../Controller/AdminDangXuatController.php">Đăng xuất</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="../../Controller/AdminTrangChuController.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Tổng quát
                        </a>
                        <div class="sb-sidenav-menu-heading">Giao diện</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Quản lý truyện
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <div>
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="../../Controller/NguoiDungController.php">Người dùng</a>
                                        <a class="nav-link" href="../../Controller/TruyenAdminController.php">Truyện</a>
                                        <a class="nav-link" href="../../Controller/TacGiaController.php">Tác giả</a>
                                        <a class="nav-link" href="../../Controller/TheLoaiController.php">Thể loại</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Tổng quát</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Thống kê bảng
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Tổng số tác giả</th>
                                            <td><?= $tongTg ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tổng số truyện</th>
                                            <td><?= $tongT ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tổng số thể loại</th>
                                            <td><?= $tongTl ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tổng số người dùng</th>
                                            <td><?= $tongNd ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Đồ thị thống kê
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách truyện
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead class="text-center align-middle">
                                        <tr>
                                            <th>Mã truyện</th>
                                            <th>Tên truyện</th>
                                            <th>Tác giả</th>
                                            <th>Thể loại</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dstruyen as $truyen) : ?>
                                            <tr class="text-center">
                                                <td><?= $truyen['matruyen']; ?></td>
                                                <td class="text-start"><?= $truyen['tentruyen']; ?></td>
                                                <td><?= $truyen['tentacgia']; ?></td>
                                                <td><?= $truyen['tentheloai']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="bg-dark text-white fw-bold fs-5 text-center py-3">
                <p class="m-0">&copy; 2023 No CopyRight</p>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="../../../assets/js/thongke.php"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function (event) {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
                });
            }

            var tongTacGia = <?= $tongTg ?>;
            var tongTruyen = <?= $tongT ?>;
            var tongNguoiDung = <?= $tongTl ?>;
            var tongTheLoai = <?= $tongNd ?>;

            // Dữ liệu biểu đồ
            var ctx = document.getElementById("myChart").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["Tác giả", "Truyện", "Người dùng", "Thể loại"],
                    datasets: [{
                        label: "Số lượng",
                        data: [tongTacGia, tongTruyen, tongNguoiDung, tongTheLoai],
                        backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(255, 205, 86, 0.2)",
                        ],
                        borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(255, 205, 86, 1)",
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

</body>
</html>
