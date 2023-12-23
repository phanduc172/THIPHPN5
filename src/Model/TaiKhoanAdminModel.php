<?php
    include '../connect.php';

    function KtDangNhap($taikhoanadmin, $matkhauadmin) {
        $conn = connectDB();
        try {
            $query = "SELECT * FROM taikhoanad WHERE taikhoanadmin = :taikhoanadmin AND matkhauadmin =:matkhauadmin";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':taikhoanadmin', $taikhoanadmin);
            $stmt->bindParam(':matkhauadmin', $matkhauadmin);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Lỗi truy vấn: ' . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
?>