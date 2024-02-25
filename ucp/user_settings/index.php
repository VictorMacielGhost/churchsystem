<?php
    include "../../source/process/main.php";

    if (!IsUserLogged()) {
        echo "
            <script>
                window.location.href = '../../login/';
            </script>
            <noscript>
                <h1>VocÃª nÃ£o estÃ¡ logado(a)!</h1>
                <a href='../../login/'>Logar</a>
            </noscript>
        ";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConfiguraÃ§Ã£o - Sistema da Igreja</title>
    <link rel="stylesheet" href="../../source/styles/global.css">
    <link rel="stylesheet" href="../../source/styles/ucp-global.css">
    <link rel="stylesheet" href="../../source/styles/user_settings.css">
</head>
<body>
<header>
    <h1>Configurações do Perfil</h1>
</header>
<?php
    WriteHeaders();
?>

<main>
    <!-- Alterar Nome -->
    <section>
        <h2>Alterar Nome</h2>
        <form action="process_name_change.php" method="post">
            <label for="newName">Novo Nome:</label>
            <input type="text" id="newName" name="newName" required maxlength="64">
            <button type="submit">Salvar</button>
        </form>
    </section>

    <!-- Alterar Senha -->
    <section>
        <h2>Alterar Senha</h2>
        <form action="process_password_change.php" method="post">
            <label for="newPassword">Nova Senha:</label>
            <input type="password" id="newPassword" name="newPassword" required maxlength="12">
            <button type="submit">Salvar</button>
        </form>
    </section>

   <!-- Change Email -->
    <section>
        <h2>Alterar E-mail</h2>
        <form action="process_email_change.php" method="post">
            <label for="newEmail">Novo E-mail:</label>
            <input type="email" id="newEmail" name="newEmail" required maxlength="64">
            <button type="submit">Salvar</button>
        </form>
    </section>

    <!-- Change Phone Number -->
    <section>
        <h2>Alterar Telefone</h2>
        <form action="process_phone_change.php" method="post">
            <label for="newPhone">Novo Telefone:</label>
            <input type="tel" id="newPhone" name="newPhone" maxlength="16">
            <button type="submit">Salvar</button>
        </form>
    </section>

    <!-- Change Date of Birth -->
    <section>
        <h2>Alterar Data de Nascimento</h2>
        <form action="process_birthdate_change.php" method="post">
            <label for="newBirthdate">Nova Data de Nascimento:</label>
            <input type="date" id="newBirthdate" name="newBirthdate">
            <button type="submit">Salvar</button>
        </form>
    </section>

    <!-- Change Gender -->
    <section>
        <h2>Alterar Gênero</h2>
        <form action="process_gender_change.php" method="post">
            <label for="newGender">Novo Gênero:</label>
            <select id="newGender" name="newGender">
                <option value="none" selected>Selecione seu gênero</option>
                <option value="male">Masculino</option>
                <option value="female">Feminino</option>
            </select>
            <button type="submit">Salvar</button>
        </form>
    </section>


</main>

</body>
</html>
