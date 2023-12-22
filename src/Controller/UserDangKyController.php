<?php
include '../connect.php';
include '../Model/TaiKhoanNguoiDungModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if (isset($_POST['txtht']) && isset($_POST['txttk']) && isset($_POST['txtmk'])) { 
        $ht = $_POST['txtht'];
        $tk = $_POST['txttk'];
        $mk = $_POST['txtmk'];
        DangKy($ht, $tk, $mk);
        header('Location: ../View/User/UserDangNhap.php');
        exit; 
}
}
?>