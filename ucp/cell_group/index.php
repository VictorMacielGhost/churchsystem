<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Células</title>
    <link rel="stylesheet" href="../../source/styles/global.css">
    <link rel="stylesheet" href="../../source/styles/ucp-global.css">
    <link rel="stylesheet" href="../../source/styles/cell-group.css">
</head>
<body>

<?php
    include "../../source/process/main.php";

    // Check if the user is logged in
    if(!IsUserLogged()) {
        echo "
            <script>
                window.location.href = '../../login/';
            </script>
            <noscript>
                <h1>You are not logged in!</h1>
                <a href='../../login/'>Log in</a>
            </noscript>
        ";
        die();
    }

    // Database connection
    Database_Connect();
    $db_connection = Database_ReturnHandle();

    // Fetch cells from the database
    $query = "SELECT * FROM cells";
    $result = mysqli_query($db_connection, $query);

    if (!$result) {
        die("Error fetching cells: " . mysqli_error($db_connection));
    }
?>

<!-- Header -->
<header>
    <h1>Visualizar Células</h1>
    <?php
        if(isset($cellDetails['cell_name']))
        {
            echo $cellDetails['cell_name'];
        }
    ?>
    <!-- Add any additional header information or links here -->
</header>

<?php
    WriteHeaders();
?>

<!-- Main content -->
<main>
    <!-- List of Cells -->
    <section class="cells-list">
        <?php
            if(IsUserLogged(ACCOUNT_TYPE_ADMIN)) include "admin_page_format.php"; // Include the whole page formatted to be viewed as ADMIN
            else if(IsUserLogged(ACCOUNT_TYPE_LEAD_MEMBER)) include "leader_page_format.php";
        ?>
    </section>

</main>

<!-- Footer -->
<footer>
    <!-- Add any additional content or links in the footer here -->
</footer>

</body>
</html>
