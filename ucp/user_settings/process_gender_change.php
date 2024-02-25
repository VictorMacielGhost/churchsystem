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

        $newGender = mysqli_escape_string($db_connection, $_POST['newGender']);
        
        if($newGender == "none") $newGender = GENDER_UNKNOWN;
        else if($newGender == "male") $newGender = GENDER_MALE;
        else $newGender = GENDER_FEMALE;


        // Atualiza o gênero no banco de dados
        $userId = $_SESSION[USER_DATA_ID];
        $query = "UPDATE `users` SET `gender` = '$newGender' WHERE `userid` = $userId";
        $result = mysqli_query($db_connection, $query);

        if ($result) {
            // Atualização bem-sucedida
            header("location: ../");
        } else {
            // Erro ao atualizar
            echo "Erro ao processar a alteração de gênero.";
        }
    } 
    else {
        // Método de requisição inválido
        http_response_code(403);
        echo "Método de requisição inválido!";
    }
?>
