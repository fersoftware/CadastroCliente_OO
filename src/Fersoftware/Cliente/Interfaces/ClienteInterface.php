<?php

namespace Fersoftware\Cliente\Interfaces;

use Fersoftware\Cliente\Endereco;

interface ClienteInterface
{
    public function setStars($stars);
    public function getStars();
    public function addEndereco(Endereco $endereco);
}