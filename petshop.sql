/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50719
 Source Host           : localhost:3306
 Source Schema         : petshop

 Target Server Type    : MySQL
 Target Server Version : 50719
 File Encoding         : 65001

 Date: 19/04/2018 12:01:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phone` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `type` enum('Syarikat','Individu') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for inventories
-- ----------------------------
DROP TABLE IF EXISTS `inventories`;
CREATE TABLE `inventories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NULL DEFAULT NULL,
  `available` int(11) NULL DEFAULT NULL,
  `warning_qty` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2018_02_07_040823_modify_customers_table', 2);
INSERT INTO `migrations` VALUES (4, '2018_02_07_080221_add_timestamps_to_products', 3);
INSERT INTO `migrations` VALUES (5, '2018_02_09_040200_add_role_id_to_user', 4);
INSERT INTO `migrations` VALUES (6, '2018_02_09_041705_create_role_table', 5);
INSERT INTO `migrations` VALUES (7, '2018_02_09_042438_create_roles_table', 6);
INSERT INTO `migrations` VALUES (8, '2018_02_12_020255_add_code_to_rolse', 6);
INSERT INTO `migrations` VALUES (9, '2018_02_12_020919_add_code_to_rolse', 7);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_id` int(11) NULL DEFAULT NULL,
  `cust_id` int(11) NULL DEFAULT NULL,
  `orderdate` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `qty` int(11) NULL DEFAULT NULL,
  `discount` decimal(10, 3) NULL DEFAULT NULL,
  `gst_rate` decimal(10, 3) NULL DEFAULT NULL,
  `total_price` decimal(10, 3) NULL DEFAULT NULL,
  `status` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `producttype_id` int(11) NULL DEFAULT NULL,
  `supplier_id` int(11) NULL DEFAULT NULL,
  `unit_price` decimal(10, 3) NULL DEFAULT NULL,
  `unit_new` decimal(10, 3) NULL DEFAULT NULL,
  `foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Budgie C', 1, 1, 25.000, 23.000, 'img/produk/budgie2.jpg', NULL, '2018-02-12 04:20:34');
INSERT INTO `products` VALUES (2, 'Bunny', 2, 1, 35.000, 32.900, 'img/produk/bunny.jpg', NULL, '2018-02-12 06:32:18');
INSERT INTO `products` VALUES (5, 'Cockatiels Whiteface', 1, 1, 150.000, 110.500, 'img/produk/cockatiel_wf.jpg', '2018-02-07 08:16:26', '2018-02-12 04:21:18');
INSERT INTO `products` VALUES (6, 'Neatherland Bunny Baby', 2, 1, 150.000, NULL, 'img/produk/arnab_nd.jpg', '2018-02-07 08:19:30', '2018-02-07 08:19:30');
INSERT INTO `products` VALUES (8, 'Cockatiels Lutino (Female Matured)', 1, 1, 160.000, NULL, 'img/produk/cockatiel_lutino.jpg', '2018-02-07 08:24:30', '2018-02-07 08:24:30');
INSERT INTO `products` VALUES (9, 'Baby Sugar Glider', 3, 1, 150.000, 130.000, 'img/produk/sg1.jpg', '2018-02-07 08:49:09', '2018-02-12 06:33:19');
INSERT INTO `products` VALUES (11, 'Cockatiels (Baby)', 1, 1, 100.000, 90.000, 'img/produk/tiel_baby1.jpg', '2018-02-08 03:30:55', '2018-02-12 06:33:02');
INSERT INTO `products` VALUES (12, 'Love Bird', 1, 1, 110.000, 100.000, 'img/produk/LB1.jpg', '2018-02-08 04:23:00', '2018-02-08 04:23:00');
INSERT INTO `products` VALUES (13, 'Hamster Syrian', 5, 1, 13.000, 12.000, 'img/produk/hamster1.jpg', '2018-02-08 08:36:34', '2018-02-08 08:36:34');
INSERT INTO `products` VALUES (14, 'Budgie C (Muda)', 1, 1, 25.000, NULL, 'img/produk/budgie.jpg', '2018-02-09 02:27:26', '2018-02-09 02:27:26');
INSERT INTO `products` VALUES (15, 'Kasawari Matang (Jantan)', 1, 1, 550.000, 510.000, 'img/produk/Cassowary (Kasawari).jpg', '2018-02-12 07:08:59', '2018-02-12 07:24:22');

-- ----------------------------
-- Table structure for producttypes
-- ----------------------------
DROP TABLE IF EXISTS `producttypes`;
CREATE TABLE `producttypes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `code` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of producttypes
-- ----------------------------
INSERT INTO `producttypes` VALUES (1, 'Burung', 'AV');
INSERT INTO `producttypes` VALUES (2, 'Arnab', 'RB');
INSERT INTO `producttypes` VALUES (3, 'Sugar Glider', 'SG');
INSERT INTO `producttypes` VALUES (4, 'Hedge Hog', 'HH');
INSERT INTO `producttypes` VALUES (5, 'Hamster', 'HS');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `code` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `role_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'Pentadbir', NULL, NULL, 'ADM');
INSERT INTO `role` VALUES (2, 'Pelanggan', NULL, NULL, 'CUS');
INSERT INTO `role` VALUES (3, 'Pembekal', NULL, NULL, 'SUP');
INSERT INTO `role` VALUES (4, 'Staf', NULL, NULL, 'STA');

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (1, 'B', 'Booking');
INSERT INTO `status` VALUES (2, 'P', 'Pending');
INSERT INTO `status` VALUES (3, 'S', 'Settled');

-- ----------------------------
-- Table structure for suppliers
-- ----------------------------
DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phone` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of suppliers
-- ----------------------------
INSERT INTO `suppliers` VALUES (1, 'Penchala Petshop', 'Dsara KL', '0123456789');
INSERT INTO `suppliers` VALUES (2, 'Cranature', 'Seri Kembangan', '0127890002');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `role_id` int(11) NULL DEFAULT 2,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'aaznul@gmail.com', '$2y$10$Jzm1XDUewcWBNbbw/Zl8w.2P9H1s65m0JkAqMNxvRk.JSuF/Hh71a', 'jHpmbomlpFhkG030xFd4eFTUSEJHzMYptr8Ek0jPwkw2V88Ly5Z4mBS2nP4q', '2018-02-09 02:17:59', '2018-02-12 02:48:43', 1);
INSERT INTO `users` VALUES (2, 'Staf', 'hangkasturi5@yahoo.com', '$2y$10$7p2r1WWzOsg7YeZ6wI97teN11IfX2Uy31a5xbsKuQjKcCilBm9/EC', 'IxLM0wFVdjjVi3vvWQCabNlrGGw6qd3huUfXMKMe2qYKT1rhdj3iZx1gD66y', '2018-02-12 02:23:39', '2018-02-12 02:23:39', 4);

SET FOREIGN_KEY_CHECKS = 1;
