<?php
// Include các file mô hình
include_once 'model/loaisanpham.php';
include_once 'model/nhacungcap.php';

// Lấy danh sách loại sản phẩm và nhà cung cấp
$loai = getall_Loai(); 
$nhacungcapList = getAllNCC();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Thêm Sản Phẩm</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Thêm Sản Phẩm Mới</h2>
        <form action="indexAD.php?act=addsp" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
            
            <!-- Chọn danh mục -->
            <label class="block text-sm font-medium">Chọn danh mục:</label>
            <select name="idloaisp" class="w-full p-2 mb-4 border rounded-md" required>
                <option value="0">Chọn danh mục</option>
                <?php
                if ($loai) {
                    foreach ($loai as $item) {
                        echo '<option value="' . $item['idloaisp'] . '">' . $item['tenloai'] . '</option>';
                    }
                }
                ?>
            </select>

            <!-- Chọn nhà cung cấp -->
            <label class="block text-sm font-medium">Chọn nhà cung cấp:</label>
            <select name="idnhacungcap" class="w-full p-2 mb-4 border rounded-md" required>
                <option value="0">Chọn nhà cung cấp</option>
                <?php
                if ($nhacungcapList) {
                    foreach ($nhacungcapList as $supplier) {
                        echo '<option value="' . $supplier['idnhacungcap'] . '">' . $supplier['tennhacungcap'] . '</option>';
                    }
                } else {
                    echo '<option value="0">Không có nhà cung cấp nào</option>';
                }
                ?>
            </select>

            <!-- Tên sản phẩm -->
            <label class="block text-sm font-medium">Tên sản phẩm:</label>
            <input type="text" name="tensp" class="w-full p-2 mb-4 border rounded-md" required>

            <!-- Ảnh sản phẩm -->
            <label class="block text-sm font-medium">Chọn ảnh sản phẩm:</label>
            <input type="file" name="hinh" class="w-full p-2 mb-4 border rounded-md" required>
            
            <!-- Thông báo lỗi khi tải ảnh không hợp lệ -->
            <?php
            if (isset($uploadOk) && ($uploadOk == 0)) {
                echo "<div class='text-red-500'>Chỉ chấp nhận JPG, JPEG, PNG, GIF. Vui lòng chọn lại!</div>";
            }
            ?>

            <!-- Giá sản phẩm -->
            <label class="block text-sm font-medium">Giá sản phẩm:</label>
            <input type="text" name="gia" class="w-full p-2 mb-4 border rounded-md" required>

            <!-- Số lượng sản phẩm -->
            <label class="block text-sm font-medium">Số lượng:</label>
            <input type="text" name="soluong" class="w-full p-2 mb-4 border rounded-md" required>

            <!-- Nút thêm sản phẩm -->
            <input type="submit" name="themmoi" value="Thêm Mới" class="w-full py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition">
        </form>
    </div>
</body>

</html>
