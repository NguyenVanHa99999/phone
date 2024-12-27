<?php
session_start(); // Bắt đầu session
include_once __DIR__ . '/../config.php'; // Gồm file cấu hình chung

// Kiểm tra trạng thái đăng nhập và quyền người dùng
$is_logged_in = isset($_SESSION['user_id']);
$role = $is_logged_in ? $_SESSION['role'] : null;
$username = $is_logged_in ? $_SESSION['username'] : null; // Lấy tên người dùng nếu đã đăng nhập

// Xác định tiêu đề trang (nếu cần sử dụng title động)
if (!isset($page_title)) {
    $page_title = PROJECT_NAME; // Lấy tên dự án làm tiêu đề mặc định
}

// Biến breadcrumb (tùy chọn)
if (!isset($breadcrumb)) {
    $breadcrumb = null; // Nếu không có breadcrumb, để null
}

// Biến để hiển thị thông báo toàn hệ thống
$global_message = "Hệ thống sẽ bảo trì từ 10:00 PM đến 2:00 AM ngày mai."; // Thay bằng thông báo thực tế nếu cần
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <!-- Favicon -->
    <link rel="icon" href="<?php echo ASSETS_URL; ?>images/favicon.ico" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>css/style.css">
    <!-- Meta Tags SEO -->
    <meta name="description" content="Hệ thống quét số điện thoại từ URL">
    <meta name="keywords" content="quét số điện thoại, quản lý URL, Phone Scraping System">
    <meta name="author" content="Your Name">
    <!-- JS -->
    <script src="<?php echo ASSETS_URL; ?>js/bootstrap.bundle.min.js" defer></script>
    <script src="<?php echo ASSETS_URL; ?>js/main.js" defer></script>
</head>
<body>
<header>
    <!-- Thông báo toàn hệ thống -->
    <?php if (!empty($global_message)): ?>
        <div class="alert alert-warning text-center mb-0" role="alert">
            <?php echo htmlspecialchars($global_message); ?>
        </div>
    <?php endif; ?>
    
    <!-- Thanh điều hướng -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>">Phone</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if ($is_logged_in): ?>
                        <!-- Hiển thị tên người dùng -->
                        <li class="nav-item">
                            <span class="navbar-text">Xin chào, <?php echo htmlspecialchars($username); ?></span>
                        </li>
                        <!-- Menu dành cho Admin -->
                        <?php if ($role == 1): ?>
                            <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'dashboard') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>admin/dashboard.php">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'users') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>admin/users.php">Quản lý người dùng</a></li>
                            <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'history') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>admin/history.php">Lịch sử quét</a></li>
                            <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'logs') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>admin/logs.php">Nhật ký</a></li>
                        <!-- Menu dành cho User -->
                        <?php elseif ($role == 2): ?>
                            <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'dashboard') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>user/dashboard.php">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'scraping') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>user/scraping.php">Quét URL</a></li>
                            <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'history') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>user/history.php">Lịch sử quét</a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>logout.php">Đăng xuất</a></li>
                    <?php else: ?>
                        <!-- Menu dành cho khách chưa đăng nhập -->
                        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>login.php">Đăng nhập</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>register.php">Đăng ký</a></li>
                    <?php endif; ?>
                    <!-- Nút chuyển chế độ tối -->
                    <li class="nav-item">
                        <button id="toggleDarkMode" class="btn btn-sm btn-outline-secondary">Chế độ tối</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <?php if ($breadcrumb): ?>
        <div class="container mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?php foreach ($breadcrumb as $name => $link): ?>
                        <?php if ($link): ?>
                            <li class="breadcrumb-item"><a href="<?php echo htmlspecialchars($link); ?>"><?php echo htmlspecialchars($name); ?></a></li>
                        <?php else: ?>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($name); ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ol>
            </nav>
        </div>
    <?php endif; ?>
</header>
<div class="container mt-4">