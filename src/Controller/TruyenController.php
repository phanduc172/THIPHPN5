<?php
include '../Model/TruyenModel.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    try {
        header('Content-Type: text/html; charset=utf-8');
        $truyenModel = new TruyenModel();
        
        // Check if the keys exist in the $_GET array
        if (isset($_GET["delete"])) {
            $delete = $_GET["delete"];
        }

        if (isset($_GET["txtmatruyen"])) {
            $mtrStr = $_GET["txtmatruyen"];
        }

        if (isset($_GET["txttentruyen"])) {
            $tentruyen = $_GET["txttentruyen"];
        }

        if (isset($_GET["txtanh"])) {
            $anh = $_GET["txtanh"];
        }

        if (isset($_GET["txtnoidung"])) {
            $noidung = $_GET["txtnoidung"];
        }

        if (isset($_GET["txtmota"])) {
            $mota = $_GET["txtmota"];
        }

        if (isset($_GET["txtmatacgia"])) {
            $mtgStr = $_GET["txtmatacgia"];
        }

        if (isset($_GET["txtmatheloai"])) {
            $mtlStr = $_GET["txtmatheloai"];
        }

        $mtr = 0;
        if (!empty($mtrStr)) {
            $mtr = intval($mtrStr);
        }

        $mtg = 0;
        if (!empty($mtgStr)) {
            $mtg = intval($mtgStr);
        }

        $mtl = 0;
        if (!empty($mtlStr)) {
            $mtl = intval($mtlStr);
        }

        if (isset($_GET["butadd"])) {
            $truyenModel->addTruyen($tentruyen, $anh, $noidung, $mota, $mtg, $mtl);
        } elseif (isset($_GET["butupdate"])) {
            $truyenModel->updateTruyen($mtr, $tentruyen, $anh, $noidung, $mota, $mtg, $mtl);
        } elseif ($delete != null && $delete == "xoa") {
            $mtrxoa = $_GET["mtr"];
            $matruyen = intval($mtrxoa);
            $truyenModel->deleteTruyen($matruyen);
        }

        session_start();
        $dstruyen = $truyenModel->getAllTruyen();
        $_SESSION['dstruyen'] = $dstruyen;
        header("Location: ../View/Admin/AdminTruyen.php");
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
