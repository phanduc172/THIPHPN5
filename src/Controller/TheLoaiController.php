<?php
    include '../connect.php';
    include '../Model/TheLoaiModel.php';

    if (isset($_POST['butadd'])) { 
        $matheloai = $_POST['txtmatheloai'];
        $tentheloai = $_POST['txttentheloai'];
        themTheloai($matheloai, $tentheloai);
    } elseif (isset($_POST['butupdate'])) { 
        $matheloai = $_POST['txtmatheloai'];
        $tentheloai = $_POST['txttentheloai'];
        suaTheloai($matheloai, $tentheloai);
    } elseif (isset($_POST['txttkiem'])) {
        $tkiem = $_POST['txttkiem'];
        $ds = timKiemTL($tkiem);
        header('Location: ../View/Admin/AdminTheLoai.php?ds=' . urlencode(json_encode($ds)));
        exit;
    } elseif (isset($_GET['mtl'])) { 
        $matheloai = $_GET['mtl'];
        xoaTheloai($matheloai);
    }
    $ds = getAllTheloai();
    header('Location: ../View/Admin/AdminTheLoai.php?ds=' . urlencode(json_encode($ds)));
    exit;
?>
