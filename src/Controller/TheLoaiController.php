<?php
    include '../connect.php';
    include '../Model/TheLoaiModel.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['butadd'])) { 
            $matheloai = $_POST['txtmatheloai'];
            $tentheloai = $_POST['txttentheloai'];
            themTheloai($matheloai, $tentheloai);
        } elseif (isset($_POST['butupdate'])) { 
            $matheloai = $_POST['txtmatheloai'];
            $tentheloai = $_POST['txttentheloai'];
            suaTheloai($matheloai, $tentheloai);
        }
    }
    if (isset($_GET['mtl'])) { 
        $matheloai = $_GET['mtl'];
        xoaTheloai($matheloai);

    }
    header('Location: ../View/Admin/AdminTheLoai.php');
?>
