-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2021 at 03:58 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ban_hang`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `sp_taochitietdonhang1`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_taochitietdonhang1` (IN `_iddh` INT, IN `_idsp` INT, IN `_soluong` INT, IN `_Size` INT)  begin
   insert into chitietdonhang(iddh,idsp,soluong,Size) values(_iddh,_idsp,_soluong,_Size);
end$$

DROP PROCEDURE IF EXISTS `sp_taodonhang`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_taodonhang` (IN `_idnd` INT, IN `_hoten` VARCHAR(255) CHARSET utf8, IN `_sodt` VARCHAR(15) CHARSET utf8, IN `_diachi` VARCHAR(255) CHARSET utf8, IN `_hinhthuc` INT, IN `_ghichu` VARCHAR(255) CHARSET utf8, OUT `_iddonhang` INT)  begin
   declare _madh varchar(60);
	 declare _iddh int;
	 set _madh = left(sha1(rand()), 7);
	 insert into donhang(idnd,madh) values(_idnd,_madh);
	 set _iddh = last_insert_id();
	 insert into dathang(iddathang,hoten,sodt,diachi,hinhthuc,ghichu)
	 values(_iddh,_hoten,_sodt,_diachi,_hinhthuc,_ghichu);
	 set _iddonhang = _iddh;
end$$

DROP PROCEDURE IF EXISTS `sp_timkiem`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_timkiem` (IN `_param` VARCHAR(255))  BEGIN
IF CONVERT(_param,DECIMAL) = 0 THEN
SELECT id, ten, gia,giachinh,hinh_anh,thuoc_menu,noi_bat  FROM san_pham WHERE id LIKE CONCAT('%',_param,'%')
OR ten LIKE CONCAT('%',_param,'%');
ELSE
 SELECT id, ten, gia,giachinh,hinh_anh,thuoc_menu,noi_bat  FROM san_pham WHERE gia >= CONVERT(_param,DECIMAL);
END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_timkiemmunudoc`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_timkiemmunudoc` (IN `_param` VARCHAR(255))  BEGIN
SELECT ten FROM menu_doc WHERE ten LIKE CONCAT('%',_param,'%');
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `idctdt` int(11) NOT NULL AUTO_INCREMENT,
  `iddh` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `Size` int(11) NOT NULL,
  PRIMARY KEY (`idctdt`),
  KEY `iddh` (`iddh`),
  KEY `idsp` (`idsp`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`idctdt`, `iddh`, `idsp`, `soluong`, `Size`) VALUES
