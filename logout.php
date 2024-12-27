<?php
session_start(); // Bắt đầu session

// Xóa toàn bộ session
session_unset(); // Loại bỏ tất cả các biến session
session_destroy(); // Hủy session hiện tại

// Chuyển hướng đến trang đăng nhập
header('Location: login.php');
exit;
?>