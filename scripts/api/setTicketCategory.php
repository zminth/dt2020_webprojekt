<?php
    error_reporting(0);
    //header('Content-Type: application/json');

    //Serververbindung
    include("../generalInformations.php");

    //Variablen
    $a = 0;
    $ticketid = $_POST["ticketID"];
    $category = $_POST["category"];

    @$dbVerbindung = new mysqli($hostname, $username, $password, $database);
    if(mysqli_connect_errno() == 0){

        $sql = "UPDATE `tickets` SET `KategorieID`='$category' WHERE `TicketID`='$ticketid';";

        echo "Benutzer wurde angelegt!";

        $content = $dbVerbindung->query($sql);

        if ($content->num_rows == 0){
        }else{
        }

    }else{
        $data = [
            'error' => "Keine Verbindung zur Datenbank",
            'error_code' => "503",
            'error_message' => "Service Unavailable"
        ];
    }

    if($data){
        echo json_encode($data);
    }
?>