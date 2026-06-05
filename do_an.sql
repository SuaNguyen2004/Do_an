-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2026 at 11:39 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `do_an`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int NOT NULL,
  `idsp` int NOT NULL,
  `iddh` int NOT NULL,
  `tensp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int NOT NULL,
  `gia` double(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `idsp`, `iddh`, `tensp`, `img`, `soluong`, `gia`) VALUES
(28, 26, 30, 'Nước suối Aquafina tinh khiết 1.5 Lít', 'nuoc_suoi_aquafina.jpg', 1, 21000),
(29, 19, 31, 'Bia Heineken', 'heineken.jpg', 1, 20000),
(30, 22, 31, 'Trà xanh 0 độ', 'tra_xanh_0_do.jpg', 1, 15000),
(31, 29, 31, 'Kẹo dẻo Jelly Chip Chip', 'Jelly_Chip.jpg', 1, 16000),
(32, 20, 32, 'Nước tăng lực Red Bull', 'red_bull.jpg', 1, 22000),
(33, 31, 32, 'Snack Oishi Khoai Tây Vị Muối', 'Snack_Oishi.jpg', 1, 13000),
(34, 34, 32, 'Bánh quy Cosy', 'banh_quy_Cosy.jpg', 1, 20000),
(35, 34, 33, 'Bánh quy Cosy', 'banh_quy_Cosy.jpg', 1, 20000),
(36, 24, 34, 'Nước ngọt Coca Cola có gas 390 ml ', 'coca_cola.jpg', 1, 10000),
(37, 26, 35, 'Nước suối Aquafina tinh khiết 1.5 Lít', 'nuoc_suoi_aquafina.jpg', 1, 21000),
(38, 25, 35, 'Nước Khoáng Thiên Nhiên Lavie', 'nuoc_khoang_lavie.jpg', 1, 5000),
(39, 20, 35, 'Nước tăng lực Red Bull', 'red_bull.jpg', 1, 22000),
(40, 19, 35, 'Bia Heineken', 'heineken.jpg', 1, 20000),
(41, 33, 35, 'Bánh quy Oreo', 'banh_quy_Oreo.jpg', 1, 17000),
(42, 21, 38, 'Cà phê Nescafe', 'ca_phe_nescafe.jpg', 1, 79000),
(43, 26, 39, 'Nước suối Aquafina tinh khiết 1.5 Lít', 'nuoc_suoi_aquafina.jpg', 1, 21000),
(44, 26, 40, 'Nước suối Aquafina tinh khiết 1.5 Lít', 'nuoc_suoi_aquafina.jpg', 20, 21000),
(45, 26, 41, 'Nước suối Aquafina tinh khiết 1.5 Lít', 'nuoc_suoi_aquafina.jpg', 1, 21000),
(46, 26, 42, 'Nước suối Aquafina tinh khiết 1.5 Lít', 'nuoc_suoi_aquafina.jpg', 1, 21000),
(47, 24, 43, 'Nước ngọt Coca Cola có gas 390 ml ', 'coca_cola.jpg', 1, 10000),
(48, 20, 44, 'Nước tăng lực Red Bull', 'red_bull.jpg', 1, 22000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id` int NOT NULL,
  `tendm` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uutien` tinyint(1) NOT NULL DEFAULT '0',
  `hienthi` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id`, `tendm`, `uutien`, `hienthi`) VALUES
