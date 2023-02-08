-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 08, 2023 lúc 02:25 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tw`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `rights` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `rights`) VALUES
(2, 'admin', '8e007a753fb05676888a1b8b467d8ba9', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cmt`
--

CREATE TABLE `cmt` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `content` mediumtext NOT NULL,
  `time` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cmt`
--

INSERT INTO `cmt` (`id`, `uid`, `postid`, `content`, `time`) VALUES
(1, 3, 3, 'hello', 0),
(2, 1, 4, '.', 0),
(3, 1, 4, '.', 0),
(4, 12, 9, 'lô', 0),
(5, 1, 18, 'ok', 0),
(6, 1, 18, 'ok', 0),
(7, 1, 18, 'ok', 0),
(8, 1, 18, 'ok', 0),
(9, 1, 18, 'ok', 0),
(10, 1, 18, 'ok', 0),
(11, 1, 18, 'ok', 0),
(12, 1, 18, 'ok', 0),
(13, 1, 18, 'ok', 0),
(14, 1, 18, 'ok', 0),
(15, 1, 18, 'ok', 0),
(16, 1, 18, 'ok', 0),
(17, 1, 18, '13', 0),
(18, 14, 22, '123', 0),
(19, 14, 22, '!!!', 0),
(20, 14, 22, 'ok', 0),
(21, 14, 31, 'ad', 0),
(22, 14, 33, 'a', 0),
(23, 15, 33, 'weather', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `followid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `follow`
--

