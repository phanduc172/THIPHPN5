<?php

use LDAP\Result;

include '../connect.php';

class TacGiaModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllTacGia()
    {
        try {
            $query = $this->conn->query("SELECT * FROM tacgia");
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            // Xử lý lỗi nếu cần
            return [];
        }
    }

    public function getTacGiaById($matacgia)
    {
        try {
            $query = $this->conn->prepare("SELECT * FROM tacgia WHERE matacgia = :matacgia");
            $query->bindParam(':matacgia', $matacgia, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            // Xử lý lỗi nếu cần
            return null;
        }
    }

    public function addTacGia($tentacgia, $quequan)
    {
        try {
            $query = $this->conn->prepare(" INSERT INTO tacgia (tentacgia, quequan) 
                                            VALUES (:tentacgia, :quequan);");
            $query->bindParam(':tentacgia', $tentacgia, PDO::PARAM_STR);
            $query->bindParam(':quequan', $quequan, PDO::PARAM_STR);
            $query->execute();
            // Kiểm tra xem câu truy vấn đã thực thi thành công hay không
            if ($query->rowCount() > 0) {
                return true; // Truyện đã được thêm thành công
            } else {
                return false; // Có thể xảy ra lỗi, không có dòng nào được thêm vào
            }
        } catch (PDOException $e) {
            // Xử lý lỗi nếu cần
            error_log("Error adding truyen: " . $e->getMessage(), 0);
            return false;
        }
    }

    public function updateTacGia($matacgia, $tentacgia, $quequan)
    {
        try {
            $query = $this->conn->prepare("UPDATE tacgia 
                SET tentacgia = :tentacgia, quequan = :quequan
                WHERE matacgia = :matacgia");
            $query->bindParam(':matacgia', $matacgia, PDO::PARAM_INT);
            $query->bindParam(':tentacgia', $tentacgia, PDO::PARAM_STR);
            $query->bindParam(':quequan', $quequan, PDO::PARAM_STR);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            // Xử lý lỗi nếu cần
            return false;
        }
    }

    public function deleteTacGia($matacgia)
    {
        try {
            $query = $this->conn->prepare("DELETE FROM tacgia WHERE matacgia = :matacgia");
            $query->bindParam(':matacgia', $matacgia, PDO::PARAM_INT);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            // Xử lý lỗi nếu cần
            return false;
        }
    }
}

?>
