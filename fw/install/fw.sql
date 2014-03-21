-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2014 年 03 月 21 日 01:27
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `fw`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_admin`
-- 

CREATE TABLE `codec2i_admin` (
  `id` int(11) NOT NULL auto_increment,
  `adm_name` varchar(255) NOT NULL,
  `adm_password` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `role_id` int(11) NOT NULL,
  `login_time` int(11) NOT NULL,
  `login_ip` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `unique_adm_name` (`adm_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `codec2i_admin`
-- 

INSERT INTO `codec2i_admin` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 0, 4, 1395336271, '127.0.0.1');

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_adv`
-- 

CREATE TABLE `codec2i_adv` (
  `id` int(11) NOT NULL auto_increment,
  `tmpl` varchar(255) NOT NULL,
  `adv_id` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rel_id` int(11) NOT NULL,
  `rel_table` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `tmpl` (`tmpl`),
  KEY `adv_id` (`adv_id`),
  KEY `rel_id` (`rel_id`),
  KEY `rel_table` (`rel_table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `codec2i_adv`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_api_login`
-- 

CREATE TABLE `codec2i_api_login` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `config` text NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `bicon` varchar(255) NOT NULL,
  `is_weibo` tinyint(1) NOT NULL,
  `dispname` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- 导出表中的数据 `codec2i_api_login`
-- 

INSERT INTO `codec2i_api_login` VALUES (13, '新浪api登录接口', 'a:3:{s:7:"app_key";s:0:"";s:10:"app_secret";s:0:"";s:7:"app_url";s:0:"";}', 'Sina', './public/attachment/201401/07/16/52cbbbde27487.gif', './public/attachment/201401/07/16/52cbbbe5d26b6.gif', 1, '新浪微博');
INSERT INTO `codec2i_api_login` VALUES (14, '腾讯微博登录插件', 'a:3:{s:7:"app_key";s:9:"801468487";s:10:"app_secret";s:32:"252e70fb6a60a68b522c3af3dc3c4e7b";s:7:"app_url";s:51:"http://106.186.121.49/fw/api_callback.php?c=Tencent";}', 'Tencent', './public/attachment/201401/07/16/52cbbbcb87955.gif', './public/attachment/201401/07/16/52cbbbd0ab32d.gif', 1, '腾讯微博');

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_auto_cache`
-- 

CREATE TABLE `codec2i_auto_cache` (
  `cache_key` varchar(100) NOT NULL,
  `cache_type` varchar(100) NOT NULL,
  `cache_data` text NOT NULL,
  `cache_time` int(11) NOT NULL,
  PRIMARY KEY  (`cache_key`,`cache_type`),
  KEY `cache_type` (`cache_type`),
  KEY `cache_key` (`cache_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `codec2i_auto_cache`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_conf`
-- 

CREATE TABLE `codec2i_conf` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `input_type` tinyint(1) NOT NULL COMMENT '配置输入的类型 0:文本输入 1:下拉框输入 2:图片上传 3:编辑器',
  `value_scope` text NOT NULL COMMENT '取值范围',
  `is_effect` tinyint(1) NOT NULL,
  `is_conf` tinyint(1) NOT NULL COMMENT '是否可配置 0: 可配置  1:不可配置',
  `sort` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=177 ;

-- 
-- 导出表中的数据 `codec2i_conf`
-- 

INSERT INTO `codec2i_conf` VALUES (1, 'DEFAULT_ADMIN', 'admin', 1, 0, '', 1, 0, 0);
INSERT INTO `codec2i_conf` VALUES (2, 'URL_MODEL', '0', 1, 1, '0,1', 1, 1, 3);
INSERT INTO `codec2i_conf` VALUES (3, 'AUTH_KEY', 'codec2i', 1, 0, '', 1, 1, 4);
INSERT INTO `codec2i_conf` VALUES (4, 'TIME_ZONE', '8', 1, 1, '0,8', 1, 1, 1);
INSERT INTO `codec2i_conf` VALUES (5, 'ADMIN_LOG', '1', 1, 1, '0,1', 0, 1, 0);
INSERT INTO `codec2i_conf` VALUES (6, 'DB_VERSION', '1.4', 0, 0, '', 1, 0, 0);
INSERT INTO `codec2i_conf` VALUES (7, 'DB_VOL_MAXSIZE', '8000000', 1, 0, '', 1, 1, 11);
INSERT INTO `codec2i_conf` VALUES (8, 'WATER_MARK', '', 2, 2, '', 1, 1, 48);
INSERT INTO `codec2i_conf` VALUES (10, 'BIG_WIDTH', '500', 2, 0, '', 0, 0, 49);
INSERT INTO `codec2i_conf` VALUES (11, 'BIG_HEIGHT', '500', 2, 0, '', 0, 0, 50);
INSERT INTO `codec2i_conf` VALUES (12, 'SMALL_WIDTH', '200', 2, 0, '', 0, 0, 51);
INSERT INTO `codec2i_conf` VALUES (13, 'SMALL_HEIGHT', '200', 2, 0, '', 0, 0, 52);
INSERT INTO `codec2i_conf` VALUES (14, 'WATER_ALPHA', '75', 2, 0, '', 1, 1, 53);
INSERT INTO `codec2i_conf` VALUES (15, 'WATER_POSITION', '5', 2, 1, '1,2,3,4,5', 1, 1, 54);
INSERT INTO `codec2i_conf` VALUES (16, 'MAX_IMAGE_SIZE', '3000000', 2, 0, '', 1, 1, 55);
INSERT INTO `codec2i_conf` VALUES (17, 'ALLOW_IMAGE_EXT', 'jpg,gif,png', 2, 0, '', 1, 1, 56);
INSERT INTO `codec2i_conf` VALUES (18, 'BG_COLOR', '#ffffff', 2, 0, '', 0, 0, 57);
INSERT INTO `codec2i_conf` VALUES (19, 'IS_WATER_MARK', '1', 2, 1, '0,1', 1, 1, 58);
INSERT INTO `codec2i_conf` VALUES (20, 'TEMPLATE', 'codec2i', 1, 0, '', 1, 1, 17);
INSERT INTO `codec2i_conf` VALUES (21, 'SITE_LOGO', './public/attachment/201312/28/21/52bed6c46ebb5.png', 1, 2, '', 1, 1, 19);
INSERT INTO `codec2i_conf` VALUES (173, 'SEO_TITLE', '众筹系统', 1, 0, '', 1, 1, 20);
INSERT INTO `codec2i_conf` VALUES (25, 'REPLY_ADDRESS', 'zc@codec2i.com', 3, 0, '', 1, 1, 77);
INSERT INTO `codec2i_conf` VALUES (23, 'MAIL_ON', '1', 3, 1, '0,1', 1, 1, 72);
INSERT INTO `codec2i_conf` VALUES (24, 'SMS_ON', '0', 3, 1, '0,1', 1, 1, 78);
INSERT INTO `codec2i_conf` VALUES (26, 'PUBLIC_DOMAIN_ROOT', '', 2, 0, '', 1, 1, 59);
INSERT INTO `codec2i_conf` VALUES (27, 'APP_MSG_SENDER_OPEN', '0', 1, 1, '0,1', 1, 1, 9);
INSERT INTO `codec2i_conf` VALUES (28, 'ADMIN_MSG_SENDER_OPEN', '0', 1, 1, '0,1', 1, 1, 10);
INSERT INTO `codec2i_conf` VALUES (29, 'GZIP_ON', '0', 1, 1, '0,1', 1, 1, 2);
INSERT INTO `codec2i_conf` VALUES (42, 'SITE_NAME', 'codec2i', 1, 0, '', 1, 1, 1);
INSERT INTO `codec2i_conf` VALUES (30, 'CACHE_ON', '1', 1, 1, '0,1', 1, 1, 7);
INSERT INTO `codec2i_conf` VALUES (31, 'EXPIRED_TIME', '0', 1, 0, '', 1, 1, 5);
INSERT INTO `codec2i_conf` VALUES (32, 'TMPL_DOMAIN_ROOT', '', 2, 0, '0', 0, 0, 62);
INSERT INTO `codec2i_conf` VALUES (33, 'CACHE_TYPE', 'File', 1, 1, 'File,Xcache,Memcached', 1, 1, 7);
INSERT INTO `codec2i_conf` VALUES (34, 'MEMCACHE_HOST', '127.0.0.1:11211', 1, 0, '', 1, 1, 8);
INSERT INTO `codec2i_conf` VALUES (35, 'IMAGE_USERNAME', 'admin', 2, 0, '', 1, 1, 60);
INSERT INTO `codec2i_conf` VALUES (36, 'IMAGE_PASSWORD', 'admin', 2, 4, '', 1, 1, 61);
INSERT INTO `codec2i_conf` VALUES (37, 'DEAL_MSG_LOCK', '0', 0, 0, '', 0, 0, 0);
INSERT INTO `codec2i_conf` VALUES (38, 'SEND_SPAN', '2', 1, 0, '', 1, 1, 85);
INSERT INTO `codec2i_conf` VALUES (39, 'TMPL_CACHE_ON', '1', 1, 1, '0,1', 1, 1, 6);
INSERT INTO `codec2i_conf` VALUES (40, 'DOMAIN_ROOT', '', 1, 0, '', 1, 0, 10);
INSERT INTO `codec2i_conf` VALUES (41, 'COOKIE_PATH', '/', 1, 0, '', 1, 1, 10);
INSERT INTO `codec2i_conf` VALUES (43, 'INTEGRATE_CFG', '', 0, 0, '', 1, 0, 0);
INSERT INTO `codec2i_conf` VALUES (44, 'INTEGRATE_CODE', '', 0, 0, '', 1, 0, 0);
INSERT INTO `codec2i_conf` VALUES (172, 'PAY_RADIO', '0.1', 3, 0, '', 1, 1, 10);
INSERT INTO `codec2i_conf` VALUES (176, 'SITE_LICENSE', 'codec2i', 1, 0, '', 1, 1, 22);
INSERT INTO `codec2i_conf` VALUES (174, 'SEO_KEYWORD', 'SEO关键词', 1, 0, '', 1, 1, 21);
INSERT INTO `codec2i_conf` VALUES (175, 'SEO_DESCRIPTION', 'SEO描述', 1, 0, '', 1, 1, 22);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_deal`
-- 

CREATE TABLE `codec2i_deal` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `name_match` text NOT NULL,
  `name_match_row` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `source_vedio` varchar(255) NOT NULL,
  `vedio` varchar(255) NOT NULL,
  `deal_days` int(11) NOT NULL COMMENT '上线天数，仅提供管理员审核参考',
  `begin_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `limit_price` double(20,4) NOT NULL,
  `brief` text NOT NULL,
  `description` text NOT NULL,
  `comment_count` int(11) NOT NULL,
  `support_count` int(11) NOT NULL COMMENT '支持人数',
  `focus_count` int(11) NOT NULL,
  `view_count` int(11) NOT NULL,
  `log_count` int(11) NOT NULL,
  `support_amount` double(20,4) NOT NULL COMMENT '支持总金额，需大等于limit_price(不含运费)',
  `pay_amount` double(20,4) NOT NULL COMMENT '可发放金额，抽完佣金的可领金额（含运费，运费不抽佣金）\r\n即support_amount*佣金比率+delivery_fee_amount',
  `delivery_fee_amount` double(20,4) NOT NULL,
  `create_time` int(11) NOT NULL,
  `seo_title` text NOT NULL,
  `seo_keyword` text NOT NULL,
  `seo_description` text NOT NULL,
  `tags` text NOT NULL,
  `tags_match` text NOT NULL,
  `tags_match_row` text NOT NULL,
  `success_time` int(11) NOT NULL,
  `is_success` tinyint(1) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `user_id` int(11) default NULL,
  `sort` int(11) NOT NULL,
  `user_name` varchar(255) default NULL,
  `is_recommend` tinyint(1) NOT NULL COMMENT '推荐项目',
  `is_classic` tinyint(1) NOT NULL COMMENT '经典项目',
  `is_delete` tinyint(1) NOT NULL,
  `deal_extra_cache` text,
  `is_edit` tinyint(1) default NULL,
  PRIMARY KEY  (`id`),
  KEY `begin_time` (`begin_time`),
  KEY `end_time` (`end_time`),
  KEY `is_effect` (`is_effect`),
  KEY `limit_price` (`limit_price`),
  KEY `comment_count` (`comment_count`),
  KEY `support_count` (`support_count`),
  KEY `focus_count` (`focus_count`),
  KEY `view_count` (`view_count`),
  KEY `log_count` (`log_count`),
  KEY `support_amount` (`support_amount`),
  KEY `create_time` (`create_time`),
  KEY `is_success` (`is_success`),
  KEY `cate_id` (`cate_id`),
  KEY `sort` (`sort`),
  KEY `is_recommend` (`is_recommend`),
  KEY `is_classic` (`is_classic`),
  KEY `is_delete` (`is_delete`),
  FULLTEXT KEY `tags_match` (`tags_match`),
  FULLTEXT KEY `name_match` (`name_match`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

-- 
-- 导出表中的数据 `codec2i_deal`
-- 

INSERT INTO `codec2i_deal` VALUES (55, 'eyo手环--全球首款可通话的触控智能手环', 'ux21151ux22827,ux26700ux38754,ux26399ux24453,ux23494ux30721,ux40644ux37329,ux25903ux25345,ux21407ux21019,ux28216ux25103,ux68ux73ux89,ux21407ux21019ux68ux73ux89ux26700ux38754ux28216ux25103ux12298ux21151ux22827ux12299ux12298ux40644ux37329ux23494ux30721ux12299ux26399ux24453ux24744ux30340ux25903ux25345,ux21407ux21019ux68ux73ux89ux26700ux38754ux28216ux25103ux12298ux21151ux22827ux12299ux12298ux40644ux37329ux23494ux30721ux12299ux26399ux24453ux24744ux30340ux25903ux25345,ux21407ux21019ux68ux73ux89ux26700ux38754ux28216ux25103ux12298ux21151ux22827ux12299ux12298ux40644ux37329ux23494ux30721ux12299ux26399ux24453ux24744ux30340ux25903ux25345,ux21407ux21019ux68ux73ux89ux26700ux38754ux28216ux25103ux12298ux21151ux22827ux12299ux12298ux40644ux37329ux23494ux30721ux12299ux26399ux24453ux24744ux30340ux25903ux25345,ux25163ux29615,ux36890ux35805,ux26234ux33021,ux20840ux29699,ux101ux121ux111,ux101ux121ux111ux25163ux29615ux45ux45ux20840ux29699ux39318ux27454ux21487ux36890ux35805ux30340ux35302ux25511ux26234ux33021ux25163ux29615,ux101ux121ux111ux25163ux29615ux45ux45ux20840ux29699ux39318ux27454ux21487ux36890ux35805ux30340ux35302ux25511ux26234ux33021ux25163ux29615', '功夫,桌面,期待,密码,黄金,支持,原创,游戏,DIY,原创DIY桌面游戏《功夫》《黄金密码》期待您的支持,原创DIY桌面游戏《功夫》《黄金密码》期待您的支持,原创DIY桌面游戏《功夫》《黄金密码》期待您的支持,原创DIY桌面游戏《功夫》《黄金密码》期待您的支持,手环,通话,智能,全球,eyo,eyo手环--全球首款可通话的触控智能手环,eyo手环--全球首款可通话的触控智能手环', './public/attachment/201401/13/18/52d3bcf3da786.jpg', '', '', 15, 1357758600, 1393528200, 1, 3000.0000, '目前市面的大多手环离开APP就只能作为一个配饰，EYO就是想为您提供这么一款实用又好用的智能手环。它兼有蓝牙通话功能，3D曲面触控，支持单机操作。它支持的计步、久坐提醒等功能更能为您的健康护航', '这次给大家带来的是我们自己原创的两个桌面游戏《功夫》和《黄金密码》，由于我们并非专业的桌游制作公司，所以在游戏的美术、包装、宣传等方面都会存在一些不足。但本次带来的两个作品都是我们利用几乎所有的业余时间尽心尽力制作出来的，希望大家能够喜欢并支持我们！<p><br />\r\n</p>\r\n<h3>我想要做什么</h3>\r\n<p>&nbsp; 桌面游戏是一种健康的休闲方式，你不用整天面对电脑的辐射，同时也让你可以不再过度沉迷于虚拟的网络世界中。因为桌面游戏方式的特殊性，能使你更加注重加强与人面对面的交流，提高自己的语言和沟通能力，还可以在现实生活中用这种轻松愉快的休闲方式结交更多的朋友。</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;我们就是这样一群喜爱桌游，同时喜欢设计桌游的年轻人，我们并非专业的桌游制作团队，我们只是凭着对桌游的爱好开始了对桌游设计的探索。我们希望通过努力，将桌游的快乐带给更多喜欢轻松休闲、热爱生活的朋友。但是，我们的资金及能力有限，需要得到大家的帮助与支持，才能实现这样的梦想。也希望您在支持我们的同时收获一份快乐和惊喜！</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;我们这次将原创的桌面游戏《功夫》和《黄金密码》一起放到这里，希望得到大家的支持！&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><br />\r\n<img src="./public/attachment/201211/07/16/da4f6f7e11b249dcf71bf5e9c6a86d8a83o5700.jpg" rel="0" /><br />\r\n<br />\r\n</p>\r\n<p>游戏人数：2-4人</p>\r\n<p>适合年龄：8+</p>\r\n<p>游戏时间：10-30分钟</p>\r\n<p>游戏类型：手牌管理</p>\r\n<p>游戏背景：你在游戏中扮演一名武者，灵活运用你掌握的功夫（手牌）和装备（装备牌）对抗其他的武者并最终打败他们。</p>\r\n<p>游戏目标：扣除敌方所有人物的体力为胜。</p>\r\n游戏配件：69张动作牌（手牌）、6张道具牌、2张血量牌（需自行制作）<p><br />\r\n</p>\r\n<p><img src="./public/attachment/201211/07/16/7a404c90f81ca1368ff0f5b24e26a5d781o5700.jpg" rel="0" /><br />\r\n<br />\r\n</p>\r\n<p>游戏过程：游戏的每个回合分两个阶段，第一阶段为热身阶段，获得热身阶段胜利的玩家成为第二阶段（攻击阶段）的主导者，由他决定第二阶段如何进行。</p>\r\n<p>&nbsp;&nbsp;&nbsp;《功夫》用卡牌较好的模拟再现了格斗中的一些乐趣，比如热身阶段的猜招、攻击阶段一招一式的过招，同时结合手牌管理的一些特点，打出组合招式及连招，配合你获得的道具，最终战胜对手。在游戏过程中，当你取得一定的优势时，也不能掉以轻心，形式可能会因为你的任何一个破绽而发生逆转，这与格斗、搏击的情况十分相似。所以如何保持良好的心态，灵活的运用手牌才是这个游戏制胜的关键所在。（具体规则见最下方及本项目动态）</p>\r\n<p><br />\r\n</p>\r\n<p><br />\r\n</p>\r\n<p>游戏人数：3-4人</p>\r\n<p>适合年龄：8+</p>\r\n<p>游戏时间：20-40分钟</p>\r\n<p>游戏类型：逻辑推理、谜题设计</p>\r\n<p>游戏背景：二战时期，德军将一批黄金铸成金条，分别保存在3个金库里，并派重兵把守。为了得到这批黄金，美军重金收买了一个德军守卫为内奸，内奸成功获取了金库的密码破解方法，并将密码破解方法以暗号的形式告知了美军特工。但是，与此同时德军也发现了暗号，并且金库的守卫非常森严，解开金库密码的时间只有1分钟……玩家在这个游戏中分别扮演德军、德军内奸、美军特工。如何设计出德军看不懂，美军特工又能在1分钟内解出的暗号密码。就看你的表现啦！</p>\r\n<p>游戏目标：根据身份的不同，任务也不同。德军需解开密码保住金库，特工需设置密码阻止德军解密，美军需解开密码同时选择金库获得黄金。</p>\r\n<p>游戏配件：10张密码牌、12张空箱牌、24张黄金牌、沙漏1个、草稿纸和笔（自备）</p>\r\n<p>游戏过程：每人分别扮演一次特工、德军、美军，完成后计算每人所获得的黄金数量，黄金最多的玩家获胜。</p>\r\n<p><br />\r\n<br />\r\n</p>\r\n<p></p>', 0, 0, 0, 0, 1, 0.0000, 0.0000, 0.0000, 1389685396, '', '', '', '功夫 桌面 期待 密码 黄金 支持 原创 游戏 DIY', 'ux21151ux22827,ux26700ux38754,ux26399ux24453,ux23494ux30721,ux40644ux37329,ux25903ux25345,ux21407ux21019,ux28216ux25103,ux68ux73ux89', '功夫,桌面,期待,密码,黄金,支持,原创,游戏,DIY', 0, 0, 8, '四川', '成都', 17, 0, 'codec2i', 1, 1, 0, '', 0);
INSERT INTO `codec2i_deal` VALUES (56, 'Safe Call一款可以提高驾驶安全的设备', 'ux21654ux21857ux39302,ux25317ux26377,ux33258ux24049,ux25317ux26377ux33258ux24049ux30340ux21654ux21857ux39302,ux39550ux39542,ux25552ux39640,ux21487ux20197,ux23433ux20840,ux35774ux22791,ux67ux97ux108ux108,ux83ux97ux102ux101,ux83ux97ux102ux101ux67ux97ux108ux108ux19968ux27454ux21487ux20197ux25552ux39640ux39550ux39542ux23433ux20840ux30340ux35774ux22791,ux83ux97ux102ux101ux67ux97ux108ux108ux19968ux27454ux21487ux20197ux25552ux39640ux39550ux39542ux23433ux20840ux30340ux35774ux22791,ux83ux97ux102ux101ux67ux97ux108ux108ux19968ux27454ux21487ux20197ux25552ux39640ux39550ux39542ux23433ux20840ux30340ux35774ux22791,ux83ux97ux102ux101ux67ux97ux108ux108ux19968ux27454ux21487ux20197ux25552ux39640ux39550ux39542ux23433ux20840ux30340ux35774ux22791', '咖啡馆,拥有,自己,拥有自己的咖啡馆,驾驶,提高,可以,安全,设备,Call,Safe,Safe Call一款可以提高驾驶安全的设备,Safe Call一款可以提高驾驶安全的设备,Safe Call一款可以提高驾驶安全的设备,Safe Call一款可以提高驾驶安全的设备', './public/attachment/201401/13/18/52d3bc6ef06e9.png', '', '', 30, 1357673040, 1393529040, 1, 5000.0000, '每个人心目中都有一个属于自己的咖啡馆,我们也是.但我们想要的咖啡馆，又不仅仅是咖啡馆', '<h3>关于我</h3>\r\n<p>每个人心目中都有一个属于自己的咖啡馆<br />\r\n我们也是<br />\r\n但我们想要的咖啡馆，又不仅仅是咖啡馆<br />\r\n这里除了售卖咖啡和甜点，还有旅行的梦想<br />\r\n我们想要一个“窝”，一个无论在出发前还是归来后随时开放的地方<br />\r\n梦想着有一天<br />\r\n我们可以带着咖啡的香气出发<br />\r\n又满载着旅行的收获回到充满咖啡香气的小“窝”</p>\r\n<h3>我想要做什么</h3>\r\n<p>以图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。<br />\r\n</p>\r\n<p><img src="./public/attachment/201211/07/16/0482ef5836f6745af0f59ff40d40805765o5700.jpg" rel="0" /><br />\r\n<br />\r\n<br />\r\n</p>\r\n<h3>为什么我需要你的支持</h3>\r\n<p>这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。<br />\r\n<br />\r\n</p>\r\n<h3>我的承诺与回报</h3>\r\n让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你。<br />\r\n<br />\r\n<img src="./public/attachment/201211/07/16/2ae4c7149cfd31f12d91453713322f9076o5700.jpg" rel="0" /><br />\r\n<br />\r\n<br />', 0, 0, 1, 1, 1, 0.0000, 0.0000, 0.0000, 1389685337, '', '', '', '咖啡馆 拥有 自己', 'ux21654ux21857ux39302,ux25317ux26377,ux33258ux24049', '咖啡馆,拥有,自己', 1352230293, 0, 1, '北京', '东城区', 18, 0, 'lixiphp', 1, 1, 0, '', 0);
INSERT INTO `codec2i_deal` VALUES (57, '短片电影《Blind Love》', 'ux30701ux29255,ux30005ux24433,ux66ux108ux105ux110ux100,ux76ux111ux118ux101,ux30701ux29255ux30005ux24433ux12298ux66ux108ux105ux110ux100ux76ux111ux118ux101ux12299', '短片,电影,Blind,Love,短片电影《Blind Love》', './public/attachment/201211/07/11/0c067c4522bba51595c324028be7070d11.jpg', 'http://player.youku.com/player.php/sid/XMzgyNjMzNDA4/v.swf', 'http://v.youku.com/v_show/id_XMzgyNjMzNDA4.html', 30, 1349034009, 1383766813, 1, 3000.0000, '我叫武秋辰， 美国圣地亚哥大学影视专业硕士毕业。这是我在毕业后的第一部独立电影作品，讲述了一个关于盲人画家的唯美爱情故事。', '<p>我叫武秋辰， 美国圣地亚哥大学影视专业硕士毕业。这是我在毕业后的第一部独立电影作品，讲述了一个关于盲人画家的唯美爱情故事。</p>\r\n <p>这是一个需要爱与被爱的世界，然而在我们面对这纷繁复杂多变的世界时，我们如何过滤掉那迷乱双眼的尘沙找到真爱？我们在爱中得救，在爱中迷失。我们过度相信我们用双眼所见的，却忘记听从内心最真的感受！<br />\r\n<br />\r\n</p>\r\n<p>我们一路奔跑、一路追逐，生活的洪流把我们涌向未来不确定的方向，我们有着一双能望穿苍穹的眼睛，却不断的迷失在路途中。如果有一天我们的双眼失去光明……<br />\r\n<br />\r\n</p>\r\n<p>真爱是否还遥远？<br />\r\n<br />\r\n</p>\r\n<p>导演武秋辰将用电影语言为我们讲述一位盲人画家的爱情故事，如同她所写道的：“我们视觉正常的人很容易被表象所迷惑，而我们的触觉，听觉和嗅觉却非常的精准，给我们带来更丰富的感知。”当我们不仅凭双眼去认识这个世界的时候，也许答案就在那里！<br />\r\n<br />\r\n</p>\r\n<p>为了使影片更富深入性、更具专业性，导演请来了好莱坞的职业演员，就连剧中的盲人画像也由美国著名画家OlyaLusina特为此片创作。<br />\r\n<br />\r\n</p>\r\n<p>该片不仅是一个远赴美国实现梦想的中国女孩的心血之作，同时也深刻展现了一个盲人心中的世界，从“他”的角度为因爱迷失的人们找到了一个诗意的出口。<br />\r\n<br />\r\n</p>\r\n<p>在这里，真诚地感谢您的关注！关注武秋辰和她的《BlindLove》！<br />\r\n<br />\r\n</p>\r\n<h3>自我介绍<br />\r\n</h3>\r\n<p>我是一个在美国学电影做电影的中国女孩。在美国圣地亚哥大学电影系求学的过程中，我学会了编剧，导演，拍摄和剪辑，参与了几十部电影的创作。“盲爱”是我在硕士毕业后自编自导的第一部独立电影作品。</p>\r\n<p><br />\r\n</p>\r\n<p><img src="./public/attachment/201211/07/16/148cb883cbb170735c331125a96c11e162o5700.jpg" rel="0" /><br />\r\n<br />\r\n</p>\r\n<p><br />\r\n</p>\r\n<p><img src="./public/attachment/201211/07/16/875016977d65ee2cc679ab0cfd7a7f6620o5700.jpg" rel="0" /><br />\r\n<br />\r\n<br />\r\n<br />\r\n</p>', 0, 0, 1, 23, 1, 0.0000, 0.0000, 0.0000, 1352230821, '', '', '', '短片 电影 Blind Love', 'ux30701ux29255,ux30005ux24433,ux66ux108ux105ux110ux100,ux76ux111ux118ux101', '短片,电影,Blind,Love', 0, 0, 3, '四川', '成都', 17, 0, 'Codec2i', 1, 1, 1, NULL, NULL);
INSERT INTO `codec2i_deal` VALUES (58, 'HALOBAND：时尚智能手环', 'ux21654ux21857ux39302,ux37325ux24314,ux20844ux30410,ux27969ux28010,ux21147ux37327,ux38656ux35201,ux22825ux20351,ux22823ux23478,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux25163ux29615,ux72ux65ux76ux79ux66ux65ux78ux68,ux26234ux33021,ux26102ux23578,ux72ux65ux76ux79ux66ux65ux78ux68ux65306ux26102ux23578ux26234ux33021ux25163ux29615', '咖啡馆,重建,公益,流浪,力量,需要,天使,大家,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,手环,HALOBAND,智能,时尚,HALOBAND：时尚智能手环', './public/attachment/201401/13/18/52d3bb318dd75.png', 'http://player.youku.com/player.php/sid/XNjU1MDQxODYw/v.swf', 'http://v.youku.com/v_show/id_XNjU1MDQxODYw.html', 50, 1357847400, 1393530600, 1, 3000.0000, 'HALOBAND 是一款时尚便捷，提供云服务，有安全性应用的智能可穿戴设备。轻触解锁手机触发应用，让智能变得简单起来！', '<h3>媒体报道</h3>\r\n<p>TechCrunch：<a href="http://techcrunch.com/2014/01/03/haloband" target="_blank">Haloband&nbsp;Lets&nbsp;You&nbsp;Control&nbsp;Your&nbsp;Smartphone&nbsp;With&nbsp;A&nbsp;Tap&nbsp;On&nbsp;Your&nbsp;Wrist</a></p>\r\n<p>36氪：<a href="http://www.36kr.com/p/208451.html">不是所有手环都同健康相关！Haloband&nbsp;利用NFC&nbsp;帮用户快速实现解锁、拍照等</a></p>\r\n<p>雷锋网：<a href="http://www.leiphone.com/haloband-nfc.html">Haloband：计步器？它是NFC手环！</a></p>\r\n<p>加速DO：<a href="http://www.jiasu.do/p/yunnfc-nfc-smart-wristband-on-kickstarter-control-your-smartphone">云飞网NFC&nbsp;智能手环上线Kickstarter，用手环来控制你的智能手机操作</a></p>\r\n<p>Techable：<a href="http://techable.jp/archives/9611" target="_blank">スマホの操作を簡単にするリストバンド「Haloband」、タップだけで撮影やチェックインが可能に</a></p>\r\n<p>Engadget：<a href="http://de.engadget.com/2014/01/03/haloband-nfc-armband-fur-smartphone-shortcuts" target="_blank">NFC-Armband&nbsp;für&nbsp;Smartphone-Shortcuts</a></p>\r\n<p><br />\r\n</p>\r\n<p><br />\r\n</p>\r\n<p><a href="http://de.engadget.com/2014/01/03/haloband-nfc-armband-fur-smartphone-shortcuts" target="_blank">智能手机往往需要各种复杂的操作。许多你喜欢的应用和功能可能会花费你十数秒之多，以致可能错过一些东西，如抓拍有趣的一幕。</a></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;而上班的地铁上，用手机播放音乐，拥挤的人群中还要腾出手来打开屏幕去切换歌曲，这让生活显得如此艰难。。。</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手机每天要开解锁百多次，并且手机里有些私密性应用或照片，别人借用手机那刻，有没内心忐忑纠结。。。</p>\r\n<p><br />\r\n</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;而&nbsp;HALOBAND会带来怎样的改变呢？这是一款结合了独运匠心的设计与无限创意的革命性产品，不需要再繁琐地开解锁，不需要频繁使用屏幕和按键，只要用手机背面轻触下手环，自拍，抓拍，手电，切歌……一切你常用的功能全部一秒钟实现！</p>\r\n<p><br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-052-183-52183-large.jpg?1388088656" /><br />\r\n实物图</p>\r\n<p><br />\r\n</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HALOBAND（光环）将可穿戴设备代入每个人的日常生活中去，他不仅有时尚的外表，科技的范儿，而且能够防水防汗，无电池无辐射。无论是游泳还是打球，逛街还是上班，HALOBAND&nbsp;都可以轻松陪你一整天。</p>\r\n<p><br />\r\n</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;除了可以操控你的手机，HALOBAND&nbsp;还可以操控你的门锁，分享你的信息，甚至进行安全签到，在保护隐私的同时便捷社交。办公室里带门卡太烦？用&nbsp;HALOBAND&nbsp;刷手腕进门！带名片占空间？用&nbsp;HALOBAND&nbsp;携带所有社交信息！高大上的聚会活动上用&nbsp;HALOBAND&nbsp;签到！</p>\r\n<p><br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-052-169-52169-large.jpg?1388078534" /><br />\r\n<img src="http://aliyun.demohour.com/project_photos-files-000-052-177-52177-large.jpg?1388083359" /><br />\r\n实物图</p>\r\n<p><br />\r\n</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HALOBAND&nbsp;世界首款提供云服务的NFC智能穿戴设备！你可以用手环上携带的云端账户实时更新社交信息，与你的好友分享信息，甚至可以便捷地操控各种“设备”！</p>\r\n<p><br />\r\n</p>', 1, 0, 1, 0, 1, 0.0000, 0.0000, 0.0000, 1389685379, '', '', '', '时尚科技 HALOBAND团队 上海杨浦区', 'ux26102ux23578ux31185ux25216,ux72ux65ux76ux79ux66ux65ux78ux68ux22242ux38431,ux19978ux28023ux26472ux28006ux21306', '时尚科技,HALOBAND团队,上海杨浦区', 1352231704, 0, 2, '四川', '成都', 17, 0, 'codec2i', 1, 1, 0, '', 0);
INSERT INTO `codec2i_deal` VALUES (59, 'Rrrrrr', '', '', './public/attachment/201312/25/14/48331fb4ac8a5b9e3d6e877ed0a3519815.jpg', '', '', 30, 0, 0, 0, 1000.0000, 'Tttttttttttttttt', '<h3>关于我</h3>\r\n<p>向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。<br />\r\n<br />\r\n</p>\r\n<h3>我想要做什么</h3>\r\n<p>以图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。<br />\r\n<br />\r\n</p>\r\n<h3>为什么我需要你的支持</h3>\r\n<p>这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。<br />\r\n<br />\r\n</p>\r\n<h3>我的承诺与回报</h3>\r\n让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你。', 0, 0, 0, 0, 0, 0.0000, 0.0000, 0.0000, 1387923243, '', '', '', 'Rrrrrr', '', '', 0, 0, 2, '安徽', '安庆', 20, 0, '111111', 0, 0, 0, NULL, NULL);
INSERT INTO `codec2i_deal` VALUES (60, 'sadfasdfasdfasdff', '', '', './public/attachment/201312/28/21/18687d9a0b2b46105d3c4c57b303aa4d94.jpg', 'http://player.youku.com/player.php/sid/XNjU0MjUxMDA0/v.swf', 'http://v.youku.com/v_show/id_XNjU0MjUxMDA0.html?f=21490751&amp;ev=2', 30, 0, 0, 0, 60000.0000, 'asdfasdfasdfasdfasdfasdfasdfas', '<h3>关于我</h3>\r\n<p>向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。<br />\r\n<br />\r\n</p>\r\n<h3>我想要做什么</h3>\r\n<p>以图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。<br />\r\n<br />\r\n</p>\r\n<h3>为什么我需要你的支持</h3>\r\n<p>这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。<br />\r\n<br />\r\n</p>\r\n<h3>我的承诺与回报</h3>\r\n让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你。', 0, 0, 0, 0, 0, 0.0000, 0.0000, 0.0000, 1388207715, '', '', '', 'sadfasdfasdfasdf', '', '', 0, 0, 1, '福建', '龙岩', 21, 0, 'test123', 0, 0, 0, NULL, NULL);
INSERT INTO `codec2i_deal` VALUES (61, 'sadfasdfasdfasdff', 'ux115ux97ux100ux102ux97ux115ux100ux102ux97ux115ux100ux102ux97ux115ux100ux102,ux115ux97ux100ux102ux97ux115ux100ux102ux97ux115ux100ux102ux97ux115ux100ux102ux102', 'sadfasdfasdfasdf,sadfasdfasdfasdff', './public/attachment/201312/28/21/b47fe698b51bf2cf93f3bce2015d22d048.jpg', 'http://player.youku.com/player.php/sid/XNjU0MjUxMDA0/v.swf', 'http://v.youku.com/v_show/id_XNjU0MjUxMDA0.html?f=21490751&ev=2', 20, 1388467140, 1390886350, 1, 20000.0000, 'asdfasdfasdfasdfasdfasdfasdfas', '<h3>关于我</h3>\r\n<p>向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。<br />\r\n<br />\r\n</p>\r\n<h3>我想要做什么</h3>\r\n<p>以图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。<br />\r\n<br />\r\n</p>\r\n<h3>为什么我需要你的支持</h3>\r\n<p>这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。<br />\r\n<br />\r\n</p>\r\n<h3>我的承诺与回报</h3>\r\n让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你。', 3, 0, 2, 14, 1, 0.0000, 0.0000, 0.0000, 1388208096, '', '', '', 'sadfasdfasdfasdf dfsasd sdfsd', 'ux115ux97ux100ux102ux97ux115ux100ux102ux97ux115ux100ux102ux97ux115ux100ux102,ux100ux102ux115ux97ux115ux100,ux115ux100ux102ux115ux100', 'sadfasdfasdfasdf,dfsasd,sdfsd', 0, 0, 1, '澳门', '澳门', 21, 0, 'test123', 1, 0, 1, NULL, NULL);
INSERT INTO `codec2i_deal` VALUES (62, '我的项目测试', '', '', './public/attachment/201312/28/21/077a2ca6ce82c98f192662bc9c04078693.jpg', '', '', 50, 0, 0, 0, 1000.0000, '我的项目测试简要说明，不超过75个字，简要描述一下你的项目。微博显示。', '<h3>关于我</h3>\r\n<p>向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。<br />\r\n<br />\r\n</p>\r\n<h3>我想要做什么</h3>\r\n<p>以图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。<br />\r\n<br />\r\n</p>\r\n<h3>为什么我需要你的支持</h3>\r\n<p>这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。<br />\r\n<br />\r\n</p>\r\n<h3>我的承诺与回报</h3>\r\n让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你。', 0, 0, 0, 0, 0, 0.0000, 0.0000, 0.0000, 1388209612, '', '', '', '测试 项目', '', '', 0, 0, 1, '湖南', '长沙', 17, 0, 'codec2i', 0, 0, 0, NULL, 1);
INSERT INTO `codec2i_deal` VALUES (63, 'eyo手环--全球首款可通话的触控智能手环', 'ux25163ux29615,ux36890ux35805,ux26234ux33021,ux20840ux29699,ux101ux121ux111,ux101ux121ux111ux25163ux29615ux45ux45ux20840ux29699ux39318ux27454ux21487ux36890ux35805ux30340ux35302ux25511ux26234ux33021ux25163ux29615', '手环,通话,智能,全球,eyo,eyo手环--全球首款可通话的触控智能手环', './public/attachment/201401/09/18/404ec3e82c3fc53e22b7c1533366054c15.jpg', '', '', 30, 1389235920, 1391136764, 1, 500000.0000, '目前市面的大多手环离开APP就只能作为一个配饰，EYO就是想为您提供这么一款实用又好用的智能手环。它兼有蓝牙通话功能，3D曲面触控，支持单机操作。它支', '<h3>关于我</h3>\r\n<p>向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。<br />\r\n<br />\r\n</p>\r\n<h3>我想要做什么</h3>\r\n<p>以图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。<br />\r\n<br />\r\n</p>\r\n<h3>为什么我需要你的支持</h3>\r\n<p>这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。<br />\r\n<br />\r\n</p>\r\n<h3>我的承诺与回报</h3>\r\n让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你。', 0, 0, 0, 9, 0, 0.0000, 0.0000, 0.0000, 1389235973, '', '', '', '手环 通话 智能 全球 eyo', 'ux25163ux29615,ux36890ux35805,ux26234ux33021,ux20840ux29699,ux101ux121ux111', '手环,通话,智能,全球,eyo', 0, 0, 1, '北京', '东城区', 21, 0, 'test123', 1, 0, 1, NULL, 1);
INSERT INTO `codec2i_deal` VALUES (64, 'fasdf', 'ux102ux97ux115ux100ux102', 'fasdf', './public/attachment/201401/10/17/0911c5e57992361b0625120a2adcce5360.jpg', '', '', 30, 1389318554, 1391132957, 1, 500000.0000, 'asdfasd fasdf asdf', '<h3>关于我</h3>\r\n<p>向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。<br />\r\n<br />\r\n</p>\r\n<h3>我想要做什么</h3>\r\n<p>以图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。<br />\r\n<br />\r\n</p>\r\n<h3>为什么我需要你的支持</h3>\r\n<p>这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。<br />\r\n<br />\r\n</p>\r\n<h3>我的承诺与回报</h3>\r\n让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你。', 0, 0, 0, 3, 0, 0.0000, 0.0000, 0.0000, 1389318566, '', '', '', 'fasdf', 'ux102ux97ux115ux100ux102', 'fasdf', 0, 0, 2, '北京', '海淀区', 21, 0, 'test123', 1, 0, 1, NULL, 1);
INSERT INTO `codec2i_deal` VALUES (65, 'eyo手环--全球首款可通话的触控智能手环', '', '', './public/attachment/201401/10/17/85db97750fb3ca8803b61341ad12073149.jpg', '', '', 30, 0, 0, 0, 500000.0000, 'asdfasdfasdfasdfas', '<h3>关于我</h3>\r\n<p>向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。<br />\r\n<br />\r\n</p>\r\n<h3>我想要做什么</h3>\r\n<p>以图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。<br />\r\n<br />\r\n</p>\r\n<h3>为什么我需要你的支持</h3>\r\n<p>这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。<br />\r\n<br />\r\n</p>\r\n<h3>我的承诺与回报</h3>\r\n让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你。', 0, 0, 0, 0, 0, 0.0000, 0.0000, 0.0000, 1389318774, '', '', '', '手环 通话 智能 全球 eyo', '', '', 0, 0, 2, '澳门', '澳门', 21, 0, 'test123', 0, 0, 0, NULL, NULL);
INSERT INTO `codec2i_deal` VALUES (66, 'eyo手环--全球首款可通话的触控智能手环', 'ux25163ux29615,ux36890ux35805,ux26234ux33021,ux20840ux29699,ux101ux121ux111,ux101ux121ux111ux25163ux29615ux45ux45ux20840ux29699ux39318ux27454ux21487ux36890ux35805ux30340ux35302ux25511ux26234ux33021ux25163ux29615', '手环,通话,智能,全球,eyo,eyo手环--全球首款可通话的触控智能手环', './public/attachment/201401/10/18/b118d19b188623c13e6e81d80d58090210.jpg', '', '', 30, 1389319462, 1391133865, 1, 500000.0000, 'asdfasdfasdfasdfasdf', '<h3>关于我</h3>\r\n<p>向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。<br />\r\n<br />\r\n</p>\r\n<h3>我想要做什么</h3>\r\n<p>以图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。<br />\r\n<br />\r\n</p>\r\n<h3>为什么我需要你的支持</h3>\r\n<p>这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。<br />\r\n<br />\r\n</p>\r\n<h3>我的承诺与回报</h3>\r\n让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你。', 0, 0, 0, 17, 0, 0.0000, 0.0000, 0.0000, 1389319473, '', '', '', '手环 通话 智能 全球 eyo', 'ux25163ux29615,ux36890ux35805,ux26234ux33021,ux20840ux29699,ux101ux121ux111', '手环,通话,智能,全球,eyo', 0, 0, 2, '北京', '东城区', 21, 0, 'test123', 1, 0, 1, '', 1);
INSERT INTO `codec2i_deal` VALUES (67, 'Netseed种子互联--最易用、最简单的智能生活管家', 'ux26131ux29992,ux31649ux23478,ux31181ux23376,ux78ux101ux116ux115ux101ux101ux100,ux31616ux21333,ux26234ux33021,ux20114ux32852,ux29983ux27963,ux78ux101ux116ux115ux101ux101ux100ux31181ux23376ux20114ux32852ux45ux45ux26368ux26131ux29992ux12289ux26368ux31616ux21333ux30340ux26234ux33021ux29983ux27963ux31649ux23478', '易用,管家,种子,Netseed,简单,智能,互联,生活,Netseed种子互联--最易用、最简单的智能生活管家', './public/attachment/201401/13/17/52d3b84523472.png', '', '', 30, 1389578189, 1391133393, 1, 60000.0000, '我们希望通过Netseed种子互联智能生活管家，对你的家居环境进行智能控制和人文关怀，从而实现你的智能生活梦想。让手机、平板远程遥控家里所有红外设备和无线设备，对你的家居环境进行人性化、智能化的关怀，因人而动，因环境而动，因时间而动，让你的家居环境变得更智能、更舒适、更节能', '<h3>关于我们</h3>\r\n<p>我们是一群资深的挨踢民工，团队平均年龄35岁（咳咳，当然这不能掩盖我们创业的梦想和对产品技术的天赋及沉淀），我们以前是同事，为了实现家庭设备简单易用的本地及远程化的智能控制，于是我们便聚在一起做了这个wifi家居环境智能生活管家解决方案，走在了艰苦的创业路上。</p>\r\n<p>下面是我们的成员介绍：</p>\r\n<p>Simon（Marketing）：</p>\r\n<p>高帅富，消费电子领域资深老兵，曾是多家知名消费电子公司金牌业务，从国内到海外，攻城略地，洞悉市场发展方向和节奏，丰富的市场和产品经验，只为做一款让世界记住的好产品，牵头组建了这个创业平台，是我们的小队长。</p>\r\n<p>David（PM）：</p>\r\n<p>超男，百科全书，直到要骨折，毕业后做了10年的研发攻城狮后从技术走向产品，曾在知名互联网公司及国际知名遥控器企业任高级产品经理，因为他喜欢折腾自己，折腾新玩具，爱玩爱尝鲜，深知用户的内心渴求和痛点，希望做出为客户解决问题的好产品。</p>\r\n<p>Ben（R&nbsp;&amp;&nbsp;D）：</p>\r\n<p>猛男，帅到掉渣，谜一样的男纸，猜不出实际年龄，曾在知名智能家居公司及国际知名遥控器企业研发攻城狮，多年从事嵌入式和无线/红外遥控软件开发，资深程序猿，遥控器领域的砖家。</p>\r\n<p>Kay（R&nbsp;&amp;&nbsp;D）：</p>\r\n<p>型男，帅到爆，已入围城，响应国家最新的二胎政策，超级奶爸一枚，丰富的消费电子硬件设计经验，尤其在无线射频和wifi方面有8年工作经验。无线/红外对于他来说小case。</p>\r\n<p>Leon（UI）：</p>\r\n<p>屌丝男，帅呆了，还在围城外徘徊，曾经在知名互联网公司，国际知名APP应用软件公司高级美术设计湿及用户交互设计湿，视觉和交互都精通的大咖。</p>\r\n<p>Jack（ID）：</p>\r\n<p>土豪男，无敌可爱帅，骑在墙头的红杏，中国顶尖工业设计公司Super设计湿。多面手，熟悉ID设计，结构设计及模具设计。</p>\r\n<p>Colin（artwork）：</p>\r\n<p>男纸汗，大叔心，伪文艺小青年，无房、无车、无妞的三无好青年，但是有闯劲、有思想、有天赋，是我们的平面设计及包装设计湿。</p>\r\n<p><br />\r\n</p>\r\n<p>作为新时代有理想有文化，有组织无纪律但节操完整的青年，是不会在半夜留下个人微信二维码给你们扫一扫的~~~但是我亲爱的小伙伴们要是想我们了怎么办呢？</p>\r\n<p>1）、关注我们的微博：<a href="http://weibo.com/netseed1" target="_blank">http://weibo.com/netseed1</a></p>\r\n<p>2）、加入Netseed种子互联智能生活管家QQ内测讨论群：177827521，</p>\r\n<p>3）、加入我们的微信公众号：种子互联智能生活&nbsp;，勾引我们，</p>\r\n<p>4）、或者发邮件给我们：Netseed01@gmail.com，</p>\r\n<p>5）、欢迎在点名时间对我们的产品留言和拍砖，我们会在最短的时间内回复您。</p>\r\n<p><br />\r\n</p>\r\n<h3>我们要做什么<br />\r\n</h3>\r\n<p>嘿！我的小伙伴们，你是否在日常的的生活中遇到过这些问题呢：<br />\r\n<br />\r\n</p>\r\n<p>你是否每天都忘记关空调、机顶盒呢？<br />\r\n<br />\r\n</p>\r\n<p>人离开了而经常忘记关空调？<br />\r\n<br />\r\n</p>\r\n<p>每月看到电费账单才知道自己为拉动内需对GDP做了多大贡献而蛋疼？<br />\r\n<br />\r\n</p>\r\n<p>每天上班当码农，下班急冲冲的往回赶，满头大汗而家里又很热呢？<br />\r\n<br />\r\n</p>\r\n<p>每天睡觉后觉得冷而要起来调节空调温度？<br />\r\n<br />\r\n</p>\r\n<p>当家居环境因温湿度的变化觉得不舒适时不知道怎样调节？<br />\r\n<br />\r\n</p>\r\n<p>空调的遥控器太多，经常为找遥控器而发愁？遥控器丢了，坏了，空调没办法遥控了？<br />\r\n</p>\r\n<p><br />\r\n</p>\r\n<p>没关系，我们和你一样，所以我们做了这个netseed智能生活管家来解决这些问题。<br />\r\n<br />\r\n</p>\r\n<h3>Netseed智能生活管家是什么</h3>\r\n<p>Netseed智能生活管家是世界上最简单、最易用的家居环境关怀智能生活产品，他集无线、红外、万能遥控器、学习遥控器、红外人体感应、温湿度感应、能源管理、自学习和智能分析控制等功能于一体，用智能手机、平板轻松实现本地和远程控制。亲，无论何时，无论何地，只要有手机和网络，就能通过netseed种子互联智能生活管家并根据不同的人、环境和时间对你的家居环境提供智能化、人性化的关怀，netseed智能生活管家的横空出世，是你家居智能生活真正的贴心管家。<br />\r\n<br />\r\n</p>\r\n<p>Netseed在产品形态上分为wifi智能生活管家主机和手机、平板等移动客户端两个部分，通过Wifi或3G网络自动进行数据传输和反馈。</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-052-023-52023-large.png?1389081786" /><br />\r\n<br />\r\n</p>\r\n<p>手机、平板等移动客户端中的家庭设备状态会通过Wifi或3G自动同步到家庭成员手机，通过手机、平板移动客户端可以对家庭红外接收设备和无线设备进行控制。<br />\r\n<br />\r\n</p>\r\n<p>Netseed智能生活管家会把用户的操作和习惯通过Wifi或3G自动同步到客户端APP云平台进行统计、分析和智能化自学习；所以你只需要连续使用Netseed智能生活管家7天，系统就会根据你的生活习惯和操作进行智能化自学习记忆和分析，设定后不需要你任何操作，系统会根据你的生活习惯和对家居环境的需求自动对家电进行控制和操作，实现智能生活和家居环境关怀。智能，是因人而动，因环境而动，因时间而动，能感知人、环境、时间的变化，根据用户的生活习惯和对家居环境需求能自动学习记忆并分析。让你感受Netseed智能生活管家无处不在，又感觉不到他的存在，智能，是随时随地的控制，又无需控制。</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-052-091-52091-large.png?1388037588" /><br />\r\n<br />\r\n</p>\r\n<p>Netseed智能生活管家内置温湿度感应器，会根据温湿度的变化自动调节你空调温度和模式，甚至启动家里面的加湿机或负离子机等来改善你的家居环境，达到舒适的家居环境。特别是夜间的时候智能生活管家会根据温湿度的变化将空调自动调节到适合睡眠的温湿度，以免得空调病。<br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-052-094-52094-large.png?1388039492" /><br />\r\n<br />\r\n</p>\r\n<p>Netseed智能生活管家可以实现用户侧的能源管理，可以在APP上监测家里的电器的使用状态以及使用的电量。不需要电器设备工作时，可自动或远程关闭各种电器设备，减少用电量，节约能源，减少你的电费支出。比如：如果你忘记关空调了，Netseed智能生活管家会提醒你关空调或通过环境感应及智能分析隔断时间会自动将空调关掉。还可以通过你的生活习惯和对家居环境的需求将空调自动调整到合适的温度，达到节能省钱的目的。</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-052-092-52092-large.png?1388039450" /><br />\r\n<br />\r\n我们的Netseed智能生活管家增加了社交功能和情感关怀，让你感觉不是一个人在战斗，而是和小伙伴们在一起快乐的战斗：<br />\r\n</p>\r\n<p><br />\r\n</p>\r\n<p>1.关于情感关怀：Netseed智能生活管家允许你的家庭成员或情侣设置家居环境模式，你可以远程或自动为心爱的他（她）开灯、开空调、开音乐，可以设置对方习惯的家居环境，即使你不在他（她）的身边也会让对方永远感觉到你的关怀。<br />\r\n<br />\r\n</p>\r\n<p>2.关于社交：一、与facebook、twitter、微信、微博好友一同分享你使用Netseed智能生活管家产品的节能省钱成就；二、facebook、twitter、微博、微信好友使用Netseed智能生活管家节能省钱排行榜，Netseed智能生活管家用户地区和全球排行榜，根据排行会有对应的物质和肉体/精神奖励；三、你每天轻松省钱还可以不断累积并兑换你想要的奖品哦。</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-052-093-52093-large.png?1388037652" /><br />\r\n<br />\r\n<br />\r\n</p>\r\n<h3>产品主要功能和特点：</h3>\r\n<p>1、wifi连接设置操作简单：使用用户家里已有的wifi网络，用户在无需了解、设置网络参数的情况下，两步即可完成手机、智能生活管家和家庭wifi绑定：A、启动Netseed智能生活管家APP软件，扫描产品的二维码，B、输入您的wifi密码。</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-052-104-52104-large.png?1388039557" /><br />\r\n<br />\r\n<img src="http://aliyun.demohour.com/project_photos-files-000-052-105-52105-large.png?1388039568" /><br />\r\n<br />\r\n</p>\r\n<p>2、手机，平板远程遥控家里家电设备，只要有网络，随时随地，一机在手，控制所有，真正实现“手机成为遥控器”，简单易用，适用于所有有wifi的智能手机，平板等智能设备。<br />\r\n<br />\r\n</p>\r\n<p>3、智能自学习功能，Netseed智能生活管家安装成功后，便会不断的向云端控制中心发送传感器采集的各类信息数据，通过对数据的分析，连续使用Netseed智能生活管家7天，系统就会根据你的生活习惯和对家居环境的需求进行智能化自学习记忆和分析，智汇控设定后不需要你任何操作，系统会对家电进行自动控制和操作，让家居生活更智能。<br />\r\n<br />\r\n</p>\r\n<p>4、内置温湿度感应器，会根据温湿度的变化自动调节你空调温度和模式，甚至启动家里面的加湿机或负离子机等来改善你的家居环境，达到舒适的家居环境。<br />\r\n<br />\r\n</p>\r\n<p>5、内置红外人体感应器，设定后即使你忘记关空调或家电，当你离开一定时间后Netseed智能生活管家会自动关闭家电设备，达到节能环保的家居环境。<br />\r\n<br />\r\n</p>\r\n<p>6、用户侧的能源管理，可以在APP上监测家里的电器的使用状态以及使用的电量。不需要电器设备工作时，可自动或远程关闭各种电器设备，减少用电量，节约能源，减少你的电费支出。比如：如果你忘记关空调了，Netseed智能生活管家会提醒你关空调或通过环境感应及智能分析隔断时间会自动将空调关掉。还可以通过你的生活习惯和对家居环境的需求将空调自动调整到合适的温度，达到节能省钱的目的。<br />\r\n<br />\r\n</p>\r\n<p>7、内置万能遥控器码库，可覆盖市面上90%以上的红外设备控制代码，设置简单易用；<br />\r\n<br />\r\n</p>\r\n<p>8、支持红外学习功能，可学习市面上99.5%的电视、机顶盒、DVD、空调、音响等红外遥控器，智能学习，学习成功率高，适应性强，兼容国内外各种红外编码格式；<br />\r\n<br />\r\n</p>\r\n<p>9、遥控效果和原装遥控器基本一致，尤其是空调设备：模式，温度，风量。。。可远程控制，还是那句话：空调功能好才是真的好。<br />\r\n<br />\r\n</p>\r\n<p>10、移动端APP界面的功能，方便操作；<br />\r\n<br />\r\n</p>\r\n<p>11、掉电保护功能，数据不丢失，设置不丢失；</p>\r\n<p><br />\r\n</p>\r\n<p>12、360度全方向红外发射，覆盖区域广，无死角。</p>\r\n<p><br />\r\n</p>\r\n<p>以下是高清图赏：</p>\r\n<h3>智能生活管家主机</h3>\r\n<h3><img src="http://aliyun.demohour.com/project_photos-files-000-052-021-52021-large.jpg?1388022936" /><br />\r\n<img src="http://aliyun.demohour.com/project_photos-files-000-052-022-52022-large.jpg?1388022953" /><br />\r\n移动端APP部分UI<img src="http://aliyun.demohour.com/project_photos-files-000-052-024-52024-large.png?1388022976" /><br />\r\n</h3>\r\n<p><br />\r\n</p>\r\n<p><br />\r\n</p>\r\n<h3>项目的进展和风险</h3>\r\n<p><br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-052-025-52025-large.png?1388023101" /><br />\r\n<br />\r\n</p>\r\n<br />\r\n<p><br />\r\n</p>\r\n<h3>我的承诺与回报</h3>\r\n<p>我们承诺在项目结束后30天内给亲爱的首席尊享公测体验用户和种子用户发出netseed智能生活管家产品，让您第一时间体验到netseed最简单、最易用的效果和便捷的智能生活管家。</p>\r\n<p>收到Netseed智能生活管家产品的点名时间首席尊享公测体验用户和种子用户，如有任何不满意，我们承诺30天内无理由退款；</p>\r\n<p>后续我们还将开发一系列Netseed智能生活管家产品，让我们的智能生活管家从家居环境控制开始，有机生长，最终形成我们的Netseed种子互联智能生活管家产品生态链，我们将在第一时间将我们的新品资讯通知到我们的首席尊享公测体验用户和种子用户。</p>\r\n<h3>了解更多产品动态，关注Netseed种子互联智能生活管家产品微博、微信：</h3>\r\n<p>新浪微博：<a href="http://weibo.com/netseed1" target="_blank">http://weibo.com/netseed1</a></p>\r\n微信公众号：种子互联智能生活<img src="http://aliyun.demohour.com/project_photos-files-000-052-971-52971-large.jpg?1388713721" />', 0, 0, 0, 2, 0, 0.0000, 0.0000, 0.0000, 1389578388, '', '', '', '时尚科技 李孝栋 广东深圳', 'ux26102ux23578ux31185ux25216,ux26446ux23389ux26635,ux24191ux19996ux28145ux22323', '时尚科技,李孝栋,广东深圳', 0, 0, 2, '广东', '深圳', 0, 1, '', 1, 0, 0, '', 0);
INSERT INTO `codec2i_deal` VALUES (68, '快按钮--安卓手机的智能快捷键', 'ux23433ux21331,ux24555ux25463ux38190,ux25353ux38062,ux26234ux33021,ux25163ux26426,ux24555ux25353ux38062ux45ux45ux23433ux21331ux25163ux26426ux30340ux26234ux33021ux24555ux25463ux38190', '安卓,快捷键,按钮,智能,手机,快按钮--安卓手机的智能快捷键', './public/attachment/201401/13/18/52d3bd81229be.jpg', '', '', 30, 1389665924, 1391134728, 1, 500000.0000, '快按钮是一款针对安卓设备的智能快捷键，只要将其插入耳机插孔，就可以通过预设手势快速启动心水的功能。功能强大，小巧精致。为用户提供快捷、自由的人机交互体验', '<p>试试自己手中的智能手机。如果你想要使用一个功能，你需要先唤醒手机--&gt;给手机解锁--&gt;再找到相应的应用--&gt;点击打开应用--&gt;寻找到你需要的功能。整个流程繁杂而不直接，这样低下的效率已经远远无法满足人们使用手机的速度需求了。</p>\r\n<p><br />\r\n</p>\r\n<p>快按钮也正是基于这样的考虑，赋予手机一个物理智能按键，从根本上的完成人机交互方式的优化，所想即所得，简单直接，快捷智能。</p>\r\n<p><br />\r\n</p>\r\n<h3>快按钮·功能篇</h3>\r\n<p>快按钮依据中国用户的使用习惯，为用户量身打造了50余种快捷功能。用户可以通过快按钮应用程序将预设手势与常用手机功能一一匹配。</p>\r\n<p><br />\r\n</p>\r\n<p>即使在锁屏状态下，也能一键快速启动功能，满足您的快捷体验。<br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-051-071-51071-large.jpg?1387252673" /><br />\r\n<br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-051-057-51057-large.jpg?1387241264" /><br />\r\n<br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-051-059-51059-large.jpg?1387241304" /><br />\r\n<br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-051-058-51058-large.jpg?1387241281" /><br />\r\n<img src="http://aliyun.demohour.com/project_photos-files-000-051-060-51060-large.jpg?1387241324" /><br />\r\n<br />\r\n</p>\r\n<p>除了上述几种功能外，快按钮整合了大量快捷专属功能：</p>\r\n<p><a>1.&nbsp;快捷录音。快捷录音，随心随时记录重要片段</a></p>\r\n<p>2.&nbsp;神速手电。神器手电筒，从此摆脱黑暗</p>\r\n<p>3.&nbsp;变更设置。再也不用繁琐的开关wifi/蓝牙/静音等设置，交给快按钮，一键解决</p>\r\n<p>4.&nbsp;电话/短信。随心设定特别联系人，轻松发送短消息甚至是拨通电话</p>\r\n<p>5.&nbsp;省电王。一键进入手机最省电的模式，摆脱电力不足</p>\r\n<p>6.&nbsp;快捷美食。轻轻一按，附近美食，附近团购，快到碗里来</p>\r\n<p>7.&nbsp;一键截屏。安卓截屏你懂得，不解释</p>\r\n<p>8.&nbsp;替换按钮。手机上哪个按钮坏掉了，没问题，快按钮帮你替代</p>\r\n<p>9.&nbsp;一键清理。让心爱手机从此摆脱延迟</p>\r\n<p>10.&nbsp;打开应用。一键打开最心水的应用，快捷方便</p>', 0, 0, 0, 3, 0, 0.0000, 0.0000, 0.0000, 1389579566, '', '', '', '', '', '', 0, 0, 2, '澳门', '澳门', 0, 2, '', 1, 0, 0, '', 0);
INSERT INTO `codec2i_deal` VALUES (69, 'Vigo：让你时刻保持清醒的贴心伴侣', 'ux36148ux24515,ux20276ux20387,ux28165ux37266,ux26102ux21051,ux20445ux25345,ux86ux105ux103ux111,ux86ux105ux103ux111ux65306ux35753ux20320ux26102ux21051ux20445ux25345ux28165ux37266ux30340ux36148ux24515ux20276ux20387', '贴心,伴侣,清醒,时刻,保持,Vigo,Vigo：让你时刻保持清醒的贴心伴侣', './public/attachment/201401/13/18/52d3be4671866.jpg', 'http://player.youku.com/player.php/sid/XNjQ3NDg1MTU2/v.swf', 'http://v.youku.com/v_show/id_XNjQ3NDg1MTU2.html', 30, 1389579735, 1391134937, 1, 60000.0000, 'Vigo是第一副能帮你检测精神状态并提供提示服务的可穿戴式设备。它可以在你精神孱弱的时候给予提示，并让你更好地协调休息与工作时间。有了它，保持良好的清醒的状态去工作、学习以及生活将不再是难题', '<h3>Vigo的工作原理</h3>\r\n<p>虽然我们的大脑常常会告诉我们“你现在很清醒”，但是真相却是：你身体的生理疲乏是大脑无法控制以及准确预测的。Vigo通过红外传感器探测你的眼睛、重力传感器检测你的头部和身体运动并运用一个创新的算法，比你的大脑能更准确地探测出你是否犯困。简而言之，Vigo通对你的眼睛和头部运动进行实时追踪来判定你的睡眠倾向。</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-050-947-50947-large.jpg?1387177950" /><br />\r\n</p>\r\n<p><br />\r\n</p>\r\n<p><br />\r\n</p>\r\n<p>Vigo的使用步骤很简单：</p>\r\n<p><br />\r\n</p>\r\n<p>1.在需要时佩戴上Vigo</p>\r\n<p>2.将Vigo通过蓝牙连接到手机</p>\r\n<p>3.设置Vigo的提示方式</p>\r\n<p>4.分类并进行数据查看</p>\r\n<p><br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-050-948-50948-large.jpg?1387177973" /><br />\r\n<br />\r\n</p>\r\n<p><br />\r\n</p>\r\n<h3>眨眼包含什么数据？</h3>\r\n<p>人的眨眼一次只历时五分之一秒，但这么短的时间内包含了大量的信息！Vigo通过检测20多项眨眼的指标，并结合重力感应器关于你头部和身体运动的信息，来实时判断你的精神状态。</p>\r\n<p><br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-050-949-50949-large.png?1387177990" /><br />\r\n<br />\r\n<br />\r\n</p>\r\n<h3>我该何时戴Vigo？</h3>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-050-951-50951-large.jpg?1387178159" /><br />\r\n<br />\r\n</p>\r\n<p><br />\r\n</p>\r\n<h3>为什么要戴Vigo？</h3>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-050-953-50953-large.png?1387178192" /><br />\r\n<br />\r\n</p>\r\n<p>Vigo能根据每个人迥异的需求，在时时刻刻、方方面面给予贴心的服务。不论久坐后需要起来锻炼，或者在不同的疲劳程度进行提醒，它都能满足你的要求。Vigo可以通过轻微的耳边震动、闪烁的警告灯或者你喜欢的提神音乐来帮助你回到最佳状态——而这一切都可以通过你的个性化来决定。</p>', 0, 0, 0, 1, 0, 0.0000, 0.0000, 0.0000, 1389579777, '', '', '', '', '', '', 0, 0, 2, '澳门', '澳门', 0, 3, '', 1, 0, 0, '', 0);
INSERT INTO `codec2i_deal` VALUES (70, 'BroadLink DNA', 'ux66ux114ux111ux97ux100ux76ux105ux110ux107,ux68ux78ux65,ux66ux114ux111ux97ux100ux76ux105ux110ux107ux68ux78ux65', 'BroadLink,DNA,BroadLink DNA', './public/attachment/201401/13/18/52d3bec444949.jpg', '', '', 30, 1389579849, 1391048651, 1, 60000.0000, 'BroadLink DNA 带您走入“人物互联”“万物互联”的智能生活时代，BroadLink ‘轻’智能家居系列产品，让您家中电器更容易接入互联网，通过智能手机实时控制和查看状态，或通过设备感知环境，按预设条件自动控制。您可按照自身需求将产品自由组合，轻松享受舒适便捷、安全节约、健康环保的未来生活', '<h3>团队介绍&nbsp;</h3>\r\n<p>BroadLink&nbsp;团队获得2013年创新中国”高通红杉杯“移动互联网大赛全国总冠军。<br />\r\n</p>\r\n<p>团队理念是让千家万户以低廉的成本享受智能家居的便捷。BroadLink正在全力打造全新的智能家电互联平台，让“BroadLinkInside”家电产品一键上网，实现真正的“人?物?互联”。<br />\r\n</p>\r\n<p>官方网站：<a href="http://www.broadlink.com.cn">www.broadlink.com.cn</a></p>\r\n<p><br />\r\n</p>\r\n<h3>我想要做什么</h3>\r\n<p>感谢各位点名的网友给我们一贯的支持和信任，前两次项目的成功给了我们极大的信心！</p>\r\n<p>Wi-Fi智能插座SP1：<a href="http://www.demohour.com/projects/315063">http://www.demohour.com/projects/315063</a></p>\r\n<p>Wi-Fi智能遥控RM1：<a href="http://www.demohour.com/projects/318220">http://www.demohour.com/projects/318220</a></p>\r\n<p>半年来粉丝们提供了许多极具创造性的建议，我们不断吸取、不断完善，努力将产品的用户体验做到最优。在上一代产品的基础上，我们研发出了“极控·S2&nbsp;”Wi-Fi模块，将其融入了BroadLink新一代产品系列，称之为“BroadLink&nbsp;DNA”。</p>\r\n<h3><br />\r\nBroadLink&nbsp;DNA&nbsp;家族成员：</h3>\r\n<h3>Wi-Fi&nbsp;e-Plug【智能·节能·无所不能】</h3>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-049-490-49490-large.jpg?1386048995" /><img src="http://aliyun.demohour.com/project_photos-files-000-049-491-49491-large.jpg?1386049004" />&nbsp;</p>\r\n<p><a href="http://www.demohour.com/projects/332792">新一代智能插座—Broadlink&nbsp;SP2</a>&nbsp;（详细资料@点名发现）</p>\r\n<p>主要功能描述：</p>\r\n<p>1、&nbsp;Wi-Fi接入</p>\r\n<p>2、&nbsp;手机局域网/远程控制</p>\r\n<p>3、&nbsp;实时开/关和查看状态</p>\r\n<p>4、&nbsp;电量统计</p>\r\n<p>5、&nbsp;定时、延时开关</p>\r\n<p>6、&nbsp;AUTO&nbsp;HOMEAUTO&nbsp;AWAYAUTO&nbsp;SAVE</p>\r\n<p>7、&nbsp;BroadLink&nbsp;DNA场景联动</p>\r\n<p>8、&nbsp;内置BroadLink&nbsp;“极控S2”Wi-Fi模块</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h3>Wi-Fi&nbsp;e-Remote【心控·智控·全能控】</h3>\r\n<h3><img src="http://aliyun.demohour.com/project_photos-files-000-050-665-50665-large.jpg?1386832649" /><br />\r\n</h3>\r\n<h3><img src="http://aliyun.demohour.com/project_photos-files-000-049-486-49486-large.png?1386048431" /><br />\r\n<img src="http://aliyun.demohour.com/project_photos-files-000-049-488-49488-large.jpg?1386048525" /><br />\r\n</h3>\r\n<p><a href="http://www.demohour.com/projects/333354">新一代智能遥控—Broadlink&nbsp;RM2</a>&nbsp;（详细资料@点名发现）</p>\r\n<p>主要功能描述：</p>\r\n<p>1、智能手机局域网/远程遥控家中电器</p>\r\n<p>2、红外/射频学习</p>\r\n<p>3、定时开启预设功能</p>\r\n<p>4、全向红外发射、传输无障碍</p>\r\n<p>5、一键云识别</p>\r\n<p>6、一键配置，轻松接入Wi-Fi网络</p>\r\n<p>7、场景联动，智能交互</p>\r\n<p>8、内置BroadLink&nbsp;“极控S2”Wi-Fi模块</p>\r\n<p>&nbsp;</p>\r\n<h3>e-Touch【灯光也有思想了】</h3>\r\n<h3><img src="http://aliyun.demohour.com/project_photos-files-000-049-437-49437-large.jpg?1386007424" /></h3>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-049-484-49484-large.jpg?1386048290" /><br />\r\n<img src="http://aliyun.demohour.com/project_photos-files-000-049-485-49485-large.jpg?1386048306" /><br />\r\n</p>\r\n<p><a href="http://www.demohour.com/projects/333508">智能墙壁开关&nbsp;TC1</a>&nbsp;（详细资料@点名发现）</p>\r\n<p>主要功能描述：</p>\r\n<p>1、手机面板触控、单控双开</p>\r\n<p>2、结构简单、拆装便利</p>\r\n<p>3、智能手机局域网/远程控制</p>\r\n<p>4、过载保护、安全可靠</p>\r\n<p>5、AUTO&nbsp;HOME/AUTO&nbsp;AWAY</p>\r\n<p>6、场景联动、自由配对</p>\r\n<p>7、单火线安装</p>\r\n8、支持5到250瓦负载，轻松支持LED灯', 0, 0, 0, 0, 0, 0.0000, 0.0000, 0.0000, 1389579891, '', '', '', '', '', '', 0, 0, 2, '甘肃', '白银', 0, 4, '', 1, 0, 0, '', 0);
INSERT INTO `codec2i_deal` VALUES (71, '微蜜Kiss-肌肤水分智能检测仪', 'ux26816ux27979ux20202,ux27700ux20998,ux32908ux32932,ux26234ux33021,ux75ux105ux115ux115,ux24494ux34588ux75ux105ux115ux115ux45ux32908ux32932ux27700ux20998ux26234ux33021ux26816ux27979ux20202', '检测仪,水分,肌肤,智能,Kiss,微蜜Kiss-肌肤水分智能检测仪', './public/attachment/201401/13/18/52d3bf24cfc5d.jpg', '', '', 30, 1389666348, 1391048751, 1, 60000.0000, '微蜜Kiss是全球最小的肌肤水分智能检测仪，即插即用，无需充电，通过App时刻了解你的肌肤水含量，帮你找到最适合自己的补水护肤品，是干燥冬日里送给自己、女友和闺蜜们最最水润的礼物。', '<p>微蜜Kiss是全球最小的肌肤水分智能检测仪，即插即用，无需充电，通过App时刻了解你的肌肤水含量，帮你找到最适合自己的补水护肤品，是干燥冬日里送给自己、女友和闺蜜们最最水润的礼物。</p>\r\n<br />\r\n<h3><img src="http://aliyun.demohour.com/project_photos-files-000-049-425-49425-large.jpg?1385999118" /><br />\r\n</h3>\r\n<p><br />\r\n</p>\r\n<h3><img src="http://aliyun.demohour.com/project_photos-files-000-049-426-49426-large.jpg?1385999176" /><br />\r\n<br />\r\n</h3>\r\n<h3><img src="http://aliyun.demohour.com/project_photos-files-000-049-394-49394-large.jpg?1385981960" /><br />\r\n</h3>\r\n<br />\r\n<img src="http://aliyun.demohour.com/project_photos-files-000-049-373-49373-large.jpg?1385973851" />', 0, 0, 0, 0, 0, 0.0000, 0.0000, 0.0000, 1389579988, '', '', '', '', '', '', 0, 0, 2, '北京', '东城区', 0, 5, '', 1, 0, 0, '', 0);
INSERT INTO `codec2i_deal` VALUES (72, '极速M1000-X成册扫描仪--不拆装订,速度全球第一', 'ux25104ux20876,ux35013ux35746,ux25195ux25551ux20202,ux36895ux24230,ux20840ux29699,ux49ux48ux48ux48,ux26497ux36895ux77ux49ux48ux48ux48ux45ux88ux25104ux20876ux25195ux25551ux20202ux45ux45ux19981ux25286ux35013ux35746ux44ux36895ux24230ux20840ux29699ux31532ux19968', '成册,装订,扫描仪,速度,全球,1000,极速M1000-X成册扫描仪--不拆装订,速度全球第一', './public/attachment/201401/13/18/52d3c43d338d5.jpg', 'http://player.youku.com/player.php/sid/XNjEyNjE5MTg0/v.swf', 'http://v.youku.com/v_show/id_XNjEyNjE5MTg0.html', 30, 1389581255, 1391136457, 1, 500000.0000, '在大家的办公室，不知您是否注意到一些已经“装订成册”的文档，在扫描时，会造成很大的困扰。我们也一样感受到了，于是我们想用一种更加简单的扫描方式，来解决这些成册文档的扫描问题。', '<p>项目起源：<br />\r\n1.您知道如何扫描书籍(不拆装订)吗?<br />\r\n2.扫描300页的书籍需要多长时间?<br />\r\n3.半天?<br />\r\n不,只需要5分钟！<br />\r\n        极速M1000-X是一款由成者(Changer)科技开发,专门针对已装订文档进行快速扫描的设备,专利的硬件结构和独创的图像处理算法。</p>\r\n<br />\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;在大家的办公室，不知您是否注意到一些已经“装订成册”的文档，在扫描时，会造成很大的困扰。我们也一样感受到了，于是我们想用一种更加简单的扫描方式，来解决这些成册文档的扫描问题。<br />\r\n</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;极速M1000-X成册扫描仪，就是专门解决书籍扫描、档案扫描、票据扫描和卷宗扫描。用更轻松的方式，获得更快的扫描速度。</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-052-888-52888-large.jpg?1388654155" /><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（↑工程机实拍图1）<br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-052-889-52889-large.jpg?1388654177" /><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（↑工程机实拍图2）<br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-052-890-52890-large.jpg?1388654210" /><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（↑工程机实拍图3）<br />\r\n</p>\r\n<h3>我们要为您提供这样一款产品</h3>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-052-108-52108-large.jpg?1388412721" /><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（↑&nbsp;初步外观图1）<img src="http://aliyun.demohour.com/project_photos-files-000-052-928-52928-large.jpg?1388668437" /></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（↑&nbsp;初步外观图2）<br />\r\n</p>\r\n<p>极速M1000-X成册扫描仪三大特点：</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-052-268-52268-large.png?1388143868" /><br />\r\n<br />\r\n大家可以感受一下，真实的使用方式：</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-052-571-52571-large.gif?1388410223" /><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（↑&nbsp;像翻书一样扫描书籍！工程机实际测试速度：60-80页/分钟）<br />\r\n</p>\r\n<p>大家也可以感受一下，真实的扫描效果：</p>\r\n<img src="http://aliyun.demohour.com/project_photos-files-000-052-574-52574-large.jpg?1388412226" /><br />\r\n（↑&nbsp;点击看大图。页面弯曲还原、手指识别清除、背景色纯白净化等在后台自动处理。）', 0, 0, 0, 0, 0, 0.0000, 0.0000, 0.0000, 1389581317, '', '', '', '时尚科技 创业劳模周康 辽宁大连', 'ux26102ux23578ux31185ux25216,ux21019ux19994ux21171ux27169ux21608ux24247,ux36797ux23425ux22823ux36830', '时尚科技,创业劳模周康,辽宁大连', 0, 0, 2, '北京', '东城区', 0, 6, '', 1, 0, 0, '', 0);
INSERT INTO `codec2i_deal` VALUES (73, '快按钮--安卓手机的智能快捷键', 'ux23433ux21331,ux24555ux25463ux38190,ux25353ux38062,ux26234ux33021,ux25163ux26426,ux24555ux25353ux38062ux45ux45ux23433ux21331ux25163ux26426ux30340ux26234ux33021ux24555ux25463ux38190', '安卓,快捷键,按钮,智能,手机,快按钮--安卓手机的智能快捷键', './public/attachment/201401/13/18/52d3c4e7ede4e.png', '', '', 30, 1388976620, 1391136624, 1, 500000.0000, '快按钮也正是基于这样的考虑，赋予手机一个物理智能按键，从根本上的完成人机交互方式的优化，所想即所得，简单直接，快捷智能。', '<h3>快按钮·功能篇</h3>\r\n<p>快按钮依据中国用户的使用习惯，为用户量身打造了50余种快捷功能。用户可以通过快按钮应用程序将预设手势与常用手机功能一一匹配。</p>\r\n<p><br />\r\n</p>\r\n<p>即使在锁屏状态下，也能一键快速启动功能，满足您的快捷体验。<br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-051-071-51071-large.jpg?1387252673" /><br />\r\n<br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-051-057-51057-large.jpg?1387241264" /><br />\r\n<br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-051-059-51059-large.jpg?1387241304" /><br />\r\n<br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-051-058-51058-large.jpg?1387241281" /><br />\r\n<img src="http://aliyun.demohour.com/project_photos-files-000-051-060-51060-large.jpg?1387241324" /><br />\r\n<br />\r\n</p>\r\n<p>除了上述几种功能外，快按钮整合了大量快捷专属功能：</p>\r\n<p><a>1.&nbsp;快捷录音。快捷录音，随心随时记录重要片段</a></p>\r\n<p>2.&nbsp;神速手电。神器手电筒，从此摆脱黑暗</p>\r\n<p>3.&nbsp;变更设置。再也不用繁琐的开关wifi/蓝牙/静音等设置，交给快按钮，一键解决</p>\r\n<p>4.&nbsp;电话/短信。随心设定特别联系人，轻松发送短消息甚至是拨通电话</p>\r\n<p>5.&nbsp;省电王。一键进入手机最省电的模式，摆脱电力不足</p>\r\n<p>6.&nbsp;快捷美食。轻轻一按，附近美食，附近团购，快到碗里来</p>\r\n<p>7.&nbsp;一键截屏。安卓截屏你懂得，不解释</p>\r\n<p>8.&nbsp;替换按钮。手机上哪个按钮坏掉了，没问题，快按钮帮你替代</p>\r\n<p>9.&nbsp;一键清理。让心爱手机从此摆脱延迟</p>\r\n<p>10.&nbsp;打开应用。一键打开最心水的应用，快捷方便</p>\r\n<p>……</p>', 0, 0, 0, 0, 0, 0.0000, 0.0000, 0.0000, 1389581463, '', '', '', '', '', '', 0, 0, 6, '澳门', '澳门', 0, 7, '', 1, 0, 0, '', 0);
INSERT INTO `codec2i_deal` VALUES (74, '赫马家庭能源管家- 安全、舒适、节能的用户侧能源管理专家', 'ux33021ux28304,ux31649ux23478,ux33410ux33021,ux33298ux36866,ux23478ux24237,ux19987ux23478,ux23433ux20840,ux29992ux25143,ux31649ux29702,ux36203ux39532ux23478ux24237ux33021ux28304ux31649ux23478ux45ux23433ux20840ux12289ux33298ux36866ux12289ux33410ux33021ux30340ux29992ux25143ux20391ux33021ux28304ux31649ux29702ux19987ux23478', '能源,管家,节能,舒适,家庭,专家,安全,用户,管理,赫马家庭能源管家- 安全、舒适、节能的用户侧能源管理专家', './public/attachment/201401/13/18/52d3c5691d9ff.jpg', '', '', 30, 1388976750, 1391136753, 1, 60000.0000, '赫马家庭能源管家是基于云端海量数据的用户侧能源管理的普及价实现，一方面提升用户使用电器的舒适性，节约能源、确保用户用电安全、减少用户电费支出；另一方面通过调整用户侧的负荷及用户自身配备储能设备的充放电来适应电网负荷和电价变化的自动化系统提高电网稳定性和安全性。', '<h3>特色与亮点</h3>\r\n<h3>1、安全</h3>\r\n<p>安全包括用电安全、财产安全和人身安全。<br />\r\n<br />\r\n</p>\r\n<p>用电安全方面，赫马智控器拥有电器保护、防触电保护和过载、过压、零火线错位和地线悬空检测功能，即预防又能实时防止用电事故的发生。<br />\r\n<br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-049-847-49847-large.jpg?1386294112" />财产安全方面，在家庭内所有安装的智控器都能自动联接成一张防火防盗网，为你提供实时的保护。<br />\r\n<br />\r\n</p>\r\n<p><img src="http://aliyun.demohour.com/project_photos-files-000-049-848-49848-large.jpg?1386295144" /><br />\r\n<br />\r\n</p>\r\n人身安全方面，安装了探测配件的智控器能实时监控房间内煤气、天然气、一氧化碳等有毒有害气体（此插件功能尚在开发中）<br />', 0, 0, 0, 0, 0, 0.0000, 0.0000, 0.0000, 1389581592, '', '', '', '', '', '', 0, 0, 1, '北京', '东城区', 0, 8, '', 1, 0, 0, '', 0);
INSERT INTO `codec2i_deal` VALUES (75, 'U-Lamp：感应无所不在，您的贴心台灯', 'ux26080ux25152ux19981ux22312,ux21488ux28783,ux36148ux24515,ux24863ux24212,ux76ux97ux109ux112,ux85ux45ux76ux97ux109ux112ux65306ux24863ux24212ux26080ux25152ux19981ux22312ux65292ux24744ux30340ux36148ux24515ux21488ux28783', '无所不在,台灯,贴心,感应,Lamp,U-Lamp：感应无所不在，您的贴心台灯', './public/attachment/201401/13/18/52d3c5cad3ab3.jpg', '', '', 0, 1389581646, 1391050448, 1, 60000.0000, '这是一盏与众不同的台灯，它有着众多的传感器——多彩LED灯，蓝牙通信、人体感应、光线感应、外接遥控器等等，因为这些，它可以随时随地提供适当的光源，可以让我们体验到贴心安全的照明。\r\n它叫U-Lamp，它来了，你在哪？', '<p><strong>【人体感应】</strong></p>\r\n<p>采用高灵敏的人体感应模块，只要一出现肢体活动动作（比如走动，举手，起床），“U-Lamp”就能自动按设定的亮度颜色亮起来，动作消失后延时自动关灯。亲，这灵敏度还可以自主调节哦！</p>', 0, 0, 0, 0, 0, 0.0000, 0.0000, 0.0000, 1389581682, '', '', '', '', '', '', 0, 0, 3, '澳门', '澳门', 0, 9, '', 1, 0, 0, '', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_deal_cate`
-- 

CREATE TABLE `codec2i_deal_cate` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- 导出表中的数据 `codec2i_deal_cate`
-- 

INSERT INTO `codec2i_deal_cate` VALUES (1, '设计', 1);
INSERT INTO `codec2i_deal_cate` VALUES (2, '科技', 2);
INSERT INTO `codec2i_deal_cate` VALUES (3, '影视', 3);
INSERT INTO `codec2i_deal_cate` VALUES (4, '摄影', 4);
INSERT INTO `codec2i_deal_cate` VALUES (5, '音乐', 5);
INSERT INTO `codec2i_deal_cate` VALUES (6, '出版', 6);
INSERT INTO `codec2i_deal_cate` VALUES (7, '活动', 7);
INSERT INTO `codec2i_deal_cate` VALUES (8, '游戏', 8);
INSERT INTO `codec2i_deal_cate` VALUES (9, '旅行', 9);
INSERT INTO `codec2i_deal_cate` VALUES (10, '其他', 10);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_deal_comment`
-- 

CREATE TABLE `codec2i_deal_comment` (
  `id` int(11) NOT NULL auto_increment,
  `deal_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL COMMENT '回复的评论ID',
  `deal_user_id` int(11) NOT NULL COMMENT '项目发起人的ID',
  `reply_user_id` int(11) NOT NULL COMMENT '回复的评论的评论人ID',
  `deal_user_name` varchar(255) NOT NULL,
  `reply_user_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `user_id` (`user_id`),
  KEY `create_time` (`create_time`),
  KEY `log_id` (`log_id`),
  KEY `pid` (`pid`),
  KEY `deal_user_id` (`deal_user_id`),
  KEY `reply_user_id` (`reply_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=180 ;

-- 
-- 导出表中的数据 `codec2i_deal_comment`
-- 

INSERT INTO `codec2i_deal_comment` VALUES (170, 55, '加油哦！', 18, 1352229601, 26, 'lixiphp', 0, 17, 0, 'codec2i', '');
INSERT INTO `codec2i_deal_comment` VALUES (171, 56, '感谢支持！！', 18, 1352230363, 27, 'lixiphp', 0, 18, 0, 'lixiphp', '');
INSERT INTO `codec2i_deal_comment` VALUES (172, 57, '好好加油！', 18, 1352230882, 28, 'lixiphp', 0, 17, 0, 'codec2i', '');
INSERT INTO `codec2i_deal_comment` VALUES (173, 57, '回复 lixiphp:一定会的。', 17, 1352230924, 28, 'codec2i', 172, 17, 18, 'codec2i', 'lixiphp');
INSERT INTO `codec2i_deal_comment` VALUES (174, 58, '感谢', 17, 1352231585, 29, 'codec2i', 0, 17, 0, 'codec2i', '');
INSERT INTO `codec2i_deal_comment` VALUES (175, 58, '感谢大家的支持', 17, 1352231787, 0, 'codec2i', 0, 17, 0, 'codec2i', '');
INSERT INTO `codec2i_deal_comment` VALUES (176, 55, '回复 lixiphp: yes, it is.', 18, 1375596322, 26, 'lixiphp', 170, 17, 18, 'codec2i', 'lixiphp');

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_deal_faq`
-- 

CREATE TABLE `codec2i_deal_faq` (
  `id` int(11) NOT NULL auto_increment,
  `deal_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=131 ;

-- 
-- 导出表中的数据 `codec2i_deal_faq`
-- 

INSERT INTO `codec2i_deal_faq` VALUES (128, 56, '我们的咖啡馆在哪里？', '目前暂定的店址，是在延安西路、重庆北路附近。', 1);
INSERT INTO `codec2i_deal_faq` VALUES (129, 56, '我们的咖啡馆大概有多大？', '目前定的店址面积约在200平米以内，有上下两层，底楼较小，二层是整个一层。', 2);
INSERT INTO `codec2i_deal_faq` VALUES (130, 56, '咖啡馆筹备的进度是？', '由于各种的原因，在寻找店址的过程中，先先后后放弃了很多地方，目前找的店址，在办证、面积、交通等方面都较理想。所以基本确定了地方，正在积极办理营业执照及设计各方面的工作，同时也在现有资金的基础上，募集更多的资金及支持。目前店面的装修免租期约在2个月内，所以离正式开业还需要一些时日。', 3);
INSERT INTO `codec2i_deal_faq` VALUES (103, 60, 'dsafsdfasdf', 'asdfasdfasdfasdfasdfasdf', 1);
INSERT INTO `codec2i_deal_faq` VALUES (104, 60, 'asdfewr', '2342adadsfasdfasdfasdf', 2);
INSERT INTO `codec2i_deal_faq` VALUES (105, 60, 'werwerwer', 'asdfasdfasdfas', 3);
INSERT INTO `codec2i_deal_faq` VALUES (112, 61, 'asdfasdf', 'asdfasdfasdfasdfasdfasdf', 1);
INSERT INTO `codec2i_deal_faq` VALUES (113, 61, 'asdf333333333333', 'asdfasdf', 2);
INSERT INTO `codec2i_deal_faq` VALUES (117, 62, '常见问题2', '常见问题2的答案', 2);
INSERT INTO `codec2i_deal_faq` VALUES (116, 62, '常见问题1', '常见问题的答案', 1);
INSERT INTO `codec2i_deal_faq` VALUES (118, 65, 'asdf', 'asdfasdfasdfasdf', 1);
INSERT INTO `codec2i_deal_faq` VALUES (121, 66, 'asdfasd', 'asdfasdfasdfasdf', 1);
INSERT INTO `codec2i_deal_faq` VALUES (122, 67, '为什么需要你的支持 求资金', '我们是热血奋斗的挨踢民工，有一颗打造最简单、最易用智能生活管家产品的心，但我们不是富二代，在产品软件功能设计基本完成，ID/MD设计完成，APP界面不断优化，demo样品在不断测试和完善，模具稳步推进的现阶段，我们需要更多的资金延续我们的梦想，在后期产品的认证测试、量产所需原材料和生产上都需要有您的支持，这样我们才能第一时间将最简单、最好用的智能生活管家产品送达到您的手上。', 1);
INSERT INTO `codec2i_deal_faq` VALUES (123, 67, '为什么需要你的支持 求关注', '我们需要大家的关注，对产品外观、APP界面、产品功能、人机交互体验等提出建议；我们真诚的希望能够得到大家反馈、拍砖和吐槽，能够听到更多人对于产品评价的声音。  我们也希望精通消费电子产品研发的大咖，创意、用户体验的产品设计人士、富于激情的营销人才加盟我们的小队，帮助Netseed完善产品的设计和推广。', 2);
INSERT INTO `codec2i_deal_faq` VALUES (124, 67, '为什么需要你的支持 求带走', '我们在点名时间面向大众征集100个netseed智能生活管家首席尊享公测体验用户，在产品研发测试阶段我们会寄出我们的公测版本，第一时间让你测试体验netseed智能生活管家，并给予你的使用体验意见反馈，便于我们的攻城狮们完善产品每一个细节，力争呈献给消费者精致的产品和极致的体验。征集若干对我们产品感兴趣并热心支持我们的种子用户，在产品上市的第一时间带走netseed智能生活管家抢鲜体验。', 3);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_deal_focus_log`
-- 

CREATE TABLE `codec2i_deal_focus_log` (
  `id` int(11) NOT NULL auto_increment,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `user_id` (`user_id`),
  KEY `create_time` (`create_time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

-- 
-- 导出表中的数据 `codec2i_deal_focus_log`
-- 

INSERT INTO `codec2i_deal_focus_log` VALUES (32, 58, 18, 1352231518);
INSERT INTO `codec2i_deal_focus_log` VALUES (33, 56, 17, 1352232247);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_deal_item`
-- 

CREATE TABLE `codec2i_deal_item` (
  `id` int(11) NOT NULL auto_increment,
  `deal_id` int(11) NOT NULL,
  `price` double(20,4) NOT NULL,
  `support_count` int(11) NOT NULL,
  `support_amount` double(20,4) NOT NULL,
  `description` text NOT NULL,
  `is_delivery` tinyint(1) NOT NULL,
  `delivery_fee` double(20,4) NOT NULL,
  `is_limit_user` tinyint(1) NOT NULL COMMENT '是否限',
  `limit_user` int(11) NOT NULL COMMENT '限额数量',
  `repaid_day` int(11) NOT NULL COMMENT '项目成功后的回报时间',
  PRIMARY KEY  (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `price` (`price`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

-- 
-- 导出表中的数据 `codec2i_deal_item`
-- 

INSERT INTO `codec2i_deal_item` VALUES (17, 55, 10.0000, 1, 10.0000, '我们将以平信的方式寄出2款桌游的首发纪念牌，随机赠送部分游戏牌（至少5张）并在游戏说明书中致谢', 1, 0.0000, 0, 0, 60);
INSERT INTO `codec2i_deal_item` VALUES (18, 55, 15.0000, 1, 15.0000, '我们将回报《黄金密码》1套，赠送首发纪念牌并在游戏说明书中致谢。（邮费另计）', 1, 5.0000, 0, 0, 60);
INSERT INTO `codec2i_deal_item` VALUES (19, 55, 30.0000, 0, 0.0000, '我们将回报《黄金密码》、《功夫》各1套，赠送首发纪念牌并在游戏说明书中致谢。（邮费另计）', 1, 5.0000, 0, 0, 60);
INSERT INTO `codec2i_deal_item` VALUES (20, 55, 50.0000, 0, 0.0000, '我们将回报《黄金密码》、《功夫》各2套，赠送首发纪念牌并在游戏说明书中致谢。（邮费另计）', 1, 5.0000, 0, 0, 60);
INSERT INTO `codec2i_deal_item` VALUES (21, 55, 500.0000, 0, 0.0000, '我们将回报《黄金密码》40套，赠送首发纪念牌并在游戏说明书中致谢，同时还将在首发纪念牌上印上您的姓名或公司名称致谢！（限额2名）。（国内包邮）', 1, 0.0000, 0, 0, 60);
INSERT INTO `codec2i_deal_item` VALUES (22, 56, 50.0000, 0, 0.0000, '你将收到小组成员，在旅行中为你寄出的一张祝福明信片\r\n你将成为我们开业PARTY的座上嘉宾\r\n所以，请留下你的联系方式（电话，地址及邮编）', 1, 0.0000, 0, 0, 50);
INSERT INTO `codec2i_deal_item` VALUES (23, 56, 200.0000, 0, 0.0000, '你将获得咖啡馆开业后永久9折会员卡一张（会员卡可用于借阅书籍，并在生日当天获得免费饮料一杯）\r\n店内旅行纪念手信一份（价值在50元以内）\r\n成为开业PARTY的邀请来宾', 1, 0.0000, 0, 0, 60);
INSERT INTO `codec2i_deal_item` VALUES (24, 56, 500.0000, 11, 5500.0000, '你将获得咖啡馆开业后永久9折会员卡一张（会员卡可用于借阅书籍，并在生日当天获得免费饮料一杯）\r\n一份店内招牌下午茶套餐的招待券\r\n免费参加店内组织的活动（各类分享会、试吃体验等等）\r\n成为开业PARTY的邀请来宾', 1, 0.0000, 0, 0, 50);
INSERT INTO `codec2i_deal_item` VALUES (25, 57, 60.0000, 0, 0.0000, '电影签名海报和明信片。全国包邮。', 1, 0.0000, 0, 0, 50);
INSERT INTO `codec2i_deal_item` VALUES (26, 57, 150.0000, 0, 0.0000, '电影DVD的拷贝一张，以及片尾特别感谢。全国包邮。', 1, 0.0000, 0, 0, 55);
INSERT INTO `codec2i_deal_item` VALUES (27, 57, 600.0000, 0, 0.0000, '一个崭新的印有影片标志的8GB快闪储存器（flash drive), 电影DVD 拷贝，剧照，和特别回报（包括预告片DVD，拍摄花絮DVD）, 以及片尾特别感谢。（所有DVD均有中文字幕），全国包邮。', 1, 0.0000, 1, 20, 50);
INSERT INTO `codec2i_deal_item` VALUES (28, 57, 1200.0000, 0, 0.0000, '电影签名海报和明信片， 一个崭新的印有影片标志的8GB快闪储存器（flash drive), 电影DVD 拷贝，剧照，和特别回报（包括预告片DVD，拍摄花絮DVD）, 以及片尾特别感谢。（所有DVD均有中文字幕）全国包邮。', 1, 0.0000, 1, 5, 10);
INSERT INTO `codec2i_deal_item` VALUES (29, 57, 3000.0000, 0, 0.0000, '成为影片的联合制片人（associate producer), 8GB的快闪储存器（flash drive)， 电影DVD 拷贝，剧照，和特别回报（包括预告片DVD，拍摄花絮DVD）。（所有DVD均有中文字幕） 全国包邮。', 1, 0.0000, 0, 0, 10);
INSERT INTO `codec2i_deal_item` VALUES (30, 58, 1000.0000, 0, 0.0000, '爱的礼物：精美工艺品及红酒。如果你希望得到一份爱的礼物与记念，请留言你的详细地址姓名电话，我将会于爱天使重建之后的三个月内为你寄一件精美的工艺品及价值399元的澳洲红宝龙红酒一瓶！你将成为爱天使的终生会员。。。', 1, 0.0000, 0, 0, 50);
INSERT INTO `codec2i_deal_item` VALUES (31, 58, 2000.0000, 1, 2000.0000, '爱的礼物：精美工艺品红酒及晚餐。如果你希望得到一份爱的礼物与记念，请留言你的详细地址姓名电话，我将会于爱天使重建之后的三个月内为你寄一件精美的工艺品及澳洲红宝龙红酒一瓶及邀请你到爱天使享受晚餐！你将成为爱天使的终生会员。。。', 1, 0.0000, 0, 0, 50);
INSERT INTO `codec2i_deal_item` VALUES (32, 58, 3000.0000, 1, 3000.0000, '爱的礼物：精美工艺品及红酒及晚餐。如果你希望得到一份爱的礼物与记念，请留言你的详细地址姓名电话，我将会于爱天使重建之后的三个月内为你寄一件精美的工艺品及价值688元的澳洲康纳瓦拉红酒一瓶及邀请你到爱天使享受晚餐！你将成为爱天使的终生会员。。。', 1, 0.0000, 0, 0, 50);
INSERT INTO `codec2i_deal_item` VALUES (33, 59, 30.0000, 0, 0.0000, 'Yyyy', 0, 0.0000, 0, 0, 10);
INSERT INTO `codec2i_deal_item` VALUES (34, 59, 10.0000, 0, 0.0000, 'Yyyyy', 0, 0.0000, 0, 0, 20);
INSERT INTO `codec2i_deal_item` VALUES (35, 59, 11.0000, 0, 0.0000, 'Hhhhh', 0, 0.0000, 0, 0, 12);
INSERT INTO `codec2i_deal_item` VALUES (36, 59, 100.0000, 0, 0.0000, 'Hhhh', 0, 0.0000, 0, 0, 13);
INSERT INTO `codec2i_deal_item` VALUES (37, 61, 200.0000, 0, 0.0000, '撒旦发射点发阿萨德发', 1, 20.0000, 1, 10, 20);
INSERT INTO `codec2i_deal_item` VALUES (38, 62, 20.0000, 0, 0.0000, '回报内容信息', 0, 0.0000, 0, 0, 10);
INSERT INTO `codec2i_deal_item` VALUES (39, 64, 300.0000, 0, 0.0000, 'asdfasdfasdfasdf', 1, 10.0000, 0, 0, 0);
INSERT INTO `codec2i_deal_item` VALUES (40, 64, 300.0000, 0, 0.0000, 'asdfasdfasdfasdf', 1, 10.0000, 0, 0, 0);
INSERT INTO `codec2i_deal_item` VALUES (41, 64, 300.0000, 0, 0.0000, 'asdfasdfasdfasdf', 0, 10.0000, 0, 0, 10);
INSERT INTO `codec2i_deal_item` VALUES (42, 64, 300.0000, 0, 0.0000, 'asdfasdfasdfasdf', 0, 10.0000, 0, 0, 10);
INSERT INTO `codec2i_deal_item` VALUES (43, 64, 300.0000, 0, 0.0000, 'asdfasdfasdfasdf', 0, 10.0000, 0, 0, 10);
INSERT INTO `codec2i_deal_item` VALUES (44, 64, 300.0000, 0, 0.0000, 'asdfasdfasdfasdf', 0, 10.0000, 0, 0, 10);
INSERT INTO `codec2i_deal_item` VALUES (45, 65, 30.0000, 0, 0.0000, 'asdfasdfasdfasdf', 1, 10.0000, 1, 1, 100);
INSERT INTO `codec2i_deal_item` VALUES (46, 66, 122.0000, 0, 0.0000, 'asdfasdfasd', 1, 12.0000, 1, 1, 12);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_deal_item_image`
-- 

CREATE TABLE `codec2i_deal_item_image` (
  `id` int(11) NOT NULL auto_increment,
  `deal_id` int(11) NOT NULL,
  `deal_item_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `deal_item_id` (`deal_item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

-- 
-- 导出表中的数据 `codec2i_deal_item_image`
-- 

INSERT INTO `codec2i_deal_item_image` VALUES (40, 55, 18, './public/attachment/201211/07/10/1df0db265b86352e3886b9c62e8ef01b18.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (41, 55, 18, './public/attachment/201211/07/10/4a4a8bdca29b165b7bd5f510ce200c4385.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (42, 55, 18, './public/attachment/201211/07/10/c8223b4192fc39e4a3dce8a986eccf3994.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (43, 55, 19, './public/attachment/201211/07/10/a37a306a3bedaa664011115de251576034.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (44, 55, 20, './public/attachment/201211/07/10/cc12200a637c9db1dcf7354e592f220985.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (45, 55, 21, './public/attachment/201211/07/10/d65e7badd7098a0922db2b49c2fd8ef011.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (46, 56, 22, './public/attachment/201211/07/11/5d379d45a98db1816b027e85d59ca47c58.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (47, 56, 23, './public/attachment/201211/07/11/1ed8f029594ec5e809d95d8074fe3d2760.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (48, 56, 24, './public/attachment/201211/07/11/b08505b20319f493cbc03debd52eceb474.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (49, 56, 24, './public/attachment/201211/07/11/18b75305fe13c623363abb4ab995f6af34.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (50, 57, 25, './public/attachment/201211/07/11/7ecd287a12bff4289d305c0fb949889e29.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (51, 57, 26, './public/attachment/201211/07/11/d84152ab2d569c584c795018846cbb7233.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (52, 57, 27, './public/attachment/201211/07/11/bdefb72e944b41b60a751d50d0d84fe983.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (53, 57, 28, './public/attachment/201211/07/11/c0df234411b34427dedb121ab9bd577352.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (54, 57, 28, './public/attachment/201211/07/11/9c82e2a30f02513d0a197f3d4573794e76.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (55, 57, 29, './public/attachment/201211/07/11/326730647fde78562777b82f0a9e81a155.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (56, 58, 30, './public/attachment/201211/07/11/06bab2f2823bdd050ef8949162bf717729.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (57, 58, 31, './public/attachment/201211/07/11/c835e1fd43685e3106c4de641f70cf2b62.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (58, 58, 32, './public/attachment/201211/07/11/44036ee2e369e9c91be966a329cac70084.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (59, 61, 37, './public/attachment/201312/28/21/46d3b0df5f0249016e955554da91fd9662.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (60, 64, 43, './public/attachment/201401/10/17/715fa219b334a7c1f2b31043699dd36673.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (61, 64, 44, './public/attachment/201401/10/17/715fa219b334a7c1f2b31043699dd36673.jpg');
INSERT INTO `codec2i_deal_item_image` VALUES (62, 66, 46, './public/attachment/201401/10/18/c68e90db7286f3acd93d2ae7f21cc65163.jpg');

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_deal_log`
-- 

CREATE TABLE `codec2i_deal_log` (
  `id` int(11) NOT NULL auto_increment,
  `log_info` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `vedio` varchar(255) NOT NULL,
  `source_vedio` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`),
  KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

-- 
-- 导出表中的数据 `codec2i_deal_log`
-- 

INSERT INTO `codec2i_deal_log` VALUES (26, '功夫图文说明书1', 1352229555, 17, 'codec2i', 55, './public/attachment/201211/07/11/5d2a94ce2a3db73277fb04be463365a255.jpg', '', '');
INSERT INTO `codec2i_deal_log` VALUES (27, '每当我们踏上新的旅程，总是带着期待和兴奋\r\n\r\n而每次踏上归程，多多少少都会怀有一丝的失落\r\n\r\n在路上，我们拥有一拍即合、相谈甚欢的朋友\r\n\r\n在路上，我们总能遇到有趣的人，听到有意思的故事\r\n\r\n在路上，我们可以遗忘时间，丢开工作，在任何一方天地里享用美食和咖啡\r\n\r\n但是归来后，工作和生活又将我们丢回压力和快节奏之下\r\n\r\n我们想要一个在城市中，也能随时抽离的天地\r\n\r\n找朋友，找梦想，找快乐\r\n\r\n \r\n\r\n我们的小窝不会很大，但足以容纳所有的做梦者\r\n\r\n这里有齐全的旅行攻略书籍、各种旅行散文、绘本、游记……\r\n\r\n这里有香浓的咖啡和好吃的甜点\r\n\r\n这里有同样喜爱旅行，爱结交朋友的年轻人\r\n\r\n每一个将这里当做家的人，你们是我们的客人，更是这里的主人', 1352230347, 18, 'lixiphp', 56, './public/attachment/201211/07/11/714396a1e4416b0f7510d97e6966190459.jpg', '', '');
INSERT INTO `codec2i_deal_log` VALUES (28, '在电影里看到的最自然的场景在拍摄的时候都是要用灯光特别加工出来的，因为摄影机和人对光的感受能力不一样。人的眼睛可以说是世界上最好的摄影机。这一幕女主角站在窗边充满惆怅的向男主角的方向望过去，明显的受到了日本导演岩井俊二的影响。', 1352230864, 17, 'codec2i', 57, './public/attachment/201211/07/11/eab603d5c65ec25f88a7fdd8ec9a5c1095.jpg', '', '');
INSERT INTO `codec2i_deal_log` VALUES (29, '谢谢这几天来帮忙的朋友们，昨天一群的同学们让窗户变得明亮，虽然还是挺乱但却充满了快乐与欢。。爱天使每天都要这样充满爱与快乐。。谢谢有你们！因为东西太多可能还要打理两天才能开业，希望最近有空的朋友还能过来帮忙。下午两点过来便可13400642022。地址文化艺术中心大润发楼上正中间店。谢谢！', 1352231575, 17, 'codec2i', 58, './public/attachment/201211/07/11/85a7d1e781bfb8812271b6f6f1bee91d25.jpg', '', '');

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_deal_msg_list`
-- 

CREATE TABLE `codec2i_deal_msg_list` (
  `id` int(11) NOT NULL auto_increment,
  `dest` varchar(255) NOT NULL,
  `send_type` tinyint(1) NOT NULL,
  `content` text NOT NULL,
  `send_time` int(11) NOT NULL,
  `is_send` tinyint(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `result` text NOT NULL,
  `is_success` tinyint(1) NOT NULL,
  `is_html` tinyint(1) NOT NULL,
  `title` text NOT NULL,
  `is_youhui` tinyint(1) NOT NULL,
  `youhui_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `codec2i_deal_msg_list`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_deal_notify`
-- 

CREATE TABLE `codec2i_deal_notify` (
  `id` int(11) NOT NULL auto_increment,
  `deal_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `codec2i_deal_notify`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_deal_order`
-- 

CREATE TABLE `codec2i_deal_order` (
  `id` int(11) NOT NULL auto_increment,
  `deal_id` int(11) NOT NULL,
  `deal_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `pay_time` int(11) NOT NULL,
  `total_price` double(20,4) NOT NULL COMMENT '总价',
  `delivery_fee` double(20,4) NOT NULL COMMENT '运费',
  `deal_price` double(20,4) NOT NULL COMMENT '项目费用',
  `support_memo` text NOT NULL,
  `payment_id` int(11) NOT NULL,
  `bank_id` varchar(255) NOT NULL,
  `credit_pay` double(20,4) NOT NULL,
  `online_pay` double(20,4) NOT NULL,
  `deal_name` varchar(255) NOT NULL,
  `order_status` tinyint(1) NOT NULL COMMENT '0:未支付 1:已支付(过期) 2:已支付(无库存) 3:成功',
  `create_time` int(11) NOT NULL,
  `consignee` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_success` tinyint(1) NOT NULL,
  `repay_time` int(11) NOT NULL COMMENT '回报更新时间',
  `repay_memo` text NOT NULL COMMENT '回报备注，由发起人更新',
  `is_refund` tinyint(1) NOT NULL COMMENT '已退款 0:未 1:已',
  PRIMARY KEY  (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `deal_item_id` (`deal_item_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

-- 
-- 导出表中的数据 `codec2i_deal_order`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_deal_pay_log`
-- 

CREATE TABLE `codec2i_deal_pay_log` (
  `id` int(11) NOT NULL auto_increment,
  `deal_id` int(11) NOT NULL,
  `money` double(20,4) NOT NULL,
  `create_time` int(11) NOT NULL,
  `log_info` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `create_time` (`create_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `codec2i_deal_pay_log`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_deal_support_log`
-- 

CREATE TABLE `codec2i_deal_support_log` (
  `id` int(11) NOT NULL auto_increment,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `price` double(20,4) NOT NULL,
  `deal_item_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `user_id` (`user_id`),
  KEY `create_time` (`create_time`),
  KEY `deal_item_id` (`deal_item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

-- 
-- 导出表中的数据 `codec2i_deal_support_log`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_deal_visit_log`
-- 

CREATE TABLE `codec2i_deal_visit_log` (
  `id` int(11) NOT NULL auto_increment,
  `deal_id` int(11) NOT NULL,
  `client_ip` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=358 ;

-- 
-- 导出表中的数据 `codec2i_deal_visit_log`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_faq`
-- 

CREATE TABLE `codec2i_faq` (
  `id` int(11) NOT NULL auto_increment,
  `group` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `sort` (`sort`),
  KEY `group` (`group`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- 
-- 导出表中的数据 `codec2i_faq`
-- 

INSERT INTO `codec2i_faq` VALUES (1, '基本问题', '这是什么站?', '我们是一个让你可以发起和支持创意项目的平台。如果你有一个创意的想法(新颖的产品?独立电影?)，我们欢迎你到我们的平台上发起项目，向公众推广，并得到资金的支持去完成你的想法。如果你喜欢创意，我们欢迎你来到我们平台，浏览各种有趣的项目，并力所能及支持他们。', 1);
INSERT INTO `codec2i_faq` VALUES (2, '基本问题', '什么样的项目适合我们的平台?', '我们欢迎一切有创意的想法，欢迎艺术家，电影工作者，音乐家，产品设计师，作家，画家，表演者，DJ等等来我们平台推广他们的创意。但是，我们的平台不适用于慈善项目或是创业投资项目。如果你不确定你的想法是否适合我们的平台，欢迎你直接与我们联系。', 2);
INSERT INTO `codec2i_faq` VALUES (3, '基本问题', '这种模式有非法集资的风险吗?', '不会，因为我们要求项目不能够以股权或是资金作为对支持者的回报。项目发起人更不能向支持者许诺任何资金上的收益。项目的回报必须是以实物（如产品，出版物），或者媒体内容（如提供视频或者音乐的流媒体播放或者下载）。我们平台项目接受支持，不能够以股权或者债券的形式。支持者对一个项目的支持属于购买行为，而不是投资行为。', 3);
INSERT INTO `codec2i_faq` VALUES (4, '基本问题', '这个平台接受慈善项目类的提案么?', '我们不接受慈善类项目。作为个人，我们支持社会公益慈善事业，但是我们平台不是支持此类项目的平台。我们所接受的是商业类，有销售购买行为的设计或者文创类的项目。项目发起人需要给支持以实物或者媒体内容类的回报。', 4);
INSERT INTO `codec2i_faq` VALUES (5, '项目发起人相关问题', '是否会要求产品或作品的知识产权?', '不会。我们只是提供一个宣传和支持的平台，知识产权由项目发起人所有。', 5);
INSERT INTO `codec2i_faq` VALUES (6, '项目发起人相关问题', '什么人可以发起项目?', '目前任何在两岸三地(中国大陆，台湾，港澳)的有创意的人都可以发起项目。你可以是一个从事创意行业的自由职业者，也可以是公司职员。只要你有个点子，我们都希望收到你的项目提案。', 6);
INSERT INTO `codec2i_faq` VALUES (7, '项目发起人相关问题', '我怎么发起项目呢?', '请到我们的网站并注册用户后，在我们网站上提交所需要的基本项目信息，包括项目的内容，目前进行的阶段等等。我们会有专人跟进，与你联系。', 7);
INSERT INTO `codec2i_faq` VALUES (8, '项目发起人相关问题', '我想发起项目，但是我担心我的知识产权被人抄袭?', '作为项目发起人，你可以选择公布更多的信息。知识产权敏感的信息，你可以选择不公开。同时，我们平台是一个面对公众的平台。你所提供的信息越丰富，越翔实，就越容易打动和说服别人的支持。', 8);
INSERT INTO `codec2i_faq` VALUES (9, '项目发起人相关问题', '项目目标金额是否有上下限制?', '我们对目标金额的下限是1000元人民币。原则上没有上限。但是资金的要求越高，成功的概率就越低。目前常见的目标金额从几千到几万不等。', 9);
INSERT INTO `codec2i_faq` VALUES (10, '项目发起人相关问题', '没有达到目标金额，是否就不能得到支持?', '是的。如果在项目截至日期到达时，没有达到预期，那么已经收到的资金会退还给支持者。这么做的原因是为了给支持者提供风险保护。只有当项目有足够多的人支持足够多的资金时，他们的支持才生效。', 10);
INSERT INTO `codec2i_faq` VALUES (11, '项目发起人相关问题', '我的项目成功了，然后呢?', '我们会分两次把资金打入你所提供的银行账户。两次汇款的时间和金额因项目而异，在项目上线之前，由我们平台与项目发起人确定。在资金的支持下，你就可以开始进行你的项目，给你的支持者以邮件或者其他形式的更新，并如期实现你承诺的回报。', 11);
INSERT INTO `codec2i_faq` VALUES (12, '项目发起人相关问题', '如何设定项目截止日期?', '一般来说，时间设置在一个月或以内比较合适。数据显示，绝大部分的支持发生在项目上线开始和结束前的一个星期中。', 12);
INSERT INTO `codec2i_faq` VALUES (13, '项目发起人相关问题', '收到的金额能够超过预设的目标?', '可以。在截至日期之前，项目可以一直接受资金支持。', 13);
INSERT INTO `codec2i_faq` VALUES (14, '项目发起人相关问题', '大家支持的动机是什么?', '大家对项目支持的动机是多样的。有些是因为项目发起者提供了有吸引力的回报，特别是产品设计类的项目。有些是因为认可这个项目，希望它能够实现。有些是因为认可项目的发起人，希望助他一臂之力。', 14);
INSERT INTO `codec2i_faq` VALUES (15, '项目发起人相关问题', '什么样的回报比较合适?', '回报因项目而异。可以是实物，比如如果是电影项目，可以提供成片后的DVD;如果是产品设计，可以提供产品;其他还有如明信片，T恤，出版物。也可以是非实物，比如鸣谢，与项目发起人共进晚餐，影片首映的门票等。我们欢迎项目发起人展开想象，设计出各式各样的回报。', 15);
INSERT INTO `codec2i_faq` VALUES (16, '项目发起人相关问题', '如何能够吸引更多的人来支持我的项目?', '对此，我们会另外详细介绍。简短来说，有以下要点\r\n- 拍摄一个有趣，吸引人的视频。讲述这个项目背后的故事。\r\n- 提供有吸引力，物有所值的回报。\r\n- 项目刚上线时，要发动你的亲朋好友来支持你。让你的项目有一个基本的人气。\r\n- 充分运用微博，人人等社交网站来推广。\r\n- 在项目上线期间，经常性的在你的项目页上提供项目的更新，与支持者，询问者的互动。\r\n- 项目宣传视频是必须的么?\r\n宣传视频是项目页上的重要内容。是公众了解你和你的项目的第一步。一个好的宣传视频，能够比文字和图片起到更好的宣传效果。基于这个原因，我们要求每个项目都提供一个视频。有必要的话，我们平台可以提供视频拍摄的支持。', 16);
INSERT INTO `codec2i_faq` VALUES (17, '项目发起人相关问题', '项目宣传视频有什么要求?', '我们要求宣传视频在两分钟之内。内容上，强烈建议包括以下内容\r\n发起人姓名\r\n项目简短描述(特别说明其吸引人的地方)，目前进展\r\n为什么需要支持\r\n谢谢大家', 17);
INSERT INTO `codec2i_faq` VALUES (18, '项目支持者相关问题', '如果项目没有达到目标金额，我支持的资金会还给我么?', '是的。如果项目在截止日期没有达到目标，你所支持的金额会返还给你。', 18);
INSERT INTO `codec2i_faq` VALUES (19, '项目支持者相关问题', '如何支持一个项目?', '每个项目页的右侧有可选择的支持额度和相应的回报介绍。想支持的话，选择你想支持的金额，鼠标点击绿色的按钮，即可。你可以选择支付宝或者财付通来完成付款。', 19);
INSERT INTO `codec2i_faq` VALUES (20, '项目支持者相关问题', '如何保证项目发起人能够实现他们的承诺呢?', '很多项目本身存在着风险，比如产品设计和纪录片的拍摄。有可能存在项目发起人无法完成其许诺的情况。项目支持者一方面要了解创意项目本身是有风险的，另一方面，我们要求项目发起人提供联系方式，并且鼓励有意支持者直接联系他们，在与项目发起人的沟通和互动中对项目的价值，风险，项目发起人的执行力等等有所判断。', 20);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_help`
-- 

CREATE TABLE `codec2i_help` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_fix` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `codec2i_help`
-- 

INSERT INTO `codec2i_help` VALUES (1, '服务条款', '<div class="layout960"><p><strong>一、接受条款</strong></p>\r\n<p>我们所提供的服务包含我们平台网站体验和使用、我们平台互联网消息传递服务以及我们平台提供的与我们平台网站有关的任何其他特色功能、内容或应用程序(合称"我们平台服务")。无论用户是以"访客"(表示用户只是浏览我们平台网站)还是"成员"(表示用户已在我们平台注册并登录)的身份使用我们平台服务，均表示该用户同意遵守本使用协议。</p>\r\n<p>如果用户自愿成为我们平台成员并与其他成员交流(包括通过我们平台网站直接联系或通过我们平台各种服务而连接到的成员)，以及使用我们平台网站及其各种附加服务，请务必认真阅读本协议并在注册过程中表明同意接受本协议。本协议的内容包含我们平台关于接受我们平台服务和在我们平台网站上发布内容的规定、用户使用我们平台服务所享有的权利、承担的义务和对使用我们平台服务所受的限制、以及我们平台的隐私条款。如果用户选择使用某些我们平台服务，可能会收到要求其下载软件或内容的通知，和/或要求用户同意附加条款和条件的通知。除非用户选择使用的我们平台服务相关的附加条款和条件另有规定，附加的条款和条件都应被包含于本协议中。</p>\r\n<p>我们平台有权随时修改本协议文本中的任何条款。一旦我们平台对本协议进行修改,我们平台将会以公告形式发布通知。任何该等修改自发布之日起生效。如果用户在该等修改发布后继续使用我们平台服务，则表示该用户同意遵守对本协议所作出的该等修改。因此，请用户务必定期查阅本协议，以确保了解所有关于本协议的最新修改。如果用户不同意我们平台对本协议进行的修改，请用户离开我们平台网站并立即停止使用我们平台服务。同时，用户还应当删除个人档案并注销成员资格。</p>\r\n<p><strong>二、遵守法律</strong></p>\r\n<p>当使用我们平台服务时，用户同意遵守中华人民共和国(下称"中国")的相关法律法规，包括但不限于《中华人民共和国宪法》、《中华人民共和国合同法》、《中华人民共和国电信条例》、《互联网信息服务管理办法》、《互联网电子公告服务管理规定》、《中华人民共和国保守国家秘密法》、《全国人民代表大会常务委员会关于维护互联网安全的决定》、《中华人民共和国计算机信息系统安全保护条例》、《计算机信息网络国际联网安全保护管理办法》、《中华人民共和国著作权法》及其实施条例、《互联网著作权行政保护办法》等。用户只有在同意遵守所有相关法律法规和本协议时，才有权使用我们平台服务(无论用户是否有意访问或使用此服务)。请用户仔细阅读本协议并将其妥善保存。</p>\r\n<p><strong>三、用户帐号、密码及安全</strong></p>\r\n<p>用户应提供及时、详尽、准确的个人资料，并不断及时更新注册时提供的个人资料，保持其详尽、准确。所有用户输入的资料将引用为注册资料。我们平台不对因用户提交的注册信息不真实或未及时准确变更信息而引起的问题、争议及其后果承担责任。</p>\r\n<p>用户不应将其帐号、密码转让、出借或告知他人，供他人使用。如用户发现帐号遭他人非法使用，应立即通知我们平台。因黑客行为或用户的保管疏忽导致帐号、密码遭他人非法使用的，我们平台不承担任何责任。</p>\r\n<p><strong>四、隐私权政策</strong></p>\r\n<p>用户提供的注册信息及我们平台保留的用户所有资料将受到中国相关法律法规和我们平台《隐私权政策》的规范。《隐私权政策》构成本协议不可分割的一部分。</p>\r\n<p><strong>五、上传内容</strong></p>\r\n<p>用户通过任何我们平台提供的服务上传、张贴、发送(通过电子邮件或任何其它方式传送)的文本、文件、图像、照片、视频、声音、音乐、其他创作作品或任何其他材料(以下简称"内容"，包括用户个人的或个人创作的照片、声音、视频等)，无论系公开还是私下传播，均由用户和内容提供者承担责任，我们平台不对该等内容的正确性、完整性或品质作出任何保证。用户在使用我们平台服务时，可能会接触到令人不快、不适当或令人厌恶之内容，用户需在接受服务前自行做出判断。在任何情况下，我们平台均不为任何内容负责(包括但不限于任何内容的错误、遗漏、不准确或不真实)，亦不对通过我们平台服务上传、张贴、发送(通过电子邮件或任何其它方式传送)的内容衍生的任何损失或损害负责。我们平台在管理过程中发现或接到举报并进行初步调查后，有权依法停止任何前述内容的传播并采取进一步行动，包括但不限于暂停某些用户使用我们平台的全部或部分服务，保存有关记录，并向有关机关报告。</p>\r\n<p><strong>六、用户行为</strong></p>\r\n<p>用户在使用我们平台服务时，必须遵守中华人民共和国相关法律法规的规定，用户保证不会利用我们平台服务进行任何违法或不正当的活动，包括但不限于下列行为∶</p>\r\n<p>上传、展示、张贴或以其它方式传播含有下列内容之一的信息：</p>\r\n<p>反对宪法及其他法律的基本原则的;</p>\r\n<p>危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的;</p>\r\n<p>损害国家荣誉和利益的;</p>\r\n<p>煽动民族仇恨、民族歧视、破坏民族团结的;</p>\r\n<p>破坏国家宗教政策，宣扬邪教和封建迷信的;</p>\r\n<p>散布谣言，扰乱社会秩序，破坏社会稳定的;</p>\r\n<p>散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的;</p>\r\n<p>侮辱或者诽谤他人，侵害他人合法权利的;</p>\r\n<p>含有虚假、有害、胁迫、侵害他人隐私、骚扰、中伤、粗俗、猥亵、或其它道德上令人反感的内容;</p>\r\n<p>含有中国法律、法规、规章、条例以及任何具有法律效力的规范所限制或禁止的其它内容的;</p>\r\n<p>不得为任何非法目的而使用网络服务系统;</p>\r\n<p>用户同时保证不会利用我们平台服务从事以下活动：</p>\r\n<p>未经允许，进入计算机信息网络或者使用计算机信息网络资源的;</p>\r\n<p>未经允许，对计算机信息网络功能进行删除、修改或者增加的;</p>\r\n<p>未经允许，对进入计算机信息网络中存储、处理或者传输的数据和应用程序进行删除、修改或者增加的;故意制作、传播计算机病毒等破坏性程序的;</p>\r\n<p>其他危害计算机信息网络安全的行为。</p>\r\n<p>如用户在使用网络服务时违反任何上述规定，我们平台或经其授权者有权要求该用户改正或直接采取一切必要措施(包括但不限于更改、删除相关内容、暂停或终止相关用户使用我们平台服务)以减轻和消除该用户不当行为造成的影响。</p>\r\n<p>用户不得对我们平台服务的任何部分或全部以及通过我们平台取得的任何形式的信息，进行复制、拷贝、出售、转售或用于任何其它商业目的。</p>\r\n<p>用户须对自己在使用我们平台服务过程中的行为承担法律责任。用户承担法律责任的形式包括但不限于：停止侵害行为，向受到侵害者公开赔礼道歉，恢复受到侵害这的名誉，对受到侵害者进行赔偿。如果我们平台网站因某用户的非法或不当行为受到行政处罚或承担了任何形式的侵权损害赔偿责任，该用户应向我们平台进行赔偿(不低于我们平台向第三方赔偿的金额)并通过全国性的媒体向我们平台公开赔礼道歉。</p>\r\n<p><strong>七、知识产权和其他合法权益(包括但不限于名誉权、商誉等)</strong></p>\r\n<p>我们平台并不对用户发布到我们平台服务中的文本、文件、图像、照片、视频、声音、音乐、其他创作作品或任何其他材料(前文称为"内容")拥有任何所有权。在用户将内容发布到我们平台服务中后，用户将继续对内容享有权利，并且有权选择恰当的方式使用该等内容。如果用户在我们平台服务中或通过我们平台服务展示或发表任何内容，即表明该用户就此授予我们平台一个有限的许可以使我们平台能够合法使用、修改、复制、传播和出版此类内容。</p>\r\n<p>用户同意其已就在我们平台服务所发布的内容，授予我们平台可以免费的、永久有效的、不可撤销的、非独家的、可转授权的、在全球范围内对所发布内容进行使用、复制、修改、改写、改编、发行、翻译、创造衍生性著作的权利，及/或可以将前述部分或全部内容加以传播、表演、展示，及/或可以将前述部分或全部内容放入任何现在已知和未来开发出的以任何形式、媒体或科技承载的著作当中。</p>\r\n<p>用户声明并保证：用户对其在我们平台服务中或通过我们平台服务发布的内容拥有合法权利;用户在我们平台服务中或通过我们平台服务发布的内容不侵犯任何人的肖像权、隐私权、著作权、商标权、专利权、及其它合同权利。如因用户在我们平台服务中或通过我们平台服务发布的内容而需向其他任何人支付许可费或其它费用，全部由该用户承担。</p>\r\n<p>我们平台服务中包含我们平台提供的内容，包含用户和其他我们平台许可方的内容(下称"我们平台的内容")。我们平台的内容受《中华人民共和国著作权法》、《中华人民共和国商标法》、《中华人民共和国专利法》、《中华人民共和国反不正当竞争法》和其他相关法律法规的保护，我们平台拥有并保持对我们平台的内容和我们平台服务的所有权利。</p>\r\n<p><strong>八、国际使用之特别警告</strong></p>\r\n<p>用户已了解国际互联网的无国界性，同意遵守所有关于网上行为、内容的法律法规。用户特别同意遵守有关从中国或用户所在国家或地区输出信息所可能涉及、适用的全部法律法规。</p>\r\n<p><strong>九、赔偿</strong></p>\r\n<p>由于用户通过我们平台服务上传、张贴、发送或传播的内容，或因用户与本服务连线，或因用户违反本使用协议，或因用户侵害他人任何权利而导致任何第三人向我们平台提出赔偿请求，该用户同意赔偿我们平台及其股东、子公司、关联企业、代理人、品牌共有人或其它合作伙伴相应的赔偿金额(包括我们平台支付的律师费等)，以使我们平台的利益免受损害。</p>\r\n<p><strong>十、关于使用及储存的一般措施</strong></p>\r\n<p>用户承认我们平台有权制定关于服务使用的一般措施及限制，包括但不限于我们平台服务将保留用户的电子邮件信息、用户所张贴内容或其它上载内容的最长保留期间、用户一个帐号可收发信息的最大数量、用户帐号当中可收发的单个信息的大小、我们平台服务器为用户分配的最大磁盘空间，以及一定期间内用户使用我们平台服务的次数上限(及每次使用时间之上限)。通过我们平台服务存储或传送的任何信息、通讯资料和其它任何内容，如被删除或未予储存，用户同意我们平台毋须承担任何责任。用户亦同意，超过一年未使用的帐号，我们平台有权关闭。我们平台有权依其自行判断和决定，随时变更相关一般措施及限制。</p>\r\n<p><strong>十一、服务的修改</strong></p>\r\n<p>用户了解并同意，无论通知与否，我们平台有权于任何时间暂时或永久修改或终止部分或全部我们平台服务，对此，我们平台对用户和任何第三人均无需承担任何责任。用户同意，所有上传、张贴、发送到我们平台的内容，我们平台均无保存义务，用户应自行备份。我们平台不对任何内容丢失以及用户因此而遭受的相关损失承担责任。</p>\r\n<p><strong>十二、终止服务</strong></p>\r\n<p>用户同意我们平台可单方面判断并决定，如果用户违反本使用协议或用户长时间未能使用其帐号，我们平台可以终止该用户的密码、帐号或某些服务的使用，并可将该用户在我们平台服务中留存的任何内容加以移除或删除。我们平台亦可基于自身考虑，在通知或未通知之情形下，随时对该用户终止部分或全部服务。用户了解并同意依本使用协议，无需进行事先通知，我们平台可在发现任何不适宜内容时，立即关闭或删除该用户的帐号及其帐号中所有相关信息及文件，并暂时或永久禁止该用户继续使用前述文件或帐号。</p>\r\n<p><strong>十三、与广告商进行的交易</strong></p>\r\n<p>用户通过我们平台服务与广告商进行任何形式的通讯或商业往来，或参与促销活动(包括相关商品或服务的付款及交付)，以及达成的其它任何条款、条件、保证或声明，完全是用户与广告商之间的行为。除有关法律法规明文规定要求我们平台承担责任外，用户因前述任何交易、沟通等而遭受的任何性质的损失或损害，我们平台均不予负责。</p>\r\n<p><strong>十四、链接</strong></p>\r\n<p>用户了解并同意，对于我们平台服务或第三人提供的其它网站或资源的链接是否可以利用，我们平台不予负责;存在或源于此类网站或资源的任何内容、广告、产品或其它资料，我们平台亦不保证或负责。因使用或信赖任何此类网站或资源发布的或经由此类网站或资源获得的任何商品、服务、信息，如对用户造成任何损害，我们平台不负任何直接或间接责任。</p>\r\n<p><strong>十五、禁止商业行为</strong></p>\r\n<p>用户同意不对我们平台服务的任何部分或全部以及用户通过我们平台的服务取得的任何物品、服务、信息等，进行复制、拷贝、出售、转售或用于任何其它商业目的。</p>\r\n<p><strong>十六、我们平台的专属权利</strong></p>\r\n<p>用户了解并同意，我们平台服务及其所使用的相关软件(以下简称"服务软件")含有受到相关知识产权及其它法律保护的专有保密资料。用户同时了解并同意，经由我们平台服务或广告商向用户呈现的赞助广告或信息所包含之内容，亦可能受到著作权、商标、专利等相关法律的保护。未经我们平台或广告商书面授权，用户不得修改、出售、传播部分或全部服务内容或软件，或加以制作衍生服务或软件。我们平台仅授予用户个人非专属的使用权，用户不得(也不得允许任何第三人)复制、修改、创作衍生著作，或通过进行还原工程、反向组译及其它方式破译原代码。用户也不得以转让、许可、设定任何担保或其它方式移转服务和软件的任何权利。用户同意只能通过由我们平台所提供的界面而非任何其它方式使用我们平台服务。</p>\r\n<p><strong>十七、担保与保证</strong></p>\r\n<p>我们平台使用协议的任何规定均不会免除因我们平台造成用户人身伤害或因故意造成用户财产损失而应承担的任何责任。</p>\r\n<p>用户使用我们平台服务的风险由用户个人承担。我们平台对服务不提供任何明示或默示的担保或保证，包括但不限于商业适售性、特定目的的适用性及未侵害他人权利等的担保或保证。</p>\r\n<p>我们平台亦不保证以下事项：</p>\r\n<p>服务将符合用户的要求;</p>\r\n<p>服务将不受干扰、及时提供、安全可靠或不会出错;</p>\r\n<p>使用服务取得的结果正确可靠;</p>\r\n<p>用户经由我们平台服务购买或取得的任何产品、服务、资讯或其它信息将符合用户的期望，且软件中任何错误都将得到更正。</p>\r\n<p>用户应自行决定使用我们平台服务下载或取得任何资料且自负风险，因任何资料的下载而导致的用户电脑系统损坏或数据流失等后果，由用户自行承担。</p>\r\n<p>用户经由我们平台服务获知的任何建议或信息(无论书面或口头形式)，除非使用协议有明确规定，将不构成我们平台对用户的任何保证。</p>\r\n<p><strong>十八、责任限制</strong></p>\r\n<p>用户明确了解并同意，基于以下原因而造成的任何损失，我们平台均不承担任何直接、间接、附带、特别、衍生性或惩罚性赔偿责任(即使我们平台事先已被告知用户或第三方可能会产生相关损失)：</p>\r\n<p>我们平台服务的使用或无法使用;</p>\r\n<p>通过我们平台服务购买、兑换、交换取得的任何商品、数据、信息、服务、信息，或缔结交易而发生的成本;</p>\r\n<p>用户的传输或数据遭到未获授权的存取或变造;</p>\r\n<p>任何第三方在我们平台服务中所作的声明或行为;</p>\r\n<p>与我们平台服务相关的其它事宜，但本使用协议有明确规定的除外。</p>\r\n<p><strong>十九、一般性条款</strong></p>\r\n<p>本使用协议构成用户与我们平台之间的正式协议，并用于规范用户的使用行为。在用户使用我们平台服务、使用第三方提供的内容或软件时，在遵守本协议的基础上，亦应遵守与该等服务、内容、软件有关附加条款及条件。</p>\r\n<p>本使用协以及用户与我们平台之间的关系，均受到中华人民共和国法律管辖。</p>\r\n<p>用户与我们平台就服务本身、本使用协议或其它有关事项发生的争议，应通过友好协商解决。协商不成的，应向北京市东城区人民法院提起诉讼。</p>\r\n<p>我们平台未行使或执行本使用协议设定、赋予的任何权利，不构成对该等权利的放弃。</p>\r\n<p>本使用协议中的任何条款因与中华人民共和国法律相抵触而无效，并不影响其它条款的效力。</p>\r\n<p>本使用协议的标题仅供方便阅读而设，如与协议内容存在矛盾，以协议内容为准。</p>\r\n<p><strong>二十、举报</strong></p>\r\n<p>如用户发现任何违反本服务条款的情事，请及时通知我们平台。</p>\r\n</div>', 'term', '', 1, 1);
INSERT INTO `codec2i_help` VALUES (2, '服务介绍', '', 'intro', '', 1, 1);
INSERT INTO `codec2i_help` VALUES (3, '隐私策略', 'bkjgkjhgiuh', 'privacy', '', 1, 1);
INSERT INTO `codec2i_help` VALUES (4, '关于我们', 'hjfjhgkjhlkjjhgjhggkj''', 'about', '', 1, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_index_image`
-- 

CREATE TABLE `codec2i_index_image` (
  `id` int(11) NOT NULL auto_increment,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- 导出表中的数据 `codec2i_index_image`
-- 

INSERT INTO `codec2i_index_image` VALUES (11, './public/attachment/201401/13/17/52d3b6522d161.jpg', 'http://codec2i.net', 1, '挑战智能硬件');
INSERT INTO `codec2i_index_image` VALUES (12, './public/attachment/201401/13/17/52d3b6c2b698c.jpg', 'http://codec2i.net', 2, '智能水杯解决方案');

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_log`
-- 

CREATE TABLE `codec2i_log` (
  `id` int(11) NOT NULL auto_increment,
  `log_info` text NOT NULL,
  `log_time` int(11) NOT NULL,
  `log_admin` int(11) NOT NULL,
  `log_ip` varchar(255) NOT NULL,
  `log_status` tinyint(1) NOT NULL,
  `module` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2578 ;

-- 
-- 导出表中的数据 `codec2i_log`
-- 

INSERT INTO `codec2i_log` VALUES (2575, 'admin更新成功', 1389681650, 1, '175.152.178.199', 1, 'Admin', 'update');
INSERT INTO `codec2i_log` VALUES (2576, '111111,test123,test456,水电费是发,阿斯达我是修自行车,scsc彻底删除成功', 1389681682, 1, '175.152.178.199', 1, 'User', 'delete');
INSERT INTO `codec2i_log` VALUES (2577, 'admin登录成功', 1395336271, 1, '127.0.0.1', 1, 'Public', 'do_login');

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_mail_server`
-- 

CREATE TABLE `codec2i_mail_server` (
  `id` int(11) NOT NULL auto_increment,
  `smtp_server` varchar(255) NOT NULL,
  `smtp_name` varchar(255) NOT NULL,
  `smtp_pwd` varchar(255) NOT NULL,
  `is_ssl` tinyint(1) NOT NULL,
  `smtp_port` varchar(255) NOT NULL,
  `use_limit` int(11) NOT NULL,
  `is_reset` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `total_use` int(11) NOT NULL,
  `is_verify` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `codec2i_mail_server`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_msg_template`
-- 

CREATE TABLE `codec2i_msg_template` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` tinyint(1) NOT NULL,
  `is_html` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `codec2i_msg_template`
-- 

INSERT INTO `codec2i_msg_template` VALUES (1, 'TPL_MAIL_USER_PASSWORD', '{$user.user_name}你好，请点击以下链接修改您的密码\r\n</p>\r\n<a href=''{$user.password_url}''>{$user.password_url}</a>', 1, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_nav`
-- 

CREATE TABLE `codec2i_nav` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `blank` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `u_module` varchar(255) NOT NULL,
  `u_action` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_param` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

-- 
-- 导出表中的数据 `codec2i_nav`
-- 

INSERT INTO `codec2i_nav` VALUES (42, '首页', '', 0, 1, 1, 'index', '', 0, '');
INSERT INTO `codec2i_nav` VALUES (46, '浏览项目', '', 0, 2, 1, 'deals', 'index', 0, '');
INSERT INTO `codec2i_nav` VALUES (52, '服务介绍', '#', 0, 6, 1, '', '', 0, '');
INSERT INTO `codec2i_nav` VALUES (50, '发起项目', '', 0, 5, 1, 'index', '', 0, 'ctl=project&act=add');

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_payment`
-- 

CREATE TABLE `codec2i_payment` (
  `id` int(11) NOT NULL auto_increment,
  `class_name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `online_pay` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `total_amount` double(20,4) NOT NULL,
  `config` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- 
-- 导出表中的数据 `codec2i_payment`
-- 

INSERT INTO `codec2i_payment` VALUES (24, 'AlipayBank', 1, 1, '支付宝银行直连支付', '', 0.0000, 'a:4:{s:14:"alipay_partner";s:0:"";s:14:"alipay_account";s:0:"";s:10:"alipay_key";s:0:"";s:14:"alipay_gateway";a:17:{s:7:"ICBCB2C";s:1:"1";s:3:"CMB";s:1:"1";s:3:"CCB";s:1:"1";s:3:"ABC";s:1:"1";s:4:"SPDB";s:1:"1";s:3:"SDB";s:1:"1";s:3:"CIB";s:1:"1";s:6:"BJBANK";s:1:"1";s:7:"CEBBANK";s:1:"1";s:4:"CMBC";s:1:"1";s:5:"CITIC";s:1:"1";s:3:"GDB";s:1:"1";s:7:"SPABANK";s:1:"1";s:6:"BOCB2C";s:1:"1";s:4:"COMM";s:1:"1";s:7:"ICBCBTB";s:1:"1";s:10:"PSBC-DEBIT";s:1:"1";}}', '', 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_payment_notice`
-- 

CREATE TABLE `codec2i_payment_notice` (
  `id` int(11) NOT NULL auto_increment,
  `notice_sn` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `pay_time` int(11) NOT NULL,
  `order_id` int(11) NOT NULL COMMENT 'order_id为0时为充值',
  `is_paid` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `bank_id` varchar(255) NOT NULL,
  `memo` text NOT NULL,
  `money` double(20,4) NOT NULL,
  `outer_notice_sn` varchar(255) NOT NULL,
  `deal_id` int(11) NOT NULL COMMENT '0为充值',
  `deal_item_id` int(11) NOT NULL COMMENT '0为充值',
  `deal_name` varchar(255) NOT NULL COMMENT '空为充值',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `notice_sn_unk` (`notice_sn`),
  KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `payment_id` (`payment_id`),
  KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=204 ;

-- 
-- 导出表中的数据 `codec2i_payment_notice`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_region_conf`
-- 

CREATE TABLE `codec2i_region_conf` (
  `id` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '地区名称',
  `region_level` tinyint(4) NOT NULL COMMENT '1:国 2:省 3:市(县) 4:区(镇)',
  `py` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3401 ;

-- 
-- 导出表中的数据 `codec2i_region_conf`
-- 

INSERT INTO `codec2i_region_conf` VALUES (3, 1, '安徽', 2, 'anhui');
INSERT INTO `codec2i_region_conf` VALUES (4, 1, '福建', 2, 'fujian');
INSERT INTO `codec2i_region_conf` VALUES (5, 1, '甘肃', 2, 'gansu');
INSERT INTO `codec2i_region_conf` VALUES (6, 1, '广东', 2, 'guangdong');
INSERT INTO `codec2i_region_conf` VALUES (7, 1, '广西', 2, 'guangxi');
INSERT INTO `codec2i_region_conf` VALUES (8, 1, '贵州', 2, 'guizhou');
INSERT INTO `codec2i_region_conf` VALUES (9, 1, '海南', 2, 'hainan');
INSERT INTO `codec2i_region_conf` VALUES (10, 1, '河北', 2, 'hebei');
INSERT INTO `codec2i_region_conf` VALUES (11, 1, '河南', 2, 'henan');
INSERT INTO `codec2i_region_conf` VALUES (12, 1, '黑龙江', 2, 'heilongjiang');
INSERT INTO `codec2i_region_conf` VALUES (13, 1, '湖北', 2, 'hubei');
INSERT INTO `codec2i_region_conf` VALUES (14, 1, '湖南', 2, 'hunan');
INSERT INTO `codec2i_region_conf` VALUES (15, 1, '吉林', 2, 'jilin');
INSERT INTO `codec2i_region_conf` VALUES (16, 1, '江苏', 2, 'jiangsu');
INSERT INTO `codec2i_region_conf` VALUES (17, 1, '江西', 2, 'jiangxi');
INSERT INTO `codec2i_region_conf` VALUES (18, 1, '辽宁', 2, 'liaoning');
INSERT INTO `codec2i_region_conf` VALUES (19, 1, '内蒙古', 2, 'neimenggu');
INSERT INTO `codec2i_region_conf` VALUES (20, 1, '宁夏', 2, 'ningxia');
INSERT INTO `codec2i_region_conf` VALUES (21, 1, '青海', 2, 'qinghai');
INSERT INTO `codec2i_region_conf` VALUES (22, 1, '山东', 2, 'shandong');
INSERT INTO `codec2i_region_conf` VALUES (23, 1, '山西', 2, 'shanxi');
INSERT INTO `codec2i_region_conf` VALUES (24, 1, '陕西', 2, 'shanxi');
INSERT INTO `codec2i_region_conf` VALUES (26, 1, '四川', 2, 'sichuan');
INSERT INTO `codec2i_region_conf` VALUES (28, 1, '西藏', 2, 'xicang');
INSERT INTO `codec2i_region_conf` VALUES (29, 1, '新疆', 2, 'xinjiang');
INSERT INTO `codec2i_region_conf` VALUES (30, 1, '云南', 2, 'yunnan');
INSERT INTO `codec2i_region_conf` VALUES (31, 1, '浙江', 2, 'zhejiang');
INSERT INTO `codec2i_region_conf` VALUES (36, 3, '安庆', 3, 'anqing');
INSERT INTO `codec2i_region_conf` VALUES (37, 3, '蚌埠', 3, 'bangbu');
INSERT INTO `codec2i_region_conf` VALUES (38, 3, '巢湖', 3, 'chaohu');
INSERT INTO `codec2i_region_conf` VALUES (39, 3, '池州', 3, 'chizhou');
INSERT INTO `codec2i_region_conf` VALUES (40, 3, '滁州', 3, 'chuzhou');
INSERT INTO `codec2i_region_conf` VALUES (41, 3, '阜阳', 3, 'fuyang');
INSERT INTO `codec2i_region_conf` VALUES (42, 3, '淮北', 3, 'huaibei');
INSERT INTO `codec2i_region_conf` VALUES (43, 3, '淮南', 3, 'huainan');
INSERT INTO `codec2i_region_conf` VALUES (44, 3, '黄山', 3, 'huangshan');
INSERT INTO `codec2i_region_conf` VALUES (45, 3, '六安', 3, 'liuan');
INSERT INTO `codec2i_region_conf` VALUES (46, 3, '马鞍山', 3, 'maanshan');
INSERT INTO `codec2i_region_conf` VALUES (47, 3, '宿州', 3, 'suzhou');
INSERT INTO `codec2i_region_conf` VALUES (48, 3, '铜陵', 3, 'tongling');
INSERT INTO `codec2i_region_conf` VALUES (49, 3, '芜湖', 3, 'wuhu');
INSERT INTO `codec2i_region_conf` VALUES (50, 3, '宣城', 3, 'xuancheng');
INSERT INTO `codec2i_region_conf` VALUES (51, 3, '亳州', 3, 'zhou');
INSERT INTO `codec2i_region_conf` VALUES (52, 2, '北京', 2, 'beijing');
INSERT INTO `codec2i_region_conf` VALUES (53, 4, '福州', 3, 'fuzhou');
INSERT INTO `codec2i_region_conf` VALUES (54, 4, '龙岩', 3, 'longyan');
INSERT INTO `codec2i_region_conf` VALUES (55, 4, '南平', 3, 'nanping');
INSERT INTO `codec2i_region_conf` VALUES (56, 4, '宁德', 3, 'ningde');
INSERT INTO `codec2i_region_conf` VALUES (57, 4, '莆田', 3, 'putian');
INSERT INTO `codec2i_region_conf` VALUES (58, 4, '泉州', 3, 'quanzhou');
INSERT INTO `codec2i_region_conf` VALUES (59, 4, '三明', 3, 'sanming');
INSERT INTO `codec2i_region_conf` VALUES (60, 4, '厦门', 3, 'xiamen');
INSERT INTO `codec2i_region_conf` VALUES (61, 4, '漳州', 3, 'zhangzhou');
INSERT INTO `codec2i_region_conf` VALUES (62, 5, '兰州', 3, 'lanzhou');
INSERT INTO `codec2i_region_conf` VALUES (63, 5, '白银', 3, 'baiyin');
INSERT INTO `codec2i_region_conf` VALUES (64, 5, '定西', 3, 'dingxi');
INSERT INTO `codec2i_region_conf` VALUES (65, 5, '甘南', 3, 'gannan');
INSERT INTO `codec2i_region_conf` VALUES (66, 5, '嘉峪关', 3, 'jiayuguan');
INSERT INTO `codec2i_region_conf` VALUES (67, 5, '金昌', 3, 'jinchang');
INSERT INTO `codec2i_region_conf` VALUES (68, 5, '酒泉', 3, 'jiuquan');
INSERT INTO `codec2i_region_conf` VALUES (69, 5, '临夏', 3, 'linxia');
INSERT INTO `codec2i_region_conf` VALUES (70, 5, '陇南', 3, 'longnan');
INSERT INTO `codec2i_region_conf` VALUES (71, 5, '平凉', 3, 'pingliang');
INSERT INTO `codec2i_region_conf` VALUES (72, 5, '庆阳', 3, 'qingyang');
INSERT INTO `codec2i_region_conf` VALUES (73, 5, '天水', 3, 'tianshui');
INSERT INTO `codec2i_region_conf` VALUES (74, 5, '武威', 3, 'wuwei');
INSERT INTO `codec2i_region_conf` VALUES (75, 5, '张掖', 3, 'zhangye');
INSERT INTO `codec2i_region_conf` VALUES (76, 6, '广州', 3, 'guangzhou');
INSERT INTO `codec2i_region_conf` VALUES (77, 6, '深圳', 3, 'shen');
INSERT INTO `codec2i_region_conf` VALUES (78, 6, '潮州', 3, 'chaozhou');
INSERT INTO `codec2i_region_conf` VALUES (79, 6, '东莞', 3, 'dong');
INSERT INTO `codec2i_region_conf` VALUES (80, 6, '佛山', 3, 'foshan');
INSERT INTO `codec2i_region_conf` VALUES (81, 6, '河源', 3, 'heyuan');
INSERT INTO `codec2i_region_conf` VALUES (82, 6, '惠州', 3, 'huizhou');
INSERT INTO `codec2i_region_conf` VALUES (83, 6, '江门', 3, 'jiangmen');
INSERT INTO `codec2i_region_conf` VALUES (84, 6, '揭阳', 3, 'jieyang');
INSERT INTO `codec2i_region_conf` VALUES (85, 6, '茂名', 3, 'maoming');
INSERT INTO `codec2i_region_conf` VALUES (86, 6, '梅州', 3, 'meizhou');
INSERT INTO `codec2i_region_conf` VALUES (87, 6, '清远', 3, 'qingyuan');
INSERT INTO `codec2i_region_conf` VALUES (88, 6, '汕头', 3, 'shantou');
INSERT INTO `codec2i_region_conf` VALUES (89, 6, '汕尾', 3, 'shanwei');
INSERT INTO `codec2i_region_conf` VALUES (90, 6, '韶关', 3, 'shaoguan');
INSERT INTO `codec2i_region_conf` VALUES (91, 6, '阳江', 3, 'yangjiang');
INSERT INTO `codec2i_region_conf` VALUES (92, 6, '云浮', 3, 'yunfu');
INSERT INTO `codec2i_region_conf` VALUES (93, 6, '湛江', 3, 'zhanjiang');
INSERT INTO `codec2i_region_conf` VALUES (94, 6, '肇庆', 3, 'zhaoqing');
INSERT INTO `codec2i_region_conf` VALUES (95, 6, '中山', 3, 'zhongshan');
INSERT INTO `codec2i_region_conf` VALUES (96, 6, '珠海', 3, 'zhuhai');
INSERT INTO `codec2i_region_conf` VALUES (97, 7, '南宁', 3, 'nanning');
INSERT INTO `codec2i_region_conf` VALUES (98, 7, '桂林', 3, 'guilin');
INSERT INTO `codec2i_region_conf` VALUES (99, 7, '百色', 3, 'baise');
INSERT INTO `codec2i_region_conf` VALUES (100, 7, '北海', 3, 'beihai');
INSERT INTO `codec2i_region_conf` VALUES (101, 7, '崇左', 3, 'chongzuo');
INSERT INTO `codec2i_region_conf` VALUES (102, 7, '防城港', 3, 'fangchenggang');
INSERT INTO `codec2i_region_conf` VALUES (103, 7, '贵港', 3, 'guigang');
INSERT INTO `codec2i_region_conf` VALUES (104, 7, '河池', 3, 'hechi');
INSERT INTO `codec2i_region_conf` VALUES (105, 7, '贺州', 3, 'hezhou');
INSERT INTO `codec2i_region_conf` VALUES (106, 7, '来宾', 3, 'laibin');
INSERT INTO `codec2i_region_conf` VALUES (107, 7, '柳州', 3, 'liuzhou');
INSERT INTO `codec2i_region_conf` VALUES (108, 7, '钦州', 3, 'qinzhou');
INSERT INTO `codec2i_region_conf` VALUES (109, 7, '梧州', 3, 'wuzhou');
INSERT INTO `codec2i_region_conf` VALUES (110, 7, '玉林', 3, 'yulin');
INSERT INTO `codec2i_region_conf` VALUES (111, 8, '贵阳', 3, 'guiyang');
INSERT INTO `codec2i_region_conf` VALUES (112, 8, '安顺', 3, 'anshun');
INSERT INTO `codec2i_region_conf` VALUES (113, 8, '毕节', 3, 'bijie');
INSERT INTO `codec2i_region_conf` VALUES (114, 8, '六盘水', 3, 'liupanshui');
INSERT INTO `codec2i_region_conf` VALUES (115, 8, '黔东南', 3, 'qiandongnan');
INSERT INTO `codec2i_region_conf` VALUES (116, 8, '黔南', 3, 'qiannan');
INSERT INTO `codec2i_region_conf` VALUES (117, 8, '黔西南', 3, 'qianxinan');
INSERT INTO `codec2i_region_conf` VALUES (118, 8, '铜仁', 3, 'tongren');
INSERT INTO `codec2i_region_conf` VALUES (119, 8, '遵义', 3, 'zunyi');
INSERT INTO `codec2i_region_conf` VALUES (120, 9, '海口', 3, 'haikou');
INSERT INTO `codec2i_region_conf` VALUES (121, 9, '三亚', 3, 'sanya');
INSERT INTO `codec2i_region_conf` VALUES (122, 9, '白沙', 3, 'baisha');
INSERT INTO `codec2i_region_conf` VALUES (123, 9, '保亭', 3, 'baoting');
INSERT INTO `codec2i_region_conf` VALUES (124, 9, '昌江', 3, 'changjiang');
INSERT INTO `codec2i_region_conf` VALUES (125, 9, '澄迈县', 3, 'chengmaixian');
INSERT INTO `codec2i_region_conf` VALUES (126, 9, '定安县', 3, 'dinganxian');
INSERT INTO `codec2i_region_conf` VALUES (127, 9, '东方', 3, 'dongfang');
INSERT INTO `codec2i_region_conf` VALUES (128, 9, '乐东', 3, 'ledong');
INSERT INTO `codec2i_region_conf` VALUES (129, 9, '临高县', 3, 'lingaoxian');
INSERT INTO `codec2i_region_conf` VALUES (130, 9, '陵水', 3, 'lingshui');
INSERT INTO `codec2i_region_conf` VALUES (131, 9, '琼海', 3, 'qionghai');
INSERT INTO `codec2i_region_conf` VALUES (132, 9, '琼中', 3, 'qiongzhong');
INSERT INTO `codec2i_region_conf` VALUES (133, 9, '屯昌县', 3, 'tunchangxian');
INSERT INTO `codec2i_region_conf` VALUES (134, 9, '万宁', 3, 'wanning');
INSERT INTO `codec2i_region_conf` VALUES (135, 9, '文昌', 3, 'wenchang');
INSERT INTO `codec2i_region_conf` VALUES (136, 9, '五指山', 3, 'wuzhishan');
INSERT INTO `codec2i_region_conf` VALUES (137, 9, '儋州', 3, 'zhou');
INSERT INTO `codec2i_region_conf` VALUES (138, 10, '石家庄', 3, 'shijiazhuang');
INSERT INTO `codec2i_region_conf` VALUES (139, 10, '保定', 3, 'baoding');
INSERT INTO `codec2i_region_conf` VALUES (140, 10, '沧州', 3, 'cangzhou');
INSERT INTO `codec2i_region_conf` VALUES (141, 10, '承德', 3, 'chengde');
INSERT INTO `codec2i_region_conf` VALUES (142, 10, '邯郸', 3, 'handan');
INSERT INTO `codec2i_region_conf` VALUES (143, 10, '衡水', 3, 'hengshui');
INSERT INTO `codec2i_region_conf` VALUES (144, 10, '廊坊', 3, 'langfang');
INSERT INTO `codec2i_region_conf` VALUES (145, 10, '秦皇岛', 3, 'qinhuangdao');
INSERT INTO `codec2i_region_conf` VALUES (146, 10, '唐山', 3, 'tangshan');
INSERT INTO `codec2i_region_conf` VALUES (147, 10, '邢台', 3, 'xingtai');
INSERT INTO `codec2i_region_conf` VALUES (148, 10, '张家口', 3, 'zhangjiakou');
INSERT INTO `codec2i_region_conf` VALUES (149, 11, '郑州', 3, 'zhengzhou');
INSERT INTO `codec2i_region_conf` VALUES (150, 11, '洛阳', 3, 'luoyang');
INSERT INTO `codec2i_region_conf` VALUES (151, 11, '开封', 3, 'kaifeng');
INSERT INTO `codec2i_region_conf` VALUES (152, 11, '安阳', 3, 'anyang');
INSERT INTO `codec2i_region_conf` VALUES (153, 11, '鹤壁', 3, 'hebi');
INSERT INTO `codec2i_region_conf` VALUES (154, 11, '济源', 3, 'jiyuan');
INSERT INTO `codec2i_region_conf` VALUES (155, 11, '焦作', 3, 'jiaozuo');
INSERT INTO `codec2i_region_conf` VALUES (156, 11, '南阳', 3, 'nanyang');
INSERT INTO `codec2i_region_conf` VALUES (157, 11, '平顶山', 3, 'pingdingshan');
INSERT INTO `codec2i_region_conf` VALUES (158, 11, '三门峡', 3, 'sanmenxia');
INSERT INTO `codec2i_region_conf` VALUES (159, 11, '商丘', 3, 'shangqiu');
INSERT INTO `codec2i_region_conf` VALUES (160, 11, '新乡', 3, 'xinxiang');
INSERT INTO `codec2i_region_conf` VALUES (161, 11, '信阳', 3, 'xinyang');
INSERT INTO `codec2i_region_conf` VALUES (162, 11, '许昌', 3, 'xuchang');
INSERT INTO `codec2i_region_conf` VALUES (163, 11, '周口', 3, 'zhoukou');
INSERT INTO `codec2i_region_conf` VALUES (164, 11, '驻马店', 3, 'zhumadian');
INSERT INTO `codec2i_region_conf` VALUES (165, 11, '漯河', 3, 'he');
INSERT INTO `codec2i_region_conf` VALUES (166, 11, '濮阳', 3, 'yang');
INSERT INTO `codec2i_region_conf` VALUES (167, 12, '哈尔滨', 3, 'haerbin');
INSERT INTO `codec2i_region_conf` VALUES (168, 12, '大庆', 3, 'daqing');
INSERT INTO `codec2i_region_conf` VALUES (169, 12, '大兴安岭', 3, 'daxinganling');
INSERT INTO `codec2i_region_conf` VALUES (170, 12, '鹤岗', 3, 'hegang');
INSERT INTO `codec2i_region_conf` VALUES (171, 12, '黑河', 3, 'heihe');
INSERT INTO `codec2i_region_conf` VALUES (172, 12, '鸡西', 3, 'jixi');
INSERT INTO `codec2i_region_conf` VALUES (173, 12, '佳木斯', 3, 'jiamusi');
INSERT INTO `codec2i_region_conf` VALUES (174, 12, '牡丹江', 3, 'mudanjiang');
INSERT INTO `codec2i_region_conf` VALUES (175, 12, '七台河', 3, 'qitaihe');
INSERT INTO `codec2i_region_conf` VALUES (176, 12, '齐齐哈尔', 3, 'qiqihaer');
INSERT INTO `codec2i_region_conf` VALUES (177, 12, '双鸭山', 3, 'shuangyashan');
INSERT INTO `codec2i_region_conf` VALUES (178, 12, '绥化', 3, 'suihua');
INSERT INTO `codec2i_region_conf` VALUES (179, 12, '伊春', 3, 'yichun');
INSERT INTO `codec2i_region_conf` VALUES (180, 13, '武汉', 3, 'wuhan');
INSERT INTO `codec2i_region_conf` VALUES (181, 13, '仙桃', 3, 'xiantao');
INSERT INTO `codec2i_region_conf` VALUES (182, 13, '鄂州', 3, 'ezhou');
INSERT INTO `codec2i_region_conf` VALUES (183, 13, '黄冈', 3, 'huanggang');
INSERT INTO `codec2i_region_conf` VALUES (184, 13, '黄石', 3, 'huangshi');
INSERT INTO `codec2i_region_conf` VALUES (185, 13, '荆门', 3, 'jingmen');
INSERT INTO `codec2i_region_conf` VALUES (186, 13, '荆州', 3, 'jingzhou');
INSERT INTO `codec2i_region_conf` VALUES (187, 13, '潜江', 3, 'qianjiang');
INSERT INTO `codec2i_region_conf` VALUES (188, 13, '神农架林区', 3, 'shennongjialinqu');
INSERT INTO `codec2i_region_conf` VALUES (189, 13, '十堰', 3, 'shiyan');
INSERT INTO `codec2i_region_conf` VALUES (190, 13, '随州', 3, 'suizhou');
INSERT INTO `codec2i_region_conf` VALUES (191, 13, '天门', 3, 'tianmen');
INSERT INTO `codec2i_region_conf` VALUES (192, 13, '咸宁', 3, 'xianning');
INSERT INTO `codec2i_region_conf` VALUES (193, 13, '襄樊', 3, 'xiangfan');
INSERT INTO `codec2i_region_conf` VALUES (194, 13, '孝感', 3, 'xiaogan');
INSERT INTO `codec2i_region_conf` VALUES (195, 13, '宜昌', 3, 'yichang');
INSERT INTO `codec2i_region_conf` VALUES (196, 13, '恩施', 3, 'enshi');
INSERT INTO `codec2i_region_conf` VALUES (197, 14, '长沙', 3, 'changsha');
INSERT INTO `codec2i_region_conf` VALUES (198, 14, '张家界', 3, 'zhangjiajie');
INSERT INTO `codec2i_region_conf` VALUES (199, 14, '常德', 3, 'changde');
INSERT INTO `codec2i_region_conf` VALUES (200, 14, '郴州', 3, 'chenzhou');
INSERT INTO `codec2i_region_conf` VALUES (201, 14, '衡阳', 3, 'hengyang');
INSERT INTO `codec2i_region_conf` VALUES (202, 14, '怀化', 3, 'huaihua');
INSERT INTO `codec2i_region_conf` VALUES (203, 14, '娄底', 3, 'loudi');
INSERT INTO `codec2i_region_conf` VALUES (204, 14, '邵阳', 3, 'shaoyang');
INSERT INTO `codec2i_region_conf` VALUES (205, 14, '湘潭', 3, 'xiangtan');
INSERT INTO `codec2i_region_conf` VALUES (206, 14, '湘西', 3, 'xiangxi');
INSERT INTO `codec2i_region_conf` VALUES (207, 14, '益阳', 3, 'yiyang');
INSERT INTO `codec2i_region_conf` VALUES (208, 14, '永州', 3, 'yongzhou');
INSERT INTO `codec2i_region_conf` VALUES (209, 14, '岳阳', 3, 'yueyang');
INSERT INTO `codec2i_region_conf` VALUES (210, 14, '株洲', 3, 'zhuzhou');
INSERT INTO `codec2i_region_conf` VALUES (211, 15, '长春', 3, 'changchun');
INSERT INTO `codec2i_region_conf` VALUES (212, 15, '吉林', 3, 'jilin');
INSERT INTO `codec2i_region_conf` VALUES (213, 15, '白城', 3, 'baicheng');
INSERT INTO `codec2i_region_conf` VALUES (214, 15, '白山', 3, 'baishan');
INSERT INTO `codec2i_region_conf` VALUES (215, 15, '辽源', 3, 'liaoyuan');
INSERT INTO `codec2i_region_conf` VALUES (216, 15, '四平', 3, 'siping');
INSERT INTO `codec2i_region_conf` VALUES (217, 15, '松原', 3, 'songyuan');
INSERT INTO `codec2i_region_conf` VALUES (218, 15, '通化', 3, 'tonghua');
INSERT INTO `codec2i_region_conf` VALUES (219, 15, '延边', 3, 'yanbian');
INSERT INTO `codec2i_region_conf` VALUES (220, 16, '南京', 3, 'nanjing');
INSERT INTO `codec2i_region_conf` VALUES (221, 16, '苏州', 3, 'suzhou');
INSERT INTO `codec2i_region_conf` VALUES (222, 16, '无锡', 3, 'wuxi');
INSERT INTO `codec2i_region_conf` VALUES (223, 16, '常州', 3, 'changzhou');
INSERT INTO `codec2i_region_conf` VALUES (224, 16, '淮安', 3, 'huaian');
INSERT INTO `codec2i_region_conf` VALUES (225, 16, '连云港', 3, 'lianyungang');
INSERT INTO `codec2i_region_conf` VALUES (226, 16, '南通', 3, 'nantong');
INSERT INTO `codec2i_region_conf` VALUES (227, 16, '宿迁', 3, 'suqian');
INSERT INTO `codec2i_region_conf` VALUES (228, 16, '泰州', 3, 'taizhou');
INSERT INTO `codec2i_region_conf` VALUES (229, 16, '徐州', 3, 'xuzhou');
INSERT INTO `codec2i_region_conf` VALUES (230, 16, '盐城', 3, 'yancheng');
INSERT INTO `codec2i_region_conf` VALUES (231, 16, '扬州', 3, 'yangzhou');
INSERT INTO `codec2i_region_conf` VALUES (232, 16, '镇江', 3, 'zhenjiang');
INSERT INTO `codec2i_region_conf` VALUES (233, 17, '南昌', 3, 'nanchang');
INSERT INTO `codec2i_region_conf` VALUES (234, 17, '抚州', 3, 'fuzhou');
INSERT INTO `codec2i_region_conf` VALUES (235, 17, '赣州', 3, 'ganzhou');
INSERT INTO `codec2i_region_conf` VALUES (236, 17, '吉安', 3, 'jian');
INSERT INTO `codec2i_region_conf` VALUES (237, 17, '景德镇', 3, 'jingdezhen');
INSERT INTO `codec2i_region_conf` VALUES (238, 17, '九江', 3, 'jiujiang');
INSERT INTO `codec2i_region_conf` VALUES (239, 17, '萍乡', 3, 'pingxiang');
INSERT INTO `codec2i_region_conf` VALUES (240, 17, '上饶', 3, 'shangrao');
INSERT INTO `codec2i_region_conf` VALUES (241, 17, '新余', 3, 'xinyu');
INSERT INTO `codec2i_region_conf` VALUES (242, 17, '宜春', 3, 'yichun');
INSERT INTO `codec2i_region_conf` VALUES (243, 17, '鹰潭', 3, 'yingtan');
INSERT INTO `codec2i_region_conf` VALUES (244, 18, '沈阳', 3, 'shenyang');
INSERT INTO `codec2i_region_conf` VALUES (245, 18, '大连', 3, 'dalian');
INSERT INTO `codec2i_region_conf` VALUES (246, 18, '鞍山', 3, 'anshan');
INSERT INTO `codec2i_region_conf` VALUES (247, 18, '本溪', 3, 'benxi');
INSERT INTO `codec2i_region_conf` VALUES (248, 18, '朝阳', 3, 'chaoyang');
INSERT INTO `codec2i_region_conf` VALUES (249, 18, '丹东', 3, 'dandong');
INSERT INTO `codec2i_region_conf` VALUES (250, 18, '抚顺', 3, 'fushun');
INSERT INTO `codec2i_region_conf` VALUES (251, 18, '阜新', 3, 'fuxin');
INSERT INTO `codec2i_region_conf` VALUES (252, 18, '葫芦岛', 3, 'huludao');
INSERT INTO `codec2i_region_conf` VALUES (253, 18, '锦州', 3, 'jinzhou');
INSERT INTO `codec2i_region_conf` VALUES (254, 18, '辽阳', 3, 'liaoyang');
INSERT INTO `codec2i_region_conf` VALUES (255, 18, '盘锦', 3, 'panjin');
INSERT INTO `codec2i_region_conf` VALUES (256, 18, '铁岭', 3, 'tieling');
INSERT INTO `codec2i_region_conf` VALUES (257, 18, '营口', 3, 'yingkou');
INSERT INTO `codec2i_region_conf` VALUES (258, 19, '呼和浩特', 3, 'huhehaote');
INSERT INTO `codec2i_region_conf` VALUES (259, 19, '阿拉善盟', 3, 'alashanmeng');
INSERT INTO `codec2i_region_conf` VALUES (260, 19, '巴彦淖尔盟', 3, 'bayannaoermeng');
INSERT INTO `codec2i_region_conf` VALUES (261, 19, '包头', 3, 'baotou');
INSERT INTO `codec2i_region_conf` VALUES (262, 19, '赤峰', 3, 'chifeng');
INSERT INTO `codec2i_region_conf` VALUES (263, 19, '鄂尔多斯', 3, 'eerduosi');
INSERT INTO `codec2i_region_conf` VALUES (264, 19, '呼伦贝尔', 3, 'hulunbeier');
INSERT INTO `codec2i_region_conf` VALUES (265, 19, '通辽', 3, 'tongliao');
INSERT INTO `codec2i_region_conf` VALUES (266, 19, '乌海', 3, 'wuhai');
INSERT INTO `codec2i_region_conf` VALUES (267, 19, '乌兰察布市', 3, 'wulanchabushi');
INSERT INTO `codec2i_region_conf` VALUES (268, 19, '锡林郭勒盟', 3, 'xilinguolemeng');
INSERT INTO `codec2i_region_conf` VALUES (269, 19, '兴安盟', 3, 'xinganmeng');
INSERT INTO `codec2i_region_conf` VALUES (270, 20, '银川', 3, 'yinchuan');
INSERT INTO `codec2i_region_conf` VALUES (271, 20, '固原', 3, 'guyuan');
INSERT INTO `codec2i_region_conf` VALUES (272, 20, '石嘴山', 3, 'shizuishan');
INSERT INTO `codec2i_region_conf` VALUES (273, 20, '吴忠', 3, 'wuzhong');
INSERT INTO `codec2i_region_conf` VALUES (274, 20, '中卫', 3, 'zhongwei');
INSERT INTO `codec2i_region_conf` VALUES (275, 21, '西宁', 3, 'xining');
INSERT INTO `codec2i_region_conf` VALUES (276, 21, '果洛', 3, 'guoluo');
INSERT INTO `codec2i_region_conf` VALUES (277, 21, '海北', 3, 'haibei');
INSERT INTO `codec2i_region_conf` VALUES (278, 21, '海东', 3, 'haidong');
INSERT INTO `codec2i_region_conf` VALUES (279, 21, '海南', 3, 'hainan');
INSERT INTO `codec2i_region_conf` VALUES (280, 21, '海西', 3, 'haixi');
INSERT INTO `codec2i_region_conf` VALUES (281, 21, '黄南', 3, 'huangnan');
INSERT INTO `codec2i_region_conf` VALUES (282, 21, '玉树', 3, 'yushu');
INSERT INTO `codec2i_region_conf` VALUES (283, 22, '济南', 3, 'jinan');
INSERT INTO `codec2i_region_conf` VALUES (284, 22, '青岛', 3, 'qingdao');
INSERT INTO `codec2i_region_conf` VALUES (285, 22, '滨州', 3, 'binzhou');
INSERT INTO `codec2i_region_conf` VALUES (286, 22, '德州', 3, 'dezhou');
INSERT INTO `codec2i_region_conf` VALUES (287, 22, '东营', 3, 'dongying');
INSERT INTO `codec2i_region_conf` VALUES (288, 22, '菏泽', 3, 'heze');
INSERT INTO `codec2i_region_conf` VALUES (289, 22, '济宁', 3, 'jining');
INSERT INTO `codec2i_region_conf` VALUES (290, 22, '莱芜', 3, 'laiwu');
INSERT INTO `codec2i_region_conf` VALUES (291, 22, '聊城', 3, 'liaocheng');
INSERT INTO `codec2i_region_conf` VALUES (292, 22, '临沂', 3, 'linyi');
INSERT INTO `codec2i_region_conf` VALUES (293, 22, '日照', 3, 'rizhao');
INSERT INTO `codec2i_region_conf` VALUES (294, 22, '泰安', 3, 'taian');
INSERT INTO `codec2i_region_conf` VALUES (295, 22, '威海', 3, 'weihai');
INSERT INTO `codec2i_region_conf` VALUES (296, 22, '潍坊', 3, 'weifang');
INSERT INTO `codec2i_region_conf` VALUES (297, 22, '烟台', 3, 'yantai');
INSERT INTO `codec2i_region_conf` VALUES (298, 22, '枣庄', 3, 'zaozhuang');
INSERT INTO `codec2i_region_conf` VALUES (299, 22, '淄博', 3, 'zibo');
INSERT INTO `codec2i_region_conf` VALUES (300, 23, '太原', 3, 'taiyuan');
INSERT INTO `codec2i_region_conf` VALUES (301, 23, '长治', 3, 'changzhi');
INSERT INTO `codec2i_region_conf` VALUES (302, 23, '大同', 3, 'datong');
INSERT INTO `codec2i_region_conf` VALUES (303, 23, '晋城', 3, 'jincheng');
INSERT INTO `codec2i_region_conf` VALUES (304, 23, '晋中', 3, 'jinzhong');
INSERT INTO `codec2i_region_conf` VALUES (305, 23, '临汾', 3, 'linfen');
INSERT INTO `codec2i_region_conf` VALUES (306, 23, '吕梁', 3, 'lvliang');
INSERT INTO `codec2i_region_conf` VALUES (307, 23, '朔州', 3, 'shuozhou');
INSERT INTO `codec2i_region_conf` VALUES (308, 23, '忻州', 3, 'xinzhou');
INSERT INTO `codec2i_region_conf` VALUES (309, 23, '阳泉', 3, 'yangquan');
INSERT INTO `codec2i_region_conf` VALUES (310, 23, '运城', 3, 'yuncheng');
INSERT INTO `codec2i_region_conf` VALUES (311, 24, '西安', 3, 'xian');
INSERT INTO `codec2i_region_conf` VALUES (312, 24, '安康', 3, 'ankang');
INSERT INTO `codec2i_region_conf` VALUES (313, 24, '宝鸡', 3, 'baoji');
INSERT INTO `codec2i_region_conf` VALUES (314, 24, '汉中', 3, 'hanzhong');
INSERT INTO `codec2i_region_conf` VALUES (315, 24, '商洛', 3, 'shangluo');
INSERT INTO `codec2i_region_conf` VALUES (316, 24, '铜川', 3, 'tongchuan');
INSERT INTO `codec2i_region_conf` VALUES (317, 24, '渭南', 3, 'weinan');
INSERT INTO `codec2i_region_conf` VALUES (318, 24, '咸阳', 3, 'xianyang');
INSERT INTO `codec2i_region_conf` VALUES (319, 24, '延安', 3, 'yanan');
INSERT INTO `codec2i_region_conf` VALUES (320, 24, '榆林', 3, 'yulin');
INSERT INTO `codec2i_region_conf` VALUES (321, 25, '上海', 2, 'shanghai');
INSERT INTO `codec2i_region_conf` VALUES (322, 26, '成都', 3, 'chengdu');
INSERT INTO `codec2i_region_conf` VALUES (323, 26, '绵阳', 3, 'mianyang');
INSERT INTO `codec2i_region_conf` VALUES (324, 26, '阿坝', 3, 'aba');
INSERT INTO `codec2i_region_conf` VALUES (325, 26, '巴中', 3, 'bazhong');
INSERT INTO `codec2i_region_conf` VALUES (326, 26, '达州', 3, 'dazhou');
INSERT INTO `codec2i_region_conf` VALUES (327, 26, '德阳', 3, 'deyang');
INSERT INTO `codec2i_region_conf` VALUES (328, 26, '甘孜', 3, 'ganzi');
INSERT INTO `codec2i_region_conf` VALUES (329, 26, '广安', 3, 'guangan');
INSERT INTO `codec2i_region_conf` VALUES (330, 26, '广元', 3, 'guangyuan');
INSERT INTO `codec2i_region_conf` VALUES (331, 26, '乐山', 3, 'leshan');
INSERT INTO `codec2i_region_conf` VALUES (332, 26, '凉山', 3, 'liangshan');
INSERT INTO `codec2i_region_conf` VALUES (333, 26, '眉山', 3, 'meishan');
INSERT INTO `codec2i_region_conf` VALUES (334, 26, '南充', 3, 'nanchong');
INSERT INTO `codec2i_region_conf` VALUES (335, 26, '内江', 3, 'neijiang');
INSERT INTO `codec2i_region_conf` VALUES (336, 26, '攀枝花', 3, 'panzhihua');
INSERT INTO `codec2i_region_conf` VALUES (337, 26, '遂宁', 3, 'suining');
INSERT INTO `codec2i_region_conf` VALUES (338, 26, '雅安', 3, 'yaan');
INSERT INTO `codec2i_region_conf` VALUES (339, 26, '宜宾', 3, 'yibin');
INSERT INTO `codec2i_region_conf` VALUES (340, 26, '资阳', 3, 'ziyang');
INSERT INTO `codec2i_region_conf` VALUES (341, 26, '自贡', 3, 'zigong');
INSERT INTO `codec2i_region_conf` VALUES (342, 26, '泸州', 3, 'zhou');
INSERT INTO `codec2i_region_conf` VALUES (343, 27, '天津', 2, 'tianjin');
INSERT INTO `codec2i_region_conf` VALUES (344, 28, '拉萨', 3, 'lasa');
INSERT INTO `codec2i_region_conf` VALUES (345, 28, '阿里', 3, 'ali');
INSERT INTO `codec2i_region_conf` VALUES (346, 28, '昌都', 3, 'changdu');
INSERT INTO `codec2i_region_conf` VALUES (347, 28, '林芝', 3, 'linzhi');
INSERT INTO `codec2i_region_conf` VALUES (348, 28, '那曲', 3, 'naqu');
INSERT INTO `codec2i_region_conf` VALUES (349, 28, '日喀则', 3, 'rikaze');
INSERT INTO `codec2i_region_conf` VALUES (350, 28, '山南', 3, 'shannan');
INSERT INTO `codec2i_region_conf` VALUES (351, 29, '乌鲁木齐', 3, 'wulumuqi');
INSERT INTO `codec2i_region_conf` VALUES (352, 29, '阿克苏', 3, 'akesu');
INSERT INTO `codec2i_region_conf` VALUES (353, 29, '阿拉尔', 3, 'alaer');
INSERT INTO `codec2i_region_conf` VALUES (354, 29, '巴音郭楞', 3, 'bayinguoleng');
INSERT INTO `codec2i_region_conf` VALUES (355, 29, '博尔塔拉', 3, 'boertala');
INSERT INTO `codec2i_region_conf` VALUES (356, 29, '昌吉', 3, 'changji');
INSERT INTO `codec2i_region_conf` VALUES (357, 29, '哈密', 3, 'hami');
INSERT INTO `codec2i_region_conf` VALUES (358, 29, '和田', 3, 'hetian');
INSERT INTO `codec2i_region_conf` VALUES (359, 29, '喀什', 3, 'kashi');
INSERT INTO `codec2i_region_conf` VALUES (360, 29, '克拉玛依', 3, 'kelamayi');
INSERT INTO `codec2i_region_conf` VALUES (361, 29, '克孜勒苏', 3, 'kezilesu');
INSERT INTO `codec2i_region_conf` VALUES (362, 29, '石河子', 3, 'shihezi');
INSERT INTO `codec2i_region_conf` VALUES (363, 29, '图木舒克', 3, 'tumushuke');
INSERT INTO `codec2i_region_conf` VALUES (364, 29, '吐鲁番', 3, 'tulufan');
INSERT INTO `codec2i_region_conf` VALUES (365, 29, '五家渠', 3, 'wujiaqu');
INSERT INTO `codec2i_region_conf` VALUES (366, 29, '伊犁', 3, 'yili');
INSERT INTO `codec2i_region_conf` VALUES (367, 30, '昆明', 3, 'kunming');
INSERT INTO `codec2i_region_conf` VALUES (368, 30, '怒江', 3, 'nujiang');
INSERT INTO `codec2i_region_conf` VALUES (369, 30, '普洱', 3, 'puer');
INSERT INTO `codec2i_region_conf` VALUES (370, 30, '丽江', 3, 'lijiang');
INSERT INTO `codec2i_region_conf` VALUES (371, 30, '保山', 3, 'baoshan');
INSERT INTO `codec2i_region_conf` VALUES (372, 30, '楚雄', 3, 'chuxiong');
INSERT INTO `codec2i_region_conf` VALUES (373, 30, '大理', 3, 'dali');
INSERT INTO `codec2i_region_conf` VALUES (374, 30, '德宏', 3, 'dehong');
INSERT INTO `codec2i_region_conf` VALUES (375, 30, '迪庆', 3, 'diqing');
INSERT INTO `codec2i_region_conf` VALUES (376, 30, '红河', 3, 'honghe');
INSERT INTO `codec2i_region_conf` VALUES (377, 30, '临沧', 3, 'lincang');
INSERT INTO `codec2i_region_conf` VALUES (378, 30, '曲靖', 3, 'qujing');
INSERT INTO `codec2i_region_conf` VALUES (379, 30, '文山', 3, 'wenshan');
INSERT INTO `codec2i_region_conf` VALUES (380, 30, '西双版纳', 3, 'xishuangbanna');
INSERT INTO `codec2i_region_conf` VALUES (381, 30, '玉溪', 3, 'yuxi');
INSERT INTO `codec2i_region_conf` VALUES (382, 30, '昭通', 3, 'zhaotong');
INSERT INTO `codec2i_region_conf` VALUES (383, 31, '杭州', 3, 'hangzhou');
INSERT INTO `codec2i_region_conf` VALUES (384, 31, '湖州', 3, 'huzhou');
INSERT INTO `codec2i_region_conf` VALUES (385, 31, '嘉兴', 3, 'jiaxing');
INSERT INTO `codec2i_region_conf` VALUES (386, 31, '金华', 3, 'jinhua');
INSERT INTO `codec2i_region_conf` VALUES (387, 31, '丽水', 3, 'lishui');
INSERT INTO `codec2i_region_conf` VALUES (388, 31, '宁波', 3, 'ningbo');
INSERT INTO `codec2i_region_conf` VALUES (389, 31, '绍兴', 3, 'shaoxing');
INSERT INTO `codec2i_region_conf` VALUES (390, 31, '台州', 3, 'taizhou');
INSERT INTO `codec2i_region_conf` VALUES (391, 31, '温州', 3, 'wenzhou');
INSERT INTO `codec2i_region_conf` VALUES (392, 31, '舟山', 3, 'zhoushan');
INSERT INTO `codec2i_region_conf` VALUES (393, 31, '衢州', 3, 'zhou');
INSERT INTO `codec2i_region_conf` VALUES (394, 32, '重庆', 2, 'zhongqing');
INSERT INTO `codec2i_region_conf` VALUES (395, 33, '香港', 2, 'xianggang');
INSERT INTO `codec2i_region_conf` VALUES (396, 34, '澳门', 2, 'aomen');
INSERT INTO `codec2i_region_conf` VALUES (397, 35, '台湾', 2, 'taiwan');
INSERT INTO `codec2i_region_conf` VALUES (500, 52, '东城区', 3, 'dongchengqu');
INSERT INTO `codec2i_region_conf` VALUES (501, 52, '西城区', 3, 'xichengqu');
INSERT INTO `codec2i_region_conf` VALUES (502, 52, '海淀区', 3, 'haidianqu');
INSERT INTO `codec2i_region_conf` VALUES (503, 52, '朝阳区', 3, 'chaoyangqu');
INSERT INTO `codec2i_region_conf` VALUES (504, 52, '崇文区', 3, 'chongwenqu');
INSERT INTO `codec2i_region_conf` VALUES (505, 52, '宣武区', 3, 'xuanwuqu');
INSERT INTO `codec2i_region_conf` VALUES (506, 52, '丰台区', 3, 'fengtaiqu');
INSERT INTO `codec2i_region_conf` VALUES (507, 52, '石景山区', 3, 'shijingshanqu');
INSERT INTO `codec2i_region_conf` VALUES (508, 52, '房山区', 3, 'fangshanqu');
INSERT INTO `codec2i_region_conf` VALUES (509, 52, '门头沟区', 3, 'mentougouqu');
INSERT INTO `codec2i_region_conf` VALUES (510, 52, '通州区', 3, 'tongzhouqu');
INSERT INTO `codec2i_region_conf` VALUES (511, 52, '顺义区', 3, 'shunyiqu');
INSERT INTO `codec2i_region_conf` VALUES (512, 52, '昌平区', 3, 'changpingqu');
INSERT INTO `codec2i_region_conf` VALUES (513, 52, '怀柔区', 3, 'huairouqu');
INSERT INTO `codec2i_region_conf` VALUES (514, 52, '平谷区', 3, 'pingguqu');
INSERT INTO `codec2i_region_conf` VALUES (515, 52, '大兴区', 3, 'daxingqu');
INSERT INTO `codec2i_region_conf` VALUES (516, 52, '密云县', 3, 'miyunxian');
INSERT INTO `codec2i_region_conf` VALUES (517, 52, '延庆县', 3, 'yanqingxian');
INSERT INTO `codec2i_region_conf` VALUES (2703, 321, '长宁区', 3, 'changningqu');
INSERT INTO `codec2i_region_conf` VALUES (2704, 321, '闸北区', 3, 'zhabeiqu');
INSERT INTO `codec2i_region_conf` VALUES (2705, 321, '闵行区', 3, 'xingqu');
INSERT INTO `codec2i_region_conf` VALUES (2706, 321, '徐汇区', 3, 'xuhuiqu');
INSERT INTO `codec2i_region_conf` VALUES (2707, 321, '浦东新区', 3, 'pudongxinqu');
INSERT INTO `codec2i_region_conf` VALUES (2708, 321, '杨浦区', 3, 'yangpuqu');
INSERT INTO `codec2i_region_conf` VALUES (2709, 321, '普陀区', 3, 'putuoqu');
INSERT INTO `codec2i_region_conf` VALUES (2710, 321, '静安区', 3, 'jinganqu');
INSERT INTO `codec2i_region_conf` VALUES (2711, 321, '卢湾区', 3, 'luwanqu');
INSERT INTO `codec2i_region_conf` VALUES (2712, 321, '虹口区', 3, 'hongkouqu');
INSERT INTO `codec2i_region_conf` VALUES (2713, 321, '黄浦区', 3, 'huangpuqu');
INSERT INTO `codec2i_region_conf` VALUES (2714, 321, '南汇区', 3, 'nanhuiqu');
INSERT INTO `codec2i_region_conf` VALUES (2715, 321, '松江区', 3, 'songjiangqu');
INSERT INTO `codec2i_region_conf` VALUES (2716, 321, '嘉定区', 3, 'jiadingqu');
INSERT INTO `codec2i_region_conf` VALUES (2717, 321, '宝山区', 3, 'baoshanqu');
INSERT INTO `codec2i_region_conf` VALUES (2718, 321, '青浦区', 3, 'qingpuqu');
INSERT INTO `codec2i_region_conf` VALUES (2719, 321, '金山区', 3, 'jinshanqu');
INSERT INTO `codec2i_region_conf` VALUES (2720, 321, '奉贤区', 3, 'fengxianqu');
INSERT INTO `codec2i_region_conf` VALUES (2721, 321, '崇明县', 3, 'chongmingxian');
INSERT INTO `codec2i_region_conf` VALUES (2912, 343, '和平区', 3, 'hepingqu');
INSERT INTO `codec2i_region_conf` VALUES (2913, 343, '河西区', 3, 'hexiqu');
INSERT INTO `codec2i_region_conf` VALUES (2914, 343, '南开区', 3, 'nankaiqu');
INSERT INTO `codec2i_region_conf` VALUES (2915, 343, '河北区', 3, 'hebeiqu');
INSERT INTO `codec2i_region_conf` VALUES (2916, 343, '河东区', 3, 'hedongqu');
INSERT INTO `codec2i_region_conf` VALUES (2917, 343, '红桥区', 3, 'hongqiaoqu');
INSERT INTO `codec2i_region_conf` VALUES (2918, 343, '东丽区', 3, 'dongliqu');
INSERT INTO `codec2i_region_conf` VALUES (2919, 343, '津南区', 3, 'jinnanqu');
INSERT INTO `codec2i_region_conf` VALUES (2920, 343, '西青区', 3, 'xiqingqu');
INSERT INTO `codec2i_region_conf` VALUES (2921, 343, '北辰区', 3, 'beichenqu');
INSERT INTO `codec2i_region_conf` VALUES (2922, 343, '塘沽区', 3, 'tangguqu');
INSERT INTO `codec2i_region_conf` VALUES (2923, 343, '汉沽区', 3, 'hanguqu');
INSERT INTO `codec2i_region_conf` VALUES (2924, 343, '大港区', 3, 'dagangqu');
INSERT INTO `codec2i_region_conf` VALUES (2925, 343, '武清区', 3, 'wuqingqu');
INSERT INTO `codec2i_region_conf` VALUES (2926, 343, '宝坻区', 3, 'baoqu');
INSERT INTO `codec2i_region_conf` VALUES (2927, 343, '经济开发区', 3, 'jingjikaifaqu');
INSERT INTO `codec2i_region_conf` VALUES (2928, 343, '宁河县', 3, 'ninghexian');
INSERT INTO `codec2i_region_conf` VALUES (2929, 343, '静海县', 3, 'jinghaixian');
INSERT INTO `codec2i_region_conf` VALUES (2930, 343, '蓟县', 3, 'jixian');
INSERT INTO `codec2i_region_conf` VALUES (3325, 394, '合川区', 3, 'hechuanqu');
INSERT INTO `codec2i_region_conf` VALUES (3326, 394, '江津区', 3, 'jiangjinqu');
INSERT INTO `codec2i_region_conf` VALUES (3327, 394, '南川区', 3, 'nanchuanqu');
INSERT INTO `codec2i_region_conf` VALUES (3328, 394, '永川区', 3, 'yongchuanqu');
INSERT INTO `codec2i_region_conf` VALUES (3329, 394, '南岸区', 3, 'nananqu');
INSERT INTO `codec2i_region_conf` VALUES (3330, 394, '渝北区', 3, 'yubeiqu');
INSERT INTO `codec2i_region_conf` VALUES (3331, 394, '万盛区', 3, 'wanshengqu');
INSERT INTO `codec2i_region_conf` VALUES (3332, 394, '大渡口区', 3, 'dadukouqu');
INSERT INTO `codec2i_region_conf` VALUES (3333, 394, '万州区', 3, 'wanzhouqu');
INSERT INTO `codec2i_region_conf` VALUES (3334, 394, '北碚区', 3, 'beiqu');
INSERT INTO `codec2i_region_conf` VALUES (3335, 394, '沙坪坝区', 3, 'shapingbaqu');
INSERT INTO `codec2i_region_conf` VALUES (3336, 394, '巴南区', 3, 'bananqu');
INSERT INTO `codec2i_region_conf` VALUES (3337, 394, '涪陵区', 3, 'fulingqu');
INSERT INTO `codec2i_region_conf` VALUES (3338, 394, '江北区', 3, 'jiangbeiqu');
INSERT INTO `codec2i_region_conf` VALUES (3339, 394, '九龙坡区', 3, 'jiulongpoqu');
INSERT INTO `codec2i_region_conf` VALUES (3340, 394, '渝中区', 3, 'yuzhongqu');
INSERT INTO `codec2i_region_conf` VALUES (3341, 394, '黔江开发区', 3, 'qianjiangkaifaqu');
INSERT INTO `codec2i_region_conf` VALUES (3342, 394, '长寿区', 3, 'changshouqu');
INSERT INTO `codec2i_region_conf` VALUES (3343, 394, '双桥区', 3, 'shuangqiaoqu');
INSERT INTO `codec2i_region_conf` VALUES (3344, 394, '綦江县', 3, 'jiangxian');
INSERT INTO `codec2i_region_conf` VALUES (3345, 394, '潼南县', 3, 'nanxian');
INSERT INTO `codec2i_region_conf` VALUES (3346, 394, '铜梁县', 3, 'tongliangxian');
INSERT INTO `codec2i_region_conf` VALUES (3347, 394, '大足县', 3, 'dazuxian');
INSERT INTO `codec2i_region_conf` VALUES (3348, 394, '荣昌县', 3, 'rongchangxian');
INSERT INTO `codec2i_region_conf` VALUES (3349, 394, '璧山县', 3, 'shanxian');
INSERT INTO `codec2i_region_conf` VALUES (3350, 394, '垫江县', 3, 'dianjiangxian');
INSERT INTO `codec2i_region_conf` VALUES (3351, 394, '武隆县', 3, 'wulongxian');
INSERT INTO `codec2i_region_conf` VALUES (3352, 394, '丰都县', 3, 'fengduxian');
INSERT INTO `codec2i_region_conf` VALUES (3353, 394, '城口县', 3, 'chengkouxian');
INSERT INTO `codec2i_region_conf` VALUES (3354, 394, '梁平县', 3, 'liangpingxian');
INSERT INTO `codec2i_region_conf` VALUES (3355, 394, '开县', 3, 'kaixian');
INSERT INTO `codec2i_region_conf` VALUES (3356, 394, '巫溪县', 3, 'wuxixian');
INSERT INTO `codec2i_region_conf` VALUES (3357, 394, '巫山县', 3, 'wushanxian');
INSERT INTO `codec2i_region_conf` VALUES (3358, 394, '奉节县', 3, 'fengjiexian');
INSERT INTO `codec2i_region_conf` VALUES (3359, 394, '云阳县', 3, 'yunyangxian');
INSERT INTO `codec2i_region_conf` VALUES (3360, 394, '忠县', 3, 'zhongxian');
INSERT INTO `codec2i_region_conf` VALUES (3361, 394, '石柱', 3, 'shizhu');
INSERT INTO `codec2i_region_conf` VALUES (3362, 394, '彭水', 3, 'pengshui');
INSERT INTO `codec2i_region_conf` VALUES (3363, 394, '酉阳', 3, 'youyang');
INSERT INTO `codec2i_region_conf` VALUES (3364, 394, '秀山', 3, 'xiushan');
INSERT INTO `codec2i_region_conf` VALUES (3365, 395, '沙田区', 3, 'shatianqu');
INSERT INTO `codec2i_region_conf` VALUES (3366, 395, '东区', 3, 'dongqu');
INSERT INTO `codec2i_region_conf` VALUES (3367, 395, '观塘区', 3, 'guantangqu');
INSERT INTO `codec2i_region_conf` VALUES (3368, 395, '黄大仙区', 3, 'huangdaxianqu');
INSERT INTO `codec2i_region_conf` VALUES (3369, 395, '九龙城区', 3, 'jiulongchengqu');
INSERT INTO `codec2i_region_conf` VALUES (3370, 395, '屯门区', 3, 'tunmenqu');
INSERT INTO `codec2i_region_conf` VALUES (3371, 395, '葵青区', 3, 'kuiqingqu');
INSERT INTO `codec2i_region_conf` VALUES (3372, 395, '元朗区', 3, 'yuanlangqu');
INSERT INTO `codec2i_region_conf` VALUES (3373, 395, '深水埗区', 3, 'shenshui');
INSERT INTO `codec2i_region_conf` VALUES (3374, 395, '西贡区', 3, 'xigongqu');
INSERT INTO `codec2i_region_conf` VALUES (3375, 395, '大埔区', 3, 'dapuqu');
INSERT INTO `codec2i_region_conf` VALUES (3376, 395, '湾仔区', 3, 'wanziqu');
INSERT INTO `codec2i_region_conf` VALUES (3377, 395, '油尖旺区', 3, 'youjianwangqu');
INSERT INTO `codec2i_region_conf` VALUES (3378, 395, '北区', 3, 'beiqu');
INSERT INTO `codec2i_region_conf` VALUES (3379, 395, '南区', 3, 'nanqu');
INSERT INTO `codec2i_region_conf` VALUES (3380, 395, '荃湾区', 3, 'wanqu');
INSERT INTO `codec2i_region_conf` VALUES (3381, 395, '中西区', 3, 'zhongxiqu');
INSERT INTO `codec2i_region_conf` VALUES (3382, 395, '离岛区', 3, 'lidaoqu');
INSERT INTO `codec2i_region_conf` VALUES (3383, 396, '澳门', 3, 'aomen');
INSERT INTO `codec2i_region_conf` VALUES (3384, 397, '台北', 3, 'taibei');
INSERT INTO `codec2i_region_conf` VALUES (3385, 397, '高雄', 3, 'gaoxiong');
INSERT INTO `codec2i_region_conf` VALUES (3386, 397, '基隆', 3, 'jilong');
INSERT INTO `codec2i_region_conf` VALUES (3387, 397, '台中', 3, 'taizhong');
INSERT INTO `codec2i_region_conf` VALUES (3388, 397, '台南', 3, 'tainan');
INSERT INTO `codec2i_region_conf` VALUES (3389, 397, '新竹', 3, 'xinzhu');
INSERT INTO `codec2i_region_conf` VALUES (3390, 397, '嘉义', 3, 'jiayi');
INSERT INTO `codec2i_region_conf` VALUES (3391, 397, '宜兰县', 3, 'yilanxian');
INSERT INTO `codec2i_region_conf` VALUES (3392, 397, '桃园县', 3, 'taoyuanxian');
INSERT INTO `codec2i_region_conf` VALUES (3393, 397, '苗栗县', 3, 'miaolixian');
INSERT INTO `codec2i_region_conf` VALUES (3394, 397, '彰化县', 3, 'zhanghuaxian');
INSERT INTO `codec2i_region_conf` VALUES (3395, 397, '南投县', 3, 'nantouxian');
INSERT INTO `codec2i_region_conf` VALUES (3396, 397, '云林县', 3, 'yunlinxian');
INSERT INTO `codec2i_region_conf` VALUES (3397, 397, '屏东县', 3, 'pingdongxian');
INSERT INTO `codec2i_region_conf` VALUES (3398, 397, '台东县', 3, 'taidongxian');
INSERT INTO `codec2i_region_conf` VALUES (3399, 397, '花莲县', 3, 'hualianxian');
INSERT INTO `codec2i_region_conf` VALUES (3400, 397, '澎湖县', 3, 'penghuxian');

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_role`
-- 

CREATE TABLE `codec2i_role` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- 导出表中的数据 `codec2i_role`
-- 

INSERT INTO `codec2i_role` VALUES (4, '测试管理员', 1, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_role_access`
-- 

CREATE TABLE `codec2i_role_access` (
  `id` int(11) NOT NULL auto_increment,
  `role_id` int(11) NOT NULL,
  `node_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `codec2i_role_access`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_role_group`
-- 

CREATE TABLE `codec2i_role_group` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `nav_id` int(11) NOT NULL COMMENT '后台导航分组ID',
  `is_delete` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

-- 
-- 导出表中的数据 `codec2i_role_group`
-- 

INSERT INTO `codec2i_role_group` VALUES (1, '首页', 1, 0, 1, 1);
INSERT INTO `codec2i_role_group` VALUES (5, '系统设置', 3, 0, 1, 1);
INSERT INTO `codec2i_role_group` VALUES (7, '管理员', 3, 0, 1, 2);
INSERT INTO `codec2i_role_group` VALUES (8, '数据库操作', 3, 0, 1, 6);
INSERT INTO `codec2i_role_group` VALUES (9, '系统日志', 3, 0, 1, 7);
INSERT INTO `codec2i_role_group` VALUES (19, '菜单设置', 3, 0, 1, 17);
INSERT INTO `codec2i_role_group` VALUES (28, '邮件管理', 10, 0, 1, 26);
INSERT INTO `codec2i_role_group` VALUES (29, '短信管理', 10, 0, 1, 27);
INSERT INTO `codec2i_role_group` VALUES (31, '广告设置', 3, 0, 1, 29);
INSERT INTO `codec2i_role_group` VALUES (33, '队列管理', 10, 0, 1, 31);
INSERT INTO `codec2i_role_group` VALUES (69, '会员管理', 5, 0, 1, 31);
INSERT INTO `codec2i_role_group` VALUES (70, '会员整合', 5, 0, 1, 32);
INSERT INTO `codec2i_role_group` VALUES (71, '同步登录', 5, 0, 1, 33);
INSERT INTO `codec2i_role_group` VALUES (72, '项目管理', 13, 0, 1, 33);
INSERT INTO `codec2i_role_group` VALUES (73, '项目支持', 13, 0, 1, 34);
INSERT INTO `codec2i_role_group` VALUES (74, '项目点评', 13, 0, 1, 35);
INSERT INTO `codec2i_role_group` VALUES (75, '支付接口', 14, 0, 1, 1);
INSERT INTO `codec2i_role_group` VALUES (76, '付款记录', 14, 0, 1, 2);
INSERT INTO `codec2i_role_group` VALUES (77, '消息模板', 10, 0, 1, 1);
INSERT INTO `codec2i_role_group` VALUES (78, '提现记录', 14, 0, 1, 3);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_role_module`
-- 

CREATE TABLE `codec2i_role_module` (
  `id` int(11) NOT NULL auto_increment,
  `module` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=127 ;

-- 
-- 导出表中的数据 `codec2i_role_module`
-- 

INSERT INTO `codec2i_role_module` VALUES (5, 'Role', '权限组别', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (6, 'Admin', '管理员', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (12, 'Conf', '系统配置', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (13, 'Database', '数据库', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (15, 'Log', '系统日志', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (19, 'File', '文件管理', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (58, 'Index', '首页', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (36, 'Nav', '导航菜单', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (47, 'MailServer', '邮件服务器', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (48, 'Sms', '短信接口', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (53, 'Adv', '广告模块', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (56, 'DealMsgList', '业务群发队列', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (92, 'Cache', '缓存处理', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (113, 'User', '会员管理', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (114, 'MsgTemplate', '消息模板管理', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (115, 'Integrate', '会员整合', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (116, 'ApiLogin', '同步登录', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (117, 'DealCate', '项目分类', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (118, 'Deal', '项目管理', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (119, 'Payment', '支付接口', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (120, 'IndexImage', '轮播广告图', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (121, 'Help', '站点帮助', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (122, 'Faq', '常见问题', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (123, 'DealOrder', '项目支持', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (124, 'DealComment', '项目点评', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (125, 'PaymentNotice', '付款记录', 1, 0);
INSERT INTO `codec2i_role_module` VALUES (126, 'UserRefund', '用户提现', 1, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_role_nav`
-- 

CREATE TABLE `codec2i_role_nav` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- 导出表中的数据 `codec2i_role_nav`
-- 

INSERT INTO `codec2i_role_nav` VALUES (1, '首页', 0, 1, 1);
INSERT INTO `codec2i_role_nav` VALUES (3, '系统设置', 0, 1, 10);
INSERT INTO `codec2i_role_nav` VALUES (5, '会员管理', 0, 1, 3);
INSERT INTO `codec2i_role_nav` VALUES (10, '短信邮件', 0, 1, 7);
INSERT INTO `codec2i_role_nav` VALUES (13, '项目管理', 0, 1, 4);
INSERT INTO `codec2i_role_nav` VALUES (14, '支付管理', 0, 1, 5);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_role_node`
-- 

CREATE TABLE `codec2i_role_node` (
  `id` int(11) NOT NULL auto_increment,
  `action` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `group_id` int(11) NOT NULL COMMENT '后台分组菜单分组ID',
  `module_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=667 ;

-- 
-- 导出表中的数据 `codec2i_role_node`
-- 

INSERT INTO `codec2i_role_node` VALUES (334, 'main', '首页', 1, 0, 1, 58);
INSERT INTO `codec2i_role_node` VALUES (11, 'index', '管理员分组列表', 1, 0, 7, 5);
INSERT INTO `codec2i_role_node` VALUES (13, 'trash', '管理员分组回收站', 1, 0, 7, 5);
INSERT INTO `codec2i_role_node` VALUES (14, 'index', '管理员列表', 1, 0, 7, 6);
INSERT INTO `codec2i_role_node` VALUES (15, 'trash', '管理员回收站', 1, 0, 7, 6);
INSERT INTO `codec2i_role_node` VALUES (16, 'index', '系统配置', 1, 0, 5, 12);
INSERT INTO `codec2i_role_node` VALUES (17, 'index', '数据库备份列表', 1, 0, 8, 13);
INSERT INTO `codec2i_role_node` VALUES (18, 'sql', 'SQL操作', 1, 0, 8, 13);
INSERT INTO `codec2i_role_node` VALUES (19, 'index', '系统日志列表', 1, 0, 9, 15);
INSERT INTO `codec2i_role_node` VALUES (24, 'do_upload', '编辑器图片上传', 1, 0, 0, 19);
INSERT INTO `codec2i_role_node` VALUES (43, 'index', '导航菜单列表', 1, 0, 19, 36);
INSERT INTO `codec2i_role_node` VALUES (57, 'index', '邮件服务器列表', 1, 0, 28, 47);
INSERT INTO `codec2i_role_node` VALUES (58, 'index', '短信接口列表', 1, 0, 29, 48);
INSERT INTO `codec2i_role_node` VALUES (63, 'index', '广告列表', 1, 0, 31, 53);
INSERT INTO `codec2i_role_node` VALUES (66, 'index', '业务队列列表', 1, 0, 33, 56);
INSERT INTO `codec2i_role_node` VALUES (68, 'add', '添加页面', 1, 0, 0, 6);
INSERT INTO `codec2i_role_node` VALUES (69, 'edit', '编辑页面', 1, 0, 0, 6);
INSERT INTO `codec2i_role_node` VALUES (70, 'set_effect', '设置生效', 1, 0, 0, 6);
INSERT INTO `codec2i_role_node` VALUES (71, 'add', '添加执行', 1, 0, 0, 6);
INSERT INTO `codec2i_role_node` VALUES (72, 'update', '编辑执行', 1, 0, 0, 6);
INSERT INTO `codec2i_role_node` VALUES (73, 'delete', '删除', 1, 0, 0, 6);
INSERT INTO `codec2i_role_node` VALUES (74, 'restore', '恢复', 1, 0, 0, 6);
INSERT INTO `codec2i_role_node` VALUES (75, 'foreverdelete', '永久删除', 1, 0, 0, 6);
INSERT INTO `codec2i_role_node` VALUES (76, 'set_default', '设置默认管理员', 1, 0, 0, 6);
INSERT INTO `codec2i_role_node` VALUES (77, 'add', '添加页面', 1, 0, 0, 53);
INSERT INTO `codec2i_role_node` VALUES (78, 'edit', '编辑页面', 1, 0, 0, 53);
INSERT INTO `codec2i_role_node` VALUES (79, 'update', '编辑执行', 1, 0, 0, 53);
INSERT INTO `codec2i_role_node` VALUES (80, 'foreverdelete', '永久删除', 1, 0, 0, 53);
INSERT INTO `codec2i_role_node` VALUES (81, 'set_effect', '设置生效', 1, 0, 0, 53);
INSERT INTO `codec2i_role_node` VALUES (99, 'update', '更新配置', 1, 0, 0, 12);
INSERT INTO `codec2i_role_node` VALUES (100, 'dump', '备份数据', 1, 0, 0, 13);
INSERT INTO `codec2i_role_node` VALUES (101, 'delete', '删除备份', 1, 0, 0, 13);
INSERT INTO `codec2i_role_node` VALUES (102, 'restore', '恢复备份', 1, 0, 0, 13);
INSERT INTO `codec2i_role_node` VALUES (103, 'load_file', '读取页面', 1, 0, 0, 53);
INSERT INTO `codec2i_role_node` VALUES (104, 'load_adv_id', '读取广告位', 1, 0, 0, 53);
INSERT INTO `codec2i_role_node` VALUES (105, 'execute', '执行SQL语句', 1, 0, 0, 13);
INSERT INTO `codec2i_role_node` VALUES (147, 'show_content', '显示内容', 1, 0, 0, 56);
INSERT INTO `codec2i_role_node` VALUES (148, 'send', '手动发送', 1, 0, 0, 56);
INSERT INTO `codec2i_role_node` VALUES (149, 'foreverdelete', '永久删除', 1, 0, 0, 56);
INSERT INTO `codec2i_role_node` VALUES (181, 'do_upload_img', '图片控件上传', 1, 0, 0, 19);
INSERT INTO `codec2i_role_node` VALUES (182, 'deleteImg', '删除图片', 1, 0, 0, 19);
INSERT INTO `codec2i_role_node` VALUES (198, 'foreverdelete', '永久删除', 1, 0, 0, 15);
INSERT INTO `codec2i_role_node` VALUES (205, 'add', '添加页面', 1, 0, 0, 47);
INSERT INTO `codec2i_role_node` VALUES (206, 'insert', '添加执行', 1, 0, 0, 47);
INSERT INTO `codec2i_role_node` VALUES (207, 'edit', '编辑页面', 1, 0, 0, 47);
INSERT INTO `codec2i_role_node` VALUES (208, 'update', '编辑执行', 1, 0, 0, 47);
INSERT INTO `codec2i_role_node` VALUES (209, 'set_effect', '设置生效', 1, 0, 0, 47);
INSERT INTO `codec2i_role_node` VALUES (210, 'foreverdelete', '永久删除', 1, 0, 0, 47);
INSERT INTO `codec2i_role_node` VALUES (211, 'send_demo', '发送测试邮件', 1, 0, 0, 47);
INSERT INTO `codec2i_role_node` VALUES (229, 'edit', '编辑页面', 1, 0, 0, 36);
INSERT INTO `codec2i_role_node` VALUES (230, 'update', '编辑执行', 1, 0, 0, 36);
INSERT INTO `codec2i_role_node` VALUES (231, 'set_effect', '设置生效', 1, 0, 0, 36);
INSERT INTO `codec2i_role_node` VALUES (232, 'set_sort', '排序', 1, 0, 0, 36);
INSERT INTO `codec2i_role_node` VALUES (257, 'add', '添加页面', 1, 0, 0, 5);
INSERT INTO `codec2i_role_node` VALUES (258, 'insert', '添加执行', 1, 0, 0, 5);
INSERT INTO `codec2i_role_node` VALUES (259, 'edit', '编辑页面', 1, 0, 0, 5);
INSERT INTO `codec2i_role_node` VALUES (260, 'update', '编辑执行', 1, 0, 0, 5);
INSERT INTO `codec2i_role_node` VALUES (261, 'set_effect', '设置生效', 1, 0, 0, 5);
INSERT INTO `codec2i_role_node` VALUES (262, 'delete', '删除', 1, 0, 0, 5);
INSERT INTO `codec2i_role_node` VALUES (263, 'restore', '恢复', 1, 0, 0, 5);
INSERT INTO `codec2i_role_node` VALUES (264, 'foreverdelete', '永久删除', 1, 0, 0, 5);
INSERT INTO `codec2i_role_node` VALUES (265, 'insert', '安装页面', 1, 0, 0, 48);
INSERT INTO `codec2i_role_node` VALUES (266, 'insert', '安装保存', 1, 0, 0, 48);
INSERT INTO `codec2i_role_node` VALUES (267, 'edit', '编辑页面', 1, 0, 0, 48);
INSERT INTO `codec2i_role_node` VALUES (268, 'update', '编辑执行', 1, 0, 0, 48);
INSERT INTO `codec2i_role_node` VALUES (269, 'uninstall', '卸载', 1, 0, 0, 48);
INSERT INTO `codec2i_role_node` VALUES (270, 'set_effect', '设置生效', 1, 0, 0, 48);
INSERT INTO `codec2i_role_node` VALUES (271, 'send_demo', '发送测试短信', 1, 0, 0, 48);
INSERT INTO `codec2i_role_node` VALUES (474, 'index', '缓存处理', 1, 0, 0, 92);
INSERT INTO `codec2i_role_node` VALUES (475, 'clear_parse_file', '清空脚本样式缓存', 1, 0, 0, 92);
INSERT INTO `codec2i_role_node` VALUES (477, 'clear_data', '清空数据缓存', 1, 0, 0, 92);
INSERT INTO `codec2i_role_node` VALUES (480, 'syn_data', '同步数据', 1, 0, 0, 92);
INSERT INTO `codec2i_role_node` VALUES (481, 'clear_image', '清空图片缓存', 1, 0, 0, 92);
INSERT INTO `codec2i_role_node` VALUES (482, 'clear_admin', '清空后台缓存', 1, 0, 0, 92);
INSERT INTO `codec2i_role_node` VALUES (605, 'index', '消息模板', 1, 0, 77, 114);
INSERT INTO `codec2i_role_node` VALUES (606, 'update', '更新模板', 1, 0, 0, 114);
INSERT INTO `codec2i_role_node` VALUES (607, 'index', '会员列表', 1, 0, 69, 113);
INSERT INTO `codec2i_role_node` VALUES (608, 'add', '添加会员', 1, 0, 0, 113);
INSERT INTO `codec2i_role_node` VALUES (609, 'insert', '添提执行', 1, 0, 0, 113);
INSERT INTO `codec2i_role_node` VALUES (610, 'edit', '编辑会员', 1, 0, 0, 113);
INSERT INTO `codec2i_role_node` VALUES (611, 'update', '编辑执行', 1, 0, 0, 113);
INSERT INTO `codec2i_role_node` VALUES (612, 'delete', '删除会员', 1, 0, 0, 113);
INSERT INTO `codec2i_role_node` VALUES (613, 'modify_account', '会员资金变更', 1, 0, 0, 113);
INSERT INTO `codec2i_role_node` VALUES (614, 'account_detail', '帐户日志', 1, 0, 0, 113);
INSERT INTO `codec2i_role_node` VALUES (615, 'foreverdelete_account_detail', '删除帐户日志', 1, 0, 0, 113);
INSERT INTO `codec2i_role_node` VALUES (616, 'consignee', '配送地址', 1, 0, 0, 113);
INSERT INTO `codec2i_role_node` VALUES (617, 'foreverdelete_consignee', '删除配送地址', 1, 0, 0, 113);
INSERT INTO `codec2i_role_node` VALUES (618, 'weibo', '微博列表', 1, 0, 0, 113);
INSERT INTO `codec2i_role_node` VALUES (619, 'foreverdelete_weibo', '删除微博', 1, 0, 0, 113);
INSERT INTO `codec2i_role_node` VALUES (620, 'index', '会员整合', 1, 0, 70, 115);
INSERT INTO `codec2i_role_node` VALUES (621, 'save', '执行整合', 1, 0, 0, 115);
INSERT INTO `codec2i_role_node` VALUES (622, 'uninstall', '卸载整合', 1, 0, 0, 115);
INSERT INTO `codec2i_role_node` VALUES (623, 'index', '同步登录接口', 1, 0, 71, 116);
INSERT INTO `codec2i_role_node` VALUES (624, 'insert', '安装接口', 1, 0, 0, 116);
INSERT INTO `codec2i_role_node` VALUES (625, 'update', '更新配置', 1, 0, 0, 116);
INSERT INTO `codec2i_role_node` VALUES (626, 'uninstall', '卸载接口', 1, 0, 0, 116);
INSERT INTO `codec2i_role_node` VALUES (627, 'index', '分类列表', 1, 0, 72, 117);
INSERT INTO `codec2i_role_node` VALUES (628, 'insert', '添加分类', 1, 0, 0, 117);
INSERT INTO `codec2i_role_node` VALUES (629, 'update', '更新分类', 1, 0, 0, 117);
INSERT INTO `codec2i_role_node` VALUES (630, 'foreverdelete', '删除分类', 1, 0, 0, 117);
INSERT INTO `codec2i_role_node` VALUES (631, 'online_index', '上线项目列表', 1, 0, 72, 118);
INSERT INTO `codec2i_role_node` VALUES (632, 'submit_index', '未审核项目', 1, 0, 72, 118);
INSERT INTO `codec2i_role_node` VALUES (633, 'index', '支付接口列表', 1, 0, 75, 119);
INSERT INTO `codec2i_role_node` VALUES (634, 'insert', '安装支付接口', 1, 0, 0, 119);
INSERT INTO `codec2i_role_node` VALUES (635, 'update', '更新支付接口', 1, 0, 0, 119);
INSERT INTO `codec2i_role_node` VALUES (636, 'uninstall', '卸载接口', 1, 0, 0, 119);
INSERT INTO `codec2i_role_node` VALUES (637, 'index', '轮播广告设置', 1, 0, 5, 120);
INSERT INTO `codec2i_role_node` VALUES (638, 'insert', '添加广告', 1, 0, 0, 120);
INSERT INTO `codec2i_role_node` VALUES (639, 'update', '修改广告', 1, 0, 0, 120);
INSERT INTO `codec2i_role_node` VALUES (640, 'foreverdelete', '删除广告', 1, 0, 0, 120);
INSERT INTO `codec2i_role_node` VALUES (641, 'delete_index', '回收站', 1, 0, 72, 118);
INSERT INTO `codec2i_role_node` VALUES (642, 'index', '帮助列表', 1, 0, 5, 121);
INSERT INTO `codec2i_role_node` VALUES (643, 'insert', '添加帮助', 1, 0, 0, 121);
INSERT INTO `codec2i_role_node` VALUES (644, 'update', '修改帮助', 1, 0, 0, 121);
INSERT INTO `codec2i_role_node` VALUES (645, 'foreverdelete', '删除帮助', 1, 0, 0, 121);
INSERT INTO `codec2i_role_node` VALUES (646, 'index', '常见问题', 1, 0, 5, 122);
INSERT INTO `codec2i_role_node` VALUES (647, 'insert', '添加问题', 1, 0, 0, 122);
INSERT INTO `codec2i_role_node` VALUES (648, 'update', '更新问题', 1, 0, 0, 122);
INSERT INTO `codec2i_role_node` VALUES (649, 'foreverdelete', '删除问题', 1, 0, 0, 122);
INSERT INTO `codec2i_role_node` VALUES (650, 'pay_log', '筹款发放', 1, 0, 0, 118);
INSERT INTO `codec2i_role_node` VALUES (651, 'save_pay_log', '发放', 1, 0, 0, 118);
INSERT INTO `codec2i_role_node` VALUES (652, 'del_pay_log', '删除发放', 1, 0, 0, 118);
INSERT INTO `codec2i_role_node` VALUES (653, 'deal_log', '项目日志', 1, 0, 0, 118);
INSERT INTO `codec2i_role_node` VALUES (654, 'del_deal_log', '删除日志', 1, 0, 0, 118);
INSERT INTO `codec2i_role_node` VALUES (655, 'batch_refund', '批量退款', 1, 0, 0, 118);
INSERT INTO `codec2i_role_node` VALUES (656, 'index', '项目支持', 1, 0, 73, 123);
INSERT INTO `codec2i_role_node` VALUES (657, 'view', '查看详情', 1, 0, 0, 123);
INSERT INTO `codec2i_role_node` VALUES (658, 'refund', '项目退款', 1, 0, 0, 123);
INSERT INTO `codec2i_role_node` VALUES (659, 'delete', '删除支持', 1, 0, 0, 123);
INSERT INTO `codec2i_role_node` VALUES (660, 'incharge', '项目收款', 1, 0, 0, 123);
INSERT INTO `codec2i_role_node` VALUES (661, 'index', '项目点评', 1, 0, 74, 124);
INSERT INTO `codec2i_role_node` VALUES (662, 'index', '付款记录', 1, 0, 76, 125);
INSERT INTO `codec2i_role_node` VALUES (663, 'delete', '删除记录', 1, 0, 0, 125);
INSERT INTO `codec2i_role_node` VALUES (664, 'index', '提现记录', 1, 0, 78, 126);
INSERT INTO `codec2i_role_node` VALUES (665, 'delete', '删除记录', 1, 0, 0, 126);
INSERT INTO `codec2i_role_node` VALUES (666, 'confirm', '确认提现', 1, 0, 0, 126);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_sms`
-- 

CREATE TABLE `codec2i_sms` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `server_url` text NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `config` text NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `codec2i_sms`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_user`
-- 

CREATE TABLE `codec2i_user` (
  `id` int(11) NOT NULL auto_increment,
  `user_name` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `money` double(20,4) NOT NULL,
  `login_time` int(11) NOT NULL,
  `login_ip` varchar(50) NOT NULL,
  `province` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `password_verify` varchar(255) NOT NULL COMMENT '找回密码的验证号',
  `sex` tinyint(1) NOT NULL COMMENT '性别',
  `build_count` int(11) NOT NULL COMMENT '发起的项目数',
  `support_count` int(11) NOT NULL COMMENT '支持的项目数',
  `focus_count` int(11) NOT NULL COMMENT '关注的项目数',
  `integrate_id` int(11) NOT NULL,
  `intro` text NOT NULL COMMENT '个人简介',
  `ex_real_name` varchar(255) NOT NULL COMMENT '发布者真实姓名',
  `ex_account_info` text NOT NULL COMMENT '银行帐号等信息',
  `ex_contact` text NOT NULL COMMENT '联系方式',
  `code` varchar(255) NOT NULL,
  `sina_id` varchar(255) NOT NULL,
  `sina_token` varchar(255) NOT NULL,
  `sina_secret` varchar(255) NOT NULL,
  `sina_url` varchar(255) NOT NULL,
  `tencent_id` varchar(255) NOT NULL,
  `tencent_token` varchar(255) NOT NULL,
  `tencent_secret` varchar(255) NOT NULL,
  `tencent_url` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `is_effect` (`is_effect`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- 
-- 导出表中的数据 `codec2i_user`
-- 

INSERT INTO `codec2i_user` VALUES (17, 'codec2i', '01a84a9cfa8dbf66bab23636c424759f', 1387586949, 1387586949, 1, '97139915@qq.com', 1200.0000, 1389335004, '119.4.23.80', '四川', '成都', '', 1, 2, 1, 1, 0, 'Codec2i众筹 - http://www.codec2i.net', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `codec2i_user` VALUES (18, 'lixiphp', '01a84a9cfa8dbf66bab23636c424759f', 1352229180, 1352229180, 1, 'zc@codec2i.net', 1000.0000, 1375555771, '127.0.0.1', '北京', '东城区', '', 1, 1, 4, 1, 0, '爱旅行的猫，生活在路上', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `codec2i_user` VALUES (19, 'test', '01a84a9cfa8dbf66bab23636c424759f', 1352230142, 1352230142, 1, 'test@test.com', 0.0000, 1352232937, '127.0.0.1', '广东', '江门', '', 0, 0, 10, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_user_consignee`
-- 

CREATE TABLE `codec2i_user_consignee` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `consignee` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- 
-- 导出表中的数据 `codec2i_user_consignee`
-- 

INSERT INTO `codec2i_user_consignee` VALUES (18, 18, '福建', '福州', '福建福州台江区工业路博美诗邦', '13333333333', '350000', '方维');
INSERT INTO `codec2i_user_consignee` VALUES (19, 17, '福建', '福州', '方维方维方维方维方维', '14444444444', '22222', '方维');
INSERT INTO `codec2i_user_consignee` VALUES (20, 19, '湖北', '襄樊', 'test', '13344455555', 'test', 'test');
INSERT INTO `codec2i_user_consignee` VALUES (21, 18, '贵州', '贵阳', '详细地址信息', '13212345678', '610001', '测试订单');

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_user_deal_notify`
-- 

CREATE TABLE `codec2i_user_deal_notify` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `deal_id_user_id` (`user_id`,`deal_id`),
  KEY `user_id` (`user_id`),
  KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- 
-- 导出表中的数据 `codec2i_user_deal_notify`
-- 

INSERT INTO `codec2i_user_deal_notify` VALUES (20, 18, 55, 1352229388);
INSERT INTO `codec2i_user_deal_notify` VALUES (21, 21, 61, 1388979394);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_user_log`
-- 

CREATE TABLE `codec2i_user_log` (
  `id` int(11) NOT NULL auto_increment,
  `log_info` text NOT NULL,
  `log_time` int(11) NOT NULL,
  `log_admin_id` int(11) NOT NULL,
  `money` double(20,4) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=136 ;

-- 
-- 导出表中的数据 `codec2i_user_log`
-- 

INSERT INTO `codec2i_user_log` VALUES (114, '管理员测试充值', 1352229203, 1, 1000.0000, 18);
INSERT INTO `codec2i_user_log` VALUES (115, '支持原创DIY桌面游戏《功夫》《黄金密码》期待您的支持项目支付', 1352229388, 1, -20.0000, 18);
INSERT INTO `codec2i_user_log` VALUES (116, '管理员测试充值', 1352229989, 1, 2000.0000, 17);
INSERT INTO `codec2i_user_log` VALUES (117, '支持拥有自己的咖啡馆项目支付', 1352230101, 1, -500.0000, 17);
INSERT INTO `codec2i_user_log` VALUES (118, 'test', 1352230213, 1, 5000.0000, 19);
INSERT INTO `codec2i_user_log` VALUES (119, '支持拥有自己的咖啡馆项目支付', 1352230228, 1, -500.0000, 19);
INSERT INTO `codec2i_user_log` VALUES (120, '支持拥有自己的咖啡馆项目支付', 1352230232, 1, -500.0000, 19);
INSERT INTO `codec2i_user_log` VALUES (121, '支持拥有自己的咖啡馆项目支付', 1352230237, 1, -500.0000, 19);
INSERT INTO `codec2i_user_log` VALUES (122, '支持拥有自己的咖啡馆项目支付', 1352230240, 1, -500.0000, 19);
INSERT INTO `codec2i_user_log` VALUES (123, '支持拥有自己的咖啡馆项目支付', 1352230243, 1, -500.0000, 19);
INSERT INTO `codec2i_user_log` VALUES (124, '支持拥有自己的咖啡馆项目支付', 1352230247, 1, -500.0000, 19);
INSERT INTO `codec2i_user_log` VALUES (125, '支持拥有自己的咖啡馆项目支付', 1352230268, 1, -500.0000, 19);
INSERT INTO `codec2i_user_log` VALUES (126, '支持拥有自己的咖啡馆项目支付', 1352230270, 1, -500.0000, 19);
INSERT INTO `codec2i_user_log` VALUES (127, '支持拥有自己的咖啡馆项目支付', 1352230293, 1, -500.0000, 19);
INSERT INTO `codec2i_user_log` VALUES (128, '继续测试', 1352231510, 1, 5000.0000, 18);
INSERT INTO `codec2i_user_log` VALUES (129, '支持流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！项目支付', 1352231539, 1, -2000.0000, 18);
INSERT INTO `codec2i_user_log` VALUES (130, '支持流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！项目支付', 1352231631, 1, -500.0000, 19);
INSERT INTO `codec2i_user_log` VALUES (131, '支持拥有自己的咖啡馆项目支付', 1352231671, 1, -300.0000, 17);
INSERT INTO `codec2i_user_log` VALUES (132, '支持流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！项目支付', 1352231704, 1, -3000.0000, 18);
INSERT INTO `codec2i_user_log` VALUES (133, '支持原创DIY桌面游戏《功夫》《黄金密码》期待您的支持项目支付', 1373409927, 1, -10.0000, 18);
INSERT INTO `codec2i_user_log` VALUES (134, '原创DIY桌面游戏《功夫》《黄金密码》期待您的支持项目失败退款', 1388208504, 1, 20.0000, 18);
INSERT INTO `codec2i_user_log` VALUES (135, '原创DIY桌面游戏《功夫》《黄金密码》期待您的支持项目失败退款', 1388208504, 1, 10.0000, 18);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_user_message`
-- 

CREATE TABLE `codec2i_user_message` (
  `id` int(11) NOT NULL auto_increment,
  `create_time` int(11) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL COMMENT '该私信所属人ID',
  `dest_user_id` int(11) NOT NULL COMMENT '对方的用户ID（如果user_id是发件人，该ID为收件，反之为发件人ID）',
  `send_user_id` int(11) NOT NULL COMMENT '发件人ID',
  `receive_user_id` int(11) NOT NULL COMMENT '收件人ID',
  `user_name` varchar(255) NOT NULL,
  `dest_user_name` varchar(255) NOT NULL,
  `send_user_name` varchar(255) NOT NULL,
  `receive_user_name` varchar(255) NOT NULL,
  `message_type` enum('inbox','outbox') NOT NULL COMMENT '类型：inbox(收件) outbox(发件)',
  `is_read` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

-- 
-- 导出表中的数据 `codec2i_user_message`
-- 

INSERT INTO `codec2i_user_message` VALUES (47, 1352230383, '感谢支持', 18, 19, 18, 19, 'lixiphp', 'test', 'lixiphp', 'test', 'outbox', 1);
INSERT INTO `codec2i_user_message` VALUES (48, 1352230383, '感谢支持', 19, 18, 18, 19, 'test', 'lixiphp', 'lixiphp', 'test', 'inbox', 0);
INSERT INTO `codec2i_user_message` VALUES (49, 1352230403, '感谢您的支持!!!', 18, 17, 18, 17, 'lixiphp', 'codec2i', 'lixiphp', 'codec2i', 'outbox', 1);
INSERT INTO `codec2i_user_message` VALUES (50, 1352230403, '感谢您的支持!!!', 17, 18, 18, 17, 'codec2i', 'lixiphp', 'lixiphp', 'codec2i', 'inbox', 0);
INSERT INTO `codec2i_user_message` VALUES (51, 1352230499, '谢谢!!!', 17, 18, 17, 18, 'codec2i', 'lixiphp', 'codec2i', 'lixiphp', 'outbox', 1);
INSERT INTO `codec2i_user_message` VALUES (52, 1352230499, '谢谢!!!', 18, 17, 17, 18, 'lixiphp', 'codec2i', 'codec2i', 'lixiphp', 'inbox', 1);
INSERT INTO `codec2i_user_message` VALUES (53, 1374976857, '你好。', 18, 17, 18, 17, 'lixiphp', 'codec2i', 'lixiphp', 'codec2i', 'outbox', 1);
INSERT INTO `codec2i_user_message` VALUES (54, 1374976857, '你好。', 17, 18, 18, 17, 'codec2i', 'lixiphp', 'lixiphp', 'codec2i', 'inbox', 0);
INSERT INTO `codec2i_user_message` VALUES (55, 1388208423, 'asdfasdfasd', 22, 21, 22, 21, 'test456', 'test123', 'test456', 'test123', 'outbox', 1);
INSERT INTO `codec2i_user_message` VALUES (56, 1388208423, 'asdfasdfasd', 21, 22, 22, 21, 'test123', 'test456', 'test456', 'test123', 'inbox', 1);
INSERT INTO `codec2i_user_message` VALUES (57, 1389396181, 'ttryu', 21, 22, 21, 22, 'test123', 'test456', 'test123', 'test456', 'outbox', 1);
INSERT INTO `codec2i_user_message` VALUES (58, 1389396181, 'ttryu', 22, 21, 21, 22, 'test456', 'test123', 'test123', 'test456', 'inbox', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_user_notify`
-- 

CREATE TABLE `codec2i_user_notify` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `log_info` text NOT NULL,
  `log_time` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `url_route` varchar(255) NOT NULL,
  `url_param` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

-- 
-- 导出表中的数据 `codec2i_user_notify`
-- 

INSERT INTO `codec2i_user_notify` VALUES (69, 17, '拥有自己的咖啡馆 在 2012-11-07 11:31:10 成功筹到 ?5,000.00', 1352230271, 0, 'deal#show', 'id=56');
INSERT INTO `codec2i_user_notify` VALUES (70, 19, '拥有自己的咖啡馆 在 2012-11-07 11:31:10 成功筹到 ?5,000.00', 1352230271, 0, 'deal#show', 'id=56');
INSERT INTO `codec2i_user_notify` VALUES (71, 17, '您支持的项目拥有自己的咖啡馆回报已发放', 1352230424, 0, 'account#view_order', 'id=66');
INSERT INTO `codec2i_user_notify` VALUES (72, 18, '流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！ 在 2012-11-07 11:55:04 成功筹到 ?3,000.00', 1352231704, 0, 'deal#show', 'id=58');

-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_user_refund`
-- 

CREATE TABLE `codec2i_user_refund` (
  `id` int(11) NOT NULL auto_increment,
  `money` double(20,4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL COMMENT '提现申请时间',
  `reply` text NOT NULL COMMENT '提现审核回复',
  `is_pay` tinyint(1) NOT NULL,
  `pay_time` int(11) NOT NULL,
  `memo` text NOT NULL COMMENT '提现的备注',
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `codec2i_user_refund`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `codec2i_user_weibo`
-- 

CREATE TABLE `codec2i_user_weibo` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `weibo_url` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

-- 
-- 导出表中的数据 `codec2i_user_weibo`
-- 

INSERT INTO `codec2i_user_weibo` VALUES (55, 17, 'http://weibo.com/lixiphp');
