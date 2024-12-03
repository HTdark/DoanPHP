<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

</head>

<body>
    <!-- Header -->
    <div class="container">
        <div class="header_menu">
            <ul>
                <li><a href="index.php">Trang Chủ</a></li>
                <li><a href="Trangshop/view/login.php">Best Sellers</a></li>
                <li><a href="Trangshop/view/login.php">Sản Phẩm</a></li>
                <li><a href="Trangshop/view/login.php">Dịch Vụ khách hàng</a></li>
            </ul>
        </div>
        <div class="GioHang-User">
            <ul>
                <li><a href="Trangshop/view/login.php">
                        <img src="HinhAnh/icon/ic_cart.png" alt="Giỏ Hàng" title="Giỏ Hàng">
                        <span class="GioHang">Giỏ Hàng</span></a>
                </li>
                <li><a href="Trangshop/view/login.php">
                        <img src="HinhAnh/icon/ic_user.png" alt="Người Dùng" title="Người Dùng">
                        <span class="User">Người Dùng</span></a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Thông tin shop -->
    <div class="infor">
        <h1>Thông tin về shop của chúng tôi</h1>
        <p>Chào mừng bạn đến với cửa hàng của chúng tôi!</p>
        <p>
            Tại đây, chúng tôi cam kết mang đến cho bạn những sản phẩm thời trang uy tín nhất,
            chất lượng cao nhất, được thiết kế đặc biệt để cung cấp cho phong cách sống của bạn.
        </p>
        <p>
            Cảm ơn bạn đã ghé thăm cửa hàng của chúng tôi. Chúng tôi rất mong
            được phục vụ bạn và giúp sự phát triển cách sống cá nhân của bạn.
        </p>
    </div>

    <!-- Carousel sản phẩm -->
    <div class="carousel-container">
        <button class="carousel-button carousel-button-left">‹</button>
        <div class="carousel-track-container">
        <ul class="carousel-track">
    <li class="SPitem">
        <img src="HinhAnh/hinh ao/hinh1.jpg" alt="Product 1">
        <h2>Áo Thun</h2>
        <p>100.000đ</p>
    </li>
    <li class="SPitem">
        <img src="HinhAnh/hinh ao/hinh2.jpg" alt="Product 2">
        <h2>Quần Jeans</h2>
        <p>200.000đ</p>
    </li>
    <li class="SPitem">
        <img src="HinhAnh/hinh ao/hinh3.jpg" alt="Product 3">
        <h2>Áo Khoác</h2>
        <p>300.000đ</p>
    </li>
    <li class="SPitem">
        <img src="HinhAnh/hinh ao/hinh4.jpg" alt="Product 4">
        <h2>Giày Sneaker</h2>
        <p>500.000đ</p>
    </li>
    <li class="SPitem">
        <img src="HinhAnh/hinh ao/hinh5.jpg" alt="Product 5">
        <h2>Áo Thể Thao</h2>
        <p>250.000đ</p>
    </li>
    <li class="SPitem">
        <img src="HinhAnh/hinh quần/hinhquan (5).jpg" alt="Product 5">
        <h2>Áo Thể Thao</h2>
        <p>250.000đ</p>
    </li>
    <li class="SPitem">
        <img src="HinhAnh/hinh túi/hinhtui (6).jpg" alt="Product 5">
        <h2>Áo Thể Thao</h2>
        <p>250.000đ</p>
    </li>
    <li class="SPitem">
        <img src="HinhAnh/hinhvo/hinhvo (2).jpg" alt="Product 5">
        <h2>Áo Thể Thao</h2>
        <p>250.000đ</p>
    </li>
</ul>

        </div>
        <button class="carousel-button carousel-button-right">›</button>
    </div>

    <!-- Footer -->
    <div class="footercontainer">
        <div class="contact-content">
            <h1>Liên Hệ Chúng Tôi</h1>
            <p>Page FB:..........</p>
            <p>Địa chỉ: Quận 8</p>
            <p>Điện thoại: 0123 456 789</p>
            <p>Email: example@example.com</p>
        </div>
    </div>

    <script src="carousel.js"></script>
</body>

</html>
