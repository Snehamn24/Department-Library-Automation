-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2025 at 11:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `mobile`, `address`) VALUES
(1, 'admin', 'admin@gmail.com', 'B123', 9612345678, 'Tumkur');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_image` varchar(300) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `book_author` varchar(200) NOT NULL,
  `book_cat` varchar(100) NOT NULL,
  `book_isbn` varchar(20) NOT NULL,
  `book_pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_image`, `book_name`, `book_author`, `book_cat`, `book_isbn`, `book_pdf`) VALUES
(3, 'harry_potter2.jpg', 'Harry Potter and the Chamber of Secrets', 'J K Rowling', 'Novel', '0-7475-3848-4', 'Book_2 Harry Potter and the Chamber of Secrets.pdf'),
(4, 'SE.jpg', 'Software Engineering', 'Ian Sommervile', 'Computer Science', '0-13-703515-2', 'Software-Engineering-9th-Edition-by-Ian-Sommerville.pdf'),
(5, 'hpprisoner.jpg', 'Harry Potter and the Prisoner\'s of Azkaban', 'J K Rowling', 'Novel', '978-1-4088-5571-3', 'Book_3 prisoner of azkaban.pdf'),
(6, 'goblet.jpg', 'Harry Potter and the Goblet of fire', 'J K Rowling', 'Novel', '978-0756912970', '4 - Harry Potter and the Goblet of Fire.pdf'),
(7, 'h5.jpg', 'Harry Potter and the order of pheonix', 'J K Rowling', 'Novel', '978-0-7475-5100-3', '_harry_potter_and_the_order_of_the_phoenix_chapter_37.pdf'),
(8, 'the-little-prince-16.jpg', 'The Little Prince', 'Antoine de Saint Exupery', 'Novel', '978-0156012195', 'TheLittlePrince.pdf'),
(10, 'c.jpg', 'Let Us C', 'Yashwanth Kanetkar', 'Computer Science', '978-8176569408', 'Let us c - yashwantkanetkar.pdf'),
(11, 'python.jpg', 'Python Programming', 'Udyan', 'Computer Science', '978-1-961584-45-7', 'Introduction_to_Python_Programming_-_WEB.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(10, 'NEP'),
(9, 'Others'),
(11, 'SEP');

-- --------------------------------------------------------

--
-- Table structure for table `dept_books`
--

CREATE TABLE `dept_books` (
  `sno` int(15) NOT NULL,
  `book_image` varchar(250) NOT NULL,
  `book_no` varchar(20) NOT NULL,
  `book_name` varchar(150) NOT NULL,
  `book_author` varchar(200) NOT NULL,
  `book_category` varchar(100) NOT NULL,
  `book_isbn` varchar(50) NOT NULL,
  `book_price` decimal(50,0) NOT NULL,
  `no_copy` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dept_books`
--

