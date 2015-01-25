/*
Navicat MySQL Data Transfer

Source Server         : 192.168.1.3
Source Server Version : 50541
Source Host           : 192.168.1.7:3306
Source Database       : cadclientedb

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-01-20 19:46:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for Cliente
-- ----------------------------
DROP TABLE IF EXISTS `Cliente`;
CREATE TABLE `Cliente` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) DEFAULT NULL,
  `Nome_Fantasia` varchar(150) DEFAULT NULL,
  `RazaoSocial` varchar(255) DEFAULT NULL,
  `CpfCnpj` varchar(20) DEFAULT NULL,
  `TipoPessoa` varchar(2) DEFAULT NULL,
  `Telefone` varchar(150) DEFAULT NULL,
  `IdEndereco` int(20) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `Estrelas` int(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for Endereco
-- ----------------------------
DROP TABLE IF EXISTS `Endereco`;
CREATE TABLE `Endereco` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdCliente` int(10) DEFAULT NULL,
  `Entrega` int(1) DEFAULT NULL,
  `Endereco` varchar(150) DEFAULT NULL,
  `Bairro` varchar(150) DEFAULT NULL,
  `Cidade` varchar(150) DEFAULT NULL,
  `UF` varchar(2) DEFAULT NULL,
  `CEP` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
