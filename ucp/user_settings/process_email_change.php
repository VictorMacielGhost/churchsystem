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

        $newEmail = mysqli_escape_string($db_connection, $_POST['newEmail']);
        if(!ValidateFields("email", $newEmail)) die("E-mail curto ou longo demais!");

        // Atualiza o e-mail no banco de dados
        $userId = $_SESSION[USER_DATA_ID];
        $query = "UPDATE `users` SET `email` = '$newEmail' WHERE `userid` = $userId";
        $result = mysqli_query($db_connection, $query);

        if ($result) {
            // Atualização bem-sucedida
            $_SESSION[USER_DATA_EMAIL] = $newEmail;
            header("location: ../");
        } else {
            // Erro ao atualizar
            echo "Erro ao processar a alteração de e-mail.";
        }
    } 
    else {
        // Método de requisição inválido
        http_response_code(403);
        echo "Método de requisição inválido!";
    }
?>