INSERT INTO `follow` (`id`, `uid`, `followid`) VALUES
(1, 2, 1),
(2, 3, 1),
(3, 5, 1),
(4, 9, 3),
(5, 10, 11),
(7, 12, 1),
(8, 11, 9),
(9, 13, 9),
(10, 12, 10),
(12, 10, 12),
(13, 14, 12),
(14, 14, 7),
(16, 14, 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from_u` int(11) NOT NULL,
  `to_u` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `from_u`, `to_u`, `time`, `content`) VALUES
(1, 3, 1, 1642387969, 'alo'),
(2, 1, 3, 1642387980, 'hi'),
(3, 9, 3, 1647916469, 'halo'),
(4, 10, 13, 1647918263, 'em chào anh'),
(5, 12, 10, 1647918342, 'lô :))'),
(6, 13, 10, 1647918346, 'xin chào Chức'),
(7, 14, 13, 1647999568, '.'),
(8, 14, 13, 1648012425, 'l'),
(9, 14, 13, 1648012427, 'a'),
(10, 14, 13, 1648012429, 'a'),
(11, 14, 13, 1648012430, 'q'),
(12, 14, 13, 1648012432, '1'),
(13, 14, 13, 1648012433, '1'),
(14, 14, 13, 1648012434, '2'),
(15, 14, 13, 1648012436, '3'),
(16, 14, 13, 1648012438, '1'),
(17, 14, 13, 1648012442, '1'),
(18, 14, 13, 1648012447, 'a'),
(19, 14, 13, 1648012452, 'k');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `content` mediumtext NOT NULL,
  `img` mediumtext NOT NULL,
  `num_like` int(11) NOT NULL DEFAULT 0,
  `num_cmt` int(11) NOT NULL DEFAULT 0,
  `time` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `uid`, `content`, `img`, `num_like`, `num_cmt`, `time`) VALUES
(35, 1, 'what the....like today', '', 0, 0, 0),
(36, 16, 'ád', '', 0, 0, 0),
(33, 1, 'what the....like today', '', 0, 0, 0),
(34, 1, 'what the....like today', '', 0, 0, 0),
(32, 1, 'sdfs', '', 0, 0, 0),
(31, 1, 'bcf', '', 0, 0, 0),
(30, 1, 'asd', '', 0, 0, 0),
(29, 1, 'asd', '', 0, 0, 0),
(27, 1, '123123', '', 0, 0, 0),
(28, 1, 'asd', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `uid` text DEFAULT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL,
  `bio` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `website` text DEFAULT NULL,
  `following` int(11) NOT NULL DEFAULT 0,
  `follower` int(11) NOT NULL DEFAULT 0,
  `posts` int(11) DEFAULT 0,
  `datejoin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `register`
--

INSERT INTO `register` (`id`, `uid`, `f_name`, `l_name`, `mail`, `password`, `bio`, `location`, `website`, `following`, `follower`, `posts`, `datejoin`) VALUES
(1, 'heloo', 'TEACHER', 'CSE', 'teacher@gmail.com', '88d12e1a75fadd667c5873139a7e1ffa', '', '', '', 0, 4, 25, 1642383817),
(2, '123', 'Nguyễn', 'Đông', 'dongnv@gmail.com', '88d12e1a75fadd667c5873139a7e1ffa', '', '', '', 1, 0, 2, 1642384266),
(3, NULL, 'Nguyen', 'Dong', 'nguyendongnv@gmail.com', '88d12e1a75fadd667c5873139a7e1ffa', NULL, NULL, NULL, 1, 1, 0, 1642387905),
(5, NULL, 'Nguyen', 'Dong', 'nv@gmail.com', '88d12e1a75fadd667c5873139a7e1ffa', NULL, NULL, NULL, 1, 0, 0, 1642510123),
(6, NULL, 'Garrison https://weibo.com/', 'Huynh', 'filipp.kazakov.1986@mail.ru', 'ff88d27879b801df89f4588c9cad4324', NULL, NULL, NULL, 0, 0, 0, 1643297975),
(7, NULL, 'demo', 'test', 'foo@gmail.com', '8c3d6ebc6041ce165bced088a5df9ddb', NULL, NULL, NULL, 0, 1, 0, 1645963651),
(8, NULL, 'Phạm', 'Hải', 'pth190501@gmail.com', '88d12e1a75fadd667c5873139a7e1ffa', NULL, NULL, NULL, 0, 0, 1, 1645963659),
(9, NULL, 'Admin', 'Test', 'admin@gmail.com', '88d12e1a75fadd667c5873139a7e1ffa', NULL, NULL, NULL, 1, 2, 1, 1647916432),
(10, NULL, 'admin', 'test', 'admin123@gmail.com', '88d12e1a75fadd667c5873139a7e1ffa', NULL, NULL, NULL, 3, 1, 1, 1647918013),
(11, NULL, 'Tran', 'Thiep', 'trantrungthiep13022000@gmail.com', '88d12e1a75fadd667c5873139a7e1ffa', NULL, NULL, NULL, 2, 1, 0, 1647918085),
(12, NULL, 'nhat', 'nguyenba', 'nguyenbanhat878@gmail.com', '50cd17463a3b552ee0936ea5e5fa9af0', NULL, NULL, NULL, 2, 2, 1, 1647918136),
(13, NULL, 'Phạm', 'Ngọc Đức', 'phamngocduc@gmail.com', 'c8f6b02011fe6e7bc88abc2ed957fab2', NULL, NULL, NULL, 1, 3, 1, 1647918148),
(14, NULL, '123', '123', '123@gmail.com', '88d12e1a75fadd667c5873139a7e1ffa', NULL, NULL, NULL, 3, 0, 3, 1647955487),
(15, NULL, 'abc', '123', 'abc@gmail.com', '88d12e1a75fadd667c5873139a7e1ffa', NULL, NULL, NULL, 0, 0, 0, 1648087246),
(16, NULL, 'asas', '12313', 'asd@gmail.com', '88d12e1a75fadd667c5873139a7e1ffa', NULL, NULL, NULL, 0, 0, 1, 1648284955);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`id`, `title`) VALUES
(1, 'Twitter');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_like`
--

CREATE TABLE `user_like` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `idpost` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user_like`
--

INSERT INTO `user_like` (`id`, `uid`, `idpost`) VALUES
(1, 2, 2),
(3, 1, 2),
(4, 3, 3),
(7, 4, 3),
(8, 1, 4),
(9, 5, 6),
(13, 10, 11),
(14, 10, 10),
(15, 11, 10),
(24, 1, 18),
(27, 14, 22);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cmt`
--
ALTER TABLE `cmt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_like`
--
ALTER TABLE `user_like`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cmt`
--
ALTER TABLE `cmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user_like`
--
ALTER TABLE `user_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
