-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2023 lúc 11:04 AM
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
-- Cơ sở dữ liệu: `wzang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `iduser` int(10) DEFAULT 0,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(50) NOT NULL,
  `bill_email` varchar(100) NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0.Thanh toán trực tiếp\r\n1.Chuyển khoản\r\n',
  `soluong` int(11) NOT NULL,
  `ngaydathang` varchar(50) DEFAULT NULL,
  `total` int(10) NOT NULL DEFAULT 0,
  `bill_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0.Đơn hàng mới\r\n1.Đang xử lý\r\n2.Đang giao hàng\r\n3.Đã giao hàng\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `iduser`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `soluong`, `ngaydathang`, `total`, `bill_status`) VALUES
(206, 38, 'zang', '121 Nguyễn Viết Xuân', '0858328685', 'nguyenthihuonggiangqb3174@gmail.com', 0, 0, '2023-11-26 15:56:11 PM', 449000, 0),
(208, 38, 'zang', '121 Nguyễn Viết Xuân', '0858328685', 'nguyenthihuonggiangqb3174@gmail.com', 0, 0, '2023-11-26 16:39:35 PM', 1399000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(10) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `idpro` int(10) NOT NULL,
  `ngaybinhluan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `noidung`, `user`, `idpro`, `ngaybinhluan`) VALUES
(60, 'đẹp lắm', 'zang', 27, '16/11/2023'),
(61, 'nên mang', 'zang', 27, '16/11/2023'),
(62, 'mang êm chân', 'zang', 27, '16/11/2023'),
(63, 'đẹp', '', 41, '18/11/2023'),
(64, 'hi', '', 38, '18/11/2023'),
(65, 'đẹp', 'zang', 28, '18/11/2023'),
(66, 'wow đẹp nhưng nghèo', 'zang', 28, '18/11/2023'),
(67, 'tuyệt vời', 'zang', 47, '21/11/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idpro` int(10) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(10) NOT NULL DEFAULT 0,
  `soluong` int(3) NOT NULL,
  `idbill` int(10) NOT NULL,
  `thanhtien` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `iduser`, `idpro`, `img`, `name`, `price`, `soluong`, `idbill`, `thanhtien`) VALUES
