-- ----------------------------
-- Table structure for positions
-- ----------------------------
DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '位置名称',
`sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='广告位置表';

-- ----------------------------
-- Table structure for adverts
-- ----------------------------
DROP TABLE IF EXISTS `adverts`;
CREATE TABLE `adverts` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '广告标题',
`thumb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图片链接',
`link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '跳转链接',
`sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
`position_id` int(11) NOT NULL COMMENT '位置ID',
`description` text COLLATE utf8mb4_unicode_ci COMMENT '广告描述',
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='广告表';

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名称',
`sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='TAG表';

-- ----------------------------
-- Table structure for article_tag
-- ----------------------------
DROP TABLE IF EXISTS `article_tag`;
CREATE TABLE `article_tag` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`article_id` int(11) NOT NULL COMMENT '资讯ID',
`tag_id` int(11) NOT NULL COMMENT '标签ID',
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='文章-TAG关联表';

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`category_id` int(11) NOT NULL COMMENT '分类id',
`title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标题',
`keywords` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '关键词',
`description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '描述',
`content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '内容',
`click` int(11) NOT NULL DEFAULT '0' COMMENT '点击量',
`thumb` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '缩略图',
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='文章表';

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名称',
`parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '上级ID',
`sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='无限级分类表';

DROP TABLE IF EXISTS `districts`;
CREATE TABLE `districts` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`adcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '行政编码',
`name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名字',
`center` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '经纬度',
`level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '级别',
`parent_id` int(11) NOT NULL DEFAULT '0',
`sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='地区三级联动表';

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '手机',
`name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '昵称',
`password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
`avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '头像',
`remember_token` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '记住我',
`uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
`deleted_at` timestamp NULL DEFAULT NULL,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='前台会员表';

-- ----------------------------
-- Table structure for sites
-- ----------------------------
DROP TABLE IF EXISTS `sites`;
CREATE TABLE `sites` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
 `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='全局站点配置表';


-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
`phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
`name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
`email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
`password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
`remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY `users_username_unique` (`username`),
UNIQUE KEY `users_phone_unique` (`phone`),
UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='后台用户表';