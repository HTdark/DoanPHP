-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2024 lúc 11:18 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doanphpthuchanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `idkhachhang` int(11) NOT NULL,
  `tenkhachhang` varchar(255) NOT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `sodienthoai` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` enum('Nam','Nữ','Khác') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`idkhachhang`, `tenkhachhang`, `diachi`, `sodienthoai`, `email`, `ngaysinh`, `gioitinh`) VALUES
(1, 'Nguyễn Văn A', '123 Đường Lê Lợi, Quận 1, TP.HCM', '0901234567', 'nguyenvana@gmail.com', '1990-01-15', 'Nam'),
(2, 'Trần Thị B', '45 Đường Hai Bà Trưng, Quận 3, TP.HCM', '0912345678', 'tranthib@yahoo.com', '1988-05-20', 'Nữ'),
(3, 'Lê Văn C', '78 Đường Nguyễn Du, Đà Nẵng', '0923456789', 'levanc@hotmail.com', '1992-10-10', 'Nam'),
(4, 'Phạm Thị D', '19 Đường Trần Phú, Hà Nội', '0934567890', 'phamthid@gmail.com', '1995-03-25', 'Nữ'),
(5, 'Hoàng Văn E', '36 Đường Lý Thái Tổ, Hải Phòng', '0945678901', 'hoangvane@outlook.com', '1985-07-12', 'Nam'),
(6, 'Võ Thị F', '12 Đường Pasteur, Quận 1, TP.HCM', '0956789012', 'vothif@gmail.com', '1991-11-30', 'Nữ'),
(7, 'Đặng Văn G', '56 Đường Phan Đình Phùng, Huế', '0967890123', 'dangvang@gmail.com', '1989-04-18', 'Nam'),
(8, 'Ngô Thị H', '89 Đường Lê Lai, Cần Thơ', '0978901234', 'ngothih@yahoo.com', '1993-06-09', 'Nữ'),
(9, 'Bùi Văn I', '23 Đường Hoàng Văn Thụ, Quận Tân Bình, TP.HCM', '0989012345', 'buivani@gmail.com', '1987-02-14', 'Nam'),
(10, 'Phan Thị J', '47 Đường Điện Biên Phủ, Quận Bình Thạnh, TP.HCM', '0990123456', 'phanthij@hotmail.com', '1996-12-22', 'Nữ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`idkhachhang`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `idkhachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
