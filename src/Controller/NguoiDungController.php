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
        }elseif (isset($_POST['txttkiem'])) {
            $tkiem = $_POST['txttkiem'];
            $ds = timKiemND($tkiem);
            header('Location: ../View/Admin/AdminNguoiDung.php?ds=' . urlencode(json_encode($ds)));
            exit;
        }
    }
    if (isset($_GET['mnd'])) { 
        $manguoidung = $_GET['mnd'];
        xoaNguoiDung($manguoidung);
    }
    $dsNguoidung = getAllNguoiDung();
    header('Location: ../View/Admin/AdminNguoiDung.php?ds=' . urlencode(json_encode($dsNguoidung)));
?>
