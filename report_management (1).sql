-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 04, 2024 at 07:41 AM
-- Server version: 5.7.33
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `report_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `user_id` int(25) DEFAULT NULL,
  `question_id` int(25) DEFAULT NULL,
  `answer_text` varchar(255) DEFAULT NULL,
  `answer_option` json DEFAULT NULL,
  `is_serialized` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `answer_submit_history`
--

CREATE TABLE `answer_submit_history` (
  `id` int(11) NOT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `previous_record` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SCL', 1, '2024-07-03 23:11:28', '2024-07-03 23:11:28'),
(2, 'WLC', 1, '2024-07-03 23:11:44', '2024-07-03 23:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `company_revenue`
--

CREATE TABLE `company_revenue` (
  `id` int(11) NOT NULL,
  `position_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `monthly_target_value` varchar(1000) DEFAULT NULL,
  `achievement_value` varchar(10000) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `daily_answer_submit`
--

CREATE TABLE `daily_answer_submit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `answers` json DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daily_answer_submit`
--

INSERT INTO `daily_answer_submit` (`id`, `name`, `answers`, `position_id`, `created_at`, `updated_at`) VALUES
(1, 'Khademul Islam Shimul', '{\"1\": \"test\", \"2\": [\"hello1\", \"hello2\"], \"3\": [\"sw\"], \"4\": [\"option1\", \"option3\"], \"5\": \"option2\", \"6\": [\"ss\"], \"7\": \"option4\"}', 2, '2024-06-30 22:35:32', '2024-06-30 22:35:32'),
(2, 'Khademul Islam Shimul', '{\"1\": \"test\", \"2\": [\"test\", \"hello2\"], \"3\": [null], \"4\": null, \"5\": null, \"6\": [null], \"7\": null}', 2, '2024-07-01 00:03:06', '2024-07-01 00:03:06'),
(3, 'Khademul Islam Shimul', '{\"1\": \"test\", \"2\": [\"hello1\", \"hello2\"], \"3\": [\"sw\"], \"4\": [\"option4\"], \"5\": \"option3\", \"6\": [\"ad\"], \"7\": \"option3\"}', 2, '2024-07-01 00:25:19', '2024-07-01 00:25:19'),
(4, 'MD. Shamim Ahamed', '{\"1\": \"option1\", \"2\": [\"option1\", \"option3\"], \"3\": [\"hello\"]}', 5, '2024-07-01 03:11:26', '2024-07-01 03:11:26'),
(5, 'Khademul Islam Shimul', '{\"1\": \"test\", \"2\": [\"hello1\", \"hello2\"], \"3\": [\"sffafaf\"], \"4\": [\"option2\", \"option3\"], \"5\": \"option4\", \"6\": [\"fhf\"], \"7\": \"option2\"}', 2, '2024-07-01 05:11:06', '2024-07-01 05:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_answer_submit`
--

CREATE TABLE `monthly_answer_submit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `answers` json DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` tinyint(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `soft_delete` varchar(255) DEFAULT NULL,
  `status` tinyint(11) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` tinyint(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` tinyint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`, `soft_delete`, `status`, `deleted_at`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'MD', NULL, 1, '2024-06-25 09:30:55', '2024-06-25 09:30:55', NULL, '2024-06-25 06:05:38', NULL),
(2, 'CTO', NULL, 1, '2024-06-25 09:31:34', '2024-06-25 09:31:34', NULL, '2024-06-25 09:31:34', NULL),
(3, 'CEO', NULL, 1, '2024-06-25 09:31:50', '2024-06-25 09:31:50', NULL, '2024-06-25 09:31:50', NULL),
(4, 'MANAGER', NULL, 1, '2024-06-25 09:32:14', '2024-06-25 09:32:14', NULL, '2024-06-25 09:32:14', NULL),
(5, 'Developer', NULL, 1, '2024-06-26 05:30:40', '2024-06-25 23:30:40', NULL, '2024-06-25 23:30:40', NULL),
(6, 'Admin', NULL, 1, '2024-07-03 06:35:59', '2024-07-03 06:35:59', NULL, '2024-07-03 06:35:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `position_id` tinyint(11) DEFAULT NULL,
  `question_group_id` tinyint(11) DEFAULT NULL,
  `question_type_id` tinyint(11) DEFAULT NULL,
  `question_submit_type_id` tinyint(11) DEFAULT NULL,
  `soft_delete` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` tinyint(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` tinyint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `title`, `description`, `position_id`, `question_group_id`, `question_type_id`, `question_submit_type_id`, `soft_delete`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'Test Question 1', NULL, 2, 2, 1, 1, NULL, 1, '2024-06-27 00:01:21', NULL, '2024-06-27 00:01:21', NULL),
(3, 'Test Question 2', NULL, 2, 2, 2, 1, NULL, 1, '2024-06-27 00:04:06', NULL, '2024-06-27 00:04:06', NULL),
(4, 'Input QuestionDemo 1', NULL, 2, 2, 3, 1, NULL, 1, '2024-06-29 23:02:46', NULL, '2024-06-29 23:02:46', NULL),
(5, 'Weekly Test Question 1', NULL, 2, 2, 1, 2, NULL, 1, '2024-06-29 23:03:00', NULL, '2024-06-29 23:03:00', NULL),
(6, 'New Question 4', NULL, 2, 2, 2, 1, NULL, 1, '2024-06-30 00:16:53', NULL, '2024-06-30 00:16:53', NULL),
(7, 'New Question 5', NULL, 2, 2, 1, 1, NULL, 1, '2024-06-30 00:17:12', NULL, '2024-06-30 00:17:12', NULL),
(8, 'Input Question Demo 2', NULL, 2, 2, 3, 1, NULL, 1, '2024-06-30 00:17:30', NULL, '2024-06-30 00:17:30', NULL),
(9, 'New Question 6', NULL, 2, 2, 1, 1, NULL, 1, '2024-06-30 00:17:43', NULL, '2024-06-30 00:17:43', NULL),
(10, 'New Question 1', NULL, 5, 2, 1, 1, NULL, 1, '2024-06-30 00:41:46', NULL, '2024-06-30 00:41:46', NULL),
(11, 'New Question 2', NULL, 5, 2, 2, 1, NULL, 1, '2024-06-30 00:41:58', NULL, '2024-06-30 00:41:58', NULL),
(12, 'Input Question Demo 1', NULL, 5, 2, 3, 1, NULL, 1, '2024-06-30 00:42:10', NULL, '2024-06-30 00:42:10', NULL),
(14, 'Test Question 4', NULL, 5, 1, 1, 1, NULL, 1, '2024-07-01 03:13:58', NULL, '2024-07-01 03:13:58', NULL),
(16, 'Test Question 2', NULL, 2, 2, 1, 2, NULL, 1, '2024-07-02 22:53:29', NULL, '2024-07-02 22:53:29', NULL),
(17, 'Test Question 1', NULL, 4, 4, 1, 3, NULL, 1, '2024-07-03 22:03:57', NULL, '2024-07-03 22:03:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_group`
--

CREATE TABLE `question_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` tinyint(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` tinyint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_group`
--

INSERT INTO `question_group` (`id`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'HR', '2024-06-26 02:31:30', NULL, '2024-06-26 02:32:21', NULL),
(2, 'Manager', '2024-06-26 02:31:47', NULL, '2024-06-26 02:31:47', NULL),
(3, 'CEO', '2024-06-26 02:32:02', NULL, '2024-06-26 02:32:02', NULL),
(4, 'SCL Revenue', '2024-07-03 22:00:23', NULL, '2024-07-03 22:00:23', NULL),
(5, 'WLC Revenue', '2024-07-03 22:00:36', NULL, '2024-07-03 22:00:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_option`
--

CREATE TABLE `question_option` (
  `id` int(11) NOT NULL,
  `option_title` varchar(255) DEFAULT NULL,
  `question_id` int(25) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` tinyint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_option`
--

INSERT INTO `question_option` (`id`, `option_title`, `question_id`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'test', 2, NULL, '2024-06-27 00:01:21', '2024-06-27 00:01:21', NULL),
(2, 'hello1', 2, NULL, '2024-06-27 00:01:21', '2024-06-27 00:01:21', NULL),
(3, 'hello2', 2, NULL, '2024-06-27 00:01:21', '2024-06-27 00:01:21', NULL),
(4, 'test2', 2, NULL, '2024-06-27 00:01:21', '2024-06-27 00:01:21', NULL),
(5, 'test', 3, NULL, '2024-06-27 00:04:06', '2024-06-27 00:04:06', NULL),
(6, 'hello1', 3, NULL, '2024-06-27 00:04:06', '2024-06-27 00:04:06', NULL),
(7, 'hello2', 3, NULL, '2024-06-27 00:04:06', '2024-06-27 00:04:06', NULL),
(8, 'test2', 3, NULL, '2024-06-27 00:04:06', '2024-06-27 00:04:06', NULL),
(9, 'test', 5, NULL, '2024-06-29 23:03:00', '2024-06-29 23:03:00', NULL),
(10, 'hello1', 5, NULL, '2024-06-29 23:03:00', '2024-06-29 23:03:00', NULL),
(11, 'hello2', 5, NULL, '2024-06-29 23:03:00', '2024-06-29 23:03:00', NULL),
(12, 'test2', 5, NULL, '2024-06-29 23:03:00', '2024-06-29 23:03:00', NULL),
(13, 'option1', 6, NULL, '2024-06-30 00:16:53', '2024-06-30 00:16:53', NULL),
(14, 'option2', 6, NULL, '2024-06-30 00:16:53', '2024-06-30 00:16:53', NULL),
(15, 'option3', 6, NULL, '2024-06-30 00:16:53', '2024-06-30 00:16:53', NULL),
(16, 'option4', 6, NULL, '2024-06-30 00:16:53', '2024-06-30 00:16:53', NULL),
(17, 'option1', 7, NULL, '2024-06-30 00:17:12', '2024-06-30 00:17:12', NULL),
(18, 'option2', 7, NULL, '2024-06-30 00:17:12', '2024-06-30 00:17:12', NULL),
(19, 'option3', 7, NULL, '2024-06-30 00:17:12', '2024-06-30 00:17:12', NULL),
(20, 'option4', 7, NULL, '2024-06-30 00:17:12', '2024-06-30 00:17:12', NULL),
(21, 'option1', 9, NULL, '2024-06-30 00:17:43', '2024-06-30 00:17:43', NULL),
(22, 'option2', 9, NULL, '2024-06-30 00:17:43', '2024-06-30 00:17:43', NULL),
(23, 'option3', 9, NULL, '2024-06-30 00:17:43', '2024-06-30 00:17:43', NULL),
(24, 'option4', 9, NULL, '2024-06-30 00:17:43', '2024-06-30 00:17:43', NULL),
(25, 'option1', 10, NULL, '2024-06-30 00:41:46', '2024-06-30 00:41:46', NULL),
(26, 'option2', 10, NULL, '2024-06-30 00:41:46', '2024-06-30 00:41:46', NULL),
(27, 'option3', 10, NULL, '2024-06-30 00:41:46', '2024-06-30 00:41:46', NULL),
(28, 'option4', 10, NULL, '2024-06-30 00:41:46', '2024-06-30 00:41:46', NULL),
(29, 'option1', 11, NULL, '2024-06-30 00:41:58', '2024-06-30 00:41:58', NULL),
(30, 'option2', 11, NULL, '2024-06-30 00:41:58', '2024-06-30 00:41:58', NULL),
(31, 'option3', 11, NULL, '2024-06-30 00:41:58', '2024-06-30 00:41:58', NULL),
(32, 'option4', 11, NULL, '2024-06-30 00:41:58', '2024-06-30 00:41:58', NULL),
(33, 'test', 14, NULL, '2024-07-01 03:13:58', '2024-07-01 03:13:58', NULL),
(34, 'test1', 14, NULL, '2024-07-01 03:13:58', '2024-07-01 03:13:58', NULL),
(35, 'test2', 14, NULL, '2024-07-01 03:13:58', '2024-07-01 03:13:58', NULL),
(36, 'test3', 14, NULL, '2024-07-01 03:13:58', '2024-07-01 03:13:58', NULL),
(37, 'test1', 16, NULL, '2024-07-02 22:53:29', '2024-07-02 22:53:29', NULL),
(38, 'test2', 16, NULL, '2024-07-02 22:53:29', '2024-07-02 22:53:29', NULL),
(39, 'test3', 16, NULL, '2024-07-02 22:53:29', '2024-07-02 22:53:29', NULL),
(40, 'test4', 16, NULL, '2024-07-02 22:53:29', '2024-07-02 22:53:29', NULL),
(41, 'test1', 17, NULL, '2024-07-03 22:03:57', '2024-07-03 22:03:57', NULL),
(42, 'test2', 17, NULL, '2024-07-03 22:03:57', '2024-07-03 22:03:57', NULL),
(43, 'test3', 17, NULL, '2024-07-03 22:03:57', '2024-07-03 22:03:57', NULL),
(44, 'test4', 17, NULL, '2024-07-03 22:03:57', '2024-07-03 22:03:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_submit_type`
--

CREATE TABLE `question_submit_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` tinyint(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` tinyint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_submit_type`
--

INSERT INTO `question_submit_type` (`id`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Weekly', '2024-06-26 02:41:31', NULL, '2024-06-26 02:41:31', NULL),
(2, 'Monthly', '2024-06-26 02:41:45', NULL, '2024-06-26 02:41:45', NULL),
(3, 'Yearly', '2024-06-26 02:41:58', NULL, '2024-06-26 02:42:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` tinyint(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` tinyint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`id`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Radio', '2024-06-26 02:48:52', NULL, '2024-06-26 02:48:52', NULL),
(2, 'Checkbox', '2024-06-26 02:49:16', NULL, '2024-06-26 02:49:16', NULL),
(3, 'Text', '2024-06-26 02:50:30', NULL, '2024-06-26 02:50:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `reporting_user` tinyint(11) DEFAULT NULL,
  `position_id` tinyint(4) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `block` varchar(255) DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `soft_delete` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` tinyint(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` tinyint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `full_name`, `reporting_user`, `position_id`, `company_id`, `block`, `last_login_ip`, `password`, `is_active`, `soft_delete`, `deleted_at`, `deleted_by`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(7, 'Admin', 'Arif', 1, 6, NULL, NULL, NULL, '$2a$12$77EwVvh.CM/CX0fSZkTuc.QnGBlV3rKpL3JJ2GZ1UonECcUSGn8Aq', 1, NULL, '2024-06-13 05:35:14', NULL, '2024-06-13 05:35:14', NULL, '2024-06-13 05:35:14', NULL),
(8, 'Manager', 'Rofiquzzaman', 1, 4, 1, NULL, NULL, '$2a$12$qsyQd5UkWLmKp3jzxQsRrOKVLQ8I6S7/BjoyGcwdBrncn3eDeU6.G', 1, NULL, '2024-06-13 05:35:14', NULL, '2024-06-13 05:35:14', NULL, '2024-06-13 05:35:14', NULL),
(9, 'CTO', 'Khademul Islam Shimul', 4, 2, 1, NULL, NULL, '$2a$12$Nkq/L8D5PcGI9VfqtAyCaeDOZTrb/Z9snQkS7wEqStypFXZ.4cd1S', 1, NULL, '2024-06-25 09:34:16', NULL, '2024-06-25 09:34:16', NULL, '2024-06-25 09:34:16', NULL),
(11, 'Developer', 'MD. Shamim Ahamed', 2, 5, 1, NULL, NULL, '$2y$10$uzlUiqlOfUu6.VPzKIA2s.5DeoVbXd5q1TeemeD.Bu3ebvG35BWmW', 1, NULL, '2024-06-26 05:32:37', NULL, '2024-06-25 23:32:37', NULL, '2024-06-25 23:32:37', NULL),
(12, 'Asifchoudhury001', 'Asif Choudhury', 1, 1, NULL, NULL, NULL, '$2y$10$tJRrT2lzXmrVW20mo2wEU.TGg7dC4mLWHlMupJ556Ghe0cr73xF9C', 1, NULL, '2024-07-03 05:01:45', NULL, '2024-07-02 23:01:45', NULL, '2024-07-02 23:01:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `weekly_answer_submit`
--

CREATE TABLE `weekly_answer_submit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `answers` json DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weekly_answer_submit`
--

INSERT INTO `weekly_answer_submit` (`id`, `name`, `answers`, `position_id`, `created_at`, `updated_at`) VALUES
(1, 'Khademul Islam Shimul', '{\"1\": \"hello1\"}', 2, '2024-07-01 04:23:39', '2024-07-01 04:23:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer_submit_history`
--
ALTER TABLE `answer_submit_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_revenue`
--
ALTER TABLE `company_revenue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_answer_submit`
--
ALTER TABLE `daily_answer_submit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_answer_submit`
--
ALTER TABLE `monthly_answer_submit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `question_group`
--
ALTER TABLE `question_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_option`
--
ALTER TABLE `question_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_submit_type`
--
ALTER TABLE `question_submit_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reporting_user` (`reporting_user`);

--
-- Indexes for table `weekly_answer_submit`
--
ALTER TABLE `weekly_answer_submit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `answer_submit_history`
--
ALTER TABLE `answer_submit_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_revenue`
--
ALTER TABLE `company_revenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_answer_submit`
--
ALTER TABLE `daily_answer_submit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `monthly_answer_submit`
--
ALTER TABLE `monthly_answer_submit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `question_group`
--
ALTER TABLE `question_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question_option`
--
ALTER TABLE `question_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `question_submit_type`
--
ALTER TABLE `question_submit_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `weekly_answer_submit`
--
ALTER TABLE `weekly_answer_submit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `position_id` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `reporting_user` FOREIGN KEY (`reporting_user`) REFERENCES `position` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
