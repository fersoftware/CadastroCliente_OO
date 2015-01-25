<?php
require_once(__DIR__."/../vendor/autoload.php");

use Fersoftware\Database\Connection;
use Fersoftware\Database\Query;

echo "#### Executando Fixture ####<br/>";

$connection = new Connection();
$conn = new Query($connection);

$sql = "CREATE SCHEMA IF NOT EXISTS `cadclientdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
 USE `cadclientdb`; ";
$conn->notReturn($sql,array());


echo "Removendo tabela Cliente se ela existir";
$sql = "DROP TABLE IF EXISTS `Cliente`;";
$conn->notReturn($sql,array());
echo " - OK <br/>";

echo "Criando tabela Cliente";

$sql ="
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
  PRIMARY KEY (`Id`))
  ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;";

$conn->notReturn($sql,array());
echo " - OK<br/>";

echo "Removendo tabela Endereco se ele existir";
$sql = "DROP TABLE IF EXISTS `Endereco`;";
$conn->notReturn($sql,array());
echo " - OK <br/>";

echo "Criando tabela Endereco";

$sql = "
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;";

$conn->notReturn($sql,array());
echo " - OK<br/>";
echo "#### Concluído ####";