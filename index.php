<?php
// Kiểm tra xem DOCUMENT_ROOT có tồn tại không
if (isset($_SERVER['DOCUMENT_ROOT'])) {
    $documentRoot = $_SERVER['DOCUMENT_ROOT'];
    echo "Đường dẫn DOCUMENT_ROOT là: $documentRoot";
} else {
    echo "Không thể lấy được đường dẫn DOCUMENT_ROOT";
}
?>
