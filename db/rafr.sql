-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_rafr
CREATE DATABASE IF NOT EXISTS `db_rafr` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_rafr`;

-- Dumping structure for table db_rafr.tb_barang
CREATE TABLE IF NOT EXISTS `tb_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `image` text DEFAULT NULL,
  `berat` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_rafr.tb_barang: ~5 rows (approximately)
INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `id_kategori`, `harga`, `deskripsi`, `image`, `berat`) VALUES
	(1, 'Thelema Quest MOD 200W', 1, 500000, 'Dimensi: 56.1*27.6*92.5mm\r\nBaterai: baterai Lithium ganda 18650 (tidak termasuk)\r\nTegangan Input: 6.0V-8.4V\r\nTegangan baterai: 3.0V-4.2V\r\nTegangan Output: 0.7V-8.0V\r\nRentang daya: 5-200W\r\nArus masukan: 1 a-40 A\r\nKisaran suhu: 200F-600F\r\nPiksel layar: 0.96 "80*160\r\nBahan tubuh: Zinc-Alloy\r\n\r\nPaket:\r\n1x Thelema Quest 200W Box Mod\r\n1x kabel Tipe C\r\n1x panduan pengguna\r\n1x kartu garansi', 'ThelemaQuest_Cover1.jpg', 1000),
	(2, 'Calibburn GK2 Pod', 2, 325000, 'Spesifikasi\r\nDimensi: 72.2mm * 46.6mm * 16.3mm \r\nKapasitas kartrid: 2ml \r\nBerat: 45.2g \r\nKeluaran: 18W \r\nBaterai: 690mAh \r\nBahan: PA, PC + ABS, kaca silikat \r\nKoil: \r\nDisinfektan UN2 mesh-h 1,2Ω CALIBURN G2 Coil (pra-instal) \r\nDisinfektan UN2 Meshed-H 0,8Ω CALIBURN G Coil (cadangan)\r\n\r\nDaftar paket\r\n1 x sistem Pod Caliburn GK2 \r\nKumparan berselubung 1x1,2 ohm UN2 \r\n1 x 0.8ohm UN2 berselubung H kumparan \r\n1 panduan pengguna \r\n1 x kabel pengisian daya Tipe C \r\n1 x Lanyard', 'Uwell_Calibburn_GK2_Cover.jpg', 352),
	(3, 'Pulse AIO Kit Mini', 3, 800000, 'Parameter pulse AIO Mini:\r\nMerek: Vandy Vape\r\nNama produk: alat pulsa AIO Mini\r\nUkuran: 52.5*92.5*26.2mm\r\nRentang daya: 5-80W\r\nTegangan Output: 0.5-6.0V\r\nArus Output Maxim: 32A\r\nPengisian tegangan masukan: 5 ± 0.25V\r\nResistansi: 0.05-3,0 Ω(± 5%)\r\nArus pengisian daya: 1000mAh\r\nJenis baterai: 18650 baterai (tidak termasuk)\r\nKapasitas Pod RBA: 4.6ml\r\nKapasitas polong pra-bangun: 5ml\r\nWarna: hitam, biru beku, hitam beku, ungu beku, kuning jeli, hijau Mint\r\n\r\nPaket Vandy Vape Pulse AIO Mini Kit dengan versi RBA dilengkapi dengan:\r\n1 * perangkat Mini Pulse AIO\r\n1 * tangki RBA pembuluh nadi\r\n1 * pulsa kapal pra-dibangun tangki\r\n2 * gulungan VVC\r\n1 * 24ga Ni80 Coil 0.4ohm\r\n1 * tas aksesori\r\n1 * Panduan kumparan timah\r\n1 * kunci pas\r\n1 * instruksi Manual\r\n1 * kabel USB Tipe C QC\r\n1 * Set Tombol bulat Bonus', 'Pulse_AIO_Cover.jpg', 500),
	(4, 'Geekvape T200 Box Mod', 1, 875000, 'Parameter:\r\nMerek: GeekVape\r\nNama produk: T200 (Aegis Sentuh) kotak Mod\r\nJenis baterai: baterai 18650 eksternal ganda (tidak termasuk)\r\nDaya keluaran: 5W-200W (sesuaikan 1W setiap kali)\r\nOutput Mode:Power, TC-SS, TC-TCR (VPC, Smart Bypass)\r\nTampilan layar: 2.4 inci TFT layar sentuh warna\r\nArus Output maksimal: 45A\r\nTegangan Output maksimal: 12V\r\nPort pengisian daya: Port Tipe C\r\nKisaran resistansi kartrid: 0.1-2Ω\r\nSuhu operasi: 10 ° C ~ 60 ° C\r\nSuhu penyimpanan:-30 ° C ~ 70 ° C\r\nKelembaban relatif: 45% RH ~ 75% RH\r\nMode pendinginan: pendinginan alami\r\n\r\nPaket kotak Mod T200 dilengkapi dengan:\r\n1 * Geekvape T200 (Aegis Touch) Mod\r\n1 * kabel USB (tipe-c)', 'Geekvape_T200_Cover.jpg', 250),
	(5, 'cek', 1, 600000, 'cem', 'w6.jpg', 1230);

