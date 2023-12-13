<?php


class Usuario{
    public $id_user;
    public $nome;
    public $cpf;
    public $cnh;
    public $senha;
    public $telefone;
    public $endereco;
    // public $empresa;
    public $carro;
    public $admin;
    public $fkempresa;

    public function __construct($nome,$cpf,$senha,$cnh,$telefone,$endereco,$carro,$admin,$fkempresa)
    {
        $this->nome=$nome;
        $this->cpf=$cpf;
        $this->senha=$senha;
        $this->cnh=$cnh;
        $this->telefone=$telefone;
        $this->endereco=$endereco;
        $this->carro=$carro;
        // $this->empresa=$empresa;
        $this->admin=$admin;
        $this->fkempresa=$fkempresa;
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

   
    public function getCarro()
    {
        return $this->carro;
    }

    public function setCarro($carro)
    {
        $this->carro = $carro;

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

    public function getId_user()
    {
        return $this->id_user;
    }

    
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

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

    
    public function getCpf()
    {
        return $this->cpf;
    }

   
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    
    public function getSenha()
    {
        return $this->senha;
    }

  
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

   
    public function getAdmin()
    {
        return $this->admin;
    }

    
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }

   
    public function getCnh()
    {
        return $this->cnh;
    }

  
    public function setCnh($cnh)
    {
        $this->cnh = $cnh;

        return $this;
    }

   
    // public function getEmpresa()
    // {
    //     return $this->empresa;
    // }

  
    // public function setEmpresa($empresa)
    // {
    //     $this->empresa = $empresa;

    //     return $this;
    // }

    public function getFkempresa()
    {
        return $this->fkempresa;
    }

 
    public function setFkempresa($fkempresa)
    {
        $this->fkempresa = $fkempresa;

        return $this;
    }
}