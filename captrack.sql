-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 04:14 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `mobileno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Inactive',
  `type` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  `otp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `fname`, `lname`, `mobileno`, `email`, `gender`, `address`, `city`, `pincode`, `country`, `status`, `type`, `username`, `password`, `date`, `time`, `image`, `otp`) VALUES
(1, 'admin', 'admin', '9000000000', 'admin@gmail.com', 'Male', 'Sudbury', 'Sudbury', '452', 'Canada', 'Active', 'Admin', 'admin@admin', 'admin@123', '01-02-2022', NULL, '61e699e19ed2713.jpg', '9340');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(12) NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `project_id` varchar(255) DEFAULT NULL,
  `clock_in` varchar(255) DEFAULT NULL,
  `clock_out` varchar(255) DEFAULT NULL,
  `work_from` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Present'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `project_id`, `clock_in`, `clock_out`, `work_from`, `note`, `remark`, `date`, `time`, `status`) VALUES
(1, '2', '6', '09:20 am', '10:20 am', 'Office', 'Hiiiiiiiiiiii', 'Hellooooooooooooo', '24-02-2022', '09:20 am', 'Present'),
(2, '1', '6', '06:02 pm', '06:17 pm', 'Office', 'hii', 'hii', '07-03-2022', '06:02 pm', 'Present'),
(3, '1', '6', '04:12 pm', '04:25 pm', 'Office', 'hii', 'hello', '08-03-2022', '04:12 pm', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(12) NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `leave_date` varchar(255) DEFAULT NULL,
  `leave_from` varchar(255) DEFAULT NULL,
  `leave_to` varchar(255) DEFAULT NULL,
  `leave_type` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `employee_id`, `leave_date`, `leave_from`, `leave_to`, `leave_type`, `reason`, `status`, `date`) VALUES
