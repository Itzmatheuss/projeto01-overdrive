<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Usuários</title>
    <link rel="shortcut icon" href="/public/images/ecology.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/newUserstyle.css">
</head>
<body>
    <div class="img"></div>
    <div class="container">
        <header>Cadastro de Usuário</header>

        <form action="#">
            <div class="form-first">
                <div class="details personal">
                    <span class="title">Detalhes do Usuário</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nome">Nome Completo</label>
                            <input type="text" placeholder="Nome" id="nome" required>
                        </div>

                        <div class="input-field">
                            <label for="cpf">CPF</label>
                            <input type="text" placeholder="CPF" id="cpf" required>
                        </div>

                        <div class="input-field">
                            <label for="senha">Senha</label>
                            <input type="password" placeholder="Escolha sua senha" id="senha" required>
                        </div>

                        <div class="input-field">
                            <label for="cnh">CNH</label>
                            <input type="text" placeholder="CNH" id="cnh" required>
                        </div>

                        <div class="input-field">
                            <label for="telefone">Telefone</label>
                            <input type="tel" placeholder="Telefone" id="telefone" required>
                        </div>

                        <div class="input-field">
                            <label for="endereco">Endereço</label>
                            <input type="password" placeholder="Endereço" id="endereco" required>
                        </div>

                        <div class="input-field">
                            <label for="carro">Carro</label>
                            <input type="text" placeholder="Carro" id="carro" required>
                        </div>

                        <div class="input-field">
                            <label for="empresa">Empresa</label>
                            <input type="text" placeholder="Empresa" id="empresa" required>
                        </div>

                        <div class="input-field-type">
                         
                            <label for="tipo">Tipo de Usuário</label>
                            <label for="admin">Adminstrador</label>
                            <input type="radio" name="tipo" value="admin" id="admin" required>
                            <label for="user">Comum</label>
                            <input type="radio" name="tipo" value="user" id="user" required>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>