<?php
// Gọi kết nối database và các hàm
include '../SQL/connectDB.php';
include '../function/sanpham.php';
include '../function/nhacungcap.php';
include '../function/loaisanpham.php';

// Lấy thông tin sản phẩm cần sửa
if (isset($_GET['idsp'])) {
    $idsp = $_GET['idsp'];
    $sql = "SELECT * FROM sanpham WHERE idsp = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idsp]);
    $sanpham = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Xử lý sửa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    $message = SuaSP(
        $_POST['idsp'],
        $_POST['tensp'],
        $_POST['giasp'],
        $_POST['hinhanhsp'],
        $_POST['soluong'],
        $_POST['loaisp']
    );
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sản Phẩm</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Sửa Sản Phẩm</h1>
            <a href="sanpham.php" class="text-sm text-gray-300 hover:text-white">Quay lại</a>
        </div>
    </header>

    <main class="container mx-auto mt-6 p-4 bg-white rounded shadow">
        <?php if (isset($message)): ?>
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <form action="edit_product.php" method="POST" class="grid grid-cols-3 gap-4">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="idsp" value="<?= $sanpham['idsp'] ?>">

            <input type="text" name="tensp" value="<?= $sanpham['tensp'] ?>" placeholder="Tên sản phẩm" class="p-2 border border-gray-300 rounded focus:outline-none" required>
            <input type="number" name="giasp" value="<?= $sanpham['giasp'] ?>" placeholder="Giá sản phẩm" class="p-2 border border-gray-300 rounded focus:outline-none" required>
            <input type="text" name="hinhanhsp" value="<?= $sanpham['hinhanhsp'] ?>" placeholder="Hình ảnh (URL)" class="p-2 border border-gray-300 rounded focus:outline-none">
            <input type="number" name="soluong" value="<?= $sanpham['soluong'] ?>" placeholder="Số lượng" class="p-2 border border-gray-300 rounded focus:outline-none" required>
            <input type="number" name="loaisp" value="<?= $sanpham['loaisp'] ?>" placeholder="Loại sản phẩm" class="p-2 border border-gray-300 rounded focus:outline-none" required>
            <button type="submit" class="col-span-3 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Cập nhật</button>
        </form>
    </main>
</body>
</html>
