-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 02:51 AM
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
-- Database: `db_web_desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL CHECK (`level` between 1 and 8)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(4, 'lego8', 'admindesa1234', 8),
(5, 'lego', 'admindesa1234', 1),
(6, 'lego5', 'admindesa1234', 5);

-- --------------------------------------------------------

--
-- Table structure for table `administrasi_desa`
--

CREATE TABLE `administrasi_desa` (
  `id_administrasi` varchar(20) NOT NULL,
  `jenis_dokumen` varchar(50) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `status_pengajuan` enum('Diproses','Disetujui','Ditolak') DEFAULT NULL,
  `NIK` varchar(20) DEFAULT NULL,
  `id_sekretaris` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrasi_desa`
--

INSERT INTO `administrasi_desa` (`id_administrasi`, `jenis_dokumen`, `tanggal_pengajuan`, `status_pengajuan`, `NIK`, `id_sekretaris`) VALUES
('ADM001', 'KTP', '2024-01-01', 'Diproses', '1234567890', 'SEK001'),
('ADM002', 'KK', '2024-02-01', 'Disetujui', '9876543210', 'SEK002'),
('ADM003', 'Surat Domisili', '2024-03-01', 'Ditolak', '1928374655', 'SEK003'),
('ADM004', 'KTP', '2024-04-01', 'Diproses', '1122334455', 'SEK004'),
('ADM005', 'KK', '2024-05-01', 'Disetujui', '5566778899', 'SEK005');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` varchar(20) NOT NULL,
  `NIK` varchar(20) DEFAULT NULL,
  `id_pers` varchar(20) DEFAULT NULL,
  `judul_berita` varchar(100) DEFAULT NULL,
  `isi_berita` text DEFAULT NULL,
  `tanggal_berita` datetime DEFAULT NULL,
  `kategori_berita` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `NIK`, `id_pers`, `judul_berita`, `isi_berita`, `tanggal_berita`, `kategori_berita`) VALUES
('BR001', '3201010101010001', 'PERS001', 'Pentingnya Pendidikan di Desa', 'Pendidikan di desa semakin berkembang...', '2024-12-05 08:30:00', 'Pendidikan'),
('BR002', '3201010101010002', 'PERS002', 'Pemilu 2024: Apa yang Baru?', 'Pemilu 2024 memberikan banyak perubahan...', '2024-12-04 14:45:00', 'Politik'),
('BR003', '3201010101010003', 'PERS003', 'Inovasi Teknologi di Indonesia', 'Indonesia semakin maju dalam bidang teknologi...', '2024-12-03 09:00:00', 'Teknologi'),
('BR004', '3201010101010004', 'PERS004', 'Tips Sehat di Musim Hujan', 'Menjaga kesehatan tubuh sangat penting...', '2024-12-02 17:20:00', 'Kesehatan'),
('BR005', '3201010101010005', 'PERS005', 'Perkembangan Olahraga di Kampus', 'Olahraga kampus kini semakin diminati...', '2024-12-01 13:00:00', 'Olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `buku_perpus`
--

CREATE TABLE `buku_perpus` (
  `id_buku` varchar(20) NOT NULL,
  `judul_buku` varchar(100) DEFAULT NULL,
  `penerbit_buku` varchar(100) DEFAULT NULL,
  `penulis_buku` varchar(100) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku_perpus`
--

INSERT INTO `buku_perpus` (`id_buku`, `judul_buku`, `penerbit_buku`, `penulis_buku`, `tahun_terbit`) VALUES
('BK001', 'Belajar SQL', 'Penerbit Ilmu', 'Budi Setiawan', '2019'),
('BK002', 'Pemrograman Python', 'Tekno Publisher', 'Dewi Anggraeni', '2018'),
('BK003', 'Manajemen Desa', 'Penerbit Desa', 'Ahmad Yusuf', '2021'),
('BK004', 'Kesehatan Masyarakat', 'Sehat Publisher', 'Rina Dewi', '2019'),
('BK005', 'Teknologi Informasi', 'Inovasi Publisher', 'Bayu Hartono', '2022'),
('BK006', 'Cinta Ku Lepas', 'PT. Setiawan Family', 'Agus Setiawan', '1999');

