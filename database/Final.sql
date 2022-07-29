-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2019 at 09:26 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `cid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `review` double NOT NULL,
  `total_rat` double NOT NULL,
  `rating` double NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

-- INSERT INTO `client` (`cid`, `name`, `dob`, `gender`, `email`, `phone`, `address`, `profession`, `company`, `review`, `total_rat`, `rating`, `username`, `password`, `status`) VALUES
-- (1, 'Philip hues', '1980-12-27', 'male', 'philip@gmail.com', 880123455, 'new york ,united state', 'developer', 'daraz', 2, 10, 5, 'philip123', '123', 'approved'),
-- (2, 'Andrew', '2019-06-19', 'male', 'andrewlam@gmail.com', 88012245151, 'new yourk', 'social worker', 'null', 2, 9, 4.5, 'andrew123', '123', 'approved'),
-- (3, 'Mr Harry Osborn', '2019-06-19', 'male', 'harry@gmail.com', 88035465163, 'Uptown ,Us', 'Designer', 'Tesla', 3, 15, 5, 'harry123', '123', 'approved'),
-- (4, 'Lex Luthor', '2019-06-11', 'male', 'lex@gmail.com', 880134665654, 'Amstardam ,us', 'Game Developer', 'Logitec', 0, 0, 0, 'luthor123', '123', 'approved'),
-- (5, 'Asad Kabir', '2019-06-13', 'male', 'asad@gmail.com', 8806556653, 'Rangpur, Bangladesh', 'Front end designer', 'Future tec', 0, 0, 0, 'asad123', '123', 'waiting'),
-- (6, 'Jhon Corner', '2019-07-02', 'male', 'corner@gmail.com', 88035431, 'Russia', 'Progammer', 'Crypt', 0, 0, 0, 'jhon123', '123', 'waiting'),
-- (7, 'Clerk Kent', '2019-05-26', 'male', 'clerk@gmail.com', 88035463544, 'Mount haruna', 'Database Administrator', 'Crocodyle', 1, 5, 5, 'clerk123', '123', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer`
--

