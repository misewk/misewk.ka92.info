<?php   
/*
include("index2.php");
return;
*/
    //phpinfo();
    
    //session_start();
    
    $_SESSION["Lang"] = "ru";
    
    // 
    if (!isset($_SESSION["UserID"])) 
    {           
        $_SESSION["UserID"] = "";
        $_SESSION["UserLogin"] = "";        
        $_SESSION["UserIsAdmin"] = 0;       
        //$_SESSION["Lang"] = "ru";
    }
    
    $_GET["p"] = "table";
    //$_GET["p"] = "news";
        
    include("engine.php");
?>