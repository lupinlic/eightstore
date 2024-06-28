-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 08, 2024 lúc 10:45 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eight_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL,
  `cart_totalmoney` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(255) NOT NULL,
  `coupon_date` datetime NOT NULL,
  `supplier_id` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_sum` int(11) NOT NULL,
  `coupon_unitprice` int(255) NOT NULL,
  `coupon_total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_date`, `supplier_id`, `product_id`, `product_sum`, `coupon_unitprice`, `coupon_total`) VALUES
(12, '2023-12-26 00:00:00', 3, 37, 100, 80000, 8000000),
(13, '2024-01-08 00:00:00', 3, 38, 100, 100000, 10000000),
(14, '2024-01-08 00:00:00', 3, 39, 100, 90000, 9000000),
(15, '2024-01-08 00:00:00', 3, 40, 100, 150000, 15000000),
(16, '2024-01-08 00:00:00', 4, 45, 100, 80000, 8000000),
(17, '2024-01-08 00:00:00', 4, 46, 100, 200000, 20000000),
(18, '2024-01-08 00:00:00', 4, 51, 100, 200000, 20000000),
(19, '2024-01-08 00:00:00', 4, 52, 100, 200000, 20000000),
(20, '2024-01-08 00:00:00', 3, 41, 100, 400000, 40000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `management`
--

CREATE TABLE `management` (
  `management_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `oder-detail_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder`
--

