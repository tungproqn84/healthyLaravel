-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 18, 2019 lúc 02:36 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `healthyshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(20, 18, 64, 1, 650000, '2019-12-16 09:19:16', '2019-12-16'),
(21, 18, 65, 1, 352000, '2019-12-16 09:19:16', '2019-12-16'),
(22, 19, 65, 1, 352000, '2019-12-16 10:50:04', '2019-12-16'),
(23, 20, 67, 1, 450000, '2019-12-16 10:55:08', '2019-12-16'),
(24, 21, 67, 1, 450000, '2019-12-16 10:57:31', '2019-12-16'),
(25, 22, 64, 2, 650000, '2019-12-17 03:22:34', '2019-12-17'),
(26, 23, 67, 1, 450000, '2019-12-17 07:00:39', '2019-12-17'),
(27, 23, 68, 1, 450000, '2019-12-17 07:00:39', '2019-12-17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsp`
--

CREATE TABLE `danhmucsp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucsp`
--

INSERT INTO `danhmucsp` (`id`, `name`, `mota`, `created_at`, `updated_at`) VALUES
(1, 'Nước hoa', '', NULL, NULL),
(2, 'Thuốc bổ', '', NULL, NULL),
(3, 'Vitamin', '', NULL, NULL),
(4, 'Khác', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL COMMENT 'tổng tiền',
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `id_customer`, `date_order`, `total`, `status`, `created_at`, `updated_at`) VALUES
(19, 9, '2019-12-16', '352,000.00', 1, '2019-12-17 00:39:19', '2019-12-17 00:39:19'),
(18, 9, '2019-12-16', '1,002,000.00', 0, '2019-12-16 09:19:16', '2019-12-16 09:19:16'),
(22, 15, '2019-12-17', '1,300,000.00', 0, '2019-12-17 03:22:34', '2019-12-17 03:22:34'),
(23, 9, '2019-12-17', '900,000.00', 0, '2019-12-17 07:00:39', '2019-12-17 07:00:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_092815_create__tung_danhmucsp', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `tensp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soluong` int(10) NOT NULL,
  `idloai` int(11) NOT NULL,
  `mota` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` float DEFAULT NULL,
  `image` varchar(10000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `soluong`, `idloai`, `mota`, `dongia`, `image`, `new`, `created_at`, `updated_at`) VALUES
(64, 'Fish Oil Omega3', 500, 1, '<p>&lt;p&gt;✔&amp;nbsp;Dầu c&amp;aacute; Nature Made&amp;reg; Fish Oil l&amp;agrave; vi&amp;ecirc;n uống s&amp;aacute;ng mắt chứa dầu c&amp;aacute; rất tốt cho đ&amp;ocirc;i mắt của bạn, với nguồn cung cấp c&amp;aacute; đến từ v&amp;ugrave;ng biển s&amp;acirc;u dưới đại dương.&lt;/p&gt;</p>\r\n\r\n<p>&lt;p&gt;✔&amp;nbsp;Nature Made Fish Oil Omega 3 kh&amp;ocirc;ng đến từ c&amp;aacute; nu&amp;ocirc;i.&lt;/p&gt;</p>\r\n\r\n<p>&lt;p&gt;✔&amp;nbsp;Nature Made Fish Oil sử dụng qu&amp;aacute; tr&amp;igrave;nh chưng cất ph&amp;acirc;n tử hiện đại nhất được sử dụng để loại bỏ thủy ng&amp;acirc;n, đảm bảo độ tinh khiết v&amp;agrave; hiệu quả cho bạn đ&amp;ocirc;i mắt khỏe đẹp.&lt;/p&gt;<br />\r\n&nbsp;</p>', 650000, 'http://heabea.vn/public/upload/product/product188-dau-ca-nature-made-fish-oil-1200mg-omega-3-hop-200-vien-cua-my.jpg', 1, '2019-12-14 02:14:46', '2019-12-17 09:07:19'),
(65, 'Lutein Zeaxanthin', 650, 3, '<p>&lt;p&gt;✔&amp;nbsp;Nature Made Lutein 20mg gi&amp;uacute;p duy tr&amp;igrave; v&amp;agrave; tăng mật độ sắc tố điểm v&amp;agrave;ng - sắc tố quang học cần thiết cho sức khỏe thị lực tối ưu.&lt;/p&gt;</p>\r\n\r\n<p>&lt;p&gt;✔&amp;nbsp;Đồng thời hỗ trợ bảo vệ mắt, chống lại sự t&amp;agrave;n ph&amp;aacute; của c&amp;aacute;c gốc tự do cho đ&amp;ocirc;i mắt của bạn s&amp;aacute;ng khỏe.&lt;/p&gt;<br />\r\n&nbsp;</p>', 352000, 'http://heabea.vn/public/upload/product/product1106-vien-uong-sang-mat-trunature-vision-complex-lutein-zeaxanthin-140-vien.jpg', 1, '2019-12-14 08:58:15', '2019-12-16 09:25:38'),
(67, 'Focus Factor', 698, 2, '<p>✔&nbsp;Focus Factor Kids bổ sung c&aacute;c loại vitamin v&agrave; kho&aacute;ng chất cho trẻ em nhằm hỗ trợ chức năng n&atilde;o bộ một c&aacute;ch to&agrave;n diện gi&uacute;p trẻ tăng cường tr&iacute; nhớ ph&aacute;t triển khỏe mạnh</p>', 450000, 'http://heabea.vn/public/upload/product/product135-focus-factor-kids-giup-tre-tang-cuong-tri-nho-hop-150-vien.jpg', 1, '2019-12-16 10:14:14', '2019-12-17 07:00:39'),
(68, 'Childlife DHA', 349, 3, '<table border=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>✔ Childlife Pure DHA l&agrave; một sản phẩm chuy&ecirc;n biệt cung cấp DHA tinh khiết cho trẻ với h&agrave;m lượng ph&ugrave; hợp đem lại cho con y&ecirc;u của bạn sự khỏi đầu ho&agrave;n hảo.</p>\r\n\r\n			<p>✔ Sản phẩm ch&iacute;nh l&agrave; kết quả của một qu&aacute; tr&igrave;nh d&agrave;i nghi&ecirc;n cứu v&agrave; kiểm chứng của Tiến sỹ Murray Clarke c&oacute; 20 năm kinh nghiệm trong lĩnh vực nhi khoa.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 450000, 'http://heabea.vn/public/upload/product/product146-thuoc-bo-sung-childlife-pure-dha-250mg-90-vien-cua-my.jpg', 1, '2019-12-16 10:15:07', '2019-12-17 07:00:39'),
(69, 'Therma Care', 455, 2, '<p>✔&nbsp;&nbsp;ThermaCare&nbsp;l&agrave; miếng d&aacute;n d&ugrave;ng một lần được k&iacute;ch hoạt bởi kh&ocirc;ng kh&iacute; cho lượng nhiệt th&iacute;ch hợp ở mức thấp c&oacute; khả năng giảm đau v&agrave; xoa dịu cơ bắp &ndash; cung cấp nhiệt trong 8 giờ.</p>\r\n\r\n<p>✔&nbsp;&nbsp;Chỉ cần mở g&oacute;i ra v&agrave; những miếng d&aacute;n sử dụng một lần n&agrave;y sẽ tự động ấm dần l&ecirc;n khi gặp kh&ocirc;ng kh&iacute;.</p>\r\n\r\n<p>✔&nbsp;&nbsp;C&ocirc;ng dụng:&nbsp;miếng d&aacute;n gi&uacute;p giảm đau tạm thời c&aacute;c cơn đau nhức cơ bắp nhẹ ở lưng v&agrave; c&aacute;c cơn đau do vận động qu&aacute; sức, tổn thương cơ bắp v&agrave; bong g&acirc;n.</p>', 1200000, 'http://heabea.vn/public/upload/product/product171-thermacare-mieng-dan-nhiet-giam-dau-vung-that-lung.jpg', 0, '2019-12-16 10:15:44', '2019-12-16 10:15:44'),
(70, 'Chỉ nha khoa', 600, 4, '<p>L&agrave;m sạch răng ở những nơi b&agrave;n chải răng kh&ocirc;ng thể với tới</p>\r\n\r\n<p>Dễ d&agrave;ng tiếp cận những mảng b&aacute;m v&agrave; thức ăn dạng hạt t&iacute;ch tụ ở c&aacute;c kẻ răng, nướu răng</p>\r\n\r\n<p>Gi&uacute;p răng v&agrave; nướu chắc khỏe</p>\r\n\r\n<p>Rất tiện d&ugrave;ng</p>\r\n\r\n<p>Hương Fresh Mint thơm m&aacute;t sau mỗi lần sử dụng</p>', 75000, 'http://heabea.vn/public/upload/product/product179-chi-nha-khoa-dentek-comfort-clean-floss-picks-150-cai.jpg', 1, '2019-12-16 10:16:26', '2019-12-16 10:16:26'),
(71, 'Vince Camuto', 600, 1, '<p>- Tăng cường với c&aacute;c ghi ch&uacute; da, trong khi cơ sở kết hợp vani, hoắc hương, tuyệt đối gợi cảm, hổ ph&aacute;ch Brazil n&oacute;ng v&agrave; như da xạ hương Fragrance.&nbsp;</p>\r\n\r\n<p>- Nước hoa Vince Camuto c&oacute; trong cặn ly tuyệt đẹp với nắp phong c&aacute;ch c&oacute; h&igrave;nh dạng giống như logo của thương hiệu.</p>', 1200000, 'http://heabea.vn/public/upload/product/product137-vince-camuto-eau-de-parfume-30-ml.jpg', 1, '2019-12-16 10:16:56', '2019-12-16 10:16:56'),
(72, 'Prada Candy', 650, 4, '<table border=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Prada&nbsp;được biết đến với thương hiệu thời trang cao cấp bắt nguồn từ nước &yacute; xinh đẹp. c&aacute;c bộ sưu tập của prada lu&ocirc;n độc đ&aacute;o, s&aacute;ng tạo v&agrave; th&aacute;ch thức mọi giới hạn, sự tinh tế trong từng chi tiết đ&atilde; tạo n&ecirc;n th&agrave;nh c&ocirc;ng của thương hiệu.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 650000, 'http://heabea.vn/public/upload/product/product150-nuoc-hoa-prada-candy-kiss-eau-de-parum-50ml.jpg', 1, '2019-12-16 10:17:33', '2019-12-16 10:17:33'),
(73, 'Platinum For Him', 760, 1, '<p><strong>Qu&yacute; ng&agrave;i lu&ocirc;n dẫn đầu trong phong c&aacute;ch.</strong></p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp;</strong>Nước hoa Platinium For Him được so s&aacute;nh như qu&yacute; ng&agrave;i dẫn đầu trong bộ sưu tập nước hoa b&aacute;n chạy nhất d&agrave;nh cho nam của Victoria&#39;s Secret. Một sự pha trộn c&aacute;c hương thơm độc đ&aacute;o của l&aacute; Violet, Oakmoss v&agrave; ti&ecirc;u. Nếu đ&atilde; l&agrave; t&iacute;n đồ của d&ograve;ng nước hoa Very Sexy For Him th&igrave; tại sao bạn kh&ocirc;ng l&agrave; người dẫn đầu bằng c&aacute;ch thử hương thơm độc đ&aacute;o của Platinium For Him?</p>\r\n\r\n<p><strong>Phong c&aacute;ch:&nbsp;</strong>Tươi m&aacute;t, lịch l&atilde;m</p>\r\n\r\n<p><strong>M&ugrave;i hương đặc trưng:&nbsp;</strong>L&aacute; Violet, Oakmoss, Ti&ecirc;u, R&ecirc;u Sồi</p>\r\n\r\n<p><strong>Thời điểm khuy&ecirc;n d&ugrave;ng:</strong><strong>&nbsp;</strong>Ng&agrave;y, Đ&ecirc;m, Xu&acirc;n, Hạ</p>', 750000, 'http://heabea.vn/public/upload/product/product191-very-sexy-platinum-for-him.jpg', 1, '2019-12-16 10:18:05', '2019-12-16 10:18:05'),
(74, 'Nước hoa SLIH', 600, 1, '<p><strong>Gợi cảm, quyến rũ v&agrave; tinh khiết. Bắt đầu một mối t&igrave;nh l&atilde;ng mạn mới với một sự pha trộn &aacute;nh s&aacute;ng tươi, hương hoa nữ t&iacute;nh v&agrave; ghi ch&uacute; của xạ hương c&oacute; đường. loại nước hoa: hoa Ghi ch&uacute;: lily nước, hoa qu&yacute;t v&agrave; xạ hương s&aacute;ng 50ml</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Fragrance type: Floral</strong></li>\r\n	<li><strong>Notes: Water lily, mandarin flower and luminous musk</strong></li>\r\n	<li><strong>50ml</strong></li>\r\n</ul>', 1200000, 'http://heabea.vn/public/upload/product/product1105-nuoc-hoa-nu-victorias-secret-love-is-heavenly-eau-de-parfum-50ml.jpg', 1, '2019-12-16 10:19:33', '2019-12-16 10:19:33'),
(75, 'Calvin Beauty', 600, 1, '<p>Calvin Klein vừa kh&aacute;m ph&aacute; ra một m&ugrave;i hương mang một phong c&aacute;ch hiện đại, nữ t&iacute;nh v&agrave; hứa hẹn sẽ l&agrave; một điểm nhấn của CK trong thời gian sắp tới. &quot;<strong>Beauty</strong>&quot; gợi l&ecirc;n sự quyến rũ, tinh tế v&agrave; sức mạnh. Với những m&ugrave;i hương chủ đạo như hoa Lily, hương hoa nh&agrave;i, v&agrave; lớp hương cuối l&agrave; c&acirc;y tuyết t&ugrave;ng sẽ gi&uacute;p cho m&ugrave;i hương được giữ l&acirc;u hơn. Thiết kế chai tựa như 1 chiếc nhẫn bạc bao tr&ugrave;m lấy phần thủy tinh tươi đẹp . M&ugrave;i hương n&agrave;y hiện c&oacute; mặt tr&ecirc;n thị trường v&agrave;o đ&uacute;ng dịp th&aacute;ng 10 năm 2010.<br />\r\n<strong>M&ugrave;i hương đặc trưng:</strong><br />\r\nHương hoa lily , hương hoa nh&agrave;i , gỗ tuyết t&ugrave;ng , thơm .<br />\r\n<strong>Phong c&aacute;ch:</strong><br />\r\nTinh tế , sức mạnh.</p>', 1200000, 'http://heabea.vn/public/upload/product/product136-calvin-klein-beauty-50ml.jpg', 1, '2019-12-16 10:20:12', '2019-12-16 10:20:12'),
(76, 'Nature Iron', 650, 4, '<p>Duy tr&igrave; nồng độ sắt ổn định trong cơ thể rất cần thiết cho việc vận chuyển oxy đi khắp cơ thể v&agrave; &nbsp;h&igrave;nh th&agrave;nh hồng cầu. Nature Made Iron 65 mg gi&uacute;p bổ sung chất sắt cho những người bị thiếu sắt.*</p>\r\n\r\n<p>Sắt l&agrave; th&agrave;nh phần quan trọng của hemoglobin v&agrave; protein, cho ph&eacute;p c&aacute;c hồng cầu mang oxy đi khắp cơ thể. Thiếu hụt sắt c&oacute; thể dẫn đến bệnh thiếu m&aacute;u do thiếu chất sắt, l&agrave; t&igrave;nh trạng m&agrave; trong đ&oacute; c&aacute;c hồng cầu kh&ocirc;ng thể vận chuyển đủ oxy để đ&aacute;p ứng nhu cầu của cơ thể.</p>\r\n\r\n<ul>\r\n	<li>Thiết yếu cho sự h&igrave;nh th&agrave;nh hồng cầu.</li>\r\n	<li>C&oacute; thể gi&uacute;p ngăn ngừa bệnh thiếu m&aacute;u do thiếu chất sắt.</li>\r\n</ul>', 350000, 'http://heabea.vn/public/upload/product/product175-vien-bo-sung-sat-nature-made-iron-65-mg-365-vien.jpg', 1, '2019-12-16 10:20:48', '2019-12-16 10:20:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, '', 'http://heabea.vn/public/upload/images/slide-11-.jpg'),
(2, '', 'http://heabea.vn/public/upload/images/slide-11-.jpg'),
(3, '', 'http://heabea.vn/public/upload/images/slide-10-.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `hoten`, `username`, `password`, `sdt`, `email`, `diachi`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Hoàng Anh', 'hoanganh', '$2y$10$vJBa/BTBoP4TvNeu6wdwh.uyQpSmzQ3H1SrPCOsWTqUJy3GGL5d3e', '0325554124', '', 'Quảng Ngãi', NULL, '2019-12-12 08:58:37', '2019-12-12 08:58:37'),
(9, 'Thanh Tùng', 'thanhtung', '$2y$10$Ar7bxQoZiRbGE4uINRFjWOAbJJmROZNGRtoGzlkc5VpunoyA2qRnq', '0325554121', 'dttung.18it3@sict.udn.vn', 'Quảng Ngãi', NULL, '2019-12-12 09:00:03', '2019-12-12 09:00:03'),
(15, 'Thùy Ngân', 'thuyngan', '$2y$10$gp72rK4zxS5HLwMKagD/.uqds.3a7utrReKdVoTWtkDUYC1CdlgUa', '0335521224', '', 'Quảng Ngãi', NULL, '2019-12-14 07:26:38', '2019-12-14 07:26:38'),
(18, 'thanh hà', 'thanh', '$2y$10$RRirlpokK5yz4q6xeZKuT.xvLCiDN8cRifxWNMuoUSZX5Cgu50mZi', '0393232905', NULL, 'thanh hóa', NULL, '2019-12-17 08:56:49', '2019-12-17 08:56:49');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`),
  ADD KEY `fk` (`id_bill`);

--
-- Chỉ mục cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
