<?php
    // Check if the add form is submitted
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newCellName']) && isset($_SERVER['HTTPS']))
    {
        include "../../source/process/main.php";
        Database_Connect();
        $db_connection = Database_ReturnHandle();
        $newCellName = mysqli_escape_string($db_connection, $_POST['newCellName']);

        // Validate the new cell name as needed
        if (empty($newCellName)) {
            echo "Please enter a valid cell name.";
            // You can redirect or display an error message as needed
        } else {
            // Insert the new cell into the database
            $user_id = $_SESSION[USER_DATA_ID];
            $insertQuery = "INSERT INTO cells (cell_name, created_by, created_date) VALUES ('$newCellName', '$user_id', ".time().")";
            $insertResult = mysqli_query($db_connection, $insertQuery);

            if ($insertResult) {
                header("location: index.php");
                // You can redirect or display a success message as needed
            } else {
                echo "Error adding cell: " . mysqli_error($db_connection);
                // You can redirect or display an error message as needed
            }
        }
    }
?>
