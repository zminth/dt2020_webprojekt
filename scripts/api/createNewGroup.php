<?php
    error_reporting(0);
    //header('Content-Type: application/json');

    //Serververbindung
    include("../generalInformations.php");

    //Variablen
    $a = 0;
    $groupName = $_POST["groupName"];
    $beschreibung = $_POST["description"];

    @$dbVerbindung = new mysqli($hostname, $username, $password, $database);
    if(mysqli_connect_errno() == 0){

        $sql = "INSERT INTO benutzergruppen (Gruppe, Gruppenbeschreibung) VALUES ('$groupName', '$beschreibung');";
        //echo "$sql";

        echo "Gruppe wurde angelegt!";

        //$content = $dbVerbindung->query($sql);
        

        /* $sql = "SELECT * FROM `benutzer` WHERE `EMail`='$vorname.$nachname@ticketsystem.de';";
        $content = $dbVerbindung->query($sql); */
        
        if ($content->num_rows == 0){
            /* $data = [
                'error' => "Fehler beim anlegen des Benutzers",
                'error_code' => "404",
                'error_message' => "Data not found"
            ]; */
        }else{
            /* while ($obj = $content->fetch_object()){
                $data[$a] = $obj;

                $a++;
            } */
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

    //echo "Benutzer wurde erfolgreich angelegt!";
?>