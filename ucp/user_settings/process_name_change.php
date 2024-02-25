<?php
    include "../../source/process/main.php";

    if(!IsUserLogged()) {
        header("location: ../../login/");
        die();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' || (isset($_SERVER['HTTPS'])))
    {
        Database_Connect();
        $db_connection = Database_ReturnHandle();

        $newName = mysqli_escape_string($db_connection, $_POST['newName']);
        if(!ValidateFields("name", $newName)) die("Nome curto ou longo demais!");

        // Atualiza o nome no banco de dados
        $userId = $_SESSION[USER_DATA_ID];
        $query = "UPDATE `users` SET `name` = '$newName' WHERE `userid` = $userId";
        $result = mysqli_query($db_connection, $query);

        if ($result) {
            // Atualiza��o bem-sucedida
            $_SESSION[USER_DATA_NAME] = $newName;
            header("Location: ../");
        } else {
            // Erro ao atualizar
            echo "Erro ao processar a altera��o de nome.";
        }
    } 
    else {
        // M�todo de requisi��o inv�lido
        http_response_code(403);
        echo "M�todo de requisi��o inv�lido!";
    }
?>
