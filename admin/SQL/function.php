<?php
require_once 'connectDB.php';

// Hàm lấy danh sách dữ liệu từ bảng
function fetchAll($table) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM $table");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Hàm thêm dữ liệu
function insertData($table, $data) {
    global $pdo;
    $columns = implode(',', array_keys($data));
    $placeholders = ':' . implode(', :', array_keys($data));
    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}

// Hàm xóa dữ liệu
function deleteData($table, $whereColumn, $whereValue) {
    global $pdo;
    $sql = "DELETE FROM $table WHERE $whereColumn = :value";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['value' => $whereValue]);
}
?>
