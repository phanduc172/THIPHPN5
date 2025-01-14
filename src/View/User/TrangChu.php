<?php
	include '../../Model/TruyenModel.php';
	include '../../Model/TheLoaiModel.php';
	$dstruyen = getAllTruyen();
	$dstheloai = getAllTheloai();
	session_start();
	$dn = isset($_SESSION['dn']) ? $_SESSION['dn'] : null;
	if (isset($_GET['error'])) {
		echo '<script>
			document.addEventListener("DOMContentLoaded", function() {
				var myModal = new bootstrap.Modal(document.getElementById("myModal"));
				myModal.show();
			});
		</script>';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Đọc truyện Online</title>
<link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	    <nav class="navbar navbar-expand-md navbar-light bg-light fw-bold mb-3 position-fixed start-0 end-0" style="z-index:1080">
        <div class="container-fluid">
			<a href="../../Controller/TruyenController.php"><img class="logo-pd" alt="" src="../../../assets/img-truyen/logo-pd.png"></a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="../../Controller/TruyenController.php" class="nav-item nav-link active">Trang chủ</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Thể loại</a>
                        <div class="dropdown-menu" style="width: 200px;">
							<ul class="px-3 theloai-items" style="list-style: none;">
								<?php foreach ($dstheloai as $theloai) : ?>
									<li class="mb-2 p-1">	
										<i class="bi bi-tags-fill text-secondary"></i>
										<a class="text-decoration-none text-primary" href="../../Controller/TruyenController.php?mtl=<?= $theloai['matheloai'] ?>">
											<?= $theloai['tentheloai'] ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
                        </div>
                    </div>
                  <a href="../../Controller/AdminDangNhapController.php" class="nav-item nav-link bg-danger rounded-pill text-white">Đăng truyện</a>
                </div>
				<form class="d-flex" action="../../Controller/TruyenController.php" method="GET">
					<div class="input-group">
						<input name="tuKhoa" type="text" class="form-control" placeholder="Tìm truyện, tác giả">
						<button name="but1" type="submit" class="btn btn-secondary"><i class="bi-search"></i></button>
					</div>
				</form>
			    <div class="navbar-nav">
					<button type="button" class="btn btn btn-light" data-bs-toggle="modal" data-bs-target="#myModal">
						<?php if(isset($dn) && $dn != null): ?>
							<i class="bi bi-person-circle"></i> <?= $dn['hoten'] ?>
						<?php else: ?>
							<i class="bi bi-person-circle"></i> Thành viên
						<?php endif; ?>
					</button>
					<?php if(isset($dn) && $dn != null): ?>
						<li style="margin-top: 7px;" class="text-secondary me-2"><i class="bi bi-person-circle me-2"></i></li>
						<a style="margin-top: 7px;" class="text-decoration-none text-danger" href="../../Controller/UserDangXuatController.php">Đăng xuất</a>
					<?php endif; ?>
				</div>
			    <!-- The Modal -->
				<div class="modal" id="myModal">
				    <div class="modal-dialog">
				        <div class="modal-content" style="margin-top: 100px;">

				            <!-- Modal Header -->
				            <div class="modal-header">
				                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				            </div>

				            <!-- Modal body -->
				            <div class="modal-body">
				                <ul class="nav nav-tabs ">
				                    <li class="nav-item">
				                        <a class="nav-link active" data-bs-toggle="tab" href="#loginForm">Đăng nhập</a>
				                    </li>
				                    <li class="nav-item">
				                        <a class="nav-link" data-bs-toggle="tab" href="#registerForm">Đăng ký</a>
				                    </li>
				                </ul>

				                <div class="tab-content mt-3">
				                    <div id="loginForm" class="tab-pane fade show active">
				                        <form method="post" action="../../Controller/UserDangNhapController.php">
								            <fieldset>
								                <div class="form-group mb-3">
								                	<input class="form-control" placeholder="Nhập tên người dùng" name="txttk" type="text">
								                </div>
								                <div class="form-group mb-3">
								              	  <input class="form-control" placeholder="Nhập mật khẩu" name="txtmk" type="password" value="">
								                </div>
								                <input class="btn btn-md btn btn-secondary btn-block" type="submit" value="Đăng nhập">
								            	<?php if (isset($_GET['error']) && $_GET['error'] === 'dangnhap') { ?>
													<div class="alert alert-danger mt-2">
														<strong>Tên đăng nhập hoặc mật khẩu khôg đúng!</strong>
													</div>
												<?php } ?>
											</fieldset>
							            </form>
				                    </div>
				                    <div id="registerForm" class="tab-pane fade">
				                        <form method="post" action="../../Controller/UserDangKyController.php">
								            <fieldset>
								           		<div class="form-group mb-3">
								                	<input class="form-control" placeholder="Nhập họ tên" name="txtht" type="text">
								                </div>
								                <div class="form-group mb-3">
								                	<input class="form-control" placeholder="Nhập tên đăng nhập" name="txttk" type="text">
								                </div>
								                <div class="form-group mb-3">
								              	  <input class="form-control" placeholder="Nhập mật khẩu" type="password" name="txtmk" value="">
								                </div>
								                <input class="btn btn-md btn btn-secondary btn-block" type="submit" value="Đăng ký">
								            	<?php if (isset($_GET['error']) && $_GET['error'] === 'dangky') { ?>
													<div class="alert alert-danger mt-2">
														<strong>Tên đăng nhập đã tồn tại!</strong>
													</div>
												<?php } ?>
											</fieldset>
							            </form>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>

			</div>
		</div>
   	</nav>

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="theloai bg-light col-3 me-2">
                    <h5 class="text-danger fw-bold text-center mt-2">Thể loại truyện</h5>
					<ul class="px-3 theloai-items" style="list-style: none;">
						<?php foreach ($dstheloai as $theloai) : ?>
							<li class="mb-2 p-1">
								<i class="bi bi-tags-fill text-secondary"></i>
								<a class="text-decoration-none text-primary" href="../../Controller/TruyenController.php?mtl=<?= $theloai['matheloai'] ?>">
									<?= $theloai['tentheloai'] ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>

                </div>

                <div class="noidung bg-light col text-center">
					<div id="carouselExampleControls" class="carousel slide mt-3" data-bs-ride="carousel">
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img src="../../../assets/img-truyen/ca1.jpg" class="d-block w-100" alt="...">
					    </div>
					    <div class="carousel-item">
					      <img src="../../../assets/img-truyen/ca2.jpg" class="d-block w-100" alt="...">
					    </div>
					    <div class="carousel-item">
					      <img src="../../../assets/img-truyen/ca3.jpg" class="d-block w-100" alt="...">
					    </div>
					  </div>
					  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="visually-hidden">Previous</span>
					  </button>
					  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="visually-hidden">Next</span>
					  </button>
					</div>

                    <h5 class="text-danger fw-bold text-center my-2">Danh sách truyện</h5>
                    <ul id="content" class="row truyen-items" style="list-style: none;">
						<?php foreach ($dstruyen as $truyen) : ?>
							<li class="httruyen col col-ms-6 col-md-6 col-lg-4 truyen-item mb-1">
								<img class="my-1 truyen-img" src="../../../assets/<?= $truyen["anh"]?>" alt="Ảnh truyện">
								<a href="../../Controller/TruyenController.php?mt=<?= $truyen['matruyen']?>" class="text-decoration-none">
									<h6 class="mt-1"><?= $truyen['tentruyen']; ?></h6>
								</a>
								<p>Tác giả: <?= $truyen['tentacgia']; ?></p>
								<p>Thể loại: <?= $truyen['tentheloai']; ?></p>
							</li>
						<?php endforeach; ?>
					</ul>

					
                </div>
            </div>
        </div>
    </div>

	<footer class="mt-3 bg-secondary text-white fw-bold fs-5 text-center py-3">
	   <p class="m-0">&copy; 2023 No CopyRight</p>
	</footer>
</body>
</html>