<?php
    error_reporting(0);
    header('Content-Type: application/json');

    //Serververbindung
    include("../generalInformations.php");

    //Variablen
    $a = 0;

    @$dbVerbindung = new mysqli($hostname, $username, $password, $database);
    if(mysqli_connect_errno() == 0){

        $sql = "SELECT `BenutzerID`, `Name`, `Vorname`, `EMail` FROM `benutzer` WHERE `GruppenID`=2 OR `GruppenID`=3 ORDER BY `Name` ASC;";

        $content = $dbVerbindung->query($sql);
        if ($content->num_rows == 0){
            $data = [
                'error' => "Keine Einträge vorhanden",
                'error_code' => "404",
                'error_message' => "Data not found"
            ];
        }else{
            while ($obj = $content->fetch_object()){
                $data[$a] = $obj;

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

    if($data){
        echo json_encode($data);
    }
?>