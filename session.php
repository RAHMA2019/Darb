<?php

session_start();
$role = isset($_SESSION["role"]);
if(isset($_SESSION["id"])&& $_SESSION["id"]==true){
    
    if($role == "buyer"){
        header("location:events.php");
        exit;
    }

    else if($role == "seller"){
        header("location:orderList.php");
        exit;
    }

    else if($role == "admin"){
        header("location:Dashboard.php");
        exit;
    }

    else{
        echo "";
    }
}    



?>