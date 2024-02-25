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

        $newGender = mysqli_escape_string($db_connection, $_POST['newGender']);
        
        if($newGender == "none") $newGender = GENDER_UNKNOWN;
        else if($newGender == "male") $newGender = GENDER_MALE;
        else $newGender = GENDER_FEMALE;


        // Atualiza o g�nero no banco de dados
        $userId = $_SESSION[USER_DATA_ID];
        $query = "UPDATE `users` SET `gender` = '$newGender' WHERE `userid` = $userId";
        $result = mysqli_query($db_connection, $query);

        if ($result) {
            // Atualiza��o bem-sucedida
            header("location: ../");
        } else {
            // Erro ao atualizar
            echo "Erro ao processar a altera��o de g�nero.";
        }
    } 
    else {
        // M�todo de requisi��o inv�lido
        http_response_code(403);
        echo "M�todo de requisi��o inv�lido!";
    }
?>
