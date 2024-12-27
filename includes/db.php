<?php
// Cấu hình thông tin cơ sở dữ liệu
$host = 'localhost';               // Địa chỉ máy chủ MySQL
$dbname = 'phone_scraping_db';     // Tên cơ sở dữ liệu
$username = 'root';                // Tên người dùng MySQL
$password = '';                    // Mật khẩu MySQL (để trống nếu mặc định)

// Thiết lập kết nối PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Kích hoạt chế độ hiển thị lỗi
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Trả kết quả dạng mảng liên kết
} catch (PDOException $e) {
    // Nếu kết nối thất bại, hiển thị lỗi và thoát
    die("Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage());
}
?>