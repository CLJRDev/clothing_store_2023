-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 08:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopthoitrang`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `MaCTGH` int(64) NOT NULL,
  `MaGioHang` int(64) NOT NULL,
  `MaSanPham` int(64) NOT NULL,
  `MaKichThuoc` int(11) NOT NULL,
  `SoLuong` int(64) NOT NULL,
  `Gia` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `chitietgiohang`
--

INSERT INTO `chitietgiohang` (`MaCTGH`, `MaGioHang`, `MaSanPham`, `MaKichThuoc`, `SoLuong`, `Gia`) VALUES
(17, 24, 22, 2, 5, 2995),
(18, 24, 21, 1, 5, 5495),
(19, 24, 17, 1, 5, 6995),
(20, 25, 22, 2, 3, 1797),
(21, 25, 21, 1, 3, 3297),
(22, 25, 20, 1, 3, 2397),
(23, 26, 21, 1, 1, 1099),
(24, 26, 16, 2, 1, 1899),
(25, 27, 17, 1, 1, 1399),
(26, 27, 20, 1, 1, 799),
(27, 28, 22, 2, 9, 5391),
(28, 28, 16, 2, 9, 17091),
(29, 28, 20, 1, 9, 7191),
(30, 28, 13, 1, 10, 10990),
(31, 29, 21, 1, 11, 12089),
(32, 29, 20, 1, 9, 7191),
(33, 29, 22, 2, 10, 5990),
(34, 30, 19, 1, 9, 6291),
(35, 30, 22, 2, 3, 1797),
(36, 31, 10, 1, 10, 6990);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `MaGioHang` int(64) NOT NULL,
  `TaiKhoan` varchar(64) NOT NULL,
  `NguoiTao` varchar(1000) NOT NULL,
  `DiaChi` varchar(10000) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `NgayTao` date NOT NULL,
  `TongTien` int(64) NOT NULL,
  `TrangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`MaGioHang`, `TaiKhoan`, `NguoiTao`, `DiaChi`, `SoDienThoai`, `NgayTao`, `TongTien`, `TrangThai`) VALUES
