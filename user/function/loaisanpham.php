<?php
//gọi connect database
// Hàm lấy danh sách loại sản phẩm
function LayLoaiSP() {
    global $pdo;
    $sql = "SELECT * FROM loaisanpham";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Hàm thêm loại sản phẩm
function ThemLoaiSP($tenloai) {
    global $pdo;
    $sql = "INSERT INTO loaisanpham (tenloai) VALUES (?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tenloai]);

    return $stmt->rowCount() ? "Loại sản phẩm đã được thêm thành công!" : "Lỗi: Không thể thêm loại sản phẩm.";
}

// Hàm sửa loại sản phẩm
function SuaLoaiSP($idloaisp, $tenloai) {
    global $pdo;
    $sql = "UPDATE loaisanpham 
            SET tenloai = ? 
            WHERE idloaisp = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tenloai, $idloaisp]);
    return $stmt->rowCount() ? "Loại sản phẩm đã được sửa thành công!" : "Lỗi: Không thể sửa loại sản phẩm.";
}

// Hàm xóa loại sản phẩm
function XoaLoaiSP($idloaisp) {
    global $pdo;
    $sql = "DELETE FROM loaisanpham WHERE idloaisp = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idloaisp]);

    return $stmt->rowCount() ? "Loại sản phẩm đã được xóa thành công!" : "Lỗi: Không thể xóa loại sản phẩm.";
}


?>