CREATE TABLE `oder` (
  `oder_id` int(11) NOT NULL,
  `oder_date` datetime NOT NULL,
  `oder_status` varchar(255) NOT NULL,
  `oder_totalmoney` int(255) NOT NULL,
  `oder_classify` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `oder_name` varchar(255) NOT NULL,
  `oder_email` varchar(255) NOT NULL,
  `oder_telephone` varchar(255) NOT NULL,
  `oder_address` varchar(255) NOT NULL,
  `oder_content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `oder`
--

INSERT INTO `oder` (`oder_id`, `oder_date`, `oder_status`, `oder_totalmoney`, `oder_classify`, `user_id`, `oder_name`, `oder_email`, `oder_telephone`, `oder_address`, `oder_content`) VALUES
(33, '2023-12-26 21:07:33', 'hoàn thành', 170000, 'online', 2, 'lam', '', '0328443736', 'tân triều', ''),
(34, '2023-12-26 21:14:07', 'hoàn thành', 170000, 'online', 2, 'vung', '', '0328443736', 'a', ''),
(35, '2023-12-26 21:27:38', 'hoàn thành', 510000, 'online', 2, 'vung', '', '0328443736', 'tân triều', ''),
(36, '2023-12-26 21:28:42', 'hoàn thành', 680000, 'online', 2, 'son', '', '0276353454', 'tân triều', ''),
(37, '2023-12-26 21:35:33', 'hoàn thành', 170000, 'online', 2, 'vung', '', '0328443736', 'dbhbchd', ''),
(38, '2023-12-28 15:48:27', 'hoàn thành', 170000, 'online', 2, 'lam', '', '0328443736', 'tân triều', ''),
(39, '2023-12-28 15:51:26', 'hoàn thành', 170000, 'online', 2, 'vung', '', '0276353454', 'dbhbchd', ''),
(40, '2024-01-08 15:55:56', 'hoàn thành', 340000, 'online', 2, 'lam', '', '0328443736', 'tân triều', ''),
(41, '2024-01-08 16:15:28', 'đang vận chuyển', 510000, 'online', 2, 'a', '', '0328443736', 'tân triều', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order-detail`
--

CREATE TABLE `order-detail` (
  `order-detail_id` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `order-detail_num` int(255) NOT NULL,
  `order-detail_total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order-detail`
--

INSERT INTO `order-detail` (`order-detail_id`, `product_id`, `order_id`, `order-detail_num`, `order-detail_total`, `user_id`) VALUES
(29, 37, 33, 1, 170000, 2),
(30, 37, 34, 1, 170000, 2),
(31, 37, 35, 3, 510000, 2),
(32, 37, 36, 4, 680000, 2),
(33, 37, 37, 1, 170000, 2),
(34, 37, 38, 1, 170000, 2),
(35, 37, 39, 1, 170000, 2),
(36, 37, 40, 2, 340000, 2),
(37, 37, 41, 3, 510000, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `staff_telephone` varchar(255) NOT NULL,
  `staff_wage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_telephone`, `staff_wage`) VALUES
(2, 'Lâm', '0328443736', '10000000'),
(3, 'đạt', '2', '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `supplier_address` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_address`) VALUES
(3, 'hứa tùng lâm', '20 tân triều'),
(4, 'tạ văn vững', '53 tân triều');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(22, 'Sữa rửa mặt'),
(28, 'Dầu gội'),
(30, 'Kem chống nắng'),
(32, 'Son'),
(33, 'Nước hoa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_mota` varchar(5000) NOT NULL,
  `category_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_img`, `product_price`, `product_mota`, `category_id`) VALUES
(37, 'Son Kem Lì Merzy Soft ', '../../css/img/upload/Merzy-Soft-Touch-Lip-Tint_170.jpg', '170000', 'Son kem lì Merzy Soft Touch Lip Tink có chất kem dạng tint nhung lì, chứa các công thức đàn hồi tạo kết cấu lì nhưng vẫn duy trì được độ ẩm bên trong. Môi luôn căng mướt, dưỡng ẩm khi sử dụng sản phẩm. Dòng son này chính là sự pha lẫn giữa nét nhẹ nhàng, mạnh mẽ của một cô gái trưởng thành.\r\n\r\n', 32),
(38, 'Son Tint Merzy The Watery Dew', '../../css/img/upload/Merzy-The-Watery-Dew-Tint_170.jpg', '170000', 'Merzy The Watery Dew Tint ver.3 mang hiệu ứng water gloss với chất son tint thạch óng ánh tạo nên độ bóng hoàn hảo cho đôi môi. kết cấu son mỏng nhẹ, thấm nhanh khi lên môi, tạo độ ẩm cho môi luôn được mịn màng, không làm nặng hay bết dính môi như những dạng son tint bóng cũ.', 32),
(39, 'Son Kem Lì Merzy The First Velvet ', '../../css/img/upload/-merzy-v6-xanh-170.jpg', '170000', 'Merzy The First Velvet Tint ra mắt vào năm 2017 đã nhận được rất nhiều sự yêu thích vì màu son lạ, cá tính nhưng vẫn dễ sử dụng. Ngay lúc đó thỏi son Merzy màu V6 này đã bán được hơn 3,5 triệu sản phẩm. Qua 2 lần thay đổi diện mạo sáng đỏ và tiếp đến xanh dương cho đến 2022 thỏi son đã cán mốc 10 triệu cây trên toàn thế giới. ', 32),
(40, 'Son Thỏi Nars Lipstick 1.6gr', '../../css/img/upload/Nars-Lipstick-1_6gr_270.jpg', '270000', 'Son Nars luôn là một trong những dòng son phân khúc High-end được bao nàng mê mẩn, nay Beauty Garden về phiên bản mini màu Inappropriate Red - đỏ tươi có ánh hồng mang đến sự quyến rũ, quyền lực. Rất thích hợp sử dụng cho những ngày party cuối năm, Inappropriate Red tạo nên sự nổi bật và thu hút.', 32),
(41, 'Son Kem Shu Uemura Rouge Unlimited', '../../css/img/upload/Shu-Uemura-Kinu-Cream_680.jpg', '680000', 'Son kem Shu Uemura Rouge Unlimited Kinu Cream được lấy ý tưởng từ Lụa Nhật Bản với công thức tân tiến cho đôi môi mềm mượt như lụa, lớp màu thuần khiết, đậm nét nhưng không gây bết dính, kết hợp thiết kế đầu cọ độc đáo giúp che phủ tuyệt đối cho đôi môi hoàn hảo.', 32),
(42, 'Son Kem Lì Black Rouge Double Layer', '../../css/img/upload/Son-Black-Rouge-Double-Layer-Over-Velvet_170.jpg', '170000', 'Sau một thời gian oanh tạc cùng Black Rouge Air Fit Velvet Tint thì nay Black Rouge đã có sự xuất hiện của “nhân tố” mới khiến cộng đồng làm đẹp ngây ngất. Black Rouge Double Layer không chỉ tập trung vào màu sắc mà những chi tiết về bao bì, hiệu ứng son khi lên môi cũng được chăm chút rất tỉ mỉ, xứng đáng là thỏi son phải sở hữu trong dịp lễ hội cuối năm này. ', 32),
(43, 'Son Kem Black Rouge Air Fit Velvet', '../../css/img/upload/Son-kem-lì-Black-Rouge-Air-Fit-Velvet-Tint-Ver8.jpg', '150000', 'Thương hiệu mỹ phẩm Hàn Quốc - Black Rouge xứng đáng được gọi là “nhãn hàng chăm chỉ của năm” khi liên tục đổi mới và cho ra mắt các sản phẩm trong năm. Lần này, Black Rouge đã chính thức “thả xích” BST Air Fit Velvet Tint Season 8 - The Crystal, đây chắc chắn là điều mà đông đảo bạn gái đã mong ngóng từ lâu.', 32),
(44, 'Son Tint Bóng BBia Glow Lip', '../../css/img/upload/Son-tint-BBIA-Glow-Lip-Tint-3_2gr_150.jpg', '150000', 'Chất son này cũng rất thích hợp với xu hướng makeup hiện nay: lớp nền chắc khỏe -  mi và chân mày chuốt nhẹ - một chút má hồng cùng đôi môi căng mọng... son tint bóng BBIA sẽ là \"chân ái\" cho những ai đang theo đuổi style Clean Girl. ', 32),
(45, 'Sữa Rửa Mặt Innisfree Green Tea', '../../css/img/upload/Innisfree-Green-Tea-180.jpg', '180000', 'Sữa rửa mặt Innisfree Green Tea Hydrating Amino Acid Cleansing Foam chứa loại trà được trồng tại Seogwang ở Seogwipo, Jeju, Hàn Quốc - nơi có khí hậu ôn hòa, trong lành để cho ra đời những lá trà xanh chất lượng, thích hợp đưa vào những sản phẩm làm đẹp.', 22),
(46, 'Sữa Rửa Mặt Beldora 299', '../../css/img/upload/Sua-rua-mat-Beldora-330.jpg', '330000', 'Sữa rửa mặt Beldora 299 thuộc dòng sản phẩm chăm sóc dành cho da nhạy cảm xuất hiện những dấu hiệu lão hóa, sản phẩm gồm những hợp chất \"bồi bổ\" cho da như: amino acid, ceramide, HA,... cùng độ pH 5.5 mang khả năng làm sạch và nuôi dưỡng sâu, thích hợp cho cả những loại da bắt đầu tập tành treatment. ', 22),
(47, 'Sữa Rửa Mặt Byvibes Wonder', '../../css/img/upload/sua-rua-mat-Byvibes-Wonder-Bath-PHA-160.jpg', '160000', 'Sữa Rửa Mặt Byvibes Wonder Bath PHA 5.5 PH Balancing PHA Cleansing Foam có các thành phần có nguồn gốc chủ yếu từ thiên nhiên, phù hợp với mọi loại da kể cả da nhạy cảm. Sữa Rửa Mặt Byvibes Wonder Bath được chứng nhận thuần chay, an toàn và giúp da ngày càng khỏe mạnh hơn. ', 22),
(48, 'Sữa Rửa Mặt Cetaphil Gentle', '../../css/img/upload/Sua-rua-mat--Cetaphil-Gentle-Skin-Cleanser-390.jpg', '360000', 'Sữa rửa mặt Cetaphil được xem là một trong những dòng sữa rửa mặt thân thiện mà ai cũng có thể sử dụng được, sản phẩm được kiểm nghiệm bởi các chuyên gia da liễu và chứng mình lâm sàn an toàn cho da. Qua bao năm tháng sản phẩm vẫn giữ vững \"ngôi vương\" của mình, thích hợp cho cả da nhạy cảm, xoa dịu làn da kích ứng mang đến cảm giác da sạch khỏe, mềm mịn.', 22),
(49, 'Sữa Rửa Mặt Derladie Herbal', '../../css/img/upload/Sua-rua-mat-Derladie-Herbal-150.jpg', '150000', 'Da mụn, da dầu vẫn luôn là nỗi ám ảnh của những cô gái châu Á. Tuy nhiên, nếu lựa chọn những sản phẩm phù hợp thì đây chắc chắn sẽ không còn là vấn đề nan giải của các bạn gái nữa. ', 22),
(50, 'Sữa Rửa Mặt SVR Sebiaclear', '../../css/img/upload/Sua-rua-mat-SVR-Sebiaclear-260.jpg', '260000', 'SVR ra đời vào năm 1962 tại Pháp bởi một cặp vợ chồng dược sĩ. Các sản phẩm của SVR đa dạng với công dụng riêng biệt và được các bác sĩ tin dùng. Ngoài ra, các sản phẩm với thành phần có nồng độ hoạt chất cao nhưng vẫn đảm bảo dung nạp lên da. Đặc biệt là được thử nghiệm hoàn toàn trên trên làn da nhạy cảm.', 22),
(51, 'Dầu Gội Head & Shoulders ', '../../css/img/upload/01-13082018112901.jpg', '250000', 'Một mái tóc khỏe đẹp là mái tóc sạch gàu. Da đầu mà bong tróc nhiều vảy gàu thì đi ra đường cực kì mất tự tin, nhất là khi chúng ta mặc quần áo sẫm màu như: xanh, đen, đỏ,... ', 28),
(52, 'Dầu Gội Phủ Bạc Cà Phê Đen', '../../css/img/upload/cafeden-320.jpg', '350000', 'Nhuộm tóc là nhu cầu làm đẹp chính đáng của mọi người, nhất là ở những người bị tóc bạc. Tuy nhiên, thuốc nhuộm tóc chứa nhiều thành phần hóa học nên là một trong những loại mỹ phẩm dễ gây dị ứng hàng đầu và tiềm ẩn nhiều nguy cơ không tốt đối với người sử dụng.', 28),
(53, 'Dầu Gội Đầu Clear Scalp', '../../css/img/upload/clear_100.jpg', '100000', ' Với dầu gội Clear Scalp Care Shampoo chứa các tinh thể mát lạnh, nhẹ nhàng làm sạch, cuốn trôi bụi bẩn và dầu nhờn. Trả lại mái tóc chắc khỏe và óng mượt bạn yêu thích.', 28),
(54, 'Dầu Gội Mộc Nhu Thảo Dược ', '../../css/img/upload/co-muc-06072019042203.jpg', '250000', 'Cách đây hàng ngàn năm, cỏ mực & mè đen đã được mệnh danh là “liều thuốc bổ” dành cho mái tóc bạc sớm, lão hóa và hư tổn. Nó được sử dụng để làm dầu gội nhuộm đen tóc, nuôi dưỡng tóc bóng mượt và chắc khỏe.', 28),
(55, 'Dầu Gội Etiaxil Déo', '../../css/img/upload/etiaxil_260.jpg', '260000', 'Sản phẩm mới Etiaxil Deo-Shampoo nhẹ nhàng làm sạch da đầu và điều tiết bã nhờn bằng cách sử dụng muối kẽm, cân bằng lại hệ vi sinh vật trên da, khử mùi hôi.\r\n\r\n', 28),
(56, 'Dầu Gội Love Beauty', '../../css/img/upload/love_beauty_50.jpg', '50000', 'Tạm biệt hư tổn, đón chào mái tóc rạng ngời đầy sức sống. Dầu gội Love Beauty and Planet hòa quyện dầu dừa organic, giúp dưỡng ẩm tuyệt vời cho mái tóc chắc khỏe.', 28),
(57, 'Dầu Gội Simple Kind To Hair', '../../css/img/upload/simple_kind_105.jpg', '105000', 'Simple là thương hiệu không chỉ quen thuộc bởi các dòng mỹ phẩm dưỡng da lành tính, an toàn mà còn kết thân với cả mái tóc, Dầu Gội Simple Kind to Hair Gentle Care Shampoo 200ml nhẹ dịu dành cho cả da đầu nhạy cảm. ', 28),
(58, 'Kem Chống Nắng Cell Fusion', '../../css/img/upload/Cell-Fusion-C-340.jpg', '340000', 'Kem chống nắng Cell Fusion C Brightening Tone Up Sunscreen 100 màng lọc vật lý, an toàn, không gây kích ứng, bảo vệ da khỏi các ảnh hưởng do tia tử ngoại tấn công. Sản phẩm được nghiên cứu và phát triển bởi các chuyên gia thuộc thương hiệu dược mỹ phẩm hàng đầu CMS Lab tại Hàn Quốc.', 30),
(59, 'Kem Chống Nắng Espoir Water', '../../css/img/upload/Kem-chong-nang-Espoir-Water-260.jpg', '260000', 'Espoir là thương hiệu mỹ phẩm cao cấp đến từ tập đoàn Amore Pacific  hãng mỹ phẩm chuyên về makeup.Tại Việt Nam, Espoir một cái tên không quá mới lạ, thương hiệu được yêu thích trên thị trường bởi chất lượng cao mà giá cả cực kì phải chăng và được nhiều khách hàng lựa chọn, tin dùng.', 30),
(60, 'Kem Chống Nắng Heliocare 360', '../../css/img/upload/Kem-chong-nang-Heliocare-490.jpg', '490000', 'Với những làn da \"khó chiều\" vẫn đang đau đầu tìm một loại chống nắng an toàn, lành tính thì chần chừ gì mà không thử Kem chống nắng Heliocare Mineral Tolerance này?! Sản phẩm có công thức màng lọc khoáng nên rất nhẹ dịu cho da, đặc biệt da nhạy cảm. ', 30),
(61, 'Kem Chống Nắng Innisfree Intensive', '../../css/img/upload/Kem-chong-nang-Innisfree-240.jpg', '240000', 'Innisfree là thương hiệu mỹ phẩm nổi tiếng của Hàn được thành lập vào năm 2000. Tập đoàn quản lý thương hiệu này là AmorePacific, cũng là nơi sử hữu nhiều hãng mỹ phẩm nổi tiếng khác như Laneige, Mamonde, Sulwashoo.  ', 30),
(62, 'Kem Chống Nắng La Roche-Posay', '../../css/img/upload/Kem-chong-nang-La-roche-380.jpg', '380000', 'Nếu dòng kem chống nắng La Roche-Posay Oil Control vạch xanh lá đã khiến bao \"con dân\" điên đảo vì khả năng chống nắng ổn đi cùng finish xịn mịn thì nay sản phẩm đã được khoác thêm lớp màng lọc xịn xò Mexoryl 400 và công nghệ độc quyền Netlock giúp bảo vệ da khỏi các tác nhân gây của thâm nám.', 30),
(63, 'Kem Chống Nắng PrettySkin', '../../css/img/upload/kem-chong-nang-PrettySkin-Hydra-170.jpg', '170000', 'Kem chống nắng PrettySkin Hydra B5 Sun Scream SPF50+/PA++++ đến từ Hàn Quốc có chứa đến 7 màng lọc chống nắng đình đám hiện nay, bảo vệ da khỏi các tia UVA UVB, giữ da an toàn, không gây kích ứng.', 30),
(64, 'Nước Hoa ARMAF Club De Nuit', '../../css/img/upload/Nuoc hoa ARMAF Club de Nuit Sillag.jpg', '980000', 'Nước hoa Armaf Club de Nuit Sillage dành cho nam của thương hiệu ARMAF là một hương thơm mới dành cho nam giới vừa được ra mắt vào năm 2020. Armaf Club de Nuit Sillage có độ lưu hương khá lâu, thích hợp với những anh chàng có phong cách nam tính, lịch lãm và năng động. ', 33),
(65, 'Nước Hoa ARMAF Club', '../../css/img/upload/nuoc_hoa_armaf_980.jpg', '980000', '', 33),
(66, 'Nước Hoa Berdoues ', '../../css/img/upload/nuoc_hoa_berdoues_900.jpg', '900000', 'Berdoues 1902 sở hữu bí quyết gia truyền trong công trình nghiên cứu và chế tác nước hóa, nổi tiếng trong việc ra đời những loại nước hoa chất lượng, độc đáo, gắn liền với cảm xúc người dùng.', 33),
(67, 'Nước Hoa Narciso Rodriguez', '../../css/img/upload/nuoc_hoa_narciso_350.jpg', '350000', 'Nước hoa Narciso Rodriguez For Her xinh xắn đáng yêu, với mùi hương ngọt ngào và nữ tính với sự ngây thơ, tinh nghịch khiến bất cứ cô gái nào cũng đều trở nên lôi cuốn vô cùng. Thích hợp là món quà tặng trong dịp sinh nhật, hay hẹn hò.', 33),
(68, 'Nước Hoa Nữ Venus Global', '../../css/img/upload/nuoc_hoa_venus_190.jpg', '190000', 'Thương hiệu Laura Anne thuộc công ty VENUS - INC, có trụ sở tại Prudential Tower Singapore là dòng nước hoa cao cấp có toàn bộ nguyên liệu được nhập khẩu trực tiếp từ Pháp với công nghệ sản xuất tiên tiến đạt tiêu chuẩn quốc tế. ', 33),
(69, 'Nước Hoa Nữ Pinker Bell ', '../../css/img/upload/nuoc_hoa_pinkerbell_260.jpg', '260000', 'Nước Hoa Pinker Bell Eau De Perfume là dòng nước hoa nữ đến từ thương hiệu nước hoa Pinker Bell của Hàn Quốc, với nồng độ tinh dầu 12 - 20% giúp độ lưu hương lên đến 6 tiếng, mùi hương đa dạng được xem là bản dupe của các hãng nước hoa nổi tiếng trên thế giới. Thiết kế sang trọng, tinh tế nhỏ gọn dễ mang theo.', 33);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(110) NOT NULL,
  `user_password` varchar(110) NOT NULL,
  `user_email` varchar(110) NOT NULL,
  `user_role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_password`, `user_email`, `user_role`) VALUES
(1, 'admin', '123', 'admin@gmail.com', 1),
(2, 'lam', '123', 'lam@gmail.com', 0),
(6, 'vững', '123', 'vung@gmail.com', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Chỉ mục cho bảng `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`management_id`),
  ADD KEY `management_ibfk_1` (`coupon_id`),
  ADD KEY `oder-detail_id` (`oder-detail_id`);

--
-- Chỉ mục cho bảng `oder`
--
ALTER TABLE `oder`
  ADD PRIMARY KEY (`oder_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order-detail`
--
ALTER TABLE `order-detail`
  ADD PRIMARY KEY (`order-detail_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `tbl_product_ibfk_1` (`category_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `management`
--
ALTER TABLE `management`
  MODIFY `management_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `oder`
--
ALTER TABLE `oder`
  MODIFY `oder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `order-detail`
--
ALTER TABLE `order-detail`
  MODIFY `order-detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD CONSTRAINT `coupon_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `management`
--
ALTER TABLE `management`
  ADD CONSTRAINT `management_ibfk_1` FOREIGN KEY (`coupon_id`) REFERENCES `coupon` (`coupon_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `management_ibfk_2` FOREIGN KEY (`oder-detail_id`) REFERENCES `order-detail` (`order-detail_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `oder`
--
ALTER TABLE `oder`
  ADD CONSTRAINT `oder_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order-detail`
--
ALTER TABLE `order-detail`
  ADD CONSTRAINT `order-detail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order-detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order-detail_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `oder` (`oder_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
