<?php

namespace Fersoftware\Cliente {

    use Fersoftware\Cliente\Interfaces\ClienteInterface;
    use Fersoftware\Cliente\Endereco;

    class PessoaJuridica implements ClienteInterface
    {
        private $id;
        private $nomeFantasia;
        private $razaoSocial;
        private $cpf_cnpj;
        private $contato;
        private $telefone;
        private $enderecos = array();
        private $stars = 1;

        public function __construct($id,$nomeFantasia,$razaoSocial,$cpf_cnpj,$contato,$telefone)
        {
            $this->setId($id)
                ->setNomeFantasia($nomeFantasia)
                ->setRazaoSocial($razaoSocial)
                ->setCpfCnpj($cpf_cnpj)
                ->setContato($contato)
                ->setTelefone($telefone);
        }

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
            return $this->cpf_cnpj;
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

        public function setCpfCnpj($cpf_cnpj)
        {
            $this->cpf_cnpj = $cpf_cnpj;
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
}