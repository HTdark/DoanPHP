<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <!-- Link to Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Link to FontAwesome CDN for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-gray-800 text-white p-4">
        <h2 class="text-xl text-center font-bold">WEB ADMIN</h2>
        <nav class="flex justify-center space-x-4 mt-4">
            <!-- Trang chủ -->
            <a href="indexAD.php" class="flex items-center text-white hover:bg-gray-700 px-4 py-2 rounded">
                <i class="fas fa-home mr-2"></i>Trang Chủ
            </a>
            <!-- Loại sản phẩm -->
            <a href="indexAD.php?act=loaisanpham" class="flex items-center text-white hover:bg-gray-700 px-4 py-2 rounded">
                <i class="fas fa-cogs mr-2"></i>Loại Sản Phẩm
            </a>
            <!-- Sản phẩm -->
            <a href="indexAD.php?act=sanpham" class="flex items-center text-white hover:bg-gray-700 px-4 py-2 rounded">
                <i class="fas fa-box-open mr-2"></i>Sản phẩm
            </a>
            <!-- Nhà Cung Cấp-->
            <a href="indexAD.php?act=nhacungcap" class="flex items-center text-white hover:bg-gray-700 px-4 py-2 rounded">
                <i class="fas fa-truck mr-2"></i>Nhà Cung Cấp  
            </a> 

            <!-- Khách hàng -->
            <a href="indexAD.php?act=khachhang" class="flex items-center text-white hover:bg-gray-700 px-4 py-2 rounded">
                <i class="fas fa-users mr-2"></i>Khách Hàng
            </a>
            <!-- Nhân viên-->
            <a href="indexAD.php?act=nhanvien" class="flex items-center text-white hover:bg-gray-700 px-4 py-2 rounded">
                <i class="fas fa-id-badge mr-2"></i>Nhân Viên
            </a> 
            <!-- Đơn hàng-->
            <a href="indexAD.php?act=donhang" class="flex items-center text-white hover:bg-gray-700 px-4 py-2 rounded">
                <i class="fas fa-shopping-cart mr-2"></i>Đơn hàng
            </a> 

            <!-- Logout -->
            <a href="indexAD.php?act=thoat" class="flex items-center text-white hover:bg-gray-700 px-4 py-2 rounded">
                <i class="fas fa-sign-out-alt mr-2"></i>LOGOUT
            </a>
        </nav>
    </header>
</body>
</html>
