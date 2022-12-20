-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2022 at 03:06 PM
-- Server version: 5.7.25
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oldcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id_cthd` int(11) NOT NULL,
  `id_hd` int(11) NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8 NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` float NOT NULL,
  `phuongthucthanhtoan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id_cthd`, `id_hd`, `tensp`, `soluong`, `gia`, `phuongthucthanhtoan`) VALUES
(1, 1, 'Ford EcoSport 1.5L Dragon AT Titanium', 1, 646000000, 3),
(2, 2, 'Honda Accord', 1, 1329000000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_dm` int(11) NOT NULL,
  `tendm` varchar(100) CHARACTER SET utf8 NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_dm`, `tendm`, `logo`) VALUES
(1, 'Ford', 'logoFord.png'),
(2, 'Honda', 'logoHonda.png'),
(3, 'Hyundai', 'logoHyundai.png'),
(4, 'Lamborghini', 'logoLamborghini.png'),
(5, 'Mazda', 'logoMazda.png'),
(6, 'Mercedes Benz', 'logoMercedes-Benz.png'),
(7, 'Toyota', 'logoToyota.png'),
(8, 'Vinfast', 'logoVinfast.png');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hd` int(11) NOT NULL,
  `id_nd` int(11) NOT NULL,
  `hoten` varchar(50) CHARACTER SET utf8 NOT NULL,
  `diachi` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dienthoai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydathang` datetime NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id_hd`, `id_nd`, `hoten`, `diachi`, `dienthoai`, `email`, `ngaydathang`, `trangthai`) VALUES
(1, 1, 'Nguyễn Hào', 'Long Xuyên', '0978164307', 'nguyenhao123@gmail.com', '2022-08-11 10:16:35', 1),
(2, 2, 'Hào', 'An Giang', '0978164307', 'hao123@gmail.com', '2022-08-11 11:35:24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hotro`
--

