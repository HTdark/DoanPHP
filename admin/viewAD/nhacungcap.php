<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Nhà Cung Cấp</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Danh Sách Nhà Cung Cấp</h1>
        
        <!-- Thêm nhà cung cấp -->
        <a href="indexAD.php?act=addNCC" class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded-md mb-4 inline-block">Thêm Nhà Cung Cấp</a>

        <!-- Bảng danh sách nhà cung cấp -->
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr>
                    <th class="p-4 text-left border-b">#</th>
                    <th class="p-4 text-left border-b">Tên Nhà Cung Cấp</th>
                    <th class="p-4 text-left border-b">Địa Chỉ</th>
                    <th class="p-4 text-left border-b">Số Điện Thoại</th>
                    <th class="p-4 text-left border-b">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($nhacungcap): ?>
                    <?php foreach ($nhacungcap as $index => $ncc): ?>
                        <tr>
                            <td class="p-4 border-b"><?= $index + 1 ?></td>
                            <td class="p-4 border-b"><?= $ncc['tennhacungcap'] ?></td>
                            <td class="p-4 border-b"><?= $ncc['diachincc'] ?></td>
                            <td class="p-4 border-b"><?= $ncc['sdt'] ?></td>
                            <td class="p-4 border-b">
                                <a href="indexAD.php?act=updateNCC&idnhacungcap=<?= $ncc['idnhacungcap'] ?>" class="text-yellow-500 hover:text-yellow-700 mr-2">Sửa</a>
                                <a href="indexAD.php?act=delNCC&idnhacungcap=<?= $ncc['idnhacungcap'] ?>" class="text-red-500 hover:text-red-700" onclick="return confirm('Bạn có chắc chắn muốn xóa nhà cung cấp này?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">Không có nhà cung cấp nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