INSERT INTO `dept_books` (`sno`, `book_image`, `book_no`, `book_name`, `book_author`, `book_category`, `book_isbn`, `book_price`, `no_copy`) VALUES
(2, 'WhatsApp Image 2025-06-01 at 7.15.15 PM.jpeg', '91', 'Computer Organization And Logic Design', 'Dr Girija DK', 'SEP', '978-93-6557-105-9', 250, 2),
(3, 'Operating_system71b.jpg', '71b', 'Operating Systems', 'Lakshminarayan K R', 'NEP', '978-93-5693-293-7', 298, 0),
(4, 'priciples_of.jpeg', '2', 'Principles of programming language', 'Dr.Haridas', 'SEP', '978-93-6557-310-7', 220, 5),
(5, 'cnn.jpeg', '78', 'Computer Networks and Data Communication', 'Sivakumar T', 'Others', '978-93-5273-909-7', 198, 1),
(6, 'algorithms_theory.jpeg', '53', 'Algorithms Theory Analysis And Design', 'Prathiba S B', 'Others', '978-93-5273-787-1', 165, 5),
(7, 'anatomy_cloud.jpeg', '79', 'Anatomy of Cloud Computing', 'C.S.V Murthy', 'Others', '978-93-5299-553-0', 675, 3),
(8, 'CMAA.jpeg', '89', 'Computer Multimedia And Animation', 'L.Sasikala', 'NEP', '978-93-5840-655-9', 398, 1),
(9, 'DBITAL.jpeg', '8', 'Digital Marketing', 'Seema Gupta', 'Others', '978-93-5532-040-7', 300, 0),
(10, 'rprogram.jpg', '94a', 'Statistical Computing And R Programming', 'Dr. Asha Gowda Karegowda', 'NEP', '978-93-5840-868-3', 325, 4),
(11, 'dms.jpeg', '87', 'Web Content Management System', 'Mrs.Shashikala S', 'NEP', '978-93-5840-201-8', 160, 4),
(12, 'mad.jpeg', '83', 'Mobile Application Development', 'Dr.N.Kartik', 'NEP', '978-93-5840-696-2', 298, 0),
(13, 'python.jpeg', '76', 'Python Programming', 'R . Sreenivas Rao', 'NEP', '978-93-5693207-4', 298, 3),
(14, 'maths.jpeg', '88', 'Discrete Mathematical Structures', 'Dr.Yogeesh N', 'NEP', '978-93-5840-886-7', 350, 4),
(16, 'javajpg.jpg', '100', 'Java', 'Author', 'Others', '978-0201310061', 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `e_category`
--

CREATE TABLE `e_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_category`
--

INSERT INTO `e_category` (`cat_id`, `cat_name`) VALUES
(1, 'Novel'),
(2, 'Detective'),
(3, 'Horror'),
(4, 'Mythology'),
(13, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

CREATE TABLE `issued_books` (
  `id` int(11) NOT NULL,
  `book_isbn` varchar(20) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `status` enum('Issued','Returned') NOT NULL DEFAULT 'Issued'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(250) NOT NULL,
  `p_email` varchar(100) NOT NULL,
  `p_pass` varchar(15) NOT NULL,
  `p_mobile` bigint(15) NOT NULL,
  `p_address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`p_id`, `p_name`, `p_email`, `p_pass`, `p_mobile`, `p_address`) VALUES
(1, 'Varsha ', 'varsha@gmail.com', 'VARSHa@123', 9612345678, 'Tumkur'),
(2, 'Ramya', 'ramya@gmail.com', 'Ramya@456', 9612345678, 'Tumkur'),
(8, 'Sheela', 'sheela@gmail.com', 'Sheela@789', 9612345678, 'Tumkur'),
(9, 'Harshitha', 'harshithajs@gmail.com', 'Harshitha@123', 9612345678, 'tumkur'),
(11, 'Shamitha', 'Shamitha@gmail.com', 'Shamitha@789', 9612345678, 'Bangalore'),
(12, 'Mahesh S', 'mahesh@gmail.com', 'Mahesh@123', 9876543210, 'Tumkur'),
(13, 'Mallesh Babu', 'mallesh@gmail.com', 'Mallesh@456', 9612345678, 'Tumkur'),
(14, 'Rakesh', 'rakesh@gmail.com', 'Rakesh@456', 9612345678, 'Tumkur');

-- --------------------------------------------------------

--
-- Table structure for table `professor_fines`
--

CREATE TABLE `professor_fines` (
  `fine_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `days_late` int(11) NOT NULL,
  `fine_amount` decimal(10,2) NOT NULL,
  `status` enum('paid','unpaid') DEFAULT 'unpaid',
  `calculated_on` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professor_fines`
--

INSERT INTO `professor_fines` (`fine_id`, `professor_id`, `book_id`, `days_late`, `fine_amount`, `status`, `calculated_on`) VALUES
(5, 2, 3, 8, 40.00, 'paid', '2025-05-11'),
(7, 2, 8, 55, 275.00, 'unpaid', '2025-07-04'),
(8, 8, 9, 1, 5.00, 'paid', '2025-05-11'),
(10, 2, 3, 14, 70.00, 'unpaid', '2025-05-17'),
(12, 8, 9, 55, 275.00, 'unpaid', '2025-07-04'),
(13, 8, 8, 20, 100.00, 'unpaid', '2025-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `pro_book_requests`
--

CREATE TABLE `pro_book_requests` (
  `request_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `professor_name` varchar(50) NOT NULL,
  `book_num` varchar(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  `request_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_book_requests`
--

INSERT INTO `pro_book_requests` (`request_id`, `professor_id`, `professor_name`, `book_num`, `book_name`, `book_author`, `request_date`, `status`) VALUES
(7, 2, 'Ramya', '71b', 'Operating Systems', 'Lakshminarayan K R', '2025-04-18 11:07:37.796342', 'Approved'),
(8, 2, 'Ramya', '89', 'Computer Multimedia And Animation', 'L.Sasikala', '2025-04-25 14:18:12.196107', 'Approved'),
(14, 8, 'Sheela', '76', 'Python Programming', 'R . Sreenivas Rao', '2025-05-17 03:59:46.256730', 'Approved'),
(17, 8, 'Sheela K', '83', 'Mobile Application Development', 'Dr.N.Kartik', '2025-05-31 07:19:29.330871', 'Approved'),
(18, 8, 'Sheela K', '88', 'Discrete Mathematical Structures', 'Dr.Yogeesh N', '2025-07-02 05:41:00.355566', 'Approved'),
(19, 8, 'Sheela B V', '78', 'Computer Networks and Data Communication', 'Sivakumar T', '2025-05-31 05:55:45.738995', 'Approved'),
(20, 8, 'Sheela', '89', 'Computer Multimedia And Animation', 'L.Sasikala', '2025-07-03 09:20:44.056446', 'Approved'),
(22, 13, 'Mallesh ', '71b', 'Operating Systems', 'Lakshminarayan K R', '2025-07-01 16:15:38.873748', 'Approved'),
(23, 8, 'Sheela', '100', 'Java', 'Author', '2025-07-04 09:09:13.206351', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `pro_issue_book`
--

CREATE TABLE `pro_issue_book` (
  `issue_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `book_num` varchar(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `issue_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `return_date` date NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'issued'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_issue_book`
--

INSERT INTO `pro_issue_book` (`issue_id`, `p_id`, `p_name`, `book_image`, `book_num`, `book_name`, `issue_date`, `return_date`, `status`) VALUES
(4, 3, 'sneha', '/Operating_system71b.jpg', '71b', 'Operating Systems', '2025-04-18 10:54:44.705125', '2025-05-03', 'Issued'),
(5, 2, 'Ramya', '/Operating_system71b.jpg', '71b', 'Operating Systems', '2025-05-17 14:53:15.706487', '2025-05-17', 'Returned'),
(6, 7, 'Swathi', 'image/Operating_system71b.jpg', '71b', 'Operating Systems', '2025-04-25 13:49:27.700947', '2025-05-10', 'Issued'),
(7, 2, 'Ramya', 'image/CMAA.jpeg', '89', 'Computer Multimedia And Animation', '2025-04-25 14:18:12.212349', '2025-05-10', 'Issued'),
(8, 8, 'Sheela', 'image/DBITAL.jpeg', '8', 'Dibital Marketing', '2025-04-25 14:49:47.035070', '2025-05-10', 'Issued'),
(9, 8, 'Sheela', 'image/CMAA.jpeg', '89', 'Computer Multimedia And Animation', '2025-06-18 07:01:29.016921', '2025-06-18', 'Returned'),
(10, 8, 'Sheela', 'image/python.jpeg', '76a', 'Python Programming', '2025-06-18 07:01:13.629471', '2025-06-18', 'Returned'),
(11, 8, 'Sheela', 'image/python.jpeg', '76', 'Python Programming', '2025-05-17 14:47:00.333193', '2025-05-17', 'Returned'),
(12, 8, 'Sheela B V', 'image/cnn.jpeg', '78', 'Computer Networks and Data Communication', '2025-05-31 05:55:45.742266', '2025-07-15', 'Issued'),
(13, 8, 'Sheela K', 'image/mad.jpeg', '83', 'Mobile Application Development', '2025-05-31 07:19:29.334717', '2025-07-15', 'Issued'),
(14, 13, 'Mallesh ', 'image/Operating_system71b.jpg', '71b', 'Operating Systems', '2025-07-01 16:15:38.876552', '2025-08-15', 'Issued'),
(15, 8, 'Sheela K', 'image/maths.jpeg', '88', 'Discrete Mathematical Structures', '2025-07-02 05:41:00.378079', '2025-08-16', 'Issued'),
(16, 8, 'Sheela', 'image/CMAA.jpeg', '89', 'Computer Multimedia And Animation', '2025-07-03 09:20:44.079335', '2025-08-17', 'Issued');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `uucms` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `uucms`, `email`, `password`, `mobile`, `address`) VALUES
(1, 'Nayana T S', 'U11SW22S0001', 'nayana@gmail.com', 'Nayana@000', '9066569559', 'Tumkur'),
(2, 'Navya K R', 'U11SW22S0002', 'navya@gmail.com', 'Navya@456', '9612345678', 'Tumkur'),
(3, 'O Pavithra', 'U11SW22S0003', 'pavithra@gmail.com', 'Pavithra@456', '9612345678', 'Tumkur'),
(4, 'Swathi', 'U11SW22S0004', 'swathi@gmail.com', 'Swathi@4', '9066569555', 'Tumkur'),
(5, 'Rakshitha', 'U11SW22S0005', 'rakshitha@gmail.com', 'Rakshitha@456', '9066569555', 'Tumkur'),
(6, 'Mamatha A M', 'U11SW22S0011', 'mamathaam2004@gmail.com', 'Mamatha@456', '8296559892', 'Madhugiri'),
(7, 'Harshitha J S', 'U11SW22S0017', 'harshitha2@gmail.com', 'Harshitha@123', '9612345678', 'Orkere'),
(8, 'Rakshitha K V', 'U11SW22S0006', 'rakshitha1@gmail.com', 'Rakshitha@123', '9612345678', 'Tumkur'),
(9, 'Mavya ', 'U11SW22S0023', 'mavya@gmail.com', 'Mavya@456', '9612345678', 'Tumkur'),
(10, 'Sahana N', 'U11SW22S0059', 'sahana@gmail.com', 'Sahana@123', '9612345678', 'Tumkur'),
(11, 'Sinchana S', 'U11SW22S0022', 'sinchana.s@gmail.com', 'Sinchana@123', '9876543210', 'Tumkur');

-- --------------------------------------------------------

--
-- Table structure for table `student_fines`
--

CREATE TABLE `student_fines` (
  `fine_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `days_late` int(11) NOT NULL,
  `fine_amount` decimal(10,2) NOT NULL,
  `status` enum('paid','unpaid') NOT NULL,
  `calculated_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_fines`
--

INSERT INTO `student_fines` (`fine_id`, `student_id`, `book_id`, `days_late`, `fine_amount`, `status`, `calculated_on`) VALUES
(1, 6, 13, 35, 175.00, 'paid', '2025-07-01'),
(2, 2, 6, 33, 165.00, 'unpaid', '2025-07-01'),
(3, 2, 12, 33, 165.00, 'unpaid', '2025-07-01'),
(4, 6, 13, 36, 180.00, 'paid', '2025-07-02'),
(5, 2, 12, 34, 170.00, 'unpaid', '2025-07-02'),
(6, 6, 13, 36, 180.00, 'unpaid', '2025-07-02'),
(7, 2, 12, 34, 170.00, 'unpaid', '2025-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `student_request`
--

CREATE TABLE `student_request` (
  `request_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `book_num` varchar(11) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `book_isbn` varchar(15) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  `request_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_request`
--

INSERT INTO `student_request` (`request_id`, `student_id`, `student_name`, `book_num`, `book_name`, `book_isbn`, `book_author`, `request_date`, `status`) VALUES
(3, 6, 'Mamatha', '76', 'Python Programming', '978-93-5693207-', 'R . Sreenivas Rao', '2025-05-12 08:39:01.640865', 'Approved'),
(6, 2, 'Navya K R', '53', 'Algorithms Theory Analysis And Design', '978-93-5273-787', 'Prathiba S B', '2025-05-14 17:12:05.465632', 'Approved'),
(10, 2, 'Navya K R', '83', 'Mobile Application Development', '978-93-5840-696', 'Dr.N.Kartik', '2025-05-14 17:24:11.536938', 'Approved'),
(11, 2, 'Navya K R', '8', 'Dibital Marketing', '978-93-5532-040', 'Seema Gupta', '2025-06-18 07:15:13.914578', 'Approved'),
(14, 8, 'Rakshitha', '8', 'Dibital Marketing', '978-93-5532-040', 'Seema Gupta', '2025-07-03 15:51:30.476122', 'Approved'),
(18, 2, 'Navya K R', '87', 'Web Content Management System', '978-93-5840-201', 'Mrs.Shashikala S', '2025-07-01 17:30:12.596399', 'Approved'),
(19, 2, 'Navya K R', '89', 'Computer Multimedia And Animation', '978-93-5840-655', 'L.Sasikala', '2025-06-24 16:54:35.555820', 'Pending'),
(20, 2, 'Navya K R', '91', 'Computer Organization And Logic Design', '978-93-6557-105', 'Dr Girija DK', '2025-06-24 16:55:35.365158', 'Pending'),
(21, 2, 'Navya K R', '78', 'Computer Networks and Data Communication', '978-93-5273-909', 'Sivakumar T', '2025-07-01 17:21:05.260900', 'Pending'),
(22, 2, 'Navya K R', '79', 'Anatomy of Cloud Computing', '978-93-5299-553', 'C.S.V Murthy', '2025-07-04 08:32:22.648534', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `stu_issue_book`
--

CREATE TABLE `stu_issue_book` (
  `issue_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `book_num` varchar(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `issue_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `return_date` date NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'issued'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stu_issue_book`
--

INSERT INTO `stu_issue_book` (`issue_id`, `student_id`, `student_name`, `book_image`, `book_num`, `book_name`, `issue_date`, `return_date`, `status`) VALUES
(1, 2, 'Navya K R', 'image/DBITAL.jpeg', '8', 'Dibital Marketing', '2025-05-12 09:44:28.045601', '2025-05-12', 'returned'),
(2, 6, 'Mamatha', 'image/python.jpeg', '76', 'Python Programming', '2025-05-12 08:39:01.647912', '2025-05-27', 'Issued'),
(3, 2, 'Navya K R', 'image/CMAA.jpeg', '89', 'Computer Multimedia And Animation', '2025-05-14 17:42:36.986874', '2025-05-14', 'Returned'),
(4, 2, 'Navya K R', 'image/priciples_of.jpeg', '2', 'Principles of programming language', '2025-06-18 07:13:27.618869', '2025-06-18', 'Returned'),
(5, 2, 'Navya K R', 'image/algorithms_theory.jpeg', '53', 'Algorithms Theory Analysis And Design', '2025-07-01 17:29:32.632914', '2025-07-01', 'Returned'),
(6, 2, 'Navya K R', 'image/mad.jpeg', '83', 'Mobile Application Development', '2025-05-14 17:24:11.539824', '2025-05-29', 'Issued'),
(7, 9, 'Mavya ', 'image/Operating_system71b.jpg', '71b', 'Operating Systems', '2025-05-31 07:07:07.603639', '2025-05-31', 'Returned'),
(8, 2, 'Navya K R', 'image/DBITAL.jpeg', '8', 'Dibital Marketing', '2025-06-18 07:15:13.911677', '2025-07-03', 'Issued'),
(9, 2, 'Navya K R', 'image/dms.jpeg', '87', 'Web Content Management System', '2025-07-01 17:30:12.593645', '2025-07-16', 'Issued'),
(10, 8, 'Rakshitha', 'image/DBITAL.jpeg', '8', 'Dibital Marketing', '2025-07-03 15:51:30.453799', '2025-07-18', 'Issued');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_img` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_img`, `name`, `gender`, `email`, `password`, `mobile`, `address`) VALUES
(29, 'images/new_sneha.png', 'Swaroopa', 'female', 'swaroopa@gmail.com', '123', 9066569555, 'Tumkur'),
(31, 'library_management_system/images/login icon.png', 'surya', 'female', 'surya@gmail.com', '123', 9066569559, 'tumkur'),
(32, 'library_management_system/images/', '', '', '', '', 0, ''),
(33, 'library_management_system/images/', 'Manya M', '', 'manya@gmail.com', '123', 9066569555, 'Bangalore'),
(34, 'library_management_system/images/', '', '', '', '', 0, ''),
(35, '', 'manya', '', 'sneha@gmail.com', '123', 9066569555, 'tumkur'),
(36, 'library_management_system/images/', '', '', '', '', 0, ''),
(37, 'library_management_system/images/', '', '', '', '', 0, ''),
(38, 'library_management_system/images/', '', '', '', '', 0, ''),
(39, 'library_management_system/images/', '', '', '', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `dept_books`
--
ALTER TABLE `dept_books`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `e_category`
--
ALTER TABLE `e_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_isbn` (`book_isbn`),
  ADD KEY `issued_books_ibfk_2` (`user_id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `professor_fines`
--
ALTER TABLE `professor_fines`
  ADD PRIMARY KEY (`fine_id`),
  ADD KEY `professor_fines_ibfk_1` (`professor_id`),
  ADD KEY `professor_fines_ibfk_2` (`book_id`);

--
-- Indexes for table `pro_book_requests`
--
ALTER TABLE `pro_book_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `fk_professor_id` (`professor_id`);

--
-- Indexes for table `pro_issue_book`
--
ALTER TABLE `pro_issue_book`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uucms` (`uucms`);

--
-- Indexes for table `student_fines`
--
ALTER TABLE `student_fines`
  ADD PRIMARY KEY (`fine_id`);

--
-- Indexes for table `student_request`
--
ALTER TABLE `student_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `stu_issue_book`
--
ALTER TABLE `stu_issue_book`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dept_books`
--
ALTER TABLE `dept_books`
  MODIFY `sno` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `e_category`
--
ALTER TABLE `e_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `issued_books`
--
ALTER TABLE `issued_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `professor_fines`
--
ALTER TABLE `professor_fines`
  MODIFY `fine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pro_book_requests`
--
ALTER TABLE `pro_book_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pro_issue_book`
--
ALTER TABLE `pro_issue_book`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_fines`
--
ALTER TABLE `student_fines`
  MODIFY `fine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_request`
--
ALTER TABLE `student_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stu_issue_book`
--
ALTER TABLE `stu_issue_book`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `professor_fines`
--
ALTER TABLE `professor_fines`
  ADD CONSTRAINT `professor_fines_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `professor_fines_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `dept_books` (`sno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pro_book_requests`
--
ALTER TABLE `pro_book_requests`
  ADD CONSTRAINT `fk_professor_id` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_request`
--
ALTER TABLE `student_request`
  ADD CONSTRAINT `student_request_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
