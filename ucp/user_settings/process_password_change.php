<?php
    include "../../source/process/main.php";

    if(!IsUserLogged()) {
        echo "
            <script>
                window.location.href = '../../login/';
            </script>
            <noscript>
                <h1>Você não está logado(a)!</h1>
                <a href='../../login/'>Logar</a>
            </noscript>
        ";
        die();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' || (isset($_SERVER['HTTPS'])))
    {
        Database_Connect();
        $db_connection = Database_ReturnHandle();

        $newPassword = mysqli_escape_string($db_connection, $_POST['newPassword']);
        if(!ValidateFields("password", $newPassword)) die("Senha curta ou longa demais!");

        // Atualiza a senha no banco de dados
        $userId = $_SESSION[USER_DATA_ID];
        $hash = password_hash($newPassword, PASSWORD_BCRYPT);
        $query = "UPDATE `users` SET `password` = '$hash' WHERE `userid` = $userId";
        $result = mysqli_query($db_connection, $query);

        if ($result) {
            // Atualização bem-sucedida
            header("location: ../");
        } else {
            // Erro ao atualizar
            echo "Erro ao processar a alteração de senha.";
        }
    } 
    else {
        // Método de requisição inválido
        http_response_code(403);
        echo "Método de requisição inválido!";
    }
?>
