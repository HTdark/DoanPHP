<?php
function themuser($username, $password, $role)
{
    $conn = connectdb();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (username, password, role) VALUES (:username, :password, :role)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashed_password); 
    $stmt->bindParam(':role', $role);
    try {
        $stmt->execute();
        echo "Thêm người dùng thành công!";
    } catch (PDOException $e) {
        echo "Lỗi thêm người dùng: " . $e->getMessage();
    }
}

function updateuser($iduser, $username, $password, $role)
{
    $conn = connectdb();
    $sql = "UPDATE user SET username = :username, role = :role";
    if (!empty($password)) {
        $sql .= ", password = :password";
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); 
    }

    $sql .= " WHERE iduser = :iduser";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':iduser', $iduser, PDO::PARAM_INT);
    $stmt->bindParam(':username', $username);
    if (!empty($password)) {
        $stmt->bindParam(':password', $hashed_password);
    }
    $stmt->bindParam(':role', $role);

    try {
        $stmt->execute();
        echo "Cập nhật thành công!";
    } catch (PDOException $e) {
        echo "Cập nhật thất bại: " . $e->getMessage();
    }
}


function getall_user()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM user");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function getoneuser($iduser)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM user WHERE iduser = :iduser");
    $stmt->bindParam(':iduser', $iduser, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetch();
    return $kq;
}

function deluser($iduser)
{
    $conn = connectdb();
    $sql = "DELETE FROM user WHERE iduser = :iduser";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':iduser', $iduser, PDO::PARAM_INT);
    try {
        $stmt->execute();
        echo "Xóa người dùng thành công!";
    } catch (PDOException $e) {
        echo "Lỗi khi xóa người dùng: " . $e->getMessage();
    }
}


function checkuser($username, $password)
{
    $conn = connectdb();
    
    try {
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $user = $stmt->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user['role']; 
            } else {
                return 0; 
            }
        } else {
            return 0;
        }

    } catch (PDOException $e) {
        error_log("Error: " . $e->getMessage());
        return 0;
    }
}

?>