(549, 38, 28, 'Hoodie.png', 'Áo Hoodie ', 200000, 1, 200, 200000),
(552, 38, 47, 'Jean.png', 'Áo Jeans', 500000, 1, 203, 500000),
(553, 38, 48, 'Dép quai hậu nam.png', 'Dép Quai Hậu', 99000, 1, 204, 99000),
(554, 38, 45, 'Quần tây.png', 'Quần Tây', 399000, 1, 205, 399000),
(555, 38, 44, 'Quần.png', 'Quần Baggy Suông', 300000, 1, 206, 300000),
(556, 38, 43, 'Adidas.png', 'Giày Adidas', 149000, 1, 206, 149000),
(557, 38, 30, 'Polo.png', 'Áo Polo', 159000, 1, 207, 159000),
(558, 38, 26, 'Dép Sandal 5 phân.png', 'Guốc 5 Phân', 500000, 1, 208, 500000),
(559, 38, 47, 'Jean.png', 'Áo Jeans', 500000, 1, 208, 500000),
(560, 38, 45, 'Quần tây.png', 'Quần Tây', 399000, 1, 208, 399000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(15, 'Dép'),
(16, 'Giày'),
(17, 'Quần'),
(18, 'Áo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) DEFAULT 0,
  `img` varchar(255) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `mota`, `luotxem`, `iddm`) VALUES
(26, 'Guốc 5 Phân', 500000, 'Dép Sandal 5 phân.png', '   Sản phẩm được thiết kế \"remix\" từ Chuck và Runner khi 2 yếu tố thời trang.\r\n\r\n\r\n\r\nChất liệu canvas và đế Run Star zig-zag được thiết kế với dạng răng cưa to bản, giúp tăng độ bám tạo được điểm nhấn về phong cách và ấn tượng về thời trang. \r\n\r\n\r\n\r\nLớp lót dày tạo cảm giác êm ái khi vận động, vải dày dặn, cứng form hơn.\r\n\r\n\r\n\r\nDây giày dày hơn, cùng màu với phần đế, tem gót đen 1st-tring - đặc trưng.\r\n\r\n\r\n\r\nLà biểu tượng của văn hóa thể thao và các loại hình nghệ thuật đường phố kiểu Mỹ, truyền cảm hứng và sức sáng tạo mạnh mẽ đến giới trẻ trên toàn thế giới.\r\n\r\n\r\n\r\nVới đôi giày này bạn có thể chọn quần jeans với áo pull đơn giản. Bạn mix theo kiểu tone xuyệt tone để mang tới sự hài hòa trong phong cách.', 0, 15),
(27, 'Giày Coverse', 250000, 'Converse.png', 'Sản phẩm được thiết kế \"remix\" từ Chuck và Runner khi 2 yếu tố thời trang.\r\n\r\n\r\n\r\nChất liệu canvas và đế Run Star zig-zag được thiết kế với dạng răng cưa to bản, giúp tăng độ bám tạo được điểm nhấn về phong cách và ấn tượng về thời trang. \r\n\r\n\r\n\r\nLớp lót dày tạo cảm giác êm ái khi vận động, vải dày dặn, cứng form hơn.\r\n\r\n\r\n\r\nDây giày dày hơn, cùng màu với phần đế, tem gót đen 1st-tring - đặc trưng.\r\n\r\n\r\n\r\nLà biểu tượng của văn hóa thể thao và các loại hình nghệ thuật đường phố kiểu Mỹ, truyền cảm hứng và sức sáng tạo mạnh mẽ đến giới trẻ trên toàn thế giới.\r\n\r\n\r\n\r\nVới đôi giày này bạn có thể chọn quần jeans với áo pull đơn giản. Bạn mix theo kiểu tone xuyệt tone để mang tới sự hài hòa trong phong cách.', 0, 16),
(28, 'Áo Hoodie ', 200000, 'Hoodie.png', 'Áo nỉ\r\n\r\n- Màu sắc: Nâu, Kem\r\n\r\n- Size: Free size ( 40 - 65 kg)\r\n\r\n- Chất liệu:  Nỉ cotton\r\n\r\n- Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn.\r\n\r\n- Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Phù hợp khi mix đồ với nhiều loại.\r\n\r\n- Thiết kế hiện đại, trẻ trung, năng động. Dễ phối đồ.\r\n\r\n- Chât vải 100% từ sợi Cotton hoặc từ các sợi có độ bền màu cao từ\r\n\r\nthương nhiên .\r\n\r\n-Thấm hút mồ hôi và thoải mái ko gò bó khi vận động và luông giữ form dáng\r\n\r\ntheo năm tháng', 0, 18),
(29, 'Giày Vans', 666000, 'Vans.png', ' Giày vans đen', 0, 16),
(30, 'Áo Polo', 159000, 'Polo.png', ' - Chất Liệu Cotton thoáng mát co dãn nhẹ\r\n- Đường Kim mũi chỉ cẩn thận chi tiết sắc nét\r\n- From vừa mặc tạo cảm giác thỏa mái\r\n- Khâu viền xung quanh đảm bảo độ bền và chắc \r\n- Hình in sắc nét trực tiếp lên áo không sợ bong tróc\r\n- Màu ảo nhuôm công nghệ mới nhất giặt không phai màu\r\náo free size from rộng dưới 70kg', 0, 18),
(31, 'Áo Blazer', 200000, 'Blazer.png', ' TÊN SẢN PHẨM: Áo blazer nam hàn quốc Độc menswear chiết hai ly eo form ôm dễ dàng phối đồ tôn dáng, vải kate 2 lớp - BZ\r\n\r\nTHÔNG TIN SẢN PHẨM ÁO BLAZER NAM\r\n\r\n- Chất liệu: Vải ít nhăn, chất vải kate 2 lớp có độ dày vừa phải\r\n\r\n- Kiểu dáng: Form dễ mặc\r\n\r\n- Đường may được gia công tỉ mỉ, chắc chắn\r\n\r\n- Tình trạng: có sẵn', 0, 18),
(34, 'Dép Quai Ngang', 100000, 'Dép quai ngang.png', '   \r\n\r\n- Chất liệu Quai cao su  , Đế  PU cao cấp đàn hồi tốt, chắc chắn.\r\n- Đế cực êm, đi đứng lâu vẫn thoải mái. \r\n', 0, 15),
(35, 'Quần Đùi', 100000, 'Quần đùi.png', ' Quần Short Teelab Local Brand Unisex  Màu Đen, Quần Lừng Nam Nữ Phong Cách Basic Storeunisex\r\n\r\n\r\n\r\n- Chất liệu: Nỉ chân cua 350gsm\r\n\r\n- Form: Cơ bản\r\n\r\n- Thiết kế: Hình Typography In cán lụa cao cấp\r\n\r\n- Túi: Có 2 túi bên và sau\r\n\r\n- Bảo quản: Giặt với nước lạnh', 0, 17),
(38, 'Giày MLB', 400000, 'MLB.png', 'Giày thể thao MLB Chunky là siêu phẩm Hot nhất năm 2023\r\nMÔ TẢ SẢN PHẨM GIÀY THỂ THAO MLB CHUNKY:\r\n- SIZE: 36-43\r\n- Đế : Đế 2 lớp làm bằng chất liệu cao su cao cấp \r\n- Chiều cao đế: Giày Sneaker MLB có chiều cao 4-5cm\r\n- Lót giày thể thao: Lót dày dặn và mềm mại tại cảm giác êm ái khi vận động bảo vệ đôi bàn chân thoải mái\r\n- Giày MLB Chunky dễ phối đồ thích hợp cho các hoạt động đi lại hàng ngày, chạy bộ\r\n- Mũi giay the thao tròn, đế cao su tổng hợp, xẻ rãnh tạo cảm giác thoải mái khi đi\r\n- Giày MLB Thích hợp với các mùa trong năm: Xuân - Hè - Thu - Đông', 0, 16),
(40, 'Áo Phông', 666000, 'Áo phông.png', '  Mô Tả:\r\n\r\n•	Chất liệu thun mềm mại co giãn tốt , thoáng mát\r\n\r\n•	Thiết kế thời trang phù hợp xu hướng hiện nay\r\n\r\n•	Kiểu dáng đa phong cách\r\n\r\n•	Đường may tinh tế sắc sảo\r\n\r\n•	Áo thun được thiết kế vể đẹp trẻ trung năng động nhưng không kém phần mạnh mẽ.\r\n\r\n•	Áo được thiết kế đẹp, chuẩn form, đường may sắc xảo, vải dày, mịn, thấm hút mồ hôi tạo sự thoải mái khi mặc!\r\n\r\n•	Dễ dàng phối trang phục , thích hợp đi chơi đi làm đi dạo phố\r\n\r\n•	Thích hợp cho sự kết hợp vứi quần jean, sọt,kaki!', 0, 18),
(41, 'Quần Jeans', 200000, 'Quần jeans.png', ' Chi tiết Quần Jean Nam Nữ Baggy màu xanh dương nhạt:\r\nChất liệu: Vải Jean.\r\nSize: dưới 70kg\r\nVải dày dặn, mềm mại.\r\nThoáng khí, thấm hút mồ hôi.\r\nGiữ form sau khi giặt & không bị nhăn, không phai màu.', 0, 17),
(42, 'Giày Tây', 300000, 'Giày tây.png', '\r\n\r\nPatina mang lại cho đôi giày Tây đẳng cấp khác biệt, Patina có nguồn gốc từ hãng giày nổi tiếng Berluti, nó là thuật ngữ nói về phương pháp đánh màu thủ công nhờ những bàn tay của người thợ lâu năm tạo ra, vì là thủ công nên mỗi đôi giày là 1 thể duy nhất, không có đôi giày nào giống nhau được cả. Tuy Nhiên màu Patina sẽ yêu cầu kĩ thuật của thợ phải thật cao, tay nghề cao và có mắt sáng tạo.', 0, 16),
(43, 'Giày Adidas', 149000, 'Adidas.png', 'Không chỉ là một đôi giày, mà chính là một tuyên ngôn. Dòng adidas Forum ra mắt năm 1984 và cực kỳ được ưa chuộng cả trên sân bóng rổ lẫn trong giới âm nhạc. Mẫu mới của dòng giày kinh điển này tái hiện tinh thần thập niên 80, nguồn năng lượng bùng nổ trên sân đấu cũng như thiết kế quai cổ chân chữ X đặc trưng, kết tinh thành phiên bản cổ thấp đậm chất đường phố.\r\n- Có dây giày và quai tùy chỉnh\r\n- Thân giày bằng da\r\n- Đế ngoài bằng cao su', 0, 16),
(44, 'Quần Baggy Suông', 300000, 'Quần.png', 'Quần dài thun ỐNG SUÔNG sọc gân màu đen và trắng chất vải thun dày dặn co dãn tốt \r\nThông tin sản phẩm :\r\n- Sản xuất : VIỆT NAM \r\n- Thương hiệu : Avocado\r\n- Chất liệu vải thun umi hàn dày dặn co giãn\r\n- Phù hợp mặc đi chơi, đi thể dục thể thao.\r\nDáng quần từ trên xuống dưới sẽ hơi ôm vào theo dáng người chứ không phải suông thẳng từ trên xuống dưới, khách hàng lưu ý giúp shop.\r\n', 0, 17),
(45, 'Quần Tây', 399000, 'Quần tây.png', 'Quần tây âu nam cạp cao Sidetab cao cấp  LADOS-4093 form Hàn, chất vải đẹp, co giãn, sang trọng, lịch lãm\r\n\r\n⏩ Thông tin sản phẩm:\r\n\r\n???? Chất liệu: Chất Vải dày, Không nhăn\r\n\r\n???? Co giãn nhẹ, đặc biệt không nhăn\r\n\r\n???? Chất vải đẹp, không xù lông, không phai màu\r\n\r\n???? Đường may cực tỉ mỉ cực đẹp\r\n\r\n???? Có thể mặc đi làm, đi chơi, dễ phối đồ, không kén người mặc\r\n\r\n???? Kiểu dáng: Thiết kế theo form Slimfit , dáng gọn, tôn dám trẻ trung- thông số phù hợp với người việt nam', 0, 17),
(46, 'Quần Adidas', 299000, 'Quần adidass.png', ' Đây chính là kiểu trang phục chạy bộ bạn sẽ muốn mặc cả vào những hôm nghỉ tập. Chiếc quần adidas này đáp ứng mọi yếu tố cần thiết trên đường chạy, từ túi quần chống thấm mồ hôi đến khả năng phản quang 360 độ. Quần có đủ độ co giãn để bạn tập yoga sau giờ chạy và các túi hai bên đựng chìa khóa. Thêm vào đó, thiết kế classic cực kỳ phù hợp để bạn mặc đi uống nước cùng nhóm chạy bộ buổi tối.\r\n- Dáng regular fit\r\n- Cạp chun có dây rút\r\n- Vải dệt interlock làm từ 91% polyester tái chế, 9% elastane\r\n- Thấm hút ẩm\r\n- Túi chống thấm mồ hôi\r\n- Các túi hai bên\r\n- Phản quang 360 độ', 0, 17),
(47, 'Áo Jeans', 500000, 'Jean.png', 'THÔNG TIN CHI TIẾT\r\n\r\n CHất liệu JEAN , cực kỳ sang trọng\r\n\r\n Chất vải dày dặn , form đẹp mặc thoải mái, \r\n\r\nchất jean cotton dày, may  1 lớp, có túi trong lớn\r\n\r\n có thể mặc phối với quần jean, hoặc khoác ngoài cực chất\r\n\r\nform regular - rộng\r\n\r\nXuất xứ:  Việt Nam', 0, 18),
(48, 'Dép Quai Hậu', 99000, 'Dép quai hậu nam.png', '- Kiểu dáng 3 quai màu đen camo tông trầm đơn giản \r\n\r\n- Dán xé 3 quai cao cấp, độ bám dính 20.000 lần\r\n\r\n- Đế cao su cao 2 phân đúc định hình, công nghệ IP chống trơn trượt xẹp lún nhưng vẫn êm ái\r\n\r\n- Dễ dàng tăng giảm độ rộng chật phù hợp với kích thước bàn chân \r\n\r\n- Quai sau có thể tháo rời thành dép dễ dàng \r\n\r\n', 0, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(36, 'hau', '123', 'nguyenthjhau97@gmail.com', NULL, NULL, 0),
(37, 'quang', 'abcd1234', 'quangmnpd08451@fpt.edu.vn', 'Ngũ Hành Sơn, Đà Nẵng', '0827647826', 0),
(38, 'zang', '12345678', 'nguyenthihuonggiangqb3174@gmail.com', '121 Nguyễn Viết Xuân', '0858328685', 1),
(39, 'trang', '123', 'trangvtktpd08474@gmail.com', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongke`
--

CREATE TABLE `thongke` (
  `madm` int(10) NOT NULL,
  `tendm` varchar(255) NOT NULL,
  `countsp` int(10) NOT NULL,
  `maxprice` int(10) NOT NULL,
  `minprice` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `lk_danhmuc_sanpham` (`iddm`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongke`
--
ALTER TABLE `thongke`
  ADD PRIMARY KEY (`madm`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=561;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `thongke`
--
ALTER TABLE `thongke`
  MODIFY `madm` int(10) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_danhmuc_sanpham` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
