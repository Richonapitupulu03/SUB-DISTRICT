-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Jun 2023 pada 12.57
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `a_pancurbatu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`id_admin` int(11) NOT NULL,
  `nm_admin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nm_admin`, `email`, `username`, `password`) VALUES
(1, 'Adm-Siska', 'siska123@gmail.com', 'admin', 'admin123'),
(2, 'Adm_Rehulina', 'rehulina123@gmail.com', 'rehulina', 'rehulina123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berita`
--

CREATE TABLE IF NOT EXISTS `tbl_berita` (
`id_berita` int(15) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `foto`, `judul`, `content`, `tanggal`) VALUES
(32, 'kaporles.jpg', 'Kapolsek Pancur Batu dan Kanit Reskrim Dicopot, Ada Apa?', 'SuaraSumut.id - Kapolsek Kapolsek Pancur Batu Kompol Eriyanto Ginting dan Kanit Reskrim Iptu Amir Sitepu dicopot dari jabatannya.Hal tersebut tertuang dalam surat telegram nomor: ST/1401/X/Kep/2022, tanggal 12 Oktober 2022 yang ditandatangani Karo SDM Polda Sumut Kombes Pol Benny Bawensel.Informasi dihimpun, keduanya dicopot terkait dugaan masalah dana. Selanjutnya, keduanya akan menjalani pemeriksaan di Polda Sumut.Kabid Humas Polda Sumut Kombes Pol Hadi Wahyudi ketika dikonfirmasi SuaraSumut.id, membenarkan hal tersebut.lihat detail berita pada https://sumut.suara.com/read/2022/10/12/202142/kapolsek-pancur-batu-dan-kanit-reskrim-dicopot-ada-apa', '2022-10-12'),
(33, 'polisi_siaga.jpg', 'Polisi Siaga di Jalur Medan-Berastagi Antisipasi Kemacetan Akhir Pekan', 'SuaraSumut.id - Polisi siaga di jalur Medan-Berastagi, Jalan Djamin Ginting, guna mengantisipasi terjadinya kemacetan lalu lintas, Minggu (18/9/2022).Kanit Lantas Polsek Pancur Batu Iptu M Rizal mengatakan, sebelum pengaturan lalu lintas, personel yang terlibat menggelar apel.Pimpinan apel menyampaikan beberapa hal terkait dalam pengaturan jalur wisata Medan-Berastagi.&quot;Selesai pelaksanaan apel, personel Pam Jalur Wisata Medan - Berastagi bergerak guna menempati floating (titik pengamanan) yang sudah ditentukan,&quot; katanya.', '2022-11-18'),
(35, 'MTQ2023.jpg', 'Dibuka Bupati, MTQ ke-56 Tingkat Deli Serdang Resmi Dimulai', 'DELI SERDANG - Bupati Deli Serdang, Ashari Tambunan membuka pelaksanaan Musabaqah Tilawatil Quran (MTQ) ke-56 Kabupaten Deli Serdang di Jalan Medan-Percut, Desa Saentis, Kecamatan Percut Sei Tuan, Kabupaten Deli Serdang, Selasa (14/3/2023).\r\n\r\nDalam pidatonya, Bupati menekankan MTQ adalah kegiatan yang diselenggarakan dalam rangka menegakkan syiar Islam. Selain itu juga bertujuan untuk tetap menjaga kemurnian Al Quran sebagai sumber petunjuk dan pedoman hidup yang tetap aktual sepanjang masa bagi umat Islam guna memperkuat keimanan dan ketakwaan.', '2023-03-20'),
(36, 'puting_beliung.jpeg', 'Puluhan Rumah di Deli Serdang Rusak Diterjang Puting Beliung, 1 Warga Tewas', 'Deli Serdang - Angin puting beliung menerjang kawasan Kecamatan Pancur Batu, Deli Serdang, Sumatera Utara (Sumut). Akibatnya, puluhan rumah rusak dan 1 orang warga tewas dalam peristiwa tersebut.\r\nPeristiwa itu dibenarkan oleh Camat Pancur Batu Sandra Dewai. Angin puting beliung di Kecamatan Pancur Batu terjadi pada Senin (29/6) sore.\r\n\r\n&quot;Betul (kejadiannya). Sampai sekarang belum terdata secara detail. Jadi kalau perkiraan kami lebih dari 75 rumah,&quot; kata Sandra saat dimintai konfirmasi, Selasa (29/6/2021).\r\n\r\nBaca artikel detiknews, &quot;Puluhan Rumah di Deli Serdang Rusak Diterjang Puting Beliung, 1 Warga Tewas&quot; selengkapnya https://news.detik.com/berita/d-5624243/puluhan-rumah-di-deli-serdang-rusak-diterjang-puting-beliung-1-warga-tewas. \r\nhttps://news.detik.com/berita/d-5624243/puluhan-rumah-di-deli-serdang-rusak-diterjang-puting-beliung-1-warga-tewas', '2022-06-29'),
(37, 'kaporles.jpg', 'Gubernur Sumatera Utara, EDY RAHMAYADI Resmikan Jalan Baru Di Kota Deli Serdang', 'SuaraSumut.id - Kapolsek Kapolsek Pancur Batu Kompol Eriyanto Ginting dan Kanit Reskrim Iptu Amir Sitepu dicopot dari jabatannya.Hal tersebut tertuang dalam surat telegram nomor: ST/1401/X/Kep/2022, tanggal 12 Oktober 2022 yang ditandatangani Karo SDM Polda Sumut Kombes Pol Benny Bawensel.Informasi dihimpun, keduanya dicopot terkait dugaan masalah dana. Selanjutnya, keduanya akan menjalani pemeriksaan di Polda Sumut.Kabid Humas Polda Sumut Kombes Pol Hadi Wahyudi ketika dikonfirmasi SuaraSumut.id, membenarkan hal tersebut.lihat detail berita pada https://sumut.suara.com/read/2022/10/12/202142/kapolsek-pancur-batu-dan-kanit-reskrim-dicopot-ada-apa', '2023-06-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bukutamu`
--

CREATE TABLE IF NOT EXISTS `tbl_bukutamu` (
`id_pengunjung` int(11) NOT NULL,
  `nm_pengunjung` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bukutamu`
--

INSERT INTO `tbl_bukutamu` (`id_pengunjung`, `nm_pengunjung`, `pesan`, `tanggal`) VALUES
(2, 'Sanjaya Pasaribu', 'Halo Admin, Apakah Surat Izin usaha yang sudah tenggak waktu lewat 3 bulan masih bisa di perpanjang atau harus urus yang baru lagi ya? Terimakasih', '2023-06-05'),
(3, 'Putri Siahaan', 'Halo Admin Bagamiana Cara Untuk Mendaftar Menjadi UMKM', '2023-06-10'),
(4, 'Siska', 'Min, gimana cara mendaftar UMKM di daerah saya di Simalingkar A', '2023-06-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_camat`
--

CREATE TABLE IF NOT EXISTS `tbl_camat` (
`id_camat` int(11) NOT NULL,
  `nip_camat` varchar(100) NOT NULL,
  `nm_camat` varchar(255) NOT NULL,
  `jk_camat` varchar(30) NOT NULL,
  `mj_camat` varchar(30) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_camat`
--

INSERT INTO `tbl_camat` (`id_camat`, `nip_camat`, `nm_camat`, `jk_camat`, `mj_camat`, `jabatan`) VALUES
(1, '196910291990031001', 'W. Sihombing', 'Laki Laki', '1948-1948', 'Wedana'),
(2, '196910291990031001', 'A. Rejin Parangin-angin', 'Laki Laki', '1948-1949', 'Wedana'),
(3, '196910291990031001', 'L. Gurusinga', 'Laki Laki', '1949-1950', 'Asist.Wedana'),
(4, '196910291990031001', 'Nongkah Barus', 'Laki Laki', '1950-1952', 'Asist.Wedana'),
(5, '196910291990031001', 'Sampuren Manik', 'Laki Laki', '1952-1959', 'Asist.Wedana'),
(6, '196910291990031001', 'Masa Sinulingga', 'Laki Laki', '1959-1963', 'Asist.Wedana'),
(7, '196910291990031001', 'Tandil Tarigan', 'Laki Laki', '1963-1968', 'Asist.Wedana'),
(8, '196910291990031001', 'Nggelem Suryadi, BA', 'Laki Laki', '1968-1974', 'Asist.Wedana'),
(9, '196910291990031001', 'Zainal Aris, BA', 'Laki Laki', '1974-1976', 'Camat'),
(10, '196910291990031001', 'Jelah Simarmata', 'Laki Laki', '1976-1979', 'Camat'),
(11, '196910291990031001', 'Drs. Esron Munthe', 'Laki Laki', '1979-1985', 'Camat'),
(12, '196910291990031001', 'Drs. Jhon Kuasa Barus', 'Laki Laki', '1985-1991', 'Camat'),
(13, '196910291990031001', 'Drs. K. Simanjuntak', 'Laki Laki', '1991-1993', 'Camat'),
(14, '196910291990031001', 'Drs. H. Sinar Ginting', 'Laki Laki', '1993-1995', 'Camat'),
(15, '196910291990031001', 'Drs. H. Suhatsyah D. Nst', 'Laki Laki', '1995-1998', 'Camat'),
(16, '196910291990031001', 'Drs. Jupiter K.Purba', 'Laki Laki', '1998-2001', 'Camat'),
(17, '196910291990031001', 'Drs. Neken Ketaren', 'Laki Laki', '2001-2004', 'Camat'),
(18, '196910291990031001', 'P. Tambunan, SE', 'Laki Laki', '2004-2008', 'Camat'),
(19, '196910291990031001', 'Drs. Haris Binar Ginting', 'Laki Laki', '2008-2010', 'Camat'),
(20, '196910291990031001', 'Suryadi Aritonang, S.Sos, MSi', 'Laki Laki', '2010-2015', 'Camat'),
(21, '196910291990031001', 'Drs. A. Pangaribuan M.MA', 'Laki Laki', '2015-2017', 'Camat'),
(22, '196910291990031001', 'Drs. David Efrata Tarigan', 'Laki Laki', '2017-2020', 'Camat'),
(23, '196910291990031001', 'Sandra Dewi Situmorang S.STP, M.Si', 'Perempuan', '2020-2025', 'Camat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_det_potensi`
--

CREATE TABLE IF NOT EXISTS `tbl_det_potensi` (
`id_detpo` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `id_potensi` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nm_potensi` varchar(255) NOT NULL,
  `alt_potensi` varchar(100) NOT NULL,
  `nm_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_det_potensi`
--

INSERT INTO `tbl_det_potensi` (`id_detpo`, `id_kelurahan`, `id_potensi`, `foto`, `nm_potensi`, `alt_potensi`, `nm_pemilik`) VALUES
(1, 1, 6, 'aneka kue bakery.jpg', 'Toko Kue Sembiring', 'Jalan Simpang Selayang Pancur Batu No.10', 'Keysa Sembiring'),
(2, 1, 6, 'brownis.jpg', 'Aneka Kue', 'Jl. Merpati Gang Senina No.11', 'Sisil Pasaribu'),
(10, 1, 6, 'bubu jahe merah.jpg', 'Toko Bubu Jahe', 'Jl. Perbaungan No.24 Pancur batu', 'Agus Salim'),
(11, 12, 6, 'jamu herbal.png', 'Toko Jamu Herbal', 'Jl. Merpati Gang Senina No.11', 'Sisil Pasaribu'),
(12, 25, 1, 'permandian bambu.jpeg', 'Permandian Bambu Sembahe Baru', 'Jl. Besar Tj Selamat', 'Rey Sitepu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelurahan`
--

CREATE TABLE IF NOT EXISTS `tbl_kelurahan` (
`id_kelurahan` int(11) NOT NULL,
  `kd_pos` varchar(10) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `jlh_lingkungan` varchar(100) NOT NULL,
  `luas_wilayah` varchar(100) NOT NULL,
  `alamat_kel` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelurahan`
--

INSERT INTO `tbl_kelurahan` (`id_kelurahan`, `kd_pos`, `kelurahan`, `jlh_lingkungan`, `luas_wilayah`, `alamat_kel`, `deskripsi`) VALUES
(1, '20353', 'Bintang Meriah', '4', '6,99', 'Pancur Batu Deli Serdang', 'Bintang Meriah Berada merupakan salah satu Desa/Kelurahan yang ada di daerah kecamatan Pancur batu. Luas Kelurahan Bintang Meriah lebih kurang 6,99 Ha. Yang mana terbagi atas 4 Lingkungan. Lokasi Kantor Kelurahan berada di Pancur Batu Deli Serdang, jarak antara kelurahan ke Kantor Camat adalah 10,5km.'),
(2, '20353', 'Sugau', '5', '4,19', 'JL. Letnan Jendral Jamin Ginting', 'SUGAU merupakan salah satu desa/keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan SUGAU lebih kurang 4,19 Ha. Yang mana terbagi atas 5 Lingkungan. Lokasi Kantor Kelurahan berada di Pancur Batu Deli Serdang, jarak antara kelurahan ke Kantor Camat Medan Perjuangan 9km.'),
(3, '20233', 'Tiang Layar', '3', '4,15', 'Pancur Batu Deli Serdang ', 'TIANG LAYAR merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan TIANG LAYAR lebih kurang 4,15 Ha. Yang mana terbagi atas 3 Lingkungan. Lokasi Kantor Kelurahan berada di Pancur Batu Deli Serdang, jarak antara kelurahan ke Kantor Camat adalah 8km.'),
(4, '20353', 'Salam Tani', '4', '9,74', 'Pancur Batu Deli Serdang', 'SALAM TANI merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan SALAM TANI lebih kurang 9,74 Ha. Yang mana terbagi atas 4 Lingkungan. Lokasi Kantor Kelurahan berada di Pancur Batu Deli Serdang, jarak antara kelurahan ke Kantor Camat adalah 2km.'),
(5, '20353', 'Namo Riam', '5', '5,15', 'Pancur Batu Deli Serdang ', 'Sei NAMO RIAM merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan NAMO RIAM lebih kurang 5,15 Ha. Yang mana terbagi atas 5 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG , jarak antara kelurahan ke Kantor Camat adalah 7km.'),
(6, '20353', 'Durian Simbelang A', '5', '3,41', 'Pancur Batu Deli Serdang ', ''),
(7, '20353', 'Durian Tunggal', '5', '9,11', 'Pancur Batu Deli Serdang ', 'DURIAN TUNGGAL merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan DURIAN TUNGGAL lebih kurang 9,11 Ha. Yang mana terbagi atas 5 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 4km.'),
(8, '20353', 'Pertampilen', '3', '3,97', 'Pancur Batu Deli Serdang ', ''),
(9, '20353', 'Hulu', '5', '2,14', 'Pancur Batu Deli Serdang ', 'HULU merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan HULU lebih kurang 2,14 Ha. Yang mana terbagi atas 5 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 2km.'),
(10, '20353', 'Namo Simpur', '4', '2,19', 'Pancur Batu Deli Serdang ', 'NAMO SIMPUR merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan NAMO SIMPUR lebih kurang 2,19 Ha. Yang mana terbagi atas 4 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 0,5km.'),
(11, '20353', 'Namo Bintang', '7', '4,99', 'Pancur Batu Deli Serdang ', 'NAMO BINTANG merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan NAMO BINTANG lebih kurang 4,99 Ha. Yang mana terbagi atas 7 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 2km.'),
(12, '20353', 'Simalingkar A', '5', '7,400', 'Pancur Batu Deli Serdang ', 'SIMALINGKAR A merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan SIMALINGKAR A lebih kurang 7,400 Ha. Yang mana terbagi atas 5 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 6km.'),
(13, '20353', 'Perumnas Simalingkar', '7', '10,42', 'Pancur Batu Deli Serdang ', 'PERUMNAS SIMALINGKAR merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan PERUMNAS SIMALINGKAR lebih kurang 10,42 Ha. Yang mana terbagi atas 7 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 6,8km.'),
(14, '20353', 'Baru', '5', '2,72', 'Pancur Batu Deli Serdang ', 'BARU merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan BARU lebih kurang 116 Ha. Yang mana terbagi atas 5 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 1,5km.'),
(15, '20353', 'Lama', '7', '116', 'Pancur Batu Deli Serdang ', 'LAMA merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan LAMA lebih kurang 116 Ha. Yang mana terbagi atas 7 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 1km.'),
(16, '20353', 'Kampung Tengah', '4', '1,15', 'Pancur Batu Deli Serdang ', 'KAMPUNG TENGAH merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan KAMPUNG TENGAH lebih kurang 1,15 Ha. Yang mana terbagi atas 4 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 0,2km.'),
(17, '20353', 'Namorih', '3', '800', 'Pancur Batu Deli Serdang ', 'NAMORIH merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan NAMORIH lebih kurang 800 Ha. Yang mana terbagi atas 3 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 1km.'),
(18, '20353', 'Durian Jangak', '3', '4,91', 'Pancur Batu Deli Serdang ', ''),
(19, '20353', 'Tuntungan II', '4', '390', 'Pancur Batu Deli Serdang ', 'TUNTUNGAN II merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan TUNTUNGAN 2 lebih kurang 390 Ha. Yang mana terbagi atas 4 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 5km.'),
(20, '20353', 'Tuntungsn I', '4', '15,55', 'Pancur Batu Deli Serdang ', 'TUNTUNGAN I merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan TUNTUNGAN 1 lebih kurang 15,55 Ha. Yang mana terbagi atas 4 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 6km.'),
(21, '20353', 'Gunung Tinggi', '5', '15,60', 'Pancur Batu Deli Serdang ', 'GUNUNG TINGGI merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan GUNUNG TINGGI lebih kurang 15,60 Ha. Yang mana terbagi atas 5 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 8,5km. Kelurahan GUNUNG TINGGI dengan luas wilayahnya lebih-kurang 15,60 Ha yang terletak pada 3?29’ - 3?52’ Lintang Utara 98?54’ - 98?32’ Bujur Timur dengan ketinggian 69,0 Meter dari atas permukaan laut. '),
(22, '20353', 'Sei Glugur', '6', '427', 'Pancur Batu Deli Serdang ', 'SEI GLUGUR merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan SEI GLUGUR lebih kurang 427 Ha. Yang mana terbagi atas 6 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 8,5km.'),
(23, '20353', 'Suka Raya', '5', '359', 'Pancur Batu Deli Serdang ', 'SUKARAYA merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan SUKARAYA lebih kurang 359 Ha. Yang mana terbagi atas 5 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 9km.'),
(24, '20353', 'Tanjung Anom', '6', '5,24', 'Pancur Batu Deli Serdang ', 'TANJUNG ANOM merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan TANJUNG ANOM lebih kurang 5,24 Ha. Yang mana terbagi atas 6 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 5km.'),
(25, '20353', 'Sembahe Baru', '2', '3,57', 'Pancur Batu Deli Serdang ', 'SEMBAHE BARU merupakan salah satu keluarahan yang ada dikecamatan Pancur Batu. Luas Kelurahan SEMBAHE BARU lebih kurang 3,57 Ha. Yang mana terbagi atas 2 Lingkungan. Lokasi Kantor Kelurahan berada di PANCUR BATU DELI SERDANG, jarak antara kelurahan ke Kantor Camat adalah 4km.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penduduk`
--

CREATE TABLE IF NOT EXISTS `tbl_penduduk` (
`id_pddk` int(11) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `islam` varchar(25) NOT NULL,
  `kristen` varchar(25) NOT NULL,
  `khatolik` varchar(25) NOT NULL,
  `hindu` varchar(25) NOT NULL,
  `budha` varchar(25) NOT NULL,
  `konghuchu` varchar(25) NOT NULL,
  `laki_laki` varchar(25) NOT NULL,
  `perempuan` varchar(25) NOT NULL,
  `antar_kel` varchar(25) NOT NULL,
  `antar_kec` varchar(25) NOT NULL,
  `blm_sekolah` varchar(25) NOT NULL,
  `tk_paud` varchar(25) NOT NULL,
  `SD` varchar(25) NOT NULL,
  `SMP` varchar(25) NOT NULL,
  `SMA` varchar(25) NOT NULL,
  `diploma` varchar(25) NOT NULL,
  `sarjana` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penduduk`
--

INSERT INTO `tbl_penduduk` (`id_pddk`, `kelurahan`, `islam`, `kristen`, `khatolik`, `hindu`, `budha`, `konghuchu`, `laki_laki`, `perempuan`, `antar_kel`, `antar_kec`, `blm_sekolah`, `tk_paud`, `SD`, `SMP`, `SMA`, `diploma`, `sarjana`) VALUES
(1, 'Bintang Meriah', '1.935', '901', '252', '53', '6.803', '6', '4.822', '5.131', '1.586', '545', '703', '1.452', '4.706', '8', '128', '733', '65'),
(2, 'Sugau', '9.184', '719', '58', '5', '1.399', '4', '5.703', '5.666', '1.968', '915', '721', '1.344', '5.330', '20', '159', '802', '67'),
(3, 'Tiang Layar', '11.627', '1.662', '77', '16', '120', '0', '6.775', '6.727', '2.395', '958', '840', '1.601', '8.068', '32', '294', '1.156', '74'),
(4, 'Salam Tani', '9.637', '280', '32', '50', '873', '0', '5.328', '5.544', '2.022', '850', '762', '1.385', '4.726', '7', '199', '786', '68'),
(5, 'Namo Riam', '7.822', '345', '120', '15', '2.592', '0', '5.361', '5.533', '1.962', '824', '983', '1.385', '4.726', '13', '164', '725', '44'),
(6, 'Durian Simbelang A', '7.414', '6.910', '263', '4', '67', '0', '7.283', '7.375', '2.631', '1.145', '846', '1.624', '6.730', '26', '309', '1.203', '61'),
(7, 'Durian Tunggal', '7.899', '3.183', '310', '279', '996', '0', '6.268', '6.399', '2.224', '922', '934', '1.590', '5.555', '18', '234', '1.054', '67'),
(8, 'Pertampilen', '5.226', '5.566', '453', '2', '61', '0', '5.612', '5.696', '2.143', '807', '686', '1.225', '4.935', '17', '321', '1.023', '61'),
(9, 'Hulu', '18.534', '11.311', '980', '31', '1.162', '8', '5.612', '5.696', '6.201', '2.502', '2.266', '4.103', '13.708', '65', '675', '2.176', '122'),
(10, 'Namo Simpur', '1.935', '901', '252', '53', '6.803', '6', '4.822', '5.131', '1.586', '545', '703', '1.452', '4.706', '8', '128', '733', '65'),
(11, 'Namo Bintang', '9.184', '719', '58', '5', '1.399', '4', '5.703', '5.666', '1.968', '915', '721', '1.344', '5.330', '20', '159', '802', '67'),
(12, 'Simalingkar', '11.627', '1.662', '77', '16', '120', '0', '6.775', '6.727', '2.395', '958', '840', '1.601', '8.068', '32', '294', '1.156', '74'),
(13, 'Perumnas Simalingkar', '9.637', '280', '32', '50', '873', '0', '5.328', '5.544', '2.022', '850', '762', '1.385', '4.726', '7', '199', '786', '68'),
(14, 'Baru', '7.822', '345', '120', '15', '2.592', '0', '5.361', '5.533', '1.962', '824', '983', '1.385', '4.726', '13', '164', '725', '44'),
(15, 'Lama', '7.414', '6.910', '263', '4', '67', '0', '7.283', '7.375', '2.631', '1.145', '846', '1.624', '6.730', '26', '309', '1.203', '61'),
(16, 'Kampung Tengah', '7.899', '3.183', '310', '279', '996', '0', '6.268', '6.399', '2.224', '922', '934', '1.590', '5.555', '18', '234', '1.054', '67'),
(17, 'Namorih', '5.226', '5.566', '453', '2', '61', '0', '5.612', '5.696', '2.143', '807', '686', '1.225', '4.935', '17', '321', '1.023', '61'),
(18, 'Durian Jangkak', '18.534', '11.311', '980', '31', '1.162', '8', '5.612', '5.696', '6.201', '2.502', '2.266', '4.103', '13.708', '65', '675', '2.176', '122'),
(19, 'Tuntungan I', '1.935', '901', '252', '53', '6.803', '6', '4.822', '5.131', '1.586', '545', '703', '1.452', '4.706', '8', '128', '733', '65'),
(20, 'Tuntungan II', '9.184', '719', '58', '5', '1.399', '4', '5.703', '5.666', '1.968', '915', '721', '1.344', '5.330', '20', '159', '802', '67'),
(21, 'Gunung Tinggi', '11.627', '1.662', '77', '16', '120', '0', '6.775', '6.727', '2.395', '958', '840', '1.601', '8.068', '32', '294', '1.156', '74'),
(22, 'Sei Glugur', '9.637', '280', '32', '50', '873', '0', '5.328', '5.544', '2.022', '850', '', '1.385', '4.726', '7', '199', '786', '68'),
(23, 'Suka Raya', '7.822', '345', '120', '15', '2.592', '0', '5.361', '5.533', '1.962', '824', '983', '1.385', '4.726', '13', '164', '725', '44'),
(24, 'Tanjung Anom', '7.414', '6.910', '263', '4', '67', '0', '7.283', '7.375', '2.631', '1.145', '846', '1.624', '6.730', '26', '309', '1.203', '61'),
(25, 'Sembahe Baru', '7.899', '3.183', '310', '279', '996', '0', '6.268', '6.399', '2.224', '922', '934', '1.590', '5.555', '18', '234', '1.054', '67');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_potensi`
--

CREATE TABLE IF NOT EXISTS `tbl_potensi` (
`id_potensi` int(11) NOT NULL,
  `j_potensi` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_potensi`
--

INSERT INTO `tbl_potensi` (`id_potensi`, `j_potensi`) VALUES
(1, 'Wisata'),
(2, 'Pertanian'),
(3, 'Peternakan'),
(4, 'Perkebunan'),
(5, 'Perikanan'),
(6, 'UMKM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
 ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tbl_bukutamu`
--
ALTER TABLE `tbl_bukutamu`
 ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `tbl_camat`
--
ALTER TABLE `tbl_camat`
 ADD PRIMARY KEY (`id_camat`);

--
-- Indexes for table `tbl_det_potensi`
--
ALTER TABLE `tbl_det_potensi`
 ADD PRIMARY KEY (`id_detpo`), ADD KEY `id_kelurahan` (`id_kelurahan`), ADD KEY `id_potensi` (`id_potensi`), ADD KEY `id_kelurahan_2` (`id_kelurahan`), ADD KEY `id_potensi_2` (`id_potensi`), ADD KEY `id_kelurahan_3` (`id_kelurahan`), ADD KEY `id_potensi_3` (`id_potensi`);

--
-- Indexes for table `tbl_kelurahan`
--
ALTER TABLE `tbl_kelurahan`
 ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
 ADD PRIMARY KEY (`id_pddk`);

--
-- Indexes for table `tbl_potensi`
--
ALTER TABLE `tbl_potensi`
 ADD PRIMARY KEY (`id_potensi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
MODIFY `id_berita` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tbl_bukutamu`
--
ALTER TABLE `tbl_bukutamu`
MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_camat`
--
ALTER TABLE `tbl_camat`
MODIFY `id_camat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_det_potensi`
--
ALTER TABLE `tbl_det_potensi`
MODIFY `id_detpo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_kelurahan`
--
ALTER TABLE `tbl_kelurahan`
MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
MODIFY `id_pddk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_potensi`
--
ALTER TABLE `tbl_potensi`
MODIFY `id_potensi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_det_potensi`
--
ALTER TABLE `tbl_det_potensi`
ADD CONSTRAINT `tbl_det_potensi_ibfk_1` FOREIGN KEY (`id_kelurahan`) REFERENCES `tbl_kelurahan` (`id_kelurahan`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_det_potensi_ibfk_2` FOREIGN KEY (`id_potensi`) REFERENCES `tbl_potensi` (`id_potensi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
