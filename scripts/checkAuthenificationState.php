<?php
    session_start();
    if($_SESSION["authentifiziert"]==false){
        header("Location: ../logon/");
    }
?>