<?php

if(!defined('DBNAME')){
    define('DBNAME', 'projeto01-overdrive');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('ROOT', '/estagiopoo/projeto01-overdrive');
}
require_once("User.php");
require_once("Empresa.php");



class Database{
    private $banco;

    public function __construct()
    {
        $this->banco = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME,DBUSER,DBPASS);
    }
    
    public function login($cpf,$senha)
    {
        $consulta = $this->banco->prepare("SELECT * FROM usuarios WHERE cpf = :cpf");
        
        // Previnindo SQL injection
        $consulta->bindParam(':cpf',$cpf);
        
        $consulta->execute();
        $usuario = $consulta->fetchAll(PDO::FETCH_ASSOC);
        print_r($usuario);

        if($usuario){
            if(password_verify($senha,$usuario[0]['senha'])){
                if($usuario[0]['admin'] == 1){
                    $_SESSION['user'] = $usuario[0]['nome'];
                    $_SESSION['tipo'] = $usuario[0]['admin'];
                    header('Location:'.ROOT. '/private/views/adminUser.view.php');
                    exit();
                } else {
                    $_SESSION['user'] = $usuario[0]['nome'];
                    $_SESSION['tipo'] = $usuario[0]['admin'];
                    header('Location:'.ROOT. '/private/views/user.view.php');
                    exit();
                }
            } else {
                // Senha incorreta, redirecione de volta com uma mensagem de erro
                header('Location: ' . ROOT . '/public/index.php?senhaIncorreta=true');
                exit();
            }
        } else {
            // Usuário não encontrado, redirecione de volta com uma mensagem de erro
            header('Location: ' . ROOT . '/public/index.php?usuarioIncorreto=true');
            exit();
        }
    }
    
    public function viewEmpresas(){
        if(isset($_POST['search'])){
    
            $pesquisa = '%'. $_POST['search'].'%';
            $query = "SELECT * FROM empresas WHERE nome LIKE :pesquisa";
    
            $query_run = $this->banco->prepare($query);
            //Proteção Sql injection
            $query_run->bindParam(':pesquisa',$pesquisa,PDO::PARAM_STR);
    
            $query_run->execute();
    
            return $query_run->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $query="SELECT * FROM empresas";
            $query_run = $this->banco->prepare($query);
            $query_run->execute();
    
            return $query_run->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function viewUsuarios(){
        if(isset($_POST['search'])){

            $pesquisa = '%'. $_POST['search'].'%';
            $query = "SELECT usuarios.*,empresas.nome_fantasia as empresa
                      FROM usuarios 
                      INNER JOIN empresas ON usuarios.fkempresa = empresas.id_empresa
                      WHERE usuarios.nome LIKE :pesquisa OR empresas.nome LIKE :pesquisa
                      ORDER BY usuarios.id_user";


            $query_run = $this->banco->prepare($query);
            //Proteção Sql injection
            $query_run->bindParam(':pesquisa',$pesquisa,PDO::PARAM_STR);

            $query_run->execute();

            return $query_run->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $query="SELECT usuarios.*,empresas.nome_fantasia as empresa
            FROM usuarios 
            INNER JOIN empresas ON usuarios.fkempresa = empresas.id_empresa
            ORDER BY usuarios.id_user";
            $query_run = $this->banco->prepare($query);
            $query_run->execute();
    
            return $query_run->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function pesquisaUsuario($id)
    {
        $query = "SELECT * FROM usuarios WHERE id_user = :id";

        $query_run = $this->banco->prepare($query);
        $query_run->bindParam(':id',$id);
        $query_run->execute();

        $dados=$query_run->fetchAll(PDO::FETCH_ASSOC);
        
        if($dados){
            return array(
            'id_user' => $dados[0]['id_user'],
            'nome' => $dados[0]['nome'],
            'cpf' => $dados[0]['cpf'],
            'senha' => $dados[0]['senha'],
            'cnh' => $dados[0]['cnh'],
            'telefone' => $dados[0]['telefone'],
            'endereco' => $dados[0]['endereco'],
            'carro' => $dados[0]['carro'],
            'admin' => $dados[0]['admin'],
            'fkempresa' => $dados[0]['fkempresa']
        );

        } else {
            header("Location: ../adminUser.view.php");
            exit();
        }
    }

    public function pesquisaEmpresa($id)
    {
        $query = "SELECT * FROM empresas WHERE id_empresa = :id";

        $query_run = $this->banco->prepare($query);
        $query_run->bindParam(':id',$id);
        $query_run->execute();

        $dados=$query_run->fetchAll(PDO::FETCH_ASSOC);
        
        if($dados){
            return array(
            'id_empresa' => $dados[0]['id_empresa'],
            'nome' => $dados[0]['nome'],
            'nome_fantasia' => $dados[0]['nome_fantasia'],
            'cnpj' => $dados[0]['cnpj'],
            'endereco' => $dados[0]['endereco'],
            'telefone' => $dados[0]['telefone'],
            'responsavel' => $dados[0]['responsavel']
        );

        } else {
            header("Location: ../adminEmpr.view.php");
            exit();
        }
    }

    public function pesquisaFkEmpresa($id)
    {
        $query = "SELECT * FROM empresas WHERE id_empresa = :id";

        $query_run = $this->banco->prepare($query);
        $query_run->bindParam(':id',$id);
        $query_run->execute();

        $dados=$query_run->fetchAll(PDO::FETCH_ASSOC);
        
        if($dados){
            return array(
            'id_empresa' => $dados[0]['id_empresa'],
            'nome' => $dados[0]['nome'],
            'nome_fantasia' => $dados[0]['nome_fantasia'],
            'cnpj' => $dados[0]['cnpj'],
            'endereco' => $dados[0]['endereco'],
            'telefone' => $dados[0]['telefone'],
            'responsavel' => $dados[0]['responsavel']
        );

        } else {
            return null;
            exit();
        }
    }

    public function cadastraUsuario($usuario)
    {
        
        $query = "INSERT INTO usuarios (nome, cpf, senha, cnh, telefone, endereco, carro, admin,fkempresa) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
     
        
        $dados = array(
            $usuario->getNome(),
            $usuario->getCpf(),
            $usuario->getSenha(),
            $usuario->getCnh(),
            $usuario->getTelefone(),
            $usuario->getEndereco(),
            $usuario->getCarro(),
            $usuario->getAdmin(),
            $usuario->getFkempresa()
        );
        print_r($dados);
        $query_run = $this->banco->prepare($query);
        
        if ($query_run->execute($dados)) {
            $_SESSION['mensagem'] = "Usuário cadastrado com sucesso !";
            return true;
        }else{
            $_SESSION['mensagem_erro'] = "Falha no cadastro do usuário!";
            return false;
            }
        }

    public function cadastraEmpresa($empresa)
    {
        $query = "INSERT INTO empresas (nome,nome_fantasia,cnpj,endereco,telefone,responsavel) VALUES (?,?,?,?,?,?) ";

        $dados = array(
        $empresa->getNome(),
        $empresa->getNome_fantasia(),
        $empresa->getCnpj(),
        $empresa->getEndereco(),
        $empresa->getTelefone(),
        $empresa->getResponsavel());

        $query_run = $this->banco->prepare($query);
        
        if($query_run->execute($dados)){
            $_SESSION['mensagem'] = "Empresa cadastrada com sucesso !";
            return true;
        }else{
        $_SESSION['mensagem_erro'] = "Falha no cadastro da empresa!";
        return false;
        }
    
        
    }

    public function alterUser($usuario,$id)
    {
        $query = "UPDATE usuarios SET nome = ?, cpf = ?, senha = ? , cnh = ? , telefone = ? , endereco= ? , carro = ?, admin = ?, fkempresa = ? WHERE id_user = ?";
        $query_run = $this->banco->prepare($query);
    

        $array=array(
            $usuario->getNome(),
            $usuario->getCpf(),
            $usuario->getSenha(),
            $usuario->getCnh(),
            $usuario->getTelefone(),
            $usuario->getEndereco(),
            $usuario->getCarro(),
            $usuario->getAdmin(),
            $usuario->getFkempresa(),
            $id,
        );

        if($query_run->execute($array)){
            $_SESSION['mensagem'] = "Usuário alterado com sucesso !";
            return true;
        }else{
            $_SESSION['mensagem_erro'] = "Falha ao alterar o usuário !";
            return false;
        }
    }
       
    public function alterEmpresa($empresa,$id)
    {
        $query = "UPDATE empresas SET nome = ?, nome_fantasia = ?, cnpj = ? , endereco = ? , telefone = ? , responsavel= ? WHERE id_empresa = ?";
        
        $query_run = $this->banco->prepare($query);
    

        $array=array(
            $empresa->getNome(),
            $empresa->getNome_fantasia(),
            $empresa->getCnpj(),
            $empresa->getEndereco(),
            $empresa->getTelefone(),
            $empresa->getResponsavel(),
            $id
        );

        if($query_run->execute($array)){
            $_SESSION['mensagem'] = "Empresa alterada com sucesso !";
            return true;
        }else{
            $_SESSION['mensagem_erro'] = "Falha ao alterar a empresa !";
            return false;
        }
    }
       
    public function deletarUsuario($id)
    {
        $query = "DELETE FROM usuarios WHERE id_user = ?";
        $array = array($id);
        $query_run = $this->banco->prepare($query);
        if($query_run->execute($array)){
            $_SESSION['mensagem'] = "Usuário deletado com sucesso !";
            header('Location: ../views/adminUser.view.php');
            return true;
        }else{
            $_SERVER['mensagem_erro']="Erro ao deletar usuário";
            header('Location: ../views/adminUser.view.php');
            return false;
        }
    }

    public function deletarEmpresa($id)
    {
        $query = "DELETE FROM empresas WHERE id_empresa = ?";
        $array = array($id);
        $query_run = $this->banco->prepare($query);
        if($query_run->execute($array)){
            $_SESSION['mensagem'] = "Empresa deletada com sucesso !";
            header('Location: ../views/adminEmpr.view.php');
            return true;
        }else{
            $_SERVER['mensagem_erro']="Erro ao deletar empresa";
            header('Location: ../views/adminEmpr.view.php');
            return false;
        }
    }
}