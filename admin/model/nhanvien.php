<?php
function themnhanvien($tennhanvien, $diachi, $sodienthoai, $email, $ngaysinh, $gioitinh, $chucvu, $username, $password)
{
    $conn = connectdb();
    try {
        $conn->beginTransaction();
        $sql_nhanvien = "INSERT INTO nhanvien (tennhanvien, diachi, sodienthoai, email, ngaysinh, gioitinh, chucvu) 
                         VALUES (:tennhanvien, :diachi, :sodienthoai, :email, :ngaysinh, :gioitinh, :chucvu)";
        $stmt_nhanvien = $conn->prepare($sql_nhanvien);
        $stmt_nhanvien->bindParam(':tennhanvien', $tennhanvien);
        $stmt_nhanvien->bindParam(':diachi', $diachi);
        $stmt_nhanvien->bindParam(':sodienthoai', $sodienthoai);
        $stmt_nhanvien->bindParam(':email', $email);
        $stmt_nhanvien->bindParam(':ngaysinh', $ngaysinh);
        $stmt_nhanvien->bindParam(':gioitinh', $gioitinh);
        $stmt_nhanvien->bindParam(':chucvu', $chucvu);
        $stmt_nhanvien->execute();
        $idnhanvien = $conn->lastInsertId();
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql_user = "INSERT INTO user (username, password, role) VALUES (:username, :password, :role)";
        $stmt_user = $conn->prepare($sql_user);
        $stmt_user->bindParam(':username', $username);
        $stmt_user->bindParam(':password', $hashed_password);
        $role = 1; 
        $stmt_user->bindParam(':role', $role);
        $stmt_user->execute();
        $conn->commit();
        echo "Thêm nhân viên và tài khoản thành công!";
    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Lỗi: " . $e->getMessage();
    }
}

function delnhanvien($idnhanvien)
{
    $conn = connectdb();
    try {
        $conn->beginTransaction();
        $sql_nhanvien = "DELETE FROM nhanvien WHERE idnhanvien = :idnhanvien";
        $stmt_nhanvien = $conn->prepare($sql_nhanvien);
        $stmt_nhanvien->bindParam(':idnhanvien', $idnhanvien, PDO::PARAM_INT);
        $stmt_nhanvien->execute();
        $sql_user = "DELETE FROM user WHERE username = (SELECT email FROM nhanvien WHERE idnhanvien = :idnhanvien)";
        $stmt_user = $conn->prepare($sql_user);
        $stmt_user->bindParam(':idnhanvien', $idnhanvien, PDO::PARAM_INT);
        $stmt_user->execute();
        $conn->commit();
        echo "Xóa nhân viên và tài khoản thành công!";
    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Lỗi: " . $e->getMessage();
    }
}

function getall_nhanvien()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM nhanvien");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function getonennhanvien($idnhanvien)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM nhanvien WHERE idnhanvien = :idnhanvien");
    $stmt->bindParam(':idnhanvien', $idnhanvien, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}
?>
