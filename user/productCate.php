<?php 
    include './function/loaisanpham.php';
    $category1 = LayLoaiSP();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    
    <div class="Header-user">
        <div class="Header-logo">
            <img src="HinhAnh/logo/bannerBearbia.png" alt="logo" />
        </div>
        <div class="Header-navbar">
            <ul>
                <li>Trang chủ</li>
                <?php
                foreach ($category1 as $item) {
                    ?>
                    <li><a href="productCate.php<?php echo '?idloaisp =' . $item['idloaisp'] . ' '?>"><?php echo $item['tenloai'] ?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="Header-action">
            <div class="Action-search">
                <input type="text" placeholder="Search">
                <img src="HinhAnh/icon/search.png" alt="search">
            </div>
            <img style="margin-left: -30px" src="HinhAnh/icon/cart.png" alt="cart">
            <img src="HinhAnh/icon/user.png" alt="user">
        </div>
    </div>
</body>
</html>