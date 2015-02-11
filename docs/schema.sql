-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2014 at 11:59 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eyesoft`
--
CREATE DATABASE IF NOT EXISTS `eyesoft` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eyesoft`;

-- --------------------------------------------------------

--
-- Table structure for table `archive_billing`
--

CREATE TABLE IF NOT EXISTS `archive_billing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `billno` int(10) unsigned NOT NULL DEFAULT '0',
  `ono` int(11) unsigned NOT NULL,
  `insurance` int(11) unsigned NOT NULL,
  `cost` int(11) unsigned NOT NULL DEFAULT '0',
  `paid` int(11) unsigned NOT NULL DEFAULT '0',
  `balance` int(11) unsigned NOT NULL DEFAULT '0',
  `payin` varchar(45) NOT NULL DEFAULT 'CASH',
  `currency` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'caries id of currency specified in code-category',
  `currency_rate` int(11) NOT NULL DEFAULT '1' COMMENT 'exchange rate for that day',
  `currency_value` int(11) NOT NULL DEFAULT '1' COMMENT 'amount of money paid for this currency',
  `refunded` int(1) NOT NULL DEFAULT '0',
  `visit_type` int(11) NOT NULL DEFAULT '0' COMMENT 'type of visit [normal/appointment]',
  `indpt` int(11) NOT NULL DEFAULT '1' COMMENT 'current department',
  `discarded` int(1) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0',
  `extra_charges` int(1) NOT NULL DEFAULT '0' COMMENT 'if it is 1 then ono===pno',
  `createdby` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `authorizedby` varchar(100) NOT NULL,
  `authorizeddate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`billno`,`ono`,`cost`,`paid`,`balance`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106398 ;

-- --------------------------------------------------------

--
-- Table structure for table `archive_billing_element`
--

CREATE TABLE IF NOT EXISTS `archive_billing_element` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `elem` int(10) unsigned NOT NULL DEFAULT '0',
  `billno` int(11) unsigned NOT NULL DEFAULT '0',
  `service` varchar(45) NOT NULL DEFAULT '0',
  `amount` int(11) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`billno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108329 ;

-- --------------------------------------------------------

--
-- Table structure for table `archive_billing_paid_balance`
--

CREATE TABLE IF NOT EXISTS `archive_billing_paid_balance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `billno` int(11) NOT NULL COMMENT 'Bill number',
  `ono` int(11) unsigned NOT NULL,
  `paid` int(11) unsigned NOT NULL DEFAULT '0',
  `description` varchar(100) NOT NULL DEFAULT '' COMMENT 'paid for',
  `createdby` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`billno`,`ono`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=999 ;

-- --------------------------------------------------------

--
-- Table structure for table `archive_billing_refund`
--

CREATE TABLE IF NOT EXISTS `archive_billing_refund` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `billno` int(11) unsigned NOT NULL DEFAULT '0',
  `amount` int(11) unsigned NOT NULL DEFAULT '0',
  `doctor` int(11) unsigned NOT NULL,
  `comment` text NOT NULL,
  `refundby` varchar(45) NOT NULL,
  `refunddate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `billno` (`billno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=218 ;

-- --------------------------------------------------------

--
-- Table structure for table `biling_pricelist`
--

