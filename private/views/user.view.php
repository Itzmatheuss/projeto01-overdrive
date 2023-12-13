<?php

require_once('../controllers/autenticacao.php');
require_once('../model/Database.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Usuários </title>
    <link rel="stylesheet" href="../css/styleView.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="ecology.png" type="image/x-icon">
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
</head>

<body>
    <nav class="navbar bg-custom">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Olá <?= $_SESSION['user'] ?> </span>
            <a href="../controllers/sair.php" class="btn btn-danger float-end"> Sair</a>
        </div>
    </nav>
    <div class="img"></div>

    <form action="user.view.php" method="post">
        <div class="box-search">
            <input type="search" class="form-control w-25" placeholder="Pesquisar Nome ou Empresa" id="search" name="search">
            <button class="btn btn-primary ">
                <span class="material-symbols-outlined mt-1">
                    search
                </span>
            </button>
        </div>
    </form>

    <div class="container mt-4">
        <?php include('../controllers/mensagem.php'); ?>
        <div class="row table-primary">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-custom">
                        <h4>Usuários Cadastrados
                            <a href="empr.view.php" class="btn btn-info float-end">Ver Empresas</a>
                        </h4>
                    </div>
                    <div class="card-body bg-custom" id="media-user">
                        <table class="table table-bordered table-striped bg-custom">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>CNH</th>
                                    <th>Telefone</th>
                                    <th>Endereço</th>
                                    <th>Carro</th>
                                    <th>Empresa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $conn = new Database;
                                $result = $conn->viewUsuarios();
                                foreach ($result as $row) {
                                    echo "<tr>
                                            <td data-title='Id' >{$row['id_user']}</td>
                                            <td data-title='Nome:' >{$row['nome']}</td>
                                            <td data-title='Cpf:' >{$row['cpf']}</td>
                                            <td data-title='Cnh:' >{$row['cnh']}</td>
                                            <td data-title='Telefone' >{$row['telefone']}</td>
                                            <td data-title='Endereço:' >{$row['endereco']}</td>
                                            <td data-title='Carro:' >{$row['carro']}</td>
                                            <td data-title='Empresa:' >{$row['empresa']}</td>

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