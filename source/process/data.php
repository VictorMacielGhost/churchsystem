<?php
    /*
        General System Data defines, constants and global variables
        By Victor Ghost - 18/12/23 

    */
    
//========================================//

                                     
    #####    ##   ##### #    #  ####  
    #    #  #  #    #   #    # #      
    #    # #    #   #   ######  ####  
    #####  ######   #   #    #      # 
    #      #    #   #   #    # #    # 
    #      #    #   #   #    #  ####   

//========================================//

    // Website paths
    const REDIRECT_PAGE_URLS = [
        "/login/",
        "/login/register/",
        "/ucp/",
        "/installer/"
    ];

//===================================================================================//
                                                                               
    #     #                                                                         
    #     #  ####  ###### #####     #####  ###### #        ##   ##### ###### #####  
    #     # #      #      #    #    #    # #      #       #  #    #   #      #    # 
    #     #  ####  #####  #    #    #    # #####  #      #    #   #   #####  #    # 
    #     #      # #      #####     #####  #      #      ######   #   #      #    # 
    #     # #    # #      #   #     #   #  #      #      #    #   #   #      #    # 
     #####   ####  ###### #    #    #    # ###### ###### #    #   #   ###### #####    

//===================================================================================// 
    // Enumeration the paths

    const URL_PAGE_LOGIN        =   0;
    const URL_PAGE_REGISTER     =   1;
    const URL_PAGE_UCP          =   2;
    const URL_PAGE_INSTALLER    =   3;

    // Users SESSION variables

    const USER_DATA_ID              =   "UserID";
    const USER_DATA_NAME            =   "UserName";
    const USER_DATA_LOGGED          =   "Logged";
    const USER_DATA_ACCOUNT_TYPE    =   "AccountType";

    // User Account types

    const ACCOUNT_TYPE_ANY          =   0;    // Any
    const ACCOUNT_TYPE_ADMIN        =   1;    // Pastor
    const ACCOUNT_TYPE_LEAD_MEMBER  =   2;    // Lead of cell group
    const ACCOUNT_TYPE_MEMBER       =   3;    // Member of cell group

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

?>