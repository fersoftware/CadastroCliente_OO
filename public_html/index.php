<?php
date_default_timezone_set('America/Sao_Paulo');
ini_set('display_errors', true);
error_reporting(E_ALL | E_STRICT);

require_once '../vendor/autoload.php';

use Fersoftware\Functions\Tool;
use Fersoftware\Database\Connection;
use Fersoftware\Database\Query;

$connection = new Connection();
$conn = new Query($connection);

?>

<!DOCTYPE html>
<html lang="pt_BR">
   <head>
      <meta charset="utf-8"/>
      <title>Aula2 OO em PHP - Desafio4 </title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="description" content="Desafio4 PHP OO"/>
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
               <a class="brand" href="#">Aula2 OO em PHP - Desafio 04  - Persistencia de Dados</a>
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

    $sql = "SELECT
            Cliente.Id,
            Cliente.Nome,
            Cliente.Nome_Fantasia,
            Cliente.RazaoSocial,
            Cliente.CpfCnpj,
            Cliente.TipoPessoa,
            Cliente.Telefone,
            Cliente.IdEndereco,
            Cliente.Email,
            Cliente.Estrelas
        FROM
            Cliente
        ORDER BY
            Cliente.Id ASC";

    $clientelaArr = $conn->selectQuery($sql,'',true);

         foreach ($clientelaArr as $key => $dbcliente)
         {
             //print_r($dbcliente) .'<br><br>';
             ?>
                <tr>
                    <td><?php	echo $dbcliente['Id']; ?></td>
                    <td><?php	echo Tool::ListStars($dbcliente['Estrelas']); ?></td>
                    <?php
                        if(strlen($dbcliente['CpfCnpj']) < 15 )
                        {
                    ?>
                            <td><?php	echo 'PF'; ?></td>
                            <td><?php	echo $dbcliente['Nome']; ?></td>
                    <?php
                        }
                    else
                    {
                    ?>
                        <td><?php	echo 'PJ';  ?></td>
                        <td><?php	echo $dbcliente['Nome_Fantasia']; ?></td>
                    <?php
                    }
                    ?>


                    <td><?php	echo $dbcliente['Telefone']; ?></td>
                    <td><a data-toggle="modal" href="?id=<?php	echo $dbcliente['Id']; ?>" class="btn btn-primary btn-large"><i class="icon-zoom-in"></i></a></td>
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

        $sql = "SELECT
            Cliente.Id,
            Cliente.Nome,
            Cliente.Nome_Fantasia,
            Cliente.RazaoSocial,
            Cliente.CpfCnpj,
            Cliente.TipoPessoa,
            Cliente.Telefone,
            Cliente.IdEndereco,
            Cliente.Email,
            Cliente.Estrelas
        FROM
            Cliente
        WHERE
            Cliente.Id = :param
        ORDER BY
            Cliente.Id ASC";

        $clientelaArr = $conn->selectQuery($sql,$n,false);

        if(strlen($clientelaArr['CpfCnpj']) < 15 )
        {
        ?>
        <h3 id="myModalLabel"> <i class="icon-user"></i> <?php  echo  $clientelaArr['Nome']; ?></h3>
        <?php
        }
        else
        {
        ?>
        <h3 id="myModalLabel"> <i class="icon-user"></i> <?php echo  $clientelaArr['Nome_Fantasia']; ?></h3>
        <?php
        }
        ?>
        <h4 id="myModalLabel"><?php echo  $clientelaArr['Telefone']; ?></h4>
    </div>
    <div class="modal-body">
        <i class="icon-home"></i>
        <p>
            <?php
            $sql = "SELECT
                        Endereco.Id,
                        Endereco.IdCliente,
                        Endereco.Entrega,
                        Endereco.Endereco,
                        Endereco.Bairro,
                        Endereco.Cidade,
                        Endereco.UF,
                        Endereco.CEP
                    FROM
                      Endereco
                    WHERE
                      Endereco.IdCliente = :param
                    ORDER BY
                      Endereco.Id ASC";

            $enderecos = $conn->selectQuery($sql,$clientelaArr['Id'],true);

            foreach ($enderecos as $endereco)
            {
                echo $endereco['Entrega'] == 0 ? '<strong>Endereco</strong>' : '<strong>Endereço de Entrega</strong>';
                echo "<br>";
                echo   $endereco['Endereco'];
                echo "<br>";
                echo   $endereco['Bairro'] . ' - '. $endereco['Cidade'] . ' - '. $endereco['UF']. ' - '. $endereco['CEP'];
                echo "<br>";?>
            <br />
            <?php
            }
            ?>
         </p>
        <hr />
        <i class="icon-folder-open"></i>
        <?php

        if(strlen($clientelaArr['CpfCnpj']) < 15 )
        {
        ?>
        <p><strong>CPF.: </strong><?php echo $clientelaArr['CpfCnpj']; ?>
        <?php
        }
        else
        {
        ?>
        <p>
            <strong>Razão Social: </strong><?php echo $clientelaArr['RazaoSocial']; ?><br/>
            <strong>CNPJ.: </strong><?php echo $clientelaArr['CpfCnpj']; ?>
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