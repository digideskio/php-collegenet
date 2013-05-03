<?php
    session_start(); 
    if($_SESSION['logged']){ 
        session_destroy();
        header("Location: index.php");
        exit;
    }
    else {
        header("Location: login.php");
    }
?>
