<?php
include '../connect.php';
include '../Model/TaiKhoanAdminModel.php';
include '../Model/TheLoaiModel.php';
include '../Model/NguoiDungModel.php';
include '../Model/TacGiaModel.php';
include '../Model/TruyenModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if (isset($_POST['usernameadmin']) && isset($_POST['passwordadmin'])) { 
        $tk = $_POST['usernameadmin'];
        $mk = $_POST['passwordadmin'];

        if ($tk != null && $mk != null) {
            $ad = KtDangNhap($tk, $mk);
            if ($ad != null) {
                $tongTg = tongTacgia();
                $tongT = tongTruyen();
                $tongTl = tongTheLoai();
                $tongNd = tongNguoiDung();
                $queryString = http_build_query(['tongTg' => $tongTg, 'tongT' => $tongT, 'tongTl' => $tongTl, 'tongNd' => $tongNd]);
                $redirectURL = '../View/Admin/AdminTrangChu.php?' . $queryString;
                header('Location: ' . $redirectURL);
                exit; 
            }
            
        }
    }
}
 header('Location: ../View/Admin/AdminDangNhap.php');
 exit;
?>
