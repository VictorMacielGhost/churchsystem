<?php
    include "../source/process/main.php";
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
    <link rel="stylesheet" href="../source/styles/global.css">
    <link rel="stylesheet" href="../source/styles/register.css">
    <title>Login da Igreja</title>
</head>
<body>
    <form action="validate.php" method="post">
        <label for="name">* Nome de Usuário ou Email</label>
        <input type="text" id="name" name="name" required maxlength="64" placeholder="Obrigatório">

        <label for="password">* Senha</label>
        <input type="password" name="password" id="password" required maxlength="12" placeholder="Obrigatório">

        <button type="submit">Entrar</button>
        <p class="account-text">Ainda não possui uma conta? <a href='register/index.php'>Criar conta</a>.</p>
    </form>

</body>
</html>
