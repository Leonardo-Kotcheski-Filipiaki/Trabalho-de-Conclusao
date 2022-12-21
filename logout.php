<?php
session_start();
include "config.php";
if(isset($_SESSION)){
    if($_SESSION['sessionType'] == 'LoginWithGoogle'){
        $access_token = $_SESSION['access_token'];
        header("Location:".URL_BASE."login/LoginGoogleProcess.php?logout=1&&code=$access_token");
    }
    session_destroy();
    header("Location:index.php");
}else{
    header("Location:index.php");
}

?>