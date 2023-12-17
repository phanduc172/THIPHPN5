<?php
include '../Model/TacGiaModel.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    try {
        header('Content-Type: text/html; charset=utf-8');
        $tacgiamodel = new TacGiaModel();
        
        // Check if the keys exist in the $_GET array
        if (isset($_GET["delete"])) {
            $delete = $_GET["delete"];
        }

        if (isset($_GET["txtmatacgia"])) {
            $matacgia = $_GET["txtmatacgia"];
        }

        if (isset($_GET["txttentacgia"])) {
            $tentacgia = $_GET["txttentacgia"];
        }

        if (isset($_GET["txtquequan"])) {
            $quequan = $_GET["txtquequan"];
        }

        if (isset($_GET["butadd"])) {
            $tacgiamodel->addTacgia($tentacgia, $quequan);
        } elseif (isset($_GET["butupdate"])) {
            $tacgiamodel->updateTacgia($matacgia, $tentacgia, $quequan);
        } elseif ($delete != null && $delete == "xoa") {
            $tacgiamodel->deleteTacgia($_GET["mtg"]);
        }

        session_start();
        $dstacgia = $tacgiamodel->getAllTacgia();
        $_SESSION['dstacgia'] = $dstacgia;
        header("Location: ../View/Admin/AdminTacGia.php");
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
