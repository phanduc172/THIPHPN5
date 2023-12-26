<?php
    session_start();
    unset($_SESSION['dn']);
    header('Location: ../View/User/TrangChu.php');

?>