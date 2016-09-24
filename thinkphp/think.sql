/*
Navicat MySQL Data Transfer

Source Server         : xampp
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : think

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-09-20 10:40:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `hd_access`
-- ----------------------------
DROP TABLE IF EXISTS `hd_access`;
CREATE TABLE `hd_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_access
-- ----------------------------
INSERT INTO `hd_access` VALUES ('7', '10', '2', null);
INSERT INTO `hd_access` VALUES ('7', '14', '3', null);
INSERT INTO `hd_access` VALUES ('7', '15', '3', null);
INSERT INTO `hd_access` VALUES ('7', '16', '3', null);
INSERT INTO `hd_access` VALUES ('7', '11', '2', null);
INSERT INTO `hd_access` VALUES ('7', '17', '3', null);
INSERT INTO `hd_access` VALUES ('7', '5', '1', null);
INSERT INTO `hd_access` VALUES ('7', '7', '2', null);
INSERT INTO `hd_access` VALUES ('7', '13', '3', null);
INSERT INTO `hd_access` VALUES ('8', '6', '1', null);
INSERT INTO `hd_access` VALUES ('8', '13', '3', null);
INSERT INTO `hd_access` VALUES ('8', '7', '2', null);
INSERT INTO `hd_access` VALUES ('8', '5', '1', null);
INSERT INTO `hd_access` VALUES ('7', '18', '3', null);
INSERT INTO `hd_access` VALUES ('7', '19', '3', null);
INSERT INTO `hd_access` VALUES ('7', '20', '3', null);
INSERT INTO `hd_access` VALUES ('7', '21', '3', null);
INSERT INTO `hd_access` VALUES ('7', '22', '3', null);
INSERT INTO `hd_access` VALUES ('7', '6', '1', null);

-- ----------------------------
-- Table structure for `hd_node`
-- ----------------------------
DROP TABLE IF EXISTS `hd_node`;
CREATE TABLE `hd_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_node
-- ----------------------------
INSERT INTO `hd_node` VALUES ('5', 'Admin', '后台应用', '1', null, '1', '0', '1');
INSERT INTO `hd_node` VALUES ('6', 'Index', '前端应用', '1', null, '100', '0', '1');
INSERT INTO `hd_node` VALUES ('7', 'Index', '后台首页控制器', '1', null, '10', '5', '2');
INSERT INTO `hd_node` VALUES ('13', 'index', '首页', '1', null, '11', '7', '3');
INSERT INTO `hd_node` VALUES ('14', 'index', '文章列表管理', '1', null, '21', '10', '3');
INSERT INTO `hd_node` VALUES ('10', 'Posts', '文章控制器', '1', null, '20', '5', '2');
INSERT INTO `hd_node` VALUES ('11', 'Rbac', '权限控制器', '1', null, '30', '5', '2');
INSERT INTO `hd_node` VALUES ('15', 'post', '文章添加修改', '1', null, '22', '10', '3');
INSERT INTO `hd_node` VALUES ('16', 'delete', '文章删除', '1', null, '23', '10', '3');
INSERT INTO `hd_node` VALUES ('17', 'index', '用户列表', '1', null, '31', '11', '3');
INSERT INTO `hd_node` VALUES ('18', 'role', '角色列表', '1', null, '32', '11', '3');
INSERT INTO `hd_node` VALUES ('19', 'node', '节点列表', '1', null, '33', '11', '3');
INSERT INTO `hd_node` VALUES ('20', 'addUser', '用户添加修改', '1', null, '34', '11', '3');
INSERT INTO `hd_node` VALUES ('21', 'addRole', '角色添加修改', '1', null, '35', '11', '3');
INSERT INTO `hd_node` VALUES ('22', 'addNode', '节点添加修改', '1', null, '36', '11', '3');

-- ----------------------------
-- Table structure for `hd_posts`
-- ----------------------------
DROP TABLE IF EXISTS `hd_posts`;
CREATE TABLE `hd_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` bigint(20) NOT NULL DEFAULT '0',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_modified` bigint(20) NOT NULL DEFAULT '0',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  `view_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=355 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_posts
-- ----------------------------
INSERT INTO `hd_posts` VALUES ('10', '1', '1470619288', '2222', '1111', '1470619288', '0', '0');
INSERT INTO `hd_posts` VALUES ('11', '1', '1470619296', '21', '12', '1470619296', '0', '0');
INSERT INTO `hd_posts` VALUES ('12', '1', '1470644367', 'asdasdasd', 'sasd', '1470644367', '0', '0');
INSERT INTO `hd_posts` VALUES ('13', '1', '1470644375', 'asdasdasd', 'sadasd', '1470644375', '0', '0');
INSERT INTO `hd_posts` VALUES ('14', '1', '1470644620', 'asdasdasd', 'asdasdasdasd', '1470644620', '0', '0');
INSERT INTO `hd_posts` VALUES ('15', '1', '1470644644', 'rwerwre', 'wrwerw', '1470644644', '0', '0');
INSERT INTO `hd_posts` VALUES ('16', '1', '1470644648', '345345', '345345', '1470644648', '0', '0');
INSERT INTO `hd_posts` VALUES ('17', '1', '1470644651', 'ccccc', 'ccccc', '1470644651', '0', '0');
INSERT INTO `hd_posts` VALUES ('18', '1', '1470644655', 'uuuuuuu', 'uuuuuuuuuuuu', '1470644655', '0', '0');
INSERT INTO `hd_posts` VALUES ('19', '1', '1470644658', 'oooooo', 'oooooooooooo', '1470644658', '0', '0');
INSERT INTO `hd_posts` VALUES ('20', '1', '1470644662', 'xxxxxxxxxx', 'xxxxxxxxxx', '1470644662', '0', '0');
INSERT INTO `hd_posts` VALUES ('21', '1', '1470644665', 'zzzzzzzzzzzzz', 'zzzzzzzzzzzzzz', '1470644665', '0', '0');
INSERT INTO `hd_posts` VALUES ('22', '1', '1470644669', 'qqqqqqqqqqqq', 'qqqqqqqqqqqqq', '1470644669', '0', '0');
INSERT INTO `hd_posts` VALUES ('23', '1', '1470644673', 'ppppppppppppppp', 'ppppppppppp', '1470644673', '0', '0');
INSERT INTO `hd_posts` VALUES ('24', '1', '1470644678', 'mmmmmmmmmmmmmmmm', 'mmmmmmmmmmmm', '1470644678', '0', '0');
INSERT INTO `hd_posts` VALUES ('25', '1', '1470644682', 'eeeeeeeeeeeeeeee', 'eeeeeeeeeeeee', '1470644682', '0', '0');
INSERT INTO `hd_posts` VALUES ('26', '1', '1470644686', 'qqqqqqqqqqqqqqqqqq', 'qqqqqqqqqqqqqq', '1470644686', '0', '0');
INSERT INTO `hd_posts` VALUES ('27', '1', '1470644689', 'xxxxxxxxxxxxxxxxxxxx', 'xxxxxxxxxxxx', '1470644689', '0', '0');
INSERT INTO `hd_posts` VALUES ('28', '1', '1470644693', 'ssssssssssssssssss', 'sssssssssssssssss', '1470644693', '0', '0');
INSERT INTO `hd_posts` VALUES ('29', '1', '1470644697', 'pppppppppppppppppppppp', 'pppppppppppppppppppp', '1470644697', '0', '0');
INSERT INTO `hd_posts` VALUES ('30', '1', '1470644702', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '1470644702', '0', '0');
INSERT INTO `hd_posts` VALUES ('31', '1', '1470644706', 'iiiiiiiiiiiiiiiiiiiiiiiii', 'iiiiiiiiiiiiiiiiiiiiiii', '1470644706', '0', '0');
INSERT INTO `hd_posts` VALUES ('32', '1', '1470644710', 'ttttttttttttttttt', 'tttttttttttttttttttt', '1470644710', '0', '0');
INSERT INTO `hd_posts` VALUES ('33', '1', '1470743951', 'dasdasdasd', 'asdas', '1470743951', '0', '0');
INSERT INTO `hd_posts` VALUES ('34', '1', '1470743956', 'gtgtgtg', 'ttgggg', '1470743956', '0', '0');
INSERT INTO `hd_posts` VALUES ('35', '1', '1470743960', 'frddrfdrfd', 'frdfrfdr', '1470743960', '0', '0');
INSERT INTO `hd_posts` VALUES ('36', '1', '1470743963', 'kuikuik', 'ikuiui', '1470743963', '0', '0');
INSERT INTO `hd_posts` VALUES ('37', '1', '1470743967', 'uikuikuikuikuik', 'ulukuikuikuik', '1470743967', '0', '0');
INSERT INTO `hd_posts` VALUES ('38', '1', '1470743971', 'xsxsxsxsx', 'xsxsxsxs', '1470743971', '0', '0');
INSERT INTO `hd_posts` VALUES ('39', '1', '1470743974', 'erferferferf', 'eferferferf', '1470743974', '0', '0');
INSERT INTO `hd_posts` VALUES ('40', '1', '1470743978', 'dfcdfcdcdfcdfc', 'dfvdfcdfcdfcdfc', '1470743978', '0', '0');
INSERT INTO `hd_posts` VALUES ('41', '1', '1470743981', 'fvdfvdfvdf', 'dfvdfvd', '1470743981', '0', '0');
INSERT INTO `hd_posts` VALUES ('242', '1', '1471002055', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv745391', 'asdasda986973', '1471002055', '0', '0');
INSERT INTO `hd_posts` VALUES ('243', '1', '1471375181', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv991862', 'asdasda324707', '1471375181', '0', '0');
INSERT INTO `hd_posts` VALUES ('244', '1', '1471201636', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv536759', 'asdasda5820', '1471201636', '0', '0');
INSERT INTO `hd_posts` VALUES ('245', '1', '1470994749', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv192655', 'asdasda782432', '1470994749', '0', '0');
INSERT INTO `hd_posts` VALUES ('246', '1', '1470941678', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv412509', 'asdasda921251', '1470941678', '0', '0');
INSERT INTO `hd_posts` VALUES ('247', '1', '1471285915', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv866877', 'asdasda773552', '1471285915', '0', '0');
INSERT INTO `hd_posts` VALUES ('250', '1', '1471212343', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv551430', 'asdasda802309', '1471212343', '0', '0');
INSERT INTO `hd_posts` VALUES ('252', '1', '1471263585', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv106351', 'asdasda623497', '1471263585', '0', '0');
INSERT INTO `hd_posts` VALUES ('253', '1', '1471470204', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv14370', 'asdasda239740', '1471470204', '0', '0');
INSERT INTO `hd_posts` VALUES ('256', '1', '1471385542', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv223764', 'asdasda652229', '1471385542', '0', '0');
INSERT INTO `hd_posts` VALUES ('261', '1', '1471395061', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv130278', 'asdasda797880', '1471395061', '0', '0');
INSERT INTO `hd_posts` VALUES ('262', '1', '1471008360', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv222050', 'asdasda728241', '1471008360', '0', '0');
INSERT INTO `hd_posts` VALUES ('263', '1', '1471104461', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv291690', 'asdasda850883', '1471104461', '0', '0');
INSERT INTO `hd_posts` VALUES ('264', '1', '1471391457', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv837476', 'asdasda400647', '1471391457', '0', '0');
INSERT INTO `hd_posts` VALUES ('266', '1', '1471007602', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv755709', 'asdasda422219', '1471007602', '0', '0');
INSERT INTO `hd_posts` VALUES ('267', '1', '1471510003', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv548084', 'asdasda13011', '1471510003', '0', '0');
INSERT INTO `hd_posts` VALUES ('268', '1', '1471294644', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv483829', 'asdasda183513', '1471294644', '0', '0');
INSERT INTO `hd_posts` VALUES ('270', '1', '1471109298', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv323613', 'asdasda545348', '1471109298', '0', '0');
INSERT INTO `hd_posts` VALUES ('272', '1', '1471404665', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv255698', 'asdasda90589', '1471404665', '0', '0');
INSERT INTO `hd_posts` VALUES ('275', '1', '1471050279', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv308766', 'asdasda550839', '1471050279', '0', '0');
INSERT INTO `hd_posts` VALUES ('276', '1', '1470874843', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv118899', 'asdasda502643', '1470874843', '0', '0');
INSERT INTO `hd_posts` VALUES ('277', '1', '1470969669', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv808811', 'asdasda371562', '1470969669', '0', '0');
INSERT INTO `hd_posts` VALUES ('278', '1', '1471113854', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv431110', 'asdasda568165', '1471113854', '0', '0');
INSERT INTO `hd_posts` VALUES ('280', '1', '1471353557', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv829621', 'asdasda211917', '1471353557', '0', '0');
INSERT INTO `hd_posts` VALUES ('281', '1', '1470849056', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv576366', 'asdasda254162', '1470849056', '0', '0');
INSERT INTO `hd_posts` VALUES ('282', '1', '1470874565', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv648082', 'asdasda58373', '1470874565', '0', '0');
INSERT INTO `hd_posts` VALUES ('283', '1', '1471266254', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv905526', 'asdasda794641', '1471266254', '0', '0');
INSERT INTO `hd_posts` VALUES ('284', '1', '1470861418', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv722263', 'asdasda152973', '1470861418', '0', '0');
INSERT INTO `hd_posts` VALUES ('285', '1', '1470882558', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv996760', 'asdasda777855', '1470882558', '0', '0');
INSERT INTO `hd_posts` VALUES ('286', '1', '1471195350', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv785574', 'asdasda358642', '1471195350', '0', '0');
INSERT INTO `hd_posts` VALUES ('287', '1', '1471418920', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv67402', 'asdasda169957', '1471418920', '0', '0');
INSERT INTO `hd_posts` VALUES ('289', '1', '1471419635', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv13662', 'asdasda669914', '1471419635', '0', '0');
INSERT INTO `hd_posts` VALUES ('290', '1', '1471481126', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv264074', 'asdasda946561', '1471481126', '0', '0');
INSERT INTO `hd_posts` VALUES ('291', '1', '1471465746', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv185117', 'asdasda468134', '1471465746', '0', '0');
INSERT INTO `hd_posts` VALUES ('293', '1', '1471465643', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv158696', 'asdasda969465', '1471465643', '0', '0');
INSERT INTO `hd_posts` VALUES ('296', '1', '1471116869', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv681767', 'asdasda611612', '1471116869', '0', '0');
INSERT INTO `hd_posts` VALUES ('297', '1', '1471459543', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv903493', 'asdasda350079', '1471459543', '0', '0');
INSERT INTO `hd_posts` VALUES ('300', '1', '1470960212', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv437645', 'asdasda745112', '1470960212', '0', '0');
INSERT INTO `hd_posts` VALUES ('302', '1', '1471083845', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv780950', 'asdasda898696', '1471083845', '0', '0');
INSERT INTO `hd_posts` VALUES ('306', '1', '1471479264', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv404185', 'asdasda51074', '1471479264', '0', '0');
INSERT INTO `hd_posts` VALUES ('309', '1', '1470871061', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv801293', 'asdasda703810', '1470871061', '0', '0');
INSERT INTO `hd_posts` VALUES ('311', '1', '1471267296', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv127850', 'asdasda843967', '1471267296', '0', '0');
INSERT INTO `hd_posts` VALUES ('312', '1', '1471003913', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv954251', 'asdasda517519', '1471003913', '0', '0');
INSERT INTO `hd_posts` VALUES ('313', '1', '1471110678', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv624893', 'asdasda420549', '1471110678', '0', '0');
INSERT INTO `hd_posts` VALUES ('315', '1', '1470858621', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv222976', 'asdasda498144', '1470858621', '0', '0');
INSERT INTO `hd_posts` VALUES ('318', '1', '1471093918', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv922483', 'asdasda518870', '1471093918', '0', '0');
INSERT INTO `hd_posts` VALUES ('320', '1', '1470886009', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv488684', 'asdasda412388', '1470886009', '0', '0');
INSERT INTO `hd_posts` VALUES ('322', '1', '1471219412', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv113681', 'asdasda985229', '1471219412', '0', '0');
INSERT INTO `hd_posts` VALUES ('323', '1', '1471189706', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv36759', 'asdasda81956', '1471189706', '0', '0');
INSERT INTO `hd_posts` VALUES ('324', '1', '1471132688', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv232952', 'asdasda438338', '1471132688', '0', '0');
INSERT INTO `hd_posts` VALUES ('325', '1', '1470923004', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv105733', 'asdasda761236', '1470923004', '0', '0');
INSERT INTO `hd_posts` VALUES ('326', '1', '1471478581', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv267987', 'asdasda254691', '1471478581', '0', '0');
INSERT INTO `hd_posts` VALUES ('327', '1', '1470947644', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv739754', 'asdasda211174', '1470947644', '0', '0');
INSERT INTO `hd_posts` VALUES ('328', '1', '1471516015', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv858977', 'asdasda533687', '1471516015', '0', '0');
INSERT INTO `hd_posts` VALUES ('332', '1', '1471037621', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv609938', 'asdasda530750', '1471037621', '0', '0');
INSERT INTO `hd_posts` VALUES ('335', '1', '1471477675', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv54101', 'asdasda567461', '1471477675', '0', '0');
INSERT INTO `hd_posts` VALUES ('336', '1', '1471101274', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv750001', 'asdasda362118', '1471101274', '0', '0');
INSERT INTO `hd_posts` VALUES ('337', '1', '1471200054', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv405227', 'asdasda606822', '1471200054', '0', '0');
INSERT INTO `hd_posts` VALUES ('338', '1', '1471090803', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv229471', 'asdasda607036', '1471090803', '0', '0');
INSERT INTO `hd_posts` VALUES ('339', '1', '1471147222', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv976476', 'asdasda79257', '1471147222', '0', '0');
INSERT INTO `hd_posts` VALUES ('341', '1', '1471342039', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv770765', 'asdasda984922', '1471342039', '0', '0');
INSERT INTO `hd_posts` VALUES ('342', '1', '1470878023', 'asdasdasd', 'adsasd', '1470878023', '0', '0');
INSERT INTO `hd_posts` VALUES ('343', '1', '1470878067', '2222', '1', '1470878067', '0', '0');
INSERT INTO `hd_posts` VALUES ('344', '1', '1470878122', '2222', '1', '1470878122', '0', '0');
INSERT INTO `hd_posts` VALUES ('345', '1', '1470884111', 'asdasd', 'sadasd', '1470884111', '0', '0');
INSERT INTO `hd_posts` VALUES ('346', '1', '1470884121', '1111111111111111111111', '111111111111111111111111', '1470884121', '0', '0');
INSERT INTO `hd_posts` VALUES ('347', '1', '1470884368', 'asdasdad', 'dasdasdasd', '1470884368', '0', '0');
INSERT INTO `hd_posts` VALUES ('348', '1', '1470884373', 'vvvvv', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', '1470884373', '0', '0');
INSERT INTO `hd_posts` VALUES ('349', '1', '1470900965', 'cccccccccfffccc', 'ccccccfffccc', '1470901369', '0', '0');
INSERT INTO `hd_posts` VALUES ('350', '1', '1470901386', '啊实打实大', '多大的', '1470901386', '0', '0');
INSERT INTO `hd_posts` VALUES ('351', '1', '1471514326', '文章11111111111111111111', 'xxxxxxxxxxxxxxx', '1471514326', '0', '0');
INSERT INTO `hd_posts` VALUES ('352', '1', '1471516837', '测试1', '测试1', '1471516837', '0', '0');
INSERT INTO `hd_posts` VALUES ('353', '1', '1471517114', '测试内容2', '测试2', '1471517114', '0', '0');
INSERT INTO `hd_posts` VALUES ('354', '1', '1471934643', 'vsdvsdv', 'sdvsdvsd', '1471934643', '0', '0');

-- ----------------------------
-- Table structure for `hd_role`
-- ----------------------------
DROP TABLE IF EXISTS `hd_role`;
CREATE TABLE `hd_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_role
-- ----------------------------
INSERT INTO `hd_role` VALUES ('8', 'Editor', null, '1', '网站编辑');
INSERT INTO `hd_role` VALUES ('7', 'Manager', null, '1', '普通管理员');

-- ----------------------------
-- Table structure for `hd_role_user`
-- ----------------------------
DROP TABLE IF EXISTS `hd_role_user`;
CREATE TABLE `hd_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_role_user
-- ----------------------------
INSERT INTO `hd_role_user` VALUES ('8', '7');
INSERT INTO `hd_role_user` VALUES ('7', '7');
INSERT INTO `hd_role_user` VALUES ('8', '8');
INSERT INTO `hd_role_user` VALUES ('7', '8');
INSERT INTO `hd_role_user` VALUES ('7', '9');
INSERT INTO `hd_role_user` VALUES ('8', '9');
INSERT INTO `hd_role_user` VALUES ('7', '10');
INSERT INTO `hd_role_user` VALUES ('7', '11');
INSERT INTO `hd_role_user` VALUES ('8', '12');
INSERT INTO `hd_role_user` VALUES ('8', '13');
INSERT INTO `hd_role_user` VALUES ('7', '6');
INSERT INTO `hd_role_user` VALUES ('8', '5');

-- ----------------------------
-- Table structure for `hd_session`
-- ----------------------------
DROP TABLE IF EXISTS `hd_session`;
CREATE TABLE `hd_session` (
  `session_id` varchar(255) NOT NULL,
  `session_expire` int(11) NOT NULL,
  `session_data` blob,
  UNIQUE KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_session
-- ----------------------------
INSERT INTO `hd_session` VALUES ('0t09v2c9o2efhbe25ucd5qmtq2', '1473732071', '');
INSERT INTO `hd_session` VALUES ('65e9scjo2jpnlqe9o0c5j1a7k0', '1473732059', '');

-- ----------------------------
-- Table structure for `hd_user`
-- ----------------------------
DROP TABLE IF EXISTS `hd_user`;
CREATE TABLE `hd_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `logintime` int(10) unsigned NOT NULL,
  `loginip` varchar(30) NOT NULL,
  `lock` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_user
-- ----------------------------
INSERT INTO `hd_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1472545856', '0.0.0.0', '0');
INSERT INTO `hd_user` VALUES ('5', '大大说的', 'asdasdasd', '0', '', '1');
INSERT INTO `hd_user` VALUES ('6', '啊实打实大声道', 'asdasdasd', '0', '', '0');
INSERT INTO `hd_user` VALUES ('7', '大大说的阿萨德1', '1213123123', '0', '', '1');
INSERT INTO `hd_user` VALUES ('8', 'safsdfsdfsdf', '96e79218965eb72c92a549dd5a330112', '1471327571', '127.0.0.1', '0');
INSERT INTO `hd_user` VALUES ('9', 'aaaaa11啊实打实大', '96e79218965eb72c92a549dd5a330112', '1471327594', '127.0.0.1', '0');
INSERT INTO `hd_user` VALUES ('10', 'asdasdasdasdasda', 'b0baee9d279d34fa1dfd71aadb908c3f', '1471328461', '127.0.0.1', '0');
INSERT INTO `hd_user` VALUES ('11', 'bbbbbbbbbbbbbbbbbb', 'b0baee9d279d34fa1dfd71aadb908c3f', '1471328474', '127.0.0.1', '0');
INSERT INTO `hd_user` VALUES ('12', 'bb', '514f1b439f404f86f77090fa9edc96ce', '1471328493', '127.0.0.1', '0');
INSERT INTO `hd_user` VALUES ('13', 'test', '098f6bcd4621d373cade4e832627b4f6', '1471514508', '127.0.0.1', '0');

-- ----------------------------
-- Procedure structure for `getPreNextPosts`
-- ----------------------------
DROP PROCEDURE IF EXISTS `getPreNextPosts`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPreNextPosts`(postId int)
begin
IF(SELECT id from hd_posts where post_modified > (SELECT post_modified FROM hd_posts where id = postId) order by post_modified ASC limit 1) IS NULL THEN 
(SELECT * from hd_posts where id = postId) UNION ALL (SELECT * from hd_posts where id = postId) UNION ALL (SELECT * from hd_posts where post_modified < (SELECT post_modified FROM hd_posts where id = postId) order by post_modified DESC limit 1);
ELSEIF (SELECT id from hd_posts where post_modified < (SELECT post_modified FROM hd_posts where id = postId) order by post_modified DESC limit 1) IS NULL THEN
(SELECT * from hd_posts where post_modified > (SELECT post_modified FROM hd_posts where id = postId) order by post_modified ASC limit 1) UNION ALL (SELECT * from hd_posts where id = postId) UNION ALL (SELECT * from hd_posts where id = postId);
ELSE
(SELECT * from hd_posts where post_modified > (SELECT post_modified FROM hd_posts where id = postId) order by post_modified ASC limit 1) UNION ALL (SELECT * from hd_posts where id = postId) UNION ALL (SELECT * from hd_posts where post_modified < (SELECT post_modified FROM hd_posts where id = postId) order by post_modified DESC limit 1);
END IF;
END
;;
DELIMITER ;
