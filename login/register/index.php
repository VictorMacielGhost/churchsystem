<?php
    include "../../source/process/main.php";
    if(IsUserLogged())
    {
        echo "
            <script>
                window.alert('Aviso: Você já está logado(a)!');
            </script>
            <noscript>
                <h1>Você já está logado(a)!</h1>
            </noscript>
        ";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../source/styles/global.css">
    <link rel="stylesheet" href="../../source/styles/register.css">
    <title>Registro da Igreja</title>
</head>
<body>
    <form action="validate.php" method="post">
        <label for="name">* Nome Completo:</label>
        <input type="text" id="name" name="name" required maxlength="64" spellcheck="true" placeholder="Obrigatório">

        <label for="email">* Endereço de E-mail:</label>
        <input type="email" id="email" name="email" required maxlength="64" placeholder="Obrigatório">

        <label for="password">* Senha</label>
        <input type="password" name="password" id="password" required maxlength="12" placeholder="Obrigatório">

        <label for="phone">Telefone:</label>
        <input type="tel" id="phone" name="phone" maxlength="16" placeholder="Opcional">

        <label for="birthday">Data de Nascimento</label>
        <input type="date" name="birthday" id="birthday">

        <label for="gender">Gênero:</label>
        <select id="gender" name="gender">
            <option value="none" selected>Selecione seu gênero</option>
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
        </select>
        <button type="submit">Enviar Registro</button>
        <p class="account-text">Já possui uma conta? <a href='../index.php'>Entrar</a>.</p>
    </form>
</body>
</html>
