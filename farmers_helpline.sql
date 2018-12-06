-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 02:37 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmers_helpline`
--

-- --------------------------------------------------------

--
-- Table structure for table `advice_details`
--

CREATE TABLE IF NOT EXISTS `advice_details` (
  `advice_details_id` int(11) NOT NULL,
  `symptoms_advice_id` int(11) NOT NULL,
  `advice_id` int(11) NOT NULL,
  `advice` varchar(100) NOT NULL,
  `advice_status` int(2) NOT NULL DEFAULT '0' COMMENT '0-inactive ; 1-active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `alert_master`
--

CREATE TABLE IF NOT EXISTS `alert_master` (
  `id` int(11) NOT NULL,
  `alert_msg` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `alert_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `alert_master`
--

INSERT INTO `alert_master` (`id`, `alert_msg`, `alert_type`, `status`, `created_at`, `updated_at`) VALUES
(1, '<p>Weather 12</p>\r\n', 'weather_al', 1, 2018, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE IF NOT EXISTS `cms_pages` (
  `cms_page_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`cms_page_id`, `title`, `content`, `updated_by`, `updated_on`) VALUES
(1, 'About-Us', '<p><strong>About-Us Page</strong></p>\r\n', '', '2018-10-22 23:25:32'),
(2, 'Contact Us', '<p>Contact Us</p>\r\n', '', '2018-10-08 18:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `crops`
--

CREATE TABLE IF NOT EXISTS `crops` (
  `crop_id` int(11) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `crop_name` varchar(200) NOT NULL,
  `crop_desc` text NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `status` enum('0','1') NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crops`
--

INSERT INTO `crops` (`crop_id`, `crop_type_id`, `crop_name`, `crop_desc`, `image`, `status`, `created_on`, `updated_on`) VALUES
(2, 0, 'Wheat', 'Wheat', '', '1', '2018-10-18 01:37:37', '2018-10-17 10:24:54'),
(3, 0, 'Test', 'Test', '', '1', '2018-10-18 13:03:24', '2018-10-18 13:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `crop_details`
--

CREATE TABLE IF NOT EXISTS `crop_details` (
  `crop_detail_id` int(11) NOT NULL,
  `plot_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_name` varchar(50) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `crop_variety_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crop_details`
--

INSERT INTO `crop_details` (`crop_detail_id`, `plot_id`, `farmer_id`, `crop_id`, `crop_name`, `crop_type_id`, `crop_variety_id`) VALUES
(1, 0, 19, 0, 'sda', 1, 0),
(2, 0, 20, 0, 'Rice', 1, 0),
(3, 0, 30, 0, 'sda', 1, 0),
(4, 0, 31, 0, 'Rice', 1, 0),
(5, 0, 32, 0, 'Rice', 1, 0),
(6, 0, 33, 0, 'Corn', 1, 0),
(7, 0, 34, 0, 'Charlie1 crop', 1, 0),
(8, 0, 19, 0, 'rice', 1, 0),
(9, 0, 22, 0, 'Charlie1 crop', 1, 0),
(10, 0, 24, 0, 'test crop', 1, 0),
(11, 0, 25, 0, 'test', 1, 0),
(12, 0, 56, 0, 'bajra', 1, 0),
(13, 0, 75, 0, 'Rice', 1, 0),
(14, 0, 78, 0, 'farmer crop', 1, 0),
(15, 0, 79, 0, 'farmer crop1', 1, 0),
(16, 0, 81, 0, 'farmer EAccrop', 1, 0),
(17, 0, 82, 0, 'Charlie1 crop', 1, 0),
(18, 0, 87, 0, 'Charlie1 crop', 1, 0),
(19, 0, 90, 0, 'farmer crop', 1, 0),
(20, 0, 92, 0, 'Charlie1 crop', 1, 0),
(21, 0, 93, 0, 'pommo1', 1, 0),
(22, 0, 95, 0, 'pomo', 1, 0),
(23, 2, 0, 2, '', 1, 2),
(24, 0, 97, 0, 'wheat', 2, 0),
(25, 0, 98, 0, 'rice', 2, 0),
(26, 0, 99, 0, 'Farm Crop', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `crop_groth`
--

CREATE TABLE IF NOT EXISTS `crop_groth` (
  `crop_groth_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_groth_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `crop_groth` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crop_type`
--

CREATE TABLE IF NOT EXISTS `crop_type` (
  `crop_type_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_type_name` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crop_type`
--

INSERT INTO `crop_type` (`crop_type_id`, `crop_id`, `crop_type_name`) VALUES
(1, 2, 'Winter Wheat'),
(2, 2, 'Spring Wheat');

-- --------------------------------------------------------

--
-- Table structure for table `crop_variety`
--

CREATE TABLE IF NOT EXISTS `crop_variety` (
  `crop_variety_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_variety_name` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crop_variety`
--

INSERT INTO `crop_variety` (`crop_variety_id`, `crop_id`, `crop_variety_name`) VALUES
(1, 2, 'Hi 8759'),
(2, 2, 'HD 4728'),
(3, 2, 'HW 5207'),
(4, 2, 'HS 562');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE IF NOT EXISTS `disease` (
  `disease_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `disease_name` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`disease_id`, `crop_id`, `disease_name`) VALUES
(1, 2, 'Barley Yellow Dwarf.'),
(2, 2, 'Leaf Rust'),
(3, 2, 'Black Chaff'),
(4, 2, 'Tan Spot');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `dis_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dis_id`, `state_id`, `name`) VALUES
(1, 1, 'Pune'),
(2, 1, 'Mumbai'),
(3, 2, 'Bhopal'),
(4, 2, 'Gwaliar');

-- --------------------------------------------------------

--
-- Table structure for table `dripping_method`
--

CREATE TABLE IF NOT EXISTS `dripping_method` (
  `dripping_method_id` int(11) NOT NULL,
  `dripping_method_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ea_answers`
--

CREATE TABLE IF NOT EXISTS `ea_answers` (
  `ea_resp_id` int(11) NOT NULL,
  `token` varchar(20) NOT NULL,
  `ea_question_id` int(11) NOT NULL,
  `ea_id` int(11) NOT NULL,
  `response` longtext NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ea_answers`
--

INSERT INTO `ea_answers` (`ea_resp_id`, `token`, `ea_question_id`, `ea_id`, `response`, `created_on`, `updated_on`) VALUES
(6, '154316601296', 6, 80, '<p>Yes</p>\r\n', '2018-11-25 17:14:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ea_questions`
--

CREATE TABLE IF NOT EXISTS `ea_questions` (
  `query_id` int(11) NOT NULL,
  `token` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` mediumtext NOT NULL,
  `image_path` varchar(45) DEFAULT NULL,
  `audio_video_path` varchar(45) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `main_question` enum('0','1') NOT NULL,
  `mail_sent` enum('0','1') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ea_questions`
--

INSERT INTO `ea_questions` (`query_id`, `token`, `user_id`, `question`, `image_path`, `audio_video_path`, `created_on`, `updated_on`, `status`, `main_question`, `mail_sent`) VALUES
(6, '154316601296', 81, '<p>Hi SuhelEA</p>\r\n', NULL, 'test2.mp3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1', '0'),
(7, '154316601296', 81, '<p>Please Provide me info</p>\r\n', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ea_questions_symptoms`
--

CREATE TABLE IF NOT EXISTS `ea_questions_symptoms` (
  `ea_questions_symptoms_id` int(11) NOT NULL,
  `query_id` int(11) NOT NULL,
  `symptoms_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `farmer_call_details`
--

CREATE TABLE IF NOT EXISTS `farmer_call_details` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `executive_id` int(11) NOT NULL,
  `call_duration` varchar(255) NOT NULL,
  `call_date_time` datetime DEFAULT NULL,
  `call_response` int(11) NOT NULL,
  `call_remark` text,
  `question` text,
  `answer` text,
  `created_at` date DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `farmer_farm_details`
--

CREATE TABLE IF NOT EXISTS `farmer_farm_details` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) DEFAULT NULL,
  `farm_name` varchar(255) DEFAULT NULL,
  `farm_photo` varchar(255) DEFAULT NULL,
  `farm_location` varchar(255) DEFAULT NULL,
  `village` int(11) DEFAULT NULL,
  `tehsil` int(11) DEFAULT NULL,
  `district` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `survey_no` varchar(255) DEFAULT NULL,
  `total_area` varchar(255) DEFAULT NULL,
  `area_unit` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `farmer_personal_details`
--

CREATE TABLE IF NOT EXISTS `farmer_personal_details` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `m_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `language` char(1) DEFAULT NULL,
  `birth_date` datetime DEFAULT NULL,
  `age` double DEFAULT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `whatsapp_no` varchar(15) DEFAULT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `address` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_registered` int(11) NOT NULL DEFAULT '0',
  `tagged_to` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer_personal_details`
--

INSERT INTO `farmer_personal_details` (`id`, `f_name`, `m_name`, `l_name`, `language`, `birth_date`, `age`, `mobile_no`, `whatsapp_no`, `photo_url`, `gender`, `address`, `status`, `is_registered`, `tagged_to`, `created_by`, `created_dt`) VALUES
(21, 'Rahul', 'R', 'Kadam', 'E', '2018-11-26 00:00:00', NULL, '8238040052', '8238040052', NULL, 'M', '', 1, 0, 8, 8, '2018-12-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_plot_details`
--

CREATE TABLE IF NOT EXISTS `farmer_plot_details` (
  `id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL,
  `plot_area` varchar(255) DEFAULT NULL,
  `crop_name` varchar(255) NOT NULL,
  `crop_type` int(11) DEFAULT NULL,
  `variety_type` int(11) DEFAULT NULL,
  `crop_grown_area` varchar(255) DEFAULT NULL,
  `plot_numbers` int(11) DEFAULT NULL,
  `soil_type` int(11) DEFAULT NULL,
  `water_capacity` varchar(255) DEFAULT NULL,
  `drain_out_period` varchar(255) DEFAULT NULL,
  `line_distance` varchar(255) DEFAULT NULL,
  `plant_distance` varchar(255) DEFAULT NULL,
  `planting_date` datetime DEFAULT NULL,
  `plant_age` int(11) DEFAULT NULL,
  `defoilation_date` datetime DEFAULT NULL,
  `irrigation_date` datetime DEFAULT NULL,
  `irrigation_type` int(11) DEFAULT NULL,
  `lateral_type` int(11) DEFAULT NULL,
  `filterartion_system` int(11) DEFAULT NULL,
  `mulching_method` int(11) DEFAULT NULL,
  `firtigation_equipments` int(11) DEFAULT NULL,
  `water_source` int(11) DEFAULT NULL,
  `soil_details` text,
  `water_details` text,
  `soil_test_report` varchar(255) DEFAULT NULL,
  `water_test_report` varchar(255) DEFAULT NULL,
  `prelevant_diseases` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer_plot_details`
--

INSERT INTO `farmer_plot_details` (`id`, `farm_id`, `plot_area`, `crop_name`, `crop_type`, `variety_type`, `crop_grown_area`, `plot_numbers`, `soil_type`, `water_capacity`, `drain_out_period`, `line_distance`, `plant_distance`, `planting_date`, `plant_age`, `defoilation_date`, `irrigation_date`, `irrigation_type`, `lateral_type`, `filterartion_system`, `mulching_method`, `firtigation_equipments`, `water_source`, `soil_details`, `water_details`, `soil_test_report`, `water_test_report`, `prelevant_diseases`) VALUES
(1, 30, '1254', 'crop', 2, 2, 'groth', 12, NULL, '5245', '524', '1', '1', '2018-12-01 00:00:00', NULL, '2018-12-01 00:00:00', '2018-12-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 'xcvx', 'xcvx', '30_2018-12-06_soil.jpg', '30_2018-12-06_water.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `farmer_profile`
--

CREATE TABLE IF NOT EXISTS `farmer_profile` (
  `farmer_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `language` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` tinyint(3) DEFAULT NULL,
  `birth_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('1','0') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '1 - male,0-female',
  `aadhar_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `PAN_no` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `village` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `home_address` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fcm_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `is_registered` int(11) DEFAULT NULL,
  `mobile_no` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `whatsapp_no` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `farmer_profile`
--

INSERT INTO `farmer_profile` (`farmer_id`, `user_id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `first_name`, `middle_name`, `last_name`, `language`, `age`, `birth_date`, `gender`, `aadhar_no`, `PAN_no`, `state`, `district`, `city`, `village`, `mobile_number`, `image`, `home_address`, `profile_pic`, `fcm_id`, `status`, `created_at`, `updated_at`, `is_registered`, `mobile_no`, `whatsapp_no`, `created_dt`, `created_by`) VALUES
(1, 76, '', '', '', NULL, '', 'Rajesh', 'R', 'nalla', 'E', NULL, '2010-02-09', '', '', NULL, '', NULL, NULL, NULL, '', '', 'Pune', '2018-12-06_440244.jpg', '', 10, 0, 0, 1, '8241365987', '8241365987', '2018-12-06 00:00:00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `farms_map`
--

CREATE TABLE IF NOT EXISTS `farms_map` (
  `farms_map_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `farm_details`
--

CREATE TABLE IF NOT EXISTS `farm_details` (
  `farm_id` int(11) NOT NULL,
  `farm_name` varchar(100) NOT NULL,
  `elevation_farm_location` varchar(100) DEFAULT NULL,
  `village` tinyint(5) NOT NULL,
  `mandal` tinyint(5) NOT NULL,
  `district` tinyint(5) NOT NULL,
  `state` tinyint(5) NOT NULL,
  `survey_number` varchar(20) NOT NULL,
  `total_area` int(10) NOT NULL,
  `area_unit` varchar(5) NOT NULL,
  `area_of_plot` int(5) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `farm_image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `farm_details`
--

INSERT INTO `farm_details` (`farm_id`, `farm_name`, `elevation_farm_location`, `village`, `mandal`, `district`, `state`, `survey_number`, `total_area`, `area_unit`, `area_of_plot`, `farmer_id`, `farm_image`) VALUES
(1, 'ss', '8', 3, 3, 3, 2, '12', 232, 'm', 666, 19, ''),
(2, 'Test Four', '12', 1, 1, 1, 1, '123/45/B/44', 232, 'm', 666, 20, ''),
(3, 's9', '8', 1, 1, 1, 1, '123/45/B/41', 555, 'm', 55, 30, ''),
(4, 's11', '4', 1, 1, 1, 1, '123/45/B/64', 555, 'm', 33, 31, ''),
(5, 's56', '5', 4, 4, 4, 2, '123/45/B/59', 337, 'm', 33, 32, ''),
(6, 'Solapur', '0', 1, 1, 1, 1, '86', 1100, '10', 10, 33, ''),
(7, 'Charlie1 Farm', '10', 1, 1, 1, 1, '86/2', 2, '2', 2, 34, ''),
(8, 'ss', '4', 3, 3, 3, 2, '123/56/B/6', 123, 'm', 23, 19, ''),
(9, 'Charlie1 Farm', '10', 1, 1, 1, 1, '86', 10, '10', 10, 22, ''),
(10, 'test farm', '0', 1, 1, 1, 1, '123', 3, '5', 6, 24, ''),
(11, 'TESt', '0', 1, 1, 1, 1, '123', 2, 'arces', 1300, 25, ''),
(12, 'my farm', '0', 1, 1, 1, 1, '123', 11, '3', 100, 56, ''),
(13, 'ss', '7', 1, 1, 1, 1, '123/45/B/52', 337, 'm', 55, 75, ''),
(14, 'consfarmer', '10', 1, 1, 1, 1, '86', 10, '10', 10, 78, ''),
(15, 'FarmerAdmin Farm', '10', 1, 1, 1, 1, '86', 10, '10', 10, 79, ''),
(16, 'EA farmer', '10', 3, 3, 3, 2, '86', 10, '10', 10, 81, ''),
(17, 'Farmer2 Admin', '1', 3, 3, 3, 2, '86', 10, '10', 10, 82, ''),
(18, 'Farmer3', '10', 1, 1, 1, 1, '86', 10, '10', 10, 87, ''),
(19, 'NewFarmer', '10', 1, 1, 1, 1, '86', 10, '10', 10, 90, ''),
(20, 'suhelsub', '10', 1, 1, 1, 1, '86', 10, '10', 10, 92, ''),
(21, 'wakadi', '0', 1, 1, 1, 1, '121121', 12, '121', 12121, 93, ''),
(22, 'sdfsfsd', '0', 1, 1, 1, 1, '34324', 342, '3424', 3242, 95, ''),
(23, '2542', '2452', 2, 2, 2, 1, '245', 435, '345', 453, 95, ''),
(24, 'Farm1', '0', 1, 1, 1, 1, '241', 2178, 'ft', 0, 19, ''),
(25, 'Farm1', '0', 1, 1, 1, 1, '241', 2178, 'ft', 0, 19, ''),
(26, 'Farms', '260', 2, 2, 2, 1, '241', 2278, 'ft', 2278, 19, ''),
(27, 'Farmer 112', '28', 1, 1, 1, 1, '112/456/8', 112, 'm', 62, 97, ''),
(28, 'farmer21220182', '1', 1, 1, 1, 1, '112/456/7890', 116, 'cm', 56, 98, ''),
(29, 'CharlieFarmer Farm', '18', 1, 1, 1, 1, '86', 10, '10', 10, 99, ''),
(30, 'Rajesh Farm', '123', 3, 3, 3, 2, '86', 1355, '1', 0, 1, NULL),
(31, 'Rajesh Farm2', '123', 3, 3, 3, 2, '86', 1355, '1', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forum_answers`
--

CREATE TABLE IF NOT EXISTS `forum_answers` (
  `id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_approve` enum('inactive','active') NOT NULL DEFAULT 'inactive',
  `ans_on` datetime NOT NULL,
  `correct_answer` enum('0','1') NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forum_answers`
--

INSERT INTO `forum_answers` (`id`, `ques_id`, `answer`, `user_id`, `admin_approve`, `ans_on`, `correct_answer`, `type`) VALUES
(1, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'active', '2018-08-02 07:52:22', '0', 1),
(2, 2, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing', 57, 'active', '2018-08-02 07:53:50', '0', 0),
(3, 2, 'hi', 57, 'active', '2018-08-02 07:55:01', '0', 0),
(4, 3, 'yes', 1, 'active', '2018-11-12 10:18:02', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forum_answer_files`
--

CREATE TABLE IF NOT EXISTS `forum_answer_files` (
  `forum_answer_files_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL COMMENT 'Foreign key of forum_questions table',
  `ansr_id` int(11) NOT NULL COMMENT 'Foreign key of forum_answers table',
  `file_path` varchar(200) NOT NULL,
  `uploaded_by` int(11) NOT NULL COMMENT 'user_id who have uploaded this file',
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_answer_files`
--

INSERT INTO `forum_answer_files` (`forum_answer_files_id`, `ques_id`, `ansr_id`, `file_path`, `uploaded_by`, `uploaded_on`) VALUES
(1, 2, 1, 'drag-text-arrow.png', 1, '2018-08-02 07:52:22'),
(2, 2, 1, 'drag-text-arrowpb.png', 1, '2018-08-02 07:52:23'),
(3, 2, 1, 'email.png', 1, '2018-08-02 07:52:23'),
(4, 2, 2, 'Barbie (copy 01).pdf', 57, '2018-08-02 07:53:50'),
(5, 2, 3, 'tr-logo-symbol.png', 57, '2018-08-02 07:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `forum_questions`
--

CREATE TABLE IF NOT EXISTS `forum_questions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `asked_on` datetime NOT NULL,
  `admin_approve` enum('inactive','active') NOT NULL DEFAULT 'inactive',
  `privacy` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=>private,1=>public',
  `added_to_faq` tinyint(1) NOT NULL COMMENT '0->removed from faq,1->added to faq',
  `type` tinyint(1) NOT NULL COMMENT '0-unread,1-read'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `forum_questions`
--

INSERT INTO `forum_questions` (`id`, `user_id`, `question`, `asked_on`, `admin_approve`, `privacy`, `added_to_faq`, `type`) VALUES
(1, 57, 'adsa', '2018-03-09 11:43:38', 'inactive', 0, 0, 0),
(2, 57, 'What is Lorem Ipsum?', '2018-08-02 07:51:28', 'active', 0, 0, 1),
(3, 57, 'Ok?', '2018-11-12 10:16:39', 'active', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forum_question_files`
--

CREATE TABLE IF NOT EXISTS `forum_question_files` (
  `forum_question_files_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL COMMENT 'Foreign key of forum_questions table',
  `file_path` varchar(200) NOT NULL,
  `uploaded_by` int(11) NOT NULL COMMENT 'user_id who have uploaded this file',
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_question_files`
--

INSERT INTO `forum_question_files` (`forum_question_files_id`, `ques_id`, `file_path`, `uploaded_by`, `uploaded_on`) VALUES
(1, 2, 'Barbie (copy 01).pdf', 57, '2018-08-02 07:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `irrigation_type`
--

CREATE TABLE IF NOT EXISTS `irrigation_type` (
  `irrigation_type_id` int(11) NOT NULL,
  `irrigation_type_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mandal`
--

CREATE TABLE IF NOT EXISTS `mandal` (
  `mandal_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mandal`
--

INSERT INTO `mandal` (`mandal_id`, `district_id`, `name`) VALUES
(1, 1, 'Haweli'),
(2, 2, 'Maval'),
(3, 3, 'Bhopal'),
(4, 4, 'Indore');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1538531591),
('m130524_201442_init', 1538531597);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `modules_id` int(11) NOT NULL,
  `module_name` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`modules_id`, `module_name`, `created_on`) VALUES
(1, 'Role', '0000-00-00 00:00:00'),
(2, 'Alert', '2018-10-19 16:28:26'),
(3, 'Schedules', '2018-10-19 16:29:13'),
(4, 'Expert Advice', '2018-10-19 16:31:01'),
(5, 'SMS Management', '2018-10-19 16:31:44'),
(6, 'Crops', '2018-10-19 16:31:57'),
(7, 'User Management', '2018-10-19 16:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `mulching`
--

CREATE TABLE IF NOT EXISTS `mulching` (
  `mulching_id` int(11) NOT NULL,
  `paper_width` decimal(10,2) NOT NULL,
  `paper_height` decimal(10,2) NOT NULL,
  `paper_thikness` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymet_history`
--

CREATE TABLE IF NOT EXISTS `paymet_history` (
  `paymet_history_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `payment_reference_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `consultant_id` int(11) NOT NULL,
  `paid_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` decimal(10,2) NOT NULL,
  `exp_date` datetime NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `payment_status` int(2) NOT NULL DEFAULT '0' COMMENT '0-Unpaid ;1-Paid'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `planting_method`
--

CREATE TABLE IF NOT EXISTS `planting_method` (
  `planting_method_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `planting_method_name` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planting_method`
--

INSERT INTO `planting_method` (`planting_method_id`, `crop_id`, `planting_method_name`) VALUES
(1, 2, 'Test1'),
(2, 2, 'Test2');

-- --------------------------------------------------------

--
-- Table structure for table `plot`
--

CREATE TABLE IF NOT EXISTS `plot` (
  `plot_id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL,
  `plot_name` varchar(500) NOT NULL,
  `plot_area` varchar(100) NOT NULL,
  `number_of_valves` tinyint(3) NOT NULL,
  `number_of_plants` int(11) DEFAULT NULL,
  `plot_planted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `planting_method` varchar(100) NOT NULL,
  `expected_yield_per_plant` varchar(100) NOT NULL,
  `total_expected_yield` varchar(100) NOT NULL,
  `defoliation_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `first_water_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `water_liters` int(11) NOT NULL,
  `mulching_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plot`
--

INSERT INTO `plot` (`plot_id`, `farm_id`, `plot_name`, `plot_area`, `number_of_valves`, `number_of_plants`, `plot_planted_date`, `planting_method`, `expected_yield_per_plant`, `total_expected_yield`, `defoliation_date`, `first_water_date`, `water_liters`, `mulching_date`) VALUES
(1, 26, 'plot 1', '3000', 2, 1000, '2018-09-01 00:00:00', 'Sowing', '3 bangs', '3 bags', '2018-11-30 00:00:00', '2018-09-02 00:00:00', 500, '0000-00-00 00:00:00'),
(2, 26, 'plot 1', '3000', 3, 1000, '2018-09-01 00:00:00', 'Sowing', '3 bags', '3 bags', '2018-11-30 00:00:00', '2018-09-02 00:00:00', 500, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `plot_disease`
--

CREATE TABLE IF NOT EXISTS `plot_disease` (
  `plot_disease_id` int(11) NOT NULL,
  `plot_id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plot_disease`
--

INSERT INTO `plot_disease` (`plot_disease_id`, `plot_id`, `disease_id`) VALUES
(8, 0, 0),
(9, 1, 0),
(18, 2, 3),
(17, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `plot_irrigation_datails`
--

CREATE TABLE IF NOT EXISTS `plot_irrigation_datails` (
  `plot_irrigation_datails_id` int(11) NOT NULL,
  `irrigation_type_id` int(11) NOT NULL,
  `plot_id` int(11) NOT NULL,
  `dripping_method_id` int(11) NOT NULL,
  `water_filter_id` int(11) NOT NULL,
  `number_of_laterals` int(11) NOT NULL,
  `dripping_spacing` varchar(100) NOT NULL,
  `dripper_discharge` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` smallint(6) NOT NULL,
  `role_name` varchar(50) NOT NULL COMMENT 'role name',
  `status` enum('0','1') NOT NULL COMMENT 'status of the role',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `status`, `created_on`, `updated_on`) VALUES
(1, 'Admin', '1', '2018-10-21 07:42:15', '0000-00-00 00:00:00'),
(2, 'Consultant', '1', '2018-10-21 07:44:04', '0000-00-00 00:00:00'),
(3, 'Sub Consultant', '1', '2018-10-27 18:49:36', '0000-00-00 00:00:00'),
(4, 'Agent', '1', '2018-10-28 06:41:21', '0000-00-00 00:00:00'),
(5, 'Sub Consultant', '1', '2018-11-02 17:46:09', '0000-00-00 00:00:00'),
(6, 'farmer', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'EA', '1', '2018-11-10 10:35:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_modules`
--

CREATE TABLE IF NOT EXISTS `role_modules` (
  `role_module_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL COMMENT 'id from module table',
  `role_id` int(11) NOT NULL COMMENT 'id from role table',
  `status` enum('0','1') NOT NULL COMMENT '0 - inactive ,1 - active',
  `created_by` int(11) NOT NULL COMMENT 'creators id',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_modules`
--

INSERT INTO `role_modules` (`role_module_id`, `module_id`, `role_id`, `status`, `created_by`, `created_on`) VALUES
(1, 1, 1, '1', 2, '2018-10-21 07:42:15'),
(2, 2, 1, '1', 2, '2018-10-21 07:42:15'),
(3, 3, 1, '1', 2, '2018-10-21 07:42:15'),
(4, 4, 1, '1', 2, '2018-10-21 07:42:15'),
(5, 5, 1, '1', 2, '2018-10-21 07:42:16'),
(6, 6, 1, '1', 2, '2018-10-21 07:42:16'),
(7, 7, 1, '1', 2, '2018-10-21 07:42:16'),
(8, 2, 2, '1', 2, '2018-10-21 07:44:04'),
(9, 3, 2, '1', 2, '2018-10-21 07:44:04'),
(10, 4, 2, '1', 2, '2018-10-21 07:44:04'),
(11, 6, 2, '1', 2, '2018-10-21 07:44:04'),
(12, 2, 4, '1', 2, '2018-10-27 18:49:45'),
(13, 4, 4, '1', 2, '2018-10-27 18:49:45'),
(14, 2, 5, '1', 2, '2018-10-27 18:51:47'),
(15, 3, 5, '1', 2, '2018-10-27 18:51:47'),
(16, 1, 6, '1', 2, '2018-10-28 05:15:40'),
(17, 2, 6, '1', 2, '2018-10-28 05:15:40'),
(18, 3, 6, '1', 2, '2018-10-28 05:15:40'),
(19, 3, 4, '1', 2, '2018-10-28 06:41:21'),
(20, 5, 4, '1', 2, '2018-10-28 06:41:21'),
(21, 1, 5, '1', 2, '2018-11-02 17:46:09'),
(22, 3, 5, '1', 2, '2018-11-02 17:46:09'),
(23, 4, 5, '1', 2, '2018-11-02 17:46:09'),
(24, 4, 6, '1', 2, '2018-11-10 10:18:03'),
(25, 4, 7, '1', 2, '2018-11-10 10:35:13'),
(26, 1, 8, '1', 6, '2018-11-10 14:00:49'),
(27, 2, 8, '1', 6, '2018-11-10 14:00:49'),
(28, 4, 8, '1', 6, '2018-11-10 14:00:49'),
(29, 1, 16, '1', 6, '2018-11-25 10:16:36'),
(30, 2, 16, '1', 6, '2018-11-25 10:16:36'),
(31, 3, 16, '1', 6, '2018-11-25 10:16:36'),
(32, 4, 16, '1', 6, '2018-11-25 10:16:36'),
(33, 2, 17, '1', 6, '2018-11-25 10:21:00'),
(34, 3, 17, '1', 6, '2018-11-25 10:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
  `sched_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `schedule_inst` text NOT NULL,
  `ceated_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`sched_id`, `crop_id`, `schedule_inst`, `ceated_on`, `updated_on`) VALUES
(1, 1, 'TEST', '2018-10-18 13:05:02', '2018-10-18 13:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `sms_management`
--

CREATE TABLE IF NOT EXISTS `sms_management` (
  `sms_mng_id` int(11) NOT NULL,
  `sms_gateway_name` varchar(100) NOT NULL,
  `sms_gateway_security` varchar(100) DEFAULT NULL COMMENT 'gateway password',
  `sms_gateway_key` varchar(100) DEFAULT NULL COMMENT 'gateway key',
  `sms_gateway_url` varchar(500) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0 - inactive, 1 - active',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_management`
--

INSERT INTO `sms_management` (`sms_mng_id`, `sms_gateway_name`, `sms_gateway_security`, `sms_gateway_key`, `sms_gateway_url`, `status`, `created_on`, `updated_on`) VALUES
(1, 'AgriAcademia', 'agritrans', 'Sai@9767633777', 'https://alerts.solutionsinfini.com/members/login', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'jhj', 'adfsd', 'sdfs', 'dsfd', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'sdfsf', 'gdg', 'sfsfs', 'ggsdf', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'scczcc', 'zcxzcc', 'zxczczxc', 'zzxczx', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `soil_details`
--

CREATE TABLE IF NOT EXISTS `soil_details` (
  `soil_details_id` int(11) NOT NULL,
  `soil_type_id` int(11) NOT NULL,
  `soil_test` varchar(100) NOT NULL,
  `pH` decimal(10,2) NOT NULL,
  `ele_conductivity` varchar(100) NOT NULL,
  `calcium_carbonate` varchar(100) NOT NULL,
  `organic_carbon` varchar(100) NOT NULL,
  `sodium` varchar(100) NOT NULL,
  `water_holding_capacity` varchar(100) NOT NULL,
  `nitrogen` varchar(100) NOT NULL,
  `phosphours` varchar(100) NOT NULL,
  `potassium` varchar(100) NOT NULL,
  `calcium` varchar(100) NOT NULL,
  `magnesium` varchar(100) NOT NULL,
  `sulphur` varchar(100) NOT NULL,
  `ferrouts` varchar(100) NOT NULL,
  `manganese` varchar(100) NOT NULL,
  `zinc` varchar(100) NOT NULL,
  `coppor` varchar(100) NOT NULL,
  `boron` varchar(100) NOT NULL,
  `molybdenum` varchar(100) NOT NULL,
  `carbonate` varchar(100) NOT NULL,
  `bi_carbonate` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soil_report`
--

CREATE TABLE IF NOT EXISTS `soil_report` (
  `soil_report_id` int(11) NOT NULL,
  `soil_details_id` int(11) NOT NULL,
  `soil_image` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soil_type`
--

CREATE TABLE IF NOT EXISTS `soil_type` (
  `soil_type_id` int(11) NOT NULL,
  `soil_type_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `name`) VALUES
(1, 'MAHARASHTRA'),
(2, 'MADHYA PRADESH');

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE IF NOT EXISTS `symptoms` (
  `symptoms_id` int(11) NOT NULL,
  `symptoms_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `symptoms_advice`
--

CREATE TABLE IF NOT EXISTS `symptoms_advice` (
  `symptoms_advice_id` int(11) NOT NULL,
  `symptoms_id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `plot_id` int(11) NOT NULL,
  `symptoms_desc` varchar(100) NOT NULL,
  `symptoms_rase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locations`
--

CREATE TABLE IF NOT EXISTS `tbl_locations` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_locations`
--

INSERT INTO `tbl_locations` (`id`, `type`, `parent_id`, `name`, `status`) VALUES
(1, 1, NULL, 'Maharashtra', 1),
(2, 2, 1, 'Sangli', 1),
(3, 3, 2, 'Kadegaon', 1),
(4, 4, 3, 'Hingongaon BK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `age` tinyint(3) DEFAULT NULL,
  `birth_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('1','0') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '1 - male,0-female',
  `aadhar_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `PAN_no` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `village` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `home_address` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fcm_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `first_name`, `middle_name`, `last_name`, `age`, `birth_date`, `gender`, `aadhar_no`, `PAN_no`, `state`, `district`, `city`, `village`, `mobile_number`, `image`, `home_address`, `profile_pic`, `fcm_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 'suhel', '7_wlxEJGG4ZtDNrJDzgqFh4jAXoy2hn3', '$2y$13$GziOmaIXMXj2hG/xoqscEuvSqIgjCuD8sQMF313Gqlz646pWTbaT.', NULL, 'shaikhsuhel03@gmail.com', '', NULL, '', NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, '', 1, 1543849639, 1543849639),
(16, 'suheltet', '5yVEPtsc4W6I8b3xgmD7UbXA0IeJMgp6', '$2y$13$sojAihhDKQPlvFfE23Ez1umtgHtV0MC8pKn5lVrbV1wjrEgo3.NNm', NULL, '', 'Suhel', NULL, 'Shaikh', NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, '', 10, 1541831945, 1541831945),
(76, 'Consultant', 'lr7FFp_CToCarFt9fLf-EnYmMwUQ1fFA', '$2y$13$4e2ffdapX95o20Cr7.uOBuzfA7sDdGlacDrnU.YVxwxtSO2uiV2ju', NULL, 'Consultant@example.com', 'Consultant1', NULL, 'Consultant1', 24, NULL, '1', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, '', 10, 1543162471, 1543162471),
(77, 'Kiran123', '2vxBnMaUjUMNsPsfUJxtKLGZFzgJOaJ4', '$2y$13$1WkR3bWWXh5G6q8p7nt0feHxrDE.5mtadNIiSHgatPiQ.cMbgJfZy', NULL, 'kiran.gaikwad27@gmail.com', 'Kiran', 'Krishna', 'Gaikwad', NULL, '1989-07-02', '1', 'ABCDEFGH', '1234567890', 'Maharashtra', 'Pune', 'Pune', 'Kharadi', '9623552902', '', 'Chandanagr', '/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsK\nCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQU\nFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFB', '', 10, 0, 0),
(78, 'FarmerCons', 'chY3zfY4tbqL5U-Vv5fUT3oZF2samuIc', '$2y$13$wC2jP5UBJzi2Dzj4rxgD4OcaZh4f3YZEGIvcsvngwwv/.fC9YZs06', NULL, 'Farmer@example.com', 'Farmer', NULL, 'Farmer', 2, '07-08-2018', '1', '', NULL, '', NULL, NULL, NULL, '8237172133', '', NULL, NULL, '', 10, 1543163640, 1543163640),
(79, 'FarmerAdmin', 'mRbJ2AqRLz1aG1A-PO2ILQaf9meuWfTq', '$2y$13$ymYHbVzUIoryhz7mWsCiqu0YoQgzSmTAPeIrnW5fp8s.IA.laFt6m', NULL, 'Farmer1@example.com', 'Farmer1', NULL, 'Farmer1', 2, '01-11-2018', '1', '', NULL, '', NULL, NULL, NULL, '9175887323', '', NULL, NULL, '', 10, 1543164265, 1543164265),
(80, 'suhelEA', '2p1SD4pyTKhyBc4xgBRM4jbP4Eapv17s', '$2y$13$YIOoq/0X9bSnLcWmtlU.fuv7WmgMQWwsLHKYSwgHXgjKG45LyKH7C', NULL, 'EA@example.com', 'lEA', NULL, 'lEA', 8, NULL, '1', '', NULL, '', NULL, NULL, NULL, '8888888888', '', NULL, NULL, '', 10, 1543165813, 1543165813),
(81, 'EAfarmer', 'gEam-QK8LWY9vxKYQhHWFliQI56XoSFn', '$2y$13$0CgrgXZGqS/AVPkut9ibW.LxBvwr2npQFCz5CNChTdBOfpuQdGNkO', NULL, 'EAfarmer@example.com', 'EAfarmer', NULL, 'EAfarmer', 18, '03-01-2000', '1', '', NULL, '', NULL, NULL, NULL, '8886594721', '', NULL, NULL, '', 10, 1543165913, 1543165913),
(82, 'Farmer2Admin', 'h10q3dcwPIb-hJnCJcAvit92uQfsVBdL', '$2y$13$jftp1K4dKMRL7l2492iPx.Ii1ieXOL1bgbY0YVOlmC5MxQKvsBvse', NULL, 'Farmer2@example.com', 'Farmer2', NULL, 'Farmer2', 8, '08-06-2010', '1', '', NULL, '', NULL, NULL, NULL, '8236479563', '', NULL, NULL, '', 10, 1543168593, 1543168593),
(83, 'farmerCnslt3', 'UMNoWvs9Ln-sz-7ok9cE_koJ13vgu5bU', '$2y$13$2I2ewCOZqwTcr2vVzGbI4e9EWTaPJAncLpKahBj2GcsJ1cpajWR7u', NULL, 'farmerCnslt3@example.com', 'farmerCnslt3', NULL, 'farmerCnslt3', 8, NULL, '1', '', NULL, '', NULL, NULL, NULL, '1234567890', '', NULL, NULL, '', 10, 1543170981, 1543170981),
(84, 'farmer3Cons', 'G_9C9rKfArJ1ShCwzR2ZZwqqOZVY6nee', '$2y$13$SUQxs9OBBiLO/YaYeT2EHemNqgoFQUxyglbdiKHgF/lZwp3JS1bZC', NULL, 'farmer3@example.com', 'farmer3', NULL, 'farmer3', 24, NULL, '1', '', NULL, '', NULL, NULL, NULL, '8237172134', '', NULL, NULL, '', 10, 1543171301, 1543171301),
(85, 'Djqloud', 'm_IQb1PfGkwHL9jihkZczRBjJax3AbMr', '$2y$13$jwK5kZ3WtBNtiBXFxvwOjeaAWTkdwPJ/Q/2gxI1j5.xuLOFBhuCku', NULL, 'dj@qloud.in', 'Dhananjay', NULL, 'Waghchaure', NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, '8238040052', '', NULL, NULL, '', 10, 0, 0),
(86, 'Djqloud123', 'Sg1H8oVjvfd4BuSmUpSBrgw6tmbi_yhu', '$2y$13$1/53.XaUiVUKBFOHsZyJluDe2kjd8kquJXr5ezaqMVtlA7JLBFwAS', NULL, 'dwaghchaure9@gmail.com', 'Dhananjay', NULL, 'Waghchaure', NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, '9860040052', '', NULL, NULL, '', 10, 0, 0),
(87, 'farmer3', 'wi1rgLJMj9qMn6eB_iXrjiIscWQHSn9K', '$2y$13$djvKh1HyPPy2jD8t..M/UubVwXQYfIRRSfE7ZmN.utwC/MM.hCVpW', NULL, 'Farmer16@example.com', 'farmer3', NULL, 'farmer3', 13, '01-11-2005', '1', '', NULL, '', NULL, NULL, NULL, '8236479576', '', NULL, NULL, '', 10, 1543173130, 1543173130),
(88, 'TestUser', 'XMYVdbIsBwcGpLWPSMf9hLB87jcmmywG', '$2y$13$G83uoShBw/NibapEJ6j.yeQx2kRtRX/WNTT10416ov2s1olG6l8S2', NULL, 'test@gmail.com', 'Test', NULL, 'Test', NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, '9999999999', '', NULL, NULL, '', 10, 0, 0),
(89, 'Ssssss', '-LiMrl9ghkdPuorsb_HjUri6LXHn4ILW', '$2y$13$FWDMJCaipmO5/iUi1pH1o.SjMhzFhlbcSbcW5KgzUc./kRs/vA4He', NULL, 'qloud.solutions@gmail.com', 'Sumit', 'S', 'Vikhe', NULL, '2000-08-10', '1', 'DUIMBD', 'CJJNKKSAA', 'Maharashtra', 'Cjj', 'Cjjj', 'Gjkkk', '9960064999', '', 'Cjkkkkk', '/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsK\nCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQU\nFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFB', '', 10, 0, 0),
(90, 'NewFarmer', 'Uk-1RHqIc6tG7sno1jDh0lpPKGFLoxK3', '$2y$13$clGGje.GwL741oxNIS290OEerfR6J.j2u/bM/9tMev5ejk7IgmQmO', NULL, 'NewFarmer@example.com', 'NewFarmer', NULL, 'NewFarmer', 18, '07-11-2000', '1', '', NULL, '', NULL, NULL, NULL, '8236479598', '', NULL, NULL, '', 10, 1543173902, 1543173902),
(91, 'suhelConsultant', 'oycr8bSV0s5_sSGhW80rTmq12ZZbip0g', '$2y$13$9101hGWtlc/1Wy7pvNvW7Ob74eB.wsypTcR7yZohpE7nP/5YcudBm', NULL, 'suhailshaikh14@emaple.com', 'suhelConsultant', NULL, 'sss', 23, NULL, '1', '', NULL, '', NULL, NULL, NULL, '8888887889', '', NULL, NULL, '', 10, 1543174597, 1543174597),
(92, 'suhelsub', 'tXsD9tlUMaiT337YPX-RrIiGulODWhYu', '$2y$13$wLFxgQ/f8zWqxKPp.rchpuy.iZr/LERIIIs813dprXQwqG0nVnpGG', NULL, 'Charlie@example.com', 'suhelsub', NULL, 'dd', 18, '01-11-2000', '1', '', NULL, '', NULL, NULL, NULL, '8236479576', '', NULL, NULL, '', 10, 1543174654, 1543174654),
(93, 'sUMIT678', 'XoBenTSXaR6_ijgNAp_M1_jKAEbJ9e7i', '$2y$13$.lV.LMu40HX52zSZxyopfukU7n3sK74IW8zvXV7EFlPaOD/50dDFu', NULL, 'qloud.solutions1@gmail.com', 'Sumit ASCS', NULL, 'Vikhe SCA', 0, '16-08-2017', '1', '', NULL, '', NULL, NULL, NULL, '9960064999', '', NULL, NULL, '', 10, 1543205804, 1543205804),
(94, 'Vinayak123', 'J8qj0A39pRmSqmpmfLG6RcufueL6YZMN', '$2y$13$wOKFqEiLD8AbwsfIWPAcg.MdQDuTMPPLq4HQs1F7/2o5Y7lhUPUqa', NULL, 'gg@gmal.com', 'Vinayak', NULL, 'Bhandari', 0, NULL, '1', '', NULL, '', NULL, NULL, NULL, '9960064999', '', NULL, NULL, '', 10, 1543207942, 1543207942),
(95, 'Farmer0001', 'w7K7IjIXJX4MmnbNVkuOZE7SRzvDHdLU', '$2y$13$qvoaQfwZM7w37YomRorbr.IvBf7qHJoFpGSaolZZM3bO.0m6FKzEm', NULL, 'sdsfsf@gmail.com', 'Farmer000001', NULL, 'Farmer121212', 2, '29-03-2016', '1', '', NULL, '', NULL, NULL, NULL, '909099090', '', NULL, NULL, '', 10, 1543208182, 1543208182),
(96, 'PankajM', 'jCUIhJexMkezpKyGIUfwusqSN4U83ySa', '$2y$13$djUTezcmQXq5PRGkMfTFRerEP.ke20qkDpGDU4o4AOvJw.8lakDYm', NULL, 'pankajmote@gmail.com', 'Pankaj', 'U', 'Mote', NULL, '1973-05-04', '1', 'HDJDJDJDJDJ', 'DJDJDJDJDK', 'Maharashtra', 'Ahmednagar', 'Rahata', 'Rahata', '9423865967', '', NULL, NULL, '', 10, 0, 0),
(97, 'Farmer1122018', 'iP2PvlS-ALYnJ4F4ee6f-92HiqPcGC9z', '$2y$13$sPv4lyiDqP806oadzcYhoeX11bqWBp1WH/tdvmLxkhfBAVeay8O/S', NULL, 'farmer01122018@example.com', 'Farmer', NULL, 'Farner112', 18, '17-10-2000', '1', '', NULL, '', NULL, NULL, NULL, '1234567890', '', NULL, NULL, '', 10, 1543643180, 1543643180),
(98, 'farmer11220181', 'r3dAafxx6SPuj9YPWBK_MuwXW7qjuyo_', '$2y$13$qxDucEL2ehhkf1WOlNr3DeUw5r66Eu5THWXZTohsBKgST2lU9Lh.y', NULL, 'farmer21220181@example.com', 'Farmer112', NULL, 'Farmer20182', 8, '29-06-2010', '1', '', NULL, '', NULL, NULL, NULL, '1234567890', '', NULL, NULL, '', 10, 1543644076, 1543644076),
(99, 'CharlieFarmer', 'Kyg_9kOlTZ7sCXFekyScJbnAoUnklfGA', '$2y$13$LSyprfbmaj3a9DMAK.x3gOvTbE.fkhlfydTalAGu.6aW4KZGbJe86', NULL, 'CharlieFarmer@example.com', 'CharlieFarmer', NULL, 'CharlieFarmer', 18, '01-02-2000', '1', '', NULL, '', NULL, NULL, NULL, '8236479333', '', NULL, NULL, '', 10, 1543679524, 1543679524);

-- --------------------------------------------------------

--
-- Table structure for table `user_relation`
--

CREATE TABLE IF NOT EXISTS `user_relation` (
  `relation_id` int(11) NOT NULL,
  `ea_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_relation`
--

INSERT INTO `user_relation` (`relation_id`, `ea_id`, `farmer_id`) VALUES
(1, 6, 7),
(2, 6, 8),
(3, 6, 9),
(4, 6, 10),
(5, 6, 13),
(6, 9, 19),
(7, 9, 20),
(8, 10, 21),
(9, 9, 22),
(10, 9, 23),
(11, 9, 24),
(12, 9, 25),
(13, 8, 26),
(14, 7, 52),
(15, 40, 56),
(17, 75, 75),
(18, 76, 78),
(19, 6, 79),
(20, 6, 77),
(21, 80, 81),
(22, 6, 82),
(23, 84, 87),
(24, 83, 90),
(25, 91, 92),
(26, 76, 88),
(27, 80, 93),
(28, 94, 95),
(29, 94, 85),
(30, 6, 97),
(31, 6, 98),
(32, 6, 99);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_id`, `role_id`) VALUES
(1, 6, 1),
(2, 7, 6),
(3, 8, 6),
(4, 9, 6),
(5, 10, 6),
(6, 13, 6),
(7, 15, 6),
(8, 17, 6),
(9, 19, 6),
(10, 20, 6),
(11, 21, 6),
(12, 22, 6),
(13, 23, 6),
(14, 24, 6),
(15, 25, 6),
(16, 26, 6),
(17, 40, 6),
(18, 41, 6),
(19, 52, 6),
(20, 56, 6),
(21, 61, 6),
(22, 66, 6),
(23, 0, 6),
(24, 0, 6),
(25, 73, 6),
(26, 74, 17),
(27, 75, 6),
(28, 76, 2),
(29, 77, 6),
(31, 78, 6),
(32, 79, 6),
(33, 80, 7),
(34, 81, 6),
(35, 82, 6),
(36, 83, 2),
(37, 84, 2),
(38, 85, 6),
(39, 86, 6),
(40, 87, 6),
(41, 88, 6),
(42, 89, 6),
(43, 90, 6),
(44, 91, 2),
(45, 92, 6),
(46, 93, 6),
(47, 94, 3),
(48, 95, 6),
(49, 96, 6),
(50, 97, 6),
(51, 98, 6),
(52, 99, 6);

-- --------------------------------------------------------

--
-- Table structure for table `valves_type`
--

CREATE TABLE IF NOT EXISTS `valves_type` (
  `valves_type_id` int(11) NOT NULL,
  `valves_type_name` varchar(100) NOT NULL,
  `valves_type_image` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `valves_type`
--

INSERT INTO `valves_type` (`valves_type_id`, `valves_type_name`, `valves_type_image`) VALUES
(1, 'Valve 1', ''),
(2, 'valve 2', '');

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE IF NOT EXISTS `village` (
  `village_id` int(11) NOT NULL,
  `mandal_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`village_id`, `mandal_id`, `name`) VALUES
(1, 1, 'Test 1'),
(2, 2, 'Test 2'),
(3, 3, 'test 3'),
(4, 4, 'test 4');

-- --------------------------------------------------------

--
-- Table structure for table `water_filter`
--

CREATE TABLE IF NOT EXISTS `water_filter` (
  `water_filter_id` int(11) NOT NULL,
  `water_filter_name` varchar(100) NOT NULL,
  `water_filter_image` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `water_test_details`
--

CREATE TABLE IF NOT EXISTS `water_test_details` (
  `water_test_details_id` int(11) NOT NULL,
  `plot_id` int(11) NOT NULL,
  `water_resource` varchar(100) NOT NULL,
  `water_irrigate_spray` varchar(100) NOT NULL,
  `pH` decimal(10,2) NOT NULL,
  `ele_conductivity` varchar(100) NOT NULL,
  `chloride` varchar(100) NOT NULL,
  `nitrate_nitrogen` varchar(100) NOT NULL,
  `carbonate` varchar(100) NOT NULL,
  `bi_carbonate` varchar(100) NOT NULL,
  `calcium` varchar(100) NOT NULL,
  `magnesium` varchar(100) NOT NULL,
  `sodium` varchar(100) NOT NULL,
  `potassium` varchar(100) NOT NULL,
  `mg_ca` varchar(100) NOT NULL,
  `s_a_r` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `water_test_report`
--

CREATE TABLE IF NOT EXISTS `water_test_report` (
  `water_test_report_id` int(11) NOT NULL,
  `water_test_details_id` int(11) NOT NULL,
  `water_test_report_image` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advice_details`
--
ALTER TABLE `advice_details`
  ADD PRIMARY KEY (`advice_details_id`);

--
-- Indexes for table `alert_master`
--
ALTER TABLE `alert_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`cms_page_id`);

--
-- Indexes for table `crops`
--
ALTER TABLE `crops`
  ADD PRIMARY KEY (`crop_id`);

--
-- Indexes for table `crop_details`
--
ALTER TABLE `crop_details`
  ADD PRIMARY KEY (`crop_detail_id`);

--
-- Indexes for table `crop_groth`
--
ALTER TABLE `crop_groth`
  ADD PRIMARY KEY (`crop_groth_id`);

--
-- Indexes for table `crop_type`
--
ALTER TABLE `crop_type`
  ADD PRIMARY KEY (`crop_type_id`);

--
-- Indexes for table `crop_variety`
--
ALTER TABLE `crop_variety`
  ADD PRIMARY KEY (`crop_variety_id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`disease_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `dripping_method`
--
ALTER TABLE `dripping_method`
  ADD PRIMARY KEY (`dripping_method_id`);

--
-- Indexes for table `ea_answers`
--
ALTER TABLE `ea_answers`
  ADD PRIMARY KEY (`ea_resp_id`),
  ADD KEY `ea_question_id` (`ea_question_id`),
  ADD KEY `ea_id` (`ea_id`);

--
-- Indexes for table `ea_questions`
--
ALTER TABLE `ea_questions`
  ADD PRIMARY KEY (`query_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ea_questions_symptoms`
--
ALTER TABLE `ea_questions_symptoms`
  ADD PRIMARY KEY (`ea_questions_symptoms_id`);

--
-- Indexes for table `farmer_call_details`
--
ALTER TABLE `farmer_call_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer_farm_details`
--
ALTER TABLE `farmer_farm_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer_personal_details`
--
ALTER TABLE `farmer_personal_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer_plot_details`
--
ALTER TABLE `farmer_plot_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer_profile`
--
ALTER TABLE `farmer_profile`
  ADD PRIMARY KEY (`farmer_id`);

--
-- Indexes for table `farms_map`
--
ALTER TABLE `farms_map`
  ADD PRIMARY KEY (`farms_map_id`);

--
-- Indexes for table `farm_details`
--
ALTER TABLE `farm_details`
  ADD PRIMARY KEY (`farm_id`);

--
-- Indexes for table `forum_answers`
--
ALTER TABLE `forum_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ques_id` (`ques_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `forum_answer_files`
--
ALTER TABLE `forum_answer_files`
  ADD PRIMARY KEY (`forum_answer_files_id`);

--
-- Indexes for table `forum_questions`
--
ALTER TABLE `forum_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `forum_question_files`
--
ALTER TABLE `forum_question_files`
  ADD PRIMARY KEY (`forum_question_files_id`);

--
-- Indexes for table `irrigation_type`
--
ALTER TABLE `irrigation_type`
  ADD PRIMARY KEY (`irrigation_type_id`);

--
-- Indexes for table `mandal`
--
ALTER TABLE `mandal`
  ADD PRIMARY KEY (`mandal_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`modules_id`);

--
-- Indexes for table `mulching`
--
ALTER TABLE `mulching`
  ADD PRIMARY KEY (`mulching_id`);

--
-- Indexes for table `paymet_history`
--
ALTER TABLE `paymet_history`
  ADD PRIMARY KEY (`paymet_history_id`);

--
-- Indexes for table `planting_method`
--
ALTER TABLE `planting_method`
  ADD PRIMARY KEY (`planting_method_id`);

--
-- Indexes for table `plot`
--
ALTER TABLE `plot`
  ADD PRIMARY KEY (`plot_id`);

--
-- Indexes for table `plot_disease`
--
ALTER TABLE `plot_disease`
  ADD PRIMARY KEY (`plot_disease_id`);

--
-- Indexes for table `plot_irrigation_datails`
--
ALTER TABLE `plot_irrigation_datails`
  ADD PRIMARY KEY (`plot_irrigation_datails_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_modules`
--
ALTER TABLE `role_modules`
  ADD PRIMARY KEY (`role_module_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`sched_id`),
  ADD KEY `crop_id` (`crop_id`);

--
-- Indexes for table `sms_management`
--
ALTER TABLE `sms_management`
  ADD PRIMARY KEY (`sms_mng_id`);

--
-- Indexes for table `soil_details`
--
ALTER TABLE `soil_details`
  ADD PRIMARY KEY (`soil_details_id`);

--
-- Indexes for table `soil_report`
--
ALTER TABLE `soil_report`
  ADD PRIMARY KEY (`soil_report_id`);

--
-- Indexes for table `soil_type`
--
ALTER TABLE `soil_type`
  ADD PRIMARY KEY (`soil_type_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`symptoms_id`);

--
-- Indexes for table `symptoms_advice`
--
ALTER TABLE `symptoms_advice`
  ADD PRIMARY KEY (`symptoms_advice_id`);

--
-- Indexes for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_relation`
--
ALTER TABLE `user_relation`
  ADD PRIMARY KEY (`relation_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- Indexes for table `valves_type`
--
ALTER TABLE `valves_type`
  ADD PRIMARY KEY (`valves_type_id`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`village_id`);

--
-- Indexes for table `water_filter`
--
ALTER TABLE `water_filter`
  ADD PRIMARY KEY (`water_filter_id`);

--
-- Indexes for table `water_test_details`
--
ALTER TABLE `water_test_details`
  ADD PRIMARY KEY (`water_test_details_id`);

--
-- Indexes for table `water_test_report`
--
ALTER TABLE `water_test_report`
  ADD PRIMARY KEY (`water_test_report_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advice_details`
--
ALTER TABLE `advice_details`
  MODIFY `advice_details_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alert_master`
--
ALTER TABLE `alert_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `cms_page_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `crops`
--
ALTER TABLE `crops`
  MODIFY `crop_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `crop_details`
--
ALTER TABLE `crop_details`
  MODIFY `crop_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `crop_groth`
--
ALTER TABLE `crop_groth`
  MODIFY `crop_groth_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `crop_type`
--
ALTER TABLE `crop_type`
  MODIFY `crop_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `crop_variety`
--
ALTER TABLE `crop_variety`
  MODIFY `crop_variety_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dripping_method`
--
ALTER TABLE `dripping_method`
  MODIFY `dripping_method_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ea_answers`
--
ALTER TABLE `ea_answers`
  MODIFY `ea_resp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ea_questions`
--
ALTER TABLE `ea_questions`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ea_questions_symptoms`
--
ALTER TABLE `ea_questions_symptoms`
  MODIFY `ea_questions_symptoms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `farmer_call_details`
--
ALTER TABLE `farmer_call_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `farmer_farm_details`
--
ALTER TABLE `farmer_farm_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `farmer_personal_details`
--
ALTER TABLE `farmer_personal_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `farmer_plot_details`
--
ALTER TABLE `farmer_plot_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `farmer_profile`
--
ALTER TABLE `farmer_profile`
  MODIFY `farmer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `farms_map`
--
ALTER TABLE `farms_map`
  MODIFY `farms_map_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `farm_details`
--
ALTER TABLE `farm_details`
  MODIFY `farm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `forum_answers`
--
ALTER TABLE `forum_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `forum_answer_files`
--
ALTER TABLE `forum_answer_files`
  MODIFY `forum_answer_files_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `forum_questions`
--
ALTER TABLE `forum_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `forum_question_files`
--
ALTER TABLE `forum_question_files`
  MODIFY `forum_question_files_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `irrigation_type`
--
ALTER TABLE `irrigation_type`
  MODIFY `irrigation_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mandal`
--
ALTER TABLE `mandal`
  MODIFY `mandal_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `modules_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mulching`
--
ALTER TABLE `mulching`
  MODIFY `mulching_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paymet_history`
--
ALTER TABLE `paymet_history`
  MODIFY `paymet_history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `planting_method`
--
ALTER TABLE `planting_method`
  MODIFY `planting_method_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `plot`
--
ALTER TABLE `plot`
  MODIFY `plot_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `plot_disease`
--
ALTER TABLE `plot_disease`
  MODIFY `plot_disease_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `plot_irrigation_datails`
--
ALTER TABLE `plot_irrigation_datails`
  MODIFY `plot_irrigation_datails_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `role_modules`
--
ALTER TABLE `role_modules`
  MODIFY `role_module_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sms_management`
--
ALTER TABLE `sms_management`
  MODIFY `sms_mng_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `soil_details`
--
ALTER TABLE `soil_details`
  MODIFY `soil_details_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `soil_report`
--
ALTER TABLE `soil_report`
  MODIFY `soil_report_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `soil_type`
--
ALTER TABLE `soil_type`
  MODIFY `soil_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `symptoms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `symptoms_advice`
--
ALTER TABLE `symptoms_advice`
  MODIFY `symptoms_advice_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `user_relation`
--
ALTER TABLE `user_relation`
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `valves_type`
--
ALTER TABLE `valves_type`
  MODIFY `valves_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `village`
--
ALTER TABLE `village`
  MODIFY `village_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `water_filter`
--
ALTER TABLE `water_filter`
  MODIFY `water_filter_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `water_test_details`
--
ALTER TABLE `water_test_details`
  MODIFY `water_test_details_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `water_test_report`
--
ALTER TABLE `water_test_report`
  MODIFY `water_test_report_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ea_answers`
--
ALTER TABLE `ea_answers`
  ADD CONSTRAINT `RA` FOREIGN KEY (`ea_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
