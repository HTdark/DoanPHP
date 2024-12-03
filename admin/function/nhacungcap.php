<?php
//gọi connect database
include '../SQL/connectDB.php';
// Hàm lấy danh sách nhà cung cấp
function LayNCC() {
    global $pdo;
    $sql = "SELECT * FROM nhacungcap";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Hàm thêm nhà cung cấp
function ThemNCC($tenncc, $diachincc, $sdt) {
    global $pdo;
    $sql = "INSERT INTO nhacungcap (tennhacungcap, diachincc, sdt)
            VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tenncc, $diachincc, $sdt]);

    return $stmt->rowCount() ? "Nhà cung cấp đã được thêm thành công!" : "Lỗi: Không thể thêm nhà cung cấp.";
}

// Hàm sửa nhà cung cấp
function SuaNCC($idncc, $tenncc, $diachincc, $sdt) {
    global $pdo;
    $sql = "UPDATE nhacungcap 
            SET tennhacungcap = ?, diachincc = ?, sdt = ? 
            WHERE idnhacungcap = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tenncc, $diachincc, $sdt, $idncc]);

    return $stmt->rowCount() ? "Nhà cung cấp đã được sửa thành công!" : "Lỗi: Không thể sửa nhà cung cấp.";
}

// Hàm xóa nhà cung cấp
function XoaNCC($idncc) {
    global $pdo;
    $sql = "DELETE FROM nhacungcap WHERE idnhacungcap = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idncc]);

    return $stmt->rowCount() ? "Nhà cung cấp đã được xóa thành công!" : "Lỗi: Không thể xóa nhà cung cấp.";
}


?>