<?php
include '../connect.php';
include '../Model/TaiKhoanAdminModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if (isset($_POST['usernameadmin']) && isset($_POST['passwordadmin'])) { 
        $tk = $_POST['usernameadmin'];
        $mk = $_POST['passwordadmin'];

        if ($tk != null && $mk != null) {
            $ad = KtDangNhap($tk, $mk);
            if ($ad != null) {
                header('Location: ../View/Admin/AdminTrangChu.php');
                exit; 
            } 
        }
    }
}

 header('Location: ../View/Admin/AdminDangNhap.php');
 exit;
?>