CREATE TABLE `freelancer` (
  `fid` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `hprice` float NOT NULL,
  `address` varchar(200) NOT NULL,
  `skills` varchar(300) NOT NULL,
  `jobs_completed` int(11) NOT NULL,
  `review` double NOT NULL,
  `total_rat` double NOT NULL,
  `rating` double NOT NULL,
  `balance` float NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freelancer`
--

-- INSERT INTO `freelancer` (`fid`, `name`, `username`, `password`, `dob`, `gender`, `email`, `phone`, `hprice`, `address`, `skills`, `jobs_completed`, `review`, `total_rat`, `rating`, `balance`, `status`) VALUES
-- (6, 'bishal', 'bishal123', '123', '1998-05-06', 'male', 'bishal@gmail.com', 88051561561, 3, 'Rangpur, bangladesh', 'php,html,designing,data-entry,writing,android,c++,java', 2, 2, 10, 5, 15, 'approved'),
-- (7, 'opu', 'opu123', '123', '1997-05-06', 'male', 'opu@gmail.com', 8806564631, 1, 'Mymenshing ', 'php,html,designing,photoshop,writing,android,css,mysql,c++,java,python', 4, 4, 18, 4.5, 102, 'approved'),
-- (8, 'Esaq Ali rukon', 'rukon123', '123', '2019-06-19', 'male', 'rukon@gmail.com', 88054665651, 3, 'Bogra', 'php,html,photoshop,excel,linux,c++,java', 0, 0, 0, 0, 0, 'approved'),
-- (9, 'Md Tahsin', 'tahsin123', '123', '2019-06-27', 'male', 'tahsin@gmail.com', 88035113, 3, 'Barisal', 'photoshop,data-entry,writing,excel,research,c++', 0, 0, 0, 0, 0, 'approved'),
-- (10, 'Shihab Kabir', 'shihab123', '123', '2019-06-02', 'male', 'shihab@gmail.com', 8805451313, 1, 'Khulna', 'php,android,excel,css,seo,linux,c++', 0, 0, 0, 0, 0, 'waiting'),
-- (11, 'Akib', 'akib555', '555', '2019-03-12', 'male', 'akib@gmail.com', 54561513513, 3, 'chittagong', 'photoshop,data-entry,writing,excel,css', 0, 0, 0, 0, 0, 'waiting'),
-- (12, 'Syful Islam', 'psyful008', '008', '2019-08-08', 'male', 'psyful008@gmail.com', 1747424468, 1, 'Pahartoli Raozan Chittagong, Pahartoli Raozan', 'android,linux,c++,java,python', 0, 0, 0, 0, 0, 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `job_application`
--

CREATE TABLE `job_application` (
  `application_id` int(11) NOT NULL,
  `postid` int(200) NOT NULL,
  `applicant` varchar(200) NOT NULL,
  `owner` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_application`
--

INSERT INTO `job_application` (`application_id`, `postid`, `applicant`, `owner`) VALUES
(1, 5, 'opu123', 'andrew123'),
(5, 17, 'bishal123', 'luthor123'),
(7, 19, 'bishal123', 'clerk123'),
(8, 18, 'bishal123', 'luthor123');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `category` varchar(400) NOT NULL,
  `job_stat` varchar(200) NOT NULL,
  `hired` varchar(200) NOT NULL,
  `submission` varchar(600) NOT NULL,
  `accept` varchar(200) NOT NULL,
  `post_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

-- INSERT INTO `posts` (`postid`, `subject`, `price`, `posted_by`, `category`, `job_stat`, `hired`, `submission`, `accept`, `post_detail`) VALUES
-- (2, 'web development', 10, 'andrew123', 'php,html,designing,css', 'assigned', 'bishal123', 'Documents115.zip', 'yes', 'I want a simple one page website for my company.\r\n'),
-- (3, 'Mechine learning', 50, 'andrew123', 'photoshop,research,python', 'assigned', 'opu123', 'lru print.docx', 'yes', 'I want a face recognition softwere.'),
-- (4, 'Game development', 30.9, 'andrew123', 'php,designing,photoshop,java,python', 'assigned', 'opu123', '', '', 'I need a skilled game developer who have good graphic sense.'),
-- (6, 'Content writing', 10, 'harry123', 'data-entry,writing,excel,seo,research', 'assigned', 'opu123', '1604071 lab no fff.pdf', 'yes', 'I need a professional content writer. '),
-- (7, 'Unity game', 110, 'luthor123', 'designing,photoshop,c++,java', 'assigned', 'rukon123', '', '', 'I need a professional game unity game developer.'),
-- (9, 'Linux developer', 300, 'philip123', 'linux,c++,java,python', 'assigned', 'bishal123', 'ip front page.docx', 'yes', 'I need a profession and expericned freelancer for my new linux script. The script requires java ,python and c++ programming knowledge. '),
-- (10, 'Android game', 80, 'philip123', 'designing,photoshop,android,java', 'assigned', 'bishal123', 'bishls id card.pdf', 'yes', 'I have a good concept in my mind for an android but  i have no skill of game developing . So I need a expericned game developer.'),
-- (14, 'Banner designing', 15, 'harry123', 'designing,photoshop', 'assigned', 'opu123', 'bishls id card.pdf', 'yes', 'I need a banner for my nephews birthday .'),
-- (15, 'Data manageent', 30, 'harry123', 'data-entry,writing,excel', 'assigned', 'opu123', 'assembly_job.pdf', 'yes', 'I need info of some institutions from their websites. I need the info in an excel sheet.'),
-- (16, 'Photoshop', 5, 'clerk123', 'designing,photoshop', 'assigned', 'bishal123', '1604071 lab no fff.pdf', 'yes', 'I have resturent bill . You have to edit the image .'),
-- (17, 'SEO', 100, 'luthor123', 'php,html,css,seo,mysql', 'pending', '', '', '', 'I need searching optimization for my whole website. You can make any changes that you need .'),
-- (18, 'Logo design', 40, 'luthor123', 'designing,photoshop', 'pending', '', '', '', 'I need a bird shaped logo for my company.'),
-- (19, 'Database', 400, 'clerk123', 'php,html,mysql', 'pending', '', '', '', 'I need professional database administrator for my company website maintainance.');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_table`
--

CREATE TABLE `transaction_table` (
  `trnid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `client` varchar(200) NOT NULL,
  `freelancer` varchar(200) NOT NULL,
  `money` double NOT NULL,
  `c_to_f` float NOT NULL,
  `f_to_c` float NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_table`
--

-- INSERT INTO `transaction_table` (`trnid`, `postid`, `client`, `freelancer`, `money`, `c_to_f`, `f_to_c`, `status`) VALUES
-- (1, 3, 'andrew123', 'opu123', 50, 5, 5, 'completed'),
-- (2, 2, 'andrew123', 'bishal123', 10, 5, 4, 'completed'),
-- (3, 6, 'harry123', 'opu123', 10, 4, 5, 'completed'),
-- (4, 14, 'harry123', 'opu123', 12, 4, 5, 'completed'),
-- (5, 15, 'harry123', 'opu123', 30, 5, 5, 'completed'),
-- (6, 9, 'philip123', 'bishal123', 300, 5, 5, 'pending'),
-- (7, 10, 'philip123', 'bishal123', 80, 5, 5, 'pending'),
-- (8, 16, 'clerk123', 'bishal123', 5, 5, 5, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', '12345', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `freelancer`
--
ALTER TABLE `freelancer`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `job_application`
--
ALTER TABLE `job_application`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `transaction_table`
--
ALTER TABLE `transaction_table`
  ADD PRIMARY KEY (`trnid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `freelancer`
--
ALTER TABLE `freelancer`
  MODIFY `fid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `job_application`
--
ALTER TABLE `job_application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaction_table`
--
ALTER TABLE `transaction_table`
  MODIFY `trnid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
