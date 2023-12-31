-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2023 at 06:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4_stok_gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `satuan` text NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual_satuan` int(11) NOT NULL,
  `harga_jual_bijian` int(11) NOT NULL,
  `jumlah_per_satuan` int(11) NOT NULL,
  `foto_barang` text DEFAULT 'default-barang.png',
  `id_merek` int(11) NOT NULL,
  `status` text DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `satuan`, `harga_beli`, `harga_jual_satuan`, `harga_jual_bijian`, `jumlah_per_satuan`, `foto_barang`, `id_merek`, `status`) VALUES
(1, 'Le Minerale kecil 330 ml', 'dus', 100000, 120000, 3000, 24, 'lemineralekecil.jpeg', 1, 'aktif'),
(2, 'Le Minerale tanggung 600 ml', 'dus', 150000, 180000, 5000, 24, 'lemineraletanggung.jpg', 1, 'aktif'),
(3, 'Le Minerale besar 1500 ml', 'dus', 200000, 250000, 8000, 12, 'lemineralebesar.jpg', 1, 'nonaktif'),
(4, 'Cleo kecil', 'dus', 10000, 15000, 1500, 24, 'cleo-mini.jpg', 2, 'nonaktif'),
(5, 'cleo tanggung', 'dus', 30000, 45000, 4000, 24, 'cleo-sedang.png', 2, 'aktif'),
(6, 'cleo galon 19 Liter', 'bijian', 40000, 50000, 50000, 1, 'cleo-galon.jpg', 2, 'aktif'),
(7, 'bubuk msg sasa 100g', 'dus', 25000, 35000, 2000, 20, 'sasa-100g.png', 3, 'aktif'),
(8, 'bubuk msg sasa 1kg', 'dus', 50000, 60000, 5000, 15, 'sasa-1kg.png', 3, 'nonaktif'),
(9, 'Saori saos tiram', 'dus', 50000, 60000, 1000, 100, 'saori-saos-tiram.jpg', 4, 'nonaktif'),
(10, 'sajiku serba guna', 'dus', 60000, 75000, 2000, 50, 'sajiku-serba-guna.jpg', 4, 'aktif'),
(11, 'acne care facial foam 75g', 'dus', 200000, 230000, 23000, 15, 'sariayu-acne.png', 5, 'aktif'),
(12, 'intensive acne serum 12ml', 'dus', 250000, 280000, 28000, 15, 'sariayu-intens.png', 5, 'aktif'),
(13, 'krem masker jerawat 100g', 'dus', 300000, 330000, 35000, 15, 'sariayu-krem.png', 5, 'nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `no_barang_keluar` int(11) NOT NULL,
  `tgl_keluar` datetime NOT NULL DEFAULT current_timestamp(),
  `total_harga` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`no_barang_keluar`, `tgl_keluar`, `total_harga`, `id_user`, `kode_gudang`) VALUES
(1, '2023-11-11 21:12:22', 4000000, 1, 1),
(2, '2023-11-15 20:15:37', 2500000, 2, 2),
(3, '2023-11-25 18:28:17', 340000, 1, 1),
(4, '0000-00-00 00:00:00', 875000, 2, 2),
(5, '2023-12-05 10:20:31', 1305000, 2, 2),
(6, '2023-12-12 09:10:30', 1100000, 1, 1),
(7, '2024-01-02 17:28:37', 1680000, 2, 2),
(8, '2024-01-04 07:11:12', 1680000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `no_barang_masuk` int(11) NOT NULL,
  `tanggal_masuk` datetime NOT NULL DEFAULT current_timestamp(),
  `total_harga` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`no_barang_masuk`, `tanggal_masuk`, `total_harga`, `id_user`, `kode_gudang`) VALUES
(1, '2023-11-03 07:16:42', 4500000, 1, 1),
(2, '2023-11-14 08:22:12', 3500000, 2, 2),
(3, '2023-11-21 06:32:10', 2050000, 1, 1),
(4, '2023-11-22 15:45:23', 650000, 2, 2),
(5, '2023-12-01 11:22:30', 1050000, 2, 2),
(6, '2023-12-11 12:17:10', 1975000, 1, 1),
(7, '2024-01-01 16:41:51', 3750000, 2, 2),
(8, '2024-01-03 07:17:20', 3750000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang_keluar`
--

