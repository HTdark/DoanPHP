<?php
// Kiểm tra nếu 'idsp' được truyền từ URL
if (isset($_GET['idsp'])) {
    $idsp = $_GET['idsp'];

    // Gọi hàm lấy thông tin sản phẩm từ cơ sở dữ liệu
    $sp = getoneSP($idsp);

    // Kiểm tra nếu sản phẩm tồn tại
    if (!$sp) {
        echo "Sản phẩm không tồn tại.";
        exit();
    }

    // Lấy danh sách loại sản phẩm và nhà cung cấp
    $loai = getall_Loai(); 
    $nhacungcap = getAllNCC(); 
} else {
    echo "Không có mã sản phẩm.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Cập Nhật Sản Phẩm</title>
</head>

<body class="bg-gray-100">

    <div class="p-6">
        <h1 class="text-2xl font-semibold mb-4">Cập Nhật Sản Phẩm</h1>

        <form action="indexAD.php?act=updatesp" method="POST" enctype="multipart/form-data">
            <label for="idsp" class="block text-lg font-semibold mb-2">Mã Sản Phẩm:</label>
            <input type="text" id="idsp" name="idsp" value="<?php echo $sp['idsp']; ?>" class="p-2 border rounded-md w-full mb-4" readonly>

            <!-- Tên Sản Phẩm -->
            <label for="tensp" class="block text-lg font-semibold mb-2">Tên Sản Phẩm:</label>
            <input type="text" id="tensp" name="tensp" value="<?php echo $sp['tensp']; ?>" class="p-2 border rounded-md w-full mb-4" required>

            <!-- Loại Sản Phẩm -->
            <label for="idloaisp" class="block text-lg font-semibold mb-2">Danh Mục:</label>
            <select id="idloaisp" name="idloaisp" class="p-2 border rounded-md w-full mb-4" required>
                <?php foreach ($loai as $item) { ?>
                    <option value="<?php echo $item['idloaisp']; ?>" <?php if ($item['idloaisp'] == $sp['idloaisp']) echo 'selected'; ?>>
                        <?php echo $item['tenloai']; ?>
                    </option>
                <?php } ?>
            </select>

            <!-- Nhà Cung Cấp -->
            <label for="idnhacungcap" class="block text-lg font-semibold mb-2">Nhà Cung Cấp:</label>
            <select id="idnhacungcap" name="idnhacungcap" class="p-2 border rounded-md w-full mb-4" required>
                <?php foreach ($nhacungcap as $ncc) { ?>
                    <option value="<?php echo $ncc['idnhacungcap']; ?>" <?php if ($ncc['idnhacungcap'] == $sp['idnhacungcap']) echo 'selected'; ?>>
                        <?php echo $ncc['tennhacungcap']; ?>
                    </option>
                <?php } ?>
            </select>

            <!-- Giá -->
            <label for="gia" class="block text-lg font-semibold mb-2">Giá:</label>
            <input type="number" id="gia" name="gia" value="<?php echo $sp['giasp']; ?>" class="p-2 border rounded-md w-full mb-4" required>

            <!-- Số Lượng -->
            <label for="soluong" class="block text-lg font-semibold mb-2">Số Lượng:</label>
            <input type="number" id="soluong" name="soluong" value="<?php echo $sp['soluong']; ?>" class="p-2 border rounded-md w-full mb-4" required>

            <!-- Hình Ảnh -->
            <label for="hinh" class="block text-lg font-semibold mb-2">Hình Ảnh:</label>
            <input type="file" id="hinh" name="hinh" class="p-2 border rounded-md w-full mb-4">
            <img src="<?php echo $sp['hinhanhsp']; ?>" alt="Product Image" class="w-32 h-32 mt-2 mb-4">

            <!-- Nút Cập Nhật -->
            <button type="submit" name="capnhat" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                Cập Nhật
            </button>
        </form>
    </div>

</body>

</html>
