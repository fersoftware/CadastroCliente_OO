<?php

/*
 * Para Debugar
 * echo $this->pdo_sql_debug($sql,$params);
 * echo '<br><br>';
 */

namespace Fersoftware\Database;

use Fersoftware\Database\Connection;
use Fersoftware\Functions\Tool;
use Fersoftware\Interfaces\ClienteInterface;


class Query
{
    public $conn;

    public function __construct(Connection $connection)
    {
        $this->conn = $connection->getConnection();
    }

    public function insertData($sql, array $params)
    {
        $stmt = $this->conn->prepare($sql);

        if(sizeof($params) > 1)
        {
            foreach($params as $key => $rs)
            {
                $stmt->bindValue(":" .$key, $rs);
            }
        }

        if(!$stmt->execute())
        {
            die("Error ao Inserir:" . var_dump($stmt->errorInfo()). "<br/> Query: {$sql} <br/>" . var_dump($params));
        }

        return $this->conn->lastInsertId();
    }

    public function selectQuery($sql, $param, $fetchAll = false)
    {
        $x = '';
        $y = \PDO::FETCH_ASSOC;
        $stmt = $this->conn->prepare($sql);

        if(strlen($param) > 0)
        {
                $stmt->bindValue(":param" , $param);
        }

        if(!$stmt->execute())
        {
            var_dump($sql);
            die(print_r($stmt->errorInfo()));
        }

        if($fetchAll)
        {
            $x = $stmt->fetchAll($y);
        }
        else
        {
            $x = $stmt->fetch($y);
        }
        return $x;
    }

    function pdo_sql_debug($sql,$placeholders)
    {
        if(sizeof($placeholders) == 1)
        {
            $sql = str_replace(':param',"'".$placeholders."'",$sql);
        }
        else
        {
            foreach($placeholders as $k => $v)
            {
                $sql = preg_replace('/:'.$k.'/',"'".$v."'",$sql);
            }
        }

        return $sql;
    }

    public function notReturn($sql, array $params)
    {
        $stmt = $this->conn->prepare($sql);

        if(sizeof($params) > 1)
        {
            foreach($params as $key => $rs)
            {
                $stmt->bindValue(":" .$key, $rs);
            }
        }

        if(!$stmt->execute())
        {
            var_dump($sql);
            die(var_dump($stmt->errorInfo()));
        }
        return true;
    }

    /**
     * @param ClienteInterface $cliente
     */
    public function persist(ClienteInterface $cliente)
    {
        try
        {
            $this->conn->beginTransaction();


            if(!$cliente->isPJ())
            {
                $cSql = "
                Insert INTO Cliente (Nome,CpfCnpj,Telefone,TipoPessoa,Estrelas)
                          VALUES(:nome,:cpfcnpj,:telefone,:tipopessoa,:estrelas); ";

                $id = $this->insertData($cSql,array(
                        "nome"      => $cliente->getNome(),
                        "cpfcnpj"   => $cliente->getCpfCnpj(),
                        "telefone"  => $cliente->getTelefone(),
                        "tipopessoa" => "F",
                        "estrelas"  => $cliente->getStars()
                    )
                );

                $enderecos = $cliente->getEnderecos();


                foreach ($enderecos as $endereco)
                {
                    $eSql = "INSERT INTO Endereco(IdCliente,Entrega,Endereco,Bairro,Cidade,UF,CEP)
                                    VALUES (:idcliente,:entrega,:endereco,:bairro,:cidade,:uf,:cep);";

                    $this->notReturn($eSql,array(
                            "idcliente" => $id,
                            "entrega"   => $endereco->getenderecoEntrega(),
                            "endereco"  => $endereco->getEndereco(),
                            "bairro"    => $endereco->getBairro(),
                            "cidade"    => $endereco->getCidade(),
                            "uf"        => $endereco->getEstado(),
                            "cep"       => $endereco->getCEP()
                        )
                    );
                }
            }
            else
            {
                $cSql = "
                Insert INTO Cliente (Nome_Fantasia,RazaoSocial,CpfCnpj,TipoPessoa,Telefone,Nome,Estrelas)
                          VALUES(:nomefantasia,:razaosocial,:cpfcnpj,:tipopessoa,:telefone,:nome,:estrelas); ";

                $id = $this->insertData($cSql,array(
                        "nomefantasia"  => $cliente->getNomeFantasia(),
                        "razaosocial"   => $cliente->getRazaoSocial(),
                        "cpfcnpj"       => $cliente->getCpfCnpj(),
                        "tipopessoa"    => "J",
                        "telefone"      => $cliente->getTelefone(),
                        "nome"          => $cliente->getContato(),
                        "estrelas"      => $cliente->getStars()
                    )
                );

                $enderecos = $cliente->getEnderecos();

                foreach ($enderecos as $endereco)
                {
                    $eSql = "INSERT INTO Endereco(IdCliente,Entrega,Endereco,Bairro,Cidade,UF,CEP)
                                    VALUES (:idcliente,:entrega,:endereco,:bairro,:cidade,:uf,:cep);";

                    $this->notReturn($eSql,array(
                            "idcliente" => $id,
                            "entrega"   => $endereco->getenderecoEntrega(),
                            "endereco"  => $endereco->getEndereco(),
                            "bairro"    => $endereco->getBairro(),
                            "cidade"    => $endereco->getCidade(),
                            "uf"        => $endereco->getEstado(),
                            "cep"       => $endereco->getCEP()
                        )
                    );
                }
            }

        }
        catch (\PDOException $e)
        {
            $error = "Erro no Insert: " . $e->getMessage();
            $this->conn->rollBack();
            die($error);
        }
    }

    public function flush()
    {
        try
        {
            $this->conn->commit();
        }
        catch (\PDOException $e)
        {
            die("Erro no Flush: " . $e->getMessage());
        }

        return true;
    }

}