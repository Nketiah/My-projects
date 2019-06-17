-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2019 at 02:49 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `Check`
--

CREATE TABLE `Check` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DateExpire`
--

CREATE TABLE `DateExpire` (
  `expire_id` int(11) NOT NULL,
  `date_expire` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DateExpire`
--

INSERT INTO `DateExpire` (`expire_id`, `date_expire`) VALUES
(2, '06/03/2019');

-- --------------------------------------------------------

--
-- Table structure for table `Hod`
--

CREATE TABLE `Hod` (
  `hod_id` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Hod`
--

INSERT INTO `Hod` (`hod_id`, `FullName`, `mobile`, `email`, `password`, `role`) VALUES
(1, 'Amponsah Desmond', '0556709771', 'gyatabajoe@gmail.com', '$2y$10$JLQ9C0y1wJdhTp95UbFvJ.rU56WlivxUQybFcVufeJic1wRE0LOzG', 'hod'),
(2, 'Derrick Ayisi', '0556709771', 'daakus@gmail.com', '$2y$10$KZ5ocsIZObhpPrEdfvtDMeJrrNWsQNizOHcdkSDOt2/a0uQqHq9Me', 'user'),
(3, 'Apraku Nyarko', '0556709883', 'apraku@gmail.com', '$2y$10$.QW49VcNtNBFl2yoMqMofeZxSoaZsbDqJSjn8D9xd1ZLzaafS7/lq', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `LecturerName`
--

CREATE TABLE `LecturerName` (
  `name_id` int(11) NOT NULL,
  `Names` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `LecturerName`
--

INSERT INTO `LecturerName` (`name_id`, `Names`) VALUES
(1, 'Kwaku Nuamah'),
(2, 'Martin Offei'),
(3, 'Kwame Appiah'),
(4, 'Solomon Anab');

-- --------------------------------------------------------

--
-- Table structure for table `projectTopics`
--

CREATE TABLE `projectTopics` (
  `topic_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `secondname` varchar(50) NOT NULL,
  `topicname` varchar(100) NOT NULL,
  `programme` varchar(50) NOT NULL,
  `indexone` varchar(20) NOT NULL,
  `indextwo` varchar(20) NOT NULL,
  `super_name` varchar(100) NOT NULL,
  `super_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projectTopics`
--

INSERT INTO `projectTopics` (`topic_id`, `firstname`, `secondname`, `topicname`, `programme`, `indexone`, `indextwo`, `super_name`, `super_id`) VALUES
(1, 'Apraku Nyarko Fredrick', 'Nketiah Joseph Kwame', 'online project submission', 'computer science', '04/2016/0528D', '04/2016/0566D', 'Martin Offei', '1'),
(7, 'Franklin Ohene Frimpong', 'Mawuli Elishama', 'Advance Egg production', 'computer science', '04/2016/0561D', '04/2016/0562D', 'Kwame Appiah', '2'),
(8, 'Mohammed Akumanyi', 'Kofi Desmond', 'smart surveillance system for commercial transport', 'computer science', '04/2016/0563D', '04/2016/0564D', 'Martin Offei', '1'),
(9, 'Frank Mensah', 'Francis Kwabena', 'Emergency alert system', 'computer science', '04/2016/0565D', '04/2016/0567D', 'Kwame Appiah', '2'),
(10, 'Ossum Sampson', 'Boateng Henrry', 'Event Management system', 'computer science', '04/2016/0591D', '04/2016/0599D', '', ''),
(11, 'Addo Felix', 'Godfred  Agyekum', 'Intruder detection system', 'computer science', '04/2016/0512D', '04/2016/0516D', '', ''),
(12, 'Sagoe Kennedy', 'Batsa Aron', 'Library management system', 'computer science', '04/2016/0646D', '04/2016/0649D', '', ''),
(13, 'Ganyo Jacob', 'Klege Godwin', 'Gas leakage detection system', 'Computer network mgt', '04/2016/0619D', '04/2016/0627D', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `indexNo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(50) NOT NULL,
  `upload_status` varchar(50) NOT NULL DEFAULT 'pending',
  `super_id` int(11) NOT NULL,
  `super_name` varchar(50) NOT NULL DEFAULT 'Waiting...',
  `super_mobile` varchar(20) NOT NULL,
  `project_topic` varchar(100) NOT NULL DEFAULT 'user',
  `part_index` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `indexNo`, `password`, `department`, `upload_status`, `super_id`, `super_name`, `super_mobile`, `project_topic`, `part_index`) VALUES
(1, 'Nketiah Joseph Kwame', 'gyatabajoe@gmail.com', '04/2016/0566D', '$2y$10$MdR/qUI.knbEZqYzRLypzuljSrFPtE15jpmrIg1ZxpayWEIbn2IOa', 'computer science', 'approved', 0, 'Martin Offei', '0248603777', 'online project submission', '04/2016/0528D'),
(2, 'Apraku Nyarko Fredrick', 'fred@gmail.com', '04/2016/0528D', '$2y$10$KwnnaqlbaD0be2sPHkITfeQq.9n8htci3xd7CtqcTwfJ1W9wCz0bi', 'computer science', 'approved', 0, 'Martin Offei', '0248603777', 'online project submission', '04/2016/0566D'),
(3, 'Franklin Ohene Frimpong', 'frank@gmail.com', '04/2016/0561D', '$2y$10$kt/GopwzS6M4YHNQaj4Ah.HiQuryrFoxKqLRugMX8eo8W8FDjxpla', 'computer science', 'approved', 0, 'Kwame Appiah', '0554826553', 'Advance Egg production', ''),
(4, 'Mawuli Elishama', 'mawuli@gmail.com', '04/2016/0562D', '$2y$10$uO39Wz/jsigWanF64ZL4kOgPydNEvPweuztZi4m0PIA3pyZaKo1gu', 'computer science', 'approved', 0, 'Kwame Appiah', '0554826553', 'Advance Egg production', '04/2016/0561D'),
(5, 'Mohammed Akumanyi', 'moha@gmail.com', '04/2016/0563D', '$2y$10$0RJM57XKzQfQ2fdj8HwXX.CtYA/5ySw.zjKGIs/3heCAwg8/zp2nW', 'computer science', '', 0, 'Martin Offei', '0248603777', 'smart surveillance system for commercial transport', ''),
(6, 'Kofi Desmond', 'kofi@gmail.com', '04/2016/0564D', '$2y$10$Ci0IAdFviC5cOTCGA33UieXYGUVP7coh9TdQP61OXUWwBpMOQlOX2', 'computer science', '', 0, 'Martin Offei', '0248603777', 'smart surveillance system for commercial transport', '04/2016/0563D'),
(7, 'Frank Mensah', 'levels@gmail.com', '04/2016/0565D', '$2y$10$1qbamZmus9pF8Ax7c.6JB.IYmOtUtDUTOfOZ2qxTzfn4vBUFXYcVq', 'computer science', 'pending', 0, 'Kwame Appiah', '0554826553', 'Emergency alert system', ''),
(8, 'Francis Kwabena', 'francis@gmail.com', '04/2016/0567D', '$2y$10$zjD5z/tRs2pZkKeiEbdcAeAvti/6ZXL4v5vVbFxTHC15HYxg9sy0K', 'computer science', 'pending', 0, 'Kwame Appiah', '0554826553', 'Emergency alert system', '04/2016/0565D'),
(9, 'Boateng Henrry', 'boateng@gmail.com', '04/2016/0599D', '$2y$10$3pRC/Ux8eWPB09gCkAVwDelRutUsu8YX/XC/RX42A1Ge8aMFWNhiG', 'computer science', 'pending', 0, 'Waiting...', '', 'user', '04/2016/0591D'),
(10, 'Ossum Sampson', 'sam@gmail.com', '04/2016/0591D', '$2y$10$ppiWMGCF8a3hlHrfQK9TguaiVZcJilb6/lm4yWBmw24niuNwdHnau', 'computer science', 'pending', 0, 'Waiting...', '', 'user', ''),
(11, 'Derrick Ayisi', 'daakus@gmail.com', '04/2016/0588D', '$2y$10$fb18PKJ09TixONuP.6APdepE/o95NT48AJ9Xhf6Se4ZqZsVlzHKka', 'computer science', 'approved', 0, 'Waiting...', '', 'user', ''),
(12, 'Amma Opongwaa', 'amma@gmai.com', '04/2016/0581D', '$2y$10$rzwdcLCaYEKakVx7bKy5VO4dxf9QpVyaXsa0/wz7VfYQMy/BeH/Tm', 'computer science', 'approved', 0, 'Waiting...', '', 'user', ''),
(13, 'Addo Felix', 'addo@gmail.com', '04/2016/0512D', '$2y$10$5I8Yt4R31pB4UhbiVV85zec9NCxsy2Ug5DNj7s/pEAS1.Hh6C5qhq', 'computer science', 'pending', 0, 'Waiting...', '', 'user', ''),
(14, 'Godfred  Agyekum', 'agyekum@gmail.com', '04/2016/0516D', '$2y$10$4d7vd2w.d0sd04TPy/URNu3ZasXbbOm9/.mgHpzKod2bbhId5p2bO', 'computer science', 'pending', 0, 'Waiting...', '', 'user', '04/2016/0512D'),
(15, 'Osei Michael', 'osei@gmail.com', '04/2016/0645D', '$2y$10$HhcNFbhFQpOKPUD/J6zsE.ero2PyVw.MQYaErbTBrzNUPptfGcFDC', 'computer science', 'pending', 0, 'Waiting...', '', 'user', ''),
(16, 'Sagoe Kennedy', 'sagoe@gmail.com', '04/2016/0646D', '$2y$10$dSEWS3c9e9KJEbj3nJP6.uQtxKcaIQolSMqSG4IQ1ksJOAQvVx/Ui', 'computer science', 'pending', 0, 'Waiting...', '', 'user', ''),
(17, 'Batsa Aron', 'aron@gmail.com', '04/2016/0649D', '$2y$10$awax2AL0qRKlGt5mBOvh4.nfA7MlR8h8IP7haZ6Od0NJmD6Rv3dZ2', 'Computer network mgt', 'pending', 0, 'Waiting...', '', 'user', '04/2016/0646D'),
(18, 'Ganyo Jacob', 'jacob@gmail.com', '04/2016/0619D', '$2y$10$55wRpgiEKitZ.yQcBi629OOaoR77nZShKCtZD5XhXXqdsPwoc9Sl2', 'Computer network mgt', 'pending', 0, 'Waiting...', '', 'user', ''),
(19, 'Klege Godwin', 'godwin@gmail.com', '04/2016/0627D', '$2y$10$i7BJ6YdkhklAHiwD3WCwmODEaTduzbFwx3vGMmavPGpZ7KKK3Iwmu', 'Computer network mgt', 'pending', 0, 'Waiting...', '', 'user', '04/2016/0619D'),
(20, 'Ahin Morgan', 'morgan@gmail.com', '04/2016/0575D', '$2y$10$PY8GYByg6VpLpEEltxneM.NDC19bJidqTua82fKcPgGBRoShU7j.e', 'computer science', 'pending', 0, 'Waiting...', '', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `special_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `name`, `email`, `Mobile`, `department`, `password`, `special_id`) VALUES
(1, 'Martin Offei', 'martin@gmail.com', '0248603777', 'computer science', '$2y$10$yJqvaSkUiYLRdbnrrQsLreZuwRKQWI3y4F8xkPyBIEc.62Ry1o1pi', '2233'),
(2, 'Kwame Appiah', 'appiah@gmail.com', '0554826553', 'computer science', '$2y$10$wu4e0UEf5.ML4JE8YhSjXuMPAVF9ZUKgB91BtEkWIo9guy8WYRH5C', '5533'),
(3, 'Solomon Anab', 'anab@gmail.com', '0261456777', 'computer science', '$2y$10$VktO3/LQfFt2c4EgBVjSae.a.wDM.f3eIxhONORDcs90wvNCKPi6u', '1414'),
(4, 'Solomon Anab', 'anab@gmail.com', '0556709772', 'computer science', '$2y$10$VktO3/LQfFt2c4EgBVjSae.a.wDM.f3eIxhONORDcs90wvNCKPi6u', '1414'),
(5, 'Tenkorang Richmond', 'rich@gmail.com', '0248604777', 'computer science', '$2y$10$buIEFNbiKYwtvhGaiZHDvuQwDniT4q.MHQkGKUZASV8O5dvHp1mDG', '1993'),
(6, 'Sefakor Awurama', 'sef@gmail.com', '0556709771', 'computer science', '$2y$10$DupKf7bXGrYOjzc8fYWCmuwHN4BxmbB8JjzMk9GxoFqwF8M41IS2S', '7777'),
(7, '', '', '', '', '', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `file_id` int(11) NOT NULL,
  `myName` varchar(100) NOT NULL,
  `partnerName` varchar(100) NOT NULL,
  `superName` varchar(100) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `indexone` varchar(20) NOT NULL,
  `indextwo` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `years` varchar(10) NOT NULL,
  `fileName` varchar(225) NOT NULL,
  `fileSize` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`file_id`, `myName`, `partnerName`, `superName`, `topic`, `indexone`, `indextwo`, `department`, `category`, `years`, `fileName`, `fileSize`) VALUES
(1, 'Apraku Nyarko Fredrick', 'Nketiah Joseph Kwame', 'Martin Offei', 'online project submission', '04/2016/0528D', '04/2016/0566D', 'computer science', 'web project', '2019', '5d034e012e04d2.75851767.pdf', '615787 kb'),
(2, 'Franklin Ohene Frimpong', 'Mawuli Elishama', 'Kwame Appiah', 'Egg production', '04/2016/0561D', '04/2016/0562D', 'computer science', 'web project', '2019', '5d03530d0ee329.81912408.pdf', '4565045 kb'),
(3, 'Mohammed Akumanyi', 'Kofi Desmond', 'Martin Offei', 'smart surveillance system for commercial transport', '04/2016/0563D', '04/2016/0564D', 'computer science', 'networking project', '2019', '5d0355ae49c8d8.41998759.pdf', '615787 kb'),
(4, 'Nketiah Joseph Kwame', 'Apraku Nyarko Fredrick', 'Martin Offei', 'online project submission', '04/2016/0566D', '04/2016/0528D', 'computer science', 'IOS', '2019', '5d03643c721552.24857946.pdf', '7870794 kb'),
(5, 'Nketiah Joseph Kwame', 'Apraku Nyarko Fredrick', 'Martin Offei', 'online project submission', '04/2016/0566D', '04/2016/0528D', 'computer science', 'networking project', '2019', '5d03663021a452.37019647.pdf', '4565045 kb'),
(6, 'Franklin Ohene Frimpong', 'Mawuli Elishama', 'Kwame Appiah', 'Advance Egg production', '04/2016/0561D', '04/2016/0562D', 'computer science', 'android', '2019', '5d0368a1ddcbd1.42138809.pdf', '2318005 kb'),
(7, 'Franklin Ohene Frimpong', 'Mawuli Elishama', 'Kwame Appiah', 'Advance Egg production', '04/2016/0561D', '04/2016/0562D', 'computer science', 'Robotics', '2019', '5d0368d98fdef1.27240543.pdf', '5079252 kb'),
(8, 'Franklin Ohene Frimpong', 'Mawuli Elishama', 'Kwame Appiah', 'Advance Egg production', '04/2016/0561D', '04/2016/0562D', 'computer science', 'IOS', '2019', '5d03690eadb049.49406491.pdf', '8982975 kb'),
(9, 'Nketiah Joseph Kwame', 'Apraku Nyarko Fredrick', 'Martin Offei', 'online project submission', '04/2016/0566D', '04/2016/0528D', 'computer science', 'computer security', '2019', '5d03698e5503d3.56981675.pdf', '761527 kb'),
(10, 'Nketiah Joseph Kwame', 'Apraku Nyarko Fredrick', 'Martin Offei', 'online project submission', '04/2016/0566D', '04/2016/0528D', 'computer science', 'IOS', '2019', '5d0369bf755713.13792121.pdf', '8982975 kb');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `mobile`, `password`, `user_role`) VALUES
(1, 'Nketiah', '12345678', '$2y$10$e7Eq7k.8ePfTJ2ElVH1WQee9gKH5M1B87qYjCa7mXyXJLPr42B7pG', 'admin'),
(2, 'Emma', '12345678', '$2y$10$bT1PiG2W7DunhrTG0eBape66F7SKXN526cXgPFIBxoJrAu2W.81I.', 'user'),
(3, 'Moha', '12345678', '$2y$10$MlNLDl5OTTsvgCiaG7T/Y.s8vs.Nw/Jkmph.CaTefWsUGlKmI3kE.', 'admin'),
(4, 'az', '12345678', '$2y$10$l8KinqqfswL3JlpOW8er/OVR.8AnFU2quH6.qZ6JKEhW9t8RAbJx.', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `DateExpire`
--
ALTER TABLE `DateExpire`
  ADD PRIMARY KEY (`expire_id`);

--
-- Indexes for table `Hod`
--
ALTER TABLE `Hod`
  ADD PRIMARY KEY (`hod_id`);

--
-- Indexes for table `LecturerName`
--
ALTER TABLE `LecturerName`
  ADD PRIMARY KEY (`name_id`);

--
-- Indexes for table `projectTopics`
--
ALTER TABLE `projectTopics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `DateExpire`
--
ALTER TABLE `DateExpire`
  MODIFY `expire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Hod`
--
ALTER TABLE `Hod`
  MODIFY `hod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `LecturerName`
--
ALTER TABLE `LecturerName`
  MODIFY `name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projectTopics`
--
ALTER TABLE `projectTopics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
