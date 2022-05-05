<?php
    session_start();
    if($_SESSION["authentifiziert"]==false){
        header("Location: ".$_SERVER["HTTP_HOST"]."/webprojekt/logon/");
    }
?>