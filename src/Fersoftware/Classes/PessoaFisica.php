<?php

namespace Fersoftware\Classes;

use Fersoftware\Interfaces\ClienteInterface;

class PessoaFisica implements ClienteInterface
{
    private $id;
    private $nome;
    private $cpf_cnpj;
    private $stars = 1;
    private $enderecos = array();
    private $telefone;

    public function __construct($id,$nome,$telefone,$cpf_cnpj)
    {
        $this->setId($id)
            ->setNome($nome)
            ->setTelefone($telefone)
            ->setCpfCnpj($cpf_cnpj);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getCpfCnpj()
    {
        return $this->CpfCnpj;
    }

    public function setCpfCnpj($CpfCnpj)
    {
        $this->CpfCnpj = $CpfCnpj;
        return $this;
    }

    public function getStars()
    {
        return $this->stars;
    }

    public function setStars($stars)
    {
        $this->stars = $stars;
        return $this;
    }

    public function getEnderecos()
    {
        return $this->enderecos;
    }

    public function setEnderecos($enderecos)
    {
        $this->enderecos = $enderecos;
        return $this;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
        return $this;
    }

    public function addEndereco(Endereco $endereco)
    {
        $this->enderecos[] = $endereco;
        return $this;
    }
}