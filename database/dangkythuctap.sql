-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 06:00 PM
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
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(5) NOT NULL,
  `orderid` varchar(20) NOT NULL,
  `prdid` int(5) NOT NULL,
  `prdname` varchar(100) NOT NULL,
  `quantity` int(5) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `orderid`, `prdid`, `prdname`, `quantity`, `unit`, `image`) VALUES
(1, 'mystore860806', 1, 'Điện thoại Vivo Y02s 32GB', 1, '4490000', 'vivo-y02s.png'),
(2, 'mystore860806', 2, 'Điện thoại iPhone 14 Pro Max 256GB', 1, '30390000', 'iphone-14-pro-max.png'),
(3, 'mystore36608', 1, 'Điện thoại Vivo Y02s 32GB', 2, '4490000', 'vivo-y02s.png'),
(4, 'mystore36608', 2, 'Điện thoại iPhone 14 Pro Max 256GB', 2, '30390000', 'iphone-14-pro-max.png');

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `id` int(5) NOT NULL,
  `orderid` varchar(20) NOT NULL,
  `userid` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `sdt` varchar(11) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `addinfor` varchar(200) DEFAULT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`id`, `orderid`, `userid`, `name`, `email`, `sdt`, `state`, `city`, `address`, `addinfor`, `total`) VALUES
(1, 'mystore860806', 0, 'Nguyễn Hoàng', 'nghoang189@gmail.com', '0972026010', 'Binh Thanh', 'Ho Chi Minh', '432/14/32 Xô Viết Nghệ Tĩnh, P.25', 'Vui lòng giao hàng trong khoảng 9h đến 17h.', '38368000'),
(2, 'mystore36608', 0, 'Cù Đức Hoà', 'test01@gmail.com', '0971499652', 'Gò Vấp', 'Ho Chi Minh', '443 Điện Biên Phủ, P.25', 'Hàng cần gấp.', '76736000');

-- --------------------------------------------------------

--
-- Table structure for table `phieudangkythuctap`
--

