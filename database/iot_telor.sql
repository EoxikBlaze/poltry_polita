-- =============================================================
-- Skema database "iot_telor" - Sistem Pendataan Ayam & Telur
-- Politry Polita (Kelompok 17 PBL Politeknik Negeri Tanah Laut)
--
-- Cara pakai: buat database `iot_telor` lalu import file ini
-- (phpMyAdmin: Import, atau CLI: mysql -u root iot_telor < iot_telor.sql)
-- =============================================================

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- -------------------------------------------------------------
-- Tabel: user (login aplikasi)
-- -------------------------------------------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
    `id_user` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `nama_lengkap` VARCHAR(100) NOT NULL,
    `nomor_telepon` VARCHAR(20) DEFAULT NULL,
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `level` ENUM('Admin', 'Pemilik', 'Penjaga') NOT NULL DEFAULT 'Penjaga',
    PRIMARY KEY (`id_user`),
    UNIQUE KEY `username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Login awal: username=admin password=admin123 (SEGERA GANTI setelah login!)
INSERT INTO `user` (`nama_lengkap`, `nomor_telepon`, `username`, `password`, `level`) VALUES
('Administrator', '081234567890', 'admin', '$2y$12$kbvxlrLS5qfoYiG7gWS3POZMs//dzOAhkIIpUu.ewOEa/oCkQEDpm', 'Admin');

-- -------------------------------------------------------------
-- Tabel: data_pekerja (penanggung jawab kandang)
-- -------------------------------------------------------------
DROP TABLE IF EXISTS `data_pekerja`;
CREATE TABLE `data_pekerja` (
    `id_pekerja` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `nama_pekerja` VARCHAR(100) NOT NULL,
    `no_hp_pekerja` VARCHAR(20) DEFAULT NULL,
    `gajih_pekerja` DECIMAL(15,2) DEFAULT 0,
    PRIMARY KEY (`id_pekerja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `data_pekerja` (`nama_pekerja`, `no_hp_pekerja`, `gajih_pekerja`) VALUES
('Budi Santoso', '081234567891', 2500000),
('Siti Aminah', '081234567892', 2500000);

-- -------------------------------------------------------------
-- Tabel: kandang
-- -------------------------------------------------------------
DROP TABLE IF EXISTS `kandang`;
CREATE TABLE `kandang` (
    `id_kandang` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_pekerja` INT UNSIGNED DEFAULT NULL,
    `nama_kandang` VARCHAR(100) NOT NULL,
    `nama_penanggung_jawab` VARCHAR(100) DEFAULT NULL,
    `lokasi` VARCHAR(150) DEFAULT NULL,
    `kapasitas` VARCHAR(50) DEFAULT NULL,
    `tanggal_pembuatan` DATE DEFAULT NULL,
    PRIMARY KEY (`id_kandang`),
    CONSTRAINT `pengelola_kandang` FOREIGN KEY (`id_pekerja`)
        REFERENCES `data_pekerja` (`id_pekerja`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kandang` (`id_pekerja`, `nama_kandang`, `nama_penanggung_jawab`, `lokasi`, `kapasitas`, `tanggal_pembuatan`) VALUES
(1, 'Kandang A', 'Budi Santoso', 'Blok Utara', '500', '2024-09-01'),
(2, 'Kandang B', 'Siti Aminah', 'Blok Selatan', '400', '2024-09-15');

-- -------------------------------------------------------------
-- Tabel: siklus_ayam
-- -------------------------------------------------------------
DROP TABLE IF EXISTS `siklus_ayam`;
CREATE TABLE `siklus_ayam` (
    `id_siklus` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_kandang` INT UNSIGNED DEFAULT NULL,
    `nama_kandang_siklus` VARCHAR(100) DEFAULT NULL,
    `minggu_siklus` VARCHAR(50) DEFAULT NULL,
    `tanggal_mulai` DATE DEFAULT NULL,
    `tanggal_selesai` DATE DEFAULT NULL,
    `jumlah_ayam` INT DEFAULT 0,
    `total_telor_utuh` INT DEFAULT 0,
    `jumlah_ikat` INT DEFAULT 0,
    PRIMARY KEY (`id_siklus`),
    CONSTRAINT `siklus_kandang` FOREIGN KEY (`id_kandang`)
        REFERENCES `kandang` (`id_kandang`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `siklus_ayam` (`id_kandang`, `nama_kandang_siklus`, `minggu_siklus`, `tanggal_mulai`, `tanggal_selesai`, `jumlah_ayam`, `total_telor_utuh`, `jumlah_ikat`) VALUES
(1, 'Kandang A', '1', '2024-10-01', '2024-10-08', 500, 1200, 60),
(2, 'Kandang B', '1', '2024-10-01', '2024-10-08', 400, 950, 47);

-- -------------------------------------------------------------
-- Tabel: pencatatan_harian
-- -------------------------------------------------------------
DROP TABLE IF EXISTS `pencatatan_harian`;
CREATE TABLE `pencatatan_harian` (
    `id_pencatatan_harian` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_kandang` INT UNSIGNED DEFAULT NULL,
    `id_siklus_ayam` INT UNSIGNED DEFAULT NULL,
    `nama_kandang_pencatatan` VARCHAR(100) DEFAULT NULL,
    `minggu_siklus_pencatatan` VARCHAR(50) DEFAULT NULL,
    `tanggal_pencatatan` DATE DEFAULT NULL,
    `tambahan_ayam` INT DEFAULT 0,
    `ayam_mati` INT DEFAULT 0,
    `utuh_butir_pencatatan` INT DEFAULT 0,
    `utuh_kg_pencatatan` DECIMAL(10,2) DEFAULT 0,
    `retak_butir_pencatatan` INT DEFAULT 0,
    `retak_kg_pencatatan` DECIMAL(10,2) DEFAULT 0,
    `putih_butir_pencatatan` INT DEFAULT 0,
    `putih_kg_pencatatan` DECIMAL(10,2) DEFAULT 0,
    `total_butir_pencatatan` INT DEFAULT 0,
    `total_kg_pencatatan` DECIMAL(10,2) DEFAULT 0,
    PRIMARY KEY (`id_pencatatan_harian`),
    CONSTRAINT `pencatatan_kandang` FOREIGN KEY (`id_kandang`)
        REFERENCES `kandang` (`id_kandang`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `pencatatan_siklus` FOREIGN KEY (`id_siklus_ayam`)
        REFERENCES `siklus_ayam` (`id_siklus`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pencatatan_harian`
(`id_kandang`, `id_siklus_ayam`, `nama_kandang_pencatatan`, `minggu_siklus_pencatatan`, `tanggal_pencatatan`, `tambahan_ayam`, `ayam_mati`, `utuh_butir_pencatatan`, `utuh_kg_pencatatan`, `retak_butir_pencatatan`, `retak_kg_pencatatan`, `putih_butir_pencatatan`, `putih_kg_pencatatan`, `total_butir_pencatatan`, `total_kg_pencatatan`) VALUES
(1, 1, 'Kandang A', '1', '2024-10-02', 0, 2, 150, 9.00, 5, 0.30, 3, 0.15, 158, 9.45),
(2, 2, 'Kandang B', '1', '2024-10-02', 0, 1, 120, 7.20, 4, 0.24, 2, 0.10, 126, 7.54);

SET FOREIGN_KEY_CHECKS = 1;
