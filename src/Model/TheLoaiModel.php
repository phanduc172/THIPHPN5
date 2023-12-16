<?php
include '../../connect.php';

function getAllTheloai() {
    $conn = connectDB();

    try {
        $query = $conn->query("SELECT * FROM theloai");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo 'Lỗi truy vấn: ' . $e->getMessage();
        return null;
    }
}


?>
