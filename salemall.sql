-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th12 08, 2023 lúc 01:45 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `salemall`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`ID`, `CategoryName`) VALUES
(1, 'Computers'),
(2, 'Phones'),
(7, 'Tools');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `IDCategory` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ID`, `ProductName`, `IDCategory`, `Image`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Acer', 1, '1.jpg', 10000, 'abc', '2023-12-08 15:44:06', '2023-12-07 15:44:06'),
(2, 'Asus', 1, '1.jpg', 20000, 'abc', '2023-12-07 15:44:53', '2023-12-07 15:44:53'),
(3, 'Samsung', 2, '1.jpg', 30000, 'abc', '2023-12-07 15:45:22', '2023-12-07 15:45:22'),
(4, 'Iphone', 2, '1.jpg', 40000, 'abc', '2023-12-07 15:45:44', '2023-12-07 15:45:44'),
(6, 'Blackberry', 2, '5f62867a3e7f8a130e22876faed80921.jpeg', 50000, 'abc', '2023-12-07 15:46:29', '2023-12-07 15:46:29'),
(7, 'Lenovo', 1, '3691c75dc171a8bfbea0ff966963a845.jpg', 60000, 'abc', '2023-12-07 15:46:50', '2023-12-07 15:46:50'),
(8, 'Dell', 1, 'de290f60747b6e9a0c2f893422d59d81.jpg', 70000, 'abc', '2023-12-07 15:47:05', '2023-12-07 15:47:05'),
(9, 'HP', 1, 'b9fa6a7c5f18b41a658c23060893aec5.jpg', 80000, 'abc', '2023-12-07 15:47:31', '2023-12-07 15:47:31'),
(10, 'Google pixel', 2, '8fd735bd3e49e927a93bab018e8da957.jpg', 90000, 'abc', '2023-12-07 15:47:50', '2023-12-07 15:47:50'),
(11, 'Nokia', 2, 'f454d674225ce5d2b523176c844e46ba.jpg', 100000, 'abc', '2023-12-07 15:48:08', '2023-12-07 15:48:08'),
(12, 'Xiaomi', 2, '9d4494f99566d817410f2e253d55b43d.jpeg', 110000, 'abc', '2023-12-07 15:48:27', '2023-12-07 15:48:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `userName`, `password`) VALUES
(1, 'HuyVu', '123456'),
(2, 'abc', '123132');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDCategory` (`IDCategory`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`IDCategory`) REFERENCES `categories` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