(24, 'Công Lâm', 'conglamjr', '214 Lý Thánh Tông, Đồ Sơn, Hải Phòng', '0865089822', '2023-12-21', 15485, 1),
(25, 'Công Lâm', 'conglamjr', '214 Lý Thánh Tông, Đồ Sơn, Hải Phòng', '0865089822', '2023-12-21', 7491, 1),
(26, 'Công Lâm', 'conglamjr', '214 Lý Thánh Tông, Đồ Sơn, Hải Phòng', '0865089822', '2023-12-21', 2998, 1),
(27, 'Công Lâm', 'conglamjr', '214 Lý Thánh Tông, Đồ Sơn, Hải Phòng', '0865089822', '2023-12-21', 2198, 1),
(28, 'Công Lâm', 'conglamjr', '214 Lý Thánh Tông, Đồ Sơn, Hải Phòng', '0865089822', '2023-12-21', 40663, 0),
(29, 'Công Lâm', 'conglamjr', '214 Lý Thánh Tông, Đồ Sơn, Hải Phòng', '0865089822', '2023-12-22', 25270, 1),
(30, 'Công Lâm', 'dat1', '214 Lý Thánh Tông, Đồ Sơn, Hải Phòng', '0865089822', '2023-12-22', 8088, 1),
(31, 'Công Lâm', 'conglamjr', '214 Lý Thánh Tông, Đồ Sơn, Hải Phòng', '0865089822', '2023-12-22', 6990, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `MaHangSanXuat` int(64) NOT NULL,
  `TenHangSanXuat` varchar(64) NOT NULL,
  `HinhAnh` varchar(68) NOT NULL,
  `TrangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`MaHangSanXuat`, `TenHangSanXuat`, `HinhAnh`, `TrangThai`) VALUES
(4, 'Palxohs', '26b2a4cac6193110b589109fbe19fe15.png', 1),
(5, 'Oyarx', '79562f24e3636c43499d0ee5d8b8c9c7.png', 1),
(6, 'Aplio', 'a2996a94d592ce003db164510bf834d4.png', 1),
(7, 'Toyuos', '9da6b54e919bce34c46e524c54838f4b.png', 1),
(8, 'Maxtoxie', 'd18d79f10a39c041f82a65da682c3c3b.png', 1),
(9, 'Swaariy', 'cdc924fc780d08549ba21edc68a90a89.png', 1),
(10, 'Roxxye', 'b3131e61902e16c31b0ac36116c1eccd.png', 1),
(11, 'Sidkkow', '3020a373bd6171eb33b2a4e551116631.png', 1),
(12, 'Pixxley', 'c2d5d704d277cecb16ddbc84b880b1d7.png', 1),
(13, 'Jaksey', 'fc239f1d09d3c67abac21ca1dd7b2535.png', 1),
(15, 'Paparic', 'd5a719c0c41302475460a24bd1cea0c6.png', 1),
(16, 'Odsxym', '9f7e07fd705fc2681581ec581bfe4c7c.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kichthuoc`
--

CREATE TABLE `kichthuoc` (
  `MaKichThuoc` int(64) NOT NULL,
  `KichThuoc` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `kichthuoc`
--

INSERT INTO `kichthuoc` (`MaKichThuoc`, `KichThuoc`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MaLoaiSanPham` int(64) NOT NULL,
  `TenLoaiSanPham` varchar(64) NOT NULL,
  `HinhAnh` varchar(68) NOT NULL,
  `TrangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLoaiSanPham`, `TenLoaiSanPham`, `HinhAnh`, `TrangThai`) VALUES
(13, 'Váy', '48dac1485445d148185b01fad689c51f.png', 1),
(14, 'Túi Da', 'cd6f258136203bff92e30969e6cf6ac5.png', 1),
(15, 'Áo Len', '4bbabea7ad75e84259d4245709d68799.png', 1),
(16, 'Boots', '5273ce5df6f1dae6d33e913452224556.png', 1),
(17, 'Quà Tặng', 'af7db9e2bb036dcc816271b5f1711ecd.png', 1),
(18, 'Sneakers', 'e0866bef556637277a05afcc5671d1f2.png', 1),
(19, 'Đồng Hồ', '074845cfd48200c1c5e1f6b1eb0d6f79.png', 1),
(20, 'Nhẫn', '59f9598814641313918224aefa594ba9.png', 1),
(21, 'Mũ', '3ac486d5cc71e0c4ba9842d683bf741a.png', 1),
(22, 'Kính', 'bf113eb9743708b6c0a015af6244a624.png', 1),
(23, 'Baby Shop', 'b550c9cc0bd29addffcd18202fce4997.png', 1),
(24, 'Túi Vải', 'dcfdb153e4872f7dc19ac74dae8d9f35.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `TaiKhoan` varchar(64) NOT NULL,
  `MatKhau` varchar(64) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `HinhAnh` varchar(68) NOT NULL,
  `Quyen` int(1) NOT NULL,
  `TrangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`TaiKhoan`, `MatKhau`, `Email`, `HinhAnh`, `Quyen`, `TrangThai`) VALUES
('conglamjr', '202cb962ac59075b964b07152d234b70', 'lam@gmail.com', '97521690a43f0fd84caf5408ec005e75.webp', 1, 1),
('dat1', 'c4ca4238a0b923820dcc509a6f75849b', 'dat1@gmail.com', 'fbfa1de92cda16c85dcf73106642d1c1.webp', 0, 1),
('lam1', 'c4ca4238a0b923820dcc509a6f75849b', 'lam1234@gmail.com', '11588ec4069829c307513dab4d378127.', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(64) NOT NULL,
  `TenSanPham` varchar(64) NOT NULL,
  `HinhAnh` varchar(69) NOT NULL,
  `GiaGoc` int(64) NOT NULL,
  `GiaKhuyenMai` int(64) NOT NULL,
  `MoTa` varchar(2000) NOT NULL,
  `GioiTinh` varchar(3) NOT NULL,
  `MaKichThuoc` int(64) NOT NULL,
  `MaLoaiSanPham` int(64) NOT NULL,
  `MaHangSanXuat` int(64) NOT NULL,
  `TrangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `HinhAnh`, `GiaGoc`, `GiaKhuyenMai`, `MoTa`, `GioiTinh`, `MaKichThuoc`, `MaLoaiSanPham`, `MaHangSanXuat`, `TrangThai`) VALUES
(10, 'Rainbow Sequin Dress', 'a1539da84d2fe3b0b620249a0729de92.webp', 1299, 699, 'ABC', 'Nữ', 1, 13, 4, 1),
(12, 'Trendy Bucket Hat', '494b1022f3fe78b68d3f9e5a2adbff7c.webp', 1899, 1099, 'ABC', 'Nữ', 1, 13, 6, 1),
(13, 'Boho Maxi Dress', 'fb782ea65c566a7295011bb02ce4835b.webp', 2099, 1099, 'ABC', 'Nữ', 1, 13, 8, 1),
(14, 'Casual Denim Jacket', 'ffb585d634c75a2df0d66d8c1eac85d0.webp', 2099, 1099, 'ABC', 'Nam', 2, 15, 9, 1),
(15, 'Stylish Statement Earrings', '21bce4ca01f2a40cb4ee11eefa7344b5.webp', 2099, 999, 'ABC', 'Nữ', 3, 23, 10, 1),
(16, 'Leather Dress Shoes', '12f7fbf963f769c177c56e99159cd3d2.webp', 1999, 1899, 'ABC', 'Nữ', 2, 13, 11, 1),
(17, 'Wool Peacoat', 'd8b897d466a0bec32c9a9164eb1ab12e.webp', 2599, 1399, 'ABC', 'Nữ', 1, 23, 12, 1),
(18, 'Rainbow Sequin Dress', 'ea91b743c3538c8a7b7a632b798cbf47.webp', 2999, 1699, 'ABC', 'Nam', 2, 15, 16, 1),
(19, ' Rainbow Dress', 'c69f98659ff801c5743101dbbb25c03f.webp', 1299, 699, 'ABC', 'Nữ', 1, 13, 15, 1),
(20, 'Red Sequin Hat', 'cd8383b57dd47a16ea75bfc118135f39.webp', 1399, 799, 'ABC', 'Nữ', 1, 17, 13, 1),
(21, 'Gradient Party Shirt', '2d9a2d9bc2acaf79eed00452a34532b7.webp', 1999, 1099, 'ABC', 'Nữ', 1, 15, 12, 1),
(22, 'Blue Suit', '1e8e217b7e4c575a20093142dcfa5e84.webp', 1099, 599, 'ABC', 'Nam', 2, 18, 11, 1),
(23, 'Feminine Wrap Blouse', 'b7c2831f87a2ea140bac89b1c9a607c1.webp', 999, 699, 'ABC', 'Nữ', 1, 15, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanphamkichthuoc`
--

CREATE TABLE `sanphamkichthuoc` (
  `MaKichThuoc` int(64) NOT NULL,
  `MaSanPham` int(64) NOT NULL,
  `SoLuong` int(64) NOT NULL,
  `BanDuoc` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `sanphamkichthuoc`
--

INSERT INTO `sanphamkichthuoc` (`MaKichThuoc`, `MaSanPham`, `SoLuong`, `BanDuoc`) VALUES
(1, 10, 10, 10),
(1, 12, 20, 0),
(1, 13, 20, 0),
(1, 17, 14, 6),
(1, 19, 11, 9),
(1, 20, 100, 13),
(1, 21, 100, 20),
(1, 23, 20, 0),
(2, 14, 20, 0),
(2, 16, 19, 1),
(2, 18, 20, 0),
(2, 22, 19, 21),
(3, 15, 20, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD PRIMARY KEY (`MaCTGH`,`MaGioHang`,`MaSanPham`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaGioHang`);

--
-- Indexes for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`MaHangSanXuat`);

--
-- Indexes for table `kichthuoc`
--
ALTER TABLE `kichthuoc`
  ADD PRIMARY KEY (`MaKichThuoc`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MaLoaiSanPham`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`TaiKhoan`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`);

--
-- Indexes for table `sanphamkichthuoc`
--
ALTER TABLE `sanphamkichthuoc`
  ADD PRIMARY KEY (`MaKichThuoc`,`MaSanPham`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  MODIFY `MaCTGH` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGioHang` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `MaHangSanXuat` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kichthuoc`
--
ALTER TABLE `kichthuoc`
  MODIFY `MaKichThuoc` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `MaLoaiSanPham` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
