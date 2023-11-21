<?php

class Usuarios{
    public $id_user;
    public $nome;
    public $cpf;
    public $senha;
    public $telefone;
    public $endereco;
    public $carro;
    public $admin;
    

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
}