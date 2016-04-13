/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50534
Source Host           : localhost:3306
Source Database       : jyk8tn

Target Server Type    : MYSQL
Target Server Version : 50534
File Encoding         : 65001

Date: 2016-03-01 17:58:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id_categoria` int(90) NOT NULL,
  `Nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES ('1', 'Tegnologia');
INSERT INTO `categoria` VALUES ('2', 'Alimentos');
INSERT INTO `categoria` VALUES ('3', 'Aseo');
INSERT INTO `categoria` VALUES ('4', 'Hogar');

-- ----------------------------
-- Table structure for fabrica
-- ----------------------------
DROP TABLE IF EXISTS `fabrica`;
CREATE TABLE `fabrica` (
  `id_fabrica` int(90) NOT NULL,
  `Nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_fabrica`),
  KEY `id_fabrica` (`id_fabrica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of fabrica
-- ----------------------------
INSERT INTO `fabrica` VALUES ('1', 'Bimbo');
INSERT INTO `fabrica` VALUES ('2', 'Toshiba');
INSERT INTO `fabrica` VALUES ('3', 'Noel');
INSERT INTO `fabrica` VALUES ('4', 'Lenovo');

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `id_producto` int(20) NOT NULL,
  `Nombre` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Presentacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Imagen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Iva` int(15) NOT NULL,
  `Precio` int(10) NOT NULL,
  `id_fabrica` int(20) NOT NULL,
  `id_categoria` int(20) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES ('1', 'Toshiba', 'Computador portatil, RAM 4G, 1T, ', 'Colores: Blanco, Negro, Rojo, 14 Pulgadas', '1', '16', '1200000', '2', '1');
INSERT INTO `producto` VALUES ('2', 'Pan Tajado', 'Pan Tajado', 'Panta Tajado de Mantequilla', '2', '0', '20000', '1', '2');
INSERT INTO `producto` VALUES ('3', 'Galletas', 'Galletas', 'Saltin Noel, 3 Paquetes, Mantequilla', '3', '10', '17000', '3', '2');
INSERT INTO `producto` VALUES ('4', 'Ponque', 'Ponque Negro', 'Ponque Negro, Redondo, 500 gr', '4', '10', '30000', '3', '2');
INSERT INTO `producto` VALUES ('5', 'Lenovo', 'Computador portatil, RAM 8GB, 1T, 4 Nucleos', 'Caja 30x40x69', '5', '16', '2000000', '4', '1');
