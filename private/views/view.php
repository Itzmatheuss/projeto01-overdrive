<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Usuários </title>
    <link rel="stylesheet" href="private/js/css/bootstrap-grid.min.css">
</head>
<body>
    <div class="container mt-4">
        <?php include('mensagem.php');?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Usuários Cadastrados</h4>
                    </div>
                    <div class="card-body">
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
                                $query = "SELECT * FROM usuarios";
                                $query_run = mysqli_query($con,$query);
                                
                            ?>
                        </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>