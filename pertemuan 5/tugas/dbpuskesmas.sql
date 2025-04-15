

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `kelurahan` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `kelurahan` (`id`, `nama`, `kode_id`) VALUES
(1, 'Kelurahan Ciriung', 0),
(2, 'Kelurahan Pasir Angin', 0);


CREATE TABLE `paramedik` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `tmp_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kategori` enum('dokter','perawat','bidan') DEFAULT NULL,
  `tlpon` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `unit_kerja_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `paramedik` (`id`, `nama`, `gender`, `tmp_lahir`, `tgl_lahir`, `kategori`, `tlpon`, `alamat`, `unit_kerja_id`) VALUES
(1, 'Dr. Rina', 'P', 'Jakarta', '1985-01-01', 'dokter', '081234567890', 'Jl. Kenanga 9', 1),
(2, 'Sucipto', 'L', 'Garut', '1998-10-10', 'perawat', '0895675353476', 'Jl. Melati 3', 2);


CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `tmp_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kelurahan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `pasien` (`id`, `kode`, `nama`, `tmp_lahir`, `tgl_lahir`, `gender`, `email`, `alamat`, `kelurahan_id`) VALUES
(1, 'P001', 'Andi', 'Bandung', '2000-05-21', 'L', 'andi@mail.com', 'Jl. Mawar 12', 1),
(2, 'P002', 'Siti', 'Garut', '1998-10-10', 'P', 'siti@mail.com', 'Jl. Melati 3', 2);


CREATE TABLE `periksa` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `berat` double DEFAULT NULL,
  `tinggi` double DEFAULT NULL,
  `tensi` varchar(20) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `pasien_id` int(11) DEFAULT NULL,
  `dokter_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `periksa` (`id`, `tanggal`, `berat`, `tinggi`, `tensi`, `keterangan`, `pasien_id`, `dokter_id`) VALUES
(1, '2025-04-01', 60, 165, '120/80', 'Sehat', 1, 1),
(2, '2025-04-02', 70, 170, '130/85', 'Flu ringan', 2, 2);


CREATE TABLE `unit_kerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `unit_kerja` (`id`, `nama`) VALUES
(1, 'Puskesmas Induk'),
(2, 'Puskesmas Sukamaju');


ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `paramedik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_kerja_id` (`unit_kerja_id`);


ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelurahan_id` (`kelurahan_id`);


ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pasien_id` (`pasien_id`),
  ADD KEY `dokter_id` (`dokter_id`);


ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `kelurahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `paramedik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `unit_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `paramedik`
  ADD CONSTRAINT `paramedik_ibfk_1` FOREIGN KEY (`unit_kerja_id`) REFERENCES `unit_kerja` (`id`);


ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`);


ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_ibfk_1` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`),
  ADD CONSTRAINT `periksa_ibfk_2` FOREIGN KEY (`dokter_id`) REFERENCES `paramedik` (`id`);
COMMIT;

