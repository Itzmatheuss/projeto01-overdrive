<?php

require_once('../controllers/autenticacao_cpf.php');

require_once('../model/Database.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Empresas </title>
    <link rel="stylesheet" href="../css/styleView.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <link rel="shortcut icon" href="ecology.png" type="image/x-icon">

    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <nav class="navbar bg-custom">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Olá <?= $_SESSION['user'] ?> </span>
            <a href="../controllers/sair.php" class="btn btn-danger float-end"> Sair</a>
        </div>
    </nav>
    <div class="img"></div>
    
    <form action="adminEmpr.view.php" method="post">
        <div class="box-search">
            <input type="search" class="form-control w-25" placeholder="Pesquisar Nome" id="search" name="search">
            <button class="btn btn-primary ">
                <span class="material-symbols-outlined mt-1">
                    search
                </span>
            </button>
        </div>
    </form>
    
    <div class="container mt-4">
        <div class="row">
            <?php include('../controllers/mensagem.php'); ?>
            <?php include('../controllers/mensagem_erro.php'); ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-custom">
                        <h4>Empresas Cadastradas
                         <a href="adminUser.view.php" class="btn btn-info float-end mx-3">Ver Usuários</a>
                         <a href="newEmpresa.view.php" class="btn btn-info float-end">Cadastrar Empresa</a>
                        </h4>    
                    </div>
                    <div class="card-body bg-custom" id="media">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Nome Fantasia</th>
                                    <th>Cnpj</th>
                                    <th>Telefone</th>
                                    <th>Endereço</th>
                                    <th>Responsavel</th>
                                    <th>Editar/Deletar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                     $conn = new Database;
                                     $result = $conn->viewEmpresas();
                                         foreach($result as $row){
                                             echo "<tr>
                                                     <td data-title='Id' >{$row['id_empresa']}</td>
                                                     <td data-title='Nome' >{$row['nome']}</td>
                                                     <td data-title='Nome Fantasia' >{$row['nome_fantasia']}</td>
                                                     <td data-title='Cnpj' >{$row['cnpj']}</td>
                                                     <td data-title='Telefone' >{$row['telefone']}</td>
                                                     <td data-title='Endereco' >{$row['endereco']}</td>
                                                     <td data-title='Responsavel' >{$row['responsavel']}</td>
                                                     <td data-title='Editar/Deletar' ><div class='d-inline-block'>
                                                     <a href='editEmpresa.view.php?id_empresa={$row['id_empresa']}' class='mx-3' >
                                                         <span class='material-symbols-outlined'>
                                                         edit_note
                                                         </span>
                                                     </a></div>
                                                        <a href='delEmpresa.view.php?id_empresa={$row['id_empresa']}' >
                                                            <span class='material-symbols-outlined'>
                                                            delete
                                                            </span>
                                                        </a>
                                                 </tr>";
                                         }
                        
                                ?>
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>