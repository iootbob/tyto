-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2017 at 03:34 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `city`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `id` int(11) NOT NULL,
  `form_id` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `form_id`, `name`) VALUES
(1, 'add-staff', 'Library Staff'),
(2, 'add-faculty', 'Faculty'),
(3, 'add-student', 'Student'),
(4, 'add-other', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `book_type`
--

CREATE TABLE `book_type` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `published_date` date NOT NULL,
  `book_number` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `summary` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_type`
--

INSERT INTO `book_type` (`id`, `image`, `title`, `author`, `publisher`, `published_date`, `book_number`, `genre`, `department`, `program`, `location`, `quantity`, `summary`) VALUES
(6, 'Screenshot (1).png', 'a', 'a', 'a', '0001-01-01', 1234, 'Horror', 'CCS', 'BSIT', 'Circulation Resources', 1, 'asdf'),
(7, 'Screenshot (1).png', 'asdf', 't', 't', '0001-01-01', 23423, 'Romance', 'CCS', 'BSCS', 'Circulation Resources', 234, 'asdf'),
(8, 'Screenshot (1).png', 'asdf', 'asdf', 'asdf', '0001-01-01', 23423, 'Horror', 'CCS', 'BSCS', 'Circulation Resources', 2, 'asd'),
(0, '#g.png', 'G Fam', 'Carmela', 'National', '2017-09-21', 1231233, 'Horror', 'CCS', 'BSIT', 'Circulation Resources', 3, 'About G Family');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'CCS'),
(2, 'CTHRM'),
(3, 'CNAHS'),
(4, 'CED'),
(5, 'CME'),
(6, 'CAS');

-- --------------------------------------------------------

--
-- Table structure for table `library_accounts`
--

CREATE TABLE `library_accounts` (
  `id` int(10) NOT NULL,
  `lib_fname` varchar(255) NOT NULL,
  `lib_lname` varchar(255) NOT NULL,
  `lib_id_number` varchar(255) NOT NULL,
  `lib_email` varchar(255) NOT NULL,
  `lib_password` varchar(255) NOT NULL,
  `lib_section` int(10) NOT NULL,
  `lib_bday` date NOT NULL,
  `lib_phone` varchar(100) NOT NULL,
  `lib_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library_accounts`
--

INSERT INTO `library_accounts` (`id`, `lib_fname`, `lib_lname`, `lib_id_number`, `lib_email`, `lib_password`, `lib_section`, `lib_bday`, `lib_phone`, `lib_address`) VALUES
(3, 'Manuel', 'Enverga', 'admin-3', 'manuelenverga@mseuf.edu.ph', '827ccb0eea8a706c4c34a16891f84e7b', 4, '1947-02-10', '09151947021', 'University Site Village Lucena City');

-- --------------------------------------------------------

--
-- Table structure for table `library_section`
--

CREATE TABLE `library_section` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library_section`
--

INSERT INTO `library_section` (`id`, `name`) VALUES
(1, 'CRS'),
(2, 'Research'),
(3, 'EMRC'),
(4, 'Filipiniana');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `name`, `department_id`) VALUES
(1, 'BSCS', 1),
(2, 'ACT', 1),
(3, 'BSIT', 1),
(4, 'Tourism', 2),
(5, 'AHRM', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(10) NOT NULL,
  `user_type` int(10) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_id_number` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_dep` int(10) NOT NULL,
  `user_prog` int(10) NOT NULL,
  `user_year` int(10) NOT NULL,
  `user_bday` date NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `user_type`, `user_fname`, `user_lname`, `user_id_number`, `user_email`, `user_password`, `user_dep`, `user_prog`, `user_year`, `user_bday`, `user_phone`, `user_address`) VALUES
(11, 4, 'Ibarra', 'Ako', 'mseuf-10', 'iba.ako@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0, 0, '2017-09-17', '0912313230', 'iba ako'),
(16, 3, 'Jericho', 'Gutierrez', 'A14-21341', 'jegster12@live.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 3, 4, '1998-08-06', '09071234567', 'Brgy. Bukal Pagbilao, Quezon'),
(22, 4, 'Mary', 'Enciso', 'mseuf-17', 'maryjaneenciso@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0, 0, '1997-02-08', '09123091230', 'Brgy. Talipan Pagbilao, Quezon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_accounts`
--
ALTER TABLE `library_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_section`
--
ALTER TABLE `library_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `library_accounts`
--
ALTER TABLE `library_accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `library_section`
--
ALTER TABLE `library_section`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
