<?php
//Pega o diretorio e elimina o \Fersoftware
define('CLASS_DIR',str_replace('\\Fersoftware', '', getcwd()));
set_include_path(CLASS_DIR);
spl_autoload_register();

use Fersoftware\Classes\PessoaFisica;
use Fersoftware\Classes\Endereco;
use Fersoftware\Classes\PessoaJuridica;
use Fersoftware\Functions\Tool;

$clientela = new PessoaFisica(1,'Fernando Alves da Silva','11 2321-3625','30.956.365-25');
$clientela->addEndereco(new Endereco('Alameda dos Primarios, 100','Jardim I Sul','São Paulo','SP','04061-001',0))
    ->addEndereco(new Endereco('Avenida Primarios, 100','Parque I Sul','São Paulo','SP','09006-001',1))
    ->setStars(5);

$clientelaArr[] = $clientela;

$clientela = new PessoaFisica(3,'Fernando Collor de Melo','11 2322-3726','31.957.369-56');
$clientela->addEndereco(new Endereco('Alameda dos Tercenários, 300','Jardim III Sul','São Paulo','SP','04061-003',1))
    ->addEndereco(new Endereco('Avenida Tercenários, 300','Parque III Sul','São Paulo','SP','09006-003',0))
    ->setStars(3);

$clientelaArr[] = $clientela;

$clientela = new PessoaFisica(4,'Fernando Henrique Cardoso','11 2323-3466','32.947.359-44');
$clientela->addEndereco(new Endereco('Alameda dos Quartenários, 400','Jardim IV Sul','São Paulo','SP','04061-004',0))
    ->addEndereco(new Endereco('Avenida Quartenários, 400','Parque IV Sul','São Paulo','SP','09006-004',1))
    ->setStars(2);

$clientelaArr[] = $clientela;

$clientela = new PessoaFisica(5,'Fernando Scherer','11 2324-3456','34.547.659-47');
$clientela->addEndereco(new Endereco('Alameda dos Quinquenários, 500','Jardim V Sul','São Paulo','SP','04061-005',0))
    ->addEndereco(new Endereco('Avenida Quinquenários, 500','Parque V Sul','São Paulo','SP','09006-005',1))
    ->setStars(1);

$clientelaArr[] = $clientela;

$clientela = new PessoaFisica(2,'Fernando Litre','11 2526-7456','34.447.259-4');
$clientela->addEndereco(new Endereco('Alameda dos Secundários, 200','Jardim II Sul','São Paulo','SP','04061-002',0))
    ->addEndereco(new Endereco('Avenida Secundários, 200','Parque II Sul','São Paulo','SP','09006-002',1))
    ->setStars(4);

$clientelaArr[] = $clientela;

$clientela = new PessoaJuridica(6,'InfoMaq','InfoMaq Ltda','08.162.231/0001-53','Ferdinando','11 8624-6598');
$clientela->addEndereco(new Endereco('Alameda dos Sexagenários, 600','Jardim VI Sul','São Paulo','SP','04061-006',0))
    ->addEndereco(new Endereco('Avenida Sexagenários, 600','Parque VI Sul','São Paulo','SP','09006-006',1))
    ->setStars(4);

$clientelaArr[] = $clientela;

$clientela = new PessoaJuridica(7,'General Motors','Centro de Motores Ltda','08.362.331/0001-23','Felix','11 98333-3598');
$clientela->addEndereco(new Endereco('Alameda dos Octagenários, 800','Jardim VIII Sul','São Paulo','SP','04061-008',0))
    ->addEndereco(new Endereco('Avenida Octagenários, 800','Parque VIII Sul','São Paulo','SP','09006-008',1))
    ->setStars(4);

$clientelaArr[] = $clientela;


$clientela = new PessoaJuridica(8,'Abrinq','Associação Brasileira de Impostos por Quilo','03.263.331/0001-22','Dilma','11 93333-3392');
$clientela->addEndereco(new Endereco('Alameda dos Nonagenário, 900','Jardim IX Sul','São Paulo','SP','04061-009',0))
    ->addEndereco(new Endereco('Avenida Nonagenário, 900','Parque IX Sul','São Paulo','SP','09006-009',1))
    ->setStars(5);

$clientelaArr[] = $clientela;
?>

<!DOCTYPE html>
<html lang="pt_BR">
   <head>
      <meta charset="utf-8"/>
      <title>Aula2 OO em PHP - Desafio2 </title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="description" content="Desafio1 PHP OO"/>
      <meta name="author" content="fersoftware"/>
      <link href="assets/css/bootstrap.css" rel="stylesheet"/>
      <style>
