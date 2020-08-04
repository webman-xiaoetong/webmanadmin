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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='文章TAG表';;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='文章表';;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='无限级分类表';;
