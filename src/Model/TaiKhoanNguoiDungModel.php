<?php
    include '../../connect.php';

    function ktdn($tendangnhap, $matkhau) {
        $conn = connectDB();
        try {
            $query = "SELECT * FROM nguoidung WHERE tendangnhap = :tendangnhap AND matkhau =:matkhau";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':tendangnhap', $tendangnhap);
            $stmt->bindParam(':matkhau', $matkhau);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
    function DangKy($hoten, $tendangnhap, $matkhau) {
        $conn = connectDB();
        try {
            $query = "INSERT INTO nguoidung (hoten, tendangnhap, matkhau) VALUES (:hoten, :tendangnhap , :matkhau)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':hoten', $hoten);
            $stmt->bindParam(':tendangnhap', $tendangnhap);
            $stmt->bindParam(':matkhau', $matkhau);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
?>