body {
    padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
         }
      </style>
      <link href="assets/css/bootstrap-responsive.css" rel="stylesheet"/>
       <script src="assets/js/src/jquery-latest.js"></script>
       <script src="assets/js/jquery.js"></script>
       <script src="assets/js/src/jquery.tablesorter.js"></script>
       <script type="text/javascript">
           $(document).ready(function()
           {
               $("#myTable").tablesorter();
           });
       </script>
       <script src="assets/js/bootstrap-transition.js"></script>
       <script src="assets/js/bootstrap-alert.js"></script>
       <script src="assets/js/bootstrap-modal.js"></script>
       <script src="assets/js/bootstrap-dropdown.js"></script>
       <script src="assets/js/bootstrap-scrollspy.js"></script>
       <script src="assets/js/bootstrap-tab.js"></script>
       <script src="assets/js/bootstrap-tooltip.js"></script>
       <script src="assets/js/bootstrap-popover.js"></script>
       <script src="assets/js/bootstrap-button.js"></script>
       <script src="assets/js/bootstrap-collapse.js"></script>
       <script src="assets/js/bootstrap-carousel.js"></script>
       <script src="assets/js/bootstrap-typeahead.js"></script>
   </head>
   <body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true" class="">
      <div class="navbar navbar-inverse navbar-fixed-top">
         <div class="navbar-inner">
            <div class="container">
               <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="brand" href="#">Aula2 OO em PHP - Desafio 02 </a>
               <div class="nav-collapse collapse">
                  <ul class="nav">
                     <!--
                        <li class="active"><a href="#">Home</a></li>
                                      <li><a href="#about">About</a></li>
                                      <li><a href="#contact">Contact</a></li>
-->
                  </ul>
               </div>
               <!--/.nav-collapse -->
            </div>
         </div>
      </div>
      <div class="container">
      <h1>Lista de Clientes</h1>
          <h5>Clique em qualquer cabeçario para Organizar</h5>
          <table id="myTable" class="table table-condensed">
              <thead>
              <tr>
            <th class="header headerSortDown">Cod <i class="icon-resize-vertical"></i></th>
            <th class="header"><strong>Rate <i class="icon-resize-vertical"></i></strong></th>
            <th class="header"><strong>Tipo <i class="icon-resize-vertical"></i></strong></th>
            <th class="header"><strong>Nome <i class="icon-resize-vertical"></i></strong></th>
            <th class="header"><strong>Telefone <i class="icon-resize-vertical"></i></strong></th>
            <th class="header"><strong>Detalhes <i class="icon-resize-vertical"></i></strong></th>
         </tr>
              </thead>
              <?php

         foreach ($clientelaArr as $key => $dbcliente)
         {
                ?>
                <tr>
                    <td><?php	echo $dbcliente->getId(); ?></td>
                    <td><?php	echo Tool::ListStars($dbcliente->getStars()); ?></td>
                    <?php
                        if(strlen($dbcliente->getCPFCNPJ()) < 15 )
                        {
                    ?>
                            <td><?php	echo 'PF'; ?></td>
                            <td><?php	echo $dbcliente->getNome(); ?></td>
                    <?php
                        }
                    else
                    {
                    ?>
                        <td><?php	echo 'PJ';  ?></td>
                        <td><?php	echo $dbcliente->getNomeFantasia(); ?></td>
                    <?php
                    }
                    ?>


                    <td><?php	echo $dbcliente->getTelefone(); ?></td>
                    <td><a data-toggle="modal" href="?id=<?php	echo $key; ?>" class="btn btn-primary btn-large"><i class="icon-zoom-in"></i></a></td>
                </tr>
                <?php
            }
                ?>
</table>
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <?php
        $n = $_REQUEST['id'];

        if(strlen($clientelaArr[$n]->getCPFCNPJ()) < 15 )
        {
        ?>
        <h3 id="myModalLabel"> <i class="icon-user"></i> <?php  echo  $clientelaArr[$n]->getNome(); ?></h3>
        <?php
        }
        else
        {
            //print_r($clientelaArr[$n-1]);
        ?>
        <h3 id="myModalLabel"> <i class="icon-user"></i> <?php echo  $clientelaArr[$n]->getNomeFantasia(); ?></h3>
        <?php
        }
        ?>
        <h4 id="myModalLabel"><?php echo  $clientelaArr[$n]->getTelefone(); ?></h4>
    </div>
    <div class="modal-body">
        <i class="icon-home"></i>
        <p><?php

            $enderecos = $clientelaArr[$n]->getEnderecos();

            foreach ($enderecos as $endereco)
            {
                echo $endereco->getenderecoEntrega() == 0 ? '<strong>Endereco</strong>' : '<strong>Endereço de Entrega</strong>';
                echo "<br>";
                echo   $endereco->getEndereco();
                echo "<br>";
                echo   $endereco->getBairro() . ' - '. $endereco->getCidade() . ' - '. $endereco->getEstado(). ' - '. $endereco->getCEP();
                echo "<br>";?>
            <br />
            <?php
            }
            ?>
         </p>
        <hr />
        <i class="icon-folder-open"></i>
        <?php

        if(strlen($clientelaArr[$n]->getCPFCNPJ()) < 15 )
        {
        ?>
        <p><strong>CPF.: </strong><?php echo $clientelaArr[$n]->getCPFCNPJ(); ?>
        <?php
        }
        else
        {
        ?>
        <p>
            <strong>Razão Social: </strong><?php echo $clientelaArr[$n]->getRazaoSocial(); ?><br/>
            <strong>CNPJ.: </strong><?php echo $clientelaArr[$n]->getCPFCNPJ(); ?>
        <?php
        }
        ?>

        </p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
    </div>
</div>

<?php
//Ativa a Tela dados do Cliente
if(isset($_REQUEST['id']))
{
    ?>
    <script type="text/javascript">
        $("#myModal").modal('show');
    </script>
<?php
}
?>
</body>
</html>