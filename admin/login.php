<?php
session_start();
ob_start();
include "model/connectdb.php";
include "model/user.php";
// sdafasdfdasfsadf
if ((isset($_POST['dangnhap'])) && ($_POST['dangnhap'])) {
    $user = trim($_POST['user']); 
    $pass = trim($_POST['pass']);

    if ($user == "" || $pass == "") {
        $txt_erro = "Vui lòng không để trống tên đăng nhập hoặc mật khẩu.";
    } else {
        $role = checkuser($user, $pass); 
        if ($role != 1) { 
            $_SESSION['user'] = $user; 
            $_SESSION['role'] = $role; 
            header('location:indexAD.php'); 
            exit();
        } elseif ($role == 1) {
            $txt_erro = "Sai mật khẩu hoặc tài khoản không hợp lệ.";
        } else {
            $txt_erro = "Bạn không có quyền truy cập vào trang quản trị.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="viewAD/styleAD.css">
    <script>
        function validateForm() {
            const user = document.forms["loginForm"]["user"].value.trim();
            const pass = document.forms["loginForm"]["pass"].value.trim();

            if (user === "" || pass === "") {
                alert("Vui lòng không để trống tên đăng nhập hoặc mật khẩu.");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <div class="midAD">
        <h2>LOGIN-ADMIN</h2>
        <form name="loginForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm()">
            <input type="text" name="user" placeholder="Tên đăng nhập" autofocus>
            <input type="password" name="pass" placeholder="Mật khẩu">
            <input type="submit" name="dangnhap" value="Đăng nhập">
            <?php
            if (isset($txt_erro) && ($txt_erro != "")) {
                echo "<p style='color: red;'>" . $txt_erro . "</p>";
            }
            ?>
        </form>
    </div>
</body>

</html>