(15, 'Đồ uống', 1, 1),
(16, 'Đồ ăn vặt', 3, 1),
(17, 'Thực phẩm ăn liền', 2, 1),
(18, 'Thực phẩm khô', 4, 1),
(19, 'Gia vị', 6, 1),
(20, 'Đồ hộp', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id` int NOT NULL,
  `madh` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tongdonhang` double(10,0) NOT NULL DEFAULT '0',
  `pttt` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id`, `madh`, `tongdonhang`, `pttt`, `name`, `address`, `email`, `tel`, `iduser`) VALUES
(10, '#MNM423069', 21000, 1, '', 'Hanoi', 'a@gmail.com', '123', 6),
(11, '#MNM944278', 21000, 2, '', 'HCM', 'a@gmail.com', '123', 6),
(12, '#MNM158326', 18000, 1, '', 'HCM', 'a@gmail.com', '123', 6),
(13, '#MNM64349', 22000, 3, '', 'HCM', 'a@gmail.com', '1234', 6),
(16, '#MNM192725', 22000, 1, '', 'HCM', 'a@gmail.com', '1234', 6),
(17, '#MNM351745', 21000, 3, 'suahehe', 'HCM', 'a@gmail.com', '1234', 6),
(18, '#MNM768686', 26000, 1, 'suahehe', 'HCM', 'a@gmail.com', '1234', 6),
(19, '#MNM346423', 60000, 1, 'suahuhu', 'DaNang', 'a@gmail.com', '1234', 2),
(20, '#MNM353745', 78000, 2, 'suahihi', 'CaMau', 'suahihi@gmail.com', '0123456789', 2),
(21, '#MNM620627', 21000, 3, 'suahaha', 'Hai Phong', 'suahaha@gmail.com', '0123456789', 2),
(22, '#MNM941777', 75000, 3, 'hihu', 'America Tho', 'hihu@gmail.com', '0987654321', 6),
(23, '#MNM170821', 10000, 1, 'Nguyễn Văn A', 'Hà Nội', 'a@gmail.com', '0987654321', 2),
(24, '#MNM932024', 5000, 1, 'Nguyễn Văn A', 'Hà Nội', 'a@gmail.com', '0987654321', 2),
(25, '#MNM338226', 5000, 1, 'Nguyễn Văn A', 'Hà Nội', 'a@gmail.com', '0987654321', 2),
(26, '#MNM431010', 10000, 1, 'Nguyễn Văn A', 'Hà Nội', 'a@gmail.com', '0987654321', 2),
(27, '#MNM796538', 18000, 1, 'Nguyễn Văn A', 'Hà Nội', 'a@gmail.com', '0987654321', 2),
(28, '#MNM222559', 22000, 1, 'Nguyễn Văn A', 'Hà Nội', 'a@gmail.com', '0987654321', 2),
(29, '#MNM97829', 17000, 1, 'Nguyễn Văn A', 'Hà Nội', 'a@gmail.com', '0987654321', 2),
(30, '#MNM277347', 21000, 1, 'Nguyễn Văn B', 'Hà Nội', 'a@gmail.com', '0987654321', 2),
(31, '#MNM351886', 51000, 3, 'Su', 'Hai Phong', 'sua@gmail.com', '0123456789', 6),
(32, '#MNM267314', 55000, 1, 'Lê B', 'O', 'sua@gmail.com', '0987654321', 6),
(33, '#MNM408537', 20000, 1, 'S', 'A', 'hihuuu@gmail.com', '999', 6),
(34, '#MNM505812', 10000, 1, 'Nguyen Van A', 'Ha Noi', 'a@gmail.com', '0123456789', 2),
(35, '#MNM202286', 85000, 3, 'Lê A', 'Ha Noi', 'a@gmail.com', '01234567890', 2),
(38, '#MNM642392', 79000, 1, 'AA', 'Số nhà 13, Huyện Phú Xuyên, Hà Nội', 'A', '123', 2),
(39, '#MNM206541', 21000, 1, 'Su', 'Số nhà 20, Huyện Phú Xuyên, Hà Nội', 'B@mo.com', '0987654321', 2),
(40, '#MNM913242', 420000, 1, 'A', 'A, Huyện Thanh Trì, Hà Nội', 'ttd@gmail.com', '0987654322', 2),
(41, '#MNM286234', 21000, 1, 'Nguyễn Văn A', 'Số nhà 38, Huyện Phú Xuyên, Hà Nội', 'nva@gmail.com', '0987123654', 13),
(42, '#MNM57294', 21000, 1, 'Nguyễn Văn A', 'Số nhà 50, Huyện Thường Tín, Hà Nội', 'nguyenvana@gmail.com', '0934123456', 13),
(43, '#MNM970863', 10000, 1, 'Nguyễn Văn A', 'Số nhà 50, Huyện Thanh Trì, Hà Nội', 'nguyenvana@gmail.com', '0934123456', 2),
(44, '#MNM849614', 22000, 1, 'Nguyễn Văn B', 'Số nhà 30, Xóm 3, Huyện Thường Tín, Hà Nội', 'nguyenvanb@gmail', '0123654789', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id` int NOT NULL,
  `tensp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` double(10,0) NOT NULL DEFAULT '0',
  `iddm` int NOT NULL,
  `view` int NOT NULL DEFAULT '0',
  `special` int NOT NULL DEFAULT '0',
  `mota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soluongkho` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id`, `tensp`, `img`, `gia`, `iddm`, `view`, `special`, `mota`, `soluongkho`) VALUES
(19, 'Bia Heineken', 'heineken.jpg', 20000, 15, 0, 0, 'Cập nhật sau', 0),
(20, 'Nước tăng lực Red Bull', 'red_bull.jpg', 22000, 15, 0, 0, 'Cập nhật sau', 29),
(21, 'Cà phê Nescafe', 'ca_phe_nescafe.jpg', 79000, 15, 0, 0, 'Cập nhật sau', 35),
(22, 'Trà xanh 0 độ', 'tra_xanh_0_do.jpg', 15000, 15, 0, 0, 'Cập nhật sau', 20),
(23, 'Nước ngọt Pepsi có gas 320 ml', 'pepsi.jpg', 18000, 15, 0, 0, 'Cập nhật sau', 10),
(24, 'Nước ngọt Coca Cola có gas 390 ml ', 'coca_cola.jpg', 10000, 15, 0, 1, 'Nước giải khát số 1 thế giới', 49),
(25, 'Nước Khoáng Thiên Nhiên Lavie', 'nuoc_khoang_lavie.jpg', 5000, 15, 0, 0, 'Cập nhật sau', 30),
(26, 'Nước suối Aquafina tinh khiết 1.5 Lít', 'nuoc_suoi_aquafina.jpg', 21000, 15, 0, 0, 'Cập nhật sau', 48),
(27, 'Bim bim bí đỏ', 'Bi_do.jpg', 6000, 16, 0, 0, 'Cập nhật sau', 29),
(28, 'Socola Kitkat', 'Kitkat.jpg', 10000, 16, 0, 0, 'Cập nhật sau', 45),
(29, 'Kẹo dẻo Jelly Chip Chip', 'Jelly_Chip.jpg', 16000, 16, 0, 0, 'Cập nhật sau', 30),
(30, 'Kẹo dẻo Alpenliebe hương Dâu và Nho', 'Keo_Alpenliebe.jpg', 23000, 16, 0, 0, 'Cập nhật sau', 35),
(31, 'Snack Oishi Khoai Tây Vị Muối', 'Snack_Oishi.jpg', 13000, 16, 0, 0, 'Cập nhật sau', 30),
(32, 'Bánh bông lan Solite Vị lá dứa', 'banh_bong_lan_Solite.jpg', 50000, 16, 0, 0, 'Cập nhật sau', 35),
(33, 'Bánh quy Oreo', 'banh_quy_Oreo.jpg', 17000, 16, 0, 0, 'Cập nhật sau', 40),
(34, 'Bánh quy Cosy', 'banh_quy_Cosy.jpg', 20000, 16, 0, 0, 'Cập nhật sau', 35),
(35, 'Hủ tiếu khô Nam Vang', 'hu_tieu_kho_nam_vang.jpg', 16000, 17, 0, 0, 'Cập nhật sau', 25),
(36, 'Bún tôm ăn liền', 'bun-tom-an-lien.jpg', 13000, 17, 0, 0, 'Cập nhật sau', 40),
(38, 'Cháo gấu đỏ', 'chao_gau_do.jpg', 4000, 17, 0, 0, 'Cập nhật sau', 50),
(39, 'Phở Đệ Nhất', 'Pho_de_nhat.jpg', 10000, 17, 0, 0, 'Cập nhật sau', 35),
(40, 'Miến Phú Hương', 'Mien_Phu_Huong.jpg', 15000, 17, 0, 0, 'Cập nhật sau', 30),
(41, 'Mì tôm chua cay Omachi', 'Mi_Omachi.jpg', 8000, 17, 0, 0, 'Cập nhật sau', 30),
(42, 'Mì hảo hảo', 'Mi_hao_hao.jpg', 3500, 17, 0, 0, 'Cập nhật sau', 40),
(43, 'Tôm khô', 'tom_kho.jpg', 10000, 18, 0, 0, 'Cập nhật sau', 30),
(44, 'Cá chỉ vàng', 'ca-chi-vang.jpg', 25000, 18, 0, 0, 'Cập nhật sau', 30),
(45, 'Nấm Hương', 'nam-huong-kho.jpg', 15000, 18, 0, 0, 'Cập nhật sau', 50),
(46, 'Đậu đen', 'dau-den.jpg', 15000, 18, 0, 0, 'Cập nhật sau', 40),
(47, 'Đậu xanh không vỏ', 'dau-xanh-khong-vo.jpg', 22000, 18, 0, 0, 'Cập nhật sau', 30),
(48, 'Gạo ST25', 'gao-ST25.jpg', 250000, 18, 0, 0, 'Cập nhật sau', 20),
(49, 'Dầu ăn Neptune', 'dau_an.jpg', 70000, 19, 0, 0, 'Cập nhật sau', 35),
(50, 'Bột ngọt Ajinomoto', 'bot-ngot-ajinomoto.jpg', 75000, 19, 0, 0, 'Cập nhật sau', 25),
(51, 'Hạt nêm Knorr 400g', 'hat_nem_knorr.jpg', 50000, 19, 0, 0, 'Cập nhật sau', 30),
(52, 'Đường kính trắng 1kg', 'duong-kinh-trang.jpg', 27000, 19, 0, 0, 'Cập nhật sau', 100),
(53, 'Bột canh I-ốt Hải Châu', 'bot-canh-iot.jpg', 9000, 19, 0, 0, 'Cập nhật sau', 50),
(54, 'Tương ớt Chin-su 250g', 'tuong-ot-chinsu.jpg', 18000, 19, 0, 0, 'Cập nhật sau', 40),
(55, 'Nước tương Maggi', 'nuoc-tuong-maggi.jpg', 40000, 19, 0, 0, 'Cập nhật sau', 30),
(56, 'Nước mắm Chin-su', 'nuoc-mam-chinsu.jpg', 80000, 19, 0, 0, 'Cập nhật sau', 20),
(57, 'Sữa đặc có đường ông Thọ', 'sua-dac-co-duong-ong-tho.jpg', 30000, 20, 0, 0, 'Cập nhật sau', 20),
(58, 'Xúc xích Ponnie', 'xuc-xich.jpg', 100000, 20, 0, 0, 'Cập nhật sau', 20),
(59, 'Pate gan heo', 'pate-gan-heo.jpg', 20000, 20, 0, 0, 'Cập nhật sau', 20),
(60, 'Cá ngừ ngâm dầu', 'ca-ngu.jpg', 23000, 20, 0, 0, 'Cá ngừ số 1 Đông Nam Á', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `address`, `email`, `tel`, `user`, `pass`, `role`) VALUES
(1, NULL, NULL, NULL, NULL, 'admin', '123', 1),
(2, 'Nguyễn Văn B', 'Thường Tín - Hà Nội', 'bhihi@gmail.com', '0123456789', 'user', '123', 0),
(6, 'Nguyen Van A', 'Hà Nội', 'a@gmail.com', '123', 'a', '123', 0),
(10, 'Trần Văn B', 'Phú Xuyên - Hà Nội', 'c@gmail.com', '0123456798', 'b', '123', 0),
(11, 'Lê Thị C', 'Hà Nội', 'lethic@gmail.com', '0123456987', 'c', '123', 0),
(13, 'Nguyễn Văn A', 'Bắc Từ Liêm - Hà Nội', 'nva@gmail.com', '0987123654', 'nguyenvana', '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_sanpham` (`idsp`),
  ADD KEY `fk_cart_donhang` (`iddh`);

--
-- Indexes for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_donhang` (`iduser`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanpham_danhmuc` (`iddm`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `fk_cart_donhang` FOREIGN KEY (`iddh`) REFERENCES `tbl_donhang` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_cart_sanpham` FOREIGN KEY (`idsp`) REFERENCES `tbl_sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD CONSTRAINT `fk_user_donhang` FOREIGN KEY (`iduser`) REFERENCES `tbl_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `tbl_danhmuc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