-- --------------------------------------------------------

--
-- Table structure for table `customer_support`
--

CREATE TABLE `customer_support` (
  `id_cs` varchar(20) NOT NULL,
  `nama_agen` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jadwal_kerja` enum('Senin-Jumat','Sabtu-Minggu','Shift') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_support`
--

INSERT INTO `customer_support` (`id_cs`, `nama_agen`, `no_telepon`, `email`, `jadwal_kerja`) VALUES
('CS001', 'Fitri Andayani', '081999999999', 'fitri@gmail.com', 'Senin-Jumat'),
('CS002', 'Joko Sutrisno', '082888888888', 'joko@gmail.com', ''),
('CS003', 'Rina Handayani', '083777777777', 'rina@gmail.com', ''),
('CS004', 'Ahmad Fauzi', '084666666666', 'ahmad@gmail.com', 'Senin-Jumat'),
('CS005', 'Dewi Rahmawati', '085555555555', 'dewi@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(20) NOT NULL,
  `id_puskesmas` varchar(20) DEFAULT NULL,
  `nama_dokter` varchar(100) DEFAULT NULL,
  `spesialisasi` varchar(50) DEFAULT NULL,
  `jadwal_praktik` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_puskesmas`, `nama_dokter`, `spesialisasi`, `jadwal_praktik`) VALUES
('DOK001', 'PUSK001', 'Dr. Ahmad Fauzan', 'Umum', 'Senin-Jumat 08:00-15:00'),
('DOK002', 'PUSK002', 'Dr. Siti Nurhaliza', 'Anak', 'Senin-Sabtu 09:00-17:00'),
('DOK003', 'PUSK003', 'Dr. Budi Hartanto', 'Gigi', 'Selasa-Kamis 10:00-18:00'),
('DOK004', 'PUSK001', 'Dr. Rina Saputri', 'Kandungan', 'Rabu-Jumat 08:00-14:00'),
('DOK005', 'PUSK004', 'Dr. Johan Pratama', 'Mata', 'Senin-Kamis 12:00-20:00');

-- --------------------------------------------------------

--
-- Table structure for table `infrastruktur`
--

CREATE TABLE `infrastruktur` (
  `id_infrastruktur` varchar(20) NOT NULL,
  `jenis_infrastruktur` enum('PLN','PDAM','Internet','Lainnya') DEFAULT NULL,
  `penyedia_layanan` varchar(100) DEFAULT NULL,
  `alamat_kantor` text DEFAULT NULL,
  `no_telepon_kantor` varchar(15) DEFAULT NULL,
  `jam_operasional` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infrastruktur`
--

INSERT INTO `infrastruktur` (`id_infrastruktur`, `jenis_infrastruktur`, `penyedia_layanan`, `alamat_kantor`, `no_telepon_kantor`, `jam_operasional`) VALUES
('INF001', 'PLN', 'PLN Regional 1', 'Jl. Listrik No. 1', '081234567890', '08:00-17:00'),
('INF002', 'PDAM', 'PDAM Kota', 'Jl. Air Bersih No. 2', '082345678910', '08:00-17:00'),
('INF003', 'Internet', 'ISP MegaNet', 'Jl. Fiber Optik No. 3', '083456789012', '08:00-22:00'),
('INF004', 'Lainnya', 'Telkom Indonesia', 'Jl. Telkom No. 4', '084567890123', '08:00-17:00'),
('INF005', 'Internet', 'ISP FastNet', 'Jl. Jaringan Cepat No. 5', '085678901234', '08:00-22:00');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `NIK` varchar(20) NOT NULL,
  `nama_penduduk` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`NIK`, `nama_penduduk`, `alamat`, `tanggal_lahir`, `no_telepon`, `email`) VALUES
('1122334455', 'Lisa Marlina', 'Jl. Thamrin No. 4', '1998-04-04', '084567890123', 'lisa@gmail.com'),
('1234567890', 'Andi Wijaya', 'Jl. Merdeka No. 1', '1990-01-01', '081234567890', 'andi@gmail.com'),
('1928374655', 'Ahmad Yusuf', 'Jl. Sudirman No. 3', '1995-03-03', '083456789012', 'ahmad@gmail.com'),
('3201010101010001', 'Ahmad Yani', 'Jl. Merdeka No.1', '1990-01-01', '081234567891', 'ahmad@example.com'),
('3201010101010002', 'Budi Santoso', 'Jl. Sudirman No.2', '1985-05-12', '081234567892', 'budi@example.com'),
('3201010101010003', 'Clara Dewi', 'Jl. Diponegoro No.3', '1992-07-25', '081234567893', 'clara@example.com'),
('3201010101010004', 'Dina Pertiwi', 'Jl. Gatot Subroto No.4', '1995-03-15', '081234567894', 'dina@example.com'),
('3201010101010005', 'Elang Saputra', 'Jl. Ahmad Yani No.5', '2000-12-01', '081234567895', 'elang@example.com'),
('3201010101010006', 'Farida Hasan', 'Jl. Sutomo No.6', '1988-06-18', '081234567896', 'farida@example.com'),
('3201010101010007', 'Gilang Ramadhan', 'Jl. Majapahit No.7', '1993-09-22', '081234567897', 'gilang@example.com'),
('3201010101010008', 'Hana Rizky', 'Jl. Kenari No.8', '1996-11-11', '081234567898', 'hana@example.com'),
('3201010101010009', 'Iqbal Syah', 'Jl. Jenderal No.9', '1989-03-30', '081234567899', 'iqbal@example.com'),
('3201010101010010', 'Joko Prasetyo', 'Jl. Kalimantan No.10', '1987-07-07', '081234567810', 'joko@example.com'),
('3201010101010011', 'Kartika Sari', 'Jl. Palembang No.11', '1991-12-24', '081234567811', 'kartika@example.com'),
('3201010101010012', 'Lukman Hakim', 'Jl. Surabaya No.12', '1994-04-15', '081234567812', 'lukman@example.com'),
('3201010101010013', 'Maria Clara', 'Jl. Anggrek No.13', '1998-08-29', '081234567813', 'maria@example.com'),
('3201010101010014', 'Nanda Putra', 'Jl. Melati No.14', '1990-02-05', '081234567814', 'nanda@example.com'),
('3201010101010015', 'Oktavia Rani', 'Jl. Flamboyan No.15', '1992-10-10', '081234567815', 'oktavia@example.com'),
('3201010101010016', 'Puspita Dewi', 'Jl. Mawar No.16', '1993-06-20', '081234567816', 'puspita@example.com'),
('3201010101010017', 'Rian Pratama', 'Jl. Cendana No.17', '1996-01-03', '081234567817', 'rian@example.com'),
('3201010101010018', 'Siti Nurhaliza', 'Jl. Cemara No.18', '1986-05-17', '081234567818', 'siti@example.com'),
('3201010101010019', 'Taufik Hidayat', 'Jl. Pinus No.19', '1984-09-13', '081234567819', 'taufik@example.com'),
('3201010101010020', 'Ulfa Rahmi', 'Jl. Sakura No.20', '1995-07-25', '081234567820', 'ulfa@example.com'),
('3201010101010021', 'Vian Yudha', 'Jl. Kamboja No.21', '1988-12-31', '081234567821', 'vian@example.com'),
('3201010101010022', 'Wahyu Agung', 'Jl. Kemuning No.22', '1999-03-10', '081234567822', 'wahyu@example.com'),
('3201010101010023', 'Yuniarti Sari', 'Jl. Seruni No.23', '1990-06-06', '081234567823', 'yuniarti@example.com'),
('3201010101010024', 'Zaki Fauzan', 'Jl. Dahlia No.24', '1991-08-19', '081234567824', 'zaki@example.com'),
('3201010101010025', 'Ayu Lestari', 'Jl. Jati No.25', '1985-11-30', '081234567825', 'ayu@example.com'),
('5566778899', 'Bayu Hartono', 'Jl. Gatot Subroto No. 5', '2000-05-05', '085678901234', 'bayu@gmail.com'),
('9876543210', 'Rina Kartika', 'Jl. Diponegoro No. 2', '1992-02-02', '082345678910', 'rina@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pelaporan_pihak_wewenang`
--

CREATE TABLE `pelaporan_pihak_wewenang` (
  `id_interaksi` varchar(20) NOT NULL,
  `NIK` varchar(20) DEFAULT NULL,
  `id_wewenang` varchar(20) DEFAULT NULL,
  `tanggal_interaksi` datetime DEFAULT NULL,
  `deskripsi_interaksi` varchar(255) DEFAULT NULL,
  `status_interaksi` enum('Pending','Diproses','Selesai') DEFAULT NULL,
  `catatan_interaksi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelaporan_pihak_wewenang`
--

INSERT INTO `pelaporan_pihak_wewenang` (`id_interaksi`, `NIK`, `id_wewenang`, `tanggal_interaksi`, `deskripsi_interaksi`, `status_interaksi`, `catatan_interaksi`) VALUES
('PW001', '3201010101010001', 'WEW001', '2024-12-04 10:30:00', 'Laporan kehilangan barang di pasar desa', 'Diproses', 'Sedang dalam penyelidikan.'),
('PW002', '3201010101010002', 'WEW002', '2024-12-05 14:45:00', 'Kebakaran kecil di area pertanian', 'Pending', 'Menunggu penugasan tim.'),
('PW003', '3201010101010003', 'WEW003', '2024-12-05 09:15:00', 'Pengaduan pedagang liar di jalan utama', 'Selesai', 'Pedagang liar telah dipindahkan.'),
('PW004', '3201010101010004', 'WEW004', '2024-12-03 16:20:00', 'Permintaan evakuasi korban banjir', 'Selesai', 'Korban berhasil dievakuasi ke posko aman.'),
('PW005', '3201010101010005', 'WEW005', '2024-12-02 12:00:00', 'Permohonan bantuan logistik untuk korban longsor', 'Diproses', 'Bantuan sedang dikirimkan.');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_buku`
--

CREATE TABLE `peminjaman_buku` (
  `id_peminjaman` varchar(20) NOT NULL,
  `NIK` varchar(20) DEFAULT NULL,
  `id_buku` varchar(20) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status_peminjaman` enum('Dipinjam','Kembali','Terlambat') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman_buku`
--

INSERT INTO `peminjaman_buku` (`id_peminjaman`, `NIK`, `id_buku`, `tanggal_pinjam`, `tanggal_kembali`, `status_peminjaman`) VALUES
('PM001', '3201010101010001', 'BK001', '2024-12-01', '2024-12-12', 'Dipinjam'),
('PM002', '3201010101010002', 'BK002', '2024-12-02', '2024-12-08', 'Kembali'),
('PM003', '3201010101010003', 'BK003', '2024-12-03', '2024-12-09', 'Terlambat'),
('PM004', '3201010101010004', 'BK004', '2024-12-04', '2024-12-10', 'Dipinjam'),
('PM005', '3201010101010005', 'BK005', '2024-12-05', '2024-12-11', 'Kembali');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan_infrastruktur`
--

CREATE TABLE `pengaduan_infrastruktur` (
  `id_surat` varchar(20) NOT NULL,
  `NIK` varchar(20) DEFAULT NULL,
  `id_infrastruktur` varchar(20) DEFAULT NULL,
  `jenis_surat` enum('Pemasangan Baru','Pemutusan','Perubahan Data','Pengaduan','Lainnya') DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `status_pengajuan` enum('Diproses','Disetujui','Ditolak') DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan_infrastruktur`
--

INSERT INTO `pengaduan_infrastruktur` (`id_surat`, `NIK`, `id_infrastruktur`, `jenis_surat`, `tanggal_pengajuan`, `status_pengajuan`, `catatan`) VALUES
('SUR001', '1234567890', 'INF001', 'Pemasangan Baru', '2024-01-01', 'Diproses', 'Permohonan pemasangan listrik baru.'),
('SUR002', '9876543210', 'INF002', 'Pemutusan', '2024-02-01', 'Disetujui', 'Permohonan pemutusan PDAM.'),
('SUR003', '1928374655', 'INF003', 'Pengaduan', '2024-03-01', 'Ditolak', 'Gangguan koneksi internet.'),
('SUR004', '1122334455', 'INF004', 'Pemasangan Baru', '2024-04-01', 'Diproses', 'Permohonan pemasangan layanan baru.'),
('SUR005', '5566778899', 'INF005', 'Lainnya', '2024-05-01', 'Disetujui', 'Penyesuaian data pelanggan.');

-- --------------------------------------------------------

--
-- Table structure for table `pers`
--

CREATE TABLE `pers` (
  `id_pers` varchar(20) NOT NULL,
  `nama_pers` varchar(100) DEFAULT NULL,
  `alamat_pers` text DEFAULT NULL,
  `kontak_pers` varchar(15) DEFAULT NULL,
  `jenis_pers` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pers`
--

INSERT INTO `pers` (`id_pers`, `nama_pers`, `alamat_pers`, `kontak_pers`, `jenis_pers`) VALUES
('PERS001', 'Media Informasi Sejahtera', 'Jl. Kebon Jeruk No. 5', '0211122334', 'Cetak'),
('PERS002', 'Warta Online', 'Jl. Raya No. 10', '0212233445', 'Online'),
('PERS003', 'Berita Nasional', 'Jl. Merdeka No. 7', '0213344556', 'Cetak'),
('PERS004', 'Info Terkini', 'Jl. Pahlawan No. 2', '0214455667', 'Online'),
('PERS005', 'Suara Kampus', 'Jl. Cendana No. 3', '0215566778', 'Online'),
('PRS001', 'Media Rakyat', 'Jl. Pers No. 1', '081234567890', 'Cetak'),
('PRS002', 'Berita Desa', 'Jl. Kabar No. 2', '082345678910', 'Online'),
('PRS003', 'Suara Warga', 'Jl. Suara No. 3', '083456789012', 'Cetak dan Online'),
('PRS004', 'Info Desa', 'Jl. Info No. 4', '084567890123', 'Cetak'),
('PRS005', 'Kabar Terkini', 'Jl. Terkini No. 5', '085678901234', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `pihak_wewenang`
--

CREATE TABLE `pihak_wewenang` (
  `id_wewenang` varchar(20) NOT NULL,
  `nama_wewenang` varchar(100) DEFAULT NULL,
  `jenis_layanan` text DEFAULT NULL,
  `kontak_darurat` varchar(15) DEFAULT NULL,
  `alamat_kantor` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pihak_wewenang`
--

INSERT INTO `pihak_wewenang` (`id_wewenang`, `nama_wewenang`, `jenis_layanan`, `kontak_darurat`, `alamat_kantor`) VALUES
('WEW001', 'Polisi Desa', 'Pengamanan dan Pelaporan', '081234567890', 'Jl. Keamanan No. 1'),
('WEW002', 'Damkar Desa', 'Pemadam Kebakaran', '082345678910', 'Jl. Api No. 2'),
('WEW003', 'Satpol PP', 'Penertiban Umum', '083456789012', 'Jl. Tertib No. 3'),
('WEW004', 'BNPB', 'Penanggulangan Bencana', '084567890123', 'Jl. Bencana No. 4'),
('WEW005', 'BPBD', 'Bantuan Darurat', '085678901234', 'Jl. Bantuan No. 5');

-- --------------------------------------------------------

--
-- Table structure for table `puskesmas`
--

CREATE TABLE `puskesmas` (
  `id_puskesmas` varchar(20) NOT NULL,
  `nama_puskesmas` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `puskesmas`
--

INSERT INTO `puskesmas` (`id_puskesmas`, `nama_puskesmas`, `alamat`, `no_telepon`) VALUES
('PUSK001', 'Puskesmas Medika Utama', 'Jl. Melati No. 45', '0211234568'),
('PUSK002', 'Puskesmas Sehat Sejahtera', 'Jl. Kenanga No. 12', '0212345678'),
('PUSK003', 'Puskesmas Gigi Ceria', 'Jl. Mawar No. 21', '0213456789'),
('PUSK004', 'Puskesmas Mata Jernih', 'Jl. Anggrek No. 32', '0214567890');

-- --------------------------------------------------------

--
-- Table structure for table `sekretaris_desa`
--

CREATE TABLE `sekretaris_desa` (
  `id_sekretaris` varchar(20) NOT NULL,
  `nama_sekre` varchar(100) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekretaris_desa`
--

INSERT INTO `sekretaris_desa` (`id_sekretaris`, `nama_sekre`, `jabatan`, `tanggal_masuk`, `no_telepon`, `email`) VALUES
('SEK001', 'Budi Santoso', 'Sekretaris Utama', '2015-01-01', '081111111111', 'budi@gmail.com'),
('SEK002', 'Siti Aisyah', 'Sekretaris Kedua', '2016-02-01', '082222222222', 'siti@gmail.com'),
('SEK003', 'Toni Wibowo', 'Sekretaris Pembantu', '2017-03-01', '083333333333', 'toni@gmail.com'),
('SEK004', 'Rina Dewi', 'Sekretaris Umum', '2018-04-01', '084444444444', 'rina@gmail.com'),
('SEK005', 'Dewi Lestari', 'Sekretaris Desa', '2019-05-01', '085555555555', 'dewi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `support_ticket`
--

CREATE TABLE `support_ticket` (
  `id_user_support` varchar(20) NOT NULL,
  `NIK` varchar(20) DEFAULT NULL,
  `id_cs` varchar(20) DEFAULT NULL,
  `tanggal_layanan` date DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support_ticket`
--

INSERT INTO `support_ticket` (`id_user_support`, `NIK`, `id_cs`, `tanggal_layanan`, `catatan`) VALUES
('TIC001', '1234567890', 'CS001', '2024-01-01', 'Bantuan terkait layanan administrasi.'),
('TIC002', '9876543210', 'CS002', '2024-02-01', 'Pertanyaan mengenai infrastruktur.'),
('TIC003', '1928374655', 'CS003', '2024-03-01', 'Pengaduan layanan internet.'),
('TIC004', '1122334455', 'CS004', '2024-04-01', 'Bantuan penggunaan aplikasi desa.'),
('TIC005', '5566778899', 'CS005', '2024-05-01', 'Pertanyaan tentang dokumen.');

-- --------------------------------------------------------

--
-- Table structure for table `surat_dokter`
--

CREATE TABLE `surat_dokter` (
  `id_surat` varchar(20) NOT NULL,
  `NIK` varchar(20) DEFAULT NULL,
  `id_dokter` varchar(20) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `tanggal_terbit` date DEFAULT NULL,
  `alasan_pengajuan` text DEFAULT NULL,
  `status_surat` enum('Diproses','Disetujui','Ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_dokter`
--

INSERT INTO `surat_dokter` (`id_surat`, `NIK`, `id_dokter`, `tanggal_pengajuan`, `tanggal_terbit`, `alasan_pengajuan`, `status_surat`) VALUES
('SD001', '3201010101010001', 'DOK001', '2024-11-20', '2024-11-21', 'Kebutuhan pengobatan rutin', 'Disetujui'),
('SD002', '3201010101010002', 'DOK002', '2024-11-22', '2024-11-23', 'Rujukan untuk operasi anak', 'Diproses'),
('SD006', '3201010101010022', 'DOK005', '2024-10-21', '0000-00-00', 'Males ', 'Diproses'),
('SD009', '3201010101010001', 'DOK005', '2024-08-12', '0000-00-00', 'goblok voe', 'Diproses'),
('SD010', '3201010101010001', 'DOK005', '2005-07-12', '0000-00-00', 'melahirkan', 'Diproses'),
('SD011', '3201010101010022', 'DOK005', '2024-12-05', '0000-00-00', 'Diabetes', 'Diproses'),
('SD013', '3201010101010001', 'DOK005', '2024-12-04', '0000-00-00', 'Meninggal', 'Diproses'),
('SD015', '3201010101010002', 'DOK002', '2024-11-11', '0000-00-00', 'Kanker', 'Diproses'),
('SD055', '3201010101010001', 'DOK005', '2024-04-12', '2024-12-12', 'Sakit Autis tipe sedang', 'Disetujui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `administrasi_desa`
--
ALTER TABLE `administrasi_desa`
  ADD PRIMARY KEY (`id_administrasi`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `id_sekretaris` (`id_sekretaris`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `id_pers` (`id_pers`);

--
-- Indexes for table `buku_perpus`
--
ALTER TABLE `buku_perpus`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `customer_support`
--
ALTER TABLE `customer_support`
  ADD PRIMARY KEY (`id_cs`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_puskesmas` (`id_puskesmas`);

--
-- Indexes for table `infrastruktur`
--
ALTER TABLE `infrastruktur`
  ADD PRIMARY KEY (`id_infrastruktur`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `pelaporan_pihak_wewenang`
--
ALTER TABLE `pelaporan_pihak_wewenang`
  ADD PRIMARY KEY (`id_interaksi`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `id_wewenang` (`id_wewenang`);

--
-- Indexes for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `pengaduan_infrastruktur`
--
ALTER TABLE `pengaduan_infrastruktur`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `id_infrastruktur` (`id_infrastruktur`);

--
-- Indexes for table `pers`
--
ALTER TABLE `pers`
  ADD PRIMARY KEY (`id_pers`);

--
-- Indexes for table `pihak_wewenang`
--
ALTER TABLE `pihak_wewenang`
  ADD PRIMARY KEY (`id_wewenang`);

--
-- Indexes for table `puskesmas`
--
ALTER TABLE `puskesmas`
  ADD PRIMARY KEY (`id_puskesmas`);

--
-- Indexes for table `sekretaris_desa`
--
ALTER TABLE `sekretaris_desa`
  ADD PRIMARY KEY (`id_sekretaris`);

--
-- Indexes for table `support_ticket`
--
ALTER TABLE `support_ticket`
  ADD PRIMARY KEY (`id_user_support`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `id_customer_support` (`id_cs`);

--
-- Indexes for table `surat_dokter`
--
ALTER TABLE `surat_dokter`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrasi_desa`
--
ALTER TABLE `administrasi_desa`
  ADD CONSTRAINT `administrasi_desa_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `masyarakat` (`NIK`),
  ADD CONSTRAINT `administrasi_desa_ibfk_2` FOREIGN KEY (`id_sekretaris`) REFERENCES `sekretaris_desa` (`id_sekretaris`);

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `masyarakat` (`NIK`),
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id_pers`) REFERENCES `pers` (`id_pers`);

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`id_puskesmas`) REFERENCES `puskesmas` (`id_puskesmas`);

--
-- Constraints for table `pelaporan_pihak_wewenang`
--
ALTER TABLE `pelaporan_pihak_wewenang`
  ADD CONSTRAINT `pelaporan_pihak_wewenang_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `masyarakat` (`NIK`),
  ADD CONSTRAINT `pelaporan_pihak_wewenang_ibfk_2` FOREIGN KEY (`id_wewenang`) REFERENCES `pihak_wewenang` (`id_wewenang`);

--
-- Constraints for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD CONSTRAINT `peminjaman_buku_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `masyarakat` (`NIK`),
  ADD CONSTRAINT `peminjaman_buku_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku_perpus` (`id_buku`);

--
-- Constraints for table `pengaduan_infrastruktur`
--
ALTER TABLE `pengaduan_infrastruktur`
  ADD CONSTRAINT `pengaduan_infrastruktur_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `masyarakat` (`NIK`),
  ADD CONSTRAINT `pengaduan_infrastruktur_ibfk_2` FOREIGN KEY (`id_infrastruktur`) REFERENCES `infrastruktur` (`id_infrastruktur`);

--
-- Constraints for table `support_ticket`
--
ALTER TABLE `support_ticket`
  ADD CONSTRAINT `support_ticket_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `masyarakat` (`NIK`),
  ADD CONSTRAINT `support_ticket_ibfk_2` FOREIGN KEY (`id_cs`) REFERENCES `customer_support` (`id_cs`);

--
-- Constraints for table `surat_dokter`
--
ALTER TABLE `surat_dokter`
  ADD CONSTRAINT `surat_dokter_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `masyarakat` (`NIK`),
  ADD CONSTRAINT `surat_dokter_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
