<?php
session_start();
ob_start();

// Kiểm tra quyền truy cập
if (!isset($_SESSION['user']) || !isset($_SESSION['role'])==1) {
    include "model/connectdb.php";
    include "model/loaisanpham.php";
    include "model/sanpham.php";
    include "model/user.php";
    include "model/homeAD.php";
    include "model/nhanvien.php";
    include "model/khachhang.php"; 
    include "model/nhacungcap.php"; 
    include "viewAD/headerAD.php"; 

    if (isset($_GET['act'])) {
        switch ($_GET['act']) {

             case 'loaisanpham':
                $kq = getall_Loai();
                include "viewAD/loaisanpham.php";
                break;
                case 'addLoai':
                    if (isset($_POST['them'])) {
                        $tenloai = $_POST['tenloai'];
                        themLoai($tenloai); 
                        // Lấy lại danh sách loại sản phẩm sau khi thêm mới
                        $kq = getall_Loai(); 
                        header("Location: indexAD.php?act=loaisanpham"); 
                        exit();
                    }
                    // Lấy danh sách loại sản phẩm khi trang được tải lần đầu
                    $kq = getall_Loai();
                    include "viewAD/loaisanpham.php";
                    break;
                
                //cập nhật
                case 'updateformLoai':
                    if (isset($_POST['capnhat'])) {
                        $idloaisp = $_POST['idloaisp'];
                        $tenloai = $_POST['tenloai'];
                        updateLoai($idloaisp, $tenloai);
                        header("Location: indexAD.php?act=loaisanpham");
                        exit();
                    }
                    if (isset($_GET['idloaisp'])) {
                        $idloaisp = $_GET['idloaisp'];
                        $kqone = getoneLoai($idloaisp); 
                    }
                    include "viewAD/updateformLoai.php";
                    break;
                
                    case 'delLoai':
                        $message = ""; // Biến chứa thông báo
                        if (isset($_GET['idloaisp'])) {
                            $idloaisp = $_GET['idloaisp'];
                            $message = delLoai($idloaisp); // Lấy thông báo từ hàm delLoai
                        }
                        $kq = getall_Loai(); // Lấy danh sách loại sản phẩm
                        include "viewAD/loaisanpham.php"; // Gửi thông báo sang giao diện
                        break;
                    
                
//san pham
                case 'sanpham':
                    $loai = getall_Loai();
                    $kq = getall_sp();
                    include "viewAD/sanpham.php";
                    break;
    
                // Thêm sản phẩm
                case 'addsp':
                    if (isset($_POST['themmoi'])) {
                        $idloaisp = $_POST['idloaisp'];
                        $idnhacungcap = $_POST['idnhacungcap'];
                        $tensp = $_POST['tensp'];
                        $gia = $_POST['gia'];
                        $soluong = $_POST['soluong'];
                
                        // Xử lý upload ảnh
                        if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == 0) {
                            $uploadOk = 1;
                            $target_dir = "uploads/";
                            $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                
                            if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                                $uploadOk = 0;
                                echo "<div class='text-red-500'>Chỉ chấp nhận JPG, JPEG, PNG, GIF.</div>";
                            }
                
                            if ($uploadOk && move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                                themSP($idloaisp, $idnhacungcap, $tensp, $target_file, $gia, $soluong);
                                header("Location: indexAD.php?act=sanpham");
                                exit();
                            } else {
                                echo "<div class='text-red-500'>Có lỗi khi tải ảnh lên.</div>";
                            }
                        }
                    }
                    include "viewAD/addSP.php";  
                    break;
                
    
               // Cập nhật sản phẩm
case 'updatesp':
    if (isset($_POST['capnhat'])) {
        $idsp = $_POST['idsp'];
        $idloaisp = $_POST['idloaisp'];
        $idnhacungcap = $_POST['idnhacungcap'];
        $tensp = $_POST['tensp'];
        $gia = $_POST['gia'];
        $soluong = $_POST['soluong'];

        // Kiểm tra nếu có hình ảnh mới được tải lên
        if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == 0) {
            $uploadOk = 1;
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Kiểm tra định dạng file ảnh
            if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                $uploadOk = 0;
                echo "<div class='text-red-500'>Chỉ chấp nhận JPG, JPEG, PNG, GIF.</div>";
            }

            // Kiểm tra dung lượng file (giới hạn tối đa là 5MB)
            if ($_FILES["hinh"]["size"] > 5000000) {
                $uploadOk = 0;
                echo "<div class='text-red-500'>File ảnh quá lớn. Dung lượng tối đa là 5MB.</div>";
            }

            // Nếu mọi thứ ổn, thực hiện tải ảnh lên
            if ($uploadOk && move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                // Cập nhật sản phẩm với ảnh mới
                capnhatSP($idsp, $idloaisp, $idnhacungcap, $tensp, $target_file, $gia, $soluong);
                header("Location: indexAD.php?act=sanpham");
                exit();
            } else {
                echo "<div class='text-red-500'>Có lỗi khi tải ảnh lên.</div>";
            }
        } else {
            // Nếu không có ảnh mới, giữ lại ảnh cũ
            $sp = getoneSP($idsp);
            $hinhanh = $sp['hinhanhsp']; // Giữ lại ảnh cũ nếu không có ảnh mới
            capnhatSP($idsp, $idloaisp, $idnhacungcap, $tensp, $hinhanh, $gia, $soluong);
            header("Location: indexAD.php?act=sanpham");
            exit();
        }
    }

    if (isset($_GET['idsp'])) {
        $idsp = $_GET['idsp'];
        $sp = getoneSP($idsp);
        $loai = getall_Loai();
        $nhacungcap = getAllNCC();
    }

    include "viewAD/updateSP.php";
    break;

    
                // Xóa sản phẩm
                case 'delsp':
                    if (isset($_GET['idsp'])) {
                        $idsp = $_GET['idsp'];
                        xoaSP($idsp);
                        header("Location: indexAD.php?act=sanpham");
                        exit();
                    }
                    break;
                    case 'filterProducts':
                        if (isset($_GET['idloaisp'])) {
                            $idloaisp = $_GET['idloaisp'];
                            if ($idloaisp == 0) {
                                $products = getall_Loai(); 
                            } else {
                                $products = getSPtheoLoai($idloaisp); 
                            }
                            include "viewAD/productList.php"; 
                        }
                        break;
                    

            case 'khachhang':
                $kq = getall_khachhang(); 
                include "viewAD/khachhang.php"; 
                break;

            case 'nhanvien':
                $kq = getall_nhanvien();
                include "viewAD/nhanvien.php"; 
                break;

            case 'nhacungcap':
                // Lấy tất cả nhà cung cấp từ cơ sở dữ liệu
                $nhacungcap = getAllNCC(); 
                include "viewAD/nhacungcap.php"; // Hiển thị nhà cung cấp
                break;

            // Thêm nhà cung cấp
            case 'addNCC':
                if (isset($_POST['them'])) {
                    $tenncc = $_POST['tenncc'];
                    $diachincc = $_POST['diachincc'];
                    $sdt = $_POST['sdt'];
                    
                    themNCC($tenncc, $diachincc, $sdt);  
                    header("Location: indexAD.php?act=nhacungcap");  
                    exit();
                }
                include "viewAD/addNCC.php";  
                break;

            // Cập nhật nhà cung cấp
            case 'updateNCC':
                if (isset($_POST['capnhat'])) {
                    $idnhacungcap = $_POST['idnhacungcap'];
                    $tenncc = $_POST['tenncc'];
                    $diachincc = $_POST['diachincc'];
                    $sdt = $_POST['sdt'];
            
                    capnhatNCC($idnhacungcap, $tenncc, $diachincc, $sdt);  
                    header("Location: indexAD.php?act=nhacungcap");  
                    exit();
                }
            
                if (isset($_GET['idnhacungcap'])) {
                    $idnhacungcap = $_GET['idnhacungcap'];
                    $ncc = getoneNCC($idnhacungcap);  
                }
            
                include "viewAD/updateNCC.php";  
                break;

            // Xóa nhà cung cấp
            case 'delNCC':
                if (isset($_GET['idnhacungcap'])) {
                    $idnhacungcap = $_GET['idnhacungcap'];
                    xoaNCC($idnhacungcap);  
                    header("Location: indexAD.php?act=nhacungcap");  
                    exit();
                }
                break;

            case 'thoat':
                session_destroy();
                header('location: login.php');
                break;

            default:
                include "viewAD/homeAD.php"; 
                break;
        }
    } else {
        include "viewAD/homeAD.php"; 
    }
  
    include "viewAD/footerAD.php"; 
} else {
    header('location:login.php'); 
}
?>
