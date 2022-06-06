<?php
    error_reporting(0);
    //header('Content-Type: application/json');

    //Serververbindung
    include("../generalInformations.php");

    //Variablen
    $a = 0;
    $vermerk = $_POST["notiz"];
    $benutzerid = $_POST["username"];
    $ticketid = $_POST["ticketid"];

    @$dbVerbindung = new mysqli($hostname, $username, $password, $database);
    if(mysqli_connect_errno() == 0){

        $sql = "SELECT * FROM `benutzer` WHERE `Benutzername`= '$benutzerid';";

        $content = $dbVerbindung->query($sql);
        if ($content->num_rows == 0){
            $data = [
                'error' => "Keine Einträge vorhanden",
                'error_code' => "404",
                'error_message' => "Data not found"
            ];
        }else{
            while ($obj = $content->fetch_object()){
                $benutzerid = $obj->BenutzerID;

                $a++;
            }
        }

    }else{
        $data = [
            'error' => "Keine Verbindung zur Datenbank",
            'error_code' => "503",
            'error_message' => "Service Unavailable"
        ];
    }

    echo $benutzerid;

    @$dbVerbindung = new mysqli($hostname, $username, $password, $database);
    if(mysqli_connect_errno() == 0){

        $sql = "INSERT INTO `vermerk`(`Vermerk`, `BenutzerID`, `TicketID`) VALUES ('$vermerk', '$benutzerid', '$ticketid');";
        echo "$sql";

        $content = $dbVerbindung->query($sql);
        

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