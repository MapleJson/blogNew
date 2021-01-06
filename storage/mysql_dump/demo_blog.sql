SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for about
-- ----------------------------
DROP TABLE IF EXISTS `about`;
CREATE TABLE `about` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `siteName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '站点名称',
  `authorName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '作者名称',
  `birthday` datetime COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '生日',
  `profession` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '职业',
  `keywords` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '关键字',
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '站点说明',
  `mood` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '一句话描述自己',
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '一篇关于我的文章',
  `weChat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '微信号',
  `weChatQR` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '微信二维码图片',
  `qq` bigint(15) unsigned DEFAULT NULL COMMENT 'QQ号',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '邮箱',
  `topPicCount` int(5) unsigned NOT NULL COMMENT '顶部图片展示数量',
  `bannersCount` int(5) unsigned NOT NULL COMMENT '轮播图片展示数量',
  `blogShowCount` int(5) unsigned NOT NULL COMMENT '首页文章数',
  `proposeCount` int(5) unsigned NOT NULL COMMENT '站长推荐数',
  `messageCount` int(5) unsigned NOT NULL COMMENT '留言展示数',
  `rssSize` int(5) unsigned NOT NULL COMMENT '订阅展示数量',
  `template` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '模板选择',
  `record` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '备案号',
  `state` tinyint(4) NOT NULL DEFAULT '2' COMMENT '是否展示 1 展示 2 不展示',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `about_state_index` (`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of about
