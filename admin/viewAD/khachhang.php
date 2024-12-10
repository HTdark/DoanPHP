<?php
// Kiểm tra nếu có dữ liệu khách hàng
if (isset($kq) && count($kq) > 0) :
?>
    <h2 class="text-2xl font-bold text-center mb-4">Danh Sách Khách Hàng</h2>
    <div class="overflow-x-auto">
        <table class="table-auto border-collapse border border-gray-200 w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Tên</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Điện thoại</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Địa chỉ</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Ngày sinh</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Giới Tính</th>
                    <!-- <th class="border border-gray-300 px-4 py-2 text-left">Hành động</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kq as $khachhang) : ?>
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-2"><?php echo $khachhang['idkhachhang']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $khachhang['tenkhachhang']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $khachhang['email']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $khachhang['sodienthoai']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $khachhang['diachi']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $khachhang['ngaysinh']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $khachhang['gioitinh']; ?></td>
                        <!-- <td class="border border-gray-300 px-4 py-2">
                            <a href="?act=updateuser&iduser=<?php echo $khachhang['idkhachhang']; ?>" class="text-blue-600 hover:underline">Sửa</a> |
                            <a href="?act=deluser&iduser=<?php echo $khachhang['idkhachhang']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                        </td> -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <p class="text-center text-gray-500">Không có khách hàng nào trong hệ thống.</p>
<?php endif; ?>
