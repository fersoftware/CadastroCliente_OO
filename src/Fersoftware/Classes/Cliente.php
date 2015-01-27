<?php

namespace Fersoftware\Classes;

use Fersoftware\Classes\PessoaFisica;
use Fersoftware\Classes\PessoaJuridica;


class Cliente
{
    public function addPF($nome, $telefone, $rg, $estrelas = 1)
    {
        $x = new PessoaFisica();
        $x  ->setNome($nome)
            ->setTelefone($telefone)
            ->setCpfCnpj($rg)
            ->setStars($estrelas);

        return $x;
    }

    public function addPJ($nomefantasia, $razaosocial, $cnpj,$contato,$telefone, $estrelas = 1)
    {
        $x = new PessoaJuridica();
        $x  ->setNomeFantasia($nomefantasia)
            ->setRazaoSocial($razaosocial)
            ->setCpfCnpj($cnpj)
            ->setContato($contato)
            ->setTelefone($telefone)
            ->setStars($estrelas);

        return $x;
    }
}