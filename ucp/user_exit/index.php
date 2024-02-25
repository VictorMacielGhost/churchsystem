<?php
    include "../../source/process/main.php";

    session_reset();
    session_destroy();
    header("location: ../../login/");

?>