-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 12:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlnh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `MaAdmin` varchar(10) NOT NULL,
  `TenDangNhap` varchar(20) NOT NULL,
  `MatKhau` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`MaAdmin`, `TenDangNhap`, `MatKhau`) VALUES
('', 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `ban`
--

CREATE TABLE `ban` (
  `MaBan` int(11) NOT NULL,
  `Loaiban` varchar(255) NOT NULL,
  `Ghichu` text NOT NULL,
  `Anhban` varchar(255) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Soluongconlai` int(11) NOT NULL,
  `Trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `ban`
--

INSERT INTO `ban` (`MaBan`, `Loaiban`, `Ghichu`, `Anhban`, `Soluong`, `Soluongconlai`, `Trangthai`) VALUES
(1, 'Đôi', 'dành cho 2 người', 'bandoi.jpg', 4, 4, 1),
(2, '4-6 chỗ', 'Loại bàn dành cho gia đình,...', 'bangd.jpg', 5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `MaBlog` int(11) NOT NULL,
  `TenBlog` mediumtext NOT NULL,
  `ThoiGianDang` datetime NOT NULL,
  `NoiDung` longtext NOT NULL,
  `MaLoaiBlog` int(11) NOT NULL,
  `AnhBlog` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`MaBlog`, `TenBlog`, `ThoiGianDang`, `NoiDung`, `MaLoaiBlog`, `AnhBlog`) VALUES
(2, 'Sắc Màu Tươi Sáng: Bí Quyết Chọn Lựa Nguyên Liệu Cho Thực Đơn Sáng Tạo', '2023-11-26 16:30:00', 'áddf', 3, 'assets/img/blog/_7417815e-b753-4b6a-94e1-63be3976aa4c.jpg'),
(3, 'Hành Trình Sáng Tạo: Thiết Kế Thực Đơn Nổi Bật với Nguyên Liệu Độc Đáo', '2023-11-26 16:30:00', 'd', 3, 'assets/img/blog/_a1ebe242-8ab7-4c8f-a241-41477ffdab53.jpg'),
(82, 'Sự Hấp Dẫn Của Đồ Ăn Mới: Đánh Thức Giác Quan Ăn Uống', '2023-11-30 23:27:00', 'shfggggggggggggggggggggg', 3, 'assets/img/blog/360_F_618465589_2bVIwPWelYiipGByk7tnZEgqQ3K8T56y.jpg'),
(83, 'Những Bí Mật Của Sự Hòa Quyện: Cảm Nhận Món Ăn Truyền Thống', '2023-12-01 09:17:00', '', 3, 'assets/img/blog/4901804.jpg'),
(84, 'Sổ Tay Nấu Ăn: Ghi Chép Các Công Thức Nấu Ăn Yêu Thích', '2023-12-01 09:19:00', 'sfedggggggggg', 3, 'assets/img/blog/_3e989f48-eb8a-474f-a4e0-41d104a14a6c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ctdonhang`
--

CREATE TABLE `ctdonhang` (
  `MaDonHang` int(11) NOT NULL,
  `MaMonAn` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `ctdonhang`
--

INSERT INTO `ctdonhang` (`MaDonHang`, `MaMonAn`, `SoLuong`, `Gia`) VALUES
(75, 1, 1, 45000),
(75, 2, 1, 30000),
(75, 6, 1, 45000),
(76, 1, 1, 45000),
(76, 2, 1, 30000),
(76, 9, 1, 45000),
(77, 2, 343, 10290000);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`MaDanhMuc`, `TenDanhMuc`) VALUES
(1, 'Bún'),
(2, 'Miến'),
(3, 'Phở'),
(4, 'Cơm'),
(5, 'Cháo'),
(6, 'Topping'),
(7, 'Đồ uống');

-- --------------------------------------------------------

--
-- Table structure for table `datban`
--

CREATE TABLE `datban` (
  `MaDatBan` int(11) NOT NULL,
  `MaBan` int(11) NOT NULL,
  `MaThanhVien` int(11) NOT NULL,
  `ThoiGianDat` datetime NOT NULL,
  `Thoigianhenden` datetime NOT NULL,
  `TrangThai` int(11) NOT NULL COMMENT '1.đang chờ xác nhận 2. Đã xác nhận 3. Đã hoàn thành'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `datban`
--

INSERT INTO `datban` (`MaDatBan`, `MaBan`, `MaThanhVien`, `ThoiGianDat`, `Thoigianhenden`, `TrangThai`) VALUES
(2, 0, 1, '2023-12-12 12:10:00', '2023-12-01 06:12:39', 0),
(3, 0, 1, '2023-12-06 12:12:00', '2023-12-01 06:13:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` int(11) NOT NULL,
  `MaThanhVien` int(11) NOT NULL,
  `MaPhuongThuc` int(11) NOT NULL,
  `TenNguoiNhan` varchar(255) NOT NULL,
  `DiaChiNhanHang` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `SDT` varchar(10) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MaDonHang`, `MaThanhVien`, `MaPhuongThuc`, `TenNguoiNhan`, `DiaChiNhanHang`, `email`, `SDT`, `TrangThai`) VALUES
(75, 1, 4, 'Nguyễn Hồng Phúc', '10 Hàng Vôi', 'phuc0200366@huce.edu.vn', '0123456789', 0),
(76, 1, 4, 'Nguyễn Hồng Phúc', '10 Hàng Vôi', 'phuc0200366@huce.edu.vn', '0123456789', 0),
(77, 1, 4, 'Nguyễn Hồng Phúc', '10 Hàng Vôi', 'phuc0200366@huce.edu.vn', '0123456789', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gopy`
--

CREATE TABLE `gopy` (
  `MaGopY` int(11) NOT NULL,
  `MaThanhVien` int(11) NOT NULL,
  `ChuDe` varchar(50) NOT NULL,
  `NoiDung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `gopy`
--

INSERT INTO `gopy` (`MaGopY`, `MaThanhVien`, `ChuDe`, `NoiDung`) VALUES
(9, 1, 'gfds', 'gdf'),
(10, 1, 'Món ăn', 'Món ăn hôm nay nngon quá '),
(11, 1, 'Món ăn', 'Món ăn hôm nay nngon quá '),
(68, 1, 'Đồ ăn 13h', 'Taste like heaven'),
(86, 1, 'ád', 'sda');

-- --------------------------------------------------------

--
-- Table structure for table `loaiblog`
--

CREATE TABLE `loaiblog` (
  `MaLoaiBlog` int(11) NOT NULL,
  `TenLoaiBlog` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `loaiblog`
--

INSERT INTO `loaiblog` (`MaLoaiBlog`, `TenLoaiBlog`) VALUES
(3, 'Món Ăn'),
(4, 'Công Thức'),
(5, 'Review');

-- --------------------------------------------------------

--
-- Table structure for table `monan`
--

CREATE TABLE `monan` (
  `MaMonAn` int(11) NOT NULL,
  `TenMonAn` varchar(255) NOT NULL,
  `Gia` decimal(10,0) NOT NULL,
  `ThongTinMonAn` longtext NOT NULL,
  `TrangThai` tinyint(1) NOT NULL,
  `SoLuong` int(3) NOT NULL,
  `Anh` varchar(255) DEFAULT NULL,
  `MaDanhMuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `monan`
--

INSERT INTO `monan` (`MaMonAn`, `TenMonAn`, `Gia`, `ThongTinMonAn`, `TrangThai`, `SoLuong`, `Anh`, `MaDanhMuc`) VALUES
(1, 'Phở gà', 45000, 'Tô phở nóng hổi với nước dùng ngọt thanh thật ấn tượng, quyện cùng bánh phở trắng nõn, thịt gà tươi ngon, săn chắc thịt và trứng non bùi bùi. ', 1, 46, 'phoga.jpg', 3),
(2, 'Bún riêu', 30000, '      Bún riêu có màu vàng cam điểm thêm màu xanh của rau, màu đỏ của ớt. Bún có hương vị thơm ngon, riêu cua béo ngậy, ... Ngoài bún riêu cua thì bún riêu tôm là một sự cách tân trong hương vị của món bún riêu.', 1, 45, 'bunrieu.png', 1),
(3, 'Cơm gà xối mỡ', 45000, 'Cơm gà xôi mỡ ngon', 1, 49, 'comgaxoi.jpg', 4),
(4, 'Cơm chiên', 40000, 'Cơm chiên xào rau củ', 1, 3, 'comchien.jpg', 4),
(5, 'Phở bò', 60000, 'Phở bò Việt Nam', 1, 345, 'phobo.jpg', 3),
(6, 'Miến xào giòn', 45000, 'Miến xào giòn với rau sống', 1, 345, 'mienxao.jpg', 2),
(7, 'Miến gà', 55000, 'Miến gà hầm nước dùng ngon', 1, 32, 'mienga.jpg', 2),
(8, 'Miến trộn', 35000, 'Miến trộn với gia vị', 1, 123, 'mientron.jpg', 2),
(9, 'Bún', 45000, ' Bún ốc sạch, ngon miệng', 1, 123, 'bunoc.png', 1),
(10, 'Bún bò Huế', 55000, 'Bún bò Huế thơm ngon', 1, 12, 'bunbohue.jpg', 1),
(11, 'Cháo gà', 40000, 'Cháo gà thơm ngon và dễ tiêu hóa', 1, 0, 'chaoga.jpg', 5),
(12, 'Cháo cá hồi', 45000, 'Cháo cá hồi giàu omega-3', 1, 0, 'chaocahoi.jpg', 5),
(13, 'Trứng ', 8000, 'trần, luộc, ốp la', 1, 0, 'trung.jpg', 6),
(14, 'Nước ép cam', 25000, 'Nước ép cam tươi ngon', 1, 23, 'nuocep_cam.jpg', 7),
(15, 'Cà phê sữa đá', 17000, 'Cà phê sữa đá thơm ngon', 1, 23, 'caphesuada.jpg', 7),
(16, 'Coca-Cola', 12000, 'Cô văn ca', 1, 123, 'coca.jpg', 7),
(17, 'Pepsi', 13000, 'Pep thị si', 1, 123, 'pepsi.jpg', 7),
(18, 'Trà chanh', 9000, 'Trà chanh mát lạnh', 1, 123, 'tra_chanh.jpg', 7),
(19, 'Cơm tấm', 50000, 'Món cơm ngon', 0, 1231, 'comtam.jpg', 4),
(20, 'Cháo lòng', 30000, 'Cháo Lòng ngon ', 1, 234, 'chaolong.jpg', 5),
(22, 'Trà đá', 5000, 'Ngon', 1, 2342, 'trada.jpg', 7),
(23, 'Phở sốt vang', 35000, 'when i clicked to another categories it doesnt display the monan except i change the resolution', 1, 1231, 'phosotvang.jpg', 3),
(24, 'Thêm bánh', 5000, 'Bánh phở...', 0, 12312, 'thembanh.jpg', 6),
(25, 'Thêm thịt...', 20000, 'Thích thì mình thêm thôi', 1, 12312, 'themthit.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `phuongthucthanhtoan`
--

CREATE TABLE `phuongthucthanhtoan` (
  `MaPhuongThuc` int(11) NOT NULL,
  `TenPhuongThuc` varchar(50) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `phuongthucthanhtoan`
--

INSERT INTO `phuongthucthanhtoan` (`MaPhuongThuc`, `TenPhuongThuc`, `TrangThai`) VALUES
(4, 'Thanh toán khi nhận hàng', 1),
(5, 'ZaloPay', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `MaThanhVien` int(11) NOT NULL,
  `TenDangNhap` varchar(20) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SDT` varchar(10) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`MaThanhVien`, `TenDangNhap`, `MatKhau`, `HoTen`, `DiaChi`, `SDT`, `Email`) VALUES
(1, 'vicemonitor', '123', 'Nguyễn Hồng Phúc', '10 Hàng Vôi', '0123456789', 'phuc0200366@huce.edu.vn'),
(13, 'tienfifai', '123', 'Kiều Việt Tiến', '123 Phùng Hưng', '04359874', 'tienkieu@huc.edu.vn'),
(14, 'EsercitoHaki', '123', 'Phạm Công Quân', 'Tôn Đức Thắng', '01283913', 'EsercitoHaki@huce.edu.vn'),
(16, 'SuckMySoul', '123', 'Nguyễn Thành Trung', 'Trương Định', '129083091', 'trunghihi@gmail.com'),
(27, 'dsfgsdf', 'áda', 'gsdfg', 'sf', 'sdas', 'gsdfg'),
(28, 'tes', '123', 'tes', 'test', '123', 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`MaBan`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`MaBlog`);

--
-- Indexes for table `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD PRIMARY KEY (`MaDonHang`,`MaMonAn`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDanhMuc`);

--
-- Indexes for table `datban`
--
ALTER TABLE `datban`
  ADD PRIMARY KEY (`MaDatBan`),
  ADD KEY `datban-tv` (`MaThanhVien`),
  ADD KEY `datban-ban` (`MaBan`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`);

--
-- Indexes for table `gopy`
--
ALTER TABLE `gopy`
  ADD PRIMARY KEY (`MaGopY`),
  ADD KEY `gopy-tv` (`MaThanhVien`);

--
-- Indexes for table `loaiblog`
--
ALTER TABLE `loaiblog`
  ADD PRIMARY KEY (`MaLoaiBlog`);

--
-- Indexes for table `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`MaMonAn`),
  ADD KEY `monan-danhmuc` (`MaDanhMuc`);

--
-- Indexes for table `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  ADD PRIMARY KEY (`MaPhuongThuc`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`MaThanhVien`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ban`
--
ALTER TABLE `ban`
  MODIFY `MaBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `MaBlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `datban`
--
ALTER TABLE `datban`
  MODIFY `MaDatBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `gopy`
--
ALTER TABLE `gopy`
  MODIFY `MaGopY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `loaiblog`
--
ALTER TABLE `loaiblog`
  MODIFY `MaLoaiBlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `monan`
--
ALTER TABLE `monan`
  MODIFY `MaMonAn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  MODIFY `MaPhuongThuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `MaThanhVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gopy`
--
ALTER TABLE `gopy`
  ADD CONSTRAINT `gopy-tv` FOREIGN KEY (`MaThanhVien`) REFERENCES `thanhvien` (`MaThanhVien`);

--
-- Constraints for table `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `monan-danhmuc` FOREIGN KEY (`MaDanhMuc`) REFERENCES `danhmuc` (`MaDanhMuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
