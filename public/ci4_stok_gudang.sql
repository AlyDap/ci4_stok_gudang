-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2023 pada 07.21
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `satuan` text NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual_satuan` int(11) NOT NULL,
  `harga_jual_bijian` int(11) NOT NULL,
  `jumlah_per_satuan` int(11) NOT NULL,
  `foto_barang` text NOT NULL,
  `id_merek` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `satuan`, `harga_beli`, `harga_jual_satuan`, `harga_jual_bijian`, `jumlah_per_satuan`, `foto_barang`, `id_merek`, `status`) VALUES
(1, 'Le Minerale kecil 330 ml', 'dus', 100000, 20000, 3000, 24, 'lemineralekecil.jpeg', 1, 'aktif'),
(2, 'Le Minerale tanggung 600 ml', 'dus', 150000, 30000, 5000, 24, 'lemineraletanggung.jpg', 1, 'aktif'),
(3, 'Le Minerale besar 1500 ml', 'dus', 200000, 50000, 8000, 12, 'lemineralebesar.jpg', 1, 'nonaktif'),
(4, 'n', 's', 0, 1, 2, 3, 'f', 1, 'nonaktif'),
(5, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(6, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(7, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(8, 'n', 's', 0, 1, 2, 3, 'f', 1, 'nonaktif'),
(9, 'n', 's', 0, 1, 2, 3, 'f', 1, 'nonaktif'),
(10, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(11, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(12, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(13, 'n', 's', 0, 1, 2, 3, 'f', 1, 'nonaktif'),
(14, 'n', 's', 0, 1, 2, 3, 'f', 1, 'nonaktif'),
(15, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(16, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(17, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(18, 'n', 's', 0, 1, 2, 3, 'f', 1, 'nonaktif'),
(19, 'n', 's', 0, 1, 2, 3, 'f', 1, 'nonaktif'),
(20, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(21, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(22, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(23, 'n', 's', 0, 1, 2, 3, 'f', 1, 'nonaktif'),
(24, 'n', 's', 0, 1, 2, 3, 'f', 1, 'nonaktif'),
(25, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(26, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(27, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(28, 'n', 's', 0, 1, 2, 3, 'f', 1, 'nonaktif'),
(29, 'n', 's', 0, 1, 2, 3, 'f', 1, 'nonaktif'),
(30, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(31, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `no_barang_keluar` int(11) NOT NULL,
  `tgl_keluar` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL,
  `kode_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `no_barang_masuk` int(11) NOT NULL,
  `tanggal_masuk` datetime NOT NULL DEFAULT current_timestamp(),
  `total_harga` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`no_barang_masuk`, `tanggal_masuk`, `total_harga`, `id_user`, `kode_gudang`) VALUES
