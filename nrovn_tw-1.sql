-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 20, 2021 lúc 10:34 PM
-- Phiên bản máy phục vụ: 10.3.32-MariaDB-log-cll-lve
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nrovn_tw`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cmt`
--

CREATE TABLE `cmt` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `cmt`
--

INSERT INTO `cmt` (`id`, `uid`, `postid`, `content`) VALUES
(1, 1, 1, '?thgesrthe'),
(2, 1, 8, 'degver'),
(3, 1, 5, 'egver'),
(4, 1, 5, 'fdb zdf'),
(5, 1, 5, 'jb'),
(6, 1, 7, 'hihi 12345');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `followid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `follow`
--

INSERT INTO `follow` (`id`, `uid`, `followid`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `content` text NOT NULL,
  `img` text NOT NULL,
  `num_like` int(11) NOT NULL,
  `num_cmt` int(11) NOT NULL,
  `num_share` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `uid`, `content`, `img`, `num_like`, `num_cmt`, `num_share`) VALUES
(1, 1, 'èbavrfegve', '', 1, 0, 0),
(2, 1, 'dfrbsdrt', '', 0, 0, 0),
(3, 1, 'rtbhdrfstbdtrb', '', 0, 0, 0),
(4, 1, 'shbdtrh', '', 0, 0, 0),
(5, 1, 'rtbhdsrthb', '', 0, 0, 0),
(6, 1, 'gbsrth', '', 0, 0, 0),
(7, 1, 'tbgsfdrthb', '', 0, 0, 0),
(8, 1, 'shbfdrt', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `register`
--

INSERT INTO `register` (`id`, `f_name`, `l_name`, `mail`, `password`) VALUES
(1, 'test', 'test', 'test@123.com', '742f2b1a55cd5d606ea44b4fcb54646a'),
(2, 'Phạm', 'Hải', 'pth190501@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_like`
--

CREATE TABLE `user_like` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `idpost` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user_like`
--

INSERT INTO `user_like` (`id`, `uid`, `idpost`) VALUES
(4, 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- Chỉ mục cho bảng `user_like`
--
ALTER TABLE `user_like`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cmt`
--
ALTER TABLE `cmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user_like`
--
ALTER TABLE `user_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