-- ----------------------------
BEGIN;
INSERT INTO `about` VALUES (1, '秋枫阁', 'Maple | Zoe', '2020-07-23 23:09:50', '家庭煮夫 | 吃货小可爱', '秋枫阁,Blog,博客,个人博客,Maple,Zoe,Maple与Zoe', '秋枫阁，是一个90后小夫妻记录生活点滴，学习之路的个人网站。', '一对90后小夫妻，2017年相识、相知、相恋，2018年修成正果。此个人网站作为我们生活的记录板，分享生活中的酸甜苦辣咸，记录我们共同的人生路。', '<p>策杖穿荒圃，登临笑晚风。无穷秋色蔽晴空。遥见夕阳江上、卷飞蓬。&nbsp;<br>雁过菰蒲远，山遥梦寐通。一林枫叶堕愁红。归去暮烟深处、听疏钟。<br></p><h1><span style=\"font-size: xx-large;\">🍁🍁🍁</span></h1><p>我喜欢秋天，喜欢枫叶🍁。秋高气爽登高处，一曲相思忆故人。</p><p>我们是一对小夫妻站长，我是一个PHPer，写下此个人网站，是为了留下生活中值得记录的事迹，等到以后老了，记不清一些事的时候，可以翻一翻我们的小站，看着自己曾经写下的文字，讲述着我们发生过的故事<img src=\"https://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/c3/zy_thumb.gif\" alt=\"[挤眼]\" data-w-e=\"1\"></p><p><br></p><p>本站支持三种登录方式，① QQ ② 新浪微博 ③ GitHub，登录后才可以评论和留言哦。推荐使用留言框下方的 QQ 登录和新浪微博登录，如果你比较喜欢使用 GitHub，也非常欢迎使用 GitHub 登录和交流。</p><p><br></p><h1><span style=\"font-weight: bold;\">声明</span></h1><div><span style=\"font-weight: bold;\"><br></span></div><div>\n<span style=\"font-size: large; color: rgb(139, 170, 74);\">本站源码属个人开发，已开源至GitHub，欢迎猿友们借鉴及提出建议。如有发现bug请与我取得联系，或在留言区留言告知，本人不胜感激。</span><img src=\"https://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/e7/2018new_zuoyi_org.png\" alt=\"[作揖]\" data-w-e=\"1\"><img src=\"https://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/e7/2018new_zuoyi_org.png\" alt=\"[作揖]\" data-w-e=\"1\"><img src=\"https://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/e7/2018new_zuoyi_org.png\" alt=\"[作揖]\" data-w-e=\"1\">\n</div><p><br></p><div><span style=\"font-size: large;\">本站部分数据来源于互联网，如果无意中侵害了您的合法权益，请立即点击<span style=\"color: rgb(194, 79, 74);\">底部QQ图标</span>与我联系，或<span style=\"color: rgb(194, 79, 74);\">发送邮件</span>至我们的邮箱，我们会立即作出修正。</span></div><p><br></p><h1><span style=\"font-weight: bold;\">个人信息</span></h1><div><br></div><p>Zoe / 1996 &amp; Maple / 1993</p><p>本科 / 荆楚理工学院 / 计算机工程</p><p><span style=\"font-weight: bold;\">兴趣：</span>PHP / Golang / 前端</p><p><span style=\"font-weight: bold;\">QQ：</span>641326277 &amp; 928046320</p><p><span style=\"font-weight: bold;\">Email：</span>641326277@qq.com &amp; kfbb520@163.com</p><div>\n<span style=\"font-weight: bold;\">GitHub：</span><a href=\"https://github.com/MapleJson\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: rgb(70, 172, 200);\">https://github.com/MapleJson</a><br>\n</div><p><br></p><h1><span style=\"font-weight: bold;\">关于我的博客</span></h1><div><span style=\"font-weight: bold;\"><br></span></div><p>域 名：52zoe.com 创建于2018年06月25日<br></p><p>服务器：阿里云服务器&nbsp;&nbsp;<a href=\"https://promotion.aliyun.com/ntms/yunparter/invite.html?userCode=h6rtubqa\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: rgb(194, 79, 74); font-size: large; font-weight: bold;\">前往阿里云官网购买&gt;&gt;</a><br></p><p>程 序：Laravel5.6 + laravel-admin&nbsp;&nbsp;<a href=\"https://github.com/MapleJson/blog\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: rgb(77, 128, 191);\">前往GitHub查看源码</a></p><p>分享一个七牛云存储：<a href=\"https://portal.qiniu.com/signup?code=3lc4jscgk9h02\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255);\">https://portal.qiniu.com/signup?code=3lc4jscgk9h02</a></p><p>如果我的开源项目对你有用，欢迎<span style=\"font-weight: bold;\">Star</span></p>', 'Maple-tea', 'images/20181121/da5ab275960f50602aecc4624bedebb7.jpg', 928046320, 'kfbb520@163.com', 3, 5, 20, 6, 50, 50, 'showTime', '鄂ICP备18019316号', 1, '2018-05-30 14:30:30', '2018-12-20 10:44:53');
COMMIT;

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
BEGIN;
INSERT INTO `admin_menu` VALUES (1, 0, 1, 'admin.index', '主页', 'layui-icon-home', '/admin/index.html', NULL, '2018-12-15 19:34:25');
INSERT INTO `admin_menu` VALUES (2, 0, 3, 'admin.carousel', '首页图片', 'layui-icon-picture', '/admin/carousel.html', '2018-06-21 15:11:26', '2018-12-15 21:38:58');
INSERT INTO `admin_menu` VALUES (3, 0, 5, 'admin.posts', '文章管理', 'layui-icon-read', '/admin/posts.html', '2018-06-20 01:02:50', '2018-12-15 21:42:12');
INSERT INTO `admin_menu` VALUES (4, 0, 7, 'admin.tags', '标签管理', 'layui-icon-note', '/admin/tags.html', '2018-06-20 21:48:55', '2018-12-15 21:27:06');
INSERT INTO `admin_menu` VALUES (5, 0, 9, 'admin.travels', '相册管理', 'layui-icon-picture-fine', '/admin/travels.html', '2018-06-21 16:01:21', '2018-12-15 21:40:29');
INSERT INTO `admin_menu` VALUES (6, 0, 11, 'admin.whispers', '心情管理', 'layui-icon-face-smile-b', '/admin/whispers.html', '2018-06-29 02:16:56', '2018-12-15 21:41:01');
INSERT INTO `admin_menu` VALUES (7, 0, 13, 'admin.message', '留言管理', 'layui-icon-dialogue', '/admin/message.html', '2018-06-21 15:59:27', '2018-12-15 21:41:29');
INSERT INTO `admin_menu` VALUES (8, 0, 15, 'admin.links', '友情链接', 'layui-icon-link', '/admin/links.html', '2018-06-20 23:25:14', '2018-12-15 19:36:51');
INSERT INTO `admin_menu` VALUES (9, 0, 17, 'admin.frontUsers', '用户管理', 'layui-icon-user', '/admin/frontUsers.html', '2018-06-27 01:02:15', '2018-12-15 21:41:47');
INSERT INTO `admin_menu` VALUES (10, 0, 19, 'admin.siteSetting', '网站设置', 'layui-icon-set', '/admin/siteSetting.html', '2018-06-21 10:20:40', '2018-12-15 21:43:36');
INSERT INTO `admin_menu` VALUES (11, 0, 21, 'admin.template', '模板管理', 'layui-icon-template', '/admin/template.html', '2018-06-29 02:16:56', '2018-12-15 21:41:01');
INSERT INTO `admin_menu` VALUES (12, 0, 23, 'admin.baby', '宝宝起居记录', 'layui-icon-male', '/admin/baby.html', '2018-06-29 02:16:56', '2018-12-15 21:41:01');
INSERT INTO `admin_menu` VALUES (13, 0, 50, '', '管理员', 'layui-icon-group', NULL, NULL, '2018-12-15 21:16:46');
INSERT INTO `admin_menu` VALUES (14, 2, 51, 'admin.administrators', '管理员管理', 'layui-icon-user', '/admin/administrators.html', NULL, '2018-12-15 21:38:18');
INSERT INTO `admin_menu` VALUES (15, 2, 53, 'admin.menus', '菜单管理', 'layui-icon-more-vertical', '/admin/menus.html', NULL, '2018-12-15 21:38:24');
INSERT INTO `admin_menu` VALUES (16, 2, 55, 'admin.logs', '日志管理', 'layui-icon-console', '/admin/logs.html', NULL, '2018-12-15 21:39:25');
COMMIT;

