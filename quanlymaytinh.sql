-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 27, 2021 lúc 06:10 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlymaytinh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `content`, `image`, `create_at`) VALUES
(0, 'Hướng dẫn cách tải Windows 11 ISO và cài đặt trên máy ảo', 'Vì sao Windows 11 ISO được mong đợi?\r\nISO là một các trực quan và đầy đủ nhất để mang đến cho bạn những trải nghiệm đầu tiên về Windows 11. Dĩ nhiên từ trước người dùng đã có thể trải nghiệm phiên bản beta.\r\n\r\nNhững cách dễ dàng hơn là cập nhật từ phiên bản Win 10 sẵn có lên phiên bản Win11 beta. Tuy nhiên nó không thực sự cho người dùng trải nghiệm Win 11 được cài đặt từ đầu trên máy tính của mình.\r\n\r\nCái mà Microsoft gọi là OOBE cho bạn một cảm giác giống như tự cài đặt từ đầu từ một chiếc CD và chiếc PC mới toanh của mình.', 'download-windows-11-surfacecity-1-scaled-1-1024x576.jpg', '2021-09-25 17:00:00'),
(4, 'Hướng dẫn gỡ bỏ Windows 11 insider preview, trở về Win 10 thân quen', 'Hướng dẫn cách uninstall bỏ windows 11 insider preview\r\nKhi bạn quyết định ngừng nhận các bản cập nhật Windows Insider Preview Build, bạn có hai lựa chọn.\r\n\r\nĐầu tiên, bạn có thể hủy đăng ký PC của mình để ngừng nhận thêm bất kỳ bản cập nhật nào sau bản phát hành chính của Windows 11. Sau đó tiếp tục sử dụng bản dựng trước Windows 11 hiện có.\r\n\r\nNgoài ra, bạn cũng có thể chọn ngừng nhận các bản dựng xem trước ngay lập tức và trở về Windows 10.', 'go-bo-windows-11-2.jpg', '2021-09-25 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home` tinyint(4) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `slug`, `home`, `created_at`, `updated_at`) VALUES
(1, 'Laptop, Máy tính xách tay', 'laptop-may-tinh-xach-tay', 1, '2019-05-25 02:56:54', '2021-09-25 04:19:14'),
(5, 'Phụ kiện máy tính', 'phu-kien-may-tinh', 1, '2019-05-25 10:06:52', '2021-09-25 11:44:59'),
(10, 'Màn hình máy tính', 'man-hinh-may-tinh', 1, '2019-05-26 07:06:28', '2021-09-25 04:20:54'),
(11, 'Linh kiện máy tính', 'linh-kien-may-tinh', 0, '2019-05-26 07:06:35', '2021-09-25 11:44:58'),
(12, 'PC gaming, đồ họa', 'pc-gaming-do-hoa', 0, '2019-05-26 16:08:39', '2021-09-25 17:19:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `content`, `created_at`) VALUES
(1, 'Hoa', 'hoa@hoa.com', 'sdgfdg', '2021-09-27 15:48:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(100) DEFAULT NULL,
  `sale` int(11) DEFAULT '0',
  `image_pro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categoryID` int(11) NOT NULL,
  `productCode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` int(20) DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `slug_pro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ceated_pro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_pro` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`productID`, `productName`, `price`, `sale`, `image_pro`, `categoryID`, `productCode`, `color`, `number`, `view`, `slug_pro`, `description`, `ceated_pro`, `update_pro`) VALUES
(1, 'Cặp Laptop Coolbell 2100 15 inch màu đen', 120000, 2, '51466_cap_laptop_coolbell_2100_15_mau_den.jpg', 5, '1234a', 'Gray', 2, 0, 'cap-laptop-coolbell-2100-15-inch-mau-den', 'Chất lượng cao', '2021-09-25 09:41:41', '2021-09-24 17:00:00'),
(2, 'SAMSUNG J6 PLUS', NULL, 0, NULL, 2, NULL, NULL, NULL, 0, NULL, NULL, '2019-05-25 22:52:23', '2019-05-25 22:52:23'),
(8, 'Giá để laptop tích hợp 4 cổng USB 3.0 ORICO - LST-4A-SV Bạc', 850000, 1, '60504_gia_de_laptop_tich_hop_4_cong_usb_orico_lst_4a_sv_bac.png', 5, '1234b', 'Pink', 1, 3, 'gia-de-laptop-tich-hop-4-cong-usb-30-orico---lst-4a-sv-bac', 'Thông số sản phẩm\r\nGiao tiếp: Tích hợp 4 cổng USB 3.0\r\nMàu sắc: Bạc\r\nChất liệu: Hợp kim nhôm + silica gel', '2021-09-25 10:15:54', '2021-09-24 17:00:00'),
(9, 'Bộ nút bàn phím Varmilo Christmas Dye-sub PBT 108 (Keycap Set)', 6780000, 4, '50164_hnc_bo_but_ban_pham_varmilo_chrismast_dye_sub_pbt_108_keycap_set.jpg', 5, '1234c', 'Gray', 4, 4, 'bo-nut-ban-phim-varmilo-christmas-dye-sub-pbt-108-keycap-set', 'Thông số sản phẩm\r\nBộ nút bàn phím Varmilo Chrismast Dye-sub PBT 108\r\nChất liệu nhựa PBT cho cảm giác gõ đầm tay\r\nCông nghệ in Dye-sub không bị mờ ký tự\r\nProfile : OEM\r\nSố lượng nút : 108\r\nHọa tiết phong cách giáng sinh đẹp và độc đáo', '2021-09-25 09:37:15', '2021-09-24 17:00:00'),
(11, 'Pin sạc dự phòng PISEN ZO 10000mAh TS-D266', 11700000, 3, '56850_pin_sac_du_phong_pisen_zo_10000mah_ts_d266_1.jpg', 5, '1234d', 'Black', 0, 15, 'pin-sac-du-phong-pisen-zo-10000mah-ts-d266', 'Bảo hành 1 năm', '2021-09-25 09:39:38', '2021-09-24 17:00:00'),
(12, 'Laptop Asus ZenBook UX425EA-KI429T', 12000000, 0, '59623_laptop_asus_zenbook_ux425_19.png', 1, '1234e', 'Gray', 2, 62, 'laptop-asus-zenbook-ux425ea-ki429t', 'Đẹp, bền, chất lượng tốt', '2021-09-27 15:51:27', '2021-09-27 15:51:27'),
(15, 'PC GAMING HACOM 017', 2590000, 0, '60684_pc_gaming_hacom_017.jpg', 12, '1234f', 'Black', 3, 30, 'pc-gaming-hacom-017', 'Thông số sản phẩm\r\nMainboard: H510\r\nCPU: Intel Core i3 10105F\r\nRAM: 8GB\r\nSSD: 240GB\r\nVGA: GTX 1650\r\nNguồn: 450W\r\n\r\n', '2021-09-25 11:41:07', '2021-09-24 17:00:00'),
(16, 'PC GAMING HACOM 018', 3590000, 3, '60701_pc_gaming_hacom_018.jpg', 12, '1234g', 'Pink', 4, 27, 'pc-gaming-hacom-018', 'Thông số sản phẩm\r\nMainboard: H410\r\nCPU: Intel Core i3 10100F\r\nRAM: 8GB\r\nSSD: 240GB\r\nVGA: GTX 1050Ti\r\nNguồn: 450W', '2021-09-25 11:41:57', '2021-09-24 17:00:00'),
(17, 'PC GAMING HACOM 002', 2490000, 3, '59548_pc_gaming_hacom_002_hncom.jpg', 12, '1234h', 'Black', 6, 14, 'pc-gaming-hacom-002', 'Thông số sản phẩm\r\nCPU: Intel Core i5 10400F\r\nMain: B460\r\nRAM: 8GB DDR4\r\nSSD: 240GB\r\nVGA: GTX 1050Ti\r\nPSU: 500w', '2021-09-25 12:10:02', '2021-09-24 17:00:00'),
(18, 'PC GAMING COOLER MASTER 001', 4990000, 3, '58597_pc_gaming_cooler_master_001.jpg', 12, '1234i', 'Black', 5, 4, 'pc-gaming-cooler-master-001', 'Thông số sản phẩm\r\nCPU: Intel Core i5 10400F\r\nMainboard: B460\r\nRAM: 8GB\r\nSSD: 250GB\r\nVGA: GTX 1650\r\nPSU: 600W', '2021-09-25 11:43:40', '2021-09-24 17:00:00'),
(19, 'Màn hình Viewsonic VX3276-MHD-2K', 7500000, 3, '42327_viewsonic_vx3276__4_.png', 10, '1234k', 'Black', 3, 1, 'man-hinh-viewsonic-vx3276-mhd-2k', 'Thông số sản phẩm\r\nKiểu màn hình Màn hình rộng\r\nKích thước màn hình 31.5Inch IPS\r\nĐộ sáng 250cd/m2\r\nTỷ lệ tương phản 1200: 1\r\nĐộ phân giải WQHD (2560x1440)\r\nThời gian đáp ứng 3ms', '2021-09-25 12:06:56', '2021-09-24 17:00:00'),
(20, 'Màn hình Viewsonic Elite XG270QG', 26990000, 4, '53583_viewsonic_xg270qg__4_.png', 10, '1234l', 'Pink', 6, 3, 'man-hinh-viewsonic-elite-xg270qg', 'Màn hình:	OLED, 5.8\", Super Retina\r\nHệ điều hành:	iOS 12\r\nCamera sau:	Chính 12 MP & Phụ 12 MP\r\nCamera trước:	7 MP', '2021-09-27 15:58:31', '2021-09-27 15:58:31'),
(21, 'Màn hình LG 27GN800-B ', 2300000, 4, '59459_man_hinh_lg_27gn800_b_6.jpg', 10, '1234m', 'Pink', 8, 12, 'man-hinh-lg-27gn800-b', 'Thông số sản phẩm\r\nModel 27GN800-B\r\nKiểu màn hình Màn hình gaming\r\nKích thước màn hình 27Inch IPS\r\nĐộ sáng 350cd/m2\r\nTỷ lệ tương phản 1000:1\r\nĐộ phân giải 2K (2560x1440)', '2021-09-26 07:25:55', '2021-09-26 07:25:55'),
(22, 'Màn hình Edra EGM32KF2ER', 4300000, 0, '59039_man_hinh_edra_egmkf2er_10.jpg', 10, '1234n', 'Black', 9, 2, 'man-hinh-edra-egm32kf2er', 'Màn hình:	LED-backlit IPS LCD, 5.5\", Retina HD\r\nHệ điều hành:	iOS 12\r\nCamera sau:	Chính 12 MP & Phụ 12 MP\r\nCamera trước:	7 MP', '2021-09-25 11:38:58', '2021-09-24 17:00:00'),
(23, 'Laptop Dell Gaming G3 15 G3500B (P89F002G3500B)', 17900000, 6, '55227_laptop_dell_gaming_g3_15_g3500b_p89f002_den_8.png', 1, '1234o', 'Black', 9, 12, 'laptop-dell-gaming-g3-15-g3500b-p89f002g3500b', 'Thông số sản phẩm\r\nCPU: Intel Core i7 10750H\r\nRAM: 16GB\r\nỔ cứng: 512GB SSD\r\nVGA: NVIDIA GTX1660Ti 6G\r\nMàn hình: 15.6 inch FHD 120Hz\r\nBàn phím: có đèn led', '2021-09-26 07:27:26', '2021-09-26 07:27:26'),
(24, 'Laptop Lenovo Legion 5-15ARH05 (82B500GUVN)', 17990000, 3, '55434_laptop_lenovo_legion_5_15arh05_82b500guvn_den_4.png', 1, '1234v', 'Gray', 0, 7, 'laptop-lenovo-legion-5-15arh05-82b500guvn', 'Thông số sản phẩm\r\nCPU: AMD R5 4600H\r\nRAM: 8GB\r\nỔ cứng: 512GB SSD\r\nVGA: Nvidia GTX1650Ti 4G\r\nMàn hình: 15.6 inch FHD\r\nHĐH: Win 10', '2021-09-26 06:23:38', '2021-09-26 06:23:38'),
(25, 'Laptop Asus VivoBook A515EA-BQ489T', 21490000, 3, '56230_a515__6_.png', 1, '1234q', 'Black', 6, 0, 'laptop-asus-vivobook-a515ea-bq489t', 'Thông số sản phẩm\r\nCPU: Intel Core i3 1115G4\r\nRAM: 4GB (trống 1 khe ram)\r\nỔ cứng: 512GB SSD (có thể lắp thêm ổ 2.5)\r\nVGA: Onboard\r\nMàn hình: 15.6 inch FHD\r\nHĐH: Win 10', '2021-09-25 09:32:41', '2021-09-24 17:00:00'),
(27, 'Nguồn ARESZE EPS600ELA', 1910000, 0, '9089_aresze_eps600ela_80_plus_0000_1.jpg', 11, 'PWGO061', 'Pink', 10, 0, 'nguon-aresze-eps600ela', 'Thông số sản phẩm\r\nKích thước(W / H / D) 50*85*160mm\r\nCông suất 600W\r\nĐiện áp đầu vào 103~264V (dải tự động)', '2021-09-25 11:47:43', '2021-09-24 17:00:00'),
(28, 'Ổ cứng HDD WD 4TB Red 3.5 inch 5400RPM, SATA3,256MB Cache', 2809000, 0, '29957_hdd_western_caviar_red_4tb_sata_3_256mb_cache_0001.jpg', 11, 'HDWD144', 'Gray', 0, 0, 'o-cung-hdd-wd-4tb-red-35-inch-5400rpm-sata3256mb-cache', 'Thông số sản phẩm\r\nĐược thiết kế đặc biệt để sử dụng trong các hệ thống NAS tối đa 8 khay\r\nHỗ trợ tốc độ tải công việc lên tới 180 TB / năm.\r\nHệ thống NAS phù hợp cho văn phòng nhỏ và sử dụng tại nhà liên tục 24/7', '2021-09-25 12:08:56', '2021-09-24 17:00:00'),
(29, 'DDRam III AVEXIR 4GB/1600 (1*4GB) 1CIR - Core', 799000, 0, '25264_series_core_d3_red.jpg', 11, 'RAAV052', 'Black', 10, 0, 'ddram-iii-avexir-4gb1600-14gb-1cir---core', 'Thông số sản phẩm\r\nBộ nhớ RAM nằm trong phân khúc cơ bản của Avexir\r\nDung lượng: 1 x 4GB\r\nThế hệ: DDR3\r\nBus: 1600MHz', '2021-09-25 12:09:12', '2021-09-24 17:00:00'),
(32, 'aaaa', 12132, 0, 'add.png', 10, 'dfgghf', 'Pink', 12433, 0, 'aaaa', 'dcgcdfhf', '2021-09-25 17:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userID`, `userName`, `email`, `phone`, `address`, `password`, `level`, `created_at`, `update_at`) VALUES
(2, 'Vũ Thị Mai', 'maivu@gmail.com', '0123456', 'Thái Nguyên', 'd9b1d7db4cd6e70935368a1efb10e377', 0, NULL, '2021-08-29 02:46:12'),
(3, 'Admin', 'admin@gmail.com', '0123456789', 'Xuân Phương, Phú Bình, Thái Nguyên', '202cb962ac59075b964b07152d234b70', 1, NULL, '2021-09-27 15:17:01'),
(7, 'Nguyễn Thanh Tùng', 'ntt@gmail.com', '0972264324', 'Thái Bình', '202cb962ac59075b964b07152d234b70', 0, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
