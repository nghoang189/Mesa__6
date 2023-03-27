-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 04:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dangkythuctap`
--

-- --------------------------------------------------------

--
-- Table structure for table `phieudangkythuctap`
--

CREATE TABLE `phieudangkythuctap` (
  `MaSV` int(5) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `ChuyenNganh` varchar(30) NOT NULL,
  `CongTy` varchar(500) NOT NULL,
  `Image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieudangkythuctap`
--

INSERT INTO `phieudangkythuctap` (`MaSV`, `HoTen`, `ChuyenNganh`, `CongTy`, `Image`) VALUES
(16, 'Router Wifi chuẩn AC1200 Totol', '380.000', 'Router Wifi chuẩn AC1200 Totolink A710R Đen được làm từ chất liệu nhựa cứng cáp bảo vệ tốt các linh kiện bên trong, màu đen trung tính không quá nổi bật phù hợp lắp đặt ở nhiều không gian.', 'router-wifi.png'),
(17, 'Đồng hồ thông minh Apple Watch SE 2022 GPS 40mm', '6.490.000', 'Trong sự kiện Far Out 2022, nhà Táo Khuyết đã mang đến hàng loạt sản phẩm mới trong đó có đồng hồ thông minh Apple Watch SE 2022 GPS 40mm. Mẫu smartwatch giá rẻ mới nhất của Apple này hứa hẹn sẽ khiến cho các iFans đứng ngồi không yên khi sở hữu nhiều tính năng hấp dẫn.', 'apple-watch-se.png'),
(18, 'Bàn Phím Cơ Có Dây Gaming Razer BlackWidow V3', '2.910.000', 'Thiết kế hiện đại, có giá đỡ chống mỏi cổ tay, chơi game lâu như bạn muốn. \r\nBàn phím có 104 phím, vùng phím số tách riêng.\r\nCó bánh xe lăn và phím đa năng dễ dàng tùy chọn âm lượng, độ sáng, tạm dừng,... \r\nĐộ bền cứng cao với keycap ABS Doubleshot. \r\nTỏa sáng trong bóng tối với đèn LED RGB Chroma 16.8 triệu màu.', 'razer-blackwidow.png'),
(19, 'Mac Mini 2020 M1 8-core/8GB/512GB/Silver (MGNT3SA/A) ', '16.490.000', 'Mac Mini 2020 M1(MGNT3SA/A) gây ấn tượng cho người dùng với thiết kế nhỏ gọn, tiện lợi cùng sức mạnh vượt trội đến từ con chip M1 mạnh mẽ, đáp ứng mọi nhu cầu văn phòng, đồ họa chuyên nghiệp.', 'mac-mini-2020.png'),
(20, 'Điện thoại Vivo Y20s ', '5.340.000', 'Sau Y20 thì Vivo đã tung ra mẫu điện thoại Y20s. Mẫu smartphone được nâng cấp dung lượng bộ nhớ và RAM cao hơn mang đến trải nghiệm mượt mà, lưu trữ thoải mái, đi kèm thiết kế đẹp mắt ấn tượng, dung lượng pin lớn đáp ứng nhu cầu giải trí cả ngày dài.', 'vivo-y02s.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(5) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Pass` varchar(250) NOT NULL,
  `FullName` varchar(250) NOT NULL,
  `Avatar` varchar(150) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `UserName`, `Pass`, `FullName`, `Avatar`, `role`) VALUES
(1, 'nghoang', '$2y$10$1/oZpVIUaTQxg7AtyVlXP.WPuIRG21OaYtmCwNZbFr9n65MmHE3fS', 'Nguyễn Ngọc Hoàng', 'avt3.png', 0),
(2, 'hoacu', '$2y$10$EjQiUPzB.iYHTKh68zCFsOAudfCTkulExXFYqny7ZOaqp2i8g3d6y', 'Cù Đức Hoà', 'avt3.png', 0),
(3, 'hien123', '$2y$10$wMClIESpIV/S1OzLtvWMNeNydQA.uJPZXOei/FhJjLSWY6Twh0pby', 'Nguyễn Văn Hiển', NULL, 0),
(4, 'hieu', '$2y$10$Fnrkr/k1qWDrsqH4xe.NzeEYJw0j3uAyeH49YJ5NN4LV.P5BGOuyO', 'Hiếu Nguyễn', NULL, 0),
(5, 'hoang', '$2y$10$b/W7Wsn6cZvLlp9P3GLbJeosPMYvZ02sm6R2eHwrIwGrLToV7y6lS', 'Nguyễn Hoàng', NULL, 0),
(6, 'hoang', '$2y$10$UCCr7NL5Ye6W4miOz0NAJ.FIEdF/q5tTfm7u2q2T.LoxtBmmpuhpO', 'Nguyễn Hoàng', NULL, 0),
(7, 'admin', '123', '', NULL, 1),
(9, 'nghoang1809', '$2y$10$04YPRA31hJot3unj6FnukOZd/EcbM5Qmge7t7x3xjyA5iQPFwjy3u', 'Nguyễn Ngọc Hoàng', NULL, 0),
(10, 'nghoang111', '$2y$10$8/w70ni8DyqCU5M7AlpO7u5qr.qlQp8/IIMqNWMJfvkZ6TdAMunw.', 'Nguyễn Ngọc Hoàng', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phieudangkythuctap`
--
ALTER TABLE `phieudangkythuctap`
  ADD PRIMARY KEY (`MaSV`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phieudangkythuctap`
--
ALTER TABLE `phieudangkythuctap`
  MODIFY `MaSV` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
