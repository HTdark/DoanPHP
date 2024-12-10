<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Quản Lý Sản Phẩm</title>
</head>

<body class="bg-gray-100">

    <div class="p-6">
        <!-- Dropdown lọc danh mục -->
        <div class="mb-4">
            <label for="filterCategory" class="block text-lg font-semibold mb-2">Chọn danh mục:</label>
            <select id="filterCategory" class="p-2 border rounded-md" onchange="filterProducts()">
                <option value="0">Tất cả danh mục</option>
                <?php
                if (isset($loai)) {
                    foreach ($loai as $item) {
                        echo '<option value="' . $item['idloaisp'] . '">' . $item['tenloai'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>

        <!-- Add Product Button -->
        <a href="indexAD.php?act=addsp" class="mb-4 inline-block px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
            Thêm mới
        </a>

        <!-- Product Table -->
        <table class="w-full mt-6 border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">STT</th>
                    <th class="border px-4 py-2">Tên Sản Phẩm</th>
                    <th class="border px-4 py-2">Hình Ảnh</th>
                    <th class="border px-4 py-2">Giá</th>
                    <th class="border px-4 py-2">Số Lượng</th>
                    <th class="border px-4 py-2">Loại Sản Phẩm</th>
                    <th class="border px-4 py-2">Nhà Cung Cấp</th>
                    <th class="border px-4 py-2">Hành Động</th>
                </tr>
            </thead>
            <tbody id="productTable">
                <?php
                if (isset($kq) && count($kq) > 0) {
                    $i = 1;
                    foreach ($kq as $sp) {
                        $loai_sp = getoneLoai($sp['idloaisp']);  
                        $ncc = getoneNCC($sp['idnhacungcap']);  

                        echo '<tr data-category="' . $sp['idloaisp'] . '">
                            <td class="border px-4 py-2">' . $i . '</td>
                            <td class="border px-4 py-2">' . $sp['tensp'] . '</td>
                            <td class="border px-4 py-2"><img src="' . $sp['hinhanhsp'] . '" class="w-16 h-16"></td>
                            <td class="border px-4 py-2">' . number_format($sp['giasp'], 0, ',', '.') . ' VND</td>
                            <td class="border px-4 py-2">' . $sp['soluong'] . '</td>
                            <td class="border px-4 py-2">' . $loai_sp['tenloai'] . '</td>
                            <td class="border px-4 py-2">' . $ncc['tennhacungcap'] . '</td>
                            <td class="border px-4 py-2">
                                <a href="indexAD.php?act=updatesp&idsp=' . $sp['idsp'] . '" class="text-blue-500 hover:underline">Sửa</a> | 
                                <a href="indexAD.php?act=delsp&idsp=' . $sp['idsp'] . '" class="text-red-500 hover:underline" onclick="return confirm(\'Bạn có chắc chắn muốn xóa sản phẩm này?\')">Xóa</a>
                            </td>
                        </tr>';
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function filterProducts() {
            const filterCategory = document.getElementById('filterCategory').value;
            const rows = document.querySelectorAll('#productTable tr');

            rows.forEach(row => {
                const category = row.getAttribute('data-category');
                row.style.display = (filterCategory === '0' || category === filterCategory) ? '' : 'none';
            });
        }
    </script>

</body>

</html>
