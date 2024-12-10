<?php
function themSP($idloaisp, $idnhacungcap, $tensp, $hinhanh, $gia, $soluong) {
    $conn = connectdb();
    $sql = "INSERT INTO sanpham (idloaisp, idnhacungcap, tensp, hinhanhsp, giasp, soluong) 
            VALUES (:idloaisp, :idnhacungcap, :tensp, :hinhanh, :gia, :soluong)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idloaisp', $idloaisp);
    $stmt->bindParam(':idnhacungcap', $idnhacungcap);
    $stmt->bindParam(':tensp', $tensp);
    $stmt->bindParam(':hinhanh', $hinhanh);
    $stmt->bindParam(':gia', $gia);
    $stmt->bindParam(':soluong', $soluong);

    return $stmt->execute();
}

function capnhatSP($idsp, $idloaisp, $idnhacungcap, $tensp, $hinhanh, $gia, $soluong) {
    $conn = connectdb();
    $sql = "UPDATE sanpham SET idloaisp = :idloaisp, idnhacungcap = :idnhacungcap, tensp = :tensp, 
            hinhanhsp = :hinhanh, giasp = :gia, soluong = :soluong WHERE idsp = :idsp";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idloaisp', $idloaisp);
    $stmt->bindParam(':idnhacungcap', $idnhacungcap);
    $stmt->bindParam(':tensp', $tensp);
    $stmt->bindParam(':hinhanh', $hinhanh);
    $stmt->bindParam(':gia', $gia);
    $stmt->bindParam(':soluong', $soluong);
    $stmt->bindParam(':idsp', $idsp);

    return $stmt->execute();
}

function xoaSP($idsp) {
    $conn = connectdb();
    $sql = "DELETE FROM sanpham WHERE idsp = :idsp";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idsp', $idsp);

    return $stmt->execute();
}

function getall_sp() {
    $conn = connectdb();
    $sql = "SELECT * FROM sanpham";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getoneSP($idsp) {
    try {
        $conn = connectdb();
        $sql = "SELECT * FROM sanpham WHERE idsp = :idsp";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idsp', $idsp);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return "Lỗi lấy thông tin sản phẩm: " . $e->getMessage();
    }
}
function getSPtheoLoai($idloaisp)
{
    $conn = connectdb();
    $sql = "SELECT * FROM sanpham WHERE idloaisp = :idloaisp";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idloaisp', $idloaisp, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>
