<?php
include_once '../core/config.php';

$query = "SELECT * FROM usuarios";
$query_run = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Usuários </title>
    <link rel="stylesheet" href="../css/styleView.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <nav class="navbar bg-custom">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Olá, <?= $_SESSION['user'] ?> </span>
            <a href="#" class="btn btn-danger float-end"> Sair</a>
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
                        <h4>Usuários Cadastrados
                         <a href="empr.view.php" class="btn btn-info float-end">Ver Empresas</a>
                        </h4>    
                    </div>
                    <div class="card-body bg-custom">
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
                                    while($row = mysqli_fetch_assoc($query_run))
                                        echo "<tr>
                                                <td>{$row['id_user']}</td>
                                                <td>{$row['nome']}</td>
                                                <td>{$row['cpf']}</td>
                                                <td>{$row['cnh']}</td>
                                                <td>{$row['telefone']}</td>
                                                <td>{$row['endereco']}</td>
                                                <td>{$row['carro']}</td>
                                                <td>{$row['empresa']}</td>
                                            </tr>";
                            
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