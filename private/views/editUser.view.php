<?php

require_once('../model/Database.php');

$conn = new Database;
$id = $_GET['id_user'];

$result = $conn->pesquisaUsuario($id);
$emp = $conn->viewEmpresas();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuário</title>
    <link rel="shortcut icon" href="ecology.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/newUserstyle.css">
    <script src="../bootstrap/js/jquery-3.7.1.min.js"></script>
    <script src="../bootstrap/js/jquery.mask.min.js"></script>
    <script src="../bootstrap/js/mask.js"></script>
</head>

<body>
    <div class="img"></div>
    <div class="container">
        <header>Alterar dados do usuário</header>
        <?php include('../controllers/mensagem.php'); ?>
        <form action="../controllers/editUser.php" method="post">
            <div class="form-first">
                <div class="details personal">
                    <span class="title">Detalhes do Usuário</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nome">Nome Completo</label>
                            <input type="text" placeholder="Alterar Nome" id="nome" value="<?= $result['nome'] ?>" name="nome" maxlength="25">
                        </div>

                        <div class="input-field">
                            <label for="cpf">CPF</label>
                            <input type="text" placeholder="Alterar CPF" id="cpf" value="<?= $result['cpf'] ?>" name="cpf">
                        </div>

                        <div class="input-field">
                            <label for="senha">Senha</label>
                            <input type="password" placeholder="Alterar Senha" id="senha" name="senha" maxlength="25">
                        </div>

                        <div class="input-field">
                            <label for="cnh">CNH</label>
                            <input type="text" placeholder="Alterar CNH" id="cnh" value="<?= $result['cnh'] ?>" name="cnh">
                        </div>

                        <div class="input-field">
                            <label for="telefone">Telefone</label>
                            <input type="tel" placeholder="Alterar Telefone" id="telefone" value="<?= $result['telefone'] ?>" name="telefone">
                        </div>

                        <div class="input-field">
                            <label for="endereco">Endereço</label>
                            <input type="text" placeholder="Alterar Endereço" id="endereco" value="<?= $result['endereco'] ?>" name="endereco" maxlength="25">
                        </div>

                        <div class="input-field">
                            <label for="carro">Carro</label>
                            <input type="text" placeholder="Alterar Carro" id="carro" value="<?= $result['carro'] ?>" name="carro" maxlength="15">
                        </div>

                        <div class="input-field">
                            <label for="fkempresa">Empresa</label>
                            <select name="fkempresa" id="fkempresa" required>
                                <?php

                                foreach ($emp as $row) {
                                    $selected = ($result['fkempresa'] == $row['id_empresa']) ? 'selected' : '';
                                    echo "<option value='{$row['id_empresa']}' $selected>{$row['nome_fantasia']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-field-type">

                            <div class="label"><label for="tipo">Tipo de Usuário</label></div>
                            <label for="admin">Adminstrador</label>
                            <input type="radio" name="tipo" value="1" <?php echo ($result['admin'] == '1') ? 'checked' : ''; ?> id="admin">
                            <label for="user">Comum</label>
                            <input type="radio" name="tipo" value="0" <?php echo ($result['admin'] == '0') ? 'checked' : ''; ?> id="user">
                        </div>
                    </div>
                    <input type="hidden" name="id_user" value="<?= $result['id_user'] ?>">
                    <div class="button">
                        <a href="adminUser.view.php" class="btn-back">Voltar</a>
                        <button class="btn-send" type="submit" name="edit_user">
                            <span class="btnText">Alterar</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>