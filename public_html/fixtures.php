<?php
require_once(__DIR__."/../vendor/autoload.php");

use Fersoftware\Classes\PessoaFisica;
use Fersoftware\Classes\Endereco;
use Fersoftware\Classes\PessoaJuridica;
use Fersoftware\Classes\Cliente;
use Fersoftware\Database\Connection;
use Fersoftware\Database\Query;


/*
 * é necessário criar o banco cadclientedb
 */

echo "#### Executando Fixture ####<br/>";

$connection = new Connection();
$conn = new Query($connection);

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


echo "Alimentando Array";

$classCliente = new Cliente();

$cliente1 = $classCliente->addPF('Fernando Alves da Silva','11 2321-3625','30.956.365-25');
$cliente1->addEndereco(new Endereco('Alameda dos Primarios, 100','Jardim I Sul','São Paulo','SP','04061-001',0))
    ->addEndereco(new Endereco('Avenida Primarios, 100','Parque I Sul','São Paulo','SP','09006-001',1))
    ->setStars(5);

$conn->persist($cliente1);
$conn->flush();

$cliente2 = $classCliente->addPF('Fernando Collor de Melo','11 2322-3726','31.957.369-56');
$cliente2->addEndereco(new Endereco('Alameda dos Tercenários, 300','Jardim III Sul','São Paulo','SP','04061-003',1))
    ->addEndereco(new Endereco('Avenida Tercenários, 300','Parque III Sul','São Paulo','SP','09006-003',0))
    ->setStars(3);

$conn->persist($cliente2);
$conn->flush();

$cliente3 = $classCliente->addPF('Fernando Henrique Cardoso','11 2323-3466','32.947.359-44');
$cliente3->addEndereco(new Endereco('Alameda dos Quartenários, 400','Jardim IV Sul','São Paulo','SP','04061-004',0))
    ->addEndereco(new Endereco('Avenida Quartenários, 400','Parque IV Sul','São Paulo','SP','09006-004',1))
    ->setStars(2);

$conn->persist($cliente3);
$conn->flush();

$cliente4 = $classCliente->addPF('Fernando Scherer','11 2324-3456','34.547.659-47');
$cliente4->addEndereco(new Endereco('Alameda dos Quinquenários, 500','Jardim V Sul','São Paulo','SP','04061-005',0))
    ->addEndereco(new Endereco('Avenida Quinquenários, 500','Parque V Sul','São Paulo','SP','09006-005',1))
    ->setStars(1);

$conn->persist($cliente4);
$conn->flush();

$cliente5 = $classCliente->addPF('Fernando Litre','11 2526-7456','34.447.259-4');
$cliente5->addEndereco(new Endereco('Alameda dos Secundários, 200','Jardim II Sul','São Paulo','SP','04061-002',0))
    ->addEndereco(new Endereco('Avenida Secundários, 200','Parque II Sul','São Paulo','SP','09006-002',1))
    ->setStars(4);

$conn->persist($cliente5);
$conn->flush();

$cliente6 = $classCliente->addPJ('InfoMaq','InfoMaq Ltda','08.162.231/0001-53','Ferdinando','11 8624-6598');
$cliente6->addEndereco(new Endereco('Alameda dos Sexagenários, 600','Jardim VI Sul','São Paulo','SP','04061-006',0))
    ->addEndereco(new Endereco('Avenida Sexagenários, 600','Parque VI Sul','São Paulo','SP','09006-006',1))
    ->setStars(4);

$conn->persist($cliente6);
$conn->flush();;

$cliente7 = $classCliente->addPJ('General Motors','Centro de Motores Ltda','08.362.331/0001-23','Felix','11 98333-3598');
$cliente7->addEndereco(new Endereco('Alameda dos Octagenários, 800','Jardim VIII Sul','São Paulo','SP','04061-008',0))
    ->addEndereco(new Endereco('Avenida Octagenários, 800','Parque VIII Sul','São Paulo','SP','09006-008',1))
    ->setStars(4);

$conn->persist($cliente7);
$conn->flush();

$cliente8 = $classCliente->addPJ('Abrinq','Associação Brasileira de Impostos por Quilo','03.263.331/0001-22','Dilma','11 93333-3392');
$cliente8->addEndereco(new Endereco('Alameda dos Nonagenário, 900','Jardim IX Sul','São Paulo','SP','04061-009',0))
    ->addEndereco(new Endereco('Avenida Nonagenário, 900','Parque IX Sul','São Paulo','SP','09006-009',1))
    ->setStars(5);

$conn->persist($cliente8);
$conn->flush();

echo " - OK<br/>";


echo "Alimentando no Banco";




echo " - OK<br/>";


echo "#### Concluído ####";