-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'user'
-- 
-- ---

DROP TABLE IF EXISTS `user`;
		
CREATE TABLE `user` (
  `id` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `nick` VARCHAR(50) NOT NULL,
  `avatar` VARCHAR(128) NOT NULL DEFAULT 'images/default_avatar.png',
  `phone` VARCHAR(64) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `hash` VARCHAR(32) NOT NULL,
  `role` INTEGER NOT NULL DEFAULT 1,
  `active` INTEGER NOT NULL DEFAULT 0,
  `reg_ip` VARCHAR(64) NOT NULL,
  `reg_date` DATETIME NOT NULL,
  `verify_date` DATETIME NOT NULL,
  `last_login` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'menu'
-- 
-- ---

DROP TABLE IF EXISTS `menu`;
		
CREATE TABLE `menu` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(128) NOT NULL,
  `category_id` INTEGER NOT NULL,
  `qty` DECIMAL(8,2) NOT NULL,
  `price` DECIMAL(8,2) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'category'
-- 
-- ---

DROP TABLE IF EXISTS `category`;
		
CREATE TABLE `category` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'order'
-- 
-- ---

DROP TABLE IF EXISTS `order`;
		
CREATE TABLE `order` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(128) NOT NULL,
  `phone` VARCHAR(32) NOT NULL,
  `address` VARCHAR(512) NOT NULL,
  `delivery_type` VARCHAR(64) NOT NULL,
  `finished` INTEGER NOT NULL DEFAULT 0,
  `delivered` INTEGER NOT NULL DEFAULT 0,
  `order_received` DATETIME NOT NULL,
  `order_delivered` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'user_role'
-- 
-- ---

DROP TABLE IF EXISTS `user_role`;
		
CREATE TABLE `user_role` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'order_detail'
-- 
-- ---

DROP TABLE IF EXISTS `order_detail`;
		
CREATE TABLE `order_detail` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `order_id` INTEGER NOT NULL,
  `menu_id` INTEGER NOT NULL,
  `qty` DECIMAL(8,2) NOT NULL,
  `price` DECIMAL(8,2) NOT NULL,
  `sum` DECIMAL(8,2) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'user_order'
-- 
-- ---

DROP TABLE IF EXISTS `user_order`;
		
CREATE TABLE `user_order` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `user_id` INTEGER NOT NULL,
  `delivery_type` VARCHAR NOT NULL,
  `finished` INTEGER NOT NULL DEFAULT 0,
  `delivered` INTEGER NOT NULL DEFAULT 0,
  `order_received` DATETIME NOT NULL,
  `order_delivered` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'user_order_detail'
-- 
-- ---

DROP TABLE IF EXISTS `user_order_detail`;
		
CREATE TABLE `user_order_detail` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `user_order_id` INTEGER NULL DEFAULT NULL,
  `menu_id` INTEGER NOT NULL,
  `qty` DECIMAL(8,2) NOT NULL,
  `price` DECIMAL(8,2) NOT NULL,
  `sum` DECIMAL(8,2) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---


-- ---
-- Table Properties
-- ---

-- ALTER TABLE `user` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `menu` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `category` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `order` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `user_role` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `order_detail` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `user_order` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `user_order_detail` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `user` (`id`,`nick`,`avatar`,`phone`,`email`,`password`,`hash`,`role`,`active`,`reg_ip`,`reg_date`,`verify_date`,`last_login`) VALUES
-- ('','','','','','','','','','','','','');
-- INSERT INTO `menu` (`id`,`name`,`category_id`,`qty`,`price`) VALUES
-- ('','','','','');
-- INSERT INTO `category` (`id`,`name`) VALUES
-- ('','');
-- INSERT INTO `order` (`id`,`name`,`phone`,`address`,`delivery_type`,`finished`,`delivered`,`order_received`,`order_delivered`) VALUES
-- ('','','','','','','','','');
-- INSERT INTO `user_role` (`id`,`name`) VALUES
-- ('','');
-- INSERT INTO `order_detail` (`id`,`order_id`,`menu_id`,`qty`,`price`,`sum`) VALUES
-- ('','','','','','');
-- INSERT INTO `user_order` (`id`,`user_id`,`delivery_type`,`finished`,`delivered`,`order_received`,`order_delivered`) VALUES
-- ('','','','','','','');
-- INSERT INTO `user_order_detail` (`id`,`user_order_id`,`menu_id`,`qty`,`price`,`sum`) VALUES
-- ('','','','','','');