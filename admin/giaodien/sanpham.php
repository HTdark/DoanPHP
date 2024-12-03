<?php
// Gọi kết nối database và các hàm
include '../SQL/connectDB.php';
include '../function/sanpham.php';
include '../function/nhacungcap.php';
include '../function/loaisanpham.php';

// Xử lý thêm sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $message = ThemSP(
        $_POST['tensp'],
        $_POST['giasp'],
        $_POST['hinhanhsp'],
        $_POST['soluong'],
        $_POST['idnhacungcap'],
        $_POST['loaisp']
    );
}

// Xử lý xóa sản phẩm
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['idsp'])) {
    $message = XoaSP($_GET['idsp']);
}

// Lấy danh sách sản phẩm
$sanpham = LaySP();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Quản Lý Sản Phẩm</h1>
            <a href="dashboard.php" class="text-sm text-gray-300 hover:text-white">Quay lại Dashboard</a>
        </div>
    </header>

    <!-- Main -->
    <main class="container mx-auto mt-6 p-4 bg-white rounded shadow">
        <?php if (isset($message)): ?>
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <!--Thêm Sản Phẩm -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Thêm Sản Phẩm</h2>
            <form action="sanpham.php" method="POST" class="grid grid-cols-3 gap-4">
                <input type="hidden" name="action" value="add">
                <input 
                    type="text" 
                    name="tensp" 
                    placeholder="Tên sản phẩm" 
                    class="p-2 border border-gray-300 rounded focus:outline-none"
                    required
                >
                <input 
                    type="number" 
                    name="giasp" 
                    placeholder="Giá sản phẩm" 
                    class="p-2 border border-gray-300 rounded focus:outline-none"
                    required
                >
                <input 
                    type="text" 
                    name="hinhanhsp" 
                    placeholder="Hình ảnh (URL)" 
                    class="p-2 border border-gray-300 rounded focus:outline-none"
                >
                <input 
                    type="number" 
                    name="soluong" 
                    placeholder="Số lượng" 
                    class="p-2 border border-gray-300 rounded focus:outline-none"
                    required
                >
                <input 
                    type="number" 
                    name="idnhacungcap" 
                    placeholder="ID Nhà cung cấp" 
                    class="p-2 border border-gray-300 rounded focus:outline-none"
                    required
                >
                <input 
                    type="text" 
                    name="loaisp" 
                    placeholder="Loại sản phẩm" 
                    class="p-2 border border-gray-300 rounded focus:outline-none"
                >
                <button 
                    type="submit" 
                    class="col-span-3 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
                >
                    Thêm
                </button>
            </form>
        </div>

        <!-- Danh sách sản phẩm -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Danh Sách Sản Phẩm</h2>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2 text-left">ID</th>
                        <th class="border border-gray-300 p-2 text-left">Tên Sản Phẩm</th>
                        <th class="border border-gray-300 p-2 text-left">Giá</th>
                        <th class="border border-gray-300 p-2 text-left">Số Lượng</th>
                        <th class="border border-gray-300 p-2 text-left">Loại SP</th>
                        <th class="border border-gray-300 p-2 text-center">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sanpham as $sp): ?>
                        <tr>
                            <td class="border border-gray-300 p-2"><?= $sp['idsp'] ?></td>
                            <td class="border border-gray-300 p-2"><?= $sp['tensp'] ?></td>
                            <td class="border border-gray-300 p-2"><?= $sp['giasp'] ?></td>
                            <td class="border border-gray-300 p-2"><?= $sp['soluong'] ?></td>
                            <td class="border border-gray-300 p-2"><?= $sp['loaisp'] ?></td>
                            <td class="border border-gray-300 p-2 text-center">
                                <a href="edit_product.php?idsp=<?= $sp['idsp'] ?>" class="text-blue-500 hover:underline">Sửa</a> |
                                <a href="sanpham.php?action=delete&idsp=<?= $sp['idsp'] ?>" class="text-red-500 hover:underline">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
