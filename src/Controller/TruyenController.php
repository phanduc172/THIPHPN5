<?php
include '../connect.php';
include '../Model/TruyenModel.php';

if (isset($_GET['mt'])) {
    $matruyen = $_GET['mt'];
    getTruyenTheoID($matruyen);
    header('Location: ../View/User/ChiTietTruyen.php?id='.$matruyen);
} elseif (isset($_GET['mtl'])) {
    $matheloai = $_GET['mtl'];
    $dstruyentheotheloai = getTruyenTheoMaTheLoai($matheloai);
    if ($dstruyentheotheloai) {
        header('Location: ../View/User/TruyenTheoTheLoai.php?mtl='.$matheloai);
    }
     else {
        header('Location: ../View/User/TruyenTheoTheLoai.php');
    }
} elseif (isset($_GET['tuKhoa'])) {
    // Xử lý truy vấn tìm kiếm
    $tuKhoa = $_GET['tuKhoa'];
    $ketQuaTimKiem = timKiemTruyenVaTacGia($tuKhoa);

    if ($ketQuaTimKiem) {
        header('Location: ../View/User/DanhSachTimKiem.php?tuKhoa='.$tuKhoa);
    } else {
        header('Location: ../View/User/DanhSachTimKiem.php?');
    }
} else {
    header('Location: ../View/User/TrangChu.php');
}
?>
