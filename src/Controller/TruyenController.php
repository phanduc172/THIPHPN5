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

    // Check if there are stories in the selected genre
    if ($dstruyentheotheloai) {
        // Redirect to the view with the list of stories based on the genre
        header('Location: ../View/User/TruyenTheoTheLoai.php?mtl='.$matheloai);
    } else {
        // No stories found in the selected genre, redirect to home page or show an error
        header('Location: ../View/User/TrangChu.php');
    }
} else {
    // No genre ID provided, redirect to home page
    header('Location: ../View/User/TrangChu.php');
}
?>
