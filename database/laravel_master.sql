/*
Navicat MySQL Data Transfer

Source Server         : A LOCAL MYSQL
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : laravel_master

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-05-07 18:49:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `image_id` int(255) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_users` (`user_id`),
  KEY `fk_comments_images` (`image_id`),
  CONSTRAINT `fk_comments_images` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  CONSTRAINT `fk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1', '1', '4', 'Buena foto de familia!!', '2020-02-22 10:34:42', '2020-02-22 10:34:42');
INSERT INTO `comments` VALUES ('2', '2', '1', 'Buena foto de PLAYA!!', '2020-02-22 10:34:42', '2020-02-22 10:34:42');
INSERT INTO `comments` VALUES ('3', '2', '4', 'que bueno!!', '2020-02-22 10:34:42', '2020-02-22 10:34:42');
INSERT INTO `comments` VALUES ('4', '4', '6', 'Que bueno', '2020-03-19 03:38:36', '2020-03-19 03:38:36');
INSERT INTO `comments` VALUES ('5', '4', '6', 'buenisimo', '2020-05-07 23:04:13', '2020-05-07 23:04:13');

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_images_users` (`user_id`),
  CONSTRAINT `fk_images_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('1', '1', '158457718534-345142_suit-boys-avatar-icon-png-clipart.png', 'gdgdgfdgdg', '2020-03-19 00:19:45', '2020-03-19 00:19:45');
INSERT INTO `images` VALUES ('2', '2', '158457718534-345142_suit-boys-avatar-icon-png-clipart.png', 'gdgdgfdgdg', '2020-03-19 00:19:45', '2020-03-19 00:19:45');
INSERT INTO `images` VALUES ('3', '3', '158457718534-345142_suit-boys-avatar-icon-png-clipart.png', 'gdgdgfdgdg', '2020-03-19 00:19:45', '2020-03-19 00:19:45');
INSERT INTO `images` VALUES ('4', '4', '158457718534-345142_suit-boys-avatar-icon-png-clipart.png', 'gdgdgfdgdg', '2020-03-19 00:19:45', '2020-03-19 00:19:45');
INSERT INTO `images` VALUES ('5', '4', '158457718534-345142_suit-boys-avatar-icon-png-clipart.png', 'gdgdgfdgdg', '2020-03-19 00:19:45', '2020-03-19 00:19:45');
INSERT INTO `images` VALUES ('6', '4', '1584578791gc.png', 'gc', '2020-03-19 00:46:31', '2020-03-19 00:46:31');

-- ----------------------------
-- Table structure for likes
-- ----------------------------
DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `image_id` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_likes_users` (`user_id`),
  KEY `fk_likes_images` (`image_id`),
  CONSTRAINT `fk_likes_images` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  CONSTRAINT `fk_likes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of likes
-- ----------------------------
INSERT INTO `likes` VALUES ('13', '4', '5', '2020-03-19 19:08:00', '2020-03-19 19:08:00');
INSERT INTO `likes` VALUES ('17', '4', '6', '2020-03-19 19:28:08', '2020-03-19 19:28:08');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `nick` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'user', 'Víctor', 'Robles', 'victorroblesweb', 'victor@victor.com', 'pass', null, '2020-02-22 10:34:42', '2020-02-22 10:34:42', null);
INSERT INTO `users` VALUES ('2', 'user', 'Juan', 'Lopez', 'juanlopez', 'juan@juan.com', 'pass', null, '2020-02-22 10:34:42', '2020-02-22 10:34:42', null);
INSERT INTO `users` VALUES ('3', 'user', 'Manolo', 'Garcia', 'manologarcia', 'manolo@manolo.com', 'pass', null, '2020-02-22 10:34:42', '2020-02-22 10:34:42', null);
INSERT INTO `users` VALUES ('4', 'user', 'Luis', 'Martinez', 'luis', 'luis@gmail.com', '$2y$10$qHQMA1txMkSjge8R/LLgiOT64m.fO0qkPG2pW/KmDWON5wSxKJ0ci', '1584577613d4c0c142f91f012c9a8a9c9aeef3bac28036f15b.webp', '2020-02-22 15:40:45', '2020-03-19 00:26:53', null);
