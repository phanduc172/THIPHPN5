<?php
include '../../connect.php';

function getAllTruyen() {
    $conn = connectDB();

    try {
        $query = $conn->query("SELECT * FROM doctruyen.v_httruyen;");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo 'Lỗi truy vấn: ' . $e->getMessage();
        return null;
    }
}

function getTruyenTheoID($matruyen) {
    $conn = connectDB();

    try {
        $query = $conn->prepare("SELECT * FROM v_httruyen WHERE matruyen = :matruyen");
        $query->bindParam(':matruyen', $matruyen);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo 'Lỗi truy vấn: ' . $e->getMessage();
        return null;
    } finally {
        // Đóng kết nối
        $conn = null;
    }
}

function getTruyenTheoMaTheLoai($matheloai) {
    $conn = connectDB();

    try {
        $query = $conn->prepare("SELECT * FROM v_httruyen WHERE matheloai = :matheloai");
        $query->bindParam(':matheloai', $matheloai);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo 'Lỗi truy vấn: ' . $e->getMessage();
        return null;
    } finally {
        // Close the connection
        $conn = null;
    }
}
?>
