<?php
function themkhachhang($tenkhachhang, $diachi, $sodienthoai, $email, $ngaysinh, $gioitinh)
{
    $conn = connectdb();
    $sql = "INSERT INTO khachhang (tenkhachhang, diachi, sodienthoai, email, ngaysinh, gioitinh) 
            VALUES (:tenkhachhang, :diachi, :sodienthoai, :email, :ngaysinh, :gioitinh)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':tenkhachhang', $tenkhachhang);
    $stmt->bindParam(':diachi', $diachi);
    $stmt->bindParam(':sodienthoai', $sodienthoai);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':ngaysinh', $ngaysinh);
    $stmt->bindParam(':gioitinh', $gioitinh);

    try {
        $stmt->execute();
        echo "Thêm khách hàng thành công!";
    } catch (PDOException $e) {
        echo "Lỗi thêm khách hàng: " . $e->getMessage();
    }
}

function delkhachhang($idkhachhang)
{
    $conn = connectdb();
    $sql = "DELETE FROM khachhang WHERE idkhachhang = :idkhachhang";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idkhachhang', $idkhachhang, PDO::PARAM_INT);

    try {
        $stmt->execute();
        echo "Xóa khách hàng thành công!";
    } catch (PDOException $e) {
        echo "Xóa thất bại: " . $e->getMessage();
    }
}

function updatekhachhang($idkhachhang, $tenkhachhang, $diachi, $sodienthoai, $email, $ngaysinh, $gioitinh)
{
    $conn = connectdb();
    $sql = "UPDATE khachhang 
            SET tenkhachhang = :tenkhachhang, diachi = :diachi, sodienthoai = :sodienthoai, 
                email = :email, ngaysinh = :ngaysinh, gioitinh = :gioitinh 
            WHERE idkhachhang = :idkhachhang";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idkhachhang', $idkhachhang, PDO::PARAM_INT);
    $stmt->bindParam(':tenkhachhang', $tenkhachhang);
    $stmt->bindParam(':diachi', $diachi);
    $stmt->bindParam(':sodienthoai', $sodienthoai);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':ngaysinh', $ngaysinh);
    $stmt->bindParam(':gioitinh', $gioitinh);

    try {
        $stmt->execute();
        echo "Cập nhật thông tin khách hàng thành công!";
    } catch (PDOException $e) {
        echo "Cập nhật thất bại: " . $e->getMessage();
    }
}

function getall_khachhang()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM khachhang");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function getonekhachhang($idkhachhang)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM khachhang WHERE idkhachhang = :idkhachhang");
    $stmt->bindParam(':idkhachhang', $idkhachhang, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}
?>
