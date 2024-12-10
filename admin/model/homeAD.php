<?php
// Hàm đếm số lượng sản phẩm
function count_products() {
    $conn = connectdb();
    $sql = "SELECT COUNT(*) FROM sanpham";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}

// Hàm đếm số lượng khách hàng
function count_customers() {
    $conn = connectdb();
    $sql = "SELECT COUNT(*) FROM khachhang";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}

// Hàm đếm số lượng nhà cung cấp
function count_suppliers() {
    $conn = connectdb();
    $sql = "SELECT COUNT(*) FROM nhacungcap";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}

// Hàm đếm số lượng nhân viên
function count_employees() {
    $conn = connectdb();
    $sql = "SELECT COUNT(*) FROM nhanvien";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
?>