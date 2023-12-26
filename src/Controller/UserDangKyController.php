<?php
include '../connect.php';
include '../Model/TaiKhoanNguoiDungModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if (isset($_POST['txtht']) && isset($_POST['txttk']) && isset($_POST['txtmk'])) { 
        $ht = $_POST['txtht'];
        $tk = $_POST['txttk'];
        $mk = $_POST['txtmk'];
        if(!kttk($tk)) {
            DangKy($ht, $tk, $mk);
        } else {
            header('Location: ../View/User/TrangChu.php?error=dangky');
            exit; 
        }
    }
}
header('Location: ../View/User/TrangChu.php');
exit; 
?>