-- Dumping structure for table db_rafr.tb_detail_transaksi
CREATE TABLE IF NOT EXISTS `tb_detail_transaksi` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `no_order` varchar(15) NOT NULL,
  `id_barang` int(11) NOT NULL DEFAULT 0,
  `qty` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_rafr.tb_detail_transaksi: ~0 rows (approximately)

-- Dumping structure for table db_rafr.tb_image
CREATE TABLE IF NOT EXISTS `tb_image` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_rafr.tb_image: ~12 rows (approximately)
INSERT INTO `tb_image` (`id_image`, `id_barang`, `keterangan`, `image`) VALUES
	(1, 4, 'Geekvape T200_1', 'Geekvape_T200_1.jpg'),
	(2, 4, 'Geekvape T200_2', 'Geekvape_T200_2.jpg'),
	(3, 4, 'Geekvape T200_3', 'Geekvape_T200_3.jpg'),
	(4, 3, 'Pulse AIO_1', 'Pulse_AIO_1.jpg'),
	(5, 3, 'Pulse AIO_1', 'Pulse_AIO_2.jpg'),
	(6, 3, 'Pulse AIO_1', 'Pulse_AIO_3.jpg'),
	(7, 2, 'Uwell Calibburn GK2_1', 'Uwell_Calibburn_GK2_1.jpg'),
	(8, 2, 'Uwell Calibburn GK2_2', 'Uwell_Calibburn_GK2_2.jpg'),
	(9, 2, 'Uwell Calibburn GK2_3', 'Uwell_Calibburn_GK2_3.jpg'),
	(10, 1, 'ThelemaQuest_1', 'ThelemaQuest_1.jpg'),
	(12, 1, 'ThelemaQuest_2', 'ThelemaQuest_2.jpg'),
	(13, 1, 'ThelemaQuest_3', 'ThelemaQuest_3.jpg');

-- Dumping structure for table db_rafr.tb_kategori
CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_rafr.tb_kategori: ~4 rows (approximately)
INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
	(1, 'Mod'),
	(2, 'Pod'),
	(3, 'Aio'),
	(4, 'Liquid');

-- Dumping structure for table db_rafr.tb_pelanggan
CREATE TABLE IF NOT EXISTS `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `image` text DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_rafr.tb_pelanggan: ~0 rows (approximately)

-- Dumping structure for table db_rafr.tb_rekening
CREATE TABLE IF NOT EXISTS `tb_rekening` (
  `id_rekening` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rekening` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_rekening`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_rafr.tb_rekening: ~3 rows (approximately)
INSERT INTO `tb_rekening` (`id_rekening`, `nama_bank`, `no_rekening`, `atas_nama`) VALUES
	(1, 'Bank Mandiri', '132-003600-0009', 'Farrel Ardian'),
	(2, 'Bank Central Asia (BCA)', '6280-66-9600', 'Farrel Ardian'),
	(3, 'Bank Negara Indonesia (BN', '019-886-9291', 'Farrel Ardian');

-- Dumping structure for table db_rafr.tb_setting
CREATE TABLE IF NOT EXISTS `tb_setting` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `lokasi` int(11) NOT NULL,
  `alamat_toko` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_rafr.tb_setting: ~1 rows (approximately)
INSERT INTO `tb_setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telepon`) VALUES
	(1, 'RAFR VapeStore', 399, 'Jl. Kencono Wungu Selatan 3, Kota Semarang', '089603450314');

-- Dumping structure for table db_rafr.tb_transaksi
CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) DEFAULT NULL,
  `no_order` varchar(20) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_penerima` varchar(25) DEFAULT NULL,
  `tlp_penerima` varchar(25) DEFAULT NULL,
  `provinsi` varchar(25) DEFAULT NULL,
  `kota` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(8) DEFAULT NULL,
  `expedisi` varchar(255) DEFAULT NULL,
  `paket` varchar(255) DEFAULT NULL,
  `estimasi` varchar(255) DEFAULT NULL,
  `ongkir` int(50) DEFAULT 0,
  `berat` varchar(255) DEFAULT NULL,
  `grand_total` int(11) DEFAULT 0,
  `total_bayar` int(11) DEFAULT 0,
  `status_bayar` int(1) DEFAULT 0,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT '',
  `nama_bank` varchar(25) DEFAULT '',
  `no_rekening` varchar(25) DEFAULT '0',
  `status_order` int(11) DEFAULT 0,
  `no_resi` varchar(25) DEFAULT '0',
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_rafr.tb_transaksi: ~0 rows (approximately)

-- Dumping structure for table db_rafr.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `level_user` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_rafr.tb_user: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
