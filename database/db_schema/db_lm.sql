-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2020 at 01:59 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(100) COLLATE utf8mb4_estonian_ci NOT NULL,
  `book_image` varchar(255) COLLATE utf8mb4_estonian_ci NOT NULL,
  `book_author_name` varchar(100) COLLATE utf8mb4_estonian_ci NOT NULL,
  `book_publication_name` varchar(100) COLLATE utf8mb4_estonian_ci NOT NULL,
  `book_purchase_date` varchar(100) COLLATE utf8mb4_estonian_ci NOT NULL,
  `book_price` varchar(50) COLLATE utf8mb4_estonian_ci NOT NULL,
  `book_qty` int(11) NOT NULL,
  `available_qty` int(11) NOT NULL,
  `librarian_username` varchar(100) COLLATE utf8mb4_estonian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`, `created_at`) VALUES
(2, 'C++ programming Language', '20191009015429.536.jpg', 'Pretti Arora', 'Ghupta', '2019-10-10', '450', 20, 19, 'sonjoy', '2019-10-11 17:15:14'),
(3, 'Go Digital - MS office&windows-10', '20191009015800.354.jpg', 'Sangitta Panchal', 'Oxford', '2019-10-09', '690', 25, 25, 'sonjoy', '2019-10-11 17:15:01'),
(4, 'Dictionary of Computer Science', '20191009020000.665.png', 'Shumit Arora', 'Arora', '2019-10-09', '480', 15, 15, 'sonjoy', '2019-10-11 17:15:03'),
(5, 'Multimedia Programming Language', '20191010075521.751.jpg', 'Mr. Shidhartha', 'Dattha', '2019-10-10', '450', 15, 14, 'sonjoy', '2019-10-11 16:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books_issue`
--

CREATE TABLE `tbl_books_issue` (
  `id` int(5) NOT NULL,
  `student_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(5) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_issue_date` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `book_return_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_books_issue`
--

INSERT INTO `tbl_books_issue` (`id`, `student_name`, `student_id`, `book_id`, `book_issue_date`, `book_return_date`, `created_at`) VALUES
(1, 'Sonjoy Barua', 1, 2, '11-10-2019', '11-Oct-2019', '2019-10-11 17:13:14'),
(2, 'John Barua', 2, 2, '11-10-2019', '11-Oct-2019', '2019-10-11 17:13:02'),
(3, 'Sonjoy Barua', 1, 3, '11-10-2019', '11-Oct-2019', '2019-10-11 17:15:01'),
(4, 'John Barua', 2, 3, '11-10-2019', '11-Oct-2019', '2019-10-11 17:14:52'),
(5, 'Sonjoy Barua', 1, 4, '11-10-2019', '11-Oct-2019', '2019-10-11 17:15:03'),
(6, 'John Barua', 2, 4, '11-10-2019', '11-Oct-2019', '2019-10-11 17:14:55'),
(7, 'Sonjoy Barua', 1, 5, '11-10-2019', '', '2019-10-11 16:51:42'),
(8, 'Sonjoy Barua', 1, 2, '11-10-2019', '', '2019-10-11 17:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_librarians`
--

CREATE TABLE `tbl_librarians` (
  `id` int(11) NOT NULL,
  `f_name` varchar(100) COLLATE utf8mb4_estonian_ci NOT NULL,
  `l_name` varchar(100) COLLATE utf8mb4_estonian_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_estonian_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_estonian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_estonian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci;

--
-- Dumping data for table `tbl_librarians`
--

INSERT INTO `tbl_librarians` (`id`, `f_name`, `l_name`, `email`, `username`, `password`, `created_at`) VALUES
(1, 'Sonjoy', 'Barua', 'sonjoy@gmail.com', 'sonjoy', '827ccb0eea8a706c4c34a16891f84e7b', '2019-10-11 05:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `id` int(6) NOT NULL,
  `f_name` varchar(50) COLLATE utf8mb4_estonian_ci NOT NULL,
  `l_name` varchar(50) COLLATE utf8mb4_estonian_ci NOT NULL,
  `roll` int(6) NOT NULL,
  `reg` int(6) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_estonian_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_estonian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_estonian_ci NOT NULL,
  `confirm_password` varchar(100) COLLATE utf8mb4_estonian_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_estonian_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_estonian_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`id`, `f_name`, `l_name`, `roll`, `reg`, `email`, `username`, `password`, `confirm_password`, `phone`, `image`, `status`, `created_at`) VALUES
(1, 'Sonjoy', 'Barua', 1471, 147147, 'sonjoy@nomail.com', 'sonjoy', '$2y$10$KLul/9msfW/UoJMdaD8scOqV61xOpSpnDtT1dpRAvmFuyyEsMm/D.', '$2y$10$xSmNZAqKCysKzUjEDMzpWeq70kRXH/..jaQ4lJXH19JiIjgLEqlq6', '01915464958', NULL, 1, '2019-10-09 07:15:08'),
(2, 'John', 'Barua', 4562, 456213, 'john@nomail.com', 'john', '$2y$10$DaMDfGcXYO./o5dBT8TPsuBhBI8ehtHC2YOrEhJvuU7CWaebZtP9W', '$2y$10$T51Hs1fbyhX7d8ZXtsTUcOjQ0rIK7BS6Sc3L5Dy./ZJUx9AyeMlCW', '01811591944', NULL, 1, '2020-01-21 07:40:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_books_issue`
--
ALTER TABLE `tbl_books_issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_librarians`
--
ALTER TABLE `tbl_librarians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_books_issue`
--
ALTER TABLE `tbl_books_issue`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_librarians`
--
ALTER TABLE `tbl_librarians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
