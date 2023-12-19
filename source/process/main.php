<?php
    session_start();

    /*
        Defines of System's and General functions
        By Victor Ghost - 18/12/23
    */

    include "data.php";         // Including general data constants and variables

    // Checks if the user is logged (and which account type he's logged in)
    function IsUserLogged($accountType = ACCOUNT_TYPE_ANY)
    {
        if(!isset($_SESSION[USER_DATA_LOGGED])) return false;
        if($_SESSION[USER_DATA_LOGGED] == true && $_SESSION[USER_DATA_ACCOUNT_TYPE] == $accountType) return true;
        return false;
    }

    static $DatabaseHandle;

    // Connects to the database
    function Database_Connect()
    {
        $DatabaseHandle = mysqli_connect(DATABASE_HOSTNAME, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
        if(mysqli_connect_errno())
        {
            return false;
        }
        return true;
    }
    
    // Returns the database handle to be used with mysqli_query
    function Database_ReturnHandle()
    {
        global $DatabaseHandle;
        return $DatabaseHandle;
    }

    // Closes the database connection
    function Database_Close()
    {
        global $DatabaseHandle;
        return mysqli_close($DatabaseHandle);
    }
?>