(1, '1', 'single', '03/10/2022', '03/10/2022', 'Casual Leaves', 'Going To Mumbai.......', 'Accept', '06-03-2022'),
(2, '1', 'multiple', '03/12/2022 ', ' 03/16/2022', 'Maternity Leaves', 'Nothing....', 'Pending', '07-03-2022'),
(3, '2', 'single', '03/11/2022', '03/11/2022', 'Casual Leaves', 'Going To Banglore.......', 'Accept', '07-03-2022'),
(4, '2', 'multiple', '03/20/2022 ', ' 03/25/2022', 'Maternity Leaves', 'Nothing....', 'Accept', '08-03-2022');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(12) NOT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `description`, `image`) VALUES
(1, '<p>This is a sample of dummy copy text often used to show page layout and design as sample layout text by Graphic designers, Web designers, People creating templates, and many other uses.</p>\r\n', '61af3b7e66e70logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `employee_id` int(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `employee_id`, `product`, `product_id`, `order_date`, `order_price`) VALUES
(10, 7, 'Bag', 1, '2022-10-14', 50),
(11, 8, 'Gym membership 3 months', 6, '2022-10-18', 100);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product`, `image`, `price`) VALUES
(1, 'Bag', '634c8596ab4d5pexels-ge-yonk-1152077.jpg', 50),
(2, 'Sweater', '634c8626018aeistockphoto-1340959863-612x612.jpg', 60),
(3, 'Jacket', '634c8635254aaistockphoto-1352728757-170667a.jpg', 75),
(4, 'Purse', '634c8643f2c04images.jpg', 50),
(6, 'Gym membership 3 months', '634ed7d000633download.jpg', 100),
(7, 'Health checkup', '634ed7e9d1e97download (1).jpg', 125);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_added_by` varchar(255) DEFAULT NULL,
  `projectname` varchar(255) DEFAULT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `deadline` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `approval_status` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_added_by`, `projectname`, `employee_id`, `start_date`, `deadline`, `description`, `image`, `status`, `approval_status`, `time`) VALUES
(8, '1', 'Project A', '7', '2022-02-01', '2022-05-01', 'hbjg', '6338db85dbd33Animations.pdf', 'Approval_req', NULL, '05:59 am'),
(9, '1', 'Project C', '7', '2022-03-01', '2022-10-10', 'gfdf', '633a20fac6fc4Animations.pdf', 'Completed', NULL, '05:08 am'),
(10, '7', 'Alex proj', '8', '2022-05-01', '2022-10-20', 'fgfgv', '633a26db86f6cAnimations.pdf', 'Completed', NULL, '05:33 am'),
(12, '7', 'Project F', '8', '2022-10-04', '2022-10-28', 'fg', '634ed3c2ec9ccyash_resume_ca.pdf', 'Approval_req', NULL, '12:26 pm'),
(13, '7', 'Project B', '8', '2022-10-18', '2022-10-20', 'ssd', '635004ae4d989Applied Activity 1.pdf', 'Active', NULL, '10:07 am'),
(14, '7', 'Project D', '8', '2022-10-18', '2022-10-27', 'g', '63500ca551dffAssignment 1.2_ Advanced Webservices.pdf', 'Completed', NULL, '10:41 am'),
(18, '7', 'sample', '8', '2022-10-13', '2022-10-21', 'xyz', '63517b55946a1conceptual data model.pdf', 'Completed', NULL, '12:46 pm');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(12) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `points` int(255) NOT NULL,
  `last_reviewed_on` varchar(255) DEFAULT NULL,
  `manager` varchar(50) DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `shift_schedule` varchar(255) DEFAULT NULL,
  `date_of_joining` varchar(255) DEFAULT NULL,
  `resignation_date` varchar(255) DEFAULT NULL,
  `salary_type` varchar(255) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `account_holder` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `resume` text DEFAULT NULL,
  `id_proof` text DEFAULT NULL,
  `offer_letter` text DEFAULT NULL,
  `joining_letter` text DEFAULT NULL,
  `experience_letter` text DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `fname`, `lname`, `email`, `phone`, `points`, `last_reviewed_on`, `manager`, `present_address`, `permanent_address`, `image`, `password`, `employee_id`, `department`, `designation`, `shift_schedule`, `date_of_joining`, `resignation_date`, `salary_type`, `salary`, `status`, `account_holder`, `account_number`, `bank_name`, `resume`, `id_proof`, `offer_letter`, `joining_letter`, `experience_letter`, `time`) VALUES
(1, 'Raj', 'Rathore', 'raj@gmail.com', '9754604855', 0, NULL, NULL, '1465 Kingsway, Greater Sudbury, ON P3B 2E7', '1465 Kingsway, Greater Sudbury, ON P3B 2E7', '61f931582e23bprofile.jpg', 'raj@1234', '2021', 'Computer Science', 'Developer', 'Day', '30/01/2020', '10/02/2020', 'Full-Time', '350000', 'Active', 'Raj Rathore', '232344445555', 'BOI', '61efa749926f0thumb1.jpg', '61efa749979c4thumb3.jpg', '61efa74998f8161cc1500876f15f90491113889Copyright-Form-IJCRA.pdf', '61efa749aca0e61d54b448e8adFTP UNIT 2.PDF', '61efa749afb9a61d54b448e8adFTP UNIT 2.PDF', '01:01 pm'),
(7, 'Sam', 'Wilson', 'swf943a@captrack.com', '7058895587', 55, NULL, '2021', '1465 Kingsway, Greater Sudbury, ON P3B 2E7', '1465 Kingsway, Greater Sudbury, ON P3B 2E7', '634d69bc883d6download.png', 'M315cu', 'SWf943a', 'Engineering', 'Application Developer', '', '', '', '', '', 'Active', '', '', '', '', '', '', '', '', '07:36 pm'),
(8, 'Alex', 'caya', 'acce829@captrack.com', '9885225885', 657, '2022-10-21', 'SWf943a', 'as', 'sf', '633457e7a3b52download.jpg', 'lAmh3e', 'ACce829', '', 'Dev', '', '', '', 'Full-Time', '', 'Active', '', '', '', '', '', '', '', '', '07:49 pm');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(12) NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Close'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `site_name`, `description`, `address`, `status`) VALUES
(1, 'Website Development', 'This is a sample of dummy copy text often used to', '0A1, Appartment, City,\r\nState, Country 4520XX', 'Open'),
(2, 'App Development', 'This is a sample of dummy copy text often used to', '0A1, Appartment, City,\r\nState, Country 4520XX', 'Open'),
(3, 'Graphics Designer', 'This is a sample of dummy copy text often used to', '0A1, Appartment, City,\r\nState, Country 4520XX', 'Open'),
(4, 'Ui Developer', 'This is a sample of dummy copy text often used to', '0A1, Appartment, City,\r\nState, Country 4520XX', 'Open');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
