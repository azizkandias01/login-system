-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2020 pada 04.44
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pupukkita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pupuk`
--

CREATE TABLE `pupuk` (
  `id_pupuk` int(11) NOT NULL,
  `nama_pupuk` varchar(100) NOT NULL,
  `jumlah_pupuk` int(11) NOT NULL,
  `harga_pupuk` int(11) NOT NULL,
  `foto_pupuk` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pupuk`
--

INSERT INTO `pupuk` (`id_pupuk`, `nama_pupuk`, `jumlah_pupuk`, `harga_pupuk`, `foto_pupuk`, `deskripsi`) VALUES
(1, 'Urea', 110, 20000, 'urea.jpg', 'Deskripsi\r\n\r\nRumus kimia CO(NH2)2\r\nPupuk Urea adalah pupuk yang dibuat dari percampuran gas amoniak (NH3) dan gas asam arang (CO2).\r\nPupuk Urea mengandung 46% N. Jadi tiap 100 kg pupuk Urea mengandung 46 kg Nitrogen.\r\nPupuk Urea berbentuk kristal, warnanya beragam antara lain putih dan merah muda (bersubsidi).\r\nSifat-sifat\r\n\r\nPupuk Urea bersifat higroskopis, sehingga pupuk urea ini mudah larut dalam air dan mudah diserap tanaman.\r\nReaksinya sedikit asam.\r\nSelain mudah tercuci oleh air, juga mudah terbakar oleh sinar matahari.'),
(2, 'Amonium Sulfat', 999, 25000, 'amoniumsulfat.png', 'ZA (Zwavelzure Amonium) Deskripsi  Rumus kimia (NH4)2SO4 Pupuk ZA adalah pupuk yang dibuat dari asam belerang (S) dan gas amonium (NH4+) sehingga disebut juga pupuk Amonium Sulfat. Pupuk ZA mengandung 21% unsur hara makro N (nitrogen) sebagai kation amonium, dan 24 % unsur hara makro sekunder S (sulfur) sebagai anion sulfat. Jadi tiap 100 kg pupuk ZA mengandung 21 kg Nitrogen dan 24% Sulfur. Pupuk ZA berbentuk kristal, warnanya beragam antara lain putih, merah muda, abu-abu, biru, ke abu-abuan dan kuning. Sifat-sifat  Pupuk ZA bersifat higroskopis (mudah menyerap uap air), terutama pada kelembapan 80 % atau lebih, sehingga mudah larut dalam air dan mudah diserap tanaman. Reaksinya asam, sehingga kurang baik jika diberikan pada tanah muda (karena rata-rata tanah muda masih asam), atau tanah yang kurang mengandung kalsium (alkali). Reaksi kerjanya agak lambat, sehigga cocok apabila digunakan sebagai pupuk dasar.'),
(3, 'SP36 Super Posfat', 500, 10000, 'sp36.png', 'SP36 (Super Phospate)\r\nDeskripsi\r\n\r\nRumus kimia P2O5\r\nPupuk SP36 adalah pupuk yang dibuat dari asam sulfat (belerang) dan fosfat alam.\r\nPupuk SP36 mengandung 36% P dalam bentuk P2O5 (fosfat). Jadi tiap 100 kg pupuk SP36 mengandung 36 kg Fosfor (P).\r\nKadar P2O5 larut dalam air minimal 30 %.\r\nKadar air maksimal 5 %.\r\nPupuk SP36 berbentuk butiran besar, warnanya abu-abu.\r\nSifat-sifat\r\n\r\nSP36 bersifat tidak higroskopis, sehingga dapat disimpan lama walau kelembapan udara tinggi.\r\nReaksi kimianya tergolong netral.\r\nWalau sifatnya mudah larut dalam air namun reaksinya lambat, sehingga sangat cocok digunakan untuk pupuk dasar pada tanaman semusim.\r\nMudah terbakar oleh sinar matahari.'),
(4, 'KCL Kalium Klorida', 30000, 20000, 'KCL.png', 'KCl (Kalium Klorida)\r\nDeskripsi\r\n\r\nRumus kimia KCl\r\nPupuk KCl adalah pupuk yang dibuat dari ekstraksi mineral Kalium.\r\nPupuk KCl mengandung 60% K dalam bentuk K2O.\r\nPupuk KCl berbentuk bubuk atau serbuk, warnanya merah.\r\nSifat-sifat\r\n\r\nBersifat higroskopis, mudah larut dalam air dan mudah diserap tanaman.\r\nReaksinya netral sampai asam.\r\nUnsur kloridanya bersifat toksik (racun) bagi tanaman tertentu seperti wortel dan kentang.\r\nDapat digunakan sebagai pupuk dasar atau pupuk susulan.'),
(5, 'Kalium Sulfat ZK', 30000, 20000, 'zk.jpg', 'ZK (Zwavelzure Kali)\r\nDeskripsi\r\n\r\nRumus kimia K2SO4\r\nPupuk ZK adalah pupuk yang dibuat dari asam belerang dan kalium, sehingga disebut juga pupuk Kalium Sulfat.\r\nPupuk ZK mengandung 50% unsur hara makro K dalam bentuk K2O dan 17 % unsur hara makro sekunder S (sulfur). Jadi tiap 100 kg pupuk ZK mengandung 50 kg Kalium (K) dan 17 kg Sulfur (S).\r\nPupuk ZK berbentuk butiran kecil atau serbuk, warnanya putih.\r\nKadar klorida maksimal 2,5 %, kadar air maksimal 1%.\r\nSifat-sifat\r\n\r\nPupuk ZK bersifat tidak higroskopis, sehingga dapat disimpan lama walau kelembapan udara tinggi.\r\nMudah larut dalam air, dan reaksinya netral sampai asam.\r\nSumber unsur kalium dengan kadar tinggi, khususnya untuk tanaman yang sensitif terhadap keracunan Klorida, seperti wortel dan kentang. Gunakan ZK, jangan KCl agar tanaman wortel dan kentang anda tidak keracunan unsur klorida.\r\nDapat digunakan sebagai pupuk dasar atau pupuk susulan.'),
(6, 'NPK Phonska', 2000, 60000, 'phonska.png', 'NPK PHONSKA (Nitrogen Phospate Kalium)\r\nDeskripsi\r\n\r\nRumus kimia NPK\r\nNPK Phonska berfungsi sebagai pupuk majemuk yang mengandung 15% Nitrogen (N), 15% Fosfat (P2O5) dan 15 Kalium (K2O) serta 10% Sulfur (S).\r\nKadar air maksimal 2%.\r\nBentuknya butiran dan bewarna merah muda.\r\nSifat-sifat\r\n\r\nBersifat higroskopis (mudah menyerap uap air), sehingga mudah larut dalam air dan mudah diserap tanaman.\r\nReaksi kimianya netral, sehingga bisa diaplikasikan pada berbagai jenis tanah.\r\nDapat digunakan sebagai pupuk dasar (disebar di dasar bedengan) atau pupuk susulan (kocor atau tugal)'),
(7, 'Kapur Karbonar', 110, 10000, 'dolomat.png', 'Dolomite (Kapur Karbonat)\r\nDeskripsi\r\n\r\nRumus kimia (CaMg(CO3)2)\r\nDolomit (kapur pertanian) berfungsi sebagai penyedia unsur hara makro sekunder Ca dan Mg, dimana dolomit mengandung 45,6% MgCO3 dan 54,3% CaCO3 atau 21,9% MgO dan 30,4% CaO.\r\nBentuknya butiran kasar sampai butiran halus/bubuk, dan bewarna putih ke abu-abuan atau putih kebiru-biruan.\r\nSifat-sifat\r\n\r\nDolomit bersifat higroskopis, sehingga mudah menyerap air dan mudah dihancurkan.\r\nReaksi kimianya basa (alkali), yaitu menaikkan pH tanah.\r\nSemakin halus butirannya, maka semakin baik kualitasnya.'),
(20, 'DCE Posfat', 200, 1000, 'stone_paving_bump.jpg', ''),
(22, 'al12', 200, 200000, 'images2.jpg', '1'),
(23, 'LKP Sulfur murni', 1, 13000, 'hospital-playlist2.jpg', 'pupuk bagus banget cou');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pupuk`
--
ALTER TABLE `pupuk`
  ADD PRIMARY KEY (`id_pupuk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pupuk`
--
ALTER TABLE `pupuk`
  MODIFY `id_pupuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
