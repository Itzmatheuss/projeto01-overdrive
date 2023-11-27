<?php

define('DBNAME', 'projeto01-overdrive');
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('ROOT', '/estagiopoo/projeto01-overdrive');



require_once("User.php");
require_once("Empresa.php");
require_once("../controllers/mensagem.php");



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
                    header('Location:'.ROOT. '/private/views/adminUser.view.php');
                    exit();
                } else {
                    $_SESSION['user'] = $usuario[0]['nome'];
                    header('Location:'.ROOT. '/private/views/user.view.php');
                    exit();
                }
            } else {
                // Senha incorreta, redirecione de volta com uma mensagem de erro
                $_SESSION['mensagem']="Senha incorreta ! Tente novamente.";
                header('Location:'.ROOT. '/public/index.php');
                exit();
            }
        } else {
            // Usuário não encontrado, redirecione de volta com uma mensagem de erro
            $_SESSION['mensagem']="Usuário não encontrado ! Tente novamente.";
            header('Location:'.ROOT. '/public/index.php');
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
            $query = "SELECT * FROM usuarios WHERE nome LIKE :pesquisa";

            $query_run = $this->banco->prepare($query);
            //Proteção Sql injection
            $query_run->bindParam(':pesquisa',$pesquisa,PDO::PARAM_STR);

            $query_run->execute();

            return $query_run->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $query="SELECT * FROM usuarios";
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
            'empresa' => $dados[0]['empresa'],
            'admin' => $dados[0]['admin'],
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
            // Redirecionar ou mostrar mensagem de usuário não encontrado
            header("Location: ../adminEmpr.view.php");
            exit();
        }
    }
    
    
    public function cadastraUsuario($usuario)
    {
        $query = "INSERT INTO usuarios (nome, cpf, senha, cnh, telefone, endereco, carro, empresa, admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        $dados = array(
            $usuario->getNome(),
            $usuario->getCpf(),
            $usuario->getSenha(),
            $usuario->getCnh(),
            $usuario->getTelefone(),
            $usuario->getEndereco(),
            $usuario->getCarro(),
            $usuario->getEmpresa(),
            $usuario->getAdmin()
        );
    
        $query_run = $this->banco->prepare($query);
        
    
        if ($query_run->execute($dados)) {
            $_SESSION['mensagem'] = "Usuário cadastrado com sucesso !";
            return true;
        }else{
            $_SESSION['mensagem'] = "Falha no cadastro !";
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
            $_SESSION['mensagem'] = "Usuário cadastrado com sucesso !";
            return true;
        }else{
        $_SESSION['mensagem'] = "Falha no cadastro !";
        return false;
        }
    
        
    }

    public function alterUser($usuario,$id)
    {
        $query = "UPDATE usuarios SET nome = ?, cpf = ?, senha = ? , cnh = ? , telefone = ? , endereco= ? , carro = ?, empresa = ?, admin = ? WHERE id_user = ?";
        
        $query_run = $this->banco->prepare($query);
    

        $array=array(
            $usuario->getNome(),
            $usuario->getCpf(),
            $usuario->getSenha(),
            $usuario->getCnh(),
            $usuario->getTelefone(),
            $usuario->getEndereco(),
            $usuario->getCarro(),
            $usuario->getEmpresa(),
            $usuario->getAdmin(),
            $id
        );

        if($query_run->execute($array)){
            $_SESSION['mensagem'] = "Usuário alterado com sucesso !";
            return true;
        }else{
            $_SESSION['mensagem'] = "Falha ao alterar o usuário !";
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
            $_SESSION['mensagem'] = "Falha ao alterar a empresa !";
            return false;
        }
    }
       
    



}
    