CREATE TABLE `phieudangkythuctap` (
  `MaSV` int(5) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `ChuyenNganh` varchar(100) NOT NULL,
  `CongTy` varchar(500) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Image1` varchar(50) NOT NULL,
  `Image2` varchar(50) NOT NULL,
  `Image3` varchar(50) NOT NULL,
  `Image4` varchar(50) NOT NULL,
  `Image5` varchar(50) NOT NULL,
  `Image6` varchar(50) NOT NULL,
  `Image7` varchar(50) NOT NULL,
  `Image8` varchar(50) NOT NULL,
  `des1` varchar(500) NOT NULL,
  `des2` varchar(500) NOT NULL,
  `ttdes1` varchar(100) NOT NULL,
  `ttdes2` varchar(100) NOT NULL,
  `embed` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieudangkythuctap`
--

INSERT INTO `phieudangkythuctap` (`MaSV`, `HoTen`, `ChuyenNganh`, `CongTy`, `Image`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`, `Image6`, `Image7`, `Image8`, `des1`, `des2`, `ttdes1`, `ttdes2`, `embed`) VALUES
(1, 'Điện thoại Vivo Y02s 32GB', '7990000', 'Vivo Y02s - một cái tên thuộc dòng Y vừa được Vivo ra mắt với một diện mạo trẻ trung. Sở hữu bộ thông số được xem là nổi bật trong phân khúc điện thoại giá rẻ hiện nay (08/2022). Đây hứa hẹn sẽ là sản phẩm “vừa ngon vừa rẻ” mà người dùng không nên bỏ qua.', 'vivo-y02s.png', 'vivo-y02s-tong-quan.jpg', 'vi-vn-vivo-y02s-man-hinh.jpg', 'vi-vn-vivo-y02s-camera-don.jpg', 'vivo-y02s-hieu-nang.jpg', 'vi-vn-vivo-y02s.jpg', 'vivo-y02s-note.jpg', 'vivo-y02s-detail2.jpg', 'vivo-y02s-detail3.jpg', 'Vivo Y02s được hoàn thiện với hai mặt và các cạnh vát phẳng giúp cho thân hình của chiếc máy trở nên vuông vắn và cực kỳ hợp xu hướng hiện nay. Nổi bật hơn hết là cụm camera được Vivo thiết kế với hai cụm tròn to nổi khá ấn tượng. Nhựa Polymer là vật liệu chính cho cả phần khung và mặt lưng mà Vivo chọn để hoàn thiện chiếc Vivo Y02s, nhờ đó mà khối lượng của chiếc máy được tối ưu nên khi cầm nắm sử dụng lâu dài sẽ giúp người dùng hạn chế tình trạng mỏi tay.', 'Con chip MediaTek Helio P35 sẽ là trung tâm vận hành của chiếc máy mà Vivo chọn để trang bị trên Vivo Y02s, với hiệu suất tối đa đạt được là 2.3 GHz nên các tác vụ cơ bản từ xem phim, nghe nhạc hay nghe gọi, lướt web thì máy thừa sức xử lý một cách ổn định. Điện thoại RAM 3 GB cùng bộ nhớ trong 32 GB có thể đem đến cho người dùng những trải nghiệm về đa nhiệm một cách ổn định, kèm với đó là một không gian lưu trữ vừa đủ đối với một vài ứng dụng cần thiết và một lượng hình ảnh hay video tương đối', 'Vẻ ngoài hiện đại, màu sắc trẻ trung', 'Xử lý mượt mà các tác vụ cơ bản', '0M0WgA8Y4p0'),
(2, 'Điện thoại iPhone 14 Pro Max 256GB', '30390000', 'Mới đây thì chiếc điện thoại iPhone 14 Pro Max 256GB cũng đã được chính thức lộ diện trên toàn cầu và đập tan bao lời đồn đoán bấy lâu nay, bên trong máy sẽ được trang bị con chip hiệu năng khủng cùng sự nâng cấp về camera đến từ nhà Apple.', 'iphone-14-pro-max.png', 'iphone-14-pro-max-slide0.jpg', 'iphone-14-pro-max-slide1.jpg', 'iphone-14-pro-max-slide2.jpg', 'iphone-14-pro-max-slide3.jpg', 'iphone-14-pro-max-slide4.jpg', 'iphone-14-pro-max-note.jpg', 'iphone-14-pro-max-detail1.jpg', 'iphone-14-pro-max-detail2.jpg', 'iPhone 14 Pro Max sẽ vẫn giữ lại kiểu thiết kế đặc trưng đến từ các thế hệ trước như iPhone 13 series với các cạnh vuông vức và hai mặt gia công phẳng, đây vẫn được xem là kiểu thiết kế rất thịnh hành và thành công trên thị trường di động tính đến thời điểm hiện tại. Phía sau máy sẽ là một mặt lưng làm từ kính cao cấp giúp cho thiết bị có thể toát lên một vẻ ngoài sang trọng và hào nhoáng, đi kèm với đó sẽ là bộ khung thép không gỉ chắc chắn có khả năng chống chịu va đập tốt để thiết bị có thể đ', 'Phía trước điện thoại iPhone sẽ được tích hợp một màn hình OLED có kích thước lên tới 6.7 inch, nhờ có một tấm nền xịn sò nên máy hoàn toàn có thể đem lại cho bạn những nội dung hiển thị có độ chính xác cao về màu sắc. Hỗ trợ tốt trong những công việc thiết kế đồ họa. Lần này sẽ có một sự thay đổi lớn trên phần màn hình chính là cụm tai thỏ đã được thay đổi để thay vào đó là một hình viên thuốc lạ mắt, đây chắc chắn sẽ là một đặc điểm nhận diện dễ dàng trên chiếc iPhone 14 Pro Max.', 'Diện mạo đẳng cấp dẫn đầu xu thế', 'Trải nghiệm nội dung sinh động trên một màn hình chất lượng', 'oaWqA_CJVFw');

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
  `role` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `UserName`, `Pass`, `FullName`, `Avatar`, `role`) VALUES
(1, 'admin', '$2y$10$1/oZpVIUaTQxg7AtyVlXP.WPuIRG21OaYtmCwNZbFr9n65MmHE3fS', 'Nguyễn Ngọc Hoàng', '', 1),
(2, 'user', '$2y$10$xKWHiiuXVY63BwkenKhhCObsIGH/VQRl889j6sKfAcmtPOksx5Sva', 'Nguyen Ngoc Hoang', NULL, 0),
(3, 'nghoang', '$2y$10$FTpS5BaXyJFz0WM59qJkTe5z/S/Cpw5V4DF2EtPeJQLl9dS9k.gHq', 'Nguyễn Ngọc Hoàng', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phieudangkythuctap`
--
ALTER TABLE `phieudangkythuctap`
  MODIFY `MaSV` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
