/*
 Navicat Premium Data Transfer

 Source Server         : bpmpd
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : rideline_sdgs

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 07/09/2025 14:48:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for keluarga
-- ----------------------------
DROP TABLE IF EXISTS `keluarga`;
CREATE TABLE `keluarga`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomor_kk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nik_kepala_keluarga` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lokasi_id` int NULL DEFAULT NULL,
  `enumerator_id` int NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `lokasi_id`(`lokasi_id` ASC) USING BTREE,
  INDEX `enumerator_id`(`enumerator_id` ASC) USING BTREE,
  CONSTRAINT `keluarga_ibfk_1` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `keluarga_ibfk_2` FOREIGN KEY (`enumerator_id`) REFERENCES `enumerator` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
