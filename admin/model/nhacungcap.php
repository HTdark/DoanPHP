<?php
function themNCC($tenncc, $diachincc, $sdt)
{
    try {
        $conn = connectdb();
        $sql = "INSERT INTO nhacungcap (tennhacungcap, diachincc, sdt) 
                VALUES (:tennhacungcap, :diachincc, :sdt)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':tennhacungcap' => $tenncc,
            ':diachincc' => $diachincc,
            ':sdt' => $sdt
        ]);
        echo "Nhà cung cấp đã được thêm thành công!";
    } catch (PDOException $e) {
        echo "Lỗi thêm nhà cung cấp: " . $e->getMessage();
    }
}

function getAllNCC()
{
    try {
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM nhacungcap");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Lỗi lấy danh sách nhà cung cấp: " . $e->getMessage();
    }
}

function capnhatNCC($idnhacungcap, $tenncc, $diachincc, $sdt)
{
    try {
        $conn = connectdb();
        $sql = "UPDATE nhacungcap 
                SET tennhacungcap = :tennhacungcap, diachincc = :diachincc, sdt = :sdt 
                WHERE idnhacungcap = :idnhacungcap";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':tennhacungcap' => $tenncc,
            ':diachincc' => $diachincc,
            ':sdt' => $sdt,
            ':idnhacungcap' => $idnhacungcap
        ]);
        echo "Cập nhật nhà cung cấp thành công!";
    } catch (PDOException $e) {
        echo "Lỗi cập nhật nhà cung cấp: " . $e->getMessage();
    }
}


function xoaNCC($idnhacungcap)
{
    try {
        $conn = connectdb();
        $sql = "DELETE FROM nhacungcap WHERE idnhacungcap = :idnhacungcap";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':idnhacungcap' => $idnhacungcap
        ]);
        echo "Nhà cung cấp đã được xóa thành công!";
    } catch (PDOException $e) {
        echo "Lỗi xóa nhà cung cấp: " . $e->getMessage();
    }
}
function getoneNCC($idnhacungcap)
{
    try {
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM nhacungcap WHERE idnhacungcap = :idnhacungcap");
        $stmt->execute([':idnhacungcap' => $idnhacungcap]);
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ncc = $stmt->fetch(); 
        return $ncc;
    } catch (PDOException $e) {
        echo "Lỗi lấy thông tin nhà cung cấp: " . $e->getMessage();
    }
}


?>
