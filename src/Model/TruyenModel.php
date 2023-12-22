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
        $conn = null;
    }
}

function timKiemTruyenVaTacGia($tuKhoa)
{
    try {
        $conn = connectDB();
        $query = $conn->prepare("
            SELECT * FROM doctruyen.v_httruyen
            where tentruyen LIKE :tuKhoa or tentacgia LIKE :tuKhoa");
        $tuKhoaParam = '%' . $tuKhoa . '%';
        $query->bindParam(':tuKhoa', $tuKhoaParam, PDO::PARAM_STR);
        $query->execute();
        $ketQua = $query->fetchAll(PDO::FETCH_ASSOC);
        unset($conn);
        return $ketQua;
    } catch (PDOException $e) {
        error_log("Lỗi Cơ sở dữ liệu: " . $e->getMessage());
        return [];
    }
}

?>
