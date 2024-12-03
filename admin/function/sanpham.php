<?php
//gọi connect database
include '../SQL/connectDB.php';

// Hàm lấy danh sách sản phẩm
function LaySP() {
    global $pdo;
    $sql = "SELECT * FROM sanpham";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Hàm thêm sản phẩm
function ThemSP($tensp, $giasp, $hinhanhsp, $soluong, $idnhacungcap, $loaisp) {
    global $pdo;
    $sql = "INSERT INTO sanpham (tensp, giasp, hinhanhsp, soluong, idnhacungcap, loaisp)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tensp, $giasp, $hinhanhsp, $soluong, $idnhacungcap, $loaisp]);

    return $stmt->rowCount() ? "Sản phẩm đã được thêm thành công!" : "Lỗi: Không thể thêm sản phẩm.";
}

// Hàm sửa sản phẩm
function SuaSP($idsp, $tensp, $giasp, $hinhanhsp, $soluong , $loaisp) {
    global $pdo;
    $sql = "UPDATE sanpham 
            SET tensp = ?, giasp = ?, hinhanhsp = ?, soluong = ? , loaisp = ?
            WHERE idsp = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tensp, $giasp, $hinhanhsp, $soluong, $idsp , $loaisp]);

    return $stmt->rowCount() ? "Sản phẩm đã được sửa thành công!" : "Lỗi: Không thể sửa sản phẩm.";
}

// Hàm xóa sản phẩm
function XoaSP($idsp) {
    global $pdo;
    $sql = "DELETE FROM sanpham WHERE idsp = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idsp]);

    return $stmt->rowCount() ? "Sản phẩm đã được xóa thành công!" : "Lỗi: Không thể xóa sản phẩm.";
}
