<?php

namespace Fersoftware\Interfaces;

use Fersoftware\Classes\Endereco;

interface ClienteInterface
{
    public function setStars($stars);
    public function getStars();
    public function addEndereco(Endereco $endereco);
}