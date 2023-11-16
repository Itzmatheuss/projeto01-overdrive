<?php
include_once '../core/config.php';

$query = "SELECT * FROM empresas";
$query_run = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Empresas </title>
    <link rel="stylesheet" href="../css/styleView.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <nav class="navbar bg-custom">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Olá <?= $_SESSION['user'] ?> </span>
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
                        <h4>Empresas Cadastradas
                         <a href="user.view.php" class="btn btn-info float-end">Ver Usuários</a>
                        </h4>    
                    </div>
                    <table class="table table-bordered table-striped">
                        <div class="card-body">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Nome Fantasia</th>
                                    <th>Cnpj</th>
                                    <th>Telefone</th>
                                    <th>Endereço</th>
                                    <th>Responsavel</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row = mysqli_fetch_assoc($query_run))
                                        echo "<tr>
                                                <td>{$row['id_empresa']}</td>
                                                <td>{$row['nome']}</td>
                                                <td>{$row['nome_fantasia']}</td>
                                                <td>{$row['cnpj']}</td>
                                                <td>{$row['telefone']}</td>
                                                <td>{$row['endereco']}</td>
                                                <td>{$row['responsavel']}</td>
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