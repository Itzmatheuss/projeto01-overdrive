<?php

define('DBNAME', 'projeto01-overdrive');
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('ROOT', '/estagiopoo/projeto01-overdrive');

require_once("User.php");


class Database{
    private $banco;

    public function __construct()
    {
        $this->banco = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME,DBUSER,DBPASS);
    }
  
    public function login($cpf,$senha)
    {
        $consulta = $this->banco->prepare("SELECT * FROM usuarios WHERE cpf = :cpf AND senha = :senha ");

        // Previnindo SQL injection
        $consulta->bindParam(':cpf',$cpf);
        $consulta->bindParam(':senha',$senha);
        $consulta->execute();
        $usuario = $consulta->fetchAll(PDO::FETCH_ASSOC);

        if($usuario){
            if($senha== $usuario[0]['senha']){
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
                $_SESSION['mensagem'] = "Senha incorreta. Tente novamente.";
                header('Location:' .ROOT.'/public/index.php');
                exit();
            }
        } else {
            // Usuário não encontrado, redirecione de volta com uma mensagem de erro
            $_SESSION['mensagem'] = "Usuário não encontrado. Tente novamente.";
            header('Location:' .ROOT.'/public/index.php');
            exit();
        }
    }

    public function exibirUsuarios(){
        $query="SELECT * FROM usuarios";
        $query_run = $this->banco->prepare($query);
        $query_run->execute();

        return $query_run->fetchAll(PDO::FETCH_ASSOC);
    }

    public function exibirEmpresas(){
        $query="SELECT * FROM empresas";
        $query_run = $this->banco->prepare($query);
        $query_run->execute();

        return $query_run->fetchAll(PDO::FETCH_ASSOC);
    }
}
