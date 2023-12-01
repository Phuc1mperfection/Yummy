-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 04:21 PM
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
  `MaThanhVien` int(11) NOT NULL,
  `ThoiGianDat` int(11) NOT NULL,
  `NgayDat` varchar(20) NOT NULL,
  `SoCho` int(20) NOT NULL,
  `GhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
(2, 'Sắc Màu Tươi Sáng: Bí Quyết Chọn Lựa Nguyên Liệu Cho Thực Đơn Sáng Tạo', '2023-11-26 16:30:00', 'ád', 3, 'assets/img/blog/_7417815e-b753-4b6a-94e1-63be3976aa4c.jpg'),
(3, 'Hành Trình Sáng Tạo: Thiết Kế Thực Đơn Nổi Bật với Nguyên Liệu Độc Đáo', '2023-11-26 16:30:00', 'd', 3, 'assets/img/blog/8649474.jpg'),
(4, 'Sắc Màu Tươi Sáng: Bí Quyết Chọn Lựa Nguyên Liệu Cho Thực Đơn Sáng Tạo', '2023-11-02 16:30:00', 'sadasdas', 4, ''),
(5, 'Góc Bếp Tinh Tế: Nguyên Liệu Đặc Sắc và Ý Tưởng Thực Đơn Độc Đáo', '2023-11-26 20:40:00', 'ádasdasd', 3, ''),
(28, 'ádasdasdáhsfdg', '2023-11-28 20:08:00', 'àdsadf', 3, '');

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
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` int(11) NOT NULL,
  `MaThanhVien` int(11) NOT NULL,
  `ThoiGianDatHang` datetime NOT NULL,
  `ThoiGianThanhToan` datetime NOT NULL,
  `DiaChiNhanHang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MaDonHang`, `MaThanhVien`, `ThoiGianDatHang`, `ThoiGianThanhToan`, `DiaChiNhanHang`) VALUES
(2, 1, '2023-11-27 04:31:00', '2023-11-27 04:31:00', '10 Hàng Vôi');

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
(12, 1, 'ads', 'fa'),
(13, 1, 'ituyyyyyyyyyyyyyyy', 'ytui');

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
  `Anh` varchar(255) DEFAULT NULL,
  `MaDanhMuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `monan`
--

INSERT INTO `monan` (`MaMonAn`, `TenMonAn`, `Gia`, `ThongTinMonAn`, `TrangThai`, `Anh`, `MaDanhMuc`) VALUES
(1, 'Phở gà', 45000, 'Tô phở nóng hổi với nước dùng ngọt thanh thật ấn tượng, quyện cùng bánh phở trắng nõn, thịt gà tươi ngon, săn chắc thịt và trứng non bùi bùi. ', 1, 'phoga.jpg', 3),
(2, 'Bún riêu', 30000, '      Bún riêu có màu vàng cam điểm thêm màu xanh của rau, màu đỏ của ớt. Bún có hương vị thơm ngon, riêu cua béo ngậy, ... Ngoài bún riêu cua thì bún riêu tôm là một sự cách tân trong hương vị của món bún riêu.', 1, 'bunrieu.png', 1),
(3, 'Cơm gà xối mỡ', 45000, 'Cơm gà xôi mỡ ngon', 1, 'comgaxoi.jpg', 4),
(4, 'Cơm chiên', 40000, 'Cơm chiên xào rau củ', 1, 'comchien.jpg', 4),
(5, 'Phở bò', 60000, 'Phở bò Việt Nam', 1, 'phobo.jpg', 3),
(6, 'Miến xào giòn', 45000, 'Miến xào giòn với rau sống', 1, 'mienxao.jpg', 2),
(7, 'Miến gà', 55000, 'Miến gà hầm nước dùng ngon', 1, 'mienga.jpg', 2),
(8, 'Miến trộn', 35000, 'Miến trộn với gia vị', 1, 'mientron.jpg', 2),
(9, 'Bún', 45000, ' Bún ốc sạch, ngon miệng', 1, 'bunoc.png', 1),
(10, 'Bún bò Huế', 55000, 'Bún bò Huế thơm ngon', 1, 'bunbohue.jpg', 1),
(11, 'Cháo gà', 40000, 'Cháo gà thơm ngon và dễ tiêu hóa', 1, 'chaoga.jpg', 5),
(12, 'Cháo cá hồi', 45000, 'Cháo cá hồi giàu omega-3', 1, 'chaocahoi.jpg', 5),
(13, 'Trứng ', 8000, 'trần, luộc, ốp la', 1, 'trung.jpg', 6),
(14, 'Nước ép cam', 25000, 'Nước ép cam tươi ngon', 1, 'nuocep_cam.jpg', 7),
(15, 'Cà phê sữa đá', 17000, 'Cà phê sữa đá thơm ngon', 1, 'caphesuada.jpg', 7),
(16, 'Coca-Cola', 12000, 'Cô văn ca', 1, 'coca.jpg', 7),
(17, 'Pepsi', 13000, 'Pep thị si', 1, 'pepsi.jpg', 7),
(18, 'Trà chanh', 9000, 'Trà chanh mát lạnh', 1, 'tra_chanh.jpg', 7),
(19, 'Cơm tấm', 50000, 'Món cơm ngon', 0, 'comtam.jpg', 4),
(20, 'Cháo lòng', 30000, 'Cháo Lòng ngon ', 1, 'chaolong.jpg', 5),
(22, 'Trà đá', 5000, 'Ngon', 1, 'trada.jpg', 7),
(23, 'Phở sốt vang', 35000, 'when i clicked to another categories it doesnt display the monan except i change the resolution', 1, 'phosotvang.jpg', 3),
(24, 'Thêm bánh', 5000, 'Bánh phở...', 0, 'thembanh.jpg', 6),
(25, 'Thêm thịt...', 20000, 'Thích thì mình thêm thôi', 1, 'themthit.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `phuongthucthanhtoan`
--

CREATE TABLE `phuongthucthanhtoan` (
  `MaPhuongThuc` int(11) NOT NULL,
  `TenPhuongThuc` varchar(20) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
  ADD PRIMARY KEY (`MaBan`),
  ADD KEY `ban-tv` (`MaThanhVien`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`MaBlog`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDanhMuc`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`),
  ADD KEY `donhang-tv` (`MaThanhVien`);

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
  MODIFY `MaBan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `MaBlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gopy`
--
ALTER TABLE `gopy`
  MODIFY `MaGopY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `MaPhuongThuc` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `ban`
--
ALTER TABLE `ban`
  ADD CONSTRAINT `ban-tv` FOREIGN KEY (`MaThanhVien`) REFERENCES `thanhvien` (`MaThanhVien`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang-tv` FOREIGN KEY (`MaThanhVien`) REFERENCES `thanhvien` (`MaThanhVien`);

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
