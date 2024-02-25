<?php
    /*
        General System Data defines, constants and global variables
        By Victor Ghost - 18/12/23 

    */
//===================================================================================//
    ######                                                  
    #     #   ##   #####   ##   #####    ##    ####  ###### 
    #     #  #  #    #    #  #  #    #  #  #  #      #      
    #     # #    #   #   #    # #####  #    #  ####  #####  
    #     # ######   #   ###### #    # ######      # #      
    #     # #    #   #   #    # #    # #    # #    # #      
    ######  #    #   #   #    # #####  #    #  ####  ###### 

//===================================================================================//   
 
    const DATABASE_HOSTNAME     =   "127.0.0.1";    // ("127.0.0.1") The address to try connection
    const DATABASE_USERNAME     =   "root";         // ("root") The username of the database to use as connection's credential
    const DATABASE_PASSWORD     =   "";             // ("") The password as connection's credential
    const DATABASE_NAME         =   "church";       // ("church") The database name to connects

//========================================//

                                     
    #####    ##   ##### #    #  ####  
    #    #  #  #    #   #    # #      
    #    # #    #   #   ######  ####  
    #####  ######   #   #    #      # 
    #      #    #   #   #    # #    # 
    #      #    #   #   #    #  ####   

//========================================//

    // Website paths

    const WEBSITE_ROOT_URL = "/churchsystem";
    const REDIRECT_PAGE_URLS = [
        "/login/",
        "/login/register/",
        "/ucp/",
        "/installer/",
        "/ucp/user_settings/",
        "/ucp/user_exit/",
        "/ucp/cell_group/",
        "/ucp/wide_view/"
    ];

    // Enumeration the paths

    const URL_PAGE_LOGIN        =   0;
    const URL_PAGE_REGISTER     =   1;
    const URL_PAGE_UCP          =   2;
    const URL_PAGE_INSTALLER    =   3;
    const URL_PAGE_SETTINGS     =   4;
    const URL_PAGE_EXIT         =   5;
    const URL_PAGE_CELL_GROUP   =   6;
    const URL_PAGE_WIDE_VIEW    =   7;

//===================================================================================//
                                                                               
    #     #                                                                         
    #     #  ####  ###### #####     #####  ###### #        ##   ##### ###### #####  
    #     # #      #      #    #    #    # #      #       #  #    #   #      #    # 
    #     #  ####  #####  #    #    #    # #####  #      #    #   #   #####  #    # 
    #     #      # #      #####     #####  #      #      ######   #   #      #    # 
    #     # #    # #      #   #     #   #  #      #      #    #   #   #      #    # 
     #####   ####  ###### #    #    #    # ###### ###### #    #   #   ###### #####    

//===================================================================================// 

    // Users SESSION variables

    const USER_DATA_ID              =   "UserID";
    const USER_DATA_NAME            =   "UserName";
    const USER_DATA_LOGGED          =   "Logged";
    const USER_DATA_ACCOUNT_TYPE    =   "AccountType";
    const USER_DATA_EMAIL           =   "Email";

    // User Account types

    const ACCOUNT_TYPE_ANY          =   0;    // Any
    const ACCOUNT_TYPE_ADMIN        =   1;    // Pastor
    const ACCOUNT_TYPE_LEAD_MEMBER  =   2;    // Lead of cell group
    const ACCOUNT_TYPE_MEMBER       =   3;    // Member of cell group

    // Users gender types

    const GENDER_UNKNOWN            =   0; // Empty
    const GENDER_MALE               =   1; // Male
    const GENDER_FEMALE             =   2; // Female

    // Users data database size

    const MIN_USER_NAME             =   5; // 5 char as min name
    const MIN_USER_EMAIL            =   12; // 12 char as min email
    const MIN_USER_PASSWORD         =   4; // 4 char min as password size (password != hash)

    const MAX_USER_NAME             =   64; // 64 chars as max user name
    const MAX_USER_EMAIL            =   64; // 64 chars as max user email
    const MAX_USER_PASSWORD         =   12; // 12 chars as max user password

?>