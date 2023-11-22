<?php

class Empresa{
    public $id_empresa;
    public $nome;
    public $nome_fantasia;
    public $cnpj;
    public $endereco;
    public $telefone;
    public $responsavel;
    
    public function __construct($id_empresa,$nome,$nome_fantasia,$cnpj,$endereco,$telefone,$responsavel)
    {
        $this->id_empresa=$id_empresa;
        $this->nome=$nome;
        $this->nome_fantasia=$nome_fantasia;
        $this->cnpj=$cnpj;
        $this->endereco=$endereco;
        $this->telefone=$telefone;
        $this->responsavel=$responsavel;
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

   
    public function getResponsavel()
    {
        return $this->responsavel;
    }

    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;

        return $this;
    }

   
    public function getEndereco()
    {
        return $this->endereco;
    }

   
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getId_empresa()
    {
        return $this->id_empresa;
    }

    
    public function setId_empresa($id_empresa)
    {
        $this->id_empresa = $id_empresa;

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

    
    public function getNome_fantasia()
    {
        return $this->nome_fantasia;
    }

   
    public function setNome_fantasia($nome_fantasia)
    {
        $this->nome_fantasia = $nome_fantasia;

        return $this;
    }

    
    public function getCnpj()
    {
        return $this->cnpj;
    }

  
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }
}