-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 08, 2022 at 05:20 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exconvict`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_centraljail`
--

DROP TABLE IF EXISTS `tbl_centraljail`;
CREATE TABLE IF NOT EXISTS `tbl_centraljail` (
  `centraljail_id` int(11) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) NOT NULL,
  `centraljail_name` varchar(50) NOT NULL,
  `centraljail_contactno` bigint(20) NOT NULL,
  `centraljail_email` varchar(30) NOT NULL,
  `centraljail_address` varchar(100) NOT NULL,
  `centraljail_webaddress` varchar(100) NOT NULL,
  `centraljail_password` varchar(20) NOT NULL,
  PRIMARY KEY (`centraljail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_centraljail`
--

INSERT INTO `tbl_centraljail` (`centraljail_id`, `place_id`, `centraljail_name`, `centraljail_contactno`, `centraljail_email`, `centraljail_address`, `centraljail_webaddress`, `centraljail_password`) VALUES
(1, 1, 'Centraljail', 9087564550, 'centraljail@gmail.com', 'Centraljail ', 'Centraljail ', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

DROP TABLE IF EXISTS `tbl_company`;
CREATE TABLE IF NOT EXISTS `tbl_company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_webaddress` varchar(100) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_contactno` bigint(20) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `company_logo` varchar(100) NOT NULL,
  `company_proof` varchar(100) NOT NULL,
  `company_password` varchar(20) NOT NULL,
  `company_status` int(11) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `place_id`, `company_name`, `company_webaddress`, `company_email`, `company_contactno`, `company_address`, `company_logo`, `company_proof`, `company_password`, `company_status`) VALUES
(1, 1, 'Company', 'Company', 'company@gmail.com', 9087563409, 'Company', 'images/img1.jfif', 'images/lavander.jfif', '12345678', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

DROP TABLE IF EXISTS `tbl_district`;
CREATE TABLE IF NOT EXISTS `tbl_district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(30) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'Idukki');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jailsuperintendent`
--

DROP TABLE IF EXISTS `tbl_jailsuperintendent`;
CREATE TABLE IF NOT EXISTS `tbl_jailsuperintendent` (
  `jailsuperintendent_id` int(11) NOT NULL AUTO_INCREMENT,
  `centraljail_id` int(11) NOT NULL,
  `jailsuperintendent_name` varchar(30) NOT NULL,
  `jailsuperintendent_gender` varchar(10) NOT NULL,
  `jailsuperintendent_email` varchar(30) NOT NULL,
  `jailsuperintendent_contactno` bigint(20) NOT NULL,
  `jailsuperintendent_qualification` varchar(50) NOT NULL,
  `jailsuperintendent_address` varchar(100) NOT NULL,
  `jailsuperintendent_photo` varchar(100) NOT NULL,
  PRIMARY KEY (`jailsuperintendent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobapply`
--

DROP TABLE IF EXISTS `tbl_jobapply`;
CREATE TABLE IF NOT EXISTS `tbl_jobapply` (
  `jobapply_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobvac_id` int(11) NOT NULL,
  `jobseeker_id` int(11) NOT NULL,
  `jobapplier_date` date NOT NULL,
  `jobapplier_status` int(11) NOT NULL,
  PRIMARY KEY (`jobapply_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobdetail`
--

DROP TABLE IF EXISTS `tbl_jobdetail`;
CREATE TABLE IF NOT EXISTS `tbl_jobdetail` (
  `jobdet_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `jobdet_name` varchar(50) NOT NULL,
  `jobdet_des` varchar(100) NOT NULL,
  PRIMARY KEY (`jobdet_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobseeker`
--

DROP TABLE IF EXISTS `tbl_jobseeker`;
CREATE TABLE IF NOT EXISTS `tbl_jobseeker` (
  `jobseeker_id` int(11) NOT NULL AUTO_INCREMENT,
  `prisoner_id` int(11) NOT NULL,
  `jobseeker_proof` varchar(100) NOT NULL,
  `jobseeker_photo` varchar(100) NOT NULL,
  `jobseeker_password` varchar(20) NOT NULL,
  `jobseeker_username` varchar(30) NOT NULL,
  `jobseeker_status` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  PRIMARY KEY (`jobseeker_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobvaccancy`
--

DROP TABLE IF EXISTS `tbl_jobvaccancy`;
CREATE TABLE IF NOT EXISTS `tbl_jobvaccancy` (
  `jobvac_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `jobdet_id` int(11) NOT NULL,
  `jobvac_nov` int(11) NOT NULL,
  `jobvac_lastdate` date NOT NULL,
  `jobvac_status` int(11) NOT NULL,
  PRIMARY KEY (`jobvac_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

DROP TABLE IF EXISTS `tbl_place`;
CREATE TABLE IF NOT EXISTS `tbl_place` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) NOT NULL,
  `place_name` varchar(30) NOT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `district_id`, `place_name`) VALUES
(1, 1, 'Vannappuram');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prisoner`
--

DROP TABLE IF EXISTS `tbl_prisoner`;
CREATE TABLE IF NOT EXISTS `tbl_prisoner` (
  `prisoner_id` int(11) NOT NULL AUTO_INCREMENT,
  `centraljail_id` int(11) NOT NULL,
  `prisoner_name` varchar(30) NOT NULL,
  `prisoner_gender` varchar(10) NOT NULL,
  `prisoner_address` varchar(100) NOT NULL,
  `prisoner_contactno` bigint(20) NOT NULL,
  `prisoner_emailid` varchar(30) NOT NULL,
  `prisoner_photo` varchar(100) NOT NULL,
  `prisoner_prisonercode` varchar(20) NOT NULL,
  `prisoner_crimedetails` varchar(200) NOT NULL,
  `prisoner_duration` int(11) NOT NULL,
  `prisoner_joindate` date NOT NULL,
  `prisoner_status` int(11) NOT NULL,
  PRIMARY KEY (`prisoner_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_photo` varchar(100) NOT NULL,
  `product_description` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productcategory`
--

DROP TABLE IF EXISTS `tbl_productcategory`;
CREATE TABLE IF NOT EXISTS `tbl_productcategory` (
  `productcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `productcategory_name` varchar(50) NOT NULL,
  PRIMARY KEY (`productcategory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_productcategory`
--

INSERT INTO `tbl_productcategory` (`productcategory_id`, `productcategory_name`) VALUES
(1, 'powder');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production`
--

DROP TABLE IF EXISTS `tbl_production`;
CREATE TABLE IF NOT EXISTS `tbl_production` (
  `production_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `centraljail_id` int(11) NOT NULL,
  `production_manufacturedate` date NOT NULL,
  `production_expirydate` date NOT NULL,
  `production_quantity` int(11) NOT NULL,
  PRIMARY KEY (`production_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productrate`
--

DROP TABLE IF EXISTS `tbl_productrate`;
CREATE TABLE IF NOT EXISTS `tbl_productrate` (
  `productrate_id` int(11) NOT NULL AUTO_INCREMENT,
  `centraljail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `productrate_rate` int(11) NOT NULL,
  `productrate_reorder` int(11) NOT NULL,
  PRIMARY KEY (`productrate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productstock`
--

DROP TABLE IF EXISTS `tbl_productstock`;
CREATE TABLE IF NOT EXISTS `tbl_productstock` (
  `productstock_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `centraljail_id` int(11) NOT NULL,
  `productstock_totalquantity` int(11) NOT NULL,
  PRIMARY KEY (`productstock_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

DROP TABLE IF EXISTS `tbl_shop`;
CREATE TABLE IF NOT EXISTS `tbl_shop` (
  `shop_id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(50) NOT NULL,
  `shop_email` varchar(30) NOT NULL,
  `shop_contactno` bigint(20) NOT NULL,
  `shop_place` varchar(30) NOT NULL,
  `shop_address` varchar(100) NOT NULL,
  `shop_logo` varchar(100) NOT NULL,
  `shop_licenceproof` varchar(100) NOT NULL,
  `shop_ownername` varchar(30) NOT NULL,
  `shop_password` varchar(20) NOT NULL,
  `shop_status` int(11) NOT NULL,
  PRIMARY KEY (`shop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `shop_name`, `shop_email`, `shop_contactno`, `shop_place`, `shop_address`, `shop_logo`, `shop_licenceproof`, `shop_ownername`, `shop_password`, `shop_status`) VALUES
(2, 'shop', 'shop@gmail.com', 9087654321, '1', 'shop', 'images/download.jfif', 'images/drop.jfif', 'cshop', '12345678', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shoppurchasedetails`
--

DROP TABLE IF EXISTS `tbl_shoppurchasedetails`;
CREATE TABLE IF NOT EXISTS `tbl_shoppurchasedetails` (
  `shoppurchasedetails_id` int(11) NOT NULL AUTO_INCREMENT,
  `shoppurchasehead_id` int(11) NOT NULL,
  `productrate_id` int(11) NOT NULL,
  `shoppurchasehead_qnty` int(11) NOT NULL,
  `shoppurchasedetail_total` int(11) NOT NULL,
  PRIMARY KEY (`shoppurchasedetails_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shoppurchasehead`
--

DROP TABLE IF EXISTS `tbl_shoppurchasehead`;
CREATE TABLE IF NOT EXISTS `tbl_shoppurchasehead` (
  `shoppurchasehead_id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `centraljail_id` int(11) NOT NULL,
  `shoppurchasehead_date` date NOT NULL,
  `shoppurchasehead_billno` int(11) NOT NULL,
  `shoppurchasehead_totalamount` int(11) NOT NULL,
  `shoppurchasehead_status` int(11) NOT NULL,
  PRIMARY KEY (`shoppurchasehead_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_contactno` bigint(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_gender`, `user_contactno`, `user_password`, `user_address`, `user_email`) VALUES
(1, 'Malavika', 'Female', 9076543287, '12345678', 'malavika', 'malu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userpurchasedetail`
--

DROP TABLE IF EXISTS `tbl_userpurchasedetail`;
CREATE TABLE IF NOT EXISTS `tbl_userpurchasedetail` (
  `userpurchasedetail_id` int(11) NOT NULL AUTO_INCREMENT,
  `userpurchasedetail_qnty` int(11) NOT NULL,
  `userpurchasedetail_total` int(11) NOT NULL,
  `productrate_id` int(11) NOT NULL,
  `userpurchasehead_id` int(11) NOT NULL,
  PRIMARY KEY (`userpurchasedetail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userpurchasehead`
--

DROP TABLE IF EXISTS `tbl_userpurchasehead`;
CREATE TABLE IF NOT EXISTS `tbl_userpurchasehead` (
  `userpurchasehead_id` int(11) NOT NULL,
  `userpurchasehead_date` date NOT NULL,
  `userpurchasehead_billno` int(11) NOT NULL,
  `userpurchasehead_gtot` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `userpurchasehead_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
