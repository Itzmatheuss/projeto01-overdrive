<?php

require_once('../controllers/autenticacao.php');
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
    
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="search">
        <button onclick="searchData()" class="btn btn-primary ">
            <span class="material-symbols-outlined mt-1">
                search
            </span>
        </button>
    </div>

    <div class="container mt-4">
        <!-- <?php include('mensagem.php');?> -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-custom">
                        <h4>Empresas Cadastradas
                         <a href="adminUser.view.php" class="btn btn-info float-end mx-3">Ver Usuários</a>
                         <a href="newEmpresa.php" class="btn btn-info float-end">Cadastrar Empresa</a>
                        </h4>    
                    </div>
                    <div class="card-body bg-custom">
                        <table class="table table-bordered table-striped">
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
                                     $result = $conn->exibirEmpresas();
                                         foreach($result as $row){
                                             echo "<tr>
                                                     <td>{$row['id_empresa']}</td>
                                                     <td>{$row['nome']}</td>
                                                     <td>{$row['nome_fantasia']}</td>
                                                     <td>{$row['cnpj']}</td>
                                                     <td>{$row['telefone']}</td>
                                                     <td>{$row['endereco']}</td>
                                                     <td>{$row['responsavel']}</td>
                                                     <td><div class='d-inline-block'>
                                                     <a href='../controllers/editEmpresa.php' class='mx-3' >
                                                         <span class='material-symbols-outlined'>
                                                         edit_note
                                                         </span>
                                                     </a></div>
                                                        <a href='#' >
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