(31, 4, 48, 2, 3),
(32, 4, 47, 2, 3),
(37, 6, 47, 1, 2),
(38, 6, 48, 2, 2),
(39, 6, 50, 1, 2),
(40, 6, 52, 1, 2),
(50, 11, 47, 1, 2),
(51, 11, 48, 1, 2),
(52, 11, 50, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

DROP TABLE IF EXISTS `dathang`;
CREATE TABLE IF NOT EXISTS `dathang` (
  `iddathang` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `sodt` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinhthuc` int(11) NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`iddathang`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dathang`
--

INSERT INTO `dathang` (`iddathang`, `hoten`, `sodt`, `diachi`, `hinhthuc`, `ghichu`) VALUES
(1, 'Nguyễn Văn Tình', '0909090909', 'ahahaha', 1, ''),
(2, 'Nguyễn Văn Tình', '0909090909', 'ahahaha', 1, 'ahhihihihihih'),
(3, 'Nguyễn Văn Tình', '0909090909', 'ahahaha', 1, ''),
(4, 'Nguyễn Văn Tình', '0909090909', 'ahahaha', 1, ''),
(5, 'Nguyễn Văn ', '1234567', 'ahahaha', 1, ''),
(6, 'Nguyễn Văn Tình', '0909090909', 'ahahaha', 1, ''),
(7, 'Nguyễn Văn ', '1234567', 'ahahaha', 1, ''),
(8, 'Nguyễn Văn ', '1234567', 'ahahaha', 1, ''),
(9, 'Nguyễn Văn ', '1234567', 'ahahaha', 1, ''),
(10, 'Nguyễn Văn ', '1234567', 'ahahaha', 1, ''),
(11, 'Nguyễn Văn Tình', '0909090909', 'ahahaha', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `iddh` int(11) NOT NULL AUTO_INCREMENT,
  `idnd` int(11) NOT NULL,
  `idttdh` int(11) NOT NULL DEFAULT '1',
  `madh` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngayxuly` tinyint(11) DEFAULT '1',
  PRIMARY KEY (`iddh`),
  UNIQUE KEY `madh` (`madh`),
  KEY `idnd` (`idnd`),
  KEY `idttdh` (`idttdh`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`iddh`, `idnd`, `idttdh`, `madh`, `ngaydat`, `ngayxuly`) VALUES
(4, 23, 2, '1048eb4', '2021-12-02 18:22:58', 2),
(6, 23, 1, 'c3bd71c', '2021-12-03 03:19:09', 1),
(11, 23, 1, '40671be', '2021-12-04 15:57:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_doc`
--

DROP TABLE IF EXISTS `menu_doc`;
CREATE TABLE IF NOT EXISTS `menu_doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_doc`
--

INSERT INTO `menu_doc` (`id`, `ten`) VALUES
(1, 'Quần ngố'),
(2, 'Áo sơ mi nam'),
(3, 'Áo Vest body'),
(4, 'Quần Vải'),
(5, 'Quần Jeans'),
(6, 'Quần Kaki'),
(7, 'Áo Phông Nam'),
(8, 'Quần Lót Nam'),
(11, 'Phụ kiện'),
(12, 'Giày ,dép nam'),
(13, 'Ví Nam'),
(14, 'Áo Khoác'),
(15, 'Áo thun,áo len');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `idnd` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `kieu` tinyint(4) DEFAULT '2' COMMENT '1: admin 2: user',
  `sodt` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` tinyint(11) DEFAULT '1' COMMENT '1: Online 2: Offline',
  PRIMARY KEY (`idnd`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`idnd`, `email`, `matkhau`, `hoten`, `kieu`, `sodt`, `diachi`, `trangthai`) VALUES
(5, 'admin1@gmail.com', '$2y$10$NgdFikF38nSKl3RpZ9zh/OQH18Vs5DtAWfkfGu4FG7myAk.Xu4RPG', 'Admin', 1, '0909090909', '', 1),
(7, 'admin3@gmail.com', '$2y$10$HdS2Gk5I4HnGo0E0nC5y4OYfoUFGjCqUaHl5vBu/S58WbPQ0CbFu2', 'Nguyễn Văn Tình', 1, '0376492236', 'xczxc', 1),
(12, 'cojhoang55@gmail.com', '$2y$10$fe4paJKrcXC1Fq69EhQzBecpn9qA4u7KzaSqtuo.uaKwv7UP96ymq', 'Nguyễn Văn Tình', 2, '543210', 'ahahaha', 1),
(16, 'admin4@gmail.com', '$2y$10$4pYN9AkGFEDhnTb5li3WC.fQ/XCr0ym1hi/FKhymcvOS8HMKd6QSS', 'vnt', 2, '54321', 'c111', 1),
(22, 'user@gmail.com', '$2y$10$xgETZQcWsPlaFV1/PXHsxuEj8p1INrp8TzX3TwhRSBHxkWhnMqiTi', 'Nguyễn Văn ', 2, '1234567', 'ahahaha', 1),
(23, 'cojhoang23@gmail.com', '$2y$10$69yunJC8ABTwIT/lDXlObulP/fFo/OSsdYO2HPLzG7QLv5ABYALFm', 'Nguyễn Văn Tình', 2, '0909090909', 'ahahaha', 1);

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

DROP TABLE IF EXISTS `san_pham`;
CREATE TABLE IF NOT EXISTS `san_pham` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(255) DEFAULT '0' COMMENT 'DEFAULT ''0.0000''',
  `giachinh` int(50) DEFAULT NULL,
  `hinh_anh` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `thuoc_menu` int(255) NOT NULL,
  `noi_bat` int(255) DEFAULT NULL,
  `trang_chu` tinyint(11) DEFAULT '1' COMMENT '1: Còn hàng 2: Hết hàng',
  PRIMARY KEY (`id`),
  KEY `san_pham_ibfk_1` (`thuoc_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten`, `gia`, `giachinh`, `hinh_anh`, `noi_dung`, `thuoc_menu`, `noi_bat`, `trang_chu`) VALUES
(45, 'quần short kaki', 120000, 150000, 'fde36c.jpg', '<p>dep qu&aacute; đi</p>\r\n', 6, 50, NULL),
(47, 'Áo vest nam Hàn Quốc', 750000, 800000, 'f4dbd2.jpg', '<p><strong>B&aacute;n đ&uacute;ng gi&aacute; &ndash; Thử tẹt ga &ndash; Mua thoải m&aacute;i</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Chỉ với 670-750k&nbsp;</strong>&nbsp;(&Aacute;o Vest 670-750k, quần &acirc;u 250- 320k)</p>\r\n\r\n<p>Bạn đ&atilde; sở hữu rất nhiều mẫu vest nam gi&aacute; rẻ chất lượng cao&nbsp;<strong>tr&ecirc;n thị trường c&oacute; gi&aacute; 1300-1500k</strong></p>\r\n\r\n<p>Rất th&iacute;ch hợp với những bạn l&agrave;m văn ph&ograve;ng, trong m&ugrave;a cưới. Được chọn lựa kỹ từng chất vải, may theo d&acirc;y truyền c&ocirc;ng nghệ cao sẽ đem lại cho c&aacute;c bạn những sản phẩm chất lượng cao, d&aacute;ng &ocirc;m body trẻ theo phong c&aacute;ch h&agrave;n quốc, những chiếc &aacute;o vec nam đẹp v&agrave; gi&aacute; th&agrave;nh rẻ nhất. H&atilde;y đến tận nơi cản nhận v&agrave; mặc thử.</p>\r\n', 3, 10, 1),
(48, 'quần Âu nam Hàn Quốc', 250000, 300000, 'cdd274.jpg', '<p><strong>B&aacute;n đ&uacute;ng gi&aacute; &ndash; Thử tẹt ga &ndash; Mua thoải m&aacute;i</strong></p>\r\n\r\n<p><strong>Với 4 mức gi&aacute; 250- 270-290-320k</strong></p>\r\n\r\n<p>Shop c&oacute; rất nhiều mẫu <strong>quần t&acirc;y, quần &acirc;u</strong><strong>, </strong><strong>quần vải </strong>nam gi&aacute; rẻ chất lượng cao , đặc biệt với 320k l&agrave; chất vải tốt nhất d&ugrave;ng chung với vải may Vest tr&ecirc;n thị trường đang b&aacute;n khoảng 500k 1 quần</p>\r\n\r\n<p>Rất th&iacute;ch hợp với những bạn l&agrave;m văn ph&ograve;ng, c&ocirc;ng sở chỉ với 250k bạn đ&atilde; c&oacute; được chiếc quần &acirc;u may d&aacute;ng h&agrave;n quốc chất lượng cao cấp</p>\r\n', 15, 55, 1),
(49, 'quần jeans trất', 290000, 350000, 'fde36c.jpg', '<h1>quần b&ograve; ( jean) &nbsp;ống c&ocirc;n 58</h1>\r\n', 5, 60, 1),
(50, 'Áo phông trất sky', 120000, 150000, 'efb8cb.jpg', '<h1>&Aacute;o ph&ocirc;ng phong c&aacute;ch</h1>\r\n', 7, 90, 1),
(52, 'thắt lưng lịch lãm', 100000, 120000, '5e8435.jpg', '<p>thắt lưng cho nhưng ai kh&oacute; khăn trong việc chọn quần.</p>\r\n', 11, 101, 1),
(53, 'Giầy da công sở', 300000, 350000, '85ea68.jpg', '<p><strong>thật chụp tại shop - B&aacute;n đ&uacute;ng gi&aacute; thử tẹt ga</strong></p>\r\n\r\n<p>Li&ecirc;n hệ số điện thoại<strong>&nbsp;</strong><strong>0983.982.821 (Sms/ Zalo) để check Size</strong></p>\r\n', 12, 66, 1),
(54, 'Ví da phái mạnh', 300000, 350000, '971b54.jpg', '<p><strong>thật chụp tại shop - B&aacute;n đ&uacute;ng gi&aacute; thử tẹt ga</strong></p>\r\n\r\n<p>Li&ecirc;n hệ số điện thoại<strong>&nbsp;</strong><strong>0983.982.821 (Sms/ Zalo) để check Size</strong></p>\r\n', 15, 78, 1),
(56, 'Áo Sơ Mi Sọc', 150000, 200000, 'd3535b.jpg', '<p><strong>Ảnh thật chụp tại shop - B&aacute;n đ&uacute;ng gi&aacute; - Thử tẹt ga</strong></p>\r\n\r\n<p><strong>&Aacute;o sơ mi nam</strong>&nbsp;của ch&uacute;ng t&ocirc;i bao gồm sơ mi trơn, sọc caro đến sơ mi phối họa tiết được thiết kế đa dạng&nbsp;: &Aacute;o sơ mi d&agrave;i tay nam, &aacute;o sơ mi ngắn tay nam, sơ mi trắng, sơ mi c&ocirc;ng sở</p>\r\n\r\n<p>Được chọn lựa kỹ từng chất vải, may theo d&acirc;y truyền c&ocirc;ng nghệ cao sẽ đem lại cho c&aacute;c bạn những sản phẩm chất lượng cao những chiếc &aacute;o nam đẹp v&agrave; gi&aacute; th&agrave;nh rẻ nhất. H&atilde;y đến tận nơi cản nhận v&agrave; mặc thử.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 2, 81, 1),
(57, 'Áo Sơ Mi Cộc Tay', 199990, 249999, '0d01eb.jpg', '<p><strong>Ảnh thật chụp tại shop - B&aacute;n đ&uacute;ng gi&aacute; - Thử tẹt ga</strong></p>\r\n\r\n<p><strong>&Aacute;o sơ mi nam</strong>&nbsp;của ch&uacute;ng t&ocirc;i bao gồm sơ mi trơn, sọc caro đến sơ mi phối họa tiết được thiết kế đa dạng&nbsp;: &Aacute;o sơ mi d&agrave;i tay nam, &aacute;o sơ mi ngắn tay nam, sơ mi trắng, sơ mi c&ocirc;ng sở</p>\r\n\r\n<p>Được chọn lựa kỹ từng chất vải, may theo d&acirc;y truyền c&ocirc;ng nghệ cao sẽ đem lại cho c&aacute;c bạn những sản phẩm chất lượng cao những chiếc &aacute;o nam đẹp v&agrave; gi&aacute; th&agrave;nh rẻ nhất. H&atilde;y đến tận nơi cản nhận v&agrave; mặc thử.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 2, 77, 1),
(58, 'Áo sơ mi kẻ tay', 300000, 350000, 'fdc1c0.jpg', '<p><strong>Ảnh thật chụp tại shop - B&aacute;n đ&uacute;ng gi&aacute; - Thử tẹt ga</strong></p>\r\n\r\n<p><strong>&Aacute;o sơ mi nam</strong>&nbsp;của ch&uacute;ng t&ocirc;i bao gồm sơ mi trơn, sọc caro đến sơ mi phối họa tiết được thiết kế đa dạng&nbsp;: &Aacute;o sơ mi d&agrave;i tay nam, &aacute;o sơ mi ngắn tay nam, sơ mi trắng, sơ mi c&ocirc;ng sở</p>\r\n\r\n<p>Được chọn lựa kỹ từng chất vải, may theo d&acirc;y truyền c&ocirc;ng nghệ cao sẽ đem lại cho c&aacute;c bạn những sản phẩm chất lượng cao những chiếc &aacute;o nam đẹp v&agrave; gi&aacute; th&agrave;nh rẻ nhất. H&atilde;y đến tận nơi cản nhận v&agrave; mặc thử.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 2, 56, 1),
(59, 'Áo Khoác nam Mangto', 450000, 499999, '816b88.png', '<p>&Aacute;o kho&aacute;c nam &nbsp;Mangto Kaki&nbsp;0014</p>\r\n', 14, 78, NULL),
(60, 'Áo len cardigan trơn', 250000, 199999, 'c3d359.jpg', '<p>&aacute;o len cardigan trơn</p>\r\n', 15, 45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

DROP TABLE IF EXISTS `slideshow`;
CREATE TABLE IF NOT EXISTS `slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hinh` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `lienket` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `hinh`, `lienket`) VALUES
(8, '7c03a2.jpg', ''),
(9, '5b317c.jpg', ''),
(10, '646ee3.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrangdonhang`
--

DROP TABLE IF EXISTS `tinhtrangdonhang`;
CREATE TABLE IF NOT EXISTS `tinhtrangdonhang` (
  `idttdh` int(11) NOT NULL AUTO_INCREMENT,
  `tentt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idttdh`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tinhtrangdonhang`
--

INSERT INTO `tinhtrangdonhang` (`idttdh`, `tentt`) VALUES
(1, 'Chưa Thanh Toán'),
(2, 'Đã Thanh Toán');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_soluongsp1`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_soluongsp1`;
CREATE TABLE IF NOT EXISTS `v_soluongsp1` (
`id` int(11)
,`ten` varchar(256)
,`soluong` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `v_soluongsp1`
--
DROP TABLE IF EXISTS `v_soluongsp1`;

DROP VIEW IF EXISTS `v_soluongsp1`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_soluongsp1`  AS  select `menu_doc`.`id` AS `id`,`menu_doc`.`ten` AS `ten`,count(`san_pham`.`id`) AS `soluong` from (`menu_doc` join `san_pham` on((`menu_doc`.`id` = `san_pham`.`thuoc_menu`))) group by `menu_doc`.`id` ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`iddh`) REFERENCES `donhang` (`iddh`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`idsp`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`idnd`) REFERENCES `nguoidung` (`idnd`) ON DELETE CASCADE,
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`idttdh`) REFERENCES `tinhtrangdonhang` (`idttdh`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`thuoc_menu`) REFERENCES `menu_doc` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
