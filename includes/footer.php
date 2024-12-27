</div> <!-- Kết thúc div.container mở trong header.php -->
<footer class="bg-light text-center py-4 mt-5">
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> <strong>Phone Scraping System</strong>. All rights reserved.</p>
        <p>Designed and developed by <a href="mailto:your-email@example.com">Your Name</a></p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Chính sách bảo mật</a></li>
            <li class="list-inline-item"><a href="#">Điều khoản sử dụng</a></li>
            <li class="list-inline-item"><a href="#">Liên hệ</a></li>
        </ul>
    </div>
</footer>
<script src="<?php echo ASSETS_URL; ?>js/bootstrap.bundle.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>js/main.js"></script>
<script>
    // Dark mode toggle logic
    document.addEventListener('DOMContentLoaded', function () {
        const toggleDarkMode = document.getElementById('toggleDarkMode');
        if (localStorage.getItem('darkMode') === 'enabled') {
            document.body.classList.add('dark-mode');
        }
        toggleDarkMode?.addEventListener('click', function () {
            document.body.classList.toggle('dark-mode');
            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('darkMode', 'enabled');
            } else {
                localStorage.removeItem('darkMode');
            }
        });
    });
</script>
</body>
</html>