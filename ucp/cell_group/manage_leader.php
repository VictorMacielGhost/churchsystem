<?php

    include "../../source/process/main.php";

    $action = $_GET['action'];
    $id = $_GET['id'];
    $cellId = $_GET['cellId'];

    Database_Connect();

    mysqli_query(Database_ReturnHandle(), "UPDATE `users` SET `account_type` = 3 WHERE `account_type` = 2 AND `cell_member` = '$cellId';");
    mysqli_query(Database_ReturnHandle(), "UPDATE `users` SET `account_type` = 2 WHERE `userid` = '$id';");

?>