-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 12, 2021 lúc 02:41 AM
-- Phiên bản máy phục vụ: 5.7.34
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lequocda_die122`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `id_xep` int(11) DEFAULT NULL,
  `namectk` text CHARACTER SET utf8 COLLATE utf8_swedish_ci,
  `namestk` text CHARACTER SET utf8 COLLATE utf8_swedish_ci,
  `img` text CHARACTER SET utf8 COLLATE utf8_swedish_ci,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_buft`
--

CREATE TABLE `history_buft` (
  `id` int(11) NOT NULL,
  `username` varchar(999) NOT NULL,
  `type` varchar(999) DEFAULT NULL,
  `hinhthuc_buff` varchar(999) DEFAULT NULL,
  `soluong` varchar(999) DEFAULT NULL,
  `tong_tien` varchar(999) DEFAULT NULL,
  `link_buft` varchar(999) DEFAULT NULL,
  `server_buft` varchar(999) DEFAULT NULL,
  `note_buft` text CHARACTER SET utf8 COLLATE utf8_swedish_ci,
  `noye_cmt` text CHARACTER SET utf8 COLLATE utf8_swedish_ci,
  `status` varchar(999) DEFAULT NULL,
  `stt_admin` varchar(999) DEFAULT NULL,
  `da_buft` varchar(999) DEFAULT NULL,
  `ma_gd` varchar(999) DEFAULT NULL,
  `date` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `history_buft`
--

INSERT INTO `history_buft` (`id`, `username`, `type`, `hinhthuc_buff`, `soluong`, `tong_tien`, `link_buft`, `server_buft`, `note_buft`, `noye_cmt`, `status`, `stt_admin`, `da_buft`, `ma_gd`, `date`) VALUES
(36, 'lequocdat', 'sub_sale', 'LOGIN WEB', '1000', '3000', '100038078229765', 'sv1', '', NULL, 'Pause', NULL, '0', 'ORDER_X6L4FKD2SH56953', '07-10-2021 01:12:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_naptien`
--

CREATE TABLE `history_naptien` (
  `id` int(11) NOT NULL,
  `type` varchar(999) NOT NULL,
  `username` varchar(999) NOT NULL,
  `loaithe` varchar(999) DEFAULT NULL,
  `menhgia` varchar(999) NOT NULL,
  `sothe` varchar(999) DEFAULT NULL,
  `soseri` varchar(999) DEFAULT NULL,
  `thucnhan` varchar(999) DEFAULT NULL,
  `trangthai` varchar(999) NOT NULL,
  `date` varchar(999) DEFAULT NULL,
  `namemomo` text CHARACTER SET utf8 COLLATE utf8_swedish_ci,
  `phonemomo` varchar(999) DEFAULT NULL,
  `tranid` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_sitecon`
--

CREATE TABLE `list_sitecon` (
  `id_site` int(11) NOT NULL,
  `username` varchar(999) NOT NULL,
  `domain` varchar(999) NOT NULL,
  `token` varchar(999) DEFAULT NULL,
  `ip` varchar(999) NOT NULL,
  `date` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log_site`
--

CREATE TABLE `log_site` (
  `id` int(11) NOT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_swedish_ci,
  `ip` varchar(999) DEFAULT NULL,
  `date` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `log_site`
--

INSERT INTO `log_site` (`id`, `note`, `ip`, `date`) VALUES
(376, 'lequocdat vừa đăng nhập thành công vào lúc 07-10-2021 01:06:20', '58.186.23.139', '07-10-2021 01:06:20'),
(377, 'lequocdat vừa đăng nhập thành công vào lúc 07-10-2021 01:08:24', '8.21.11.216', '07-10-2021 01:08:24'),
(378, 'lequocdat vừa đăng nhập thành công vào lúc 07-10-2021 01:08:36', '58.186.23.139', '07-10-2021 01:08:36'),
(379, 'lequocdat vừa đăng nhập thành công vào lúc 07-10-2021 01:09:13', '58.186.23.139', '07-10-2021 01:09:13'),
(380, 'lequocdat vừa đăng nhập thành công vào lúc 07-10-2021 01:12:18', '58.186.23.139', '07-10-2021 01:12:18'),
(381, 'lequocdat sử dụng buff sub_sale với giá tiền 3000 vào lúc 07-10-2021 01:12:37', '8.21.11.216', '07-10-2021 01:12:37'),
(382, 'nguyentrung vừa đăng ký tài khoản vào lúc 07-10-2021 11:26:27', '113.23.43.39', '07-10-2021 11:26:27'),
(383, 'lequocdat vừa đăng nhập thành công vào lúc 07-10-2021 13:30:20', '58.186.23.139', '07-10-2021 13:30:20'),
(384, 'trongphucdz vừa đăng ký tài khoản vào lúc 07-10-2021 13:57:44', '171.238.56.197', '07-10-2021 13:57:44'),
(385, 'lequocdat vừa đăng nhập thành công vào lúc 07-10-2021 14:28:37', '58.186.23.139', '07-10-2021 14:28:37'),
(386, 'lequocdat vừa đăng nhập thành công vào lúc 07-10-2021 15:38:31', '8.30.234.28', '07-10-2021 15:38:31'),
(387, 'lequocdat vừa đăng nhập thành công vào lúc 07-10-2021 15:47:56', '58.186.23.139', '07-10-2021 15:47:56'),
(388, 'lequocdat vừa đăng nhập thành công vào lúc 07-10-2021 15:51:04', '58.186.23.139', '07-10-2021 15:51:04'),
(389, 'lequocdat vừa đăng nhập thành công vào lúc 07-10-2021 15:54:49', '58.186.23.139', '07-10-2021 15:54:49'),
(390, 'lequocdat vừa đăng nhập thành công vào lúc 07-10-2021 19:46:03', '8.21.11.216', '07-10-2021 19:46:03'),
(391, 'lequocdat vừa đăng nhập thành công vào lúc 07-10-2021 20:15:09', '58.186.23.139', '07-10-2021 20:15:09'),
(392, 'lequocdat vừa đăng nhập thành công vào lúc 10-10-2021 22:39:45', '58.186.23.139', '10-10-2021 22:39:45'),
(393, 'huuthoioder vừa đăng ký tài khoản vào lúc 11-10-2021 20:50:42', '27.72.25.87', '11-10-2021 20:50:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `note_thongbao`
--

CREATE TABLE `note_thongbao` (
  `id` int(11) NOT NULL,
  `nguoidang` varchar(999) NOT NULL,
  `noidung` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `date` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `options`
--

INSERT INTO `options` (`id`, `key`, `value`) VALUES
(1, 'partner_id', '5245808261'),
(2, 'partner_key', '1aecbfec2e5abf570b3dc224ff8fec4b'),
(3, 'facebook', 'Update'),
(4, 'youtube', NULL),
(5, 'phone', NULL),
(7, 'thongbao', 'Web Demo 2021'),
(8, 'id_page', 'Update'),
(9, 'base_url', 'https://lequocdat.com/'),
(10, 'cuphap', 'LMXH'),
(11, 'site_napthe', 'thesieure'),
(12, 'id_loginfb', NULL),
(13, 'key_loginfb', NULL),
(14, 'full_name_admin', 'Lê Quốc Đạt'),
(15, 'phone_zalo', '0777488444'),
(17, 'rate_ctv', '500000'),
(18, 'rate_daily', '5000000'),
(19, 'rate_admin', NULL),
(20, 'ten_website', 'Lequocdat.Com'),
(21, 'logo_user', 'https://ui-avatars.com/api/?background=random&name=');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `server_service`
--

CREATE TABLE `server_service` (
  `id` int(11) NOT NULL,
  `code_service` varchar(999) DEFAULT NULL,
  `server_service` varchar(999) DEFAULT NULL,
  `key_service` varchar(999) DEFAULT NULL,
  `rate_service` varchar(999) DEFAULT NULL,
  `title_service` text CHARACTER SET utf8 COLLATE utf8_swedish_ci,
  `status_service` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `server_service`
--

INSERT INTO `server_service` (`id`, `code_service`, `server_service`, `key_service`, `rate_service`, `title_service`, `status_service`) VALUES
(21, 'like_post_sale', 'sv1', '5ed83be26d9317e30618e0222db4307e', '6', 'Like clone nuôi, tốc độ ổn', 1),
(22, 'like_post_speed', 'sv1', 'bf2a52da873dbbc1d35c21028169f837', '5', 'like tốc độ cao', 1),
(23, 'comment_sale', 'sv2', '64ee2ee7f39ecd624507fb48f51e7220', '5', 'bình luận tốc độ', 1),
(24, 'sub_sale', 'sv1', '54368a78af590c8fac42d2bbcb021304', '3', 'sub siêu tốc', 1),
(25, 'sub_speed', 'sv1', '5db82bb2a0a28e687a9007ed621ad36f', '4', 'sub số 1 việt nam', 1),
(26, 'like_page_sale', 'sv2', '736116df44a6da9b79e8320584e251bc', '4', 'like page', 1),
(27, 'eyevideo', 'sv6', '2d0378cf1bc6ee5298e809d72d8fcbac', '3', 'video nhanh', 1),
(28, 'eyelive', 'sv1', '4dd4ce7a391757c765d4e6b0e8fe83cd', '4', 'mắt live', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(999) DEFAULT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_swedish_ci,
  `email` varchar(999) DEFAULT NULL,
  `password` varchar(999) DEFAULT NULL,
  `facebook` varchar(9999) DEFAULT NULL,
  `token` varchar(999) DEFAULT NULL,
  `phone` varchar(999) DEFAULT NULL,
  `capbac` varchar(999) DEFAULT NULL,
  `money` varchar(999) DEFAULT NULL,
  `tongnap` varchar(999) DEFAULT NULL,
  `tongtru` varchar(999) DEFAULT NULL,
  `level` varchar(999) DEFAULT NULL,
  `banned` varchar(999) DEFAULT NULL,
  `time_banned` varchar(999) DEFAULT NULL,
  `ip` varchar(999) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `cuphap` varchar(999) DEFAULT NULL,
  `date` varchar(999) DEFAULT NULL,
  `lastdate` varchar(999) DEFAULT NULL,
  `token_sitecon` varchar(999) DEFAULT NULL,
  `domain_sitecon` varchar(999) DEFAULT NULL,
  `ip_sitecon` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `facebook`, `token`, `phone`, `capbac`, `money`, `tongnap`, `tongtru`, `level`, `banned`, `time_banned`, `ip`, `otp`, `cuphap`, `date`, `lastdate`, `token_sitecon`, `domain_sitecon`, `ip_sitecon`) VALUES
(110, 'lequocdat', 'Lê Quốc Đạt', 'lequocdat206@gmail.com', 'Y2E5MDUwNjQ2OGI5OTMxNDg5ZTE5NzRhM2JjNGNkYWQ=', NULL, 'NjA1YjNjYWE2NWFlMjJjOTcxNDE2ZTVkZGFmZTVjNWE=', NULL, '3', '428000', '500000', '72000', 'admin', '0', NULL, '171.246.95.34', 0, 'MSV9898', '04-10-2021 10:31:52', '10-10-2021 22:39:45', NULL, NULL, NULL),
(114, 'nguyentrung', 'Tuấn Nguyễn trung', 'nguyentrungtuan512@gmail.com', 'MjQyNGE4MjhkMjQ1NDhjZmUwNjQ3NDZkMTVhNDk5ZDQ=', NULL, 'YjMxMDJmYWRjNzk1NmEwNTBmNDNlZjFmMmU5MDg4ZTc=', NULL, '0', '0', '0', '0', NULL, '0', NULL, '113.23.43.39', NULL, 'LMXH8141', '07-10-2021 11:26:27', NULL, NULL, NULL, NULL),
(115, 'trongphucdz', 'Lâm Trọng Phúc', 'trongphucfb3@gmail.com', 'OGRlMTEzYWUyNjU3NmE5MDQ1MGVkMjc0YzY1ZGRiZmY=', NULL, 'YzA4NmFiMWFjNWM1NWI0YzgyZWVjMGZiODRmNDBkNjI=', NULL, '0', '0', '0', '0', NULL, '0', NULL, '171.238.56.197', NULL, 'LMXH1650', '07-10-2021 13:57:44', NULL, NULL, NULL, NULL),
(116, 'huuthoioder', 'Vi Hữu Thời', 'cojhoiny@gmail.com', 'YTlkYjIyM2VkNGI3YjlkYjFlMzQ5MGRlOTU1YWE5MzI=', NULL, 'YmFkZThlOTFmOGE1YWQ3NDA4NTA5ODhiZTY4M2NmMDE=', NULL, '0', '0', '0', '0', NULL, '0', NULL, '27.72.25.87', NULL, 'LMXH2737', '11-10-2021 20:50:42', NULL, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_buft`
--
ALTER TABLE `history_buft`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_naptien`
--
ALTER TABLE `history_naptien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `list_sitecon`
--
ALTER TABLE `list_sitecon`
  ADD PRIMARY KEY (`id_site`);

--
-- Chỉ mục cho bảng `log_site`
--
ALTER TABLE `log_site`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `note_thongbao`
--
ALTER TABLE `note_thongbao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `server_service`
--
ALTER TABLE `server_service`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `history_buft`
--
ALTER TABLE `history_buft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `history_naptien`
--
ALTER TABLE `history_naptien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `list_sitecon`
--
ALTER TABLE `list_sitecon`
  MODIFY `id_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `log_site`
--
ALTER TABLE `log_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=394;

--
-- AUTO_INCREMENT cho bảng `note_thongbao`
--
ALTER TABLE `note_thongbao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `server_service`
--
ALTER TABLE `server_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
