-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 10. April 2015 jam 08:07
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `traceability`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `EvRecId` int(10) NOT NULL,
  `DocNo` varchar(20) NOT NULL,
  `EvDt` char(8) NOT NULL,
  `EvNm` varchar(40) NOT NULL,
  `Room` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `MatRecId` int(10) NOT NULL,
  `DocNo` varchar(20) NOT NULL,
  `RefNo` varchar(20) NOT NULL,
  `Barcode` char(10) NOT NULL,
  `Qty` int(10) NOT NULL,
  `UsrId` varchar(8) NOT NULL,
  `UsrNm` varchar(40) NOT NULL,
  `UMatRecId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `materialout`
--

CREATE TABLE IF NOT EXISTS `materialout` (
  `MatOutRecId` int(10) NOT NULL AUTO_INCREMENT,
  `RefNo` varchar(20) NOT NULL,
  `Type` varchar(8) NOT NULL,
  `RefDt` char(8) NOT NULL,
  `IssuedDt` char(8) NOT NULL,
  `DocNo` varchar(20) NOT NULL,
  `AlcNm` varchar(40) NOT NULL,
  `WhNm` varchar(40) NOT NULL,
  `UsrId` varchar(8) NOT NULL,
  `ApvNm` varchar(40) NOT NULL,
  `SerNo` varchar(12) NOT NULL,
  PRIMARY KEY (`MatOutRecId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=301 ;

--
-- Dumping data untuk tabel `materialout`
--

