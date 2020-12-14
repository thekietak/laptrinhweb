-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 09, 2020 lúc 03:16 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kiet`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ban`
--

DROP TABLE IF EXISTS `ban`;
CREATE TABLE IF NOT EXISTS `ban` (
  `Id_ban` int(11) NOT NULL AUTO_INCREMENT,
  `id_vitri` int(11) NOT NULL,
  `number_ban` varchar(5) NOT NULL,
  `ghichu` text,
  `image` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`Id_ban`),
  KEY `id_vitri` (`id_vitri`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ban`
--

INSERT INTO `ban` (`Id_ban`, `id_vitri`, `number_ban`, `ghichu`, `image`) VALUES
(1, 2, '01', NULL, 'silde2.jpg'),
(2, 2, '02', NULL, 'slide0.jpg'),
(3, 2, '03', NULL, 'slide1.jpg'),
(4, 2, '04', NULL, 'slide3.jpg'),
(5, 2, '05', NULL, 'restaurant-691397.jpg'),
(6, 1, 'Vip1', NULL, 'Vip1.JPG'),
(7, 1, 'Vip2', NULL, 'Vip2.JPG'),
(8, 1, 'Vip3', NULL, 'Vip3.JPG'),
(9, 1, 'Vip5', NULL, 'Vip5.JPG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mon` bigint(20) NOT NULL,
  `sesid` varchar(255) NOT NULL,
  `name_mon` varchar(300) NOT NULL,
  `gia_mon` double NOT NULL,
  `soluong` int(11) NOT NULL,
  `images` varchar(200) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

DROP TABLE IF EXISTS `dichvu`;
CREATE TABLE IF NOT EXISTS `dichvu` (
  `id_dichvu` int(11) NOT NULL AUTO_INCREMENT,
  `Name_dichvu` varchar(50) NOT NULL,
  `Gia_dichvu` double NOT NULL,
  `ghichu` text,
  PRIMARY KEY (`id_dichvu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`id_dichvu`, `Name_dichvu`, `Gia_dichvu`, `ghichu`) VALUES
(1, 'Trang trí ', 0, NULL),
(2, 'Karaoke', 500000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdong`
--

DROP TABLE IF EXISTS `hopdong`;
CREATE TABLE IF NOT EXISTS `hopdong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sesis` varchar(255) NOT NULL,
  `id_mon` int(11) NOT NULL,
  `name_mon` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` double NOT NULL,
  `images` varchar(255) NOT NULL,
  `tinhtrang` int(11) NOT NULL DEFAULT '0',
  `thanhtien` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hopdong`
--

INSERT INTO `hopdong` (`id`, `sesis`, `id_mon`, `name_mon`, `id_user`, `soluong`, `gia`, `images`, `tinhtrang`, `thanhtien`) VALUES
(40, '3h3ns7flekhgrr454cu9vvqsgk', 78, 'Quáº§n nam Ä‘áº¹p vá»«a', 12, 2, 150000, 'ba8845f9df.jpg', 0, '300000'),
(41, '3h3ns7flekhgrr454cu9vvqsgk', 76, 'Quáº§n nam Ä‘áº¹p', 12, 1, 200000, 'dcb566a42f.jpg', 0, '200000'),
(42, '3h3ns7flekhgrr454cu9vvqsgk', 83, 'Ão nam Ä‘áº¹p', 12, 1, 200000, '69117dded8.jpg', 0, '200000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

DROP TABLE IF EXISTS `khach_hang`;
CREATE TABLE IF NOT EXISTS `khach_hang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) NOT NULL,
  `users` varchar(15) NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `gioitinh` int(1) NOT NULL,
  `solandat` int(11) DEFAULT NULL,
  `ghichu` text,
  `passwords` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten`, `users`, `phone`, `email`, `gioitinh`, `solandat`, `ghichu`, `passwords`) VALUES
(12, 'Kiá»‡t', 'Kiet1', '123456789', 'kiet@gmail.com', 1, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

DROP TABLE IF EXISTS `khuyenmai`;
CREATE TABLE IF NOT EXISTS `khuyenmai` (
  `id_km` int(11) NOT NULL AUTO_INCREMENT,
  `name_km` varchar(300) CHARACTER SET utf8mb4 NOT NULL,
  `time_star` date DEFAULT NULL,
  `time_end` date DEFAULT NULL,
  `discout` double DEFAULT NULL,
  `ghichu` text,
  `images` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_km`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`id_km`, `name_km`, `time_star`, `time_end`, `discout`, `ghichu`, `images`) VALUES
(4, 'Tri Ã¢n khÃ¡ch hÃ ng ', '2020-11-12', '2020-11-20', 50, ' ', '8a5ae5a5bd.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

DROP TABLE IF EXISTS `loaisp`;
CREATE TABLE IF NOT EXISTS `loaisp` (
  `id_loai` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) NOT NULL,
  `ghichu` text NOT NULL,
  PRIMARY KEY (`id_loai`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`id_loai`, `ten`, `ghichu`) VALUES
(18, 'Quáº§n nam', ''),
(19, 'Quáº§n ná»¯', ''),
(20, 'Ão nam', ''),
(21, 'Ão ná»¯', ''),
(22, 'GiÃ y', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ten` varchar(300) NOT NULL,
  `id_loai` int(11) NOT NULL,
  `gia` double NOT NULL,
  `ghichu` text,
  `images` varchar(300) DEFAULT NULL,
  `tinhtrang` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_loai` (`id_loai`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten`, `id_loai`, `gia`, `ghichu`, `images`, `tinhtrang`) VALUES
(76, 'Quáº§n nam Ä‘áº¹p', 18, 200000, '', 'dcb566a42f.jpg', 1),
(77, 'Quáº§n nam Ä‘áº¹p Ä‘áº¹p', 18, 100000, '', '993966c761.jpg', 1),
(78, 'Quáº§n nam Ä‘áº¹p vá»«a', 18, 150000, '', 'ba8845f9df.jpg', 1),
(79, 'Quáº§n Ä‘áº¹p nhiá»u', 18, 50000, '', '38e835703f.jpg', 1),
(80, 'Quáº§n Ä‘áº¹p Ã­t', 18, 300000, '', '1b4c5d6cee.jpg', 1),
(81, 'Quáº§n Ä‘áº¹p Ã­t ', 18, 300000, '', '8de345dace.jpg', 1),
(82, 'Quáº§n xáº¥u', 18, 500, '', '0cd87e8737.jpg', 1),
(83, 'Ão nam Ä‘áº¹p', 20, 200000, '', '69117dded8.jpg', 1),
(84, 'Ão nam Ä‘áº¹p nha', 20, 100000, '', 'ea5b6815f2.jpg', 1),
(85, 'Ão nam Ä‘áº¹p vá»«a ', 20, 50000, '', '76e0eac3e7.jpg', 1),
(86, 'Ão nam cÅ©ng Ä‘Æ°á»£c ', 20, 100000, '', '91a220ab85.jpg', 1),
(87, 'Máº¯c vÃ o Ä‘áº¹p ', 20, 500000, '', '15cd8325cc.jpg', 1),
(88, 'máº·c vá»›i bá»“ ', 20, 200000, '', '89ccd596d8.jpg', 1),
(89, 'Máº·c cÅ©ng Ä‘áº¹p', 19, 200000, '', '73ec5b424b.jpg', 1),
(90, 'Máº·c Ä‘i rá»“i biáº¿t ', 21, 100000, '', '259beb68de.jpg', 1),
(91, 'GiÃ¡ ráº½ ', 21, 200000, '', 'aeffa9a510.jpg', 1),
(92, 'sida', 21, 50000, '', 'c37dda3c7a.jpg', 1),
(93, 'táº¡m Ä‘Æ°á»£c ', 21, 300000, '', '5b23aaddab.jpg', 1),
(94, 'Quáº§n ráº½ ', 19, 200000, '', 'edfa651261.jpg', 1),
(95, 'Mua Ä‘i rá»“i biáº¿t ', 19, 300000, '', 'e69f00603c.jpg', 1),
(96, 'GiÃ y ráº½ ', 22, 200000, '', '51df3703b9.jpg', 1),
(97, 'GiÃ y xáº¥u ', 22, 100000, '', '5c02239504.jpg', 1),
(98, 'Cho thÃ¬ láº¥y ', 22, 500, '', '53754f3b3d.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `Name_admin` varchar(255) NOT NULL,
  `adminuser` varchar(155) NOT NULL,
  `adminpass` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `Name_admin`, `adminuser`, `adminpass`, `level`) VALUES
(1, 'Ngan', 'Ngan', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vitri`
--

DROP TABLE IF EXISTS `vitri`;
CREATE TABLE IF NOT EXISTS `vitri` (
  `id_vitri` int(11) NOT NULL AUTO_INCREMENT,
  `Name_vitri` varchar(5) NOT NULL,
  `Ghichu` text,
  `image` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_vitri`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `vitri`
--

INSERT INTO `vitri` (`id_vitri`, `Name_vitri`, `Ghichu`, `image`) VALUES
(1, 'Vip', NULL, 'Vip3.JPG'),
(2, 'Sảnh ', NULL, 'silde2.jpg');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ban`
--
ALTER TABLE `ban`
  ADD CONSTRAINT `ban_ibfk_1` FOREIGN KEY (`id_vitri`) REFERENCES `vitri` (`id_vitri`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_loai`) REFERENCES `loaisp` (`id_loai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