CREATE TABLE `hotro` (
  `id_ht` int(11) NOT NULL,
  `chude` varchar(255) CHARACTER SET utf8 NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci,
  `hoten` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dienthoai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaygui` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotro`
--

INSERT INTO `hotro` (`id_ht`, `chude`, `noidung`, `hoten`, `dienthoai`, `email`, `ngaygui`) VALUES
(1, 'Xe ô tô', 'Làm ăn uy tín, chất lượng. Cảm ơn mọi người đã ủng hộ.', 'Nguyễn Hào', '789153624', 'nguyenhao123@gmail.com', '2022-11-12 07:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id_nd` int(11) NOT NULL,
  `tennd` varchar(255) CHARACTER SET utf8 NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` char(3) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ngaydangky` datetime NOT NULL,
  `phanquyen` int(11) NOT NULL DEFAULT '1',
  `trangthai` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id_nd`, `tennd`, `username`, `password`, `ngaysinh`, `gioitinh`, `email`, `dienthoai`, `diachi`, `ngaydangky`, `phanquyen`, `trangthai`) VALUES
(1, 'Nguyễn Hào', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2001-05-02', 'nam', 'nguyenhao123@gmail.com', '0978164307', 'Long Xuyên', '2022-09-06 08:09:07', 0, 1),
(2, 'Hào', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '2001-12-07', 'nam', 'hao123@gmail.com', '0978164307', 'An Giang', '2022-09-07 09:15:50', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8 NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `daban` int(11) NOT NULL,
  `gia` float NOT NULL,
  `khuyenmai` int(11) NOT NULL,
  `id_dm` int(11) NOT NULL,
  `ngaycapnhat` datetime NOT NULL,
  `luotxem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `tensp`, `hinhanh`, `mota`, `soluong`, `daban`, `gia`, `khuyenmai`, `id_dm`, `ngaycapnhat`, `luotxem`) VALUES
(1, 'Ford EcoSport 1.5L Dragon AT Titanium', 'Ford/Ford_EcoSport_1.5L_Dragon_AT_Titanium.png', 'Ford EcoSport Titanium 1.5L AT Với thiết kế ngoại thất mới mạnh mẽ. Ford EcoSport Mới luôn sẵn sàng mọi cuộc chơi. Kích thước xe được điều chỉnh dài hơn (4,325 m chiều dài) và lớn hơn (1,755 m chiều rộng và 1,665 m chiều cao). Khẳng định phong cách suv đầy ấn tượng của EcoSport. vẻ đẹp khiến ai cũng phải ngoái nhìn.', 20, 8, 646000000, 0, 1, '2022-08-11 08:22:40', 0),
(2, 'Ford Explorer', 'Ford/Ford_Explorer.png', 'Ford Explorer 2022 thế hệ thứ 6  là mẫu SUV full size cỡ lớn rất được ưa chuộm của Ford tại nhiều thị trường, đặc biệt là thị trường Mỹ.  Ford Explorer hấp dẫn khách hàng bởi thiết kế lớn, thân hình vạm vỡ, cơ bắp, nội thất rộng rãi và thông minh. Ford Explorer 2022 hướng tới đối tượng khách hàng muốn có không gian nội thất rộng rãi, yên tĩnh, khả năng vận hành mạnh mẽ,  thiết kế bắt mắt, hầm hố thể thao đậm chất Mỹ.', 20, 14, 2606000000, 0, 1, '2022-08-11 08:25:45', 0),
(3, 'Ford Explorer 2018 new', 'Ford/Ford_Explorer_2018_new.png', 'Ford đã bổ sung một modem 4G với điểm truy cập Wi-Fi hỗ trợ tới 10 thiết bị cùng một lúc, cách xa chiếc xe khoảng 15 mét. Kết nối này cho phép người dùng ghép nối với Explorer từ xa bằng cách sử dụng FordPass để bắt đầu, khóa, mở khóa và định vị xe của họ từ hầu hết mọi nơi.', 20, 2, 2268000000, 0, 1, '2022-08-11 08:28:12', 0),
(4, 'Ford Ranger', 'Ford/Ford_Ranger.png', 'Ford Ranger 2022 – 2023 sở hữu ngoại hình đậm chất Mỹ với lối thiết kế “Built Ford Tough” trứ danh của hãng xe. So với bản tiền nhiệm, Ford Ranger thế hệ mới khoác lên mình một “giao diện” hoàn toàn khác biệt. Tạo hình bo tròn, phẳng phiu đã được thay thế bằng những đường nét khỏe khoắn, nam tính. Theo hãng, sự đổi mới này chủ yếu dựa trên ý kiến khảo sát từ người dùng.', 20, 2, 700000000, 0, 1, '2022-08-11 08:30:15', 0),
(5, 'Ford Territory', 'Ford/Ford_Territory.png', 'Ford Territory 2023 là một trong số ít những dòng xe SUV cỡ C được trang bị hệ thống động cơ hiện đại nhất hiện nay. Cụ thể, xe sở hữu động cơ xăng EcoBoost 4 xi-lanh, tăng áp đơn, dung tích 1,5 lít, sản sinh công suất tối đa 143 mã lực và mô-men xoắn cực đại 225 Nm.', 20, 1, 900000000, 0, 1, '2022-08-11 08:32:01', 0),
(6, 'Ford VN Everest Jellybean', 'Ford/Ford_vn_everest_jellybean.png', 'Ford Everest Titanium 4×2 là dòng xe SUV 7 chỗ mang tầm vóc của xe Mỹ mạnh mẽ hiện đại và an toàn. Xe Ford Everest Titanium 2022 Mới được thiết kế kết hợp giữa những phiên bản trước đây là phiên bản nâng cấp hoàn hảo của Everest Titanium 4×2 2022 , nâng cấp thêm những khiếm khuyết giúp trải nghiệm của khách hàng một cách tốt nhất.', 20, 0, 1245000000, 0, 1, '2022-08-11 08:34:05', 0),
(7, 'Honda Accord', 'Honda/Honda_Accord.png', 'Honda Accord là mẫu xe Sedan hạng D sang trọng, 5 chỗ ngồi, sản xuất bởi hãng xe Honda Motors - Nhật Bản. Honda Accord hiện tại là mẫu xe có giá bán cao nhất trong phân khúc Sedan hạng D, cạnh tranh trực tiếp với Toyota Camry theo hình thức nhập khẩu.', 20, 0, 1329000000, 0, 2, '2022-08-11 08:36:02', 0),
(8, 'Honda Brio', 'Honda/Honda_Brio.png', 'Honda Brio được nhập khẩu nguyên chiếc từ Indonesia với 2 phiên bản cùng 6 lựa chọn màu sắc. Với ngoại hình thể thao và trẻ trung, Brio tập trung hướng tới các gia đình trẻ đang có ý định mua chiếc xe đầu tiên.', 20, 0, 464000000, 0, 2, '2022-08-11 08:38:14', 0),
(9, 'Honda City', 'Honda/Honda_City.png', 'Honda City là mẫu xe cỡ B của Honda cạnh tranh với Vios hay Accent. Tuy nhiên giá cao, kiểu dáng nam tính khiến City tiếp cận được ít khách hàng và luôn sếp sau Vios và City trong cuộc đua doanh số. Với thiết kế trẻ trung, thể thao cùng các trang bị hiện đại, mang tính công nghệ cao, phù hợp với tập khách hàng trẻ yêu thích lái xe.', 20, 1, 560000000, 0, 2, '2022-08-11 08:40:22', 0),
(10, 'Honda Civic Type R', 'Honda/Honda_Civic_Type_R.png', 'Civic Type R là thế hệ thứ 10 của dòng sedan hạng C của hãng Honda. Khác hẳn với các thiết kế thiêng về sang trọng, thanh lịch như những thế hệ trước, kể từ phiên bản thứ 9, mẫu xe này đã thoát ly hẳn “dòng máu” của những mẫu sedan truyền thống. Thay vào đó là các thiết kế theo hướng thể thao và mạnh mẽ.', 20, 0, 755000000, 0, 2, '2022-08-11 08:41:56', 0),
(11, 'Honda Civic RS', 'Honda/Honda_Civic_RS.png', 'Honda Civic RS 2019 có thể nói là đẹp toàn diện bởi không có bất kì góc nhìn nào có thể chê được ở bản thiết kế mà hãng xe Nhật Bản tạo nên. Phong cách để thao nổi bật với nắp capo được vuốt xuống thấp hay cánh gió phía sau đẹp mắt.', 20, 0, 929000000, 0, 2, '2022-08-11 08:43:16', 0),
(12, 'Honda CR V', 'Honda/Honda_CR_V.png', 'Với đường nét thiết kế mạnh mẽ và đầy uy lực sang trọng và đầy tinh tế. Honda CR-V tỏa sức hấp dẫn, khơi dậy khí chất dẫn đầu của chủ sở hữu.', 20, 0, 1100000000, 0, 2, '2022-08-11 08:45:03', 0),
(13, 'Honda HR V', 'Honda/Honda_HR_V.png', 'HR-V sở hữu thiết kế mới nhưng vẫn giữ yếu tố thể thao, đồng thời bổ sung thêm gói an toàn chủ động Honda Sensing, tính năng quản lý xe qua ứng dụng thông minh.', 20, 0, 850000000, 0, 2, '2022-08-11 08:46:55', 0),
(14, 'Hyundai Accent', 'Hyundai/Hyundai_Accent.png', 'Hyundai Accent 2022 là dòng xe sedan hạng B hiện đang có mặt trên thị trường Việt Nam và được nhập khẩu nguyên chiếc từ Hàn Quốc đem đến cho các khách hàng một dòng xe có kiểu dáng thiết kế sang trọng, trang bị nhiều công nghệ hiện đại và cho khả năng vận hành bền bỉ.', 20, 0, 440000000, 0, 3, '2022-08-11 08:49:08', 0),
(15, 'Hyundai Grand i10 Hatchback', 'Hyundai/Hyundai_Grand_i10_Hatchback.png', 'Grand i10 Hatchback 2022 trông thêm phần trẻ trung khi mà phần lưới tản nhiệt được tái thiết kế với kiểu tổ ong và chất liệu nhựa tối màu cứng cáp, ngay phía trên là logo Hyundai được cắt ngang bởi một thanh chrome bóng bẩy, góp phần khiến đầu xe liền lạc hơn.', 20, 0, 375000000, 0, 3, '2022-08-11 08:51:32', 0),
(16, 'Hyundai Elantra Sport 1.6 2019', 'Hyundai/Hyundai_Elantra_Sport_1.6_2019.png', 'Elantra Sport là phiên bản thể thao, cá tính hơn các phiên bản Elantra truyền thống với những thay đổi nội, ngoại thất cũng như khả năng vận hành. Phiên bản nâng cấp của Elantra Sport cũng đã được hãng xe Hàn Quốc giới thiệu ra thị trường thế giới vào tháng 11.2018 tại quê nhà, nay được láp ráp và phân phối tại thị trường Việt Nam.', 20, 0, 729000000, 0, 3, '2022-08-11 08:53:42', 0),
(17, 'Hyundai Grand i10 Sedan', 'Hyundai/Hyundai_Grand_i10_Sedan.png', 'Hyundai i10 sedan là phiên bản đuôi dài của dòng xe cỡ nhỏ i10. Thiết kế hiện đại, thể thao và quyến rũ ở cả phần đầu, thân và cả đuôi xe.', 20, 0, 450000000, 0, 3, '2022-08-11 08:55:11', 0),
(18, 'Hyundai Creta', 'Hyundai/Hyundai_Creta.png', 'Hyundai Creta là dòng xe Crossover SUV cỡ nhỏ (B-SUV) được sản xuất bởi hãng xe Hàn Quốc - Hyundai Motor. Ngoại thất xe Hyundai Creta 2022 có phần giống với dòng xe Hyundai Tucson với phần lưới tản nhiệt mới vô cùng hiện đại.', 20, 0, 752000000, 0, 3, '2022-08-11 08:56:49', 0),
(19, 'Hyundai Elantra', 'Hyundai/Hyundai_Elantra.png', 'Hyundai Elantra được thiết kế theo triết lý \"Sensuous Sportiness – Sự thể thao gợi cảm\" của Hyundai và mang nhiều nét kết hợp của đàn anh là Hyundai Sonata và Hyundai Grandeur. Elantra mang kiểu dáng của một mẫu xe Coupe 4 cửa đầy năng động và \"nam tính\" khác biệt so với thế hệ trước.', 20, 0, 655000000, 0, 3, '2022-08-11 08:58:06', 0),
(20, 'Hyundai Kona', 'Hyundai/Hyundai_kona.png', 'Hyundai Kona là dòng B-SUV được lắp ráp và phân phối bởi Hyundai Thành Công. Sở hữu thiết kế hiện đại và mạnh mẽ và tầm giá dưới 700 triệu, Kona luôn là một sự lựa chọn đáng cân nhắc cho người dùng.', 20, 1, 610000000, 0, 3, '2022-08-11 08:59:43', 0),
(21, 'Hyundai Santafe 2021', 'Hyundai/Hyundai_Santafe_2021.png', 'Hyundai Santafe 2021 là một trong số mẫu SUV 7 chỗ ăn khách của Hyundai, phiên bản nâng cấp thế hệ 4, Santafe 2021 đã chứng minh được sức hấp dẫn riêng trong thị trường xe hơi cạnh tranh vô cùng khốc liệt.', 20, 0, 1200000000, 0, 3, '2022-08-11 09:01:36', 0),
(22, 'Hyundai Tucson 2022', 'Hyundai/Hyundai_Tucson_2022.png', 'Hyundai Tucson thế hệ thứ 4 được thiết kế lại toàn bộ từ trong ra ngoài, với vẻ cứng cáp, nhiều gân và tạo khối cắt xẻ hơn bản cũ. Điểm thu hút nhất nằm ở đầu xe, khi mỗi bên có tới 5 dải đèn ban ngày, thiết kế cùng hình khối với lưới tản nhiệt tạo cảm giác lưới tản nhiệt kéo dài từ bên này sang bên kia của đầu xe.', 20, 0, 950000000, 0, 3, '2022-08-11 09:03:26', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id_cthd`),
  ADD KEY `id_hd` (`id_hd`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_dm`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id_hd`),
  ADD KEY `id_nd` (`id_nd`);

--
-- Indexes for table `hotro`
--
ALTER TABLE `hotro`
  ADD PRIMARY KEY (`id_ht`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id_nd`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_dm` (`id_dm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `id_cthd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotro`
--
ALTER TABLE `hotro`
  MODIFY `id_ht` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id_nd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`id_hd`) REFERENCES `hoadon` (`id_hd`) ON UPDATE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`id_nd`) REFERENCES `nguoidung` (`id_nd`) ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `danhmuc` (`id_dm`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