INSERT INTO `materialout` (`MatOutRecId`, `RefNo`, `Type`, `RefDt`, `IssuedDt`, `DocNo`, `AlcNm`, `WhNm`, `UsrId`, `ApvNm`, `SerNo`) VALUES
(295, '', '', '', '20090101', 'BEO98870', 'Gunakan Makanan Jadi', '', '', '', ''),
(296, '', '', '', '20090101', 'BEO9870', 'Gunakan Makanan Jadi', '', '', '', ''),
(297, '', '', '', '20090101', 'Beo9870', 'Gunakan Sisa Bahan', '', '', '', ''),
(298, '', '', '', '20090101', 'beo9871', 'Gunakan Sisa Bahan', '', '', '', ''),
(299, '', '', '', '20090101', 'beo9871', 'Gunakan Sisa Bahan', '', '', '', ''),
(300, '', '', '', '20090101', 'hrd150401', 'Gunakan Sisa Bahan', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materialoutitem`
--

CREATE TABLE IF NOT EXISTS `materialoutitem` (
  `MatOutItRecId` int(10) NOT NULL AUTO_INCREMENT,
  `MatOutRecId` int(10) NOT NULL,
  `StoreReqId` int(10) NOT NULL,
  `SeqNo` char(6) NOT NULL,
  `ProdId` varchar(20) NOT NULL,
  `ProdNm` varchar(40) NOT NULL,
  `Barcode` char(10) NOT NULL,
  `Unit` varchar(4) NOT NULL,
  `AQty` int(10) NOT NULL,
  `IQty` int(10) NOT NULL,
  PRIMARY KEY (`MatOutItRecId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `materialoutitem`
--

INSERT INTO `materialoutitem` (`MatOutItRecId`, `MatOutRecId`, `StoreReqId`, `SeqNo`, `ProdId`, `ProdNm`, `Barcode`, `Unit`, `AQty`, `IQty`) VALUES
(12, 0, 0, '', '', '', '9090101001', '', 0, 0),
(13, 0, 0, '', '', '', '9090101002', '', 0, 0),
(14, 0, 0, '', '', '', '9090101003', '', 0, 0),
(15, 0, 0, '', '', '', '9090101004', '', 0, 0),
(16, 0, 0, '', '', '', '9090101005', '', 0, 0),
(17, 0, 0, '', '', '', '9090101006', '', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `msuser`
--

CREATE TABLE IF NOT EXISTS `msuser` (
  `UserId` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(10) DEFAULT NULL,
  `lname` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `msuser`
--

INSERT INTO `msuser` (`UserId`, `username`, `password`, `fname`, `lname`) VALUES
(1, 'admin', 'admin', 'Budi', 'Sutiyoso'),
(2, 'herry', 'herry', 'Herry ', 'Criestian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchaseorder`
--

CREATE TABLE IF NOT EXISTS `purchaseorder` (
  `RecId` int(10) NOT NULL,
  `RefDt` char(8) NOT NULL,
  `DocNo` varchar(20) NOT NULL,
  `RefNo` varchar(20) NOT NULL,
  `SeqNo` char(6) NOT NULL,
  `ProdNm` varchar(40) NOT NULL,
  `ProdId` varchar(20) NOT NULL,
  `Qty` int(10) NOT NULL,
  `Unit` varchar(4) NOT NULL,
  `SupNm` varchar(40) NOT NULL,
  `SuppId` varchar(8) NOT NULL,
  `Note1` varchar(20) NOT NULL,
  `Note2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `receiving`
--

CREATE TABLE IF NOT EXISTS `receiving` (
  `RecvRecId` int(10) NOT NULL,
  `RefNo` varchar(20) NOT NULL,
  `RefDt` char(8) NOT NULL,
  `PORefNo` varchar(20) NOT NULL,
  `SeqNo` char(6) NOT NULL,
  `SuppId` varchar(8) NOT NULL,
  `UsrNm` varchar(40) NOT NULL,
  `UsrId` varchar(8) NOT NULL,
  `SerNo` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `receivingitem`
--

CREATE TABLE IF NOT EXISTS `receivingitem` (
  `RecId` int(10) NOT NULL,
  `RefDt` char(8) NOT NULL,
  `RefNo` varchar(20) NOT NULL,
  `PORefNo` varchar(20) NOT NULL,
  `SeqNo` char(6) NOT NULL,
  `ProdNm` varchar(40) NOT NULL,
  `ProdId` varchar(20) NOT NULL,
  `Qty` int(10) NOT NULL,
  `Unit` varchar(4) NOT NULL,
  `SupNm` varchar(40) NOT NULL,
  `SuppId` varchar(8) NOT NULL,
  `UsrNm` varchar(40) NOT NULL,
  `UsrId` varchar(8) NOT NULL,
  `Note1` varchar(20) NOT NULL,
  `Note2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `recvditem`
--

CREATE TABLE IF NOT EXISTS `recvditem` (
  `RItemRecId` int(10) NOT NULL,
  `RecvRecId` int(10) NOT NULL,
  `ProdId` varchar(20) NOT NULL,
  `ProdNm` varchar(40) NOT NULL,
  `Barcode` char(10) NOT NULL,
  `Unit` varchar(4) NOT NULL,
  `Qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `storerequest`
--

CREATE TABLE IF NOT EXISTS `storerequest` (
  `RecId` int(10) NOT NULL,
  `SRType` varchar(1) NOT NULL,
  `RefDt` char(8) NOT NULL,
  `DocNo` varchar(20) NOT NULL,
  `RefNo` varchar(20) NOT NULL,
  `SeqNo` char(6) NOT NULL,
  `UsrId` varchar(8) NOT NULL,
  `DeptCd` varchar(5) NOT NULL,
  `DeptNm` varchar(40) NOT NULL,
  `AlcCd` varchar(5) NOT NULL,
  `AlcNm` varchar(40) NOT NULL,
  `WhId` varchar(8) NOT NULL,
  `WhNm` varchar(40) NOT NULL,
  `ProdNm` varchar(40) NOT NULL,
  `ProdId` varchar(20) NOT NULL,
  `QtyReq` int(10) NOT NULL,
  `QtyApv` int(10) NOT NULL,
  `Unit` varchar(4) NOT NULL,
  `Autkey` bigint(10) NOT NULL,
  `ApvNm` varchar(40) NOT NULL,
  `Note1` varchar(20) NOT NULL,
  `Note2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `SuppRecId` int(10) NOT NULL,
  `SuppNm` varchar(40) NOT NULL,
  `SuppId` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temporary`
--

CREATE TABLE IF NOT EXISTS `temporary` (
  `RefNo` varchar(20) NOT NULL,
  `RefDt` char(8) NOT NULL,
  `DocNo` varchar(20) NOT NULL,
  `EvNm` varchar(40) NOT NULL,
  `EvDt` char(8) NOT NULL,
  `Room` varchar(40) NOT NULL,
  `SeqNo` char(6) NOT NULL,
  `ProdId` varchar(20) NOT NULL,
  `ProdNm` varchar(40) NOT NULL,
  `Barcode` char(10) NOT NULL,
  `Unit` varchar(4) NOT NULL,
  `RQty` int(10) NOT NULL,
  `AQty` int(10) NOT NULL,
  `IQty` int(10) NOT NULL,
  `UsrId` varchar(8) NOT NULL,
  `DeptCd` varchar(5) NOT NULL,
  `DeptNm` varchar(40) NOT NULL,
  `AlcCd` varchar(5) NOT NULL,
  `AlcNm` varchar(40) NOT NULL,
  `WhId` varchar(5) NOT NULL,
  `WhNm` varchar(40) NOT NULL,
  `ApvNm` varchar(40) NOT NULL,
  `IsUnused` varchar(5) NOT NULL,
  `UnusedQty` int(10) NOT NULL,
  `UnusedUsrId` varchar(8) NOT NULL,
  `UnusedUsrNm` varchar(40) NOT NULL,
  `UnusedDt` char(8) NOT NULL,
  `SerNo` varchar(12) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Note1` varchar(20) NOT NULL,
  `Note2` varchar(20) NOT NULL,
  `Note3` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unusedmat`
--

CREATE TABLE IF NOT EXISTS `unusedmat` (
  `UMatRecId` int(10) NOT NULL AUTO_INCREMENT,
  `DocNo` varchar(20) NOT NULL,
  `Barcode` char(10) NOT NULL,
  `FoodNm` varchar(40) NOT NULL,
  `UnusedQty` int(10) DEFAULT NULL,
  `UnusedUsrId` varchar(8) NOT NULL,
  `UnusedUsrNm` varchar(40) NOT NULL,
  `UnusedDt` char(8) NOT NULL,
  PRIMARY KEY (`UMatRecId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=793 ;

--
-- Dumping data untuk tabel `unusedmat`
--

INSERT INTO `unusedmat` (`UMatRecId`, `DocNo`, `Barcode`, `FoodNm`, `UnusedQty`, `UnusedUsrId`, `UnusedUsrNm`, `UnusedDt`) VALUES
(781, 'BEO9876', '9090101007', '', 25, '', 'admin', '20090101'),
(782, 'BEO9876', '9090101008', '', 33, '', 'admin', '20090101'),
(783, 'BEO9876', '9090101009', '', 25, '', 'admin', '20090101'),
(784, 'BEO9870', '9090101010', '', 20, '', 'admin', '20090101'),
(785, 'BEO98870', '', '', 22, '', 'admin', '20150313'),
(786, 'BEO98870', '9150313001', 'Ayam Goreng', NULL, '', 'admin', '20150313'),
(787, 'BEO98870', '9150313002', 'Ayam Goreng', NULL, '', 'admin', '20150313'),
(788, 'BEO98870', '9150313003', 'Ayam Goreng', NULL, '', 'admin', '20150313'),
(789, 'BEO9876', '9150313004', 'Ayam Goreng', NULL, '', 'admin', '20150313'),
(790, 'BEO9876', '9150313005', 'Ayam Goreng', NULL, '', 'admin', '20150313'),
(791, 'BEO9876', '9150313006', 'Ayam Goreng', NULL, '', 'admin', '20150313'),
(792, 'BEO9876', '9150313007', 'Nasi Goreng', NULL, '', 'admin', '20150313');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
