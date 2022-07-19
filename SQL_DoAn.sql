-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 16, 2022 lúc 09:06 AM
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
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baithi`
--

CREATE TABLE `baithi` (
  `id_baithi` int(50) NOT NULL,
  `Id` int(255) NOT NULL,
  `Bai_Thi` varchar(10000) CHARACTER SET utf8 NOT NULL,
  `Diem` float NOT NULL,
  `Diemnk2` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `baithi`
--

INSERT INTO `baithi` (`id_baithi`, `Id`, `Bai_Thi`, `Diem`, `Diemnk2`) VALUES
(64, 110, 'http://localhost:81/web/doan/baithi/video/HƯỚNG DẪN THI NĂNG KHIẾU NGÀNH GIÁO DỤC MẦM NON NĂM 2021  TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI 2_360p.mp4', 9, 7),
(65, 111, 'http://localhost:81/web/doan/baithi/video/HƯỚNG DẪN THI NĂNG KHIẾU NGÀNH GIÁO DỤC MẦM NON NĂM 2021  TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI 2_360p.mp4', 8, 7),
(66, 112, 'http://localhost:81/web/doan/baithi/video/HƯỚNG DẪN THI NĂNG KHIẾU NGÀNH GIÁO DỤC MẦM NON NĂM 2021  TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI 2_360p.mp4', 7, 7),
(67, 113, 'http://localhost:81/web/doan/baithi/video/HƯỚNG DẪN THI NĂNG KHIẾU NGÀNH GIÁO DỤC MẦM NON NĂM 2021  TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI 2_360p.mp4', 6.5, 7),
(68, 114, 'http://localhost:81/web/doan/baithi/video/HƯỚNG DẪN THI NĂNG KHIẾU NGÀNH GIÁO DỤC MẦM NON NĂM 2021  TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI 2_360p.mp4', 9, 8),
(69, 115, 'http://localhost:81/web/doan/baithi/video/HƯỚNG DẪN THI NĂNG KHIẾU NGÀNH GIÁO DỤC MẦM NON NĂM 2021  TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI 2_360p.mp4', 5, 5),
(70, 116, 'http://localhost:81/web/doan/baithi/video/HƯỚNG DẪN THI NĂNG KHIẾU NGÀNH GIÁO DỤC MẦM NON NĂM 2021  TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI 2_360p.mp4', 7, 6.5),
(71, 117, 'http://localhost:81/web/doan/baithi/video/HƯỚNG DẪN THI NĂNG KHIẾU NGÀNH GIÁO DỤC MẦM NON NĂM 2021  TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI 2_360p.mp4', 8, 8),
(72, 118, 'http://localhost:81/web/doan/baithi/video/HƯỚNG DẪN THI NĂNG KHIẾU NGÀNH GIÁO DỤC MẦM NON NĂM 2021  TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI 2_360p.mp4', 10, 6),
(73, 119, 'http://localhost:81/web/doan/baithi/video/HƯỚNG DẪN THI NĂNG KHIẾU NGÀNH GIÁO DỤC MẦM NON NĂM 2021  TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI 2_360p.mp4', 4, 6),
(74, 120, 'http://localhost:81/web/doan/baithi/video/HƯỚNG DẪN THI NĂNG KHIẾU NGÀNH GIÁO DỤC MẦM NON NĂM 2021  TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI 2_360p.mp4', 4, 4),
(75, 121, 'http://localhost:81/web/doan/baithi/video/HƯỚNG DẪN THI NĂNG KHIẾU NGÀNH GIÁO DỤC MẦM NON NĂM 2021  TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI 2_360p.mp4', 6, 8),
(76, 124, 'http://localhost:81/web/doan/baithi/video/HƯỚNG DẪN THI NĂNG KHIẾU NGÀNH GIÁO DỤC MẦM NON NĂM 2021  TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI 2_360p.mp4', 4, 4.5),
(77, 125, 'http://localhost:81/web/doan/baithi/video/HƯỚNG DẪN THI NĂNG KHIẾU NGÀNH GIÁO DỤC MẦM NON NĂM 2021  TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI 2_360p.mp4', 6, 7),
(78, 126, 'http://localhost:81/web/doan/baithi/video/HƯỚNG DẪN THI NĂNG KHIẾU NGÀNH GIÁO DỤC MẦM NON NĂM 2021  TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI 2_360p.mp4', 5, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemchuan`
--