(1, '2023-11-13 07:16:42', 4500000, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_barang_keluar`
--

CREATE TABLE `detail_barang_keluar` (
  `no_barang_keluar` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `satuan` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_per_satuan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_barang_masuk`
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
-- Dumping data untuk tabel `detail_barang_masuk`
--

INSERT INTO `detail_barang_masuk` (`no_barang_masuk`, `kode_barang`, `satuan`, `jumlah`, `harga`, `total_harga`) VALUES
(1, 1, 'dus', 20, 100000, 2000000),
(1, 2, 'dus', 10, 150000, 1500000),
(1, 3, 'dus', 5, 200000, 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang`
--

CREATE TABLE `gudang` (
  `kode_gudang` int(11) NOT NULL,
  `nama_gudang` text NOT NULL,
  `jenis` text NOT NULL,
  `alamat` text NOT NULL,
  `foto_gudang` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gudang`
--

INSERT INTO `gudang` (`kode_gudang`, `nama_gudang`, `jenis`, `alamat`, `foto_gudang`, `status`) VALUES
(1, 'Gudang Utama', 'besar', 'JL BESAR', '1.png', 'aktif'),
(2, 'Gudang Kecil 1', 'kecil', 'Gang Buntu', '2.jpg', 'aktif'),
(3, 'Gudang Kecil 2', 'kecil', 'Gang 1', '2.jpg', 'nonaktif'),
(4, 'Gudang Kecil 3', 'kecil', 'Gang 3', '2.jpg', 'aktif'),
(7, 'aaa', 'besar', 'bbb', '3.jpeg', 'nonaktif'),
(8, 'bbbb1', 'kecil', 'cccc2', '3.jpeg', 'aktif'),
(9, '1111', 'besar', '222', '3.jpeg', 'nonaktif'),
(10, 'asd', 'besar', 'dsa', 'R (1).jpeg', 'nonaktif'),
(11, 'eheheh', 'besar', 'aaalaa;aa', 'MENU - LANDING PAGE (1).png', 'nonaktif'),
(12, 'awwaa', 'kecil', 'ssass', '3.jpeg', 'aktif'),
(13, 'aku', 'besar', 'anak', '3.jpeg', 'nonaktif'),
(14, 'aaaaaaaaaa', 'besar', 'sssssssssss', 'image.png', 'nonaktif'),
(15, '12', 'kecil', '21', 'GDSC23-Background-Workshop.jpg', 'aktif'),
(16, 'iput 14', 'kecil', '14 in', '', 'aktif'),
(17, 'input15', 'besar', 'in15', 'default-gudang.png', 'nonaktif'),
(18, 'inpu166', 'besar', 'in166', '', 'nonaktif'),
(19, 'inp171', 'kecil', '177', 'GDSC23-Background-Workshop.jpg', 'nonaktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merek`
--

CREATE TABLE `merek` (
  `id_merek` int(11) NOT NULL,
  `nama_merek` text NOT NULL,
  `kategori_produk` text NOT NULL,
  `deskripsi` text NOT NULL,
  `logo` text NOT NULL,
  `pemilik` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `merek`
--

INSERT INTO `merek` (`id_merek`, `nama_merek`, `kategori_produk`, `deskripsi`, `logo`, `pemilik`, `status`) VALUES
(1, 'Le Minerale', 'Air Mineral', 'Le minerale merupakan merek air minum dalam kemasan (AMDK) di Indonesia yang diproduksi oleh PT Tirta Fresindo Jaya yang merupakan anak perusahaan dari PT Mayora Indah yang bergerak dalam bidang beverages.\r\n\r\nMenurut informasi Le Minerale telah hadir sejak tahun 2015. Pabrik Le Minerale sendiri berada di beberapa daerah di Indonesia seperti Ciawi, Sukabumi, Pasuruan, Medan, dan Makassar. Selain itu, terdapat dua pabrik tambahan yang baru dibangun di akhir 2016 yakni daerah Cianjur dan Palembang. Tentu saja Le Minerale bisa menjadi alternatif produk lokal Indonesia yang dapat menggantikan produk Israel terutama di air minum dalam kemasan.', '-', 'PT Tirta Fresindo Jaya', 'aktif'),
(2, 'Cleo', 'Air Mineral', 'Cleo merupakan air minum dalam kemasan dengan diferensiasi air minum yang didirikan di Indonesia oleh PT. Sariguna Primatirta Tbk pada tahun 2004. Awalnya produk Cleo hanya dipasarkan di Jawa Timur saja, namun perusahaan ini kemudian berekspansi dengan mendirikan sejumlah pabrik di luar Jawa Timur.\r\n\r\nPemilik dari Cleo adalah Hermanto Tanoko yang merupakan konglomerat RI yang kerap dijuluki \'Crazy Rich\' asal Surabaya. Oleh karena itu, Cleo juga dapat menjadi produk lokal Indonesia pengganti produk Israel.', '-', ' PT. Sariguna Primatirta Tbk', 'aktif'),
(3, 'Sasa', 'Bumbu Masakan', 'Didirikan pada tahun 1968, PT Sasa Inti adalah perusahaan makanan sehat dan bumbu terkemuka asal Indonesia. Perusahaan ini terkenal karena memproduksi MSG pertama kalinya, yang dibuat melalui proses fermentasi.\r\n\r\nTentunya produk dari PT Sasa Inti dapat menjadi alternatif produk lokal Indonesia, dengan variasi produk yang beragam seperti Tepung Bumbu, Santan, Bumbu Instan, Kaldu, dan bumbu-bumbu lainnya.', '-', 'PT Sasa Inti', 'aktif'),
(4, 'Ajinomoto', 'Bumbu Masakan', 'PT. Ajinomoto Indonesia adalah perusahaan yang memproduksi berbagai bumbu penyedap masakan. Perusahaan ini memiliki kantor pusat di Jepang di mana Ajinomoto pusat merupakan salah satu dari 36 perusahaan makanan dan minuman terbesar di dunia.\r\n\r\nSalah satu produk yang terkenal dari Ajinomoto yakni Masako. mendapatkan penghargaan Favorite Halal Brand dari kategori bumbu, perisa, dan bahan tambahan pangan, dalam Halal Award 2023 yang diselenggarakan oleh LPPOM MUI.', '-', 'PT. Ajinomoto Indonesia', 'aktif'),
(5, 'Sariayu', 'Perawatan Tubuh', 'Sariayu Martha Tilaar merupakan produk kosmetik lokal pertama dari PT Martina Berto, Tbk. Berawal dari salon di garasi rumah yang didirikan pada tahun 1971, terciptalah produk kecantikan Sariayu Martha Tilaar yang diluncurkan pada tahun 1977.\r\n\r\nSaat ini hampir semua produk Sariayu telah mendapatkan sertifikat halal\r\ntermasuk Sariayu Hijab Hair Care Series, Sariayu Putih Langsat Series, Sariayu\r\nColor Trend dan yang terbaru yaitu Sariayu Two Way Cake dan Sariayu Lipstik. Tentunya dengan memilih produk Sariayu, konsumen tidak hanya mendukung produk lokal tetapi juga dapat menemukan produk yang cocok dengan jenis kulit mereka.', '', 'PT Martina Berto, Tbk', 'aktif'),
(6, 'Wardah', 'Perawatan Tubuh', 'Wardah merupakan brand kosmetik halal asli Indonesia yang berdiri sejak 1995 di bawah PT. Paragon Technology and Innovation (PT. PTI). Wardah mempunyai prinsip untuk mengedepankan kualitas dalam mendukung perempuan agar tampil cantik sesuai karakternya.\r\n\r\nProduk-produk Wardah mencakup berbagai jenis kosmetik, perawatan kulit, dan produk perawatan pribadi. Merek ini memiliki komitmen untuk menyediakan produk yang ramah lingkungan dan halal. Tentunya ini bisa menjadi produk lokal yang patut untuk dicoba dan dipertimbangkan.', '-', 'PT. Paragon Technology and Innovation (PT. PTI)', 'aktif'),
(7, 'Scarlett', 'Felicya Angelista', 'Scarlett Whitening adalah salah satu produk perawatan kecantikan yang berasal dari Indonesia. Scarlett Whitening didirikan pada tahun 2017 oleh Felicya Angelista, yakni seorang publik figur yang pernah menghiasi layar kaca Indonesia, baik melalui film maupun sinetron.\r\n\r\nTentunya, produk ini tidak kalah bagus dari produk-produk Israel dan bisa menjadi produk lokal Indonesia yang baik dengan berbagai produk perawatan kulit, mulai dari sabun hingga lotion, yang dirancang untuk menjaga kulit tetap sehat dan terawat.\r\n', '-', 'Felicya Angelista', 'nonaktif'),
(8, 'Kapal Api', 'Kopi', 'Kapal api merupakan merek kopi terkenal asal Indonesia yang didirikan oleh  PT Santos Jaya Abadi. Saat ini produk kapal api sudah mulai dikenal ke mancanegara mulai dari Arab Saudi, Malaysia, Uni Emirat Arab dan lainnya.\r\n\r\nKapal Api juga aktif dalam mendukung program-program keberlanjutan dan membantu petani kopi lokal. Dengan rasa kopi yang khas dan beragam pilihan produk, Kapal Api adalah salah satu pilihan utama bagi para pecinta kopi di Indonesia.', '-', 'PT Santos Jaya Abadi', 'aktif'),
(9, 'Excelso', 'Kopi', 'Excelso merupakan sebuah waralaba kedai kopi yang berasal dari Indonesia. Perusahan lokal ini didirikan oleh PT. Excelso Multirasa pada tahun 1991. Kedai kopi seperti Excelso juga memainkan peran penting dalam mempromosikan budaya kopi lokal dan menciptakan lapangan kerja.\r\n\r\nExcelso menjadi tempat bagi para pecinta kopi untuk berkumpul, berdiskusi, dan menikmati kopi dengan kualitas terbaik. Sebagai sebuah merek kopi lokal yang telah mengukir nama baik di dalam negeri, Excelso adalah salah satu pilihan utama bagi mereka yang ingin menikmati kopi berkualitas tinggi yang dihasilkan di Indonesia.', '-', 'PT. Excelso Multirasa', 'nonaktif'),
(10, 'Ultra Milk', 'Susu', 'Ultra Milk merupakan produsen minuman yang berasal dari Indonesia. Perusahaan lokal ini berdiri pada tahun 1958 di Bandung, Jawa Barat. Merek ini menawarkan berbagai jenis susu, mulai dari susu coklat hingga susu rendah lemak.\r\n\r\nProduk-produk Ultra Milk terkenal karena kualitasnya yang tinggi dan tersedia dalam berbagai ukuran. Dengan dukungan konsumen yang besar, Ultra Milk adalah salah satu pilihan utama untuk susu lokal Indonesia sehingga dapat menggantikan produk susu dari Israel.', '-', '-', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_barang`
--

CREATE TABLE `stok_barang` (
  `kode_barang` int(11) NOT NULL,
  `satuan` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kode_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stok_barang`
--

INSERT INTO `stok_barang` (`kode_barang`, `satuan`, `jumlah`, `kode_gudang`) VALUES
(1, 'dus', 20, 1),
(2, 'dus', 10, 1),
(3, 'dus', 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` text NOT NULL,
  `email` text NOT NULL,
  `no_hp` text NOT NULL,
  `Alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `email`, `no_hp`, `Alamat`, `deskripsi`, `status`) VALUES
(1, 'PT. KOMINDO BIZOLUSI', '-', '213514201', 'Jalan Musi No 28, Jakarta Pusat, Indonesia 10150', '', 'aktif'),
(2, 'CV. Amaly Food', '-', '313986744', 'JL. Sunan Prapen II no. 76 Gresik Jawa Timur', '', 'aktif'),
(3, '', '', '0', '', '', ''),
(4, 'PT 123 Terbuka', '123@gmail', '123', 'jalan 123', 'tidak ada deskripsi', 'aktif'),
(5, 'CV 123 Terbuka', '321@gmail', '321', 'jalan 321', 'ada deskripsi', 'nonaktif'),
(6, 'PT 123 Tertutup', '777@gmail', '777', 'jalan 777', 'deskripsi tidak ada', 'nonaktif'),
(7, 'CV 123 Terbuka', '999@gmail', '999', 'jalan 999', 'deskripsi ada', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `foto_user` text NOT NULL,
  `kode_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `foto_user`, `kode_gudang`) VALUES
(1, 'ali', 'ed9c6b92b65cb04655c6e93e6c476545', 'ALYDAP.jpg', 1),
(2, 'abu', '2c6101a64935a3bbd5c67f2fb461c4f3', 'traveller_sinis.png', 2),
(3, 'siti', '6e3efc8c14f930d71f7cb946adabdd31', 'luffy-bg000.jpg', 3),
(4, 'nur', '93868666d04f24c4ebb01c8bf71d5776', 'wanderer.png', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `id_merek` (`id_merek`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`no_barang_keluar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_gudang` (`kode_gudang`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`no_barang_masuk`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_gudang` (`kode_gudang`);

--
-- Indeks untuk tabel `detail_barang_keluar`
--
ALTER TABLE `detail_barang_keluar`
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `no_barang_keluar` (`no_barang_keluar`);

--
-- Indeks untuk tabel `detail_barang_masuk`
--
ALTER TABLE `detail_barang_masuk`
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `no_barang_masuk` (`no_barang_masuk`);

--
-- Indeks untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`kode_gudang`);

--
-- Indeks untuk tabel `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indeks untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_gudang` (`kode_gudang`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `kode_gudang` (`kode_gudang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `no_barang_keluar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `no_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `gudang`
--
ALTER TABLE `gudang`
  MODIFY `kode_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `merek`
--
ALTER TABLE `merek`
  MODIFY `id_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_merek`) REFERENCES `merek` (`id_merek`);

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`kode_gudang`) REFERENCES `gudang` (`kode_gudang`);

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`kode_gudang`) REFERENCES `gudang` (`kode_gudang`);

--
-- Ketidakleluasaan untuk tabel `detail_barang_keluar`
--
ALTER TABLE `detail_barang_keluar`
  ADD CONSTRAINT `detail_barang_keluar_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`),
  ADD CONSTRAINT `detail_barang_keluar_ibfk_2` FOREIGN KEY (`no_barang_keluar`) REFERENCES `barang_keluar` (`no_barang_keluar`);

--
-- Ketidakleluasaan untuk tabel `detail_barang_masuk`
--
ALTER TABLE `detail_barang_masuk`
  ADD CONSTRAINT `detail_barang_masuk_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`),
  ADD CONSTRAINT `detail_barang_masuk_ibfk_2` FOREIGN KEY (`no_barang_masuk`) REFERENCES `barang_masuk` (`no_barang_masuk`);

--
-- Ketidakleluasaan untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD CONSTRAINT `stok_barang_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`),
  ADD CONSTRAINT `stok_barang_ibfk_2` FOREIGN KEY (`kode_gudang`) REFERENCES `gudang` (`kode_gudang`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`kode_gudang`) REFERENCES `gudang` (`kode_gudang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
