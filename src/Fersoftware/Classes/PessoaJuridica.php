<?php

namespace Fersoftware\Classes;

use Fersoftware\Interfaces\ClienteInterface;
use Fersoftware\Classes\Endereco;

class PessoaJuridica implements ClienteInterface
{
    private $id;
    private $nomeFantasia;
    private $razaoSocial;
    private $CpfCnpj;
    private $contato;
    private $telefone;
    private $enderecos = array();
    private $stars = 1;

    public function getId()
    {
        return $this->id;
    }

    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    public function getCpfCnpj()
    {
        return $this->CpfCnpj;
    }

    public function getContato()
    {
        return $this->contato;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getEnderecos()
    {
        return $this->enderecos;
    }

    public function getStars()
    {
        return $this->stars;
    }

    public function isPJ()
    {
        return true;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setNomeFantasia($nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;
        return $this;
    }

    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;
        return $this;
    }

    public function setCpfCnpj($CpfCnpj)
    {
        $this->cpf_cnpj = $CpfCnpj;
        return $this;
    }

    public function setContato($contato)
    {
        $this->contato = $contato;
        return $this;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
        return $this;
    }

    public function setEnderecos($enderecos)
    {
        $this->enderecos = $enderecos;
        return $this;
    }

    public function setStars($stars)
    {
        $this->stars = $stars;
        return $this;
    }

    public function addEndereco(Endereco $endereco)
    {
        $this->enderecos[] = $endereco;
        return $this;
    }
}
