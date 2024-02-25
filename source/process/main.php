<?php
    session_start();

    /*
        Defines of System's and General functions
        By Victor Ghost - 18/12/23
    */

    include "data.php";         // Including general data constants and variables

    function GetUserNameById($user_id, &$dest)
    {
        $handle = Database_ReturnHandle();
        $result = mysqli_query($handle, "SELECT `name` FROM `users` WHERE `userid` = '$user_id';");
        if($result)
        {
            $data = mysqli_fetch_array($result);
            $dest = $data['name'];
            return true;
        }
        return false;
    }

    // Write Nav bars depending on user type account
    function WriteHeaders()
    {
        $accountType = $_SESSION[USER_DATA_ACCOUNT_TYPE];
        switch($accountType)
        {
            case ACCOUNT_TYPE_ANY:
                echo '
                        <nav>
                            <!-- Adicione links de navegação, como opções do menu, aqui -->
                            <ul>
                                <li><a href="' . WEBSITE_ROOT_URL . REDIRECT_PAGE_URLS[URL_PAGE_UCP]  .'" class="link-light">Início</a></li>
                                <li><a href="' . WEBSITE_ROOT_URL . REDIRECT_PAGE_URLS[URL_PAGE_SETTINGS]  .'" class="link-light">Configurações</a></li>
                                <li><a href="' . WEBSITE_ROOT_URL . REDIRECT_PAGE_URLS[URL_PAGE_EXIT]  .'" class="link-light">Sair</a></li>
                            </ul>
                        </nav>
                    ';
            break;
            case ACCOUNT_TYPE_ADMIN:
                echo '
                        <nav>
                            <!-- Adicione links de navegação, como opções do menu, aqui -->
                            <ul>
                                <li><a href="' . WEBSITE_ROOT_URL . REDIRECT_PAGE_URLS[URL_PAGE_UCP]  .'" class="link-light">Início</a></li>
                                <li><a href="' . WEBSITE_ROOT_URL . REDIRECT_PAGE_URLS[URL_PAGE_CELL_GROUP]  .'" class="link-light">Células</a></li>
                                <li><a href="' . WEBSITE_ROOT_URL . REDIRECT_PAGE_URLS[URL_PAGE_WIDE_VIEW]  .'" class="link-light">Visão Geral</a></li>
                                <li><a href="' . WEBSITE_ROOT_URL . REDIRECT_PAGE_URLS[URL_PAGE_SETTINGS]  .'" class="link-light">Configurações</a></li>
                                <li><a href="' . WEBSITE_ROOT_URL . REDIRECT_PAGE_URLS[URL_PAGE_EXIT]  .'" class="link-light">Sair</a></li>
                            </ul>
                        </nav>
                    ';
            break;
            case ACCOUNT_TYPE_MEMBER: 
            case ACCOUNT_TYPE_LEAD_MEMBER:
                echo '
                        <nav>
                            <!-- Adicione links de navegação, como opções do menu, aqui -->
                            <ul>
                                <li><a href="' . WEBSITE_ROOT_URL . REDIRECT_PAGE_URLS[URL_PAGE_UCP]  .'" class="link-light">Início</a></li>
                                <li><a href="' . WEBSITE_ROOT_URL . REDIRECT_PAGE_URLS[URL_PAGE_CELL_GROUP]  .'" class="link-light">Célula</a></li>
                                <li><a href="' . WEBSITE_ROOT_URL . REDIRECT_PAGE_URLS[URL_PAGE_SETTINGS]  .'" class="link-light">Configurações</a></li>
                                <li><a href="' . WEBSITE_ROOT_URL . REDIRECT_PAGE_URLS[URL_PAGE_EXIT]  .'" class="link-light">Sair</a></li>
                            </ul>
                        </nav>
                    ';
            break;
        }
        
    }


    // Validate fields, return false if something is wrong, true if not
    function ValidateFields($fieldname, $data)
    {
        switch($fieldname)
        {
            case "name":
                if(strlen($data) < MIN_USER_NAME || strlen($data) > MAX_USER_NAME) return false;
                else return true;
                break;
            case "email":
                if(strlen($data) < MIN_USER_EMAIL || strlen($data) > MAX_USER_EMAIL) return false;
                else return true;
                break;
            case "password":
                if(strlen($data) < MIN_USER_PASSWORD || strlen($data) > MAX_USER_PASSWORD) return false;
                else return true;
                break;
            default:
                $erro = new Error("Invalid Fieldname passed to ValidateFields");
                throw $erro;
        }
    }


    // Checks if the user is logged (and which account type he's logged in)
    function IsUserLogged($accountType = ACCOUNT_TYPE_ANY)
    {
        if(!isset($_SESSION[USER_DATA_LOGGED])) return false;
        if($_SESSION[USER_DATA_LOGGED] == true && $_SESSION[USER_DATA_ACCOUNT_TYPE] == $accountType) return true;
        else if($_SESSION[USER_DATA_LOGGED] == true && $accountType == ACCOUNT_TYPE_ANY) return true;
        return false;
    }

    static $DatabaseHandle;

    // Connects to the database
    function Database_Connect()
    {
        global $DatabaseHandle;
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

    
    // Deactivated because it's unusual in the current version
    // Returns the age by the DATE value
    // function GetAge(string $birthday)
    // {
    //     $timestamp = time();
    //     $birth_Timestamp = strtotime($birthday);
        
    //     $difference = ($timestamp - $birth_Timestamp);
        
    //     $age = floor($difference / (60 * 60 * 24 * 365.25));

    //     return intval($age);
    // }

?>