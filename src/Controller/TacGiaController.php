<?php
    include '../connect.php';
    include '../Model/TacgiaModel.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['butadd'])) { 
            $tentacgia = $_POST['txttentacgia'];
            $quequan = $_POST['txtquequan'];
            themTacgia($tentacgia, $quequan);
        } elseif (isset($_POST['butupdate'])) { 
            $matacgia = $_POST['txtmatacgia'];
            $tentacgia = $_POST['txttentacgia'];
            $quequan = $_POST['txtquequan'];
            suaTacgia($matacgia, $tentacgia, $quequan);
        }
    }
    if (isset($_GET['mtg'])) { 
        $matacgia = $_GET['mtg'];
        xoaTacgia($matacgia);

    }
    $dsTacgia = getAllTacgia();
    header('Location: ../View/Admin/AdminTacgia.php?ds=' . urlencode(json_encode($dsTacgia)));
?>
