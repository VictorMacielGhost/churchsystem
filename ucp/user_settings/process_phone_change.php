<?php
    include "../../source/process/main.php";

    if(!IsUserLogged()) {
        echo "
            <script>
                window.location.href = '../../login/';
            </script>
            <noscript>
                <h1>Voc� n�o est� logado(a)!</h1>
                <a href='../../login/'>Logar</a>
            </noscript>
        ";
        die();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' || (isset($_SERVER['HTTPS'])))
    {
        Database_Connect();
        $db_connection = Database_ReturnHandle();

        $newPhone = mysqli_escape_string($db_connection, $_POST['newPhone']);
        // Valide $newPhone conforme necess�rio

        // Atualiza o n�mero de telefone no banco de dados
        $userId = $_SESSION[USER_DATA_ID];
        $query = "UPDATE `users` SET `phone` = '$newPhone' WHERE `userid` = $userId";
        $result = mysqli_query($db_connection, $query);

        if ($result) {
            // Atualiza��o bem-sucedida
            header("location: ../");
        } else {
            // Erro ao atualizar
            echo "Erro ao processar a altera��o de n�mero de telefone.";
        }
    } 
    else {
        // M�todo de requisi��o inv�lido
        http_response_code(403);
        echo "M�todo de requisi��o inv�lido!";
    }
?>
