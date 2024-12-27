<?php
// Tên dự án
define('PROJECT_NAME', 'Phone Scraping System');

// Đường dẫn gốc (Base URL)
define('BASE_URL', 'http://localhost/phone/'); // Thay 'localhost/phone' bằng URL thật khi đưa lên server
define('ASSETS_URL', BASE_URL . 'assets/');   // Đường dẫn tới thư mục assets (CSS, JS, hình ảnh)

// Thư mục upload
define('UPLOADS_DIR', __DIR__ . '/uploads/');
define('UPLOADS_URL', BASE_URL . 'uploads/');

// Cài đặt múi giờ (timezone)
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Cấu hình bảo mật (nếu cần)
define('SECRET_KEY', 'your_secret_key_here'); // Key dùng cho bảo mật (mã hóa, JWT, etc.)

?>