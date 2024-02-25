<?php

    /*
        Register validations
        by Victor Ghost - 21/12/23
    */

    include "../../source/process/main.php";

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
    if(!ValidateFields("name", $name)) die("Nome curto ou longo demais!");
    $email = mysqli_escape_string($db_connection, $_POST['email']); 
    if(!ValidateFields("email", $email)) die("Email curto ou longo demais!");

    $cache = mysqli_query($db_connection, "SELECT `name`, `email` FROM `users` WHERE `name` = '$name' OR `email` = '$email';");
    if(mysqli_num_rows($cache)) die("Nome de usuário ou email já registrados!");
    
    $password = $_POST['password'];
    if(!ValidateFields("password", $password)) die("Senha curta ou longa demais!");
    
    $phone = mysqli_escape_string($db_connection, $_POST['phone']);
    $birthday = mysqli_escape_string($db_connection, $_POST['birthday']);
    $timestamp = time();
    
    switch($_POST['gender'])
    {
        case "feminino":
            $gender = GENDER_FEMALE;
            break;
        case "masculino":
            $gender = GENDER_MALE;
            break;
        default:
            $gender = GENDER_UNKNOWN;
            break;
    }

    $hash = password_hash($password, PASSWORD_BCRYPT);

    $result = mysqli_query($db_connection, "INSERT INTO `users` (`userid`, `name`, `email`, `password`, `phone`, `birthday`, `gender`, `register_date`) VALUES (DEFAULT, '$name', '$email', '$hash', '$phone', '$birthday', '$gender', '$timestamp');");
    if(!$result)
    {
        http_response_code(500);
        die("Houve um erro ao efetuar o registro. Por favor contate o administrador do sistema ou tente novamente!");
    }
    else header("location: ../index.php");
?>