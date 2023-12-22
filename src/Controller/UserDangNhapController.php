<?php
include '../connect.php';
include '../Model/TaiKhoanNguoiDungModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if (isset($_POST['txttk']) && isset($_POST['txtmk'])) { 
        $tk = $_POST['txttk'];
        $mk = $_POST['txtmk'];
        if ($tk != null && $mk != null) {
            $dn = ktdn($tk, $mk);
            if ($dn != null) {
                session_start();
                $_SESSION['dn'] = $dn;
                header('Location: ../View/User/TrangChu.php');
                exit; 
            } 
        }
    }
}

 header('Location: ../View/User/UserDangNhap.php');
 exit;
?>
