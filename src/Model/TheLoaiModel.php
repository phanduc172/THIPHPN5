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
        } finally {
            $conn = null;
        }
    }
    function themTheloai($matheloai, $tentheloai) {
        $conn = connectDB();
        try {
            $query = "INSERT INTO theloai (matheloai, tentheloai) VALUES (:matheloai, :tentheloai)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':matheloai', $matheloai);
            $stmt->bindParam(':tentheloai', $tentheloai);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
        } finally {
            $conn = null;
        }
    }

    function suaTheloai($matheloai, $tentheloai) {
        $conn = connectDB();
        try {
            $query = "UPDATE theloai SET tentheloai = :tentheloai WHERE matheloai = :matheloai";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':matheloai', $matheloai);
            $stmt->bindParam(':tentheloai', $tentheloai);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
    function xoaTheloai($matheloai) {
        $conn = connectDB();
        try {
            $query = "DELETE FROM theloai WHERE matheloai = :matheloai";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':matheloai', $matheloai);
            $stmt->execute();
            echo 'Xóa thể loại thành công!';
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
    function tongTheLoai() {
        $conn = connectDB();

        try {
            $query = $conn->query("SELECT COUNT(matheloai) AS total FROM theloai");
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['total'] ?? 0;
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
            return 0;
        } finally {
            $conn = null;
        }
    }
?>