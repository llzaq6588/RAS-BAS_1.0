-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- 호스트: localhost
-- 처리한 시간: 14-11-05 23:31
-- 서버 버전: 5.5.38-0+wheezy1
-- PHP 버전: 5.4.4-14+deb7u14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 데이터베이스: `rasbas`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` text,
  `password` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 테이블 구조 `machin_name`
--

CREATE TABLE IF NOT EXISTS `machin_name` (
  `machin_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=euckr;

-- --------------------------------------------------------

--
-- 테이블 구조 `rec`
--

CREATE TABLE IF NOT EXISTS `rec` (
  `blackoutstart` text NOT NULL,
  `blackoutstop` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 테이블 구조 `recv_num`
--

CREATE TABLE IF NOT EXISTS `recv_num` (
  `recv_num` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 테이블 구조 `send_num`
--

CREATE TABLE IF NOT EXISTS `send_num` (
  `send_num` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 테이블 구조 `sms_id`
--

CREATE TABLE IF NOT EXISTS `sms_id` (
  `id` text NOT NULL,
  `key` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 테이블 구조 `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `temp`
--

INSERT INTO `temp` (`temp`) VALUES
(0);

-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