CREATE TABLE `diemchuan` (
  `Id_diem` int(11) NOT NULL,
  `Diem_Chuan` int(11) NOT NULL,
  `Ngay_Thi` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `diemchuan`
--

INSERT INTO `diemchuan` (`Id_diem`, `Diem_Chuan`, `Ngay_Thi`) VALUES
(1, 0, '2022-06-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoso`
--

CREATE TABLE `hoso` (
  `Id_Hoso` int(255) NOT NULL,
  `Id` int(50) NOT NULL,
  `Ho_Ten` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Ngay_Sinh` date NOT NULL,
  `Gioi_Tinh` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Dia_Chi` varchar(255) CHARACTER SET utf8 NOT NULL,
  `SDT` varchar(15) CHARACTER SET utf8 NOT NULL,
  `CCCD` varchar(15) CHARACTER SET utf8 NOT NULL,
  `Anh` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Ban_Than` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Uu_Tien` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Khu_Vuc` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `Dot_Thi` int(200) NOT NULL,
  `Diemxt` double NOT NULL,
  `Diem_Van` int(11) NOT NULL,
  `To_Hop` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoso`
--

INSERT INTO `hoso` (`Id_Hoso`, `Id`, `Ho_Ten`, `Ngay_Sinh`, `Gioi_Tinh`, `Email`, `Dia_Chi`, `SDT`, `CCCD`, `Anh`, `Ban_Than`, `Uu_Tien`, `Khu_Vuc`, `Dot_Thi`, `Diemxt`, `Diem_Van`, `To_Hop`) VALUES
(102, 111, 'Nguyễn Hiền', '2003-03-17', 'Nữ', 'nguyenhien123@gmail.com', 'Tam Điệp, Ninh Bình', '0985324627', '027200000111', 'http://localhost:81/web/doan/dangkihoso/uploads/anhthe.jpg', 'Béo', 'Chọn', 'KV3', 2022, 8, 9, 'M03'),
(103, 112, 'Phạm Hoàng', '2003-06-03', 'Nam', 'phamhoang453@gmail.com', 'Thanh Trì, Hà Nội', '0987026344', '027200012354', 'http://localhost:81/web/doan/dangkihoso/uploads/anhthe04.jpg', 'không', 'Hộ nghèo', 'KV2', 2022, 6, 6, 'M03'),
(104, 113, 'Trường An', '2000-08-21', 'Nam', 'truongan242@gmail.com', 'Cẩm Phả, Quảng Ninh', '0956324637', '032516247628', 'http://localhost:81/web/doan/dangkihoso/uploads/anhthe06.jpg', 'Không', 'Con thương binh', 'KV3', 2022, 8, 8, 'M03'),
(105, 114, 'Long Anh', '2000-02-23', 'Nam', 'longanh1247@gmail.com', 'Tây Hồ, Hà Nội', '0962347652', '027200000235', 'http://localhost:81/web/doan/dangkihoso/uploads/anhthe07.jpg', 'Không', 'Dân tộc thiểu số', 'KV3', 2022, 8.5, 7, 'M03'),
(106, 115, 'Đức Anh', '2000-09-05', 'Nam', 'ducanh3534@gmail.com', 'Hà Đông, Hà Nội', '0963246287', '036312548697', 'http://localhost:81/web/doan/dangkihoso/uploads/anhthe2.jpg', 'Không', 'Chọn', 'KV2', 2022, 7, 7, 'M01'),
(107, 116, 'Ngọc Anh', '2000-02-20', 'Nữ', 'ngocanh424@gmail.com', 'Cầu Giây, Hà Nội', '0953543756', '032536578954', 'http://localhost:81/web/doan/dangkihoso/uploads/anhthe03.jpg', 'Không', 'Con thương binh', 'KV1', 2022, 9, 7, 'M03'),
(108, 117, 'Vân Anh', '2000-02-04', 'Nữ', 'vananh3435@gmail.com', 'Đông Anh, Hà Nội', '0985324764', '065272346846', 'http://localhost:81/web/doan/dangkihoso/uploads/anhthe05.jpg', 'Không', 'Dân tộc thiểu số', 'KV2-NT', 2022, 8, 8, 'M01'),
(109, 118, 'Đức Bắc', '2000-04-30', 'Nam', 'ducbac242@gmail.com', 'Phủ Lý, Hà Nam', '0953247624', '095632468423', 'http://localhost:81/web/doan/dangkihoso/uploads/anhthe04.jpg', 'Không', 'Chọn', 'KV3', 2022, 6, 8, 'M01'),
(110, 110, 'Nguyên Viên', '2000-06-13', 'Nam', 'nguyenvanvien136@gmail.com', 'Tam Điệp, Ninh Bình', '0987026324', '027200000173', 'http://localhost:81/web/doan/dangkihoso/uploads/anhthe2.jpg', 'Không', 'Con thương binh', 'KV2', 2022, 10, 10, 'M01'),
(111, 119, 'Nhật Cương', '2000-06-03', 'Nam', 'nhatcuong12343@gmail.com', 'Tp.Hồ Chí Minh', '0956724354', '072640000462', 'http://localhost:81/web/doan/dangkihoso/uploads/anhthe06.jpg', 'Không', 'Con thương binh', 'KV3', 2022, 9, 9, 'M03'),
(112, 120, 'Quang Dũng', '2000-01-31', 'Nam', 'quangdung234@gmail.com', 'Phú Thọ,Hà Nội', '0965324628', '023564856248', 'http://localhost:81/web/doan/dangkihoso/uploads/anhthe2.jpg', 'Không', 'Dân tộc thiểu số', 'KV2-NT', 2022, 7, 7, 'M01'),
(113, 121, 'Nguyên Dương', '2000-06-06', 'Nam', 'nguyenduong24534@gmail.com', 'Sầm Sơn, Thanh Hóa', '0986324657', '023264568846', 'http://localhost:81/web/doan/dangkihoso/uploads/anhthe.jpg', 'Không', 'Con thương binh', 'KV1', 2022, 8, 7, 'M03'),
(114, 122, 'Hải Đăng', '2000-02-20', 'Nam', 'haidang234@gmail.com', 'Bỉm Sơn, Thanh Hóa', '0963246857', '027563246235', 'http://localhost:81/web/doan/dangkihoso/uploads/anhthe06.jpg', 'Không', 'Hộ nghèo', 'KV1', 2022, 6.5, 8, 'M01'),
(115, 124, 'Đức Hà ', '2000-09-26', 'Nam', 'ducha324@gmail.com', 'Hà Tây, Hà nội', '0985632467', '027264568452', 'http://localhost:81/web/doan/dangkihoso/uploads/anhthe07.jpg', 'Không', 'Con thương binh', 'KV2', 2022, 8.5, 7, 'M03'),
(116, 125, 'Thi hà', '2000-06-30', 'Nam', 'thiha234@gmail.com', 'Thái Bình', '0985632421', '027232156847', 'http://localhost:81/web/doan/dangkihoso/uploads/anhthe03.jpg', 'Không', 'Con thương binh', 'KV2-NT', 2022, 7.5, 7, 'M01'),
(117, 126, 'Đình Hiếu', '2000-05-30', 'Nam', 'dinhhieu1234@gmail.com', 'Cầu Giấy, Hà Nội', '0986324758', '024624568897', 'http://localhost:81/web/doan/dangkihoso/uploads/anhthe06.jpg', 'Không', 'Dân tộc thiểu số', 'KV3', 2022, 8, 8, 'M01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hotro`
--

CREATE TABLE `hotro` (
  `Id_Hotro` int(11) NOT NULL,
  `Ho_Ten` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Cau_Hoi` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Dien_Thoai` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hotro`
--

INSERT INTO `hotro` (`Id_Hotro`, `Ho_Ten`, `Cau_Hoi`, `Email`, `Dien_Thoai`) VALUES
(20, 'Nguyên Viên', 'Hướng dẫn thi năng khiếu trực tuyển ngành giáo dục mầm non', 'nguyenvanvien136@gmail.com', '0987026324');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `Id` int(11) NOT NULL,
  `Tai_khoan` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Ten_TS` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Mat_khau` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Loai_Tk` int(255) NOT NULL,
  `Duyet` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Emaill` varchar(255) CHARACTER SET utf8 NOT NULL,
  `xacthuc` int(11) NOT NULL,
  `baithi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`Id`, `Tai_khoan`, `Ten_TS`, `Mat_khau`, `Loai_Tk`, `Duyet`, `Emaill`, `xacthuc`, `baithi`) VALUES
(64, 'admin', 'admin', '1', 1, '100', '', 1, 100),
(110, 'thisinh01', 'Nguyễn Viên', '12345678', 0, 'Thông tin chính xác', '', 1, 1),
(111, 'thisinh02', 'Nguyễn Hiền', '12345678', 0, 'Thông tin chính xác', '', 1, 1),
(112, 'thisinh03', 'Phạm Hoàng', '12345678', 0, 'Thông tin chính xác', '', 1, 1),
(113, 'thisinh04', 'Trường An', '12345678', 0, 'Thông tin chính xác', '', 1, 1),
(114, 'thisinh05', 'Long Anh', '12345678', 0, 'Thông tin chính xác', '', 1, 1),
(115, 'thisinh06', 'Đức Anh', '12345678', 0, 'Thông tin chính xác', '', 1, 1),
(116, 'thisinh07', 'Ngọc Anh', '12345678', 0, 'Thông tin chính xác', '', 1, 1),
(117, 'thisinh08', 'Vân Anh', '12345678', 0, 'Thông tin chính xác', '', 1, 1),
(118, 'thisinh09', 'Đức Bắc', '12345678', 0, 'Thông tin chính xác', '', 1, 1),
(119, 'thisinh10', 'Nhật Cương', '12345678', 0, 'Thông tin chính xác', '', 1, 1),
(120, 'thisinh11', 'Quang Dũng', '12345678', 0, '', '', 1, 1),
(121, 'thisinh12', 'Nguyên Dương', '12345678', 0, '', '', 1, 1),
(122, 'thisinh13', 'Hải Đăng', '12345678', 0, '', '', 1, 0),
(123, 'thisinh14', 'Trường Giang', '12345678', 0, '', '', 1, 0),
(124, 'thisinh15', 'Đức Hà', '12345678', 0, '', '', 1, 1),
(125, 'thisinh16', 'Thị Hà', '12345678', 0, '', '', 1, 1),
(126, 'thisinh18', 'Đình Hiếu', '12345678', 0, '', '', 1, 1),
(127, 'thisinh19', 'Thị Hồng', '12345678', 0, '', '', 1, 0),
(128, 'giamthi01', 'Giám thị 1', '12345678', 3, '', '', 1, 0),
(129, 'giamthi02', 'Giảm thị 2', '12345678', 3, '', '', 1, 0),
(130, 'thisinh20', 'Huy Hoàn', '12345678', 0, '', '', 1, 0),
(131, 'thisinh21', 'Mai Huê', '12345678', 0, '', '', 1, 0),
(132, 'thisinh22', 'Trung Kiên', '12345678', 0, '', '', 1, 0),
(133, 'thisinh23', 'Ngọc Ký', '12345678', 0, '', '', 1, 0),
(134, 'thisinh24', 'Đức Minh', '12345678', 0, '', '', 0, 0),
(135, 'thisinh25', 'Ngọc Minh', '12345678', 0, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongthi`
--

CREATE TABLE `phongthi` (
  `Id_Phong` int(11) NOT NULL,
  `Doi_Thi` int(50) NOT NULL,
  `Ki_Thi` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `phongthi`
--

INSERT INTO `phongthi` (`Id_Phong`, `Doi_Thi`, `Ki_Thi`) VALUES
(1, 2022, 'Giáo dục mầm non 2022'),
(8, 2021, 'Giáo dục Mầm non 2021'),
(9, 2020, 'Giáo dục Mầm non 2020'),
(10, 2019, 'Giáo dục Mầm non 2019');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `Id_tintuc` int(11) NOT NULL,
  `Ten_Tin` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Hinh_Anh` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Thoi_Gan` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Nd_Tin` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`Id_tintuc`, `Ten_Tin`, `Hinh_Anh`, `Thoi_Gan`, `Nd_Tin`) VALUES
(6, 'Công bố kết quả thi năng khiếu ngành Giáo dục mầm non', 'http://localhost:81/web/doan/quantritt/imgtintuc/06-1.jpg', '2022-06-03', 'Bộ GD&ĐT cho biết, công tác tuyển sinh năm 2021 đã từng bước bổ sung hoàn thiện quy chế, quy trình tuyển sinh, tạo điều kiện thuận lợi cho nhà trường, cho thí sinh, đảm bảo quyền lợi của các bên; áp dụng công nghệ thông tin triệt để trong tất cả các khâu tuyển sinh; giảm tối đa số thí sinh ảo… Đảm bảo quyền tự chủ của các trường; minh bạch thông tin, kết quả tuyển sinh.'),
(8, 'Thí sinh đăng kí xét tuyển ngành giáo dục mầm non năm 2022', 'http://localhost:81/web/doan/quantritt/imgtintuc/0022.jpg', '2022-05-19', 'Năm 2022 đã có 47% thí sinh đăng kí xét tuyển trực tuyến. Kết quả tuyển sinh chính quy trong toàn hệ thống đạt cao nhất từ trước đến nay (hơn 530.000 đạt 92,65%; năm 2021 đạt 83,86%).\r\n\r\n'),
(14, 'Ngành Giáo dục mầm non Trường Cao đẳng Sư phạm Trung ương', 'http://localhost:81/web/doan/quantritt/imgtintuc/0022.jpg', '2022-05-17', 'Giáo dục mầm non là bậc học đầu tiên trong hệ thống giáo dục quốc dân Việt Nam, thực hiện việc chăm sóc, giáo dục phát triển toàn diện cho trẻ em lứa tuổi mầm non, tạo nền tảng cho các cấp học tiếp theo và cho việc học tập suốt đời. Ngành học này đặc biệt phù hợp với những người có tình yêu với trẻ nhỏ, yêu nghề dạy học'),
(15, 'Công việc sau khi học ngành Giáo dục mầm non là gì?', 'http://localhost:81/web/doan/quantritt/imgtintuc/img_0477.jpg', '2022-05-11', 'Giáo viên mầm non làm việc tại các trường mầm non công lập, ngoài công lập. Ngoài ra, người học cũng có thể làm những công việc khác như: Giáo viên mầm non chuyên trách: Âm nhạc, Mỹ thuật, Tiếng Anh, chăm sóc – giáo dục trẻ có nhu cầu đặc biệt…tại các cơ sở giáo dục mầm non.\r\n'),
(16, 'Học ngành Giáo dục mầm non ở đâu?', 'http://localhost:81/web/doan/quantritt/imgtintuc/web_img_0313.jpg', '2022-05-04', 'Trường Cao đẳng Sư phạm Trung ương là đơn vị sự nghiệp công lập trực thuộc Bộ Giáo dục và Đào tạo, với gần 60 năm truyền thống, đã đào tạo nhiều thế hệ giáo viên mầm non đảm bảo chất lượng, đáp ứng yêu cầu của xã hội, nhiều cựu sinh viên của trường đã và đang giữ những vị trí quan trọng, có nhiều đóng góp to lớn cho sự phát triển của ngành Giáo dục mầm non nói riêng và cho ngành giáo dục nước nhà nói chung. Vì vậy, để học ngành giáo dục mầm non, Trường Cao đẳng Sư phạm Trung ương là một lựa chọn chính xác.\r\n\r\n'),
(17, 'Hội đồng nghiệm thu kho học liệu “Giáo dục hành vi bảo vệ môi trường cho trẻ mầm non”', 'http://localhost:81/web/doan/quantritt/imgtintuc/web_img_0313.jpg', '2022-06-09', 'Đại diện cho Tổ chức UINCEF - Bà Lê Anh Lan phát biểu và đánh giá cao sự hợp tác trong những năm qua giữa Trường CĐPTW và Tổ chức UNICEF, đồng thời đánh giá cao nhóm tác giả trong điều kiện dịch bệnh Covid -19 đã rất nỗ lực, trách nhiệm hoàn thành kho học liệu có giá trị khoa học và ý nghĩa thực tiễn sâu sắc. Bên cạnh đó, bà Lê Anh Lan cũng đề nghị nhóm tác giả tiếp tục chỉnh sửa để kho học liệu hoàn thiện hơn và đưa vào sử dụng rộng rãi, là nguồn tham khảo có ý nghĩa cho giáo viên mầm non. Trong những năm tiếp theo, tổ chức UINCEF sẽ tiếp tục phối hợp chặt chẽ với nhà trường để thúc đầy các dự án chất lượng, hướng tới nâng cao chăm sóc, giáo dục trẻ em.\r\n\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xacthuc`
--

CREATE TABLE `xacthuc` (
  `Id_Hinh` int(255) NOT NULL,
  `Id` int(255) NOT NULL,
  `Hinh_XacThuc` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `xacthuc`
--

INSERT INTO `xacthuc` (`Id_Hinh`, `Id`, `Hinh_XacThuc`) VALUES
(117, 111, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/C_Users_Ji_AppData_Local_Packages_Microsoft.SkypeApp_kzf8qxf38zg5c_LocalState_20cf8c84-07f6-4aa1-95c4-6b16d27dc340-1.png'),
(118, 111, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/Căn_cước_công_dân_gắn_chíp_mặt_trước.jpg'),
(119, 111, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/cong-chung-so-ho-khau-o-dau.jpg'),
(120, 112, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/giay-khai-sinh-co-vai-tro-quan-trong-3.jpg'),
(121, 112, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/thoi gian va dia diem nhan giay chung nhan ket qua thi thpt quoc gia 2019(1).jpg'),
(122, 113, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/C_Users_Ji_AppData_Local_Packages_Microsoft.SkypeApp_kzf8qxf38zg5c_LocalState_20cf8c84-07f6-4aa1-95c4-6b16d27dc340-1.png'),
(123, 113, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/Căn_cước_công_dân_gắn_chíp_mặt_trước.jpg'),
(124, 114, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/giay-khai-sinh-co-vai-tro-quan-trong-3.jpg'),
(125, 114, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/thoi gian va dia diem nhan giay chung nhan ket qua thi thpt quoc gia 2019(1).jpg'),
(126, 114, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/Căn_cước_công_dân_gắn_chíp_mặt_trước.jpg'),
(127, 114, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/cong-chung-so-ho-khau-o-dau.jpg'),
(128, 115, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/C_Users_Ji_AppData_Local_Packages_Microsoft.SkypeApp_kzf8qxf38zg5c_LocalState_20cf8c84-07f6-4aa1-95c4-6b16d27dc340-1.png'),
(129, 115, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/Căn_cước_công_dân_gắn_chíp_mặt_trước.jpg'),
(130, 115, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/cong-chung-so-ho-khau-o-dau.jpg'),
(131, 116, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/Căn_cước_công_dân_gắn_chíp_mặt_trước.jpg'),
(132, 116, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/cong-chung-so-ho-khau-o-dau.jpg'),
(133, 117, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/C_Users_Ji_AppData_Local_Packages_Microsoft.SkypeApp_kzf8qxf38zg5c_LocalState_20cf8c84-07f6-4aa1-95c4-6b16d27dc340-1.png'),
(134, 117, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/Căn_cước_công_dân_gắn_chíp_mặt_trước.jpg'),
(135, 118, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/Căn_cước_công_dân_gắn_chíp_mặt_trước.jpg'),
(136, 118, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/cong-chung-so-ho-khau-o-dau.jpg'),
(137, 110, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/giay-khai-sinh-co-vai-tro-quan-trong-3.jpg'),
(138, 110, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/thoi gian va dia diem nhan giay chung nhan ket qua thi thpt quoc gia 2019(1).jpg'),
(139, 119, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/C_Users_Ji_AppData_Local_Packages_Microsoft.SkypeApp_kzf8qxf38zg5c_LocalState_20cf8c84-07f6-4aa1-95c4-6b16d27dc340-1.png'),
(140, 119, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/Căn_cước_công_dân_gắn_chíp_mặt_trước.jpg'),
(141, 120, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/Căn_cước_công_dân_gắn_chíp_mặt_trước.jpg'),
(142, 120, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/cong-chung-so-ho-khau-o-dau.jpg'),
(143, 120, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/giay-khai-sinh-co-vai-tro-quan-trong-3.jpg'),
(144, 121, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/Căn_cước_công_dân_gắn_chíp_mặt_trước.jpg'),
(145, 121, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/cong-chung-so-ho-khau-o-dau.jpg'),
(146, 122, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/C_Users_Ji_AppData_Local_Packages_Microsoft.SkypeApp_kzf8qxf38zg5c_LocalState_20cf8c84-07f6-4aa1-95c4-6b16d27dc340-1.png'),
(147, 122, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/Căn_cước_công_dân_gắn_chíp_mặt_trước.jpg'),
(148, 122, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/cong-chung-so-ho-khau-o-dau.jpg'),
(149, 124, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/C_Users_Ji_AppData_Local_Packages_Microsoft.SkypeApp_kzf8qxf38zg5c_LocalState_20cf8c84-07f6-4aa1-95c4-6b16d27dc340-1.png'),
(150, 124, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/Căn_cước_công_dân_gắn_chíp_mặt_trước.jpg'),
(151, 125, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/C_Users_Ji_AppData_Local_Packages_Microsoft.SkypeApp_kzf8qxf38zg5c_LocalState_20cf8c84-07f6-4aa1-95c4-6b16d27dc340-1.png'),
(152, 125, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/Căn_cước_công_dân_gắn_chíp_mặt_trước.jpg'),
(153, 126, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/C_Users_Ji_AppData_Local_Packages_Microsoft.SkypeApp_kzf8qxf38zg5c_LocalState_20cf8c84-07f6-4aa1-95c4-6b16d27dc340-1.png'),
(154, 126, 'http://localhost:81/web/doan/dangkihoso/ttxacthuc/Căn_cước_công_dân_gắn_chíp_mặt_trước.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baithi`
--
ALTER TABLE `baithi`
  ADD PRIMARY KEY (`id_baithi`);

--
-- Chỉ mục cho bảng `diemchuan`
--
ALTER TABLE `diemchuan`
  ADD PRIMARY KEY (`Id_diem`);

--
-- Chỉ mục cho bảng `hoso`
--
ALTER TABLE `hoso`
  ADD PRIMARY KEY (`Id_Hoso`);

--
-- Chỉ mục cho bảng `hotro`
--
ALTER TABLE `hotro`
  ADD PRIMARY KEY (`Id_Hotro`);

--
-- Chỉ mục cho bảng `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `phongthi`
--
ALTER TABLE `phongthi`
  ADD PRIMARY KEY (`Id_Phong`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`Id_tintuc`);

--
-- Chỉ mục cho bảng `xacthuc`
--
ALTER TABLE `xacthuc`
  ADD PRIMARY KEY (`Id_Hinh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baithi`
--
ALTER TABLE `baithi`
  MODIFY `id_baithi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `diemchuan`
--
ALTER TABLE `diemchuan`
  MODIFY `Id_diem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hoso`
--
ALTER TABLE `hoso`
  MODIFY `Id_Hoso` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `hotro`
--
ALTER TABLE `hotro`
  MODIFY `Id_Hotro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `login`
--
ALTER TABLE `login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT cho bảng `phongthi`
--
ALTER TABLE `phongthi`
  MODIFY `Id_Phong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `Id_tintuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `xacthuc`
--
ALTER TABLE `xacthuc`
  MODIFY `Id_Hinh` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
