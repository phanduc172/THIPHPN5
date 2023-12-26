<?php
    include '../connect.php';

    function getAllNguoiDung() {
        $conn = connectDB();
        try {
            $query = $conn->query("SELECT * FROM nguoidung");
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
            return null;
        }
    }
    function themNguoiDung($hoTen, $tenDangNhap, $matKhau) {
        $conn = connectDB();
        try {
            $query = "INSERT INTO nguoidung (hoten, tendangnhap, matkhau) VALUES (:hoten, :tendangnhap, :matkhau)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':hoten', $hoTen);
            $stmt->bindParam(':tendangnhap', $tenDangNhap);
            $stmt->bindParam(':matkhau', $matKhau);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
        } finally {
            // Đóng kết nối
            $conn = null;
        }
    }


    function suaNguoiDung($maNguoiDung, $hoTen, $tenDangNhap, $matKhau) {
        $conn = connectDB();
        try {
            $query = "UPDATE nguoidung SET hoten = :hoTen, tendangnhap = :tenDangNhap, matkhau = :matKhau WHERE manguoidung = :maNguoiDung";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':maNguoiDung', $maNguoiDung);
            $stmt->bindParam(':hoTen', $hoTen);
            $stmt->bindParam(':tenDangNhap', $tenDangNhap);
            $stmt->bindParam(':matKhau', $matKhau);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
        } finally {
            $conn = null;
        }
    }

    function xoaNguoiDung($maNguoiDung) {
        $conn = connectDB();
        try {
            $query = "DELETE FROM nguoidung WHERE manguoidung = :maNguoiDung";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':maNguoiDung', $maNguoiDung);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
        } finally {
            $conn = null;
        }
    }

    function tongNguoiDung() {
        $conn = connectDB();

        try {
            $query = $conn->query("SELECT COUNT(manguoidung) AS total FROM nguoidung");
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['total'] ?? 0;
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
            return 0;
        }   finally {
            $conn = null;
        }
    }
    function timKiemND($hoten) {
        try {
            $conn = connectDB();
            $tkiem = '%' . $hoten . '%';
    
            $query = $conn->prepare("SELECT * FROM nguoidung WHERE hoten LIKE :hoten");
            $query->bindParam(':hoten', $tkiem, PDO::PARAM_STR);
            $query->execute();
    
            $ketQua = $query->fetchAll(PDO::FETCH_ASSOC);
            unset($conn);
            return $ketQua;
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
            return false;
        }
    }
?>
