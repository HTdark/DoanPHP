<?php
require_once 'SQL/connectDB.php';
require_once 'SQL/function.php';

$data = fetchAll('khachhang');
// Thêm dữ liệu
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $newData = [
        'tenkhachhang' => $_POST['tenkhachhang'],
        'diachi' => $_POST['diachi'],
        'sodienthoai' => $_POST['sodienthoai'],
        'email' => $_POST['email'],
        'ngaysinh' => $_POST['ngaysinh'], // Đảm bảo ngày sinh đúng định dạng (ví dụ: Y-m-d)
        'gioitinh' => $_POST['gioitinh'],
    ];
    if (insertData('khachhang', $newData)) {
        echo "Thêm dữ liệu thành công!";
    } else {
        echo "Thêm dữ liệu thất bại!";
    }
}

// Xóa dữ liệu
if (isset($_GET['delete_id'])) {
    if (deleteData('khachhang', 'idkhachhang', $_GET['delete_id'])) {
        echo "Xóa dữ liệu thành công!";
    } else {
        echo "Xóa dữ liệu thất bại!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý dữ liệu</title>
</head>
<body>
    <h1>Danh sách khách hàng</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row['idkhachhang'] ?></td>
            <td><?= $row['tenkhachhang'] ?></td>
            <td><?= $row['diachi'] ?></td>
            <td><?= $row['sodienthoai'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['ngaysinh'] ?></td>
            <td><?= $row['gioitinh'] ?></td>
            <td>
                <a href="?delete_id=<?= $row['idkhachhang'] ?>">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Thêm dữ liệu mới</h2>
    <form method="POST">
        <label for="tenkhachhang">Tên Khách Hàng:</label>
        <input type="text" name="tenkhachhang" id="tenkhachhang" required><br>
        <label for="diachi">Địa Chỉ:</label>
        <input type="text" name="diachi" id="diachi" required><br>
        <label for="sodienthoai">Số điện thoại:</label>
        <input type="text" name="sodienthoai" id="sodienthoai" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="ngaysinh">Ngày sinh (Y-m-d):</label>
        <input type="date" name="ngaysinh" id="ngaysinh" required><br>
        <label for="gioitinh">Giới tính:</label>
        <input type="text" name="gioitinh" id="gioitinh" required><br>
        <button type="submit" name="add">Thêm</button>
    </form>
</body>
</html>