CREATE TABLE IF NOT EXISTS `biling_pricelist` (
  `insurer` int(11) unsigned NOT NULL DEFAULT '0',
  `category` int(11) unsigned NOT NULL DEFAULT '0',
  `outreach` int(11) unsigned DEFAULT '0',
  `normal` int(11) unsigned DEFAULT '0',
  `appointment` int(11) unsigned DEFAULT '0',
  `createby` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`insurer`,`category`),
  KEY `insurer` (`insurer`,`category`,`normal`,`appointment`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ono` int(11) unsigned NOT NULL,
  `insurance` int(11) unsigned NOT NULL,
  `cost` int(11) unsigned NOT NULL DEFAULT '0',
  `paid` int(11) unsigned NOT NULL DEFAULT '0',
  `balance` int(11) unsigned NOT NULL DEFAULT '0',
  `payin` varchar(45) NOT NULL DEFAULT 'CASH',
  `currency` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'caries id of currency specified in code-category',
  `currency_rate` int(11) NOT NULL DEFAULT '1' COMMENT 'exchange rate for that day',
  `currency_value` int(11) NOT NULL DEFAULT '1' COMMENT 'amount of money paid for this currency',
  `refunded` int(1) NOT NULL DEFAULT '0',
  `visit_type` int(11) NOT NULL DEFAULT '0' COMMENT 'type of visit [normal/appointment]',
  `indpt` int(11) NOT NULL DEFAULT '1' COMMENT 'current department',
  `discarded` int(1) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0',
  `extra_charges` int(1) NOT NULL DEFAULT '0' COMMENT 'if it is 1 then ono===pno',
  `createdby` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`ono`,`paid`,`balance`,`payin`,`indpt`,`archived`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117501 ;

-- --------------------------------------------------------

--
-- Table structure for table `billing_element`
--

CREATE TABLE IF NOT EXISTS `billing_element` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `billno` int(11) unsigned NOT NULL DEFAULT '0',
  `service` varchar(45) NOT NULL DEFAULT '0',
  `amount` int(11) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`billno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119919 ;

-- --------------------------------------------------------

--
-- Table structure for table `billing_insurance`
--

CREATE TABLE IF NOT EXISTS `billing_insurance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ono` int(11) unsigned NOT NULL,
  `insurance` int(11) unsigned NOT NULL,
  `cost` int(11) unsigned NOT NULL DEFAULT '0',
  `paid` int(11) unsigned NOT NULL DEFAULT '0',
  `balance` int(11) unsigned NOT NULL DEFAULT '0',
  `payin` varchar(45) NOT NULL DEFAULT 'CASH',
  `currency` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'caries id of currency specified in code-category',
  `currency_rate` int(11) NOT NULL DEFAULT '1' COMMENT 'exchange rate for that day',
  `currency_value` int(11) NOT NULL DEFAULT '1' COMMENT 'amount of money paid for this currency',
  `refunded` int(1) NOT NULL DEFAULT '0',
  `visit_type` int(11) NOT NULL DEFAULT '0' COMMENT 'type of visit [normal/appointment]',
  `indpt` int(11) NOT NULL DEFAULT '1' COMMENT 'current department',
  `discarded` int(1) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0',
  `extra_charges` int(1) NOT NULL DEFAULT '0' COMMENT 'if it is 1 then ono===pno',
  `createdby` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`ono`,`paid`,`balance`,`payin`,`indpt`,`archived`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59129 ;

-- --------------------------------------------------------

--
-- Table structure for table `billing_insurance_element`
--

CREATE TABLE IF NOT EXISTS `billing_insurance_element` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `billno` int(11) unsigned NOT NULL DEFAULT '0',
  `service` varchar(45) NOT NULL DEFAULT '0',
  `amount` int(11) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`billno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59925 ;

-- --------------------------------------------------------

--
-- Table structure for table `billing_paid_balance`
--

CREATE TABLE IF NOT EXISTS `billing_paid_balance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `billno` int(11) NOT NULL COMMENT 'Bill number',
  `ono` int(11) unsigned NOT NULL,
  `paid` int(11) unsigned NOT NULL DEFAULT '0',
  `description` varchar(100) NOT NULL DEFAULT '' COMMENT 'paid for',
  `archived` int(1) NOT NULL DEFAULT '0',
  `createdby` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `billno` (`billno`,`ono`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1000 ;

-- --------------------------------------------------------

--
-- Table structure for table `billing_refund`
--

CREATE TABLE IF NOT EXISTS `billing_refund` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `billno` int(11) unsigned NOT NULL DEFAULT '0',
  `amount` int(11) unsigned NOT NULL DEFAULT '0',
  `doctor` int(11) unsigned NOT NULL,
  `comment` text NOT NULL,
  `archived` int(1) NOT NULL DEFAULT '0',
  `refundby` varchar(45) NOT NULL,
  `refunddate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`billno`,`amount`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='for all refunded receipts' AUTO_INCREMENT=220 ;

-- --------------------------------------------------------

--
-- Table structure for table `billing_role_assigned`
--

CREATE TABLE IF NOT EXISTS `billing_role_assigned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `billing_services`
--

CREATE TABLE IF NOT EXISTS `billing_services` (
  `insurer` int(11) unsigned NOT NULL,
  `category` int(11) unsigned NOT NULL,
  `services` varchar(777) NOT NULL,
  `notes` varchar(333) DEFAULT NULL,
  `createby` varchar(100) NOT NULL DEFAULT 'Default',
  `createdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`insurer`,`category`),
  KEY `insurer` (`insurer`,`category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='all services that will be charged';

-- --------------------------------------------------------

--
-- Table structure for table `b_insurance`
--

CREATE TABLE IF NOT EXISTS `b_insurance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `contact_person` varchar(245) NOT NULL,
  `address` varchar(145) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `description` text,
  `has_card` varchar(245) DEFAULT 'N',
  `has_pricelist` varchar(1) NOT NULL DEFAULT 'N',
  `is_donor` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='insuarance company' AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_pricelist`
--

CREATE TABLE IF NOT EXISTS `b_pricelist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(345) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`category`,`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `code_category`
--

CREATE TABLE IF NOT EXISTS `code_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `inbilling` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`),
  KEY `category_id` (`category_id`,`category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

-- --------------------------------------------------------

--
-- Table structure for table `code_element`
--

CREATE TABLE IF NOT EXISTS `code_element` (
  `CodeTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `CodeType` varchar(255) DEFAULT NULL,
  `CATEGORY` int(11) NOT NULL,
  `type` varchar(45) DEFAULT ' ',
  `sorter` int(10) unsigned DEFAULT '0',
  `code` varchar(45) DEFAULT NULL,
  `region` int(11) DEFAULT '0',
  `district` int(11) DEFAULT '0',
  `charge_times` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`CodeTypeID`),
  KEY `CodeTypeID` (`CodeTypeID`,`CodeType`,`CATEGORY`,`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=643 ;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `name` varchar(100) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `tell` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Hold details of enterprises';

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `COUNTRYCODE` int(11) NOT NULL,
  `COUNTRYNAME` varchar(60) DEFAULT NULL,
  `MEMBER` tinyint(1) DEFAULT NULL,
  `INTERNATIONALORGANISATION` tinyint(1) DEFAULT NULL,
  `CURRENCYCODE` varchar(5) NOT NULL DEFAULT '0',
  `CURRENCYDESCRIPTION` varchar(40) NOT NULL,
  `CREATEDON` datetime DEFAULT NULL,
  `CREATEDBY` varchar(30) DEFAULT NULL,
  `UPDATEDON` datetime DEFAULT NULL,
  `UPDATEDBY` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`COUNTRYCODE`),
  KEY `COUNTRYCODE` (`COUNTRYCODE`,`COUNTRYNAME`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `e_appointments`
--

CREATE TABLE IF NOT EXISTS `e_appointments` (
  `ono` int(10) unsigned NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `time` varchar(12) NOT NULL DEFAULT '',
  `doctor` varchar(45) NOT NULL,
  `description` text,
  `createby` varchar(45) NOT NULL,
  `createdate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`ono`,`date`,`doctor`),
  KEY `ono` (`ono`,`date`,`doctor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='holds all patient appointments information';

-- --------------------------------------------------------

--
-- Table structure for table `e_district`
--

CREATE TABLE IF NOT EXISTS `e_district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_code` int(10) NOT NULL,
  `district_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `region` tinyint(4) NOT NULL,
  PRIMARY KEY (`district_id`),
  KEY `district_id` (`district_id`,`district_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='districts' AUTO_INCREMENT=140 ;

-- --------------------------------------------------------

--
-- Table structure for table `e_ipd`
--

CREATE TABLE IF NOT EXISTS `e_ipd` (
  `ino` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ono` int(10) unsigned NOT NULL DEFAULT '0',
  `surgery_date` date NOT NULL DEFAULT '0000-00-00',
  `operated_eye_l` int(1) unsigned DEFAULT '0',
  `operated_eye_r` int(1) unsigned DEFAULT '0',
  `surgeryType` int(11) unsigned NOT NULL DEFAULT '0',
  `doctor1` varchar(145) NOT NULL,
  `doctor0` varchar(100) NOT NULL COMMENT 'assitant surgeon',
  `doctor2` varchar(145) DEFAULT NULL,
  `cat_type` int(10) unsigned DEFAULT '0',
  `cat_surgery_type` int(10) unsigned DEFAULT '0',
  `cat_iol_inserted` int(10) unsigned DEFAULT '0',
  `outcome_r` varchar(425) DEFAULT NULL,
  `outcome_l` varchar(425) DEFAULT NULL,
  `ascan` int(10) unsigned DEFAULT '0',
  `recomm_iol` int(10) unsigned DEFAULT '0',
  `inserted_iol` int(10) unsigned DEFAULT '0',
  `incision` int(10) unsigned DEFAULT '0',
  `surture` double DEFAULT '0',
  `complications` varchar(425) DEFAULT NULL,
  `notes` text,
  `anaesthesia` int(11) NOT NULL,
  `returndate` date NOT NULL DEFAULT '0000-00-00',
  `notseen` int(1) NOT NULL DEFAULT '0',
  `createby` varchar(240) NOT NULL DEFAULT 'Default',
  `createdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ino`),
  KEY `ino` (`ino`,`ono`,`surgery_date`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Inpatient Departement Table' AUTO_INCREMENT=10451 ;

-- --------------------------------------------------------

--
-- Table structure for table `e_ipd_atdischarge`
--

CREATE TABLE IF NOT EXISTS `e_ipd_atdischarge` (
  `dno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ono` double NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `doctor1` varchar(45) NOT NULL,
  `doctor2` varchar(145) NOT NULL,
  `va_pre_re` int(11) unsigned DEFAULT NULL,
  `va_pre_le` int(11) unsigned DEFAULT NULL,
  `va_pin_re` int(11) unsigned DEFAULT NULL,
  `va_pin_le` int(11) unsigned DEFAULT NULL,
  `iop_re` varchar(45) DEFAULT NULL,
  `iop_le` varchar(45) DEFAULT NULL,
  `observation_re` varchar(345) DEFAULT NULL,
  `observation_le` varchar(345) DEFAULT NULL,
  `comments` text,
  `createdby` varchar(145) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`dno`),
  KEY `dno` (`dno`,`ono`),
  KEY `date` (`date`),
  KEY `dno_2` (`dno`,`ono`,`date`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Examination of the operated eye  at discharge' AUTO_INCREMENT=10248 ;

-- --------------------------------------------------------

--
-- Table structure for table `e_ipd_ward`
--

CREATE TABLE IF NOT EXISTS `e_ipd_ward` (
  `wno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ono` double NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `doctor1` varchar(45) NOT NULL,
  `doctor2` varchar(145) NOT NULL,
  `vaprl` int(10) unsigned DEFAULT NULL,
  `vaprr` int(10) unsigned DEFAULT NULL,
  `dnotes` text,
  `iopl` varchar(45) DEFAULT NULL,
  `iopr` varchar(45) DEFAULT NULL,
  `lle` varchar(345) DEFAULT NULL,
  `lre` varchar(345) DEFAULT NULL,
  `rle` varchar(345) DEFAULT NULL,
  `rre` varchar(345) DEFAULT NULL,
  `notseen` int(1) NOT NULL DEFAULT '0',
  `createdby` varchar(145) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`wno`),
  KEY `wno` (`wno`,`ono`,`date`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1332 ;

-- --------------------------------------------------------

--
-- Table structure for table `e_opd`
--

CREATE TABLE IF NOT EXISTS `e_opd` (
  `ono` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pno` int(12) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT '1',
  `odate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `indpt` tinyint(2) NOT NULL DEFAULT '0',
  `discharged_date` datetime DEFAULT '0000-00-00 00:00:00',
  `opd` int(1) NOT NULL DEFAULT '0',
  `theatre` int(1) NOT NULL DEFAULT '0',
  `ward` int(1) NOT NULL DEFAULT '0',
  `visittype` int(11) NOT NULL DEFAULT '1',
  `service` int(11) NOT NULL,
  `referredby` int(11) NOT NULL DEFAULT '1',
  `notbilled` int(1) NOT NULL DEFAULT '0',
  `createby` varchar(50) NOT NULL DEFAULT '',
  `createdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modifyby` varchar(50) NOT NULL DEFAULT '',
  `modifydate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ono`),
  KEY `ono` (`ono`,`pno`,`odate`,`createby`,`createdate`,`modifyby`,`modifydate`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108042 ;

-- --------------------------------------------------------

--
-- Table structure for table `e_opd_detailed`
--

CREATE TABLE IF NOT EXISTS `e_opd_detailed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ono` int(10) unsigned NOT NULL,
  `edate` date NOT NULL DEFAULT '0000-00-00',
  `sdate` date DEFAULT '0000-00-00',
  `focal` tinyint(1) unsigned DEFAULT '0',
  `iopl` varchar(2) DEFAULT NULL,
  `iopr` varchar(2) DEFAULT NULL,
  `avastin` tinyint(1) unsigned DEFAULT '0',
  `probing` tinyint(1) unsigned DEFAULT '0',
  `daycase` tinyint(1) unsigned DEFAULT '0',
  `vawgl` int(11) unsigned DEFAULT '0',
  `vawgr` int(11) unsigned DEFAULT '0',
  `vawpl` int(11) unsigned DEFAULT '0',
  `vawpr` int(11) unsigned DEFAULT '0',
  `type` int(11) unsigned DEFAULT '0',
  `yag` int(11) unsigned DEFAULT '0',
  `prp` tinyint(1) unsigned DEFAULT '0',
  `cpc` tinyint(1) unsigned DEFAULT '0',
  `var` int(11) unsigned NOT NULL DEFAULT '0',
  `val` int(11) unsigned NOT NULL DEFAULT '0',
  `other` int(11) unsigned DEFAULT '0',
  `doctor1` varchar(45) DEFAULT NULL,
  `doctor2` varchar(45) DEFAULT NULL,
  `lle` varchar(345) NOT NULL,
  `lre` varchar(345) NOT NULL,
  `rle` varchar(345) DEFAULT NULL,
  `rre` varchar(345) DEFAULT NULL,
  `notseen` int(1) NOT NULL DEFAULT '0',
  `notes` text,
  `surgeon` int(11) NOT NULL,
  `eye` varchar(3) NOT NULL,
  `anaesthesia` int(11) NOT NULL,
  `registerby` varchar(45) DEFAULT 'Default',
  `registerdate` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`ono`,`edate`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105123 ;

-- --------------------------------------------------------

--
-- Table structure for table `e_opd_detailed_elective`
--

CREATE TABLE IF NOT EXISTS `e_opd_detailed_elective` (
  `ono` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `pno` int(11) unsigned NOT NULL,
  `surgery` int(11) unsigned NOT NULL,
  `premedication` int(11) unsigned NOT NULL,
  `anaesthesia` int(11) unsigned NOT NULL,
  `surgeon` varchar(345) NOT NULL,
  `eye` varchar(45) NOT NULL,
  `addedby` varchar(50) NOT NULL DEFAULT 'system',
  `addeddate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ono`,`date`),
  KEY `ono` (`ono`,`date`,`pno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Elective Surgeries for OPD patients' AUTO_INCREMENT=107934 ;

-- --------------------------------------------------------

--
-- Table structure for table `e_patient`
--

CREATE TABLE IF NOT EXISTS `e_patient` (
  `pno` int(12) NOT NULL AUTO_INCREMENT,
  `regdate` date NOT NULL DEFAULT '0000-00-00',
  `regtime` time DEFAULT '00:00:00',
  `hosp_no` varchar(12) DEFAULT NULL,
  `nhif_no` varchar(11) DEFAULT NULL,
  `diabetic_no` varchar(11) DEFAULT NULL,
  `fname` varchar(60) DEFAULT NULL,
  `sname` varchar(60) DEFAULT NULL,
  `surname` varchar(60) DEFAULT NULL,
  `balozi` varchar(60) DEFAULT NULL,
  `birthdate` date DEFAULT '0000-00-00',
  `sex` varchar(5) DEFAULT '0',
  `marital` varchar(45) DEFAULT 'single',
  `tribe` varchar(11) DEFAULT NULL,
  `insuarance` int(11) NOT NULL DEFAULT '1',
  `religion` varchar(100) DEFAULT NULL,
  `allergy` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `country` int(11) NOT NULL DEFAULT '255',
  `region` int(10) unsigned DEFAULT '0',
  `district` int(10) unsigned DEFAULT '0',
  `ward` int(10) unsigned DEFAULT NULL,
  `town` varchar(111) DEFAULT NULL,
  `cell1` varchar(45) DEFAULT NULL,
  `cell2` varchar(45) DEFAULT NULL,
  `refferedby` varchar(45) DEFAULT NULL,
  `registered` varchar(45) DEFAULT NULL,
  `insurance_code` varchar(45) DEFAULT NULL,
  `insurance_voteno` varchar(45) DEFAULT NULL,
  `insurance_type` varchar(45) DEFAULT NULL,
  `last_ono` int(11) DEFAULT '0',
  `email` varchar(120) DEFAULT NULL,
  `createby` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT '0000-00-00 00:00:00',
  `modifyby` varchar(45) DEFAULT NULL,
  `modifydate` datetime DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `pno` (`pno`),
  KEY `pno_2` (`pno`,`hosp_no`,`nhif_no`,`fname`,`sname`,`surname`,`birthdate`,`sex`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='personel adiministrative codes' AUTO_INCREMENT=100085474 ;

-- --------------------------------------------------------

--
-- Table structure for table `e_patient_other`
--

CREATE TABLE IF NOT EXISTS `e_patient_other` (
  `pno` int(10) unsigned NOT NULL,
  `diabetes` tinyint(1) unsigned zerofill DEFAULT '0',
  `htn` tinyint(1) unsigned zerofill DEFAULT '0',
  `other` tinyint(1) unsigned zerofill DEFAULT '0',
  `description` varchar(45) DEFAULT NULL,
  `createby` varchar(45) DEFAULT NULL,
  `createdate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`pno`),
  KEY `pno` (`pno`,`diabetes`,`htn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='holds diabetes, hypertension and other related constant issu';

-- --------------------------------------------------------

--
-- Table structure for table `e_personnel`
--

CREATE TABLE IF NOT EXISTS `e_personnel` (
  `code` varchar(4) NOT NULL,
  `name` varchar(145) NOT NULL,
  `email` varchar(145) DEFAULT NULL,
  `cell` varchar(45) DEFAULT NULL,
  `ext` varchar(45) DEFAULT NULL,
  `description` text,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`code`),
  KEY `code` (`code`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='personnel manager table';

-- --------------------------------------------------------

--
-- Table structure for table `e_refferal`
--

CREATE TABLE IF NOT EXISTS `e_refferal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(245) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='for refferal hospitals' AUTO_INCREMENT=12227 ;

-- --------------------------------------------------------

--
-- Table structure for table `e_region`
--

CREATE TABLE IF NOT EXISTS `e_region` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_code` int(10) NOT NULL,
  `region_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `is_additional` tinyint(4) NOT NULL,
  PRIMARY KEY (`region_id`),
  KEY `region_id` (`region_id`,`region_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Table structure for table `e_religion`
--

CREATE TABLE IF NOT EXISTS `e_religion` (
  `nr` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(6) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `is_additional` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nr`),
  KEY `CODE` (`code`),
  KEY `nr` (`nr`,`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Table structure for table `e_tribes`
--

CREATE TABLE IF NOT EXISTS `e_tribes` (
  `tribe_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tribe_code` varchar(20) NOT NULL,
  `tribe_name` varchar(20) NOT NULL DEFAULT '',
  `is_additional` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tribe_id`),
  KEY `tribe_id` (`tribe_id`),
  KEY `tribe_id_2` (`tribe_id`,`tribe_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=364 ;

-- --------------------------------------------------------

--
-- Table structure for table `e_ward`
--

CREATE TABLE IF NOT EXISTS `e_ward` (
  `ward_id` int(11) NOT NULL AUTO_INCREMENT,
  `ward_code` int(10) NOT NULL,
  `ward_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `district` tinyint(4) NOT NULL,
  PRIMARY KEY (`ward_id`),
  KEY `ward_id` (`ward_id`,`ward_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2784 ;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `menuid` int(10) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pagepath` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `code` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`menuid`),
  KEY `menuid` (`menuid`,`menuname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `otr_examination`
--

CREATE TABLE IF NOT EXISTS `otr_examination` (
  `visit` int(11) NOT NULL DEFAULT '0',
  `diagnosis` int(11) unsigned NOT NULL DEFAULT '0',
  `adult_male` int(11) unsigned DEFAULT '0',
  `adult_female` int(11) unsigned DEFAULT '0',
  `child_male` int(11) unsigned DEFAULT '0',
  `child_female` int(11) unsigned DEFAULT '0',
  `registerby` varchar(45) DEFAULT NULL,
  `registerdate` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`visit`,`diagnosis`),
  KEY `visit` (`visit`,`diagnosis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `otr_main`
--

CREATE TABLE IF NOT EXISTS `otr_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date1` date NOT NULL DEFAULT '0000-00-00',
  `date2` date NOT NULL DEFAULT '0000-00-00',
  `place` int(11) unsigned NOT NULL DEFAULT '0',
  `surgeon` varchar(500) NOT NULL,
  `clinician` varchar(200) NOT NULL,
  `phone` varchar(145) DEFAULT '0',
  `return_date` date NOT NULL DEFAULT '0000-00-00',
  `notes` varchar(45) DEFAULT NULL,
  `type` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`date1`,`date2`,`place`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Outreach Theatre main table' AUTO_INCREMENT=263 ;

-- --------------------------------------------------------

--
-- Table structure for table `otr_theatre_element`
--

CREATE TABLE IF NOT EXISTS `otr_theatre_element` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pno` int(11) NOT NULL,
  `lid` int(11) NOT NULL DEFAULT '0' COMMENT 'primary key of otr_theatre_main (foreign key here)',
  `fullname` varchar(425) NOT NULL,
  `age` int(11) NOT NULL DEFAULT '0',
  `sex` varchar(2) NOT NULL DEFAULT 'M',
  `eye` varchar(3) NOT NULL,
  `surgery` int(11) unsigned NOT NULL DEFAULT '0',
  `va_b4` int(11) unsigned DEFAULT '0',
  `va_atdischarge` int(11) unsigned DEFAULT '0',
  `va_6wix` int(11) unsigned DEFAULT '0',
  `amount` double NOT NULL DEFAULT '0',
  `comment` text,
  `surgeon` varchar(4) NOT NULL,
  `createby` varchar(222) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modifyby` varchar(222) NOT NULL,
  `modifydate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`pno`,`lid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='outrich theatre lists' AUTO_INCREMENT=1632 ;

-- --------------------------------------------------------

--
-- Table structure for table `sys_backup`
--

CREATE TABLE IF NOT EXISTS `sys_backup` (
  `b_time` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `b_date` date NOT NULL DEFAULT '0000-00-00',
  `status` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`b_time`,`b_date`),
  KEY `b_time` (`b_time`,`b_date`,`status`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='MYSQL Backup schedule' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `useraccess`
--

CREATE TABLE IF NOT EXISTS `useraccess` (
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `fullname` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `emailaddress` varchar(100) COLLATE latin1_general_ci DEFAULT '',
  `departmentcode` varchar(100) COLLATE latin1_general_ci DEFAULT '',
  `usergroup` varchar(100) COLLATE latin1_general_ci DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '0',
  `lastlogin` datetime DEFAULT '1970-01-01 00:00:01',
  `lastlogout` datetime DEFAULT '1970-01-01 00:00:01',
  `lastchanged` date DEFAULT '0000-00-00',
  PRIMARY KEY (`username`),
  KEY `username` (`username`,`password`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usergroups`
--

CREATE TABLE IF NOT EXISTS `usergroups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usergroup` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `useroles`
--

CREATE TABLE IF NOT EXISTS `useroles` (
  `code` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `role` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `description` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userroleassigned`
--

CREATE TABLE IF NOT EXISTS `userroleassigned` (
  `menuid` int(11) NOT NULL DEFAULT '0',
  `usergroup` int(11) NOT NULL,
  KEY `menuid` (`menuid`,`usergroup`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_expiry`
--

CREATE TABLE IF NOT EXISTS `user_expiry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `days` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='user password expiring table' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `z_flexy`
--

CREATE TABLE IF NOT EXISTS `z_flexy` (
  `f0` varchar(300) NOT NULL DEFAULT ' ',
  `f1` varchar(300) NOT NULL DEFAULT ' ',
  `f2` varchar(300) NOT NULL DEFAULT ' ',
  `f3` varchar(300) NOT NULL DEFAULT ' ',
  `f4` varchar(300) NOT NULL DEFAULT ' ',
  `f5` varchar(300) NOT NULL DEFAULT ' ',
  `f6` varchar(300) NOT NULL DEFAULT ' ',
  `f7` varchar(300) NOT NULL DEFAULT ' ',
  `f8` varchar(300) NOT NULL DEFAULT ' '
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
