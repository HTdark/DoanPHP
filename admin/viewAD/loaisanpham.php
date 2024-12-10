
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Quản Lý Loại Sản Phẩm</h2>

    <form action="indexAD.php?act=addLoai" method="POST" class="mb-6">
    <div class="flex space-x-4">
        <input type="text" name="tenloai" placeholder="Tên loại sản phẩm" required class="px-4 py-2 border rounded w-1/2">
        <button type="submit" name="them" class="px-4 py-2 bg-blue-500 text-white rounded">Thêm mới</button>
    </div>
</form>
<?php if (!empty($message)) : ?>
    <div class="alert alert-info">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

    <table class="min-w-full bg-white border border-gray-300 shadow-md rounded">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">#</th>
                <th class="px-4 py-2 text-left">Tên Loại Sản Phẩm</th>
                <th class="px-4 py-2 text-left">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($kq) : ?>
                <?php foreach ($kq as $index => $loai) : ?>
                    <tr>
                        <td class="px-4 py-2"><?= $index + 1 ?></td>
                        <td class="px-4 py-2"><?= $loai['tenloai'] ?></td>
                        <td class="px-4 py-2">
                            <a href="indexAD.php?act=updateformLoai&idloaisp=<?= $loai['idloaisp'] ?>" >Cập nhật</a> |
                            <a href="indexAD.php?act=delLoai&idloaisp=<?= $loai['idloaisp'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa loại sản phẩm này?')" >Xóa</a>
                        
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" class="px-4 py-2 text-center">Chưa có loại sản phẩm nào!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