CREATE TABLE `detail_barang_keluar` (
  `no_barang_keluar` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `satuan` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_per_satuan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_barang_keluar`
--

INSERT INTO `detail_barang_keluar` (`no_barang_keluar`, `kode_barang`, `satuan`, `jumlah`, `harga_per_satuan`, `total_harga`) VALUES
(1, 1, 'dus', 10, 120000, 1200000),
(1, 2, 'dus', 10, 180000, 1800000),
(1, 3, 'dus', 4, 250000, 1000000),
(2, 1, 'dus', 5, 120000, 600000),
(2, 2, 'dus', 5, 180000, 900000),
(2, 3, 'dus', 4, 250000, 1000000),
(3, 4, 'dus', 10, 15000, 150000),
(3, 5, 'dus', 2, 45000, 90000),
(3, 6, 'bijian', 2, 50000, 100000),
(4, 4, 'dus', 15, 15000, 225000),
(4, 5, 'dus', 10, 45000, 450000),
(4, 6, 'bijian', 4, 50000, 200000),
(5, 7, 'dus', 15, 35000, 525000),
(5, 8, 'dus', 4, 60000, 240000),
(5, 9, 'dus', 4, 60000, 240000),
(5, 10, 'dus', 4, 75000, 300000),
(6, 7, 'dus', 10, 35000, 350000),
(6, 8, 'dus', 5, 60000, 300000),
(6, 9, 'dus', 5, 60000, 300000),
(6, 10, 'dus', 2, 75000, 150000),
(7, 11, 'dus', 2, 230000, 460000),
(7, 12, 'dus', 2, 280000, 560000),
(7, 13, 'dus', 2, 330000, 660000),
(8, 11, 'dus', 2, 230000, 460000),
(8, 12, 'dus', 2, 280000, 560000),
(8, 13, 'dus', 2, 330000, 660000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang_masuk`
--

CREATE TABLE `detail_barang_masuk` (
  `no_barang_masuk` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `satuan` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_barang_masuk`
--

INSERT INTO `detail_barang_masuk` (`no_barang_masuk`, `kode_barang`, `satuan`, `jumlah`, `harga`, `total_harga`) VALUES
(1, 1, 'dus', 20, 100000, 2000000),
(1, 2, 'dus', 10, 150000, 1500000),
(1, 3, 'dus', 5, 200000, 1000000),
(2, 1, 'dus', 10, 100000, 1000000),
(2, 2, 'dus', 10, 150000, 1500000),
(2, 3, 'dus', 5, 200000, 1000000),
(3, 4, 'dus', 25, 10000, 250000),
(3, 5, 'dus', 20, 30000, 600000),
(3, 6, 'bijian', 30, 40000, 1200000),
(4, 4, 'dus', 15, 10000, 150000),
(4, 5, 'dus', 10, 30000, 300000),
(4, 6, 'bijian', 50, 40000, 200000),
(5, 7, 'dus', 10, 25000, 250000),
(5, 8, 'dus', 5, 50000, 250000),
(5, 9, 'dus', 5, 50000, 250000),
(5, 10, 'dus', 5, 60000, 300000),
(6, 7, 'dus', 15, 25000, 375000),
(6, 8, 'dus', 10, 50000, 500000),
(6, 9, 'dus', 10, 50000, 500000),
(6, 10, 'dus', 10, 60000, 600000),
(7, 11, 'dus', 5, 200000, 1000000),
(7, 12, 'dus', 5, 250000, 1250000),
(7, 13, 'dus', 5, 300000, 1500000),
(8, 11, 'dus', 5, 200000, 1000000),
(8, 12, 'dus', 5, 250000, 1250000),
(8, 13, 'dus', 5, 300000, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `kode_gudang` int(11) NOT NULL,
  `nama_gudang` text NOT NULL,
  `jenis` text NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  `foto_gudang` text NOT NULL,
  `status` text NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`kode_gudang`, `nama_gudang`, `jenis`, `alamat`, `keterangan`, `foto_gudang`, `status`) VALUES
(1, 'Gudang Utama', 'besar', 'JL BESAR', 'ini adalah gudang utama 1', '1.png', 'aktif'),
(2, 'Gudang Kecil 1', 'kecil', 'Gang Buntu', 'ini adalah gudang cabang ...', '2.jpg', 'aktif'),
(3, 'Gudang Kecil 2', 'kecil', 'Gang 1', 'ini adalah gudang cabang ...', 'default-gudang.png', 'nonaktif'),
(4, 'Gudang Kecil 3', 'kecil', 'Gang 3', 'ini adalah gudang cabang ...', '3.jpeg', 'aktif');

-- --------------------------------------------------------

--
-- Stand-in structure for view `info_user`
-- (See below for the actual view)
--
CREATE TABLE `info_user` (
`Id User` int(11)
,`Username` text
,`No HP` text
,`Email` text
,`Kode Gudang` int(11)
,`Nama Gudang` text
);

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id_merek` int(11) NOT NULL,
  `nama_merek` text NOT NULL,
  `kategori_produk` text NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` text DEFAULT 'default-merek.png',
  `pemilik` text DEFAULT NULL,
  `status` text DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id_merek`, `nama_merek`, `kategori_produk`, `deskripsi`, `logo`, `pemilik`, `status`) VALUES
(1, 'Le Minerale', 'Air Mineral', 'Le minerale merupakan merek air minum dalam kemasan (AMDK) di Indonesia yang diproduksi oleh PT Tirta Fresindo Jaya yang merupakan anak perusahaan dari PT Mayora Indah yang bergerak dalam bidang beverages.\r\n\r\nMenurut informasi Le Minerale telah hadir sejak tahun 2015. Pabrik Le Minerale sendiri berada di beberapa daerah di Indonesia seperti Ciawi, Sukabumi, Pasuruan, Medan, dan Makassar. Selain itu, terdapat dua pabrik tambahan yang baru dibangun di akhir 2016 yakni daerah Cianjur dan Palembang. Tentu saja Le Minerale bisa menjadi alternatif produk lokal Indonesia yang dapat menggantikan produk Israel terutama di air minum dalam kemasan.', 'logo-lemineral.png', 'PT Tirta Fresindo Jaya', 'aktif'),
(2, 'Cleo', 'Air Mineral', 'Cleo merupakan air minum dalam kemasan dengan diferensiasi air minum yang didirikan di Indonesia oleh PT. Sariguna Primatirta Tbk pada tahun 2004. Awalnya produk Cleo hanya dipasarkan di Jawa Timur saja, namun perusahaan ini kemudian berekspansi dengan mendirikan sejumlah pabrik di luar Jawa Timur.\r\n\r\nPemilik dari Cleo adalah Hermanto Tanoko yang merupakan konglomerat RI yang kerap dijuluki \'Crazy Rich\' asal Surabaya. Oleh karena itu, Cleo juga dapat menjadi produk lokal Indonesia pengganti produk Israel.', 'logo-cleo.png', 'PT. Sariguna Primatirta Tbk', 'aktif'),
(3, 'Sasa', 'Bumbu Masakan', 'Didirikan pada tahun 1968, PT Sasa Inti adalah perusahaan makanan sehat dan bumbu terkemuka asal Indonesia. Perusahaan ini terkenal karena memproduksi MSG pertama kalinya, yang dibuat melalui proses fermentasi.\r\n\r\nTentunya produk dari PT Sasa Inti dapat menjadi alternatif produk lokal Indonesia, dengan variasi produk yang beragam seperti Tepung Bumbu, Santan, Bumbu Instan, Kaldu, dan bumbu-bumbu lainnya.', 'logo-sasa.png', 'PT Sasa Inti', 'aktif'),
(4, 'Ajinomoto', 'Bumbu Masakan', 'PT. Ajinomoto Indonesia adalah perusahaan yang memproduksi berbagai bumbu penyedap masakan. Perusahaan ini memiliki kantor pusat di Jepang di mana Ajinomoto pusat merupakan salah satu dari 36 perusahaan makanan dan minuman terbesar di dunia.\r\n\r\nSalah satu produk yang terkenal dari Ajinomoto yakni Masako. mendapatkan penghargaan Favorite Halal Brand dari kategori bumbu, perisa, dan bahan tambahan pangan, dalam Halal Award 2023 yang diselenggarakan oleh LPPOM MUI.', 'logo-ajinomoto.png', 'PT. Ajinomoto Indonesia', 'aktif'),
(5, 'Sariayu', 'Perawatan Tubuh', 'Sariayu Martha Tilaar merupakan produk kosmetik lokal pertama dari PT Martina Berto, Tbk. Berawal dari salon di garasi rumah yang didirikan pada tahun 1971, terciptalah produk kecantikan Sariayu Martha Tilaar yang diluncurkan pada tahun 1977.\r\n\r\nSaat ini hampir semua produk Sariayu telah mendapatkan sertifikat halal\r\ntermasuk Sariayu Hijab Hair Care Series, Sariayu Putih Langsat Series, Sariayu\r\nColor Trend dan yang terbaru yaitu Sariayu Two Way Cake dan Sariayu Lipstik. Tentunya dengan memilih produk Sariayu, konsumen tidak hanya mendukung produk lokal tetapi juga dapat menemukan produk yang cocok dengan jenis kulit mereka.', 'logo-sariayu.png', 'PT Martina Berto, Tbk', 'aktif'),
(6, 'Wardah', 'Perawatan Tubuh', 'Wardah merupakan brand kosmetik halal asli Indonesia yang berdiri sejak 1995 di bawah PT. Paragon Technology and Innovation (PT. PTI). Wardah mempunyai prinsip untuk mengedepankan kualitas dalam mendukung perempuan agar tampil cantik sesuai karakternya.\r\n\r\nProduk-produk Wardah mencakup berbagai jenis kosmetik, perawatan kulit, dan produk perawatan pribadi. Merek ini memiliki komitmen untuk menyediakan produk yang ramah lingkungan dan halal. Tentunya ini bisa menjadi produk lokal yang patut untuk dicoba dan dipertimbangkan.', 'default-merek.png', 'PT. Paragon Technology and Innovation (PT. PTI)', 'aktif'),
(7, 'Scarlett', 'Perawatan Tubuh', 'Scarlett Whitening adalah salah satu produk perawatan kecantikan yang berasal dari Indonesia. Scarlett Whitening didirikan pada tahun 2017 oleh Felicya Angelista, yakni seorang publik figur yang pernah menghiasi layar kaca Indonesia, baik melalui film maupun sinetron.\r\n\r\nTentunya, produk ini tidak kalah bagus dari produk-produk Israel dan bisa menjadi produk lokal Indonesia yang baik dengan berbagai produk perawatan kulit, mulai dari sabun hingga lotion, yang dirancang untuk menjaga kulit tetap sehat dan terawat.\r\n', 'default-merek.png', 'Felicya Angelista', 'nonaktif'),
(8, 'Kapal Api', 'Kopi', 'Kapal api merupakan merek kopi terkenal asal Indonesia yang didirikan oleh  PT Santos Jaya Abadi. Saat ini produk kapal api sudah mulai dikenal ke mancanegara mulai dari Arab Saudi, Malaysia, Uni Emirat Arab dan lainnya.\r\n\r\nKapal Api juga aktif dalam mendukung program-program keberlanjutan dan membantu petani kopi lokal. Dengan rasa kopi yang khas dan beragam pilihan produk, Kapal Api adalah salah satu pilihan utama bagi para pecinta kopi di Indonesia.', 'default-merek.png', 'PT Santos Jaya Abadi', 'aktif'),
(9, 'Excelso', 'Kopi', 'Excelso merupakan sebuah waralaba kedai kopi yang berasal dari Indonesia. Perusahan lokal ini didirikan oleh PT. Excelso Multirasa pada tahun 1991. Kedai kopi seperti Excelso juga memainkan peran penting dalam mempromosikan budaya kopi lokal dan menciptakan lapangan kerja.\r\n\r\nExcelso menjadi tempat bagi para pecinta kopi untuk berkumpul, berdiskusi, dan menikmati kopi dengan kualitas terbaik. Sebagai sebuah merek kopi lokal yang telah mengukir nama baik di dalam negeri, Excelso adalah salah satu pilihan utama bagi mereka yang ingin menikmati kopi berkualitas tinggi yang dihasilkan di Indonesia.', 'default-merek.png', 'PT. Excelso Multirasa', 'nonaktif'),
(10, 'Ultra Milk', 'Susu', 'Ultra Milk merupakan produsen minuman yang berasal dari Indonesia. Perusahaan lokal ini berdiri pada tahun 1958 di Bandung, Jawa Barat. Merek ini menawarkan berbagai jenis susu, mulai dari susu coklat hingga susu rendah lemak.\r\n\r\nProduk-produk Ultra Milk terkenal karena kualitasnya yang tinggi dan tersedia dalam berbagai ukuran. Dengan dukungan konsumen yang besar, Ultra Milk adalah salah satu pilihan utama untuk susu lokal Indonesia sehingga dapat menggantikan produk susu dari Israel.', 'default-merek.png', 'P.T. ULTRAJAYA MILK INDUSTRY', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `stok_barang`
--

CREATE TABLE `stok_barang` (
  `kode_barang` int(11) NOT NULL,
  `satuan` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kode_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok_barang`
--

INSERT INTO `stok_barang` (`kode_barang`, `satuan`, `jumlah`, `kode_gudang`) VALUES
(1, 'dus', 20, 1),
(2, 'dus', 10, 1),
(3, 'dus', 5, 1),
(4, 'dus', 20, 1),
(5, 'dus', 18, 1),
(6, 'bijian', 30, 1),
(7, 'dus', 30, 1),
(8, 'dus', 10, 1),
(9, 'dus', 25, 1),
(10, 'dus', 25, 1),
(11, 'dus', 15, 1),
(12, 'dus', 15, 1),
(13, 'dus', 10, 1),
(1, 'dus', 10, 2),
(2, 'dus', 10, 2),
(3, 'dus', 5, 2),
(4, 'dus', 20, 2),
(5, 'dus', 18, 2),
(6, 'bijian', 30, 2),
(7, 'dus', 30, 2),
(8, 'dus', 10, 2),
(9, 'dus', 25, 2),
(10, 'dus', 25, 2),
(11, 'dus', 15, 2),
(12, 'dus', 15, 2),
(13, 'dus', 10, 2),
(1, 'dus', 10, 3),
(2, 'dus', 11, 3),
(3, 'dus', 12, 3),
(4, 'dus', 13, 3),
(5, 'dus', 14, 3),
(6, 'bijian', 15, 3),
(7, 'dus', 16, 3),
(8, 'dus', 17, 3),
(9, 'dus', 18, 3),
(10, 'dus', 19, 3),
(11, 'dus', 18, 3),
(12, 'dus', 17, 3),
(13, 'dus', 16, 3),
(1, 'dus', 0, 4),
(2, 'dus', 1, 4),
(3, 'dus', 2, 4),
(4, 'dus', 3, 4),
(5, 'dus', 4, 4),
(6, 'bijian', 5, 4),
(7, 'dus', 6, 4),
(8, 'dus', 7, 4),
(9, 'dus', 8, 4),
(10, 'dus', 9, 4),
(11, 'dus', 8, 4),
(12, 'dus', 7, 4),
(13, 'dus', 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` text NOT NULL,
  `email` text NOT NULL,
  `no_hp` text NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` text DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `email`, `no_hp`, `alamat`, `deskripsi`, `status`) VALUES
(1, 'PT. KOMINDO BIZOLUSI', 'komindo@mail.id', '213514201', 'Jalan Musi No 28, Jakarta Pusat, Indonesia 10150', 'tidak ada deskripsi', 'aktif'),
(2, 'CV. Amaly Food', 'rrr@mail.sch', '313986744', 'JL. Sunan Prapen II no. 76 Gresik Jawa Timur', 'deskripsi tidak ada ya', 'aktif'),
(3, 'CV PT AMMM', 'amm@g.co', '40404040', 'jalan error 404', 'jkjkj', 'nonaktif'),
(4, 'PT 123 Terbuka', '123@gmail', '123', 'jalan 123', 'tidak ada deskripsi', 'aktif'),
(5, 'CV 123 Terbuka', '321@gmail', '321', 'jalan 321', 'ada deskripsi', 'nonaktif'),
(6, 'PT 123 Tertutup', '777@gmail', '777', 'jalan 777', 'deskripsi tidak ada', 'nonaktif'),
(7, 'CV 123 Terbuka', '999@gmail', '999', 'jalan 999', 'deskripsi ada', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `no_hp` text NOT NULL,
  `email` text NOT NULL,
  `foto_user` text NOT NULL,
  `kode_gudang` int(11) NOT NULL,
  `status` text NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `no_hp`, `email`, `foto_user`, `kode_gudang`, `status`) VALUES
(1, 'aliali', 'ed9c6b92b65cb04655c6e93e6c476545', '222222222', 'qqqqq@gmail.com', '20231230024518_N8H7QZH5_wallpaperflare.com_wallpaper.jpg', 1, 'aktif'),
(2, 'abuabu', '2c6101a64935a3bbd5c67f2fb461c4f3', '1234509876', 'abuabu@email.com', 'traveller_sinis.png', 2, 'aktif'),
(3, 'siti', '6e3efc8c14f930d71f7cb946adabdd31', '0000', 'email.com', 'luffy-bg000.jpg', 3, 'nonaktif'),
(4, 'nur', '93868666d04f24c4ebb01c8bf71d5776', '7777777', 'nur@sch.id', 'wanderer.png', 4, 'aktif'),
(7, 'us', '144cce165e9b405a014d015e9059a7fd', '001010110', '01@eml.go', '20231225101408_AyEo01qn_baby_pales.jpg', 3, 'aktif'),
(8, 'as', '05f7088afd7bcdd7cc818c7ebe7b56cc', '2222', '2@g.c', 'default-user.png', 4, 'nonaktif'),
(9, 'us', 'df483402b9bfeb234717a32c6e86280e', '45450000', 'hi@gg.co.id', 'default-user.png', 2, 'nonaktif');

-- --------------------------------------------------------

--
-- Structure for view `info_user`
--
DROP TABLE IF EXISTS `info_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_user`  AS SELECT `u`.`id_user` AS `Id User`, `u`.`username` AS `Username`, `u`.`no_hp` AS `No HP`, `u`.`email` AS `Email`, `g`.`kode_gudang` AS `Kode Gudang`, `g`.`nama_gudang` AS `Nama Gudang` FROM (`users` `u` join `gudang` `g`) WHERE `u`.`kode_gudang` = `g`.`kode_gudang` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `id_merek` (`id_merek`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`no_barang_keluar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_gudang` (`kode_gudang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`no_barang_masuk`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_gudang` (`kode_gudang`);

--
-- Indexes for table `detail_barang_keluar`
--
ALTER TABLE `detail_barang_keluar`
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `no_barang_keluar` (`no_barang_keluar`);

--
-- Indexes for table `detail_barang_masuk`
--
ALTER TABLE `detail_barang_masuk`
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `no_barang_masuk` (`no_barang_masuk`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`kode_gudang`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_gudang` (`kode_gudang`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `kode_gudang` (`kode_gudang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `no_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `no_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `kode_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `id_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_merek`) REFERENCES `merek` (`id_merek`);

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`kode_gudang`) REFERENCES `gudang` (`kode_gudang`);

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`kode_gudang`) REFERENCES `gudang` (`kode_gudang`);

--
-- Constraints for table `detail_barang_keluar`
--
ALTER TABLE `detail_barang_keluar`
  ADD CONSTRAINT `detail_barang_keluar_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`),
  ADD CONSTRAINT `detail_barang_keluar_ibfk_2` FOREIGN KEY (`no_barang_keluar`) REFERENCES `barang_keluar` (`no_barang_keluar`);

--
-- Constraints for table `detail_barang_masuk`
--
ALTER TABLE `detail_barang_masuk`
  ADD CONSTRAINT `detail_barang_masuk_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`),
  ADD CONSTRAINT `detail_barang_masuk_ibfk_2` FOREIGN KEY (`no_barang_masuk`) REFERENCES `barang_masuk` (`no_barang_masuk`);

--
-- Constraints for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD CONSTRAINT `stok_barang_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`),
  ADD CONSTRAINT `stok_barang_ibfk_2` FOREIGN KEY (`kode_gudang`) REFERENCES `gudang` (`kode_gudang`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`kode_gudang`) REFERENCES `gudang` (`kode_gudang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
