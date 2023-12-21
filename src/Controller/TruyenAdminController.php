<?php
include '../Model/TruyenAdminModel.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    try {
        header('Content-Type: text/html; charset=utf-8');
        session_start();

        // Check if the keys exist in the $_GET array
        $titlesearch = isset($_GET["search"]) ? $_GET["search"] : null;
        $delete = isset($_GET["delete"]) ? $_GET["delete"] : null;
        $mtrStr = isset($_GET["txtmatruyen"]) ? $_GET["txtmatruyen"] : null;
        $tentruyen = isset($_GET["txttentruyen"]) ? $_GET["txttentruyen"] : null;
        $anh = isset($_GET["txtanh"]) ? $_GET["txtanh"] : null;
        $noidung = isset($_GET["txtnoidung"]) ? $_GET["txtnoidung"] : null;
        $mota = isset($_GET["txtmota"]) ? $_GET["txtmota"] : null;
        $mtgStr = isset($_GET["txtmatacgia"]) ? $_GET["txtmatacgia"] : null;
        $mtlStr = isset($_GET["txtmatheloai"]) ? $_GET["txtmatheloai"] : null;
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
        var_dump($action, $titlesearch, $mtrStr, $tentruyen, $anh, $noidung, $mota, $mtgStr, $mtlStr, $mtr, $mtg, $mtl);
        if ($titlesearch != null) {
            print($titlesearch);
            $dstruyen = searchTruyenByName($titlesearch);
            $_SESSION['dstruyen'] = $dstruyen;
            header("Location: ../View/Admin/AdminTruyen.php?hihi=haha");
            exit();
        }
        if (isset($_GET["butadd"])) {
            if (!is_null($tentruyen) && !is_null($anh) && !is_null($noidung) && !is_null($mota) && !is_null($mtg) && !is_null($mtl)) {
                addTruyen($tentruyen, $anh, $noidung, $mota, $mtg, $mtl);
            }
        } elseif (isset($_GET["butupdate"])) {
            if (!is_null($mtr) && !is_null($tentruyen) && !is_null($anh) && !is_null($noidung) && !is_null($mota) && !is_null($mtg) && !is_null($mtl)) {
                updateTruyen($mtr, $tentruyen, $anh, $noidung, $mota, $mtg, $mtl);
            }
        } elseif ($delete != null && $delete == "xoa") {
            $mtrxoa = $_GET["mtr"];
            $matruyen = intval($mtrxoa);
            deleteTruyen($matruyen);
        }

        $dstruyen = getAllTruyen();
        $_SESSION['dstruyen'] = $dstruyen;
        header("Location: ../View/Admin/AdminTruyen.php");
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
