<?php
$dsn = 'mysql:host=localhost;dbname=shopphp;charset=utf8';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

// Truy vấn để lấy tất cả thông tin đơn hàng từ bảng "orders"
$query = $db->query("SELECT * FROM orders");
$orders = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Đơn Hàng</title>
    <link rel="stylesheet" href="TTDH.css">
</head>

<body>

    <div class="container">
    <div class="midAD">Đơn Hàng</div>
        <div class="order-list">
            <table class="table-style">
                <tr>
                    <th>ID</th>
                    <th>Tên Người Nhận</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                    <th>Tổng Tiền</th>
                    <th>Ngày Đặt Hàng</th>
                </tr>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?= $order['id'] ?></td>
                        <td><?= $order['tennguoinhan'] ?></td>
                        <td><?= $order['address'] ?></td>
                        <td><?= $order['phone'] ?></td>
                        <td><?= number_format($order['total'], 0, ',', '.') ?> VND</td>
                        <td><?= $order['dateorder'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

</body>

</html>
