<?php
session_start();
include 'config.php';

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Phân biệt vai trò của người dùng
$is_admin = isset($_SESSION['role']) && $_SESSION['role'] == 1; // Role 1 là Admin
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                <div class="position-sticky">
                    <div class="sidebar-heading text-white text-center py-4"><strong>MENU</strong></div>
                    <ul class="nav flex-column">
                        <?php if ($is_admin): ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php">Quản lý người dùng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="admin/history.php">Lịch sử hoạt động</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="logout.php">Đăng xuất</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php">Bảng điều khiển</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="user/scraping.php">Quét URL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="user/history.php">Lịch sử quét</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="logout.php">Đăng xuất</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
            <!-- /Sidebar -->

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container py-5">
                    <?php if ($is_admin): ?>
                        <!-- Giao diện Admin -->
                        <h1 class="text-center text-danger mb-4">Bảng điều khiển quản trị viên</h1>
                        <div class="card mx-auto shadow" style="max-width: 800px;">
                            <div class="card-body">
                                <h5 class="card-title text-center">Quản lý người dùng</h5>
                                <p class="card-text text-center">Theo dõi và quản lý các tài khoản trên hệ thống.</p>
                                <div class="text-center">
                                    <a href="admin/users.php" class="btn btn-primary px-4">Quản lý người dùng</a>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Giao diện User -->
                        <h1 class="text-center text-primary mb-4">Bảng điều khiển người dùng</h1>
                        <div class="card mx-auto shadow" style="max-width: 800px;">
                            <div class="card-body">
                                <h5 class="card-title text-center">Chào mừng đến với Phone Scraping System</h5>
                                <p class="card-text text-center">Hệ thống hỗ trợ quét và quản lý số điện thoại từ các nguồn trực tuyến một cách dễ dàng và hiệu quả.</p>
                                <div class="text-center">
                                    <a href="user/scraping.php" class="btn btn-primary px-4">Bắt đầu quét</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </main>
            <!-- /Main Content -->
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>