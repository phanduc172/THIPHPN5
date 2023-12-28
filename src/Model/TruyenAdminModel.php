<?php 

include '../connect.php';

function getAllTruyen()
{
    try {
        $conn = connectDB();
        $query = $conn->query("SELECT * FROM truyen");
        $result = $query->fetchAll();
        return $result;
    } catch (PDOException $e) {
        // Xử lý lỗi nếu cần
        return [];
    }
}

function getTruyenById($matruyen)
{
    try {
        $conn = connectDB();
        $query = $conn->prepare("SELECT * FROM truyen WHERE matruyen = :matruyen");
        $query->bindParam(':matruyen', $matruyen, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        // Xử lý lỗi nếu cần
        return null;
    }
}

function addTruyen($tentruyen, $anh, $noidung, $mota, $matacgia, $matheloai)
{
    try {
        $conn = connectDB();
        $query = $conn->prepare("INSERT INTO truyen (tentruyen, anh, noidung, mota, matacgia, matheloai) 
            VALUES (:tentruyen, :anh, :noidung, :mota, :matacgia, :matheloai)");
        $query->bindParam(':tentruyen', $tentruyen, PDO::PARAM_STR);
        $query->bindParam(':anh', $anh, PDO::PARAM_STR);
        $query->bindParam(':noidung', $noidung, PDO::PARAM_STR);
        $query->bindParam(':mota', $mota, PDO::PARAM_STR);
        $query->bindParam(':matacgia', $matacgia, PDO::PARAM_INT);
        $query->bindParam(':matheloai', $matheloai, PDO::PARAM_INT);
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

function updateTruyen($matruyen, $tentruyen, $anh, $noidung, $mota, $matacgia, $matheloai)
{
    try {
        $conn = connectDB();
        $query = $conn->prepare("UPDATE truyen 
            SET tentruyen = :tentruyen, anh = :anh, noidung = :noidung, mota = :mota, matacgia = :matacgia, matheloai = :matheloai
            WHERE matruyen = :matruyen");
        $query->bindParam(':matruyen', $matruyen, PDO::PARAM_INT);
        $query->bindParam(':tentruyen', $tentruyen, PDO::PARAM_STR);
        $query->bindParam(':anh', $anh, PDO::PARAM_STR);
        $query->bindParam(':noidung', $noidung, PDO::PARAM_STR);
        $query->bindParam(':mota', $mota, PDO::PARAM_STR);
        $query->bindParam(':matacgia', $matacgia, PDO::PARAM_INT);
        $query->bindParam(':matheloai', $matheloai, PDO::PARAM_INT);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        // Xử lý lỗi nếu cần
        return false;
    }
}
function deleteTruyen($matruyen)
{
    try {
        $conn = connectDB();
        $query = $conn->prepare("DELETE FROM truyen WHERE matruyen = :matruyen");
        $query->bindParam(':matruyen', $matruyen, PDO::PARAM_INT);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        // Xử lý lỗi nếu cần
        return false;
    }
}

function searchTruyenByName($tentruyen)
{
    try {
        $conn = connectDB();
        $query = $conn->prepare("SELECT * FROM truyen WHERE tentruyen LIKE :tentruyen");
        $tentruyenParam = '%' . $tentruyen . '%';
        $query->bindParam(':tentruyen', $tentruyenParam, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();  
        return [];
    }
}
?>