-- ----------------------------
-- Table structure for admin_operation_log
-- ----------------------------
DROP TABLE IF EXISTS `admin_operation_log`;
CREATE TABLE `admin_operation_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for admin_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for admin_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_menu`;
CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for admin_role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_permissions`;
CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for admin_role_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for admin_user_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_permissions`;
CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
BEGIN;
INSERT INTO `admin_users` VALUES (1, 'admin', '$2y$10$LwqPq8dWP.Mg7EdQHXJsR.1bToNWWzypPhnjEzcvQWWHBk5zTXULu', '管理员', 'admin@163.com', 'images/20180626/fdd7caf8159148cec3b5a36368c816ad.jpeg', NULL, '2018-06-21 09:22:13', '2018-06-26 12:08:03');
COMMIT;

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标题',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '封面图',
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章简介',
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章内容',
  `authorName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '作者',
  `authorEmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '作者邮箱',
  `read` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '阅读量',
  `comments` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `isTop` tinyint(4) unsigned NOT NULL DEFAULT '2' COMMENT '是否置顶 1 置顶 2 不置顶',
  `recommend` tinyint(4) unsigned NOT NULL DEFAULT '2' COMMENT '是否推荐 1 推荐 2 不推荐',
  `original` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '是否原创 1 是(原创) 2 否(转载)',
  `state` tinyint(4) unsigned NOT NULL DEFAULT '2' COMMENT '是否展示 1 展示 2 不展示',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_title_index` (`title`),
  KEY `blog_istop_index` (`isTop`),
  KEY `blog_recommend_index` (`recommend`),
  KEY `blog_state_index` (`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for blog_tag
