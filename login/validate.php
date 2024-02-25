<?php

    /*
        Register validations
        by Victor Ghost - 21/12/23
    */

    include "../source/process/main.php";

    if($_SERVER['REQUEST_METHOD'] != "POST") 
    {
        echo "Método de requisição inválido!";
        http_response_code(403);
        die();
    }
    if(!isset($_SERVER['HTTPS'])) 
    {
        echo "Método de requisição inseguro detectado!";
        http_response_code(403);
        die();
    }

    Database_Connect();
    $db_connection = Database_ReturnHandle();
    
    $name = mysqli_escape_string($db_connection, $_POST['name']);
    if(!ValidateFields("name", $name)) die("Nome ou email curtos demais!");
    
    $password = $_POST['password'];
    if(!ValidateFields("password", $password)) die("Senha curta ou longa demais!");

    $query = mysqli_query($db_connection, "SELECT * FROM `users` WHERE `name` = '$name' OR `email` = '$name';");
    if(!mysqli_num_rows($query)) die("Conta não encontrada!");
    
    $data = mysqli_fetch_array($query);
    if(password_verify($password, $data['password'])) // Password matches
    {
        // Login
        $_SESSION[USER_DATA_ID] = $data['userid'];
        $_SESSION[USER_DATA_NAME] = $data['name'];
        $_SESSION[USER_DATA_LOGGED] = true;
        $_SESSION[USER_DATA_ACCOUNT_TYPE] = $data['account_type'];
        $_SESSION[USER_DATA_EMAIL] = $data['email'];
        header("location: ../ucp/");
    }
    else die("Senha incorreta!") // Passwords don't match
?>