<?php
if (!function_exists('connectDB')) {
    function connectDB() {
        $host = 'localhost';
        $dbname = 'doctruyen';
        $username = 'root';
        $password = '123456';

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->exec("set names utf8");
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;
        } catch (PDOException $e) {
            echo 'Kết nối đến cơ sở dữ liệu thất bại: ' . $e->getMessage();
            return null;
        }
    }
}
?>
