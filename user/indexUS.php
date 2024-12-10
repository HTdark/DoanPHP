<?php
$sanpham = LaySP();
$category = LayLoaiSP();
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
                foreach ($category as $item) {
                    ?>
                    <li><a href="user/productCate.php/<?php echo '?idloaisp =' . $item['idloaisp'] . ' '?>"><?php echo $item['tenloai'] ?></a></li>
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
    <div class="Middle-user">
        <div class="Banner">
            <img src="HinhAnh/banner/Banner.png" alt="banner">
        </div>
        <div class="Category">
            <span class="title">Category</span>
            <div class="list-category">
                <?php
                foreach ($category as $item) {
                    ?>
                    <div class="item-list-category">
                        <img src="HinhAnh/hinh ao/hinh1.jpg" alt="">
                        <p style="max-width:150px"><?php echo $item['tenloai'] ?></p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="Product">
            <div>
                <?php
                foreach ($category as $item) {
                    $spTheoCate = LaySPTheoCate($item['idloaisp']);
                    ?>
                    <div class="box-product-category-title">
                        <p class="product-category-title"><?php echo $item['tenloai'] ?></p>
                        <p>Xem tất cả >></p>
                    </div>
                    <div class="list-product-card">
                        <?php
                        foreach ($spTheoCate as $product) {
                            ?>
                            <div class="product-card">
                                <img src="HinhAnh/hinh ao/hinh1.jpg" alt="product">
                                <p><?php echo $product['tensp'] ?></p>
                                <p><?php echo $product['giasp'] ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    </div>
    <div class="Footer-user">

    </div>
</body>

</html>