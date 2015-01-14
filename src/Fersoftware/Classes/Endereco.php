<?php

namespace Fersoftware\Classes;

class Endereco
{
    private $endereco;
    private $bairro;
    private $cidade;
    private $estado;
    private $CEP;
    private $enderecoEntrega = 0;

    public function __construct($endereco,$bairro,$cidade,$estado,$CEP,$enderecoEntrega)
    {
        $this->setEndereco($endereco)
            ->setBairro($bairro)
            ->setCidade($cidade)
            ->setEstado($estado)
            ->setCEP($CEP)
            ->setenderecoEntrega($enderecoEntrega);
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getCEP()
    {
        return $this->CEP;
    }

    public function getenderecoEntrega()
    {
        return $this->enderecoEntrega;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }

    public function setCEP($CEP)
    {
        $this->CEP = $CEP;
        return $this;
    }

    public function setenderecoEntrega($enderecoEntrega)
    {
        $this->enderecoEntrega = $enderecoEntrega;
        return $this;
    }
}