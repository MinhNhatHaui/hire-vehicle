-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 14, 2018 lúc 06:58 PM
-- Phiên bản máy phục vụ: 5.7.22-0ubuntu0.16.04.1
-- Phiên bản PHP: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thuexe1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdatxe`
--

CREATE TABLE `ctdatxe` (
  `madatxe` int(11) NOT NULL,
  `maxe` int(11) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `tao_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `capnhat_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctnhapxe`
--

CREATE TABLE `ctnhapxe` (
  `maphieu` int(11) NOT NULL,
  `maxe` int(11) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `dongia` int(11) DEFAULT NULL,
  `tao_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `capnhat_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctquyen`
--

CREATE TABLE `ctquyen` (
  `id` int(11) NOT NULL,
  `maquyen` int(11) NOT NULL,
  `ngaybd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ngaykt` timestamp NULL DEFAULT NULL,
  `tao_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `capnhat_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datxe`
--

CREATE TABLE `datxe` (
  `id` int(11) NOT NULL,
  `maxe` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `ngaydat` date DEFAULT NULL,
  `ngaytra` date DEFAULT NULL,
  `lienhe` varchar(20) DEFAULT NULL,
  `tao_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `capnhat_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gia`
--

CREATE TABLE `gia` (
  `lancapnhat` int(11) NOT NULL,
  `maxe` int(11) NOT NULL,
  `ngaycapnhat` date DEFAULT NULL,
  `gia` varchar(50) DEFAULT NULL,
  `tao_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `capnhat_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloaixe` varchar(20) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `tao_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `capnhat_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloaixe`, `slug`, `tao_luc`, `capnhat_luc`) VALUES
(1, 'Xe máy', 'xe-may', '2018-05-09 15:46:54', '2018-05-09 15:46:54'),
(2, 'Xe đạp điện', 'xe-dap-dien', '2018-05-09 15:48:53', '2018-05-09 15:48:53'),
(3, 'Xe đạp', 'xe-dap', '2018-05-09 16:10:39', '2018-05-09 16:10:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhapxe`
--

CREATE TABLE `nhapxe` (
  `maphieu` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `ngaynhap` date NOT NULL,
  `tao_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `capnhat_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantrivien`
--

CREATE TABLE `quantrivien` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `hinhanh` varchar(150) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `gioitinh` varchar(10) DEFAULT NULL,
  `diachi` varchar(150) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `socmnd` char(20) DEFAULT NULL,
  `id_quyen` int(11) DEFAULT '1',
  `tao_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `capnhat_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `quantrivien`
--

INSERT INTO `quantrivien` (`id`, `name`, `hinhanh`, `password`, `phone`, `gioitinh`, `diachi`, `ngaysinh`, `socmnd`, `id_quyen`, `tao_luc`, `capnhat_luc`, `token`) VALUES
(1222459, '1', 'manager.png', '1679091c5a880faf6fb5e6087eb1b2dc', '23', 'nu', '1', '2018-05-25', '15', 1, '2018-05-06 13:26:52', '2018-05-08 15:32:41', NULL),
(1222462, 'namvd', '28951100_2006842142865274_4748326335615598592_n.jpg', 'b24331b1a138cde62aa1f679164fc62f', '01235647889', 'nam', '112 Nguyễn Văn Cừ, Long Biên HÀ Nội', '2018-06-13', '1458799665', 1, '2018-06-10 08:38:29', '2018-06-10 08:38:29', NULL),
(1222463, 'hquan123', '28951100_2006842142865274_4748326335615598592_n.jpg', '47bce5c74f589f4867dbd57e9ca9f808', '095996488', 'nam', '112 Nguyễn Văn Cừ, Long Biên HÀ Nội', '2018-06-12', '456564', 1, '2018-06-11 04:49:48', '2018-06-11 04:49:48', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `maquyen` int(11) NOT NULL,
  `tenquyen` varchar(50) DEFAULT NULL,
  `tao_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `capnhat_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `maxe` int(11) DEFAULT NULL,
  `hoten` varchar(50) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `sdt` char(20) DEFAULT NULL,
  `diachi` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(10) DEFAULT NULL,
  `socmnd` char(20) DEFAULT NULL,
  `ngaydat` datetime DEFAULT NULL,
  `ngaytra` datetime DEFAULT NULL,
  `ghichu` varchar(169) DEFAULT NULL,
  `tao_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `capnhat_luc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `maxe`, `hoten`, `soluong`, `status`, `sdt`, `diachi`, `email`, `ngaysinh`, `gioitinh`, `socmnd`, `ngaydat`, `ngaytra`, `ghichu`, `tao_luc`, `capnhat_luc`) VALUES
(6, 2220, 'a', 1, 0, '12331132', '123132', 'ádasd', '2018-06-04', 'nam', '3123123', '2018-06-15 00:00:00', '2018-06-23 00:00:00', '', '2018-06-13 08:33:05', '2018-06-14 04:07:21'),
(7, 2220, 'a', 1, 1, '12331132', '123132', 'ádasd', '2018-06-04', 'nam', '3123123', '2018-06-15 00:00:00', '2018-06-23 00:00:00', '', '2018-06-13 08:57:54', '2018-06-13 08:58:06'),
(8, 122, 'gugu', 1, 0, '1485369', 'huyen Thuy Duong Hai Phuong', 'gui@gmail.com', '2018-06-08', 'nam', '147853699', '2018-06-17 00:00:00', '2018-06-21 00:00:00', 'that\'s good for both of us to know you\'ll ship free ', '2018-06-14 03:54:10', '2018-06-14 04:07:41'),
(9, 122, 'rrrrr', 1, 0, '1123', 'regredfg ', 'eee', '2018-06-16', 'nu', '32424234', '2018-06-23 00:00:00', '2018-06-19 00:00:00', '', '2018-06-14 09:27:47', '2018-06-14 09:27:47'),
(10, 2220, 'rrrrr', 1, 0, '1123', 'regredfg ', 'eee', '2018-06-16', 'nu', '32424234', '2018-06-23 00:00:00', '2018-06-19 00:00:00', '', '2018-06-14 09:27:47', '2018-06-14 09:27:47'),
(11, 2220, 'ưewr', 1, 0, '234324', '22154', '234243', '2018-06-07', 'nam', '32424', '2018-06-16 00:00:00', '2018-06-23 00:00:00', '', '2018-06-14 09:34:47', '2018-06-14 09:34:47'),
(12, 122, 'ưewr', 1, 0, '234324', 'ưewr', '234243', '2018-06-07', 'nam', '32424', '2018-06-16 02:06:00', '2018-06-22 19:08:00', '', '2018-06-14 14:33:21', '2018-06-14 14:33:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xe`
--

CREATE TABLE `xe` (
  `id` int(11) NOT NULL,
  `maxe` int(11) NOT NULL,
  `tenxe` varchar(50) NOT NULL,
  `maloai` int(11) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `view_times` tinyint(4) DEFAULT '0',
  `dong_co` varchar(50) DEFAULT NULL,
  `cong_suat` varchar(50) DEFAULT NULL,
  `dung_tich_xang` varchar(50) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `hinhanh` varchar(100) DEFAULT NULL,
  `tao_luc` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `capnhat_luc` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `xe`
--

INSERT INTO `xe` (`id`, `maxe`, `tenxe`, `maloai`, `slug`, `gia`, `status`, `view_times`, `dong_co`, `cong_suat`, `dung_tich_xang`, `soluong`, `hinhanh`, `tao_luc`, `capnhat_luc`) VALUES
(1, 122, 'Yamaha Vilux', 1, 'yamaha-vilux', 150000, 1, 0, 'dung tích 113,7 cc', 'tối đa 5,80KW tại vòng tua 8000 vòng/phút', '5.5 L', 11, '8b411116916818e2cf93e40fb0154a8d45b-1.jpg.jpeg', '2018-05-09 16:03:43', '2018-06-13 03:36:14'),
(2, 2224, 'Yamaha Acrozo', 1, 'yamaha-acrozo', 150000, 1, 0, 'dung tích 113,7 cc', 'tối đa 5,80KW tại vòng tua 8000 vòng/phút', '5.5 L', 11, '', '2018-05-09 16:15:18', '2018-06-13 07:46:17'),
(4, 2220, 'Yamaha Acrozo', 1, 'yamaha-acrozo', 150000, 1, 0, 'dung tích 113,7 cc', 'tối đa 5,80KW tại vòng tua 8000 vòng/phút', '5.5 L', 11, 'XMGR1.jpg.jpeg', '2018-05-09 16:20:51', '2018-06-13 03:34:22'),
(5, 2220, 'Yamaha Acrozo', 1, 'yamaha-acrozo', 150000, 1, 0, 'dung tích 113,7 cc', 'tối đa 5,80KW tại vòng tua 8000 vòng/phút', '5.5 L', 11, 'XMGR1.jpg.jpeg', '2018-05-14 08:53:36', '2018-06-13 03:34:22'),
(6, 2220, 'Yamaha Acrozo', 1, 'yamaha-acrozo', 150000, 1, 0, 'dung tích 113,7 cc', 'tối đa 5,80KW tại vòng tua 8000 vòng/phút', '5.5 L', 11, 'XMGR1.jpg.jpeg', '2018-05-14 08:54:14', '2018-06-14 04:07:21'),
(7, 222, 'Yamaha Acrozo', 1, 'yamaha-acrozo', 150000, 1, 0, 'dung tích 113,7 cc', 'tối đa 5,80KW tại vòng tua 8000 vòng/phút', '5.5 L', 10, '', '2018-05-09 16:30:33', '2018-06-13 08:58:06'),
(8, 2220, 'Yamaha Acrozo', 1, 'yamaha-acrozo', 150000, 1, 0, 'dung tích 113,7 cc', 'tối đa 5,80KW tại vòng tua 8000 vòng/phút', '5.5 L', 11, 'XMGR1.jpg.jpeg', '2018-05-09 16:28:53', '2018-06-14 04:07:41'),
(9, 2220, 'Yamaha Acrozo', 1, 'yamaha-acrozo', 150000, 1, 0, 'dung tích 113,7 cc', 'tối đa 5,80KW tại vòng tua 8000 vòng/phút', '5.5 L', 11, 'XMGR1.jpg.jpeg', '2018-05-09 16:28:02', '2018-06-13 03:34:22'),
(10, 2220, 'Yamaha Acrozo', 1, 'yamaha-acrozo', 150000, 1, 0, 'dung tích 113,7 cc', 'tối đa 5,80KW tại vòng tua 8000 vòng/phút', '5.5 L', 11, 'XMGR1.jpg.jpeg', '2018-05-09 16:26:29', '2018-06-13 03:34:22'),
(11, 2220, 'Yamaha Acrozo', 1, 'yamaha-acrozo', 150000, 1, 0, 'dung tích 113,7 cc', 'tối đa 5,80KW tại vòng tua 8000 vòng/phút', '5.5 L', 11, 'XMGR1.jpg.jpeg', '2018-05-09 16:33:20', '2018-06-13 03:34:22'),
(12, 2220, 'Yamaha Acrozo', 1, 'yamaha-acrozo', 150000, 1, 0, 'dung tích 113,7 cc', 'tối đa 5,80KW tại vòng tua 8000 vòng/phút', '5.5 L', 11, 'XMGR1.jpg.jpeg', '2018-05-09 16:32:55', '2018-06-13 03:34:22'),
(13, 2220, 'Yamaha Acrozo', 1, 'yamaha-acrozo', 150000, 1, 0, 'dung tích 113,7 cc', 'tối đa 5,80KW tại vòng tua 8000 vòng/phút', '5.5 L', 11, 'XMGR1.jpg.jpeg', '2018-05-09 16:32:25', '2018-06-13 03:34:22'),
(14, 2220, 'Yamaha Acrozo', 1, 'yamaha-acrozo', 150000, 1, 0, 'dung tích 113,7 cc', 'tối đa 5,80KW tại vòng tua 8000 vòng/phút', '5.5 L', 11, 'XMGR1.jpg.jpeg', '2018-05-09 16:31:28', '2018-06-13 03:34:22'),
(15, 123, '345', 1, '345', 890, 1, 0, '', '', '', 121, 'Do-Vanh-duc-7.png', '2018-06-13 02:57:46', '2018-06-13 03:33:34'),
(16, 2, 'ád', 1, 'ad', 100, 1, 0, '', '', '', 12, '56df9d72eb203_1457495410.jpg.jpeg', '2018-06-13 03:55:04', '2018-06-13 03:55:04'),
(17, 1234, 'dsdfsd', 2, 'dsdfsd', 120000, 1, 0, NULL, NULL, NULL, 123, 'xe-dap-dien-bmx-classic-nhun-sau-18-inch752.jpg', '2018-06-13 03:57:55', '2018-06-13 04:07:19'),
(18, 1, '2', 3, '2', 40000, 1, 0, NULL, NULL, NULL, 5, '418_Xe-dap-the-thao-nu-GIANT-MOMENTUM-INEED-1500.jpg.jpeg', '2018-06-13 04:13:58', '2018-06-13 04:19:51'),
(19, 1, '2', 3, '2', 4, 1, 0, NULL, NULL, NULL, 3, '26648228_2304289323988_115265677_n.png', '2018-06-13 04:14:43', '2018-06-13 04:19:48'),
(20, 36, '4', 3, '4', 80000, 1, 0, NULL, NULL, NULL, 22, '', '2018-06-13 04:16:14', '2018-06-13 07:47:24'),
(21, 12336, 'wewer ', 2, 'wewer', 120000, 1, 0, NULL, NULL, NULL, 4, '', '2018-06-13 07:46:59', '2018-06-13 07:47:10');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ctdatxe`
--
ALTER TABLE `ctdatxe`
  ADD PRIMARY KEY (`maxe`,`madatxe`);

--
-- Chỉ mục cho bảng `ctnhapxe`
--
ALTER TABLE `ctnhapxe`
  ADD PRIMARY KEY (`maphieu`,`maxe`),
  ADD KEY `fk3` (`maxe`);

--
-- Chỉ mục cho bảng `ctquyen`
--
ALTER TABLE `ctquyen`
  ADD PRIMARY KEY (`id`,`maquyen`,`ngaybd`),
  ADD KEY `fk99` (`maquyen`);

--
-- Chỉ mục cho bảng `datxe`
--
ALTER TABLE `datxe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maxe` (`maxe`);

--
-- Chỉ mục cho bảng `gia`
--
ALTER TABLE `gia`
  ADD PRIMARY KEY (`lancapnhat`,`maxe`),
  ADD KEY `maxe` (`maxe`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `nhapxe`
--
ALTER TABLE `nhapxe`
  ADD PRIMARY KEY (`maphieu`),
  ADD KEY `fk20` (`id`);

--
-- Chỉ mục cho bảng `quantrivien`
--
ALTER TABLE `quantrivien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`maquyen`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maxe` (`maxe`);

--
-- Chỉ mục cho bảng `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_maloai` (`maloai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ctquyen`
--
ALTER TABLE `ctquyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `datxe`
--
ALTER TABLE `datxe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhapxe`
--
ALTER TABLE `nhapxe`
  MODIFY `maphieu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quantrivien`
--
ALTER TABLE `quantrivien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1222464;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `xe`
--
ALTER TABLE `xe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ctnhapxe`
--
ALTER TABLE `ctnhapxe`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`maphieu`) REFERENCES `nhapxe` (`maphieu`);

--
-- Các ràng buộc cho bảng `ctquyen`
--
ALTER TABLE `ctquyen`
  ADD CONSTRAINT `fk99` FOREIGN KEY (`maquyen`) REFERENCES `quyen` (`maquyen`);

--
-- Các ràng buộc cho bảng `gia`
--
ALTER TABLE `gia`
  ADD CONSTRAINT `gia_ibfk_1` FOREIGN KEY (`maxe`) REFERENCES `xe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id`) REFERENCES `xe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
