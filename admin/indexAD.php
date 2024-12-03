<?php
include 'SQL/connectDB.php';
include 'SQL/function.php';
include 'giaodien/dashboard.php';
// Thêm sản phẩm
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    // Lấy thông tin từ form
    $tensp = $_POST['tensp'];
    $giasp = $_POST['giasp'];
    $hinhanhsp = $_POST['hinhanhsp'];
    $soluong = $_POST['soluong'];
    $idnhacungcap = $_POST['idnhacungcap'];
    $idloaisp = $_POST['loaisp'];

    // Gọi hàm thêm sản phẩm
    $message = ThemSP($tensp, $giasp, $hinhanhsp, $soluong, $idnhacungcap, $idloaisp);
    echo $message;
}

// Sửa sản phẩm
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_product'])) {
    // Lấy thông tin từ form
    $idsp = $_POST['idsp'];
    $tensp = $_POST['tensp'];
    $giasp = $_POST['giasp'];
    $hinhanhsp = $_POST['hinhanhsp'];
    $soluong = $_POST['soluong'];
    $idloaisp = $_POST['loaisp']; 

    // Gọi hàm sửa sản phẩm
    $message = SuaSP($idsp, $tensp, $giasp, $hinhanhsp, $soluong, $idloaisp);
    echo $message;
}

// Xóa sản phẩm
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product'])) {
    // Lấy thông tin từ form
    $idsp = $_POST['idsp'];

    // Gọi hàm xóa sản phẩm
    $message = XoaSP($idsp);
    echo $message;
}
?>
