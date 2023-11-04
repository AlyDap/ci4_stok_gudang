-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2023 pada 11.36
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
(1, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(2, 'n', 's', 0, 1, 2, 3, 'f', 1, 'aktif'),
(3, 'n', 's', 0, 1, 2, 3, 'f', 1, 'nonaktif'),
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
-- Struktur dari tabel `gudang`
--

CREATE TABLE `gudang` (
  `kode_gudang` int(11) NOT NULL,
  `nama_gudang` text NOT NULL,
  `jenis` text NOT NULL,
  `alamat` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gudang`
--

INSERT INTO `gudang` (`kode_gudang`, `nama_gudang`, `jenis`, `alamat`, `status`) VALUES
(1, 'Gudang Utama', 'Besar', 'JL BESAR', 'aktif'),
(2, 'Gudang Kecil 1', 'Kecil', 'Gang Buntu', 'aktif'),
(3, 'Gudang Kecil 2', 'Kecil', 'Gang 1', 'nonaktif'),
(4, 'Gudang Kecil 3', 'Kecil', 'Gang 3', 'aktif');

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
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `no_trans_in` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_barang`
--

CREATE TABLE `stok_barang` (
  `kode_barang` int(11) NOT NULL,
  `status` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kode_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `kode_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `kode_gudang`) VALUES
(1, 'a', '03c7c0ace395d80182db07ae2c30f034', 1),
(2, 'aa', '3691308f2a4c2f6983f2880d32e29c84', 2);

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
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no_trans_in`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

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
-- AUTO_INCREMENT untuk tabel `gudang`
--
ALTER TABLE `gudang`
  MODIFY `kode_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `merek`
--
ALTER TABLE `merek`
  MODIFY `id_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `no_trans_in` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_merek`) REFERENCES `merek` (`id_merek`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

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
