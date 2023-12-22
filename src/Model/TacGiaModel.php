<?php
    include '../../connect.php';

    function getAllTacgia() {
        $conn = connectDB();

        try {
            $query = $conn->query("SELECT * FROM tacgia");
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
            return null;
        } finally {
            $conn = null;
        }
    }
    function themTacgia($tentacgia, $quequan) {
        $conn = connectDB();
        try {
            $query = "INSERT INTO tacgia (tentacgia, quequan) VALUES (:tentacgia, :quequan)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':tentacgia', $tentacgia);
            $stmt->bindParam(':quequan', $quequan);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
        } finally {
            $conn = null;
        }
    }

    function suaTacgia($matacgia, $tentacgia, $quequan) {
        $conn = connectDB();
        try {
            $query = "UPDATE tacgia SET tentacgia = :tentacgia, quequan = :quequan  WHERE matacgia = :matacgia";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':matacgia', $matacgia);
            $stmt->bindParam(':tentacgia', $tentacgia);
            $stmt->bindParam(':quequan', $quequan);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
    function xoaTacgia($matacgia) {
        $conn = connectDB();
        try {
            $query = "DELETE FROM tacgia WHERE matacgia = :matacgia";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':matacgia', $matacgia);
            $stmt->execute();
            echo 'Xóa thể loại thành công!';
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
    function tongTacgia() {
        $conn = connectDB();

        try {
            $query = $conn->query("SELECT COUNT(matacgia) AS total FROM tacgia");
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