-- ----------------------------
DROP TABLE IF EXISTS `blog_tag`;
CREATE TABLE `blog_tag` (
  `blog_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `blog_tag_blog_id_tag_id_index` (`blog_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for carousels
-- ----------------------------
DROP TABLE IF EXISTS `carousels`;
CREATE TABLE `carousels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标题',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图片地址',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '类型 1 顶部 2 轮播 3 右侧',
  `state` tinyint(4) NOT NULL DEFAULT '2' COMMENT '是否展示 1 展示 2 不展示',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carousels_title_index` (`title`),
  KEY `carousels_type_index` (`type`),
  KEY `carousels_state_index` (`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for icons
-- ----------------------------
DROP TABLE IF EXISTS `icons`;
CREATE TABLE `icons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unicode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'unicode 字符',
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '类名',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '名称',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of icons
-- ----------------------------
BEGIN;
INSERT INTO `icons` VALUES (1, '&#xe6c9;', 'layui-icon-rate-half', '半星', 0, '2018-12-10 16:44:38', '2018-12-10 16:44:38');
INSERT INTO `icons` VALUES (2, '&#xe67b;', 'layui-icon-rate', '星星-空心', 0, '2018-12-10 16:44:38', '2018-12-10 16:44:38');
INSERT INTO `icons` VALUES (3, '&#xe67a;', 'layui-icon-rate-solid', '星星-实心', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (4, '&#xe678;', 'layui-icon-cellphone', '手机', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (5, '&#xe679;', 'layui-icon-vercode', '验证码', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (6, '&#xe677;', 'layui-icon-login-wechat', '微信', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (7, '&#xe676;', 'layui-icon-login-qq', 'QQ', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (8, '&#xe675;', 'layui-icon-login-weibo', '微博', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (9, '&#xe673;', 'layui-icon-password', '密码', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (10, '&#xe66f;', 'layui-icon-username', '用户名', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (11, '&#xe9aa;', 'layui-icon-refresh-3', '刷新-粗', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (12, '&#xe672;', 'layui-icon-auz', '授权', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (13, '&#xe66b;', 'layui-icon-spread-left', '左向右伸缩菜单', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (14, '&#xe668;', 'layui-icon-shrink-right', '右向左伸缩菜单', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (15, '&#xe6b1;', 'layui-icon-snowflake', '雪花', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (16, '&#xe702;', 'layui-icon-tips', '提示说明', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (17, '&#xe66e;', 'layui-icon-note', '便签', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (18, '&#xe68e;', 'layui-icon-home', '主页', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (19, '&#xe674;', 'layui-icon-senior', '高级', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (20, '&#xe669;', 'layui-icon-refresh', '刷新', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (21, '&#xe666;', 'layui-icon-refresh-1', '刷新', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (22, '&#xe66c;', 'layui-icon-flag', '旗帜', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (23, '&#xe66a;', 'layui-icon-theme', '主题', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (24, '&#xe667;', 'layui-icon-notice', '消息-通知', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (25, '&#xe7ae;', 'layui-icon-website', '网站', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (26, '&#xe665;', 'layui-icon-console', '控制台', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (27, '&#xe664;', 'layui-icon-face-surprised', '表情-惊讶', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (28, '&#xe716;', 'layui-icon-set', '设置-空心', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (29, '&#xe656;', 'layui-icon-template-1', '模板', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (30, '&#xe653;', 'layui-icon-app', '应用', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (31, '&#xe663;', 'layui-icon-template', '模板', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (32, '&#xe6c6;', 'layui-icon-praise', '赞', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (33, '&#xe6c5;', 'layui-icon-tread', '踩', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (34, '&#xe662;', 'layui-icon-male', '男', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (35, '&#xe661;', 'layui-icon-female', '女', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (36, '&#xe660;', 'layui-icon-camera', '相机-空心', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (37, '&#xe65d;', 'layui-icon-camera-fill', '相机-实心', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (38, '&#xe65f;', 'layui-icon-more', '菜单-水平', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (39, '&#xe671;', 'layui-icon-more-vertical', '菜单-垂直', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (40, '&#xe65e;', 'layui-icon-rmb', '金额-人民币', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (41, '&#xe659;', 'layui-icon-dollar', '金额-美元', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (42, '&#xe735;', 'layui-icon-diamond', '钻石-等级', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (43, '&#xe756;', 'layui-icon-fire', '火', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (44, '&#xe65c;', 'layui-icon-return', '返回', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (45, '&#xe715;', 'layui-icon-location', '位置-地图', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (46, '&#xe705;', 'layui-icon-read', '办公-阅读', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (47, '&#xe6b2;', 'layui-icon-survey', '调查', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (48, '&#xe6af;', 'layui-icon-face-smile', '表情-微笑', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (49, '&#xe69c;', 'layui-icon-face-cry', '表情-哭泣', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (50, '&#xe698;', 'layui-icon-cart-simple', '购物车', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (51, '&#xe657;', 'layui-icon-cart', '购物车', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (52, '&#xe65b;', 'layui-icon-next', '下一页', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (53, '&#xe65a;', 'layui-icon-prev', '上一页', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (54, '&#xe681;', 'layui-icon-upload-drag', '上传-空心-拖拽', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (55, '&#xe67c;', 'layui-icon-upload', '上传-实心', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (56, '&#xe601;', 'layui-icon-download-circle', '下载-圆圈', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (57, '&#xe857;', 'layui-icon-component', '组件', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (58, '&#xe655;', 'layui-icon-file-b', '文件-粗', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (59, '&#xe770;', 'layui-icon-user', '用户', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (60, '&#xe670;', 'layui-icon-find-fill', '发现-实心', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (61, '&#xe63d;', 'layui-icon-loading', 'loading', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (62, '&#xe63e;', 'layui-icon-loading-1', 'loading', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (63, '&#xe654;', 'layui-icon-add-1', '添加', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (64, '&#xe652;', 'layui-icon-play', '播放', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (65, '&#xe651;', 'layui-icon-pause', '暂停', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (66, '&#xe6fc;', 'layui-icon-headset', '音频-耳机', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (67, '&#xe6ed;', 'layui-icon-video', '视频', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (68, '&#xe688;', 'layui-icon-voice', '语音-声音', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (69, '&#xe645;', 'layui-icon-speaker', '消息-通知-喇叭', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (70, '&#xe64f;', 'layui-icon-fonts-del', '删除线', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (71, '&#xe64e;', 'layui-icon-fonts-code', '代码', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (72, '&#xe64b;', 'layui-icon-fonts-html', 'HTML', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (73, '&#xe62b;', 'layui-icon-fonts-strong', '字体加粗', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (74, '&#xe64d;', 'layui-icon-unlink', '删除链接', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (75, '&#xe64a;', 'layui-icon-picture', '图片', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (76, '&#xe64c;', 'layui-icon-link', '链接', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (77, '&#xe650;', 'layui-icon-face-smile-b', '表情-笑-粗', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (78, '&#xe649;', 'layui-icon-align-left', '左对齐', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (79, '&#xe648;', 'layui-icon-align-right', '右对齐', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (80, '&#xe647;', 'layui-icon-align-center', '居中对齐', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (81, '&#xe646;', 'layui-icon-fonts-u', '字体-下划线', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (82, '&#xe644;', 'layui-icon-fonts-i', '字体-斜体', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (83, '&#xe62a;', 'layui-icon-tabs', 'Tabs 选项卡', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (84, '&#xe643;', 'layui-icon-radio', '单选框-选中', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (85, '&#xe63f;', 'layui-icon-circle', '单选框-候选', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (86, '&#xe642;', 'layui-icon-edit', '编辑', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (87, '&#xe641;', 'layui-icon-share', '分享', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (88, '&#xe640;', 'layui-icon-delete', '删除', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (89, '&#xe63c;', 'layui-icon-form', '表单', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (90, '&#xe63b;', 'layui-icon-cellphone-fine', '手机-细体', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (91, '&#xe63a;', 'layui-icon-dialogue', '聊天 对话 沟通', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (92, '&#xe639;', 'layui-icon-fonts-clear', '文字格式化', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (93, '&#xe638;', 'layui-icon-layer', '窗口', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (94, '&#xe637;', 'layui-icon-date', '日期', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (95, '&#xe636;', 'layui-icon-water', '水 下雨', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (96, '&#xe635;', 'layui-icon-code-circle', '代码-圆圈', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (97, '&#xe634;', 'layui-icon-carousel', '轮播组图', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (98, '&#xe633;', 'layui-icon-prev-circle', '翻页', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (99, '&#xe632;', 'layui-icon-layouts', '布局', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (100, '&#xe631;', 'layui-icon-util', '工具', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (101, '&#xe630;', 'layui-icon-templeate-1', '选择模板', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (102, '&#xe62f;', 'layui-icon-upload-circle', '上传-圆圈', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (103, '&#xe62e;', 'layui-icon-tree', '树', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (104, '&#xe62d;', 'layui-icon-table', '表格', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (105, '&#xe62c;', 'layui-icon-chart', '图表', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (106, '&#xe629;', 'layui-icon-chart-screen', '图标 报表 屏幕', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (107, '&#xe628;', 'layui-icon-engine', '引擎', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (108, '&#xe625;', 'layui-icon-triangle-d', '下三角', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (109, '&#xe623;', 'layui-icon-triangle-r', '右三角', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (110, '&#xe621;', 'layui-icon-file', '文件', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (111, '&#xe620;', 'layui-icon-set-sm', '设置-小型', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (112, '&#xe61f;', 'layui-icon-add-circle', '添加-圆圈', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (113, '&#xe61c;', 'layui-icon-404', '404', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (114, '&#xe60b;', 'layui-icon-about', '关于', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (115, '&#xe619;', 'layui-icon-up', '箭头 向上', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (116, '&#xe61a;', 'layui-icon-down', '箭头 向下', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (117, '&#xe603;', 'layui-icon-left', '箭头 向左', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (118, '&#xe602;', 'layui-icon-right', '箭头 向右', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (119, '&#xe617;', 'layui-icon-circle-dot', '圆点', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (120, '&#xe615;', 'layui-icon-search', '搜索', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (121, '&#xe614;', 'layui-icon-set-fill', '设置-实心', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (122, '&#xe613;', 'layui-icon-group', '群组', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (123, '&#xe612;', 'layui-icon-friends', '好友', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (124, '&#xe611;', 'layui-icon-reply-fill', '回复 评论 实心', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (125, '&#xe60f;', 'layui-icon-menu-fill', '菜单 隐身 实心', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (126, '&#xe60e;', 'layui-icon-log', '记录', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (127, '&#xe60d;', 'layui-icon-picture-fine', '图片-细体', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (128, '&#xe60c;', 'layui-icon-face-smile-fine', '表情-笑-细体', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (129, '&#xe60a;', 'layui-icon-list', '列表', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (130, '&#xe609;', 'layui-icon-release', '发布 纸飞机', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (131, '&#xe605;', 'layui-icon-ok', '对 OK', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (132, '&#xe607;', 'layui-icon-help', '帮助', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (133, '&#xe606;', 'layui-icon-chat', '客服', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (134, '&#xe604;', 'layui-icon-top', 'top 置顶', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (135, '&#xe600;', 'layui-icon-star', '收藏-空心', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (136, '&#xe658;', 'layui-icon-star-fill', '收藏-实心', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (137, '&#x1007;', 'layui-icon-close-fill', '关闭-实心', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (138, '&#x1006;', 'layui-icon-close', '关闭-空心', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (139, '&#x1005;', 'layui-icon-ok-circle', '正确', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
INSERT INTO `icons` VALUES (140, '&#xe608;', 'layui-icon-add-circle-fine', '添加-圆圈-细体', 0, '2018-12-10 16:44:39', '2018-12-10 16:44:39');
COMMIT;

-- ----------------------------
-- Table structure for links
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '链接',
  `logo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'logo链接',
  `title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '站点名称',
  `summary` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '站点说明',
  `me` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '是否是我的站群 1是 2否 默认2',
  `state` tinyint(4) NOT NULL DEFAULT '2' COMMENT '审核状态 1 通过 2 待审核 3 不通过',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `link_state_index` (`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `articleId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章ID',
  `parentId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主评论ID',
  `targetId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '被回复人ID',
  `targetUser` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '作者' COMMENT '被回复人名称',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '回复人头像',
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '回复人名称',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '回复内容',
  `reply` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为回复留言',
  `state` tinyint(4) NOT NULL DEFAULT '2' COMMENT '是否展示 1 展示 2 不展示',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `message_articleid_index` (`articleId`),
  KEY `message_parentid_index` (`parentId`),
  KEY `message_targetid_index` (`targetId`),
  KEY `message_state_index` (`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2016_01_04_173148_create_admin_tables', 1);
INSERT INTO `migrations` VALUES (2, '2018_05_29_143810_create_blog_table', 1);
INSERT INTO `migrations` VALUES (3, '2018_05_29_143846_create_about_table', 1);
INSERT INTO `migrations` VALUES (4, '2018_05_29_143857_create_messages_table', 1);
INSERT INTO `migrations` VALUES (5, '2018_05_29_143911_create_links_table', 1);
INSERT INTO `migrations` VALUES (6, '2018_05_29_143930_create_travels_table', 1);
INSERT INTO `migrations` VALUES (7, '2018_05_29_144028_create_users_table', 1);
INSERT INTO `migrations` VALUES (8, '2018_05_29_161344_create_tags_table', 1);
INSERT INTO `migrations` VALUES (9, '2018_05_29_165611_create_thumbs_table', 1);
INSERT INTO `migrations` VALUES (10, '2018_05_29_165625_create_intermediate_table', 1);
INSERT INTO `migrations` VALUES (11, '2018_05_29_170027_create_photos_table', 1);
INSERT INTO `migrations` VALUES (12, '2018_05_30_094446_create_carousels_table', 2);
COMMIT;

-- ----------------------------
-- Table structure for photos
-- ----------------------------
DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `travelId` int(10) unsigned NOT NULL COMMENT '图片所属相册',
  `img` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图片地址',
  `summary` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '图片简介',
  `state` tinyint(4) NOT NULL DEFAULT '2' COMMENT '是否展示 1 展示 2 不展示',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photos_travelid_index` (`travelId`),
  KEY `photos_state_index` (`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标签名称',
  `state` tinyint(4) NOT NULL DEFAULT '2' COMMENT '是否展示 1 展示 2 不展示',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tags_state_index` (`state`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tags
-- ----------------------------
BEGIN;
INSERT INTO `tags` VALUES (1, '个人日志', 1, '2018-06-26 15:24:01', '2018-06-26 15:24:01');
INSERT INTO `tags` VALUES (2, '旅游攻略', 1, '2018-06-26 15:24:21', '2018-06-26 15:24:21');
INSERT INTO `tags` VALUES (3, '分享', 1, '2018-06-27 23:17:14', '2018-06-27 23:17:14');
INSERT INTO `tags` VALUES (4, '生活', 1, '2018-07-14 22:31:29', '2018-07-14 22:31:29');
COMMIT;

-- ----------------------------
-- Table structure for travels
-- ----------------------------
DROP TABLE IF EXISTS `travels`;
CREATE TABLE `travels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cover` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '封面',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '相册标题',
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '相册简介',
  `state` tinyint(4) NOT NULL DEFAULT '2' COMMENT '是否展示 1 展示 2 不展示',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `travel_state_index` (`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '用户头像',
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名称',
  `nickname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户昵称',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '用户邮箱',
  `password` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '用户密码',
  `confirmationToken` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'token',
  `githubId` bigint(15) unsigned DEFAULT NULL COMMENT 'github登录ID',
  `githubName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'github账户名称',
  `githubUrl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'github地址',
  `qqOpenid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'QQ登录ID',
  `wbOpenId` bigint(15) unsigned DEFAULT NULL COMMENT '微博ID',
  `state` tinyint(4) NOT NULL DEFAULT '2' COMMENT '是否展示 1 展示 2 不展示',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_state_index` (`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for whispers
-- ----------------------------
DROP TABLE IF EXISTS `whispers`;
CREATE TABLE `whispers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '作者',
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '内容',
  `state` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT '是否展示 1 展示 2 不展示',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `whispers_state_index` (`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for templates
-- ----------------------------
DROP TABLE IF EXISTS `templates`;
CREATE TABLE `templates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '模板名称',
  `state` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否启用 1 启用 2 不启用',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of templates
-- ----------------------------
BEGIN;
INSERT INTO `templates` VALUES (1, 'showTime', 1, '2018-06-26 15:24:01', '2018-06-26 15:24:01');
INSERT INTO `templates` VALUES (2, 'morning', 1, '2018-06-26 15:24:21', '2018-06-26 15:24:21');
INSERT INTO `templates` VALUES (3, 'quiet', 1, '2018-06-27 23:17:14', '2018-06-27 23:17:14');
COMMIT;

-- ----------------------------
-- Table structure for baby_log
-- ----------------------------
DROP TABLE IF EXISTS `baby_log`;
CREATE TABLE `baby_log` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
	`action` INT(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT '行为 1亲喂 2瓶喂 3小便 4大便 5特殊情况',
	`breast` INT(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '母乳量 ml',
	`dried` INT(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '奶粉量 ml',
	`remark` VARCHAR(255) NULL DEFAULT NULL COMMENT '备注' COLLATE 'utf8mb4_unicode_ci',
	`day` DATE NULL DEFAULT NULL COMMENT '日期',
	`status` TINYINT(1) UNSIGNED NULL DEFAULT '1' COMMENT '行为是否完成，1是 2否',
	`created_at` TIMESTAMP NULL DEFAULT NULL,
	`updated_at` TIMESTAMP NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='宝宝起居记录';

SET FOREIGN_KEY_CHECKS = 1;
