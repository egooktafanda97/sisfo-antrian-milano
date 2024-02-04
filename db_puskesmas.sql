/*
 Navicat Premium Data Transfer

 Source Server         : mysql windows
 Source Server Type    : MySQL
 Source Server Version : 80031 (8.0.31)
 Source Host           : localhost:3307
 Source Schema         : milano

 Target Server Type    : MySQL
 Target Server Version : 80031 (8.0.31)
 File Encoding         : 65001

 Date: 04/02/2024 19:31:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `setting_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'session_wa', '67581', '2024-02-03 22:16:46', '2024-02-03 23:20:50');

-- ----------------------------
-- Table structure for tb_antrian
-- ----------------------------
DROP TABLE IF EXISTS `tb_antrian`;
CREATE TABLE `tb_antrian`  (
  `id_antrian` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `antrian` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_konsul` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `konsul_act` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `confirmasi_kedatangan` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_antrian`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_antrian
-- ----------------------------
INSERT INTO `tb_antrian` VALUES (20, '2024-02-04', '5001', 'dikonfirmasi', '', '', 'true');
INSERT INTO `tb_antrian` VALUES (21, '2024-02-04', '7001', 'dikonfirmasi', 'selesai', 'true', 'true');
INSERT INTO `tb_antrian` VALUES (22, '2024-02-04', '5002', 'dikonfirmasi', '', '', 'true');
INSERT INTO `tb_antrian` VALUES (23, '2024-02-04', '5003', 'dikonfirmasi', '', '', 'true');
INSERT INTO `tb_antrian` VALUES (24, '2024-02-04', '7002', 'dikonfirmasi', 'selesai', 'true', 'true');
INSERT INTO `tb_antrian` VALUES (25, '2024-02-04', '7003', 'dikonfirmasi', 'selesai', 'true', 'true');
INSERT INTO `tb_antrian` VALUES (26, '2024-02-04', '5004', 'dikonfirmasi', NULL, NULL, NULL);
INSERT INTO `tb_antrian` VALUES (27, '2024-02-04', '5005', 'dikonfirmasi', NULL, NULL, NULL);
INSERT INTO `tb_antrian` VALUES (28, '2024-02-04', '5006', 'dikonfirmasi', NULL, NULL, NULL);
INSERT INTO `tb_antrian` VALUES (29, '2024-02-04', '5007', 'dikonfirmasi', NULL, NULL, NULL);
INSERT INTO `tb_antrian` VALUES (30, '2024-02-04', '5008', 'dikonfirmasi', NULL, NULL, NULL);
INSERT INTO `tb_antrian` VALUES (31, '2024-02-04', '5009', 'dikonfirmasi', NULL, NULL, NULL);
INSERT INTO `tb_antrian` VALUES (32, '2024-02-04', '5010', 'dikonfirmasi', NULL, NULL, NULL);
INSERT INTO `tb_antrian` VALUES (33, '2024-02-04', '5011', 'dikonfirmasi', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tb_daftar
-- ----------------------------
DROP TABLE IF EXISTS `tb_daftar`;
CREATE TABLE `tb_daftar`  (
  `id_daftar` int NOT NULL AUTO_INCREMENT,
  `id_antrian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nowa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `umur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `berat_badan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_besuk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `penyakit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_dokter` int NULL DEFAULT NULL,
  `id_jamkes` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_daftar`) USING BTREE,
  UNIQUE INDEX `id_antrian`(`id_antrian` ASC) USING BTREE,
  INDEX `id_dokter`(`id_dokter` ASC) USING BTREE,
  INDEX `id_jamkes`(`id_jamkes` ASC) USING BTREE,
  CONSTRAINT `tb_daftar_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tb_daftar_ibfk_2` FOREIGN KEY (`id_jamkes`) REFERENCES `tb_jamkes` (`id_jamkes`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_daftar
-- ----------------------------
INSERT INTO `tb_daftar` VALUES (4, '20', 'Yovi ardiansyah', 'Sungai langsat, Pangean , Kuantan singingi', '6282284733404', 'Laki-Laki', '19', '54', '2024-02-04', 'tete', 5, 1);
INSERT INTO `tb_daftar` VALUES (5, '21', 'Hasban Dio Saputra', 'Sungai langsat, Pangean , Kuantan singingi', '6282284733404', 'Perempuan', '19', '54', '2024-02-04', 'tete', 7, 1);
INSERT INTO `tb_daftar` VALUES (6, '22', 'ewewe', 'Sungai langsat, Pangean , Kuantan singingi', '6282284733404', 'Laki-Laki', '19', '54', '2024-02-04', 'tete', 5, 1);
INSERT INTO `tb_daftar` VALUES (7, '23', 'Fulana', 'Pangean', '6282284733404', 'Laki-Laki', '19', '54', '2024-02-04', 'tete', 5, 1);
INSERT INTO `tb_daftar` VALUES (8, '24', 'Ulfaidi', 'Sungai langsat, Pangean , Kuantan singingi', '6282284733404', 'Perempuan', '19', '54', '2024-02-04', 'tete', 7, 1);
INSERT INTO `tb_daftar` VALUES (9, '25', 'ego oktafanda', 'pangean, sungai langsat', '6282284733404', 'Laki-Laki', '27', '65', '2024-02-04', 't', 7, 1);
INSERT INTO `tb_daftar` VALUES (27, '33', 'xaxa', '--', '6282284733404', 'Laki-Laki', '27', '65', '2024-02-04', 't', 5, 1);
INSERT INTO `tb_daftar` VALUES (28, '26', 'xaxa', '--', '6282284733404', 'Laki-Laki', '27', '65', '2024-02-04', 't', 5, 1);

-- ----------------------------
-- Table structure for tb_dokter
-- ----------------------------
DROP TABLE IF EXISTS `tb_dokter`;
CREATE TABLE `tb_dokter`  (
  `id_dokter` int NOT NULL AUTO_INCREMENT,
  `nama_dokter` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pendidikan_akhir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_layanan` int NOT NULL,
  `user_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_dokter`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_dokter
-- ----------------------------
INSERT INTO `tb_dokter` VALUES (5, 'YOVI ARDIANSYAH', 'Sei Langsat, Pangean, Kuantan Singingi, Riau', '2003-05-07', 'Sungai langsat, Pangean , Kuantan singingi', 'Laki-Laki', 'AKADEMIK', 'Magister', 6, 4);
INSERT INTO `tb_dokter` VALUES (7, 'EGO OKTAFANDA', 'Sei Langsat, Pangean, Kuantan Singingi, Riau', '1998-06-17', 'Sungai langsat, Pangean , Kuantan singingi', 'Laki-Laki', 'AKADEMIK', 'Magister', 7, 5);
INSERT INTO `tb_dokter` VALUES (16, 'igo', 'sl', '2024-02-02', 'pangean, sungai langsat', 'Laki-Laki', '1', 'Magister', 6, 6);

-- ----------------------------
-- Table structure for tb_jadwal
-- ----------------------------
DROP TABLE IF EXISTS `tb_jadwal`;
CREATE TABLE `tb_jadwal`  (
  `id_jadwal` int NOT NULL AUTO_INCREMENT,
  `id_dokter` int NOT NULL,
  `bagian` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hari_pertama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hari_terakhir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jam_pertama` time NOT NULL,
  `jam_terakhir` time NOT NULL,
  PRIMARY KEY (`id_jadwal`) USING BTREE,
  UNIQUE INDEX `id_dokter`(`id_dokter` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_jadwal
-- ----------------------------
INSERT INTO `tb_jadwal` VALUES (2, 5, 'Telinga dan Kesehatan', 'Senin', 'Rabu', '10:07:00', '08:04:00');
INSERT INTO `tb_jadwal` VALUES (3, 7, 'Sakit Perut Maag dan Sebagainya', 'Senin', 'Kamis', '01:12:00', '05:16:00');

-- ----------------------------
-- Table structure for tb_jamkes
-- ----------------------------
DROP TABLE IF EXISTS `tb_jamkes`;
CREATE TABLE `tb_jamkes`  (
  `id_jamkes` int NOT NULL AUTO_INCREMENT,
  `singkatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_jamkes` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_jamkes`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_jamkes
-- ----------------------------
INSERT INTO `tb_jamkes` VALUES (1, 'BPJS', 'Badan Penyelenggara Jaminan Sosial');

-- ----------------------------
-- Table structure for tb_layanan
-- ----------------------------
DROP TABLE IF EXISTS `tb_layanan`;
CREATE TABLE `tb_layanan`  (
  `id_layanan` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `layanan_medis` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `info_medis` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_layanan` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_layanan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_layanan
-- ----------------------------
INSERT INTO `tb_layanan` VALUES (6, 'Demam Berdarah', 'Penyembuhan Demam Berdarah', 'Dikarenakan Demam Berdarah Sangat Berbahaya Bagi Kesehatan Kita Semua, Dan Menyebabkan Kematian', 'DB');
INSERT INTO `tb_layanan` VALUES (7, 'Sakit Perut', 'Sakit Perut Maag dan Sebagainya', 'Mengobati berbagai penyakit yang menyerang perut', 'SP');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `akses` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (4, 'yoviard', '$2y$10$fCLTmj19KrvHUO6OdbyFG.R0f9OkzyEAtFwnknB7Rh6Fic/7j.R36', 'YOVI ARDIANSYAH', 'dokter');
INSERT INTO `tb_user` VALUES (5, 'ego', '$2y$10$fCLTmj19KrvHUO6OdbyFG.R0f9OkzyEAtFwnknB7Rh6Fic/7j.R36', 'EGO OKTAFANDA', 'dokter');
INSERT INTO `tb_user` VALUES (6, 'igo', '$2y$10$UDbu3mO.hdPzIjVdFA0uueQ3fqK/tdtFsF7yHdPu1kHzjbywSUJPu', 'igo', 'dokter');
INSERT INTO `tb_user` VALUES (15, 'admin', '$2y$10$fCLTmj19KrvHUO6OdbyFG.R0f9OkzyEAtFwnknB7Rh6Fic/7j.R36', 'YOVI ARDIANSYAH', 'admin');

SET FOREIGN_KEY_CHECKS = 1;
