<?php
// Kiểm tra nếu có dữ liệu nhân viên
if (isset($kq) && count($kq) > 0) :
?>
    <h2 class="text-2xl font-semibold mb-4">Danh Sách Nhân Viên</h2>
    <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2 border-b">ID</th>
                <th class="px-4 py-2 border-b">Tên</th>
                <th class="px-4 py-2 border-b">Email</th>
                <th class="px-4 py-2 border-b">Điện thoại</th>
                <th class="px-4 py-2 border-b">Chức vụ</th>
                <th class="px-4 py-2 border-b">Ngày sinh</th>
                <th class="px-4 py-2 border-b">Giới Tính</th>
                <!-- <th class="px-4 py-2 border-b">Hành động</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kq as $nhanvien) : ?>
                <tr class="odd:bg-white even:bg-gray-50">
                    <td class="px-4 py-2 border-b"><?php echo $nhanvien['idnhanvien']; ?></td>
                    <td class="px-4 py-2 border-b"><?php echo $nhanvien['tennhanvien']; ?></td>
                    <td class="px-4 py-2 border-b"><?php echo $nhanvien['email']; ?></td>
                    <td class="px-4 py-2 border-b"><?php echo $nhanvien['sodienthoai']; ?></td>
                    <td class="px-4 py-2 border-b"><?php echo $nhanvien['chucvu']; ?></td>
                    <td class="px-4 py-2 border-b"><?php echo $nhanvien['ngaysinh']; ?></td>
                    <td class="px-4 py-2 border-b"><?php echo $nhanvien['gioitinh']; ?></td>
                    <!-- <td class="px-4 py-2 border-b">
                        <a href="?act=updateuser&iduser=<?php echo $nhanvien['idnhanvien']; ?>" class="text-blue-500 hover:text-blue-700">Sửa</a> |
                        <a href="?act=deluser&iduser=<?php echo $nhanvien['idnhanvien']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="text-red-500 hover:text-red-700">Xóa</a>
                    </td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="text-gray-500">Không có nhân viên nào trong hệ thống.</p>
<?php endif; ?>
