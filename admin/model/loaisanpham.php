<?php
include_once 'connectdb.php';


function themLoai($tenloai)
{
    $conn = connectdb(); 
    try {
        $sql = "INSERT INTO loaisanpham (tenloai) VALUES (:tenloai)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':tenloai', $tenloai, PDO::PARAM_STR);
        $stmt->execute(); 
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage(); 
    }
}



function updateLoai($idloaisp, $tenloai)
{
    $conn = connectdb();
    if ($conn) {
        $sql = "UPDATE loaisanpham SET tenloai = :tenloai WHERE idloaisp = :idloaisp";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':tenloai', $tenloai, PDO::PARAM_STR);
        $stmt->bindParam(':idloaisp', $idloaisp, PDO::PARAM_INT);
        $stmt->execute();
    }
}

function getoneLoai($idloaisp)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM loaisanpham WHERE idloaisp = :idloaisp");
    $stmt->bindParam(':idloaisp', $idloaisp, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}



function getall_Loai()
{
    $conn = connectdb(); 
    $stmt = $conn->prepare("SELECT * FROM loaisanpham");
    $stmt->execute();
    $kq = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    return $kq;
}
function delLoai($idloaisp)
{
    $conn = connectdb();
    if ($conn) {
        $sqlCheck = "SELECT COUNT(*) as count FROM sanpham WHERE idloaisp = :idloaisp";
        $stmtCheck = $conn->prepare($sqlCheck);
        $stmtCheck->bindParam(':idloaisp', $idloaisp, PDO::PARAM_INT);
        $stmtCheck->execute();
        $result = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            return "Không thể xóa vì loại sản phẩm này đang chứa sản phẩm.";
        } else {
            $sqlDelete = "DELETE FROM loaisanpham WHERE idloaisp = :idloaisp";
            $stmtDelete = $conn->prepare($sqlDelete);
            $stmtDelete->bindParam(':idloaisp', $idloaisp, PDO::PARAM_INT);
            $stmtDelete->execute();
            return "Xóa thành công.";
        }
    }
    return "Kết nối cơ sở dữ liệu thất bại.";
}


?>
