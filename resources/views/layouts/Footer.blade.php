<footer class="footer mt-5">
    <div class="container footer-container">
        <div class="footer-section">
            <h5 onclick="toggleFooterContent(this)">THÔNG TIN <i class="fas fa-plus d-lg-none"></i></h5>
            <div class="footer-content">
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>
        </div>
        <hr class="d-lg-none">
        <div class="footer-section">
            <h5 onclick="toggleFooterContent(this)">HỖ TRỢ <i class="fas fa-plus d-lg-none"></i></h5>
            <div class="footer-content">
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>
        </div>
        <hr class="d-lg-none">
        <div class="footer-section">
            <h5 onclick="toggleFooterContent(this)">HƯỚNG DẪN <i class="fas fa-plus d-lg-none"></i></h5>
            <div class="footer-content">
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>
        </div>
        <hr class="d-lg-none">
        <div class="footer-section">
            <h5 onclick="toggleFooterContent(this)">CHÍNH SÁCH <i class="fas fa-plus d-lg-none"></i></h5>
            <div class="footer-content">
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>
        </div>
        <hr class="d-lg-none">
        <div class="footer-section">
            <h5>LIÊN HỆ</h5>
            <div class="footer-content open">
                <ul class="contact-info">
                    <li><i class="fas fa-map-marker-alt"></i> 230 buldalasa new york</li>
                    <li><i class="fas fa-phone"></i> 1900 9999</li>
                    <li><i class="fas fa-envelope"></i> support@gmail.com</li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script>
    function toggleFooterContent(element) {
        const footerContent = element.nextElementSibling;
        const icons = element.firstElementChild;
        if (footerContent.classList.contains('open')) {
            footerContent.classList.remove('open');
            icons.classList.remove('fa-minus');
            icons.classList.add('fa-plus');
        } else {
            footerContent.classList.add('open'); 
            icons.classList.remove('fa-plus');
            icons.classList.add('fa-minus');
        }
    }
</script>
