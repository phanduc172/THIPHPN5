<?php
    include '../connect.php';
    include '../Model/TaiKhoanAdminModel.php';
    include '../Model/TheLoaiModel.php';
    include '../Model/NguoiDungModel.php';
    include '../Model/TacGiaModel.php';
    include '../Model/TruyenModel.php';
    $tongTg = tongTacgia();
    $tongT = tongTruyen();
    $tongTl = tongTheLoai();
    $tongNd = tongNguoiDung();
    $queryString = http_build_query(['tongTg' => $tongTg, 'tongT' => $tongT, 'tongTl' => $tongTl, 'tongNd' => $tongNd]);
    $redirectURL = '../View/Admin/AdminTrangChu.php?' . $queryString;
    header('Location: ' . $redirectURL);
    exit; 
?>