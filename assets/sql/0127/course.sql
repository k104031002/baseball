-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-01-26 15:28:36
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `baseball`
--

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--

CREATE TABLE `course` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(10) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `course_start` datetime DEFAULT NULL,
  `course_end` datetime DEFAULT NULL,
  `type` varchar(30) NOT NULL,
  `type_id` varchar(50) NOT NULL,
  `teacher_id` varchar(50) NOT NULL,
  `valid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `price`, `photo`, `created_at`, `course_start`, `course_end`, `type`, `type_id`, `teacher_id`, `valid`) VALUES
(1, '打擊練習\n教練餵球', '25顆球', 100, '1.jpg', '0000-00-00 00:00:00', NULL, NULL, '[打擊]', '[1]', '0', 1),
(2, '打擊練習\nHitTrax發球機餵球', '50顆球/\n可即時呈現打擊數據', 200, '2.jpg', '0000-00-00 00:00:00', NULL, NULL, '[打擊]', '[1]', '0', 1),
(3, '打擊練習\n發球機餵球', '50顆球/\n可調速度', 100, '3.jpg', '0000-00-00 00:00:00', NULL, NULL, '[打擊]', '[1]', '0', 1),
(4, '打擊練習\nHitTrax教練餵球', '25顆/\n可即時呈現打擊數據', 200, '4.jpg', '0000-00-00 00:00:00', NULL, NULL, '[打擊]', '[1]', '0', 1),
(5, '守備練習\n教練擊球', '50顆', 100, '5.jpg', '0000-00-00 00:00:00', NULL, NULL, '[守備]', '[3]', '0', 1),
(6, '體能練習\n肌力體能訓練班', '固定周六\n1700~1800', 500, '6.jpg', '0000-00-00 00:00:00', NULL, NULL, '[體能]', '[4]', '[9]', 1),
(7, '初階課程(6Y-9Y)\n', '打擊守備投球綜合學習訓練\n固定周六\n1300~1500', 1000, '7.jpg', '0000-00-00 00:00:00', NULL, NULL, '[打擊,投球,守備]', '[1,2,3]', '0', 1),
(8, '初階課程(10Y-12Y)\n', '打擊守備投球綜合學習訓練\n固定周六\n1500~1700', 1500, '8.jpg', '0000-00-00 00:00:00', NULL, NULL, '[打擊,投球,守備]', '[1,2,3]', '0', 1),
(9, '初階課程(青年/成人)\n', '打擊守備投球綜合學習訓練\n固定周六\n1500~1700', 2500, '9.jpg', '0000-00-00 00:00:00', NULL, NULL, '[打擊,投球,守備]', '[1,2,3]', '0', 1),
(10, '初階課程(女性)', '打擊守備投球綜合學習訓練\n固定周日\n1500~1700', 1000, '10.jpg', '0000-00-00 00:00:00', NULL, NULL, '[打擊,投球,守備]', '[1,2,3]', '0', 1),
(11, '測速槍', '60分鐘 並含完整球道', 1100, '11.jpg', '0000-00-00 00:00:00', NULL, NULL, '[投球]', '[2]', '0', 1),
(12, '運科投手訓練班', '90分鐘(最高4人)', 1200, '12.png', '0000-00-00 00:00:00', NULL, NULL, '[投球]', '[2]', '0', 1),
(13, 'HitTrax比賽模式', '30分鐘(最高10人)', 1000, '13.png', '0000-00-00 00:00:00', NULL, NULL, '[打擊]', '[1]', '0', 1),
(14, 'HitTrax打擊訓練班', '90分鐘 ', 1000, '14.jpg', '0000-00-00 00:00:00', NULL, NULL, '[打擊]', '[1]', '0', 1),
(15, 'Rapsodo', '60分鐘 投球數據完整收入分析', 2000, '15.jpg', '0000-00-00 00:00:00', NULL, NULL, '[投球]', '[2]', '0', 1),
(16, '打擊特訓班', '星期日1400~1500', 600, '16.jpg', '0000-00-00 00:00:00', NULL, NULL, '[打擊]', '[1]', '[2,5,10]', 1),
(17, '守備特訓班', '星期日1500~1600', 600, '16.jpg', '0000-00-00 00:00:00', NULL, NULL, '[守備]', '[3]', '[2,5,10]', 1),
(18, '打擊動力鏈檢核班', '六項打擊檢核重點\n2/1 1900~2100\n2/3 1600~1800', 999, '17.jpg', '0000-00-00 00:00:00', NULL, NULL, '[打擊]', '[1]', '[8]', 1),
(19, '投手養成訓練班', '四大核心教學\n星期日1700~1800', 1500, '18.jpg', '0000-00-00 00:00:00', NULL, NULL, '[投球]', '[2]', '[10]', 1),
(20, '守備技術班', '四點守備動作指導教學\n星期六1400~1500', 1500, '19.jpg', '0000-00-00 00:00:00', NULL, NULL, '[守備]', '[3]', '[5]', 1),
(21, '私人教練課(投手)', '投手專項訓練\n60分鐘', 1500, '20.jpg', '0000-00-00 00:00:00', NULL, NULL, '[投球]', '[2]', '[4]', 1),
(22, '私人教練課(野手)', '野手專項訓練\n60分鐘', 1500, '21.jpg', '0000-00-00 00:00:00', NULL, NULL, '[守備]', '[3]', '[3]', 1),
(23, '守備技術班(N4)', '四點守備動作指導教學\n星期六1400~1500', 1500, '22.jpg', '0000-00-00 00:00:00', NULL, NULL, '[守備]', '[3]', '[5]', 1),
(24, '打擊初速提升班', '穩定提升擊球初速\n星期一 1900~2100\n星期四 1900~2100', 3000, '23.jpg', '0000-00-00 00:00:00', NULL, NULL, '[打擊]', '[1]', '[7]', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
