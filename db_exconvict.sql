-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2022 at 03:36 AM
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
  `admin_email` varchar(20) NOT NULL,
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
-- Table structure for table `tbl_centraljail`
--

DROP TABLE IF EXISTS `tbl_centraljail`;
CREATE TABLE IF NOT EXISTS `tbl_centraljail` (
  `centraljail_id` int(11) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) NOT NULL,
  `centraljail_name` varchar(50) NOT NULL,
  `centraljail_contactno` bigint(20) NOT NULL,
  `centraljail_email` varchar(30) NOT NULL,
  `centraljail_address` varchar(50) NOT NULL,
  `centraljail_webaddress` varchar(50) NOT NULL,
  `centraljail_password` varchar(20) NOT NULL,
  PRIMARY KEY (`centraljail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_centraljail`
--

INSERT INTO `tbl_centraljail` (`centraljail_id`, `place_id`, `centraljail_name`, `centraljail_contactno`, `centraljail_email`, `centraljail_address`, `centraljail_webaddress`, `centraljail_password`) VALUES
(1, 5, 'centrall', 1234567890, 'central@gmail.com', 'centralll', 'central', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

DROP TABLE IF EXISTS `tbl_company`;
CREATE TABLE IF NOT EXISTS `tbl_company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_email` varchar(30) NOT NULL,
  `company_contactno` bigint(20) NOT NULL,
  `company_webaddress` varchar(50) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `company_logo` varchar(50) NOT NULL,
  `company_proof` varchar(50) NOT NULL,
  `company_password` varchar(20) NOT NULL,
  `company_status` int(11) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `place_id`, `company_name`, `company_email`, `company_contactno`, `company_webaddress`, `company_address`, `company_logo`, `company_proof`, `company_password`, `company_status`) VALUES
(1, 5, 'company', 'company@gmail.com', 9078563412, 'companycompany', 'company', 'images/Screenshot (24).png', 'images/Screenshot (236).png', '12345678', 1),
(2, 5, 'Success', 'success@gmail.com', 1213465789, 'Success', 'Success', 'images/Screenshot (10).png', 'images/Screenshot (12).png', '12345678', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

DROP TABLE IF EXISTS `tbl_district`;
CREATE TABLE IF NOT EXISTS `tbl_district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(30) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(6, 'Idukki');

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
  `jailsuperintendent_address` varchar(80) NOT NULL,
  `jailsuperintendent_photo` varchar(50) NOT NULL,
  PRIMARY KEY (`jailsuperintendent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jailsuperintendent`
--

INSERT INTO `tbl_jailsuperintendent` (`jailsuperintendent_id`, `centraljail_id`, `jailsuperintendent_name`, `jailsuperintendent_gender`, `jailsuperintendent_email`, `jailsuperintendent_contactno`, `jailsuperintendent_qualification`, `jailsuperintendent_address`, `jailsuperintendent_photo`) VALUES
(2, 1, 'super', 'Male', 's@gmail.com', 9087654321, 'super', 'super', 'images/Screenshot (8).png'),
(4, 1, 'sa', 'Male', 'sa@gmail.com', 9087654322, 'quali', 'address', 'images/Screenshot (7).png'),
(5, 1, 'sharath', 'Male', 'sharath@gmail.com', 9087654321, 'btech', 'address', 'images/Screenshot (8).png');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobapply`
--

INSERT INTO `tbl_jobapply` (`jobapply_id`, `jobvac_id`, `jobseeker_id`, `jobapplier_date`, `jobapplier_status`) VALUES
(1, 1, 1, '2022-10-27', 1),
(2, 3, 1, '2022-10-27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobcategory`
--

DROP TABLE IF EXISTS `tbl_jobcategory`;
CREATE TABLE IF NOT EXISTS `tbl_jobcategory` (
  `jobcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobcategory_name` varchar(50) NOT NULL,
  PRIMARY KEY (`jobcategory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobcategory`
--

INSERT INTO `tbl_jobcategory` (`jobcategory_id`, `jobcategory_name`) VALUES
(1, 'job'),
(5, 'cate'),
(4, 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobdetail`
--

DROP TABLE IF EXISTS `tbl_jobdetail`;
CREATE TABLE IF NOT EXISTS `tbl_jobdetail` (
  `jobdet_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobcategory_id` int(11) NOT NULL,
  `jobdetname` varchar(30) NOT NULL,
  `jobdet_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`jobdet_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobdetail`
--

INSERT INTO `tbl_jobdetail` (`jobdet_id`, `jobcategory_id`, `jobdetname`, `jobdet_desc`) VALUES
(1, 1, 'security', 'night'),
(2, 1, 'qq', 'qqq');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobseeker`
--

DROP TABLE IF EXISTS `tbl_jobseeker`;
CREATE TABLE IF NOT EXISTS `tbl_jobseeker` (
  `jobseeker_id` int(11) NOT NULL AUTO_INCREMENT,
  `prisoner_id` int(11) NOT NULL,
  `jobseeker_proof` varchar(100) NOT NULL,
  `jobseeker_photo` varchar(50) NOT NULL,
  `jobseeker_email` varchar(30) NOT NULL,
  `jobseeker_password` varchar(30) NOT NULL,
  `jobseeker_status` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  PRIMARY KEY (`jobseeker_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobseeker`
--

INSERT INTO `tbl_jobseeker` (`jobseeker_id`, `prisoner_id`, `jobseeker_proof`, `jobseeker_photo`, `jobseeker_email`, `jobseeker_password`, `jobseeker_status`, `place_id`) VALUES
(1, 1001, 'images/Screenshot (2).png', 'images/Screenshot (7).png', 'seeker@gmail.com', '12345678', 0, 5);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobvaccancy`
--

INSERT INTO `tbl_jobvaccancy` (`jobvac_id`, `company_id`, `jobdet_id`, `jobvac_nov`, `jobvac_lastdate`, `jobvac_status`) VALUES
(1, 1, 1, 6, '2022-10-19', 1),
(3, 1, 2, 10, '2022-10-26', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `district_id`, `place_name`) VALUES
(5, 6, 'Vannappuram');

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
  `prisoner_address` varchar(80) NOT NULL,
  `prisoner_contactno` bigint(20) NOT NULL,
  `prisoner_emailid` varchar(30) NOT NULL,
  `prisoner_photo` varchar(50) NOT NULL,
  `prisoner_prisonercode` varchar(30) NOT NULL,
  `prisoner_crimedetails` varchar(200) NOT NULL,
  `prisoner_duration` int(11) NOT NULL,
  `prisoner_joindate` date NOT NULL,
  `prisoner_status` int(11) NOT NULL,
  PRIMARY KEY (`prisoner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prisoner`
--

INSERT INTO `tbl_prisoner` (`prisoner_id`, `centraljail_id`, `prisoner_name`, `prisoner_gender`, `prisoner_address`, `prisoner_contactno`, `prisoner_emailid`, `prisoner_photo`, `prisoner_prisonercode`, `prisoner_crimedetails`, `prisoner_duration`, `prisoner_joindate`, `prisoner_status`) VALUES
(1, 1, 'prisoner', 'Male', 'prisoner', 8976543210, 'prisoner@gmail.co', 'images/Screenshot (8).png', '123', 'prisoner', 12, '2022-09-24', 0),
(3, 1, 'home', 'Male', 'address', 9087654321, 'home@gmail.com', 'images/Screenshot (6).png', '1001', '10909', 10, '2022-10-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_photo` varchar(50) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `product_name`, `product_photo`, `product_description`) VALUES
(1, 1, 'chilly', 'images/Screenshot (9).png', 'kashmiri'),
(2, 3, 'carrot', 'images/Screenshot (11).png', 'red'),
(3, 1, 'Turmeric', 'images/Screenshot (26).png', 'Nice product'),
(4, 3, 'Onion', 'images/Screenshot (11).png', 'aaaaaaaaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productcategory`
--

DROP TABLE IF EXISTS `tbl_productcategory`;
CREATE TABLE IF NOT EXISTS `tbl_productcategory` (
  `productcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `productcategory_name` varchar(50) NOT NULL,
  PRIMARY KEY (`productcategory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_productcategory`
--

INSERT INTO `tbl_productcategory` (`productcategory_id`, `productcategory_name`) VALUES
(1, 'curry'),
(3, 'vegetables'),
(4, 'chappathi');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_production`
--

INSERT INTO `tbl_production` (`production_id`, `product_id`, `centraljail_id`, `production_manufacturedate`, `production_expirydate`, `production_quantity`) VALUES
(1, 1, 1, '2022-10-18', '2022-10-28', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productrate`
--

DROP TABLE IF EXISTS `tbl_productrate`;
CREATE TABLE IF NOT EXISTS `tbl_productrate` (
  `productrate_id` int(11) NOT NULL AUTO_INCREMENT,
  `centraljail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `productrate_rate` double NOT NULL,
  `productrate_reorder` int(11) NOT NULL,
  PRIMARY KEY (`productrate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_productrate`
--

INSERT INTO `tbl_productrate` (`productrate_id`, `centraljail_id`, `product_id`, `productrate_rate`, `productrate_reorder`) VALUES
(1, 1, 1, 12, 0),
(2, 1, 3, 10, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_productstock`
--

INSERT INTO `tbl_productstock` (`productstock_id`, `product_id`, `centraljail_id`, `productstock_totalquantity`) VALUES
(5, 1, 1, 45),
(6, 2, 1, 50),
(7, 3, 1, 10),
(10, 4, 1, 10);

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
  `shop_place` int(11) NOT NULL,
  `shop_address` varchar(100) NOT NULL,
  `shop_logo` varchar(100) NOT NULL,
  `shop_licenceproof` varchar(100) NOT NULL,
  `shop_ownername` varchar(50) NOT NULL,
  `shop_password` varchar(20) NOT NULL,
  `shop_status` int(11) NOT NULL,
  PRIMARY KEY (`shop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `shop_name`, `shop_email`, `shop_contactno`, `shop_place`, `shop_address`, `shop_logo`, `shop_licenceproof`, `shop_ownername`, `shop_password`, `shop_status`) VALUES
(1, 'shop', 'shop@gmail.com', 9078564536, 0, 'shop', 'images/Screenshot (11).png', 'images/Screenshot (12).png', 'shop', '12345678', 1),
(2, 'asus', 'asus@gmail.com', 987654321, 0, 'asus', 'images/Screenshot (2).png', 'images/Screenshot (3).png', 'asus', '1234567890', 1),
(3, 'asus', 'usa@gmail.com', 987654321, 5, 'asus', 'images/Screenshot (2).png', 'images/Screenshot (3).png', 'asus', '1234567890', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shoppurchasedtls`
--

DROP TABLE IF EXISTS `tbl_shoppurchasedtls`;
CREATE TABLE IF NOT EXISTS `tbl_shoppurchasedtls` (
  `shppurchasedtls_id` int(11) NOT NULL AUTO_INCREMENT,
  `shppurchasehead_id` int(11) NOT NULL,
  `productstock_id` int(11) NOT NULL,
  `shppurchasedtls_qty` int(11) NOT NULL,
  `shppurchasedtls_total` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shppurchasedtls_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shoppurchasedtls`
--

INSERT INTO `tbl_shoppurchasedtls` (`shppurchasedtls_id`, `shppurchasehead_id`, `productstock_id`, `shppurchasedtls_qty`, `shppurchasedtls_total`) VALUES
(15, 22, 5, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shoppurchasehead`
--

DROP TABLE IF EXISTS `tbl_shoppurchasehead`;
CREATE TABLE IF NOT EXISTS `tbl_shoppurchasehead` (
  `shoppurchasehead_id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `shoppurchasehead_date` date NOT NULL,
  `shoppurchasehead_billno` int(11) NOT NULL DEFAULT '0',
  `shoppurchasehead_totalamount` float NOT NULL DEFAULT '0',
  `shoppurchasehead_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shoppurchasehead_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shoppurchasehead`
--

INSERT INTO `tbl_shoppurchasehead` (`shoppurchasehead_id`, `shop_id`, `shoppurchasehead_date`, `shoppurchasehead_billno`, `shoppurchasehead_totalamount`, `shoppurchasehead_status`) VALUES
(22, 1, '2022-11-08', 0, 0, 0);

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
  `user_email` varchar(30) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_gender`, `user_contactno`, `user_password`, `user_email`, `user_address`) VALUES
(5, 'Malavika', 'Female', 9087654356, 'malu1234', 'malavika@gmail.com', 'Malavika,vpm,idukki'),
(2, 'vysakh', 'Male', 9497355809, '123', 'vy@gamil.com', 'vysakhp'),
(4, 'gokul', 'Male', 1234567890, '12345678', 'gok@gmail.com', 'gokul');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userpurchasedetail`
--

DROP TABLE IF EXISTS `tbl_userpurchasedetail`;
CREATE TABLE IF NOT EXISTS `tbl_userpurchasedetail` (
  `upurchasedet_id` int(11) NOT NULL AUTO_INCREMENT,
  `upurchasedet_qty` int(11) NOT NULL,
  `upurchasedet_total` float NOT NULL DEFAULT '0',
  `productstock_id` int(11) NOT NULL,
  `upurchasehead_id` int(11) NOT NULL,
  PRIMARY KEY (`upurchasedet_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_userpurchasedetail`
--

INSERT INTO `tbl_userpurchasedetail` (`upurchasedet_id`, `upurchasedet_qty`, `upurchasedet_total`, `productstock_id`, `upurchasehead_id`) VALUES
(2, 3, 0, 5, 2),
(3, 2, 0, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userpurchasehead`
--

DROP TABLE IF EXISTS `tbl_userpurchasehead`;
CREATE TABLE IF NOT EXISTS `tbl_userpurchasehead` (
  `upurchasehead_id` int(11) NOT NULL AUTO_INCREMENT,
  `upurchasehead_date` int(11) NOT NULL,
  `upurchasehead_billno` int(11) NOT NULL DEFAULT '0',
  `upurchasehead_gtotal` bigint(20) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `upurchasehead_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`upurchasehead_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_userpurchasehead`
--

INSERT INTO `tbl_userpurchasehead` (`upurchasehead_id`, `upurchasehead_date`, `upurchasehead_billno`, `upurchasehead_gtotal`, `user_id`, `upurchasehead_status`) VALUES
(2, 20221107, 0, 0, 5, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
