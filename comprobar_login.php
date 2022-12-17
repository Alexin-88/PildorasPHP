<?php
    session_start();
    if(!isset($_SESSION["login"]) && !isset($_COOKIE["login"])){  

        header("Location:login.php");

    }

?>