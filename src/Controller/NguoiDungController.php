<?php
    include '../connect.php';
    include '../Model/NguoiDungModel.php';


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['butadd'])) { 
            $hoten = $_POST['txttennguoidung'];
            $tendapnhap = $_POST['txttendangnhap'];
            $matkhau = $_POST['txtmatkhau'];
            themNguoiDung($hoten,$tendapnhap,$matkhau);

        } elseif (isset($_POST['butupdate'])) { 
            $manguoidung = $_POST['txtmanguoidung'];
            $hoten = $_POST['txttennguoidung'];
            $tendapnhap = $_POST['txttendangnhap'];
            $matkhau = $_POST['txtmatkhau'];
            suaNguoiDung($manguoidung,$hoten,$tendapnhap,$matkhau);
        }
    }

    if (isset($_GET['mnd'])) { 
        $manguoidung = $_GET['mnd'];
        xoaNguoiDung($manguoidung);
    }
    header('Location: ../View/Admin/AdminNguoiDung.php');
?>
